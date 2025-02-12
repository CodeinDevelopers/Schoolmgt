<?php 
$frontendEnableChat = '';
$backendEnableChat = '';
if (!empty($whatsapp['frontend_enable_chat']) && $whatsapp['frontend_enable_chat'] == 1) {
	$frontendEnableChat = "checked";
}
if (!empty($whatsapp['backend_enable_chat']) && $whatsapp['backend_enable_chat'] == 1) {
	$backendEnableChat = "checked";
}
?>
<div class="row">
    <div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fab fa-whatsapp"></i> <?=translate('whatsapp_settings') ?></h4>
            </header>
            <?php echo form_open_multipart('school_settings/saveWhatsappConfig' . $url, array('class' => 'frm-submit-data')); ?>
                <div class="panel-body">
					<div class="form-group mt-md">
						<label class="col-md-3 control-label"><?=translate('header_title')?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="header_title" value="<?=$whatsapp['header_title'] ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('subtitle')?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="subtitle" value="<?=$whatsapp['subtitle']?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('footer_text')?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="footer_text" value="<?=$whatsapp['footer_text'] ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('frontend_enable_chat')?></label>
						<div class="col-md-6 mb-md">
	                        <div class="material-switch mt-xs">
	                            <input class="switch_menu" id="frontend_enable_chat" name="frontend_enable_chat" type="checkbox" <?php echo $frontendEnableChat ?> />
	                            <label for="frontend_enable_chat" class="label-primary"></label>
	                        </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?=translate('backend_enable_chat')?></label>
						<div class="col-md-6 mb-md">
	                        <div class="material-switch mt-xs">
	                            <input class="switch_menu" id="backend_enable_chat" name="backend_enable_chat" type="checkbox" <?php echo $backendEnableChat ?> />
	                            <label for="backend_enable_chat" class="label-primary"></label>
	                        </div>
						</div>
					</div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-2 col-sm-offset-3">
                            <button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save');?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fas fa-users"></i> <?=translate('whatsapp_agent') ?></h4>
            <?php if (get_permission('whatsapp_config', 'is_add')) { ?>
				<div class="panel-btn">
					<button class="btn btn-default btn-circle" onclick="mfp_modal('#modal')"><i class="far fa-edit"></i> <?=translate('add') . " " . translate('agent')?></button>
				</div>
			<?php } ?>
            </header>
            <div class="panel-body">
				<div class="table-responsive">
				    <table class="table table-bordered nowrap table-hover table-condensed mb-none">
				        <thead>
				            <tr>
				                <th width="50"><?=translate('sl')?></th>
				                <th><?=translate('photo')?></th>
				                <th><?=translate('name')?></th>
				                <th><?=translate('designation')?></th>
				                <th><?=translate('whataspp_number')?></th>
				                <th><?=translate('start_time')?></th>
				                <th><?=translate('end_time')?></th>
				                <th><?=translate('weekend')?></th>
				                <th><?=translate('action')?></th>
				            </tr>
				        </thead>
				        <tbody>
				            <?php 
				                $count = 1;
				                $this->db->where('branch_id', $branch_id);
				                $branchs = $this->db->get('whatsapp_agent')->result();
				                if (!empty($branchs)) {
				               		foreach($branchs as $row) {
				            ?>
				            <tr>
				                <td><?php echo $count++; ?></td>
				                <td><img src="<?php echo get_image_url('whatsapp_agent', $row->agent_image); ?>" height="50"></td>
				                <td><?php echo $row->agent_name;?></td>
				                <td><?php echo $row->agent_designation;?></td>
				                <td><?php echo $row->whataspp_number;?></td>
				                <td><?php echo date("h:i A", strtotime($row->start_time));?></td>
				                <td><?php echo date("h:i A", strtotime($row->end_time));?></td>
				                <td><?php echo $row->weekend == 0 ? translate('all_days') : ucfirst($row->weekend);?></td>
								<td>
								<?php if (get_permission('whatsapp_config', 'is_edit')): ?>
									<!-- update link -->
									<a class="btn btn-default btn-circle icon" href="javascript:void(0);" onclick="ajaxModal('<?php echo base_url('school_settings/getWhatsappDetails/' . $row->id) ?>')">
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
									</a>
								<?php endif; if (get_permission('whatsapp_config', 'is_delete')): ?>
									<!-- delete link -->
									<?php echo btn_delete('school_settings/whatsappAgent_delete/' . $row->id); ?>
								<?php endif; ?>
								</td>
				            </tr>
				            <?php } } else {
				            	echo '<tr><td colspan="9"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
				            } ?>
				        </tbody>
				    </table>
				</div>
            </div>
        </section> 
    </div>
</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('agent'); ?>
			</h4>
		</header>
		<?php echo form_open_multipart('school_settings/saveWhatsappAgent' . $url, array('class' => 'frm-submit-data')); ?>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label"><?php echo translate('name'); ?> <span class="required">*</span></label>
					<input type="text" name="name" class="form-control" value="" autocomplete="off" />
					<span class="error"></span>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo translate('designation'); ?> <span class="required">*</span></label>
					<input type="text" class="form-control" value="" autocomplete="off" name="designation"/>
					<span class="error"></span>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo translate('whataspp_number'); ?> <span class="required">*</span></label>
					<input type="text" class="form-control" value="" placeholder="Enter your WhatsApp number with country code." autocomplete="off" name="whataspp_number"/>
					<span class="error"></span>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo translate('time_slot'); ?> <span class="required">*</span></label>
					<div class="row">
						<div class="col-xs-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="far fa-clock"></i></span>
								<input type="text" name="start_time" data-plugin-timepicker class="form-control" value="" />
							</div>
						</div>
						<div class="col-xs-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="far fa-clock"></i></span>
								<input type="text" name="end_time" data-plugin-timepicker class="form-control" value="" />
							</div>
						</div>
					</div>
					<span class="error"></span>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo translate('weekend'); ?> <span class="required">*</span></label>
					<?php
						$arrayDay = array(
							"0" => translate('no'),
							"sunday" => "Sunday",
							"monday" => "Monday",
							"tuesday" => "Tuesday",
							"wednesday" => "Wednesday",
							"thursday" => "Thursday",
							"friday" => "Friday",
							"saturday" => "Saturday"
						);
						echo form_dropdown("weekend", $arrayDay, "", "class='form-control' required
						data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
					?>
					<span class="error"></span>
				</div>
				<div class="form-group">
					<label for="input-file-now"><?=translate('photo')?></label>
					<input type="file" name="user_photo" class="dropify" />
					<span class="error"><?=form_error('user_photo')?></span>
				</div>
				<div class="form-group ml-xs mb-lg">
					<label class="control-label"><?=translate('active')?></label>
                    <div class="material-switch mt-xs">
                        <input class="switch_menu" id="agent_active" name="agent_active" type="checkbox" checked />
                        <label for="agent_active" class="label-primary"></label>
                    </div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-default mr-xs" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('save'); ?>
						</button>
						<button class="btn btn-default modal-dismiss"><?php echo translate('cancel'); ?></button>
					</div>
				</div>
			</footer>
		<?php echo form_close(); ?>
	</section>
</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="editModal">
	<section class="panel" id='quick_view'></section>
</div>