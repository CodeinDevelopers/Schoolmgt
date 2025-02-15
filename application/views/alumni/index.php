<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">Select Session & Class</h4>
			</header>
			<?php echo form_open($this->uri->uri_string(), array('class' => 'validate'));?>
			<div class="panel-body">
				<div class="row mb-sm">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' onchange='getClassByBranch(this.value)'
								data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
				<?php endif; ?>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('passing_session')?> <span class="required">*</span></label>
							<?php
								$arraySession = array("" => translate('select'));
								$years = $this->db->get('schoolyear')->result();
								foreach ($years as $year){
									$arraySession[$year->id] = $year->school_year;
								}
								echo form_dropdown("passing_session", $arraySession, set_value('passing_session', get_session_id()), "class='form-control' required data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								required data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id'));
								echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id'
								data-plugin-selectTwo data-width='100%'");
							?>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="submit" value="search" class="btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
					</div>
				</div>
			</footer>
		<?php echo form_close();?>
		</section>

		<?php if (isset($students)):?>
			<section class="panel appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
				<header class="panel-heading">
					<h4 class="panel-title"><i class="fa-solid fa-person-chalkboard"></i> <?=translate('alumni') . " " . translate('list')?></h4>
				</header>
				<div class="panel-body">
					<div class="mb-md">
						<table class="table table-condensed table-hover table-bordered table_default">
							<thead>
								<tr>
									<th width="50">#</th>
									<th><?=translate('photo')?></th>
									<th><?=translate('student_name')?></th>
									<th><?=translate('register_no')?></th>
									<th><?=translate('class')?></th>
									<th><?=translate('gender')?></th>
									<th><?=translate('recent') . " " . translate('information')?></th>
									
									<th><?=translate('action')?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$count = 1;
								if (count($students)) {
									foreach($students as $key => $row):
								?>
								<tr>

									<td><?php echo $count++;?></td>
									<td class="center"><img src="<?php echo get_image_url('alumni', $row['photo']); ?>" height="50"></td>
									<td><?php
									echo "<strong>" . $row['fullname'] . "</strong><br>";
									echo "<span class='text-dark'>" . translate('passing_session') . "</span> : " . $arraySession[9];
									?>
									</td>
									<td><?php echo $row['register_no'];?></td>
									<td><?php echo $row['class_name'] . " (" .  $row['section_name']  . ")";?></td>
									<td><?php echo translate($row['gender']);?></td>
									<td>
										<strong><?php echo translate('mobile_no') ?> :</strong> <?php echo empty($row['mobile_no']) ? 'N/A' : $row['mobile_no'] ?></br>
										<strong><?php echo translate('email') ?> :</strong> <?php echo empty($row['email']) ? 'N/A' : $row['email'] ?></br>
										<strong><?php echo translate('profession')?> :</strong> <?php echo empty($row['profession']) ? 'N/A' : $row['profession'] ?></br>
										<strong><?php echo translate('address') ?> :</strong> <?php echo empty($row['address']) ? 'N/A' : $row['address'] ?>
									</td>
								
									<td class="action">
										<?php if (empty($row['alumni_id'])) {
											if (get_permission('manage_alumni', 'is_add')) { ?>
											<button class="btn btn-circle icon btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" onclick="addAlumni('<?=$row['id']?>', this)"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button>
										<?php } } else { ?>
											<a class="btn btn-circle icon btn-default" href="tel:<?php echo $row['mobile_no'] ?>"><i class="fa-solid fa-phone"></i></a>
											<?php
											if (get_permission('manage_alumni', 'is_edit')) {
												?>
											<button class="btn btn-circle icon btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" onclick="addAlumni('<?=$row['id']?>', this)"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button>
										<?php } } ?>
										<?php if (get_permission('manage_alumni', 'is_delete')): 
											if (!empty($row['alumni_id'])) { 
											?>
											<!-- delete link -->
											<?php echo btn_delete('alumni/delete/' . $row['alumni_id']);?>
										<?php } endif; ?>
									</td>
								</tr>
								<?php
									endforeach;
								} else {
									echo '<tr><td colspan="10"><h5 class="text-danger text-center">'.translate('no_information_available').'</td></tr>';
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		<?php endif; ?>
	</div>
</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="alumniModal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="fa-solid fa-person-chalkboard"></i> <?=translate('alumni')?>
			</h4>
		</header>
		<?php echo form_open_multipart('alumni/save', array('class' => 'frm-submit-data'));?>
		<div class="panel-body">
			<div class="quick_image">
				<img alt="" class="user-img-circle" id="alumniPhoto" src="<?=base_url('uploads/app_image/defualt.png')?>" width="120" height="120">
			</div>
			<input type="hidden" name="id" value="" id="alumniID">
			<input type="hidden" name="enroll_id" value="" id="alumniEnroll_id">
			<input type="hidden" name="old_image" value="" id="alumniOld_image">
			<div class="form-group mb-sm mt-md">
				<label class="control-label"><?php echo translate('mobile_no'); ?> <span class="required">*</span></label>
				<input type="text" class="form-control" value="" name="mobile_no" id="alumniMobile" autocomplete="off" />
				<span class="error"></span>
			</div>
			<div class="form-group mb-sm">
				<label class="control-label"><?php echo translate('email'); ?></label>
				<input type="text" class="form-control" value="" name="email" id="alumniEmail" autocomplete="off" />
				<span class="error"></span>
			</div>
			<div class="form-group mb-sm">
				<label class="control-label"><?php echo translate('profession'); ?></label>
				<input type="text" class="form-control" value="" name="profession" id="alumniProfession" />
				<span class="error"></span>
			</div>
			<div class="form-group mb-sm">
				<label class="control-label"><?php echo translate('address'); ?></label>
				<textarea name="address" rows="2" class="form-control" id="alumniAddress" aria-required="true"></textarea>
				<span class="error"></span>
			</div>
			<div class="form-group mb-md">
				<label class="control-label"><?=translate('photo')?></label>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="input-append">
						<div class="uneditable-input">
							<i class="fas fa-file fileupload-exists"></i>
							<span class="fileupload-preview"></span>
						</div>
						<span class="btn btn-default btn-file">
							<span class="fileupload-exists">Change</span>
							<span class="fileupload-new">Select file</span>
							<input type="file" name="user_photo" />
						</span>
						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
					</div>
				</div>
				<span class="error"></span>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="submit" class="btn btn-default mr-xs" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
					</button>
					<button class="btn btn-default modal-dismiss"><?php echo translate('cancel'); ?></button>
				</div>
			</div>
		</footer>
		<?php echo form_close(); ?>
	</section>
</div>

<script type="text/javascript">
	function addAlumni(id, elem) {
	    var btn = $(elem);
	    $('.error').html("");
	    $.ajax({
	        url: base_url + 'alumni/alumniDetails',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "json",
	        beforeSend: function () {
	            btn.button('loading');
	        },
	        success: function (data) {
	        	$('#alumniEnroll_id').val(id);
	        	$('#alumniID').val(data.id);
	        	$("#alumniPhoto").attr("src", data.image_url);
	        	$("#alumniOld_image").val(data.photo);
	        	$('#alumniMobile').val(data.mobile_no);
	        	$('#alumniEmail').val(data.email);
	        	$('#alumniProfession').val(data.profession);
	        	$('#alumniAddress').val(data.address);
	            mfp_modal('#alumniModal');
	        },
	        error: function (xhr) {
	            btn.button('reset');
	        },
	        complete: function () {
	            btn.button('reset');
	        }
	    });
	}
</script>