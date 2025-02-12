<?php 
$arraySession = array("" => translate('select'));
$years = $this->db->get('schoolyear')->result();
foreach ($years as $year){
	$arraySession[$year->id] = $year->school_year;
}
?>
<div class="row">
	<div class="col-md-6">
		<section class="panel pg-fw">
		    <div class="panel-body">
		        <h5 class="chart-title mb-xs"><i class="fa-solid fa-stopwatch"></i> <?php echo translate('events') . " " .  translate('list')?></h5>
		        <div class="panel-btn mr-sm mt-xs">
					<button onclick="addAlumni('', this)" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-default btn-circle"> <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('add') . " " .  translate('events')?></button>
				</div>
		        <div class="mt-lg">
					<table class="table table-bordered table-hover mb-none table_default">
						<thead>
							<tr>
								<th>#</th>
								<th><?=translate('title')?></th>
								<th><?=translate('photo')?></th>
								<th><?=translate('date')?></th>
								<th><?=translate('audience')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							if (!is_superadmin_loggedin()) {
								$this->db->where('branch_id', get_loggedin_branch_id());
							}
							$this->db->order_by('id', 'asc');
							$events = $this->db->get('alumni_events')->result();
							foreach ($events as $event):
							?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo $event->title; ?></td>
								<td class="center"><img src="<?php echo get_image_url('alumni_events', $event->photo); ?>" height="60" /></td>
								<td>
									<strong><?php echo translate('date_of_start') ?> :</strong> <?php echo _d($event->from_date);?> </br>
									<strong><?php echo translate('date_of_end') ?> :</strong> <?php echo _d($event->to_date);?> </br>
								</td>
								<td><?php
										$auditions = array(
											"1" => translate("everybody"),
											"2" => translate("class"),
											"3" => translate("section"),
										);
										$audition = $auditions[$event->audience];
										echo "<strong>" . translate($audition) . "</strong>";
										if($event->audience != 1){
											if ($event->audience == 2) {
												$selecteds = json_decode($event->selected_list); 
												foreach ($selecteds as $selected) {
													echo "<br> - " . get_type_name_by_id('class', $selected) ;
												}
											} 
											if ($event->audience == 3) {
												$selecteds = json_decode($event->selected_list); 
												foreach ($selecteds as $selected) {
													$selected = explode('-', $selected);
													echo "<br> - " . get_type_name_by_id('class', $selected[0]) . " (" . get_type_name_by_id('section', $selected[1])  . ')' ;
												}
											}
										}
									?>
									<?php if (!empty($event->session_id)) { ?>
									</br><strong><?php echo translate('passing_session') ?> :</strong> <?php echo $arraySession[$event->session_id];?>
									<?php } ?>
								</td>
								<td class="action">
									<!-- view modal link -->
									<button onclick="viewEventDetails('<?=$event->id?>',this)" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" class="btn btn-circle btn-default icon"> <i class="far fa-eye"></i></button>
								<?php if (get_permission('alumni_events', 'is_edit')) { ?>
									<!-- edit link -->
									<button onclick="addAlumni('<?php echo $event->id ?>', this)" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" class="btn btn-circle btn-default icon"> <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button>
								<?php } ?>
								<?php if (get_permission('alumni_events', 'is_delete')) { ?>
									<!-- deletion link -->
									<?php echo btn_delete('alumni/event_delete/'.$event->id);?>
								<?php } ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
		        </div>
		    </div>
		</section>
	</div>
	<div class="col-md-6">
		<section class="panel">
			<div class="panel-body">
				<div id="event_calendar"></div>
			</div>
		</section>
	</div>
</div>

<div class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide" id="alumniEventModal">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="fa-solid fa-person-chalkboard"></i> <?=translate('alumni') . " " . translate('event')?>
			</h4>
		</header>
		<?php echo form_open_multipart('alumni/saveEvents', array('class' => 'frm-submit-data'));?>
		<div class="panel-body">
			<input type="hidden" name="id" value="" id="eventID">
			<input type="hidden" name="old_image" value="" id="eventOld_image">
			<input type="hidden" name="selected_list" value="" id="selectedList">
			<div class="row">
<?php if (is_superadmin_loggedin()): ?>
				<div class="col-md-6 mb-sm mt-md">
					<div class="form-group">
						<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
						<?php
							$arrayBranch = $this->app_lib->getSelectList('branch');
							echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' data-width='100%' id='eventBranchID'
							data-plugin-selectTwo id='branch_id'");
						?>
						<span class="error"></span>
					</div>
				</div>
<?php endif; ?>
				<div class="col-md-<?php echo is_superadmin_loggedin() ? 6 : 12; ?> mb-sm mt-md">
					<div class="form-group">
						<label class="control-label"><?php echo translate('events') . " " . translate('title'); ?> <span class="required">*</span></label>
						<input type="text" class="form-control" value="" name="event_title" id="eventTitle" autocomplete="off" />
						<span class="error"></span>
					</div>
				</div>
			</div>
			<div class="form-group" id='audienceDiv'>
				<label class="control-label"><?=translate('audience')?> <span class="required">*</span></label>
				<?php
					$arrayaudience = array(
						"" => translate('select'),
						"1" => translate('everybody'),
						"2" => translate('selected_class'),
						"3" => translate('selected_section'),
					);
					echo form_dropdown("audience", $arrayaudience, set_value('audience'), "class='form-control' id='eventAudience'
					data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
				?>
				<span class="error"></span>
			</div>

			<div class="row" id="selected_user" style="display: none;">
				<div class="col-md-6 mb-sm">
					<div class="form-group">
						<label class="control-label" id="selected_label"> <?=translate('audience')?> <span class="required">*</span> </label>
						<?php
							$placeholder = '{"placeholder": "' . translate('select') . '"}';
							echo form_dropdown("selected_audience[]", [], set_value('selected_audience'), "class='form-control' data-plugin-selectTwo multiple
							data-plugin-options='$placeholder' data-plugin-selectTwo data-width='100%' id='selected_audience' ");
						?>
						<span class="error"></span>
					</div>
				</div>
				<div class="col-md-6 mb-sm">
					<div class="form-group">
						<label class="control-label"> <?=translate('passing_session')?> <span class="required">*</span> </label>
						<?php echo form_dropdown("passing_session", $arraySession, set_value('passing_session', get_session_id()), "class='form-control' id='sessionID' data-plugin-selectTwo data-width='100%'"); ?>
						<span class="error"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 mb-sm">
					<div class="form-group">
						<label class="control-label"><?php echo translate('date_of_start'); ?></label>
						<div class="input-group">
							<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
							<input type="text" class="form-control" name="from_date" id="eventFrom" value="<?=set_value('from')?>" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' />
						</div>
						<span class="error"></span>
					</div>
				</div>
				<div class="col-md-6 mb-sm">
					<div class="form-group">
						<label class="control-label"><?php echo translate('date_of_end'); ?></label>
						<div class="input-group">
							<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
							<input type="text" class="form-control" name="to_date" id="eventTo" value="<?=set_value('to_date')?>" data-plugin-datepicker />
						</div>
						<span class="error"></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label"><?php echo translate('note'); ?></label>
				<textarea name="note" rows="2" class="form-control" id="note" aria-required="true"></textarea>
				<span class="error"></span>
			</div>
			<div class="form-group">
				<label class="control-label"><?=translate('photo')?></label>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="input-append">
						<div class="uneditable-input">
							<i class="fas fa-file fileupload-exists"></i>
							<span class="fileupload-preview"></span>
						</div>
						<span class="btn btn-default btn-file">
							<span class="fileupload-exists">Change</span>
							<span class="fileupload-new">Select file</span>
							<input type="file" name="user_photo" />
						</span>
						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
					</div>
				</div>
				<span class="error"></span>
			</div>
			<div class="checkbox-replace mt-lg mb-md">
				<label class="i-checks">
					<input type="checkbox" name="send_sms"> <i></i> <?php echo translate('send_confirmation_sms') ?>
				</label>
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

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modalEventDetails">
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-btn">
				<button onclick="fn_printElem('printResult')" class="btn btn-default btn-circle icon" ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg></button>
			</div>
			<h4 class="panel-title"><i class="fas fa-info-circle"></i> <?=translate('event_details')?></h4>
		</header>
		<div class="panel-body">
			<div id="printResult" class="pt-sm pb-sm">
				<div class="table-responsive">						
					<table class="table table-bordered table-condensed text-dark tbr-top" id="ev_table"></table>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default modal-dismiss">
						<?=translate('close')?>
					</button>
				</div>
			</div>
		</footer>
	</section>
</div>

<script type="text/javascript">
	var selectedList = "";
	(function($) {
		$('#event_calendar').fullCalendar({
			header: {
			left: 'prev,next,today',
			center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			firstDay: 1,
			droppable: false,
			editable: true,
			timezone: 'UTC',
			lang: '<?php echo $language ?>',
			events: {
				url: "<?=base_url('alumni/getEventsList/')?>"
			},
			eventRender: function(event, element) {
				$(element).on("click", function() {
					viewEventDetails(event.id);
				});
			}
		});
	})(jQuery);

	function viewEventDetails(id) {
		$.ajax({
			url: base_url + "alumni/getEventDetails",
			type: 'POST',
			data: {
				event_id: id
			},
			success: function (data) {
				$('#ev_table').html(data);
				mfp_modal('#modalEventDetails');
			}
		});
	}

	function addAlumni(id, elem) {
	    var btn = $(elem);
	    $('.error').html("");
	    $("#selected_user").hide();
	    $.ajax({
	        url: base_url + 'alumni/eventDetails',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "json",
	        beforeSend: function () {
	            btn.button('loading');
	        },
	        success: function (data) {
	        	$('#eventID').val(data.id);
	        	$("#eventOld_image").val(data.photo);
	        	$('#eventBranchID').val(data.branch_id).trigger('change');
	        	$('#sessionID').val(data.session_id).trigger('change');
	        	$('#eventAudience').val(data.audience).trigger('change');
	        	$('#eventTitle').val(data.title);
	        	$('#eventFrom').val(data.from_date);
	        	$('#eventTo').val(data.to_date);
	        	$('#note').val(data.note);
	        	selectedList = data.selected_list;
	            mfp_modal('#alumniEventModal');
	        },
	        error: function (xhr) {
	            btn.button('reset');
	        },
	        complete: function () {
	            btn.button('reset');
	        }
	    });
	}

	$(document).ready(function () {
		$('#eventAudience').on('change', function() {
			selectedList = "";
			var audience = $(this).val();
			var branchID = ($('#eventBranchID').length ? $('#eventBranchID').val() : "");
			if(audience == "1" || audience == null)
			{
				$("#selected_user").hide("slow");
			}
			if(audience == "2") {
			    $.ajax({
			        url: base_url + 'ajax/getClassByBranch',
			        type: 'POST',
			        data:{
			        	branch_id: branchID
			        },
			        success: function (data){
			            $('#selected_audience').html(data);
			        }
			    });
				$("#selected_user").show('slow');
				$("#selected_label").html("<?=translate('class')?> <span class='required'>*</span>");
			}
			if(audience == "3"){
				$.ajax({
					url: "<?=base_url('event/getSectionByBranch')?>",
					type: 'POST',
					data: {
						branch_id: branchID
					},
					success: function (data) {
						$('#selected_audience').html(data);
					}
				});
				$("#selected_user").show('slow');
				$("#selected_label").html("<?=translate('section')?> <span class='required'>*</span>");
			}

			if (selectedList.length !== "") {
		        setTimeout(function() {
		            var JSONObject = JSON.parse(selectedList);
		            for (var i = 0, l = JSONObject.length; i < l; i++) {
		                $("#selected_audience option[value='" + JSONObject[i] + "']").prop("selected", true);
		            }
		            $('#selected_audience').trigger('change.select2');
		        }, 200);
			}
		});
	});
</script>