<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('hostels')?>"><i class="fas fa-list-ul"></i> <?=translate('hostel_list')?></a>
			</li>
			<li class="active">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('edit_hostel')?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="create">
					<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered frm-submit')); ?>
					<input type="hidden" name="hostel_id" value="<?=$hostel['id']?>">
					<?php if (is_superadmin_loggedin()): ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, $hostel['branch_id'], "class='form-control' data-width='100%' id='branch_id'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"></span>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('hostel_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="<?=$hostel['name']?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('category')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayCategory = $this->app_lib->getSelectByBranch('hostel_category', $hostel['branch_id'], false, array('type' => 'hostel'));
								echo form_dropdown("category_id", $arrayCategory, $hostel['category_id'], "class='form-control' id='category_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('watchman_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="watchman_name" value="<?=$hostel['watchman']?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('hostel_address')?></label>
						<div class="col-md-6">
							<textarea class="form-control" rows="3" name="hostel_address"><?=$hostel['address']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('remarks')?></label>
						<div class="col-md-6 mb-md">
							<textarea class="form-control" rows="2" name="remarks"><?=$hostel['remarks']?></textarea>
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

<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('change', '#branch_id', function() {
			var branchID = $(this).val();
			$.ajax({
				url: "<?=base_url('hostels/getCategoryByBranch')?>",
				type: 'POST',
				data:{
					branch_id: branchID,
					type: 'hostel'
				},
				success: function (data) {
					$('#category_id').html(data);
				}
			});
		});
	});
</script>