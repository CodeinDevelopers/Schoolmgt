<div class="row">
	<div class="col-md-12">
<?php if (is_superadmin_loggedin() ): ?>
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title"><?=translate('select_ground')?></h4>
		</header>
		<?php echo form_open($this->uri->uri_string(), array('id' => 'frmsection', 'class' => 'validate'));?>
		<div class="panel-body">
			<div class="row mb-sm">
				<div class="col-md-offset-3 col-md-6">
					<div class="form-group">
						<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, $branch_id, "class='form-control' id='branch_id' required
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
						?>
					</div>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-offset-10 col-md-2">
					<button type="submit" class="btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
				</div>
			</div>
		</footer>
		<?php echo form_close();?>
	</section>
<?php endif; if (!empty($branch_id)): ?>
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-globe"></i> <?php echo translate('website') . " " . translate('settings'); ?></h4>
			</header>
            <?php echo form_open_multipart('frontend/setting/save' . get_request_url(), array('class' => 'form-horizontal form-bordered frm-submit-data')); ?>
				<div class="panel-body">
					<div class="form-group mt-md">
						<label class="col-md-3 control-label"><?php echo translate('cms') . " " . translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="application_title" value="<?php echo set_value('application_title', $setting['application_title']); ?>" />
							<span class="error"><?php echo form_error('application_title'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('cms') . " " . translate('url_alias'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="url_alias" value="<?php echo set_value('url_alias', $setting['url_alias']); ?>" />
							<span class="error"><?php echo form_error('url_alias'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('cms_frontend'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<div class="radio-custom radio-success radio-inline mb-xs">
								<input type="radio" value="1" name="cms_frontend_status" <?=($setting['cms_active'] == 1 ? 'checked' : '')?> id="sstatus_1">
								<label for="sstatus_1"><?=translate('enabled')?></label>
							</div>

							<div class="radio-custom radio-danger radio-inline">
								<input type="radio" value="0" name="cms_frontend_status" <?=($setting['cms_active'] == 0 ? 'checked' : '')?> id="sstatus_2">
								<label for="sstatus_2"><?=translate('disabled')?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('online_admission'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<div class="radio-custom radio-success radio-inline mb-xs">
								<input type="radio" value="1" <?=($setting['online_admission'] == 1 ? 'checked' : '')?> name="online_admission" id="astatus_1">
								<label for="astatus_1"><?=translate('enabled')?></label>
							</div>

							<div class="radio-custom radio-danger radio-inline">
								<input type="radio" value="0" <?=($setting['online_admission'] == 0 ? 'checked' : '')?> name="online_admission" id="astatus_2">
								<label for="astatus_2"><?=translate('disabled')?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('receive_email_to'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="receive_email_to" value="<?php echo set_value('receive_email_to', $setting['receive_contact_email']); ?>" />
							<span class="error"><?php echo form_error('receive_email_to'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('captcha_status'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$array = array(
									"" => translate('select'),
									"disable" => translate('disable'),
									"enable" => translate('enable')
								);
								echo form_dropdown("captcha_status", $array, set_value('captcha_status', $setting['captcha_status']), "class='form-control' data-plugin-selectTwo
								data-width='100%' id='captchaStatus' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?php echo form_error('captcha_status'); ?></span>
						</div>
					</div>
					<div class="form-group" id="recaptcha_site_key">
						<label  class="col-md-3 control-label"><?php echo translate('recaptcha_site_key'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="recaptcha_site_key" value="<?php echo set_value('recaptcha_site_key', $setting['recaptcha_site_key']); ?>" />
							<span class="error"><?php echo form_error('recaptcha_site_key'); ?></span>
						</div>
					</div>
					<div class="form-group" id="recaptcha_secret_key">
						<label  class="col-md-3 control-label"><?php echo translate('recaptcha_secret_key'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="recaptcha_secret_key" value="<?php echo set_value('recaptcha_secret_key', $setting['recaptcha_secret_key']); ?>" />
							<span class="error"><?php echo form_error('recaptcha_secret_key'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('working_hours'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" id="working_hours" name="working_hours" placeholder="" rows="3" ><?php echo set_value('working_hours', $setting['working_hours']); ?></textarea>
							<span class="error"><?php echo form_error('working_hours'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('logo'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="file" name="logo" class="dropify" data-height="90" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?php echo base_url('uploads/frontend/images/' . $setting['logo']); ?>" />
							<span class="error"><?php echo form_error('logo'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('fav_icon'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="file" name="fav_icon" class="dropify" data-height="90" data-allowed-file-extensions="png ico" data-default-file="<?php echo base_url('uploads/frontend/images/' . $setting['fav_icon']); ?>" />
							<span class="error"><?php echo form_error('fav_icon'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('address'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" id="address" name="address" placeholder="" rows="3" ><?php echo set_value('address', $setting['address']); ?></textarea>
							<span class="error"><?php echo form_error('address'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('google_analytics'); ?></label>
						<div class="col-md-6">
							<textarea class="form-control" id="google_analytics" name="google_analytics" placeholder="" rows="3" ><?php echo set_value('address', $setting['google_analytics']); ?></textarea>
							<span class="error"><?php echo form_error('google_analytics'); ?></span>
						</div>
					</div>


					<div class="row theme_option">
						<label class="col-md-3 control-label">Theme <span class="required">*</span></label>
						<div class="col-md-6">
							<section class="panel pg-fw mb-md">
		                        <div class="panel-body">
		                            <h5 class="chart-title mb-xs">Theme Options</h5>
		                            <div class="mt-lg">
										<div class="form-group">
											<label class="col-md-4 control-label">Primary Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="primary_color" value="<?php echo set_value('primary_color', $setting['primary_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Menu BG Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="menu_color" value="<?php echo set_value('menu_color', $setting['menu_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Button Hover Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="btn_hover" value="<?php echo set_value('btn_hover', $setting['hover_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Text Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="text_color" value="<?php echo set_value('text_color', $setting['text_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Text Secondary Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="secondary_text_color" value="<?php echo set_value('secondary_text_color', $setting['text_secondary_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Footer BG Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="footer_bg_color" value="<?php echo set_value('footer_bg_color', $setting['footer_background_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Footer Text Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="footer_text_color" value="<?php echo set_value('footer_text_color', $setting['footer_text_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Copyright BG Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="copyright_bg_color" value="<?php echo set_value('copyright_bg_color', $setting['copyright_bg_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Copyright Text Color <span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" class="complex-colorpicker form-control" name="copyright_text_color" value="<?php echo set_value('copyright_text_color', $setting['copyright_text_color']) ?>" />
												<span class="error"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Border Radius <span class="required">*</span></label>
											<div class="col-md-6 mb-md">
												<input type="text" class="form-control" name="border_radius" autocomplete="off" value="<?php echo set_value('border_radius', $setting['border_radius']) ?>" />
												<span class="error"></span>
											</div>
										</div>

		                            </div>
		                        </div>
		                    </section>
		                </div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('mobile_no'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="mobile_no" value="<?php echo set_value('mobile_no', $setting['mobile_no']); ?>" />
							<span class="error"><?php echo form_error('mobile_no'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('email'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email" value="<?php echo set_value('email', $setting['email']); ?>" />
							<span class="error"><?php echo form_error('email'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('fax'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="fax" value="<?php echo set_value('fax', $setting['fax']); ?>" />
							<span class="error"><?php echo form_error('fax'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('footer_about_text'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" id="footer_about_text" name="footer_about_text" placeholder="" rows="3" ><?php echo set_value('footer_about_text', $setting['footer_about_text']); ?></textarea>
							<span class="error"><?php echo form_error('footer_about_text'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('copyright_text'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" id="copyright_text" name="copyright_text" placeholder="" rows="3" ><?php echo set_value('copyright_text', $setting['copyright_text']); ?></textarea>
							<span class="error"><?php echo form_error('copyright_text'); ?></span>
						</div>
					</div>
				
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('pinterest_url'); ?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="pinterest_url" value="<?php echo set_value('pinterest_url', $setting['pinterest_url']); ?>" />
						</div>
					</div>
					<div class="form-group <?php if (form_error('instagram_url')) echo 'has-error'; ?>">
						<label  class="col-md-3 control-label"><?php echo translate('instagram_url'); ?></label>
						<div class="col-md-6 mb-md">
							<input type="text" class="form-control" name="instagram_url" value="<?php echo set_value('instagram_url', $setting['instagram_url']); ?>" />
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-2 col-md-offset-3">
							<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
							</button>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</section>
	</div>
</div>

<script type="text/javascript">
    $(".complex-colorpicker").asColorPicker({
		readonly: false,
		lang: 'en',
		mode: 'complex',
		color: {
			reduceAlpha: true,
			zeroAlphaAsTransparent: false
		},
    });

	// frontend setting captcha status 
	$('#captchaStatus').on('change', function(){
	    var status = $(this).val();
	    if(status == "enable") {
	        $('#recaptcha_site_key').show(300); 
	        $('#recaptcha_secret_key').show(300);  
	    } else {
	        $('#recaptcha_site_key').hide(300); 
	        $('#recaptcha_secret_key').hide(300); 
	    }
	});

	<?php if($setting['captcha_status'] == "enable") { ?>
		$('#recaptcha_site_key').show(); 
		$('#recaptcha_secret_key').show();
	<?php } else { ?>
		$('#recaptcha_site_key').hide(); 
		$('#recaptcha_secret_key').hide(); 
	<?php } ?>
</script>

<?php endif; ?>