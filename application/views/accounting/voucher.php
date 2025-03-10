<?php $currency_symbol = $global_config['currency_symbol']; ?>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('voucher') . " " . translate('list'); ?></a>
			</li>
<?php if (get_permission('voucher', 'is_add')){ ?>
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('create') . " " . translate('voucher'); ?></a>
			</li>
<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<div class="mb-md">
					<div class="export_title">Voucher List</div>
					<table class="table table-bordered table-hover table-condensed table-export">
						<thead>
							<tr>
								<th width="50"><?php echo translate('sl'); ?></th>
								<th><?php echo translate('account') . " " . translate('name'); ?></th>
								<th><?php echo translate('type'); ?></th>
								<th><?php echo translate('voucher') . " " . translate('head'); ?></th>
								<th><?php echo translate('ref_no'); ?></th>
								<th><?php echo translate('description'); ?></th>
								<th><?php echo translate('pay_via'); ?></th>
								<th><?php echo translate('amount'); ?></th>
								<th><?php echo translate('dr'); ?></th>
								<th><?php echo translate('cr'); ?></th>
								<th><?php echo translate('balance'); ?></th>
								<th><?php echo translate('date'); ?></th>
								<th><?php echo translate('action'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; if (count($voucherlist)){ foreach ($voucherlist as $row): ?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo (!empty($row['attachments']) ? '<i class="fas fa-paperclip"></i> ' : ''); ?> <?php echo $row['ac_name']; ?></td>
								<td><?php echo ucfirst($row['type']); ?></td>
								<td><?php echo $row['v_head']; ?></td>
								<td><?php echo $row['ref']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['via_name']; ?></td>
								<td><?php echo currencyFormat($row['amount']); ?></td>
								<td><?php echo currencyFormat($row['dr']); ?></td>
								<td><?php echo currencyFormat($row['cr']); ?></td>
								<td><?php echo currencyFormat($row['bal']); ?></td>
								<td><?php echo _d($row['date']); ?></td>
								<td>
									<?php if (get_permission('voucher', 'is_edit')): ?>
										<a href="<?php echo base_url('accounting/voucher_edit/' . $row['id']); ?>" class="btn btn-circle icon btn-default" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
										</a>
									<?php endif; if (get_permission('voucher', 'is_delete')): ?>
										<?php echo btn_delete('accounting/voucher_delete/' . $row['id']); ?>
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; }?>
						</tbody>
					</table>
				</div>
			</div>
<?php if (get_permission('voucher', 'is_add')){ ?>
			<div class="tab-pane <?php echo (isset($validation_error) ? 'active' : ''); ?>" id="create">
				<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered validate')); ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('account'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$array_accounts = $this->app_lib->getSelectList('accounts');
								echo form_dropdown("account_id", $accounts_list, set_value('account_id'), "class='form-control'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?php echo form_error('account_id'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('voucher') . " " . translate('type'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$array_type = array(
									'' => translate('select'),
									'expense' => 'Expense',
									'income' => 'Income'
								);
								echo form_dropdown("voucher_type", $array_type, set_value('voucher_type'), "class='form-control' onchange='getHeadList(this.value, 0)'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?php echo form_error('voucher_type'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('voucher') . " " . translate('head'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayVoucherHead = array('' => translate('select'));
								echo form_dropdown("voucher_head_id", $arrayVoucherHead, set_value('voucher_head_id'), "class='form-control' id='voucher_head_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?php echo form_error('voucher_head_id'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('ref'); ?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="ref_no" value="<?php echo set_value('ref_no'); ?>" />
						</div>
					</div>
					<div class="form-group <?php if (form_error('amount')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label"><?php echo translate('amount'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="number" class="form-control" name="amount" value="<?php echo set_value('amount'); ?>" />
							<span class="error"><?php echo form_error('amount'); ?></span>
						</div>
					</div>
					<div class="form-group <?php if (form_error('date')) echo 'has-error'; ?>">
						<label  class="col-md-3 control-label"><?php echo translate('date'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="date" value="<?php echo set_value('date', date('Y-m-d')); ?>" data-plugin-datepicker
							data-plugin-options='{ "todayHighlight" : true, "endDate": "+0d" }' readonly />
							<span class="error"><?php echo form_error('date'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('pay_via'); ?></label>
						<div class="col-md-6">
    						<?php
    							echo form_dropdown("pay_via", $payvia_list, set_value('pay_via'), "class='form-control' data-plugin-selectTwo data-width='100%'
    							data-minimum-results-for-search='Infinity' ");
    						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('description'); ?></label>
						<div class="col-md-6">
							<textarea class="form-control" id="description" name="description" placeholder="" rows="3" ></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('attachment'); ?></label>
						<div class="col-md-6 mb-md">
							<input type="file" name="attachment_file" class="dropify" data-height="70" />
						</div>
					</div>
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" name="save" value="1">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
<?php } ?>
		</div>
	</div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        var voucher_type = "<?php echo set_value('voucher_type'); ?>";
        var voucher_head_id = "<?php echo set_value('voucher_head_id'); ?>";
        getHeadList(voucher_type, voucher_head_id);
    });
</script>