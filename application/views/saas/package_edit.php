<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?php echo base_url('saas/package'); ?>">
				  <i class="fas fa-list-ul"></i> <?=translate('package') ." ". translate('list')?>
				</a>
			</li>
			<li class="active">
				<a href="#add" data-toggle="tab">
				 <i class="far fa-edit"></i> <?=translate('edit') . " ". translate('package')?>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="add">
					<?php echo form_open($this->uri->uri_string(), array('class' => 'form-bordered form-horizontal frm-submit'));?>
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" autocomplete="off" />
							<span class="error"></span>

							<div class=" mt-md">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" <?php echo $row['recommended'] == 1 ? 'checked' : ''; ?> name="recommended" value="1"><i></i> <?=translate('recommended')?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('price')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="price" id="priceID" autocomplete="off" <?php echo $row['free_trial'] == 1 ? 'disabled' : ''; ?> value="<?php echo $row['price'] ?>" />
							<span class="error"></span>
							<div class=" mt-md">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" name="free_trial" <?php echo $row['free_trial'] == 1 ? 'checked' : ''; ?> id="freeTrial" value="1"><i></i> Free Trial</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('discount')?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="discount" id="discountID" autocomplete="off" <?php echo $row['free_trial'] == 1 ? 'disabled' : ''; ?> value="<?php echo $row['discount'] ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('student') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="student_limit" value="<?php echo $row['student_limit'] ?>" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('parents') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="parents_limit" value="<?php echo $row['parents_limit'] ?>" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('staff') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="staff_limit" value="<?php echo $row['staff_limit'] ?>" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('teacher') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="teacher_limit" value="<?php echo $row['teacher_limit'] ?>" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('subscription') . " " . translate('period')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<div class="row">
								<div class="col-xs-6">
									<?php
										echo form_dropdown("period_type", $arrayPeriod, set_value('period_type', $row['period_type']), "class='form-control' id='periodType'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" name="period_value" id="period" <?php echo $row['period_type'] == 1 ? 'disabled' : ''; ?> value="<?php echo $row['period_value'] ?>" autocomplete="off" placeholder="Enter Day / Month / Year." />
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<section class="panel pg-fw">
							   <div class="panel-body">
							       <h5 class="chart-title mb-xs">Module Enabled?</h5>
							       <div class="mt-md">
									<?php 
									if (empty($row['permission']) || $row['permission'] == 'null' ) {
										$permissions = [];
									} else {
										$permissions = json_decode($row['permission'], true);
									}
									$this->db->select('*');
									$this->db->from('permission_modules');
									$this->db->where('permission_modules.in_module', 1);
									$this->db->order_by('permission_modules.prefix', 'asc');
									$modules = $this->db->get()->result();
									foreach ($modules as $key => $value) {
										?>
										<div class="col-md-12 mt-md">
											<div class="checkbox-replace">
												<label class="i-checks"><input type="checkbox" <?php echo (in_array($value->id, $permissions) ? 'checked' : ''); ?> name="modules[]" value="<?php echo $value->id ?>"><i></i> <?php echo $value->name ?></label>
											</div>
										</div>
									<?php } ?>
							       </div>
							   </div>
							</section>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('show_website')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-lg">
							<div class="material-switch mt-xs">
							    <input class="switch_menu" id="show_website" name="show_website" <?php echo $row['show_onwebsite'] == 1 ? 'checked' : ''; ?> type="checkbox">
							    <label for="show_website" class="label-primary"></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('status')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-lg">
							<div class="material-switch mt-xs">
							    <input class="switch_menu" id="package_status" name="package_status" <?php echo $row['status'] == 1 ? 'checked' : ''; ?> type="checkbox">
							    <label for="package_status" class="label-primary"></label>
							</div>
						</div>
					</div>

					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-offset-3 col-md-2">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<i class="fas fa-plus-circle"></i> <?=translate('update')?>
								</button>
							</div>
						</div>
					</footer>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$("#periodType").on("change", function(ev)
	{
		if (this.value == 1) {
			$("#period").prop('disabled', true);
		} else {
			$("#period").prop('disabled', false);
		}
	});

	$("#freeTrial").on("change", function(ev)
	{
		if($(this).is(':checked'))
		{
			$("#priceID").prop('disabled', true);
			$("#discountID").prop('disabled', true);
		} else {
			$("#priceID").prop('disabled', false);
			$("#discountID").prop('disabled', false);
		}
	});
</script>