<div class="panel">
	<div class="panel-heading">
		<h4 class="panel-title"><?=translate('write_message')?></h4>
	</div>
	<?php echo form_open_multipart('communication/message_send', array('class' => 'frm-submit-data')); ?>
		<div class="panel-body">
		<?php if (is_superadmin_loggedin()) { ?>
			<div class="form-group">
				<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
                <?php
                    $arrayBranch = $this->app_lib->getSelectList('branch');
                    echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branchID'
                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                ?>
                <span class="error"></span>
			</div>
		<?php } ?>
			<div class="form-group">
				<label class="control-label"><?=translate('role')?> <span class="required">*</span></label>
                <?php
                    $role_list = $this->app_lib->getRoles(1);
                    echo form_dropdown("role_id", $role_list, set_value('role_id'), "class='form-control' data-plugin-selectTwo id='roleID'
                    data-width='100%' data-minimum-results-for-search='Infinity' ");
                ?>
                <span class="error"></span>
			</div>
			<div class="form-group class_div" <?php if(empty($class_id)) { ?> style="display: none" <?php } ?>>
				<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
				<?php
					$arrayClass = $this->app_lib->getClass($branch_id);
					echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' data-plugin-selectTwo
					data-width='100%' data-minimum-results-for-search='Infinity' ");
				?>
				<span class="error"></span>
			</div>
			<div class="form-group">
				<label class="control-label"><?=translate('receiver')?> <span class="required">*</span></label>
				<?php
					$arrayUser = array("" => translate('select'));
					echo form_dropdown("receiver_id", $arrayUser, set_value('receiver_id'), "class='form-control' id='receiverID' data-plugin-selectTwo data-width='100%'
					data-minimum-results-for-search='Infinity' ");
				?>
				<span class="error"></span>
			</div>
			<div class="form-group">
				<label class="control-label"><?=translate('subject')?> <span class="required">*</span></label>
				<input id="subject" name="subject" type="text" class="form-control" value="">
				<span class="error"></span>
			</div>
			<div class="form-group">
				<label class="control-label"><?=translate('message')?> <span class="required">*</span></label>
				<textarea name="message_body" class="form-control summernote" id="summernote" rows="10"></textarea>
				<span class="error"></span>
			</div>

			<div class="form-group">
				<label class="control-label">Attachment File</label>
				<div class="col-md-12 row">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="input-append">
							<div class="uneditable-input">
								<i class="fas fa-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-default btn-file">
								<span class="fileupload-exists">Change</span>
								<span class="fileupload-new">Select file</span>
								<input type="file" name="attachment_file" />
							</span>
							<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
						</div>
					</div>
					<span class="error"></span>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-12">
					<div class="pull-right">
						<a href="<?php echo base_url('communication/mailbox/compose') ?>" class="btn btn-default mr-xs"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="20px" height="20px" style="display: inline-block; vertical-align: middle;" aria-hidden="true" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span> <?=translate('discard')?></a>
						<button type="submit" name="submit" value="send" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.39999 6.32003L15.89 3.49003C19.7 2.22003 21.77 4.30003 20.51 8.11003L17.68 16.6C15.78 22.31 12.66 22.31 10.76 16.6L9.91999 14.08L7.39999 13.24C1.68999 11.34 1.68999 8.23003 7.39999 6.32003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.11 13.6501L13.69 10.0601" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span> <?=translate('send')?></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('change', '#branchID', function() {
			var branchID = $(this).val();
			getClassByBranch(branchID);
			$('#roleID').val('').trigger('change.select2');
			$('#receiverID').empty().html("<option value=''><?=translate('select_user')?>");
		});
		
		$(document).on('change', '#roleID', function() {
			var roleID = $(this).val();
			var branchID = $('#branchID').val();
			if(roleID == 6){
		        $.ajax({
		            url: base_url + "communication/getParentListBranch",
		            type: 'POST',
		            data: {
		                branch_id: branchID
		            },
		            success: function (data) {
		                $('#receiverID').html(data);
		            }
		        });
				$(".class_div").hide(400);
			} else if(roleID == 7) {
				$(".class_div").show(400);;
				$('#receiverID').empty().html("<option value=''><?=translate('select_user')?>");
			} else {
				$(".class_div").hide(400);
		        $.ajax({
		            url: base_url + "communication/getStafflistRole",
		            type: 'POST',
		            data: {
		                branch_id: branchID,
		                role_id: roleID
		            },
		            success: function (data) {
		                $('#receiverID').html(data);
		            }
		        });	
			}
		});
		
		$(document).on('change', '#class_id', function() {
			var classID = $(this).val();
			var branchID = $('#branchID').val();
	        $.ajax({
	            url: base_url + "communication/getStudentByClass",
	            type: 'POST',
	            data: {
	                branch_id: branchID,
	                class_id: classID
	            },
	            success: function (data) {
	                $('#receiverID').html(data);
	            }
	        });
		});
	});
</script>