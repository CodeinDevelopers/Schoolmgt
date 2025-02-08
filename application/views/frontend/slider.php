<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('slider') . " " . translate('list'); ?></a>
			</li>
	<?php if (get_permission('frontend_slider', 'is_add')) { ?>
			<li>
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('slider'); ?></a>
			</li>
	<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane active">
				<table class="table table-bordered table-hover table-condensed table_default" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
<?php if (is_superadmin_loggedin()): ?>
							<th><?=translate('branch')?></th>
<?php endif; ?>
							<th><?php echo translate('photo'); ?></th>
							<th><?php echo translate('title'); ?></th>
							<th><?php echo translate('button_text_1'); ?></th>
							<th><?php echo translate('button_url_1'); ?></th>
							<th><?php echo translate('button_text_2'); ?></th>
							<th><?php echo translate('button_url_2'); ?></th>
							<th><?php echo translate('position'); ?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							if (!empty($sliderlist)) {
								foreach ($sliderlist as $row):
									$elements = json_decode($row['elements'], true);
									?>
						<tr>
							<td><?php echo $count++; ?></td>
<?php if (is_superadmin_loggedin()): ?>
							<td><?php echo $row['branch_name'];?></td>
<?php endif; ?>
							<td><img class="img-rounded" src="<?php echo base_url('uploads/frontend/slider/' . $elements['image']); ?>" height="50"/></td>
							<td><?php echo strip_tags($row['title']); ?></td>
							<td><?php echo $elements['button_text1']; ?></td>
							<td><?php echo $elements['button_url1']; ?></td>
							<td><?php echo $elements['button_text2']; ?></td>
							<td><?php echo $elements['button_url2']; ?></td>
							<td><?php echo ucfirst(substr($elements['position'], 2)); ?></td>
							<td class="min-w-xs">
								<?php if (get_permission('frontend_slider', 'is_edit')): ?>
									<a href="<?php echo base_url('frontend/slider/edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip"
									data-original-title="<?php echo translate('edit'); ?>"> 
										<i class="fas fa-pen-nib"></i>
									</a>
								<?php endif; if (get_permission('frontend_slider', 'is_delete')): ?>
									<?php echo btn_delete('frontend/slider/delete/' . $row['id']); ?>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; } ?>
					</tbody>
				</table>
			</div>
	<?php if (get_permission('frontend_slider', 'is_add')) { ?>
			<div class="tab-pane" id="create">
			    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit-data')); ?>
					<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, "", "class='form-control' data-plugin-selectTwo
								data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('title'); ?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('button_text_1'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="button_text_1" value="<?php echo set_value('button_text_1'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('button_url_1'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="button_url_1" value="<?php echo set_value('button_url_1'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('button_text_2'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="button_text_2" value="<?php echo set_value('button_text_2'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('button_url_2'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="button_url_2" value="<?php echo set_value('button_url_2'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" id="description" name="description" placeholder="" rows="3" ><?php echo set_value('description'); ?></textarea>
							<span class="error"><?php echo form_error('description'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('position'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayPosition = array(
									'c-left' => translate('left'),
									'c-center' => translate('center'),
									'c-right' => translate('right'),
								);
								echo form_dropdown("position", $arrayPosition, set_value('position'), "class='form-control' data-minimum-results-for-search='Infinity'
								data-plugin-selectTwo data-width='100%'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group <?php if (form_error('photo')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
						<div class="col-md-4">
							<input type="file" name="photo" class="dropify" data-height="150" />
							<span class="error"></span>
						</div>
					</div>
					<footer class="panel-footer mt-lg">
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