<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
			</header>
			<?php echo form_open($this->uri->uri_string(), array('class' => 'validate'));?>
			<div class="panel-body">
				<div class="row mb-sm">
					<div class="col-md-offset-3 col-md-6 mb-sm">
						<div class="form-group">
							<label class="control-label"><?php echo translate('date'); ?> <span class="required">*</span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
								<input type="text" class="form-control daterange" name="daterange" value="<?php echo set_value('daterange', date("Y/m/d") . ' - ' . date("Y/m/d")); ?>" required />
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="search" value="1" class="btn btn-default btn-block"> <i class="fas fa-filter"></i> <?=translate('filter')?></button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>

		<?php if (isset($getPendingRequest)):?>
		<section class="panel" >
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-sitemap"></i> <?php echo translate('school') . " " . translate('list');?></h4>
			</header>
			<div class="panel-body mb-md">
				<table class="table table-bordered table-condensed table-hover table-export nowrap">
					<thead>
						<tr>
							<th width="80"><?=translate('sl')?></th>
							<th><?=translate('reference_no')?></th>
							<th><?=translate('school_name')?></th>
							<th><?=translate('plan') . " " . translate('name')?></th>
							<th><?=translate('price')?></th>
							<th><?=translate('admin_name')?></th>
							<th><?=translate('contact_number')?></th>
							<th><?=translate('status')?></th>
							<th><?=translate('payment_status')?></th>
							<th><?=translate('apply_date')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						foreach($getPendingRequest as $row): 
							?>
						<tr>
							<td><?php echo $count++;  ?></td>
							<td><?php echo $row->reference_no;?></td>
							<td><?php echo $row->school_name;?></td>
							<td><?php echo $row->package_name;?></td>
							<td><?php echo $row->plan_price;?></td>
							<td><?php echo $row->admin_name;?></td>
							<td><?php echo $row->contact_number;?></td>
							<td>
								<?php
								if ($row->status == 0)
									$status = '<span class="label label-warning-custom text-xs">' . translate('pending') . '</span>';
								else if ($row->status  == 1)
									$status = '<span class="label label-success-custom text-xs">' . translate('approved') . '</span>';
								else if ($row->status  == 2)
									$status = '<span class="label label-danger-custom text-xs">' . translate('reject') . '</span>';
								echo ($status);
								?>
							</td>
							<td><?php
								$paymentStatus = "";
								if ($row->payment_status == 0) {
									$paymentStatus = '<span class="label label-warning-custom text-xs">' . ($row->payment_data == 'olp' ? translate('offline_payments') : translate('unpaid')) . '</span>';
								} else if ($row->payment_status  == 1) {
									$paymentStatus = '<span class="label label-success-custom text-xs">' . translate('paid') . '</span>';
								} else if ($row->payment_status  == 2) {
									$paymentStatus = '<span class="label label-danger-custom text-xs">' . translate('reject') . '</span>';
								}
								echo ($paymentStatus);
								?></td>
							<td><?php echo _d($row->created_at) . " <br> " . date("h:m A", strtotime($row->created_at));?></td>
							<td>
							<?php if ($row->payment_data == 'olp') { ?>
								<button class="btn btn-circle icon btn-default" data-toggle="tooltip" data-original-title="<?=translate('offline_payments')?>" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" onclick="getApprovelOfflinePayments(this, '<?=$row->id?>')"><i class="far fa-credit-card"></i></button>
							<?php } if ($row->status != 1) { ?>
								<a href="<?php echo base_url('saas/school_approved/' . $row->id);?>" class="btn btn-success btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('approved')?>">
									<i class="far fa-check-circle"></i>
								</a>
								<?php if ($row->status == 0) { ?>
								<button  onclick="getApprovelLeaveDetails(this, '<?php echo $row->id?>')" class="btn btn-default btn-circle icon" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" data-toggle="tooltip" data-original-title="<?=translate('reject')?>">
									<i class="far fa-times-circle"></i>
								</button>
								<?php } 
								} ?>
								<?php echo btn_delete('saas/delete/' . $row->id);?>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</section>
		<?php endif;?>
	</div>
</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="quickView">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="far fa-user-circle"></i> <?=translate('quick_view')?>
			</h4>
		</header>
		<div class="panel-body">
			<div class="quick_image">
				<img alt="" class="user-img-circle" id="quick_image" src="<?=base_url('uploads/app_image/defualt.png')?>" width="120" height="120">
			</div>
			<div class="text-center">
				<h4 class="text-weight-semibold mb-xs" id="quick_full_name"></h4>
				<p><?=translate('student')?> / <span id="quick_category"></p>
			</div>
			<div class="table-responsive mt-md mb-md">
				<table class="table table-striped table-bordered table-condensed mb-none">
					<tbody>
						<tr>
							<th><?=translate('register_no')?></th>
							<td><span id="quick_register_no"></span></td>
							<th><?=translate('roll')?></th>
							<td><span id="quick_roll"></span></td>
						</tr>
						<tr>
							<th><?=translate('admission_date')?></th>
							<td><span id="quick_admission_date"></span></td>
							<th><?=translate('date_of_birth')?></th>
							<td><span id="quick_date_of_birth"></span></td>
						</tr>
						<tr>
							<th><?=translate('blood_group')?></th>
							<td><span id="quick_blood_group"></span></td>
							<th><?=translate('religion')?></th>
							<td><span id="quick_religion"></span></td>
						</tr>
						<tr>
							<th><?=translate('email')?></th>
							<td colspan="3"><span id="quick_email"></span></td>
						</tr>
						<tr>
							<th><?=translate('mobile_no')?></th>
							<td><span id="quick_mobile_no"></span></td>
							<th><?=translate('state')?></th>
							<td><span id="quick_state"></span></td>
						</tr>
						<tr class="quick-address">
							<th><?=translate('address')?></th>
							<td colspan="3" height="80px;"><span id="quick_address"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default modal-dismiss"><?=translate('close')?></button>
				</div>
			</div>
		</footer>
	</section>
</div>
<div class="zoom-anim-dialog modal-block modal-block-lg mfp-hide" id="modal">
	<section class="panel" id='offlinePayments_view'></section>
</div>

<script type="text/javascript">
	// get payments approvel details
	function getApprovelOfflinePayments(elem, id) {
		var btn = $(elem);
	    $.ajax({
	        url: base_url + 'saas_offline_payments/getApprovelDetails',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "html",
            beforeSend: function () {
                btn.button('loading');
            },
	        success: function (data) {
				$('#offlinePayments_view').html(data);
				mfp_modal('#modal');
	        },
            error: function (xhr) {
                btn.button('reset');
            },
            complete: function () {
                btn.button('reset');
            } 
	    });
	}

	function getApprovelLeaveDetails(elem, id) {
		var btn = $(elem);
	    $.ajax({
	        url: base_url + 'saas/getRejectsDetails',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "html",
            beforeSend: function () {
                btn.button('loading');
            },
	        success: function (data) {
				$('#quick_view').html(data);
				mfp_modal('#modal');
	        },
            error: function (xhr) {
                btn.button('reset');
            },
            complete: function () {
                btn.button('reset');
            } 
	    });
	}


    $(document).on('submit', 'form.frm-reject', function(e) {
      		var $this = $(this);
            e.preventDefault();
            var btn = $this.find('[type="submit"]');
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    btn.button('loading');
                },
                success: function (data) {
                    location.reload(true);
                },
                complete: function (data) {
                    btn.button('reset'); 
                },
                error: function () {
                    btn.button('reset');
                }
            });
        
    });

</script>