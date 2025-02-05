<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium
 * @version : 5.0
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Errors.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

class Errors extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('errors/error_404_message.php');
    }
}
