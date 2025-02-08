<?php $status = ($transactions['status'] == 1 ? '' : 'disabled'); ?>
<div class="row">
    <div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fas fa-funnel-dollar"></i> <?=translate('transactions') . " " . translate('default_account') ?></h4>
            </header>
            <?php echo form_open('school_settings/accountingLinksSave' . $url, array('class' => 'form-horizontal form-bordered frm-submit-msg')); ?>
                <div class="panel-body">
                    <div class="form-group mt-md">
                        <label class="col-md-3 control-label"><?=translate('deposit') . " " . translate('acccount')?> <span class="required">*</span></label>
                        <div class="col-md-6">
                            <?php
                            $accounts_list = $this->app_lib->getSelectByBranch('accounts', $branch_id);
                            echo form_dropdown("deposit", $accounts_list, $transactions['deposit'], "class='form-control account_id' $status data-plugin-selectTwo data-width='100%'");
                            ?>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?=translate('expense') . " " . translate('acccount')?> <span class="required">*</span></label>
                        <div class="col-md-6">
                            <?php
                            $accounts_list = $this->app_lib->getSelectByBranch('accounts', $branch_id);
                            echo form_dropdown("expense", $accounts_list, $transactions['expense'], "class='form-control account_id' $status data-plugin-selectTwo data-width='100%'");
                            ?>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6  mb-md">
                            <div class="checkbox-replace">
                                <label class="i-checks">
                                    <input type="checkbox" name="status" <?=$transactions['status'] == 1 ? 'checked' : ''; ?> id="cb_status"> <i></i> Enable / Disable
                                </label>
                            </div>
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
    $("input[type='checkbox']#cb_status").on("change", function() {
        if($(this).is(":checked")){
            $('.account_id').prop('disabled', false);
        } else {
            $('.account_id').prop('disabled', true);
        }
    });
</script>