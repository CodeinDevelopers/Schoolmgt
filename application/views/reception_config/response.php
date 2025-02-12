<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
             <a href="<?php echo base_url('reception_config/reference') ?>">
                 <i class="fas fa-list-ul"></i> <?=translate('reference')?>
             </a>
			</li>
			<li class="active">
             <a href="#response" data-toggle="tab">
                <i class="far fa-edit"></i> <?=translate('response')?>
             </a>
			</li>
			<li>
             <a href="<?php echo base_url('reception_config/calling_purpose') ?>">
                <i class="far fa-edit"></i> <?=translate('calling_purpose')?>
             </a>
			</li>
			<li>
             <a href="<?php echo base_url('reception_config/visiting_purpose') ?>">
                <i class="far fa-edit"></i> <?=translate('visiting_purpose')?>
             </a>
			</li>
			<li>
             <a href="<?php echo base_url('reception_config/complaint_type') ?>">
                <i class="far fa-edit"></i> <?=translate('complaint') . " " . translate('type')?>
             </a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active mb-md" id="response">
				<div class="row">
<?php if (get_permission('config_reception', 'is_add')): ?>
					<div class="col-md-5 pr-xs">
						<section class="panel panel-custom">
							<div class="panel-heading panel-heading-custom">
								<h4 class="panel-title"><i class="far fa-edit"></i> <?=translate('add') . " " . translate('response')?></h4>
							</div>
							<?php echo form_open($this->uri->uri_string(), array('class' => 'frm-submit'));?>
							<div class="panel-body panel-body-custom">
								<?php if (is_superadmin_loggedin()): ?>
									<div class="form-group">
										<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
										<?php
											$arrayBranch = $this->app_lib->getSelectList('branch');
											echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-width='100%'
											onchange='getSectionByBranch(this.value)' data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
										?>
										<span class="error"></span>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label class="control-label"><?=translate('name')?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="name" value="" />
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer panel-footer-custom">
								<div class="text-right">
					                <button type="submit" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
					                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
					                </button>
								</div>
							</footer>
							<?php echo form_close();?>
						</section>
					</div>
<?php endif; ?>
					<div class="col-md-<?php if (get_permission('config_reception', 'is_add')){ echo "7 pl-xs"; }else{ echo "12"; } ?>">
						<section class="panel panel-custom">
							<header class="panel-heading panel-heading-custom">
								<h4 class="panel-title"><i class="fas fa-list-ul"></i> <?=translate('response') . " " . translate('list')?></h4>
							</header>
							<div class="panel-body panel-body-custom">
								<div class="table-responsive">
									<table class="table table-bordered table-hover table-condensed tbr-top mb-none">
										<thead>
											<tr>
												<th><?=translate('sl')?></th>
											<?php if (is_superadmin_loggedin()): ?>
												<th><?=translate('branch')?></th>
											<?php endif; ?>
												<th><?=translate('name')?></th>
												<th><?=translate('action')?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$count = 1;
											if (count($result)){
												foreach($result as $row):
													?>
											<tr>
												<td><?php echo $count++;?></td>
											<?php if (is_superadmin_loggedin()): ?>
												<td><?php echo $row['branch_name'];?></td>
											<?php endif; ?>
												<td><?php echo $row['name'];?></td>
												<td>
												<?php if (get_permission('config_reception', 'is_edit')): ?>
													<!--update link-->
													<a href="javascript:void(0);" onclick="getReference('<?php echo $row['id']; ?>')" class="btn btn-default btn-circle icon">
														<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
													</a>
												<?php endif; if (get_permission('config_reception', 'is_delete')): ?>
													<!--delete link-->
													<?php echo btn_delete('reception_config/delete/enquiry_response/' . $row['id']);?>
												<?php endif; ?>
												</td>
											</tr>
										<?php
											endforeach;
										}else{
											echo '<tr><td colspan="4"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
										}
										?>
										</tbody>
									</table>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if (get_permission('config_reception', 'is_edit')): ?>
<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('response'); ?>
			</h4>
		</header>
		<?php echo form_open('reception_config/edit/enquiry_response', array('class' => 'frm-submit')); ?>
			<div class="panel-body">
				<input type="hidden" name="id" id="eid" value="">
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
				<?php endif; ?>
				<div class="form-group mb-md">
					<label class="control-label"><?php echo translate('name'); ?> <span class="required">*</span></label>
					<input type="text" class="form-control" value="" name="name" id="ename" autocomplete="off" />
					<span class="error"></span>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('update'); ?>
						</button>
						<button class="btn btn-default modal-dismiss"><?php echo translate('cancel'); ?></button>
					</div>
				</div>
			</footer>
		<?php echo form_close(); ?>
	</section>
</div>
<?php endif; ?>

<script type="text/javascript">
	function getReference(id) {
		$.ajax({
			url: base_url + 'reception_config/getDetails',
			type: 'POST',
			data: {
				'id': id,
				'table': 'enquiry_response'
			},
			dataType: "json",
			success: function (data) {
				$('#eid').val(data.id);
				$('#ename').val(data.name);
				$('#ebranch_id').val(data.branch_id).trigger('change');
				mfp_modal('#modal');
			}
		});
	}
</script>