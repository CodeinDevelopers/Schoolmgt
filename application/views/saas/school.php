<?php
$currency_symbol = $global_config['currency_symbol']; ?>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?=(empty($validation_error) ? 'active' : '') ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?=translate('school') . " " . translate('list')?></a>
			</li>
			<li class="<?=(!empty($validation_error) ? 'active' : '') ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('add') . " " . translate('school')?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?=(empty($validation_error) ? 'active' : '')?>">
				<div class="mb-md"> 
					<a href="<?php echo base_url('saas/school') ?>" class="btn btn-outline-primary mr-xs mt-sm <?php echo empty($type) ? 'active' : ''; ?>">All</a>
					<a href="<?php echo base_url('saas/school?type=1') ?>" class="btn btn-outline-success mr-xs mt-sm <?php echo $type == 1 ? 'active' : ''; ?>">Active</a>
					<a href="<?php echo base_url('saas/school?type=2') ?>" class="btn btn-outline-danger mr-xs mt-sm <?php echo $type == 2 ? 'active' : ''; ?>">Inactive</a>
					<a href="<?php echo base_url('saas/school?type=3') ?>" class="btn btn-outline-danger mt-sm <?php echo $type == 3 ? 'active' : ''; ?>">Expired</a>
				</div>
				<div class="mb-md">
					<table class="table table-bordered table-hover table-condensed mb-none table-export nowrap">
						<thead>
							<tr>
								<th width="50"><?=translate('sl')?></th>
								<th><?=translate('school_name')?></th>
								<th><?=translate('plan') . " " . translate('name')?></th>
								<th><?=translate('price')?></th>
								<th><?=translate('email')?></th>
								<th><?=translate('mobile_no')?></th>
								<th><?=translate('date')?></th>
								<th><?=translate('last_upgrade')?></th>
								<th class="no-sort"><?=translate('status')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$count = 1;
							foreach($subscriptionList as $row):
							?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo $row->branch_name;?></td>
								<td><?php echo $row->package_name;?></td>
								<td><?php echo ($row->free_trial == 0) ? $currency_symbol . abs($row->price - $row->discount) : translate('trial');?></td>
								<td><?php echo $row->email;?></td>
								<td><?php echo $row->mobileno;?></td>
								<td><?php echo translate('start_date') . " : <strong>" .  _d($row->created_at) . "</strong><br>" . translate('expiry_date') . " : <strong>" .  (($row->period_type == 1 && empty($row->expire_date)) ? translate('lifetime') : _d($row->expire_date)) . "</strong>";?></td>
								<td><?php echo empty($row->upgrade_lasttime) ? '-' : _d($row->upgrade_lasttime);?></td>
								<td><?php  
								$status = '<i class="far fa-clock"></i> ' . translate('waiting');
								$labelmode = 'label-info-custom';
								if (!empty($row->expire_date) && strtotime($row->expire_date) < strtotime(date("Y-m-d")) && strtotime($row->expire_date) <= time()) {
									$status = translate('expired');
									$labelmode = 'label-danger-custom';
								} else {
									if ($row->status == 1) {
										$status = translate('active');
										$labelmode = 'label-success-custom';
									} else {
										$status = translate('inactive');
										$labelmode = 'label-danger-custom';
									}
								}
								echo "<span class='label " . $labelmode . " '>" . $status . "</span>";
								?></td>
								<td>
									<!--view link-->
									<a href="<?=base_url('saas/school_details/'.$row->bid)?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('details') ?>">
										<i class="fas fa-qrcode"></i>
									</a>
									<!--update link-->
									<a href="<?=base_url('saas/school_edit/'.$row->bid)?>" class="btn btn-default btn-circle icon">
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
									</a>
									<!-- delete link -->
									<?php echo btn_delete('saas/school_delete/' . $row->bid);?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane <?=(!empty($validation_error) ? 'active' : '')?>" id="create">
				<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered validate')); ?>
					<div class="form-group mt-md">
						<label class="col-md-3 control-label"><?=translate('branch_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="branch_name" value="<?=set_value('branch_name')?>" autocomplete="off" />
							<span class="error"><?=form_error('branch_name') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('school_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="school_name" value="<?=set_value('school_name')?>" autocomplete="off" />
							<span class="error"><?=form_error('school_name') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('admin') . " " . translate('name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="admin_name" value="<?=set_value('admin_name')?>" autocomplete="off" />
							<span class="error"><?=form_error('admin_name') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('email')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email" value="<?=set_value('email')?>" />
							<span class="error"><?=form_error('email') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="mobileno" value="<?=set_value('mobileno')?>" autocomplete="off" />
							<span class="error"><?=form_error('mobileno') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?=translate('currency')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="currency" value="<?=set_value('currency')?>" autocomplete="off" />
							<span class="error"><?=form_error('currency') ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('currency_symbol')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="currency_symbol" value="<?=set_value('currency_symbol')?>" autocomplete="off" />
							<span class="error"><?=form_error('currency_symbol'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('city')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="city" value="<?=set_value('city')?>">
							<span class="error"><?=form_error('city'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('state')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="state" value="<?=set_value('state')?>">
							<span class="error"><?=form_error('state'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?=translate('address')?></label>
						<div class="col-md-6">
							<textarea type="text" rows="3" class="form-control" name="address" ><?=set_value('address')?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?=translate('plan')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$saasPackage = $this->saas_model->getSaasPackage();
								echo form_dropdown("saas_package_id", $saasPackage, set_value('saas_package_id'), "class='form-control' data-width='100%'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?=form_error('saas_package_id'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?=translate('status')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$statusArray = ['' => translate('select'), '0' => translate('inactive'), '1' => translate('active')];
								echo form_dropdown("state_id", $statusArray, set_value('state_id'), "class='form-control' data-width='100%' id='stateID'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?=form_error('state_id'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-md-3 mt-md">
							<label class="control-label pt-none"><?=translate('system_logo');?></label>
							<input type="file" name="logo_file" class="dropify" data-allowed-file-extensions="png" data-default-file="<?=$this->application_model->getBranchImage('', 'logo')?>" />
						</div>
						<div class="col-md-3 mb-md">
							<label class="control-label pt-none"><?=translate('text_logo');?></label>
							<input type="file" name="text_logo" class="dropify" data-allowed-file-extensions="png" data-default-file="<?=$this->application_model->getBranchImage('', 'logo-small')?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-md-3">
							<label class="control-label pt-none"><?=translate('printing_logo');?></label>
							<input type="file" name="print_file" class="dropify" data-allowed-file-extensions="png" data-default-file="<?=$this->application_model->getBranchImage('', 'printing-logo')?>" />
						</div>
						<div class="col-md-3 mb-md">
							<label class="control-label pt-none"><?=translate('report_card');?></label>
							<input type="file" name="report_card" class="dropify" data-allowed-file-extensions="png" data-default-file="<?=$this->application_model->getBranchImage('', 'report-card-logo')?>" />
						</div>
					</div>
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" name="submit" value="save">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>