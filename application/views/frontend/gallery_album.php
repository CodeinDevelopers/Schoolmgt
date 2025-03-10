
<div class="row">
	<div class="col-md-12">
		<section class="panel">
				<div class="panel-heading">
                    <div class="panel-btn">
						<a href="javascript:void(0);" onclick="mfp_modal('#upload')" class="btn btn-circle btn-default mb-sm">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('upload')?>
						</a>
                    </div>
					<h4 class="panel-title">
						<i class="fas fa-photo-video"></i> <?=translate('album')?>
					</h4>
				</div>
				<div class="panel-body">
				<table class="table table-bordered table-hover table-condensed table_default">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
							<th><?php echo translate('thumb_image'); ?></th>
							<th><?php echo translate('type'); ?></th>
							<th><?php echo translate('video_url'); ?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						if (!empty($gallery['elements'])) {
							$getJson = json_decode($gallery['elements'], true);
							foreach ($getJson as $key => $row):
								?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><img class="img-border" src="<?php echo $this->gallery_model->get_image_url($row['image']); ?>" width="100"/></td>
							<td><?php echo ($row['type'] == 1 ? "Photo" : "Video"); ?></td>
							<td><?php echo $row['video_url']; ?></td>
							<td class="min-w-xs">
								<?php if (get_permission('frontend_gallery', 'is_delete')): ?>
									<?php echo btn_delete('frontend/gallery/upload_delete/' . $gallery['id'] . '/' . $key); ?>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; }?>
					</tbody>
				</table>



				</div>
		</section>
	</div>
</div>

<!-- multiple import modal -->
<div id="upload" class="zoom-anim-dialog modal-block modal-block mfp-hide">
    <section class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('upload'); ?></h4>
        </div>
        <?php echo form_open_multipart('frontend/gallery/upload', array('class' => 'form-horizontal form-bordered frm-submit-data')); ?>
            <div class="panel-body">
            	<input type="hidden" name="album_id" value="<?php echo $gallery['id'] ?>">
				<div class="form-group">
					<label class="col-md-3 control-label"><?=translate('type')?> <span class="required">*</span></label>
					<div class="col-md-9">
						<?php
							$role_list = array('1' => 'Photo', '2' => 'Video URL');
							echo form_dropdown("type", $role_list, set_value('type'), "class='form-control' id='type'
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
						?>
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group video_url hidden-div">
					<label class="col-md-3 control-label"><?php echo translate('video_url'); ?> <span class="required">*</span></label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="video_url" placeholder="eg: https://www.youtube.com/watch?v=xxxx-xx" value="<?php echo set_value('video_url'); ?>" />
						<span class="error"><?php echo form_error('video_url'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo translate('thumb_image'); ?> <span class="required">*</span></label>
					<div class="col-md-9 mb-md">
						<input type="file" name="thumb_image" class="dropify" data-height="150" data-allowed-file-extensions="jpg jpeg png" />
						<span class="error"></span>
					</div>
				</div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-default mr-xs" id="bankaddbtn" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
                            <i class="fas fa-upload"></i> <?php echo translate('upload'); ?>
                        </button>
                        <button class="btn btn-default modal-dismiss"><?php echo translate('close'); ?></button>
                    </div>
                </div>
            </footer>
        <?php echo form_close(); ?>
    </section>
</div>

<script type="text/javascript">
	$('#type').on('change', function() {
		var value = $(this).val();
		if (value == 2) {
			$('.video_url').show(200);
		} else {
			$('.video_url').hide(200);
		}
	});
</script>