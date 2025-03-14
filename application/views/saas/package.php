<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab">
					<i class="fas fa-list-ul"></i> <?=translate('package') ." ". translate('list')?>
				</a>
			</li>
			<li>
				<a href="#add" data-toggle="tab">
					<i class="far fa-edit"></i> <?=translate('add') . " ". translate('package')?>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active mb-md" id="list">
				<table class="table table-bordered table-hover mb-none table-condensed table-export">
					<thead>
						<tr>
							<th><?=translate('sl')?></th>
							<th><?=translate('name')?></th>
							<th><?=translate('price')?></th>
							<th><?=translate('discount')?></th>
							<th><?=translate('preiod') . " " . translate('type')?></th>
							<th><?=translate('preiod')?></th>
							<th><?=translate('status') ?></th>
							<th><?=translate('show_website') ?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$count = 1;
					$currency_symbol = $global_config['currency_symbol'];
					foreach ($packageList as $key => $row) {
						 ?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row->name;?></td>
							<td><?php echo $currency_symbol . $row->price;?></td>
							<td><?php echo $currency_symbol . $row->discount;?></td>
							<td><?php echo $arrayPeriod[$row->period_type];?></td>
							<td><?php echo $row->period_value;?></td>
							<td>
								<?php if ($row->status == 1) { ?>
										<span class="label label-success-custom"><i class="far fa-check-square"></i> <?=translate('active')?></span>
									<?php } else { ?>
										<span class="label label-danger-custom"><i class="far fa-check-square"></i> <?=translate('inactive')?></span>
									<?php } ?>
							</td>
							<td><?php echo $row->show_onwebsite == 1 ? translate('yes') : translate('no');?></td>
							<td>
								<!-- update link -->
								<a href="<?php echo base_url('saas/package_edit/' . $row->id);?>" class="btn btn-default btn-circle icon">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
								</a>
								<!-- delete link -->
								<?php echo btn_delete('saas/package_delete/' . $row->id);?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="add">
					<?php echo form_open('saas/package_save', array('class' => 'form-bordered form-horizontal frm-submit'));?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="" autocomplete="off" />
							<span class="error"></span>

							<div class=" mt-md">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" name="recommended" value="1"><i></i> <?=translate('recommended')?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('price')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="price" id="priceID" autocomplete="off" value="" />
							<span class="error"></span>

							<div class=" mt-md">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" name="free_trial" id="freeTrial" value="1"><i></i> Free Trial</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('discount')?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="discount" id="discountID" autocomplete="off" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('student') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="student_limit" value="" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('parents') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="parents_limit" value="" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('staff') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="staff_limit" value="" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('teacher') . " " . translate('limit')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="teacher_limit" value="" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('subscription') . " " . translate('period')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<div class="row">
								<div class="col-xs-6">
									<?php
										echo form_dropdown("period_type", $arrayPeriod, set_value('period_type'), "class='form-control' id='periodType'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" name="period_value" id="period" value="" autocomplete="off" placeholder="Enter Day / Month / Year." />
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
									$this->db->select('*');
									$this->db->from('permission_modules');
									$this->db->where('permission_modules.in_module', 1);
									$this->db->order_by('permission_modules.prefix', 'asc');
									$modules = $this->db->get()->result();
									foreach ($modules as $key => $value) {
										?>
										<div class="col-md-12 mt-md">
											<div class="checkbox-replace">
												<label class="i-checks"><input type="checkbox" name="modules[]" value="<?php echo $value->id ?>"><i></i> <?php echo $value->name ?></label>
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
							    <input class="switch_menu" id="show_website" name="show_website" checked="" type="checkbox">
							    <label for="show_website" class="label-primary"></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('status')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-lg">
							<div class="material-switch mt-xs">
							    <input class="switch_menu" id="package_status" name="package_status" checked="" type="checkbox">
							    <label for="package_status" class="label-primary"></label>
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