
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fas fa-list-ul"></i> <?=translate('certificate') ." ". translate('list')?>
                </a>
			</li>
<?php if (get_permission('certificate_templete', 'is_add')): ?>
			<li>
                <a href="#add" data-toggle="tab">
                   <i class="far fa-edit"></i> <?=translate('add') . " ". translate('certificate')?>
                </a>
			</li>
<?php endif; ?>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active mb-md" id="list">
				<table class="table table-bordered table-hover mb-none table-condensed table-export">
					<thead>
						<tr>
							<th><?=translate('sl')?></th>
<?php if (is_superadmin_loggedin()): ?>
							<th><?=translate('branch')?></th>
<?php endif; ?>
							<th><?=translate('certificate') . " " . translate('name')?></th>
							<th><?=translate('applicable_user')?></th>
							<th><?=translate('page_layout')?></th>
							<th class="no-sort"><?=translate('background') . " " . translate('image')?></th>
							<th><?=translate('created_at')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						foreach ($certificatelist as $row):
						?>
						<tr>
							<td><?php echo $count++; ?></td>
<?php if (is_superadmin_loggedin()): ?>
							<td><?php echo $row['branchname'];?></td>
<?php endif; ?>
							<td><?php echo $row['name']; ?></td>
							<td><?php
							if ($row['user_type'] == 1) {
								echo translate('student');
							} else {
								echo translate('employee');
							} 
							?></td>
							<td><?php
							if ($row['page_layout'] == 1) {
								echo "A4 (Portrait)";
							} else {
								echo "A4 (Landscape)";
							} 
							?></td>
							<td>
								<?php
							        $imgPath = 'uploads/certificate/' . $row['background'];
							        if (file_exists($imgPath) && !empty($row['background'])) {
							            $imgPath = base_url($imgPath);
							        } else {
							            $imgPath = base_url('uploads/language_flags/defualt.png');
							        }

								 ?>
								<img class="" src="<?=$imgPath?>" height="50">
							</td>
							<td><?php echo _d($row['created_at']);?></td>
							<td class="min-w-c">
								<!-- view link -->
								<a href="javascript:void(0);" class="btn btn-circle btn-default icon" data-toggle="tooltip" data-original-title="<?=translate('view')?>" 
								onclick="getCertificate('<?=$row['id'] ?>');">
									<i class="fas fa-bars"></i>
								</a>
							<?php if (get_permission('certificate_templete', 'is_edit')) { ?>
								<a href="<?=base_url('certificate/edit/' . $row['id']);?>" class="btn btn-circle btn-default icon">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
								</a>
							<?php } if (get_permission('certificate_templete', 'is_delete')) { ?>
								<!-- deletion link -->
								<?php echo btn_delete('certificate/delete/'.$row['id']);?>
							<?php } ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
<?php if (get_permission('certificate_templete', 'is_add')): ?>
			<div class="tab-pane" id="add">
					<?php echo form_open($this->uri->uri_string(), array('class' => 'form-bordered form-horizontal frm-submit-data'));?>
					<?php if (is_superadmin_loggedin()): ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-8">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-width='100%' onchange='getClassByBranch(this.value)'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('Certificate') . " " . translate('name')?> <span class="required">*</span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="certificate_name" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?=translate('applicable_user')?> <span class="required">*</span></label>
						<div class="col-md-8">
							<?php
								$arrayType = array(
									'' => translate('select'),
									'1' => translate('student'),
									'2' => translate('employee')
								);
								echo form_dropdown("user_type", $arrayType, set_value('user_type'), "class='form-control' data-width='100%' id='userType'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Page Layout <span class="required">*</span></label>
						<div class="col-md-8">
							<?php
								$arrayType = array(
									'' => translate('select'),
									'1' => "A4 (Portrait)",
									'2' => "A4 (Landscape)"
								);
								echo form_dropdown("page_layout", $arrayType, set_value('page_layout'), "class='form-control' data-width='100%'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group studenttags" style="display: none;">
						<label class="control-label col-md-3">QR Code Text <span class="required">*</span></label>
						<div class="col-md-8">
							<?php
								$arrayType = array(
									'' => translate('select'),
									'name' => translate('name'),
									'birthday' => translate('birthday'),
									'register_no' => translate('register_no'),
									'roll' => translate('roll'),
						
								);
								echo form_dropdown("stu_qr_code", $arrayType, set_value('qr_code'), "class='form-control' data-width='100%'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group stafftag" style="display: none;">
						<label class="control-label col-md-3">QR Code Text <span class="required">*</span></label>
						<div class="col-md-8">
							<?php
								$arrayType = array(
									'' => translate('select'),
									'staff_id' => translate('staff_id'),
									'birthday' => translate('birthday'),
									'joining_date' => translate('joining_date'),
								);
								echo form_dropdown("emp_qr_code", $arrayType, set_value('qr_code'), "class='form-control' data-width='100%'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Photo Style <span class="required">*</span></label>
						<div class="col-md-8">
							<div class="row">
								<div class="col-xs-6">
									<?php
										$arrayType = array(
											'1' => "Square",
											'2' => "Round"
										);
										echo form_dropdown("photo_style", $arrayType, set_value('photo_style'), "class='form-control' data-width='100%'
										data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
									?>
								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" name="photo_size" value="" placeholder="Photo Size (px)" />
								</div>
							</div>
							<span class="error"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Layout Spacing <span class="required">*</span></label>
						<div class="col-md-8">
							<div class="row">
								<div class="col-xs-6">
									<input type="text" class="form-control" name="top_space" value="" placeholder="Top Space (px)" />
								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" name="bottom_space" value="" placeholder="Bottom Space (px)" />
								</div>
							</div>
						</div>
						<div class="mt-md col-md-offset-3 col-md-8">
							<div class="row">
								<div class="col-xs-6">
									<input type="text" class="form-control" name="right_space" value="" placeholder="Right Space (px)" />
								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" name="left_space" value="" placeholder="Left Space (px)" />
								</div>
							</div>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('signature') . " " . translate('image')?></label>
						<div class="col-md-8">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fas fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="signature_file" />
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('logo') . " " . translate('image')?></label>
						<div class="col-md-8">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fas fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="logo_file" />
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('background') . " " . translate('image')?></label>
						<div class="col-md-8">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fas fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="background_file" />
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Certificate Content <span class="required">*</span></label>
						<div class="col-md-8">
							<textarea name="content" class="form-control" id="certificateConten" rows="10"></textarea>
							<span class="error"></span>
							<div class="studenttags" style="display: none;">
							<?php 
							$tagsList = $this->certificate_model->tagsList(1); 
							foreach ($tagsList as $key => $value) {
								?>
								<a data-value=" <?=$value?> " class="btn btn-default mt-sm btn-xs btn_tag"><?=$value?></a>
							<?php } ?>
							</div>
							<div class="stafftag" style="display: none;">
							<?php 
							$tagsList = $this->certificate_model->tagsList(2); 
							foreach ($tagsList as $key => $value) {
								?>
								<a data-value=" <?=$value?> " class="btn btn-default mt-sm btn-xs btn_tag"><?=$value?></a>
							<?php } ?>
							</div>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-offset-3 col-md-2">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
								</button>
							</div>
						</div>
					</footer>
				<?php echo form_close(); ?>
			</div>
<?php endif; ?>
		</div>
	</div>
</section>

<div class="zoom-anim-dialog modal-block modal-block-lg mfp-hide payroll-t-modal" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title"><i class="fas fa-bars"></i> <?php echo translate('certificate') . " " . translate('view'); ?></h4>
		</header>
		<div class="panel-body">
			<div id="quick_view"></div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default modal-dismiss"><?php echo translate('close'); ?></button>
				</div>
			</div>
		</footer>
	</section>
</div>