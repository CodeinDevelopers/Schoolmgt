<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#attachments" data-toggle="tab"><i class="fas fa-list-ul"></i> <?=translate('attachments')?></a>
					</li>
<?php if (get_permission('attachments', 'is_add')): ?>
					<li >
						<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('create_attachments')?></a>
					</li>
<?php endif; ?>
				</ul>
				<div class="tab-content">
					<div id="attachments" class="tab-pane active">
						<div class="mb-md">
							<table class="table table-bordered table-hover table-condensed mb-none table-export">
								<thead>
									<tr>
										<th><?=translate('sl')?></th>
									<?php if (is_superadmin_loggedin()) { ?>
										<th><?=translate('branch')?></th>
									<?php } ?>
										<th><?=translate('title')?></th>
										<th><?=translate('type')?></th>
										<th><?=translate('class')?></th>
										<th><?=translate('subject')?></th>
										<th><?=translate('remarks')?></th>
										<th><?=translate('publisher')?></th>
										<th><?=translate('date')?></th>
										<th><?=translate('action')?></th>
									</tr>
								</thead>
								<tbody>
									<?php  $count = 1; foreach($attachmentss as $row): ?>
									<tr>
										<td><?php echo $count++; ?></td>
									<?php if (is_superadmin_loggedin()) { ?>
										<td><?php echo $row['branch_name'];?></td>
									<?php } ?>
										<td><?php echo $row['title'];?></td>
										<td><?php echo $row['type_name'];?></td>
										<td><?php echo (empty($row['class_name']) ? '<span class="text-dark">All</span>' : $row['class_name']);?></td>
										<td><?php echo (empty($row['subject_name']) ? '<span class="text-dark">Unfiltered</span>' : $row['subject_name']);?></td>
										<td><?php echo $row['remarks']; ?></td>
										<td><?php echo get_type_name_by_id('staff', $row['uploader_id']);?></td>
										<td><?php echo _d($row['date']);?></td>
										<td class="action">
										<?php 
											$extension = strtolower(pathinfo($row['enc_name'], PATHINFO_EXTENSION));
											if ($extension == 'mp4') {
										?>
											<a href="javascript:void(0);" onclick="playVideo('<?=$row['id']?>');" class="btn btn-default btn-circle icon" data-toggle="tooltip"
											data-original-title="<?=translate('play')?>">
											<i class="far fa-play-circle"></i>
											</a>
										<?php  } ?>
											<!--download link-->
											<a href="<?=base_url('attachments/download?file=' . $row['enc_name'])?>" class="btn btn-default btn-circle icon" data-toggle="tooltip"
											data-original-title="<?=translate('download')?>">
												<i class="fas fa-cloud-download-alt"></i>
											</a>
										<?php if (get_permission('attachments', 'is_edit')): ?>
											<!--update link-->
											<a href="<?=base_url('attachments/edit/' . $row['id'])?>" class="btn btn-default btn-circle icon">
												<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
											</a>
										<?php endif; if (get_permission('attachments', 'is_delete')): ?>
											<!-- delete link -->
											<?php echo btn_delete('attachments/delete/' . $row['id']);?>
										<?php endif; ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="create">
						<?php echo form_open_multipart('attachments/save', array('class' => 'form-bordered form-horizontal frm-submit-data')); ?>
							<?php if (is_superadmin_loggedin() ): ?>
							<div class="form-group">
								<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										$arrayBranch = $this->app_lib->getSelectList('branch');
										echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branch_id'
										data-plugin-selectTwo data-width='100%'");
									?>
									<span class="error"></span>
								</div>
							</div>
							<?php endif; ?>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('title')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="title" value="<?=set_value('title')?>" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?=translate('type')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<?php
										$arrayType = $this->app_lib->getSelectByBranch('attachments_type', $branch_id);
										echo form_dropdown("type_id", $arrayType, set_value('type_id'), "class='form-control' id='type_id' data-plugin-selectTwo
										data-width='100%'");
									?>
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3">
									<div class="ml-md checkbox-replace">
										<label class="i-checks"><input type="checkbox" name="all_class_set" id="all_class_set"><i></i> Available For All Classes</label>
									</div>
								</div>
								<div id="class_div">
									<div class="mt-sm">
										<label class="control-label col-md-3"><?=translate('class')?> <span class="required">*</span></label>
										<div class="col-md-6">
											<?php
												$arrayClass = $this->app_lib->getClass($branch_id);
												echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSubjectByClass(this.value)'
												data-plugin-selectTwo data-width='100%'");
											?>
											<span class="error"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group" id="sub_div">
								<div class="col-md-offset-3">
									<div class="ml-md checkbox-replace">
										<label class="i-checks"><input type="checkbox" name="subject_wise" id="subject_wise"><i></i> Not According Subject</label>
									</div>
								</div>
								<div id="subject_div">
									<div class="mt-sm">
										<label class="control-label col-md-3"><?=translate('subject')?> <span class="required">*</span></label>
										<div class="col-md-6">
											<?php
												$arraySubject = array("" => translate('select_class_first'));
												echo form_dropdown("subject_id", $arraySubject, set_value('subject_id'), "class='form-control' id='subject_id'
												data-plugin-selectTwo data-width='100%' ");
											?>
											<span class="error"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?=translate('publish_date')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="date" value="<?=date('Y-m-d')?>" data-plugin-datepicker />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-md-3 control-label"><?=translate('remarks')?></label>
								<div class="col-md-6">
									<textarea type="text" rows="2" class="form-control" name="remarks" ><?=set_value('remarks')?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?=translate('attachment_file')?> <span class="required">*</span></label>
								<div class="col-md-6 mb-md">
									<input type="file" name="attachment_file" class="dropify" data-height="120" data-allowed-file-extensions="*" />
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
										</button>
									</div>
								</div>	
							</footer>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="zoom-anim-dialog modal-block mfp-hide" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title"><i class="far fa-play-circle"></i> <?php echo translate('play') . " " . translate('video'); ?></h4>
		</header>
		<div class="panel-body">
			<div id='quick_view'></div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default modal-video-dismiss"><?php echo translate('close'); ?></button>
				</div>
			</div>
		</footer>
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#branch_id').on('change', function() {
			var branchID = $(this).val();
			getClassByBranch(this.value);
			$.ajax({
				url: "<?=base_url('ajax/getDataByBranch')?>",
				type: 'POST',
				data: {
					branch_id: branchID,
					table: 'attachments_type'
				},
				success: function (data) {
					$('#type_id').html(data);
				}
			});
		});

		// modal dismiss
		$(document).on("click", ".modal-video-dismiss", function(e) {
			e.preventDefault();
			$.magnificPopup.close();
			$('#attachment_video').trigger('pause');
		});
	});

	function playVideo(id) {
	    $.ajax({
	        url: base_url + 'attachments/playVideo',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "html",
	        success: function (data) {
	            $('#quick_view').html(data);
	            mfp_modal('#modal');
	        }
	    });
	}
</script>