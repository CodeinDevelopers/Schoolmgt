<section class="panel">
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fa-solid fa-building-columns"></i> <?=translate('school') . " " . translate('details')?></h4>
		<div class="panel-btn">
			<a href="<?php echo base_url('saas/school') ?>" class="btn btn-default btn-circle"><i class="fa-solid fa-arrow-left"></i> <?=translate('back')?></a>
		</div>
	</header>
	<div class="panel-body">
		<div class="table-responsive mb-md">
			<table class="table table-striped table-condensed mb-lg mt-lg">
				<tbody>
					<tr>
						<th><?=translate('school_name')?></th>
						<td><?php echo $school->school_name; ?></td>
					</tr>
					<tr>
						<th><?=translate('status')?></th>
						<td><?php  
								$status = '<i class="far fa-clock"></i> ' . translate('waiting');
								$labelmode = 'label-info-custom';
								if (!empty($school->expire_date) && strtotime($school->expire_date) < strtotime(date("Y-m-d")) && strtotime($school->expire_date) <= time()) {
									$status = translate('expired');
									$labelmode = 'label-danger-custom';
								} else {
									if ($school->status == 1) {
										$status = translate('active');
										$labelmode = 'label-success-custom';
									} else {
										$status = translate('inactive');
										$labelmode = 'label-danger-custom';
									}
								}
								echo "<span class='label " . $labelmode . " '>" . $status . "</span>";
							?></td>
					</tr>
					<tr>
						<th><?=translate('email')?></th>
						<td><?php echo $school->email; ?></td>
					</tr>
					<tr>
						<th><?=translate('mobile_no')?></th>
						<td><?php echo $school->mobileno; ?></td>
					</tr>
					<tr>
						<th><?=translate('city')?></th>
						<td><?php echo empty($school->city) ? 'N/A' : $school->city; ?></td>
					</tr>
					<tr>
						<th><?=translate('address')?></th>
						<td><?php echo empty($school->address) ? 'N/A' : $school->address; ?></td>
					</tr>
					<tr>
						<th><?=translate('active') . " " .  translate('package')?></th>
						<td><?php echo get_type_name_by_id('saas_package', $school->package_id); ?></td>
					</tr>
					<tr>
						<th><?=translate('date_of_start')?></th>
						<td><?php echo _d($school->created_at); ?></td>
					</tr>
					<tr>
						<th><?=translate('date_of_expiry')?></th>
						<td><?php echo empty($school->expire_date) ? translate('lifetime') : _d($school->expire_date); ?></td>
					</tr>
					<tr>
						<th><?=translate('last_upgrade')?></th>
						<td><?php echo empty($school->upgrade_lasttime) ? 'N/A' : _d($school->upgrade_lasttime); ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="row">
			<div class="col-lg-7 col-md-12">
				<section class="panel pg-fw">
				    <div class="panel-body">
				        <h5 class="chart-title mb-xs"><i class="far fa-credit-card"></i> <?=translate('payment_history')?></h5>
				        <div class="mt-lg">
				        	<div class="export_title">Subscription Payment History</div>
							<table class="table table-bordered table-condensed tbr-middle table-export nowrap" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th><?=translate('sl')?></th>
										<th><?=translate('package')?></th>
										<th><?=translate('purchase_date')?></th>
										<th><?=translate('date_of_expiry')?></th>
										<th>Trx ID</th>
										<th><?=translate('paid')?></th>
										<th><?=translate('method')?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$this->db->select('sst.*,payment_types.name as payvia,saas_package.name as package_name,saas_package.free_trial');
									$this->db->from('saas_subscriptions_transactions as sst');
									$this->db->where('subscriptions_id', $school->subscriptions_id);
									$this->db->join('payment_types', 'payment_types.id = sst.payment_method', 'left');
									$this->db->join('saas_package', 'saas_package.id = sst.package_id', 'left');
									$this->db->order_by('sst.id', 'asc');
									$getPermissions = $this->db->get()->result();
									$count = 1;
							        foreach ($getPermissions as $key => $value) {
						        		?>
									<tr>
										<td><?php echo $count++; ?></td>
										<td><?php echo $value->package_name; ?></td>
										<td><?php echo _d($value->purchase_date); ?></td>
										<td><?php echo _d($value->expire_date); ?></td>
										<td><?php echo $value->payment_id; ?></td>
										<td><?php echo ($value->free_trial == 0) ? $global_config['currency_symbol'] . number_format(($value->amount - $value->discount), 2, '.', '') : translate('free_trial'); ?></td>
										<td><?php echo $value->payvia; ?></td>
									</tr>
								<?php  } ?>
								</tbody>
							</table>
				        </div>
				    </div>
				</section>
			</div>
			<div class="col-lg-5 col-md-12">
				<section class="panel pg-fw">
				    <div class="panel-body">
				        <h5 class="chart-title mb-xs"><i class="fa-solid fa-sliders"></i> <?=translate('modules') . " " . translate('permission')?></h5>
				        <div class="mt-lg">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed tbr-middle" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th width="90">Is Enable ?</th>
											<th><?=translate('modules') . " " .  translate('name')?></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$this->db->select('pm.name,isEnabled');
										$this->db->from('modules_manage');
										$this->db->join('permission_modules as pm', 'pm.id = modules_manage.modules_id', 'left');
										$this->db->where('branch_id', $schoolID);
										$this->db->order_by('pm.name', 'asc');
										$getPermissions = $this->db->get()->result();
								        foreach ($getPermissions as $key => $value) {
							        	if ($value->isEnabled == 1) {
							        		?>
										<tr>
											<td><i class="far fa-check-circle text-success text-xlg"></i></td>
											<td><?php echo $value->name; ?></td>
										</tr>
									<?php } else { ?>
										<tr>
											<td><i class="far fa-times-circle text-danger text-xlg"></i></td>
											<td><?php echo $value->name; ?></td>
										</tr>
									<?php } } ?>
									</tbody>
								</table>
							</div>
				        </div>
				    </div>
				</section>
			</div>
		</div>
	</div>
</section>