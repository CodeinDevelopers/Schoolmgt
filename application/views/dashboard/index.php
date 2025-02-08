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
									<i class="fas fa-user-tie"></i>
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
									<i class="fas fa-chalkboard-teacher"></i>
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
								<div class="col-md-6 col-sm-6 col-xs-6"> <i class="far fa-address-card"></i>
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

	

	<div class="row">
	    <!-- event calendar -->
		<div class="col-md-<?php echo $div3 ?>">
			<section class="panel">
				<div class="panel-body">
					<div id="event_calendar"></div>
				</div>
			</section>
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