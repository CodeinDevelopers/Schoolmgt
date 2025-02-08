<?php
$widget = (is_superadmin_loggedin() ? 3 : 4);
?>
<div class="row appear-animation" data-appear-animation="<?=$global_config['animations'] ?>">
	<div class="col-md-12 mb-lg">
		<div class="profile-head social">
			<div class="col-md-12 col-lg-4 col-xl-3">
				<div class="image-content-center user-pro">
				<div class="preview">
						<img src="<?=get_image_url('parent', $parent['photo'])?>">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-5 col-xl-5">
				<h5><?=html_escape($parent['name'])?></h5>
				<p><?=ucfirst('parent')?></p>
				<ul>
					<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('relation')?>"><i class="fas fa-bezier-curve"></i></div> <?=html_escape($parent['relation'])?></li>
					<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('occupation')?>"><i class="fas fa-user-tag"></i></div> <?=html_escape(empty($parent['occupation']) ? 'N/A' : $parent['occupation']);?></li>
					<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('income')?>"><i class="fas fa-dollar-sign"></i></div> <?=html_escape(empty($parent['income']) ? 'N/A' : $parent['income']);?></li>
					<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('mobile_no')?>"><i class="fas fa-phone"></i></div> <?=html_escape(empty($parent['mobileno']) ? 'N/A' : $parent['mobileno']);?></li>
					<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('email')?>"><i class="far fa-envelope"></i></div> <?=html_escape(!empty($parent['email']) ? $parent['email'] : 'N/A')?></li>
					<li><div class="icon-holder" data-toggle="tooltip" data-original-title="<?=translate('address')?>"><i class="fas fa-home"></i></div> <?=html_escape(!empty($parent['address']) ? $parent['address'] : 'N/A'); ?></li>
				</ul>
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
						<input type="hidden" name="parent_id" value="<?php echo $parent['id']; ?>" id="parent_id">
						<!-- parents details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> <?=translate('parents_details')?>
						</div>
						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('name')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-user"></i></span>
										<input class="form-control" name="name" type="text" value="<?=set_value('name', $parent['name'])?>" autocomplete="off" />
									</div>
									<span class="error"><?php echo form_error('name'); ?></span>
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('relation')?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="relation" value="<?=set_value('relation', $parent['relation'])?>" autocomplete="off" />
									<span class="error"><?php echo form_error('relation'); ?></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('father_name')?></label>
									<input class="form-control" name="father_name" type="text" value="<?=set_value('father_name', $parent['father_name'])?>" autocomplete="off" />
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mother_name')?></label>
									<input type="text" class="form-control" name="mother_name" value="<?=set_value('mother_name', $parent['mother_name'])?>" autocomplete="off" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('occupation')?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="occupation" value="<?=set_value('occupation', $parent['occupation'])?>" autocomplete="off" />
									<span class="error"><?php echo form_error('occupation'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('income')?></label>
									<input type="text" class="form-control" name="income" value="<?=set_value('income', $parent['income'])?>" autocomplete="off" />
									<span class="error"><?php echo form_error('income'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('education')?></label>
									<input type="text" class="form-control" name="education" value="<?=set_value('education', $parent['education'])?>" autocomplete="off" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('city')?></label>
									<input type="text" class="form-control" name="city" value="<?=set_value('city', $parent['city'])?>" autocomplete="off" />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('state')?></label>
									<input type="text" class="form-control" name="state" value="<?=set_value('state', $parent['state'])?>" autocomplete="off" />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
										<input type="text" class="form-control" name="mobileno" value="<?=set_value('mobileno', $parent['mobileno'])?>" autocomplete="off" />
									</div>
									<span class="error"><?php echo form_error('mobileno'); ?></span>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('email')?></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-envelope-open"></i></span>
										<input type="email" class="form-control" name="email" id="email" value="<?=set_value('email', $parent['email'])?>" />
									</div>
									<span class="error"><?php echo form_error('email'); ?></span>
								</div>
							</div>
						</div>
						<div class="row mb-md">
							<div class="col-md-12 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('address')?></label>
									<textarea name="address" rows="2" class="form-control" aria-required="true"><?=set_value('address', $parent['address'])?></textarea>
								</div>
							</div>
						</div>
						<div class="row mb-md">
							<div class="col-md-12 mb-lg">
								<div class="form-group">
									<label class="control-label"><?=translate('profile_picture')?> <span class="required">*</span></label>
									<input type="file" name="user_photo" class="dropify" data-default-file="<?=get_image_url('parent', $parent['photo'])?>" />
								</div>
								<span class="error"><?php echo form_error('user_photo'); ?></span>
							</div>
							<input type="hidden" name="old_user_photo" value="<?=html_escape($parent['photo'])?>">
						</div>
						
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
