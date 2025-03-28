<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('transport/vehicle')?>"><i class="fas fa-list-ul"></i> <?=translate('vehicle_list')?></a>
			</li>
			<li class="active">
				<a href="#edit" data-toggle="tab" ><i class="far fa-edit"></i> <?=translate('edit_vehicle')?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="edit">
			<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit'));?>
				<input type="hidden" name="vehicle_id" value="<?=$vehicle['id']?>" />
				<?php if (is_superadmin_loggedin()): ?>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('branch')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, $vehicle['branch_id'], "class='form-control' id='branch_id'
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
						?>
						<span class="error"></span>
					</div>
				</div>
				<?php endif; ?>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('vehicle_no')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="vehicle_no" required value="<?=$vehicle['vehicle_no']?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('capacity')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="number" class="form-control" name="capacity" required value="<?=$vehicle['capacity']?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('insurance_renewal_date')?></label>
					<div class="col-md-6">
						<input type="text" class="form-control" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' name="insurance_renewal" 
						value="<?=$vehicle['insurance_renewal']?>"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('driver_name')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="driver_name" required value="<?=$vehicle['driver_name']?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('driver_phone')?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="driver_phone" required value="<?=$vehicle['driver_phone']?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('driver_license')?> <span class="required">*</span></label>
					<div class="col-md-6 mb-md">
						<input type="text" class="form-control" name="driver_license" required  value="<?=$vehicle['driver_license']?>" />
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-offset-3 col-md-2">
							<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> </i> <?=translate('update')?>
							</button>
						</div>
					</div>
				</footer>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>