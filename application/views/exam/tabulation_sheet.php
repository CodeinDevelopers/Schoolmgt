<?php
$widget = (is_superadmin_loggedin() ? 2 : 3);
$branch = $this->db->where('id',$branch_id)->get('branch')->row_array();
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open('exam/tabulation_sheet', array('class' => 'validate')); ?>
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
			</header>
			<div class="panel-body">
				<div class="row mb-sm">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branch_id' required
								data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
				<?php endif; ?>
					<div class="col-md-<?=$widget?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('academic_year')?> <span class="required">*</span></label>
							<?php
								$arrayYear = array("" => translate('select'));
								$years = $this->db->get('schoolyear')->result();
								foreach ($years as $year){
									$arrayYear[$year->id] = $year->school_year;
								}
								echo form_dropdown("session_id", $arrayYear, set_value('session_id', get_session_id()), "class='form-control' required
								data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
					<div class="col-md-<?=$widget?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('exam')?> <span class="required">*</span></label>
							<?php
								
								if(!empty($branch_id)){
									$arrayExam = array("" => translate('select'));
									$exams = $this->db->get_where('exam', array('branch_id' => $branch_id,'session_id' => get_session_id()))->result();
									foreach ($exams as $exam){
										$arrayExam[$exam->id] = $this->application_model->exam_name_by_id($exam->id);
									}
								} else {
									$arrayExam = array("" => translate('select_branch_first'));
								}
								echo form_dropdown("exam_id", $arrayExam, set_value('exam_id'), "class='form-control' id='exam_id' required
								data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>

					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								required data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>

					<div class="col-md-<?=$widget?>">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id'));
								echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id' required
								data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="submit" value="search" class="btn btn-default btn-block"><svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
					</div>
				</div>
			</div>
			<?php echo form_close();?>
		</section>

		<?php if (isset($get_subjects)) { ?>
			<section class="panel appear-animation" data-appear-animation="<?php echo $global_config['animations'];?>" data-appear-animation-delay="100">
				<header class="panel-heading">
					<h4 class="panel-title">
						<i class="fas fa-users"></i> <?=translate('tabulation_sheet')?>
					</h4>
				</header>
				<div class="panel-body">
					<div class="mt-sm mb-md">
						<!-- hidden school information prints -->
						<div class="export_title"><?php echo translate('class') . ' : ' . get_type_name_by_id('class', set_value('class_id'));
									echo ' ( ' . translate('section') . ' : ' . get_type_name_by_id('section', set_value('section_id')) . ' ) - ' . $this->application_model->exam_name_by_id(set_value('exam_id')) . " Tabulation Sheet";
									?></div>
						<div class="visible-print fn_print">
							<center>
								<h4 class="text-dark text-weight-bold"><?=$branch['name']?></h4>
								<h5 class="text-dark"><?=$branch['address']?></h5>
								<h5 class="text-dark text-weight-bold"><?=$this->application_model->exam_name_by_id(set_value('exam_id'))?> - Tabulation Sheet</h5>
								<h5 class="text-dark">
									<?php 
									echo translate('class') . ' : ' . get_type_name_by_id('class', set_value('class_id'));
									echo ' ( ' . translate('section') . ' : ' . get_type_name_by_id('section', set_value('section_id')) . ' )';
									?>
								</h5>
								<hr>
							</center>
						</div>
						<table class="table table-bordered table-hover table-condensed mb-none" id="tableExport">
							<thead class="text-dark">
								<tr>
									<th><?=translate('position')?></th>
									<th><?=translate('students')?></th>
									<th><?=translate('register_no')?></th>
									<th><?=translate('roll')?></th>
                                    <?php
                                        foreach($get_subjects as $subject){
                                        	$fullMark = array_sum(array_column(json_decode($subject['mark_distribution'], true), 'full_mark'));
                                            echo '<th>' . $subject['subject_name'] . " (" . $fullMark . ')</th>';
                                        }
                                    ?>
									<th><?=translate('total_marks')?></th>
									<th>GPA</th>
									<th><?=translate('result')?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$count = 1;
								$enrolls = $this->db->get_where('enroll', array(
									'class_id' 		=> set_value('class_id'),
									'section_id' 	=> set_value('section_id'),
									'session_id' 	=> set_value('session_id'),
									'branch_id' 	=> $branch_id,
								))->result_array();
								$studentArrayList = array();
								if(count($students_list)) {
									foreach($students_list as $enroll) {
										$studentArray = array();
										$studentArray['rank'] = empty($enroll->rank) ? translate("not_generated") : $enroll->rank;
										$studentArray['enrollID'] = $enroll->id;
										$studentArray['class_name'] = $enroll->class_name;
										$studentArray['section_name'] = $enroll->section_name;
										$studentArray['student_name'] = $enroll->fullname;
										$studentArray['register_no'] = $enroll->register_no;
										$studentArray['principal_comments'] = $enroll->principal_comments;
										$studentArray['teacher_comments'] = $enroll->teacher_comments;
										$studentArray['roll'] = $enroll->roll;

										$totalMarks 		= 0;
										$totalFullmarks 	= 0;
										$totalGradePoint 	= 0;
										$grand_result 		= 0;
										$unset_subject 		= 0;
										$subject_array_list = array();
										$result_status = 1;
										foreach ($get_subjects as $subject) {
											$subjectArray = array();
											$this->db->where(array(
												'class_id' 	 => set_value('class_id'),
												'exam_id'	 => set_value('exam_id'),
												'subject_id' => $subject['subject_id'],
												'student_id' => $enroll->student_id,
												'session_id' => set_value('session_id')
											));
											$getMark = $this->db->get('mark')->row_array();
											if (!empty($getMark)) {
												if ($getMark['absent'] != 'on') {
													$totalObtained = 0;
													$totalFullMark = 0;
													$fullMarkDistribution = json_decode($subject['mark_distribution'], true);
													$obtainedMark = json_decode($getMark['mark'], true);
													foreach ($fullMarkDistribution as $i => $val) {
														$obtained_mark = floatval($obtainedMark[$i]);
														$totalObtained += $obtained_mark;
														$totalFullMark += $val['full_mark'];
														$passMark = floatval($val['pass_mark']);
														if ($obtained_mark < $passMark) {
															$result_status = 0;
														}
													}
													$subjectArray['totalObtained'] = $totalObtained;
													$subjectArray['totalFullMark'] = $totalFullMark;
													
													if ($totalObtained != 0 && !empty($totalObtained)) {
														$grade = $this->exam_model->get_grade($totalObtained, $branch_id);
														$totalGradePoint += $grade['grade_point'];
													}
													$totalMarks += $totalObtained;
												} else {
													$subjectArray['absent'] = true;
												}
												$totalFullmarks += $totalFullMark;
											} else {
												$subjectArray['mark_empty'] = true;
												$unset_subject++;
											}
											$subjectArray['result_status'] = $unset_subject;
											$subject_array_list[] = $subjectArray;
										}
										if ($unset_subject == 0) {
											if ($result_status == 1) {
												$studentArray['result_pass'] = true;
											} else {
												$studentArray['result_pass'] = false;
											}
										}

										$studentArray['result_status'] = $unset_subject;
										$studentArray['subject_array_list'] = $subject_array_list;
										$studentArray['totalFullmarks'] = $totalFullmarks;
										$studentArray['totalMarks'] = $totalMarks;
										$studentArray['totalGradePoint'] = $totalGradePoint;
										$studentArrayList[] = $studentArray;
									}
								}
								if (!empty($studentArrayList)) {
								foreach ($studentArrayList as $row1):
							?>
								<tr>
									<td><?php echo $row1['rank']; ?></td>
									<td><?php echo $row1['student_name']; ?></td>
									<td><?php echo $row1['register_no']; ?></td>
									<td><?php echo $row1['roll']; ?></td>
									<?php foreach ($row1['subject_array_list'] as $subject): ?>
									<td>
									<?php
									if (!isset($subject['mark_empty']) || $subject['mark_empty'] !== true) {
										if (!isset($subject['absent']) || $subject['absent'] !== true) {
											echo ($subject['totalObtained'] . "/" . $subject['totalFullMark']);
										} else {
											echo translate('absent');
										}
									} else {
										echo "N/A";
									}
									?>
									</td>
									<?php endforeach; ?>
									<td><?php echo ($row1['totalMarks'] . '/' . $row1['totalFullmarks']); ?></td>
									<td>
										<?php
										$totalSubjects = count($get_subjects);
										if(!empty($totalSubjects)) {
											echo number_format(($row1['totalGradePoint'] / $totalSubjects), 2,'.','');
										}
										?>
									</td>
									<td>
									<?php
										if ($row1['result_status'] == 0) {
											if ($row1['result_pass']) {
												echo '<span class="label label-primary">PASS</span>';
											} else {
												echo '<span class="label label-danger">FAIL</span>';
											}
										}
									?>
									</td>
								</tr>
								<?php
									endforeach;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
	<?php } ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#branch_id').on("change", function() {
			var branchID = $(this).val();
			getClassByBranch(branchID);
			getExamByBranch(branchID);
		});

		var tabulation_sheet = $('#tableExport').DataTable({
			"dom": '<"row"<"col-sm-6 mb-xs"B><"col-sm-6"f>><"table-responsive"t>p',
			"lengthChange": false,
			"pageLength": -1,
			"columnDefs": [
				{targets: [-1], orderable: false}
			],
			"buttons": [
				{
					extend: 'copyHtml5',
					text: '<i class="far fa-copy"></i>',
					titleAttr: 'Copy',
					title: $('.export_title').html(),
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'excelHtml5',
					text: '<i class="fa fa-file-excel"></i>',
					titleAttr: 'Excel',
					title: $('.export_title').html(),
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'csvHtml5',
					text: '<i class="fa fa-file-alt"></i>',
					titleAttr: 'CSV',
					title: $('.export_title').html(),
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					text: '<i class="fa fa-file-pdf"></i>',
					titleAttr: 'PDF',
					title: $('.export_title').html(),
					footer: true,
					customize: function ( win ) {
						win.styles.tableHeader.fontSize = 10;
						win.styles.tableFooter.fontSize = 10;
						win.styles.tableHeader.alignment = 'left';
					},
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'print',
					text: '<i class="fa fa-print"></i>',
					titleAttr: 'Print',
					title: $('.fn_print').html(),
					customize: function ( win ) {
						$(win.document.body)
							.css( 'font-size', '9pt' );

						$(win.document.body).find( 'table' )
							.addClass( 'compact' )
							.css( 'font-size', 'inherit' );

						$(win.document.body).find( 'h1' )
							.css( 'font-size', '14pt' );
					},
					footer: true,
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'colvis',
					text: '<i class="fas fa-columns"></i>',
					titleAttr: 'Columns',
					title: $('.export_title').html(),
					postfixButtons: ['colvisRestore']
				},
			]
		});
	});
</script>
