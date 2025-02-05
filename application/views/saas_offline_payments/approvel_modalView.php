<?php $row = $this->saas_offline_payments_model->getOfflinePaymentsList(array('op.school_register_id' => $payments_id), true);
$disabled = "";
if ($row['status'] != 1) {
	$disabled = "disabled";
}
echo form_open('saas_offline_payments/approved'); ?>
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-bars"></i> <?php echo translate('details'); ?></h4>
	</header>
	<div class="panel-body">
        <section class="panel pg-fw">
            <div class="panel-body">
                <h5 class="chart-title mb-xs"><?=translate('school_details')?></h5>
                <div class="mt-lg">
					<div class="table-responsive">
						<table class="table borderless mb-none">
							<tbody>
								<tr>
									<th class="text-nowrap"><?php echo translate('reference_no'); ?> : </th>
									<td><?php echo $row['reference_no'] ?></td>
								</tr>
								<tr>
									<th><?php echo translate('school_name'); ?> : </th>
									<td><?php echo $row['school_name']; ?></td>
								</tr>
								<tr>
									<th><?php echo translate('admin_name'); ?> : </th>
									<td><?php echo $row['admin_name']; ?></td>
								</tr>
								<tr>
									<th><?php echo translate('contact_number'); ?> : </th>
									<td><?php echo $row['contact_number']; ?></td>
								</tr>
								<tr>
									<th><?php echo translate('address'); ?> : </th>
									<td><?php echo $row['address']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </section>

        <section class="panel pg-fw">
            <div class="panel-body">
                <h5 class="chart-title mb-xs"><?=translate('payment_details')?></h5>
                <div class="mt-lg">
					<div class="table-responsive">
						<table class="table borderless mb-none">
							<tbody>
								<tr>
									<th><?php echo translate('trx_id'); ?> : </th>
									<td><?php echo $row['id'] ?></td>
								</tr>
								<tr>
									<th width="120"><?=translate('reviewed_by')?> :</th>
									<td>
										<?php
				                            if(!empty($row['approved_by'])){
				                                echo get_type_name_by_id('staff', $row['approved_by']);
				                            }else{
				                                echo translate('unreviewed');
				                            }
										?>
									</td>
								</tr>
								<tr>
									<th><?php echo translate('payment_method'); ?> : </th>
									<td><?php echo get_type_name_by_id('saas_offline_payment_types', $row['payment_type']); ?></td>
								</tr>
								<tr>
									<th><?php echo translate('date_of_submission '); ?> : </th>
									<td><?php echo _d($row['submit_date']); ?></td>
								</tr>
								<tr>
									<th><?php echo translate('date_of_payment'); ?> : </th>
									<td><?php echo _d($row['payment_date']); ?></td>
								</tr>
								<tr class="text-nowrap">
									<th>Approved / Rejected Date : </th>
									<td><?php echo (empty($row['approve_date']) ? '-' : $row['approve_date']); ?></td>
								</tr>
								<tr>
									<th><?php echo translate('reference'); ?> : </th>
									<td><?php echo (empty($row['reference']) ? 'N/A' : $row['reference']); ?></td>
								</tr>
								<tr>
									<th><?php echo translate('user') . " " . translate('note'); ?> : </th>
									<td><?php echo (empty($row['note']) ? 'N/A' : $row['note']); ?></td>
								</tr>
			<?php if (!empty($row['enc_file_name'])) { ?>
								<tr>
									<th><?php echo translate('proof_of_payment'); ?> : </th>
									<td><a class="btn btn-default btn-sm" target="_blank" href="<?=base_url('saas_offline_payments/download/' . $row['id'] . '/' . $row['enc_file_name'])?>"><i class="far fa-arrow-alt-circle-down"></i> <?php echo translate('download'); ?></a></td>
								</tr>
			<?php } ?>
								<tr>
									<th><?php echo translate('paid') . " " . translate('amount'); ?> : </th>
									<td><b><?php echo currencyFormat($row['amount']); ?></b></td>
								</tr>
								<tr>
					                <th><?php echo translate('status'); ?> : </th>
									<th>
					                    <div class="radio-custom radio-inline">
					                        <input type="radio" <?php echo $disabled; ?> id="pending" name="status" value="1" <?php echo ($row['status'] == 1 ? ' checked' : ''); ?>>
					                        <label for="pending"><?php echo translate('pending'); ?></label>
					                    </div>
					                    <div class="radio-custom radio-success radio-inline">
					                        <input type="radio" <?php echo $disabled; ?> id="paid" name="status" value="2" <?php echo ($row['status'] == 2 ? ' checked' : ''); ?>>
					                        <label for="paid"><?php echo translate('approved'); ?></label>
					                    </div>
					                    <div class="radio-custom radio-danger radio-inline">
					                        <input type="radio" <?php echo $disabled; ?> id="suspended" name="status" value="3" <?php echo ($row['status'] == 3 ? ' checked' : ''); ?>>
					                        <label for="suspended"><?php echo translate('suspended'); ?></label>
					                    </div>
					                    <input type="hidden" name="id" value="<?=$row['id'] ?>">
					                    <input type="hidden" name="school_register_id" value="<?=$row['school_register_id'] ?>">
									</th>
								</tr>
								<tr>
									<th><?php echo translate('comments'); ?> : </th>
									<td><textarea class="form-control" name="comments" <?php echo $disabled; ?> rows="3"><?php echo $row['comments']; ?></textarea></td>
								</tr>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </section>
	</div>
	<footer class="panel-footer">
		<div class="row">
			<div class="col-md-12 text-right">
			<?php if ($row['status'] == 1) { ?>
				<button class="btn btn-default mr-xs" type="submit" name="update" value="1">
					<i class="fas fa-plus-circle"></i> <?php echo translate('apply'); ?>
				</button>
			<?php } ?>
				<button class="btn btn-default modal-dismiss"><?php echo translate('close'); ?></button>
			</div>
		</div>
	</footer>
<?php echo form_close(); ?>