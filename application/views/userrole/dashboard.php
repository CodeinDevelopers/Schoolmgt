<?php if (empty($student_id)): ?>
	<div class="row">
		<?php
		$sessionID = get_session_id();
		$this->db->select('s.id,s.first_name,s.last_name,s.photo,s.register_no,s.birthday,e.class_id,e.section_id,e.roll,e.session_id,c.name as class_name,se.name as section_name');
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
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('class')?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22L2 22" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 22V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V22" stroke="#ffffff" stroke-width="1.5"></path> <path d="M21 22V11.5C21 10.0955 21 9.39331 20.6629 8.88886C20.517 8.67048 20.3295 8.48298 20.1111 8.33706C19.6067 8 18.9045 8 17.5 8" stroke="#ffffff" stroke-width="1.5"></path> <path d="M3 22V11.5C3 10.0955 3 9.39331 3.33706 8.88886C3.48298 8.67048 3.67048 8.48298 3.88886 8.33706C4.39331 8 5.09554 8 6.5 8" stroke="#ffffff" stroke-width="1.5"></path> <path d="M12 22V19" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 5H14" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 8H14" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 11H14" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 14H14" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg></div><?=html_escape($row->class_name).' ('.html_escape($row->section_name).')'?></li>
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('register_no')?>"><svg fill="#ffffff" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.44800000000000006" width="28px" height="28px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>id-card-vertical</title> <path d="M24 1.25h-16c-1.518 0.002-2.748 1.232-2.75 2.75v24c0.002 1.518 1.232 2.748 2.75 2.75h16c1.518-0.002 2.748-1.232 2.75-2.75v-24c-0.002-1.518-1.232-2.748-2.75-2.75h-0zM25.25 28c-0.001 0.69-0.56 1.249-1.25 1.25h-16c-0.69-0.001-1.249-0.56-1.25-1.25v-24c0.001-0.69 0.56-1.249 1.25-1.25h16c0.69 0.001 1.249 0.56 1.25 1.25v0zM16 10.544c0 0 0 0-0 0-1.455 0-2.635 1.18-2.635 2.635s1.18 2.635 2.635 2.635c1.455 0 2.635-1.18 2.635-2.635 0-0 0-0 0-0v0c-0.002-1.455-1.18-2.633-2.635-2.635h-0zM16 14.313c0 0 0 0-0 0-0.627 0-1.135-0.508-1.135-1.135s0.508-1.135 1.135-1.135c0.627 0 1.135 0.508 1.135 1.135 0 0 0 0 0 0v0c-0.001 0.627-0.508 1.134-1.135 1.135h-0zM12.157 21.439c0.049 0.012 0.106 0.018 0.163 0.018 0.357 0 0.655-0.251 0.728-0.585l0.001-0.005c0.309-1.366 1.512-2.371 2.951-2.371s2.642 1.005 2.947 2.351l0.004 0.020c0.076 0.34 0.375 0.59 0.732 0.59 0.414 0 0.75-0.336 0.75-0.75 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005c-0.46-2.046-2.262-3.552-4.416-3.552s-3.955 1.506-4.41 3.522l-0.006 0.030c-0.011 0.048-0.017 0.104-0.017 0.16 0 0.357 0.25 0.656 0.585 0.731l0.005 0.001zM22 25.277h-12c-0.414 0-0.75 0.336-0.75 0.75s0.336 0.75 0.75 0.75v0h12c0.414 0 0.75-0.336 0.75-0.75s-0.336-0.75-0.75-0.75v0zM14 6.75h4c0.414 0 0.75-0.336 0.75-0.75s-0.336-0.75-0.75-0.75v0h-4c-0.414 0-0.75 0.336-0.75 0.75s0.336 0.75 0.75 0.75v0z"></path> </g></svg> </div><?=html_escape($row->register_no)?></li>
						<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('birthday')?>"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="var(--ci-primary-color, #ffffff)" d="M422,226.067H312v-96H276A85.425,85.425,0,0,0,293.054,78.5c0-27.64-13.079-53.611-34.133-67.776l-8.932-6.01-8.931,6.01C220,24.891,206.925,50.861,206.925,78.5a85.425,85.425,0,0,0,17.059,51.566H184v96H90a58.066,58.066,0,0,0-58,58V464a32.036,32.036,0,0,0,32,32H448a32.036,32.036,0,0,0,32-32V284.067A58.066,58.066,0,0,0,422,226.067ZM249.989,45.542c6.99,8.684,11.065,20.466,11.065,32.959s-4.075,24.276-11.065,32.959C243,102.777,238.925,90.994,238.925,78.5S243,54.226,249.989,45.542ZM216,162.067h64v64H216Zm-152,122a26.03,26.03,0,0,1,26-26H422a26.03,26.03,0,0,1,26,26l0,31.577L426.4,325.175a33.284,33.284,0,0,1-26.809,0L362,308.588l-37.6,16.586a33.283,33.283,0,0,1-26.81,0L260,308.587,222.4,325.173a33.279,33.279,0,0,1-26.81,0L158,308.588l-37.593,16.585a33.279,33.279,0,0,1-26.81,0L64,312.117ZM448,464H64V347.093l16.678,7.358a65.355,65.355,0,0,0,52.644,0L158,343.563l24.679,10.888a65.353,65.353,0,0,0,52.643,0L260,343.563l24.677,10.888a65.351,65.351,0,0,0,52.642,0L362,343.563l24.678,10.889a65.354,65.354,0,0,0,52.641,0l8.693-3.835L448.02,464Z" class="ci-primary"></path> </g></svg></div><?=_d($row->birthday)?></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-3 col-xl-4">
					<a href="<?=base_url('parents/select_child/' . $row->id);?>" class="chil-shaw btn btn-primary btn-circle pull-right"><i class="fas fa-tachometer-alt"></i> <?=translate('dashboard')?></a>
				</div>
			</div>
		</div>
		<?php endforeach; } else {?>
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
				<button id="print" class="btn btn-default btn-circle icon"><i class="fas fa-print"></i></button>
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