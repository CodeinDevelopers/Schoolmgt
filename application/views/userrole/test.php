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
                        Welcome To 
                        <span class="cdev-user-name">
                            <?php 
                                if (isset($student_name) && !empty($student_name)) {
                                    echo $student_name;
                                }
                            ?>'s
                        </span> Dashboard
                    </h1>
                    <p class="cdev-subtitle">Welcome to your Dashboard</p>
                </div>
            </div>

            <div class="cdev-header-actions">
                <?php if (is_parent_loggedin()) { ?>
                  <a href="<?=base_url('parents/my_children')?>" class="cdev-action-btn"><svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path><path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path><path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path><path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path><path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path></g></svg> <span><?php echo translate('switch_child'); ?></span>
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
                            <?php 
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
                            <a href="<?php echo base_url('userrole/invoice#history'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14 16L16.1 18.5L20 13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10 14H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 18H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M3 6L13.5 6M20 6L17.75 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M20 10L9.5 10M3 10H5.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                <span><?php echo translate('view_payment_history'); ?></span>
                            </a>
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
        <div class="row">
            <div class="col-md-12">
                <div class="cdev-dashboard-buttons">
                    <a href="<?=base_url('userrole/homework')?>" class="cdev-dashboard-btn pay-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 10.9112C3 10.8182 3 10.7717 3.00057 10.7303C3.0385 7.98021 4.94139 5.60803 7.61778 4.97443C7.65803 4.9649 7.70344 4.95481 7.79425 4.93463C7.87787 4.91605 7.91968 4.90675 7.96109 4.89775C10.6226 4.31875 13.3774 4.31875 16.0389 4.89775C16.0803 4.90675 16.1221 4.91605 16.2057 4.93463C16.2966 4.95481 16.342 4.9649 16.3822 4.97443C19.0586 5.60803 20.9615 7.98021 20.9994 10.7303C21 10.7717 21 10.8182 21 10.9112V16.3752C21 18.4931 19.529 20.3269 17.4615 20.7864C13.8644 21.5857 10.1356 21.5857 6.53853 20.7864C4.47101 20.3269 3 18.4931 3 16.3752V10.9112Z" stroke="currentColor" stroke-width="1.5"></path> <path opacity="0.5" d="M17.5 15.5V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M15.9585 4.5C15.7205 3.08114 14.4865 2 13 2H11C9.51353 2 8.27954 3.08114 8.0415 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M3 14C8.72979 16.5466 15.2702 16.5466 21 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M10 13H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        <?=translate('homework')?>
                    </a>
                    <a href="<?=base_url('userrole/online_exam')?>" class="cdev-dashboard-btn exam-result"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6.44 2H17.55C21.11 2 22 2.89 22 6.44V12.77C22 16.33 21.11 17.21 17.56 17.21H6.44C2.89 17.22 2 16.33 2 12.78V6.44C2 2.89 2.89 2 6.44 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 17.22V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 13H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.5 22H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <?=translate('online_exam')?>
                    </a>
                    <a href="<?=base_url('userrole/report_card')?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M6 15.8L7.14286 17L10 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 8.8L7.14286 10L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 9L18 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16L18 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        <?=translate('report_card')?>
                    </a>
                    <a href="<?=base_url('userrole/class_schedule')?>" class="cdev-dashboard-btn attendance"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="currentColor"></path> </g></svg>
                        <span><?=translate('class_schedule')?></span>
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
                    <h3 class="cdev-card-title"><i class="fas fa-calendar-check"></i> 
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
                        <a href="<?php echo base_url('student/attendance_details'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 6L21 6.00072M11 12L21 12.0007M11 18L21 18.0007M3 11.9444L4.53846 13.5L8 10M3 5.94444L4.53846 7.5L8 4M4.5 18H4.51M5 18C5 18.2761 4.77614 18.5 4.5 18.5C4.22386 18.5 4 18.2761 4 18C4 17.7239 4.22386 17.5 4.5 17.5C4.77614 17.5 5 17.7239 5 18Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <span><?php echo translate('view_attendance_details'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Annual fee summary graph -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                    <h4 class="chart-title mb-md"><?=translate('my_annual_fee_summary')?></h4>
                    <div class="pg-fw">
                        <canvas id="fees_graph" style="height:340px;"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Annual attendance overview -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                    <h4 class="chart-title mb-md"><?=translate('my_annual_attendance_overview')?></h4>
                    <div class="pg-fw">
                        <canvas id="attendance_overview" style="height:380px;"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </div>
