<section class="panel">
	<div class="panel-heading">
		<div class="panel-btn">
			<a href="<?php echo base_url('addons/manage') ?>"  class="btn btn-circle btn-default mb-sm"><i class="fa-solid fa-left-long"></i> <?=translate('addon_manager')?></a>
		</div>
		<h4 class="panel-title"> <i class="fas fa-puzzle-piece"></i> Addon Details</h4>
	</div>
	<div class="panel-body">
		<?php
		if ($purchase_code == true) {
			if ($internet == true) {
				if ($current_version != $latest_version && $latest_version > $current_version) {
					?>
			<div class="alert alert-info text-center mt-md">
				Before performing an update, it is <b>strongly recommended to create a full backup</b> of your current installation <b>(files and database)</b> and review the changelog.
			</div>
		<?php } ?>
		<div class="col-md-8 col-md-offset-2">
			<div class="table-responsive mt-md mb-md">
				<table class="table sys-update table-striped table-bordered mb-none">
					<tbody>
					<?php if (!empty($update_errors)) {?>
						<tr>
							<td colspan="2"><div class="alert alert-danger mb-none"><?php echo $update_errors ?></div></td>
						</tr>
					<?php } ?>
						<tr>
							<th><i class="far fa-circle"></i> Addon Name</th>
							<td><?php echo $addon->name; ?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> Your version</th>
							<td><?php echo wordwrap($current_version, 1, '.', true); ?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> Latest Version</th>
							<td><?php echo wordwrap($latest_version, 1, '.', true) ?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> Purchase Code </th>
							<td><?php
								if($block) {
									echo '<span class="badge badge-danger">' . $get_update_info->message . '</span>';
								} else {
									if ($status == 0) {
										echo $purchase_code;
									} else {
										echo '<span class="badge badge-danger">' . $purchase_code . '</span>';
									}
									
								}
							?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> Support Expiry Date </th>
							<td><?php echo $support_expiry_date; ?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> Php version </th>
							<td><?php echo phpversion(); ?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> Zip Extension </th>
							<td><?php 
							if ($zip_extension) {
								echo '<span class="badge badge-success">Enabled</span>';
							} else {
								echo '<span class="badge badge-danger">Not Enabled</span>';
							}
							?></td>
						</tr>
						<tr>
							<th><i class="far fa-circle"></i> cURL Extension </th>
							<td><?php 
							if ($curl_extension) {
								echo '<span class="badge badge-success">Enabled</span>';
							} else {
								echo '<span class="badge badge-danger">Not Enabled</span>';
							}
							?></td>
						</tr>
					<?php if ($current_version != $latest_version && $latest_version > $current_version) {
						if ($status == 0) {
							?>
						<tr>
							<td colspan="2">
								<?php if (isset($get_update_info->update_history) && !empty($get_update_info->update_history)) {
									echo $get_update_info->update_history;
								} ?>
								<div class="col-md-offset-4 col-md-4">
									<button id="update_app" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
										<i class="far fa-arrow-alt-circle-down"></i> Update Now
									</button>
								</div>	
								<div class="col-md-12">
									<div id="update_messages"></div>
								</div>
							</td>
						</tr>
					<?php } } ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php } else { ?>
		<div class="alert alert-info text-center mt-md">
			Please Connect To The Internet.
		</div>
	<?php } } else { ?>
		<div class="alert alert-info text-center mt-md">
			Your license code was not found.
		</div>
	<?php } ?>
	</div>
</section>

<?php if (empty($addon->purchase_code)) { ?>
<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="far fa-address-card"></i> <?php echo translate('purchase_code'); ?>
			</h4>
		</header>
		<?php echo form_open('addons/update_purchase_code', array('class' => 'frm-submit')); ?>
			<div class="panel-body">
				<input type="hidden" name="items" value="<?php echo $addon->prefix; ?>">
				<div class="form-group mb-md">
					<label class="control-label"><?php echo translate('purchase_code'); ?> <span class="required">*</span></label>
					<input type="text" class="form-control" value="" name="purchase_code" autocomplete="off" />
					<span class="error"></span>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-default mr-xs" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
						</button>
						<button class="btn btn-default modal-dismiss"><?php echo translate('cancel'); ?></button>
					</div>
				</div>
			</footer>
		<?php echo form_close(); ?>
	</section>
</div>
<?php } ?>

<script type="text/javascript">
<?php if (empty($addon->purchase_code)) { ?>
	$(document).ready(function () {
		mfp_modal('#modal');
	});
<?php } ?>
	$('#update_app').on('click', function (e) {
		e.preventDefault();
		$('#update_messages').html("");
		var btn = $(this);
		var latest_version = "<?=$latest_version?>";
		var items = "<?=$items?>";
		$.ajax({
		    url: base_url + 'addons/update_install',
		    type: "POST",
		    data: {
		    	'latest_version': latest_version,
		    	'items': items
		    },
		    dataType: 'json',
		    beforeSend: function () {
		        btn.button('loading');
		    },
		    success: function (res) {
		    	if (res.status) {
		            $('#update_messages').html('<div class="alert alert-success mt-lg"></div>');
		            $('#update_messages .alert').append('<p>' + res.message + '</p>');
                    setTimeout(function () {
                        window.location.reload();
                    }, 5000);
		    	} else {
		            $('#update_messages').html('<div class="alert alert-danger mt-lg"></div>');
		            $('#update_messages .alert').append('<p>' + res.message + '</p>');
		            btn.button('reset'); 
		    	}
		    },
		    complete: function (data) {
		        
		    },
            error: function () {
                btn.button('reset');
            },
		    error: function () {
		        btn.button('reset');
		    }
		});
	})
</script>