<?php $widget = (is_superadmin_loggedin() ? '' : 'col-md-offset-3'); ?>
<section class="panel">
	<?php echo form_open($this->uri->uri_string());?>
	<header class="panel-heading">
		<h4 class="panel-title">Select Class</h4>
	</header>
		<div class="panel-body">
			<div class="row">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"><?=form_error('branch_id')?></span>
						</div>
					</div>
				<?php endif; ?>
				<div class="<?=$widget?> col-md-6 mb-lg">		
					<div class="form-group">
						<label class="control-label"><?php echo translate('date'); ?> <span class="required">*</span></label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
							<input type="text" class="form-control" name="date" value="<?=set_value('date', date('Y-m-d'))?>" data-plugin-datepicker
							data-plugin-options='{ "todayHighlight" : true }' />
						</div>
						<span class="error"><?=form_error('date')?></span>
					</div>
				</div>
			</div>
		</div>
	<footer class="panel-footer">
		<div class="row">
			<div class="col-md-offset-10 col-md-2">
				<button type="submit" name="submit" value="search" class="btn btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
			</div>
		</div>
	</footer>
    <?php echo form_close();?>
</section>

<?php if (isset($attendancelist)): ?>
	<section class="panel appear-animation mt-sm" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
		<header class="panel-heading">
			<h4 class="panel-title"><i class="fas fa-users"></i> <?=translate('attendance_report')?></h4>
		</header>
		<div class="panel-body">
			<style type="text/css">
				table.dataTable.table-condensed > thead > tr > th {
				  padding-right: 3px !important;
				}
			</style>
			<!-- hidden school information prints -->
			<div class="export_title">Daily Attendance Sheet on <?=_d($date); ?></div>

			<div class="row">
				<div class="col-md-12">
					<div class="mb-lg">
						<table class="table table-bordered table-hover table-condensed mb-none text-dark table-export">
							<thead>
								<tr>
									<th>#</th>
									<th><?=translate('class')?></th>
									<th><?=translate('present')?></th>
									<th><?=translate('total_present')?></th>
									<th><?=translate('total_absent')?></th>
									<th><?=translate('present')?> (%)</th>
									<th><?=translate('absent')?> (%)</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count = 1; $totalStudent = $totalPresent = $totalAbsent = 0;
							foreach ($attendancelist as $row):
							?>
								<tr>
									<td><?php echo $count++ ?></td>
									<td><?=$row->class_name . " (" . $row->section_name . ")" ?></td>
									<td>
										<?=translate('present')?> : <strong><?=$row->present?></strong><br>
										<?=translate('late')?> : <strong><?=$row->late?></strong><br>
										<?=translate('half_day')?> : <strong><?=$row->half_day?></strong><br>
									</td>
									<td><?php 
									$total_present = ($row->present + $row->late + $row->half_day);
									$total_student = $total_present + $row->absent;
									echo $total_present;
									?></td>
									<td><?php echo $row->absent; ?></td>
									<td><?php
											$totalPresent += $total_present;
											$totalAbsent += $row->absent;
											$totalStudent += $total_student;
							                if ($total_present > 0) {
							                    $presnt_percent = round(($total_present / $total_student) * 100);
							                } else {
							                    $presnt_percent = 0;
							                }
							                echo $presnt_percent . "%";
									?></td>
									<td><?php 
										if ($row->absent > 0) {
						                    $presnt_absent = round(($row->absent / $total_student) * 100);
						                } else {
						                    $presnt_absent = 0;
						                }
						                echo $presnt_percent . "%";
									 ?></td>
									
									<?php endforeach; ?>
								</tr>
							</tbody>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th><?php echo $totalPresent; ?></th>
							<th><?php echo $totalAbsent; ?></th>
							<th><?php if ($totalStudent > 0) {
									echo round(($totalPresent / $totalStudent) * 100) . "%";
								} else {
									echo "0%";
								}
							 ?></th>
							<th><?php if ($totalStudent > 0) {
									echo round(($totalAbsent / $totalStudent) * 100) . "%";
								} else {
									echo "0%";
								}
							 ?></th>
						</tr>
					</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>