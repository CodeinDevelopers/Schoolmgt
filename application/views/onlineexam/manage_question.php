<?php $branch_id = $exam['branch_id']; ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
				<div class="panel-btn">
					<a href="<?=base_url('onlineexam')?>" class="btn btn-default btn-circle">
						<i class="fas fa-list"></i> <?=translate('online_exam') . " " . translate('list')?>
					</a>
				</div>
			</header>
			<div class="panel-body">
				<div class="row mb-sm">
					<div class="col-md-4 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('question') . " " . translate('group')?></label>
							<?php
								$arrayGroup = $this->onlineexam_model->question_group($branch_id);
								echo form_dropdown("question_group", $arrayGroup, set_value('question_group'), "class='form-control' data-plugin-selectTwo id = 'questionGroup'
								data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-4 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('question') . " " . translate('type')?></label>
							<?php
								$arrayClass = array(
									'' => 'Select',
									'1' => 'Single Choice',
									'2' => 'Multiple Choice',
									'3' => 'True/False',
									'4' => 'Descriptive',
								);
								echo form_dropdown("question_type", $arrayClass, set_value('question_type'), "class='form-control' data-plugin-selectTwo id = 'questionType'
								data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-4 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('question') . " " . translate('level')?></label>
							<?php
								$arrayLevel = $this->onlineexam_model->question_level();
								echo form_dropdown("question_level", $arrayLevel, set_value('question_level'), "class='form-control' data-plugin-selectTwo id = 'questionLevel'
								data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-4 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?></label>
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-4 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id'), false);
								echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label"><?=translate('subject')?></label>
							<?php
								if(!empty(set_value('class_id'))) {
									$arraySubject = array("" => translate('select'));
									$query = $this->subject_model->getSubjectByClassSection(set_value('class_id'), set_value('section_id'));
									$subjects = $query->result_array();
									foreach ($subjects as $row){
										$subjectID = $row['subject_id'];
										$arraySubject[$subjectID] = $row['subjectname'];
									}
								} else {
									$arraySubject = array("" => translate('select_class_first'));
								}
								echo form_dropdown("subject_id", $arraySubject, set_value('subject_id'), "class='form-control' id='subject_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button id="btnFilter" class="btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
					</div>
				</div>
			</footer>
		</section>

		<section class="panel">
			<?php echo form_open('onlineexam/question_assign', array('class' => 'frm-submit-msg'));?>
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
			</header>
			<div class="panel-body">
				<input type="hidden" name="exam_id" value="<?php echo $exam['id']; ?>">
				<table id="questionsTable" class="table table-bordered table-hover table-condensed mb-none" width="100%">
					<thead>
						<tr>
							<th width="10">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" id="selectAllcbTable"><i></i></label>
								</div>
							</th>
							<th><?=translate('sl')?></th>
							<th><?=translate('question')?></th>
							<th><?=translate('group_name')?></th>
							<th><?=translate('class')?></th>
							<th><?=translate('subject')?></th>
							<th><?=translate('type')?></th>
							<th><?=translate('level')?></th>
							<th><?=translate('marks')?></th>
						<?php if ($exam['neg_mark'] == 1) {  ?>
							<th><?=translate('negative_marks')?></th>
						<?php } ?>
						</tr>
					</thead>
				</table>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-default btn-block"> <i class="fas fa-floppy-disk"></i> <?=translate('assign')?></button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
		var branchID = '<?php echo $branch_id ?>', examID = '<?php echo $exam['id'] ?>', negMark = '<?php echo $exam['neg_mark'] ?>';
        var cusDataTable = $('#questionsTable').DataTable({
			'dom': '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"tr><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			'pageLength': '100',
			'ordering': false,
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': base_url + "onlineexam/getQuestionDT",
                'data': function(data) {
    				var questionGroup = $('#questionGroup').val(),
    					questionType = $('#questionType').val(),
    					questionLevel = $('#questionLevel').val(),
    					classID = $('#class_id').val(),
    					sectionID = $('#section_id').val(),
    					subjectID = $('#subject_id').val();
                    data.branch_id = branchID;
                    data.examID = examID;
                    data.questionGroup = questionGroup;
                    data.questionType = questionType;
                    data.questionLevel = questionLevel;
                    data.classID = classID;
                    data.sectionID = sectionID;
                    data.subjectID = subjectID;
                    data.negMark = negMark;
                }
            },
        });

        $('#btnFilter').on('click', function() {
            cusDataTable.draw();
        });
    });
</script>

<script type="text/javascript">
	$(document).ready(function () {
		$('#section_id').on('change', function() {
			var classID = $('#class_id').val();
			var sectionID =$(this).val();
			$.ajax({
				url: base_url + 'subject/getByClassSection',
				type: 'POST',
				data: {
					classID: classID,
					sectionID: sectionID
				},
				success: function (data) {
					$('#subject_id').html(data);
				}
			});
		});
	});
</script>	