<?php $currency_symbol = $global_config['currency_symbol'];?>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?=empty($branch_id) ? 'active' : ''?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('fees_group') . " " . translate('list'); ?></a>
			</li>
<?php if (get_permission('fees_group', 'is_add')){ ?>
			<li class="<?=!empty($branch_id) ? 'active' : ''?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('fees_group'); ?></a>
			</li>
<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?=empty($branch_id) ? 'active' : ''?>">
				<div class="mb-md">
					<div class="export_title">Fees Type List</div>
					<table class="table table-bordered table-hover table-condensed table-export">
						<thead>
							<tr>
								<th width="50"><?php echo translate('sl'); ?></th>
							<?php if (is_superadmin_loggedin()): ?>
								<th><?=translate('branch')?></th>
							<?php endif; ?>
								<th><?=translate('name')?></th>
								<th><?=translate('fees_type')?></th>
								<th><?=translate('description')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; foreach ($categorylist as $row): ?>
							<tr>
								<td><?php echo $count++; ?></td>
							<?php if (is_superadmin_loggedin()): ?>
								<td><?php echo get_type_name_by_id('branch', $row['branch_id']);?></td>
							<?php endif; ?>
								<td><?php echo $row['name']; ?></td>
								<td><?php
								$this->db->where('fee_groups_id', $row['id']);
								$result = $this->db->get('fee_groups_details')->result_array();
								foreach ($result as $key => $value) {
									$r = $this->db->where('id', $value['fee_type_id'])->get('fees_type')->row_array();
									echo $r['name'] . " - " . currencyFormat($value['amount']) . '<br>';
								}
								?></td>
								<td><?php echo $row['description']; ?></td>
								<td>
									<?php if (get_permission('fees_group', 'is_edit')): ?>
										<a href="<?php echo base_url('fees/group_edit/' . $row['id']); ?>" class="btn btn-circle btn-default icon"
										data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
										</a>
									<?php endif; if (get_permission('fees_group', 'is_delete')): ?>
										<?php echo btn_delete('fees/group_delete/' . $row['id']); ?>
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
<?php if (get_permission('fees_group', 'is_add')){ ?>
			<div class="tab-pane <?=!empty($branch_id) ? 'active' : ''?>" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'frm-submit')); ?>
					<div class="form-horizontal form-bordered mb-lg">
					<?php if (is_superadmin_loggedin() ): ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id', $branch_id), "class='form-control' id='branch_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
					<?php endif; ?>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('group_name')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="<?=set_value('name')?>" autocomplete="off" />
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('description')?></label>
							<div class="col-md-6 mb-md">
								<textarea class="form-control" id="description" name="description" placeholder="" rows="3" ></textarea>
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
								<th><?=translate('fees_type')?></th>
								<th><?=translate('due_date')?> <span class="required">*</span></th>
								<th><?=translate('amount')?> <span class="required">*</span></th>
							</thead>
							<tbody>
							<?php
								if (!is_superadmin_loggedin()) {
									$branch_id = get_loggedin_branch_id();
								}
								$this->db->where('system', 0);
								$this->db->where('branch_id', $branch_id);
								$typeResult = $this->db->get('fees_type')->result_array();
								if (count($typeResult)) {
									foreach ($typeResult as $key => $value) {
							?>
								<tr>
									<td class="checked-area" width="60">
										<div class="checkbox-replace">
											<label class="i-checks">
												<input type="checkbox" name="elem[<?=$key?>][fees_type_id]" value="<?=$value['id']?>"> <i></i>
											</label>
										</div>
									</td>
									<td class="min-w-lg"><?=$value['name']?></td>
									<td class="min-w-sm">
										<div class="form-group">
											<input type="text" class="form-control" name="elem[<?=$key?>][due_date]" value="" data-plugin-datepicker
											data-plugin-options='{"startView": 1}' autocomplete="off" />
											<span class="error"></span>
										</div>
									</td>
									<td class="min-w-lg">
										<div class="form-group">
											<input type="text" class="form-control" name="elem[<?=$key?>][amount]" value="0.00" autocomplete="off" />
											<span class="error"></span>
										</div>
									</td>
								</tr>
							<?php } 
							} else {
								echo '<tr><td colspan="4"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
							} ?>
							</tbody>
						</table>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-10">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
<?php } ?>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function () {
		$('#branch_id').on('change', function(){
			var branchID = $(this).val();
			window.location.href = base_url + 'fees/group/' + branchID;
		});
	});
</script>