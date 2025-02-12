<style type="text/css">
	.sub_menu {
		background: #f0f0f0;
	}
	html.dark .sub_menu {
		background: #3e3c3c;
		color: #ddd;
	}
</style>
<?php if (is_superadmin_loggedin() ): ?>
	<?php $this->load->view('frontend/branch_select'); ?>
<?php endif; 
if (!empty($branch_id)) {
	?>

<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('menu') . " " . translate('list'); ?></a>
			</li>
	<?php if (get_permission('frontend_menu', 'is_add')) { ?>
			<li class="">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('menu'); ?></a>
			</li>
	<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane active">
				<table class="table tbr-middle table-condensed table_default" data-order="true" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
							<th><?php echo translate('menu') . " " . translate('type'); ?></th>
							<th><?php echo translate('title'); ?></th>
							<th><?php echo translate('position'); ?></th>
							<th><?php echo "Sub Menu"; ?></th>
							<th><?php echo translate('publish'); ?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							$menulist = $this->frontend_model->getMenuList($branch_id);
							if (!empty($menulist)) {
								foreach ($menulist as $row):
									$publish = '';
									$edit_branch_id = '';
									if ($row['system']) {
										if (is_superadmin_loggedin()) {
											$edit_branch_id = "/" . $branch_id; 
										}
										if ($row['invisible'] == 0) {
											$publish = 'checked';
										}
									} else {
										if ($row['publish']) {
											$publish = 'checked';
										}
									}
								?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php
							if ($row['system'] == 1) {
								echo "System Menu";
							} else {
								echo "Has Been Added";
							}
							?></td>
							<td><?php echo strip_tags($row['title']); ?></td>
							<td><?php echo $row['ordering']; ?></td>
							<td><?php
							 if (!empty($row['submenu'])) {
							 	echo '<i class="fas fa-arrow-down"></i>';
							 } else {
							 	echo '-';
							 } ?></td>
							<td>
		                        <div class="material-switch ml-xs">
		                            <input class="switch_menu" id="switch_<?php echo $row['id']; ?>" data-menu-id="<?php echo $row['id']; ?>" name="sw_menu<?php echo $row['id']; ?>" type="checkbox" <?php echo $publish; ?> />
		                            <label for="switch_<?php echo $row['id']; ?>" class="label-primary"></label>
		                        </div>
							</td>
							<td class="min-w-xs">
							<?php if (get_permission('frontend_menu', 'is_edit')) { ?>
								<a href="<?php echo base_url('frontend/menu/edit/' . $row['id'] . $edit_branch_id); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
								</a>
							<?php } ?>
							<?php
								if ($row['system'] == 0) {
									if (get_permission('frontend_menu', 'is_delete')) {
										echo btn_delete('frontend/menu/delete/' . $row['id']); 
									}
								}
							?>
							</td>
						</tr>
					<?php if (!empty($row['submenu'])) {
						foreach ($row['submenu'] as $key => $value) {
							$publish = '';
							$edit_branch_id = '';
							if ($value['system']) {
								if (is_superadmin_loggedin()) {
									$edit_branch_id = "/" . $branch_id; 
								}
								if ($value['invisible'] == 0) {
									$publish = 'checked';
								}
							} else {
								if ($value['publish']) {
									$publish = 'checked';
								}
							}
					 ?>
						<tr class="sub_menu">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><i class="fas fa-angle-double-right"></i> <?php echo $value['title'] ?></td>
							<td>
		                        <div class="material-switch ml-xs">
		                            <input class="switch_menu" id="switch_<?php echo $value['id']; ?>" data-menu-id="<?php echo $value['id']; ?>" name="sw_menu<?php echo $value['id']; ?>" type="checkbox" <?php echo $publish; ?> />
		                            <label for="switch_<?php echo $value['id']; ?>" class="label-primary"></label>
		                        </div>
							</td>
							<td class="min-w-xs">
							<?php if (get_permission('frontend_menu', 'is_edit')) { ?>
								<a href="<?php echo base_url('frontend/menu/edit/' . $value['id'] . $edit_branch_id); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
									<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
								</a>
							<?php } ?>
							<?php
								if ($value['system'] == 0) {
									if (get_permission('frontend_menu', 'is_delete')) {
										echo btn_delete('frontend/menu/delete/' . $value['id']); 
									}
								}
							?>
							</td>
						</tr>
					<?php }} ?>
						<?php endforeach; }?>
					</tbody>
				</table>
			</div>
	<?php if (get_permission('frontend_menu', 'is_add')) { ?>
			<div class="tab-pane" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit')); ?>
					<?php if (is_superadmin_loggedin()): ?>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-width='100%'
								data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('position'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="position" value="<?php echo set_value('position'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('publish'); ?></label>
						<div class="col-md-6">
	                        <div class="material-switch">
	                            <input name="publish" id="publish" type="checkbox" value="1" <?php echo set_checkbox('publish', '1', true); ?> />
	                            <label for="publish" class="label-primary"></label>
	                        </div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('target_new_window'); ?></label>
						<div class="col-md-6">
	                        <div class="material-switch">
	                            <input name="new_tab" id="new_tab" type="checkbox" value="1" <?php echo set_checkbox('new_tab', '1'); ?> />
	                            <label for="new_tab" class="label-primary"></label>
	                        </div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('external_url'); ?></label>
						<div class="col-md-6">
	                        <div class="material-switch">
	                            <input class="ext_url" name="external_url" id="external_url" type="checkbox" value="1" <?php echo set_checkbox('external_url', '1'); ?> />
	                            <label for="external_url" class="label-primary"></label>
	                        </div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('external_link'); ?></label>
						<div class="col-md-6">
	                        <input type="text" class="form-control" name="external_link" id="external_link" value="<?php echo set_value('external_link'); ?>" <?php echo (!set_value('external_url')) ? 'disabled' : ''; ?> />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('parent_menu')?></label>
						<div class="col-md-6">
							<?php
							$getMenuList = $this->frontend_model->getMenuList($branch_id);
				            $array = array(0 => translate('select'));
				            foreach ($getMenuList as $row) {
				                $array[$row['id']] = ' - ' . $row['title'];
				            }
							echo form_dropdown("parent_id", $array, '', "class='form-control' data-width='100%' data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
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
	var menu_branchID = "<?=$branch_id?>"
</script>
<?php } ?>






