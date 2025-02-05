<?php $currency_symbol = $global_config['currency_symbol']; ?>
<section class="panel">
	<div class="panel-body">
		<div class="invoice" id="payslipPrint">
			<header class="clearfix mt-lg">
				<div class="row">
					<div class="col-xs-6">
						<div class="ib">
							<img src="<?=$this->application_model->getBranchImage($salary['branch_id'], 'printing-logo')?>" alt="Img" />
						</div>
					</div>
					<div class="col-xs-6 text-right">
						<h4 class="mt-none text-dark">Payslip No #<?php echo $salary['bill_no']; ?></h4>
						<p class="mb-none">
							<span class="text-dark"><?php echo translate('date'); ?> : </span> <span class="value"><?php echo _d($salary['created_at']); ?></span>
						</p>
						<p class="mb-none">
							<span class="text-dark"><?php echo translate('salary_month')?> : </span> <?php echo  $this->app_lib->getMonthslist($salary['month']); ?>
						</p>
					</div>
				</div>
			</header>
			
			<div class="bill-info">
				<div class="row">
					<div class="col-xs-6">
						<div class="bill-data">
							<p class="h5 mb-xs text-dark text-weight-semibold">To :</p>
							<address>
								<?php echo $salary['staff_name']; ?><br>
								<?php echo translate('department') . ' : ' . $salary['department_name']; ?><br>
								<?php echo translate('designation') . ' : ' . $salary['designation_name']; ?><br>
								<?php echo translate('mobile_no') . ' : ' . $salary['mobileno']; ?>
							</address>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="bill-data text-right">
							<p class="h5 mb-xs text-dark text-weight-semibold">From :</p>
							<address>
								<?php 
								echo $salary['school_name'] . "<br/>";
								echo $salary['school_address'] . "<br/>";
								echo $salary['school_mobileno'] . "<br/>";
								echo $salary['school_email'] . "<br/>";
								?>
							</address>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-md payslip">
				<div class="col-xs-6">
					<section class="panel panel-custom">
						<div class="panel-heading panel-heading-custom">
							<h4 class="panel-title">Allowances</h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive text-dark">
								<table class="table">
									<thead>
										<tr>
											<th><?php echo translate('name'); ?></th>
											<th class="text-right"><?php echo translate('amount'); ?></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$total_allowance = 0;
											$allowances = $this->payroll_model->get('payslip_details', array('payslip_id' => $salary['id'], 'type' => 1));
											if(count($allowances)){
												foreach ($allowances as $allowance):
													$total_allowance += $allowance['amount'];
										?>
										<tr>
											<td><?php echo $allowance['name']; ?></td>
											<td class="text-right"><?php echo currencyFormat($allowance['amount']); ?></td>
										</tr>
										<?php endforeach; } else {
											echo '<tr> <td colspan="2"> <h5 class="text-danger text-center">' . translate('no_information_available') . '</h5> </td></tr>';
										 }; ?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
				<div class="col-xs-6">
					<section class="panel panel-custom">
						<div class="panel-heading panel-heading-custom"><h4 class="panel-title"><?php echo translate('deductions'); ?></h4></div>
						<div class="panel-body">
							<div class="table-responsive text-dark">
								<table id="deductiontable" class="table">
									<thead>
										<tr>
											<th><?php echo translate('name'); ?></th>
											<th class="text-right"><?php echo translate('amount'); ?></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$total_deduction = 0;
											$deductions = $this->payroll_model->get('payslip_details', array('payslip_id' => $salary['id'], 'type' => 2));
											if(count($deductions)){
												foreach ($deductions as $deduction):
													$total_deduction += $deduction['amount'];
										?>
										<tr>
											<td><?php echo $deduction['name']; ?></td>
											<td class="text-right"><?php echo currencyFormat($deduction['amount']); ?></td>
										</tr>
										<?php 
												endforeach; 
											}else{
											
												echo '<tr> <td colspan="2"> <h5 class="text-danger text-center">' . translate('no_information_available') .  '</h5></td></tr>';
											};
										 ?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="invoice-summary text-right mt-lg">
				<div class="row">
					<div class="col-lg-5 pull-right">
						<ul class="amounts">
							<li><strong><?php echo translate('basic_salary'); ?> :</strong> <?php echo currencyFormat($salary['basic_salary']); ?></li>
							<li><strong><?php echo translate('total') . " " . translate('allowance'); ?> :</strong> <?php echo currencyFormat($salary['total_allowance']); ?></li>
							<li><strong><?php echo translate('total') . " " . translate('deduction'); ?> :</strong> <?php echo currencyFormat($salary['total_deduction']); ?></li>
							<li>
								<strong><?php echo translate('net') . " " . translate('salary'); ?> :</strong> 
								<?php
								$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
								echo currencyFormat($salary['net_salary']) . ' </br>(' . strtoupper($f->format($salary['net_salary'])) . ')' ;
								?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="panel-footer">
		<div class="text-right mr-lg">
			<a href="javascript:void(0);" onClick="fn_printElem('payslipPrint')" class="btn btn-default">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?php echo translate('print'); ?>
			</a>
		</div>
	</footer>
</section>