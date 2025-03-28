<?php $disabled = (is_admin_loggedin() ?  '' : 'disabled'); ?>
<div class="row appear-animation" data-appear-animation="<?=$global_config['animations'] ?>">
	<div class="row">
	<div class="col-md-12 mb-lg">
	<div class="student-profile-card" style="margin-right: 15px;
    margin-left: 16px;">
    <div class="profile-content">
        <div class="profile-image">
		<img src="<?=get_image_url('parent', $parent['photo'])?>">
        </div>
        
        <div class="profile-details">
		<h2><?php echo $staff['name']; ?></h2>
				<p><?php echo ucfirst($staff['role']) ?></p>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('designation')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('designation')?>:</span>
                    </div>
                    <span><?=html_escape($staff['designation_name'])?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('joining_date')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('joining_date')?>:</span>
                    </div>
                    <span><?=_d($staff['joining_date'])?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('mobile_no')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M21 15.5a3 3 0 01-3 3h-12a3 3 0 01-3-3m18 0v-2a3 3 0 00-3-3H6a3 3 0 00-3 3v2m18 0l-3-3m3 3l-3 3" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('mobile_no')?>:</span>
                    </div>
                    <span><?=(!empty($staff['mobileno']) ? $staff['mobileno'] : 'N/A'); ?></span>
                </div>
            </div>
        </div>
        
    </div>
</div>
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="far fa-edit"></i> <?php echo translate('profile'); ?></h4>
			</header>
            <?php echo form_open_multipart($this->uri->uri_string()); ?>
				<div class="panel-body">
					<fieldset>
						<input type="hidden" name="staff_id" id="staff_id" value="<?php echo $staff['id']; ?>">
						<!-- employee details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> <?=translate('employee_details')?>
						</div>
						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('name')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-user"></i></span>
										<input class="form-control" name="name" type="text" value="<?=set_value('name', $staff['name'])?>" />
									</div>
									<span class="error"><?php echo form_error('name'); ?></span>
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('gender')?></label>
									<?php
										$array = array(
											"" => translate('select'),
											"male" => translate('male'),
											"female" => translate('female')
										);
										echo form_dropdown("sex", $array, set_value('sex', $staff['sex']), "class='form-control' data-plugin-selectTwo
										data-width='100%' data-minimum-results-for-search='Infinity'");
									?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('religion')?></label>
									<input type="text" class="form-control" name="religion" value="<?=set_value('religion', $staff['religion'])?>">
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('blood_group')?></label>
									<?php
										$bloodArray = $this->app_lib->getBloodgroup();
										echo form_dropdown("blood_group", $bloodArray, set_value('blood_group', $staff['blood_group']), "class='form-control populate' data-plugin-selectTwo
										data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
								</div>
							</div>

							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('birthday')?> </label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-birthday-cake"></i></span>
										<input class="form-control" name="birthday" value="<?=set_value('birthday', $staff['birthday'])?>" data-plugin-datepicker data-plugin-options='{ "startView": 2 }' autocomplete="off" type="text">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
										<input class="form-control" name="mobile_no" type="text" value="<?=set_value('mobile_no', $staff['mobileno'])?>" />
									</div>
									<span class="error"><?php echo form_error('mobile_no'); ?></span>
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('email')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-envelope-open"></i></span>
										<input type="text" class="form-control" name="email" id="email" value="<?=set_value('email', html_escape($staff['email']))?>" />
									</div>
									<span class="error"><?php echo form_error('email'); ?></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('present_address')?> <span class="required">*</span></label>
									<textarea class="form-control" rows="2" name="present_address" placeholder="<?=translate('present_address')?>" ><?=set_value('present_address', $staff['present_address'])?></textarea>
									<span class="error"><?php echo form_error('present_address'); ?></span>
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('permanent_address')?></label>
									<textarea class="form-control" rows="2" name="permanent_address" placeholder="<?=translate('permanent_address')?>" ><?=set_value('permanent_address', $staff['permanent_address'])?></textarea>
								</div>
							</div>
						</div>
						
						<div class="row mb-md">
							<div class="col-md-12 mb-lg">
								<div class="form-group">
									<label for="input-file-now"><?=translate('profile_picture')?></label>
									<input type="file" name="user_photo" class="dropify" data-default-file="<?=get_image_url('staff', $staff['photo'])?>"/>
									<span class="error"><?php echo form_error('user_photo'); ?></span>
								</div>
							</div>
							<input type="hidden" name="old_user_photo" value="<?=html_escape($staff['photo'])?>">
						</div>

<?php if (!is_superadmin_loggedin()) { ?>
						<!-- academic details-->
						<div class="headers-line">
							<i class="fas fa-school"></i> <?=translate('academic_details')?>
						</div>
						<div class="row">
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
									<?php
										$arrayBranch = $this->app_lib->getSelectList('branch');
										echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id', $staff['branch_id']), "class='form-control' id='branch_id' disabled
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
									?>
									<span class="error"><?php echo form_error('branch_id'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('designation')?> <span class="required">*</span></label>
									<?php
										$designation_list = $this->app_lib->getDesignation($staff['branch_id']);
										echo form_dropdown("designation_id", $designation_list, set_value('designation_id', $staff['designation']), "class='form-control' id='designation_id' $disabled
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
									?>
									<span class="error"><?php echo form_error('designation_id'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('department')?> <span class="required">*</span></label>
									<?php
										$department_list = $this->app_lib->getDepartment($staff['branch_id']);
										echo form_dropdown("department_id", $department_list, set_value('department_id', $staff['department']), "class='form-control' id='department_id' $disabled
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
									?>
									<span class="error"><?php echo form_error('department_id'); ?></span>
								</div>
							</div>
						</div>

						<div class="row mb-lg">
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('joining_date')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-birthday-cake"></i></span>
										<input type="text" class="form-control" name="joining_date" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' <?=$disabled?>
										autocomplete="off" value="<?=set_value('joining_date', $staff['joining_date'])?>">
									</div>
									<span class="error"><?php echo form_error('joining_date'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('qualification')?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="qualification" <?=$disabled?> value="<?=set_value('qualification', $staff['qualification'])?>" />
									<span class="error"><?php echo form_error('qualification'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('role')?> <span class="required">*</span></label>
									<?php
										$role_list = $this->app_lib->getRoles();
										echo form_dropdown("user_role", $role_list, set_value('user_role', $staff['role_id']), "class='form-control' disabled
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"><?php echo form_error('user_role'); ?></span>
								</div>
							</div>
						</div>
<?php } ?>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-offset-9 col-md-3">
							<button class="btn btn-default btn-block" type="submit"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('update'); ?></button>
						</div>	
					</div>
				</div>
			<?php echo form_close(); ?>
		</section>
	</div>
</div>
