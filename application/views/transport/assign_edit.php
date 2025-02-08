<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('transport/assign')?>"><i class="fas fa-list-ul"></i> <?=translate('assign') . ' ' . translate('list')?></a>
			</li>
			<li class="active">
				<a href="#edit" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('edit_assign')?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="edit">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit')); ?>
					<?php echo form_hidden('branch_id', $assign['branch_id']);?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('transport_route')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayRoute = $this->app_lib->getSelectByBranch('transport_route', $assign['branch_id']);
								echo form_dropdown("route_id", $arrayRoute, $assign['route_id'], "class='form-control' required id='route_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('stoppage')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arraystoppage = array("" => translate('select'));
								$stoppages = $this->db->get_where('transport_stoppage', array('branch_id' => $assign['branch_id']))->result();
								foreach ($stoppages as $stoppage){
									$arraystoppage[$stoppage->id] = $stoppage->stop_position;
								}
								echo form_dropdown("stoppage_id", $arraystoppage, set_value('stoppage_id', $assign['stoppage_id']), "class='form-control' required id='stoppage_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('vehicle')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-md">
							<select name="vehicle[]" class="form-control mb-sm" data-plugin-selectTwo multiple data-width="100%" required id='vehicle_id'
							data-plugin-options='{ "placeholder": "<?=translate('select_multiple_vehicle')?>" }'>
								<?php
								$vehicles = $this->db->get_where('transport_vehicle', array('branch_id' => $assign['branch_id']))->result();
								foreach ($vehicles as $vehicle):
								$query_assign = $this->db->get_where("transport_assign", array(
									'route_id' => $assign['route_id'],
									'vehicle_id' => $vehicle->id
								));
								?>
								<option value="<?=$vehicle->id?>" <?=($query_assign->num_rows() != 0 ? 'selected' : '');?>><?=$vehicle->vehicle_no?></option>
								<?php endforeach;?>
							</select>
							<span class="error"></span>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-offset-3 col-md-2">
								<button type="submit" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('update')?>
								</button>
							</div>
						</div>
					</footer>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>