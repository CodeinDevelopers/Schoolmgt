<header class="panel-heading">
<h4 class="panel-title"><i class="far fa-edit"></i> <?=translate('edit_assign')?></h4>
</header>
<input type="hidden" name="allocation_id" value="<?=$data['id']?>">
<div class="panel-body">
	<?php if (is_superadmin_loggedin()): ?>
	<div class="form-group">
		<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
		<?php
			$arrayBranch = $this->app_lib->getSelectList('branch');
			echo form_dropdown("branch_id", $arrayBranch, $data['branch_id'], "class='form-control selecttwo' id='branch_id'");
		?>
		<span class="error"></span>
	</div>
	<?php endif; ?>
	<div class="form-group">
		<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
		<?php
			$arrayClass = $this->app_lib->getClass($data['branch_id']);
			echo form_dropdown("class_id", $arrayClass, $data['class_id'], "class='form-control selecttwo' id='class_id' onchange='getSectionByClass(this.value,0)' ");
		?>
		<span class="error"></span>
	</div>
	<div class="form-group">
		<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
		<?php
			$arraySection = $this->app_lib->getSections($data['class_id']);
			echo form_dropdown("section_id", $arraySection, $data['section_id'], "class='form-control selecttwo' id='section_id' ");
		?>
		<span class="error"></span>
	</div>
	<div class="form-group mb-md">
		<label class="control-label"><?=translate('class_teacher')?> <span class="required">*</span></label>
		<?php
			$arrayTeacher = $this->app_lib->getStaffList($data['branch_id'], 3);
			echo form_dropdown("staff_id", $arrayTeacher, $data['teacher_id'], "class='form-control selecttwo' id='staff_id' ");
		?>
		<span class="error"></span>
	</div>
</div>
<footer class="panel-footer">
	<div class="row">
		<div class="col-md-12 text-right">
			<button class="btn btn-default mr-xs" type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('update'); ?>
			</button>
			<button class="btn btn-default modal-dismiss"><?php echo translate('close'); ?></button>
		</div>
	</div>
</footer>


