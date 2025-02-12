<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?=translate('exam_list')?></a>
			</li>
<?php if (get_permission('exam', 'is_add')): ?>
			<li>
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('create_exam')?></a>
			</li>
<?php endif; ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane active">
				<table class="table table-bordered table-hover mb-none table-export">
					<thead>
						<tr>
							<th width="50"><?=translate('sl')?></th>
						<?php if (is_superadmin_loggedin()): ?>
							<th><?=translate('branch')?></th>
						<?php endif; ?>
							<th><?=translate('exam_name')?></th>
							<th><?=translate('exam_type')?></th>
							<th><?=translate('term')?></th>
							<th><?=translate('mark_distribution')?></th>
							<th><?=translate('publish')?></th>
							<th><?=translate('publish_result')?></th>
							<th><?=translate('remarks')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1; foreach($examlist as $row): ?>
						<tr>
							<td><?php echo $count++; ?></td>
						<?php if (is_superadmin_loggedin()): ?>
							<td><?php echo $row['branch_name']; ?></td>
						<?php endif; ?>
							<td><?php echo $row['name']; ?></td>
							<td><?php 
							if ($row['type_id'] == 1) {
								echo translate('marks');
							} elseif ($row['type_id'] == 2) {
								echo translate('grade');
							} elseif ($row['type_id'] == 3) {
								echo translate('marks_and_grade');
							}
							 ?></td>
							<td><?php echo (empty($row['term_id']) ? 'N/A' : get_type_name_by_id('exam_term', $row['term_id'])); ?></td>
							<td><?php
								$distribution = json_decode($row['mark_distribution'], true);
								if (!empty($distribution)) {
									foreach ($distribution as $id) {
										echo '- ' . get_type_name_by_id('exam_mark_distribution', $id) . '<br>';
									}
								}
							 ?></td>
							<td>
								<div class="material-switch ml-xs">
									<input class="exam-status-switch" id="switchStatus_<?=$row['id']?>" data-id="<?=$row['id']?>" name="evt_switch<?=$row['id']?>" 
									type="checkbox" <?php echo ($row['status'] == 1 ? 'checked' : ''); ?> />
									<label for="switchStatus_<?=$row['id']?>" class="label-primary"></label>
								</div>
							</td>
							<td>
								<div class="material-switch ml-xs">
									<input class="exam-result-switch" id="switchResult_<?=$row['id']?>" data-id="<?=$row['id']?>" name="evt_switch<?=$row['id']?>" 
									type="checkbox" <?php echo ($row['publish_result'] == 1 ? 'checked' : ''); ?> />
									<label for="switchResult_<?=$row['id']?>" class="label-primary"></label>
								</div>
							</td>
							<td><?php echo $row['remark']; ?></td>
							<td class="min-w-xs">
							<?php if (get_permission('exam', 'is_edit')): ?>
								<!-- updatr link -->
								<a href="<?php echo base_url('exam/edit/' . $row['id']);?>" class="btn btn-default btn-circle icon">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
								</a>
							<?php endif; if (get_permission('exam', 'is_delete')): ?>
								<!-- delete link -->
								<?php echo btn_delete('exam/delete/' . $row['id']);?>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
<?php if (get_permission('exam', 'is_add')): ?>
			<div class="tab-pane" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'frm-submit'));?>
					<div class="form-horizontal form-bordered mb-lg">
						<?php if (is_superadmin_loggedin()): ?>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, $branch_id, "class='form-control' id='branch_id'
									id='branch_id' data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('name')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="" autocomplete="off" />
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('term')?></label>
							<div class="col-md-6">
								<?php
									$array = $this->app_lib->getSelectByBranch('exam_term', $branch_id);
									echo form_dropdown("term_id", $array, set_value('term_id'), "class='form-control' id='term_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('exam_type')?></label>
							<div class="col-md-6">
								<?php
									$arrayType = array(
										'' => translate('select'), 
										'1' => translate('marks'), 
										'2' => translate('grade'), 
										'3' => translate('marks_and_grade'), 
									);
									echo form_dropdown("type_id", $arrayType, set_value('type_id'), "class='form-control' id='type_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('mark_distribution')?></label>
							<div class="col-md-6">
								<?php
									$arraySection = array();
									if (!is_superadmin_loggedin()){
										$result = $this->db->where('branch_id',get_loggedin_branch_id())->get('exam_mark_distribution')->result();
										foreach ($result as $row) {
											$arraySection[$row->id] = $row->name;
										}
									}
									echo form_dropdown("mark_distribution[]", $arraySection, set_value('mark_distribution[]'), "class='form-control' multiple id='mark_distribution'
									data-plugin-selectTwo data-width='100%'");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('remarks')?></label>
							<div class="col-md-6">
								<textarea rows="2" class="form-control" name="remark"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('publish')?></label>
							<div class="col-md-6 mb-sm">
								<div class="material-switch ml-xs">
									<input id="aswitch_1" name="exam_publish" 
									type="checkbox" />
									<label for="aswitch_1" class="label-primary"></label>
								</div>
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
				<?php echo form_close();?>
			</div>
<?php endif; ?>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('change', '#branch_id', function() {
			var branchID = $(this).val();
			$.ajax({
				url: "<?=base_url('ajax/getDataByBranch')?>",
				type: 'POST',
				data: {
					branch_id: branchID,
					table: 'exam_term'
				},
				success: function (data) {
					$('#term_id').html(data);
				}
			});

			$.ajax({
				url: "<?=base_url('exam/getDistributionByBranch')?>",
				type: 'POST',
				data: {
					branch_id: branchID,
				},
				success: function (data) {
					$('#mark_distribution').html(data);
				}
			});
		});


		// exam status
		$(".exam-status-switch").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "exam/publish_status",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});

		// publish result status
		$(".exam-result-switch").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "exam/publish_result_status",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});
	});
</script>