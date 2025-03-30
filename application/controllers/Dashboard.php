<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium
 * @version : 6.2
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Dashboard.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

 class Dashboard extends Dashboard_Controller
 {
     public function __construct()
     {
         parent::__construct();
         $this->load->model('dashboard_model');
         $this->load->model('accounting_model');
     }
     
     public function index()
     {
 
         if (is_student_loggedin() || is_parent_loggedin()) {
             $studentID = 0;
             if (is_student_loggedin()) {
                 $this->data['title'] = translate('welcome_to') . " " . $this->session->userdata('name');
                 $studentID = get_loggedin_user_id();
             } elseif (is_parent_loggedin()) {
                 $studentID = $this->session->userdata('myChildren_id');
                 if (!empty($studentID)) {
                     $this->data['title'] = get_type_name_by_id('student', $studentID, 'first_name') . " - " . translate('dashboard');
                 } else {
                     $this->data['title'] = translate('welcome_to') . " " . $this->session->userdata('name');
                 }
             }
             $this->data['student_id'] = $studentID;
             $schoolID = get_loggedin_branch_id();
             $this->data['school_id'] = $schoolID;
             $this->data['sub_page'] = 'userrole/dashboard';
         } else {
             if (is_superadmin_loggedin()) {
                 if ($this->input->get('school_id')) {
                     $schoolID = $this->input->get('school_id');
                     $this->data['title'] = get_type_name_by_id('branch', $schoolID) . " " . translate('branch_dashboard');
                 } else {
                     $this->data['title'] = translate('all_branch_dashboard');
                     $schoolID = "";
                 }
             } else {
                 $schoolID = get_loggedin_branch_id();
                 $this->data['title'] = get_type_name_by_id('branch', $schoolID) . " " . translate('branch_dashboard');
             }
 
             $getSQLMode = $this->application_model->getSQLMode();
             $this->data['school_id'] = $schoolID;
             $this->data['sqlMode'] = $getSQLMode;
 
             if ($getSQLMode == false) {
                 $this->data['fees_summary'] = $this->dashboard_model->annualFeessummaryCharts($schoolID);
                 $this->data['fee_summary_totals'] = $this->dashboard_model->getFeeSummaryTotals($schoolID);
             } else {
                 $this->data['fees_summary'] = array(
                     'total_fee' => 0,
                     'total_paid' => 0,
                     'total_due' => 0,
                 );
                 $this->data['fee_summary_totals'] = [
                     'total_allocated' => '0.00',
                     'total_paid' => '0.00',
                     'total_outstanding' => '0.00',
                     'payment_percentage' => 0
                 ];
             }
 
             $this->data['student_by_class'] = $this->dashboard_model->getStudentByClass($schoolID);
             $this->data['income_vs_expense'] = $this->dashboard_model->getIncomeVsExpense($schoolID);
             $this->data['weekend_attendance'] = $this->dashboard_model->getWeekendAttendance($schoolID);
             $this->data['get_monthly_admission'] = $this->dashboard_model->getMonthlyAdmission($schoolID);
             $this->data['get_voucher'] = $this->dashboard_model->getVoucher($schoolID);
             $this->data['get_transport_route'] = $this->dashboard_model->get_transport_route($schoolID);
             $this->data['get_total_student'] = $this->dashboard_model->get_total_student($schoolID);
             $this->data['sub_page'] = 'dashboard/index';
         }
 
         $language = 'en';
         $jsArray = array(
             'vendor/chartjs/chart.min.js',
             'vendor/echarts/echarts.common.min.js',
             'vendor/moment/moment.js',
             'vendor/fullcalendar/fullcalendar.js',
         ); 
 
         if ($this->session->userdata('set_lang') != 'english') {
             $language = $this->dashboard_model->languageShortCodes($this->session->userdata('set_lang'));
             $jsArray[] = "vendor/fullcalendar/locale/$language.js";
         }
 
         $this->data['headerelements'] = array(
             'css' => array(
                 'vendor/fullcalendar/fullcalendar.css',
             ),
             'js' => $jsArray
         );
 
         $this->data['language'] = $language;
         $this->data['main_menu'] = 'dashboard';
 
         // Fetching the voucher list (SAME as all_transactions)
         $this->data['voucherlist'] = $this->accounting_model->getVoucherList(); 
        // Sort all transactions from new to old
         usort($this->data['voucherlist'], function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']); 
        });
         // Load the view only ONCE
         $this->load->view('layout/index', $this->data);
     }
 }
