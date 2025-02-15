<?php $widget = (is_superadmin_loggedin() ? 4 : 6); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open($this->uri->uri_string()); ?>
			<header class="panel-heading">
				<h4 class="panel-title">Select Designation</h4>
			</header>
			<div class="panel-body">
				<div class="row mb-sm">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-4 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branchID'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
						</div>
						<span class="error"><?=form_error('branch_id')?></span>
					</div>
				<?php endif; ?>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('role')?> <span class="required">*</span></label>
							<?php
								$role_list = $this->app_lib->getRoles();
								echo form_dropdown("staff_role", $role_list, set_value('staff_role'), "class='form-control'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"><?=form_error('staff_role')?></span>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group <?php if (form_error('date')) echo 'has-error'; ?>">
							<label class="control-label">
								<?=translate('date')?> <span class="required">*</span>
							</label>
							<div class="input-group">
							    <input type="text" class="form-control" required  name="date" id='attDate' value="<?=set_value('date', date("Y-m-d"))?>" />
							    <span class="input-group-addon"><i class="fas fa-calendar"></i></span>
							</div>
							<span class="error"><?=form_error('date')?></span>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="search" value="1" class="btn btn btn-default btn-block">
							<svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?>
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
		
		<?php if(isset($attendencelist)): ?>
			<section class="panel appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
				<?php
				echo form_open($this->uri->uri_string());
				$data = array('branch_id'=> $branch_id, 'date'=> $date);
				echo form_hidden($data);
				?>
				<header class="panel-heading">
					<h4 class="panel-title"><i class="fas fa-users"></i> <?=translate('employees_list')?></h4>
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-offset-9 col-md-3">
							<div class="form-group mb-sm">
								<label class="control-label"><?=translate('select_for_everyone')?> <span class="required">*</span></label>
								<?php
									$array = array(
										"" => translate('not_selected'),
										"P" => translate('present'),
										"A" => translate('absent'),
										"L" => translate('late'),
										"HD" 	=> translate('half_day'),
									);
									echo form_dropdown("mark_all_everyone", $array, set_value('mark_all_everyone'), "class='form-control' 
									onchange='selAtten_all(this.value)' data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive mb-sm mt-xs">
								<table class="table table-bordered table-hover table-condensed mb-none">
									<thead>
										<tr>
											<th width="40">#</th>
											<th width="80"><?=translate('photo')?></th>
											<th><?=translate('name')?></th>
											<th><?=translate('staff_id')?></th>
											<th width="400"><?=translate('status')?></th>
											<th><?=translate('remarks')?></th>
										</tr>
									</thead>
									<tbody>
									<?php
									$count = 1;
									if(count($attendencelist)) {
										foreach ($attendencelist as $key => $row):
									?>
										<tr>
											<input type="hidden" name="attendance[<?=$key?>][attendance_id]" value="<?=$row['atten_id']?>">
											<input type="hidden" name="attendance[<?=$key?>][staff_id]" value="<?=$row['id']?>">
											<td><?php echo $count++; ?></td>
											<td class="center"><img class="rounded" src="<?php echo get_image_url('staff', $row['photo']); ?>" width="40" height="40" /></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['staff_id']; ?></td>
											<td>
												<div class="radio-custom radio-success radio-inline mt-xs">
													<input type="radio" value="P" <?=($row['att_status'] == 'P' ? 'checked' : '')?> name="attendance[<?=$key?>][status]" id="pstatus_<?=$key?>">
													<label for="pstatus_<?=$key?>"><?=translate('present')?></label>
												</div>
												<div class="radio-custom radio-danger radio-inline mt-xs">
													<input type="radio" value="A" <?=($row['att_status'] == 'A' ? 'checked' : '')?> name="attendance[<?=$key?>][status]" id="astatus_<?=$key?>">
													<label for="astatus_<?=$key?>"><?=translate('absent')?></label>
												</div>
												<div class="radio-custom radio-inline mt-xs">
													<input type="radio" value="L" <?=($row['att_status'] == 'L' ? 'checked' : '')?> name="attendance[<?=$key?>][status]" id="lstatus_<?=$key?>">
													<label for="lstatus_<?=$key?>"><?=translate('late')?></label>
												</div>
												<div class="radio-custom radio-inline mt-xs">
													<input type="radio" value="HD" <?=($row['att_status'] == 'HD' ? 'checked' : '')?> name="attendance[<?=$key?>][status]" id="hdstatus_<?=$key?>">
													<label for="hdstatus_<?=$key?>"><?=translate('half_day')?></label>
												</div>
											</td>
											<td><input class="form-control" name="attendance[<?=$key?>][remark]" type="text" placeholder="<?=translate('remarks')?>" value="<?=$row['att_remark']?>" ></td>
										</tr>
									<?php
										endforeach;
									} else {
										echo '<tr><td colspan="8"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
									}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-offset-10 col-md-2">
							<button type="submit" class="btn btn-default btn-block" name="save" value="1">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
							</button>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			</section>
		<?php endif; ?>
	</div>
</div>

<script type="text/javascript">
	var dayOfWeekDisabled = "<?php echo $getWeekends ?>";
	$(document).ready(function () {
		$("#attDate").datepicker({
		    orientation: 'bottom',
		    autoclose: true,
		    format: 'yyyy-mm-dd',
		    daysOfWeekDisabled: dayOfWeekDisabled,
		});   
    });
    
	$('select#branchID').change(function() {
		var branchID = $(this).val();
		$.ajax({
			url: base_url + "attendance/getWeekendsHolidays",
			type: 'POST',
			dataType: "json",
			data: {
				branch_id: branchID,
			},
			success: function (data) {
				$('#attDate').val("");
				$('#attDate').datepicker('setDaysOfWeekDisabled', data.getWeekends);
				$('#attDate').datepicker('setDatesDisabled', JSON.parse(data.getHolidays));
			}
		});
	});
</script>