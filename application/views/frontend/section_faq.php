<?php if (is_superadmin_loggedin() ): ?>
	<?php $this->load->view('frontend/branch_select'); ?>
<?php endif; if (!empty($branch_id)): ?>
<div class="row">
	<div class="col-md-3 mb-md">
		<?php include 'sidebar.php'; ?>
	</div>
	<div class="col-md-9">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#about" data-toggle="tab"><?php echo translate('faq'); ?></a>
					</li>
					<li>
						<a href="#options" data-toggle="tab"><?php echo translate('options'); ?></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="about">
						<?php echo form_open('frontend/section/faqSave' . get_request_url(), array('class' => 'form-horizontal frm-submit')); ?>
							<div class="form-group mt-md">
								<label class="col-md-2 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="title" value="<?php echo set_value('title', $faq['title']); ?>" />
									<span class="error"><?php echo form_error('title'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md">
								<label class="col-md-2 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
								<div class="col-md-9 mb-lg">
									<textarea name="description" class="summernote"><?php echo set_value('description', $faq['description']); ?></textarea>
									<span class="error"><?php echo form_error('description'); ?></span>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane" id="options">
						<?php echo form_open_multipart('frontend/section/faqOptionSave' .  get_request_url(), array('class' => 'form-horizontal frm-submit-data')); ?>
							<div class="form-group mt-md">
								<label class="col-md-2 control-label"><?php echo translate('page') . " " .  translate('_title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_title" value="<?php echo set_value('page_title', $faq['page_title']); ?>" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('banner_photo'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="hidden" name="old_photo" value="<?php echo $faq['banner_image']; ?>">
									<input type="file" name="photo" class="dropify" data-height="150" data-default-file="<?php echo base_url('uploads/frontend/banners/' . $faq['banner_image']); ?>" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('meta') . " " . translate('keyword'); ?></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_keyword" value="<?php echo set_value('meta_keyword', $faq['meta_keyword']); ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('meta') . " " . translate('description'); ?></label>
								<div class="col-md-8 mb-lg">
									<input type="text" class="form-control" name="meta_description" value="<?php echo set_value('meta_description', $faq['meta_description']); ?>" />
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<?php endif; ?>