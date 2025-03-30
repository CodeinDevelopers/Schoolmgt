<?php
if ($this->saas_model->checkSubscriptionValidity()) { ?>
    <?php if (empty($student_id)): ?>

        <?php
        $sessionID = get_session_id();
        $this->db->select('s.id,s.first_name,s.last_name,s.photo,s.register_no,s.birthday,e.class_id,e.section_id,e.id as enroll_id,e.roll,e.session_id,c.name as class_name,se.name as section_name');
        $this->db->from('enroll as e');
        $this->db->join('student as s', 'e.student_id = s.id', 'left');
        $this->db->join('class as c', 'e.class_id = c.id', 'left');
        $this->db->join('section as se', 'e.section_id = se.id', 'left');
        $this->db->where('s.parent_id', get_loggedin_user_id());
        $this->db->where('e.session_id', $sessionID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $students = $query->result();
            foreach ($students as $row):
        ?>
                <div class="student-profile-card">
                    <div class="profile-content">
                        <div class="profile-image">
                            <img src="<?php echo get_image_url('student', $row->photo); ?>" alt="Student Photo">
                        </div>

                        <div class="profile-details">
                            <h2 class="student-name">
                                <?= html_escape($row->first_name . " " . $row->last_name) ?>
                            </h2>
                            <p class="student-type"><?= translate('my_child') ?></p>

                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="icon-wrapper">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 22V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V22" stroke="currentColor" stroke-width="1.5"></path> <path d="M21 22V11.5C21 10.0955 21 9.39331 20.6629 8.88886C20.517 8.67048 20.3295 8.48298 20.1111 8.33706C19.6067 8 18.9045 8 17.5 8" stroke="currentColor" stroke-width="1.5"></path> <path d="M3 22V11.5C3 10.0955 3 9.39331 3.33706 8.88886C3.48298 8.67048 3.67048 8.48298 3.88886 8.33706C4.39331 8 5.09554 8 6.5 8" stroke="currentColor" stroke-width="1.5"></path> <path d="M12 22V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 8H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 11H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 14H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg><span class="icon-text"><?= translate('class') ?>: <span style="font-weight: bold;"><?= html_escape($row->class_name) ?></span></span>
                                    </div>
                                    
                                </div>


                                <div class="info-item">
                                    <div class="icon-wrapper">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="9" cy="9" r="2" stroke="currentColor" stroke-width="1.5"></circle> <path d="M13 15C13 16.1046 13 17 9 17C5 17 5 16.1046 5 15C5 13.8954 6.79086 13 9 13C11.2091 13 13 13.8954 13 15Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M19 12H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 9H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 15H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <span class="icon-text"><?= translate('admission_no') ?>:
                                            <span  style="font-weight: bold;"><?= html_escape($row->register_no) ?></span></span></span>
                                    </div>
                                </div>
                                

                                <div class="info-item">
                                    <div class="icon-wrapper">
                                    <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M174.994 87.9447C190.714 75.4721 215.468 68.3985 236.118 76.3835C302.788 102.161 283.164 190.786 207.535 185.539C162.247 182.397 152.872 101.487 187.894 87.9447" stroke="currentColor" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M238.732 205.486C238.732 226.506 240.817 282.497 231.837 297.369C228.668 302.616 282.586 327.48 288.564 326.311C294.173 325.218 294.581 320.792 300.27 318.014" stroke="currentColor" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M69 313.63C69.2942 313.784 76.1098 325.387 83.2915 322.362C100.941 314.933 122.459 313.63 145.934 296.046C153.047 290.718 152.576 241.323 175.919 197.352" stroke="currentColor" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M85.2703 165.973C87.5945 166.546 89.0492 168.387 90.7046 170.169C96.4692 176.363 103.074 181.251 111.447 183.511C124.72 187.091 160.511 194.685 174.001 197M246.064 205.207C267.189 208.246 321.668 185.695 331.649 177.338" stroke="currentColor" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M228.453 142.975C227.981 141.009 228.509 136.199 216.043 136.776C203.578 137.353 198.724 156.194 203.578 162.165C205.974 165.117 210.248 165.782 215.088 165.782C217.813 165.782 226.718 163.665 228.453 149.123" stroke="currentColor" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg><span class="icon-text"><?= translate('birthday') ?>: <span style="font-weight: bold;"><?= _d($row->birthday) ?></span></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="action-area">
                            <a href="<?= base_url('parents/select_child/' . $row->enroll_id); ?>"
                                class="dashboard-button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" stroke-width="2" stroke-linecap="round" />
                                </svg>
                                <?= translate('view_profile') ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        } else { ?>
            <div class="alert alert-subl text-center">
                <strong><i class="fas fa-exclamation-triangle"></i> <?= translate('no_child_was_found') ?></strong>
            </div>
        <?php } ?>
        </div>
    <?php
    else :
        $book_issued = $this->dashboard_model->getMonthlyBookIssued($student_id);
        $get_monthly_payment = $this->dashboard_model->getMonthlyPayment($student_id);
        $fees_summary = $this->dashboard_model->annualFeessummaryCharts($school_id, $student_id);
        $fee_summary_totals = $this->dashboard_model->getFeeSummaryTotals($school_id, $student_id);
        $get_student_attendance = $this->dashboard_model->getStudentAttendance($student_id);
        $attendance_summary = $this->dashboard_model->getStudentAttendance($student_id);
        $get_monthly_attachments = $this->dashboard_model->get_monthly_attachments($student_id);
        $student_name = get_type_name_by_id('student', $student_id, 'first_name') . ' ' .
            get_type_name_by_id('student', $student_id, 'last_name');
        $register_no = get_type_name_by_id('student', $student_id, 'register_no');

        // Fetch Parent Name using the 'name' column
        $parent_name = get_type_name_by_id('parent', get_loggedin_user_id(), 'name');

        // Fetch Class Name with Proper Checks
        $class_name = "N/A";
        if (!empty($student_id)) {
            $this->db->select('c.name');
            $this->db->from('class as c');
            $this->db->join('enroll as e', 'e.class_id = c.id', 'left');
            $this->db->where('e.student_id', $student_id);
            $class_name_query = $this->db->get();

            if ($class_name_query->num_rows() > 0) {
                $class_name = $class_name_query->row()->name;
            }
        }
    ?>

        <div class="dashboard-page" style="padding:0px;">
            <!-- Modern Dashboard Header -->
            <div class="cdev-modern-header">
                <div class="cdev-header-content">
                    <div class="cdev-user-welcome">
                        <div class="cdev-user-profile">
                            <?php
                            $profile_image = get_image_url('staff', $this->session->userdata('photo'));
                            ?>
                            <img src="<?php echo $profile_image; ?>" alt="User Image" class="cdev-profile-img">
                        </div>
                        <div class="cdev-user-info">
                            <h1 class="cdev-welcome-text">
                                Hi, <span class="cdev-user-name"><?= html_escape($parent_name) ?></span>

                            </h1>
                            <p class="cdev-subtitle">Welcome to <span class="cdev-user-name"><?php
                                                                                                if (isset($student_name) && !empty($student_name)) {
                                                                                                    echo $student_name;
                                                                                                }
                                                                                                ?>'s</span> Dashboard</p>
                        </div>
                    </div>

                    <div class="cdev-header-actionsp">

                        <?php if (is_parent_loggedin()) { ?>
                            <div class="cdev-header-info">
                                <span><?= translate('reg_no') ?>: <span id="admission-number"><span style="font-weight: bold;"><?= html_escape($register_no) ?> </span></span></span>
                                <svg id="copy-admission" class="copy-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="8" y="8" width="12" height="12" rx="2" stroke-width="2" />
                                    <path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2" stroke-width="2" />
                                </svg>
                            </div>
                            <a href="<?= base_url('parents/my_children') ?>" class="cdev-action-btn"><svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path>
                                        <path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path>
                                        <path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path>
                                        <path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path>
                                        <path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path>
                                    </g>
                                </svg> <span><?php echo translate('switch_child'); ?></span>
                            </a>

                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- Parent-specific content -->
            <?php if (is_parent_loggedin()) { ?>
                <!-- Fees Summary Card -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="cdev-dashboard-card">
                            <div class="cdev-card-header">
                                <h3 class="cdev-card-title">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M17.4142 10.4142C18 9.82843 18 8.88562 18 7C18 5.11438 18 4.17157 17.4142 3.58579M17.4142 10.4142C16.8284 11 15.8856 11 14 11H10C8.11438 11 7.17157 11 6.58579 10.4142M17.4142 10.4142C17.4142 10.4142 17.4142 10.4142 17.4142 10.4142ZM17.4142 3.58579C16.8284 3 15.8856 3 14 3L10 3C8.11438 3 7.17157 3 6.58579 3.58579M17.4142 3.58579C17.4142 3.58579 17.4142 3.58579 17.4142 3.58579ZM6.58579 3.58579C6 4.17157 6 5.11438 6 7C6 8.88562 6 9.82843 6.58579 10.4142M6.58579 3.58579C6.58579 3.58579 6.58579 3.58579 6.58579 3.58579ZM6.58579 10.4142C6.58579 10.4142 6.58579 10.4142 6.58579 10.4142Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M13 7C13 7.55228 12.5523 8 12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M18 6C16.3431 6 15 4.65685 15 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M18 8C16.3431 8 15 9.34315 15 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M6 6C7.65685 6 9 4.65685 9 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M6 8C7.65685 8 9 9.34315 9 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M5 20.3884H7.25993C8.27079 20.3884 9.29253 20.4937 10.2763 20.6964C12.0166 21.0549 13.8488 21.0983 15.6069 20.8138C16.4738 20.6734 17.326 20.4589 18.0975 20.0865C18.7939 19.7504 19.6469 19.2766 20.2199 18.7459C20.7921 18.216 21.388 17.3487 21.8109 16.6707C22.1736 16.0894 21.9982 15.3762 21.4245 14.943C20.7873 14.4619 19.8417 14.462 19.2046 14.9433L17.3974 16.3084C16.697 16.8375 15.932 17.3245 15.0206 17.4699C14.911 17.4874 14.7962 17.5033 14.6764 17.5172M14.6764 17.5172C14.6403 17.5214 14.6038 17.5254 14.5668 17.5292M14.6764 17.5172C14.8222 17.486 14.9669 17.396 15.1028 17.2775C15.746 16.7161 15.7866 15.77 15.2285 15.1431C15.0991 14.9977 14.9475 14.8764 14.7791 14.7759C11.9817 13.1074 7.62942 14.3782 5 16.2429M14.6764 17.5172C14.6399 17.525 14.6033 17.5292 14.5668 17.5292M14.5668 17.5292C14.0434 17.5829 13.4312 17.5968 12.7518 17.5326" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <rect x="2" y="14" width="3" height="8" rx="1.5" stroke="currentColor" stroke-width="1.5"></rect>
                                        </g>
                                    </svg><?php
                                            echo translate('fees_summary');
                                            if (isset($student_name) && !empty($student_name)) {
                                                echo " for " . $student_name;
                                            }
                                            ?>
                                </h3>
                            </div>
                            <div class="cdev-card-body">
                                <div class="cdev-summary-grid">
                                    <!-- Total Allocated Fees -->
                                    <div class="cdev-stat-card cdev-primary">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . $fee_summary_totals['total_allocated']); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('total_fees_allocated'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </div>
                                    </div>

                                    <!-- Total Paid Fees -->
                                    <div class="cdev-stat-card cdev-success">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . $fee_summary_totals['total_paid']); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('total_fees_paid'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>

                                    <!-- Total Outstanding Fees -->
                                    <div class="cdev-stat-card cdev-warning">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . $fee_summary_totals['total_outstanding']); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('total_outstanding_fees'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Progress -->
                                <div class="cdev-progress-container">
                                    <div class="cdev-progress-header">
                                        <span class="cdev-progress-label"><?php echo translate('payment_progress'); ?></span>
                                        <span class="cdev-progress-percentage"><?php echo $fee_summary_totals['payment_percentage']; ?>%</span>
                                    </div>
                                    <div class="cdev-progress">
                                        <div class="cdev-progress-bar" style="width: <?php echo $fee_summary_totals['payment_percentage']; ?>%"></div>
                                    </div>
                                </div>

                                <!-- Fees Details Button -->
                                <div class="cdev-card-footer">
                                    <?php if ($fee_summary_totals['payment_percentage'] == 100) : ?>
                                        <a href="<?php echo base_url('userrole/invoice#history'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M14 16L16.1 18.5L20 13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M10 14H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M10 18H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M3 6L13.5 6M20 6L17.75 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M20 10L9.5 10M3 10H5.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </g>
                                            </svg>
                                            <span><?php echo translate('view_payment_history'); ?></span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($fee_summary_totals['payment_percentage'] < 100) : ?>
                                        <a href="<?php echo base_url('userrole/invoice#invoice'); ?>" class="cdev-action-btn cdev-pay-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M17.4142 10.4142C18 9.82843 18 8.88562 18 7C18 5.11438 18 4.17157 17.4142 3.58579M17.4142 10.4142C16.8284 11 15.8856 11 14 11H10C8.11438 11 7.17157 11 6.58579 10.4142M17.4142 10.4142C17.4142 10.4142 17.4142 10.4142 17.4142 10.4142ZM17.4142 3.58579C16.8284 3 15.8856 3 14 3L10 3C8.11438 3 7.17157 3 6.58579 3.58579M17.4142 3.58579C17.4142 3.58579 17.4142 3.58579 17.4142 3.58579ZM6.58579 3.58579C6 4.17157 6 5.11438 6 7C6 8.88562 6 9.82843 6.58579 10.4142M6.58579 3.58579C6.58579 3.58579 6.58579 3.58579 6.58579 3.58579ZM6.58579 10.4142C6.58579 10.4142 6.58579 10.4142 6.58579 10.4142Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path d="M13 7C13 7.55228 12.5523 8 12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path d="M18 6C16.3431 6 15 4.65685 15 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M18 8C16.3431 8 15 9.34315 15 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M6 6C7.65685 6 9 4.65685 9 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M6 8C7.65685 8 9 9.34315 9 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M5 20.3884H7.25993C8.27079 20.3884 9.29253 20.4937 10.2763 20.6964C12.0166 21.0549 13.8488 21.0983 15.6069 20.8138C16.4738 20.6734 17.326 20.4589 18.0975 20.0865C18.7939 19.7504 19.6469 19.2766 20.2199 18.7459C20.7921 18.216 21.388 17.3487 21.8109 16.6707C22.1736 16.0894 21.9982 15.3762 21.4245 14.943C20.7873 14.4619 19.8417 14.462 19.2046 14.9433L17.3974 16.3084C16.697 16.8375 15.932 17.3245 15.0206 17.4699C14.911 17.4874 14.7962 17.5033 14.6764 17.5172M14.6764 17.5172C14.6403 17.5214 14.6038 17.5254 14.5668 17.5292M14.6764 17.5172C14.8222 17.486 14.9669 17.396 15.1028 17.2775C15.746 16.7161 15.7866 15.77 15.2285 15.1431C15.0991 14.9977 14.9475 14.8764 14.7791 14.7759C11.9817 13.1074 7.62942 14.3782 5 16.2429M14.6764 17.5172C14.6399 17.525 14.6033 17.5292 14.5668 17.5292M14.5668 17.5292C14.0434 17.5829 13.4312 17.5968 12.7518 17.5326" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <rect x="2" y="14" width="3" height="8" rx="1.5" stroke="currentColor" stroke-width="1.5"></rect>
                                                </g>
                                            </svg>
                                            <span><?php echo translate('pay_fees'); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Student-specific content -->
            <?php if (is_student_loggedin()) { ?>
                <div class="row" style="margin-bottom:10px">
                    <div class="col-md-12">
                        <div class="cdev-dashboard-buttons">
                            <a href="<?= base_url('userrole/homework') ?>" class="cdev-dashboard-btn pay-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10.0002 12.25C9.58597 12.25 9.25019 12.5858 9.25019 13C9.25019 13.4142 9.58597 13.75 10.0002 13.75H14.0002C14.4144 13.75 14.7502 13.4142 14.7502 13C14.7502 12.5858 14.4144 12.25 14.0002 12.25H10.0002Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.32033 4.27529C7.65835 2.55091 9.17665 1.25 11.0002 1.25H13.0002C14.8238 1.25 16.3421 2.55092 16.6801 4.2753C19.6252 5.03147 21.7075 7.66894 21.7495 10.7198C21.7502 10.7665 21.7502 10.8178 21.7502 10.9044V13.9829C21.7504 13.994 21.7504 14.0052 21.7502 14.0163V16.375C21.7502 18.8445 20.035 20.9827 17.6244 21.5184C13.9201 22.3415 10.0803 22.3415 6.37602 21.5184C3.96535 20.9827 2.25019 18.8445 2.25019 16.375V14.0163C2.24994 14.0052 2.24994 13.994 2.25019 13.9829V10.9043C2.25019 10.8177 2.25019 10.7664 2.25083 10.7198C2.2929 7.66892 4.37523 5.03144 7.32033 4.27529ZM9.01465 3.94034C9.39359 3.23199 10.1411 2.75 11.0002 2.75H13.0002C13.8594 2.75 14.6068 3.232 14.9858 3.94035C13.0069 3.63773 10.9935 3.63772 9.01465 3.94034ZM20.2502 10.9111V13.5066C14.9716 15.711 9.02878 15.711 3.75019 13.5066V10.9111C3.75019 10.8157 3.7502 10.7755 3.75069 10.7405C3.78387 8.33419 5.4489 6.25854 7.79074 5.70414C7.82473 5.69609 7.86404 5.68733 7.95714 5.66665C8.04138 5.64793 8.08131 5.63905 8.12071 5.63048C10.6771 5.07434 13.3232 5.07434 15.8797 5.63048C15.9191 5.63905 15.959 5.64793 16.0432 5.66665C16.1363 5.68733 16.1756 5.69609 16.2096 5.70414C18.5515 6.25854 20.2165 8.33419 20.2497 10.7405C20.2502 10.7755 20.2502 10.8157 20.2502 10.9111ZM3.75019 16.375V15.123C7.91456 16.7307 12.4332 17.0771 16.7502 16.1622V17C16.7502 17.4142 17.086 17.75 17.5002 17.75C17.9144 17.75 18.2502 17.4142 18.2502 17V15.7911C18.9242 15.5999 19.5916 15.3772 20.2502 15.123V16.375C20.2502 18.1415 19.0233 19.6709 17.299 20.0541C13.809 20.8296 10.1914 20.8296 6.70141 20.0541C4.97705 19.6709 3.75019 18.1415 3.75019 16.375Z" fill="currentColor"></path>
                                    </g>
                                </svg>
                                <?= translate('homework') ?>
                            </a>
                            <a href="<?= base_url('userrole/online_exam') ?>" class="cdev-dashboard-btn exam-result"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M6.44 2H17.55C21.11 2 22 2.89 22 6.44V12.77C22 16.33 21.11 17.21 17.56 17.21H6.44C2.89 17.22 2 16.33 2 12.78V6.44C2 2.89 2.89 2 6.44 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 17.22V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M2 13H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.5 22H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <?= translate('online_exam') ?>
                            </a>
                            <a href="<?= base_url('userrole/class_schedule') ?>" class="cdev-dashboard-btn attendance"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="currentColor"></path>
                                    </g>
                                </svg>
                                <span><?= translate('class_schedule') ?></span>
                            </a>
                            <a href="<?= base_url('userrole/report_card') ?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M6 15.8L7.14286 17L10 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6 8.8L7.14286 10L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M13 9L18 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M13 16L18 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg>
                                <?= translate('report_card') ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Common content for both student and parent -->
            <!-- Attendance Summary Card -->
            <div class="row">
                <div class="col-md-12">
                    <div class="cdev-dashboard-card">
                        <div class="cdev-card-header">
                            <h3 class="cdev-card-title"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M11 6L21 6.00072M11 12L21 12.0007M11 18L21 18.0007M3 11.9444L4.53846 13.5L8 10M3 5.94444L4.53846 7.5L8 4M4.5 18H4.51M5 18C5 18.2761 4.77614 18.5 4.5 18.5C4.22386 18.5 4 18.2761 4 18C4 17.7239 4.22386 17.5 4.5 17.5C4.77614 17.5 5 17.7239 5 18Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <?php
                                echo translate('attendance_summary');
                                if (isset($student_name) && !empty($student_name)) {
                                    echo " for " . $student_name;
                                }
                                ?></h3>
                        </div>
                        <div class="cdev-card-body">
                            <div class="cdev-summary-grid">
                                <!-- Total Present Days -->
                                <div class="cdev-stat-card cdev-success">
                                    <div class="cdev-stat-content">
                                        <h3 class="cdev-stat-value"><?php echo array_sum($attendance_summary['total_present']); ?></h3>
                                        <p class="cdev-stat-label"><?php echo translate('present_days'); ?></p>
                                    </div>
                                    <div class="cdev-stat-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>

                                <!-- Total Absent Days -->
                                <div class="cdev-stat-card cdev-danger">
                                    <div class="cdev-stat-content">
                                        <h3 class="cdev-stat-value"><?php echo array_sum($attendance_summary['total_absent']); ?></h3>
                                        <p class="cdev-stat-label"><?php echo translate('absent_days'); ?></p>
                                    </div>
                                    <div class="cdev-stat-icon">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>

                                <!-- Total Late Days -->
                                <div class="cdev-stat-card cdev-warning">
                                    <div class="cdev-stat-content">
                                        <h3 class="cdev-stat-value"><?php echo array_sum($attendance_summary['total_late']); ?></h3>
                                        <p class="cdev-stat-label"><?php echo translate('late_days'); ?></p>
                                    </div>
                                    <div class="cdev-stat-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Attendance Details Button -->
                            <div class="cdev-card-footer">
                                <a href="<?php echo base_url('student/attendance_details'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M11 6L21 6.00072M11 12L21 12.0007M11 18L21 18.0007M3 11.9444L4.53846 13.5L8 10M3 5.94444L4.53846 7.5L8 4M4.5 18H4.51M5 18C5 18.2761 4.77614 18.5 4.5 18.5C4.22386 18.5 4 18.2761 4 18C4 17.7239 4.22386 17.5 4.5 17.5C4.77614 17.5 5 17.7239 5 18Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                    <span><?php echo translate('view_attendance_details'); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- event calendar -->
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body">
                        <div id="event_calendar"></div>
                    </div>
                </section>
            </div>
        </div>
        </div>

        <div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
            <section class="panel">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fas fa-info-circle"></i> <?= translate('event_details') ?></h4>
                    <div class="panel-btn">
                        <button id="print" class="btn btn-default btn-circle icon"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                            </svg></button>
                    </div>
                </header>
                <div class="panel-body">
                    <div id="printResult pt-sm pb-sm">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed text-dark mb-sm tbr-top" id="ev_table">

                            </table>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default modal-dismiss">
                                <?= translate('close') ?>
                            </button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>

        <script type="application/javascript">
            (function($) {
                var calendar = $('#event_calendar').fullCalendar({
                    header: {
                        left: 'prev,next,today',
                        center: 'title',
                        right: 'listWeek,month,agendaWeek,agendaDay'
                    },
                    defaultView: 'listWeek', // This should work, but let's force it just in case
                    firstDay: 1,
                    height: 520,
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

                // Own Annual Fee Summary JS
                var total_fees = <?php echo json_encode($fees_summary['total_fee']); ?>;
                var total_paid = <?php echo json_encode($fees_summary['total_paid']); ?>;
                var total_due = <?php echo json_encode($fees_summary['total_due']); ?>;
                var ctx = document.getElementById('fees_graph').getContext('2d');
                var fees_graph = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: '<?php echo translate("total"); ?>',
                            data: total_fees,
                            backgroundColor: 'rgba(216, 27, 96, .6)',
                            borderColor: '#F5F5F5',
                            borderWidth: 1
                        }, {
                            label: '<?php echo translate("collected"); ?>',
                            data: total_paid,
                            backgroundColor: 'rgba(0, 136, 204, .6)',
                            borderColor: '#F5F5F5',
                            borderWidth: 1
                        }, {
                            label: '<?php echo translate("remaining"); ?>',
                            data: total_due,
                            backgroundColor: 'rgba(204, 102, 102, .6)',
                            borderColor: '#F5F5F5',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        circumference: Math.PI,
                        tooltips: {
                            mode: 'index',
                            bodySpacing: 4
                        },
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        },
                        scales: {
                            xAxes: [{
                                scaleLabel: {
                                    display: false
                                }
                            }],
                            yAxes: [{
                                stacked: true,
                                scaleLabel: {
                                    display: false,
                                }
                            }]
                        }
                    }
                });

                //annual attendance overview of students
                var total_present = <?php echo json_encode($get_student_attendance['total_present']); ?>;
                var total_absent = <?php echo json_encode($get_student_attendance['total_absent']); ?>;
                var total_late = <?php echo json_encode($get_student_attendance['total_late']); ?>;

                var ctx = document.getElementById('attendance_overview').getContext('2d');
                var attendance_overview = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: '<?php echo translate("total_present"); ?>',
                            data: total_present,
                            backgroundColor: 'rgba(71, 164, 71, .6)',
                            borderColor: '#F5F5F5',
                            borderWidth: 1,
                            fill: false,
                        }, {
                            label: '<?php echo translate("total_absent"); ?>',
                            data: total_absent,
                            backgroundColor: 'rgba(210, 50, 45, .6)',
                            borderColor: '#F5F5F5',
                            borderWidth: 1,
                            fill: false,
                        }, {
                            label: '<?php echo translate("total_late"); ?>',
                            data: total_late,
                            backgroundColor: 'rgba(91, 192, 222, .6)',
                            borderColor: '#F5F5F5',
                            borderWidth: 1,
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        circumference: Math.PI,
                        tooltips: {
                            mode: 'index',
                            bodySpacing: 4
                        },
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        },
                        scales: {
                            xAxes: [{
                                scaleLabel: {
                                    display: false
                                }
                            }],
                            yAxes: [{
                                scaleLabel: {
                                    display: false,
                                }
                            }]
                        }
                    }
                });

                function view_event(id) {
                    $.ajax({
                        url: "<?= base_url('event/getDetails') ?>",
                        type: 'POST',
                        data: {
                            event_id: id
                        },
                        success: function(data) {
                            $('#ev_table').html(data);
                            mfp_modal('#modal');
                        }
                    });
                }
            })(jQuery);
        </script>
    <?php endif; ?>
<?php } else { ?>
    <div class="alert alert-danger">
        <?php echo $this->saas_model->getSubscriptionsExpiredNotification(); ?>
    </div>
<?php } ?>
<script>
    document.getElementById("copy-admission").addEventListener("click", function() {
        let admissionNumber = document.getElementById("admission-number").innerText;
        let copyIcon = document.getElementById("copy-admission");
        let originalHTML = copyIcon.outerHTML; // Save original SVG icon

        navigator.clipboard.writeText(admissionNumber).then(() => {
            // Change the icon to "Copied!" text
            copyIcon.outerHTML = `<span id="copied-text" style="color: #16a34a; font-weight: bold;">Copied!</span>`;

            // Restore the icon after 1.5 seconds
            setTimeout(() => {
                document.getElementById("copied-text").outerHTML = originalHTML;
                addCopyEventListener(); // Reattach event listener
            }, 1500);
        }).catch(err => {
            console.error("Failed to copy: ", err);
        });
    });

    // Function to reattach event listener after restoring the icon
    function addCopyEventListener() {
        document.getElementById("copy-admission").addEventListener("click", function() {
            let admissionNumber = document.getElementById("admission-number").innerText;
            navigator.clipboard.writeText(admissionNumber).then(() => {
                let copyIcon = document.getElementById("copy-admission");
                let originalHTML = copyIcon.outerHTML;
                copyIcon.outerHTML = `<span id="copied-text" style="color: #16a34a; font-weight: bold;">Copied!</span>`;

                setTimeout(() => {
                    document.getElementById("copied-text").outerHTML = originalHTML;
                    addCopyEventListener();
                }, 1500);
            });
        });
    }
</script>