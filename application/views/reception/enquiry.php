<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fas fa-list-ul"></i> <?=translate('enquiry') ." ". translate('list')?>
                </a>
			</li>
<?php if (get_permission('enquiry', 'is_add')): ?>
			<li>
                <a href="#add" data-toggle="tab">
                   <i class="far fa-edit"></i> <?=translate('add') . " ". translate('enquiry')?>
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
							<th><?=translate('guardian')?></th>
							<th><?=translate('reference') ?></th>
							<th><?=translate('enquiry') . " " . translate('date') ?></th>
							<th><?=translate('next') . " " .  translate('follow_up') . " " . translate('date')?></th>
							<th><?=translate('status') ?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($result)) { 
							$count = 1;
							$getStatus = $this->reception_model->getStatus();
							foreach ($result as $key => $row) {
								$status = 1;
								$follow_up_details = $this->reception_model->follow_up_details($row['id']);
								if (!empty($follow_up_details)) {
									$status = $follow_up_details['status'];
								}
							?>
							<tr>
								<td><?php echo $count++; ?></td>
<?php if (is_superadmin_loggedin()): ?>
								<td><?php echo $row['branch_name']; ?></td>
<?php endif; ?>		
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['mobile_no']; ?></td>
								<td><?php echo translate('father_name') . " : " . $row['father_name'] . "<br>" . translate('mother_name') . " : " . $row['mother_name']; ?></td>
								<td><?php echo get_type_name_by_id('enquiry_reference', $row['reference_id']); ?></td>
								<td><?php echo _d($row['date']); ?></td>
								<td><?php $followUP = $this->reception_model->follow_up_details($row['id']);
								if (empty($followUP['next_date'])) {
									echo "-";
								} else {
									echo _d($followUP['next_date']);
								} ?></td>
								<td>
									<?php if ($status == 1) { ?>
										<span class="label label-success-custom"><i class="far fa-check-square"></i> <?php echo $getStatus[$status]; ?></span>
									<?php } else { ?>
										<span class="label label-danger-custom"><i class="far fa-check-square"></i> <?php echo $getStatus[$status]; ?></span>
									<?php } ?>
								</td>
								<td>
									<a href="<?php echo base_url('reception/enquiry_details/' . $row['id']) ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('details')?>">
										<i class="fa-solid fa-circle-right"></i>
									</a>
									<?php if (get_permission('enquiry', 'is_edit')): ?>
										<!-- update link -->
										<a href="<?php echo base_url('reception/enquiry_edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
										</a>
									<?php endif; if (get_permission('enquiry', 'is_delete')): ?>
										<!-- delete link -->
										<?php echo btn_delete('reception/enquiry_delete/' . $row['id']); ?>
									<?php endif; ?>
								</td>
							</tr>
						<?php } } ?>
					</tbody>
				</table>
			</div>
<?php if (get_permission('enquiry', 'is_add')): ?>
			<div class="tab-pane" id="add">
					<?php echo form_open($this->uri->uri_string(), array('class' => 'form-bordered form-horizontal frm-submit'));?>
					<?php if (is_superadmin_loggedin()): ?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=translate('branch')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<?php
									$arrayBranch = $this->app_lib->getSelectList('branch');
									echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-width='100%' id='branchID'
									data-plugin-selectTwo");
								?>
								<span class="error"></span>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('gender')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayGender = array(
									'' => translate('select'),
									'1' => translate('male'),
									'2' => translate('female')
								);
								echo form_dropdown("gender", $arrayGender, set_value('gender'), "class='form-control' data-plugin-selectTwo
								data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('birthday')?></label>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-birthday-cake"></i></span>
								<input type="text" class="form-control" name="birthday" value="" data-plugin-datepicker
								data-plugin-options='{ "todayHighlight" : true }' />
							</div>
						</div>
						<span class="error"></span>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('previous_school')?></label>
						<div class="col-md-6">
							<textarea type="text" rows="3" class="form-control" name="previous_school"></textarea>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('father_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="father_name" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('mother_name')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="mother_name" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('mobile_no')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="mobile_no" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('email')?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email" value="" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('address')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea type="text" rows="3" class="form-control" name="address"></textarea>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('no_of_child')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="no_of_child" value="" autocomplete="off" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('assigned')?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayBranch = $this->app_lib->getStaffList($branch_id);
								echo form_dropdown("staff_id", $arrayBranch, set_value('staff_id'), "class='form-control' data-width='100%' id='staff_id'
								data-plugin-selectTwo");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('reference')?> <span class="required">*</span></label>
						<div class="col-md-6">
								<?php
									$enquiryReference = $this->app_lib->getSelectByBranch('enquiry_reference', $branch_id);
									echo form_dropdown("reference", $enquiryReference, set_value('reference'), "class='form-control' data-width='100%' id='referenceID'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('response')?> <span class="required">*</span></label>
						<div class="col-md-6">
								<?php
									$enquiryResponse = $this->app_lib->getSelectByBranch('enquiry_response', $branch_id);
									echo form_dropdown("response_id", $enquiryResponse, set_value('response'), "class='form-control' data-width='100%' id='responseID'
									data-plugin-selectTwo  data-minimum-results-for-search='Infinity'");
								?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('response')?></label>
						<div class="col-md-6">
							<textarea type="text" rows="3" class="form-control" name="response"></textarea>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('note')?></label>
						<div class="col-md-6">
							<textarea type="text" rows="3" class="form-control" name="note"></textarea>
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
						<label class="col-md-3 control-label"><?=translate('class_applying_for')?> <span class="required">*</span></label>
						<div class="col-md-6 mb-lg">
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
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

<script type="text/javascript">
	$('#branchID').on('change', function(){
		var branchID = this.value;
		$.ajax({
		   url: base_url + "ajax/getStafflistRole",
		   type: 'POST',
		   data: {
				branch_id: branchID,
				role_id: ''
		   },
		   success: function (data) {
		      $('#staff_id').html(data);
		   }
		});

		getResponseByBranch(branchID);
		getReferenceByBranch(branchID);
		getClassByBranch(branchID);
	});

	function getResponseByBranch(id) {
	    $.ajax({
	        url: base_url + 'ajax/getDataByBranch',
	        type: 'POST',
	        data: {
	            table: "enquiry_response",
	            branch_id: id
	        },
	        success: function (response) {
	            $('#responseID').html(response);
	        }
	    });
	}

	function getReferenceByBranch(id) {
	    $.ajax({
	        url: base_url + 'ajax/getDataByBranch',
	        type: 'POST',
	        data: {
	            table: "enquiry_reference",
	            branch_id: id
	        },
	        success: function (response) {
	            $('#referenceID').html(response);
	        }
	    });
	}
</script>