<?php $row = $this->library_model->getBookIssueList($book_id) ?>
<header class="panel-heading">
	<h4 class="panel-title"><i class="fas fa-bars"></i> <?php echo translate('book_details');?></h4>
</header>
<?php echo form_open("library/book_manage"); ?>
<input type="hidden" name="id" value="<?=$row['id']?>">
<div class="panel-body">
	<div class="pt-sm pb-sm">
		<div class="table-responsive">
			<table class="table borderless table-condensed mb-none">
				<tbody>
					<tr>
						<th width="120"><?=translate('issued_by')?> :</th>
						<td>
							<?php
	                            if(!empty($row['issued_by'])){
	                                echo html_escape(get_type_name_by_id('staff', $row['issued_by']));
	                            }else{
	                                echo translate('unreviewed');
	                            }
							?>
						</td>
					</tr>
					<tr>
						<th width="120"><?=translate('return_by')?> :</th>
						<td>
							<?php
	                            if(!empty($row['return_by'])){
	                                echo html_escape(get_type_name_by_id('staff', $row['return_by']));
	                            }else{
	                                echo "--------";
	                            }
							?>
						</td>
					</tr>
					<tr>
						<th width="120"><?php echo translate('user_name'); ?> : </th>
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
						<th><?php echo translate('book_title'); ?></th>
						<td><?php echo $row['title']; ?></td>
					</tr>
					<tr>
						<th><?php echo translate('category');?></th>
						<td><?php echo $row['category_name'];?></td>
					</tr>
					<tr>
						<th><?php echo translate('book_isbn_no');?></th>
						<td><?php echo $row['isbn_no'];?></td>
					</tr>
					<tr>
						<th><?php echo translate('author'); ?></th>
						<td><?php echo $row['author']; ?></td>
					</tr>
					<tr>
						<th><?=translate('date_of_issue')?></th>
						<td><?=_d($row['date_of_issue'])?></td>
					</tr>
					<tr>
						<th><?=translate('date_of_expiry')?></th>
						<td><?=_d($row['date_of_expiry'])?></td>
					</tr>
					<tr>
						<th><?=translate('return_date')?></th>
						<td>
							<?php
							if($row['return_date'] == ""){
								echo ' -- / -- / ----'; 
							} else {
								echo _d($row['return_date']);
							}
							?>
						</td>
					</tr>
<?php 
$status = $row['status'];
if ($status == 0 || $status == 1 || $status == 2) :
?>
					<tr>
						<th><?php echo translate('status'); ?> : </th>
						<td>
							<div class="radio-custom radio-inline">
								<input type="radio" id="pending" name="status" value="0" <?php echo ($row['status'] == 0 ? ' checked' : ''); ?>>
								<label for="pending"><?php echo translate('pending'); ?></label>
							</div>
							<div class="radio-custom radio-inline">
								<input type="radio" id="issued" name="status" value="1" <?php echo ($row['status'] == 1 ? ' checked' : ''); ?>>
								<label for="issued"><?php echo translate('issued'); ?></label>
							</div>
							<div class="radio-custom radio-inline">
								<input type="radio" id="reject" name="status" value="2" <?php echo ($row['status'] == 2 ? ' checked' : ''); ?>>
								<label for="reject"><?php echo translate('reject'); ?></label>
							</div>
						
						</td>
					</tr>
<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<footer class="panel-footer">
	<div class="row">
		<div class="col-md-12 text-right">
		<?php if ($status != 3): ?>
			<button class="btn btn-default" type="submit" name="update" value="1">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('apply')?>
			</button>
		<?php endif; ?>
			<button class="btn btn-default modal-dismiss"><?=translate('close')?></button>
		</div>
	</div>
</footer>
<?php echo form_close();?>
