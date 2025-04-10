<?php $widget = (is_superadmin_loggedin() ? 2 : 3); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open('exam/class_position', array('class' => 'validate')); ?>
			<header class="panel-heading">
				<h4 class="panel-title">Select Class</h4>
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
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
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
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
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
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								required data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-<?=$widget?>">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id'));
								echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id' required
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
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
				<?php echo form_open('exam/save_position', array('class' => 'frm-submit-msg')); ?>
				<header class="panel-heading">
					<h4 class="panel-title">
						<i class="fas fa-users"></i> <?=translate('student') . " " . translate('exam_rank') . " : " . $exam_details->name;?>
					</h4>
				</header>
				<div class="panel-body">
				<?php 
				$generated = false;
				if(!empty($students_list[0]->rank)) { 
					$generated = true;
					?>
					<div class="alert alert-danger text-center">The position has already been generated.</div>
				<?php } ?>

					<div class="table-responsive mt-md mb-lg">
						<input type="hidden" name="exam_id" value="<?php echo $exam_details->id; ?>">
						<table class="table table-bordered table-hover table-condensed mb-none" id="tableExport">
							<thead class="text-dark">
								<tr>
									<th><?=translate('students')?></th>
									<th><?=translate('register_no')?></th>
									<th><?=translate('class')?></th>
									<th><?=translate('section')?></th>
									<th><?=translate('roll')?></th>
									<th><?=translate('total_marks')?></th>
								<?php if ($exam_details->type_id != 2) { ?>
									<th><?=translate('percentage')?></th>
								<?php } if ($exam_details->type_id != 1) { ?>
									<th>GPA</th>
								<?php } ?>
									<th><?=translate('result')?></th>
								<?php if ($generated == true) { ?>
									<th><?=translate('previous_position')?></th>
								<?php } ?>
									<th><?=translate('position')?> <span class="required">*</span></th>
									<th><?=translate('principal_comments')?></th>
									<th><?=translate('teacher_comments')?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$count = 1;
								$passStudentArrayList = array();
								$failStudentArrayList = array();
								if(count($students_list)) {
									foreach($students_list as $enroll) {
										$studentArray = array();
										$studentArray['rank'] = empty($enroll->rank) ? 0 : $enroll->rank;
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
										$studentArray['result_status'] = $unset_subject;
										$studentArray['subject_array_list'] = $subject_array_list;
										$studentArray['totalFullmarks'] = $totalFullmarks;
										$studentArray['totalMarks'] = $totalMarks;
										if (!empty($totalMarks) && !empty($totalFullmarks)) {
											$studentArray['percentage'] = ($totalMarks * 100) / $totalFullmarks;
										} else {
											$studentArray['percentage'] = 0;
										}
										
										$studentArray['totalGradePoint'] = $totalGradePoint;

										if ($unset_subject == 0) {
											if ($result_status == 1) {
												$studentArray['result_pass'] = true;
												$passStudentArrayList[] = $studentArray;
											} else {
												$studentArray['result_pass'] = false;
												$failStudentArrayList[] = $studentArray;
											}
										} else {
											$failStudentArrayList[] = $studentArray;
										}	
									}
								}
								array_multisort(array_column($passStudentArrayList, 'totalMarks'), SORT_DESC, array_column($passStudentArrayList, 'percentage'), SORT_DESC, $passStudentArrayList);
								array_multisort(array_column($failStudentArrayList, 'totalMarks'), SORT_DESC, array_column($failStudentArrayList, 'percentage'), SORT_DESC, $failStudentArrayList);
								$studentArrayList=array_merge($passStudentArrayList,$failStudentArrayList);

								if (!empty($studentArrayList)) {
									$count = 1;
									foreach ($studentArrayList as $key => $row1):
							?>
								<tr>
									<input type="hidden" name="rank[<?php echo $key ?>][enroll_id]" value="<?php echo $row1['enrollID']; ?>">
									<td><?php echo $row1['student_name']; ?></td>
									<td><?php echo $row1['register_no']; ?></td>
									<td><?php echo $row1['class_name']; ?></td>
									<td><?php echo $row1['section_name']; ?></td>
									<td><?php echo $row1['roll']; ?></td>
									<td><?php echo ($row1['totalMarks'] . '/' . $row1['totalFullmarks']); ?></td>
									<?php if ($exam_details->type_id != 2) { ?>
    <td><?php echo number_format($row1['percentage'], 2, '.', '') . " %"; ?></td>
<?php } if ($exam_details->type_id != 1) { ?>
    <td>
        <?php
        $totalSubjects = count($get_subjects);
        if(!empty($totalSubjects)) {
            echo number_format(($row1['totalGradePoint'] / $totalSubjects), 2,'.','');
        }
        ?>
    </td>
<?php } ?>
    <td>
    <?php
        if ($row1['result_status'] == 0) {
            $percentage = number_format($row1['percentage'], 2, '.', '');
            
            if ($percentage < 45) {
                echo '<span class="label label-danger">FAIL</span>';
            } elseif ($percentage >= 85) {
                echo '<span class="label label-success">EXCELLENT</span>';
            } else {
                echo '<span class="label label-primary">PASS</span>';
            }
        } else {
            echo "All marks not registered";
        }
    ?>
    </td>
<?php if ($generated == true) { ?>
    <td>
        <?php echo $row1['rank'] ?>
    </td>
<?php } ?>
<td>
										<div class="form-group">
											<input class="form-control" type="text" autocomplete="off" name="rank[<?php echo $key ?>][position]" value="<?php echo $count; ?>">
											<span class="error"></span>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input class="form-control" type="text" autocomplete="off" name="rank[<?php echo $key ?>][principal_comments]" value="<?php echo (empty($row1['principal_comments']) ? "" : $row1['principal_comments']); ?>">
											<span class="error"></span>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input class="form-control" type="text" autocomplete="off" name="rank[<?php echo $key ?>][teacher_comments]" value="<?php echo (empty($row1['teacher_comments']) ? "" : $row1['teacher_comments']); ?>">
											<span class="error"></span>
										</div>
									</td>
								</tr>
								<?php
									$count++;
									endforeach;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-offset-10 col-md-2">
							<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
							</button>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
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
	});
</script>
