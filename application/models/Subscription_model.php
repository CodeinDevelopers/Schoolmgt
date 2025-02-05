<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscription_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // get plan details
    public function getPlanDetails($id='', $trial = false)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        if ($trial == true){
            $this->db->where('free_trial', 0);
        }
        $get = $this->db->get('saas_package')->row_array();
        return $get;
    }

    public function savePaymentData($data)
    {
        // insert in DB
        $insertArray =  array(
            'subscriptions_id' => $data['current_subscriptions_id'], 
            'package_id' => $data['package_id'],
            'payment_id' => $data['payment_id'], 
            'amount' => $data['amount'], 
            'discount' => $data['discount'], 
            'payment_method' => $data['payment_method'], 
            'renew' => 1, 
            'purchase_date' => date("Y-m-d"), 
            'expire_date' => $data['expire_date'], 
        );
        $this->db->insert('saas_subscriptions_transactions', $insertArray);

        // update subscriptions in DB
        $updateArray =  array(
            'package_id' => $data['package_id'], 
            'expire_date' => $data['expire_date'],
            'upgrade_lasttime' => date("Y-m-d"), 
        );
        $this->db->where('school_id', get_loggedin_branch_id());
        $this->db->update('saas_subscriptions', $updateArray);

        // reorganize permissions
        if ($data['package_id'] != $data['current_package_id']) {
            $schooolID = get_loggedin_branch_id();
            $saasPackage = $this->getPlanDetails($data['package_id']);
            //manage modules permission
            $permission = json_decode($saasPackage['permission'], true);
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
    }

    // get subscriptions details
    public function getSubscriptions()
    {
        $this->db->select('*');
        $this->db->where('school_id', get_loggedin_branch_id());
        $get = $this->db->get('saas_subscriptions')->row_array();
        return $get;
    }

    public function getCurrency()
    {
        $this->db->select('currency,currency_symbol,currency_formats,symbol_position');
        $this->db->where('id', 1);
        $get = $this->db->get('global_settings')->row();
        return $get;
    }

    public function getAdminDetails()
    {
        $sql = "SELECT `name`,`email`,`photo`,`mobileno` FROM `staff` WHERE `id` = " . $this->db->escape(get_loggedin_user_id());
        $getUser = $this->db->query($sql)->row_array();
        return $getUser;
    }
}
