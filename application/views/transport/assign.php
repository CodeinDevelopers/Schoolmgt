<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?=translate('assign') . ' ' . translate('list')?></a>
			</li>
<?php if (get_permission('transport_assign', 'is_add')): ?>
			<li >
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('assign_vehicle')?></a>
			</li>
<?php endif; ?>	
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane active">
				<table class="table table-bordered table-hover mb-none tbr-top table-export">
					<thead>
						<tr>
							<th><?=translate('sl')?></th>
<?php if (is_superadmin_loggedin()): ?>
							<th><?=translate('branch')?></th>
<?php endif; ?>
							<th><?=translate('route_name')?></th>
							<th><?=translate('start_place')?></th>
							<th><?=translate('stoppage')?></th>
							<th><?=translate('stop_place')?></th>
							<th><?=translate('route_fare')?></th>
							<th><?=translate('vehicle_no')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							$result = $this->transport_model->getAssignList($branch_id);
							foreach ($result as $row):
								?>
						<tr>
							<td><?php echo $count++;?></td>
<?php if (is_superadmin_loggedin()): ?>
							<td><?php echo get_type_name_by_id('branch', $row['branch_id']);?></td>
<?php endif; ?>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['start_place'];?></td>
							<td><?php 
								echo $row['stop_position'];
								echo '<br> <small class="text-dark">'.translate('stop_time') . ' : ' . date("g:i A", strtotime($row['stop_time'])) . '</small>';
								?>
							</td>
							<td><?php echo $row['stop_place'];?></td>
							<td><?php echo $row['route_fare'];?></td>
							<td><?php echo $this->transport_model->get_vehicle_list($row['route_id']);?></td>
							<td>
							<?php if (get_permission('transport_assign', 'is_edit')): ?>
								<!-- update link -->
								<a href="<?php echo base_url('transport/assign_edit/' . $row['route_id']);?>" class="btn btn-circle btn-default icon">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
								</a>
							<?php endif; if (get_permission('transport_assign', 'is_delete')): ?>
								<!-- delete link -->
								<?php echo btn_delete('transport/assign_delete/' . $row['route_id']);?>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
<?php if (get_permission('transport_assign', 'is_add')): ?>
			<div class="tab-pane" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit'));?>
					<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, "", "class='form-control' id='branch_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('transport_route')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayRoute = $this->app_lib->getSelectByBranch('transport_route', $branch_id);
								echo form_dropdown("route_id", $arrayRoute, set_value('route_id'), "class='form-control' id='route_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('stoppage')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								if(!empty($branch_id)){
									$arraystoppage = array("" => translate('select'));
									$stoppages = $this->db->get_where('transport_stoppage', array('branch_id' => $branch_id))->result();
									foreach ($stoppages as $stoppage){
										$arraystoppage[$stoppage->id] = $stoppage->stop_position;
									}
								}else{
									$arraystoppage = array("" => translate('select_branch_first'));
								}
								echo form_dropdown("stoppage_id", $arraystoppage, set_value('stoppage_id'), "class='form-control' id='stoppage_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('vehicle')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-md">
							<select name="vehicle[]" class="form-control mb-sm" data-plugin-selectTwo multiple data-width="100%" id='vehicle_id'
							data-plugin-options='{ "placeholder": "<?=translate('select_multiple_vehicle')?>" }'>
								<?php 
								if(!empty($branch_id)):
									$vehicles = $this->db->get_where('transport_vehicle', array('branch_id' => $branch_id))->result();
									foreach ($vehicles as $vehicle):
								?>
								<option value="<?=$vehicle->id?>" <?=set_select('vehicle[]', $vehicle->id)?>><?=$vehicle->vehicle_no?></option>
								<?php endforeach; endif; ?>
							</select>
							<span class="error"></span>
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
		$('#branch_id').on('change', function(){	
			var branchID = $(this).val();
			$.ajax({
				url: "<?=base_url('ajax/getDataByBranch')?>",
				type: 'POST',
				data: {
					branch_id: branchID,
					table: 'transport_route'
				},
				success: function (data) {
					$('#route_id').html(data);
				}
			});
			
			$.ajax({
				url: "<?=base_url('transport/getStoppageByBranch')?>",
				type: 'POST',
				data: {branch_id: branchID},
				success: function (data) {
					$('#stoppage_id').html(data);
				}
			});
			
			$.ajax({
				url: "<?=base_url('transport/getVehicleByBranch')?>",
				type: 'POST',
				data: {branch_id: branchID},
				success: function (data) {
					$('#vehicle_id').html(data);
				}
			});
		});
	});
</script>