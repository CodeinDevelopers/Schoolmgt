<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fas fa-globe"></i> <?php echo translate('domain') . " " . translate('list');?>
                </a>
			</li>
		<?php if (count($customDomain) == 0) { 
			if (get_permission('domain_request', 'is_add')) {
			?>
			<li>
                <a href="#request" data-toggle="tab">
                   <i class="fas fa-paper-plane"></i> Send Request
                </a>
			</li>
		<?php }} ?>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active mb-md" id="list">
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
							<td><a target="_blank" href="<?php echo 'https://' . $row->url; ?>"><?php echo $row->url; ?></a></td>
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
							<?php if (get_permission('domain_request', 'is_edit')) { ?>
								<a href="<?php echo base_url('custom_domain/request_domain_edit/' . $row->id);?>" class="btn btn-default btn-circle icon">
									<i class="fas fa-pen-nib"></i>
								</a>
							<?php 
								}
								if ($row->status == 0) {
									if (get_permission('domain_request', 'is_delete')) {
										echo btn_delete('custom_domain/delete/' . $row->id);
									}
								}
								?>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		<?php 
	if (get_permission('domain_request', 'is_add')) {
		if (count($customDomain) == 0) { ?>
			<div class="tab-pane box" id="request">
				<?php echo form_open('custom_domain/send_request', array('class' => 'form-horizontal form-bordered frm-submit'));
				$dns = $this->custom_domain_model->getDNSinstruction();
				if ($dns->status == 1) {
				?>
					<section class="panel pg-fw">
					   <div class="panel-body">
					       <h5 class="chart-title mb-xs"><i class="fas fa-question-circle"></i> <?php echo $dns->title; ?></h5>
					       <div class="mt-lg">
					           <?php echo $dns->instruction; 
					           if ($dns->dns_status == 1) {
					           	?>
									<h4 class="mt-lg"><?php echo $dns->dns_title ?></h4>
									<div class="table-responsive mt-md">
										<table class="table nowrap">
											<thead>
												<tr>
													<th>Type</th>
													<th>Host</th>
													<th>Value</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><span class="badge" style="background-color: #94a7ff; padding: 7px 14px; border-radius: 5px;"><?php echo $dns->dns_type_1 ?></span></td>
													<td><?php echo $dns->dns_host_1 ?></td>
													<td><?php echo $dns->dns_value_1 ?></td>
												</tr>
												<tr>
													<td><span class="badge" style="background-color: #94a7ff; padding: 7px 14px; border-radius: 5px;"><?php echo $dns->dns_type_2 ?></span></td>
													<td><?php echo $dns->dns_host_2 ?></td>
													<td><?php echo $dns->dns_value_2 ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								<?php } ?>
					       </div>
					   </div>
					</section>
					<br>
				<?php } ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('type')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
							$arrayDomainType = [
								'' => translate('select'),
								'subdomain' => translate('subdomain'),
								'domain' => translate('domain'),
							];
							echo form_dropdown("domainType", $arrayDomainType, set_value('domainType', 'subdomain'), "class='form-control' data-width='100%' onchange='domain_feature(this);'
							data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="subdomain domainField">
						<div class="form-group">
							<label class="col-md-3 control-label">URL <span class="required">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<div class="input-group-addon"><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://"); ?></div>
									<input type="text" name="subdomain_name" class="form-control text_format" autocomplete="off" value="">
									<div class="input-group-addon">
										<?php echo $this->custom_domain_model->getDomain_name($_SERVER['HTTP_HOST']) ?>
									</div>
								</div>
								<span class="error"></span>
							</div>
						</div>
					</div>
					<div class="domain hidden-div domainField">
						<div class="form-group">
							<label class="col-md-3 control-label">URL <span class="required">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<div class="input-group-addon"><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://"); ?></div>
									<input type="text" name="domain_name" class="form-control" autocomplete="off" value="" placeholder="example.com">
								</div>
								<span class="error"></span>
								<div class="mt-xs">
									<p>Domain Name Without Protocol. Avoid http, https, www, etc.</p>
								</div>
							</div>
						</div>
					</div>
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<i class="fas fa-paper-plane"></i> <?php echo translate('send'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
		<?php } } ?>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).on('input','.text_format',function(){
		var val = $(this).val();
		if(val==''){
			return;
		}
		var replace = val.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
		$(this).val(replace);
	});

	function domain_feature(e){
		let val = $(e).val();
		if (val !== "") {
			$('.domainField').slideUp();
			$(`.${val}`).slideDown();
		}
	}
</script>