<div class="row">
<?php if (get_permission('leave_category', 'is_add')): ?>
	<div class="col-md-5">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="far fa-edit"></i> <?=translate('add_leave_category')?></h4>
			</header>
            <?php echo form_open($this->uri->uri_string()); ?>
				<div class="panel-body">
				<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branch_id'
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
						?>
						<span class="error"><?php echo form_error('branch_id'); ?></span>
					</div>
				<?php endif; ?>
					<div class="form-group">
						<label class="control-label"><?=translate('leave_category') . " " . translate('name')?> <span class="required">*</span></label>
						<input type="text" class="form-control" name="leave_category" value="<?php echo set_value('leave_category'); ?>" />
						<span class="error"><?php echo form_error('leave_category'); ?></span>
					</div>
					<div class="form-group">
						<label class="control-label"><?=translate('role')?> <span class="required">*</span></label>
		                <?php
		                    $role_list = $this->app_lib->getRoles([1,6]);
		                    echo form_dropdown("role_id", $role_list, set_value('role_id'), "class='form-control' id='role_id'
		                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
		                ?>
						<span class="error"><?php echo form_error('role_id'); ?></span>
					</div>
					<div class="form-group mb-md">
						<label class="control-label"><?=translate('days'); ?> <span class="required">*</span></label>
						<input type="number" class="form-control" name="leave_days" value="<?php echo set_value('leave_days'); ?>" placeholder="Decide The Day" />
						<span class="error"><?php echo form_error('leave_days'); ?></span>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-default pull-right" type="submit" name="save" value="1"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save'); ?></button>
						</div>	
					</div>
				</div>
			<?php echo form_close(); ?>
		</section>
	</div>
<?php endif; ?>
<?php if (get_permission('leave_category', 'is_view')): ?>
	<div class="col-md-<?php if (get_permission('leave_category', 'is_add')){ echo "7"; }else{echo "12";} ?>">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-list-ul"></i> <?=translate('leave_category') . " " . translate('list')?></h4>
			</header>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed mb-none">
						<thead>
							<tr>
								<th><?=translate('sl')?></th>
								<th><?=translate('branch')?></th>
								<th><?=translate('name')?></th>
								<th><?=translate('role')?></th>
								<th><?=translate('days')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						if (count($category)){
							foreach ($category as $row):
								?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo get_type_name_by_id('branch', $row['branch_id']);?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo get_type_name_by_id('roles', $row['role_id']); ?></td>
								<td><?php echo $row['days']; ?></td>
								<td class="min-w-xs">
								<?php if (get_permission('leave_category', 'is_edit')): ?>
									<a class="btn btn-default btn-circle icon" href="javascript:void(0);" data-toggle="tooltip" data-original-title="<?=translate('edit');?>"
										onclick="getLeaveCategory('<?php echo html_escape($row['id']); ?>')">
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
									</a>
								<?php endif; if (get_permission('leave_category', 'is_delete')): ?>
									<?php echo btn_delete('leave/category_delete/' . $row['id']); ?>
								<?php endif; ?>
								</td>
							</tr>
							<?php
								endforeach;
							}else{
								echo '<tr><td colspan="6"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
<?php endif; ?>
</div>
<?php if (get_permission('leave_category', 'is_edit')): ?>
<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="far fa-edit"></i> <?=translate('edit_leave_category')?>
			</h4>
		</header>
		<?php echo form_open('leave/category_edit', array('class' => 'frm-submit')); ?>
			<div class="panel-body">
				<input type="hidden" name="category_id" id="ecategory_id" value="">
				<?php if (is_superadmin_loggedin()): ?>
					<div class="form-group">
						<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='ebranch_id'
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
						?>
						<span class="error"></span>
					</div>
				<?php endif?>
				<div class="form-group">
					<label class="control-label"><?=translate('name')?> <span class="required">*</span></label>
					<input type="text" class="form-control" name="leave_category" id="eleave_category" value="" />
					<span class="error"></span>
				</div>
					<div class="form-group">
						<label class="control-label"><?=translate('role')?> <span class="required">*</span></label>
		                <?php
		                    $role_list = $this->app_lib->getRoles([1,6]);
		                    echo form_dropdown("role_id", $role_list, set_value('role_id'), "class='form-control' id='erole_id'
		                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
		                ?>
						<span class="error"></span>
					</div>
				<div class="form-group mb-md">
					<label class="control-label"><?=translate('days')?> <span class="required">*</span></label>
					<input type="text" class="form-control" name="leave_days" id="eleave_days" value="" />
					<span class="error"></span>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('update'); ?>
						</button>
						<button class="btn btn-default modal-dismiss"><?=translate('cancel')?></button>
					</div>
				</div>
			</footer>
		<?php echo form_close(); ?>
	</section>
</div>
<?php endif; ?>