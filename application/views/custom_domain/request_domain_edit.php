<?php
$domain_type = ($customDomain->domain_type == 1 ? 'domain' : 'subdomain');
$subdomain_name = "";
if ($domain_type == 'subdomain') {
	$subdomain_arr = explode('.', $customDomain->url, 2); 
	$subdomain_name = $subdomain_arr[0];
}
?>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?php echo base_url('custom_domain/mylist') ?>">
					<i class="fas fa-globe"></i> <?php echo translate('domain') . " " . translate('list');?>
				</a>
			</li>
			<li class="active">
				<a href="#request" data-toggle="tab">
					<i class="fas fa-paper-plane"></i> Edit Request
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active" id="request">
				<?php echo form_open('custom_domain/send_request', array('class' => 'form-horizontal form-bordered frm-submit')); ?>
					<input type="hidden" name="id" value="<?php echo $customDomain->id ?>">
				<?php if ($customDomain->status == 1) { ?>
					<div class="alert alert-info"><i class="fas fa-exclamation-triangle"></i> Editing the URL will re-review it and the custom domain will be disabled until reviewed.</div>
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
							echo form_dropdown("domainType", $arrayDomainType, $domain_type, "class='form-control' data-width='100%' onchange='domain_feature(this);'
							data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="subdomain domainField <?php echo $domain_type == 'domain' ? 'hidden-div' : '' ?>">
						<div class="form-group">
							<label class="col-md-3 control-label">URL <span class="required">*</span></label>
							<div class="col-md-6 mb-md">
								<div class="input-group">
									<div class="input-group-addon"><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://"); ?></div>
									<input type="text" name="subdomain_name" class="form-control text_format" autocomplete="off" value="<?php echo $subdomain_name ?>">
									<div class="input-group-addon">
										<?php echo $this->custom_domain_model->getDomain_name($_SERVER['HTTP_HOST']) ?>
									</div>
								</div>
								<span class="error"></span>
							</div>
						</div>
					</div>
					<div class="domain domainField <?php echo $domain_type == 'domain' ? '' : 'hidden-div' ?>">
						<div class="form-group">
							<label class="col-md-3 control-label">URL <span class="required">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<div class="input-group-addon"><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://"); ?></div>
									<input type="text" name="domain_name" class="form-control" autocomplete="off" value="<?php echo $domain_type == 'domain' ? $customDomain->url : '' ?>" placeholder="example.com">
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
									<i class="fas fa-paper-plane"></i> <?php echo translate('update'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
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