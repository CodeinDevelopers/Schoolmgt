<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">Select Class</h4>
			</header>
			<?php echo form_open($this->uri->uri_string(), array('class' => 'validate')); ?>
			<div class="panel-body">
				<div class="row mb-sm">
					<?php if (is_superadmin_loggedin()): ?>
					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' required onchange='getClassByBranch(this.value)'
								data-width='100%' data-plugin-selectTwo data-minimum-results-for-search='Infinity'");
							?>
						</div>
					</div>
					<?php endif; ?>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								required data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id'));
								echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id' required 
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
					<div class="col-md-<?php echo $widget; ?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('day')?> <span class="required">*</span></label>
							<?php
								$arrayDay = array(
									"sunday" => "Sunday",
									"monday" => "Monday",
									"tuesday" => "Tuesday",
									"wednesday" => "Wednesday",
									"thursday" => "Thursday",
									"friday" => "Friday",
									"saturday" => "Saturday"
								);
								echo form_dropdown("day", $arrayDay, set_value('day'), "class='form-control' required
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
							?>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						 <button type="submit" class="btn btn btn-default btn-block"> <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
		
		<?php if(!empty($branch_id) && !empty($class_id) && !empty($day)):?>
		<section class="panel appear-animation" data-appear-animation="<?php echo $global_config['animations']?>" data-appear-animation-delay="100">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="far fa-clock"></i> <?=translate('add') . " " . translate('schedule')?></h4>
			</header>
			<div class="panel-body">
				<section class="panel pg-fw">
				    <div class="panel-body">
				    	<form action="#" method="POST" id="quickSchedule">
				        <h5 class="chart-title mb-md"><?=translate('set_parameters_to_quickly_create_schedule')?></h5>
						<div class="table-responsive">
							<table class="table table-bordered table-condensed">
								<thead>
									<th><?=translate('starting_date')?> <span class="required">*</span></th>
									<th><?=translate('duration')?> (<?=translate('minutes')?>) <span class="required">*</span></th>
									<th><?=translate('interval')?> (<?=translate('minutes')?>) <span class="required">*</span></th>
									<th><?=translate('class_room')?> <span class="required">*</span></th>
								</thead>
								<tbody>
									<td class="min-w-sm">
										<div class="form-group mb-none">
											<div class="input-group">
												<span class="input-group-addon"><i class="far fa-clock"></i></span>
												<input type="text" class='form-control' name="q_starting_time" id="qStartingTime" required data-plugin-timepicker class="form-control" autocomplete="off" data-plugin-options='{ "minuteStep": 5 }' value="">
											</div>
										</div>
									</td>
									<td class="min-w-sm">
										<div class="form-group mb-none">
											<div class="input-group">
												<span class="input-group-addon"><i class="fas fa-stopwatch"></i></span>
												<input type="number" class='form-control' name="duration" id="qDuration" min="1" required autocomplete="off" value="">
											</div>
										</div>
									</td>
									<td class="min-w-sm">
										<div class="form-group mb-none">
											<div class="input-group">
												<span class="input-group-addon"><i class="fas fa-stopwatch"></i></span>
												<input type="number" class='form-control' name="interval" id="qInterval" required autocomplete="off" value="0">
											</div>
										</div>
									</td>
									<td class="min-w-sm">
										<div class="form-group mb-none">
											<input type="text" class='form-control' name="class_room" id="qclass_room" autocomplete="off" value="">
										</div>
									</td>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button class="btn btn-default btn-block" type="submit"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('apply')?></button>
							</div>
						</div>
						</form>
					</div>
				</section>
				<?php echo form_open("timetable/class_save", array('id' => 'scheduleForm')); ?>
				<div class="table-responsive">
					<table class="table table-bordered table-condensed mt-md">
						<thead>
							<th> - BREAK</th>
							<th><?=translate('subject')?> <span class="required">*</span></th>
							<th><?=translate('teacher')?> <span class="required">*</span></th>
							<th><?=translate('starting_time')?> <span class="required">*</span></th>
							<th><?=translate('ending_time')?> <span class="required">*</span></th>
							<th><?=translate('class_room')?></th>
						</thead>
						<tbody id="timetable_entry_append">
							<?php 
							if (!empty($exist_data)) {
							foreach ($exist_data as $key => $value) { ?>
								<?php echo form_hidden(array('i[]' => $value['id'])); ?>
							<tr class="iadd">
								<?php echo form_hidden(array("old_id[$key]" => $value['id'])); ?>
								<td class="center" width="90">
									<div class="checkbox-replace"> 
										<label class="i-checks">
											<input type="checkbox" name="timetable[<?php echo $key ?>][break]" <?php echo ($value['break']) ? 'checked' : ''  ?>><i></i>
										</label>
									</div>
								</td>
								<td width="20%">
									<div class="form-group">
										<?php
										$selDis = ($value['break']) ? ' disabled ' : '';
											$arraySubject = array("" => translate('select'));
											$subjectAssign = $this->db->get_where('subject_assign', array(
												'class_id' => $class_id,
												'section_id' => $section_id,
												'session_id' => get_session_id(),
												'branch_id' => $branch_id
											))->result();
											foreach ($subjectAssign as $assign){
												$arraySubject[$assign->subject_id] = get_type_name_by_id('subject', $assign->subject_id);
											}
											echo form_dropdown("timetable[$key][subject]", $arraySubject, $value['subject_id'], "class='form-control' $selDis
											data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
										?>
										<span class="error"></span>
									</div>
								</td>
								<td width="20%">
									<div class="form-group">
										<?php
											$arrayTeacher = $this->app_lib->getStaffList($branch_id, 3);
											echo form_dropdown("timetable[$key][teacher]", $arrayTeacher, $value['teacher_id'], "class='form-control' $selDis
											data-plugin-selectTwo data-width='100%' ");
										?>
										<span class="error"></span>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="far fa-clock"></i></span>
											<input type="text" name="timetable[<?php echo $key ?>][time_start]" data-plugin-timepicker class="form-control starting-time" value="<?php echo $value['time_start'] ?>" />
										</div>
										<span class="error"></span>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="far fa-clock"></i></span>
											<input type="text" name="timetable[<?php echo $key ?>][time_end]" data-plugin-timepicker class="form-control ending_time" value="<?php echo $value['time_end'] ?>" />
										</div>
										<span class="error"></span>
									</div>
								</td>
								<td class="timet-td">
									<input type="text" class="form-control class_room" name="timetable[<?php echo $key ?>][class_room]" value="<?php echo $value['class_room'] ?>">
									<button type="button" class="btn btn-danger removeTR"><i class="fas fa-times"></i> </button>
								</td>
							</tr>
						<?php } } else { ?>
							<tr class="iadd">
								<?php echo form_hidden(array('old_id[]' => 0)); ?>
								<td class="center" width="90">
									<div class="checkbox-replace"> 
										<label class="i-checks">
											<input type="checkbox" name="timetable[0][break]"><i></i>
										</label>
									</div>
								</td>
								<td width="20%">
									<div class="form-group">
										<?php
											$arraySubject = array("" => translate('select'));
											$subjectAssign = $this->db->get_where('subject_assign', array(
												'class_id' => $class_id,
												'section_id' => $section_id,
												'session_id' => get_session_id(),
												'branch_id' => $branch_id
											))->result();
											foreach ($subjectAssign as $assign){
												$arraySubject[$assign->subject_id] = get_type_name_by_id('subject', $assign->subject_id);
											}
											echo form_dropdown("timetable[0][subject]", $arraySubject, "", "class='form-control' data-plugin-selectTwo
											data-width='100%' data-minimum-results-for-search='Infinity' ");
										?>
										<span class="error"></span>
									</div>
								</td>
								<td width="20%">
									<div class="form-group">
										<?php
											$arrayTeacher = $this->app_lib->getStaffList($branch_id, 3);
											echo form_dropdown("timetable[0][teacher]", $arrayTeacher, "", "class='form-control'
											data-plugin-selectTwo data-width='100%' ");
										?>
										<span class="error"></span>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="far fa-clock"></i></span>
											<input type="text" name="timetable[0][time_start]" data-plugin-timepicker data-plugin-options class="form-control starting-time" />
										</div>
										<span class="error"></span>
									</div>
								</td>
								<td>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="far fa-clock"></i></span>
											<input type="text" name="timetable[0][time_end]" data-plugin-timepicker class="form-control ending_time" />
										</div>
										<span class="error"></span>
									</div>
								</td>
								<td>
									<input type="text" class="form-control class_room" name="timetable[0][class_room]" value="">
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<input type="hidden" name="class_id" id="classID" value="<?=$class_id?>" />
				<input type="hidden" name="section_id" id="sectionID" value="<?=$section_id?>" />
				<input type="hidden" name="day" id="day" value="<?=$day?>" />
				<input type="hidden" name="branch_id" id="branchID" value="<?=$branch_id?>" />
				<button type="button" class="btn btn-default mt-xs mb-md" onclick="append_timetable_entry()">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('add_more')?>
				</button>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						 <button type="submit" id="scheduleBtn" class="btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
						 	<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
						 </button>
					</div>
				</div>
			</footer>
			<?php echo form_close(); ?>
		</section>
		
		<script type="text/javascript">
			var lenght_div = <?php echo (empty($exist_data)) ? 1 : count($exist_data); ?>;
			$(document).on('change', "#timetable_entry_append input[type='checkbox']", function() {
				$(this).closest('tr').find('select').prop('disabled', this.checked);
			})
			
			function append_timetable_entry(){
				$("#timetable_entry_append").append(getDynamicInput(lenght_div));
				lenght_div++;
				
				$(".selectTwo").each(function() {
					var $this = $(this);
					$this.themePluginSelect2({});
				});
				$(".timepicker").each(function() {
					var $this = $(this);
					$this.themePluginTimePicker({});
				});
			}
			
			function getDynamicInput(value) {
				var row = "";
				row += '<tr class="iadd">';
				row += '<input type="hidden" name="old_id[' + value + ']" class="form-control" value="0" >';
				row += '<td class="center" width="90"><div class="checkbox-replace">';
				row += '<label class="i-checks"><input type="checkbox" name="timetable[' + value + '][break]" id="' + value + '"><i></i>';
				row += '</label></div></td>';
				row += '<td width="20%"><div class="form-group">';
				row += '<select id="subject_id_' + value + '" name="timetable[' + value + '][subject]" class="form-control selectTwo" data-width="100%">';
				row += '<option value=""><?php echo translate('select'); ?></option>';
<?php foreach ($subjectAssign as $assign): ?>
				row += '<option value="<?php echo $assign->subject_id ?>"><?php echo html_escape(get_type_name_by_id('subject', $assign->subject_id)) ?></option>';
<?php endforeach; ?>
				row += '</select>';
				row += '<span class="error"></span></div></td>';
				row += '<td width="20%"><div class="form-group">';
				row += '<select  id="teacher_id_' + value + '" name="timetable[' + value + '][teacher]" class="form-control selectTwo" data-width="100%">';
<?php foreach ($arrayTeacher as $key => $value): ?>
				row += '<option value="<?php echo $key ?>"><?php echo html_escape($value) ?></option>';
<?php endforeach; ?>
				row += '</select>';
				row += '<span class="error"></span></div></td>';
				row += '<td><div class="form-group">';
				row += '<div class="input-group">';
				row += '<span class="input-group-addon"><i class="far fa-clock"></i></span>';
				row += '<input type="text" name="timetable[' + value + '][time_start]" class="form-control timepicker starting-time" >';
				row += '</div><span class="error"></span></div></td>';
				row += '<td><div class="form-group">';
				row += '<div class="input-group">';
				row += '<span class="input-group-addon"><i class="far fa-clock"></i></span>';
				row += '<input type="text" name="timetable[' + value + '][time_end]" class="form-control timepicker ending_time" >';
				row += '</div><span class="error"></span></div></td>';
				row += '<td class="timet-td">';
				row += '<input type="text" class="form-control class_room" name="timetable[' + value + '][class_room]" value="">';
				row += '<button type="button" class="btn btn-danger removeTR"><i class="fas fa-times"></i> </button>';
				row += '</td>';
				row += '</tr>';
				return row;
			}
		</script>
		<?php endif;?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$("#timetable_entry_append").on('click', '.removeTR', function () {
			$(this).parent().parent().remove();
		});

		$("form#quickSchedule").validate({
			highlight: function( label ) {
				$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function( label ) {
				$(label).closest('.form-group').removeClass('has-error');
				label.remove();
			},
			errorPlacement: function( error, element ) {
				var placement = element.closest('.input-group');
				if (!placement.get(0)) {
					placement = element;
				}
				if (error.text() !== '') {
					if(element.parent('.checkbox, .radio').length || element.parent('.input-group').length) {
						placement.after(error);
					} else {
						var placement = element.closest('div');
						placement.append(error);
					}
				}
			},
			submitHandler: function(form) {
				let start_time= $('#qStartingTime').val();
				let duration= $('#qDuration').val();
				let interval= $('#qInterval').val();
				let class_room= $('#qclass_room').val();

				$('#scheduleForm tbody  > tr').each(function() {
					var newTime = moment(start_time, "hh:mm A").add(duration, 'minutes').format('hh:mm A');
					$(this).find(".starting-time").timepicker('setTime', start_time);
					$(this).find(".ending_time").timepicker('setTime', newTime);
 
					$(this).find(".class_room").val(class_room);    
					start_time = moment(newTime, "hh:mm A").add(interval, 'minutes').format('hh:mm A');
				});
			}
		});

        $("form#scheduleForm").on('submit', function(e){
            e.preventDefault();
            var $this = $(this);
            var btn = $("#scheduleBtn");
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    btn.button('loading');
                },
                success: function (data) {
                    $('.error').html("");
                    if (data.status == "fail") {
                        $.each(data.error, function (index, value) {
                            $this.find("[name='" + index + "']").parents('.form-group').find('.error').html(value);
                        });
                        btn.button('reset');
                    } else {
                        swal({
                            toast: true,
                            position: 'top-end',
                            type: 'success',
                            title: data.message,
                            confirmButtonClass: 'btn btn-default',
                            buttonsStyling: false,
                            timer: 8000
                        });
                    }
                },
                complete: function (data) {
                    btn.button('reset'); 
                },
                error: function () {
                    btn.button('reset');
                }
            });
        });
	});
</script>