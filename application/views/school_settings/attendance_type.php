<div class="row">
    <div class="col-md-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
        <section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('attendance_type')?></h4>
			</header>
			<?php echo form_open('school_settings/attendance_type' . get_request_url(), array('class' => 'form-horizontal form-bordered frm-submit-msg')); ?>
            <div class="panel-body">
                <div class="alert alert-info">Note: This change will not affect Super-admin role. You must log in as another role (Like: Admin, Teacher, etc) to check this affect.</div>
                <div class="mt-lg mb-lg">
                    <div class="form-group mb-md">
                        <label class="col-md-3 control-label"><?=translate('attendance_type');?></label>
                        <div class="col-md-6">
                            <?php
                            $attendanceType = array(
                                '0' => translate('day_wise'), 
                                '1' => translate('subject_wise'), 
                            );
                            echo form_dropdown("attendance_type", $attendanceType, set_value('attendance_type', $school['attendance_type']), "class='form-control' id='attendanceType' 
                            data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                            ?>
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