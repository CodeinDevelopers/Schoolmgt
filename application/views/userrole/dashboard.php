<!-- Modern Dashboard Header -->
<div class="ramom-modern-header">
    <div class="ramom-header-content">
        <div class="ramom-user-welcome">
            <div class="ramom-user-profile">
                <?php
                $profile_image = get_image_url('staff', $this->session->userdata('photo'));
                ?>
                <img src="<?php echo $profile_image; ?>" alt="User Image" class="ramom-profile-img">
            </div>
            <div class="ramom-user-info">
                <h1 class="ramom-welcome-text">
                    Welcome Back, 
                    <span class="ramom-user-name">
                        <?php echo $this->session->userdata('name'); ?>
                    </span>
                </h1>
                <p class="ramom-subtitle">Have a good day at work</p>
            </div>
        </div>

        <div class="ramom-header-actions">
		<?php if (is_parent_loggedin()) { ?>
			<a href="<?=base_url('parents/my_children')?>" class="ramom-action-btn">
        <span>Select Child</span>
    </a>
<?php } ?>
			<?php if (get_permission('student', 'is_add')): ?>
            <a href="<?php echo base_url('student/add'); ?>" class="ramom-action-btn">
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
			<?php if (get_permission('question_bank', 'is_view')): ?>
			<a href="<?php echo base_url('onlineexam/question'); ?>" class="ramom-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="28px" height="28px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.5 7.5H16.1C16.9401 7.5 17.3601 7.5 17.681 7.66349C17.9632 7.8073 18.1927 8.03677 18.3365 8.31901C18.5 8.63988 18.5 9.05992 18.5 9.9V17.5C18.5 18.6046 17.6046 19.5 16.5 19.5V19.5C15.3954 19.5 14.5 18.6046 14.5 17.5V7.7C14.5 6.57989 14.5 6.01984 14.282 5.59202C14.0903 5.21569 13.7843 4.90973 13.408 4.71799C12.9802 4.5 12.4201 4.5 11.3 4.5H7.7C6.57989 4.5 6.01984 4.5 5.59202 4.71799C5.21569 4.90973 4.90973 5.21569 4.71799 5.59202C4.5 6.01984 4.5 6.5799 4.5 7.7V16.3C4.5 17.4201 4.5 17.9802 4.71799 18.408C4.90973 18.7843 5.21569 19.0903 5.59202 19.282C6.01984 19.5 6.5799 19.5 7.7 19.5H16.5" stroke="currentColor"></path> <path d="M11 6.5H8C7.53406 6.5 7.30109 6.5 7.11732 6.57612C6.87229 6.67761 6.67761 6.87229 6.57612 7.11732C6.5 7.30109 6.5 7.53406 6.5 8C6.5 8.46594 6.5 8.69891 6.57612 8.88268C6.67761 9.12771 6.87229 9.32239 7.11732 9.42388C7.30109 9.5 7.53406 9.5 8 9.5H11C11.4659 9.5 11.6989 9.5 11.8827 9.42388C12.1277 9.32239 12.3224 9.12771 12.4239 8.88268C12.5 8.69891 12.5 8.46594 12.5 8C12.5 7.53406 12.5 7.30109 12.4239 7.11732C12.3224 6.87229 12.1277 6.67761 11.8827 6.57612C11.6989 6.5 11.4659 6.5 11 6.5Z" stroke="currentColor"></path> <path d="M6.5 11.5H12.5" stroke="currentColor" stroke-linecap="round"></path> <path d="M6.5 13.5H12.5" stroke="currentColor" stroke-linecap="round"></path> <path d="M6.5 15.5H12.5" stroke="currentColor" stroke-linecap="round"></path> <path d="M6.5 17.5H10.5" stroke="currentColor" stroke-linecap="round"></path> </g></svg>
                <span>Question Bank</span>
            </a>
            <?php endif; ?>
            <a href="<?php echo base_url('authentication/logout'); ?>" class="ramom-action-btn ramom-logout-btn">
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="25px" height="25px" style="display: inline-block; vertical-align: middle;" aria-hidden="true><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1,.cls-2{fill:none;stroke:currentColor;stroke-linecap:round;stroke-width:1.5px;}.cls-1{stroke-linejoin:round;}.cls-2{stroke-linejoin:bevel;}</style> </defs> <g id="ic-actions-log-out"> <path class="cls-1" d="M15.71,15v4a2,2,0,0,1-2,2h-6a2,2,0,0,1-2-2V5a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2V9"></path> <line class="cls-2" x1="12.5" y1="11.95" x2="22.5" y2="11.95"></line> <path class="cls-2" d="M18.82,8l3.44,3.44a.83.83,0,0,1,0,1.18L18.88,16"></path> </g> </g></svg>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>
<?php 
if ($this->saas_model->checkSubscriptionValidity()) { ?>
<?php if (empty($student_id)): ?>
	<div>
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
            <img src="<?php echo get_image_url('student', $row->photo);?>" alt="Student Photo">
        </div>
        
        <div class="profile-details">
            <h2 class="student-name">
                <?=html_escape($row->first_name . " " . $row->last_name)?>
            </h2>
            <p class="student-type"><?=translate('my_child')?></p>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('class')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span><?=html_escape($row->class_name)?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('roll')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span><?=html_escape($row->roll)?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('register_no')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span><?=html_escape($row->register_no)?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('birthday')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M21 15.5a3 3 0 01-3 3h-12a3 3 0 01-3-3m18 0v-2a3 3 0 00-3-3H6a3 3 0 00-3 3v2m18 0l-3-3m3 3l-3 3" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span><?=_d($row->birthday)?></span>
                </div>
            </div>
        </div>
        
        <div class="action-area">
            <a href="<?=base_url('parents/select_child/' . $row->enroll_id);?>" 
               class="dashboard-button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <?=translate('dashboard')?>
            </a>
        </div>
    </div>
</div>
		<?php endforeach; } else { ?>
			<div class="alert alert-subl text-center">
				<strong><i class="fas fa-exclamation-triangle"></i> <?=translate('no_child_was_found')?></strong>
			</div>
		<?php } ?>
	</div>
<?php
else :
    $book_issued = $this->dashboard_model->getMonthlyBookIssued($student_id);
    $get_monthly_payment = $this->dashboard_model->getMonthlyPayment($student_id);
    $fees_summary = $this->dashboard_model->annualFeessummaryCharts($school_id, $student_id);
    $get_student_attendance = $this->dashboard_model->getStudentAttendance($student_id);
    $get_monthly_attachments = $this->dashboard_model->get_monthly_attachments($student_id);
?>

<div class="dashboard-page">
	<div class="row">
		<!-- annual fees summary of students graph -->
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

	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="panel">
			<div class="panel-body">
				<div class="row widget-row-in">
					<div class="col-lg-3 col-sm-6 widget-row-d-br">
						<div class="widget-col-in row">
							<div class="col-md-6 col-sm-6 col-xs-6"> <i class="fas fa-book-reader"></i>
								<h5 class="text-muted"><?=translate('book_issued')?></h5>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3 class="counter text-right mt-md text-primary">
									<?=$book_issued?>
								</h3>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="box-top-line line-color-primary">
									<span class="text-muted text-uppercase"><?=translate('interval_month')?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 widget-row-d-br b-r-none">
						<div class="widget-col-in row">
							<div class="col-md-6 col-sm-6 col-xs-6"> <i class="fas fa-cloud-download-alt"></i>
								<h5 class="text-muted"><?=translate('attachments')?></h5> </div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3 class="counter text-right text-primary">
									<?=$get_monthly_attachments?>
								</h3>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="box-top-line line-color-primary">
										<span class="text-muted text-uppercase"><?=translate('interval_month')?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 widget-row-d-br">
						<div class="widget-col-in row">
							<div class="col-md-6 col-sm-6 col-xs-6"> <i class="far fa-money-bill-alt" ></i>
								<h5 class="text-muted"><?=translate('fees_payment')?></h5></div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3 class="counter text-right mt-md text-primary">
									<?=$get_monthly_payment?>
								</h3>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="box-top-line line-color-primary">
									<span class="text-muted text-uppercase"><?=translate('interval_month');?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="widget-col-in row">
							<div class="col-md-6 col-sm-6 col-xs-6"> <i class="fas fa-bullhorn"></i>
								<h5 class="text-muted"><?=translate('events')?></h5>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3 class="counter text-right mt-md text-primary">
									<?php
										$this->db->from('event');
										$this->db->where('start_date BETWEEN DATE_SUB(CURDATE() ,INTERVAL 1 MONTH) AND CURDATE() AND branch_id = "'. get_loggedin_branch_id() .'"');
								    	echo $this->db->get()->num_rows();				
									?>
								</h3>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="box-top-line line-color-primary">
										<span class="text-muted text-uppercase"><?=translate('interval_month') ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

	<!-- annual attendance overview of students -->
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
			<h4 class="panel-title"><i class="fas fa-info-circle"></i> <?=translate('event_details')?></h4>
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
						<?=translate('close')?>
					</button>
				</div>
			</div>
		</footer>
	</section>
</div>

<script type="application/javascript">
	(function($) {
		"use strict";
		
		// event calendar
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
	        events: {
	            url: "<?=base_url('event/get_events_list');?>"
	        },
			buttonText: {
				today:    'Today',
				month:    'Month',
				week:     'Week',
				day:      'Day',
				list:     'List'
			},
			eventRender: function(event, element) {
				$(element).on("click", function() {
	                view_event(event.id);
	            });
				if(event.icon){          
					element.find(".fc-title").prepend("<i class='fas fa-"+event.icon+"'></i> ");
				}
			}
		});

		// Own Annual Fee Summary JS
		var total_fees = <?php echo json_encode($fees_summary['total_fee']);?>;
		var total_paid = <?php echo json_encode($fees_summary['total_paid']);?>;
		var total_due = <?php echo json_encode($fees_summary['total_due']);?>;
		var ctx = document.getElementById('fees_graph').getContext('2d');
		var fees_graph = new Chart(ctx, {
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
		});

		//annual attendance overview of students
		var total_present = <?php echo json_encode($get_student_attendance['total_present']);?>;
		var total_absent = <?php echo json_encode($get_student_attendance['total_absent']);?>;
		var total_late = <?php echo json_encode($get_student_attendance['total_late']);?>;

		var ctx = document.getElementById('attendance_overview').getContext('2d');
		var attendance_overview = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [{
					label: '<?php echo translate("total_present");?>',
					data: total_present,
					backgroundColor: 'rgba(71, 164, 71, .6)',
					borderColor: '#F5F5F5',
					borderWidth: 1,
					fill: false,
				},{
					label: '<?php echo translate("total_absent");?>',
					data: total_absent,
					backgroundColor: 'rgba(210, 50, 45, .6)',
					borderColor: '#F5F5F5',
					borderWidth: 1,
					fill: false,
				},{
					label: '<?php echo translate("total_late");?>',
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
				url: "<?=base_url('event/getDetails')?>",
				type: 'POST',
				data: {
					event_id: id
				},
				success: function (data) {
					$('#ev_table').html(data);
					mfp_modal('#modal');
				}
			});
		}
	})(jQuery);
</script>
<?php endif;?>
<?php } else { ?>
    <div class="alert alert-danger">
        <?php echo $this->saas_model->getSubscriptionsExpiredNotification(); ?>
    </div>
<?php } ?>