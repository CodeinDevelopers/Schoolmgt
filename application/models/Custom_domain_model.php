<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom_domain_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCustomDomain()
    {
        $this->db->select('cd.*,branch.name as branch_name,front_cms_setting.url_alias');
        $this->db->from('custom_domain as cd');
        $this->db->join('branch', 'branch.id = cd.school_id', 'inner');
        $this->db->join('front_cms_setting', 'front_cms_setting.branch_id = cd.school_id', 'left');
        $this->db->order_by('cd.id', 'ASC');
        if (!is_superadmin_loggedin()) {
            $this->db->where('cd.school_id', get_loggedin_branch_id());
        }
        return $this->db->get()->result();
    }

    public function getCustomDomainDetails($id = '')
    {
        $this->db->select('cd.*,branch.name as branch_name,branch.email,branch.mobileno');
        $this->db->from('custom_domain as cd');
        $this->db->join('branch', 'branch.id = cd.school_id', 'inner');
        $this->db->where('cd.id', $id);
        if (!is_superadmin_loggedin()) {
            $this->db->where('cd.school_id', get_loggedin_branch_id());
        }
        return $this->db->get()->row();
    }

    public function getDNSinstruction()
    {
        $this->db->select('*');
        $this->db->from('custom_domain_instruction');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function getDomain_name($url)
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $url;
        $parsed_url = parse_url($url);
        if (isset($parsed_url['host'])) {
            $host = $parsed_url['host'];
            $host_parts = explode('.', $host);
            $domain = @$host_parts[count($host_parts) - 2] . '.' . @$host_parts[count($host_parts) - 1];
            if (substr($domain, 0, 1) != '.') {
                $domain = "." . $domain;
            }
            return $domain;
        } else {
            return "";
        }
    }
}
