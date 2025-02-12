
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fas fa-list-ul"></i> <?=translate('call_log') ." ". translate('list')?>
                </a>
			</li>
<?php if (get_permission('call_log', 'is_add')): ?>
			<li>
                <a href="#add" data-toggle="tab">
                   <i class="far fa-edit"></i> <?=translate('add') . " ". translate('call_log')?>
                </a>
			</li>
<?php endif; ?>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active mb-md" id="list">
				<table class="table table-bordered table-hover mb-none table-condensed table-export">
					<thead>
						<tr>
							<th><?=translate('sl')?></th>
<?php if (is_superadmin_loggedin()): ?>
							<th><?=translate('branch')?></th>
<?php endif; ?>
							<th><?=translate('name')?></th>
							<th><?=translate('mobile_no')?></th>
							<th><?=translate('calling_purpose')?></th>
							<th><?=translate('call_type')?></th>
							<th><?=translate('date')?></th>
							<th><?=translate('start_time')?></th>
							<th><?=translate('end_Time')?></th>
							<th><?=translate('follow_up')?></th>
							<th><?=translate('duration')?></th>
							<th><?=translate('note')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($result)) { 
							$count = 1;
							foreach ($result as $key => $row) {
								?>
							<tr>
								<td><?php echo $count++; ?></td>
<?php if (is_superadmin_loggedin()): ?>
								<td><?php echo $row['branch_name']; ?></td>
<?php endif; ?>	
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['number']; ?></td>
								<td><?php echo $row['call_type'] == 1 ? translate('dispatch') : translate('receive'); ?></td>
								<td><?php echo get_type_name_by_id('call_purpose', $row['purpose_id']); ?></td>
								<td><?php echo _d($row['date']); ?></td>
								<td><?php echo date("h:i A", strtotime($row['start_time'])); ?></td>
								<td><?php echo date("h:i A", strtotime($row['end_time'])); ?></td>
								<td><?php echo _d($row['follow_up']); ?></td>
								<td><?php 
								$duration = (strtotime($row['end_time']) - strtotime($row['start_time']));
								$duration = format_duration($duration);
								echo $duration; ?></td>
								<td><?php echo $row['note']; ?></td>
								<td class="action">
									<?php if (get_permission('call_log', 'is_edit')): ?>
										<!-- update link -->
										<a href="<?php echo base_url('reception/call_log_edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
										</a>
									<?php endif; if (get_permission('call_log', 'is_delete')): ?>
										<!-- delete link -->
										<?php echo btn_delete('reception/call_log_delete/' . $row['id']); ?>
									<?php endif; ?>
								</td>
							</tr>
						<?php } } ?>
					</tbody>
				</table>
			</div>
<?php if (get_permission('call_log', 'is_add')): ?>
			<div class="tab-pane" id="add">
					<?php echo form_open($this->uri->uri_string(), array('class' => 'form-bordered form-horizontal frm-submit'));?>
					<?php if (is_superadmin_loggedin()): ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-width='100%' onchange='getPurposeByBranch(this.value)'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('call_type')?> <span class="required">*</span></label>
						<div class="col-md-6">
								<?php
									$arrayBranch = array(
										'' => translate('select'),
										'1' => translate('outgoing'),
										'2' => translate('incoming'),
									);
									echo form_dropdown("call_type", $arrayBranch, set_value('call_type'), "class='form-control' data-width='100%'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('calling_purpose')?> <span class="required">*</span></label>
						<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectByBranch('call_purpose', $branch_id);
									echo form_dropdown("purpose_id", $arrayBranch, set_value('purpose_id'), "class='form-control' data-width='100%' id='calling_purpose'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="phone_number" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('date')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
								<input type="text" class="form-control" name="date" value="<?=set_value('date', date('Y-m-d'))?>" data-plugin-datepicker
								data-plugin-options='{ "todayHighlight" : true }' />
							</div>
						</div>
						<span class="error"></span>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('time_slot'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<div class="row">
								<div class="col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-clock"></i></span>
										<input type="text" data-plugin-timepicker data-plugin-options='{ "minuteStep" : 1 }' class="form-control" name="start_time" id="time_start" value="<?php echo set_value('time_start'); ?>" />
									</div>
									<span class="error"></span>
								</div>
								<div class="col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-clock"></i></span>
										<input type="text" data-plugin-timepicker data-plugin-options='{ "minuteStep" : 1 }' class="form-control" name="end_time" id="time_end" value="<?php echo set_value('time_end'); ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('follow_up') . " " . translate('date')?></label>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
								<input type="text" class="form-control" name="follow_up_date" value="" data-plugin-datepicker
								data-plugin-options='{ "todayHighlight" : true }' />
							</div>
						</div>
						<span class="error"></span>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('note')?></label>
						<div class="col-md-6 mb-lg">
							<textarea type="text" rows="3" class="form-control" name="note"></textarea>
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
				<?php echo form_close(); ?>
			</div>
<?php endif; ?>
		</div>
	</div>
</section>
<?php 
	function format_duration($secs, $delimiter = ':')
	{
		$seconds = $secs % 60;
		$minutes = floor($secs / 60);
		$hours   = floor($secs / 3600);
		$seconds = str_pad($seconds, 2, "0", STR_PAD_LEFT);
		$minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT) . $delimiter;
		$hours   = ($hours > 0) ? str_pad($hours, 2, "0", STR_PAD_LEFT).$delimiter : '00' . $delimiter;
		return "$hours$minutes$seconds";
	}
?>

<script type="text/javascript">
	function getPurposeByBranch(id) {
	    $.ajax({
	        url: base_url + 'ajax/getDataByBranch',
	        type: 'POST',
	        data: {
	            table: "call_purpose",
	            branch_id: id
	        },
	        success: function (response) {
	            $('#calling_purpose').html(response);
	        }
	    });
	}
</script>