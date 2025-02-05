<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="<?php echo $global_config['institute_name'] ?>">
    <title><?php echo $global_config['institute_name'];?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
    <link href="<?php echo base_url() ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2/css/select2.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/dropify/css/dropify.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.css'); ?>">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <style type="text/css">
        .hidden-div {
            display: none;
        }
        @media (max-width: 549px) {
            .sr-root {
                padding: 15px !important;
            }
        }
    </style>
</head>
<body>
    <div class="sr-root">
        <div class="sr-main">
            <section class="container">
                <div class="row">
                    <div class="col-md-6" style="margin: auto 0;">
                        <h1>Subscription Fees Payment</h1>
                        <h4><strong style="color: #5e5e5e;"><?php echo $get_school['name'] . " " . translate('plan'); ?></strong> subscription fees amount</h4>
                        <span style="font-weight: bold; color: #4d4d4d; font-size: 22px;"><?php echo $global_config['currency_symbol'] .  number_format($get_school['price'] - $get_school['discount'], 2, '.', ''); ?></span>
                        <div class="pasha-image"> 
                            <img src="<?=base_url('uploads/app_image/logo.png')?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1>Payer Details</h1>
                        <?php echo form_open_multipart('saas_payment/checkout/', array('class' => 'form-horizontal frm-submit' )); ?>
                        <input type="hidden" name="reference_no" value="<?php echo $get_school['reference_no'] ?>">
                    
                        <div id="onlinePayment">
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('name')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="name" value="<?=set_value('name')?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('email')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="email" value="<?=set_value('email')?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('post_code')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="post_code" value="<?=set_value('post_code')?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('mobile_no')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="mobile_no" value="<?=set_value('mobile_no')?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('state')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="state" value="<?=set_value('state')?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"><?=translate('address')?> <span class="required">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter Address"><?php echo set_value('address'); ?></textarea>
                                <span class="error"><?=form_error('class_id')?></span>
                            </div>
                        </div>
                    <?php if ($getSettings->offline_payments == 1){ ?>
                        <div id="offlinePayment" class="hidden-div">
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('payment_type')?> <span class="required">*</span></label>
                                <?php
                                    $payvia_list = array('' => translate('select_payment_type'));
                                    $paymentTypes = $this->db->get('saas_offline_payment_types')->result();
                                    foreach ($paymentTypes as $key => $value) {
                                        $payvia_list[$value->id] = $value->name;
                                    }
                                    echo form_dropdown("payment_type", $payvia_list, set_value('payment_type'), "class='form-control' data-plugin-selectTwo data-width='100%' id='paymentType'
                                    data-minimum-results-for-search='Infinity' ");
                                ?>
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2 hidden-div" id="instructionDiv">
                                <label class="control-label"> <?=translate('instructions')?></label>
                                <div class="alert alert-info mb-none" id="instruction"></div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('date_of_payment')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="date_of_payment" value="" autocomplete="off" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('reference')?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="reference" value="" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"> <?=translate('note')?> <span class="required">*</span></label>
                                <textarea class="form-control" name="note" rows="3"></textarea>
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label"><?=translate('proof_of_payment')?></label>
                                <input type="file" name="proof_of_payment" class="dropify" data-height="150" data-default-file="" />
                                <span class="error"><?=form_error('class_id')?></span>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group mb-2">
                            <label class="control-label"> <?=translate('payment_method')?> <span class="required">*</span></label>
                            <?php
                                $config = $payment_config;
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
                                    if ($getSettings->offline_payments == 1)
                                        $payvia_list['olp'] = 'Offline Payment';
                                    if ($config['toyyibpay_status'] == 1)
                                        $payvia_list['toyyibpay'] = 'toyyibPay';
                                    if ($config['paytm_status'] == 1)
                                        $payvia_list['paytm'] = 'Paytm';
                                    if ($config['payhere_status'] == 1)
                                        $payvia_list['payhere'] = 'Payhere';
                                    echo form_dropdown("payment_method", $payvia_list, set_value('payment_method'), "class='form-control'  data-plugin-selectTwo id='pay_via'
                                    data-minimum-results-for-search='Infinity' ");
                                ?>
                            <span class="error"></span>
                        </div>
                        <button type="submit" class="btn btn-block btn-red" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">Pay Now</button>
                        <?php echo form_close();?>
                    </div>
                </div>
            </section>
            <div id="error-message"></div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/select2/js/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/dropify/js/dropify.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/payment.js'); ?>"></script>
<?php
$alertclass = "";
if($this->session->flashdata('alert-message-success')){
    $alertclass = "success";
} else if ($this->session->flashdata('alert-message-error')){
    $alertclass = "error";
} else if ($this->session->flashdata('alert-message-info')){
    $alertclass = "info";
}
if($alertclass != ''):
    $alert_message = $this->session->flashdata('alert-message-'. $alertclass);
    ?>
    <script type="text/javascript">
        swal({
            toast: true,
            position: 'top-end',
            type: '<?php echo $alertclass?>',
            title: '<?php echo $alert_message?>',
            confirmButtonClass: 'btn btn-1',
            buttonsStyling: false,
            timer: 8000
        })
    </script>
<?php
endif;
if ($getSettings->offline_payments == 1) { ?>
    <script type="text/javascript">
        var base_url = "<?php echo base_url() ?>";
        
        $('#pay_via').on('change', function(){
            var status = $(this).val();
            if(status == 'olp') {
                $('#offlinePayment').show(300); 
                $('#onlinePayment').hide(300);  
            } else {
                $('#offlinePayment').hide(300); 
                $('#onlinePayment').show(300);  
            }
        });
        
        $('#paymentType').on("change", function(){
            var typeID = $(this).val();
            $.ajax({
                url: base_url + 'saas_payment/getTypeInstruction',
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
    </script>
<?php } ?>
    <script type="text/javascript">
        $('#pay_via').on('change', function(){
            var status = $(this).val();
            if(status == 'olp') {
                $('#offlinePayment').show(300); 
                $('#onlinePayment').hide(300);  
            } else {
                $('#offlinePayment').hide(300); 
                $('#onlinePayment').show(300);  
            }
        });
    </script>  
</body>
</html>