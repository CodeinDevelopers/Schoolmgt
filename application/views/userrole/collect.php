<?php
$currency_symbol = $global_config['currency_symbol'];
$allocations = $this->fees_model->getInvoiceDetails($basic['enroll_id']);
$extINTL = extension_loaded('intl');
if ($extINTL == true) {
	$spellout = new NumberFormatter("en", NumberFormatter::SPELLOUT);
}
if (count($allocations)) {
	?>
	<section class="panel">
		<div class="tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#invoice" data-toggle="tab"><i class="far fa-credit-card"></i> <?=translate('invoice')?></a>
				</li>
	<?php if ($invoice['status'] != 'unpaid'): ?>
				<li>
					<a href="#history" data-toggle="tab"><i class="fas fa-dollar-sign"></i> <?=translate('payment_history')?></a>
				</li>
	<?php endif; ?>
	<?php if ($invoice['status'] != 'total'): ?>
			<?php if ($getOfflinePaymentsConfig == 1) { ?>
				<li>
					<a href="#offline_payments" data-toggle="tab"><i class="far fa-credit-card"></i> <?=translate('offline_payments')?></a>
				</li>
			<?php } ?>
	<?php endif; ?>
			</ul>
			<div class="tab-content">
				<div id="invoice" class="tab-pane <?=empty($this->session->flashdata('pay_tab')) ? 'active' : ''; ?>">
					<div id="invoice_print">
						<div class="invoice">
							<header class="clearfix">
								<div class="row">
									<div class="col-xs-6">
										<div class="ib">
											<img src="<?=$this->application_model->getBranchImage($basic['branch_id'], 'printing-logo')?>" alt="Acamedium Img" />
										</div>
									</div>
									<div class="col-md-6 text-right">
										<h4 class="mt-none mb-none text-dark">Invoice No #<?=$invoice['invoice_no']?></h4>
										<p class="mb-none">
											<span class="text-dark"><?=translate('date')?> : </span>
											<span class="value"><?=_d(date('Y-m-d'))?></span>
										</p>
										<p class="mb-none">
											<span class="text-dark"><?=translate('status')?> : </span>
											<?php
												$labelmode = '';
												if($invoice['status'] == 'unpaid') {
													$status = translate('unpaid');
													$labelmode = 'label-danger-custom';
												} elseif($invoice['status'] == 'partly') {
													$status = translate('partly_paid');
													$labelmode = 'label-info-custom';
												} elseif($invoice['status'] == 'total') {
													$status = translate('total_paid');
													$labelmode = 'label-success-custom';
												}
												echo "<span class='value label " . $labelmode . " '>" . $status . "</span>";
											?>
										</p>
									</div>
								</div>
							</header>
							<div class="bill-info">
								<div class="row">
									<div class="col-xs-6">
										<div class="bill-data">
											<p class="h5 mb-xs text-dark text-weight-semibold">Invoice For:</p>
											<address>
												<?php 
												echo $basic['first_name'] . ' ' . $basic['last_name'] . '<br>';
												echo $basic['student_address'] . '<br>';
												echo translate('class') . ' : ' . $basic['class_name'] . '<br>';
												echo translate('email') . ' : ' . $basic['student_email']; 
												?>
											</address>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="bill-data text-right">
											<p class="h5 mb-xs text-dark text-weight-semibold">School:</p>
											<address>
												<?php 
												echo $basic['school_name'] . "<br/>";
												echo $basic['school_address'] . "<br/>";
												echo $basic['school_mobileno'] . "<br/>";
												echo $basic['school_email'] . "<br/>";
												?>
											</address>
										</div>
									</div>
								</div>
							</div>

							<div class="table-responsive br-none">
								<table class="table invoice-items table-hover mb-none">
									<thead>
										<tr class="text-dark">
											<th id="cell-id" class="text-weight-semibold">#</th>
											<th id="cell-item" class="text-weight-semibold"><?=translate("fees_type")?></th>
											<th id="cell-id" class="text-weight-semibold"><?=translate("due_date")?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate("status")?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate("amount")?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate("discount")?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate("fine")?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate("paid")?></th>
											<th id="cell-total" class="text-center text-weight-semibold"><?=translate("balance")?></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$group = array();
											$count = 1;
											$total_fine = 0;
											$total_discount = 0;
											$total_paid = 0;
											$total_balance = 0;
											$total_amount = 0;
											$typeData = array('' => translate('select'));
											foreach ($allocations as $row) {
												$deposit = $this->fees_model->getStudentFeeDeposit($row['allocation_id'], $row['fee_type_id']);
												$type_discount = $deposit['total_discount'];
												$type_fine = $deposit['total_fine'];
												$type_amount = $deposit['total_amount'];
												$balance = $row['amount'] - ($type_amount + $type_discount);
												$total_discount += $type_discount;
												$total_fine += $type_fine;
												$total_paid += $type_amount;
												$total_balance += $balance;
												$total_amount += $row['amount'];
												if ($balance != 0) {
												 	$typeData[$row['allocation_id'] . "|" . $row['fee_type_id']] = $row['name'];
												}
											?>
										<?php if(!in_array($row['group_id'], $group)) { 
											$group[] = $row['group_id'];
											?>
										<tr>
											<td class="group" colspan="9"><strong><?php echo get_type_name_by_id('fee_groups', $row['group_id']) ?></strong><img class="group" src="<?php echo base_url('assets/images/arrow.png') ?>"></td>
										</tr>
										<?php } ?>
										<tr>
											<td><?php echo $count++;?></td>
											<td class="text-dark"><?=$row['name']?></td>
											<td><?=_d($row['due_date'])?></td>
											<td><?php 
												$status = 0;
												$labelmode = '';
												if($type_amount == 0) {
													$status = translate('unpaid');
													$labelmode = 'label-danger-custom';
												} elseif($balance == 0) {
													$status = translate('total_paid');
													$labelmode = 'label-success-custom';
												} else {
													$status = translate('partly_paid');
													$labelmode = 'label-info-custom';
												}
												echo "<span class='label ".$labelmode." '>".$status."</span>";
											?></td>
											<td><?php echo currencyFormat($row['amount']);?></td>
											<td><?php echo currencyFormat($type_discount);?></td>
											<td><?php echo currencyFormat($type_fine);?></td>
											<td><?php echo currencyFormat($type_amount);?></td>
											<td class="text-center"><?php echo currencyFormat($balance);?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="invoice-summary text-right mt-lg">
								<div class="row">
									<div class="col-md-5 col-xs-12 pull-right">
										<ul class="amounts">
											<li><strong><?=translate('grand_total')?> :</strong> <?=currencyFormat($total_amount); ?></li>
											<li><strong><?=translate('paid')?> :</strong> <?=currencyFormat($total_paid); ?></li>
											<li><strong><?=translate('discount')?> :</strong> <?=currencyFormat($total_discount); ?></li>
											<li><strong><?=translate('fine')?> :</strong> <?=currencyFormat($total_fine); ?></li>
											<?php if ($total_balance != 0): ?>
											<li>
												<strong><?=translate('balance')?> : </strong> 
												<?php
												$numberSPELL = "";
												if ($extINTL == true) {
													$numberSPELL = ' </br>( ' . ucwords($spellout->format($total_balance)) . ' )';
												}
												echo currencyFormat($total_balance) . $numberSPELL;
												?>
											</li>
											<?php else: ?>
											<li>
												<strong><?=translate('total_paid')?> : </strong> 
												<?php
												$numberSPELL = "";
												if ($extINTL == true) {
													$numberSPELL = ' </br>( ' . ucwords($spellout->format(($total_paid + $total_fine))) . ' )';
												}
												echo currencyFormat(($total_paid + $total_fine)) . $numberSPELL;
												?>
											</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="text-right mr-lg hidden-print">
							<button onClick="fn_printElem('invoice_print')" class="btn btn-default ml-sm"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?=translate('print')?></button>
						</div>
					</div>
				</div>
				<?php if ($invoice['status'] != 'unpaid'): ?>
				<div class="tab-pane" id="history">
					<div id="payment_print">
						<div class="invoice payment">
							<header class="clearfix">
								<div class="row">
									<div class="col-xs-6">
										<div class="ib">
											<img src="<?=$this->application_model->getBranchImage($basic['branch_id'], 'printing-logo')?>" alt="Img" />
										</div>
									</div>
									<div class="col-md-6 text-right">
										<h4 class="mt-none mb-none text-dark">Invoice No #<?= $invoice['invoice_no']?></h4>
										<p class="mb-none">
											<span class="text-dark"><?=translate('date')?> : </span>
											<span class="value"><?php echo _d(date('Y-m-d'));?></span>
										</p>
										<p class="mb-none">
											<span class="text-dark"><?=translate('status')?> : </span>
											<?php
												$labelmode = '';
												if($invoice['status'] == 'unpaid') {
													$status = translate('unpaid');
													$labelmode = 'label-danger-custom';
												} elseif($invoice['status'] == 'partly') {
													$status = translate('partly_paid');
													$labelmode = 'label-info-custom';
												} elseif($invoice['status'] == 'total') {
													$status = translate('total_paid');
													$labelmode = 'label-success-custom';
												}
												echo "<span class='value label ".$labelmode." '>".$status."</span>";
											?>
										</p>
									</div>
								</div>
							</header>
							<div class="bill-info">
								<div class="row">
									<div class="col-xs-6">
										<div class="bill-data">
											<p class="h5 mb-xs text-dark text-weight-semibold"> </p>
											<address>
												<?php 
												echo $basic['first_name'] . ' '. $basic['last_name'] . '<br>';
												echo $basic['student_address'] . '<br>';
												echo translate('class').' : '. $basic['class_name'] . '<br>';
												echo translate('email').' : '. $basic['student_email']; 
												?>
											</address>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="bill-data text-right">
											<p class="h5 mb-xs text-dark text-weight-semibold">School:</p>
											<address>
												<?php 
												echo $basic['school_name'] . "<br/>";
												echo $basic['school_address'] . "<br/>";
												echo $basic['school_mobileno'] . "<br/>";
												echo $basic['school_email'] . "<br/>";
												?>
											</address>
										</div>
									</div>
								</div>
							</div>
							<div class="table-responsive br-none">
								<table class="table invoice-items" id="invoice">
									<thead>
										<tr class="h5 text-dark">
											<th id="cell-id" class="text-weight-semibold hidden-print">
												<div class="checkbox-replace" >
													<label class="i-checks" data-toggle="tooltip" data-original-title="Print Show / Hidden">
														<input type="checkbox" name="select-all" id="selectAllchkbox" checked> <i></i>
													</label>
												</div>
											</th>
											<th id="cell-item" class="text-weight-semibold"><?=translate('fees_type')?></th>
											<th id="cell-item" class="text-weight-semibold"><?=translate('fees_code')?></th>
											<th id="cell-item" class="text-weight-semibold"><?=translate('date')?></th>
											<th id="cell-item" class="text-weight-semibold hidden-print"><?=translate('collect_by')?></th>
											<th id="cell-desc" class="text-weight-semibold"><?=translate('remarks')?></th>
											<th id="cell-qty" class="text-weight-semibold"><?=translate('method')?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate('amount')?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate('discount')?></th>
											<th id="cell-price" class="text-weight-semibold"><?=translate('fine')?></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$allocations = $this->db->where(array('student_id' => $basic['id'], 'session_id' => get_session_id()))->get('fee_allocation')->result_array();
										foreach ($allocations as $allRow) {
											$historys = $this->fees_model->getPaymentHistory($allRow['id'], $allRow['group_id']);
											foreach ($historys as $row) {
										?>
										<tr>
											<td class="hidden-print checked-area">
												<div class="checkbox-replace">
													<label class="i-checks"><input type="checkbox" name="chkPrint" checked ><i></i></label>
												</div>
											</td>
											<td class="text-weight-semibold text-dark"><?=$row['name']?></td>
											<td><?=$row['fee_code']?></td>
											<td><?=_d($row['date'])?></td>
											<td class="hidden-print">
												<?php
													if ($row['collect_by'] == 'online') {
														echo translate('online');
													}else{
														echo get_type_name_by_id('staff', $row['collect_by']);
													}
												?>
											</td>
											<td><?=$row['remarks']?></td>
											<td><?=$row['payvia']?></td>
											<td><?=currencyFormat($row['amount'])?></td>
											<td><?=currencyFormat($row['discount'])?></td>
											<td><?=currencyFormat($row['fine'])?></td>
										</tr>
										 <?php } } ?>
									</tbody>
								</table>
							</div>
							<div class="invoice-summary text-right mt-lg">
								<div class="row">
									<div class="col-lg-5 pull-right">
										<ul class="amounts">
											<li><strong><?=translate('grand_total')?> :</strong> <?=currencyFormat($total_amount); ?></li>
											<li><strong><?=translate('paid')?> :</strong> <?=currencyFormat($total_paid); ?></li>
											<li><strong><?=translate('discount')?> :</strong> <?=currencyFormat($total_discount); ?></li>
											<li><strong><?=translate('fine')?> :</strong> <?=currencyFormat($total_fine); ?></li>
											<?php if ($total_balance != 0): ?>
											<li>
												<strong><?=translate('balance')?> : </strong> 
												<?php
												$numberSPELL = "";
												if ($extINTL == true) {
													$numberSPELL = ' </br>( ' . ucwords($spellout->format($total_balance)) . ' )';
												}
												echo currencyFormat($total_balance) . $numberSPELL;
												?>
											</li>
											<?php else: ?>
											<li>
												<strong><?=translate('total_paid')?> : </strong> 
												<?php
												$numberSPELL = "";
												if ($extINTL == true) {
													$numberSPELL = ' </br>( ' . ucwords($spellout->format(($total_paid + $total_fine))) . ' )';
												}
												echo currencyFormat($total_paid + $total_fine) . $numberSPELL;
												?>
											</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="text-right mr-lg hidden-print">
							<button onClick="fn_printElem('payment_print')" class="btn btn-default"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?=translate('print')?></button>
						</div>
					</div>
				</div>
				<?php endif; ?>
				
				<!--add fees form-->
				<?php if($invoice['status'] != 'total'): ?>
					<div id="collect_fees" class="tab-pane">
						<div class="mb-xlg">
						<?php echo form_open('feespayment/checkout', array('class' => 'form-horizontal frm-submit' )); ?>
							<input type="hidden" name="invoice_no" value="<?=$invoice['invoice_no']?>">
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('fees_type')?> <span class="required">*</span></label>
								<div class="col-md-6">
								<?php
									echo form_dropdown("fees_type", $typeData, set_value('fees_type'), "class='form-control' onchange='getBalanceByType(this)' 
									data-plugin-selectTwo data-width='100%' ");
								?>
								<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('amount')?> <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="fee_amount" id="feeAmount" value="" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('fine')?></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="fine_amount" id="fineAmount" value="0" autocomplete="off" readonly="" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?=translate('payment_method')?> <span class="required">*</span></label>
								<div class="col-md-6">
		    						<?php
										$payvia_list = array('' => translate('select_payment_method'));
										if ($config['paypal_status'] == 1)
											$payvia_list['paypal'] = 'Paypal';
										if ($config['stripe_status'] == 1)
											$payvia_list['stripe'] = 'Stripe';
										if ($config['payumoney_status'] == 1)
											$payvia_list['payumoney'] = 'PayUmoney';
										if ($config['paystack_status'] == 1)
											$payvia_list['paystack'] = 'Paystack';
										if ($config['razorpay_status'] == 1)
											$payvia_list['razorpay'] = 'Razorpay';
										if ($config['sslcommerz_status'] == 1)
											$payvia_list['sslcommerz'] = 'SSLcommerz';
										if ($config['jazzcash_status'] == 1)
											$payvia_list['jazzcash'] = 'Jazzcash';
										if ($config['midtrans_status'] == 1)
											$payvia_list['midtrans'] = 'Midtrans';
										if ($config['flutterwave_status'] == 1)
											$payvia_list['flutterwave'] = 'Flutter Wave';
	                                    if ($config['paytm_status'] == 1)
	                                        $payvia_list['paytm'] = 'Paytm';
	                                    if ($config['toyyibpay_status'] == 1)
	                                        $payvia_list['toyyibpay'] = 'toyyibPay';
	                                    if ($config['payhere_status'] == 1)
	                                        $payvia_list['payhere'] = 'Payhere';
	                                    if ($config['nepalste_status'] == 1)
	                                        $payvia_list['nepalste'] = 'Nepalste';
		    							echo form_dropdown("pay_via", $payvia_list, set_value('pay_via'), "class='form-control' data-plugin-selectTwo data-width='100%' id='pay_via'
		    							data-minimum-results-for-search='Infinity' ");
		    						?>
									<span class="error"></span>
								</div>
							</div>
						
							<div class="form-group payu"  style="display: none;">
								<label class="col-md-3 control-label">Name <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="payer_name" value="<?php echo $getUser['name'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group payu" style="display: none;">
								<label class="col-md-3 control-label">Email <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="<?php echo $getUser['email'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group payu" style="display: none;">
								<label class="col-md-3 control-label">Phone <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="phone" value="<?php echo $getUser['mobileno'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>

							<div class="form-group toyyibpay" style="display: none;">
								<label class="col-md-3 control-label">Email <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="toyyibpay_email" value="<?php echo $getUser['email'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group toyyibpay" style="display: none;">
								<label class="col-md-3 control-label">Phone <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="toyyibpay_phone" value="<?php echo $getUser['mobileno'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>

							<div class="form-group sslcommerz" style="display: none;">
								<label class="col-md-3 control-label">Name <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcommerz_name" value="<?php echo $getUser['name'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group sslcommerz" style="display: none;">
								<label class="col-md-3 control-label">Email <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="sslcommerz_email" value="<?php echo $getUser['email'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group sslcommerz" style="display: none;">
								<label class="col-md-3 control-label">Address <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcommerz_address" value="<?php echo $getUser['address'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group sslcommerz" style="display: none;">
								<label class="col-md-3 control-label">Post Code <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcommerz_postcode" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group sslcommerz" style="display: none;">
								<label class="col-md-3 control-label">State <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcommerz_state" value="<?php echo $getUser['state'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group sslcommerz" style="display: none;">
								<label class="col-md-3 control-label">Phone <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcommerz_phone" value="<?php echo $getUser['mobileno'] ?>" autocomplete="off" />
									<span class="error"></span>
								</div>
							</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-offset-3 col-md-3">
										<button type="submit" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-credit-card"></i> <?=translate('fees_pay_now')?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<?php if ($getOfflinePaymentsConfig == 1) { ?>
					<div id="offline_payments" class="tab-pane">
						<div class="mb-xlg">
							<!-- offline payments add -->
					        <section class="panel pg-fw">
					            <div class="panel-body">
					                <h5 class="chart-title mb-xs"><i class="fas fa-credit-card"></i> <?=translate('payment')?></h5>
					                <div class="mt-lg">
										<?php echo form_open_multipart('userrole/offline_payments', array('class' => 'form-horizontal frm-submit-data' )); ?>
											<input type="hidden" name="invoice_no" value="<?=$invoice['invoice_no']?>">
											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('fees_type')?> <span class="required">*</span></label>
												<div class="col-md-5">
												<?php
													echo form_dropdown("fees_type", $typeData, set_value('fees_type'), "class='form-control' onchange='getBalanceByType(this)'
													data-plugin-selectTwo data-width='100%' ");
												?>
												<span class="error"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('payment_method')?> <span class="required">*</span></label>
												<div class="col-md-5">
						    						<?php
														$payvia_list = array('' => translate('select_payment_method'));
														$paymentTypes = $this->db->where('branch_id', $basic['branch_id'])->get('offline_payment_types')->result();
														foreach ($paymentTypes as $key => $value) {
															$payvia_list[$value->id] = $value->name;
														}
						    							echo form_dropdown("payment_method", $payvia_list, set_value('payment_method'), "class='form-control' data-plugin-selectTwo data-width='100%' id='paymentMethod'
						    							data-minimum-results-for-search='Infinity' ");
						    						?>
													<span class="error"></span>
												</div>
											</div>
											<div class="form-group hidden-div" id="instructionDiv">
												<label class="col-md-3 control-label"><?=translate('instructions')?></label>
												<div class="col-md-5">
						    						<div class="alert alert-info mb-none" id="instruction"></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('date_of_payment')?> <span class="required">*</span></label>
												<div class="col-md-5">
													<input type="text" class="form-control" name="date_of_payment" value="" autocomplete="off" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' />
													<span class="error"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('amount')?> <span class="required">*</span></label>
												<div class="col-md-5">
													<input type="text" class="form-control" name="fee_amount" id="feeAmount" value="" autocomplete="off" />
													<span class="error"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('fine')?></label>
												<div class="col-md-5">
													<input type="text" class="form-control" name="fine_amount" id="fineAmount" value="0" autocomplete="off" readonly="" />
													<span class="error"></span>
												</div>
											</div>

											<div class="form-group hidden-div" id="totalPayableDiv">
												<label class="col-md-3 control-label"><?=translate('total_payable')?></label>
												<div class="col-md-5">
													<div class="alert alert-success mb-none" id="totalPayable"></div>
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('reference')?></label>
												<div class="col-md-5">
													<input type="text" class="form-control" name="reference" value="" autocomplete="off" />
													<span class="error"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"><?=translate('note')?> <span class="required">*</span></label>
												<div class="col-md-5">
													<textarea class="form-control" name="note" rows="3"></textarea>
													<span class="error"></span>
												</div>
											</div>
			                                <div class="form-group">
			                                    <label class="col-md-3 control-label"><?php echo translate('proof_of_payment');?></label>
			                                    <div class="col-md-4">
			                                        <input type="file" name="proof_of_payment" class="dropify" data-height="150" data-default-file="" />
			                                        <span class="error"></span>
			                                    </div>
			                                </div>
			                                <div class="form-group mb-lg">
												<div class="col-md-offset-3 col-md-3">
													<button type="submit" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
														<i class="fas fa-credit-card"></i> <?=translate('pay')?>
													</button>
												</div>
											</div>
										<?php echo form_close();?>	
					                </div>
					            </div>
					        </section>
					        <!-- offline payments list -->
					        <section class="panel pg-fw">
					            <div class="panel-body">
					                <h5 class="chart-title mb-xs"><?=translate('offline_payments')?></h5>
					                <div class="mt-lg">
										<table class="table table-bordered table-condensed table-hover mb-none tbr-top table-export">
											<thead>
												<tr>
													<th><?=translate('trx_id')?></th>
													<th><?=translate('student')?></th>
													<th><?=translate('payment_date')?></th>
													<th><?=translate('submit_date')?></th>
													<th><?=translate('amount')?></th>
													<th><?=translate('fine')?></th>
													<th><?=translate('status')?></th>
													<th><?=translate('action')?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$count = 1;
												$paymentslist = $this->userrole_model->getOfflinePaymentsList();
												foreach($paymentslist as $row):
													?>
												<tr>
													<td><?php echo $row->id;?></td>
													<td><?php echo $row->fullname;?></td>
													<td><?php echo _d($row->payment_date);?></td>
													<td><?php echo _d($row->submit_date);?></td>
													<td><?php echo currencyFormat($row->amount);?></td>
													<td><?php echo currencyFormat($row->fine);?></td>
													<td>
														<?php
															$labelmode = '';
															$status = $row->status;
															if($status == 1) {
																$status = translate('pending');
																$labelmode = 'label-info-custom';
															} elseif($status == 2) {
																$status = translate('approved');
																$labelmode = 'label-success-custom';
															} elseif($status == 3) {
																$status = translate('suspended');
																$labelmode = 'label-danger-custom';
															}
															echo "<span class='value label " . $labelmode . " '>" . $status . "</span>";
														?>
													</td>
													<td>
														<a href="javascript:void(0);" class="btn btn-circle icon btn-default" onclick="getApprovelOfflinePayments('<?=$row->id ?>')">
															<i class="fas fa-bars"></i>
														</a>
													</td>
												</tr>
												<?php  endforeach; ?>
											</tbody>
										</table>
					                </div>
					            </div>
					        </section>
						</div>
					</div>
					<?php } ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php }else{ ?>
	<section class="panel">
		<div class="panel-body">
			<div class="alert alert-subl mb-none text-center">
				<i class="fas fa-exclamation-triangle"></i> <?=translate('no_fees_have_been_allocated')?>
			</div>
		</div>
	</section>
<?php } ?>

<?php if ($getOfflinePaymentsConfig == 1) { ?>
<!-- offline payments view modal -->
<div class="zoom-anim-dialog modal-block modal-block-lg mfp-hide" id="modal">
	<section class="panel" id='quick_view'></section>
</div>

<script type="text/javascript">
	// get payments approvel details
	function getApprovelOfflinePayments(id) {
	    $.ajax({
	        url: base_url + 'userrole/getOfflinePaymentslDetails',
	        type: 'POST',
	        data: {'id': id},
	        dataType: "html",
	        success: function (data) {
				$('#quick_view').html(data);
				mfp_modal('#modal');
	        }
	    });
	}
</script>
<?php } ?>

<script type="text/javascript">
	function getBalanceByType(sel)
	{
        var typeID = $(sel).val();
	    $.ajax({
	        url: base_url + 'userrole/getBalanceByType',
	        type: 'POST',
	        data: {
	        	'typeID': typeID
	        },
	        dataType: "json",
	        success: function (data) {
	            $(sel).closest('form').find('#feeAmount').val(data.balance.toFixed(2));
	            $(sel).closest('form').find('#fineAmount').val(data.fine.toFixed(2));
	        	if (parseFloat(data.fine) == 0) {
	        		$('#totalPayableDiv').hide(500);
	        	} else {
	        		$('#totalPayable').html(parseFloat(data.balance + data.fine).toFixed(2));
	        		$('#totalPayableDiv').show(500);
	        	}
	        }
	    });
	}

    $('#paymentMethod').on("change", function(){
        var typeID = $(this).val();
	    $.ajax({
	        url: base_url + 'offline_payments/getTypeInstruction',
	        type: 'POST',
	        data: {
	        	'typeID': typeID
	        },
	        dataType: "html",
	        success: function (str) {
	        	if (!str || str.length === 0) {
	        		$('#instructionDiv').hide(500);
	        	} else {
	        		$('#instruction').html(str);
	        		$('#instructionDiv').show(500);
	        	}
	        }
	    });
    });

	$(document).ready(function () {
		$(document).on('change', '#pay_via', function(){
			var method = $(this).val();
			if (method =="payumoney") {
				$('.payu').show(400);
				$('.sslcommerz').hide(400);
				$('.toyyibpay').hide(400);
			} else if (method =="sslcommerz") {
				$('.sslcommerz').show(400);
				$('.payu').hide(400);
				$('.toyyibpay').hide(400);
			} else if (method == "toyyibpay" || method == "payhere") {
				$('.toyyibpay').show(400);
				$('.sslcommerz').hide(400);
				$('.payu').hide(400);
			} else if (method =="toyyibpay") {
				$('.toyyibpay').show(400);
				$('.sslcommerz').hide(400);
				$('.payu').hide(400);
			} else{
				$('.sslcommerz').hide(400);
				$('.toyyibpay').hide(400);
				$('.payu').hide(400);
			}
		});
	});
</script>