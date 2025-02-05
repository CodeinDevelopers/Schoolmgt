<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium (Saas)
 * @version : 3.1
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Saas.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

class Saas_website extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('saas_model');
        $this->load->model('saas_email_model');
    }

    public function index()
    {
        $this->data['getSettings'] = $this->saas_model->getSettings();
        if ($this->data['getSettings']->captcha_status == 1) {
            $this->load->library('recaptcha', array('site_key' => $this->data['getSettings']->recaptcha_site_key, 'secret_key' => $this->data['getSettings']->recaptcha_secret_key));
            $this->data['recaptcha'] = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            );
        }
        $this->data['featureslist'] = $this->saas_model->getFeaturesList();
        $this->data['faqs'] = $this->saas_model->getFAQList();
        $this->data['getPeriodType'] = $this->saas_model->getPeriodTypeWebsite();
        $this->data['getPackageList'] = $this->saas_model->getPackageListWebsite();
        $this->load->view('saas_website/index', $this->data);
    }

    public function register()
    {
        if ($_POST) {
            $this->form_validation->set_rules('school_name', translate('school_name'), 'trim|required');
            $this->form_validation->set_rules('school_address', translate('school_address'), 'trim|required');
            $this->form_validation->set_rules('admin_name', translate('admin_name'), 'trim|required');
            $this->form_validation->set_rules('gender', translate('gender'), 'trim|required');
            $this->form_validation->set_rules('admin_phone', translate('phone'), 'trim|required|numeric');
            $this->form_validation->set_rules('admin_email', translate('email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('admin_username', translate('admin_username'), 'trim|required|callback_unique_username');
            $this->form_validation->set_rules('admin_password', translate('password'), 'trim|required');
            $this->form_validation->set_rules("logo_file", "School Logo", "callback_handle_upload[logo_file]");
            $this->form_validation->set_rules('retype_admin_password', translate('retype_password'), 'trim|required|matches[admin_password]');
            
            $getSettings = $this->saas_model->getSettings('captcha_status,terms_status');
            if ($getSettings->captcha_status == 1) {
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
            }
            if ($getSettings->terms_status == 1) {
                $this->form_validation->set_rules('terms_cb', 'Agreement', 'trim|required');
            }

            if ($this->form_validation->run() == true) {
                $package_id = $this->input->post('package_id');

                do {
                    $reference_no = mt_rand(100000, 999999);
                    $refence_status = $this->saas_model->checkReferenceNo($reference_no);
                } while ($refence_status);

                //check out subscription payment status
                $getPlanDetails = $this->saas_model->getPackageDetails($package_id);
                //check package status
                if (empty($getPlanDetails)) {
                    $array = array('status' => 'error', 'message' => translate('invalid_package'), 'title' => translate('error'));
                    echo json_encode($array);
                    exit();
                }
                //save all register information in the database file
                $arrayData = array(
                    'package_id' => $package_id,
                    'reference_no' => $reference_no,
                    'school_name' => $this->input->post('school_name'),
                    'address' => $this->input->post('school_address'),
                    'admin_name' => $this->input->post('admin_name'),
                    'gender' => $this->input->post('gender'),
                    'contact_number' => $this->input->post('admin_phone'),
                    'email' => $this->input->post('admin_email'),
                    'username' => $this->input->post('admin_username'),
                    'password' => $this->input->post('admin_password'),
                    'message' => $this->input->post('message'),
                    'logo' => $this->saas_model->fileupload('logo_file', './uploads/saas_school_logo/'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('saas_school_register', $arrayData);
                $regID = $this->db->insert_id();

                // send email submit school registered
                $arrayData['plan_name'] = $getPlanDetails->name;
                $arrayData['date'] = _d($arrayData['created_at']);
                $arrayData['fees_amount'] = number_format(($getPlanDetails->price - $getPlanDetails->discount), 2, '.', '');
                $arrayData['invoice_url'] = base_url('subscription_review/' . $arrayData['reference_no']);
                $arrayData['payment_url'] = base_url('saas_payment/index/' . $arrayData['reference_no']);
                $this->saas_email_model->sentSchoolRegister($arrayData);

                if ($getPlanDetails->free_trial == 1) {
                    $this->db->where('id', $regID);
                    $this->db->update('saas_school_register', ['payment_status' => 1]);
                    $url = base_url('subscription_review/' . $arrayData['reference_no']);
                    //automatic subscription approval
                    $getSettings = $this->saas_model->getSettings();
                    if ($getSettings->automatic_approval == 1) {
                        $this->saas_model->automaticSubscriptionApproval($regID, $this->data['global_config']['currency'], $this->data['global_config']['currency_symbol']);
                    }
                } else {
                    $url = base_url("saas_payment/index/" . $arrayData['reference_no']);
                }
                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'url' => '', 'error' => $error);
            }
            echo json_encode($array);
            exit();

        }
    }

    public function handle_upload($str, $fields)
    {
        if (isset($_FILES["$fields"]) && !empty($_FILES["$fields"]['name'])) {
            $file_size = $_FILES["$fields"]["size"];
            $file_name = $_FILES["$fields"]["name"];
            $allowedExts = array('jpg', 'jpeg', 'png', 'webp');
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            if ($files = filesize($_FILES["$fields"]['tmp_name'])) {
                if (!in_array(strtolower($extension), $allowedExts)) {
                    $this->form_validation->set_message('handle_upload', translate('this_file_type_is_not_allowed'));
                    return false;
                }
                if ($file_size > 2097152) {
                    $this->form_validation->set_message('handle_upload', translate('file_size_shoud_be_less_than') . " 2048KB.");
                    return false;
                }
            } else {
                $this->form_validation->set_message('handle_upload', translate('error_reading_the_file'));
                return false;
            }
            return true;
        }
    }

    // unique valid username verification is done here
    public function unique_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('login_credential');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message("unique_username", translate('username_has_already_been_used'));
            return false;
        } else {
            return true;
        }
    }

    public function getPlanDetails()
    {
        if ($_POST) {
            if (is_loggedin()) {
                echo json_encode(['islogin' => true, 'message' => "Logout first, Then try again.", 'title' => translate('error')]);
                exit;
            }
            $package_id = $this->input->post('package_id');
            $getPlanDetails = $this->saas_model->getPackageDetails($package_id);
            $expiryDate = $this->saas_model->getPlanExpiryDate($package_id);
            $html = "<li>" . translate('plan') . " " . translate('name') . "<span>" . $getPlanDetails->name . "</span></li>
            <li>" . translate('start_date') . "<span>" . date('d-M-Y') . "</span></li>
            <li>" . translate('expiry_date') . "<span>" . $expiryDate . "</span></li>
            <li class='total-costs'>" . translate('total_cost') . "<span>" . ($getPlanDetails->free_trial == 1 ? translate('free') : $this->data['global_config']['currency_symbol'] . number_format(($getPlanDetails->price - $getPlanDetails->discount), 2, '.', '')) . "</span></li>";

            $recaptchaStatus = 0;
            $getSettings = $this->saas_model->getSettings('captcha_status');
            if ($getSettings->captcha_status == 1) {
                $recaptchaStatus = $getSettings->captcha_status;
            }
            echo json_encode(['html' => $html, 'recaptcha' => $recaptchaStatus]);
        }
    }

    public function purchase_complete($reference_no = '')
    {
        if (!empty($reference_no)) {
            $schoolRegDetails = $this->saas_model->getSchoolRegDetails($reference_no);
            if (empty($schoolRegDetails['id'])) {
                set_alert('error', "This pages was not found.");
                redirect($_SERVER['HTTP_REFERER']);
            }
            $this->data['schoolRegDetails'] = $schoolRegDetails;
            $this->load->view('saas_website/purchase_complete', $this->data);
        }
    }

    public function invoicePDFDownload($reference_no = '')
    {
        if (!empty($reference_no)) {
            $schoolRegDetails = $this->saas_model->getSchoolRegDetails($reference_no);
            if (empty($schoolRegDetails['id'])) {
                set_alert('error', "This pages was not found.");
                redirect($_SERVER['HTTP_REFERER']);
            }

            $this->data['schoolRegDetails'] = $schoolRegDetails;
            $html = $this->load->view('saas_website/pdfPrint', $this->data, true);
            $pdfFilePath = "invoice_$reference_no.pdf";
            $this->load->library('html2pdf');
            $this->html2pdf->mpdf->WriteHTML($html);
            $this->html2pdf->mpdf->Output($pdfFilePath, "D");
        }
    }

    public function getTermsConditions()
    {
        $getSettings = $this->saas_model->getSettings();
        echo "<p>" . nl2br($getSettings->terms_and_conditions) . "</p>";
    }

    public function send_email()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
            if ($this->form_validation->run() == true) {
                $getSettings = $this->saas_model->getSettings();
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                $msg = '<h3>Sender Information</h3>';
                $msg .= '<br><br><b>Name: </b> ' . $name;
                $msg .= '<br><br><b>Email: </b> ' . $email;
                $msg .= '<br><br><b>Phone: </b> ' . $mobile;
                $msg .= '<br><br><b>Subject: </b> ' . $subject;
                $msg .= '<br><br><b>Message: </b> ' . $message;
                $data = array(
                    'branch_id' => 9999,
                    'recipient' => $getSettings->receive_contact_email,
                    'subject' => 'Contact Form Email',
                    'message' => $msg,
                );
                if ($this->mailer->send($data)) {
                    $this->session->set_flashdata('msg_success', 'Message Successfully Sent. We will contact you shortly.');
                } else {
                    $this->session->set_flashdata('msg_error', $this->email->print_debugger());
                }
                $array = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }
}