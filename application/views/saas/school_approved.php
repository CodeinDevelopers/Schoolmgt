<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
			</header>
			<?php echo form_open_multipart('saas/schoolApprovedSave', array('class' => 'form-horizontal form-bordered frm-submit-data')); ?>
			<div class="panel-body">
				<input type="hidden" name="saas_register_id" value="<?php echo $data->id; ?>">
				<input type="hidden" name="branch_name" value="<?php echo $data->school_name; ?>">
	
				<div class="form-group mt-md">
					<label class="col-md-3 control-label"><?=translate('message')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<div class="alert alert-info mb-none"><?php echo empty($data->message) ? "N/A" : $data->message; ?></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('school_name')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="school_name" value="<?=set_value('school_name', $data->school_name)?>" />
						<span class="error"><?=form_error('school_name') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('admin_name')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="admin_name" value="<?=set_value('admin_name', $data->admin_name)?>" />
						<span class="error"><?=form_error('admin_name') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('admin_login_username')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="admin_name" value="<?=set_value('admin_name', $data->username)?>" />
						<span class="error"><?=form_error('admin_name') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('admin_login_password')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="admin_name" value="<?=set_value('admin_name', $data->password)?>" />
						<span class="error"><?=form_error('admin_name') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('email')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="email" value="<?=set_value('email', $data->email)?>"  />
						<span class="error"><?=form_error('email') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="mobileno" value="<?=set_value('mobileno', $data->contact_number)?>" />
						<span class="error"><?=form_error('mobileno') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-md-3 control-label"><?=translate('currency')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="currency" value="<?php echo $global_config['currency'] ?>" />
						<span class="error"><?=form_error('currency') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('currency_symbol')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="currency_symbol" value="<?php echo $global_config['currency_symbol'] ?>" />
						<span class="error"><?=form_error('currency_symbol') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('city')?></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="city" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('state')?></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="state" value="">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-md-3 control-label"><?=translate('address')?></label>
					<div class="col-md-6">
						<textarea type="text" rows="3" class="form-control" name="address" ><?=set_value('address', $data->address)?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-md-3 control-label"><?=translate('plan')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<?php
							$saasPackage = $this->saas_model->getSaasPackage();
							echo form_dropdown("saas_package_id", $saasPackage, set_value('saas_package_id', $data->package_id), "class='form-control' data-width='100%' disabled data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
						?>
						<span class="error"><?=form_error('saas_package_id'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('start_date')?></label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
							<input type="text" class="form-control" name="start_date" readonly value="<?=_d(date("Y-m-d"))?>" autocomplete="off" readonly />
						</div>
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('expiry_date')?></label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
							<input type="text" class="form-control" name="expire_date" readonly autocomplete="off" value="<?=$this->saas_model->getPlanExpiryDate($data->package_id)?>" />
						</div>
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('text_logo');?></label>
					<div class="col-md-3 mb-md">
						<input type="hidden" name="text_logo" value="<?=empty($data->logo) ? base_url('uploads/app_image/logo-small.png') : base_url('uploads/saas_school_logo/' . $data->logo); ?>">
						<input type="file" name="text_logo" class="dropify" data-allowed-file-extensions="png" data-default-file="<?=empty($data->logo) ? base_url('uploads/app_image/logo-small.png') : base_url('uploads/saas_school_logo/' . $data->logo); ?>" />
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-3 col-md-2">
						<button type="submit" class="btn btn-default btn-block" name="submit" value="save" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
							<i class="fas fa-plus-circle"></i> <?=translate('approved')?>
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>