<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('gallery') . " " . translate('list'); ?></a>
			</li>
	<?php if (get_permission('frontend_gallery', 'is_add')) { ?>
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('gallery'); ?></a>
			</li>
	<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<table class="table table-bordered table-hover table-condensed table_default">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
<?php if (is_superadmin_loggedin()): ?>
							<th><?=translate('branch')?></th>
<?php endif; ?>
							<th><?php echo translate('thumb_image'); ?></th>
							<th><?php echo translate('gallery') . " " . translate('title'); ?></th>
							<th><?php echo translate('category'); ?></th>
							<th><?php echo translate('description'); ?></th>
							<th><?php echo translate('uploaded'); ?></th>
							<th class="no-sort"><?=translate('show_website')?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						if (!empty($gallerylist)) {
							foreach ($gallerylist as $row):
								?>
						<tr>
							<td><?php echo $count++; ?></td>
<?php if (is_superadmin_loggedin()): ?>
							<td><?php echo $row['branch_name'];?></td>
<?php endif; ?>
							<td><img class="img-border" src="<?php echo $this->gallery_model->get_image_url($row['thumb_image']); ?>" width="80"/></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo get_type_name_by_id('front_cms_gallery_category', $row['category_id']); ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php
								$uploadedCount = json_decode($row['elements'], true);
								echo count($uploadedCount); ?></td>
							<td>
							<?php if (get_permission('event', 'is_edit')) { ?>
								<div class="material-switch ml-xs">
									<input class="gallery_website" id="websiteswitch_<?=$row['id']?>" data-id="<?=$row['id']?>" name="evt_switch_website<?=$row['id']?>" 
									type="checkbox" <?php echo ($row['show_web'] == 1 ? 'checked' : ''); ?> />
									<label for="websiteswitch_<?=$row['id']?>" class="label-primary"></label>
								</div>
							<?php } ?>
							</td>
							<td class="action">
								<a href="<?php echo base_url('frontend/gallery/album/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="Add Photos / Videos"> 
									<i class="fas fa-photo-video"></i>
								</a>
								<?php if (get_permission('frontend_gallery', 'is_edit')): ?>
									<a href="<?php echo base_url('frontend/gallery/edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
									</a>
								<?php endif; if (get_permission('frontend_gallery', 'is_delete')): ?>
									<?php echo btn_delete('frontend/gallery/delete/' . $row['id']); ?>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; }?>
					</tbody>
				</table>
			</div>
	<?php if (get_permission('frontend_gallery', 'is_add')) { ?>
			<div class="tab-pane <?php echo (isset($validation_error) ? 'active' : ''); ?>" id="create">
			    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit-data')); ?>
					<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, "", "class='form-control' data-plugin-selectTwo id='branch_id'
								data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('gallery') . " " . translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="gallery_title" value="<?php echo set_value('gallery_title'); ?>" />
							<span class="error"><?php echo form_error('gallery_title'); ?></span>
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
						<label class="col-md-3 control-label"><?php echo translate('category'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$branchID = $this->application_model->get_branch_id();
								$arrayCategory = $this->app_lib->getSelectByBranch('front_cms_gallery_category', $branchID);
								echo form_dropdown("category_id", $arrayCategory, set_value('category_id'), "class='form-control' id='category_id' data-minimum-results-for-search='Infinity'
								data-plugin-selectTwo data-width='100%'");
							?>
							<span class="error"><?php echo form_error('type'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('thumb_image'); ?> <span class="required">*</span></label>
						<div class="col-md-4">
							<input type="file" name="thumb_image" class="dropify" data-height="150" />
							<span class="error"><?php echo form_error('thumb_image'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('show_website')?></label>
						<div class="col-md-6">
							<div class="material-switch ml-xs">
								<input id="switch_1" name="show_website" 
								type="checkbox" />
								<label for="switch_1" class="label-primary"></label>
							</div>
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

<script type="text/javascript">
	$('#branch_id').on('change', function() {
		var branchID = $(this).val();
		$.ajax({
			url: base_url + 'ajax/getDataByBranch',
			type: 'POST',
			data: {
				table: "front_cms_gallery_category",
				branch_id: branchID
			},
			success: function (response) {
				$('#category_id').html(response);
			}
		});
	});
</script>