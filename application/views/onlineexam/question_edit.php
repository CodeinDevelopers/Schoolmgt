<style type="text/css">
	.checkbox-replace {
		padding-left: 0px !important;
	}
	.note-editor .modal-content {
		padding: 10px;
	}
	.note-editor .modal {
		z-index: 1150;
	}
</style>
<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
		<?php echo form_open($this->uri->uri_string(), array('class' => 'validate'));?>
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
				<div class="panel-btn">
					<a href="<?=base_url('onlineexam/question')?>" class="btn btn-default btn-circle">
						<i class="fas fa-list"></i> <?=translate('question') . " " . translate('list')?>
					</a>
				</div>
			</header>
			<div class="panel-body">
				<div class="row mb-sm">
					<?php if (is_superadmin_loggedin()): ?>
					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id', $questions['branch_id']), "class='form-control' id='branch_id'
								required data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
							<?php
								$arrayClass = $this->app_lib->getClass($questions['branch_id']);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id', $questions['class_id']), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								required data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id', $questions['class_id']), false);
								echo form_dropdown("section_id", $arraySection, set_value('section_id', $questions['section_id']), "class='form-control' id='section_id' required
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?>">
						<div class="form-group">
							<label class="control-label"><?=translate('subject')?></label>
							<?php
								if(!empty(set_value('class_id', $questions['class_id']))) {
									$arraySubject = array("" => translate('select'));
									$query = $this->subject_model->getSubjectByClassSection(set_value('class_id', $questions['class_id']), set_value('section_id', $questions['section_id']));
									$subjects = $query->result_array();
									foreach ($subjects as $row){
										$subjectID = $row['subject_id'];
										$arraySubject[$subjectID] = $row['subjectname'];
									}
								} else {
									$arraySubject = array("" => translate('select_class_first'));
								}
								echo form_dropdown("subject_id", $arraySubject, set_value('subject_id', $questions['subject_id']), "class='form-control' id='subject_id'
								required data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="search" value="1" class="btn btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
		
<?php if (!empty($questions)) { ?>
		<section class="panel appear-animation" data-appear-animation="<?php echo $global_config['animations'];?>" data-appear-animation-delay="100">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="<?php echo $questions['type'] == 1 ? 'active' : ''; ?>">
	                <a href="#single" data-toggle="tab">
	                    <i class="far fa-edit"></i> Single Choice
	                </a>
					</li>
					<li class="<?php echo $questions['type'] == 2 ? 'active' : ''; ?>">
	                <a href="#multiple" data-toggle="tab">
	                   <i class="far fa-edit"></i> Multiple Choice
	                </a>
					</li>
					<li class="<?php echo $questions['type'] == 3 ? 'active' : ''; ?>">
	                <a href="#true_false" data-toggle="tab">
	                   <i class="far fa-edit"></i> True/False
	                </a>
					</li>
					<li class="<?php echo $questions['type'] == 4 ? 'active' : ''; ?>">
	                <a href="#descriptive" data-toggle="tab">
	                   <i class="far fa-edit"></i> Descriptive
	                </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane box <?php echo $questions['type'] == 1 ? 'active' : ''; ?>" id="single">
						<?php echo form_open_multipart('onlineexam/question_edit_save', array('class' => 'form-bordered form-horizontal frm-submit-data'));
							$answer1 = "";
							if ($questions['type'] == 1) {
								$answer1 = $questions['answer'];
							}
						?>
							<input type="hidden" name="question_id" value="<?php echo $questions['id'] ?>">
							<input type="hidden" name="branch_id" value="<?php echo $branch_id ?>">
							<input type="hidden" name="class_id" value="<?php echo set_value('class_id') ?>">
							<input type="hidden" name="section_id" value="<?php echo set_value('section_id') ?>">
							<input type="hidden" name="subject_id" value="<?php echo set_value('subject_id') ?>">
							<input type="hidden" name="question_type" value="1">
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question_level')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										$arrayLevel = $this->onlineexam_model->question_level();
										echo form_dropdown("question_level", $arrayLevel, $questions['level'], "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question') . " " . translate('group')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										$arrayGroup = $this->onlineexam_model->question_group($questions['branch_id']);
										echo form_dropdown("group_id", $arrayGroup, set_value('group_id', $questions['group_id']), "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('mark')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="mark" autocomplete="off" value="<?php echo $questions['mark'] ?>">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="question" rows="2" class="question_note"><?php echo $questions['question'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 1 <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="option1" class="question_note"><?php echo $questions['opt_1'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 2 <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="option2" class="question_note"><?php echo $questions['opt_2'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 3</label>
								<div class="col-md-6">
									<textarea name="option3" class="question_note"><?php echo $questions['opt_3'] ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 4</label>
								<div class="col-md-6">
									<textarea name="option4" class="question_note"><?php echo $questions['opt_4'] ?></textarea>
								</div>
							</div>
							<div class="form-group">
							   <label class="col-md-3 control-label"><?=translate('answer')?> <span class="required">*</span></label>
							   <div class="col-md-6 mb-lg">
							       <div class="radio-custom radio-success radio-inline mb-xs">
							           <input type="radio" value="1" name="answer" id="opt1" <?php echo ($answer1 == 1 ? "checked" : ""); ?>>
							           <label for="opt1"><?=translate('option')?> 1</label>
							       </div>
							       <div class="radio-custom radio-success radio-inline">
							           <input type="radio" value="2" name="answer" id="opt2" <?php echo ($answer1 == 2 ? "checked" : ""); ?>>
							           <label for="opt2"><?=translate('option')?> 2</label>
							       </div>
							       <div class="radio-custom radio-success radio-inline">
							           <input type="radio" value="3" name="answer" id="opt3" <?php echo ($answer1 == 3 ? "checked" : ""); ?>>
							           <label for="opt3"><?=translate('option')?> 3</label>
							       </div>
							       <div class="radio-custom radio-success radio-inline mb-none">
							           <input type="radio" value="4" name="answer" id="opt4" <?php echo ($answer1 == 4 ? "checked" : ""); ?>>
							           <label for="opt4"><?=translate('option')?> 4</label>
							       </div>
							       <div>
							       	<span class="error"></span>
							       </div>
							   </div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-offset-3 col-md-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane box <?php echo $questions['type'] == 2 ? 'active' : ''; ?>" id="multiple">
						<?php echo form_open_multipart('onlineexam/question_edit_save', array('class' => 'form-bordered form-horizontal frm-submit-data'));
							$answer2 = [];
							if ($questions['type'] == 2) {
								$answer2 = json_decode($questions['answer'], true);
							}
						?>
							<input type="hidden" name="question_id" value="<?php echo $questions['id'] ?>">
							<input type="hidden" name="branch_id" value="<?php echo $branch_id ?>">
							<input type="hidden" name="class_id" value="<?php echo set_value('class_id') ?>">
							<input type="hidden" name="section_id" value="<?php echo set_value('section_id') ?>">
							<input type="hidden" name="subject_id" value="<?php echo set_value('subject_id') ?>">
							<input type="hidden" name="question_type" value="2">
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question_level')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										echo form_dropdown("question_level", $arrayLevel, $questions['level'], "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question') . " " . translate('group')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										echo form_dropdown("group_id", $arrayGroup, set_value('group_id', $questions['group_id']), "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('mark')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="mark" autocomplete="off" value="<?php echo $questions['mark'] ?>">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="question" class="question_note"><?php echo $questions['question'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 1 <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="option1" class="question_note"><?php echo $questions['opt_1'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 2 <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="option2" class="question_note"><?php echo $questions['opt_2'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 3 <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="option3" class="question_note"><?php echo $questions['opt_3'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('option')?> 4 <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="option4" class="question_note"><?php echo $questions['opt_4'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
							   <label class="col-md-3 control-label">Answer <span class="required">*</span></label>
							   <div class="col-md-6 mb-lg">
									<div class="checkbox-replace radio-inline">
										<label class="i-checks"><input type="checkbox" name="answer[]" <?php echo (in_array(1, $answer2) ? 'checked' : ''); ?> value="1"><i></i> <?=translate('option')?> 1</label>
									</div>
									<div class="checkbox-replace radio-inline">
										<label class="i-checks"><input type="checkbox" name="answer[]" <?php echo (in_array(2, $answer2) ? 'checked' : ''); ?> value="2"><i></i> <?=translate('option')?> 2</label>
									</div>
									<div class="checkbox-replace radio-inline">
										<label class="i-checks"><input type="checkbox" name="answer[]" <?php echo (in_array(3, $answer2) ? 'checked' : ''); ?> value="3"><i></i> <?=translate('option')?> 3</label>
									</div>
									<div class="checkbox-replace radio-inline">
										<label class="i-checks"><input type="checkbox" name="answer[]" <?php echo (in_array(4, $answer2) ? 'checked' : ''); ?> value="4"><i></i> <?=translate('option')?> 4</label>
									</div>
									<div>
							      	<span class="error"></span>
							      </div>
							   </div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-offset-3 col-md-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane box <?php echo $questions['type'] == 3 ? 'active' : ''; ?>" id="true_false">
						<?php echo form_open_multipart('onlineexam/question_edit_save', array('class' => 'form-bordered form-horizontal frm-submit-data'));?>
							<input type="hidden" name="question_id" value="<?php echo $questions['id'] ?>">
							<input type="hidden" name="branch_id" value="<?php echo $branch_id ?>">
							<input type="hidden" name="class_id" value="<?php echo set_value('class_id') ?>">
							<input type="hidden" name="section_id" value="<?php echo set_value('section_id') ?>">
							<input type="hidden" name="subject_id" value="<?php echo set_value('subject_id') ?>">
							<input type="hidden" name="question_type" value="3">

							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question_level')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										echo form_dropdown("question_level", $arrayLevel, $questions['level'], "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question') . " " . translate('group')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										echo form_dropdown("group_id", $arrayGroup, set_value('group_id', $questions['group_id']), "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('mark')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="mark" autocomplete="off" value="<?php echo $questions['mark'] ?>">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="question" class="question_note"><?php echo $questions['question'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
							   <label class="col-md-3 control-label"><?=translate('answer')?> <span class="required">*</span></label>
							   <div class="col-md-6 mb-lg">
									<?php
										$answer3 = "";
										if ($questions['type'] == 3) {
											$answer3 = $questions['answer'];
										}
										$arrayAnswer = array(
											'' => translate('select'), 
											'1' => translate('true'), 
											'2' => translate('false'), 
										);
										echo form_dropdown("answer", $arrayAnswer, $answer3, "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
							      <span class="error"></span>
							   </div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-offset-3 col-md-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane box <?php echo $questions['type'] == 4 ? 'active' : ''; ?>" id="descriptive">
						<?php echo form_open_multipart('onlineexam/question_edit_save', array('class' => 'form-bordered form-horizontal frm-submit-data'));
							$answer4 = "";
							if ($questions['type'] == 4) {
								$answer4 = $questions['answer'];
							}
						?>
							<input type="hidden" name="question_id" value="<?php echo $questions['id'] ?>">
							<input type="hidden" name="branch_id" value="<?php echo $branch_id ?>">
							<input type="hidden" name="class_id" value="<?php echo set_value('class_id') ?>">
							<input type="hidden" name="section_id" value="<?php echo set_value('section_id') ?>">
							<input type="hidden" name="subject_id" value="<?php echo set_value('subject_id') ?>">
							<input type="hidden" name="question_type" value="4">

							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question_level')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										echo form_dropdown("question_level", $arrayLevel, $questions['level'], "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question') . " " . translate('group')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										echo form_dropdown("group_id", $arrayGroup, set_value('group_id', $questions['group_id']), "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('mark')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="mark" autocomplete="off" value="<?php echo $questions['mark'] ?>">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('question')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea name="question" class="question_note"><?php echo $questions['question'] ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('answer')?> <span class="required">*</span></label>
								<div class="col-md-6 mb-md">
									<textarea name="answer" rows="4" class="form-control"><?php echo $answer4 ?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-offset-3 col-md-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$("form.frm-submit-data").each(function(i, el)
		{
		  var $this = $(el);
		  $this.on('submit', function(e){
		      e.preventDefault();
		      var btn = $this.find('[type="submit"]');
		      $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
		          success: function (data) {
		              $('.error').html("");
		              if (data.status == "fail") {
		                  $.each(data.error, function (index, value) {
		                      $this.find("[name='" + index + "']").parents('.form-group').find('.error').html(value);
		                  });
		                  btn.button('reset');
		              } else if (data.status == "access_denied") {
		                  window.location.href = base_url + "dashboard";
		              } else {
		                  swal({
		                      toast: true,
		                      position: 'top-end',
		                      type: 'success',
		                      title: data.message,
		                      confirmButtonClass: 'btn btn-default',
		                      buttonsStyling: false,
		                      timer: 8000
		                  });
		              }
		          },
		          complete: function (data) {
		              btn.button('reset'); 
		          },
		          error: function () {
		              btn.button('reset');
		          }
		      });
		  });
		});

		if ($(".question_note").length) {
			$('.question_note').summernote({
				dialogsInBody: true,
				height: 150,
				toolbar: [
					["style", ["style"]],
					["name", ["fontname","fontsize"]],
					["font", ["bold","italic","underline", "clear"]],
					["color", ["color"]],
					["para", ["ul", "ol", "paragraph"]],
					["insert", ["link","table","picture"]],
					["misc", ["fullscreen", "undo", "codeview"]]
				]
			});
		}

		$('#branch_id').on('change', function() {
			var branchID = $(this).val();
			getClassByBranch(branchID);
			$('#subject_id').html('').append('<option value=""><?=translate("select")?></option>');
		});

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