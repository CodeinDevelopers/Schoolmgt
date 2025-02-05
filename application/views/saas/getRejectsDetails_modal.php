<?php 
$getSchool = $this->saas_model->getPendingSchool($school_id);
echo form_open('saas/reject', array('class' => 'frm-rejec')); ?>
	<input type="hidden" name="school_id" value="<?php echo $school_id ?>">
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-bars"></i> <?php echo translate('subscription') . " " . translate('reject'); ?></h4>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table borderless mb-none">
				<tbody>
					<tr>
						<th><?php echo translate('school_name'); ?> : </th>
						<td><?php echo $getSchool->school_name ?></td>
					</tr>
					<tr>
						<th><?php echo translate('admin_name'); ?> : </th>
						<td><?php echo $getSchool->admin_name ?></td>
					</tr>
					<tr>
						<th><?php echo translate('mobile_no'); ?> : </th>
						<td><?php echo $getSchool->contact_number ?></td>
					</tr>
					<tr>
						<th><?php echo translate('email'); ?> : </th>
						<td><?php echo $getSchool->email ?></td>
					</tr>
					<tr>
						<th width="120"><?php echo translate('payment_status'); ?> : </th>
						<td><?php
								$paymentStatus = "";
								if ($getSchool->payment_status == 0){
									$paymentStatus = '<span class="label label-danger-custom text-xs">' . translate('unpaid') . '</span>';
								} else if ($getSchool->payment_status  == 1) {
									$paymentStatus = '<span class="label label-success-custom text-xs">' . translate('paid') . '</span>';
								}
								echo ($paymentStatus);
								?></td>
					</tr>					
					<tr>
						<th><?php echo translate('message'); ?> : </th>
						<td><?php echo empty($getSchool->message) ? "-" : $getSchool->message; ?></td>
					</tr>
					<tr>
						<th><?php echo translate('comments'); ?> : </th>
						<td><textarea class="form-control" name="comments" rows="3"><?php echo $getSchool->comments; ?></textarea></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<footer class="panel-footer">
		<div class="row">
			<div class="col-md-12 text-right">
				<button class="btn btn-default mr-xs" type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><i class="far fa-times-circle"></i> <?php echo translate('reject'); ?></button>
				<button class="btn btn-default modal-dismiss"><?php echo translate('close'); ?></button>
			</div>
		</div>
	</footer>
<?php echo form_close(); ?>