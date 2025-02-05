<?php
$url = '';
if ($this->input->get('type')) {
   $url = '?type=' . $this->input->get('type', true);
}
?>
<div class="panel mailbox">
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li <?=$sub_page == 'saas/general_settings' ? 'class="active"' : '';?>><a href="<?=base_url('saas/settings_general')?>"><i class="fa-solid fa-sliders"></i> <?=translate('general') . " " . translate('settings')?></a></li>
            <li <?=$sub_page == 'saas/website_settings' ? 'class="active"' : '';?>><a href="<?=base_url('saas/website_settings')?>"><i class="fas fa-globe"></i> <?=translate('website') . " " . translate('settings')?></a></li>
            <li <?=$sub_page == 'saas/payment_gateway' ? 'class="active"' : '';?>><a href="<?=base_url('saas/settings_payment' . $url)?>"><i class="fas fa-dollar-sign"></i> <?=translate('payment_settings')?></a></li>
            <li <?=$sub_page == 'saas/emailconfig' || $sub_page == 'saas/emailtemplate' ? 'class="active"' : '';?>><a href="<?=base_url('saas/emailconfig' . $url)?>"><i class="far fa-envelope"></i> <?=translate('email_settings')?></a></li>
        </ul>
    </div>
</div>