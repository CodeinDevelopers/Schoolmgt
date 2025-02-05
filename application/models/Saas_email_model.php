<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Saas_email_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mailer');
    }

    public function sentSchoolRegister($data)
    {
        $emailTemplate = $this->db->where(array('id' => 1))->get('saas_email_templates')->row_array();
        if ($emailTemplate['notified'] == 1 && !empty($data['email'])) {
            $message = $emailTemplate['template_body'];
            $message = str_replace("{institute_name}", get_global_setting('institute_name'), $message);
            $message = str_replace("{admin_name}", $data['admin_name'] , $message);
            $message = str_replace("{login_username}", $data['username'], $message);
            $message = str_replace("{password}", $data['password'], $message);
            $message = str_replace("{school_name}", $data['school_name'], $message);
            $message = str_replace("{plan_name}", $data['plan_name'], $message);
            $message = str_replace("{invoice_url}", $data['invoice_url'], $message);
            $message = str_replace("{payment_url}", $data['payment_url'], $message);
            $message = str_replace("{reference_no}", $data['reference_no'], $message);
            $message = str_replace("{date}", $data['date'], $message);
            $message = str_replace("{fees_amount}", $data['fees_amount'], $message);
            $msgData['branch_id'] = 9999;
            $msgData['recipient'] = $data['email'];
            $msgData['subject'] = $emailTemplate['subject'];
            $msgData['message'] = $message;
            $this->sendEmail($msgData);
        }
    }

    public function sentSchoolSubscriptionPaymentConfirmation($data)
    {
        $emailTemplate = $this->db->where(array('id' => 2))->get('saas_email_templates')->row_array();
        if ($emailTemplate['notified'] == 1 && !empty($data['email'])) {
            $message = $emailTemplate['template_body'];
            $message = str_replace("{institute_name}", get_global_setting('institute_name'), $message);
            $message = str_replace("{admin_name}", $data['admin_name'] , $message);
            $message = str_replace("{school_name}", $data['school_name'], $message);
            $message = str_replace("{plan_name}", $data['name'], $message);
            $message = str_replace("{invoice_url}", $data['invoice_url'], $message);
            $message = str_replace("{reference_no}", $data['reference_no'], $message);
            $message = str_replace("{date}", $data['date'], $message);
            $message = str_replace("{paid_amount}", $data['paid_amount'], $message);
            $msgData['branch_id'] = 9999;
            $msgData['recipient'] = $data['email'];
            $msgData['subject'] = $emailTemplate['subject'];
            $msgData['message'] = $message;
            $this->sendEmail($msgData);
        }
    }

    public function sentSubscriptionApprovalConfirmation($data)
    {
        $emailTemplate = $this->db->where(array('id' => 3))->get('saas_email_templates')->row_array();
        if ($emailTemplate['notified'] == 1 && !empty($data['email'])) {
            $getPlanDetails = $this->saas_model->getPackageDetails($data['package_id']);
            $getPlanExpiryDate = $this->saas_model->getPlanExpiryDate($data['package_id']);
            $message = $emailTemplate['template_body'];
            $message = str_replace("{institute_name}", get_global_setting('institute_name'), $message);
            $message = str_replace("{admin_name}", $data['admin_name'] , $message);
            $message = str_replace("{login_username}", $data['login_username'], $message);
            $message = str_replace("{password}", $data['password'], $message);
            $message = str_replace("{school_name}", $data['school_name'], $message);
            $message = str_replace("{plan_name}", $getPlanDetails->name, $message);
            $message = str_replace("{invoice_url}", $data['invoice_url'], $message);
            $message = str_replace("{reference_no}", $data['reference_no'], $message);
            $message = str_replace("{subscription_start_date}", $data['subscription_start_date'], $message);
            $message = str_replace("{subscription_expiry_date}", $getPlanExpiryDate, $message);
            $message = str_replace("{paid_amount}", number_format(($getPlanDetails->price - $getPlanDetails->discount), 2, '.', ''), $message);
            $msgData['branch_id'] = 9999;
            $msgData['recipient'] = $data['email'];
            $msgData['subject'] = $emailTemplate['subject'];
            $msgData['message'] = $message;
            $this->sendEmail($msgData);
        }
    }

    public function sentSchoolSubscriptionReject($data)
    {
        $emailTemplate = $this->db->where(array('id' => 4))->get('saas_email_templates')->row_array();
        if ($emailTemplate['notified'] == 1 && !empty($data['email'])) {
            $message = $emailTemplate['template_body'];
            $message = str_replace("{institute_name}", get_global_setting('institute_name'), $message);
            $message = str_replace("{admin_name}", $data['admin_name'] , $message);
            $message = str_replace("{school_name}", $data['school_name'], $message);
            $message = str_replace("{reference_no}", $data['reference_no'], $message);
            $message = str_replace("{reject_reason}", $data['reject_reason'], $message);
            $msgData['branch_id'] = 9999;
            $msgData['recipient'] = $data['email'];
            $msgData['subject'] = $emailTemplate['subject'];
            $msgData['message'] = $message;
            $this->sendEmail($msgData);
        }
    }

    public function sendEmail($data)
    {
        if ($this->mailer->send($data)) {
            return true;
        } else {
            return false;
        }
    }
}