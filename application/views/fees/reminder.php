<?php $currency_symbol = $global_config['currency_symbol'];?>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('reminder') . " " . translate('list'); ?></a>
			</li>
<?php if (get_permission('fees_reminder', 'is_add')){ ?>
			<li class="">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('reminder'); ?></a>
			</li>
<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane active">
				<div class="mb-md">
					<div class="export_title">Fees Type List</div>
					<table class="table table-bordered table-hover table-condensed table-export">
						<thead>
							<tr>
								<th width="50"><?php echo translate('sl'); ?></th>
							<?php if (is_superadmin_loggedin()): ?>
								<th><?=translate('branch')?></th>
							<?php endif; ?>
								<th><?=translate('frequency')?></th>
								<th><?=translate('days')?></th>
								<th><?=translate('notify')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; foreach ($reminderlist as $row): ?>
							<tr>
								<td><?php echo $count++; ?></td>
							<?php if (is_superadmin_loggedin()): ?>
								<td><?php echo $row['branch_name'];?></td>
							<?php endif; ?>
								<td><?php echo ucfirst($row['frequency']); ?></td>
								<td><?php echo $row['days']; ?></td>
								<td><?php 
								echo ($row['student'] == 1 ? '- Student <br>' : '');
								echo ($row['guardian'] == 1 ? '- Guardian' : '');
								?></td>
								<td>
									<?php if (get_permission('fees_reminder', 'is_edit')): ?>
										<a href="<?php echo base_url('fees/edit_reminder/' . $row['id']); ?>" class="btn btn-circle btn-default icon"
										data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
										</a>
									<?php endif; if (get_permission('fees_reminder', 'is_delete')): ?>
										<?php echo btn_delete('fees/reminder_delete/' . $row['id']); ?>
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
<?php if (get_permission('fees_reminder', 'is_add')){ ?>
			<div class="tab-pane" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'frm-submit')); ?>
					<div class="form-horizontal form-bordered mb-lg">
					<?php if (is_superadmin_loggedin() ): ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id', $branch_id), "class='form-control' id='branch_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('frequency')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayType = array(
										'' => translate('select'), 
										'before' => translate('before'), 
										'after' => translate('after'), 
									);
									echo form_dropdown("frequency", $arrayType, set_value('frequency', $branch_id), "class='form-control'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('days')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="days" value="<?=set_value('days')?>" autocomplete="off" />
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('message')?></label>
							<div class="col-md-6">
								<textarea class="form-control" id="message" name="message" placeholder="" rows="3" ></textarea>
								<span class="error"></span>
								<div class="pull-right pr-xs pl-xs alert-danger"> 
									<span id="remaining_count"> 160 characters remaining</span> <span id="messages">1 message </span>
								</div>
								<div class="mt-xlg">
									<strong>Dynamic Tag : </strong>
									<a data-value=" {guardian_name} " class="btn btn-default btn-xs btn_tag ">{guardian_name}</a>
									<a data-value=" {child_name} " class="btn btn-default btn-xs btn_tag ">{child_name}</a>
									<a data-value=" {due_date} " class="btn btn-default btn-xs btn_tag">{due_date}</a>
									<a data-value=" {due_amount} " class="btn btn-default btn-xs btn_tag">{due_amount}</a>
									<a data-value=" {fee_type} " class="btn btn-default btn-xs btn_tag">{fee_type}</a>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">DLT Template ID</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="dlt_template_id" autocomplete="off" value="" placeholder="This field is only required for Indian SMS Gateway (Ex. MSG 91).">
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('notify')?></label>
							<div class="col-md-6 mb-md">
								<div class="checkbox-replace mt-sm pr-xs">
									<label class="i-checks"><input type="checkbox" name="chk_student"><i></i> <?=translate('student')?></label>
								</div>
								<div class="checkbox-replace mt-sm pr-xs">
									<label class="i-checks"><input type="checkbox" name="chk_guardian"><i></i> <?=translate('guardian')?></label>
								</div>
							</div>
						</div>

					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
<?php } ?>
		</div>
	</div>
</section>

<script type="text/javascript">
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
</script>