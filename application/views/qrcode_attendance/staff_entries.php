<section class="panel">
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-qrcode"></i> <?=translate('qr_code') . " " . translate('attendance')?></h4>
	</header>
	<div class="panel-body">
	<div class="row qrcode-scan">
	    <div class="col-md-4 col-sm-12 mb-md">
	    <div class="form-group box mt-md">
	    	<span class="title"><?=translate('scan_qr_code')?></span>
	        <div class="justify-content-md-center" id="reader" width="300px" height="300px"></div>
	        <span class="text-center" id='qr_status'><?php echo translate('scanning')?></span>
					<div class="radio-custom radio-success radio-inline mt-md">
						<input type="radio" value="in_time" checked name="in_out_time" id="in_time">
						<label for="in_time"><?=translate('in_time')?></label>
					</div>
					<div class="radio-custom radio-success radio-inline mt-md">
						<input type="radio" value="out_time" name="in_out_time" id="out_time">
						<label for="out_time"><?=translate('out_time')?></label>
					</div>
	    </div>
	    </div>
	    <div class="col-md-8 col-sm-12  mt-md">
			<table class="table table-bordered table-hover table-condensed table-question nowrap"  cellpadding="0" cellspacing="0" width="100%" >
				<thead>
					<tr>
						<th>#</th>
						<th><?=translate('name')?></th>
						<th><?=translate('staff_id')?></th>
						<th><?=translate('role')?></th>
						<th><?=translate('date')?></th>
						<th><?=translate('in_time')?></th>
						<th><?=translate('out_time')?></th>
					</tr>
				</thead>
			</table>
	    </div>
	</div>
</section>
<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="qr_studentDetails">
	<section class="panel">
		<header class="panel-heading">
			<h4 class="panel-title">
				<i class="far fa-user-circle"></i> <?=translate('staff_details')?>
			</h4>
		</header>
		<div class="panel-body">
			<div class="quick_image">
				<img alt="" class="user-img-circle" id="quick_image" src="<?=base_url('uploads/app_image/defualt.png')?>" width="120" height="120">
			</div>
			<div class="text-center">
				<h4 class="text-weight-semibold mb-xs" id="quick_full_name"></h4>
				<p><span id="quick_role"></p>
			</div>
			<div class="table-responsive mt-md mb-md">
				<table class="table table-striped table-bordered table-condensed mb-none">
					<tbody>
						<tr>
							<th><?=translate('staff_id')?></th>
							<td><span id="quick_staff_id"></span></td>
							<th><?=translate('joining_date')?></th>
							<td><span id="quick_joining_date"></span></td>
						</tr>
						<tr>
							<th><?=translate('department')?></th>
							<td><span id="quick_department"></span></td>
							<th><?=translate('designation')?></th>
							<td><span id="quick_designation"></span></td>
						</tr>
						<tr>
							<th><?=translate('gender')?></th>
							<td><span id="quick_gender"></span></td>
							<th><?=translate('blood_group')?></th>
							<td><span id="quick_blood_group"></span></td>
						</tr>
						<tr>
							<th><?=translate('email')?></th>
							<td colspan="3"><span id="quick_email"></span></td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="mb-sm mt-sm ml-sm checkbox-replace">
									<label class="i-checks"><input type="checkbox" name="attendance" id="chkAttendance-Late" value="L"><i></i> <?=translate('late')?></label>
									<label class="i-checks"><input type="checkbox" name="attendance" id="chkAttendance-halfday" value="HD"><i></i> <?=translate('half_day')?></label>
									<div class="mt-sm">
										<input class="form-control" name="remark" id="attendanceRemark" autocomplete="off" type="text" placeholder="Remarks" value="">
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default btn-confirm mr-xs mt-xs" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><i class="far fa-check-circle"></i> <?=translate('confirm')?></button>
					<button class="btn btn-default modal-dismiss mt-xs"><?=translate('close')?></button>
				</div>
			</div>
		</footer>
	</section>
</div>

<audio id="successAudio">
  <source src="<?php echo base_url('assets/vendor/qrcode/success.mp3') ?>" type="audio/ogg">
</audio>

<script type="text/javascript">
	var statusMatched = "<?php echo translate('matched')?>";
	var statusScanning = "<?php echo translate('scanning')?>";
	
	$(document).ready(function() {
		initDatatable('.table-question', 'qrcode_attendance/getStaffListDT');
	});

	var x = document.getElementById("successAudio");
	var lastResult, modalOpen = 0;
	const html5QrCode = new Html5Qrcode("reader");
	const qrCodeSuccessCallback = (decodedText, decodedResult) => {
		if (decodedText !== lastResult && modalOpen == 0) {
			var inOutTime = $('input[name="in_out_time"]:checked').val();
			x.play();
			lastResult = decodedText;
			modalOpen = 1;
			if (inOutTime == 'out_time') {
				$("#chkAttendance-Late").closest('label').hide();
				$("#chkAttendance-halfday").closest('label').show();
			} else {
				$("#chkAttendance-Late").closest('label').show();
				$("#chkAttendance-halfday").closest('label').hide();
			}
			$('#attendanceRemark').val('');
			$('#chkAttendance-Late').prop('checked', false);
			$('#chkAttendance-halfday').prop('checked', false);
	    staffQuickView(decodedText);
	    $("#qr_status").html(statusMatched);
	    html5QrCode.clear();
		}
	};

	const formatsToSupport = [
		Html5QrcodeSupportedFormats.QR_CODE,
	];

	var config = { fps: 50, qrbox: 200};
	if($(window).width()  <= '400'){
		config = { fps: 50, qrbox: 150};
	}
	if($(window).width()  <= '370'){
		config = { fps: 50, qrbox: 120};
	}

	// if you want to prefer front camera
	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback).catch((err) => {
	 	$("#qr_status").css("background", "red");
	 	$("#reader").addClass("camera-preview").html("Back camera not found.");
	 	$("#qr_status").html(err);
	  alert('Back camera not found.');
	 	console.log(err);
	});

	// attendance stored in the database
	$('.btn-confirm').on('click', function() {
		var chkAttendance = $("#chkAttendance-Late:checked").val();
		var chkAttendanceHalfday = $("#chkAttendance-halfday:checked").val();
		var attendanceRemark = $("#attendanceRemark").val();
	    var btn = $(this);
	    var inOutTime = $('input[name="in_out_time"]:checked').val();
	    $.ajax({
	        url: base_url + 'qrcode_attendance/setStaffAttendanceByQrcode',
	        type: 'POST',
	        data: {
	        	'data': lastResult,
	        	'in_out_time': inOutTime,
	        	'late': chkAttendance,
						'halfday': chkAttendanceHalfday,
	        	'attendanceRemark': attendanceRemark,
	        },
	        dataType: 'json',
	        beforeSend: function () {
	            btn.button('loading');
	        },
	        success: function (res) {
	        	if (res.status == 1) {
					$('.table-question').DataTable().ajax.reload();
	        	}
				$("#qr_status").html(statusScanning);
				modalOpen = 0;
	        },
	        complete: function (data) {
	            btn.button('reset'); 
	            $.magnificPopup.close();
	        },
	        error: function () {
	            btn.button('reset');
	        }
	    });
	});


	$('.modal-dismiss').on('click', function() {
		end_loader()
	});

	$('input[name="in_out_time"]').on('change', function() {
		end_loader()
	});
</script>