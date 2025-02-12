<div class="row">
<?php if (get_permission('assign_class_teacher', 'is_add')): ?>
	<div class="col-md-5">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="far fa-edit"></i> <?=translate('class_teacher_allocation')?></h4>
			</header>
			<?php echo form_open('classes/teacher_allocation_save', array('class' => 'frm-submit'));?>
				<div class="panel-body">
					<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branch_id'
							data-width='100%' data-plugin-selectTwo data-minimum-results-for-search='Infinity'");
						?>
						<span class="error"></span>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
						<?php
							$arrayClass = $this->app_lib->getClass($branch_id);
							echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
						?>
						<span class="error"></span>
					</div>
					<div class="form-group">
						<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
						<?php
							$arraySection = $this->app_lib->getSections(set_value('class_id'));
							echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id' 
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
						?>
						<span class="error"></span>
					</div>
					<div class="form-group mb-md">
						<label class="control-label"><?=translate('class_teacher')?> <span class="required">*</span></label>
						<?php
							$arrayTeacher = $this->app_lib->getStaffList($branch_id, 3);
							echo form_dropdown("staff_id", $arrayTeacher, set_value('staff_id'), "class='form-control' id='staff_id'
							data-plugin-selectTwo data-width='100%' ");
						?>
						<span class="error"></span>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-12">
			                <button type="submit" name="save" value="1" class="btn btn-default pull-right" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
			                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save') ?>
			                </button>
						</div>	
					</div>
				</div>
			<?php echo form_close();?>
		</section>
	</div>
<?php endif; ?>
	<div class="col-md-<?php if (get_permission('assign_class_teacher', 'is_add')){ echo "7"; }else{ echo "12"; } ?>">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-list-ul"></i> <?=translate('class_teacher') . " " . translate('list')?></h4>
			</header>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed mb-none">
						<thead>
							<tr>
							    <th>#</th>
								<th><?=translate('branch')?></th>
								<th><?=translate('class_teacher')?></th>
								<th><?=translate('class')?></th>
								<th><?=translate('section')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($query->num_rows() > 0){
								$count = 1;
								$allocations = $query->result();
								foreach ($allocations as $allocation):
							?>
							<tr>
							    <td><?php echo $count++;?></td>
								<td><?php echo get_type_name_by_id('branch', $allocation->branch_id);?></td>
								<td><?php echo $allocation->teacher_name;?></td>
								<td><?php echo $allocation->class_name;?></td>
								<td><?php echo $allocation->section_name;?></td>
								<td>
								<?php if (get_permission('assign_class_teacher', 'is_edit')): ?>
									<!-- update link -->
									<a href="javascript:void(0);" class="btn btn-circle btn-default icon" onclick="getAllocationTeacher('<?=$allocation->id?>')">
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
									</a>
								<?php endif; ?>
								<?php if (get_permission('assign_class_teacher', 'is_delete')): ?>
									<!-- delete link -->
									<?=btn_delete('classes/teacher_allocation_delete/' . $allocation->id)?>
								<?php endif; ?>
								</td>
							</tr>
							<?php
								endforeach; 
							}else {
								echo '<tr><td colspan="6"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

<?php if (get_permission('assign_class_teacher', 'is_edit')): ?>
<!-- teacher allocation edit modal -->
<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<?php echo form_open('classes/teacher_allocation_save', array('class' => 'frm-submit'));?>
	<section class="panel" id='allocation'></section>
	<?php echo form_close(); ?>
</div>
<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('change', '#branch_id', function(e) {	
			var branchID = $(this).val();
			getClassByBranch(branchID);
			getStaffListRole(branchID, 3);
		});
	});

	// get leave approvel details
	function getAllocationTeacher(id) {
	    $.ajax({
	        url: base_url + 'classes/getAllocationTeacher',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "html",
	        success: function (data) {
				$('#allocation').html(data);
				mfp_modal('#modal');
	        },
			complete: function () {
				$('.selecttwo').select2({
					theme: 'bootstrap',
					width: '100%',
					minimumResultsForSearch: 'Infinity'
				});
			}
	    });
	}
</script>