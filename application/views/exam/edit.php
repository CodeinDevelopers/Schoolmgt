<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?=base_url('exam')?>"><i class="fas fa-list-ul"></i> <?=translate('exam_list')?></a>
			</li>
			<li class="active">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?=translate('edit_exam')?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="create">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'frm-submit'));?>
				<div class="form-horizontal form-bordered mb-lg">
					<input type="hidden" name="exam_id" value="<?=$exam['id']?>">
					<input type="hidden" name="branch_id" value="<?=$exam['branch_id']?>">
						
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('name')?> <span class="required">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="<?=$exam['name']?>" />
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('term')?></label>
							<div class="col-md-6">
								<?php
									$array = $this->app_lib->getSelectByBranch('exam_term', $exam['branch_id']);
									echo form_dropdown("term_id", $array, $exam['term_id'], "class='form-control' id='term_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('exam_type')?></label>
							<div class="col-md-6">
								<?php
									$arrayType = array(
										'' => translate('select'), 
										'1' => translate('marks'), 
										'2' => translate('grade'), 
										'3' => translate('marks_and_grade'), 
									);
									echo form_dropdown("type_id", $arrayType, $exam['type_id'], "class='form-control' id='type_id'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('mark_distribution')?></label>
							<div class="col-md-6">
								<?php
									$sel = json_decode($exam['mark_distribution'], true);
									$arraySection = array();
									$result = $this->db->where('branch_id', $exam['branch_id'])->get('exam_mark_distribution')->result();
									foreach ($result as $row) {
										$arraySection[$row->id] = $row->name;
									}
									echo form_dropdown("mark_distribution[]", $arraySection, $sel, "class='form-control' multiple id='mark_distribution'
									data-plugin-selectTwo data-width='100%'");
								?>
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('remarks')?></label>
							<div class="col-md-6 mb-sm">
								<textarea rows="2" class="form-control" name="remark"><?=$exam['remark']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><?=translate('publish')?></label>
							<div class="col-md-6">
								<div class="material-switch ml-xs">
									<input id="aswitch_1" name="exam_publish" <?php echo $exam['status'] == 1 ? 'checked' : '' ?> type="checkbox" />
									<label for="aswitch_1" class="label-primary"></label>
								</div>
							</div>
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