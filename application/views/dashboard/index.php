<script src="https://cdn.tailwindcss.com"></script>
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

<div class="dashboard-container bg-gray-50 p-6 min-h-screen overflow-auto">
    <!-- Top Stats Grid -->
    <?php if ($widget1 > 0) { ?>
    <div class="stats-grid grid gap-6 mb-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <?php if (get_permission('employee_count_widget', 'is_view')) { ?>
        <div class="stat-card bg-white rounded-lg shadow-sm p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-x1 font-medium text-gray-500"><?php echo translate('employee'); ?></p>
                    <h2 class="text-4xl font-bold text-gray-900 mt-1">
                        <?php
                        $staff = $this->dashboard_model->getstaffcounter('', $school_id);
                        echo $staff['snumber'];
                        ?>
                    </h2>
                    <p class="text-x1 text-gray-600 mt-2"><?php echo translate('total_strength'); ?></p>
                </div>
                <div class="bg-blue-50 p-3 rounded-full">
                    <i class="fas fa-users text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if (get_permission('student_count_widget', 'is_view')) { ?>
        <div class="stat-card bg-white rounded-lg shadow-sm p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-x1 font-medium text-gray-500"><?php echo translate('students'); ?></p>
                    <h3 class="text-4xl font-bold text-gray-900 mt-1"><?=$get_total_student?></h3>
                    <p class="text-x1 text-gray-600 mt-2"><?php echo translate('total_strength'); ?></p>
                </div>
                <div class="bg-green-50 p-3 rounded-full">
                    <i class="fas fa-user-graduate text-green-500 text-xl"></i>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if (get_permission('parent_count_widget', 'is_view')) { ?>
        <div class="stat-card bg-white rounded-lg shadow-sm p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-x1 font-medium text-gray-500"><?php echo translate('parents'); ?></p>
                    <h3 class="text-4xl font-bold text-gray-900 mt-1">
                        <?php
                        if (!empty($school_id))
                            $this->db->where('branch_id', $school_id);
                        echo $this->db->select('id')->get('parent')->num_rows();
                        ?>
                    </h3>
                    <p class="text-x1 text-gray-600 mt-2"><?php echo translate('total_strength'); ?></p>
                </div>
                <div class="bg-purple-50 p-3 rounded-full">
                    <i class="fas fa-user-tie text-purple-500 text-xl"></i>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if (get_permission('teacher_count_widget', 'is_view')) { ?>
        <div class="stat-card bg-white rounded-lg shadow-sm p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-x1 font-medium text-gray-500"><?php echo translate('teachers'); ?></p>
                    <h3 class="text-4xl font-bold text-gray-900 mt-1">
                        <?php
                        $staff = $this->dashboard_model->getstaffcounter(3, $school_id);
                        echo $staff['snumber'];
                        ?>
                    </h3>
                    <p class="text-x1 text-gray-600 mt-2"><?php echo translate('total_strength'); ?></p>
                </div>
                <div class="bg-yellow-50 p-3 rounded-full">
                    <i class="fas fa-chalkboard-teacher text-yellow-500 text-xl"></i>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    <!-- Charts Grid -->
    <div class="charts-grid grid gap-6 mb-6">
        <?php if (get_permission('monthly_income_vs_expense_chart', 'is_view')) { ?>
        <div class="chart-card bg-white rounded-lg shadow-sm p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4">
                <?=translate('income_vs_expense_of') . " " . translate(strtolower(date('F')))?>
            </h4>
            <div id="cash_book_transaction" class="h-64"></div>
            <div class="flex items-center justify-center gap-4 mt-4">
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span>
                    <span class="text-sm text-gray-600"><?=translate('income')?></span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full bg-red-500 mr-2"></span>
                    <span class="text-sm text-gray-600"><?=translate('expense')?></span>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if (get_permission('annual_student_fees_summary_chart', 'is_view')) { ?>
        <div class="chart-card bg-white rounded-lg shadow-sm p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4"><?=translate('annual_fee_summary')?></h4>
            <div class="h-80">
                <canvas id="fees_graph"></canvas>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Student Stats and Weekend Attendance -->
    <div class="grid gap-6 mb-6 grid-cols-1 lg:grid-cols-3">
        <?php if (get_permission('student_quantity_pie_chart', 'is_view')) { ?>
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4"><?=translate('student_quantity')?></h4>
            <div id="student_strength" class="h-64"></div>
        </div>
        <?php } ?>

        <?php if (get_permission('weekend_attendance_inspection_chart', 'is_view')) { ?>
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4"><?=translate('weekend_attendance_inspection')?></h4>
            <div class="h-64">
                <canvas id="weekend_attendance"></canvas>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Calendar and Birthdays -->
    <div class="grid gap-6 grid-cols-1 lg:grid-cols-4">
        <div class="lg:col-span-3 bg-white rounded-lg shadow-sm p-6">
            <div id="event_calendar"></div>
        </div>

        <?php if ($div3 == 9) { ?>
        <div class="birthday-cards space-y-4">
            <?php if (get_permission('student_birthday_widget', 'is_view')) { ?>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500"><?=translate('student')?></h5>
                        <p class="text-xs text-gray-600 mt-1"><?=translate('today_birthday')?></p>
                    </div>
                    <a href="<?php echo base_url('birthday/student') ?>" 
                       class="text-blue-500 hover:text-blue-600" 
                       data-toggle="tooltip" 
                       data-original-title="<?=translate('view') . " " . translate('list')?>">
                        <i class="fas fa-birthday-cake text-xl"></i>
                    </a>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">
                    <?php
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
                    ?>
                </h3>
            </div>
            <?php } ?>

            <?php if (get_permission('staff_birthday_widget', 'is_view')) { ?>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500"><?=translate('employee')?></h5>
                        <p class="text-xs text-gray-600 mt-1"><?=translate('today_birthday')?></p>
                    </div>
                    <a href="<?php echo base_url('birthday/staff') ?>" 
                       class="text-blue-500 hover:text-blue-600" 
                       data-toggle="tooltip" 
                       data-original-title="<?=translate('view') . " " . translate('list')?>">
                        <i class="fas fa-birthday-cake text-xl"></i>
                    </a>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">
                    <?php
                    $this->db->select('id');
                    if (!empty($school_id))
                        $this->db->where('branch_id', $school_id);
                    $this->db->where("MONTH(birthday)", date('m'));
                    $this->db->where("DAY(birthday)", date('d'));
                    $emyTodayBirthday = $this->db->get('staff')->result();
                    echo(count($emyTodayBirthday));
                    ?>
                </h3>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Required CSS -->
<style>
.dashboard-container {
    height: 100vh;
    overflow-y: auto;
}

/* Rest of the styles remain the same */
.stat-card,
.chart-card {
    transition: all 0.2s ease-in-out;
}

.stat-card:hover,
.chart-card:hover {
    transform: translateY(-2px);
}

::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #666;
}
</style>

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
