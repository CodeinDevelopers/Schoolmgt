<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium
 * @version : 6.0
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Modules.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

class Modules extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('module_model');
        if (!is_superadmin_loggedin()) {
            access_denied();
        }
    }

    public function index()
    {
        $this->data['branch_id'] = $this->application_model->get_branch_id();
        $this->data['sub_page'] = 'modules/index';
        $this->data['title'] = translate('modules');
        $this->data['main_menu'] = 'settings';
        $this->load->view('layout/index', $this->data);
    }

    public function save()
    {
        if ($_POST) {
            $branchID = $this->application_model->get_branch_id();
            $systemFields = $this->input->post('system_fields');
            foreach ($systemFields as $key => $value) {
                $is_status = (isset($value['status']) ? 1 : 0);
                $arrayData = array(
                    'modules_id' => $key,
                    'branch_id' => $branchID,
                    'isEnabled' => $is_status,
                );
                $exist_privileges = $this->db->select('id')->limit(1)->where(array('branch_id' => $branchID, 'modules_id' => $key))->get('modules_manage')->num_rows();
                if ($exist_privileges > 0) {
                    $this->db->update('modules_manage', $arrayData, array('modules_id' => $key, 'branch_id' => $branchID));
                } else {
                    $this->db->insert('modules_manage', $arrayData);
                }
            }
            $message = translate('information_has_been_saved_successfully');
            $array = array('status' => 'success', 'message' => $message);
            echo json_encode($array);
        }
    }
}
