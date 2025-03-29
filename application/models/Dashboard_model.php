<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMonthlyBookIssued($id = '')
    {
        $this->db->select('id');
        $this->db->from('leave_application');
        $this->db->where("start_date BETWEEN DATE_SUB(CURDATE() ,INTERVAL 1 MONTH) AND CURDATE() AND status = '2' AND role_id = '7' AND user_id = " . $this->db->escape($id));
        return $this->db->get()->num_rows();
    }

    public function getStaffCounter($role = '', $branchID = '')
    {
        $this->db->select('COUNT(staff.id) as snumber');
        $this->db->from('staff');
        $this->db->join('login_credential', 'login_credential.user_id = staff.id', 'inner');
        $this->db->where_not_in('login_credential.role', 1);
        if (!empty($role)) {
            $this->db->where('login_credential.role', $role);
        } else {
            $this->db->where_not_in('login_credential.role', array(1, 3, 6, 7));
        }
        if (!empty($branchID)) {
            $this->db->where('staff.branch_id', $branchID);
        }
        return $this->db->get()->row_array();
    }

    public function getMonthlyPayment($id = '')
    {
        $this->db->select('IFNULL(sum(h.amount),0) as amount');
        $this->db->from('fee_allocation as fa');
        $this->db->join('fee_payment_history as h', 'h.allocation_id = fa.id', 'left');
        $this->db->where("h.date BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 MONTH) AND CURDATE() AND fa.student_id = " . $this->db->escape($id) . " AND fa.session_id = " . $this->db->escape(get_session_id()));
        return $this->db->get()->row()->amount;
    }

    /* annual academic fees summary charts */
    public function annualFeessummaryCharts($branchID = '', $studentID = '')
    {
        $total_fee = array();
        $total_paid = array();
        $total_due = array();
        $year = date("Y");
        for ($month = 1; $month <= 12; $month++) {
            $sql = "SELECT `fa`.`id` as `allocation_id`,`gd`.`fee_type_id`,`gd`.`amount` FROM `fee_allocation` as `fa` INNER JOIN `fee_groups_details` as `gd` ON `gd`.`fee_groups_id` = `fa`.`group_id` WHERE MONTH(`gd`.`due_date`) = " . $this->db->escape($month) . " AND YEAR(`gd`.`due_date`) = '$year' AND `fa`.`session_id` = " . $this->db->escape(get_session_id());
            if (!empty($branchID)) {
                $sql .= " AND `fa`.`branch_id` = " . $this->db->escape($branchID);
            }
            if (!empty($studentID)) {
                $sql .= " AND `fa`.`student_id` = " . $this->db->escape($studentID);
            }
            $total_amount = 0;
            $totalpaid = 0;
            $total_discount = 0;
            $result = $this->db->query($sql)->result();
            foreach ($result as $row) {
                $total_amount += $row->amount;
                $sql = "SELECT SUM(`h`.`amount`) AS `total_paid`, SUM(`h`.`discount`) AS `total_discount` FROM `fee_payment_history` as `h` WHERE `h`.`allocation_id` = " . $this->db->escape($row->allocation_id) . " AND  `h`.`type_id` = " . $this->db->escape($row->fee_type_id);
                $r = $this->db->query($sql)->row();
                $totalpaid += $r->total_paid;
                $total_discount += $r->total_discount;
            }
            $total_fee[] = floatval($total_amount);
            $total_paid[] = floatval($totalpaid);
            $total_due[] = floatval($total_amount - ($totalpaid + $total_discount));
        };
        return array(
            'total_fee' => $total_fee,
            'total_paid' => $total_paid,
            'total_due' => $total_due,
        );
    }

    /* student annual attendance charts */
    public function getStudentAttendance($studentID = '')
    {
        $total_present = array();
        $total_absent = array();
        $total_late = array();
        $enrollID = $this->db->select('id')->where(['student_id' => $studentID, 'session_id' => get_session_id()])->get('enroll')->row()->id;
        for ($month = 1; $month <= 12; $month++):
            $total_present[] = $this->db->query("SELECT id FROM student_attendance WHERE MONTH(date) = " . $this->db->escape($month) . " AND YEAR(date) = YEAR(CURDATE()) AND status = 'P' AND enroll_id = " . $this->db->escape($enrollID))->num_rows();
            $total_absent[] = $this->db->query("SELECT id FROM student_attendance WHERE MONTH(date) = " . $this->db->escape($month) . " AND YEAR(date) = YEAR(CURDATE()) AND status = 'A' AND enroll_id = " . $this->db->escape($enrollID))->num_rows();
            $total_late[] = $this->db->query("SELECT id FROM student_attendance WHERE MONTH(date) = " . $this->db->escape($month) . " AND YEAR(date) = YEAR(CURDATE()) AND status = 'L' AND enroll_id = " . $this->db->escape($enrollID))->num_rows();
        endfor;
        return array(
            'total_present' => $total_present,
            'total_absent' => $total_absent,
            'total_late' => $total_late,
        );
    }

    public function get_monthly_attachments($id = '')
    {
        $branchID = get_loggedin_branch_id();
        $classID = $this->db->select('class_id')->where('student_id', $id)->get('enroll')->row()->class_id;
        $this->db->select('id');
        $this->db->from('attachments');
        $this->db->where("date BETWEEN DATE_SUB(CURDATE() ,INTERVAL 1 MONTH) AND CURDATE() AND (class_id = " . $this->db->escape($classID) . " OR class_id = 'unfiltered') AND branch_id = " . $this->db->escape($branchID));
        return $this->db->get()->num_rows();
    }

    /* annual academic fees summary charts */
    public function getWeekendAttendance($branchID = '')
{
    $days = array();
    $employee_att = array(); // Keeps old functionality (teachers present)
    $student_att = array(); // Keeps old functionality (students present)

    // New arrays for absentees
    $student_present = array();
    $student_absent = array();
    $employee_present = array();
    $employee_absent = array();

    $now = new DateTime("6 days ago");
    $interval = new DateInterval('P1D'); // 1-day interval
    $period = new DatePeriod($now, $interval, 6); // 7-day range

    foreach ($period as $day) {
        $days[] = $day->format("d-M");

        // Get present students
        $this->db->select('id');
        if (!empty($branchID)) {
            $this->db->where('branch_id', $branchID);
        }
        $this->db->where('date', $day->format('Y-m-d'));
        $this->db->where_in('status', ['P', 'L']);
        $student_present_count = $this->db->get('student_attendance')->num_rows();
        $student_att[]['y'] = $student_present_count; // Keeps old key
        $student_present[]['y'] = $student_present_count; // New key for clarity

        // Get absent students
        $this->db->select('id');
        if (!empty($branchID)) {
            $this->db->where('branch_id', $branchID);
        }
        $this->db->where('date', $day->format('Y-m-d'));
        $this->db->where('status', 'A'); // Only absent students
        $student_absent_count = $this->db->get('student_attendance')->num_rows();
        $student_absent[]['y'] = $student_absent_count;

        // Get present teachers
        $this->db->select('id');
        if (!empty($branchID)) {
            $this->db->where('branch_id', $branchID);
        }
        $this->db->where('date', $day->format('Y-m-d'));
        $this->db->where_in('status', ['P', 'L']);
        $employee_present_count = $this->db->get('staff_attendance')->num_rows();
        $employee_att[]['y'] = $employee_present_count; // Keeps old key
        $employee_present[]['y'] = $employee_present_count; // New key for clarity

        // Get absent teachers
        $this->db->select('id');
        if (!empty($branchID)) {
            $this->db->where('branch_id', $branchID);
        }
        $this->db->where('date', $day->format('Y-m-d'));
        $this->db->where('status', 'A'); // Only absent teachers
        $employee_absent_count = $this->db->get('staff_attendance')->num_rows();
        $employee_absent[]['y'] = $employee_absent_count;
    }

    return array(
        'days' => $days,
        'employee_att' => $employee_att, // Old key (teachers present)
        'student_att' => $student_att, // Old key (students present)
        'student_present' => $student_present, // New key
        'employee_present' => $employee_present, // New key
        'student_absent' => $student_absent, // New key
        'employee_absent' => $employee_absent // New key
    );
}

    /* monthly academic cash book transaction charts */
    public function getIncomeVsExpense($branchID = '')
    {
        $query = "SELECT IFNULL(SUM(dr),0) as dr, IFNULL(SUM(cr),0) as cr FROM transactions WHERE month(DATE) = MONTH(now()) AND year(DATE) = YEAR(now())";
        if (!empty($branchID)) {
            $query .= " AND branch_id = " . $this->db->escape($branchID);
        }
        $r = $this->db->query($query)->row_array();
        return array(['name' => translate("expense"), 'value' => $r['dr']], ['name' => translate("income"), 'value' => $r['cr']]);
    }

    /* total academic students strength classes divided into charts */
    public function getStudentByClass($branchID = '')
    {
        $this->db->select('IFNULL(COUNT(e.student_id), 0) as total_student, c.name as class_name');
        $this->db->from('enroll as e');
        $this->db->join('class as c', 'c.id = e.class_id', 'inner');
        $this->db->group_by('e.class_id');
        if (!empty($branchID)) {
            $this->db->where('e.branch_id', $branchID);
        }

        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            $students = $query->result();
            foreach ($students as $row) {
                $data[] = ['value' => floatval($row->total_student), 'name' => $row->class_name];
            }
        } else {
            $data[] = ['value' => 0, 'name' => translate('not_found_anything')];
        }
        return $data;
    }

    public function get_total_student($branchID = '')
    {
        $sessionID = get_session_id();
        $this->db->select('IFNULL(COUNT(enroll.id), 0) as total_student');
        $this->db->from('enroll');
        $this->db->join('student', 'student.id = enroll.student_id', 'inner');
        $this->db->where('enroll.session_id', $sessionID);
        if (!empty($branchID)) {
            $this->db->where('enroll.branch_id', $branchID);
        }
        return $this->db->get()->row()->total_student;
    }

    public function getMonthlyAdmission($branchID = '')
    {
        $this->db->select('s.id');
        $this->db->from('student as s');
        $this->db->join('enroll as e', 'e.student_id = s.id', 'inner');
        $this->db->where('s.admission_date BETWEEN DATE_SUB(CURDATE() ,INTERVAL 1 MONTH) AND CURDATE()');
        if (!empty($branchID)) {
            $this->db->where('e.branch_id', $branchID);
        }
        return $this->db->get()->num_rows();
    }

    public function getVoucher($branchID = '')
    {
        $this->db->select('id');
        if (!empty($branchID)) {
            $this->db->where('branch_id', $branchID);
        }
        $this->db->where('date BETWEEN DATE_SUB(CURDATE() ,INTERVAL 1 MONTH) AND CURDATE()');
        return $this->db->get('transactions')->num_rows();
    }

    public function get_transport_route($branchID = '')
    {
        if (!empty($branchID)) {
            $this->db->where('branch_id', $branchID);
        }
        return $this->db->get('transport_route')->num_rows();
    }


    public function languageShortCodes($lang='')
    {
        $codes = array (
          'english' => 'en',
          'bengali' => 'bn',
          'arabic' => 'ar',
          'french' => 'fr',
          'hindi' => 'hi',
          'indonesian' => 'id',
          'italian' => 'it',
          'japanese' => 'ja',
          'korean' => 'ko',
          'portuguese' => 'pt',
          'thai' => 'th',
          'turkish' => 'tr',
          'urdu' => 'ur',
          'chinese' => 'zh',
          'afrikaans' => 'af',
          'german' => 'de',
          'nepali' => 'ne',
          'russian' => 'ru',
          'danish' => 'da',
          'armenian' => 'hy',
          'georgian' => 'ka',
          'marathi' => 'mr',
          'malay' => 'ms',
          'tamil' => 'ta',
          'telugu' => 'te',
          'swedish' => 'sv',
          'dutch' => 'nl',
          'greek' => 'el',
          'spanish' => 'es',
          'punjabi' => 'pa',
        );
        return empty($codes[$lang]) ? '' : $codes[$lang];
    }
    public function getFeeSummaryTotals($schoolID = '', $studentID = '')
{
    // Get annual data first (reusing your existing method)
    $annual_data = $this->annualFeessummaryCharts($schoolID, $studentID);
    
    // Calculate grand totals
    $total_allocated = array_sum($annual_data['total_fee']);
    $total_paid = array_sum($annual_data['total_paid']);
    $total_outstanding = array_sum($annual_data['total_due']);
    
    return [
        'total_allocated' => number_format($total_allocated, 2),
        'total_paid' => number_format($total_paid, 2),
        'total_outstanding' => number_format($total_outstanding, 2),
        'payment_percentage' => ($total_allocated > 0) ? 
            number_format(($total_paid / $total_allocated) * 100, 1) : 0
    ];
}
}
