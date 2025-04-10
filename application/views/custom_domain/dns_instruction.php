<?php 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = rtrim($url, '/');;
$server =  parse_url($url, PHP_URL_HOST);
if (!empty($dns->dns_value_1)) {
	$server = $dns->dns_value_1;
}
$ip =  $_SERVER['SERVER_ADDR'];
if (!empty($dns->dns_value_2)) {
	$ip = $dns->dns_value_2;
}
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel" >
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-globe"></i> <?php echo translate('custom_domain') . " " . translate('instruction');?>
					<div class="panel-btn">
						<a class="btn btn-default btn-circle" href="<?php echo base_url('custom_domain/list') ?>"><i class="fas fa-arrow-left"></i> <?php echo translate('custom_domain');?></a>
					</div>
				</h4>
			</header>
			<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal frm-submit-data'));?>
			<div class="panel-body mb-md">
				<div class="form-group mt-md">
					<label class="col-md-3 control-label"><?=translate('title')?> <span class="required">*</span></label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="title" value="<?php echo $dns->title ?>" />
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('instruction')?></label>
					<div class="col-md-8">
						<textarea name="instruction" class="summernote"><?php echo $dns->instruction ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('status')?></label>
					<div class="col-md-6">
						<div class="material-switch ml-xs">
							<input id="aswitch_1" name="status" type="checkbox" <?php echo $dns->status == 1 ? 'checked' : '' ?>  />
							<label for="aswitch_1" class="label-primary"></label>
						</div>
					</div>
				</div>

				<div class="headers-line mt-md"> <i class="fas fa-server"></i> DNS <?=translate('settings')?></div>
				<div class="form-group">
					<label class="col-md-3 control-label">DNS <?=translate('settings') . " " . translate('enable')?></label>
					<div class="col-md-6">
						<div class="material-switch ml-xs">
							<input id="dns_status_1" name="dns_status" type="checkbox" <?php echo $dns->dns_status == 1 ? 'checked' : '' ?>  />
							<label for="dns_status_1" class="label-primary"></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('title')?></label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="dns_title" value="<?php echo $dns->dns_title ?>" />
						<span class="error"></span>
					</div>
				</div>
				<div class="col-md-offset-3 col-md-8">
					<h4 class="mt-md">DNS records</h4>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<th><?=translate('type')?></th>
								<th><?=translate('host')?> <span class="required">*</span></th>
								<th><?=translate('value')?> <span class="required">*</span></th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $dns->dns_type_1 ?></td>
									<td class="min-w-lg"><input class="form-control" type="text" name="dns_host_1" value="<?php echo $dns->dns_host_1 ?>" autocomplete="off"></td>
									<td class="min-w-lg"><input class="form-control" type="text" name="dns_value_1" value="<?php echo $server ?>" placeholder="Your DNS Server" autocomplete="off"></td>
								</tr>
								<tr>
									<td><?php echo $dns->dns_type_2 ?></td>
									<td class="min-w-lg"><input class="form-control" type="text" name="dns_host_2" value="<?php echo $dns->dns_host_2 ?>" autocomplete="off"></td>
									<td class="min-w-lg"><input class="form-control" type="text" name="dns_value_2" value="<?php echo $ip ?>" placeholder="Your Server IP Address" autocomplete="off"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-2 col-md-offset-3">
						<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> Save</button>
					</div>
				</div>	
			</footer>
			<?php echo form_close(); ?>
		</section>
	</div>
</div>

