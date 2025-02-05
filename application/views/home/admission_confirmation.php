<style type="text/css">
    #print {
        margin-bottom: 20px;
        margin-top: 0px;
        padding: 2px 15px;
        font-size: 14px;
        font-weight: 500;
    }
</style>
<!-- Main Banner Starts -->
<div class="main-banner" style="background: url(<?php echo base_url('uploads/frontend/banners/' . $page_data['banner_image']); ?>) center top;">
    <div class="container px-md-0">
        <h2><span><?php echo $page_data['page_title']; ?></span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container px-md-0">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
            <li class="list-inline-item active"><?php echo $page_data['page_title']; ?></li>
        </ul>
    </div>
</div>
<div class="container px-md-0 main-container">
<div class="row">
    <div class="col-md-12">
        <div class="box2 form-box">
	        <?php
	        if($this->session->flashdata('success')) {
	            echo '<div class="alert alert-success"><i class="icon-text-ml far fa-check-circle"></i>' . $this->session->flashdata('success') . '</div>';
	        }
	        ?>
        	<div id="card_holder">
                <button type="button" class="btn btn-1" id="print"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?=translate('print')?></button>
                <div id="card">
				<style type="text/css">
					@media print {
						.pagebreak {
							page-break-before: always;
						}
					}
					.mark-container {
					    background: #fff;
					    width: 1000px;
					    position: relative;
					    z-index: 2;
					    margin: 0 auto;
					    padding: 20px 30px;
					}
					table {
					    border-collapse: collapse;
					    width: 100%;
					    margin: 0 auto;
					}
		            .status-list {
		                margin: 0;
		                padding: 0;
		                list-style: none;
		            }
		            .status-list li {
		                display: inline-block;
		                text-align: center;
		                border: 1px solid #ddd;
		                padding: 9px 14px;
		                border-radius: 4px;
		                font-size: 13px;
		                margin-top: 0.5rem;
		                background-color: #cff4fc;
		            }
		            .status-list li span {
		                font-weight: bold;
		                display: block;
		            }
				</style>
				<?php $getSchool = $this->db->where(array('id' => $student['branch_id']))->get('branch')->row_array(); ?>
					<div class="mark-container">
						<table border="0" style="margin-top: 20px; height: 100px;">
							<tbody>
								<tr>
									<td style="width:40%;vertical-align: top;"><img style="max-width:225px;" src="<?=$this->application_model->getBranchImage($student['branch_id'], 'report-card-logo')?>"></td>
									<td style="width:60%;vertical-align: top;">
										<table align="right" class="table-head text-right" >
											<tbody style="text-align: right;">
												<tr><th style="font-size: 26px;" class="text-right"><?=$getSchool['school_name']?></th></tr>
												<tr><td><?=$getSchool['address']?></td></tr>
												<tr><td><?=$getSchool['mobileno']?></td></tr>
												<tr><td><?=$getSchool['email']?></td></tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<h4 style="padding-top: 30px">Admission Form (Student Copy)</h4>
						<ul class="status-list">
							<li>Reference No<span><?php echo empty($student['reference_no']) ? "N/A" : $student['reference_no']; ?></span></li>
							<li>Admission Status <?php
								if ($student['status'] == 1)
									$status = '<span class="text-info">' . translate('under_review') . '</span>';
								else if ($student['status']  == 2)
									$status = '<span class="text-success">' . translate('approved') . '</span>';
								else if ($student['status']  == 3)
									$status = '<span class="text-danger">' . translate('declined') . '</span>';
								echo ($status);
								?></li>
							<li>Payment Status<?php if ($student['payment_status'] == 0) { ?>
							    <span class="text-warning">Unpaid</span>
							    <?php } else if ($student['payment_status'] == 1) { ?>
							    <span class="text-success">Paid</span>
							    <?php } ?></li>
						</ul>

						<table class="table table-condensed table-bordered" style="margin-top: 20px;">
							<tbody>
								<tr>
									<th>Admission ID</td>
									<td colspan="2"><?=$student['id'] ?></td>
									<th>Apply Date</td>
									<td colspan="2"><?=_d($student['apply_date'])?></td>
								</tr>
								<tr>
									<th>Academic Session</td>
									<td><?=get_type_name_by_id('schoolyear', get_global_setting('session_id'), "school_year")?></td>
									<th>Class</td>
									<td colspan><?=$student['class_name'] ?></td>
									<th>Section</td>
									<td><?=(empty($student['section_name'])) ? "N/A" : $student['section_name'] ?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-condensed table-bordered" style="margin-top: 20px;">
							<tbody>
								<tr>
									<th>First Name</td>
									<td><?=$student['first_name']?></td>
									<th>Last Name</td>
									<td><?=$student['last_name']?></td>
									<th>Gender</td>
									<td><?=ucfirst($student['gender'])?></td>
								</tr>
								<tr>
									<th>Date of Birth</td>
									<td><?=_d($student['birthday'])?></td>
									<th>Mobile No</td>
									<td><?=$student['mobile_no'] ?></td>
									<th>Email</td>
									<td><?=$student['email']?></td>
								</tr>
								<tr>
									<th>Father Name</td>
									<td><?=(empty($student['father_name'])) ? "N/A" : $student['father_name'] ?></td>
									<th>Apply Date</td>
									<td><?=_d($student['apply_date'])?></td>
									<th>Date of Birth</td>
									<td><?=_d($student['birthday'])?></td>
								</tr>
								<tr>
									<th>Mother Name</td>
									<td><?=(empty($student['mother_name'])) ? "N/A" : $student['mother_name'] ?></td>
									<th>Class</td>
									<td><?=$student['class_name']?></td>
									<th>Section</td>
									<td><?=(empty($student['section_name'])) ? "N/A" : $student['section_name'] ?></td>
								</tr>
								<tr>
									<th>Present Address</td>
									<td colspan="2"><?=(empty($student['present_address'])) ? "N/A" : $student['present_address'] ?></td>
									<th>Permanent Address</td>
									<td colspan="2"><?=(empty($student['permanent_address'])) ? "N/A" : $student['permanent_address'] ?></td>
								</tr>
						<?php 
						$show_custom_fields = custom_form_table('student', $student['branch_id']);
						if (!empty($show_custom_fields)) {
							foreach(array_chunk($show_custom_fields, 3) as $linkGroup) { 
								$colspan = "";
								$groupNo = count($linkGroup);
								if ($groupNo < 3) {
									$colspan = " colspan= '" . (6 - $groupNo) . "'";
								} ?>
								<tr>
									<?php
										$i = 1;
										foreach($linkGroup as $link) {
									?>
									<th><?php echo $link['field_label'] ?></th>   
									<td<?php echo ($groupNo == $i ? $colspan : ''); ?>><?php echo get_online_custom_table_custom_field_value($link['id'], $student['id']);?></td>        
									<?php $i++; } ?>
								</tr>
						<?php } } ?>
							</tbody>
						</table>
						<table class="table table-condensed table-bordered" style="margin-top: 20px;">
							<tbody>
								<tr>
									<th>Relation</td>
									<td><?=(empty($student['guardian_relation'])) ? "N/A" : $student['guardian_relation'] ?></td>
									<th>Guardian Name</td>
									<td><?=(empty($student['guardian_name'])) ? "N/A" : $student['guardian_name'] ?></td>
									<th>Father Name</td>
									<td><?=(empty($student['father_name'])) ? "N/A" : $student['father_name'] ?></td>
								</tr>
								<tr>
									<th>Mother Name</td>
									<td><?=(empty($student['mother_name'])) ? "N/A" : $student['mother_name'] ?></td>
									<th>Guardian Email</td>
									<td><?=(empty($student['grd_email'])) ? "N/A" : $student['grd_email'] ?></td>
									<th>Guardian Mobile No</td>
									<td><?=(empty($student['grd_mobile_no'])) ? "N/A" : $student['grd_mobile_no'] ?></td>
								</tr>
								<tr>
									<th>Guardian Address</td>
									<td colspan="6"><?=(empty($student['grd_address'])) ? "N/A" : $student['grd_address'] ?></td>
								</tr>
							</tbody>
						</table>
						<?php if ($student['payment_status'] == 1) {
							$paymentDetails = json_decode($student['payment_details'], true);

							?>
						<h4 style="padding-top: 30px">Payment Details</h4>
						<table class="table table-condensed table-bordered" style="margin-top: 20px;">
							<tbody>
								<tr>
									<th>Paid Amount</td>
									<td><?=$student['symbol'] . " " .  $student['payment_amount'] ?></td>
									<th>Payment Method</td>
									<td colspan="2"><?=ucfirst($paymentDetails['payment_method'])?></td>
								</tr>
							</tbody>
						</table>
						<?php } ?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#print').on('click', function(e){
            var oContent = document.getElementById('card').innerHTML;
		    var frameDoc=window.open('', 'document-print');
		    frameDoc.document.open();
		    //create a new HTML document.
		    frameDoc.document.write('<html><head><title></title>');
		    frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/vendor/bootstrap/css/bootstrap.min.css">');
		    frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/css/custom-style.css">');
		    frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/css/ramom.css">');
		    frameDoc.document.write('</head><body onload="window.print()">');
		    frameDoc.document.write(oContent);
		    frameDoc.document.write('</body></html>');
		    frameDoc.document.close();
		    setTimeout(function () {
		        frameDoc.close();      
		    }, 5000);
        });
    });
</script>




