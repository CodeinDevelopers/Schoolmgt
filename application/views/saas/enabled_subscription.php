<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('branch/index')?>"><i class="fas fa-list-ul"></i> <?=translate('branch') . " " . translate('list')?></a>
			</li>
			<li class="active">
				<a href="#edit" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('enabled_subscription')?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="edit">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
					<input type="hidden" name="branch_id" id="branch_id" value="<?php echo $school->id; ?>">
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('school_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" readonly name="school_name" value="<?=set_value('school_name', $school->school_name)?>" />
							<span class="error"><?=form_error('school_name') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?=translate('plan')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$saasPackage = $this->saas_model->getSaasPackage();
								echo form_dropdown("saas_package_id", $saasPackage, set_value('saas_package_id'), "class='form-control' data-width='100%' id='saas_packageID'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?=form_error('saas_package_id'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('expiry_date')?></label>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
								<input type="text" class="form-control" name="expire_date" id="expireDate" placeholder="<?php echo translate('lifetime') ?>" value="<?=set_value('expire_date')?>" data-plugin-datepicker />
							</div>
							<span class="error"></span>
						</div>
					</div>
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" name="submit" value="save">
									<i class="fas fa-plus-circle"></i> <?=translate('update')?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$("#saas_packageID").on( "change", function() {
		var package_id = this.value;
		$.ajax({
			type: 'POST',
			url: base_url + "saas/ajaxGetExpireDate",
			data: {
				'id': package_id,
			},
			dataType: "html",
			success: function (data) {
				$("#expireDate").val(data)
			}
		});
	});
</script>