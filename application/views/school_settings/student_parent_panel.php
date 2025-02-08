<div class="row">
    <div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
            <?php echo form_open('school_settings/student_parent_panel' . get_request_url(), array('class' => 'form-horizontal form-bordered frm-submit-msg')); ?>
            <header class="panel-heading">
                <h4 class="panel-title"><i class="fa-solid fa-users"></i> <?php echo translate('student_parent_panel'); ?></h4>
            </header>
            
            <div class="panel-body">  
                <section class="panel pg-fw">
                    <div class="panel-body">
                        <h5 class="chart-title mb-xs"><?php echo translate('user') . " " . translate('login'); ?></h5>
                        <div class="mt-md">
                            <div class="form-group mt-md">
                                <label class="col-md-3 control-label"><?php echo translate('student') . " " . translate('login'); ?> <span class="required">*</span></label>
                                <div class="col-md-7">
                                    <?php
                                        $arrayData = array(
                                            "1"  => translate('yes'),
                                            "0"  => translate('no'),
                                        );
                                        echo form_dropdown("student_login", $arrayData, set_value('student_login', $school['student_login']), "class='form-control'
                                        data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
                                    ?>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo translate('parent') . " " . translate('login'); ?> <span class="required">*</span></label>
                                <div class="col-md-7 mb-md">
                                    <?php
                                        $arrayData = array(
                                            "1"  => translate('yes'),
                                            "0"  => translate('no'),
                                        );
                                        echo form_dropdown("parent_login", $arrayData, set_value('parent_login', $school['parent_login']), "class='form-control'
                                        data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
                                    ?>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="panel pg-fw">
                    <div class="panel-body">
                        <h5 class="chart-title mb-xs"><?php echo translate('privacy'); ?></h5>
                        <div class="mt-md">
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="checkbox-replace">
                                        <label class="i-checks">
                                            <input type="checkbox" <?php echo $school['teacher_mobile_visible'] == 1 ? 'checked' : ''; ?> name="teacher_mobile_visible" id="teacher_mobile_visible"> <i></i> Teachers Mobile Number Visible.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-6 mb-md">
                                    <div class="checkbox-replace">
                                        <label class="i-checks">
                                            <input type="checkbox" <?php echo $school['teacher_email_visible'] == 1 ? 'checked' : ''; ?> name="teacher_email_visible" id="teacher_email_visible"> <i></i> Teachers Email Visible.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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

