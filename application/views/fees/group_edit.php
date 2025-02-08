<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('fees/group')?>"><i class="fas fa-list-ul"></i> <?php echo translate('fees_group') . " " . translate('list'); ?></a>
			</li>
			<li class="active">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('fees_group'); ?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'frm-submit')); ?>
				<input type="hidden" name="group_id" value="<?=$group['id']?>">
					<div class="form-horizontal form-bordered mb-lg">
						<div class="form-group">
							<label class="col-md-3 control-label"><?php echo translate('group_name'); ?> <span class="required">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="<?=$group['name']?>" autocomplete="off" />
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?php echo translate('description'); ?></label>
							<div class="col-md-6 mb-md">
								<textarea class="form-control" id="description" name="description" placeholder="" rows="3" ><?=$group['description']?></textarea>
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="tableID">
							<thead>
								<th>
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="select_chkbox" id="selectAllchkbox"><i></i>
										</label>
									</div>
								</th>
								<th><?php echo translate('fees_type'); ?> <span class="required">*</span></th>
								<th><?php echo translate('due_date'); ?> <span class="required">*</span></th>
								<th><?php echo translate('amount'); ?> <span class="required">*</span></th>
							</thead>
							<tbody>
								<?php
								$this->db->where('system', 0);
								$this->db->where('branch_id', $group['branch_id']);
								$result = $this->db->get('fees_type')->result_array();
								foreach ($result as $key => $row) {
									$this->db->where('fee_groups_id', $group['id']);
									$this->db->where('fee_type_id', $row['id']);
									$details = $this->db->get('fee_groups_details')->row_array();
									if (empty($details)) {
										$details['fee_type_id'] = '';
										$details['due_date'] = '';
										$details['amount'] = '0.00';
									}
								?>
								<tr>
									<td class="checked-area" width="60">
										<div class="checkbox-replace">
											<label class="i-checks">
												<input type="checkbox" name="elem[<?=$key?>][fees_type_id]" <?=($row['id'] == $details['fee_type_id'] ? 'checked' : '')?> value="<?=$row['id']?>"> <i></i>
											</label>
										</div>
									</td>
									<td class="min-w-lg">
										<div class="form-group"><?php echo $row['name']; ?></div>
									</td>
									<td class="min-w-sm">
										<div class="form-group">
											<input type="text" class="form-control" name="elem[<?php echo $key; ?>][due_date]" value="<?=$details['due_date']?>" data-plugin-datepicker
											data-plugin-options='{"startView": 1}' autocomplete="off" />
											<span class="error"></span>
										</div>
									</td>
									<td class="min-w-lg">
										<div class="form-group">
											<input type="text" name="elem[<?php echo $key; ?>][amount]" class="form-control" autocomplete="off" value="<?=$details['amount']?>" />
											<span class="error"></span>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-10">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('update'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>