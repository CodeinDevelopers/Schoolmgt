#29/03/2025
# adding employee & student Attnedance to dashboard. 
// Model
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

//view 
?php
$days = $weekend_attendance["days"];
$student_present = $weekend_attendance["student_present"];
$student_absent = $weekend_attendance["student_absent"];
$employee_present = $weekend_attendance["employee_present"];
$employee_absent = $weekend_attendance["employee_absent"];
?>

//usage 
<p>Students Present Today: <span><?php echo end($student_present)['y']; ?></span></p>
<p>Students Absent Today: <span><?php echo end($student_absent)['y']; ?></span></p>
<p>Teachers Present Today: <span><?php echo end($employee_present)['y']; ?></span></p>
<p>Teachers Absent Today: <span><?php echo end($employee_absent)['y']; ?></span></p>
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

<!--Revised Desktop search bar -->
        <?php if (get_permission('student', 'is_view')): ?>
            <?php echo form_open('student/search', array('class' => 'cedevu-search-form')); ?>
            <div class="cedevu-search-container">
                <input type="text"
                    class="search-box cedevu-search-box"
                    name="search_text"
                    placeholder="<?php echo translate('student search'); ?>"
                    oninput="toggleIcons()">
                <svg class="cedevu-icon cedevu-search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#4d4d4d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <svg class="cedevu-icon cedevu-cancel-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FF0808FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="clearSearch()">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                <svg class="cedevu-icon cedevu-send-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#0482FFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="submitSearch()">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            </form>
        <?php endif; ?>



<!--Change calender View to list  -->
        
        (function($) {
                            var calendar = $('#event_calendar').fullCalendar({
                                header: {
                                    left: 'prev,next,today',
                                    center: 'title',
                                    right: 'listWeek,month,agendaWeek,agendaDay'
                                },
                                defaultView: 'listWeek', 
                                firstDay: 1,
                                height: 600,
                                droppable: false,
                                editable: true,
                                timezone: 'UTC',
                                lang: '<?php echo $language ?>',
                                events: {
                                    url: "<?= base_url('event/get_events_list/' . $school_id) ?>"
                                },
                                eventRender: function(event, element) {
                                    $(element).on("click", function() {
                                        viewEvent(event.id);
                                    });
                                    if (event.icon) {
                                        element.find(".fc-title").prepend("<i class='fas fa-" + event.icon + "'></i> ");
                                    }
                                }
                            });
                            setTimeout(function() {
                                $('#event_calendar').fullCalendar('changeView', 'listWeek');
                            }, 100);