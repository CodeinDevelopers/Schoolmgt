<?php $widget = (is_superadmin_loggedin() ? '' : 'col-md-offset-3 '); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">Select Date</h4>
			</header>
			<?php echo form_open($this->uri->uri_string(), array('class' => 'validate'));?>
			<div class="panel-body">
				<div class="row mb-sm">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-plugin-selectTwo required
								data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
						</div>
					</div>
				<?php endif; ?>
					<div class="<?php echo $widget ?>col-md-6 mb-sm">
						<div class="form-group">
							<label class="control-label"><?php echo translate('date'); ?> <span class="required">*</span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
								<input type="text" class="form-control daterange" name="daterange" value="<?php echo set_value('daterange', date("Y/m/d") . ' - ' . date("Y/m/d")); ?>" required />
							</div>
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

		<?php if (isset($students)):?>
		<section class="panel appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
			<header class="panel-heading">
				<div class="panel-btn">
					<button class="btn btn-default btn-circle" id="sendWishes" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
						<i class="fas fa-comment-dots"></i> <?=translate('send_wishes')?>
					</button>
				</div>
				<h4 class="panel-title"><i class="fas fa-user-graduate"></i> <?php echo translate('student') . " " . translate('list');?></h4>
			</header>
			<div class="panel-body mb-md">
				<input type="hidden" name="branch_id" id="branchID" value="<?php echo $branch_id ?>">
				<table class="table table-bordered table-condensed table-hover table-export">
					<thead>
						<tr>
							<th width="10" class="no-sort">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" id="selectAllchkbox"><i></i></label>
								</div>
							</th>
							<th class="no-sort"><?=translate('photo')?></th>
							<th><?=translate('name')?></th>
							<th><?=translate('birthday')?></th>
							<th><?=translate('age')?></th>
							<th><?=translate('mobile_no')?></th>
							<th><?=translate('class')?></th>
							<th><?=translate('section')?></th>
							<th><?=translate('register_no')?></th>
							<th width="80"><?=translate('roll')?></th>
							<th><?=translate('guardian_name')?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($students as $row): ?>
						<tr>
							<td class="checked-area">
								<div class="checkbox-replace">
									<label class="i-checks">
										<input type="checkbox" class="cb_bulk_sms" id="<?=$row['student_id']?>"><i></i>
									</label>
								</div>
							</td>
							<td class="center"><img src="<?php echo get_image_url('student', $row['photo']); ?>" height="50"></td>
							<td><?php echo $row['fullname'];?></td>
							<td><?php echo _d($row['birthday']);?></td>
							<td>
							<?php
								if(!empty($row['birthday'])){
									$birthday = new DateTime($row['birthday']);
									$today = new DateTime('today');
									$age = $birthday->diff($today)->y;
									echo html_escape($age);
								} else {
									echo "N/A";
								}
							?>
							</td>
							<td><?php echo $row['mobileno'];?></td>
							<td><?php echo $row['class_name'];?></td>
							<td><?php echo $row['section_name'];?></td>
							<td><?php echo $row['register_no'];?></td>
							<td><?php echo $row['roll'];?></td>
							<td><?php echo (!empty($row['parent_id']) ? get_type_name_by_id('parent', $row['parent_id']) : 'N/A');?></td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</section>
		<?php endif;?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#sendWishes').on('click', function() {
			var btn = $(this);
			var branchID = $("#branchID").val();
			var arrayID = [];
			$("input[type='checkbox'].cb_bulk_sms").each(function (index) {
				if(this.checked) {
					arrayID.push($(this).attr('id'));
				}
			});
			if (arrayID.length != 0) {
				swal({
					title: "<?php echo translate('are_you_sure')?>",
					text: "Do you want to send birthday wishes?",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn btn-default swal2-btn-default",
					cancelButtonClass: "btn btn-default swal2-btn-default",
					confirmButtonText: "<?php echo translate('yes_continue')?>",
					cancelButtonText: "<?php echo translate('cancel')?>",
					buttonsStyling: false,
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: base_url + "birthday/studentWishes",
							type: "POST",
							dataType: "JSON",
			                beforeSend: function () {
			                    btn.button('loading');
			                },
							data: { 
								array_id : arrayID,
								branch_id : branchID
							},
							success:function(data) {
								btn.button('reset');
								swal({
									title: "<?php echo translate('successfully')?>",
									text: data.message,
									buttonsStyling: false,
									showCloseButton: true,
									focusConfirm: false,
									confirmButtonClass: "btn btn-default swal2-btn-default",
									type: data.status
								}).then((result) => {
									if (result.value) {
										location.reload();
									}
								});
							},
			                error: function () {
			                    //btn.button('reset');
			                }
						});
					}
				});
			}
		});
	});
</script>
