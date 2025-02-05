<section class="panel">
    <header class="panel-heading">
        <h4 class="panel-title"><i class="fas fa-id-card"></i> <?=translate('report_card')?></h4>
    </header>
    <div class="panel-body">
	<?php
	$this->db->select('timetable_exam.*,exam.type_id');
	$this->db->from('timetable_exam');
	$this->db->join('exam', 'exam.id = timetable_exam.exam_id', 'inner');
	$this->db->where('timetable_exam.class_id', $stu['class_id']);
	$this->db->where('timetable_exam.section_id', $stu['section_id']);
	$this->db->where('timetable_exam.session_id', get_session_id());
	$this->db->where('exam.status', 1);
	$this->db->where('exam.publish_result', 1);
	$this->db->group_by('timetable_exam.exam_id');
	$variable = $this->db->get()->result_array();
	if (!empty($variable)) {
		foreach ($variable as  $erow) {
			$examID = $erow['exam_id'];
			?>
        <section class="panel panel-subl-shadow mt-md mb-md">
            <header class="panel-heading">
                <h4 class="panel-title"><?=$this->application_model->exam_name_by_id($examID);?></h4>
					<div class="panel-btn">
						<button type="submit" class="btn btn-default btn-circle" onclick="fn_printElem('card<?php echo $examID ?>');">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?=translate('print')?>
						</button>
					</div>
            </header>
            <div class="panel-body" id="card<?php echo $examID ?>">
			<style type="text/css">
				@media print {
					.mark-container {
					    background: #fff;
					    width: 1000px;
					    position: relative;
					    z-index: 2;
					    margin: 0 auto;
					    padding: 20px 30px;
					}
					table {
					    border-collapse: collapse;
					    width: 100%;
					    margin: 0 auto;
					}
				}
			</style>
			<?php
				$result = $this->exam_model->getStudentReportCard($stu['student_id'], $examID, get_session_id());
				if (!empty($result['exam'])) {
				$student = $result['student'];
				$getMarksList = $result['exam'];

				$rankDetail = $this->db->where(array('exam_id ' => $examID, 'enroll_id  ' => $student['enrollID']))->get('exam_rank')->row();
				$getExam = $this->db->where(array('id' => $examID))->get('exam')->row_array();
				$getSchool = $this->db->where(array('id' => $getExam['branch_id']))->get('branch')->row_array();
				$schoolYear = get_type_name_by_id('schoolyear', get_session_id(), 'school_year');
			?>
			<div class="mark-container">
				<table class="visible-print" border="0" style="margin-top: 20px; height: 100px;">
					<tbody>
						<tr>
						<td style="width:40%;vertical-align: top;"><img style="max-width:225px;" src="<?=$this->application_model->getBranchImage($getExam['branch_id'], 'report-card-logo')?>"></td>
						<td style="width:60%;vertical-align: top;">
							<table align="right" class="table-head text-right" >
								<tbody>
									<tr><th style="font-size: 26px;" class="text-right"><?=$getSchool['school_name']?></th></tr>
									<tr><th style="font-size: 14px; padding-top: 4px;" class="text-right">Academic Session : <?=$schoolYear?></th></tr>
									<tr><td><?=$getSchool['address']?></td></tr>
									<tr><td><?=$getSchool['mobileno']?></td></tr>
									<tr><td><?=$getSchool['email']?></td></tr>
								</tbody>
							</table>
						</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered visible-print" style="margin-top: 20px;">
					<tbody>
						<tr>
							<th>Name</th>
							<td><?=$student['first_name'] . " " . $student['last_name']?></td>
							<th>Register No</th>
							<td><?=$student['register_no']?></td>
							<th>Roll Number</th>
							<td><?=$student['roll']?></td>
						</tr>
						<tr>
							<th>Father Name</th>
							<td><?=$student['father_name']?></td>
							<th>Admission Date</th>
							<td><?=_d($student['admission_date'])?></td>
							<th>Date of Birth</th>
							<td><?=_d($student['birthday'])?></td>
						</tr>
						<tr>
							<th>Mother Name</th>
							<td><?=$student['mother_name']?></td>
							<th>Class</th>
							<td><?=$student['class_name'] . " (" . $student['section_name'] . ")"?></td>
							<th>Gender</th>
							<td><?=ucfirst($student['gender'])?></td>
						</tr>
					</tbody>
				</table>
				<div class="table-responsive">
					<table class="table table-condensed table-bordered mt-sm" >
						<thead>
							<tr>
								<th>Subjects</th>
							<?php 
							$markDistribution = json_decode($getExam['mark_distribution'], true);
							foreach ($markDistribution as $id) {
								?>
								<th><?php echo get_type_name_by_id('exam_mark_distribution',$id)  ?></th>
							<?php } ?>
							<?php if ($getExam['type_id'] == 1) { ?>
								<th>Total</th>
							<?php } elseif($getExam['type_id'] == 2) { ?>
								<th>Grade</th>
								<th>Point</th>
							<?php } elseif ($getExam['type_id'] == 3) { ?>
								<th>Total</th>
								<th>Grade</th>
								<th>Point</th>
							<?php } ?>
							</tr>
						</thead>
						<tbody>
						<?php
						$colspan = count($markDistribution) + 1;
						$total_grade_point = 0;
						$grand_obtain_marks = 0;
						$grand_full_marks = 0;
						$result_status = 1;
						foreach ($getMarksList as $row) {
						?>
							<tr>
								<td valign="middle" width="35%"><?=$row['subject_name']?></td>
							<?php 
							$total_obtain_marks = 0;
							$total_full_marks = 0;
							$fullMarkDistribution = json_decode($row['mark_distribution'], true);
							$obtainedMark = json_decode($row['get_mark'], true);
							foreach ($fullMarkDistribution as $i => $val) {
								$obtained_mark = floatval($obtainedMark[$i]);
								$fullMark = floatval($val['full_mark']);
								$passMark = floatval($val['pass_mark']);
								if ($obtained_mark < $passMark) {
									$result_status = 0;
								}

								$total_obtain_marks += $obtained_mark;
								$obtained = $row['get_abs'] == 'on' ? 'Absent' : $obtained_mark;
								$total_full_marks += $fullMark;
								?>
							<?php if ($getExam['type_id'] == 1 || $getExam['type_id'] == 3){ ?>
								<td valign="middle">
									<?php 
										if ($row['get_abs'] == 'on') {
											echo 'Absent';
										} else {
											echo $obtained_mark . '/' . $fullMark;
										}
									?>
								</td>
							<?php } if ($getExam['type_id'] == 2){ ?>
								<td valign="middle">
									<?php 
										if ($row['get_abs'] == 'on') {
											echo 'Absent';
										} else {
											$percentage_grade = ($obtained_mark * 100) / $fullMark;
											$grade = $this->exam_model->get_grade($percentage_grade, $getExam['branch_id']);
											echo $grade['name'];
										}
									?>
								</td>
							<?php } ?>
							<?php
							}
							$grand_obtain_marks += $total_obtain_marks;
							$grand_full_marks += $total_full_marks;
							?>
							<?php if($getExam['type_id'] == 1 || $getExam['type_id'] == 3) { ?>
								<td valign="middle"><?=$total_obtain_marks . "/" . $total_full_marks?></td>
							<?php } if($getExam['type_id'] == 2) { 
								$percentage_grade = ($total_obtain_marks * 100) / $total_full_marks;
								$grade = $this->exam_model->get_grade($percentage_grade, $getExam['branch_id']);
								$total_grade_point += $grade['grade_point'];
								?>
								<td valign="middle"><?=$grade['name']?></td>
								<td valign="middle"><?=number_format($grade['grade_point'], 2, '.', '')?></td>
							<?php } if ($getExam['type_id'] == 3) {
								$colspan += 2;
								$percentage_grade = ($total_obtain_marks * 100) / $total_full_marks;
								$grade = $this->exam_model->get_grade($percentage_grade, $getExam['branch_id']);
								$total_grade_point += $grade['grade_point'];
								?>
								<td valign="middle"><?=$grade['name']?></td>
								<td valign="middle"><?=number_format($grade['grade_point'], 2, '.', '')?></td>
							<?php } ?>
							</tr>
						<?php } ?>
						<?php if ($getExam['type_id'] == 1 || $getExam['type_id'] == 3) { ?>
							<tr class="text-weight-semibold">
								<td valign="top" >GRAND TOTAL :</td>
								<td valign="top" colspan="<?=$colspan?>"><?=$grand_obtain_marks . '/' . $grand_full_marks; ?>, Average : <?php $percentage = ($grand_obtain_marks * 100) / $grand_full_marks; echo number_format($percentage, 2, '.', '')?>%</td>
							</tr>
							<?php $extINTL = extension_loaded('intl');
							if ($extINTL == true) {
							?>
							<tr class="text-weight-semibold">
								<td valign="top" >GRAND TOTAL IN WORDS :</td>
								<td valign="top" colspan="<?=$colspan?>">
									<?php
									$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
									echo ucwords($f->format($grand_obtain_marks));
									?>
								</td>
							</tr>
							<?php } ?>
						<?php } if ($getExam['type_id'] == 2) { ?>
							<tr class="text-weight-semibold">
								<td valign="top" >GPA :</td>
								<td valign="top" colspan="<?=$colspan+1?>"><?=number_format(($total_grade_point / count($getMarksList)), 2, '.', '')?></td>
							</tr>
						<?php } if ($getExam['type_id'] == 3) { ?>
							<tr class="text-weight-semibold">
								<td valign="top" >GPA :</td>
								<td valign="top" colspan="<?=$colspan?>"><?=number_format(($total_grade_point / count($getMarksList)), 2, '.', '')?></td>
							</tr>
						<?php } if ($getExam['type_id'] == 1 || $getExam['type_id'] == 3) { ?>
							<tr class="text-weight-semibold">
								<td valign="top" >RESULT :</td>
								<td valign="top" colspan="<?=$colspan?>"><?=$result_status == 0 ? 'Fail' : 'Pass'; ?></td>
							</tr>
						<?php } ?>
							<tr class="text-weight-semibold">
								<td valign="top">Position :</td>
								<td valign="top" colspan="<?=$colspan?>"> <?php echo (!empty($rankDetail->rank) ? $rankDetail->rank : translate("not_generated"));?></td>
							</tr>
						</tbody>
					</table>
		        </div>

			<?php if (!empty($rankDetail->principal_comments) || !empty($rankDetail->teacher_comments)) { ?>
				<div style="width: 100%;">
					<table class="table table-condensed table-bordered">
						<tbody>
						<?php if (!empty($rankDetail->principal_comments)) { ?>
							<tr>
								<th style="width: 250px;">Principal Comments</th>
								<td><?=$rankDetail->principal_comments?></td>
							</tr>
						<?php } if (!empty($rankDetail->teacher_comments)) { ?>
							<tr>
								<th style="width: 250px;">Teacher Comments</th>
								<td><?=$rankDetail->teacher_comments?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } ?>


			</div>
		    <?php } else { ?>
				<div class="alert alert-subl mb-none text-center">
					<i class="fas fa-exclamation-triangle"></i> <?=translate('no_information_available')?>
				</div>
		    <?php } ?>
            </div>
        </section>
	<?php } } else { ?>
		<div class="alert alert-subl mb-none text-center">
			<i class="fas fa-exclamation-triangle"></i> <?=translate('no_information_available')?>
		</div>
    <?php } ?>
    </div>
</section>