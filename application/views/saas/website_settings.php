<div class="row">
	<div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fa-solid fa-sliders"></i> <?=translate('website_settings')?></h4>
            </header>
            <?php echo form_open_multipart('saas/websiteSettingsSave', array('class' => 'form-horizontal  frm-submit-data')); ?>
                <div class="panel-body">
                    <!-- Progressive Web Apps -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs">Progressive Web Apps (PWA)</h5>
                            <div class="mt-lg pb-md">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('enable')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <?php
                                        $array = array(
                                            '0' => translate('no'),
                                            '1' => translate('yes'),
                                        );
                                        echo form_dropdown("pwa_enable", $array, set_value('pwa_enable', $config['pwa_enable']), "class='form-control' data-plugin-selectTwo data-minimum-results-for-search='Infinity' id='termsConditions'
                                        data-width='100%' ");
                                        ?>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="panel pg-fw mb-md">
                        <div class="panel-body theme_option">
                            <h5 class="chart-title mb-xs">Theme Options</h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Primary Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="primary_color" value="<?php echo set_value('primary_color', $config['primary_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Heading Text Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="heading_text_color" value="<?php echo set_value('heading_text_color', $config['heading_text_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Text Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="text_color" value="<?php echo set_value('text_color', $config['text_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Menu BG Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="menu_bg_color" value="<?php echo set_value('menu_bg_color', $config['menu_bg_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Menu Text Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="menu_text_color" value="<?php echo set_value('menu_text_color', $config['menu_text_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Footer BG Color <span class="required">*</span></label>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="complex-colorpicker form-control" name="footer_bg_color" value="<?php echo set_value('footer_bg_color', $config['footer_bg_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Footer Text Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="footer_text_color" value="<?php echo set_value('footer_text_color', $config['footer_text_color']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Footer Copyright BG Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="copyright_bg_color" value="<?php echo $config['copyright_bg_color'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Footer Copyright Text Color <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="complex-colorpicker form-control" name="copyright_text_color" value="<?php echo $config['copyright_text_color'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- general settings -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('social_links')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('facebook_url'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="facebook_url" value="<?php echo set_value('facebook_url', $global_config['facebook_url']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('twitter_url'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="twitter_url" value="<?php echo set_value('twitter_url', $global_config['twitter_url']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('linkedin_url'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="linkedin_url" value="<?php echo set_value('linkedin_url', $global_config['linkedin_url']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('instagram_url'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="instagram_url" value="<?php echo set_value('instagram_url', $global_config['instagram_url']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('youtube_url'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="youtube_url" value="<?php echo set_value('youtube_url', $global_config['youtube_url']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('google_plus'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="google_plus" value="<?php echo set_value('google_plus', $global_config['google_plus_url']); ?>" />
                                        <span class="error"><?php echo form_error('google_plus'); ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <!-- Slider Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('slider') . " " . translate('section')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('slider') . " " . translate('title')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="slider_title" value="<?php echo $config['slider_title'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('slider') . " " . translate('description')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <textarea type="text" rows="3" class="form-control" name="slider_description"><?php echo $config['slider_description'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Button Text 1</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="button_text_1" value="<?php echo htmlentities($config['button_text_1'])  ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Button Url 1</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="button_url_1" value="<?php echo htmlentities($config['button_url_1']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Button Text 2</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="button_text_2" value="<?php echo htmlentities($config['button_text_2']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Button Url 2</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="button_url_2" value="<?php echo htmlentities($config['button_url_2']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="old_slider_image" value="<?php echo $config['slider_image']; ?>">
                                        <input type="file" name="slider_image" class="dropify" data-height="150" data-default-file="<?php echo base_url('assets/frontend/images/saas/' . $config['slider_image']); ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo translate('background'); ?> <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="old_slider_bg_image" value="<?php echo $config['slider_bg_image']; ?>">
                                        <input type="file" name="slider_bg_image" class="dropify" data-height="150" data-default-file="<?php echo base_url('assets/frontend/images/saas/' . $config['slider_bg_image']); ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo translate('overly_image') . " " . translate('status'); ?></label>
                                    <div class="col-md-4">
                                        <div class="material-switch mt-xs">
                                            <input class="switch_menu" id="overly_image_status" name="overly_image_status" <?php echo $config['overly_image_status'] == 1 ? 'checked' : ''; ?> type="checkbox">
                                            <label for="overly_image_status" class="label-primary"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo translate('overly_image'); ?> <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="old_overly_image" value="<?php echo $config['overly_image']; ?>">
                                        <input type="file" name="overly_image" class="dropify" data-height="150" data-default-file="<?php echo base_url('assets/frontend/images/saas/' . $config['overly_image']); ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
              
                    <!-- feature Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('feature') . " " . translate('section')?> </h5>
                            <div class="mt-lg">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-6 mb-md">
                                        <div class="text-right">
                                            <a href="<?php echo base_url('saas/features') ?>" class="btn btn-default btn-circle"><i class="fas fa-plus"></i> <?=translate('add') . " " . translate('feature')?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('feature') . " " . translate('title')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="feature_title" value="<?php echo $config['feature_title'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('feature') . " " . translate('description')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <textarea type="text" rows="3" class="form-control" name="feature_description"><?php echo $config['feature_description'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- price Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('price') . " " . translate('section')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('price') . " " . translate('title')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="price_plan_title" value="<?php echo $config['price_plan_title'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('price') . " " . translate('description')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <textarea type="text" rows="3" class="form-control" name="price_plan_description"><?php echo $config['price_plan_description'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('purchase') . " " . translate('button_text')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <input type="text" class="form-control" name="price_plan_button" value="<?php echo $config['price_plan_button'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- faq Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('faq') . " " . translate('section')?></h5>
                            <div class="mt-lg">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-6 mb-md">
                                        <div class="text-right">
                                            <a href="<?php echo base_url('saas/faqs') ?>" class="btn btn-default btn-circle"><i class="fas fa-plus"></i> <?=translate('add') . " " . translate('faq')?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('faq') . " " . translate('title')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="faq_title" value="<?php echo $config['faq_title'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('faq') . " " . translate('description')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <textarea type="text" rows="3" class="form-control" name="faq_description"><?php echo $config['faq_description'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- contact Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('contact') . " " . translate('section')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('contact') . " " . translate('title')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="contact_title" value="<?php echo $config['contact_title'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('contact') . " " . translate('description')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <textarea type="text" rows="3" class="form-control" name="contact_description"><?php echo $config['contact_description'] ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('contact') . " " . translate('button_text')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <input type="text" class="form-control" name="contact_button" value="<?php echo $config['contact_button'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('receive_contact_email')?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-lg">
                                        <input type="text" class="form-control" name="receive_contact_email" value="<?php echo $config['receive_contact_email'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Footer Setting -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('footer') . " " . translate('section')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('footer') . " " . translate('about')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="footer_about" value="<?php echo $config['footer_about'] ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('footer_copyright_text'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-md">
                                        <input type="text" class="form-control" name="footer_text" value="<?php echo set_value('footer_text', $global_config['footer_text']); ?>" />
                                        <span class="error"><?php echo form_error('footer_text'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?php echo translate('payment') . " " . translate('logo'); ?> <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="old_payment_logo" value="<?php echo $config['payment_logo']; ?>">
                                        <input type="file" name="payment_logo" class="dropify" data-height="150" data-default-file="<?php echo base_url('assets/frontend/images/saas/' . $config['payment_logo']); ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Terms and Conditions -->
                    <section class="panel pg-fw">
                        <div class="panel-body">
                            <h5 class="chart-title mb-xs"><?=translate('terms_and_conditions')?></h5>
                            <div class="mt-lg">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('enable')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <?php
                                        $array = array(
                                            '0' => translate('no'),
                                            '1' => translate('yes'),
                                        );
                                        echo form_dropdown("terms_status", $array, set_value('terms_status', $config['terms_status']), "class='form-control' data-plugin-selectTwo data-minimum-results-for-search='Infinity' id='termsStatus'
                                        data-width='100%' ");
                                        ?>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><?=translate('agree_checkbox') . " " . translate('text')?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control termsConditions" name="agree_checkbox_text" <?php echo $config['terms_status'] == 0 ? 'readonly' : '' ?> value="<?php echo htmlentities($config['agree_checkbox_text']) ?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label"><?php echo translate('terms_and_conditions') . " " . translate('text'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 mb-md">
                                        <textarea type="text" rows="4" class="form-control termsConditions" name="terms_and_conditions" <?php echo $config['terms_status'] == 0 ? 'readonly' : '' ?>><?php echo htmlentities($config['terms_and_conditions']) ?></textarea>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-3 col-sm-offset-4">
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
    $('#termsStatus').on('change', function(){
        if (this.value == 1) {
            $(".termsConditions").prop('readonly', false);
        } else {
            $(".termsConditions").prop('readonly', true);
        }
    });
</script>

<script type="text/javascript">
    $(".complex-colorpicker").asColorPicker({
        readonly: false,
        lang: 'en',
        mode: 'complex',
        color: {
            reduceAlpha: true,
            zeroAlphaAsTransparent: false
        },
    });
</script>