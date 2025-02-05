<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Saas_offline_payments_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function typeSave($data = array())
    {
        $arrayData = array(
            'name' => $data['type_name'],
            'note' => $data['note'],
        );
        if (!isset($data['type_id'])) {
            $this->db->insert('saas_offline_payment_types', $arrayData);
        } else {
            $this->db->where('id', $data['type_id']);
            $this->db->update('saas_offline_payment_types', $arrayData);
        }
    }

    public function getOfflinePaymentsList($where = array(), $single = false)
    {
        $this->db->select('op.*,sr.reference_no,sr.school_name,address,sr.admin_name,sr.contact_number,sr.address');
        $this->db->from('saas_offline_payments as op');
        $this->db->join('saas_school_register as sr', 'sr.id = op.school_register_id', 'inner');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if ($single == true) {
            $result = $this->db->get()->row_array();
        } else {
            $this->db->order_by('op.id', 'ASC');
            $result = $this->db->get()->result();
        }
        return $result;
    }

    public function update($id = '', $status = '')
    {
        $status = ($status - 1);
        $arrayFees = array(
            'status' => $status,
            'payment_status' => $status,
        );
        // update in DB
        $this->db->where('id', $id);
        $this->db->update('saas_school_register', $arrayFees);
    }
}
