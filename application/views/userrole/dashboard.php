<?php 
if ($this->saas_model->checkSubscriptionValidity()) { ?>
<?php if (empty($student_id)): ?>
	<div class="row">
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
		<div class="col-md-12 mb-lg">
			<div class="profile-head">
				<div class="col-md-12 col-lg-4 col-xl-3">
					<div class="image-content-center user-pro">
						<div class="preview">
							<img src="<?php echo get_image_url('student', $row->photo);?>">
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-5 col-xl-5">
					<h5><?=html_escape($row->first_name . " " . $row->last_name)?></h5>
					<p><?=translate('my_child')?></p>
					<ul>
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('class')?>"><i class="fas fa-school"></i></div><?=html_escape($row->class_name).' ('.html_escape($row->section_name).')'?></li>
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('roll')?>"><i class="fas fa-award"></i></div><?=html_escape($row->roll)?></li>
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('register_no')?>"><i class="far fa-registered"></i></div><?=html_escape($row->register_no)?></li>
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('birthday')?>"><i class="fas fa-birthday-cake"></i></div><?=_d($row->birthday)?></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-3 col-xl-4">
					<a href="<?=base_url('parents/select_child/' . $row->enroll_id);?>" class="chil-shaw btn btn-primary btn-circle pull-right"><i class="fas fa-tachometer-alt"></i> <?=translate('dashboard')?></a>
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