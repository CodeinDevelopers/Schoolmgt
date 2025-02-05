<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium (Saas)
 * @version : 3.0
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Custom_domain.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

class Custom_domain extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom_domain_model');
        if (!moduleIsEnabled('custom_domain')) {
            access_denied();
        }
    }

    public function index()
    {
        redirect(base_url('custom_domain/list'));
    }

    function list() {
        if (!is_superadmin_loggedin()) {
            access_denied();
        }
        $this->data['customDomain'] = $this->custom_domain_model->getCustomDomain();
        $this->data['title'] = translate('custom_domain');
        $this->data['sub_page'] = 'custom_domain/list';
        $this->data['main_menu'] = 'custom_domain';
        $this->load->view('layout/index', $this->data);
    }

    public function getRejectsDetails()
    {
        if ($_POST) {
            if (is_superadmin_loggedin()) {
                $this->data['id'] = $this->input->post('id');
                $this->load->view('custom_domain/getRejectsDetails_modal', $this->data);
            }
        }
    }

    public function approved($id = '')
    {
        if (is_superadmin_loggedin()) {
            $this->db->where('id', $id)->update('custom_domain', ['status' => 1, 'approved_date' => date('Y-m-d H:i:s')]);
        }
    }

    public function reject()
    {
        if (!is_superadmin_loggedin()) {
            ajax_access_denied();
        }
        if ($_POST) {
            $custom_domainID = $this->input->post('id');
            $comments = $this->input->post('comments');
            //update status
            $this->db->where('id', $custom_domainID)->update('custom_domain', ['status' => 2, 'comments' => $comments, 'approved_date' => date('Y-m-d H:i:s')]);

            set_alert('success', translate('information_has_been_updated_successfully'));
            $array = array('status' => 'success');
            echo json_encode($array);
        }
    }

    public function delete($id = '')
    {
        if (!empty($id)) {
            if (!is_superadmin_loggedin()) {
                $this->db->where('school_id', get_loggedin_branch_id());
            }
            $this->db->where('id', $id);
            $this->db->delete('custom_domain');
        }
    }

    public function mylist()
    {
        if (is_superadmin_loggedin()) {
            access_denied();
        }
        $this->data['customDomain'] = $this->custom_domain_model->getCustomDomain();
        $this->data['title'] = translate('custom_domain');
        $this->data['sub_page'] = 'custom_domain/mylist';
        $this->data['main_menu'] = 'domain_request';
        $this->load->view('layout/index', $this->data);
    }

    public function send_request()
    {
        if ($_POST) {
            $domainType = $this->input->post('domainType');
            $url = "";
            if ($domainType == 'domain') {
                $domainType = 1;
                $url = $this->input->post('domain_name');
                $this->form_validation->set_rules('domain_name', 'URL', 'trim|required|callback_domain_check|callback_unique_domain');
            } else {
                $domainType = 2;
                $url = $this->input->post('subdomain_name') . $this->custom_domain_model->getDomain_name($_SERVER['HTTP_HOST']);
                $this->form_validation->set_rules('subdomain_name', 'URL', 'trim|required|callback_unique_domain');
            }
            $this->form_validation->set_rules('domainType', translate('type'), 'trim|required');
            if ($this->form_validation->run() !== false) {
                $arrayDomain = array(
                    'school_id' => get_loggedin_branch_id(),
                    'url' => $url,
                    'status' => 0,
                    'domain_type' => $domainType,
                    'comments' => "",
                );
                if (empty($this->input->post('id'))) {
                    $arrayDomain['request_date'] = date('Y-m-d H:i:s');
                    $this->db->insert('custom_domain', $arrayDomain);
                } else {
                    $id = $this->input->post('id');
                    $this->db->where('id', $id);
                    $this->db->update('custom_domain', $arrayDomain);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                $url = base_url('custom_domain/mylist');
                $array = array('status' => 'success', 'url' => $url, 'error' => '');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'url' => '', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function request_domain_edit($id = '')
    {
        if (is_superadmin_loggedin()) {
            access_denied();
        }
        $this->data['customDomain'] = $this->custom_domain_model->getCustomDomainDetails($id);
        if (empty($this->data['customDomain'])) {
            access_denied();
        }
        $this->data['title'] = translate('custom_domain');
        $this->data['sub_page'] = 'custom_domain/request_domain_edit';
        $this->data['main_menu'] = 'domain_request';
        $this->load->view('layout/index', $this->data);
    }

    /* unique custom domain url verification is done here */
    public function unique_domain($url)
    {
        $domainType = $this->input->post('domainType');
        if ($domainType == 'subdomain') {
            $url .= $this->custom_domain_model->getDomain_name($_SERVER['HTTP_HOST']);
        }
        if ($this->input->post('id')) {
            $this->db->where_not_in('id', $this->input->post('id'));
        }
        $this->db->where('url', $url);
        $query = $this->db->get('custom_domain')->num_rows();
        if ($query == 0) {
            return true;
        } else {
            $this->form_validation->set_message("unique_domain", translate('already_taken'));
            return false;
        }
    }

    public function domain_check($url)
    {
        if (empty($url)) {
            return true;
        }

        if ((preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $url) && preg_match("/^.{1,253}$/", $url) && preg_match("/^[^.]{1,63}(.[^.]{1,63})*$/", $url) && preg_match("/[.]/", $url))) {
            return true;
        } else {
            $this->form_validation->set_message("domain_check", "Invalid Domain URL.");
            return false;
        }
    }

    public function dns_instruction()
    {
        if (!is_superadmin_loggedin()) {
            access_denied();
        }
        if ($_POST) {
            $this->form_validation->set_rules('title', translate('title'), 'trim|required');
            if ($this->form_validation->run() !== false) {
                $arrayDomain = array(

                    'title' => $this->input->post('title'),
                    'dns_status' => (isset($_POST['dns_status']) ? 1 : 0),
                    'status' => (isset($_POST['status']) ? 1 : 0),
                    'instruction' => $this->input->post('instruction', false),
                    'dns_title' => $this->input->post('dns_title'),
                    'dns_host_1' => $this->input->post('dns_host_1'),
                    'dns_host_2' => $this->input->post('dns_host_2'),
                    'dns_value_1' => $this->input->post('dns_value_1'),
                    'dns_value_2' => $this->input->post('dns_value_2'),
                );

                $this->db->where('id', 1);
                $this->db->update('custom_domain_instruction', $arrayDomain);
                set_alert('success', translate('information_has_been_saved_successfully'));
                $url = base_url('custom_domain/dns_instruction');
                $array = array('status' => 'success', 'url' => $url, 'error' => '');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'url' => '', 'error' => $error);
            }
            echo json_encode($array);
            exit;
        }
        $this->data['dns'] = $this->custom_domain_model->getDNSinstruction();
        $this->data['title'] = translate('custom_domain');
        $this->data['sub_page'] = 'custom_domain/dns_instruction';
        $this->data['main_menu'] = 'custom_domain';
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
}
