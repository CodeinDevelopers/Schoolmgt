<?php
$total_paid = number_format($billdata['paid'], 2, '.', '');
$total_amount = number_format($billdata['total'], 2, '.', '');
$total_discount = number_format($billdata['discount'], 2, '.', '');
$currency = $global_config['currency'];
$currency_symbol = $global_config['currency_symbol'];
$due_amount = number_format($billdata['due'], 2, '.', '');
$active_tab = $this->session->flashdata('active_tab');
?>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (empty($active_tab) || $active_tab == 1 ? 'active' : ''); ?>">
				<a href="#invoice" data-toggle="tab"><i class="far fa-credit-card"></i> <?php echo translate('invoice'); ?></a>
			</li>
<?php if($total_paid > 1 && get_permission('purchase_payment', 'is_view')):?>
			<li class="<?php echo ($active_tab == 2 ? 'active' : ''); ?>">
				<a href="#payment_history" data-toggle="tab"><i class="fas fa-dollar-sign"></i> <?php echo translate('payment_history'); ?></a>
			</li>
<?php endif; if($billdata['payment_status'] != 3 && get_permission('purchase_payment', 'is_add')): ?>
			<li class="<?php echo ($active_tab == 3 ? 'active' : ''); ?>">
				<a href="#add_payment" data-toggle="tab"><i class="far fa-money-bill-alt"></i> <?php echo translate('add_payment'); ?></a>
			</li>
<?php endif; ?>
		</ul>
		<div class="tab-content">
			<div id="invoice" class="tab-pane <?php echo (empty($active_tab) || $active_tab == 1 ? 'active' : ''); ?>">
				<div id="invoice_print">
					<div class="invoice">
						<header class="clearfix">
							<div class="row">
								<div class="col-xs-6">
									<div class="ib">
										<img src="<?php echo base_url('uploads/app_image/printing-logo.png'); ?>" alt="Img" />
									</div>
								</div>
								<div class="col-xs-6 text-right">
									<h4 class="mt-none mb-none text-dark">Bill No #<?php echo html_escape($billdata['bill_no']); ?></h4>
									<p class="mb-none">
										<span class="text-dark"><?php echo translate('payment') . " " . translate('status'); ?> : </span>
										<?php 
											$status = $billdata['payment_status'];
											$payment_a = array(
												'1' => translate('unpaid'),
												'2' => translate('partly_paid'),
												'3' => translate('total_paid')
											);
											echo ($payment_a[$status]);
										?>
									</p>
									<p class="mb-none">
										<span class="text-dark"><?php echo translate('date'); ?> : </span>
										<span class="value"><?php echo _d($billdata['date']); ?></span>
									</p>
								</div>
							</div>
						</header>
						<div class="bill-info">
							<div class="row">
								<div class="col-xs-6">
									<div class="bill-data">
										<p class="h5 mb-xs text-dark text-weight-semibold"><?php echo translate('sale_to'); ?> :</p>
										<address>
											<?php
											$stuDetails = $this->application_model->getUserNameByRoleID($billdata['role_id'], $billdata['user_id']);
											echo $stuDetails['name'] . '<br>';
											echo translate('roles') . " : " . $billdata['role_name'] . '<br>';
											echo empty($stuDetails['email']) ? '' : translate('email') . " : " . ($stuDetails['email'] . '<br>');
											echo empty($stuDetails['mobileno']) ? '' : (translate('mobile_no') . " : " . $stuDetails['mobileno'] . '<br>');
											?>
										</address>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="bill-data text-right">
										<p class="h5 mb-xs text-dark text-weight-semibold">From :</p>
										<address>
											<?php 
											echo $global_config['institute_name'] . "<br/>";
											echo $global_config['address'] . "<br/>";
											echo $global_config['mobileno'] . "<br/>";
											echo $global_config['institute_email'] . "<br/>";
											?>
										</address>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table invoice-items table-hover mb-none">
								<thead>
									<tr class="text-dark">
										<th id="cell-id" class="text-weight-semibold">#</th>
										<th id="cell-item" class="text-weight-semibold"><?php echo translate("product"); ?></th>
										<th id="cell-price" class="text-weight-semibold"><?php echo translate("unit") . " " . translate("price"); ?></th>
										<th id="cell-qty" class="text-weight-semibold"><?php echo translate("quantity"); ?></th>
										<th id="cell-qty" class="text-weight-semibold"><?php echo translate("discount"); ?></th>
										<th id="cell-total" class="text-center text-weight-semibold"><?php echo translate("sub") . " " . translate("total"); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$count = 1;
										$productlist = $this->inventory_model->get('sales_bill_details', array('sales_bill_id' => $billdata['id']));
										foreach ($productlist as $product) {
											$sub_total = $product['sub_total'];
											$discount = $product['discount'];
									?>
									<tr>
										<td><?php echo $count++; ?></td>
										<td class="text-weight-semibold text-dark"><?php echo get_type_name_by_id('product', $product['product_id']); ?></td>
										<td><?php echo html_escape(currencyFormat($product['unit_price'])); ?></td>
										<td><?php echo html_escape($product['quantity']); ?></td>
										<td><?php echo html_escape(currencyFormat($discount)); ?></td>
										<td class="text-center"><?php echo html_escape(currencyFormat($sub_total - $discount)); ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="invoice-summary text-right mt-lg">
							<div class="row">
								<div class="col-md-5 pull-right">
									<ul class="amounts">
										<li><?php echo translate("sub") . " " . translate('total'); ?> : <?php echo currencyFormat($total_amount); ?></li>
										<li><?php echo translate('discount'); ?> : <?php echo currencyFormat($total_discount); ?></li>
<?php if ($status == 3){ 
	$g = ($total_amount - $total_discount);
	$grandtotal = number_format($g, 2, '.', '') ?>
										<li>
											<strong><?php echo translate('grand') . " " . translate('total'); ?>  : </strong> 
											<?php
											$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
											echo currencyFormat($grandtotal) . " </br>( ". ucwords($f->format($grandtotal)) . " $currency )";
											?>
										</li>
<?php }else{ ?>
										<li><?php echo translate('paid_amount'); ?> : <?php echo currencyFormat($total_paid); ?></li>
										<li>
											<strong><?php echo translate('due'); ?> :</strong> 
											<?php
											$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
											echo currencyFormat($due_amount) . ' </br>( ' . ucwords($f->format($due_amount)) . ' )';
											?>
										</li>
<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="row mt-xxlg">
							<div class="col-xs-6">
								<div class="text-left">
									<?php echo translate('prepared_by') . " - " . $billdata['biller_name']; ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="auth-signatory">
									<?php echo translate('authorised_by'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="text-right mr-lg hidden-print">
						<button class="btn btn-default ml-sm" onClick="fn_printElem('invoice_print')"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?php echo translate('print'); ?></button>
					</div>
				</div>
			</div>
<?php if($total_paid > 1 && get_permission('purchase_payment', 'is_view')): ?>
			<div class="tab-pane <?php echo ($active_tab == 2 ? 'active' : ''); ?>" id="payment_history">
				<div id="payment_print">
					<div class="invoice">
						<header class="clearfix">
							<div class="row">
								<div class="col-xs-6">
									<div class="ib">
										<img src="<?php echo base_url('uploads/app_image/printing-logo.png'); ?>" alt="Img" />
									</div>
								</div>
								<div class="col-md-6 text-right">
									<h4 class="mt-none mb-none text-dark">Bill No #<?php echo html_escape($billdata['bill_no']); ?></h4>
									<p class="mb-none">
										<span class="text-dark"><?php echo translate('payment') . " " . translate('status'); ?> : </span>
										<?php 
											$status = $billdata['payment_status'];
											$payment_a = array(
												'1' => translate('unpaid'),
												'2' => translate('partly_paid'),
												'3' => translate('total_paid')
											);
											echo ($payment_a[$status]);
										?>
									</p>
									<p class="mb-none">
										<span class="text-dark"><?php echo translate('date'); ?> : </span>
										<span class="value"><?php echo _d($billdata['date']); ?></span>
									</p>
								</div>
							</div>
						</header>
						<div class="bill-info">
							<div class="row">
								<div class="col-xs-6">
									<div class="bill-data">
										<p class="h5 mb-xs text-dark text-weight-semibold"><?php echo translate("to"); ?> :</p>
										<address>
											<?php
											$stuDetails = $this->application_model->getUserNameByRoleID($billdata['role_id'], $billdata['user_id']);
											echo $stuDetails['name'] . '<br>';
											echo translate('roles') . " : " . $billdata['role_name'] . '<br>';
											echo empty($stuDetails['email']) ? '' : translate('email') . " : " . ($stuDetails['email'] . '<br>');
											echo empty($stuDetails['mobileno']) ? '' : (translate('mobile_no') . " : " . $stuDetails['mobileno'] . '<br>');
											?>
										</address>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="bill-data text-right">
										<p class="h5 mb-xs text-dark text-weight-semibold">From :</p>
										<address>
											<?php 
											echo $global_config['institute_name'] . "<br/>";
											echo $global_config['address'] . "<br/>";
											echo $global_config['mobileno'] . "<br/>";
											echo $global_config['institute_email'] . "<br/>";
											?>
										</address>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table invoice-items table-hover mb-none">
								<thead>
									<tr class="text-dark">
										<th id="cell-id" class="text-weight-semibold">#</th>
										<th id="cell-item" class="text-weight-semibold"><?php echo translate("payment_by"); ?></th>
										<th id="cell-price" class="text-weight-semibold"><?php echo translate("pay_via"); ?></th>
										<th id="cell-qty" class="text-weight-semibold"><?php echo translate("remarks"); ?></th>
										<th id="cell-qty" class="text-weight-semibold"><?php echo translate("paid_on"); ?></th>
										<th id="cell-total" class="text-center text-weight-semibold"><?php echo translate("amount"); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$count = 1;
										$paymentlist = $this->inventory_model->get('sales_payment_history', array('sales_bill_id' => $billdata['id']));
										foreach($paymentlist as $payment) {
									?>
									<tr>
										<td><?php echo $count++; ?></td>
										<td class="text-weight-semibold text-dark"><?php echo get_type_name_by_id('staff', $payment['payment_by']) ; ?></td>
										<td><?php echo get_type_name_by_id('payment_types', $payment['pay_via']) ; ?></td>
										<td><?php echo html_escape($payment['remarks']); ?></td>
										<td><?php echo _d($payment['paid_on']); ?></td>
										<td class="text-center"><?php echo html_escape($currency_symbol . $payment['amount']); ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="invoice-summary text-right mt-lg">
							<div class="row">
								<div class="col-lg-5 pull-right">
									<ul class="amounts">
										<li><?php echo translate('total'); ?> : <?php echo currencyFormat($total_amount); ?></li>
										<li><?php echo translate('discount'); ?> : <?php echo currencyFormat($total_discount); ?></li>
										<li><?php echo translate('paid_amount'); ?> : <?php echo currencyFormat($total_paid); ?></li>
										<li>
											<strong><?php echo translate('due'); ?> :</strong> 
											<?php
												$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
												echo currencyFormat($due_amount) . ' </br>( ' . ucwords($f->format($due_amount)) . ' )';
											?>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="text-right mr-lg hidden-print">
						<button class="btn btn-default" onClick="fn_printElem('payment_print')"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?php echo translate('print'); ?></button>
					</div>
				</div>
			</div>
<?php endif; ?>
			
<?php if($billdata['payment_status'] != 3 && get_permission('purchase_payment', 'is_add')): ?>
			<!-- add payment form -->
			<div id="add_payment" class="tab-pane <?php echo ($active_tab == 3 ? 'active' : ''); ?>">
				<?php echo form_open_multipart('inventory/add_sales_payment', array('class' => 'form-horizontal form-bordered frm-submit-data')); ?>
					<input type="hidden" name="sales_bill_id" value="<?php echo html_escape($billdata['id']); ?>">
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('paid_on'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" data-plugin-datepicker data-plugin-options='{"todayHighlight" : true}' name="paid_date" value="<?php echo date('Y-m-d'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('amount'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="number" class="form-control" name="payment_amount" value="<?php echo set_value('payment_amount', $due_amount); ?>"
							placeholder="<?php echo translate('enter_payment_amount'); ?>" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('pay_via'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
							echo form_dropdown("pay_via", $payvia_list, set_value('pay_via'), "class='form-control' data-plugin-selectTwo data-width='100%'");
							?>
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="input-file-now"><?php echo translate('attach_document'); ?></label>
						<div class="col-md-6">
							<input type="file" name="attach_document" class="dropify" data-height="80" data-allowed-file-extensions="*" />
							<span class="error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('remarks'); ?></label>
						<div class="col-md-6 mb-md">
							<textarea name="remarks" rows="2" class="form-control" placeholder="<?php echo translate('write_your_remarks'); ?>"></textarea>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<button class="btn btn-default" type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><?php echo translate('payment'); ?></button>
							</div>
						</div>
					</footer>
				<?php echo form_close(); ?>
			</div>
<?php endif; ?>
		</div>
	</div>
</section>