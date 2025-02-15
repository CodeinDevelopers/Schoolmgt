<div class="row appear-animation" data-appear-animation="<?=$global_config['animations'] ?>">
	<div class="row">
	<div class="col-md-12 mb-lg">
	<div class="student-profile-card" style="margin-right: 15px;
    margin-left: 16px;">
    <div class="profile-content">
        <div class="profile-image">
		<img src="<?=get_image_url('parent', $parent['photo'])?>">
        </div>
        
        <div class="profile-details">
		<h2><?=html_escape($parent['name'])?></h2>
				<p><?=ucfirst('parent')?></p>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('relation')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('relation')?>:</span>
                    </div>
                    <span><?=html_escape($parent['relation'])?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('mobile_no')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('mobile_no')?>:</span>
                    </div>
                    <span><?=html_escape(empty($parent['mobileno']) ? 'N/A' : $parent['mobileno']);?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('email')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M21 15.5a3 3 0 01-3 3h-12a3 3 0 01-3-3m18 0v-2a3 3 0 00-3-3H6a3 3 0 00-3 3v2m18 0l-3-3m3 3l-3 3" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('email')?>:</span>
                    </div>
                    <span><?=html_escape(!empty($parent['email']) ? $parent['email'] : 'N/A')?></span>
                </div>
				<div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('address')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('address')?>:</span>
                    </div>
                    <span><?=html_escape(!empty($parent['address']) ? $parent['address'] : 'N/A'); ?></span>
                </div>
            </div>
        </div>
        
    </div>
</div>
	<div class="col-md-12">
		<div class="panel-group" id="accordion">
		<div class="panel panel-accordion">
			<div class="panel-heading">
				<h4 class="panel-title">
                    <div class="pull-right mt-hs">
						<button class="btn btn-default btn-circle" id="authentication_btn">
							<i class="fas fa-unlock-alt"></i> <?=translate('authentication')?>
						</button>
                    </div> 
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#profile">
						<i class="fas fa-user-edit"></i> <?=translate('basic_details')?>
					</a>
				</h4>
			</div>
			<div id="profile" class="accordion-body collapse <?=($this->session->flashdata('profile_tab') ? 'in' : ''); ?>">
				<?php echo form_open_multipart($this->uri->uri_string()); ?>
				<input type="hidden" name="parent_id" value="<?php echo $parent['id']; ?>" id="parent_id">
				<div class="panel-body">
<?php if (is_superadmin_loggedin()) { ?>
					<!-- academic details-->
					<div class="headers-line mt-md">
						<i class="fas fa-school"></i> <?=translate('academic_details')?>
					</div>
					<div class="row">
						<div class="col-md-12 mb-lg">
							<div class="form-group">
								<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id', $parent['branch_id']), "class='form-control' id='branch_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"><?php echo form_error('branch_id'); ?></span>
							</div>
						</div>
					</div>
<?php } ?>
					<!-- parents details -->
					<div class="headers-line">
						<i class="fas fa-user-check"></i> <?=translate('parents_details')?>
					</div>
					<div class="row">
						<div class="col-md-6 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('name')?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-user"></i></span>
									<input class="form-control" name="name" type="text" value="<?=set_value('name', $parent['name'])?>" autocomplete="off" />
								</div>
								<span class="error"><?php echo form_error('name'); ?></span>
							</div>
						</div>
						<div class="col-md-6 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('relation')?> <span class="required">*</span></label>
								<input type="text" class="form-control" name="relation" value="<?=set_value('relation', $parent['relation'])?>" autocomplete="off" />
								<span class="error"><?php echo form_error('relation'); ?></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('father_name')?></label>
								<input class="form-control" name="father_name" type="text" value="<?=set_value('father_name', $parent['father_name'])?>" autocomplete="off" />
							</div>
						</div>
						<div class="col-md-6 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('mother_name')?></label>
								<input type="text" class="form-control" name="mother_name" value="<?=set_value('mother_name', $parent['mother_name'])?>" autocomplete="off" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('occupation')?> <span class="required">*</span></label>
								<input type="text" class="form-control" name="occupation" value="<?=set_value('occupation', $parent['occupation'])?>" autocomplete="off" />
								<span class="error"><?php echo form_error('occupation'); ?></span>
							</div>
						</div>
						<div class="col-md-4 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('income')?></label>
								<input type="text" class="form-control" name="income" value="<?=set_value('income', $parent['income'])?>" autocomplete="off" />
								<span class="error"><?php echo form_error('income'); ?></span>
							</div>
						</div>
						<div class="col-md-4 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('education')?></label>
								<input type="text" class="form-control" name="education" value="<?=set_value('education', $parent['education'])?>" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('city')?></label>
								<input type="text" class="form-control" name="city" value="<?=set_value('city', $parent['city'])?>" />
							</div>
						</div>
						<div class="col-md-3 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('state')?></label>
								<input type="text" class="form-control" name="state" value="<?=set_value('state', $parent['state'])?>" />
							</div>
						</div>
						<div class="col-md-3 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
									<input class="form-control" name="mobileno" type="text" value="<?=set_value('mobileno', $parent['mobileno'])?>" autocomplete="off" />
								</div>
								<span class="error"><?php echo form_error('mobileno'); ?></span>
							</div>
						</div>
						<div class="col-md-3 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('email')?></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-envelope-open"></i></span>
									<input type="email" class="form-control" name="email" id="email" value="<?=set_value('email', $parent['email'])?>" autocomplete="off" />
								</div>
								<span class="error"><?php echo form_error('email'); ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('address')?></label>
								<textarea name="address" rows="2" class="form-control" aria-required="true"><?=set_value('address', $parent['address'])?></textarea>
							</div>
						</div>
					</div>

					<!--custom fields details-->
					<div class="row" id="customFields">
						<?php echo render_custom_Fields('parents', $parent['branch_id'], $parent['id']); ?>
					</div>

					<div class="row mb-md">
						<div class="col-md-12 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('profile_picture')?> <span class="required">*</span></label>
								<input type="file" name="user_photo" class="dropify" data-default-file="<?=get_image_url('parent', $parent['photo'])?>" />
							</div>
							<span class="error"><?php echo form_error('user_photo'); ?></span>
						</div>
						<input type="hidden" name="old_user_photo" value="<?=$parent['photo']?>">
					</div>

					<!-- login details -->
					<div class="headers-line">
						<i class="fas fa-user-lock"></i> <?=translate('login_details')?>
					</div>

					<div class="row mb-lg">
						<div class="col-md-12 mb-sm">
							<div class="form-group">
								<label class="control-label"><?=translate('username')?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-user"></i></span>
									<input type="text" class="form-control" name="username" value="<?=set_value('username', $parent['username'])?>" autocomplete="off" />
								</div>
								<span class="error"><?php echo form_error('username'); ?></span>
							</div>
						</div>
					</div>

				
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-offset-9 col-md-3">
							<button type="submit" name="update" value="1" class="btn btn-default btn-block"><?=translate('update')?></button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
		<div class="panel panel-accordion">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#childs">
						<i class="fas fa-user-graduate"></i> <?=translate('childs')?>
					</a>
				</h4>
			</div>
			<div id="childs" class="accordion-body collapse">
				<div class="panel-body">
					<div class="row">
						<?php 
						$childsresult = $this->parents_model->childsResult($parent['id']);
						if (count($childsresult)) {
							foreach($childsresult as $student) :
						?>
						<div class="col-md-12 col-lg-6 col-xl-4">
							<section class="panel mt-sm mb-sm">
								<div class="panel-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon">
												<img class="rounded" src="<?=get_image_url('student', $student['photo'])?>"/>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title"><?=$student['fullname']?></h4>
												<div class="info">
													<span>
														<?php 
														echo translate('class') . ' : ' . $student['class_name'] . ' (' . $student['section_name']  . ')'; 
														?>
													</span>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted mail-subj" href="<?php echo base_url('student/profile/' . $student['id']);?>" target="_blank"><?=translate('profile')?></a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						<?php 
							endforeach;
						}else{
							echo '<div class="col-md-12"><div class="alert alert-subl mt-md text-center text-danger">' . translate('no_information_available') . ' !</div></div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>

<!-- login authentication and account inactive modal -->
<div id="authentication_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="fas fa-unlock-alt"></i> <?=translate('authentication')?>
			</h4>
		</header>
		<?php echo form_open('parents/change_password', array('class' => 'frm-submit')); ?>
        <div class="panel-body">
        	<input type="hidden" name="parent_id" value="<?=$parent['id']?>">
            <div class="form-group">
	            <label for="password" class="control-label"><?=translate('password')?> <span class="required">*</span></label>
	            <div class="input-group">
	                <input type="password" class="form-control password" name="password" autocomplete="off" />
	                <span class="input-group-addon">
	                    <a href="javascript:void(0);" id="showPassword" ><i class="fas fa-eye"></i></a>
	                </span>
	            </div>
	            <span class="error"></span>
                <div class="checkbox-replace mt-lg">
                    <label class="i-checks">
                        <input type="checkbox" name="authentication" id="cb_authentication">
                        <i></i> <?=translate('login_authentication_deactivate')?>
                    </label>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="text-right">
                <button type="submit" class="btn btn-default mr-xs" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><?=translate('update')?></button>
                <button class="btn btn-default modal-dismiss"><?=translate('close')?></button>
            </div>
        </footer>
        <?php echo form_close(); ?>
	</section>
</div>

<script type="text/javascript">
	var authenStatus = "<?=$parent['active']?>";
</script>
