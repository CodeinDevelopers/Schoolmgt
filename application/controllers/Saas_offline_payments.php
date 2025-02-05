<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium (Saas)
 * @version : 3.0
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Saas_offline_payments.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

class Saas_offline_payments extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('saas_model');
        $this->load->model('saas_email_model');
        $this->load->model('saas_offline_payments_model');

        if (!is_superadmin_loggedin()) {
            access_denied();
        }
    }

    /* offline payments type form validation rules */
    protected function type_validation()
    {
        $this->form_validation->set_rules('type_name', translate('name'), 'trim|required|callback_unique_type');
        $this->form_validation->set_rules('note', translate('note'), 'trim');
    }

    /* offline payments type control */
    public function type()
    {
        if ($_POST) {
            $this->type_validation();
            if ($this->form_validation->run() !== false) {
                $post = $this->input->post();
                $this->saas_offline_payments_model->typeSave($post);
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
        $this->data['categorylist'] = $this->db->get('saas_offline_payment_types')->result_array();
        $this->data['title'] = translate('offline_payments') . " " . translate('type');
        $this->data['sub_page'] = 'saas_offline_payments/type';
        $this->data['main_menu'] = 'saas_offline_payments';
        $this->load->view('layout/index', $this->data);
    }

    public function type_edit($id = '')
    {
        if ($_POST) {
            $this->type_validation();
            if ($this->form_validation->run() !== false) {
                $post = $this->input->post();
                $this->saas_offline_payments_model->typeSave($post);
                set_alert('success', translate('information_has_been_updated_successfully'));
                $url = base_url('saas_offline_payments/type');
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
        $this->data['category'] = $this->db->where('id', $id)->get('saas_offline_payment_types')->row_array();
        $this->data['title'] = translate('offline_payments') . " " . translate('type');
        $this->data['sub_page'] = 'saas_offline_payments/type_edit';
        $this->data['main_menu'] = 'saas_offline_payments';
        $this->load->view('layout/index', $this->data);
    }

    public function type_delete($id = '')
    {
        $this->db->where('id', $id);
        $this->db->delete('saas_offline_payment_types');
    }

    public function unique_type($name)
    {
        $typeID = $this->input->post('type_id');
        if (!empty($typeID)) {
            $this->db->where_not_in('id', $typeID);
        }
        $this->db->where(array('name' => $name));
        $uniform_row = $this->db->get('saas_offline_payment_types')->num_rows();
        if ($uniform_row == 0) {
            return true;
        } else {
            $this->form_validation->set_message("unique_type", translate('already_taken'));
            return false;
        }
    }

    // get payments details modal
    public function getApprovelDetails()
    {
        $this->data['payments_id'] = $this->input->post('id');
        $this->load->view('saas_offline_payments/approvel_modalView', $this->data);
    }

    public function download($id = '', $file = '')
    {
        if (!empty($id) && !empty($file)) {
            $this->db->select('orig_file_name,enc_file_name');
            $this->db->where('id', $id);
            $payments = $this->db->get('saas_offline_payments')->row();
            if ($file != $payments->enc_file_name) {
                access_denied();
            }
            $this->load->helper('download');
            $fileData = file_get_contents('./uploads/attachments/offline_payments/' . $payments->enc_file_name);
            force_download($payments->orig_file_name, $fileData);
        }
    }

    public function approved($id = '', $file = '')
    {
        if ($_POST) {
            $status = $this->input->post('status');
            if ($status != 1) {
                $arrayLeave = array(
                    'approved_by' => get_loggedin_user_id(),
                    'status' => $status,
                    'comments' => $this->input->post('comments'),
                    'approve_date' => date('Y-m-d H:i:s'),
                );
                $id = $this->input->post('id');
                $school_registerID = $this->input->post('school_register_id');
                $this->db->where('id', $id);
                $this->db->update('saas_offline_payments', $arrayLeave);
                if ($status != 1) {
                    $getSettings = $this->saas_model->getSettings('automatic_approval');
                    //automatic approval
                    if ($getSettings->automatic_approval == 1) {
                        // send email subscription approval confirmation
                        if ($status == 2) {
                            $this->saas_model->automaticSubscriptionApproval($school_registerID, $this->data['global_config']['currency'], $this->data['global_config']['currency_symbol']);
                        }
                        // send email subscription reject
                        if ($status == 3) {
                            $getSchool = $this->saas_model->getPendingSchool($school_registerID);
                            $this->saas_offline_payments_model->update($school_registerID, $status);

                            $arrayData['email'] = $getSchool->email;
                            $arrayData['admin_name'] = $getSchool->admin_name;
                            $arrayData['reference_no'] = $getSchool->reference_no;
                            $arrayData['school_name'] = $getSchool->school_name;
                            $arrayData['reject_reason'] = $comments;
                            $this->saas_email_model->sentSchoolSubscriptionReject($arrayData);
                        }
                    }
                }
                set_alert('success', translate('information_has_been_updated_successfully'));

            }
            redirect(base_url('saas/pending_request'));
        }
    }

    public function getTypeInstruction()
    {
        if ($_POST) {
            $typeID = $this->input->post('typeID');
            if (empty($typeID)) {
                echo null;
                exit;
            }
            $r = $this->db->where('id', $typeID)->get('offline_payment_types')->row();
            if (!empty($r->note)) {
                echo $r->note;
            } else {
                echo "";
            }

        }
    }
}
