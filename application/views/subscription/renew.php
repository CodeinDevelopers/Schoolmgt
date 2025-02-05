<style type="text/css">
    .payment {
        border: 1px solid #f2f2f2;
        border-radius: 4px;
        overflow: hidden;
        padding: 20px;
    }

    html.dark .payment,
    html.dark .boxed-widget.summary li.total-costs {
        border-color: #4c4e51;
    }
    
    .boxed-widget {
        background-color: #f9f9f9;
        padding: 0;
        z-index: 90;
        position: relative;
        border-radius: 0;
        overflow: hidden;
    }
    
    .boxed-widget-headline {
        color: #333;
        font-size: 20px;
        padding: 20px 30px;
        background-color: #f0f0f0;
        color: #333;
        position: relative;
        border-radius: 0;
    }

    html.dark .boxed-widget-headline {
    	background-color: #464646;
    }

    html.dark .boxed-widget-inner {
    	background-color: #262626;
    }

    html.dark .boxed-widget ul li span {
		color: #fff;
    }

    .boxed-widget-inner {
        padding: 30px;
    }
    
    .boxed-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .boxed-widget ul li {
        color: #666;
        padding-bottom: 1px;
    }

.boxed-widget.summary li.total-costs {
    font-size: 18px;
    border-top: 1px solid #e4e4e4;
    padding-top: 18px;
    margin-top: 18px;
}

.boxed-widget ul li span {
    float: right;
    color: #333;
    font-weight: 600;
}

.payment-logo {
	height: 50px;
	position: absolute;
	right: 19px;
	top: -2px;
}

.payment-tab p {
    margin: 10px 0;
}
</style>
<?php
$price = ($package['price'] - $package['discount']);
$period_value = $package['period_value'];
$periodType = $package['period_type'];
if ($periodType == 2) {
    $strtotimeType = "day";
}
if ($periodType == 3) {
    $strtotimeType = "month";
}
if ($periodType == 4) {
    $strtotimeType = "year";
}
?>
<section class="panel">
    <div class="panel-body">
    	<div class="row">
            <div class="col-xl-8 col-lg-8 content-right-offset">
                <h3><?=translate('payment_details')?></h3>
                <?php echo form_open('subscription/checkout', array('class' => 'form-horizontal frm-submit' )); ?>
                    <input type="hidden" name="plan_id" value="<?php echo $package['id']; ?>">
                    <div class="payment">
                        <div class="form-group mt-md">
                            <div class="col-md-12">
                                <label class="control-label"><?=translate('payment_method')?> <span class="required">*</span></label>
                                <?php
                                    $payvia_list = $this->saas_model->getSectionsPaymentMethod();
                                    echo form_dropdown("pay_via", $payvia_list, set_value('pay_via'), "class='form-control' data-plugin-selectTwo data-width='100%' id='payVia'
                                    data-minimum-results-for-search='Infinity' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group payu" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="payer_name" value="<?php echo $getUser['name'] ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group payu" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">Email <span class="required">*</span></label>
                                <input type="email" class="form-control" name="email" value="<?php echo $getUser['email'] ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group payu" style="display: none;">
                            <div class="col-md-12">
                            <label class="control-label">Phone <span class="required">*</span></label>
                                <input type="text" class="form-control" name="phone" value="<?php echo $getUser['mobileno'] ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="form-group sslcommerz" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="sslcommerz_name" value="<?php echo $getUser['name'] ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group sslcommerz" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">Email <span class="required">*</span></label>
                                <input type="email" class="form-control" name="sslcommerz_email" value="<?php echo $getUser['email'] ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group sslcommerz" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">Address <span class="required">*</span></label>
                                <input type="text" class="form-control" name="sslcommerz_address" value="" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group sslcommerz" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">Post Code <span class="required">*</span></label>
                                <input type="text" class="form-control" name="sslcommerz_postcode" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group sslcommerz" style="display: none;">
                            <div class="col-md-12">
                                <label class="control-label">State <span class="required">*</span></label>
                                <input type="text" class="form-control" name="sslcommerz_state" value="" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group sslcommerz" style="display: none;">
                            <div class="col-md-12 mb-md">
                                <label class="control-label">Phone <span class="required">*</span></label>
                                <input type="text" class="form-control" name="sslcommerz_phone" value="<?php echo $getUser['mobileno'] ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" name="pay" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-lg btn-default mt-lg mb-lg" id="subscribeNow">Confirm and Pay</button>
                    <button class="btn btn-lg btn-default ml-md mt-lg mb-lg" onclick="history.go(-1);">Cancel</button>
                </form>
            </div>
            <div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">
                <div class="boxed-widget summary margin-top-0">
                    <div class="boxed-widget-headline">
                        <h3 class="mt-2"><?php echo translate('plan') . " " . translate('details'); ?></h3>
                    </div>
                    <div class="boxed-widget-inner">
                        <ul>
                            <li><?php echo translate('subscription') ?> <span></span></li>
                            <li><?php echo translate('start_date') ?> <span><?php echo date("d-M-Y") ?></span></li>
                            <li><?php echo translate('expiry_date') ?> <span><?php echo $periodType == 1 ? translate('lifetime') : date("d-M-Y", strtotime("+$period_value $strtotimeType")) ?></span></li>
                            <li class="total-costs"><?php echo translate('total_amount') ?> <span><?php echo $currency_symbol .number_format($price, 2, '.', ''); ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '#payVia', function(){
            var method = $(this).val();
            if (method =="payumoney") {
                $('.payu').show(400);
                $('.sslcommerz').hide(400);
            } else if (method =="sslcommerz") {
                $('.sslcommerz').show(400);
                $('.payu').hide(400);
            } else{
                $('.sslcommerz').hide(400);
                $('.payu').hide(400);
            }
        });
    });
</script>
