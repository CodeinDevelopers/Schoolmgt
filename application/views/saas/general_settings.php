<div class="row">
	<div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fa-solid fa-sliders"></i> <?=translate('general') . " " . translate('settings')?></h4>
            </header>
            <?php echo form_open_multipart('saas/settings_general' . get_request_url(), array('class' => 'form-horizontal  frm-submit-data')); ?>
                <div class="panel-body">
                    <!-- General Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><i class="fas fa-cog"></i> <?=translate('general')?></h5>
                            <div class="mt-lg mb-md">
                                <div class="form-group mb-md">
                                    <label class="col-md-4 control-label"><?=translate('automatic_subscription_approval')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <?php
                                        $array = array(
                                            '0' => translate('no'),
                                            '1' => translate('yes'),
                                        );
                                        echo form_dropdown("automatic_approval", $array, set_value('automatic_approval', $config['automatic_approval']), "class='form-control' data-plugin-selectTwo data-minimum-results-for-search='Infinity'
                                        data-width='100%' ");
                                        ?>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label">Google <?php echo translate('captcha_status'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <?php
                                            $array = array(
                                                "" => translate('select'),
                                                "0" => translate('disable'),
                                                "1" => translate('enable')
                                            );
                                            echo form_dropdown("captcha_status", $array, set_value('captcha_status', $config['captcha_status']), "class='form-control' data-plugin-selectTwo
                                            data-width='100%' id='captchaStatus' data-minimum-results-for-search='Infinity'");
                                        ?>
                                        <span class="error"><?php echo form_error('captcha_status'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group <?php echo $config['captcha_status'] == 1 ? '' : 'hidden-div'; ?>" id="recaptcha_site_key">
                                    <label  class="col-md-4 control-label"><?php echo translate('recaptcha_site_key'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recaptcha_site_key" value="<?php echo set_value('recaptcha_site_key', $config['recaptcha_site_key']); ?>" autocomplete="off" />
                                        <span class="error"><?php echo form_error('recaptcha_site_key'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group <?php echo $config['captcha_status'] == 1 ? '' : 'hidden-div'; ?>" id="recaptcha_secret_key">
                                    <label  class="col-md-4 control-label"><?php echo translate('recaptcha_secret_key'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recaptcha_secret_key" value="<?php echo set_value('recaptcha_secret_key', $config['recaptcha_secret_key']); ?>" autocomplete="off" />
                                        <span class="error"><?php echo form_error('recaptcha_secret_key'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Fees offline payments setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('offline_payments') . " " . translate('setting')?></h5>
                            <div class="mt-lg">
                                <div class="form-group mb-md">
                                    <label class="col-md-4 control-label"><?=translate('offline_payments');?></label>
                                    <div class="col-md-6">
                                        <?php
                                        $offlinePayments = array(
                                            '1' => translate('enabled'), 
                                            '0' => translate('disabled'), 
                                        );
                                        echo form_dropdown("offline_payments", $offlinePayments, set_value('offline_payments', $config['offline_payments']), "class='form-control' id='offline_payments' 
                                        data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Dashboard Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><i class="fas fa-bell"></i> <?=translate('dashboard') . " " . translate('alert_setting')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('expired_alert')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <?php
                                        $array = array(
                                            '0' => translate('no'),
                                            '1' => translate('yes'),
                                        );
                                        echo form_dropdown("expired_alert", $array, set_value('expired_alert', $config['expired_alert']), "class='form-control' data-plugin-selectTwo data-minimum-results-for-search='Infinity' id='expired_alert'
                                        data-width='100%' ");
                                        ?>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"><?=translate('expired_alert_days')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control alert_settings" <?php echo $config['expired_alert'] == 0 ? 'disabled' : '' ?> name="expired_alert_days" value="<?php echo $config['expired_alert_days'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('expired_reminder_message')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <textarea type="text" rows="3" class="form-control alert_settings" <?php echo $config['expired_alert'] == 0 ? 'disabled' : '' ?> name="expired_reminder_message"><?php echo $config['expired_alert_message'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('expired_message')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <textarea type="text" rows="3" class="form-control alert_settings" <?php echo $config['expired_alert'] == 0 ? 'disabled' : '' ?> name="expired_message"><?php echo $config['expired_message'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SEO Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><i class="fas fa-search"></i> <?=translate('seo')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('site') . " " . translate('title')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="seo_title" value="<?php echo $config['seo_title'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-4 control-label"><?=translate('meta') . " " . translate('keyword')?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="seo_keyword" value="<?php echo $config['seo_keyword'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('meta') . " " . translate('description')?></label>
                                    <div class="col-md-6">
                                        <textarea type="text" rows="3" class="form-control" name="seo_description"><?php echo $config['seo_description'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SEO Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><i class="fab fa-google"></i> <?=translate('google_analytics')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('google_analytics')?></label>
                                    <div class="col-md-6 mb-lg">
                                        <textarea type="text" rows="3" class="form-control" name="google_analytics"><?php echo $config['google_analytics'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-3 col-sm-offset-3">
                            <button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
                                <i class="fas fa-plus-circle"></i> <?=translate('save');?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
<script type="text/javascript">
    $('#expired_alert').on('change', function(){
        if (this.value == 1) {
            $(".alert_settings").prop('disabled', false);
        } else {
            $(".alert_settings").prop('disabled', true);
        }
    });

    $('#captchaStatus').on('change', function(){
        var status = $(this).val();
        if(status == 1) {
            $('#recaptcha_site_key').show(300); 
            $('#recaptcha_secret_key').show(300);  
        } else {
            $('#recaptcha_site_key').hide(300); 
            $('#recaptcha_secret_key').hide(300); 
        }
    }); 
</script>