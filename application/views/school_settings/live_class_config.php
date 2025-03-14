<div class="row">
    <div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fas fa-cogs"></i> Zoom Account Config</h4>
            </header>
            <div class="panel-body">  
                <section class="panel pg-fw">
                    <div class="panel-body">
                        <h5 class="chart-title mb-xs"><?php echo translate('zoom_credentials') ?></h5>
                        <div class="mt-md">
                            <?php echo form_open('school_settings/liveClassSave' . $url, array('class' => 'form-horizontal form-bordered frm-submit-msg')); ?>
                                <input type="hidden" name="method" value="zoom">
                                <div class="form-group mt-md">
                                    <label class="col-md-3 control-label">SDK Client ID <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="zoom_api_key" value="<?=$config['zoom_api_key']?>" />
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">SDK Client Secret <span class="required">*</span></label>
                                    <div class="col-md-6 mb-md">
                                        <input type="text" class="form-control" name="zoom_api_secret" value="<?=$config['zoom_api_secret']?>" />
                                        <span class="error"></span>
                                    </div>
                                    <div class="col-md-offset-3 col-md-6 mb-md">
                                        <div class="checkbox-replace">
                                            <label class="i-checks">
                                                <input type="checkbox" name="staff_api_credential" id="staff_api_credential" <?=($config['staff_api_credential'] == 1 ? 'checked' : '');?>>
                                                <i></i> Each Staff API Credential
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-3 col-md-6 mb-md">
                                        <div class="checkbox-replace">
                                            <label class="i-checks">
                                                <input type="checkbox" name="student_api_credential" id="student_api_credential" <?=($config['student_api_credential'] == 1 ? 'checked' : '');?>>
                                                <i></i> Each Student API Credential
                                            </label>
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-md-2 col-sm-offset-3">
                                        <button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save');?>
                                        </button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </section>
                <section class="panel pg-fw">
                    <div class="panel-body">
                        <h5 class="chart-title mb-xs">OAuth</h5>
                        <div class="mt-md">
                            <p class="mb-xs"><?php echo translate('set_zoom_redirect_url') ?>:</p>
                            <div class="form-group mb-lg">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="redirectLink" name="affiliate_link" autocomplete="off" readonly="" value="<?php echo base_url('live_class/zoom_OAuth') ?>">
                                    <span class="input-group-addon">
                                        <span class="input-group-text">
                                            <a style="text-decoration: none;" href="javascript:void(0);" id="textCopy"><i class="fas fa-copy"></i></a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fas fa-cogs"></i> BigBlueButton Config</h4>
            </header>
            <?php echo form_open('school_settings/liveClassSave' . $url, array('class' => 'form-horizontal form-bordered frm-submit-msg')); ?>
                <input type="hidden" name="method" value="bbb">
                <div class="panel-body">
                    <div class="form-group mt-md">
                        <label class="col-md-3 control-label">Salt Key <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="bbb_salt_key" value="<?=$config['bbb_salt_key']?>" />
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Server Base URL <span class="required">*</span></label>
                        <div class="col-md-6 mb-md">
                            <input type="text" class="form-control" name="bbb_server_base_url" value="<?=$config['bbb_server_base_url']?>" />
                            <span class="error"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-2 col-sm-offset-3">
                            <button type="submit" class="btn btn btn-default btn-block" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save');?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<script type="text/javascript">
    $("#textCopy").on("click", function() {
        var copyText = document.getElementById("redirectLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);

        swal({
            toast: true,
            position: 'top-end',
            type: 'success',
            title: 'Link Copied.',
            confirmButtonClass: 'btn btn-default',
            buttonsStyling: false,
            timer: 8000
        });
    });
</script>