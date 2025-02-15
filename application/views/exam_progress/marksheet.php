<?php $widget = (is_superadmin_loggedin() ? 2 : 3); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open('exam_progress/marksheet', array('class' => 'validate')); ?>
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('select_ground')?></h4>
			</header>
			<div class="panel-body">
				<div class="row mb-sm">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branch_id'
								data-plugin-selectTwo data-width='100%'");
							?>
							<span class="error"><?php echo form_error('branch_id'); ?></span>
						</div>
					</div>
				<?php endif; ?>
					<div class="col-md-<?=$widget?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('academic_year')?> <span class="required">*</span></label>
							<?php
								$arrayYear = array("" => translate('select'));
								$years = $this->db->get('schoolyear')->result();
								foreach ($years as $year){
									$arrayYear[$year->id] = $year->school_year;
								}
								echo form_dropdown("session_id", $arrayYear, set_value('session_id', get_session_id()), "class='form-control'
								data-plugin-selectTwo data-width='100%'");
							?>
							<span class="error"><?php echo form_error('session_id'); ?></span>
						</div>
					</div>
					<div class="col-md-<?=$widget?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('exam')?> <span class="required">*</span></label>
							<?php
								if(!empty($branch_id)){
									$this->db->order_by('id', 'asc');
									$exams = $this->db->get_where('exam', array('branch_id' => $branch_id,'session_id' => get_session_id()))->result();
									foreach ($exams as $row){
										$arrayExam[$row->id] = $this->application_model->exam_name_by_id($row->id);
									}
								} else {
									$arrayExam = array("" => translate('select'));
								}
								echo form_dropdown("exam_id[]", $arrayExam, set_value('exam_id'), "class='selectpicker' id='exam_id' multiple");
							?>
							<span class="error"><?php echo form_error('exam_id[]'); ?></span>
						</div>
					</div>
					<div class="col-md-3 mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('class')?> <span class="required">*</span></label>
							<?php
								$arrayClass = $this->app_lib->getClass($branch_id);
								echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' id='class_id' onchange='getSectionByClass(this.value,0)'
								data-plugin-selectTwo data-width='100%' ");
							?>
							<span class="error"><?php echo form_error('class_id'); ?></span>
						</div>
					</div>
					<div class="col-md-<?=$widget?> mb-sm">
						<div class="form-group">
							<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
							<?php
								$arraySection = $this->app_lib->getSections(set_value('class_id'), false);
								echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' id='section_id'
								data-plugin-selectTwo data-width='100%' ");
							?>
							<span class="error"><?php echo form_error('section_id'); ?></span>
						</div>
					</div>
					<div class="col-md-3 mt-xs">
						<div class="form-group">
							<label class="control-label"><?=translate('marksheet') . " " . translate('template'); ?> <span class="required">*</span></label>
							<?php
								$arraySection = $this->app_lib->getSelectByBranch('marksheet_template', $branch_id);
								echo form_dropdown("template_id", $arraySection, set_value('template_id'), "class='form-control' id='templateID'
								data-plugin-selectTwo data-width='100%' ");
							?>
							<span class="error"><?php echo form_error('template_id'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="submit" value="search" class="btn btn-default btn-block"><svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('filter')?></button>
					</div>
				</div>
			</div>
			<?php echo form_close();?>
		</section>

		<?php if (isset($student)): ?>
			<section class="panel appear-animation" data-appear-animation="<?php echo $global_config['animations']?>" data-appear-animation-delay="100">
				<?php echo form_open('exam_progress/reportCardPdf', array('class' => 'printIn')); ?>
				<?php echo form_hidden('exam_id', $examIDArr);?>
				<?php echo form_hidden('class_id', set_value('class_id'));?>
				<?php echo form_hidden('section_id', set_value('section_id'));?>
				<?php echo form_hidden('session_id', set_value('session_id'));?>
				<?php echo form_hidden('template_id', set_value('template_id'));?>
				<?php echo form_hidden('branch_id', set_value('branch_id'));?>
				<header class="panel-heading">
					<h4 class="panel-title">
						<i class="fas fa-users"></i> <?=translate('student_list')?>
					</h4>
					<div class="panel-btn">
						<button type="submit" class="btn btn-default btn-circle" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" >
							<i class="fa-solid fa-file-pdf"></i> <?=translate('download')?> PDF
						</button>
						<button type="button" id="downloadPDF"class="btn btn-default btn-circle" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?=translate('print')?>
						</button>
					</div>
				</header>
				<div class="panel-body">
					<div class="row mb-lg">
						<div class="col-md-3">
							<div class="form-group mt-xs">
								<label class="control-label"><?=translate('print_date')?></label>
								<input type="text" name="print_date" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' class="form-control" autocomplete="off" value="<?=date('Y-m-d')?>">
							</div>
						</div>
					</div>
					<table class="table table-bordered table-hover table-condensed mb-none mt-sm mb-md" id="marksheet">
						<thead>
							<tr>
								<th><?=translate('sl')?></th>
								<th> 
									<div class="checkbox-replace">
										<label class="i-checks" data-toggle="tooltip" data-original-title="Print Show / Hidden">
											<input type="checkbox" name="select-all" id="selectAllchkbox"> <i></i>
										</label>
									</div>
								</th>
								<th><?=translate('student_name')?></th>
								<th><?=translate('category')?></th>
								<th><?=translate('register_no')?></th>
								<th><?=translate('roll')?></th>
								<th><?=translate('mobile_no')?></th>
								<th><?=translate('teacher') . " " . translate('remarks')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							if (count($student)){
							foreach ($student as $row):
								?>
							<tr>
								<td><?=$count++?></td>
								<td class="hidden-print checked-area hidden-print" width="30">
									<div class="checkbox-replace">
										<label class="i-checks"><input type="checkbox" name="student_id[]" value="<?=$row['id']?>"><i></i></label>
									</div>
								</td>
								<td><?=$row['first_name'] . " " . $row['last_name']?></td>
								<td><?=$row['category']?></td>
								<td><?=$row['register_no']?></td>
								<td><?=$row['roll']?></td>
								<td><?=$row['mobileno']?></td>
								<td class="action">
									<div class="form-group">
										<input type="text" class="form-control rt" autocomplete="off" name="remarks[<?=$row['id']?>]" value="" />
										<span class="error"></span>
									</div>
								</td>
								<td>
									<button type="button" data-loading-text="<i class='fas fa-spinner fa-spin'></i>" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo translate('email') . " " . translate('marksheet') ?>" class="btn btn-default icon btn-circle" onclick="pdf_sendByemail('<?=$row['id']?>', '<?=$row['enrollID']?>', this)"><i class="fa-solid fa-envelope"></i></button>
								</td>
							</tr>
						<?php 
							endforeach; 
						}else{
							echo '<tr><td colspan="8"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
						}
						?>
						</tbody>
					</table>
				</div>
				<?php echo form_close(); ?>
			</section>
		<?php endif; ?>
	</div>
</div>

<script type="text/javascript">
	var exam_id = $('#exam_id').val();
	var class_id = "<?=set_value('class_id')?>";
	var section_id = "<?=set_value('section_id')?>";
	var session_id = "<?=set_value('session_id')?>";
	var branch_id = "<?=$branch_id?>";
	var template_id = "<?=set_value('template_id')?>";

	$(document).ready(function () {
		$('.selectpicker').selectpicker({
	        noneSelectedText : 'Select'
	    });

		// DataTable Config
		$('#marksheet').DataTable({
			"dom": '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"t>p',
			"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
			"pageLength": -1,
			"columnDefs": [
				{targets: [1,-1], orderable: false}
			],
		});
	
		$('#branch_id').on("change", function() {
			var branchID = $(this).val();
			getClassByBranch(branchID);
		    $.ajax({
		        url: base_url + 'exam_progress/getExamByBranch',
		        type: 'POST',
		        data: {
		            branch_id: branchID
		        },
		        success: function (data) {
					$('#exam_id').html(data);
					$('#exam_id').selectpicker('refresh');
		        }
		    });

			$.ajax({
		        url: base_url + 'ajax/getDataByBranch',
		        type: 'POST',
		        data: {
		            table: 'marksheet_template',
		            branch_id: branchID
		        },
		        success: function (data) {
					$('#templateID').html(data);
		        }
		    });
		});
	});

   $(document).on('click','#downloadPDF',function(){
		btn = $(this);
		var arrayData = [];
		var remarks = {};
		$('form.printIn input[name="student_id[]"]').each(function() {
			if($(this).is(':checked')) {
				studentID = $(this).val();
	            arrayData.push(studentID);
				remark = $('form.printIn input[name="remarks[' + studentID + ']"]').val();
				remarks[studentID] = remark;
        	}
		});
        if (arrayData.length === 0) {
            popupMsg("<?php echo translate('no_row_are_selected') ?>", "error");
            btn.button('reset');
        } else {
            $.ajax({
                url: "<?php echo base_url('exam_progress/reportCardPrint') ?>",
                type: "POST",
                data: {
                	'exam_id[]' : exam_id,
                	'class_id' : class_id,
                	'section_id' : section_id,
                	'session_id' : session_id,
                	'branch_id' : branch_id,
                	'template_id' : template_id,
                	'student_id[]' : arrayData,
                	'remarks' : remarks,
                },
                dataType: 'html',
                beforeSend: function () {
                    btn.button('loading');
                },
                success: function (data) {
                	fn_printElem(data, true);
                },
                error: function () {
	                btn.button('reset');
	                alert("An error occured, please try again");
                },
	            complete: function () {
	                btn.button('reset');
	            }
            });
        }
    });

    $('form.printIn').on('submit', function(e) {
        e.preventDefault();
        var btn = $(this).find('[type="submit"]');
        var countRow = $(this).find('input[name="student_id[]"]:checked').length;
        if (countRow > 0) {
	        var exam_name = $('#exam_id').find('option:selected').text();
	        var class_name = $('#class_id').find('option:selected').text();
	        var section_name = $('#section_id').find('option:selected').text();
	        var fileName = exam_name + '-' + class_name + ' (' + section_name + ")-Marksheet.pdf";
	        $.ajax({
	            url: $(this).attr('action'),
	            type: "POST",
	            data: $(this).serialize(),
	            cache: false,
				xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 2) {
                            if (xhr.status == 200) {
                                xhr.responseType = "blob";
                            } else {
                                xhr.responseType = "text";
                            }
                        }
                    };
                    return xhr;
				},
	            beforeSend: function () {
	                btn.button('loading');
	            },
	            success: function (data, jqXHR, response) {
					var blob = new Blob([data], {type: 'application/pdf'});
					var link = document.createElement('a');
					link.href = window.URL.createObjectURL(blob);
					link.download = fileName;
					document.body.appendChild(link);
					link.click();
					document.body.removeChild(link);
					btn.button('reset');
	            },
	            error: function () {
	                btn.button('reset');
	                alert("An error occured, please try again");
	            },
	            complete: function () {
	                btn.button('reset');
	            }
	        });
    	} else {
    		popupMsg("<?php echo translate('no_row_are_selected') ?>", "error");
    	}
    });

   function pdf_sendByemail(studentID = '', enrollID = '', ele) 
   {
   		var btn = $(ele);
		var remarks = {};
		if (studentID !== '') {
			remarks[studentID] = $('form.printIn input[name="remarks[' + studentID + ']"]').val();
	        $.ajax({
	            url: "<?php echo base_url('exam_progress/pdf_sendByemail') ?>",
	            type: "POST",
	            data: {
	            	'exam_id[]' : exam_id,
	            	'class_id' : class_id,
	            	'section_id' : section_id,
	            	'session_id' : session_id,
	            	'branch_id' : branch_id,
	            	'template_id' : template_id,
	            	'student_id' : studentID,
	            	'enrollID' : enrollID,
	            	'remarks' : remarks,
	            },
	            dataType: 'JSON',
	            beforeSend: function () {
	                btn.button('loading');
	            },
	            success: function (data) {
	            	popupMsg(data.message, data.status);
	            },
	            error: function () {
	                btn.button('reset');
	                alert("An error occured, please try again");
	            },
	            complete: function () {
	                btn.button('reset');
	            }
	        });
		}
	}  
</script>