<?php
$this->db->select('advance_salary.*,staff.name as staff_name,staff.staff_id as staffid');
$this->db->from('advance_salary');
$this->db->join('staff', 'staff.id = advance_salary.staff_id', 'left');
$this->db->where('advance_salary.id', $salary_id);
$row = $this->db->get()->row_array();
?>

<?php echo form_open('advance_salary');?>
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-list-ol"></i> <?=translate('review')?></h4>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table borderless mb-none">
				<tbody>
					<tr>
						<th width="120"><?=translate('reviewed_by')?> :</th>
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
						<th><?=translate('applicant')?> :</th>
						<td><?=ucfirst($row['staff_name'])?></td>
					</tr>
					<tr>
						<th><?=translate('staff_id')?> :</th>
						<td><?=ucfirst($row['staffid'])?></td>
					</tr>
					<tr>
						<th><?=translate('amount')?> :</th>
						<td><?=html_escape($global_config['currency_symbol'] . $row['amount'])?></td>
					</tr>
					<tr>
						<th><?=translate('deduct_month')?> :</th>
						<td><?=date("F Y", strtotime($row['year'].'-'. $row['deduct_month']))?></td>
					</tr>
					<tr>
						<th><?=translate('applied_on')?> : </th>
						<td><?php echo _d($row['request_date']);?></td>
					</tr>
					<tr>
						<th><?=translate('reason')?> : </th>
						<td width="350"><?=(empty($row['reason']) ? 'N/A' : $row['reason']);?></td>
					</tr>
					<tr>
                        <th><?=translate('status')?> : </th>
						<th colspan="1">
                            <div class="radio-custom radio-inline">
                                <input type="radio" id="pending" name="status" value="1" <?php echo ($row['status'] == 1 ? ' checked' : '');?>>
                                <label for="pending"><?=translate('pending')?></label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" id="paid" name="status" value="2" <?php echo ($row['status'] == 2 ? ' checked' : '');?>>
                                <label for="paid"><?=translate('approved')?></label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" id="reject" name="status" value="3" <?php echo ($row['status'] == 3 ? ' checked' : '');?>>
                                <label for="reject"><?=translate('reject')?></label>
                            </div>
                            <input type="hidden" name="id" value="<?=$salary_id?>">
						</th>
					</tr>
					<tr>
						<th><?php echo translate('comments'); ?> : </th>
						<td><textarea class="form-control" name="comments" rows="3"><?php echo html_escape($row['comments']); ?></textarea></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<footer class="panel-footer">
		<div class="row">
			<div class="col-md-12 text-right">
			<?php if ($row['status'] !== 2) { ?>
				<button class="btn btn-default mr-xs" type="submit" name="update" value="1">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('apply'); ?>
				</button>
			<?php } ?>
				<button class="btn btn-default modal-dismiss"><?=translate('close')?></button>
			</div>
		</div>
	</footer>
<?php echo form_close();?>
