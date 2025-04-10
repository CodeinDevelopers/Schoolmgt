<section class="panel">
	<header class="panel-heading">
		<h4 class="panel-title"><?=translate('select_ground')?></h4>
	</header>
	<?php echo form_open($this->uri->uri_string(), array('class' => 'validate'));?>
	<div class="panel-body">
		<div class="row mb-sm">
			<div class="col-md-offset-3 col-md-6">
				<div class="form-group">
					<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
					<?php
						$arrayBranch = $this->app_lib->getSelectList('branch');
						echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' required data-plugin-selectTwo data-width='100%'");
					?>
				</div>
			</div>
		</div>
	</div>
	<footer class="panel-footer">
		<div class="row">
			<div class="col-md-offset-10 col-md-2">
				<button type="submit" name="search" value="1" class="btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
			</div>
		</div>
	</footer>
	<?php echo form_close();?>
</section>
<?php if (!empty($branch_id)): ?>
<div class="row appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
	<div class="col-md-12">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#admission" data-toggle="tab"><i class="fas fa-sliders-h"></i> Modules List</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="admission" class="tab-pane active">
						<?php echo form_open('modules/save', array('class' => 'frm-submit-msg')); ?>
							<input type="hidden" name="branch_id" value="<?php echo $branch_id ?>">
							<table class="table table-bordered table-hover table-condensed mt-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th><?php echo translate('name') ?></th>
										<th> 
											<div class="checkbox-replace"> 
												<label class="i-checks"><input type="checkbox" id="all_view" value="1"><i></i> <?php echo translate('active'); ?></label> 
											</div>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$result = $this->module_model->getStatusArr($branch_id);
									foreach ($result as $key => $value) {
										?>
									<input type="hidden" name="system_fields[<?php echo $value->id ?>][modules_id]" value="<?php echo $value->id ?>">
									<tr>
										<td class="pl-xl"><i class="far fa-arrow-alt-circle-right text-md"></i> <?php echo ucwords(str_replace('_', ' ', $value->prefix)) ?></td>
										<td>
											<div class="checkbox-replace"> 
												<label class="i-checks"><input type="checkbox" class="cb_view" name="system_fields[<?php echo $value->id ?>][status]" <?php echo $value->status == 1 ? 'checked' : '' ?> value="1" >
													<i></i>
												</label>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>

							<?php if (get_permission('system_student_field', 'is_edit')) { ?>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-offset-10 col-md-2">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
							<?php } ?>
						<?php echo form_close(); ?>
					</div>
					
				</div>
			</div>
		</section>
	</div>
</div>
<?php endif; ?>

<script type="text/javascript">
    $('#all_view').on('click', function(){
        var cbRequired = $('.cb_add');
        if (this.checked) {
            cbRequired.prop('disabled', false);
        } else {
            cbRequired.prop('disabled', true);
        }
    });
</script>