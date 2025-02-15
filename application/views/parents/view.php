<?php if (is_superadmin_loggedin() ): ?>
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">Select Branch</h4>
		</header>
		<?php echo form_open($this->uri->uri_string(), array('class' => 'validate'));?>
		<div class="panel-body">
			<div class="row mb-sm">
				<div class="col-md-offset-3 col-md-6">
					<div class="form-group">
						<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control'
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
						?>
					</div>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-offset-10 col-md-2">
					<button type="submit" name="search" value="1" class="btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
				</div>
			</div>
		</footer>
		<?php echo form_close();?>
	</section>
<?php endif; ?>
<?php if (!empty($branch_id)): ?>
<?php if (is_superadmin_loggedin()) { ?>
<div class="row appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
<?php } else { ?>
<div class="row">
<?php } ?>	
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">
					<i class="fas fa-users"></i> <?=translate('parents_list')?>
				</h4>
			</header>
			<div class="panel-body">
				<div class="mb-md mt-md">
					<table class="table table-bordered table-hover table-condensed mb-none table-export">
						<thead>
							<tr>
								<th><?=translate('sl')?></th>
							<?php if (is_superadmin_loggedin()) { ?>
								<th><?=translate('branch')?></th>
							<?php } ?>
								<th><?=translate('guardian_name')?></th>
								<th><?=translate('occupation')?></th>
								<th><?=translate('mobile_no')?></th>
								<th><?=translate('email')?></th>
							<?php
							$show_custom_fields = custom_form_table('parents', $branch_id);
							if (count($show_custom_fields)) {
								foreach ($show_custom_fields as $fields) {
							?>
								<th><?=$fields['field_label']?></th>
							<?php } } ?>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							$parentslist = $this->parents_model->getParentList($branch_id);
							if (count($parentslist)) {
								foreach($parentslist as $row):
							?>	
							<tr>
								<td><?php echo $count++; ?></td>
							<?php if (is_superadmin_loggedin()) { ?>
								<td><?php echo get_type_name_by_id('branch', $row->branch_id);?></td>
							<?php } ?>
								<td><?php echo $row->name;?></td>
								<td><?php echo $row->occupation;?></td>
								<td><?php echo $row->mobileno;?></td>
								<td><?php echo $row->email;?></td>
							<?php
							if (count($show_custom_fields)) {
								foreach ($show_custom_fields as $fields) {
							?>
								<td><?php echo get_table_custom_field_value($fields['id'], $row->id);?></td>
							<?php } } ?>
								<td class="min-w-xs">
								<?php if (get_permission('parent', 'is_edit')): ?>
									<!-- update link -->
									<a href="<?php echo base_url('parents/profile/' . $row->id);?>" class="btn btn-default btn-circle icon" data-toggle="tooltip"
									data-original-title="<?=translate('profile')?>">
										<i class="far fa-arrow-alt-circle-right"></i>
									</a>
								<?php endif; if (get_permission('parent', 'is_delete')): ?>
									<!-- delete link -->
									<?php echo btn_delete('parents/delete/' . $row->id);?>
								<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; };?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<?php endif; ?>