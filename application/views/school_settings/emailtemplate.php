<div class="row">
	<div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li>
						<a href="<?=base_url('school_settings/emailconfig'. $url)?>"><i class="far fa-envelope"></i> <?=translate('email_config')?></a>
					</li>
					<li class="active">
						<a href="#email_triggers" data-toggle="tab"><i class="fas fa-sitemap"></i> <?=translate('email_triggers')?></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="email_triggers">
						<div class="panel-group" id="accordion">
							<?php
							if (count($templatelist)){
								foreach ($templatelist as $template):
									$this->db->where('branch_id', $branch_id);
									$this->db->where('template_id', $template['id']);
									$getRow = $this->db->get('email_templates_details')->row_array();
									?>	
								<div class="panel panel-accordion">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?=$template['id']?>">
												<i class="fas fa-at"></i> <?=translate($template['name'])?>
											</a>
										</h4>
									</div>
									<div id="<?=$template['id']?>" class="accordion-body collapse">
											<?php echo form_open('school_settings/emailTemplateSave' . $url, array('class' => 'frm-submit-msg')); ?>
											<input type="hidden" name="branch_id" value="<?=$branch_id?>">
											<input type="hidden" name="template_id" value="<?=$template['id']?>">
											<div class="panel-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<div class="checkbox-replace">
																<label class="i-checks">
																	<input type="checkbox" name="notify_enable" id="notify_enable" <?=(isset($getRow['notified']) && $getRow['notified'] == 1 ? 'checked' : '');?>>
																	<i></i> <?=translate('notify_enable')?>
																</label>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label"><?=translate('subject')?> <span class="required">*</span></label>
															<input class="form-control" value="<?=isset($getRow['subject']) ? $getRow['subject'] : ""; ?>" name="subject" type="text">
															<span class="error"></span>
														</div>
														<div class="form-group">
															<label class=" control-label"><?=translate('body')?></label>
															<textarea name="template_body" class="summernote"><?=isset($getRow['template_body']) ? $getRow['template_body'] : "";?></textarea>
															<span class="error"></span>
														</div>
														<div class="md">
															<strong>Codes : </strong><?=html_escape($template['tags'])?>
														</div>
													</div>
												</div>
											</div>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-offset-10 col-md-2">
														<button type="submit" name="submit" value="update" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
															<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
														</button>
													</div>
												</div>
											</div>
										<?php echo form_close();?>
									</div>
								</div>			
							<?php
								endforeach;
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>