<?php $row = $this->leave_model->getLeaveList(array('la.id' => $leave_id), true); ?>
<?php echo form_open('leave'); ?>
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-bars"></i> <?php echo translate('details'); ?></h4>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table borderless mb-none">
				<tbody>
					<tr>
						<th width="120"><?=translate('reviewed_by')?> :</th>
						<td>
							<?php
	                            if(!empty($row['approved_by'])){
	                                echo get_type_name_by_id('staff', $row['approved_by']);
	                            }else{
	                                echo translate('unreviewed');
	                            }
							?>
						</td>
					</tr>
					<tr>
						<th><?php echo translate('applicant'); ?> : </th>
						<td><?php
								if ($row['role_id'] == 7) {
								 	$getStudent = $this->application_model->getStudentDetails($row['user_id']);
								 	echo $getStudent['first_name'] . " " . $getStudent['last_name'];
								} else {
									$getStaff = $this->db->select('name,staff_id')->where('id', $row['user_id'])->get('staff')->row_array();
									echo $getStaff['name'];
								}?></td>
					</tr>
<?php if ($row['role_id'] == 7) { ?>
					<tr>
						<th><?php echo translate('class'); ?> : </th>
						<td><?php echo $getStudent['class_name'] . ' (' . $getStudent['section_name'] . ')'; ?></td>
					</tr>
<?php } else { ?>
					<tr>
						<th><?php echo translate('staff_id'); ?> : </th>
						<td><?php echo $getStaff['staff_id']; ?></td>
					</tr>
<?php } ?>
					<tr>
						<th><?php echo translate('leave_category'); ?> : </th>
						<td><?php echo $row['category_name']; ?></td>
					</tr>
					<tr>
						<th><?php echo translate('apply') . " " . translate('date'); ?> : </th>
						<td><?php echo _d($row['apply_date']) . " " . date('h:i A' ,strtotime($row['apply_date'])); ?></td>
					</tr>
					<tr>
						<th><?php echo translate('start_date'); ?> : </th>
						<td><?php echo _d($row['start_date']); ?></td>
					</tr>
					<tr>
						<th><?php echo translate('end_date'); ?> : </th>
						<td><?php echo _d($row['end_date']); ?></td>
					</tr>
					<tr>
						<th><?php echo translate('reason'); ?> : </th>
						<td><?php echo (empty($row['reason']) ? 'N/A' : $row['reason']); ?></td>
					</tr>
<?php if (!empty($row['enc_file_name'])) { ?>
					<tr>
						<th><?php echo translate('attachment'); ?> : </th>
						<td><a class="btn btn-default btn-sm" target="_blank" href="<?=base_url('leave/download/' . $row['id'] . '/' . $row['enc_file_name'])?>"><i class="far fa-arrow-alt-circle-down"></i> <?php echo translate('download'); ?></a></td>
					</tr>
<?php } ?>
					<tr>
		                <th><?php echo translate('status'); ?> : </th>
						<th>
		                    <div class="radio-custom radio-inline">
		                        <input type="radio" id="pending" name="status" value="1" <?php echo ($row['status'] == 1 ? ' checked' : ''); ?>>
		                        <label for="pending"><?php echo translate('pending'); ?></label>
		                    </div>
		                    <div class="radio-custom radio-inline">
		                        <input type="radio" id="paid" name="status" value="2" <?php echo ($row['status'] == 2 ? ' checked' : ''); ?>>
		                        <label for="paid"><?php echo translate('approved'); ?></label>
		                    </div>
		                    <div class="radio-custom radio-inline">
		                        <input type="radio" id="reject" name="status" value="3" <?php echo ($row['status'] == 3 ? ' checked' : ''); ?>>
		                        <label for="reject"><?php echo translate('reject'); ?></label>
		                    </div>
		                    <input type="hidden" name="id" value="<?=$leave_id?>">
						</th>
					</tr>
					<tr>
						<th><?php echo translate('comments'); ?> : </th>
						<td><textarea class="form-control" name="comments" rows="3"><?php echo $row['comments']; ?></textarea></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<footer class="panel-footer">
		<div class="row">
			<div class="col-md-12 text-right">
				<button class="btn btn-default mr-xs" type="submit" name="update" value="1">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('apply'); ?>
				</button>
				<button class="btn btn-default modal-dismiss"><?php echo translate('close'); ?></button>
			</div>
		</div>
	</footer>
<?php echo form_close(); ?>