
<!-- Main Container Starts -->
<div class="container px-md-0 main-container">
    <h3 class="main-heading2 mt-0"><?php echo $page_data['title']; ?></h3>
    <?php echo $page_data['description']; ?>
    <div class="box2 form-box position-relative">
    <button type="submit" class="btn btn-1 admission-status-btn" data-bs-toggle="modal" data-bs-target="#admissionModal"><i class="fa-solid fa-file-lines"></i> Check Addmision Status</button>
        <div class="tabs-panel tabs-product">
            <div class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#new-admission" role="tab" aria-controls="tab-details" aria-selected="true">New Admission</a>
            </div>
            <div class="tab-content clearfix">
                <div class="tab-pane fade show active" id="new-admission" role="tabpanel" aria-labelledby="tab-new-admission">
                    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal frm-submit-data')); ?>
                        <?php $section = $this->student_fields_model->getOnlineStatus('section', $branchID); ?>
                        <div class="headers-line mt-3"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 11.4999H7M6 15.4999H7M17 15.4999H18M17 11.4999H18M11.5 11.4999H12.5M10 20.9999V16.9999C10 15.8954 10.8954 14.9999 12 14.9999C13.1046 14.9999 14 15.8954 14 16.9999V20.9999M17 7.49995L18.5761 7.89398C19.4428 8.11064 19.8761 8.21898 20.1988 8.46057C20.4834 8.67373 20.7061 8.95895 20.8439 9.28682C21 9.65843 21 10.1051 21 10.9984V17.7999C21 18.9201 21 19.4801 20.782 19.9079C20.5903 20.2843 20.2843 20.5902 19.908 20.782C19.4802 20.9999 18.9201 20.9999 17.8 20.9999H6.2C5.0799 20.9999 4.51984 20.9999 4.09202 20.782C3.71569 20.5902 3.40973 20.2843 3.21799 19.9079C3 19.4801 3 18.9201 3 17.7999V10.9984C3 10.1051 3 9.65843 3.15613 9.28682C3.29388 8.95895 3.51657 8.67373 3.80124 8.46057C4.12389 8.21898 4.55722 8.11064 5.42388 7.89398L7 7.49995L9.85931 4.92657C10.6159 4.2456 10.9943 3.90512 11.4221 3.77598C11.799 3.66224 12.201 3.66224 12.5779 3.77598C13.0057 3.90512 13.3841 4.2456 14.1407 4.92657L17 7.49995Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> Academic Details</div>
                        <div class="row">
                            <div class="col-md-<?php echo $section['status'] == 1 ? '4' : '6' ?>">
                                <div class="form-group">
                                    <label>School Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="schoolname" value="<?php echo get_type_name_by_id('branch', $branchID, 'school_name'); ?>" readonly />
                                </div>
                            </div>
                            <div class="col-md-<?php echo $section['status'] == 1 ? '4' : '6' ?>">
                                <div class="form-group">
                                    <label class="control-label">Class <span class="required">*</span></label>
                                    <?php
                                        $arrayClass = $this->app_lib->getClass($branchID);
                                        echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' data-plugin-selectTwo onchange='getSectionByClass(this.value)'");
                                    ?>
                                    <span class="error"></span>
                                </div>
                            </div>
                        <?php if ($section['status']) { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Section<?php echo $section['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <?php
                                        $arraySection = $this->app_lib->getSections(set_value('class_id'), false);
                                        echo form_dropdown("section", $arraySection, set_value('section'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                    ?>
                                    <span class="error"></span>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <?php
                        $admission_date = $this->student_fields_model->getOnlineStatus('admission_date', $branchID);
                        $category = $this->student_fields_model->getOnlineStatus('category', $branchID);
                        $v = floatval($admission_date['status']) + floatval($category['status']);
                        $div = ($v == 0) ? 12 : floatval(12 / $v);
                        ?>
                        <div class="row">
                            <?php if ($admission_date['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="admission_date">Admission Date<?php echo $admission_date['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" data-plugin-datepicker name="admission_date" readonly value="<?php echo date('Y-m-d') ?>" id="admission_date" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($category['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="admission_date">Category<?php echo $category['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <?php
                                        $arrayCategory = $this->app_lib->getStudentCategory($branchID);
                                        echo form_dropdown("category", $arrayCategory, set_value('category_id'), "class='form-control'
                                        data-plugin-selectTwo data-width='100%' id='category_id' data-minimum-results-for-search='Infinity' ");
                                    ?>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="headers-line mt-3">   <svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path><path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path><path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path><path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path><path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path></g></svg> Student Details</div>
                        <div class="row">
                            <?php 
                            $last_name = $this->student_fields_model->getOnlineStatus('last_name', $branchID);
                            $gender = $this->student_fields_model->getOnlineStatus('gender', $branchID);

                            $v = (1 + floatval($last_name['status']) + floatval($gender['status']));
                            $div = ($v == 0) ? 12 : floatval(12 / $v);
                            ?>
                            <div class="col-md-<?php echo $div ?> mb-sm">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php if ($last_name['status']) { ?>
                            <div class="col-md-<?php echo $div ?> mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Last Name<?php echo $last_name['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="last_name" value="" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($gender['status']) { ?>
                            <div class="col-md-<?php echo $div ?> mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Gender<?php echo ($gender['required'] == 1 ? ' <span class="required">*</span>' : ''); ?></label>
                                    <?php
                                        $arrayGender = array(
                                            '' => translate('select'),
                                            'male' => translate('male'),
                                            'female' => translate('female')
                                        );
                                        echo form_dropdown("gender", $arrayGender, set_value('gender'), "class='form-control' data-plugin-selectTwo ");
                                    ?>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <?php 
                            $birthday = $this->student_fields_model->getOnlineStatus('birthday', $branchID);
                            $blood_group = $this->student_fields_model->getOnlineStatus('blood_group', $branchID);
                            $v = floatval($birthday['status']) + floatval($blood_group['status']);
                            $div = ($v == 0) ? 12 : floatval(12 / $v);
                            if ($birthday['status']) {
                            ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="birthday">Birthday<?php echo $birthday['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" data-plugin-datepicker name="birthday" readonly value="<?php echo set_value('birthday'); ?>" id="birthday" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($blood_group['status']) { ?>
                            <div class="col-md-<?php echo $div ?> mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Blood Group<?php echo $birthday['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <?php
                                        $bloodArray = $this->app_lib->getBloodgroup();
                                        echo form_dropdown("blood_group", $bloodArray, set_value("blood_group"), "class='form-control populate' data-plugin-selectTwo 
                                        data-width='100%' data-minimum-results-for-search='Infinity' ");
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <?php
                            $student_mobileno = $this->student_fields_model->getOnlineStatus('student_mobile_no', $branchID); 
                            $student_email = $this->student_fields_model->getOnlineStatus('student_email', $branchID); 
                            $v = floatval($student_mobileno['status']) + floatval($student_email['status']);
                            $div = ($v == 0) ? 12 : floatval(12 / $v);

                            if ($student_mobileno['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="mobile_no">Student Mobile No<?php echo $student_mobileno['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" name="student_mobile_no" class="form-control" value="<?php echo set_value('student_mobile_no'); ?>" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($student_email['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="email">Student Email<?php echo $student_email['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" name="student_email" class="form-control" value="" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <?php 
                        $mother_tongue = $this->student_fields_model->getOnlineStatus('mother_tongue', $branchID); 
                        $religion = $this->student_fields_model->getOnlineStatus('religion', $branchID); 
                        $caste = $this->student_fields_model->getOnlineStatus('caste', $branchID); 
                        ?>
                        <div class="row">
                            <?php if ($mother_tongue['status']) { ?>
                            <div class="col-md-4 mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Mother Tongue<?php echo $mother_tongue['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="mother_tongue" value="<?=set_value('mother_tongue')?>" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($religion['status']) { ?>
                            <div class="col-md-4 mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Religion<?php echo $religion['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="religion" value="<?=set_value('religion')?>" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($caste['status']) { ?>
                            <div class="col-md-4 mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Caste<?php echo $caste['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="caste" value="<?=set_value('caste')?>" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>


                        <?php
                        $current_address = $this->student_fields_model->getOnlineStatus('present_address', $branchID);
                        $permanent_address = $this->student_fields_model->getOnlineStatus('permanent_address', $branchID);
                        $div = 6;
                        if ($current_address['status'] == 0 || $permanent_address['status'] == 0) {
                            $div = 12;
                        }
                        ?>
                        <div class="row">
                            <?php if ($current_address['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Present Address<?php echo $current_address['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <textarea class="form-control" name="present_address" rows="2" placeholder="Enter Present Address"><?php echo set_value('address'); ?></textarea>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($permanent_address['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Permanent Address<?php echo $permanent_address['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <textarea class="form-control" name="permanent_address" rows="2" placeholder="Enter Permanent Address"><?php echo set_value('address'); ?></textarea>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php
                        $city = $this->student_fields_model->getOnlineStatus('city', $branchID);
                        $state = $this->student_fields_model->getOnlineStatus('state', $branchID);
                        $div = 6;
                        if ($city['status'] == 0 || $state['status'] == 0) {
                            $div = 12;
                        }
                        ?>
                        <div class="row">
                            <?php if ($city['status']) { ?>
                            <div class="col-md-<?php echo $div ?> mb-sm">
                                <div class="form-group">
                                    <label class="control-label">City<?php echo $city['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="city" value="<?=set_value('city')?>" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($state['status']) { ?>
                            <div class="col-md-<?php echo $div ?> mb-sm">
                                <div class="form-group">
                                    <label class="control-label">State<?php echo $state['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="state" value="<?=set_value('state')?>" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <!--custom fields details-->
                        <div class="row" id="customFields">
                            <?php echo render_online_custom_fields('student', $branchID); ?>
                        </div>

                        <?php
                        $student_photo = $this->student_fields_model->getOnlineStatus('student_photo', $branchID); 
                            if ($student_photo['status']) {
                                ?>
                        <div class="row">
                            <div class="col-md-12 mb-sm">
                                <div class="form-group">
                                    <label for="message">Student Photo<?php echo $student_photo['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <div class="custom-file">
                                        <input type="file" name="student_photo" class="custom-file-input" id="photoFile" accept=".jpg,.jpeg,.png,.bmp" onchange="changeCustomUploader(this)">
                                        <label class="custom-file-label" for="photoFile">Choose Photo file...</label>
                                    </div>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <?php }
                        $previous_school_details = $this->student_fields_model->getOnlineStatus('previous_school_details', $branchID); 
                        if ($previous_school_details['status']) {
                        ?>

                        <!-- previous school details -->
                        <div class="headers-line">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0" ></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0494 1.25H11.9506C11.2858 1.24997 10.7129 1.24994 10.2542 1.31161C9.76252 1.37771 9.29126 1.52677 8.90901 1.90901C8.52676 2.29126 8.3777 2.76252 8.31161 3.25416C8.24993 3.7129 8.24996 4.28577 8.25 4.95063L8.25 7.37804C8.01542 7.29512 7.76298 7.25001 7.5 7.25001H4.5C3.25736 7.25001 2.25 8.25737 2.25 9.50001V21.25H2C1.58579 21.25 1.25 21.5858 1.25 22C1.25 22.4142 1.58579 22.75 2 22.75H22C22.4142 22.75 22.75 22.4142 22.75 22C22.75 21.5858 22.4142 21.25 22 21.25H21.75V14.5C21.75 13.2574 20.7426 12.25 19.5 12.25H16.5C16.237 12.25 15.9846 12.2951 15.75 12.378L15.75 4.95064C15.75 4.28577 15.7501 3.71291 15.6884 3.25416C15.6223 2.76252 15.4732 2.29126 15.091 1.90902C14.7087 1.52677 14.2375 1.37771 13.7458 1.31161C13.2871 1.24994 12.7142 1.24997 12.0494 1.25ZM20.25 21.25V14.5C20.25 14.0858 19.9142 13.75 19.5 13.75H16.5C16.0858 13.75 15.75 14.0858 15.75 14.5V21.25H20.25ZM14.25 21.25V5.00001C14.25 4.2717 14.2484 3.80091 14.2018 3.45403C14.158 3.12873 14.0874 3.02677 14.0303 2.96967C13.9732 2.91258 13.8713 2.84197 13.546 2.79823C13.1991 2.7516 12.7283 2.75001 12 2.75001C11.2717 2.75001 10.8009 2.7516 10.454 2.79823C10.1287 2.84197 10.0268 2.91258 9.96967 2.96968C9.91258 3.02677 9.84197 3.12873 9.79823 3.45403C9.75159 3.80091 9.75 4.2717 9.75 5.00001V21.25H14.25ZM8.25 21.25V9.50001C8.25 9.08579 7.91421 8.75001 7.5 8.75001H4.5C4.08579 8.75001 3.75 9.08579 3.75 9.50001V21.25H8.25Z" fill="currentColor"></path> </g></svg> <?=translate('previous_school_details')?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-sm">
                                <div class="form-group">
                                    <label class="control-label">School Name<?php echo $previous_school_details['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="school_name" value="" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-sm">
                                <div class="form-group">
                                    <label class="control-label">Qualification<?php echo $previous_school_details['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="qualification" value="" />
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-lg">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?=translate('remarks')?></label>
                                    <textarea name="previous_remarks" rows="2" class="form-control"></textarea>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php 
                        $guardian_name = $this->student_fields_model->getOnlineStatus('guardian_name', $branchID);
                        $guardian_relation = $this->student_fields_model->getOnlineStatus('guardian_relation', $branchID);
                        $father_name = $this->student_fields_model->getOnlineStatus('father_name', $branchID);
                        $mother_name = $this->student_fields_model->getOnlineStatus('mother_name', $branchID);
                        $guardian_occupation = $this->student_fields_model->getOnlineStatus('guardian_occupation', $branchID);
                        $guardian_income = $this->student_fields_model->getOnlineStatus('guardian_income', $branchID);
                        $guardian_education = $this->student_fields_model->getOnlineStatus('guardian_education', $branchID);
                        $guardian_email = $this->student_fields_model->getOnlineStatus('guardian_email', $branchID);
                        $guardian_mobile_no = $this->student_fields_model->getOnlineStatus('guardian_mobile_no', $branchID);
                        $guardian_address = $this->student_fields_model->getOnlineStatus('guardian_address', $branchID);
                        $guardian_photo = $this->student_fields_model->getOnlineStatus('guardian_photo', $branchID);
                        
                        if ($guardian_name['status'] || $guardian_relation['status'] || $father_name['status'] || $mother_name['status'] || $guardian_occupation['status'] || $guardian_income['status'] || $guardian_education['status'] || $guardian_email['status'] || $guardian_mobile_no['status'] || $guardian_address['status'] || $guardian_photo['status']) {
                        ?>
                        <div class="headers-line mt-3"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 1.25C9.37678 1.25 7.25013 3.37665 7.25013 6C7.25013 8.62335 9.37678 10.75 12.0001 10.75C14.6235 10.75 16.7501 8.62335 16.7501 6C16.7501 3.37665 14.6235 1.25 12.0001 1.25ZM8.75013 6C8.75013 4.20507 10.2052 2.75 12.0001 2.75C13.7951 2.75 15.2501 4.20507 15.2501 6C15.2501 7.79493 13.7951 9.25 12.0001 9.25C10.2052 9.25 8.75013 7.79493 8.75013 6Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 12.25C9.68658 12.25 7.55506 12.7759 5.97558 13.6643C4.41962 14.5396 3.25013 15.8661 3.25013 17.5L3.25007 17.602C3.24894 18.7638 3.24752 20.222 4.52655 21.2635C5.15602 21.7761 6.03661 22.1406 7.22634 22.3815C8.4194 22.6229 9.97436 22.75 12.0001 22.75C14.0259 22.75 15.5809 22.6229 16.7739 22.3815C17.9637 22.1406 18.8443 21.7761 19.4737 21.2635C20.7527 20.222 20.7513 18.7638 20.7502 17.602L20.7501 17.5C20.7501 15.8661 19.5807 14.5396 18.0247 13.6643C16.4452 12.7759 14.3137 12.25 12.0001 12.25ZM4.75013 17.5C4.75013 16.6487 5.37151 15.7251 6.71098 14.9717C8.02693 14.2315 9.89541 13.75 12.0001 13.75C14.1049 13.75 15.9733 14.2315 17.2893 14.9717C18.6288 15.7251 19.2501 16.6487 19.2501 17.5C19.2501 18.8078 19.2098 19.544 18.5265 20.1004C18.156 20.4022 17.5366 20.6967 16.4763 20.9113C15.4194 21.1252 13.9744 21.25 12.0001 21.25C10.0259 21.25 8.58087 21.1252 7.52393 20.9113C6.46366 20.6967 5.84425 20.4022 5.47372 20.1004C4.79045 19.544 4.75013 18.8078 4.75013 17.5Z" fill="currentColor"></path> </g></svg> Guardian Details</div>
                        <?php 
                        $div = 6;
                        if ($guardian_name['status'] == 0 || $guardian_relation['status'] == 0) {
                            $div = 12;
                        }
                        ?>
                        <div class="row">
                            <?php if ($guardian_name['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Guardian Name<?php echo $guardian_name['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="guardian_name" value="<?php echo set_value('guardian_name'); ?>" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($guardian_relation['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Relation<?php echo $guardian_relation['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" name="guardian_relation" class="form-control" value="<?php echo set_value('guardian_relation'); ?>" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php 
                        $div = 6;
                        if ($father_name['status'] == 0 || $mother_name['status'] == 0) {
                            $div = 12;
                        }
                        ?>
                        <div class="row">
                            <?php if ($father_name['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="father_name">Father Name<?php echo $father_name['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" name="father_name" class="form-control" value="<?php echo set_value('father_name'); ?>" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($mother_name['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label for="mother_name">Mother Name<?php echo $mother_name['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" name="mother_name" class="form-control" value="<?php echo set_value('mother_name'); ?>" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php 
                        $div = 6;
                        $v = floatval($guardian_occupation['status']) + floatval($guardian_income['status']) + floatval($guardian_education['status']);
                        $div = ($v == 0) ? 12 : floatval(12 / $v);
                        ?>
                        <div class="row">
                            <?php if ($guardian_occupation['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Occupation<?php echo $guardian_occupation['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="guardian_occupation" value="" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($guardian_income['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Income<?php echo $guardian_income['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input class="form-control" name="guardian_income" value="" type="text" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($guardian_education['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Education<?php echo $guardian_education['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="guardian_education" value="" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php 
                        $div = 6;
                        if ($guardian_email['status'] == 0 || $guardian_mobile_no['status'] == 0) {
                            $div = 12;
                        }
                        ?>
                        <div class="row">
                            <?php if ($guardian_email['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Guardian Email<?php echo $guardian_email['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="guardian_email" value="" autocomplete="off">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($guardian_mobile_no['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Guardian Mobile No<?php echo $guardian_mobile_no['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input type="text" class="form-control" name="guardian_mobile_no" value="" autocomplete="off" />
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php $guardian_address = $this->student_fields_model->getOnlineStatus('guardian_address', $branchID); 
                            if ($guardian_address['status']) { 
                                ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Guardian Address <?php echo $guardian_address['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <textarea class="form-control" name="guardian_address" placeholder="Enter Address"><?php echo set_value('grd_address'); ?></textarea>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php
                        $guardian_city = $this->student_fields_model->getOnlineStatus('guardian_city', $branchID);
                        $guardian_state = $this->student_fields_model->getOnlineStatus('guardian_state', $branchID);
                        $div = 6;
                        if ($guardian_city['status'] == 0 || $guardian_state['status'] == 0) {
                            $div = 12;
                        }
                        ?>
                        <div class="row">
                            <?php if ($guardian_city['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Guardian City<?php echo $guardian_city['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input class="form-control" name="guardian_city" value="" type="text">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php } if ($guardian_state['status']) { ?>
                            <div class="col-md-<?php echo $div ?>">
                                <div class="form-group">
                                    <label class="control-label">Guardian State<?php echo $guardian_state['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <input class="form-control" name="guardian_state" value="" type="text">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                        <?php $guardian_photo = $this->student_fields_model->getOnlineStatus('guardian_photo', $branchID); 
                        if ($guardian_photo['status']) { 
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Guardian Photo<?php echo $guardian_photo['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="guardian_photo" id="guardianPhoto" accept=".jpg,.jpeg,.png,.bmp" onchange="changeCustomUploader(this)">
                                        <label class="custom-file-label" for="guardianPhoto">Choose Guardian Photo...</label>
                                    </div>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>

                        <?php $upload_documents = $this->student_fields_model->getOnlineStatus('upload_documents', $branchID); 
                        if ($upload_documents['status']) { 
                        ?>
                        <div class="headers-line mt-3"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9451 1.25H13.0549C14.4225 1.24998 15.5248 1.24996 16.3918 1.36652C17.2919 1.48754 18.0497 1.74643 18.6517 2.34835C18.9501 2.64682 19.1642 2.98363 19.319 3.35712C20.2511 3.47388 21.0336 3.73034 21.6517 4.3484C22.2536 4.95032 22.5125 5.70819 22.6335 6.6083C22.75 7.47527 22.75 8.57759 22.75 9.94518V14.0549C22.75 15.4225 22.75 16.5248 22.6335 17.3918C22.5125 18.2919 22.2536 19.0498 21.6517 19.6517C21.0336 20.2698 20.2511 20.5262 19.319 20.643C19.1642 21.0164 18.9501 21.3532 18.6517 21.6517C18.0497 22.2536 17.2919 22.5125 16.3918 22.6335C15.5248 22.75 14.4225 22.75 13.0549 22.75H10.9451C9.57754 22.75 8.47522 22.75 7.60825 22.6335C6.70814 22.5125 5.95027 22.2536 5.34835 21.6517C5.04991 21.3532 4.8358 21.0164 4.68101 20.643C3.74894 20.5262 2.96643 20.2698 2.34835 19.6517C1.74643 19.0498 1.48754 18.2919 1.36652 17.3918C1.24996 16.5248 1.24998 15.4225 1.25 14.0549V9.94518C1.24998 8.57759 1.24996 7.47527 1.36652 6.6083C1.48754 5.70819 1.74643 4.95032 2.34835 4.3484C2.96642 3.73034 3.74892 3.47388 4.68096 3.35712C4.83576 2.98363 5.04988 2.64682 5.34835 2.34835C5.95027 1.74643 6.70814 1.48754 7.60825 1.36652C8.47522 1.24996 9.57754 1.24998 10.9451 1.25ZM4.32844 4.94047C3.89082 5.04593 3.618 5.20007 3.40901 5.40906C3.13225 5.68583 2.9518 6.0744 2.85315 6.80817C2.75159 7.56352 2.75 8.56464 2.75 10.0001V14.0001C2.75 15.4355 2.75159 16.4366 2.85315 17.1919C2.9518 17.9257 3.13225 18.3143 3.40901 18.591C3.61801 18.8 3.89083 18.9542 4.32845 19.0596C4.24997 18.2484 4.24998 17.2535 4.25 16.0549V7.94512C4.24998 6.74652 4.24997 5.75169 4.32844 4.94047ZM19.6716 19.0596C20.1092 18.9542 20.382 18.8 20.591 18.591C20.8678 18.3143 21.0482 17.9257 21.1469 17.1919C21.2484 16.4366 21.25 15.4355 21.25 14.0001V10.0001C21.25 8.56464 21.2484 7.56352 21.1469 6.80817C21.0482 6.0744 20.8678 5.68583 20.591 5.40906C20.382 5.20007 20.1092 5.04593 19.6716 4.94047C19.75 5.75169 19.75 6.74653 19.75 7.94513V16.0549C19.75 17.2535 19.75 18.2484 19.6716 19.0596ZM7.80812 2.85315C7.07435 2.9518 6.68577 3.13225 6.40901 3.40901C6.13225 3.68577 5.9518 4.07435 5.85315 4.80812C5.75159 5.56347 5.75 6.56458 5.75 8V16C5.75 17.4354 5.75159 18.4365 5.85315 19.1919C5.9518 19.9257 6.13225 20.3142 6.40901 20.591C6.68577 20.8678 7.07435 21.0482 7.80812 21.1469C8.56347 21.2484 9.56458 21.25 11 21.25H13C14.4354 21.25 15.4365 21.2484 16.1919 21.1469C16.9257 21.0482 17.3142 20.8678 17.591 20.591C17.8678 20.3142 18.0482 19.9257 18.1469 19.1919C18.2484 18.4365 18.25 17.4354 18.25 16V8C18.25 6.56459 18.2484 5.56347 18.1469 4.80812C18.0482 4.07435 17.8678 3.68577 17.591 3.40901C17.3142 3.13225 16.9257 2.9518 16.1919 2.85315C15.4365 2.75159 14.4354 2.75 13 2.75H11C9.56458 2.75 8.56347 2.75159 7.80812 2.85315ZM8.25 9C8.25 8.58579 8.58579 8.25 9 8.25H15C15.4142 8.25 15.75 8.58579 15.75 9C15.75 9.41422 15.4142 9.75 15 9.75H9C8.58579 9.75 8.25 9.41422 8.25 9ZM8.25 13C8.25 12.5858 8.58579 12.25 9 12.25H15C15.4142 12.25 15.75 12.5858 15.75 13C15.75 13.4142 15.4142 13.75 15 13.75H9C8.58579 13.75 8.25 13.4142 8.25 13ZM8.25 17C8.25 16.5858 8.58579 16.25 9 16.25H12C12.4142 16.25 12.75 16.5858 12.75 17C12.75 17.4142 12.4142 17.75 12 17.75H9C8.58579 17.75 8.25 17.4142 8.25 17Z" fill="currentColor"></path> </g></svg> Upload Documents</div>
                        <div class="form-group">
                            <label for="message">Upload Documents<?php echo $upload_documents['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
                            <div class="custom-file">
                                <input type="file" name="upload_documents" class="custom-file-input" id="documentFile" onchange="changeCustomUploader(this)">
                                <label class="custom-file-label" for="documentFile">Choose file...</label>
                            </div>
                            <span class="error"></span>
                        </div>
                        <?php } ?>


                        <?php if ($cms_setting['captcha_status'] == 'enable'): ?>
                        <div class="form-group">
                            <?php echo $recaptcha['widget']; echo $recaptcha['script']; ?>
                            <span class="error"></span>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($page_data['terms_conditions_title'])) {?>
                        <div class="accordion mb-3" id="accordion-faqs">
                            <div class="card">
                                <div class="card-header" id="faq1">
                                    <h5 class="card-title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <a><?php echo $page_data['terms_conditions_title']; ?></a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="faq1" data-parent="#accordion-faqs">
                                    <div class="card-body">
                                        <?php echo $page_data['terms_conditions_description'] ?>
                                    </div>
                                </div>                 
                            </div>
                        </div>
                    <?php } ?>
                        <button type="submit" class="btn btn-1" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('submit')?></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed bottom-4 left-4">
   <a href="<?php echo base_url('home'); ?>" class="bg-black text-white rounded-full px-2 py-2 flex items-center gap-2 hover:bg-gray-800 transition-colors duration-200 shadow-lg">
   <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 9L8 12M8 12L11 15M8 12H16M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
       <span>Home</span>
   </a>
</div>
<!-- Modal -->
<div class="modal fade modal-lg" id="admissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('home/checkAdmissionStatus', array('class' => 'form-horizontal frm-submit-data')); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check Addmision Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mt-3 mb-3">
                    <label>Enter Your Reference Number <span class="required">*</span></label>
                    <input type="text" class="form-control" name="refno" id="refno" autocomplete="off">
                    <span class="error"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing" class="btn btn-primary">Check Now</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>