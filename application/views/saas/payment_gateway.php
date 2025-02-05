<div class="row">
	<div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
	<div class="col-md-7">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li  class="active">
						<a href="#paypal" data-toggle="tab">Paypal Config</a>
					</li>
					<li>
						<a href="#stripe" data-toggle="tab">Stripe Config</a>
					</li>
					<li>
						<a href="#payumoney" data-toggle="tab">PayUmoney Config</a>
					</li>
					<li>
						<a href="#paystack" data-toggle="tab">Paystack</a>
					</li>
					<li>
						<a href="#razorpay" data-toggle="tab">Razorpay</a>
					</li>
					<li>
						<a href="#midtrans" data-toggle="tab">Midtrans</a>
					</li>
					<li>
						<a href="#sslcommerz" data-toggle="tab">SSL Commerz</a>
					</li>
					<li>
						<a href="#jazzcash" data-toggle="tab">Jazzcash</a>
					</li>
					<li>
						<a href="#flutterwave" data-toggle="tab">Flutter Wave</a>
					</li>
					<li>
						<a href="#paytm" data-toggle="tab">Paytm</a>
					</li>
					<li>
						<a href="#toyyibpay" data-toggle="tab">toyyibPay</a>
					</li>
					<li>
						<a href="#payhere" data-toggle="tab">Payhere</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane box active" id="paypal">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="paypal_sandbox">
							<div class="form-group">
								<label  class="col-sm-3 control-label">Paypal Username </label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paypal_username" value="<?=$config['paypal_username']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Paypal Password</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paypal_password" value="<?=$config['paypal_password']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Paypal Signature</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paypal_signature" value="<?=$config['paypal_signature']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Paypal Email</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paypal_email" value="<?=$config['paypal_email']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="paypal_sandbox" id="paypal_sandbox" value="1" <?=($config['paypal_sandbox'] == 1 ? 'checked' : ''); ?>>
											<i></i> Paypal Sandbox
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="stripe">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="stripe_demo">
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Stripe Publishiable Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="stripe_publishiable_key" value="<?=$config['stripe_publishiable']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Stripe Secret Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="stripe_secret" value="<?=$config['stripe_secret']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="stripe_demo" id="stripe_demo" <?=($config['stripe_demo'] == 1 ? 'checked' : ''); ?>>
											<i></i> Stripe Demo
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="payumoney">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="payumoney_demo">
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Payumoney Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="payumoney_key" value="<?=$config['payumoney_key']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Payumoney Salt</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="payumoney_salt" value="<?=$config['payumoney_salt']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="payumoney_demo" id="payumoney_demo" <?=($config['payumoney_demo'] == 1 ? 'checked' : '')?>>
											<i></i> Payumoney Demo
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="paystack">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Paystack Secret Key</label>
								<div class="col-md-6 mb-md">
									<input type="text" class="form-control" name="paystack_secret_key" value="<?=$config['paystack_secret_key']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="razorpay">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Razorpay Key Id</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="razorpay_key_id" value="<?=$config['razorpay_key_id']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Razorpay Key Secret</label>
								<div class="col-md-6 mb-md">
									<input type="text" class="form-control" name="razorpay_key_secret" value="<?=$config['razorpay_key_secret']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="midtrans">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="midtrans_sandbox">
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Midtrans Client Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="midtrans_client_key" value="<?=$config['midtrans_client_key']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Midtrans Server Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="midtrans_server_key" value="<?=$config['midtrans_server_key']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="midtrans_sandbox" id="midtrans_sandbox" <?=($config['midtrans_sandbox'] == 1 ? 'checked' : ''); ?>>
											<i></i> Midtrans Sandbox
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="sslcommerz">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="sslcommerz_sandbox">
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Store ID</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcz_store_id" value="<?=$config['sslcz_store_id']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Store Password</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="sslcz_store_passwd" value="<?=$config['sslcz_store_passwd']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="sslcommerz_sandbox" id="sslcommerz_sandbox" <?=($config['sslcommerz_sandbox'] == 1 ? 'checked' : ''); ?>>
											<i></i> SSLcommerz Sandbox
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="jazzcash">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="jazzcash_sandbox">
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Jazzcash Merchant ID</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="jazzcash_merchant_id" value="<?=$config['jazzcash_merchant_id']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Jazzcash Password</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="jazzcash_passwd" value="<?=$config['jazzcash_passwd']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Jazzcash Integerity Salt</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="jazzcash_integerity_salt" value="<?=$config['jazzcash_integerity_salt']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="jazzcash_sandbox" id="jazzcash_sandbox" <?=($config['jazzcash_sandbox'] == 1 ? 'checked' : ''); ?>>
											<i></i> Jazzcash Sandbox
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="flutterwave">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<input type="hidden" name="sandbox" value="flutterwave_sandbox">
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Public Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="flutterwave_public_key" value="<?=$config['flutterwave_public_key']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Secret Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="flutterwave_secret_key" value="<?=$config['flutterwave_secret_key']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-3 col-md-6 mb-md">
									<div class="checkbox-replace">
										<label class="i-checks">
											<input type="checkbox" name="flutterwave_sandbox" id="flutterwave_sandbox" <?=($config['flutterwave_sandbox'] == 1 ? 'checked' : ''); ?>>
											<i></i> Flutterwave Sandbox
										</label>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="paytm">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Merchant MID</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paytm_merchantmid" value="<?=$config['paytm_merchantmid']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Merchant Key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paytm_merchantkey" value="<?=$config['paytm_merchantkey']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Website</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="paytm_merchant_website" value="<?=$config['paytm_merchant_website']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Industry Type</label>
								<div class="col-md-6  mb-md">
									<input type="text" class="form-control" name="paytm_industry_type" value="<?=$config['paytm_industry_type']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="toyyibpay">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Secret key</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="toyyibpay_secretkey" value="<?=$config['toyyibpay_secretkey']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Category Code</label>
								<div class="col-md-6  mb-md">
									<input type="text" class="form-control" name="toyyibpay_categorycode" value="<?=$config['toyyibpay_categorycode']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane box" id="payhere">
						<?php echo form_open('saas/savePaymentConfig', array('class' => 'form-horizontal frm-submit-msg'));?>
							<div class="form-group">
							  <label  class="col-sm-3 control-label">Merchant ID</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="payhere_merchant_id" value="<?=$config['payhere_merchant_id']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label">Merchant Secret</label>
								<div class="col-md-6  mb-md">
									<input type="text" class="form-control" name="payhere_merchant_secret" value="<?=$config['payhere_merchant_secret']?>" autocomplete="off">
									<span class="error"></span>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-3 col-sm-offset-3">
										<button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" autocomplete="off">
											<i class="fas fa-plus-circle"></i> <?=translate('save');?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-2">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="far fa-credit-card"></i> Active Gateway</h4>
			</header>
			<?php echo form_open('saas/payment_active', array('class' => 'form-horizontal frm-submit-msg')); ?>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="paypal_status" id="paypal_status" <?=($config['paypal_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Paypal
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="stripe_status" id="stripe_status" <?=($config['stripe_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Stripe
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="payumoney_status" id="payumoney_status" <?=($config['payumoney_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> PayUmoney
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="paystack_status" id="paystack_status" <?=($config['paystack_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Paystack
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="razorpay_status" id="razorpay_status" <?=($config['razorpay_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Razorpay
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="midtrans_status" id="midtrans_status" <?=($config['midtrans_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Midtrans
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="sslcommerz_status" id="sslcommerz_status" <?=($config['sslcommerz_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> SSLcommerz
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="jazzcash_status" id="jazzcash_status" <?=($config['jazzcash_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Jazzcash
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="flutterwave" id="flutterwave" <?=($config['flutterwave_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Flutter Wave
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="paytm_status" id="paytm" <?=($config['paytm_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Paytm
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="toyyibpay_status" id="toyyibpay" <?=($config['toyyibpay_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> toyyibPay
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" name="payhere_status" id="flutterwave" <?=($config['payhere_status'] == 1 ? 'checked' : ''); ?>>
								<i></i> Payhere
							</label>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<button type="submit" class="btn btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
					<?=translate('save')?>
				</button>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>
