<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fas fa-unlock-alt"></i> <?php echo translate('change') . " " . translate('password'); ?>
                </a>
			</li>
			<li>
                <a href="#login" data-toggle="tab">
                    <i class="fas fa-user-lock"></i> <?php echo translate('login') . " " . translate('username'); ?>
                </a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active" id="list">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit')); ?>
					<div class="form-group mt-xs">
						<label class="col-md-3 control-label"><?php echo translate('current_password'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="current_password" value="<?php echo set_value('current_password'); ?>" />
							<span class="error"><?php echo form_error('current_password'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('new_password'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="new_password" value="<?php echo set_value('new_password'); ?>" />
							<span class="error"><?php echo form_error('new_password'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('confirm_password'); ?> <span class="required">*</span></label>
						<div class="col-md-6 mb-md">
							<input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" />
							<span class="error"><?php echo form_error('confirm_password'); ?></span>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-default btn-block"><i class="fas fa-key"></i> <?php echo translate('update'); ?></button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
			<div class="tab-pane box" id="login">
				<?php 
				$username = $this->db->select('username')->where('id', get_loggedin_id())->get('login_credential')->row()->username;
				echo form_open('profile/username_change', array('class' => 'form-horizontal frm-submit')); ?>
					<div class="form-group mt-xs">
						<label class="col-md-3 control-label"><?=translate('username')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-md">
							<div class="input-group">
								<span class="input-group-addon"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.1992 12C14.9606 12 17.1992 9.76142 17.1992 7C17.1992 4.23858 14.9606 2 12.1992 2C9.43779 2 7.19922 4.23858 7.19922 7C7.19922 9.76142 9.43779 12 12.1992 12Z" stroke="currentColor" stroke-width="2.016" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3 22C3.57038 20.0332 4.74796 18.2971 6.3644 17.0399C7.98083 15.7827 9.95335 15.0687 12 15C16.12 15 19.63 17.91 21 22" stroke="currentColor" stroke-width="2.016" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></span>
								<input type="text" class="form-control" name="username" value="<?=set_value('username', $username)?>" />
							</div>
							<span class="error"></span>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-default btn-block"><i class="fas fa-key"></i> <?php echo translate('update'); ?></button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>