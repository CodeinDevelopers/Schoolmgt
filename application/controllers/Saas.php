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

class Saas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('saas_model');
        $this->load->model('saas_email_model');
        if (!is_superadmin_loggedin()) {
            access_denied();
        }
    }

    public function index()
    {
        redirect(base_url('saas/package'));
    }

    /* package form validation rules */
    protected function package_validation()
    {
        $this->form_validation->set_rules('name', translate('name'), 'trim|required');
        if ($this->input->post('free_trial') != 1) {
            $this->form_validation->set_rules('price', translate('price'), 'trim|required|numeric');
            $this->form_validation->set_rules('discount', translate('discount'), 'trim|numeric|less_than[' . $this->input->post('price') . ']');
        }
        $this->form_validation->set_rules('student_limit', translate('student') . " " . translate('limit'), 'trim|required|numeric');
        $this->form_validation->set_rules('parents_limit', translate('parents') . " " . translate('limit'), 'trim|required|numeric');
        $this->form_validation->set_rules('staff_limit', translate('staff') . " " . translate('limit'), 'trim|required|numeric');
        $this->form_validation->set_rules('teacher_limit', translate('teacher') . " " . translate('limit'), 'trim|required|numeric');
        $this->form_validation->set_rules('period_type', "Subscription Period", 'trim|required|numeric');
        $periodType = $this->input->post('period_type');
        if ($periodType != '' && $periodType != 1) {
            $this->form_validation->set_rules('period_value', translate('period'), 'trim|required|numeric|greater_than[0]');
        }
    }

    public function package()
    {
        $this->data['arrayPeriod'] = $this->saas_model->getPeriodType();
        $this->data['packageList'] = $this->saas_model->getPackageList();
        $this->data['branch_id'] = $this->application_model->get_branch_id();
        $this->data['title'] = translate('subscription');
        $this->data['sub_page'] = 'saas/package';
        $this->data['main_menu'] = 'saas';
        $this->load->view('layout/index', $this->data);
    }

    public function package_edit($id = '')
    {
        if ($_POST) {
            $this->package_validation();
            if ($this->form_validation->run() !== false) {
                // save information in the database file
                $this->saas_model->packageSave($this->input->post());
                set_alert('success', translate('information_has_been_saved_successfully'));
                $array = array('status' => 'success', 'url' => base_url('saas/package'));
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }
        $this->data['row'] = $this->app_lib->get_table('saas_package', $id, true);
        $this->data['arrayPeriod'] = $this->saas_model->getPeriodType();
        $this->data['title'] = translate('subscription');
        $this->data['sub_page'] = 'saas/package_edit';
        $this->data['main_menu'] = 'saas';
        $this->load->view('layout/index', $this->data);
    }

    public function package_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saas_package');
    }

    public function package_save()
    {
        if ($_POST) {
            $this->package_validation();
            if ($this->form_validation->run() !== false) {
                // SAVE INFORMATION IN THE DATABASE FILE
                $this->saas_model->packageSave($this->input->post());
                set_alert('success', translate('information_has_been_saved_successfully'));
                $array = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    /* school form validation rules */
    protected function school_validation()
    {
        $this->form_validation->set_rules('branch_name', translate('branch_name'), 'required|callback_unique_name');
        $this->form_validation->set_rules('school_name', translate('school_name'), 'required');
        $this->form_validation->set_rules('email', translate('email'), 'required|valid_email');
        $this->form_validation->set_rules('mobileno', translate('mobile_no'), 'required');
        $this->form_validation->set_rules('currency', translate('currency'), 'required');
        $this->form_validation->set_rules('currency_symbol', translate('currency_symbol'), 'required');
        $this->form_validation->set_rules('saas_package_id', translate('package'), 'required');
        $this->form_validation->set_rules('state_id', translate('state'), 'required');
    }

    /* school all data are prepared and stored in the database here */
    public function school()
    {
        if ($this->input->post('submit') == 'save') {
            $this->school_validation();
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                $schooolID = $this->saas_model->schoolSave($post);
                //Saas data are prepared and stored in the database
                $this->saas_model->saveSchoolSaasData($post['saas_package_id'], $schooolID);

                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('saas/school'));
            } else {
                $this->data['validation_error'] = true;
            }
        }
        $type = $this->input->get('type');
        $type = empty($type) ? '' : urldecode($type);
        $this->data['type'] = $type;
        $this->data['subscriptionList'] = $this->saas_model->getSubscriptionList($type);
        $this->data['title'] = translate('school') . " " . translate('subscription');
        $this->data['sub_page'] = 'saas/school';
        $this->data['main_menu'] = 'saas';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    public function enabled_school($school_id='')
    {
        $school = $this->saas_model->getSingle('branch', $school_id, true);
        $isEnabled = $this->saas_model->getSchool($school_id);
        if (!empty($isEnabled)) {
            set_alert('error', "This is not acceptable.");
            redirect(base_url('branch'));
        }
        if (empty($school)) {
            redirect(base_url('branch'));
        }
        if ($this->input->post('submit') == 'save') {
            $this->form_validation->set_rules('saas_package_id', translate('package'), 'required');
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                $schooolID = $post['branch_id'];
                //Saas data are prepared and stored in the database
                $this->saas_model->saveSchoolSaasData($post['saas_package_id'], $schooolID);

                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('saas/school'));
            } else {
                $this->data['validation_error'] = true;
            }
        }
        
        $this->data['school'] = $this->saas_model->getSingle('branch', $school_id, true);
        $this->data['title'] = translate('school') . " " . translate('subscription');
        $this->data['sub_page'] = 'saas/enabled_subscription';
        $this->data['main_menu'] = 'branch';
        $this->load->view('layout/index', $this->data);
    }

    public function pending_request()
    {
        if (isset($_POST['search'])) {
            $daterange = explode(' - ', $this->input->post('daterange'));
            $start = date("Y-m-d", strtotime($daterange[0]));
            $end = date("Y-m-d", strtotime($daterange[1]));
            $this->data['getPendingRequest'] = $this->saas_model->getPendingRequest($start, $end);
        } else {
            $this->data['getPendingRequest'] = $this->saas_model->getPendingRequest();
        }

        $this->data['title'] = translate('school') . " " . translate('subscription');
        $this->data['sub_page'] = 'saas/pending_request';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/daterangepicker/daterangepicker.css',
            ),
            'js' => array(
                'vendor/moment/moment.js',
                'vendor/daterangepicker/daterangepicker.js',
            ),
        );
        $this->data['main_menu'] = 'saas';
        $this->load->view('layout/index', $this->data);
    }

    public function school_edit($id = '')
    {
        $getSchool = $this->saas_model->getSchool($id);
        if (empty($getSchool)) {
            redirect(base_url('dashboard'));
        }
        $current_PackageID = $getSchool->package_id;
        if ($this->input->post('submit') == 'save') {
            $this->school_validation();
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                $schooolID = $this->saas_model->schoolSave($post);

                $dateAdd = $this->input->post('expire_date');
                $getSubscriptions = $this->db->where('school_id', $schooolID)->get('saas_subscriptions')->row();
                //add subscriptions data stored in the database
                $arraySubscriptions = array(
                    'package_id' => $post['saas_package_id'],
                    'school_id' => $schooolID,
                    'expire_date' => $dateAdd,
                );
                $this->db->where('id', $getSubscriptions->id);
                $this->db->update('saas_subscriptions', $arraySubscriptions);

                if ($current_PackageID != $post['saas_package_id']) {
                    $subscriptionsID = $getSubscriptions->id;
                    $saasPackage = $this->db->where('id', $post['saas_package_id'])->get('saas_package')->row();

                    //manage modules permission
                    $permission = json_decode($saasPackage->permission, true);
                    $modules_manage_insert = array();
                    $modules_manage_update = array();
                    $getPermissions = $this->db->where('in_module', 1)->get('permission_modules')->result();
                    foreach ($getPermissions as $key => $value) {
                        $get_existPermissions = $this->db->where(array('modules_id' => $value->id, 'branch_id' => $schooolID))->get('modules_manage');
                        if (in_array($value->id, $permission)) {
                            if ($get_existPermissions->num_rows() > 0) {
                                $modules_manage_update[] = ['id' => $get_existPermissions->row()->id, 'modules_id' => $value->id, 'isEnabled' => 1, 'branch_id' => $schooolID];
                            } else {
                                $modules_manage_insert[] = ['modules_id' => $value->id, 'isEnabled' => 1, 'branch_id' => $schooolID];
                            }
                        } else {
                            if ($get_existPermissions->num_rows() > 0) {
                                $modules_manage_update[] = ['id' => $get_existPermissions->row()->id, 'modules_id' => $value->id, 'isEnabled' => 0, 'branch_id' => $schooolID];
                            } else {
                                $modules_manage_insert[] = ['modules_id' => $value->id, 'isEnabled' => 0, 'branch_id' => $schooolID];
                            }
                        }
                    }
                    if (!empty($modules_manage_update)) {
                        $this->db->update_batch('modules_manage', $modules_manage_update, 'id');
                    }
                    if (!empty($modules_manage_insert)) {
                        $this->db->insert_batch('modules_manage', $modules_manage_insert);
                    }
                }
                set_alert('success', translate('information_has_been_updated_successfully'));
                redirect(base_url('saas/school'));
            }
        }

        $this->data['data'] = $getSchool;
        $this->data['title'] = translate('school') . " " . translate('subscription');
        $this->data['sub_page'] = 'saas/school_edit';
        $this->data['main_menu'] = 'saas';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    /* unique valid branch name verification is done here */
    public function unique_name($name)
    {
        $branch_id = $this->input->post('branch_id');
        if (!empty($branch_id)) {
            $this->db->where_not_in('id', $branch_id);
        }
        $this->db->where('name', $name);
        $name = $this->db->get('branch')->num_rows();
        if ($name == 0) {
            return true;
        } else {
            $this->form_validation->set_message("unique_name", translate('already_taken'));
            return false;
        }
    }

    /* delete information */
    public function school_delete($id = '')
    {
        $this->db->where('id', $id)->delete('branch');
        $this->db->where('branch_id', $id)->delete('modules_manage');

        //delete branch all staff
        $result = $this->db->select('id')->where('branch_id', $id)->get('staff')->result();
        foreach ($result as $key => $value) {
            $this->db->where('user_id', $value->id);
            $this->db->delete('login_credential');

            $this->db->where('id', $value->id);
            $this->db->delete('staff');
        }

        //delete branch all student
        $result = $this->db->select('id,student_id')->where('branch_id', $id)->get('enroll')->result();
        foreach ($result as $key => $value) {
            $this->db->where('id', $value->student_id);
            $this->db->delete('student');

            $this->db->where('id', $value->id);
            $this->db->delete('enroll');
        }

        //delete branch all parent
        $this->db->where('branch_id', $id);
        $this->db->delete('parent');

        $getSubscriptions = $this->db->where('school_id', $id)->get('saas_subscriptions')->row();
        if (!empty($getSubscriptions)) {
            $this->db->where('school_id', $id);
            $this->db->delete('saas_subscriptions');
            $this->db->where('subscriptions_id', $getSubscriptions->id);
            $this->db->delete('saas_subscriptions_transactions');
        }

        $unlink_path = 'uploads/app_image/';
        if (file_exists($unlink_path . "logo-$id.png")) {
            @unlink($unlink_path . "logo-$id.png");
        }
        if (file_exists($unlink_path . "logo-small-$id.png")) {
            @unlink($unlink_path . "logo-small-$id.png");
        }
        if (file_exists($unlink_path . "printing-logo-$id.png")) {
            @unlink($unlink_path . "printing-logo-$id.png");
        }
        if (file_exists($unlink_path . "report-card-logo-$id.png")) {
            @unlink($unlink_path . "report-card-logo-$id.png");
        }
    }

    public function ajaxGetExpireDate()
    {
        if ($_POST) {
            $packageID = $this->input->post('id');
            if (empty($packageID)) {
                echo "";
            } else {
                $saasPackage = $this->db->select('period_value,period_type')->where('id', $packageID)->get('saas_package')->row();
                $periodValue = $saasPackage->period_value;
                $dateAdd = '';
                if ($saasPackage->period_type == 2) {
                    $dateAdd = "+$periodValue days";
                }
                if ($saasPackage->period_type == 3) {
                    $dateAdd = "+$periodValue month";
                }
                if ($saasPackage->period_type == 4) {
                    $dateAdd = "+$periodValue year";
                }
                if (!empty($dateAdd)) {
                    $dateAdd = date('Y-m-d', strtotime($dateAdd));
                }
                echo $dateAdd;
            }
        }
    }

    public function school_details($id = '')
    {
        $school = $this->saas_model->getSchool($id);
        $this->data['school'] = $school;
        $this->data['schoolID'] = $id;
        $this->data['title'] = translate('school') . " " . translate('subscription');
        $this->data['sub_page'] = 'saas/school_details';
        $this->data['main_menu'] = 'saas';
        $this->load->view('layout/index', $this->data);
    }

    public function settings_general()
    {
        if ($_POST) {
            $expired_alert = $this->input->post('expired_alert');
            $captcha_status = $this->input->post('captcha_status');
            if ($expired_alert == 1) {
                $this->form_validation->set_rules('expired_alert_days', translate('expired_alert_days'), 'trim|required|numeric');
                $this->form_validation->set_rules('expired_reminder_message', translate('expired_reminder_message'), 'trim|required');
                $this->form_validation->set_rules('expired_message', translate('expired_message'), 'trim|required');
            }
            $this->form_validation->set_rules('expired_alert', translate('expired_alert'), 'trim');
            $this->form_validation->set_rules('seo_title', translate('site') . " " . translate('title'), 'trim|required');
            if ($captcha_status == 1) {
                $this->form_validation->set_rules('recaptcha_site_key', translate('recaptcha_site_key'), 'trim|required');
                $this->form_validation->set_rules('recaptcha_secret_key', translate('recaptcha_secret_key'), 'trim|required');
            }
            
            if ($this->form_validation->run() == true) {
                if ($expired_alert == 1) {
                    $arraySetting = array(
                        'expired_alert' => 1, 
                        'expired_alert_days' => $this->input->post('expired_alert_days'), 
                        'expired_alert_message' => $this->input->post('expired_reminder_message'), 
                        'expired_message' => $this->input->post('expired_message'), 
                    );
                } else {
                    $arraySetting = array(
                        'expired_alert' => 0, 
                    );
                }

                $arraySetting['seo_title'] = $this->input->post('seo_title');
                $arraySetting['seo_keyword'] = $this->input->post('seo_keyword');
                $arraySetting['seo_description'] = $this->input->post('seo_description');
                $arraySetting['google_analytics'] = $this->input->post('google_analytics', false);

                $arraySetting['automatic_approval'] = $this->input->post('automatic_approval');
                $arraySetting['offline_payments'] = $this->input->post('offline_payments');

                $arraySetting['captcha_status'] = $captcha_status;
                $arraySetting['recaptcha_site_key'] = $this->input->post('recaptcha_site_key');
                $arraySetting['recaptcha_secret_key'] = $this->input->post('recaptcha_secret_key');

                $this->db->where('id', 1);
                $this->db->update('saas_settings', $arraySetting);
                $message = translate('the_configuration_has_been_updated');
                set_alert('success', $message);
                $array = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->data['config'] = $this->db->where('id', 1)->get('saas_settings')->row_array();
        $this->data['title'] = translate('school_settings');
        $this->data['sub_page'] = 'saas/general_settings';
        $this->data['main_menu'] = 'saas_setting';
        $this->load->view('layout/index', $this->data);
    }

    public function settings_payment()
    {
        $this->data['config'] = $this->saas_model->get('payment_config', array('branch_id' => 9999), true);
        $this->data['sub_page'] = 'saas/payment_gateway';
        $this->data['main_menu'] = 'saas_setting';
        $this->data['title'] = translate('payment_control');
        $this->load->view('layout/index', $this->data);
    }

    public function savePaymentConfig()
    {
        if ($_POST) {
            $post = $this->input->post();
            $postData = [];
            foreach ($post as $key => $value) {
                $name = ucwords(str_replace('_', ' ', $key));
                $this->form_validation->set_rules($key, $name, 'trim|required');
                if ($key == 'stripe_publishiable_key') {
                    $key = 'stripe_publishiable';
                }
                $postData[$key] = $value;
            }
            if (!empty($postData['sandbox'])) {
                $value = $postData['sandbox'];
                $postData[$value] = (isset($postData[$value]) ? 1 : 0);
                unset($postData['sandbox']);
            }
            if ($this->form_validation->run() !== false) {
                $this->db->select("id");
                $this->db->where('branch_id', 9999);
                $q = $this->db->get('payment_config');
                if ($q->num_rows() == 0) {
                    $postData['branch_id'] = 9999;
                    $this->db->insert('payment_config', $postData);
                } else {
                    $this->db->where('branch_id', 9999);
                    $this->db->update('payment_config', $postData);
                }

                $message = translate('the_configuration_has_been_updated');
                $array = array('status' => 'success', 'message' => $message);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function payment_active()
    {
        $paypal_status = isset($_POST['paypal_status']) ? 1 : 0;
        $stripe_status = isset($_POST['stripe_status']) ? 1 : 0;
        $payumoney_status = isset($_POST['payumoney_status']) ? 1 : 0;
        $paystack_status = isset($_POST['paystack_status']) ? 1 : 0;
        $razorpay_status = isset($_POST['razorpay_status']) ? 1 : 0;
        $midtrans_status = isset($_POST['midtrans_status']) ? 1 : 0;
        $sslcommerz_status = isset($_POST['sslcommerz_status']) ? 1 : 0;
        $jazzcash_status = isset($_POST['jazzcash_status']) ? 1 : 0;
        $flutterwave_status = isset($_POST['flutterwave']) ? 1 : 0;
        $paytm_status = isset($_POST['paytm_status']) ? 1 : 0;
        $toyyibpay_status = isset($_POST['toyyibpay_status']) ? 1 : 0;
        $payhere_status = isset($_POST['payhere_status']) ? 1 : 0;
        $arrayData = array(
            'paypal_status' => $paypal_status,
            'stripe_status' => $stripe_status,
            'payumoney_status' => $payumoney_status,
            'paystack_status' => $paystack_status,
            'razorpay_status' => $razorpay_status,
            'midtrans_status' => $midtrans_status,
            'sslcommerz_status' => $sslcommerz_status,
            'jazzcash_status' => $jazzcash_status,
            'flutterwave_status' => $flutterwave_status,
            'paytm_status' => $paytm_status,
            'toyyibpay_status' => $toyyibpay_status,
            'payhere_status' => $payhere_status,
        );

        $this->db->select('id');
        $this->db->where('branch_id', 9999);
        $q = $this->db->get('payment_config');
        if ($q->num_rows() == 0) {
            $arrayData['branch_id'] = 9999;
            $this->db->insert('payment_config', $arrayData);
        } else {
            $this->db->where('id', $q->row()->id);
            $this->db->update('payment_config', $arrayData);
        }
        $message = translate('the_configuration_has_been_updated');
        $array = array('status' => 'success', 'message' => $message);
        echo json_encode($array);
    }

    public function website_settings()
    {
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
                'vendor/jquery-asColorPicker-master/css/asColorPicker.css',
            ),
            'js' => array(
                'vendor/dropify/js/dropify.min.js',
                'vendor/jquery-asColorPicker-master/libs/jquery-asColor.js',
                'vendor/jquery-asColorPicker-master/libs/jquery-asGradient.js',
                'vendor/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js',
            ),
        );
        $this->data['config'] = $this->saas_model->get('saas_settings', array('id' => 1), true);
        $this->data['sub_page'] = 'saas/website_settings';
        $this->data['main_menu'] = 'saas_setting';
        $this->data['title'] = translate('website_settings');
        $this->load->view('layout/index', $this->data);
    }

    /* saas website settings stored in the database here */
    public function websiteSettingsSave()
    {
        if ($_POST) {
            $ignoreArray = ['facebook_url', 'twitter_url', 'linkedin_url', 'instagram_url', 'youtube_url', 'google_plus', 'old_payment_logo', 'old_slider_image', 'old_overly_image', 'terms_and_conditions', 'agree_checkbox_text', 'overly_image_status', 'old_slider_bg_image', 'button_text_1', 'button_url_1', 'button_text_2', 'button_url_2'];
            foreach ($this->input->post() as $input => $value) {
                if (in_array($input, $ignoreArray)) {
                    continue;
                }
                $this->form_validation->set_rules($input, ucwords(str_replace('_', ' ', $input)), 'trim|required');
            }
            $this->form_validation->set_rules('payment_logo', "Payment Logo", 'callback_photoHandleUpload[payment_logo]');
            $this->form_validation->set_rules('slider_image', "Photo", 'callback_photoHandleUpload[slider_image]');
            $this->form_validation->set_rules('slider_bg_image', "Slider Background Image", 'callback_photoHandleUpload[slider_bg_image]');
            $this->form_validation->set_rules('overly_image', "Overly Image", 'callback_photoHandleUpload[overly_image]');
            if ($this->input->post('terms_status') == 1) {
                $this->form_validation->set_rules('agree_checkbox_text', "Agree Checkbox Text", 'trim|required');
                $this->form_validation->set_rules('terms_and_conditions', "Terms And Conditions Text", 'trim|required');
            }
            if ($this->form_validation->run() == true) {

                $inputData = [];
                array_push($ignoreArray, 'footer_text');
                foreach ($this->input->post() as $input => $value) {
                    if (in_array($input, $ignoreArray)) {
                        continue;
                    }
                    $inputData[$input] = $value;
                }

                //upload slider background images
                $slider_bg_image = $this->input->post('old_slider_bg_image');
                if (isset($_FILES["slider_bg_image"]) && $_FILES['slider_bg_image']['name'] != '' && (!empty($_FILES['slider_bg_image']['name']))) {
                    $slider_bg_image = $this->saas_model->fileupload("slider_bg_image", "./assets/frontend/images/saas/", $slider_bg_image);
                }
                $inputData['slider_bg_image'] = $slider_bg_image;

                //upload slider images
                $slider_imag_file = $this->input->post('old_slider_image');
                if (isset($_FILES["slider_image"]) && $_FILES['slider_image']['name'] != '' && (!empty($_FILES['slider_image']['name']))) {
                    $slider_imag_file = $this->saas_model->fileupload("slider_image", "./assets/frontend/images/saas/", $slider_imag_file);
                }
                $inputData['slider_image'] = $slider_imag_file;

                //upload footer payment logo images
                $payment_logo_file = $this->input->post('old_payment_logo');
                if (isset($_FILES["payment_logo"]) && $_FILES['payment_logo']['name'] != '' && (!empty($_FILES['payment_logo']['name']))) {
                    $payment_logo_file = $this->saas_model->fileupload("payment_logo", "./assets/frontend/images/saas/", $payment_logo_file);
                }
                $inputData['payment_logo'] = $payment_logo_file;

                //upload overly images
                $overly_image_file = $this->input->post('old_overly_image');
                if (isset($_FILES["overly_image"]) && $_FILES['overly_image']['name'] != '' && (!empty($_FILES['overly_image']['name']))) {
                    $overly_image_file = $this->saas_model->fileupload("overly_image", "./assets/frontend/images/saas/", $overly_image_file);
                }
                $inputData['overly_image'] = $overly_image_file;

                $inputData['overly_image_status'] = isset($_POST['overly_image_status']) ? 1 : 0;
                $inputData['agree_checkbox_text'] = $this->input->post('agree_checkbox_text', false);
                $inputData['terms_and_conditions'] = $this->input->post('terms_and_conditions', false);
                
                //slider button data
                $inputData['button_text_1'] = $this->input->post('button_text_1');
                $inputData['button_url_1'] = $this->input->post('button_url_1');
                $inputData['button_text_2'] = $this->input->post('button_text_2');
                $inputData['button_url_2'] = $this->input->post('button_url_2');

                $this->db->where('id', 1);
                $this->db->update('saas_settings', $inputData);

                $updateGlobalConfig = [];
                $updateGlobalConfig['facebook_url'] = $this->input->post('facebook_url');
                $updateGlobalConfig['twitter_url'] = $this->input->post('twitter_url');
                $updateGlobalConfig['linkedin_url'] = $this->input->post('linkedin_url');
                $updateGlobalConfig['instagram_url'] = $this->input->post('instagram_url');
                $updateGlobalConfig['youtube_url'] = $this->input->post('youtube_url');
                $updateGlobalConfig['google_plus_url'] = $this->input->post('google_plus');
                $updateGlobalConfig['footer_text'] = $this->input->post('footer_text');

                $this->db->where('id', 1);
                $this->db->update('global_settings', $updateGlobalConfig);

                set_alert('success', translate('the_configuration_has_been_updated'));
                $array = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function emailconfig()
    {
        if ($this->input->post('submit') == 'update') {
            $data = array();
            foreach ($this->input->post() as $key => $value) {
                if ($key == 'submit') {
                    continue;
                }
                $data[$key] = $value;
            }
            $this->db->where('id', 1);
            $this->db->update('email_config', $data);
            set_alert('success', translate('the_configuration_has_been_updated'));
            redirect(base_url('mailconfig/email'));
        }
        $this->data['config'] = $this->saas_model->get('email_config', array('branch_id' => 9999), true);
        $this->data['title'] = translate('email_settings');
        $this->data['sub_page'] = 'saas/emailconfig';
        $this->data['main_menu'] = 'saas_setting';
        $this->load->view('layout/index', $this->data);
    }

    public function emailtemplate()
    {
        $this->data['branch_id'] = 9999;
        $this->data['templatelist'] = $this->app_lib->get_table('saas_email_templates');
        $this->data['title'] = translate('email_settings');
        $this->data['sub_page'] = 'saas/emailtemplate';
        $this->data['main_menu'] = 'saas_setting';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/summernote/summernote.css',
            ),
            'js' => array(
                'vendor/summernote/summernote.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    public function saveEmailConfig()
    {
        $branchID = 9999;
        $protocol = $this->input->post('protocol');
        $this->form_validation->set_rules('email', 'System Email', 'trim|required');
        $this->form_validation->set_rules('protocol', 'Email Protocol', 'trim|required');
        if ($protocol == 'smtp') {
            $this->form_validation->set_rules('smtp_host', 'SMTP Host', 'trim|required');
            $this->form_validation->set_rules('smtp_user', 'SMTP Username', 'trim|required');
            $this->form_validation->set_rules('smtp_pass', 'SMTP Password', 'trim|required');
            $this->form_validation->set_rules('smtp_port', 'SMTP Port', 'trim|required');
            $this->form_validation->set_rules('smtp_encryption', 'Email Encryption', 'trim|required');
        }
        if ($this->form_validation->run() !== false) {
            $arrayConfig = array(
                'email' => $this->input->post('email'),
                'protocol' => $protocol,
                'branch_id' => $branchID,
            );
            if ($protocol == 'smtp') {
                $arrayConfig['smtp_host'] = $this->input->post("smtp_host");
                $arrayConfig['smtp_user'] = $this->input->post("smtp_user");
                $arrayConfig['smtp_pass'] = $this->input->post("smtp_pass");
                $arrayConfig['smtp_port'] = $this->input->post("smtp_port");
                $arrayConfig['smtp_auth'] = $this->input->post("smtp_auth");
                $arrayConfig['smtp_encryption'] = $this->input->post("smtp_encryption");
            }
            $this->db->where('branch_id', $branchID);
            $q = $this->db->get('email_config');
            if ($q->num_rows() == 0) {
                $this->db->insert('email_config', $arrayConfig);
            } else {
                $this->db->where('id', $q->row()->id);
                $this->db->update('email_config', $arrayConfig);
            }
            $message = translate('the_configuration_has_been_updated');
            $array = array('status' => 'success', 'message' => $message);
        } else {
            $error = $this->form_validation->error_array();
            $array = array('status' => 'fail', 'error' => $error);
        }
        echo json_encode($array);
    }

    public function emailTemplateSave()
    {
        $this->form_validation->set_rules('subject', translate('subject'), 'required');
        $this->form_validation->set_rules('template_body', translate('body'), 'required');
        if ($this->form_validation->run() !== false) {
            $notified = isset($_POST['notify_enable']) ? 1 : 0;
            $templateID = $this->input->post('template_id');
            $arrayTemplate = array(
                'subject' => $this->input->post('subject'),
                'template_body' => $this->input->post('template_body'),
                'notified' => $notified,
            );

            $this->db->where('id', $templateID);
            $q = $this->db->get('saas_email_templates');
            if ($q->num_rows() == 0) {
                $this->db->insert('saas_email_templates', $arrayTemplate);
            } else {
                $this->db->where('id', $q->row()->id);
                $this->db->update('saas_email_templates', $arrayTemplate);
            }
            $message = translate('the_configuration_has_been_updated');
            $array = array('status' => 'success', 'message' => $message);
        } else {
            $error = $this->form_validation->error_array();
            $array = array('status' => 'fail', 'error' => $error);
        }
        echo json_encode($array);
    }

    public function school_approved($id = '')
    {
        $getSchool = $this->saas_model->getPendingSchool($id);
        if (empty($getSchool)) {
            redirect(base_url('dashboard'));
        }
        $this->data['data'] = $getSchool;
        $this->data['title'] = translate('school') . " " . translate('subscription');
        $this->data['sub_page'] = 'saas/school_approved';
        $this->data['main_menu'] = 'saas';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    public function schoolApprovedSave()
    {
        if ($_POST) {
            $saas_register_id = $this->input->post('saas_register_id');
            $getSchool = $this->saas_model->getPendingSchool($saas_register_id);
            if (empty($getSchool)) {
                ajax_access_denied();
            }
            $current_PackageID = $getSchool->package_id;
            $this->form_validation->set_rules('school_name', translate('school_name'), 'required');
            $this->form_validation->set_rules('email', translate('email'), 'required|valid_email');
            $this->form_validation->set_rules('mobileno', translate('mobile_no'), 'required');
            $this->form_validation->set_rules('currency', translate('currency'), 'required');
            $this->form_validation->set_rules('currency_symbol', translate('currency_symbol'), 'required');
            if ($this->form_validation->run() == true) {

                //update status
                $this->db->where('id', $saas_register_id)->update('saas_school_register', ['status' => 1, 'date_of_approval' => date('Y-m-d H:i:s')]);

                //stored in branch table
                $arrayBranch = array(
                    'name' => $this->input->post('school_name'),
                    'school_name' => $this->input->post('school_name'),
                    'email' => $this->input->post('email'),
                    'mobileno' => $this->input->post('mobileno'),
                    'currency' => $this->input->post('currency'),
                    'symbol' => $this->input->post('currency_symbol'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'address' => $this->input->post('address'),
                    'status' => 1,
                );
                $this->db->insert('branch', $arrayBranch);
                $schooolID = $this->db->insert_id();

                $inser_data1 = array(
                    'branch_id' => $schooolID,
                    'name' => $getSchool->admin_name,
                    'sex' => ($getSchool->gender = 1 ? 'male' : 'female'),
                    'mobileno' => $getSchool->contact_number,
                    'joining_date' => date("Y-m-d"),
                    'email' => $getSchool->email,
                );
                $inser_data2 = array(
                    'username' => $getSchool->username,
                    'role' => 2,
                );

                //random staff id generate
                $inser_data1['staff_id'] = substr(app_generate_hash(), 3, 7);
                //save employee information in the database
                $this->db->insert('staff', $inser_data1);
                $staffID = $this->db->insert_id();

                //save employee login credential information in the database
                $inser_data2['active'] = 1;
                $inser_data2['user_id'] = $staffID;
                $inser_data2['password'] = $this->app_lib->pass_hashed($getSchool->password);
                $this->db->insert('login_credential', $inser_data2);

                //school logo uploaded
                if (isset($_FILES["text_logo"]) && !empty($_FILES['text_logo']['name'])) {
                    $fileInfo = pathinfo($_FILES["text_logo"]["name"]);
                    $img_name = $schooolID . '.' . $fileInfo['extension'];
                    move_uploaded_file($_FILES["text_logo"]["tmp_name"], "uploads/app_image/logo-small-" . $img_name);
                    $file_upload = true;
                } else {
                    if (!empty($getSchool->logo)) {
                        copy('./uploads/saas_school_logo/' . $getSchool->logo, "./uploads/app_image/logo-small-$schooolID.png");
                    }
                }

                $paymentData = [];
                if ($getSchool->payment_status == 1) {
                    if (!empty($getSchool->payment_data)) {
                        $paymentData = json_decode($getSchool->payment_data, TRUE) ;
                        $paymentData['payment_method'] = $paymentData['payment_method'];
                        $paymentData['txn_id'] = $paymentData['txn_id'];
                    }
                }

                //saas data are prepared and stored in the database
                $this->saas_model->saveSchoolSaasData($current_PackageID, $schooolID, $paymentData);

                // send email subscription approval confirmation
                $arrayData['email'] = $getSchool->email;
                $arrayData['package_id'] = $getSchool->package_id;
                $arrayData['admin_name'] = $getSchool->admin_name;
                $arrayData['reference_no'] = $getSchool->reference_no;
                $arrayData['school_name'] = $getSchool->school_name;
                $arrayData['login_username'] = $getSchool->username;
                $arrayData['password'] = $getSchool->password;
                $arrayData['subscription_start_date'] = _d(date("Y-m-d"));
                $arrayData['invoice_url'] = base_url('subscription_review/' . $arrayData['reference_no']);
                $this->saas_email_model->sentSubscriptionApprovalConfirmation($arrayData);

                set_alert('success', translate('information_has_been_updated_successfully'));
                $array = array('status' => 'success', 'url' => base_url('saas/pending_request'));
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function getRejectsDetails()
    {
        if ($_POST) {
            $this->data['school_id'] = $this->input->post('id');
            $this->load->view('saas/getRejectsDetails_modal', $this->data);
        }
    }

    public function reject()
    {
        if ($_POST) {
            $schoolID = $this->input->post('school_id');
            $comments = $this->input->post('comments');
            //update status
            $this->db->where('id', $schoolID)->update('saas_school_register', ['status' => 2,'comments' => $comments,'date_of_approval' => date('Y-m-d H:i:s')]);
            
            // send email subscription reject
            $getSchool = $this->saas_model->getPendingSchool($schoolID);
            $arrayData['email'] = $getSchool->email;
            $arrayData['admin_name'] = $getSchool->admin_name;
            $arrayData['reference_no'] = $getSchool->reference_no;
            $arrayData['school_name'] = $getSchool->school_name;
            $arrayData['reject_reason'] = $comments;
            $this->saas_email_model->sentSchoolSubscriptionReject($arrayData);

            set_alert('success', translate('information_has_been_updated_successfully'));
            $array = array('status' => 'success');
            echo json_encode($array);
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $logo = $this->db->select('logo')->where('id', $id)->get('saas_school_register')->row()->logo;
            $this->db->where('id', $id);
            $this->db->delete('saas_school_register');
            if ($this->db->affected_rows() > 0) {
                if (!empty($logo)) {
                    $exist_file_path = FCPATH . 'uploads/saas_school_logo/' . $logo;
                    if (file_exists($exist_file_path)) {
                        unlink($exist_file_path);
                    }
                }
            }
        }
    }

    /* website FAQ manage script start */
    private function faq_validation()
    {
        $this->form_validation->set_rules('title', translate('title'), 'trim|required');
        $this->form_validation->set_rules('description', translate('description'), 'trim|required');
    }

    public function faqs()
    {
        if ($_POST) {
            $this->faq_validation();
            if ($this->form_validation->run() !== false) {
                // save information in the database file
                $this->saas_model->save_faq($this->input->post());
                set_alert('success', translate('information_has_been_saved_successfully'));
                $array = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/summernote/summernote.css',
            ),
            'js' => array(
                'vendor/summernote/summernote.js',
            ),
        );
        $this->data['faqlist'] = $this->db->get('saas_cms_faq_list')->result_array();
        $this->data['title'] = translate('subscription');
        $this->data['sub_page'] = 'saas/faq';
        $this->data['main_menu'] = 'saas_setting';
        $this->load->view('layout/index', $this->data);
    }

    public function faq_edit($id = '')
    {
        if ($_POST) {
            $this->faq_validation();
            if ($this->form_validation->run() !== false) {
                // save information in the database file
                $this->saas_model->save_faq($this->input->post());
                set_alert('success', translate('information_has_been_updated_successfully'));
                $url = base_url('saas/faqs');
                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }

        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/summernote/summernote.css',
            ),
            'js' => array(
                'vendor/summernote/summernote.js',
            ),
        );
        $this->data['faq'] = $this->db->where('id',$id)->get('saas_cms_faq_list')->row_array();
        $this->data['title'] = translate('subscription');
        $this->data['sub_page'] = 'saas/faq_edit';
        $this->data['main_menu'] = 'saas_setting';
        $this->load->view('layout/index', $this->data);
    }

    public function faq_delete($id = '')
    {
        $this->db->where(array('id' => $id))->delete("saas_cms_faq_list");
    }

    /* website features manage script start */
    private function features_validation()
    {
        $this->form_validation->set_rules('title', translate('title'), 'trim|required');
        $this->form_validation->set_rules('description', translate('description'), 'trim|required');
        $this->form_validation->set_rules('icon', translate('icon'), 'trim|required');
    }

    public function features()
    {
        if ($_POST) {
            $this->features_validation();
            if ($this->form_validation->run() !== false) {
                // save information in the database file
                $this->saas_model->save_features($this->input->post());
                set_alert('success', translate('information_has_been_saved_successfully'));
                $array = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }
        $this->data['faqlist'] = $this->db->get('saas_cms_features')->result_array();
        $this->data['title'] = translate('subscription');
        $this->data['sub_page'] = 'saas/features';
        $this->data['main_menu'] = 'saas_setting';
        $this->load->view('layout/index', $this->data);
    }

    public function features_edit($id = '')
    {
        if ($_POST) {
            $this->features_validation();
            if ($this->form_validation->run() !== false) {
                // save information in the database file
                $this->saas_model->save_features($this->input->post());
                set_alert('success', translate('information_has_been_updated_successfully'));
                $url = base_url('saas/features');
                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }
        $this->data['faq'] = $this->db->where('id',$id)->get('saas_cms_features')->row_array();
        $this->data['title'] = translate('subscription');
        $this->data['sub_page'] = 'saas/features_edit';
        $this->data['main_menu'] = 'saas_setting';
        $this->load->view('layout/index', $this->data);
    }

    public function features_delete($id = '')
    {
        $this->db->where(array('id' => $id))->delete("saas_cms_features");
    }

    public function transactions()
    {
        if (isset($_POST['search'])) {
            $daterange = explode(' - ', $this->input->post('daterange'));
            $start = date("Y-m-d", strtotime($daterange[0]));
            $end = date("Y-m-d", strtotime($daterange[1]));
            $this->data['getTransactions'] = $this->saas_model->getTransactions($start, $end);
        } 

        $this->data['title'] = translate('subscription') . " " . translate('transactions');
        $this->data['sub_page'] = 'saas/transactions';
        $this->data['main_menu'] = 'saas';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/daterangepicker/daterangepicker.css',
            ),
            'js' => array(
                'vendor/moment/moment.js',
                'vendor/daterangepicker/daterangepicker.js',
            ),
        ); 
        $this->load->view('layout/index', $this->data);
    }

    public function send_test_email()
    {
        if ($_POST) {
            $this->form_validation->set_rules('test_email', translate('email'), 'trim|required|valid_email');
            if ($this->form_validation->run() == true) {
                $branchID = 9999;
                $getConfig = $this->db->select('id')->get_where('email_config', array('branch_id' => $branchID))->row();
                if (empty($getConfig)) {
                    $this->session->set_flashdata('test-email-error', 'Email Configuration not found.');
                    $array = array('status' => 'success');
                    echo json_encode($array);
                    exit;
                }

                $recipient = $this->input->post('test_email');
                $this->load->library('mailer');
                $data = array();
                $data['branch_id'] = $branchID;
                $data['recipient'] = $recipient;
                $data['subject'] = 'Ramom School SMTP Config Testing';
                $data['message'] = 'This is test SMTP config email. <br />If you received this message that means that your SMTP settings is set correctly.';
                $r = $this->mailer->send($data, true);
                if ($r == "true") {
                    $this->session->set_flashdata('test-email-success', 1);
                } else {
                    $this->session->set_flashdata('test-email-error', 'Mailer Error: ' . $r);
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
