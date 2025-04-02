$.extend(theme.PluginDatePicker.defaults, {
	format: "yyyy-mm-dd",
	autoclose: true
});

(function($) {
	'use strict';

	// DataTable Config
	$('.table_default').DataTable({
		"dom": '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"t>p',
		"pageLength": 25,
		"ordering": false
	});

	var table = $('.table-export').DataTable({
		"dom": '<"row"<"col-sm-6 mb-xs"B><"col-sm-6"f>><"table-responsive"t>p',
		"lengthChange": false,
		"pageLength": 25,
		"columnDefs": [
			{targets: 'no-sort', orderable: false},
			{targets: [-1], orderable: false}
		],
		"buttons": [
			{
				extend: 'copyHtml5',
				text: '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17.5 14H19C20.1046 14 21 13.1046 21 12V5C21 3.89543 20.1046 3 19 3H12C10.8954 3 10 3.89543 10 5V6.5M5 10H12C13.1046 10 14 10.8954 14 12V19C14 20.1046 13.1046 21 12 21H5C3.89543 21 3 20.1046 3 19V12C3 10.8954 3.89543 10 5 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>',
				titleAttr: 'Copy',
				title: $('.export_title').html(),
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excelHtml5',
				text: '<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13.5 3.5H14V3.29289L13.8536 3.14645L13.5 3.5ZM10.5 0.5L10.8536 0.146447L10.7071 0H10.5V0.5ZM6.5 10.5H6V11H6.5V10.5ZM4.5 9.5H5V9.29289L4.85355 9.14645L4.5 9.5ZM2.5 7.5H2V7.70711L2.14645 7.85355L2.5 7.5ZM10.5 6.5V6H10V6.5H10.5ZM10.5 8.5H10V9H10.5V8.5ZM12.5 8.5H13V8H12.5V8.5ZM12.5 10.5V11H13V10.5H12.5ZM2.5 9.5L2.14645 9.14645L2 9.29289V9.5H2.5ZM4.5 7.5L4.85355 7.85355L5 7.70711V7.5H4.5ZM2 5V1.5H1V5H2ZM13 3.5V5H14V3.5H13ZM2.5 1H10.5V0H2.5V1ZM10.1464 0.853553L13.1464 3.85355L13.8536 3.14645L10.8536 0.146447L10.1464 0.853553ZM2 1.5C2 1.22386 2.22386 1 2.5 1V0C1.67157 0 1 0.671573 1 1.5H2ZM1 12V13.5H2V12H1ZM2.5 15H12.5V14H2.5V15ZM14 13.5V12H13V13.5H14ZM12.5 15C13.3284 15 14 14.3284 14 13.5H13C13 13.7761 12.7761 14 12.5 14V15ZM1 13.5C1 14.3284 1.67157 15 2.5 15V14C2.22386 14 2 13.7761 2 13.5H1ZM6 6V10.5H7V6H6ZM6.5 11H9V10H6.5V11ZM4 9.5V11H5V9.5H4ZM4.85355 9.14645L2.85355 7.14645L2.14645 7.85355L4.14645 9.85355L4.85355 9.14645ZM3 7.5V6H2V7.5H3ZM13 6H10.5V7H13V6ZM10 6.5V8.5H11V6.5H10ZM10.5 9H12.5V8H10.5V9ZM12 8.5V10.5H13V8.5H12ZM12.5 10H10V11H12.5V10ZM3 11V9.5H2V11H3ZM2.85355 9.85355L4.85355 7.85355L4.14645 7.14645L2.14645 9.14645L2.85355 9.85355ZM5 7.5V6H4V7.5H5Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'Excel',
				title: $('.export_title').html(),
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'csvHtml5',
				text: '<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13.5 3.5H14V3.29289L13.8536 3.14645L13.5 3.5ZM10.5 0.5L10.8536 0.146447L10.7071 0H10.5V0.5ZM6.5 6.5V6H6V6.5H6.5ZM6.5 8.5H6V9H6.5V8.5ZM8.5 8.5H9V8H8.5V8.5ZM8.5 10.5V11H9V10.5H8.5ZM10.5 9.5H10V9.70711L10.1464 9.85355L10.5 9.5ZM11.5 10.5L11.1464 10.8536L11.5 11.2071L11.8536 10.8536L11.5 10.5ZM12.5 9.5L12.8536 9.85355L13 9.70711V9.5H12.5ZM2.5 6.5V6H2V6.5H2.5ZM2.5 10.5H2V11H2.5V10.5ZM2 5V1.5H1V5H2ZM13 3.5V5H14V3.5H13ZM2.5 1H10.5V0H2.5V1ZM10.1464 0.853553L13.1464 3.85355L13.8536 3.14645L10.8536 0.146447L10.1464 0.853553ZM2 1.5C2 1.22386 2.22386 1 2.5 1V0C1.67157 0 1 0.671573 1 1.5H2ZM1 12V13.5H2V12H1ZM2.5 15H12.5V14H2.5V15ZM14 13.5V12H13V13.5H14ZM12.5 15C13.3284 15 14 14.3284 14 13.5H13C13 13.7761 12.7761 14 12.5 14V15ZM1 13.5C1 14.3284 1.67157 15 2.5 15V14C2.22386 14 2 13.7761 2 13.5H1ZM9 6H6.5V7H9V6ZM6 6.5V8.5H7V6.5H6ZM6.5 9H8.5V8H6.5V9ZM8 8.5V10.5H9V8.5H8ZM8.5 10H6V11H8.5V10ZM10 6V9.5H11V6H10ZM10.1464 9.85355L11.1464 10.8536L11.8536 10.1464L10.8536 9.14645L10.1464 9.85355ZM11.8536 10.8536L12.8536 9.85355L12.1464 9.14645L11.1464 10.1464L11.8536 10.8536ZM13 9.5V6H12V9.5H13ZM5 6H2.5V7H5V6ZM2 6.5V10.5H3V6.5H2ZM2.5 11H5V10H2.5V11Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'CSV',
				title: $('.export_title').html(),
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				text: '<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2.5 6.5V6H2V6.5H2.5ZM6.5 6.5V6H6V6.5H6.5ZM6.5 10.5H6V11H6.5V10.5ZM13.5 3.5H14V3.29289L13.8536 3.14645L13.5 3.5ZM10.5 0.5L10.8536 0.146447L10.7071 0H10.5V0.5ZM2.5 7H3.5V6H2.5V7ZM3 11V8.5H2V11H3ZM3 8.5V6.5H2V8.5H3ZM3.5 8H2.5V9H3.5V8ZM4 7.5C4 7.77614 3.77614 8 3.5 8V9C4.32843 9 5 8.32843 5 7.5H4ZM3.5 7C3.77614 7 4 7.22386 4 7.5H5C5 6.67157 4.32843 6 3.5 6V7ZM6 6.5V10.5H7V6.5H6ZM6.5 11H7.5V10H6.5V11ZM9 9.5V7.5H8V9.5H9ZM7.5 6H6.5V7H7.5V6ZM9 7.5C9 6.67157 8.32843 6 7.5 6V7C7.77614 7 8 7.22386 8 7.5H9ZM7.5 11C8.32843 11 9 10.3284 9 9.5H8C8 9.77614 7.77614 10 7.5 10V11ZM10 6V11H11V6H10ZM10.5 7H13V6H10.5V7ZM10.5 9H12V8H10.5V9ZM2 5V1.5H1V5H2ZM13 3.5V5H14V3.5H13ZM2.5 1H10.5V0H2.5V1ZM10.1464 0.853553L13.1464 3.85355L13.8536 3.14645L10.8536 0.146447L10.1464 0.853553ZM2 1.5C2 1.22386 2.22386 1 2.5 1V0C1.67157 0 1 0.671573 1 1.5H2ZM1 12V13.5H2V12H1ZM2.5 15H12.5V14H2.5V15ZM14 13.5V12H13V13.5H14ZM12.5 15C13.3284 15 14 14.3284 14 13.5H13C13 13.7761 12.7761 14 12.5 14V15ZM1 13.5C1 14.3284 1.67157 15 2.5 15V14C2.22386 14 2 13.7761 2 13.5H1Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'PDF',
				title: $('.export_title').html(),
				footer: true,
				customize: function ( win ) {
					win.styles.tableHeader.fontSize = 10;
					win.styles.tableFooter.fontSize = 10;
					win.styles.tableHeader.alignment = 'left';
				},
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'print',
				text: '<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.5 12.5H1.5C0.947715 12.5 0.5 12.0523 0.5 11.5V7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H13.5C14.0523 6.5 14.5 6.94772 14.5 7.5V11.5C14.5 12.0523 14.0523 12.5 13.5 12.5H11.5M3.5 6.5V1.5C3.5 0.947715 3.94772 0.5 4.5 0.5H10.5C11.0523 0.5 11.5 0.947715 11.5 1.5V6.5M3.5 10.5H11.5V14.5H3.5V10.5Z" stroke="currentColor"></path> </g></svg>',
				titleAttr: 'Print',
				title: $('.export_title').html(),
				customize: function ( win ) {
					$(win.document.body)
						.css( 'font-size', '9pt' );

					$(win.document.body).find( 'table' )
						.addClass( 'compact' )
						.css( 'font-size', 'inherit' );

					$(win.document.body).find( 'h1' )
						.css( 'font-size', '14pt' );
				},
				footer: true,
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'colvis',
				text: '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.25 7C18.25 9.07107 16.5711 10.75 14.5 10.75C12.4289 10.75 10.75 9.07107 10.75 7C10.75 4.92893 12.4289 3.25 14.5 3.25C16.5711 3.25 18.25 4.92893 18.25 7ZM14.5 9.25C15.7426 9.25 16.75 8.24264 16.75 7C16.75 5.75736 15.7426 4.75 14.5 4.75C13.2574 4.75 12.25 5.75736 12.25 7C12.25 8.24264 13.2574 9.25 14.5 9.25Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.75 17C5.75 19.0711 7.42893 20.75 9.5 20.75C11.5711 20.75 13.25 19.0711 13.25 17C13.25 14.9289 11.5711 13.25 9.5 13.25C7.42893 13.25 5.75 14.9289 5.75 17ZM9.5 19.25C8.25736 19.25 7.25 18.2426 7.25 17C7.25 15.7574 8.25736 14.75 9.5 14.75C10.7426 14.75 11.75 15.7574 11.75 17C11.75 18.2426 10.7426 19.25 9.5 19.25Z" fill="currentColor"></path> <path d="M14.25 16.9585C14.25 16.5443 14.5858 16.2085 15 16.2085H22C22.4142 16.2085 22.75 16.5443 22.75 16.9585C22.75 17.3727 22.4142 17.7085 22 17.7085H15C14.5858 17.7085 14.25 17.3727 14.25 16.9585Z" fill="currentColor"></path> <path d="M9 6.20852C9.41421 6.20852 9.75 6.54431 9.75 6.95852C9.75 7.37273 9.41421 7.70852 9 7.70852L2 7.70852C1.58579 7.70852 1.25 7.37273 1.25 6.95852C1.25 6.54431 1.58579 6.20852 2 6.20852L9 6.20852Z" fill="currentColor"></path> <path d="M1.25 16.9585C1.25 16.5443 1.58579 16.2085 2 16.2085H4C4.41421 16.2085 4.75 16.5443 4.75 16.9585C4.75 17.3727 4.41421 17.7085 4 17.7085H2C1.58579 17.7085 1.25 17.3727 1.25 16.9585Z" fill="currentColor"></path> <path d="M22 6.20852C22.4142 6.20852 22.75 6.54431 22.75 6.95852C22.75 7.37273 22.4142 7.70852 22 7.70852H20C19.5858 7.70852 19.25 7.37273 19.25 6.95852C19.25 6.54431 19.5858 6.20852 20 6.20852H22Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'Columns',
				title: $('.export_title').html(),
				postfixButtons: ['colvisRestore']
			},
		]
	});

	// permission page select all
	$("#all_view").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_view").prop("checked", true);
		}else{
			$(".cb_view").prop("checked", false);
		}
	});

	$("#all_add").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_add").prop("checked", true);
		}else{
			$(".cb_add").prop("checked", false);
		}
	});

	$("#all_edit").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_edit").prop("checked", true);
		}else{
			$(".cb_edit").prop("checked", false);
		}
	});
	
	$("#all_delete").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_delete").prop("checked", true);
		}else{
			$(".cb_delete").prop("checked", false);
		}
	});

	if($.isFunction($.fn.validate)) {
		$("form.validate").each(function(i, el)
		{
			var $this = $(el),
			opts = {
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
							wrapper: "li"
						}
					}
				}
			};
			$this.validate(opts);
		});
	}

	// page full screen
	$(".s-expand").on('click', function(e) {
		if (typeof screenfull != 'undefined') {
			if (screenfull.enabled) {
				screenfull.toggle();
			}
		}
	});
	
	if (typeof screenfull != 'undefined') {
		if (screenfull.enabled) {
			$(document).on(screenfull.raw.fullscreenchange, function() {
				if (screenfull.isFullscreen) {
					$('.s-expand').find('i').toggleClass('fas fa-expand fas fa-expand-arrows-alt');
				} else {
					$('.s-expand').find('i').toggleClass('fas fa-expand-arrows-alt fas fa-expand');
				}
			});
		}
	}
	
	// checkbox, radio and selects
	$("#chk-radios-form, #selects-form").each(function() {
		$(this).validate({
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorPlacement: function( error, element ) {
				var placement = element.closest('div');
				if (!placement.get(0)) {
					placement = element;
				}
				if (error.text() !== '') {
					placement.append(error);
				}
			}
		});
	});

	// date range picker
	if ($(".daterange").length) {
		$('.daterange').daterangepicker({
			opens: 'left',
		    locale: {format: 'YYYY/MM/DD'},
		    ranges: {
		       'Today': [moment(), moment()],
		       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		       'This Month': [moment().startOf('month'), moment().endOf('month')],
		       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
		       'This Year': [moment().startOf('year'), moment().endOf('year')],
		       'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
		    }
		});
	}

	// modal dismiss
	$(document).on("click", ".modal-dismiss", function(e) {
		e.preventDefault();
		$.magnificPopup.close();
	});

	$(document).ready(function () {
		// document print function
		$("#print").on( "click", function() {
			var mode = 'iframe'; //popup
			var close = mode == "popup";
			var options = {
				mode: mode,
				popClose: close
			};
			$("#printResult").printArea(options);
		});

		// document export CSV
		$("#csv_btn").on("click", function() {
			$("#export_table").table2csv({filename: 'student_attendance_sheet.csv'});
		});

		// script to print show / hidden all
		$("input[name='chkPrint']").on("change", function() {	
			if ($(this).is(":checked"))
			{
				$(this).parents('tr').removeClass("hidden-print");
			} else {
				$(this).parents('tr').addClass("hidden-print");
			}
		});

		// script to id card print show / hidden all
		$("input[name='chk_idcard']").on( "change", function() {
			if ($(this).is(":checked"))
			{
				$(this).parents('.idcard-col').removeClass("hidden-print");
			} else {
				$(this).parents('.idcard-col').addClass("hidden-print");
			}
		});

		// student admission guardian slow / hidden
		$("#chkGuardian").on( "change", function() {
			if ($(this).is(":checked")){
				$("#guardian_form").hide("slow");
				$("#exist_list").show("slow");
			} else {
				$("#guardian_form").show("slow");	
				$("#exist_list").hide("slow");
			}
		});

		// script for all checkbox checked / unchecked
		$("#selectAllchkbox").on("change", function(ev)
		{
			var $chcks = $(".checked-area input[type='checkbox']");
			if($(this).is(':checked'))
			{
				$chcks.prop('checked', true).trigger('change');
			} else {
				$chcks.prop('checked', false).trigger('change');
			}
		});

		// script for Table all checkbox checked / unchecked
		$("#selectAllcbTable").on("change", function(ev)
		{
			var $chcks = $(this).parents('table').find("tbody td input[type='checkbox']");
			if($(this).is(':checked'))
			{
				$chcks.prop('checked', true).trigger('change');
			} else {
				$chcks.prop('checked', false).trigger('change');
			}
		});

		// event holiday show / hide
		$("#chk_holiday").on("change", function(ev)
		{
			if($(this).is(':checked'))
			{
				$("#typeDiv").hide("slow");
				$("#auditionDiv").hide("slow");
				$("#selected_user").hide("slow");
			} else {
				$("#typeDiv").show("slow");
				$("#auditionDiv").show("slow");
			}
		});

		// attachments class and subject show / hide
		$("#all_class_set").on("change", function()
		{
			if($(this).is(':checked'))
			{
				$("#class_div").hide("slow");
				$("#sub_div").hide("slow");
			} else {
				$("#class_div").show("slow");
				$("#sub_div").show("slow");
			}
		});

		$("#subject_wise").on("change", function()
		{
			if($(this).is(':checked'))
			{
				$("#subject_div").hide("slow");
			} else {
				$("#subject_div").show("slow");
			}
		});

		// skipped employee bank details
		$("#chk_bank_skipped").on( "change", function() {
			if ($(this).is(":checked")){
				$("#bank_details_form").hide("slow");
			} else {
				$("#bank_details_form").show("slow");
			}
		});

		$("#live_class_method").on( "change", function() {
			if (this.value == 1)
			{
				$("#bbb_config").hide("slow");
				$("#gmeet").hide("slow");
				$("#zoom_config").show("slow");
			} else if(this.value == 2) {
				$("#zoom_config").hide("slow");
				$("#gmeet").hide("slow");
				$("#bbb_config").show("slow");
			} else if(this.value == 3) {
				$("#zoom_config").hide("slow");
				$("#bbb_config").hide("slow");
				$("#gmeet").show("slow");
			}
		});

		// message delete script
		$(document).on('click', '#msgAction', function() {
			var id = "";
			var type = $(this).data('type');
			var arrayID = [];
			$("input[type='checkbox'].msg_checkbox").each(function (index) {
				if(this.checked) {
					id = $(this).attr('id');
					arrayID.push(id);
				}
			});
			if (arrayID.length != 0) {
				$.ajax({
					url: base_url + "communication/trash_observe",
					type: 'POST',
					data: {
						array_id : arrayID,
						mode : type
					},
					success: function (data) {
						location.reload();
					}
				});
			}
		});

		// message conversation is important
		$(".mailbox-fav").on("click", function() {
			var messageID = $(this).attr('data-id');
			var $this = $(this).find('i');
			var status = $this.hasClass('far fa-bell');
			$this.toggleClass("far fa-bell");
			$this.toggleClass("fas fa-bell");
			$.ajax({
				url: base_url + "communication/set_fvourite_status",
				type: 'POST',
				data: {
					messageID: messageID,
					status: status
				},
				dataType: "json",
				success: function (data) {
					if(data.status == true) {
						alertMsg(data.msg);
					}
				}
			});  
		});

		// events status
		$(".event-switch").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "event/status",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});
		$(".event-website").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "event/show_website",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});

		$(".gallery_website").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "frontend/gallery/show_website",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});
	});

	// bootstrapToggle configurations
	if ($(".toggle-switch").length) {
		$('.toggle-switch').bootstrapToggle();
	}

	// dropify basic configurations
	if (typeof Dropify != 'undefined') {
		if ($(".dropify").length) {
			$(".dropify").dropify();
		}
	}

	// month and year mode datepicker
	if ($(".monthyear").length) {
        $(".monthyear").datepicker({
            orientation: 'bottom',
            autoclose: true,
            startView: 1,
            format: 'yyyy-mm',
            minViewMode: 1,
        });
    }

	// customize ckeditor
	if ($("#ckeditor").length) {
		CKEDITOR.replace('ckeditor');
	}

	if ($(".editor").length) {
		$('.editor').ckeditor();
	}

	// customize summernote
	if ($(".summernote").length) {
		$('.summernote').summernote({
			height: 220,
			toolbar: [
				["style", ["style"]],
				["name", ["fontname","fontsize"]],
				["font", ["bold","italic","underline", "clear"]],
				["color", ["color"]],
				["para", ["ul", "ol", "paragraph"]],
				["insert", ["link","table"]],
				["misc", ["fullscreen", "undo", "codeview"]]
			]
		});
	}

	// date range picker
	if ($(".daterange").length) {
		$('.daterange').daterangepicker({
			opens: 'left',
		    locale: {format: 'YYYY/MM/DD'},
		    ranges: {
		       'Today': [moment(), moment()],
		       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		       'This Month': [moment().startOf('month'), moment().endOf('month')],
		       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
		       'This Year': [moment().startOf('year'), moment().endOf('year')],
		       'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
		    }
		});
	}
})(jQuery);

// payroll salary add more allowances
function add_more_allowances() {
	var add_new = $('<div class="row"><div class="col-md-6 mt-md"> <input class="form-control" name="allowance_name[]" placeholder="Name Of Allowance" type="text">\n\
	</div><div class="col-md-4 mt-md"> <input class="salary form-control" name="allowance_value[]" placeholder="Amount" type="number"></div>\n\
	<div class="col-md-2 mt-md text-right"><button type="button" class="btn btn-danger removeAL" ><i class="fas fa-times"></i> </button></div></div>');
	$("#add_new_allowance").append(add_new);
}

// payroll salary allowances remove
$("#add_new_allowance").on('click', '.removeAL', function () {
	$(this).parent().parent().remove();
	payrollCheckSum();
});

// payroll salary add more deduction
function add_more_deduction() {
	var add_new = $('<div class="row"><div class="col-md-6 mt-md"> <input class="form-control" name="deduction_name[]" placeholder="Name Of Deductions" type="text">\n\
	</div><div class="col-md-4 mt-md"> <input class="deduction form-control" name="deduction_value[]" placeholder="Amount" type="number"></div>\n\
	<div class="col-md-2 mt-md text-right"><button type="button" class="btn btn-danger removeDE"><i class="fas fa-times"></i> </button></div></div>');
	$("#add_new_deduction").append(add_new);
}

// payroll salary deduction remove
$("#add_new_deduction").on('click', '.removeDE', function () {
	$(this).parent().parent().remove();
	payrollCheckSum();
});

function payrollCheckSum() {
    var sum = 0;
    var deduc = 0;
    $(".salary").each(function () {
        sum += $(this).val() ? parseFloat($(this).val()) : 0;
    });

    $(".deduction").each(function () {
        deduc += $(this).val() ? parseFloat($(this).val()) : 0;
    });

    $("#total_allowance").val(sum);
    $("#total_deduction").val(deduc);

    var net_salary = 0;
	var basic = $('#basic_salary').val() ? parseFloat($('#basic_salary').val()) : 0;
	
    net_salary = (basic + sum) - deduc;
    $("#net_salary").val(net_salary);
    $("#v_basic_salary").val(basic);
}

// event modal showing
function viewEvent(id) {
	$.ajax({
		url: base_url + "event/getDetails",
		type: 'POST',
		data: {
			event_id: id
		},
		success: function (data) {
			$('#ev_table').html(data);
			mfp_modal('#modal');
		}
	});
}

function ajaxModal(url) {
	// show ajax response on request success
	$.ajax({
		url: url,
		success: function (data) {
			$.magnificPopup.open({
				items: {
					src: data,
					type: 'inline',
				},
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 400,
				mainClass: 'my-mfp-zoom-in',
				modal: true
			});
		}
	});
}

// modal with css animation
function mfp_modal(data){
	$.magnificPopup.open({
		items: {
			src: data,
			type: 'inline',
		},
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 400,
		mainClass: 'my-mfp-zoom-in',
		modal: true
	});
}

$(document).ready(function () {
	$(".whatsapp-button").on( "click", function() {
	    $('.whatsapp-popup').toggleClass('open');
	});

	$(".whatsapp-agent").on( "click", function() {
	    go_to_whatsapp($(this).attr('data-number'));
	});

	function go_to_whatsapp(number, text = ""){
	    var WhatsAppUrl = 'https://web.whatsapp.com/send';
	    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	        WhatsAppUrl = 'https://api.whatsapp.com/send'; 
	    }
	    var url = WhatsAppUrl+'?phone='+number;
	    if (text !== "") {
	        url += '&text='+text;
	    }
	    var win = window.open(url, '_blank');
	    win.focus();
	}
});