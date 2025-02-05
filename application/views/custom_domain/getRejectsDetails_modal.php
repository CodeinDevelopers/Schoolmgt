<?php 
$getSchool = $this->custom_domain_model->getCustomDomainDetails($id);
echo form_open('custom_domain/reject', array('class' => 'frm-rejec'));
?>
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-bars"></i> <?php echo translate('custom_domain') . " " . translate('reject'); ?></h4>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table borderless mb-none">
				<tbody>
					<tr>
						<th width="120"><?php echo translate('school_name'); ?> : </th>
						<td><?php echo $getSchool->branch_name ?></td>
					</tr>
					<tr>
						<th><?php echo translate('email'); ?> : </th>
						<td><?php echo empty($getSchool->email) ? 'N/A' : $getSchool->email ?></td>
					</tr>
					<tr>
						<th><?php echo translate('mobile_no'); ?> : </th>
						<td><?php echo empty($getSchool->mobileno) ? 'N/A' : $getSchool->mobileno ?></td>
					</tr>
					<tr>
						<th><?php echo translate('domain_name'); ?> : </th>
						<td><?php echo $getSchool->url ?></td>
					</tr>
					<tr>
						<th><?php echo translate('request_date'); ?> : </th>
						<td><?php echo _d($getSchool->request_date) ?></td>
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