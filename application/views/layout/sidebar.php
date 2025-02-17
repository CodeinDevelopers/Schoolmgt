<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Main
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <!-- dashboard -->
                    <?php if (is_superadmin_loggedin()) { ?>
                    <li class="nav-parent <?php if ($main_menu == 'dashboard') echo 'nav-active nav-expanded';?>">
                        <a>
                        <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="SVGRepo_iconCarrier">
                                        <title>Dashboard</title>
                                        <g id="Dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="Container" x="0" y="0" width="24" height="24"> </rect>
                                            <rect id="shape-1" stroke="currentColor" stroke-width="2" stroke-linecap="round" x="4" y="4" width="16" height="16" rx="2"> </rect>
                                            <line x1="4" y1="9" x2="20" y2="9" id="shape-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"> </line>
                                            <line x1="9" y1="10" x2="9" y2="20" id="shape-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"> </line>
                                        </g>
                                    </g>
                                </svg> <span><?=translate('dashboard')?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php $school_id = $this->input->get('school_id'); ?>
                            <li class="<?php if ($main_menu == 'dashboard' && empty($school_id)) echo 'nav-active';?>">
                                <a href="<?=base_url('dashboard')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i> <?=translate('all_branches')?></span>
                                </a>
                            </li>
                            <?php
                                $branches = $this->db->get('branch')->result();
                                foreach($branches as $row){
                            ?>
                                <li class="<?php if ($school_id == $row->id) echo 'nav-active';?>">
                                    <a href="<?=base_url('dashboard/index?school_id='.$row->id)?>">
                                        <span><i class="fas fa-caret-right" aria-hidden="true"></i> <?=html_escape($row->name)?></span>
                                    </a>
                                </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } else { ?>
                            <li class="<?php if ($main_menu == 'dashboard') echo 'nav-active'; ?>">
                                <a href="<?=base_url('dashboard')?>">
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="SVGRepo_iconCarrier">
                                        <title>Dashboard</title>
                                        <g id="Dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="Container" x="0" y="0" width="24" height="24"> </rect>
                                            <rect id="shape-1" stroke="currentColor" stroke-width="2" stroke-linecap="round" x="4" y="4" width="16" height="16" rx="2"> </rect>
                                            <line x1="4" y1="9" x2="20" y2="9" id="shape-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"> </line>
                                            <line x1="9" y1="10" x2="9" y2="20" id="shape-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"> </line>
                                        </g>
                                    </g>
                                </svg> <span><?=translate('dashboard')?></span>
                                </a>
                            </li>
                    <?php } ?>
                      <!-- message -->
                    <li class="<?php if ($main_menu == 'message') echo 'nav-active';?>">
                        <a href="<?=base_url('communication/mailbox/inbox')?>">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="3" cy="3" r="3" transform="matrix(-1 0 0 1 22 2)" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M14 2.20004C13.3538 2.06886 12.6849 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 11.3151 21.9311 10.6462 21.8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </g>
                            </svg> <span><?=translate('message')?></span>
                        </a>
                    </li>

                    <?php
                    if (moduleIsEnabled('events')) {
                        if(get_permission('event', 'is_view') ||
                        get_permission('event_type', 'is_view')) {
                        ?>
                    <!-- event -->
                    <li class="nav-parent <?php if ($main_menu == 'event') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 -1 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>megaphone</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-204.000000, -308.000000)" fill="currentColor"> <path d="M234,332 L227,327 L227,315 L234,310 L234,332 L234,332 Z M225,326 L222,326 L222,316 L225,316 L225,326 L225,326 Z M220,326 L212,326 C210.012,326 206,325.418 206,321 C206,316.582 209.946,315.935 212,316 L220,316 L220,326 L220,326 Z M215,335 C215,335.553 214.552,336 214,336 L213,336 C212.448,336 212,335.553 212,335 L212,328 L215,328 L215,335 L215,335 Z M234,308 L225,314 L212,314 C207.582,314 204,316.582 204,321 C204,324.733 206.542,327.339 210,328 C210.045,328.27 210,336 210,336 C210,337.104 210.896,338 212,338 L215,338 C216.104,338 217,337.104 217,336 L217,328 L225,328 L234,334 C235.104,334 236,333.104 236,332 L236,310 C236,308.896 235.104,308 234,308 L234,308 Z" id="megaphone" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg> <span><?=translate('events')?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php } if (get_permission('event', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'event/index') echo 'nav-active';?>">
                                <a href="<?=base_url('event')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('events')?></span>
                                </a>
                            </li>
                            <?php if (get_permission('event_type', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'event/types') echo 'nav-active';?>">
                                <a href="<?=base_url('event/types')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('event_type')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    <?php
                    if (moduleIsEnabled('website')) {
                        if (get_permission('frontend_setting', 'is_view') ||
                            get_permission('frontend_menu', 'is_view') ||
                            get_permission('frontend_section', 'is_view') ||
                            get_permission('manage_page', 'is_view') ||
                            get_permission('frontend_slider', 'is_view') ||
                            get_permission('frontend_features', 'is_view') ||
                            get_permission('frontend_testimonial', 'is_view') ||
                            get_permission('frontend_services', 'is_view') ||
                            get_permission('frontend_gallery', 'is_view') ||
                            get_permission('frontend_gallery_category', 'is_view') ||
                            get_permission('frontend_news', 'is_view') ||
                            get_permission('frontend_faq', 'is_view')) {
                            ?>
                    <!-- Patient Details -->
                    <li class="nav-parent <?php if ($main_menu == 'frontend') echo 'nav-expanded nav-active'; ?>">
                        <a><svg fill="currentColor" viewBox="-1 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M16.417 9.57a7.917 7.917 0 1 1-8.144-7.908 1.758 1.758 0 0 1 .451 0 7.913 7.913 0 0 1 7.693 7.907zM5.85 15.838q.254.107.515.193a11.772 11.772 0 0 1-1.572-5.92h-3.08a6.816 6.816 0 0 0 4.137 5.727zM2.226 6.922a6.727 6.727 0 0 0-.511 2.082h3.078a11.83 11.83 0 0 1 1.55-5.89q-.249.083-.493.186a6.834 6.834 0 0 0-3.624 3.622zm8.87 2.082a14.405 14.405 0 0 0-.261-2.31 9.847 9.847 0 0 0-.713-2.26c-.447-.952-1.009-1.573-1.497-1.667a8.468 8.468 0 0 0-.253 0c-.488.094-1.05.715-1.497 1.668a9.847 9.847 0 0 0-.712 2.26 14.404 14.404 0 0 0-.261 2.309zm-.974 5.676a9.844 9.844 0 0 0 .713-2.26 14.413 14.413 0 0 0 .26-2.309H5.903a14.412 14.412 0 0 0 .261 2.31 9.844 9.844 0 0 0 .712 2.259c.487 1.036 1.109 1.68 1.624 1.68s1.137-.644 1.623-1.68zm4.652-2.462a6.737 6.737 0 0 0 .513-2.107h-3.082a11.77 11.77 0 0 1-1.572 5.922q.261-.086.517-.194a6.834 6.834 0 0 0 3.624-3.621zM11.15 3.3a6.82 6.82 0 0 0-.496-.187 11.828 11.828 0 0 1 1.55 5.89h3.081A6.815 6.815 0 0 0 11.15 3.3z"></path></g></svg> <?php echo translate('frontend'); ?></span></a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('frontend_setting', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/setting') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/setting'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('setting'); ?></span>
                                </a>
                            </li>
                       <?php } if(get_permission('frontend_menu', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/menu' || $sub_page == 'frontend/menu_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/menu'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('menu'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('frontend_section', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/section_home' ||
                                            $sub_page == 'frontend/section_doctors' ||
                                                $sub_page == 'frontend/section_appointment' ||
                                                    $sub_page == 'frontend/section_faq' ||
                                                        $sub_page == 'frontend/section_contact' ||
                                                            $sub_page == 'frontend/section_about' ||
                                                                $sub_page == 'frontend/section_services') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/section/index'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('page') . " " . translate('section'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('manage_page', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'frontend/content' || $sub_page == 'frontend/content_edit') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('frontend/content/index'); ?>">
                                            <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('manage') . " " . translate('page'); ?></span>
                                        </a>
                                    </li>
                            <?php } if(get_permission('frontend_slider', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/slider' || $sub_page == 'frontend/slider_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/slider'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('slider'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_features', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/features' || $sub_page == 'frontend/features_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/features'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('features'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_testimonial', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/testimonial' || $sub_page == 'frontend/testimonial_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/testimonial'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('testimonial'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_services', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/services' || $sub_page == 'frontend/services_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/services'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('service'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_faq', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/faq' || $sub_page == 'frontend/faq_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/faq/index'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('faq'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_gallery_category', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/gallery_category') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/gallery/category'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('gallery') . " " . translate('category'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_gallery', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/gallery' || $sub_page == 'frontend/gallery_edit' || $sub_page == 'frontend/gallery_album') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/gallery/index'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('gallery'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('frontend_news', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'frontend/news' || $sub_page == 'frontend/news_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('frontend/news/index'); ?>">
                                    <span><i class="fas fa-caret-right"></i><?php echo translate('news'); ?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    <!--attendance--->
                    <?php
                     
                    if (moduleIsEnabled('attendance')) {
                        if(get_permission('student_attendance', 'is_add') ||
                        get_permission('employee_attendance', 'is_add') ||
                        get_permission('exam_attendance', 'is_add')) {
                        ?>
                 
                  
             
                            <!-- attendance control -->
                            <li class="nav-parent <?php if ($main_menu == 'attendance') echo 'nav-expanded nav-active'; ?>">
                                <a>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M10.5 14L17 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M7 14H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M7 10.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M7 17.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M10.5 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M10.5 17.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        </g>
                                    </svg> <span><?=translate('attendance')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('student_attendance', 'is_add')) { 
                                $getAttendanceType = $this->app_lib->getAttendanceType();
                                if ($getAttendanceType == 2 || $getAttendanceType == 0) {
                                ?>
                            <li class="<?php if ($sub_page == 'attendance/student_entries') echo 'nav-active';?>">
                                <a href="<?=base_url('attendance/student_entry')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('student')?></span>
                                </a>
                            </li>
                            <?php } if ($getAttendanceType == 2 || $getAttendanceType == 1) { ?>
                            <li class="<?php if ($sub_page == 'attendance_period/index') echo 'nav-active';?>">
                                <a href="<?=base_url('attendance_period/index')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('subject_wise')?></span>
                                </a>
                            </li>
                            <?php } } if(get_permission('employee_attendance', 'is_add')) { ?>
                            <li class="<?php if ($sub_page == 'attendance/employees_entries') echo 'nav-active';?>">
                                <a href="<?=base_url('attendance/employees_entry')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('employee')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('exam_attendance', 'is_add')) { ?>
                            <li class="<?php if ($sub_page == 'attendance/exam_entries') echo 'nav-active';?>">
                                <a href="<?=base_url('attendance/exam_entry')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('exam')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } } ?>
                    <?php if ($this->app_lib->isExistingAddon('qrcode') && moduleIsEnabled('qr_code_attendance')) { 
                        if(get_permission('qr_code_student_attendance', 'is_add') ||
                            get_permission('qr_code_employee_attendance', 'is_add') ||
                                get_permission('qr_code_student_attendance_report', 'is_view') ||
                                get_permission('qr_code_employee_attendance_report', 'is_view') ) {
                            
                            include "qr_code_menu.php";

                         } } ?>


                    <?php
                    if (get_permission('student', 'is_view') ||
                    get_permission('student_disable_authentication', 'is_view')) {
                    ?>
                    <!-- student details -->
                    <li class="nav-parent <?php if ($main_menu == 'student') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                        <path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </g>
                                </svg> <span><?=translate('student_details')?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('student', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'student/view' || $sub_page == 'student/profile') echo 'nav-active';?>">
                                <a href="<?=base_url('student/view')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('student_list')?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('student_disable_authentication', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'student/disable_authentication') echo 'nav-active';?>">
                                <a href="<?=base_url('student/disable_authentication')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('login_deactivate')?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('disable_reason', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'student/disable_reason') echo 'nav-active';?>">
                                <a href="<?=base_url('student/disable_reason')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('deactivate_reason')?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php
                    if (moduleIsEnabled('homework')) {
                        if(get_permission('homework', 'is_view') ||
                        get_permission('evaluation_report', 'is_view')) {
                    ?>
                    <!-- Home work -->
                    <li class="nav-parent <?php if ($main_menu == 'homework') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 10.9112C3 10.8182 3 10.7717 3.00057 10.7303C3.0385 7.98021 4.94139 5.60803 7.61778 4.97443C7.65803 4.9649 7.70344 4.95481 7.79425 4.93463C7.87787 4.91605 7.91968 4.90675 7.96109 4.89775C10.6226 4.31875 13.3774 4.31875 16.0389 4.89775C16.0803 4.90675 16.1221 4.91605 16.2057 4.93463C16.2966 4.95481 16.342 4.9649 16.3822 4.97443C19.0586 5.60803 20.9615 7.98021 20.9994 10.7303C21 10.7717 21 10.8182 21 10.9112V16.3752C21 18.4931 19.529 20.3269 17.4615 20.7864C13.8644 21.5857 10.1356 21.5857 6.53853 20.7864C4.47101 20.3269 3 18.4931 3 16.3752V10.9112Z" stroke="currentColor" stroke-width="1.5"></path> <path opacity="0.5" d="M17.5 15.5V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M15.9585 4.5C15.7205 3.08114 14.4865 2 13 2H11C9.51353 2 8.27954 3.08114 8.0415 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M3 14C8.72979 16.5466 15.2702 16.5466 21 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M10 13H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <span><?=translate('homework')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('homework', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'homework/index' || $sub_page == 'homework/add' || $sub_page == 'homework/evaluate_list' || $sub_page == 'homework/edit') echo 'nav-active';?>">
                                <a href="<?=base_url('homework')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('homework')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('evaluation_report', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'homework/report') echo 'nav-active';?>">
                                <a href="<?=base_url('homework/report')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('evaluation_report')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    <?php
                    if (get_permission('student', 'is_add') ||
                        get_permission('multiple_import', 'is_add') ||
                        get_permission('online_admission', 'is_view') ||
                        get_permission('student_category', 'is_view')) { 
                            ?>
                    <!-- admission -->
                    <li class="nav-parent <?php if ($main_menu == 'admission') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M19.8284 3.17157C18.6569 2 16.7712 2 13 2H11C7.22876 2 5.34315 2 4.17157 3.17157C3 4.34315 3 6.22876 3 10V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg> <span><?=translate('admission')?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('student', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'student/add') echo 'nav-active';?>">
                                <a href="<?=base_url('student/add')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('create_admission')?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('online_admission', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'online_admission/index' || $sub_page =='online_admission/approved') echo 'nav-active';?>">
                                <a href="<?=base_url('online_admission/index')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('online_admission')?></span>
                                </a>
                            </li>
                        <?php } 
                        if (moduleIsEnabled('multi_class')) {
                            if(get_permission('multi_class', 'is_add')) { ?>

                            <li class="<?php if ($sub_page == 'multiclass/index') echo 'nav-active';?>">
                                <a href="<?=base_url('multiclass/index')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('multi_class')?></span>
                                </a>
                            </li>
                        <?php } } if(get_permission('multiple_import', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'student/multi_add') echo 'nav-active';?>">
                                <a href="<?=base_url('student/csv_import')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('multiple_import')?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('student_category', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'student/category') echo 'nav-active';?>">
                                <a href="<?=base_url('student/category')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('category')?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php
                    if(get_permission('classes', 'is_view') ||
                    get_permission('section', 'is_view') ||
                    get_permission('assign_class_teacher', 'is_view') ||
                    get_permission('subject', 'is_view') ||
                    get_permission('subject_class_assign', 'is_view') ||
                    get_permission('subject_teacher_assign', 'is_view') ||
                    get_permission('teacher_timetable', 'is_view') ||
                    get_permission('class_timetable', 'is_view')) {
                    ?>
                    <!-- academic -->
                    <li class="nav-parent <?php if ($main_menu == 'classes' ||
                                                        $main_menu == 'sections' ||
                                                            $main_menu == 'timetable' ||
                                                                $main_menu == 'subject' ||
                                                                    $main_menu == 'transfer') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M2 13H5.16026C6.06543 13 6.51802 13 6.91584 13.183C7.31367 13.3659 7.60821 13.7096 8.19729 14.3968L8.80271 15.1032C9.39179 15.7904 9.68633 16.1341 10.0842 16.317C10.482 16.5 10.9346 16.5 11.8397 16.5H12.1603C13.0654 16.5 13.518 16.5 13.9158 16.317C14.3137 16.1341 14.6082 15.7904 15.1973 15.1032L15.8027 14.3968C16.3918 13.7096 16.6863 13.3659 17.0842 13.183C17.482 13 17.9346 13 18.8397 13H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 7H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M10 10.5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg> <span><?=translate('academic')?></span>
                        </a>

                        <ul class="nav nav-children">
                            <?php
                            if(get_permission('classes', 'is_view') ||
                            get_permission('section', 'is_view') ||
                            get_permission('assign_class_teacher', 'is_view')) {
                            ?>
                            <!-- class -->
                            <li class="nav-parent <?php
                            if ($main_menu == 'classes' || $main_menu == 'sections' || $main_menu == 'class_teacher_allocation') echo 'nav-expanded nav-active'; ?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V18C2 19.8856 2 20.8284 2.58579 21.4142C3.17157 22 4.11438 22 6 22H8C9.88562 22 10.8284 22 11.4142 21.4142C12 20.8284 12 19.8856 12 18V17" stroke="currentColor" stroke-width="1.5"></path> <path d="M12 7H11C9.11438 7 8.17157 7 7.58579 7.58579C7 8.17157 7 9.11438 7 11V13C7 14.8856 7 15.8284 7.58579 16.4142C8.17157 17 9.11438 17 11 17H13C14.8856 17 15.8284 17 16.4142 16.4142C17 15.8284 17 14.8856 17 13V12" stroke="currentColor" stroke-width="1.5"></path> <path d="M12 6C12 4.11438 12 3.17157 12.5858 2.58579C13.1716 2 14.1144 2 16 2H18C19.8856 2 20.8284 2 21.4142 2.58579C22 3.17157 22 4.11438 22 6V8C22 9.88562 22 10.8284 21.4142 11.4142C20.8284 12 19.8856 12 18 12H16C14.1144 12 13.1716 12 12.5858 11.4142C12 10.8284 12 9.88562 12 8V6Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg>
                                    <span><?=translate('class') . " & ". translate('section')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('classes', 'is_view') ||  get_permission('section', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'classes/index' ||
                                                            $sub_page == 'classes/edit' ||
                                                                $sub_page == 'sections/index' ||
                                                                    $sub_page == 'sections/edit') echo 'nav-active';?>">
                                        <a href="<?=get_permission('classes', 'is_view') ? base_url('classes') : base_url('sections'); ?>">
                                            <span><?=translate('control_classes')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if(get_permission('assign_class_teacher', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'classes/teacher_allocation') echo 'nav-active';?>">
                                        <a href="<?=base_url('classes/teacher_allocation')?>">
                                            <span><?=translate('assign_class_teacher')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php
                            if(get_permission('subject', 'is_view') ||
                            get_permission('subject_class_assign', 'is_view') ||
                            get_permission('subject_teacher_assign', 'is_view')) {
                            ?>
                            <!-- subject -->
                            <li class="nav-parent <?php if ($main_menu == 'subject') echo 'nav-expanded';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8V16C20 18.8284 20 20.2426 19.1213 21.1213C18.2426 22 16.8284 22 14 22H10C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke="currentColor" stroke-width="1.5"></path> <path d="M8 7H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 10.5H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19.5 19H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <?=translate('subject')?>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('subject', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'subject/index' || $sub_page == 'subject/edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('subject/index')?>">
                                            <span><?=translate('subject')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('subject_class_assign', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'subject/class_assign') echo 'nav-active';?>">
                                        <a href="<?=base_url('subject/class_assign')?>">
                                            <span><?=translate('class_assign')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if(get_permission('class_timetable', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'timetable/viewclass' || $sub_page == 'timetable/update_classwise' || $sub_page == 'timetable/set_classwise') echo 'nav-active';?>">
                                <a href="<?=base_url('timetable/viewclass')?>">
                                    <span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 10V6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V10M4 10V15M4 10H9M20 10V15M20 10H15M4 15V18C4 19.1046 4.89543 20 6 20H9M4 15H9M20 15V18C20 19.1046 19.1046 20 18 20H15M20 15H15M9 15H15M9 15V10M9 15V20M15 15V10M15 15V20M9 10H15M9 20H15M10 7H14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('class') . " " . translate('schedule')?></span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if(get_permission('teacher_timetable', 'is_view')) { ?>
                            <!-- teacher timetable view -->
                            <li class="<?php if ($sub_page == 'timetable/teacherview') echo 'nav-active';?>">
                                <a href="<?=base_url('timetable/teacherview')?>">
                                    <span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="9" cy="9" r="2" stroke="currentColor" stroke-width="1.5"></circle> <path d="M13 15C13 16.1046 13 17 9 17C5 17 5 16.1046 5 15C5 13.8954 6.79086 13 9 13C11.2091 13 13 13.8954 13 15Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M19 12H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 9H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 15H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <?=translate('teacher')?>'s schedule</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if(get_permission('student_promotion', 'is_view')) { ?>
                            <!-- student promotion -->
                            <li class="<?php if ($sub_page == 'student_promotion/index') echo 'nav-active';?>">
                                <a href="<?=base_url('student_promotion')?>">
                                    <span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 8C8 5.17157 8 3.75736 8.87868 2.87868C9.75736 2 11.1716 2 14 2H15C17.8284 2 19.2426 2 20.1213 2.87868C21 3.75736 21 5.17157 21 8V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H14C11.1716 22 9.75736 22 8.87868 21.1213C8 20.2426 8 18.8284 8 16V8Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M8 19.5C5.64298 19.5 4.46447 19.5 3.73223 18.7678C3 18.0355 3 16.857 3 14.5V9.5C3 7.14298 3 5.96447 3.73223 5.23223C4.46447 4.5 5.64298 4.5 8 4.5" stroke="currentColor" stroke-width="1.5"></path> <path d="M14.5 16V8M14.5 8L17 10.5M14.5 8L12 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('promotion')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php
                    if(get_permission('exam', 'is_view') ||
                    get_permission('exam_term', 'is_view') ||
                    get_permission('mark_distribution', 'is_view') ||
                    get_permission('exam_hall', 'is_view') ||
                    get_permission('exam_timetable', 'is_view') ||
                    get_permission('exam_mark', 'is_view') ||
                    get_permission('generate_position', 'is_view') ||
                    get_permission('marksheet_template', 'is_view') ||
                    get_permission('exam_grade', 'is_view')) {
                    ?>
                    <!-- exam master -->
                    <li class="nav-parent <?php if ($main_menu == 'exam' || $main_menu == 'mark' || $main_menu == 'exam_timetable' || $main_menu == 'marksheet_template') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM2.75 16.1437V4.99792H1.25V16.1437H2.75ZM22.75 16.1437V4.93332H21.25V16.1437H22.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75Z" fill="currentColor"></path>
                                        <path d="M12 5.854V20.9999" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M5 9L9 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M5 13L9 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M19 13L15 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M19 5.5V9.51029C19 9.78587 19 9.92366 18.9051 9.97935C18.8103 10.035 18.6806 9.97343 18.4211 9.85018L17.1789 9.26011C17.0911 9.21842 17.0472 9.19757 17 9.19757C16.9528 9.19757 16.9089 9.21842 16.8211 9.26011L15.5789 9.85018C15.3194 9.97343 15.1897 10.035 15.0949 9.97935C15 9.92366 15 9.78587 15 9.51029V6.95002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg> <span><?=translate('exam_master')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if(get_permission('exam', 'is_view') ||
                            get_permission('exam_term', 'is_view') ||
                            get_permission('marksheet_template', 'is_view') ||
                            get_permission('mark_distribution', 'is_view') ||
                            get_permission('exam_hall', 'is_view')) {
                            ?>
                            <!-- exam -->
                            <li class="nav-parent <?php if ($main_menu == 'exam' || $main_menu == 'exam_term' || $main_menu == 'exam_hall' || $main_menu == 'marksheet_template') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6V19C4 20.6569 5.34315 22 7 22H17C18.6569 22 20 20.6569 20 19V9C20 7.34315 18.6569 6 17 6H4ZM4 6V5" stroke="currentColor" stroke-width="1.5"></path> <path d="M18 6.00002V6.75002H18.75V6.00002H18ZM15.7172 2.32614L15.6111 1.58368L15.7172 2.32614ZM4.91959 3.86865L4.81353 3.12619H4.81353L4.91959 3.86865ZM5.07107 6.75002H18V5.25002H5.07107V6.75002ZM18.75 6.00002V4.30604H17.25V6.00002H18.75ZM15.6111 1.58368L4.81353 3.12619L5.02566 4.61111L15.8232 3.0686L15.6111 1.58368ZM4.81353 3.12619C3.91638 3.25435 3.25 4.0227 3.25 4.92895H4.75C4.75 4.76917 4.86749 4.63371 5.02566 4.61111L4.81353 3.12619ZM18.75 4.30604C18.75 2.63253 17.2678 1.34701 15.6111 1.58368L15.8232 3.0686C16.5763 2.96103 17.25 3.54535 17.25 4.30604H18.75ZM5.07107 5.25002C4.89375 5.25002 4.75 5.10627 4.75 4.92895H3.25C3.25 5.9347 4.06532 6.75002 5.07107 6.75002V5.25002Z" fill="currentColor"></path> <path d="M8 12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 15.5H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <span><?=translate('exam')?></span>
                                </a>
                                <ul class="nav nav-children">
                                <?php } if (get_permission('exam', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/index') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam')?>">
                                            <span><?=translate('exam_setup')?></span>
                                        </a>
                                    </li>
                                    <?php if (get_permission('exam_term', 'is_view')) {  ?>
                                    <li class="<?php if ($sub_page == 'exam/term') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/term')?>">
                                            <span><?=translate('exam_term')?></span>
                                        </a>
                                    </li>
                                    <?php } if (get_permission('exam_hall', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/hall') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/hall')?>">
                                            <span><?=translate('exam_hall')?></span>
                                        </a>
                                    </li>
                                    <?php } if (get_permission('mark_distribution', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/mark_distribution') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/mark_distribution')?>">
                                            <span><?=translate('distribution')?></span>
                                        </a>
                                    </li>
                                    <?php } if (get_permission('marksheet_template', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'marksheet_template/index') echo 'nav-active';?>">
                                        <a href="<?=base_url('marksheet_template/index')?>">
                                            <span><?=translate('marksheet') . " " . translate('template')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php
                            if(get_permission('exam_timetable', 'is_view')) {
                            ?>
                            <!-- exam schedule -->
                            <li class="nav-parent <?php if ($main_menu == 'exam_timetable') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 10V6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V10M4 10V15M4 10H9M20 10V15M20 10H15M4 15V18C4 19.1046 4.89543 20 6 20H9M4 15H9M20 15V18C20 19.1046 19.1046 20 18 20H15M20 15H15M9 15H15M9 15V10M9 15V20M15 15V10M15 15V20M9 10H15M9 20H15M10 7H14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('exam') . " " . translate('schedule')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('exam_timetable', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'timetable/viewexam') echo 'nav-active';?>">
                                        <a href="<?=base_url('timetable/viewexam')?>">
                                            <span><?=translate('schedule')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('exam_timetable', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'timetable/set_examwise') echo 'nav-active';?>">
                                        <a href="<?=base_url('timetable/set_examwise')?>">
                                            <span><?=translate('add') . " " . translate('schedule')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php
                            if(get_permission('exam_mark', 'is_view') ||
                                get_permission('generate_position', 'is_view') ||
                                    get_permission('exam_grade', 'is_view')) {
                                        ?>
                            <!-- marks -->
                            <li class="nav-parent <?php if ($main_menu == 'mark') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M6 15.8L7.14286 17L10 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 8.8L7.14286 10L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 9L18 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16L18 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <span><?=translate('marks')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('exam_mark', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/marks_register') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/mark_entry')?>">
                                            <span><?=translate('mark_entries')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('generate_position', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/class_position') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/class_position')?>">
                                            <span><?=translate('generate_position')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('exam_grade', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/grade') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/grade')?>">
                                            <span><?=translate('grades_range')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php
                    if (moduleIsEnabled('online_exam')) {
                        if(get_permission('online_exam', 'is_view') ||
                        get_permission('question_bank', 'is_view') ||
                        get_permission('exam_result', 'is_view') ||
                        get_permission('position_generate', 'is_view') ||
                        get_permission('question_group', 'is_view')) {
                        ?>
                    <li class="nav-parent <?php if ($main_menu == 'onlineexam') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 16.7399V4.66994C22 3.46994 21.02 2.57994 19.83 2.67994H19.77C17.67 2.85994 14.48 3.92994 12.7 5.04994L12.53 5.15994C12.24 5.33994 11.76 5.33994 11.47 5.15994L11.22 5.00994C9.44 3.89994 6.26 2.83994 4.16 2.66994C2.97 2.56994 2 3.46994 2 4.65994V16.7399C2 17.6999 2.78 18.5999 3.74 18.7199L4.03 18.7599C6.2 19.0499 9.55 20.1499 11.47 21.1999L11.51 21.2199C11.78 21.3699 12.21 21.3699 12.47 21.2199C14.39 20.1599 17.75 19.0499 19.93 18.7599L20.26 18.7199C21.22 18.5999 22 17.6999 22 16.7399Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 5.48999V20.49" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.75 8.48999H5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.5 11.49H5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('online_exam')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('online_exam', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'onlineexam/index' || $sub_page == 'onlineexam/edit' || $sub_page == 'onlineexam/manage_question' || $sub_page == 'onlineexam/question_list') echo 'nav-active';?>">
                                <a href="<?=base_url('onlineexam')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('online_exam')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('question_bank', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'onlineexam/question' || $sub_page == 'onlineexam/question_add' || $sub_page == 'onlineexam/question_edit') echo 'nav-active';?>">
                                <a href="<?=base_url('onlineexam/question')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('question_bank')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('question_group', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'onlineexam/question_group') echo 'nav-active';?>">
                                <a href="<?=base_url('onlineexam/question_group')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('question_group')?></span>
                                </a>
                            </li>
                             <?php } if(get_permission('position_generate', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'onlineexam/position_generate') echo 'nav-active';?>">
                                <a href="<?=base_url('onlineexam/position_generate')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('position') . " " . translate('generate')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('exam_result', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'onlineexam/result') echo 'nav-active';?>">
                                <a href="<?=base_url('onlineexam/result')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('exam_result')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>

<!--------------------------------------------------------------------------------------------------->
                  
                    <?php
                    if (get_permission('parent', 'is_view') ||
                    get_permission('parent', 'is_add') ||
                    get_permission('parent_disable_authentication', 'is_view')) {
                    ?>
                    <!-- parents -->
                    <li class="nav-parent <?php if ($main_menu == 'parents') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="25px" height="25px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1,
                                                .cls-2 {
                                                    fill: none;
                                                    stroke: currentColor;
                                                    stroke-linecap: round;
                                                    stroke-width: 1.5px;
                                                }

                                                .cls-1 {
                                                    stroke-linejoin: round;
                                                }

                                                .cls-2 {
                                                    stroke-linejoin: bevel;
                                                }
                                            </style>
                                        </defs>
                                        <g id="ic-users-more">
                                            <path class="cls-1" d="M3,21l.79-2.88C5.1,13.39,8.55,11,12,11"></path>
                                            <circle class="cls-2" cx="12" cy="5.98" r="5"></circle>
                                            <circle class="cls-1" cx="17" cy="18" r="5"></circle>
                                            <circle class="cls-1" cx="17" cy="18" r="0.21"></circle>
                                            <circle class="cls-1" cx="14.35" cy="18" r="0.21"></circle>
                                            <circle class="cls-1" cx="19.48" cy="18" r="0.21"></circle>
                                        </g>
                                    </g>
                                </svg> <span><?=translate('parents')?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('parent', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'parents/view' || $sub_page == 'parents/profile') echo 'nav-active';?>">
                                <a href="<?=base_url('parents/view')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('parents_list')?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('parent', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'parents/add') echo 'nav-active';?>">
                                <a href="<?=base_url('parents/add')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('add_parent')?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('parent_disable_authentication', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'parents/disable_authentication') echo 'nav-active';?>">
                                <a href="<?=base_url('parents/disable_authentication')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('login_deactivate')?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php
                    if(get_permission('employee', 'is_view') ||
                    get_permission('employee', 'is_add') ||
                    get_permission('designation', 'is_view') ||
                    get_permission('designation', 'is_add') ||
                    get_permission('department', 'is_view') ||
                    get_permission('employee_disable_authentication', 'is_view')) {
                    ?>
                    <!-- Employees -->
                    <li class="nav-parent <?php if ($main_menu == 'employee') echo 'nav-expanded nav-active'; ?>">
                        <a><svg fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 299.97 299.97" xml:space="preserve" width="27px" height="27px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M149.985,126.898c34.986,0,63.449-28.463,63.449-63.449C213.435,28.463,184.971,0,149.985,0S86.536,28.463,86.536,63.449 C86.536,98.436,114.999,126.898,149.985,126.898z M149.985,15.15c26.633,0,48.299,21.667,48.299,48.299 s-21.667,48.299-48.299,48.299s-48.299-21.667-48.299-48.299S123.353,15.15,149.985,15.15z"></path>
                                                    <path d="M255.957,271.919l-20.807-86.313c-2.469-10.244-11.553-17.399-22.093-17.399c-13.216,0-114.332,0-126.145,0 c-10.538,0-19.623,7.155-22.093,17.399l-20.807,86.313c-3.444,14.289,7.377,28.051,22.093,28.051h167.76 C248.563,299.97,259.407,286.229,255.957,271.919z M66.105,284.82c-4.898,0-8.513-4.581-7.364-9.35l20.807-86.314 c0.823-3.415,3.851-5.799,7.365-5.799H121.4l-9.553,67.577c-0.283,2,0.244,4.029,1.464,5.637l21.422,28.249H66.105z M127.291,249.932l9.411-66.574h26.567l9.411,66.574l-22.695,29.927L127.291,249.932z M233.865,284.82h-68.628l21.421-28.248 c1.22-1.609,1.747-3.638,1.464-5.637l-9.553-67.577h34.487c3.513,0,6.542,2.385,7.365,5.8l20.807,86.313 C242.377,280.235,238.769,284.82,233.865,284.82z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg> <span><?php echo translate('employee'); ?></span></a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('employee', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'employee/view' ||  $sub_page == 'employee/profile' ) echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/view'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('employee_list'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('department', 'is_view') || get_permission('department', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'employee/department') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/department'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('add_department'); ?></span>
                                </a>
                            </li>
                        <?php }  if(get_permission('designation', 'is_view') || get_permission('designation', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'employee/designation') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/designation'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('add_designation'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('employee', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'employee/add') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/add'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('add_employee'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('employee_disable_authentication', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'employee/disable_authentication') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('employee/disable_authentication'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('login_deactivate'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php
                    if (moduleIsEnabled('human_resource')) {
                        if(get_permission('salary_template', 'is_view') ||
                        get_permission('salary_assign', 'is_view') ||
                        get_permission('salary_payment', 'is_view') ||
                        get_permission('advance_salary_manage', 'is_view') ||
                        get_permission('advance_salary_request', 'is_view') ||
                        get_permission('leave_category', 'is_view') ||
                        get_permission('leave_category', 'is_add') ||
                        get_permission('leave_request', 'is_view') ||
                        get_permission('leave_manage', 'is_view') ||
                        get_permission('award', 'is_view')) {
                    ?>
                    <!-- human resource -->
                    <li class="nav-parent <?php if ($main_menu == 'payroll' || $main_menu == 'advance_salary' || $main_menu == 'leave' || $main_menu == 'award') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="27px" height="27px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 18.2C14.2091 18.2 16 16.4091 16 14.2C16 11.9908 14.2091 10.2 12 10.2C9.79086 10.2 8 11.9908 8 14.2C8 16.4091 9.79086 18.2 12 18.2Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.4399 14.2999L11.0899 14.9499C11.2799 15.1399 11.5899 15.1399 11.7799 14.9599L13.5599 13.3199" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.99995 22H15.9999C20.0199 22 20.7399 20.39 20.9499 18.43L21.6999 10.43C21.9699 7.99 21.2699 6 16.9999 6H6.99995C2.72995 6 2.02995 7.99 2.29995 10.43L3.04995 18.43C3.25995 20.39 3.97995 22 7.99995 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 6V5.2C8 3.43 8 2 11.2 2H12.8C16 2 16 3.43 16 5.2V6" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.65 11C19.92 12.26 18 13.14 16.01 13.64" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2.62 11.27C4.29 12.41 6.11 13.22 8 13.68" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('hrm')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if(get_permission('salary_template', 'is_view') ||
                            get_permission('salary_assign', 'is_view') ||
                            get_permission('salary_payment', 'is_view')) {
                            ?>
                            <!-- payroll -->
                            <li class="nav-parent <?php if($main_menu == 'payroll') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 9.5V14.5M18 9.5V14.5M3.11111 6H20.8889C21.5025 6 22 6.53726 22 7.2V16.8C22 17.4627 21.5025 18 20.8889 18H3.11111C2.49746 18 2 17.4627 2 16.8V7.2C2 6.53726 2.49746 6 3.11111 6ZM14.5 12C14.5 13.3807 13.3807 14.5 12 14.5C10.6193 14.5 9.5 13.3807 9.5 12C9.5 10.6193 10.6193 9.5 12 9.5C13.3807 9.5 14.5 10.6193 14.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> 
                                    <span><?=translate('payroll')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('salary_template', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'payroll/salary_templete' || $sub_page == 'payroll/salary_templete_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('payroll/salary_template')?>">
                                            <span><?=translate('salary_template')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('salary_assign', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'payroll/salary_assign') echo 'nav-active';?>">
                                        <a href="<?=base_url('payroll/salary_assign')?>">
                                            <span><?=translate('salary_assign')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('salary_payment', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'payroll/salary_payment' || $sub_page == 'payroll/create' || $sub_page == 'payroll/invoice') echo 'nav-active';?>">
                                        <a href="<?=base_url('payroll')?>">
                                            <span><?=translate('salary_payment')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php
                            if(get_permission('advance_salary_manage', 'is_view') ||
                            get_permission('advance_salary_request', 'is_view')) {
                            ?>
                            <!-- advance salary managements -->
                            <li class="nav-parent <?php
                            if ($main_menu == 'advance_salary') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="currentColor" d="M256 640v192h640V384H768v-64h150.976c14.272 0 19.456 1.472 24.64 4.288a29.056 29.056 0 0 1 12.16 12.096c2.752 5.184 4.224 10.368 4.224 24.64v493.952c0 14.272-1.472 19.456-4.288 24.64a29.056 29.056 0 0 1-12.096 12.16c-5.184 2.752-10.368 4.224-24.64 4.224H233.024c-14.272 0-19.456-1.472-24.64-4.288a29.056 29.056 0 0 1-12.16-12.096c-2.688-5.184-4.224-10.368-4.224-24.576V640h64z"></path><path fill="currentColor" d="M768 192H128v448h640V192zm64-22.976v493.952c0 14.272-1.472 19.456-4.288 24.64a29.056 29.056 0 0 1-12.096 12.16c-5.184 2.752-10.368 4.224-24.64 4.224H105.024c-14.272 0-19.456-1.472-24.64-4.288a29.056 29.056 0 0 1-12.16-12.096C65.536 682.432 64 677.248 64 663.04V169.024c0-14.272 1.472-19.456 4.288-24.64a29.056 29.056 0 0 1 12.096-12.16C85.568 129.536 90.752 128 104.96 128h685.952c14.272 0 19.456 1.472 24.64 4.288a29.056 29.056 0 0 1 12.16 12.096c2.752 5.184 4.224 10.368 4.224 24.64z"></path><path fill="currentColor" d="M448 576a160 160 0 1 1 0-320 160 160 0 0 1 0 320zm0-64a96 96 0 1 0 0-192 96 96 0 0 0 0 192z"></path></g></svg> 
                                    <span><?=translate('advance_salary')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('advance_salary_request', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'advance_salary/request') echo 'nav-active';?>">
                                        <a href="<?=base_url('advance_salary/request')?>">
                                            <span><?=translate('my_application')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('advance_salary_manage', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'advance_salary/index') echo 'nav-active';?>">
                                        <a href="<?=base_url('advance_salary')?>">
                                            <span><?=translate('manage_application')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php
                            if(get_permission('leave_category', 'is_view') ||
                            get_permission('leave_manage', 'is_view') ||
                            get_permission('leave_request', 'is_view')) {
                            ?>
                            <!-- leave managements -->
                            <li class="nav-parent <?php
                            if ($main_menu == 'leave') echo 'nav-expanded nav-active';?>">
                                <a>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8.53259 18.1345C8.20862 18.3926 8.15523 18.8644 8.41332 19.1884C8.67142 19.5123 9.14328 19.5657 9.46725 19.3076L8.53259 18.1345ZM13.7289 17.0001V16.2501C13.7225 16.2501 13.7162 16.2501 13.7099 16.2503L13.7289 17.0001ZM23.1912 17.7501C23.6054 17.7501 23.9412 17.4143 23.9412 17.0001C23.9412 16.5859 23.6054 16.2501 23.1912 16.2501V17.7501ZM9.46725 19.3076C10.6865 18.3363 12.1895 17.7893 13.7479 17.7498L13.7099 16.2503C11.825 16.2981 10.0073 16.9596 8.53259 18.1345L9.46725 19.3076ZM13.7289 17.7501H23.1912V16.2501H13.7289V17.7501Z" fill="currentColor"></path> <path d="M22.0375 7.26015L22.284 7.96848L22.285 7.96813L22.0375 7.26015ZM22.4795 5.72516L23.0656 5.25721L23.0651 5.25651L22.4795 5.72516ZM5.05367 11.7891L4.30369 11.7852L4.30369 11.7859L5.05367 11.7891ZM6.35366 12.7181L6.59958 13.4266L6.60016 13.4264L6.35366 12.7181ZM22.285 7.96813C22.5458 7.87697 22.7809 7.72464 22.9707 7.52391L21.8809 6.49333C21.8557 6.51992 21.8246 6.54009 21.79 6.55217L22.285 7.96813ZM22.9707 7.52391C23.1606 7.32318 23.2995 7.07989 23.3759 6.81442L21.9345 6.39936C21.9244 6.43452 21.906 6.46675 21.8809 6.49333L22.9707 7.52391ZM23.3759 6.81442C23.4524 6.54894 23.4641 6.26901 23.4101 5.99808L21.939 6.29124C21.9462 6.32713 21.9446 6.36421 21.9345 6.39936L23.3759 6.81442ZM23.4101 5.99808C23.3561 5.72715 23.238 5.4731 23.0656 5.25721L21.8934 6.19312C21.9163 6.22171 21.9319 6.25536 21.939 6.29124L23.4101 5.99808ZM23.0651 5.25651C21.7039 3.55587 19.849 2.31893 17.7559 1.71596L17.3407 3.15734C19.1358 3.67446 20.7266 4.7353 21.894 6.19382L23.0651 5.25651ZM17.7559 1.71596C15.6627 1.113 13.4341 1.17364 11.3768 1.88955L11.8698 3.30621C13.6342 2.69223 15.5455 2.64022 17.3407 3.15734L17.7559 1.71596ZM11.3768 1.88955C9.31948 2.60546 7.53466 3.94143 6.26799 5.71358L7.4883 6.58582C8.57464 5.06597 10.1054 3.9202 11.8698 3.30621L11.3768 1.88955ZM6.26799 5.71358C5.00131 7.48573 4.31506 9.60693 4.30369 11.7852L5.80366 11.793C5.81341 9.92487 6.40196 8.10567 7.4883 6.58582L6.26799 5.71358ZM4.30369 11.7859C4.30252 12.0623 4.36763 12.335 4.49355 12.581L5.82881 11.8976C5.81213 11.865 5.80351 11.8289 5.80366 11.7923L4.30369 11.7859ZM4.49355 12.581C4.61947 12.827 4.80254 13.0393 5.0274 13.1999L5.89951 11.9795C5.86973 11.9583 5.84549 11.9302 5.82881 11.8976L4.49355 12.581ZM5.0274 13.1999C5.25226 13.3606 5.51237 13.4651 5.78592 13.5045L5.99998 12.0199C5.96375 12.0147 5.9293 12.0008 5.89951 11.9795L5.0274 13.1999ZM5.78592 13.5045C6.05946 13.544 6.33848 13.5173 6.59958 13.4266L6.10774 12.0096C6.07317 12.0216 6.03621 12.0251 5.99998 12.0199L5.78592 13.5045ZM6.60016 13.4264L22.284 7.96848L21.791 6.55182L6.10717 12.0098L6.60016 13.4264Z" fill="currentColor"></path> <path d="M14.8925 9.71063C14.7387 9.32604 14.3022 9.13896 13.9177 9.29277C13.5331 9.44659 13.346 9.88305 13.4998 10.2676L14.8925 9.71063ZM16.3038 17.2786C16.4576 17.6632 16.894 17.8502 17.2786 17.6964C17.6632 17.5426 17.8503 17.1061 17.6965 16.7216L16.3038 17.2786ZM13.4998 10.2676L16.3038 17.2786L17.6965 16.7216L14.8925 9.71063L13.4998 10.2676Z" fill="currentColor"></path> <path d="M0.842114 21.5057C0.431041 21.4548 0.056556 21.7468 0.00567908 22.1579C-0.0451979 22.569 0.246799 22.9435 0.657872 22.9943L0.842114 21.5057ZM5.24995 20.75L5.80663 20.2474C5.67053 20.0967 5.4791 20.0076 5.27611 20.0005C5.07313 19.9934 4.87595 20.069 4.72967 20.2099L5.24995 20.75ZM11.9999 20.75L12.5566 20.2474C12.4144 20.0899 12.2121 20 11.9999 20C11.7877 20 11.5854 20.0899 11.4432 20.2474L11.9999 20.75ZM18.7498 20.75L19.2701 20.2099C19.1238 20.069 18.9267 19.9934 18.7237 20.0005C18.5207 20.0076 18.3293 20.0967 18.1932 20.2474L18.7498 20.75ZM20.8302 22.0089L21.0673 21.2974L20.8302 22.0089ZM23.287 23.0009C23.6985 22.9536 23.9938 22.5818 23.9465 22.1702C23.8993 21.7587 23.5274 21.4634 23.1159 21.5107L23.287 23.0009ZM0.657872 22.9943C1.58314 23.1088 2.5223 23.0153 3.40678 22.7204L2.93244 21.2974C2.25987 21.5216 1.54571 21.5928 0.842114 21.5057L0.657872 22.9943ZM3.40678 22.7204C4.29126 22.4256 5.09874 21.937 5.77024 21.2902L4.72967 20.2099C4.21904 20.7017 3.60502 21.0732 2.93244 21.2974L3.40678 22.7204ZM4.69327 21.2526C5.18991 21.8027 5.79646 22.2425 6.4737 22.5434L7.08288 21.1727C6.59742 20.957 6.16264 20.6418 5.80663 20.2474L4.69327 21.2526ZM6.4737 22.5434C7.15094 22.8444 7.88381 22.9999 8.62492 22.9999V21.5C8.09368 21.5 7.56834 21.3885 7.08288 21.1727L6.4737 22.5434ZM8.62492 22.9999C9.36604 22.9999 10.0989 22.8444 10.7761 22.5434L10.167 21.1727C9.6815 21.3885 9.15617 21.5 8.62492 21.5V22.9999ZM10.7761 22.5434C11.4534 22.2425 12.0599 21.8027 12.5566 21.2526L11.4432 20.2474C11.0872 20.6418 10.6524 20.957 10.167 21.1727L10.7761 22.5434ZM11.4432 21.2526C11.9399 21.8027 12.5464 22.2425 13.2236 22.5434L13.8328 21.1727C13.3474 20.957 12.9126 20.6418 12.5566 20.2474L11.4432 21.2526ZM13.2236 22.5434C13.9009 22.8444 14.6337 22.9999 15.3749 22.9999V21.5C14.8436 21.5 14.3183 21.3885 13.8328 21.1727L13.2236 22.5434ZM15.3749 22.9999C16.116 22.9999 16.8488 22.8444 17.5261 22.5434L16.9169 21.1727C16.4314 21.3885 15.9061 21.5 15.3749 21.5V22.9999ZM17.5261 22.5434C18.2033 22.2425 18.8099 21.8027 19.3065 21.2526L18.1932 20.2474C17.8372 20.6418 17.4024 20.957 16.9169 21.1727L17.5261 22.5434ZM18.2295 21.2902C18.9011 21.937 19.7085 22.4256 20.593 22.7204L21.0673 21.2974C20.3948 21.0732 19.7807 20.7017 19.2701 20.2099L18.2295 21.2902ZM20.593 22.7204C21.46 23.0094 22.3795 23.1051 23.287 23.0009L23.1159 21.5107C22.4258 21.5899 21.7266 21.5172 21.0673 21.2974L20.593 22.7204Z" fill="currentColor"></path> <path d="M10.9146 2.84426C11.0507 3.23548 11.4782 3.44232 11.8694 3.30625C12.2606 3.17018 12.4675 2.74272 12.3314 2.3515L10.9146 2.84426ZM11.6887 0.503828C11.5527 0.112606 11.1252 -0.094234 10.734 0.0418375C10.3428 0.177909 10.1359 0.605364 10.272 0.996586L11.6887 0.503828ZM12.3314 2.3515L11.6887 0.503828L10.272 0.996586L10.9146 2.84426L12.3314 2.3515Z" fill="currentColor"></path> </g></svg>
                                    <span><?=translate('leave')?></span>
                                </a>
                                <ul class="nav nav-children">
                                <?php if(get_permission('leave_category', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'leave/category') echo 'nav-active';?>">
                                        <a href="<?=base_url('leave/category')?>">
                                            <span><?=translate('category')?></span>
                                        </a>
                                    </li>
                                <?php } if(get_permission('leave_request', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'leave/request') echo 'nav-active';?>">
                                        <a href="<?=base_url('leave/request')?>">
                                            <span><?=translate('my_application')?></span>
                                        </a>
                                    </li>
                                <?php } if(get_permission('leave_manage', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'leave/index') echo 'nav-active';?>">
                                        <a href="<?=base_url('leave')?>">
                                            <span><?=translate('manage_application')?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if(get_permission('award', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'award/index' || $sub_page == 'award/edit') echo 'nav-active';?>">
                                 <a href="<?=base_url('award')?>">
                                 <svg viewBox="0 -1 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>award</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-256.000000, -412.000000)" fill="currentColor"> <path d="M281.98,424 L281.98,418 C285.932,418 285.973,417.791 285.973,420 C285.973,422.209 284.186,424 281.98,424 L281.98,424 Z M279.984,422 C279.984,426.418 276.41,432 272,432 C267.59,432 264.016,426.418 264.016,422 L264.016,416 C264.016,415.011 265.055,414 266.012,414 L277.988,414 C278.945,414 279.984,414.979 279.984,416 L279.984,422 L279.984,422 Z M262.02,424 C259.815,424 258.027,422.209 258.027,420 C258.027,417.791 258.068,418 262.02,418 L262.02,424 L262.02,424 Z M281.98,416 C281.98,413.791 280.193,412 277.988,412 L266.012,412 C263.807,412 262.02,413.791 262.02,416 C255.183,416 256.031,415.999 256.031,420 C256.031,423.313 258.712,426 262.02,426 C262.258,426 262.486,425.962 262.716,425.93 C264.056,429.854 267.213,433.389 271.002,433.928 L271.002,440 L268.008,440 C267.457,440 267.01,440.447 267.01,441 C267.01,441.553 267.457,442 268.008,442 L275.992,442 C276.543,442 276.99,441.553 276.99,441 C276.99,440.447 276.543,440 275.992,440 L272.998,440 L272.998,433.928 C276.787,433.389 279.944,429.854 281.285,425.93 C281.514,425.962 281.742,426 281.98,426 C285.288,426 287.969,423.313 287.969,420 C287.969,415.999 288.817,416 281.98,416 L281.98,416 Z" id="award" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg> 
                                     <span><?=translate('award')?></span>
                                 </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
           
            
                    <?php
                    if (moduleIsEnabled('student_accounting')) {
                        if(get_permission('fees_type', 'is_view') ||
                        get_permission('fees_group', 'is_view') ||
                        get_permission('fees_fine_setup', 'is_view') ||
                        get_permission('fees_allocation', 'is_view') ||
                        get_permission('invoice', 'is_view') ||
                        get_permission('due_invoice', 'is_view') ||
                        get_permission('offline_payments', 'is_view') ||
                        get_permission('offline_payments_type', 'is_view') ||
                        get_permission('fees_reminder', 'is_view')) {
                            $getOfflinePaymentsTotal = $this->application_model->getOfflinePaymentsTotal();
                        ?>
                    <!-- student accounting -->
                    <li class="nav-parent <?php if ($main_menu == 'fees' || $main_menu == 'offline_payments') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M17.4142 10.4142C18 9.82843 18 8.88562 18 7C18 5.11438 18 4.17157 17.4142 3.58579M17.4142 10.4142C16.8284 11 15.8856 11 14 11H10C8.11438 11 7.17157 11 6.58579 10.4142M17.4142 10.4142C17.4142 10.4142 17.4142 10.4142 17.4142 10.4142ZM17.4142 3.58579C16.8284 3 15.8856 3 14 3L10 3C8.11438 3 7.17157 3 6.58579 3.58579M17.4142 3.58579C17.4142 3.58579 17.4142 3.58579 17.4142 3.58579ZM6.58579 3.58579C6 4.17157 6 5.11438 6 7C6 8.88562 6 9.82843 6.58579 10.4142M6.58579 3.58579C6.58579 3.58579 6.58579 3.58579 6.58579 3.58579ZM6.58579 10.4142C6.58579 10.4142 6.58579 10.4142 6.58579 10.4142Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M13 7C13 7.55228 12.5523 8 12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M18 6C16.3431 6 15 4.65685 15 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M18 8C16.3431 8 15 9.34315 15 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M6 6C7.65685 6 9 4.65685 9 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M6 8C7.65685 8 9 9.34315 9 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M5 20.3884H7.25993C8.27079 20.3884 9.29253 20.4937 10.2763 20.6964C12.0166 21.0549 13.8488 21.0983 15.6069 20.8138C16.4738 20.6734 17.326 20.4589 18.0975 20.0865C18.7939 19.7504 19.6469 19.2766 20.2199 18.7459C20.7921 18.216 21.388 17.3487 21.8109 16.6707C22.1736 16.0894 21.9982 15.3762 21.4245 14.943C20.7873 14.4619 19.8417 14.462 19.2046 14.9433L17.3974 16.3084C16.697 16.8375 15.932 17.3245 15.0206 17.4699C14.911 17.4874 14.7962 17.5033 14.6764 17.5172M14.6764 17.5172C14.6403 17.5214 14.6038 17.5254 14.5668 17.5292M14.6764 17.5172C14.8222 17.486 14.9669 17.396 15.1028 17.2775C15.746 16.7161 15.7866 15.77 15.2285 15.1431C15.0991 14.9977 14.9475 14.8764 14.7791 14.7759C11.9817 13.1074 7.62942 14.3782 5 16.2429M14.6764 17.5172C14.6399 17.525 14.6033 17.5292 14.5668 17.5292M14.5668 17.5292C14.0434 17.5829 13.4312 17.5968 12.7518 17.5326" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <rect x="2" y="14" width="3" height="8" rx="1.5" stroke="currentColor" stroke-width="1.5"></rect>
                                        </g>
                                    </svg> <span><?=translate('student_accounting') .$getOfflinePaymentsTotal; ?></span>
                        </a>
                        <ul class="nav nav-children">

                            <?php if(get_permission('offline_payments', 'is_view') || get_permission('offline_payments_type', 'is_view')) { ?>
                            <li class="nav-parent <?php if ($main_menu == 'offline_payments') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 19C9 19.75 8.79 20.46 8.42 21.06C7.73 22.22 6.46 23 5 23C3.54 23 2.27 22.22 1.58 21.06C1.21 20.46 1 19.75 1 19C1 16.79 2.79 15 5 15C7.21 15 9 16.79 9 19Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3.44141 18.9995L4.43141 19.9895L6.56141 18.0195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.7514 7.04997C17.5114 7.00997 17.2614 6.99998 17.0014 6.99998H7.00141C6.72141 6.99998 6.45141 7.01998 6.19141 7.05998C6.33141 6.77998 6.53141 6.52001 6.77141 6.28001L10.0214 3.02C11.3914 1.66 13.6114 1.66 14.9814 3.02L16.7314 4.78996C17.3714 5.41996 17.7114 6.21997 17.7514 7.04997Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12V17C22 20 20 22 17 22H7.63C7.94 21.74 8.21 21.42 8.42 21.06C8.79 20.46 9 19.75 9 19C9 16.79 7.21 15 5 15C3.8 15 2.73 15.53 2 16.36V12C2 9.28 3.64 7.38 6.19 7.06C6.45 7.02 6.72 7 7 7H17C17.26 7 17.51 7.00999 17.75 7.04999C20.33 7.34999 22 9.26 22 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12.5H19C17.9 12.5 17 13.4 17 14.5C17 15.6 17.9 16.5 19 16.5H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('offline_payments')?> <?php echo $getOfflinePaymentsTotal ?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php  if(get_permission('offline_payments_type', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'offline_payments/type' || $sub_page == 'offline_payments/type_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('offline_payments/type')?>">
                                            <span><?=translate('payments') . " " . translate('type')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('offline_payments', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'offline_payments/history') echo 'nav-active';?>">
                                        <a href="<?=base_url('offline_payments/payments')?>">
                                            <span><?=translate(' offline_payments') . $getOfflinePaymentsTotal?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } if(get_permission('fees_type', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/type') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/type')?>"><span><i class="fas fa-caret-right"></i><?=translate('fees_type')?></span></a>
                            </li>
                            <?php } if(get_permission('fees_group', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/group') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/group')?>"><span><i class="fas fa-caret-right"></i><?=translate('fees_group')?></span></a>
                            </li>
                            <?php } if(get_permission('fees_fine_setup', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/fine_setup') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/fine_setup')?>"><span><i class="fas fa-caret-right"></i><?=translate('fine_setup')?></span></a>
                            </li>
                            <?php } if(get_permission('fees_allocation', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/allocation') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/allocation')?>"><span><i class="fas fa-caret-right"></i><?=translate('fees_allocation')?></span></a>
                            </li>
                            <?php } if(get_permission('invoice', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/invoice_list' || $sub_page == 'fees/collect') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/invoice_list')?>"><span><i class="fas fa-caret-right"></i><?=translate('payments_history')?></span></a>
                            </li>
                            <?php } if(get_permission('due_invoice', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/due_invoice') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/due_invoice')?>"><span><i class="fas fa-caret-right"></i><?=translate('due_fees_invoice')?></span></a>
                            </li>
                            <?php } if(get_permission('fees_reminder', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'fees/reminder') echo 'nav-active';?>">
                                <a href="<?=base_url('fees/reminder')?>"><span><i class="fas fa-caret-right"></i><?=translate('fees_reminder')?></span></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    <?php
                    if (moduleIsEnabled('office_accounting')) {
                        if(get_permission('account', 'is_view') ||
                        get_permission('voucher_head', 'is_view') ||
                        get_permission('deposit', 'is_view') ||
                        get_permission('expense', 'is_view') ||
                        get_permission('all_transactions', 'is_view')) {
                        ?>
                    <!-- office accounting -->
                    <li class="nav-parent <?php if ($main_menu == 'accounting') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M3 12C3 15.7712 3 19.6569 4.31802 20.8284C5.63604 22 7.75736 22 12 22C16.2426 22 18.364 22 19.682 20.8284C21 19.6569 21 15.7712 21 12" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M14.6603 14.2019L20.6676 12.3997C21.2631 12.2211 21.5609 12.1317 21.7498 11.9176C21.7866 11.8759 21.8199 11.8312 21.8492 11.784C22 11.5415 22 11.2307 22 10.6089C22 8.15877 22 6.9337 21.327 6.10659C21.1977 5.94763 21.0524 5.80233 20.8934 5.67298C20.0663 5 18.8412 5 16.3911 5H7.60893C5.15877 5 3.9337 5 3.10659 5.67298C2.94763 5.80233 2.80233 5.94763 2.67298 6.10659C2 6.9337 2 8.15877 2 10.6089C2 11.2307 2 11.5415 2.15078 11.784C2.18015 11.8312 2.21341 11.8759 2.25021 11.9176C2.43915 12.1317 2.7369 12.2211 3.3324 12.3997L9.33968 14.2019" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M6.5 5C7.32344 4.97913 8.15925 4.45491 8.43944 3.68032C8.44806 3.65649 8.4569 3.62999 8.47457 3.57697L8.50023 3.5C8.54241 3.37344 8.56351 3.31014 8.58608 3.254C8.87427 2.53712 9.54961 2.05037 10.3208 2.00366C10.3812 2 10.4479 2 10.5814 2H13.4191C13.5525 2 13.6192 2 13.6796 2.00366C14.4508 2.05037 15.1262 2.53712 15.4144 3.254C15.4369 3.31014 15.458 3.37343 15.5002 3.5L15.5259 3.57697C15.5435 3.62968 15.5524 3.65656 15.561 3.68032C15.8412 4.45491 16.6766 4.97913 17.5 5" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M14 12.5H10C9.72386 12.5 9.5 12.7239 9.5 13V15.1615C9.5 15.3659 9.62448 15.5498 9.8143 15.6257L10.5144 15.9058C11.4681 16.2872 12.5319 16.2872 13.4856 15.9058L14.1857 15.6257C14.3755 15.5498 14.5 15.3659 14.5 15.1615V13C14.5 12.7239 14.2761 12.5 14 12.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg> <span><?=translate('office_accounting')?></span>
                        </a>
                        <ul class="nav nav-children">
                            
                            <?php } if(get_permission('deposit', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'accounting/voucher_deposit' || $sub_page == 'accounting/voucher_deposit_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('accounting/voucher_deposit'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('new_deposit'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('expense', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'accounting/voucher_expense' || $sub_page == 'accounting/voucher_expense_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('accounting/voucher_expense'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('new_expense'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('all_transactions', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'accounting/all_transactions') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('accounting/all_transactions'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('all_transactions'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('voucher_head', 'is_view') || get_permission('voucher_head', 'is_add')){ ?>
                            <li class="<?php if ($sub_page == 'accounting/voucher_head') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('accounting/voucher_head'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('voucher') . " " . translate('head'); ?></span>
                                </a>
                            </li>
                            <?php if(get_permission('account', 'is_view')){ ?>
                                <li class="<?php if ($sub_page == 'accounting/index' || $sub_page == 'accounting/edit') echo 'nav-active'; ?>">
                                    <a href="<?php echo base_url('accounting'); ?>">
                                        <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('account'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    <?php
                    if (moduleIsEnabled('card_management')) {
                        if(get_permission('id_card_templete', 'is_view') ||
                        get_permission('generate_student_idcard', 'is_view') ||
                        get_permission('admit_card_templete', 'is_view') ||
                        get_permission('generate_admit_card', 'is_view') ||
                        get_permission('generate_employee_idcard', 'is_view')) {
                        ?>
                    <li class="nav-parent <?php if ($main_menu == 'card_manage') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M17 11V10C17 8.11438 17 7.17157 16.4142 6.58579C15.8284 6 14.8856 6 13 6H11C9.11438 6 8.17157 6 7.58579 6.58579C7 7.17157 7 8.11438 7 10V11" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M5 11H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M8 16H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg> <span><?=translate('card_management')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('id_card_templete', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'card_manage/id_card_templete' || $sub_page == 'card_manage/id_card_templete_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('card_manage/id_card_templete'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('id_card') . " " .  translate('templete'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('generate_student_idcard', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'card_manage/generate_student_idcard') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('card_manage/generate_student_idcard'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('student') . " " .  translate('id_card'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('generate_employee_idcard', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'card_manage/generate_employee_idcard') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('card_manage/generate_employee_idcard'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('employee') . " " .  translate('id_card'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('admit_card_templete', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'card_manage/admit_card_templete' || $sub_page == 'card_manage/admit_card_templete_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('card_manage/admit_card_templete'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('admit_card') . " " .  translate('templete'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('generate_admit_card', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'card_manage/generate_student_admitcard') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('card_manage/generate_student_admitcard'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('generate') . " " .  translate('admit_card'); ?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    
                    <?php
                    if (moduleIsEnabled('certificate')) {
                        if(get_permission('certificate_templete', 'is_view') ||
                        get_permission('generate_student_certificate', 'is_view') ||
                        get_permission('generate_employee_certificate', 'is_view')) {
                        ?>
                    <li class="nav-parent <?php if ($main_menu == 'certificate') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z" fill="currentColor"></path>
                                            <path d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22" stroke="currentColor" stroke-width="1.5"></path>
                                        </g>
                                    </svg> <span><?=translate('certificate')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('certificate_templete', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'certificate/index' || $sub_page == 'certificate/edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('certificate'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('certificate') . " " .  translate('templete'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('generate_student_certificate', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'certificate/generate_student') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('certificate/generate_student'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('generate') . " " .  translate('student'); ?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('generate_employee_certificate', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'certificate/generate_employee') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('certificate/generate_employee'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('generate') . " " .  translate('employee'); ?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                  
                    <?php 
                    $attendance_report = false;
                    if (get_permission('student_attendance_report', 'is_view') ||
                    get_permission('employee_attendance_report', 'is_view') ||
                    get_permission('exam_attendance_report', 'is_view')) {
                        $attendance_report = true;
                    }

                    if(get_permission('fees_reports', 'is_view') ||
                    get_permission('student', 'is_view') ||
                    get_permission('accounting_reports', 'is_view') ||
                    get_permission('inventory_report', 'is_view') ||
                    get_permission('salary_summary_report', 'is_view') ||
                    get_permission('leave_reports', 'is_view') ||
                    ($attendance_report == true) ||
                    get_permission('report_card', 'is_view') ||
                    get_permission('progress_reports', 'is_view') ||
                    get_permission('tabulation_sheet', 'is_view')) {
                    ?>
                    <!-- reports -->
                    <li class="nav-parent <?php if ($main_menu == 'accounting_repots' ||
                                                        $main_menu == 'student_repots' ||
                                                            $main_menu == 'fees_repots' ||
                                                                $main_menu == 'attendance_report' ||
                                                                    $main_menu == 'payroll_reports' ||
                                                                        $main_menu == 'leave_reports' ||
                                                                        $main_menu == 'inventory_report' ||
                                                                            $main_menu == 'exam_reports') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.2059 1.85619C16.1431 1.4375 15.116 1.72093 14.389 2.36753C13.6798 2.99824 13.25 3.96989 13.25 5.00003V9.00003C13.25 9.96653 14.0335 10.75 15 10.75H19C20.0301 10.75 21.0018 10.3202 21.6325 9.61103C22.2791 8.884 22.5625 7.85691 22.1438 6.79412C21.2558 4.53992 19.4601 2.74423 17.2059 1.85619ZM14.75 9.00003V5.00003C14.75 4.37331 15.0149 3.8183 15.3858 3.48838C15.7389 3.17435 16.1774 3.06319 16.6561 3.2518C18.5233 3.98737 20.0127 5.47673 20.7482 7.34392C20.9368 7.82268 20.8257 8.26109 20.5117 8.61418C20.1817 8.98514 19.6267 9.25003 19 9.25003H15C14.8619 9.25003 14.75 9.1381 14.75 9.00003Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9953 2.86997C10.3847 2.47444 9.79417 2.36057 9.1457 2.47365C8.59499 2.56967 8.00554 2.83384 7.37816 3.11499L7.31056 3.14528C6.78871 3.37898 6.28506 3.65696 5.80541 3.97745C4.11981 5.10374 2.80604 6.70457 2.03024 8.57751C1.25444 10.4505 1.05146 12.5114 1.44696 14.4997C1.84245 16.488 2.81867 18.3144 4.25216 19.7479C5.68565 21.1813 7.51202 22.1576 9.50033 22.5531C11.4886 22.9486 13.5496 22.7456 15.4225 21.9698C17.2955 21.194 18.8963 19.8802 20.0226 18.1946C20.3431 17.715 20.621 17.2113 20.8547 16.6895L20.885 16.6218C21.1662 15.9945 21.4303 15.405 21.5264 14.8543C21.6394 14.2059 21.5256 13.6153 21.1301 13.0048C20.7036 12.3466 20.1199 12.025 19.406 11.8792C18.7721 11.7498 17.98 11.7499 17.0722 11.75L15.5 11.75C14.536 11.75 13.8884 11.7484 13.4054 11.6835C12.9439 11.6214 12.7464 11.5142 12.6161 11.3839C12.4858 11.2536 12.3786 11.0561 12.3165 10.5946C12.2516 10.1116 12.25 9.46403 12.25 8.50002L12.25 6.92784C12.2501 6.02003 12.2502 5.22795 12.1208 4.59406C11.9751 3.88016 11.6534 3.29637 10.9953 2.86997ZM7.92364 4.51427C8.64284 4.19218 9.05972 4.01127 9.40336 3.95135C9.66896 3.90504 9.87762 3.93318 10.1797 4.12886C10.434 4.29366 10.5687 4.49038 10.6511 4.89407C10.7464 5.36104 10.75 5.99846 10.75 7.00002L10.75 8.55201C10.75 9.45048 10.7499 10.1997 10.8299 10.7945C10.9143 11.4223 11.1 11.9891 11.5555 12.4446C12.0109 12.9 12.5777 13.0857 13.2055 13.1701C13.8003 13.2501 14.5495 13.25 15.448 13.25L17 13.25C18.0016 13.25 18.639 13.2536 19.1059 13.3489C19.5096 13.4313 19.7064 13.566 19.8712 13.8204C20.0668 14.1224 20.095 14.3311 20.0487 14.5967C19.9887 14.9403 19.8078 15.3572 19.4858 16.0764C19.2863 16.5218 19.049 16.9518 18.7754 17.3613C17.8139 18.8002 16.4473 19.9217 14.8485 20.584C13.2496 21.2462 11.4903 21.4195 9.79296 21.0819C8.09563 20.7443 6.53653 19.9109 5.31282 18.6872C4.08911 17.4635 3.25575 15.9044 2.91813 14.2071C2.58051 12.5097 2.75379 10.7504 3.41606 9.15154C4.07833 7.55268 5.19983 6.18612 6.63876 5.22466C7.04824 4.95106 7.47817 4.71376 7.92364 4.51427Z" fill="currentColor"></path>
                                    </g>
                                </svg> <span><?=translate('reports')?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('report_card', 'is_view') || get_permission('tabulation_sheet', 'is_view') || get_permission('progress_reports', 'is_view')) { ?>
                            <li class="nav-parent <?php if ($main_menu == 'exam_reports') echo 'nav-expanded nav-active'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <span><?php echo translate('examination'); ?></span></a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('report_card', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/marksheet') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/marksheet')?>">
                                            <span><?=translate('report_card')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('tabulation_sheet', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam/tabulation_sheet') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam/tabulation_sheet')?>">
                                            <span><?=translate('tabulation_sheet')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('progress_reports', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'exam_progress/marksheet') echo 'nav-active';?>">
                                        <a href="<?=base_url('exam_progress/marksheet')?>">
                                            <span><?=translate('progress') . " " . translate('reports')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                            <?php if (get_permission('student', 'is_view')) { ?>
                            <li class="nav-parent <?php if ($main_menu == 'student_repots') echo 'nav-expanded nav-active'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <span><?php echo translate('student') . " " . translate('reports'); ?></span></a>
                                <ul class="nav nav-children">
                                    <li class="<?php if ($sub_page == 'student/login_credential_reports') echo 'nav-active';?>">
                                        <a href="<?=base_url('student/login_credential_reports')?>"><?=translate('login_credential')?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'student/admission_reports') echo 'nav-active';?>">
                                        <a href="<?=base_url('student/admission_reports')?>"><?=translate('admission_report')?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'student/classsection_reports') echo 'nav-active';?>">
                                        <a href="<?=base_url('student/classsection_reports')?>"><?=translate('class_&_section_report')?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'student/sibling_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('student/sibling_report')?>"><?=translate('sibling_report')?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php 
                        if (moduleIsEnabled('student_accounting')) {
                            if(get_permission('fees_reports', 'is_view')) { ?>
                            <li class="nav-parent <?php if ($main_menu == 'fees_repots') echo 'nav-expanded nav-active'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <span><?php echo translate('fees_reports'); ?></span></a>
                                <ul class="nav nav-children">
                                    <li class="<?php if ($sub_page == 'fees/student_fees_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('fees/student_fees_report')?>"><?=translate('fees_report')?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'fees/payment_history') echo 'nav-active';?>">
                                        <a href="<?=base_url('fees/payment_history')?>"><?=translate('receipts_report')?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'fees/due_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('fees/due_report')?>"><?=translate('due_fees_report')?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'fees/fine_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('fees/fine_report')?>"><?=translate('fine_report')?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php }} ?>
                        <?php 
                        if (moduleIsEnabled('office_accounting')) {
                            if(get_permission('accounting_reports', 'is_view')){ ?>
                            <li class="nav-parent <?php if ($main_menu == 'accounting_repots') echo 'nav-expanded nav-active'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <span><?php echo translate('financial_reports'); ?></span></a>
                                <ul class="nav nav-children">
                                    <li class="<?php if ($sub_page == 'accounting/account_statement') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('accounting/account_statement'); ?>"><?php echo translate('account') . " " . translate('statement'); ?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'accounting/income_repots') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('accounting/income_repots'); ?>"><?php echo translate('income') . " " . translate('repots'); ?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'accounting/expense_repots') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('accounting/expense_repots'); ?>"> <?php echo translate('expense') . " " . translate('repots'); ?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'accounting/transitions_repots') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('accounting/transitions_repots'); ?>">Account Statment</a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'accounting/balance_sheet') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('accounting/balance_sheet'); ?>"><?php echo translate('balance') . " " . translate('sheet'); ?></a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'accounting/income_vs_expense') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('accounting/incomevsexpense'); ?>"> <?php echo translate('income_vs_expense'); ?></a>
                                    </li>

                                </ul>
                            </li>
                        <?php }} ?>
                        <?php 
                        if (moduleIsEnabled('attendance')) {
                            if($attendance_report == true) { ?>
                            <li class="nav-parent <?php if ($main_menu == 'attendance_report') echo 'nav-expanded nav-active'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <span><?php echo translate('attendance_reports'); ?></span></a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('student_attendance_report', 'is_view')) { 
                                        if ($getAttendanceType == 2 || $getAttendanceType == 0) {
                                        ?>
                                    <li class="<?php if ($sub_page == 'attendance/student_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance/studentwise_report')?>">
                                            <?=translate('student') . ' ' . translate('reports')?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'attendance/student_classreport') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance/student_classreport')?>">
                                            <?=translate('student') . ' ' . translate('daily_reports')?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'attendance/studentwise_overview') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance/studentwise_overview')?>">
                                            <?=translate('student') . ' ' . translate('overview_reports')?>
                                        </a>
                                    </li>
                                <?php } if ($getAttendanceType == 2 || $getAttendanceType == 1) { ?>
                                    <li class="<?php if ($sub_page == 'attendance_period/reports') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance_period/reports')?>">
                                            <?=translate('subject_wise_reports') ?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'attendance_period/reportsbydate') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance_period/reportsbydate')?>">
                                            <?=translate('subject_wise_by') . ' ' . translate('day')?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'attendance_period/reportbymonth') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance_period/reportbymonth')?>">
                                            <?=translate('subject_wise_by') . ' ' . translate('month')?>
                                        </a>
                                    </li>
                                <?php } ?>
                                    <?php } if(get_permission('employee_attendance_report', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'attendance/employees_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance/employeewise_report')?>">
                                            <?=translate('employee') . ' ' . translate('reports')?>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('exam_attendance_report', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'attendance/exam_report') echo 'nav-active';?>">
                                        <a href="<?=base_url('attendance/examwise_report')?>">
                                            <?=translate('exam') . ' ' . translate('reports')?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } } ?>
                        <?php 
                        if (
                            moduleIsEnabled('human_resource')) {
                            if(get_permission('salary_summary_report', 'is_view') || get_permission('leave_reports', 'is_view')){ ?>
                            <li class="nav-parent <?php if ($main_menu == 'payroll_reports' || $main_menu == 'leave_reports') echo 'nav-expanded nav-active'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <span><?php echo translate('hrm'); ?></span></a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('salary_summary_report', 'is_view')){ ?>
                                    <li class="<?php if ($sub_page == 'payroll/salary_statement') echo 'nav-active';?>">
                                        <a href="<?=base_url('payroll/salary_statement')?>">
                                            <span><?=translate('payroll_summary')?></span>
                                        </a>
                                    </li>
                                    <?php } if (get_permission('leave_reports', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'leave/reports') echo 'nav-active';?>">
                                        <a href="<?=base_url('leave/reports')?>">
                                            <span><?=translate('leave') . " " . translate('reports')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php }} ?>
                       

                        <?php if(get_permission('inventory_report', 'is_view')){  ?>
                            <!-- Reports -->
                            <li class="nav-parent <?php if ($main_menu == 'inventory_report') echo 'nav-expanded'; ?>">
                                <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                                            </svg> <?php echo translate('inventory'); ?></a>
                                <ul class="nav nav-children">
                                    <li class="<?php if ($sub_page == 'inventory/stockreport') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('inventory/stockreport'); ?>">
                                            <?php echo translate('stock') . " " . translate('report'); ?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'inventory/purchase_report') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('inventory/purchase_report'); ?>">
                                            <?php echo translate('purchase') . " " . translate('report'); ?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'inventory/sales_report') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('inventory/sales_report'); ?>">
                                            <?php echo translate('sales') . " " . translate('report'); ?>
                                        </a>
                                    </li>
                                    <li class="<?php if ($sub_page == 'inventory/issues_report') echo 'nav-active'; ?>">
                                        <a href="<?php echo base_url('inventory/issues_report'); ?>">
                                            <?php echo translate('issues') . " " . translate('report'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>


                        </ul>
                    </li>
                    <?php } ?>
                    <?php 
                    if (moduleIsEnabled('live_class')) {
                        if(get_permission('live_class', 'is_view')) { ?>
                    <li class="nav-parent <?php if ($main_menu == 'live_class') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 12.2V13.9C20 17.05 18.2 18.4 15.5 18.4H6.5C3.8 18.4 2 17.05 2 13.9V8.5C2 5.35 3.8 4 6.5 4H9.2C9.07 4.38 9 4.8 9 5.25V9.15002C9 10.12 9.32 10.94 9.89 11.51C10.46 12.08 11.28 12.4 12.25 12.4V13.79C12.25 14.3 12.83 14.61 13.26 14.33L16.15 12.4H18.75C19.2 12.4 19.62 12.33 20 12.2Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 5.25V9.15002C22 10.64 21.24 11.76 20 12.2C19.62 12.33 19.2 12.4 18.75 12.4H16.15L13.26 14.33C12.83 14.61 12.25 14.3 12.25 13.79V12.4C11.28 12.4 10.46 12.08 9.89 11.51C9.32 10.94 9 10.12 9 9.15002V5.25C9 4.8 9.07 4.38 9.2 4C9.64 2.76 10.76 2 12.25 2H18.75C20.7 2 22 3.3 22 5.25Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.40002 22H14.6" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 18.3999V21.9999" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.4955 7.25H18.5045" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15.6957 7.25H15.7047" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12.8954 7.25H12.9044" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('live_class_rooms')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<?php if ($sub_page == 'live_class/index') echo 'nav-active';?>">
                                <a href="<?=base_url('live_class')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i> <?=translate('live_class_rooms')?></span>
                                </a>
                            </li>
                            <li class="<?php if ($sub_page == 'live_class/reports') echo 'nav-active';?>">
                                <a href="<?=base_url('live_class/reports')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i> <?=translate(' live_class_reports')?></span>
                                </a>
                            </li>
                         
                        </ul>
                    </li>
                    <?php }} ?>
                    <?php
                    if (moduleIsEnabled('attachments_book')) {
                        if(get_permission('attachments', 'is_view') ||
                        get_permission('attachment_type', 'is_view')) {
                        ?>
                    <!-- attachments upload -->
                    <li class="nav-parent <?php if ($main_menu == 'attachments') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.1999 11.8L10.7899 13.21C10.0099 13.99 10.0099 15.26 10.7899 16.04C11.5699 16.82 12.8399 16.82 13.6199 16.04L15.8399 13.82C17.3999 12.26 17.3999 9.72999 15.8399 8.15999C14.2799 6.59999 11.7499 6.59999 10.1799 8.15999L7.75988 10.58C6.41988 11.92 6.41988 14.09 7.75988 15.43" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('attachments_book')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('attachments', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'attachments/index') echo 'nav-active';?>">
                                <a href="<?=base_url('attachments')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('upload_content')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('attachment_type', 'is_view')) { ?>
                            <li class="<?php if ($sub_page == 'attachments/type') echo 'nav-active';?>">
                                <a href="<?=base_url('attachments/type')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('attachment_type')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                
               
                    <?php
                    if (moduleIsEnabled('hostel') || moduleIsEnabled('transport')) {
                    if(get_permission('hostel', 'is_view') ||
                    get_permission('hostel_category', 'is_view') ||
                    get_permission('hostel_room', 'is_view') ||
                    get_permission('hostel_allocation', 'is_view') ||
                    get_permission('transport_route', 'is_view') ||
                    get_permission('transport_vehicle', 'is_view') ||
                    get_permission('transport_stoppage', 'is_view') ||
                    get_permission('transport_assign', 'is_view') ||
                    get_permission('transport_allocation', 'is_view')) {
                    ?>
                    <!-- supervision -->
                    <li class="nav-parent <?php if ($main_menu == 'hostels' || $main_menu == 'transport') echo 'nav-expanded nav-active';?>">
                        <a>
                             <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.5 5.35C21.5 6.26 21.07 7.07 20.41 7.59C19.93 7.97 19.32 8.2 18.65 8.2C17.07 8.2 15.8 6.93 15.8 5.35C15.8 4.68 16.03 4.08 16.41 3.59H16.42C16.93 2.93 17.74 2.5 18.65 2.5C20.23 2.5 21.5 3.77 21.5 5.35Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.2 5.35C8.2 6.93 6.93 8.2 5.35 8.2C4.68 8.2 4.08 7.97 3.59 7.59C2.93 7.07 2.5 6.26 2.5 5.35C2.5 3.77 3.77 2.5 5.35 2.5C6.26 2.5 7.07 2.93 7.59 3.59C7.97 4.08 8.2 4.68 8.2 5.35Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.5 18.65C21.5 20.23 20.23 21.5 18.65 21.5C17.74 21.5 16.93 21.07 16.42 20.41H16.41C16.03 19.93 15.8 19.32 15.8 18.65C15.8 17.07 17.07 15.8 18.65 15.8C19.32 15.8 19.92 16.03 20.41 16.41V16.42C21.07 16.93 21.5 17.74 21.5 18.65Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.2 18.65C8.2 19.32 7.97 19.92 7.59 20.41C7.07 21.08 6.26 21.5 5.35 21.5C3.77 21.5 2.5 20.23 2.5 18.65C2.5 17.74 2.93 16.93 3.59 16.42V16.41C4.07 16.03 4.68 15.8 5.35 15.8C6.93 15.8 8.2 17.07 8.2 18.65Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.5 12C21.5 13.6 21.11 15.09 20.41 16.41C19.93 16.03 19.32 15.8 18.65 15.8C17.07 15.8 15.8 17.07 15.8 18.65C15.8 19.32 16.03 19.92 16.41 20.41C15.09 21.11 13.6 21.5 12 21.5C10.41 21.5 8.91 21.11 7.59 20.41C7.97 19.93 8.2 19.32 8.2 18.65C8.2 17.07 6.93 15.8 5.35 15.8C4.68 15.8 4.08 16.03 3.59 16.41C2.89 15.09 2.5 13.6 2.5 12C2.5 10.41 2.89 8.91 3.59 7.59C4.08 7.97 4.68 8.2 5.35 8.2C6.93 8.2 8.2 6.93 8.2 5.35C8.2 4.68 7.97 4.08 7.59 3.59C8.91 2.89 10.41 2.5 12 2.5C13.6 2.5 15.09 2.89 16.41 3.59C16.03 4.07 15.8 4.68 15.8 5.35C15.8 6.93 17.07 8.2 18.65 8.2C19.32 8.2 19.92 7.97 20.41 7.59C21.11 8.91 21.5 10.41 21.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('supervision')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if (moduleIsEnabled('hostel')) {
                                if(get_permission('hostel', 'is_view') ||
                                get_permission('hostel_category', 'is_view') ||
                                get_permission('hostel_room', 'is_view') ||
                                get_permission('hostel_allocation', 'is_view')) {
                                ?>
                            <!-- hostels -->
                            <li class="nav-parent <?php if ($main_menu == 'hostels') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 22H22" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 2H7C4 2 3 3.79 3 6V22H21V6C21 3.79 20 2 17 2Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 16.5H10" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 16.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 12H10" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 7.5H10" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 7.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('hostel')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php  if(get_permission('hostel', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'hostels/index' || $sub_page == 'hostels/edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('hostels')?>">
                                            <span><?=translate('hostel_master')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('hostel_room', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'hostels/room' || $sub_page == 'hostels/room_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('hostels/room')?>">
                                            <span><?=translate('hostel_room')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('hostel_category', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'hostels/category') echo 'nav-active';?>">
                                        <a href="<?=base_url('hostels/category')?>">
                                            <span><?=translate('category')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('hostel_allocation', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'hostels/allocation') echo 'nav-active';?>">
                                        <a href="<?=base_url('hostels/allocation_report')?>">
                                            <span><?=translate('allocation_report')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php }} ?>
                            <?php
                            if (moduleIsEnabled('transport')) {
                                if(get_permission('transport_route', 'is_view') ||
                                get_permission('transport_vehicle', 'is_view') ||
                                get_permission('transport_stoppage', 'is_view') ||
                                get_permission('transport_assign', 'is_view') ||
                                get_permission('transport_allocation', 'is_view')) {
                                ?>
                            <!-- transport -->
                            <li class="nav-parent <?php if ($main_menu == 'transport') echo 'nav-expanded nav-active';?>">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"fdfdfd><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 10C4 6.22876 4 4.34315 5.17157 3.17157C6.34315 2 8.22876 2 12 2C15.7712 2 17.6569 2 18.8284 3.17157C20 4.34315 20 6.22876 20 10V12C20 15.7712 20 17.6569 18.8284 18.8284C17.6569 20 15.7712 20 12 20C8.22876 20 6.34315 20 5.17157 18.8284C4 17.6569 4 15.7712 4 12V10Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M4 13H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15.5 16H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 16H8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 19.5V21C6 21.5523 6.44772 22 7 22H8.5C9.05228 22 9.5 21.5523 9.5 21V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 19.5V21C18 21.5523 17.5523 22 17 22H15.5C14.9477 22 14.5 21.5523 14.5 21V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20 9H21C21.5523 9 22 9.44772 22 10V11C22 11.3148 21.8518 11.6111 21.6 11.8L20 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 9H3C2.44772 9 2 9.44772 2 10V11C2 11.3148 2.14819 11.6111 2.4 11.8L4 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5 5H4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <span><?=translate('transport')?></span>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(get_permission('transport_route', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'transport/route' || $sub_page == 'transport/route_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('transport/route')?>">
                                            <span><?=translate('route_master')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('transport_vehicle', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'transport/vehicle' || $sub_page == 'transport/vehicle_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('transport/vehicle')?>">
                                            <span><?=translate('vehicle_master')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('transport_stoppage', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'transport/stoppage' || $sub_page == 'transport/stoppage_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('transport/stoppage')?>">
                                            <span><?=translate('stoppage')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('transport_assign', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'transport/assign' || $sub_page == 'transport/assign_edit') echo 'nav-active';?>">
                                        <a href="<?=base_url('transport/assign')?>">
                                            <span><?=translate('assign_vehicle')?></span>
                                        </a>
                                    </li>
                                    <?php } if(get_permission('transport_allocation', 'is_view')) { ?>
                                    <li class="<?php if ($sub_page == 'transport/allocation') echo 'nav-active';?>">
                                        <a href="<?=base_url('transport/report')?>">
                                            <span><?=translate('allocation_report')?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php }} ?>
                        </ul>
                    </li>
                    <?php }} ?>
                     
                    <?php
                    if (moduleIsEnabled('library')) {
                        if(get_permission('book', 'is_view') ||
                        get_permission('book_category', 'is_view') ||
                        get_permission('book_manage', 'is_view') ||
                        get_permission('book_request', 'is_view')) {
                    ?>
                    <!-- library -->
                    <li class="nav-parent <?php if ($main_menu == 'library') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19.5617 7C19.7904 5.69523 18.7863 4.5 17.4617 4.5H6.53788C5.21323 4.5 4.20922 5.69523 4.43784 7" stroke="currentColor" stroke-width="1.5"></path> <path d="M17.4999 4.5C17.5283 4.24092 17.5425 4.11135 17.5427 4.00435C17.545 2.98072 16.7739 2.12064 15.7561 2.01142C15.6497 2 15.5194 2 15.2588 2H8.74099C8.48035 2 8.35002 2 8.24362 2.01142C7.22584 2.12064 6.45481 2.98072 6.45704 4.00434C6.45727 4.11135 6.47146 4.2409 6.49983 4.5" stroke="currentColor" stroke-width="1.5"></path> <path d="M15 18H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2.38351 13.793C1.93748 10.6294 1.71447 9.04765 2.66232 8.02383C3.61017 7 5.29758 7 8.67239 7H15.3276C18.7024 7 20.3898 7 21.3377 8.02383C22.2855 9.04765 22.0625 10.6294 21.6165 13.793L21.1935 16.793C20.8437 19.2739 20.6689 20.5143 19.7717 21.2572C18.8745 22 17.5512 22 14.9046 22H9.09536C6.44881 22 5.12553 22 4.22834 21.2572C3.33115 20.5143 3.15626 19.2739 2.80648 16.793L2.38351 13.793Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg> <span><?=translate('library')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if (get_permission('book', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'library/book') echo 'nav-active';?>">
                                <a href="<?=base_url('library/book')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('books')?></span>
                                </a>
                            </li>
                            <?php } if (get_permission('book_category', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'library/category') echo 'nav-active';?>">
                                <a href="<?=base_url('library/category')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('books_category')?></span>
                                </a>
                            </li>
                            <?php } if (get_permission('book_request', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'library/request') echo 'nav-active';?>">
                                <a href="<?=base_url('library/request')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('my_issued_book')?></span>
                                </a>
                            </li>
                            <?php } if (get_permission('book_manage', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'library/book_manage') echo 'nav-active';?>">
                                <a href="<?=base_url('library/book_manage')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('book_issue/return')?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } } ?>
                  
                    <?php
                    if (moduleIsEnabled('bulk_sms_and_email')) {
                        if(get_permission('sendsmsmail', 'is_add') ||
                        get_permission('sendsmsmail_template', 'is_view') ||
                        get_permission('student_birthday_wishes', 'is_view') ||
                        get_permission('staff_birthday_wishes', 'is_view') ||
                        get_permission('sendsmsmail_reports', 'is_view')) {
                        ?>
                    <!-- SMS -->
                    <li class="nav-parent <?php if ($main_menu == 'sendsmsmail') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M8 10.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M8 14H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg> <span><?=translate('bulk_sms_and_email')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if (get_permission('sendsmsmail', 'is_add')) {  ?>
                            <li class="<?php if ($sub_page == 'sendsmsmail/sms' || $sub_page == 'sendsmsmail/email') echo 'nav-active';?>">
                                <a href="<?=base_url('sendsmsmail/sms')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('send')?> Sms / Email</span>
                                </a>
                            </li>
                            <li class="<?php if ($sub_page == 'sendsmsmail/campaign_reports') echo 'nav-active';?>">
                                <a href="<?=base_url('sendsmsmail/campaign_reports')?>">
                                    <span><i class="fas fa-caret-right"></i>Sms / Email <?=translate('report')?></span>
                                </a>
                            </li>
                            <?php } if (get_permission('sendsmsmail_template', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'sendsmsmail/template_sms' || $sub_page == 'sendsmsmail/template_edit_sms') echo 'nav-active';?>">
                                <a href="<?=base_url('sendsmsmail/template/sms')?>">
                                    <span><i class="fas fa-caret-right"></i> <?=translate('sms') . " " . translate('template')?></span>
                                </a>
                            </li>
                            <li class="<?php if ($sub_page == 'sendsmsmail/template_email' || $sub_page == 'sendsmsmail/template_edit_email') echo 'nav-active';?>">
                                <a href="<?=base_url('sendsmsmail/template/email')?>">
                                    <span><i class="fas fa-caret-right"></i> <?=translate('email') . " " . translate('template')?></span>
                                </a>
                            </li>
                            <?php } if (get_permission('student_birthday_wishes', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'birthday/student') echo 'nav-active';?>">
                                <a href="<?=base_url('birthday/student')?>">
                                    <span><i class="fas fa-caret-right"></i> Student Birthday Wishes</span>
                                </a>
                            </li>
                            <?php } if (get_permission('staff_birthday_wishes', 'is_view')) {  ?>
                            <li class="<?php if ($sub_page == 'birthday/staff') echo 'nav-active';?>">
                                <a href="<?=base_url('birthday/staff')?>">
                                    <span><i class="fas fa-caret-right"></i> Staff Birthday Wishes</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                

                    <?php if (moduleIsEnabled('alumni')) { 
                        if (get_permission('manage_alumni', 'is_view') ||
                            get_permission('alumni_events', 'is_view')) {
                        ?>
                    <!-- alumni -->
                    <li class="nav-parent <?php if ($main_menu == 'alumni') echo 'nav-expanded nav-active';?>">
                        <a>
                            <svg viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"width="28px" height="28px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ic_fluent_people_team_28_regular" fill="currentColor" fill-rule="nonzero"> <path d="M17.2540247,11 C18.4966654,11 19.5040247,12.0073593 19.5040247,13.25 L19.5040247,19.4989513 C19.5040247,22.5370966 17.0411213,25 14.002976,25 C10.9648308,25 8.50192738,22.5370966 8.50192738,19.4989513 L8.50192738,13.25 C8.50192738,12.0073593 9.5092867,11 10.7519274,11 L17.2540247,11 Z M17.2540247,12.5 L10.7519274,12.5 C10.3377138,12.5 10.0019274,12.8357864 10.0019274,13.25 L10.0019274,19.4989513 C10.0019274,21.7086695 11.7932579,23.5 14.002976,23.5 C16.2126942,23.5 18.0040247,21.7086695 18.0040247,19.4989513 L18.0040247,13.25 C18.0040247,12.8357864 17.6682382,12.5 17.2540247,12.5 Z M4.25,11 L8.40645343,11.000271 C8.01177565,11.4116389 7.72426829,11.9266236 7.58881197,12.5003444 L4.25,12.5 C3.83578644,12.5 3.5,12.8357864 3.5,13.25 L3.5,18.49876 C3.5,20.1562991 4.8437009,21.5 6.50123996,21.5 C6.94210796,21.5 7.36077379,21.4049412 7.73785924,21.2342019 C7.87129592,21.7236075 8.06231805,22.1898881 8.30186513,22.6257307 C7.75085328,22.8662539 7.14166566,23 6.50123996,23 C4.01527377,23 2,20.9847262 2,18.49876 L2,13.25 C2,12.0073593 3.00735931,11 4.25,11 Z M23.75,11 C24.9926407,11 26,12.0073593 26,13.25 L26,18.5 C26,20.9852814 23.9852814,23 21.5,23 C20.8609276,23 20.2529701,22.8667819 19.7023824,22.6266008 L19.7581025,22.5253735 C19.9721624,22.119151 20.1444731,21.6875096 20.2693267,21.2361575 C20.6437791,21.4056508 21.0608713,21.5 21.5,21.5 C23.1568542,21.5 24.5,20.1568542 24.5,18.5 L24.5,13.25 C24.5,12.8357864 24.1642136,12.5 23.75,12.5 L20.4171401,12.5003444 C20.2816838,11.9266236 19.9941764,11.4116389 19.5994986,11.000271 L23.75,11 Z M14,3 C15.9329966,3 17.5,4.56700338 17.5,6.5 C17.5,8.43299662 15.9329966,10 14,10 C12.0670034,10 10.5,8.43299662 10.5,6.5 C10.5,4.56700338 12.0670034,3 14,3 Z M22.0029842,4 C23.6598384,4 25.0029842,5.34314575 25.0029842,7 C25.0029842,8.65685425 23.6598384,10 22.0029842,10 C20.3461299,10 19.0029842,8.65685425 19.0029842,7 C19.0029842,5.34314575 20.3461299,4 22.0029842,4 Z M5.99701582,4 C7.65387007,4 8.99701582,5.34314575 8.99701582,7 C8.99701582,8.65685425 7.65387007,10 5.99701582,10 C4.34016157,10 2.99701582,8.65685425 2.99701582,7 C2.99701582,5.34314575 4.34016157,4 5.99701582,4 Z M14,4.5 C12.8954305,4.5 12,5.3954305 12,6.5 C12,7.6045695 12.8954305,8.5 14,8.5 C15.1045695,8.5 16,7.6045695 16,6.5 C16,5.3954305 15.1045695,4.5 14,4.5 Z M22.0029842,5.5 C21.1745571,5.5 20.5029842,6.17157288 20.5029842,7 C20.5029842,7.82842712 21.1745571,8.5 22.0029842,8.5 C22.8314113,8.5 23.5029842,7.82842712 23.5029842,7 C23.5029842,6.17157288 22.8314113,5.5 22.0029842,5.5 Z M5.99701582,5.5 C5.16858869,5.5 4.49701582,6.17157288 4.49701582,7 C4.49701582,7.82842712 5.16858869,8.5 5.99701582,8.5 C6.82544294,8.5 7.49701582,7.82842712 7.49701582,7 C7.49701582,6.17157288 6.82544294,5.5 5.99701582,5.5 Z" id="🎨-Color"> </path> </g> </g> </g></svg> <span><?=translate('alumni')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('manage_alumni', 'is_view')){ ?>
                                <li class="<?php if ($sub_page == 'alumni/index') echo 'nav-active'; ?>">
                                    <a href="<?php echo base_url('alumni/index'); ?>">
                                        <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('manage_alumni'); ?></span>
                                    </a>
                                </li>
                            <?php } if(get_permission('alumni_events', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'alumni/events') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('alumni/event'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('events'); ?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } } ?>
                    
                    <?php if (moduleIsEnabled('inventory')) { 
                        if (get_permission('product', 'is_view') ||
                            get_permission('product_category', 'is_view') ||
                            get_permission('product_store', 'is_view') ||
                            get_permission('product_supplier', 'is_view') ||
                            get_permission('product_unit', 'is_view') ||
                            get_permission('product_purchase', 'is_view') ||
                            get_permission('product_sales', 'is_view') ||
                            get_permission('product_issue', 'is_view')) {
                        ?>
                    <!-- Inventory -->
                    <li class="nav-parent <?php if ($main_menu == 'inventory' || $main_menu == 'inventory_report') echo 'nav-expanded nav-active'; ?>">
                        <a><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.95526 2.25C3.97013 2.25001 3.98505 2.25001 4.00001 2.25001L20.0448 2.25C20.4776 2.24995 20.8744 2.24991 21.1972 2.29331C21.5527 2.3411 21.9284 2.45355 22.2374 2.76257C22.5465 3.07159 22.6589 3.44732 22.7067 3.8028C22.7501 4.12561 22.7501 4.52245 22.75 4.95526V5.04475C22.7501 5.47757 22.7501 5.8744 22.7067 6.19721C22.6589 6.55269 22.5465 6.92842 22.2374 7.23744C21.9437 7.53121 21.5896 7.64733 21.25 7.69914V13.0564C21.25 14.8942 21.25 16.3498 21.0969 17.489C20.9392 18.6615 20.6071 19.6104 19.8588 20.3588C19.1104 21.1071 18.1615 21.4392 16.989 21.5969C15.8498 21.75 14.3942 21.75 12.5564 21.75H11.4436C9.60583 21.75 8.1502 21.75 7.01098 21.5969C5.83856 21.4392 4.88961 21.1071 4.14125 20.3588C3.39289 19.6104 3.06077 18.6615 2.90314 17.489C2.74998 16.3498 2.74999 14.8942 2.75001 13.0564L2.75001 7.69914C2.41038 7.64733 2.05634 7.53121 1.76257 7.23744C1.45355 6.92842 1.3411 6.55269 1.29331 6.19721C1.24991 5.8744 1.24995 5.47757 1.25 5.04476C1.25001 5.02988 1.25001 5.01496 1.25001 5.00001C1.25001 4.98505 1.25001 4.97013 1.25 4.95526C1.24995 4.52244 1.24991 4.12561 1.29331 3.8028C1.3411 3.44732 1.45355 3.07159 1.76257 2.76257C2.07159 2.45355 2.44732 2.3411 2.8028 2.29331C3.12561 2.24991 3.52244 2.24995 3.95526 2.25ZM4.25001 7.75001V13C4.25001 14.9068 4.2516 16.2615 4.38977 17.2892C4.52503 18.2952 4.7787 18.8749 5.20191 19.2981C5.62512 19.7213 6.20477 19.975 7.21086 20.1102C8.23852 20.2484 9.59319 20.25 11.5 20.25H12.5C14.4068 20.25 15.7615 20.2484 16.7892 20.1102C17.7952 19.975 18.3749 19.7213 18.7981 19.2981C19.2213 18.8749 19.475 18.2952 19.6102 17.2892C19.7484 16.2615 19.75 14.9068 19.75 13V7.75001H4.25001ZM2.82324 3.82324L2.82568 3.82187C2.82761 3.82086 2.83093 3.81924 2.83597 3.81717C2.85775 3.80821 2.90611 3.79291 3.00267 3.77993C3.21339 3.7516 3.5074 3.75001 4.00001 3.75001H20C20.4926 3.75001 20.7866 3.7516 20.9973 3.77993C21.0939 3.79291 21.1423 3.80821 21.164 3.81717C21.1691 3.81924 21.1724 3.82086 21.1743 3.82187L21.1768 3.82323L21.1781 3.82568C21.1792 3.82761 21.1808 3.83093 21.1828 3.83597C21.1918 3.85775 21.2071 3.90611 21.2201 4.00267C21.2484 4.21339 21.25 4.5074 21.25 5.00001C21.25 5.49261 21.2484 5.78662 21.2201 5.99734C21.2071 6.0939 21.1918 6.14226 21.1828 6.16404C21.1808 6.16909 21.1792 6.1724 21.1781 6.17434L21.1768 6.17678L21.1743 6.17815C21.1724 6.17916 21.1691 6.18077 21.164 6.18285C21.1423 6.19181 21.0939 6.2071 20.9973 6.22008C20.7866 6.24841 20.4926 6.25001 20 6.25001H4.00001C3.5074 6.25001 3.21339 6.24841 3.00267 6.22008C2.90611 6.2071 2.85775 6.19181 2.83597 6.18285C2.83093 6.18077 2.82761 6.17916 2.82568 6.17815L2.82324 6.17677L2.82187 6.17434C2.82086 6.1724 2.81924 6.16909 2.81717 6.16404C2.80821 6.14226 2.79291 6.0939 2.77993 5.99734C2.7516 5.78662 2.75001 5.49261 2.75001 5.00001C2.75001 4.5074 2.7516 4.21339 2.77993 4.00267C2.79291 3.90611 2.80821 3.85775 2.81717 3.83597C2.81924 3.83093 2.82086 3.82761 2.82187 3.82568L2.82324 3.82324ZM2.82324 6.17677C2.82284 6.17636 2.82297 6.17644 2.82324 6.17677V6.17677ZM10.4782 9.75001H13.5218C13.736 9.74999 13.9329 9.74998 14.0982 9.76126C14.2759 9.77338 14.4712 9.80099 14.6697 9.88322C15.0985 10.0608 15.4392 10.4015 15.6168 10.8303C15.699 11.0288 15.7266 11.2242 15.7388 11.4018C15.75 11.5671 15.75 11.764 15.75 11.9782V12.0218C15.75 12.236 15.75 12.4329 15.7388 12.5982C15.7266 12.7759 15.699 12.9712 15.6168 13.1697C15.4392 13.5985 15.0985 13.9392 14.6697 14.1168C14.4712 14.199 14.2759 14.2266 14.0982 14.2388C13.9329 14.25 13.736 14.25 13.5218 14.25H10.4782C10.264 14.25 10.0671 14.25 9.9018 14.2388C9.72416 14.2266 9.52881 14.199 9.33031 14.1168C8.90151 13.9392 8.56083 13.5985 8.38322 13.1697C8.30099 12.9712 8.27338 12.7759 8.26126 12.5982C8.24998 12.4329 8.24999 12.236 8.25001 12.0218V11.9782C8.24999 11.764 8.24998 11.5671 8.26126 11.4018C8.27338 11.2242 8.30099 11.0288 8.38322 10.8303C8.56083 10.4015 8.90151 10.0608 9.33031 9.88322C9.52881 9.80099 9.72416 9.77338 9.9018 9.76126C10.0671 9.74998 10.264 9.74999 10.4782 9.75001ZM9.90131 11.2703C9.84248 11.2956 9.79559 11.3425 9.77031 11.4013C9.76844 11.4087 9.76234 11.4371 9.75778 11.5039C9.75041 11.6119 9.75001 11.7568 9.75001 12C9.75001 12.2432 9.75041 12.3881 9.75778 12.4961C9.76234 12.5629 9.76844 12.5913 9.77031 12.5987C9.79559 12.6575 9.84248 12.7044 9.90131 12.7297C9.90867 12.7316 9.93707 12.7377 10.0039 12.7422C10.1119 12.7496 10.2568 12.75 10.5 12.75H13.5C13.7432 12.75 13.8881 12.7496 13.9961 12.7422C14.0629 12.7377 14.0913 12.7316 14.0987 12.7297C14.1575 12.7044 14.2044 12.6575 14.2297 12.5987C14.2316 12.5913 14.2377 12.5629 14.2422 12.4961C14.2496 12.3881 14.25 12.2432 14.25 12C14.25 11.7568 14.2496 11.6119 14.2422 11.5039C14.2377 11.4371 14.2316 11.4087 14.2297 11.4013C14.2044 11.3425 14.1575 11.2956 14.0987 11.2703C14.0913 11.2684 14.0629 11.2623 13.9961 11.2578C13.8881 11.2504 13.7432 11.25 13.5 11.25H10.5C10.2568 11.25 10.1119 11.2504 10.0039 11.2578C9.93707 11.2623 9.90866 11.2684 9.90131 11.2703Z" fill="currentColor"></path> </g></svg> <span><?php echo translate('inventory'); ?></span></a>
                        <ul class="nav nav-children">
                        <?php if(get_permission('product', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/product' || $sub_page == 'inventory/product_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/product'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('product'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_category', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/category') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/category'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('category'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_store', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/store' || $sub_page == 'inventory/store_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/store'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('store'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_supplier', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/supplier' || $sub_page == 'inventory/supplier_edit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/supplier'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('supplier'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_unit', 'is_view')){  ?>
                            <li class="<?php if ($sub_page == 'inventory/unit') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/unit'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('unit'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_purchase', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/purchase' || $sub_page == 'inventory/purchase_edit' || $sub_page == 'inventory/purchase_bill') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/purchase'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('purchase'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_sales', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/sales' || $sub_page == 'inventory/sales_invoice') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/sales'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('sales'); ?></span>
                                </a>
                            </li>
                        <?php } if(get_permission('product_issue', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'inventory/issue') echo 'nav-active'; ?>">
                                <a href="<?php echo base_url('inventory/issue'); ?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?php echo translate('issue'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } } ?>
                    <?php 
                    if (is_superadmin_loggedin()) : ?>
                    <!-- branch -->
                    <li class="<?php if ($main_menu == 'branch') echo 'nav-active';?>">
                        <a href="<?=base_url('branch')?>">
                        <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true><g id=" SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Development" transform="translate(-768.000000, 0.000000)">
                                                <g id="group_line" transform="translate(768.000000, 0.000000)">
                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path>
                                                    <path d="M15,6 C15,7.30622 14.1652,8.41746 13,8.82929 L13,11 L16,11 C17.6569,11 19,12.3431 19,14 L19,15.1707 C20.1652,15.5825 21,16.6938 21,18 C21,19.6569 19.6569,21 18,21 C16.3431,21 15,19.6569 15,18 C15,16.6938 15.8348,15.5825 17,15.1707 L17,14 C17,13.4477 16.5523,13 16,13 L8,13 C7.44772,13 7,13.4477 7,14 L7,15.1707 C8.16519,15.5825 9,16.6938 9,18 C9,19.6569 7.65685,21 6,21 C4.34315,21 3,19.6569 3,18 C3,16.6938 3.83481,15.5825 5,15.1707 L5,14 C5,12.3431 6.34315,11 8,11 L11,11 L11,8.82929 C9.83481,8.41746 9,7.30622 9,6 C9,4.34315 10.3431,3 12,3 C13.6569,3 15,4.34315 15,6 Z M12,5 C11.4477,5 11,5.44772 11,6 C11,6.55228 11.4477,7 12,7 C12.5523,7 13,6.55228 13,6 C13,5.44772 12.5523,5 12,5 Z M6,17 C5.44772,17 5,17.4477 5,18 C5,18.5523 5.44772,19 6,19 C6.55228,19 7,18.5523 7,18 C7,17.4477 6.55228,17 6,17 Z M18,17 C17.4477,17 17,17.4477 17,18 C17,18.5523 17.4477,19 18,19 C18.5523,19 19,18.5523 19,18 C19,17.4477 18.5523,17 18,17 Z" id="形状" fill="currentColor"> </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg> <span><?=translate('branch')?></span>
                        </a>
                    </li>
                    <?php endif; 
                    $saasExisting = $this->app_lib->isExistingAddon('saas');
                    if ($saasExisting): ?>
                    <!-- school subscription (SaaS)  -->
                        <?php include "saas_menu.php"; ?>
                    <?php endif; ?>
                    

                    <?php
                    if (moduleIsEnabled('reception')) {
                        if (get_permission('postal_record', 'is_view') ||
                        get_permission('call_log', 'is_view') ||
                        get_permission('visitor_log', 'is_view') ||
                        get_permission('complaint', 'is_view') ||
                        get_permission('enquiry', 'is_view') ||
                        get_permission('follow_up', 'is_view') ||
                        get_permission('config_reception', 'is_view')) { 
                        ?>
                    <!-- reception -->
                    <li class="nav-parent <?php if ($main_menu == 'reception') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M6 15.5C6 14.9477 6.44772 14.5 7 14.5H17C17.5523 14.5 18 14.9477 18 15.5C18 16.6046 17.1046 17.5 16 17.5H8C6.89543 17.5 6 16.6046 6 15.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M6.62825 6.76581C6.86962 4.75442 6.9903 3.74872 7.57198 3.06161C7.75659 2.84355 7.97139 2.65298 8.2099 2.49567C8.96141 2 9.97432 2 12.0001 2C14.026 2 15.0389 2 15.7904 2.49567C16.0289 2.65298 16.2437 2.84355 16.4283 3.06161C17.01 3.74872 17.1307 4.75442 17.372 6.76581L17.463 7.52342C17.7134 9.61087 17.8387 10.6546 17.2419 11.3273C16.6451 12 15.5939 12 13.4914 12H10.5088C8.40642 12 7.35521 12 6.7584 11.3273C6.1616 10.6546 6.28684 9.61087 6.53734 7.52342L6.62825 6.76581Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M12 12V14" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M12 22V20M12 20V17.5M12 20L12.4661 20.1165C13.4214 20.3554 14.1886 21.0658 14.5 22M12 20L11.5339 20.1165C10.5786 20.3554 9.81142 21.0658 9.5 22M6 16L5.13484 13.4045C5.06173 13.1852 5.02518 13.0755 4.95424 12.9225C4.8833 12.7695 4.85413 12.7215 4.79579 12.6256C4.33942 11.8752 3.7325 11.5 2 11.5M18 16L18.8652 13.4045C18.9383 13.1852 18.9748 13.0755 19.0458 12.9225C19.1167 12.7695 19.1459 12.7215 19.2042 12.6256C19.6606 11.8752 20.2675 11.5 22 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg> <span><?=translate('reception')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('enquiry', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'reception/enquiry' || $sub_page =='reception/enquiry_edit' || $sub_page =='reception/enquiry_details') echo 'nav-active';?>">
                                <a href="<?=base_url('reception/enquiry')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('admission_enquiry')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('postal_record', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'reception/postal' || $sub_page =='reception/postal_edit') echo 'nav-active';?>">
                                <a href="<?=base_url('reception/postal')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('postal_record')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('call_log', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'reception/call_log' || $sub_page =='reception/call_log_edit') echo 'nav-active';?>">
                                <a href="<?=base_url('reception/call_log')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('call_log')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('visitor_log', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'reception/visitor' || $sub_page =='reception/visitor_edit') echo 'nav-active';?>">
                                <a href="<?=base_url('reception/visitor_log')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('visitor_log')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('complaint', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'reception/complaint' || $sub_page == 'reception/complaint_edit') echo 'nav-active';?>">
                                <a href="<?=base_url('reception/complaint')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('complaint')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('config_reception', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'reception_config/reference' || $sub_page == 'reception_config/response' || $sub_page == 'reception_config/calling_purpose' || $sub_page == 'reception_config/visiting_purpose' || $sub_page == 'reception_config/complaint_type') echo 'nav-active';?>">
                                <a href="<?=base_url('reception_config/reference')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i> Config Reception</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }} ?>
                    <!-- addon manager -->
                    <?php 
                    if (is_superadmin_loggedin()) { ?>
                    <li class="<?php if ($main_menu == 'addon') echo 'nav-active';?>">
                        <a href="<?=base_url('addons/manage')?>">
                            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0" ></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:currentColor;}  </style> <g> <path class="st0" d="M432.531,229.906c-9.906,0-19.125,2.594-27.313,6.375v-51.656c0-42.938-34.922-77.875-77.859-77.875h-51.641 c3.781-8.156,6.375-17.375,6.375-27.281C282.094,35.656,246.438,0,202.625,0c-43.828,0-79.484,35.656-79.484,79.469 c0,9.906,2.594,19.125,6.359,27.281H77.875C34.938,106.75,0,141.688,0,184.625l0.047,23.828H0l0.078,33.781 c0,23.031,8.578,36.828,12.641,42.063c12.219,15.797,27.094,18.172,34.891,18.172c11.953,0,23.141-4.953,33.203-14.703l0.906-0.422 l1.516-2.141c1.391-1.359,6.328-5.484,14.016-5.5c16.344,0,29.656,13.297,29.656,29.672c0,16.344-13.313,29.656-29.672,29.656 c-7.672,0-12.609-4.125-14-5.5l-1.516-2.141l-0.906-0.422c-10.063-9.75-21.25-14.703-33.203-14.703 c-7.797,0.016-22.672,2.375-34.891,18.172c-4.063,5.25-12.641,19.031-12.641,42.063L0,410.281h0.047L0,434.063 C0,477.063,34.938,512,77.875,512h54.563v-0.063l3.047-0.016c23.016,0,36.828-8.563,42.063-12.641 c15.797-12.219,18.172-27.094,18.172-34.891c0-11.953-4.953-23.141-14.688-33.203l-0.438-0.906l-2.125-1.516 c-1.375-1.391-5.516-6.328-5.516-14.016c0-16.344,13.313-29.656,29.672-29.656c16.344,0,29.656,13.313,29.656,29.656 c0,7.688-4.141,12.625-5.5,14.016l-2.125,1.516l-0.438,0.906c-9.75,10.063-14.703,21.25-14.703,33.203 c0,7.797,2.359,22.672,18.172,34.891c5.25,4.078,19.031,12.641,42.063,12.641l17,0.047V512h40.609 c42.938,0,77.859-34.938,77.859-77.875v-51.641c8.188,3.766,17.406,6.375,27.313,6.375c43.813,0,79.469-35.656,79.469-79.484 C512,265.563,476.344,229.906,432.531,229.906z M432.531,356.375c-19.031,0-37.469-22.063-37.469-22.063 c-3.344-3.203-6.391-4.813-9.25-4.813c-2.844,0-5.469,1.609-7.938,4.813c0,0-5.125,5.891-5.125,19.313v80.5 c0,25.063-20.313,45.391-45.391,45.391h-23.813l-33.797-0.078c-15.438,0-22.188-5.875-22.188-5.875 c-3.703-2.859-5.563-5.875-5.563-9.172c0-3.266,1.859-6.797,5.563-10.594c0,0,17.219-13.891,17.219-39.047 c0-34.313-27.844-62.156-62.156-62.156c-34.344,0-62.156,27.844-62.156,62.156c0,25.156,17.219,39.047,17.219,39.047 c3.688,3.797,5.531,7.328,5.531,10.594c0,3.297-1.844,6.313-5.531,9.172c0,0-6.766,5.875-22.203,5.875l-33.797,0.078H77.875 c-25.063,0-45.375-20.328-45.375-45.391l0.094-48.203h-0.047l0.016-9.422c0-15.422,5.875-22.203,5.875-22.203 c2.859-3.703,5.875-5.531,9.156-5.531s6.813,1.828,10.609,5.531c0,0,13.891,17.234,39.047,17.234 c34.313-0.016,62.156-27.844,62.156-62.156c-0.016-34.344-27.844-62.156-62.156-62.156c-25.156,0-39.047,17.219-39.047,17.219 c-3.797,3.688-7.328,5.531-10.609,5.531s-6.297-1.828-9.156-5.531c0,0-5.875-6.781-5.875-22.203v-1.156h0.031L32.5,184.625 c0-25.063,20.313-45.375,45.375-45.375h80.5c13.422,0,19.313-5.125,19.313-5.125c6.422-4.938,6.422-10.531,0-17.188 c0,0-22.063-18.438-22.063-37.469c0-25.953,21.047-46.984,47-46.984c25.938,0,46.984,21.031,46.984,46.984 c0,19.031-22.047,37.469-22.047,37.469c-6.438,6.656-6.438,12.25,0,17.188c0,0,5.875,5.125,19.281,5.125h80.516 c25.078,0,45.391,20.313,45.391,45.375v80.516c0,13.422,5.125,19.297,5.125,19.297c2.469,3.219,5.094,4.813,7.938,4.813 c2.859,0,5.906-1.594,9.25-4.813c0,0,18.438-22.047,37.469-22.047c25.938,0,46.969,21.047,46.969,46.984 C479.5,335.344,458.469,356.375,432.531,356.375z"></path> </g> </g></svg> <?=translate('addon_manager')?></span>
                        </a>
                    </li>
                    <?php } ?>
<!-------------->


                    <!------------>
 
   <li class="nav-parent">
                                <a>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle> <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.5"></circle> <path d="M15 9L19 5" stroke="currentColor" stroke-width="1.5"></path> <path d="M5 19L9 15" stroke="currentColor" stroke-width="1.5"></path> <path d="M9 9L5 5" stroke="currentColor" stroke-width="1.5"></path> <path d="M19 19L15 15" stroke="currentColor" stroke-width="1.5"></path> </g></svg> <span> Help/Knowlegebase</span>
                                </a>
                                <ul class="nav nav-children">
                                <li>
                                              <a href="<?= base_url('#') ?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8V16C20 18.8284 20 20.2426 19.1213 21.1213C18.2426 22 16.8284 22 14 22H10C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke="currentColor" stroke-width="1.5"></path> <path d="M8 7H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 10.5H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>Tutorials</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="<?= base_url('#') ?>">
                                                  <span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19.5617 7C19.7904 5.69523 18.7863 4.5 17.4617 4.5H6.53788C5.21323 4.5 4.20922 5.69523 4.43784 7" stroke="currentColor" stroke-width="1.5"></path> <path d="M17.4999 4.5C17.5283 4.24092 17.5425 4.11135 17.5427 4.00435C17.545 2.98072 16.7739 2.12064 15.7561 2.01142C15.6497 2 15.5194 2 15.2588 2H8.74099C8.48035 2 8.35002 2 8.24362 2.01142C7.22584 2.12064 6.45481 2.98072 6.45704 4.00434C6.45727 4.11135 6.47146 4.2409 6.49983 4.5" stroke="currentColor" stroke-width="1.5"></path> <path d="M14.5812 13.6159C15.1396 13.9621 15.1396 14.8582 14.5812 15.2044L11.2096 17.2945C10.6669 17.6309 10 17.1931 10 16.5003L10 12.32C10 11.6273 10.6669 11.1894 11.2096 11.5258L14.5812 13.6159Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M2.38351 13.793C1.93748 10.6294 1.71447 9.04765 2.66232 8.02383C3.61017 7 5.29758 7 8.67239 7H15.3276C18.7024 7 20.3898 7 21.3377 8.02383C22.2855 9.04765 22.0625 10.6294 21.6165 13.793L21.1935 16.793C20.8437 19.2739 20.6689 20.5143 19.7717 21.2572C18.8745 22 17.5512 22 14.9046 22H9.09536C6.44881 22 5.12553 22 4.22834 21.2572C3.33115 20.5143 3.15626 19.2739 2.80648 16.793L2.38351 13.793Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg> Video Tutorials</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="<?= base_url('#') ?>">
                                                  <span><svg viewBox="0 0 24 24" id="_24x24_On_Light_Support" data-name="24x24/On Light/Support" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect id="view-box" width="24" height="24" fill="none"></rect> <path id="Shape" d="M8,17.751a2.749,2.749,0,0,1,5.127-1.382C15.217,15.447,16,14,16,11.25v-3c0-3.992-2.251-6.75-5.75-6.75S4.5,4.259,4.5,8.25v3.5a.751.751,0,0,1-.75.75h-1A2.753,2.753,0,0,1,0,9.751v-1A2.754,2.754,0,0,1,2.75,6h.478c.757-3.571,3.348-6,7.022-6s6.264,2.429,7.021,6h.478a2.754,2.754,0,0,1,2.75,2.75v1a2.753,2.753,0,0,1-2.75,2.75H17.44A5.85,5.85,0,0,1,13.5,17.84,2.75,2.75,0,0,1,8,17.751Zm1.5,0a1.25,1.25,0,1,0,1.25-1.25A1.251,1.251,0,0,0,9.5,17.751Zm8-6.75h.249A1.251,1.251,0,0,0,19,9.751v-1A1.251,1.251,0,0,0,17.75,7.5H17.5Zm-16-2.25v1A1.251,1.251,0,0,0,2.75,11H3V7.5H2.75A1.251,1.251,0,0,0,1.5,8.751Z" transform="translate(1.75 2.25)" fill="currentColor"></path> </g></svg> Contact Support</span>
                                              </a>
                                          </li>
                                  
                                  </ul>
                              </li>
                     
<!------------------------------------------------------------->
                    <?php
                    $schoolSettings = false;
                    if (get_permission('school_settings', 'is_view') ||
                    get_permission('live_class_config', 'is_view') ||
                    get_permission('payment_settings', 'is_view') ||
                    get_permission('sms_settings', 'is_view') ||
                    get_permission('email_settings', 'is_view') ||
                    get_permission('accounting_links', 'is_view')) {
                        $schoolSettings = true;
                    }
                    if (get_permission('global_settings', 'is_view') ||
                    ($schoolSettings == true) ||
                    get_permission('translations', 'is_view') ||
                    get_permission('cron_job', 'is_view') ||
                    get_permission('system_update', 'is_add') ||
                    get_permission('custom_field', 'is_view') ||
                    get_permission('backup', 'is_view')) {
                    ?>
                    <!-- setting -->
                    <li class="nav-parent <?php if ($main_menu == 'settings' || $main_menu == 'school_m') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                                        <path d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </g>
                                </svg> <span><?=translate('settings')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <?php if(get_permission('global_settings', 'is_view')){ ?>
                            <li class="<?php if($sub_page == 'settings/universal') echo 'nav-active';?>">
                                <a href="<?=base_url('settings/universal')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('global_settings')?></span>
                                </a>
                            </li>
                            <?php } if($schoolSettings == true){ ?>
                            <li class="<?php if($main_menu == 'school_m') echo 'nav-active';?>">
                                <a href="<?=base_url('school_settings')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('school_settings')?></span>
                                </a>
                            </li>
                            <?php } if (is_superadmin_loggedin()) { ?>
                            <li class="<?php if ($sub_page == 'role/index' || $sub_page == 'role/permission') echo 'nav-active';?>">
                                <a href="<?=base_url('role')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('role_permission')?></span>
                                </a>
                            </li>
                            <?php } if (is_superadmin_loggedin()) { ?>
                            <li class="<?php if ($sub_page == 'sessions/index') echo 'nav-active';?>">
                                <a href="<?=base_url('sessions')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('session_settings')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('translations', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'language/index') echo 'nav-active';?>">
                                <a href="<?=base_url('translations')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('translations')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('cron_job', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'cron_api/index') echo 'nav-active';?>">
                                <a href="<?=base_url('cron_api')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('cron_job')?></span>
                                </a>
                            </li>
                            <?php } if(is_superadmin_loggedin()){ ?>
                            <li class="<?php if ($sub_page == 'modules/index') echo 'nav-active';?>">
                                <a href="<?=base_url('modules')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('modules')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('system_student_field', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'system_student_field/index') echo 'nav-active';?>">
                                <a href="<?=base_url('system_student_field')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('system_student_field')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('custom_field', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'custom_field/index') echo 'nav-active';?>">
                                <a href="<?=base_url('custom_field')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('custom_field')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('backup', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'database_backup/index') echo 'nav-active';?>">
                                <a href="<?=base_url('backup')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('database_backup')?></span>
                                </a>
                            </li>
                            <?php } if(get_permission('user_login_log', 'is_view')){ ?>
                            <li class="<?php if ($sub_page == 'user_login_log/index') echo 'nav-active';?>">
                                <a href="<?=base_url('user_login_log/index')?>">
                                    <span><i class="fas fa-caret-right" aria-hidden="true"></i><?=translate('user_login_log')?></span>
                                </a>
                            </li>
                            <?php } ?>

                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <script>
            // maintain scroll position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
    </div>
</aside>
<!-- end sidebar -->