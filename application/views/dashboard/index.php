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
                    Welcome Back, 
                    <span class="cdev-user-name">
                        <?php echo $this->session->userdata('name'); ?>
                    </span>
                </h1>
                <p class="cdev-subtitle">Have a good day at work</p>
            </div>
        </div>

        <div class="cdev-header-actions">
            <?php if (get_permission('student_attendance', 'is_add')): ?>
            <a href="<?php echo base_url('attendance/student_entry'); ?>" class="cdev-action-btn">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M10.5 14L17 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M7 14H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M7 10.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M7 17.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M10.5 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M10.5 17.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        </g>
                                    </svg><span>Take Class Attendance</span>
            </a>
			<?php endif; ?>
			<?php if (get_permission('student', 'is_add')): ?>
            <a href="<?php echo base_url('student/add'); ?>" class="cdev-action-btn">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M19.8284 3.17157C18.6569 2 16.7712 2 13 2H11C7.22876 2 5.34315 2 4.17157 3.17157C3 4.34315 3 6.22876 3 10V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg>
                <span>Register New Student</span>
            </a>
			<?php endif; ?>
        </div>
    </div>
</div>
<div class="row" style="margin-bottom:10px">
            <div class="col-md-12">
                <div class="cdev-dashboard-buttons">
                    <a href="<?=base_url('userrole/homework')?>" class="cdev-dashboard-btn pay-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 10.9112C3 10.8182 3 10.7717 3.00057 10.7303C3.0385 7.98021 4.94139 5.60803 7.61778 4.97443C7.65803 4.9649 7.70344 4.95481 7.79425 4.93463C7.87787 4.91605 7.91968 4.90675 7.96109 4.89775C10.6226 4.31875 13.3774 4.31875 16.0389 4.89775C16.0803 4.90675 16.1221 4.91605 16.2057 4.93463C16.2966 4.95481 16.342 4.9649 16.3822 4.97443C19.0586 5.60803 20.9615 7.98021 20.9994 10.7303C21 10.7717 21 10.8182 21 10.9112V16.3752C21 18.4931 19.529 20.3269 17.4615 20.7864C13.8644 21.5857 10.1356 21.5857 6.53853 20.7864C4.47101 20.3269 3 18.4931 3 16.3752V10.9112Z" stroke="currentColor" stroke-width="1.5"></path> <path opacity="0.5" d="M17.5 15.5V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M15.9585 4.5C15.7205 3.08114 14.4865 2 13 2H11C9.51353 2 8.27954 3.08114 8.0415 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M3 14C8.72979 16.5466 15.2702 16.5466 21 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M10 13H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        <?=translate('homework')?>
                    </a>
                    <a href="<?=base_url('userrole/online_exam')?>" class="cdev-dashboard-btn exam-result"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6.44 2H17.55C21.11 2 22 2.89 22 6.44V12.77C22 16.33 21.11 17.21 17.56 17.21H6.44C2.89 17.22 2 16.33 2 12.78V6.44C2 2.89 2.89 2 6.44 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 17.22V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 13H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.5 22H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <?=translate('online_exam')?>
                    </a>
					<a href="<?=base_url('userrole/class_schedule')?>" class="cdev-dashboard-btn attendance"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="currentColor"></path> </g></svg>
                        <span><?=translate('class_schedule')?></span>
                    </a>
                    <a href="<?=base_url('userrole/report_card')?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M6 15.8L7.14286 17L10 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 8.8L7.14286 10L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 9L18 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16L18 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        <?=translate('report_card')?>
                    </a> <a href="<?=base_url('userrole/report_card')?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M6 15.8L7.14286 17L10 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 8.8L7.14286 10L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 9L18 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16L18 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        <?=translate('report_card')?>
                    </a>
                </div>
            </div>
        </div>
<?php
$div = 0;
if (get_permission('employee_count_widget', 'is_view')) {
	$div++;	
}
if (get_permission('student_count_widget', 'is_view')) {
	$div++;	
}
if (get_permission('parent_count_widget', 'is_view')) {
	$div++;	
}
if (get_permission('teacher_count_widget', 'is_view')) {
	$div++;	
}
if ($div == 0) {
	$widget1 = 0;
}else{
	$widget1 = 12 / $div;
}

$div2 = 0;
if (get_permission('admission_count_widget', 'is_view')) {
	$div2++;	                                                              
}
if (get_permission('voucher_count_widget', 'is_view')) {
	$div2++;	
}
if (get_permission('transport_count_widget', 'is_view') && moduleIsEnabled('transport')) {
	$div2++;	
}
if (get_permission('hostel_count_widget', 'is_view') && moduleIsEnabled('hostel')) {
	$div2++;	
}
if ($div2 == 0) {
	$widget2 = 0;
}else{
	$widget2 = 12 / $div2;
}

$div3 = 12;
if (get_permission('student_birthday_widget', 'is_view') || get_permission('staff_birthday_widget', 'is_view')) {
	$div3 = 9;	
}
?>
<?php if ($sqlMode == true) { ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle"></i> This School management system may not work properly because "ONLY_FULL_GROUP_BY" is enabled, <strong>Strongly recommended</strong> - consult with your hosting provider to disable "ONLY_FULL_GROUP_BY" in sql_mode configuration.
    </div>
<?php } ?>

<?php 
if (!is_superadmin_loggedin()) {
	if (!empty($this->saas_model->getSubscriptionsExpiredNotification())) { ?>
    <div class="alert alert-danger">
        <?php echo $this->saas_model->getSubscriptionsExpiredNotification(); ?>
    </div>
<?php } } ?>

<div class="dashboard-page">
<?php if ($widget1 > 0) { ?> 
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="panel">
				<div class="row widget-row-in">
				
				<!-- Students First -->
				<?php if (get_permission('student_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget1; ?> col-sm-6">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> 
									<svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path><path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path><path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path><path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path><path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path></g></svg>
									<h5><?php echo translate('students'); ?></h5> 
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?=$get_total_student?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?php echo translate('total_strength'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>

				<!-- Parents Second -->
				<?php if (get_permission('parent_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget1; ?> col-sm-6">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> 
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="38px" height="38px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1,
                                                .cls-2 {
                                                    fill: none;
                                                    stroke: currentColor;
                                                    stroke-linecap: round;
                                                    stroke-width: 1.5px;
                                                }

                                                .cls-1 {
                                                    stroke-linejoin: round;
                                                }

                                                .cls-2 {
                                                    stroke-linejoin: bevel;
                                                }
                                            </style>
                                        </defs>
                                        <g id="ic-users-more">
                                            <path class="cls-1" d="M3,21l.79-2.88C5.1,13.39,8.55,11,12,11"></path>
                                            <circle class="cls-2" cx="12" cy="5.98" r="5"></circle>
                                            <circle class="cls-1" cx="17" cy="18" r="5"></circle>
                                            <circle class="cls-1" cx="17" cy="18" r="0.21"></circle>
                                            <circle class="cls-1" cx="14.35" cy="18" r="0.21"></circle>
                                            <circle class="cls-1" cx="19.48" cy="18" r="0.21"></circle>
                                        </g>
                                    </g>
                                </svg>
									<h5><?php echo translate('parents'); ?></h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?php
										if (!empty($school_id))
											$this->db->where('branch_id', $school_id);
										echo $this->db->select('id')->get('parent')->num_rows();
									?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?php echo translate('total_strength'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
<!-- Teachers (Remained Unchanged) -->
<?php if (get_permission('teacher_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget1; ?> col-sm-6">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> 
								<svg fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 299.97 299.97" xml:space="preserve" width="40px" height="40px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M149.985,126.898c34.986,0,63.449-28.463,63.449-63.449C213.435,28.463,184.971,0,149.985,0S86.536,28.463,86.536,63.449 C86.536,98.436,114.999,126.898,149.985,126.898z M149.985,15.15c26.633,0,48.299,21.667,48.299,48.299 s-21.667,48.299-48.299,48.299s-48.299-21.667-48.299-48.299S123.353,15.15,149.985,15.15z"></path>
                                                    <path d="M255.957,271.919l-20.807-86.313c-2.469-10.244-11.553-17.399-22.093-17.399c-13.216,0-114.332,0-126.145,0 c-10.538,0-19.623,7.155-22.093,17.399l-20.807,86.313c-3.444,14.289,7.377,28.051,22.093,28.051h167.76 C248.563,299.97,259.407,286.229,255.957,271.919z M66.105,284.82c-4.898,0-8.513-4.581-7.364-9.35l20.807-86.314 c0.823-3.415,3.851-5.799,7.365-5.799H121.4l-9.553,67.577c-0.283,2,0.244,4.029,1.464,5.637l21.422,28.249H66.105z M127.291,249.932l9.411-66.574h26.567l9.411,66.574l-22.695,29.927L127.291,249.932z M233.865,284.82h-68.628l21.421-28.248 c1.22-1.609,1.747-3.638,1.464-5.637l-9.553-67.577h34.487c3.513,0,6.542,2.385,7.365,5.8l20.807,86.313 C242.377,280.235,238.769,284.82,233.865,284.82z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
									<h5><?php echo translate('teachers'); ?></h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?php
										$staff = $this->dashboard_model->getstaffcounter(3, $school_id);
										echo $staff['snumber'];
									?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?=translate('total_strength')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- Employees Last -->
				<?php if (get_permission('admission_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget2; ?> col-sm-6 ">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6">   <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="36px" height="38px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M19.8284 3.17157C18.6569 2 16.7712 2 13 2H11C7.22876 2 5.34315 2 4.17157 3.17157C3 4.34315 3 6.22876 3 10V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg>
									<h5><?php echo translate('admission'); ?></h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?=$get_monthly_admission;?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?php echo translate('interval_month'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>

				
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<!-- student quantity chart -->
<div class="row">
<?php if (get_permission('student_quantity_pie_chart', 'is_view')) { ?>
		<div class="<?php echo get_permission('weekend_attendance_inspection_chart', 'is_view') ? 'col-md-12 col-lg-4 col-xl-3' : 'col-md-12'; ?>">
			<section class="panel pg-fw">
				<div class="panel-body">
					<h4 class="chart-title mb-xs"><?=translate('student_quantity')?></h4>
					<div id="student_strength"></div>
					<div class="round-overlap"><svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path><path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path><path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path><path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path><path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path></g></svg></div>
				</div>
			</section>
		</div>
<?php } ?>
<?php if (get_permission('weekend_attendance_inspection_chart', 'is_view')) { ?>
		<div class="<?php echo get_permission('student_quantity_pie_chart', 'is_view') ? 'col-md-12 col-lg-8 col-xl-9' : 'col-md-12'; ?>">
			<section class="panel">
				<div class="panel-body">
					<h4 class="chart-title mb-md"><?=translate('weekend_attendance_inspection')?></h4>
					<div class="pg-fw">
						<canvas id="weekend_attendance" style="height: 340px;"></canvas>
					</div>
				</div>
			</section>
		</div>
<?php } ?>
	</div>
	
	<div class="row">
    <!-- event calendar -->
    <div class="col-md-<?php echo $div3 ?>">
        <section class="panel">
            <div class="panel-body">
                <div id="event_calendar"></div>
            </div>
        </section>
    </div>
       <!-- New Quick Actions Widget -->
<div class="col-md-3">
    <div class="panel">
        <div class="panel-body">
            <div class="widget-col-in row">
                <div class="col-xs-12">
                    <h5 class="text-muted mb-md">Quick Actions</h5>
                </div>
                <div class="quick-actions-grid">
                    <div class="col-xs-4 p-5">
                        <a href="#" class="quick-action-btn btn-primary">
                            <i class="fas fa-user-graduate fa-2x"></i>
                            <span>Students</span>
                        </a>
                    </div>
                    <div class="col-xs-4 p-5">
                        <a href="#" class="quick-action-btn btn-info">
                            <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            <span>Teachers</span>
                        </a>
                    </div>
                    <div class="col-xs-4 p-5">
                        <a href="#" class="quick-action-btn btn-success">
                            <i class="fas fa-book fa-2x"></i>
                            <span>Classes</span>
                        </a>
                    </div>
                    <div class="col-xs-4 p-5">
                        <a href="#" class="quick-action-btn btn-warning">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                            <span>Events</span>
                        </a>
                    </div>
                    <div class="col-xs-4 p-5">
                        <a href="#" class="quick-action-btn btn-danger">
                            <i class="fas fa-bullhorn fa-2x"></i>
                            <span>Notice</span>
                        </a>
                    </div>
                    <div class="col-xs-4 p-5">
                        <a href="#" class="quick-action-btn btn-purple">
                            <i class="fas fa-cog fa-2x"></i>
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<?php if ($div3 == 9) { ?>
		<div class="col-md-3">
			<div class="panel">
				<div class="row widget-row-in">
				<?php if (get_permission('student_birthday_widget', 'is_view')) { ?>
					<div class="col-xs-12">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> <a href="<?php echo base_url('birthday/student') ?>" data-toggle="tooltip" data-original-title="<?=translate('view') . " " . translate('list')?>"><i class="fas fa-birthday-cake" ></i></a>
									<h5 class="text-muted"><?=translate('student')?></h5></div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?php
										$this->db->select('student.id');
										$this->db->from('student');
										$this->db->join('enroll', 'enroll.student_id = student.id', 'inner');
										$this->db->where("enroll.session_id", get_session_id());
										if (!empty($school_id))
											$this->db->where('branch_id', $school_id);
										$this->db->where("MONTH(student.birthday)", date('m'));
										$this->db->where("DAY(student.birthday)", date('d'));
										$this->db->group_by('student.id'); 
										$stuTodayBirthday = $this->db->get()->result();
										echo(count($stuTodayBirthday));
										?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-muted text-uppercase"><?=translate('today_birthday')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } if (get_permission('staff_birthday_widget', 'is_view')) { ?>
					<div class="col-xs-12">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> <a href="<?php echo base_url('birthday/staff') ?>" data-toggle="tooltip" data-original-title="<?=translate('view') . " " . translate('list')?>"><i class="fas fa-birthday-cake" ></i></a>
									<h5 class="text-muted"><?=translate('employee')?></h5></div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?php
										$this->db->select('id');
										if (!empty($school_id))
											$this->db->where('branch_id', $school_id);
										$this->db->where("MONTH(birthday)", date('m'));
										$this->db->where("DAY(birthday)", date('d'));
										$emyTodayBirthday = $this->db->get('staff')->result();
										echo(count($emyTodayBirthday));
										?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-muted text-uppercase"><?=translate('today_birthday')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>

<div class="row">
<?php if (get_permission('monthly_income_vs_expense_chart', 'is_view')) { ?>
		<!-- monthly cash book transaction -->
		<div class="<?php echo get_permission('annual_student_fees_summary_chart', 'is_view') ? 'col-md-12 col-lg-4 col-xl-3' : 'col-md-12'; ?>">
			<section class="panel pg-fw">
				<div class="panel-body">
					<h4 class="chart-title mb-xs"><?=translate('income_vs_expense_of') . " " . translate(strtolower(date('F')))?></h4>
					<div id="cash_book_transaction"></div>
					<div class="round-overlap"><i class="fab fa-sellcast"></i></div>
					<div class="text-center">
						<ul class="list-inline">
							<li>
								<h6 class="text-muted"><i class="fa fa-circle text-blue"></i> <?=translate('income')?></h6>
							</li>
							<li>
								<h6 class="text-muted"><i class="fa fa-circle text-danger"></i> <?=translate('expense')?></h6>
							</li>
						</ul>
					</div>
				</div>
			</section>
		</div>
<?php } ?>
<?php if (get_permission('annual_student_fees_summary_chart', 'is_view')) { ?>
		<!-- student fees summary graph -->
		<div class="<?php echo get_permission('monthly_income_vs_expense_chart', 'is_view') ? 'col-md-12 col-lg-8 col-xl-9' : 'col-md-12'; ?>">
			<section class="panel">
				<div class="panel-body">
					<h4 class="chart-title mb-md"><?=translate('annual_fee_summary')?></h4>
					<div class="pe-chart">
						<canvas id="fees_graph" style="height: 322px;"></canvas>
					</div>
				</div>
			</section>
		</div>
<?php } ?>
	</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-btn">
				<button onclick="fn_printElem('printResult')" class="btn btn-default btn-circle icon" ><i class="fas fa-print"></i></button>
			</div>
			<h4 class="panel-title"><i class="fas fa-info-circle"></i> <?=translate('event_details')?></h4>
		</header>
		<div class="panel-body">
			<div id="printResult" class=" pt-sm pb-sm">
				<div class="table-responsive">						
					<table class="table table-bordered table-condensed text-dark tbr-top" id="ev_table">
						
					</table>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default modal-dismiss">
						<?=translate('close')?>
					</button>
				</div>
			</div>
		</footer>
	</section>
</div>

<script type="application/javascript">
(function($) {
	$('#event_calendar').fullCalendar({
		header: {
		left: 'prev,next,today',
		center: 'title',
			right: 'month,agendaWeek,agendaDay,listWeek'
		},
		firstDay: 1,
		height: 720,
		droppable: false,
		editable: true,
		timezone: 'UTC',
		lang: '<?php echo $language ?>',
		events: {
			url: "<?=base_url('event/get_events_list/'. $school_id)?>"
		},
		
		eventRender: function(event, element) {
			$(element).on("click", function() {
				viewEvent(event.id);
			});
			if(event.icon){          
				element.find(".fc-title").prepend("<i class='fas fa-"+event.icon+"'></i> ");
			}
		}
	});

	// Annual Fee Summary JS
	var total_fees = <?php echo json_encode($fees_summary["total_fee"]);?>;
	var total_paid = <?php echo json_encode($fees_summary["total_paid"]);?>;
	var total_due = <?php echo json_encode($fees_summary["total_due"]);?>;
	var feesGraph = {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: '<?php echo translate("total");?>',
				data: total_fees,
				backgroundColor: 'rgba(216, 27, 96, .6)',
				borderColor: '#F5F5F5',
				borderWidth: 1
			},{
				label: '<?php echo translate("collected");?>',
				data: total_paid,
				backgroundColor: 'rgba(0, 136, 204, .6)',
				borderColor: '#F5F5F5',
				borderWidth: 1
			},{
				label: '<?php echo translate("remaining");?>',
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
	}

	var days = <?php echo json_encode($weekend_attendance["days"]);?>;
	var employees_att = <?php echo json_encode($weekend_attendance["employee_att"]);?>;
	var student_att = <?php echo json_encode($weekend_attendance["student_att"]);?>;
	var weekendAttendanceChart = {
		type: 'bar',
		data: {
			labels: days,
			datasets: [{
				label: '<?php echo translate("employee");?>',
				data: employees_att,
				backgroundColor: 'rgba(0, 136, 204, .6)',
				borderColor: '#F5F5F5',
				borderWidth: 1,
				fill: false,
			},{
				label: '<?php echo translate("student");?>',
				data: student_att,
				backgroundColor: 'rgba(204, 102, 102, .6)',
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
	};

<?php if (get_permission('annual_student_fees_summary_chart', 'is_view')) { ?>
	var ctx = document.getElementById('fees_graph').getContext('2d');
	window.myLine =new Chart(ctx, feesGraph);
<?php } ?>
<?php if (get_permission('weekend_attendance_inspection_chart', 'is_view')) { ?>
	var ctx2 = document.getElementById('weekend_attendance').getContext('2d');
	window.myLine =new Chart(ctx2, weekendAttendanceChart);
<?php } ?>
<?php if (get_permission('monthly_income_vs_expense_chart', 'is_view')) { ?>
	// monthly income vs expense chart
	var cash_book_transaction = document.getElementById("cash_book_transaction");
	var cashbookchart = echarts.init(cash_book_transaction);
	cashbookchart.setOption({
		tooltip: {
			trigger: 'item',
			formatter: "{a} <br/>{b} : <?php echo $global_config["currency_symbol"];?> {c} ({d}%)"
		}, 
		legend: {
			show: false
		},
		color: ["#d81b60", "#009efb"],
		series: [{
			name: 'Transaction',
			type: 'pie',
			radius: ['75%', '90%'],
			itemStyle: {
				normal: {
					label: {
						show: false
					},
					labelLine: {
						show: false
					}
				},
				emphasis: {
					label: {
						show: false
					}
				}
			},
			data: <?=json_encode($income_vs_expense)?>
		}]
	});
<?php } ?>
<?php if (get_permission('student_quantity_pie_chart', 'is_view')) { ?>
	// Student Strength Doughnut Chart
	var color = ['#546570', '#c4ccd3', '#c23531', '#2f4554', '#61a0a8', '#d48265', '#91c7ae', '#749f83',  '#ca8622', '#bda29a', '#6e7074'];
	var strength_data = <?php echo json_encode($student_by_class);?>;
	var student_strength = document.getElementById("student_strength");
	var studentchart = echarts.init(student_strength);
	studentchart.setOption( {
		tooltip: {
			trigger: 'item',
			formatter: "{a} <br/>{b} : {c} ({d}%)"
		}, 
		legend: {
			type: 'scroll',
			x: 'center',
			y: 'bottom',
			itemWidth: 14,
<?php if($theme_config["dark_skin"] == "true"): ?>
			inactiveColor: '#4b4b4b',
			textStyle: {
				color: '#6b6b6c'
			}
<?php endif; ?>
		},
		series: [{
			name: 'Strength',
			type: 'pie',
			color: color,
			radius: ['70%', '85%'],
			center: ['50%', '46%'],
			itemStyle: {
				normal: {
					label: {
						show: false
					},
					labelLine: {
						show: false
					}
				},
				emphasis: {
					label: {
						show: false
					}
				}
			},
			data: strength_data
		}]
	});
<?php } ?>
	// charts resize
	$(".sidebar-toggle").on("click",function(event){
		echartsresize();
	});

	$(window).on("resize", echartsresize);

	function echartsresize() {
		setTimeout(function () {
			if ($("#student_strength").length) {
				studentchart.resize();
			}
			if ($("#cash_book_transaction").length) {
				cashbookchart.resize();
			}
		}, 350);
	}
})(jQuery);
</script>