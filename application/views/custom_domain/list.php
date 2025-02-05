<div class="row">
	<div class="col-md-12">
		<section class="panel" >
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-globe"></i> <?php echo translate('domain') . " " . translate('list');?>
					<div class="panel-btn">
						<a class="btn btn-primary btn-circle" href="<?php echo base_url('custom_domain/dns_instruction') ?>"><i class="fas fa-question-circle"></i> <?php echo translate('custom_domain') . " " . translate('instruction');?></a>
					</div>
				</h4>
			</header>
			<div class="panel-body mb-md">
				<table class="table table-bordered table-condensed table-hover table-export nowrap">
					<thead>
						<tr>
							<th width="80"><?=translate('sl')?></th>
							<th><?=translate('school_name')?></th>
							<th><?=translate('origin_url')?></th>
							<th><?=translate('custom_domain')?></th>
							<th><?=translate('domain_type')?></th>
							<th><?=translate('request_date')?></th>
							<th><?=translate('approved_date')?></th>
							<th><?=translate('status')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						foreach($customDomain as $row): 
							?>
						<tr>
							<td><?php echo $count++;  ?></td>
							<td><?php echo $row->branch_name; ?></td>
							<td><a target="_blank" href="<?php echo base_url($row->url_alias); ?>"><?php echo base_url($row->url_alias); ?></a></td>
							<td><?php echo $row->url; ?></td>
							<td><?php echo $row->domain_type == 1 ? translate('domain') : translate('sub_domain'); ?></td>
							<td><?php echo _d($row->request_date); ?></td>
							<td><?php echo empty($row->approved_date) ? "-" : _d($row->approved_date); ?></td>
							<td><?php
								if ($row->status == 0)
									$status = '<span class="label label-warning-custom text-xs">' . translate('pending') . '</span>';
								else if ($row->status  == 1)
									$status = '<span class="label label-success-custom text-xs">' . translate('approved') . '</span>';
								else if ($row->status  == 2)
									$status = '<span class="label label-danger-custom text-xs">' . translate('reject') . '</span>';
								echo ($status);
								?></td>
							<td>
							<?php if ($row->status != 1) { ?>
								<button onclick="domainConfirmModal('<?php echo $row->id?>')" class="btn btn-success btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('approved')?>"><i class="far fa-check-circle"></i></button>
								<?php if ($row->status == 0) { ?>
								<button  onclick="getCustomDomainDetails('<?php echo $row->id?>')" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('reject')?>">
									<i class="far fa-times-circle"></i>
								</button>
								<?php } } ?>
								<?php echo btn_delete('custom_domain/delete/' . $row->id);?>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel" id='quick_view'></section>
</div>

<script type="text/javascript">
	function getCustomDomainDetails(id, school_id) {
	    $.ajax({
	        url: base_url + 'custom_domain/getRejectsDetails',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "html",
	        success: function (data) {
				$('#quick_view').html(data);
				mfp_modal('#modal');
	        }
	    });
	}

	function domainConfirmModal(id) {
		swal({
			title: "<?php echo translate('are_you_sure')?>",
			text: "<?php echo translate('approve_the_domain_request')?>",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn btn-default swal2-btn-default",
			cancelButtonClass: "btn btn-default swal2-btn-default",
			confirmButtonText: "<?php echo translate('yes_continue')?>",
			cancelButtonText: "<?php echo translate('cancel')?>",
			buttonsStyling: false,
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + 'custom_domain/approved/' + id,
					success:function(data) {
						swal({
						title: "<?php echo translate('deleted')?>",
						text: "The domain has been successfully added and activated.",
						buttonsStyling: false,
						showCloseButton: true,
						focusConfirm: false,
						confirmButtonClass: "btn btn-default swal2-btn-default",
						type: "success"
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}
				});
			}
		});
	}

    $(document).on('submit', 'form.frm-rejec', function(e) {
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