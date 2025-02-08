<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('sendsmsmail/template/' . $type)?>"><i class="fas fa-list-ul"></i> <?php echo translate('template') . ' ' . translate('list'); ?></a>
			</li>
			<li class="active">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . ' ' . translate('template'); ?></a>
			</li>
		</ul>
		<div class="tab-content">
	
			<div id="create" class="tab-pane active">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit')); ?>
				<input type="hidden" name="template_id" value="<?=$templete['id']?>" >
				<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('branch');?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, $templete['branch_id'], "class='form-control'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
				<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('name'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="template_name" value="<?=$templete['name']?>" />
							<span class="error"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('message'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" name="message" rows="5" id="message"><?=$templete['body']?></textarea>
							<span class="error"></span>
							<div class="pull-right pr-xs pl-xs alert-danger"> 
								<span id="remaining_count"> 160 characters remaining</span> <span id="messages">1 message </span>
							</div>
						</div>
					</div>

					<p class="col-md-offset-3 mt-md">
						<strong>Dynamic Tag : </strong>
						<a data-value=" {name} " class="btn btn-default btn-xs btn_tag ">{name}</a>
						<a data-value=" {email} " class="btn btn-default btn-xs btn_tag">{email}</a>
						<a data-value=" {mobile_no} " class="btn btn-default btn-xs btn_tag">{mobile_no}</a>
					</p>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-offset-3 col-md-2">
								<button type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-default btn-block">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('update')?>
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
	$(document).ready(function () {
		// SMS characters counter
	    var $remaining = $('#remaining_count'),
	        $messages = $remaining.next();
	    $('#message').keyup(function(){
	        var chars = this.value.length,
	            messages = Math.ceil(chars / 160),
	            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
	        $remaining.text(remaining + ' characters remaining');
	        $messages.text(messages + ' message');
	    });

		$('.btn_tag').on('click', function() {
			var $txt = $("#message");
	     	var caretPos = $txt[0].selectionStart;
	        var textAreaTxt = $txt.val();
	        var txtToAdd = $(this).data("value");
	        $txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
		});
	});
</script>