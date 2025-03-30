<!-- Welocme card  -->
<div class="cdev-modern-header">
    <div class="cdev-header-content">
        <div class="cdev-user-welcome">
            <div class="cdev-user-profile">
                <?php
                $profile_image = get_image_url('staff', $this->session->userdata('photo'));
                ?>
                <img src="<?php echo $profile_image; ?>" alt="User Image" class="cdev-profile-img">
            </div>
            <div class="cdev-user-info">
                <h1 class="cdev-welcome-text">
                    Welcome Back,
                    <span class="cdev-user-name">
                        <?php echo $this->session->userdata('name'); ?>
                    </span>
                </h1>
                <p class="cdev-subtitle">Have a good day at work</p>
            </div>
        </div>
        <div class="cdev-header-actions">
            <a href="<?php echo base_url('profile'); ?>" class="cdev-action-btn">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M19.8284 3.17157C18.6569 2 16.7712 2 13 2H11C7.22876 2 5.34315 2 4.17157 3.17157C3 4.34315 3 6.22876 3 10V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <span>Edit Profile</span>
            </a>
        </div>
    </div>
</div>
<!-- Welocme card  -->
 <!-- search Box modbile   -->
<?php if (get_permission('student', 'is_view')): ?>
    <?php echo form_open('student/search', array('class' => 'cdev-search-form')); ?>
    <div class="cdev-search-container">
        <input type="text"
            class="search-box cdev-search-box"
            name="search_text"
            placeholder="<?php echo translate('student search'); ?>"
            oninput="toggleIcons()">
        <svg class="cdev-icon cdev-search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#4d4d4d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <svg class="cdev-icon cdev-cancel-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FF0808FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="clearSearch()">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        <svg class="cdev-icon cdev-send-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#0482FFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </div>
    </form>
<?php endif; ?>
 <!-- //search Box modbile   -->

<!--***************Shortcut buttons*************************************************************************************************************-->
<!---Teacher Shortcut button--->
<?php if (is_teacher_loggedin()) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="cdev-dashboard-buttons">
                <a href="<?= base_url('attendance/student_entry') ?>" class="cdev-dashboard-btn pay-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
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
                    </svg>
                    <?= translate('take_attendance') ?>
                </a>
                <a href="<?= base_url('timetable/viewclass') ?>" class="cdev-dashboard-btn exam-result"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 10V6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V10M4 10V15M4 10H9M20 10V15M20 10H15M4 15V18C4 19.1046 4.89543 20 6 20H9M4 15H9M20 15V18C20 19.1046 19.1046 20 18 20H15M20 15H15M9 15H15M9 15V10M9 15V20M15 15V10M15 15V20M9 10H15M9 20H15M10 7H14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <?= translate('class_time_table') ?>
                </a>
                <a href="<?= base_url('timetable/teacherview') ?>" class="cdev-dashboard-btn attendance"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <circle cx="9" cy="9" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                            <path d="M13 15C13 16.1046 13 17 9 17C5 17 5 16.1046 5 15C5 13.8954 6.79086 13 9 13C11.2091 13 13 13.8954 13 15Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M19 12H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M19 9H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M19 15H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </g>
                    </svg>
                    <span><?= translate('my_schedule') ?></span>
                </a>
                <a href="<?= base_url('onlineexam/question') ?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6111 1.5837C17.2678 1.34703 18.75 2.63255 18.75 4.30606V5.68256C19.9395 6.31131 20.75 7.56102 20.75 9.00004V19C20.75 21.0711 19.0711 22.75 17 22.75H7C4.92893 22.75 3.25 21.0711 3.25 19V5.00004C3.25 4.99074 3.25017 4.98148 3.2505 4.97227C3.25017 4.95788 3.25 4.94344 3.25 4.92897C3.25 4.02272 3.91638 3.25437 4.81353 3.12621L15.6111 1.5837ZM4.75 6.75004V19C4.75 20.2427 5.75736 21.25 7 21.25H17C18.2426 21.25 19.25 20.2427 19.25 19V9.00004C19.25 7.7574 18.2426 6.75004 17 6.75004H4.75ZM5.07107 5.25004H17.25V4.30606C17.25 3.54537 16.5763 2.96104 15.8232 3.06862L5.02566 4.61113C4.86749 4.63373 4.75 4.76919 4.75 4.92897C4.75 5.10629 4.89375 5.25004 5.07107 5.25004ZM7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4143 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4143 7.25 12ZM7.25 15.5C7.25 15.0858 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 15.0858 14.25 15.5C14.25 15.9143 13.9142 16.25 13.5 16.25H8C7.58579 16.25 7.25 15.9143 7.25 15.5Z" fill="currentColor"></path>
                        </g>
                    </svg>
                    <?= translate('question_bank') ?>
                </a>
            </div>
        </div>
    </div>
<?php } ?>
<!---//Teacher Shortcut buttons--->
<!---superadmin/Admin Shortcut buttons--->
<?php if (is_superadmin_loggedin() || is_admin_loggedin()) { ?>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-12">
            <div class="cdev-dashboard-buttons">
                <a href="<?= base_url('student/add') ?>" class="cdev-dashboard-btn pay-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25013 6C7.25013 3.37665 9.37678 1.25 12.0001 1.25C14.6235 1.25 16.7501 3.37665 16.7501 6C16.7501 8.62335 14.6235 10.75 12.0001 10.75C9.37678 10.75 7.25013 8.62335 7.25013 6ZM12.0001 2.75C10.2052 2.75 8.75013 4.20507 8.75013 6C8.75013 7.79493 10.2052 9.25 12.0001 9.25C13.7951 9.25 15.2501 7.79493 15.2501 6C15.2501 4.20507 13.7951 2.75 12.0001 2.75Z" fill="currentColor"></path>
                            <path d="M18.0001 13.9167C18.4143 13.9167 18.7501 14.2524 18.7501 14.6667V15.25H19.3333C19.7475 15.25 20.0833 15.5858 20.0833 16C20.0833 16.4142 19.7475 16.75 19.3333 16.75H18.7501V17.3333C18.7501 17.7475 18.4143 18.0833 18.0001 18.0833C17.5859 18.0833 17.2501 17.7475 17.2501 17.3333V16.75H16.6666C16.2524 16.75 15.9166 16.4142 15.9166 16C15.9166 15.5858 16.2524 15.25 16.6666 15.25H17.2501V14.6667C17.2501 14.2524 17.5859 13.9167 18.0001 13.9167Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7748 12.5129C13.9021 12.3421 12.9686 12.25 12.0001 12.25C9.68658 12.25 7.55506 12.7759 5.97558 13.6643C4.41962 14.5396 3.25013 15.8661 3.25013 17.5L3.25007 17.602C3.24894 18.7638 3.24752 20.222 4.52655 21.2635C5.15602 21.7761 6.03661 22.1406 7.22634 22.3815C8.41939 22.6229 9.97436 22.75 12.0001 22.75C14.8682 22.75 16.81 22.4961 18.1197 22.0085C19.2986 21.5697 19.9974 20.9266 20.3705 20.1172C21.7928 19.2966 22.7501 17.7601 22.7501 16C22.7501 13.3766 20.6235 11.25 18.0001 11.25C16.755 11.25 15.6218 11.7291 14.7748 12.5129ZM6.71098 14.9717C5.37151 15.7251 4.75013 16.6487 4.75013 17.5C4.75013 18.8078 4.79045 19.544 5.47372 20.1004C5.84425 20.4022 6.46366 20.6967 7.52392 20.9113C8.58087 21.1252 10.0259 21.25 12.0001 21.25C14.5781 21.25 16.2402 21.0366 17.311 20.7004C15.0142 20.3666 13.2501 18.3893 13.2501 16C13.2501 15.2322 13.4323 14.5069 13.7558 13.865C13.1941 13.79 12.6062 13.75 12.0001 13.75C9.89541 13.75 8.02693 14.2315 6.71098 14.9717ZM14.7501 16C14.7501 14.2051 16.2052 12.75 18.0001 12.75C19.7951 12.75 21.2501 14.2051 21.2501 16C21.2501 17.7949 19.7951 19.25 18.0001 19.25C16.2052 19.25 14.7501 17.7949 14.7501 16Z" fill="currentColor"></path>
                        </g>
                    </svg>
                    <?= translate('admit_new_student') ?>
                </a>
                <a href="<?= base_url('attendance/employees_entry') ?>" class="cdev-dashboard-btn exam-result"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 1.25C9.37678 1.25 7.25013 3.37665 7.25013 6C7.25013 8.62335 9.37678 10.75 12.0001 10.75C14.6235 10.75 16.7501 8.62335 16.7501 6C16.7501 3.37665 14.6235 1.25 12.0001 1.25ZM8.75013 6C8.75013 4.20507 10.2052 2.75 12.0001 2.75C13.7951 2.75 15.2501 4.20507 15.2501 6C15.2501 7.79493 13.7951 9.25 12.0001 9.25C10.2052 9.25 8.75013 7.79493 8.75013 6Z" fill="currentColor"></path>
                            <path d="M19.8556 14.5729C20.1529 14.8614 20.16 15.3362 19.8715 15.6334L18.0383 17.5223C17.8902 17.6749 17.6843 17.7575 17.4718 17.7495C17.2593 17.7414 17.0602 17.6436 16.924 17.4802L16.0905 16.4802C15.8253 16.162 15.8683 15.6891 16.1864 15.4239C16.5046 15.1587 16.9776 15.2016 17.2428 15.5198L17.5425 15.8794L18.7951 14.5888C19.0836 14.2915 19.5584 14.2844 19.8556 14.5729Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7748 12.5129C13.9021 12.3421 12.9686 12.25 12.0001 12.25C9.68658 12.25 7.55506 12.7759 5.97558 13.6643C4.41962 14.5396 3.25013 15.8661 3.25013 17.5L3.25007 17.602C3.24894 18.7638 3.24752 20.222 4.52655 21.2635C5.15602 21.7761 6.03661 22.1406 7.22634 22.3815C8.41939 22.6229 9.97436 22.75 12.0001 22.75C14.8682 22.75 16.81 22.4961 18.1197 22.0085C19.2986 21.5697 19.9974 20.9266 20.3705 20.1172C21.7928 19.2966 22.7501 17.7601 22.7501 16C22.7501 13.3766 20.6235 11.25 18.0001 11.25C16.755 11.25 15.6218 11.7291 14.7748 12.5129ZM14.7501 16C14.7501 14.2051 16.2052 12.75 18.0001 12.75C19.7951 12.75 21.2501 14.2051 21.2501 16C21.2501 17.7949 19.7951 19.25 18.0001 19.25C16.2052 19.25 14.7501 17.7949 14.7501 16ZM13.7558 13.865C13.4323 14.5069 13.2501 15.2322 13.2501 16C13.2501 18.3893 15.0142 20.3666 17.311 20.7004C16.2402 21.0366 14.5781 21.25 12.0001 21.25C10.0259 21.25 8.58087 21.1252 7.52392 20.9113C6.46366 20.6967 5.84425 20.4022 5.47372 20.1004C4.79045 19.544 4.75013 18.8078 4.75013 17.5C4.75013 16.6487 5.37151 15.7251 6.71098 14.9717C8.02693 14.2315 9.89541 13.75 12.0001 13.75C12.6062 13.75 13.1941 13.79 13.7558 13.865Z" fill="currentColor"></path>
                        </g>
                    </svg>
                    <?= translate('staff_attendance') ?>
                </a>
                <a href="<?= base_url('onlineexam/question') ?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6111 1.5837C17.2678 1.34703 18.75 2.63255 18.75 4.30606V5.68256C19.9395 6.31131 20.75 7.56102 20.75 9.00004V19C20.75 21.0711 19.0711 22.75 17 22.75H7C4.92893 22.75 3.25 21.0711 3.25 19V5.00004C3.25 4.99074 3.25017 4.98148 3.2505 4.97227C3.25017 4.95788 3.25 4.94344 3.25 4.92897C3.25 4.02272 3.91638 3.25437 4.81353 3.12621L15.6111 1.5837ZM4.75 6.75004V19C4.75 20.2427 5.75736 21.25 7 21.25H17C18.2426 21.25 19.25 20.2427 19.25 19V9.00004C19.25 7.7574 18.2426 6.75004 17 6.75004H4.75ZM5.07107 5.25004H17.25V4.30606C17.25 3.54537 16.5763 2.96104 15.8232 3.06862L5.02566 4.61113C4.86749 4.63373 4.75 4.76919 4.75 4.92897C4.75 5.10629 4.89375 5.25004 5.07107 5.25004ZM7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4143 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4143 7.25 12ZM7.25 15.5C7.25 15.0858 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 15.0858 14.25 15.5C14.25 15.9143 13.9142 16.25 13.5 16.25H8C7.58579 16.25 7.25 15.9143 7.25 15.5Z" fill="currentColor"></path>
                        </g>
                    </svg>
                    <?= translate('question_bank') ?>
                </a>
                <a href="<?= base_url('timetable/viewexam') ?>" class="cdev-dashboard-btn profile-cb"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V11.6893L15.0303 13.9697C15.3232 14.2626 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2626 15.3232 13.9697 15.0303L11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12V8C11.25 7.58579 11.5858 7.25 12 7.25Z" fill="currentColor"></path>
                        </g>
                    </svg>
                    <?= translate('exam_schedule') ?>
                    <a href="<?= base_url('advance_salary/request') ?>" class="cdev-dashboard-btn profile-cb"><svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="currentColor" d="M256 640v192h640V384H768v-64h150.976c14.272 0 19.456 1.472 24.64 4.288a29.056 29.056 0 0 1 12.16 12.096c2.752 5.184 4.224 10.368 4.224 24.64v493.952c0 14.272-1.472 19.456-4.288 24.64a29.056 29.056 0 0 1-12.096 12.16c-5.184 2.752-10.368 4.224-24.64 4.224H233.024c-14.272 0-19.456-1.472-24.64-4.288a29.056 29.056 0 0 1-12.16-12.096c-2.688-5.184-4.224-10.368-4.224-24.576V640h64z"></path>
                                <path fill="currentColor" d="M768 192H128v448h640V192zm64-22.976v493.952c0 14.272-1.472 19.456-4.288 24.64a29.056 29.056 0 0 1-12.096 12.16c-5.184 2.752-10.368 4.224-24.64 4.224H105.024c-14.272 0-19.456-1.472-24.64-4.288a29.056 29.056 0 0 1-12.16-12.096C65.536 682.432 64 677.248 64 663.04V169.024c0-14.272 1.472-19.456 4.288-24.64a29.056 29.056 0 0 1 12.096-12.16C85.568 129.536 90.752 128 104.96 128h685.952c14.272 0 19.456 1.472 24.64 4.288a29.056 29.056 0 0 1 12.16 12.096c2.752 5.184 4.224 10.368 4.224 24.64z"></path>
                                <path fill="currentColor" d="M448 576a160 160 0 1 1 0-320 160 160 0 0 1 0 320zm0-64a96 96 0 1 0 0-192 96 96 0 0 0 0 192z"></path>
                            </g>
                        </svg>
                        <?= translate('salary_advance') ?>
                    </a> <a href="<?= base_url('student_promotion') ?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.44631 3.25C8.31349 3.24998 7.38774 3.24996 6.65689 3.34822C5.89294 3.45093 5.2306 3.67321 4.70191 4.20191C4.17321 4.7306 3.95093 5.39294 3.84822 6.15689C3.74996 6.88775 3.74998 7.81348 3.75 8.94631L3.75 14.2559C3.60156 14.2599 3.46384 14.2667 3.33735 14.2782C3.00817 14.308 2.68222 14.3741 2.375 14.5514C2.03296 14.7489 1.74892 15.033 1.55145 15.375C1.37408 15.6822 1.30802 16.0082 1.27818 16.3374C1.24997 16.6486 1.24999 17.028 1.25 17.4677V17.5322C1.24999 17.972 1.24997 18.3514 1.27818 18.6627C1.30802 18.9918 1.37408 19.3178 1.55145 19.625C1.74892 19.967 2.03296 20.2511 2.375 20.4486C2.68222 20.6259 3.00817 20.692 3.33735 20.7218C3.64862 20.75 4.02793 20.75 4.46768 20.75H4.53223C4.97198 20.75 5.35138 20.75 5.66265 20.7218C5.99184 20.692 6.31779 20.6259 6.625 20.4486C6.96705 20.2511 7.25108 19.967 7.44856 19.625C7.62593 19.3178 7.69199 18.9918 7.72182 18.6627C7.75003 18.3514 7.75002 17.972 7.75 17.5322V17.4678C7.75002 17.028 7.75003 16.6486 7.72182 16.3374C7.69199 16.0082 7.62593 15.6822 7.44856 15.375C7.25108 15.033 6.96705 14.7489 6.625 14.5514C6.31779 14.3741 5.99184 14.308 5.66265 14.2782C5.53617 14.2667 5.39845 14.2599 5.25 14.2559V9C5.25 7.80029 5.2516 6.97595 5.33484 6.35676C5.41519 5.75914 5.55903 5.46611 5.76257 5.26257C5.96611 5.05903 6.25914 4.91519 6.85676 4.83484C7.47595 4.7516 8.30029 4.75 9.5 4.75H14.5C15.6997 4.75 16.5241 4.7516 17.1432 4.83484C17.7409 4.91519 18.0339 5.05903 18.2374 5.26257C18.441 5.46611 18.5848 5.75914 18.6652 6.35676C18.7484 6.97595 18.75 7.80029 18.75 9V10.1893L18.0303 9.46967C17.7374 9.17678 17.2626 9.17678 16.9697 9.46967C16.6768 9.76257 16.6768 10.2374 16.9697 10.5303L18.9697 12.5303C19.2626 12.8232 19.7374 12.8232 20.0303 12.5303L22.0303 10.5303C22.3232 10.2374 22.3232 9.76257 22.0303 9.46967C21.7374 9.17678 21.2626 9.17678 20.9697 9.46967L20.25 10.1893V8.94632C20.25 7.81348 20.25 6.88775 20.1518 6.15689C20.0491 5.39294 19.8268 4.7306 19.2981 4.20191C18.7694 3.67321 18.1071 3.45093 17.3431 3.34822C16.6123 3.24996 15.6865 3.24998 14.5537 3.25H9.44631ZM4.5 15.75C4.01889 15.75 3.7082 15.7507 3.47275 15.7721C3.2476 15.7925 3.16587 15.8269 3.125 15.8505C3.01099 15.9163 2.91631 16.011 2.85048 16.125C2.82689 16.1659 2.79247 16.2476 2.77206 16.4727C2.75072 16.7082 2.75 17.0189 2.75 17.5C2.75 17.9811 2.75072 18.2918 2.77206 18.5273C2.79247 18.7524 2.82689 18.8341 2.85048 18.875C2.91631 18.989 3.01099 19.0837 3.125 19.1495C3.16587 19.1731 3.2476 19.2075 3.47275 19.2279C3.7082 19.2493 4.01889 19.25 4.5 19.25C4.98111 19.25 5.2918 19.2493 5.52726 19.2279C5.7524 19.2075 5.83414 19.1731 5.875 19.1495C5.98902 19.0837 6.0837 18.989 6.14952 18.875C6.17311 18.8341 6.20754 18.7524 6.22794 18.5273C6.24928 18.2918 6.25 17.9811 6.25 17.5C6.25 17.0189 6.24928 16.7082 6.22794 16.4727C6.20754 16.2476 6.17311 16.1659 6.14952 16.125C6.0837 16.011 5.98902 15.9163 5.875 15.8505C5.83414 15.8269 5.7524 15.7925 5.52726 15.7721C5.2918 15.7507 4.98111 15.75 4.5 15.75Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9678 14.25C11.528 14.25 11.1486 14.25 10.8374 14.2782C10.5082 14.308 10.1822 14.3741 9.875 14.5514C9.53296 14.7489 9.24892 15.033 9.05145 15.375C8.87408 15.6822 8.80802 16.0082 8.77818 16.3374C8.74997 16.6486 8.74999 17.028 8.75 17.4677V17.5322C8.74999 17.972 8.74997 18.3514 8.77818 18.6627C8.80802 18.9918 8.87408 19.3178 9.05145 19.625C9.24892 19.967 9.53296 20.2511 9.875 20.4486C10.1822 20.6259 10.5082 20.692 10.8374 20.7218C11.1486 20.75 11.5279 20.75 11.9677 20.75H12.0322C12.472 20.75 12.8514 20.75 13.1627 20.7218C13.4918 20.692 13.8178 20.6259 14.125 20.4486C14.467 20.2511 14.7511 19.967 14.9486 19.625C15.1259 19.3178 15.192 18.9918 15.2218 18.6627C15.25 18.3514 15.25 17.9721 15.25 17.5323V17.4678C15.25 17.028 15.25 16.6486 15.2218 16.3374C15.192 16.0082 15.1259 15.6822 14.9486 15.375C14.7511 15.033 14.467 14.7489 14.125 14.5514C13.8178 14.3741 13.4918 14.308 13.1627 14.2782C12.8514 14.25 12.472 14.25 12.0323 14.25H11.9678ZM10.625 15.8505C10.6659 15.8269 10.7476 15.7925 10.9727 15.7721C11.2082 15.7507 11.5189 15.75 12 15.75C12.4811 15.75 12.7918 15.7507 13.0273 15.7721C13.2524 15.7925 13.3341 15.8269 13.375 15.8505C13.489 15.9163 13.5837 16.011 13.6495 16.125C13.6731 16.1659 13.7075 16.2476 13.7279 16.4727C13.7493 16.7082 13.75 17.0189 13.75 17.5C13.75 17.9811 13.7493 18.2918 13.7279 18.5273C13.7075 18.7524 13.6731 18.8341 13.6495 18.875C13.5837 18.989 13.489 19.0837 13.375 19.1495C13.3341 19.1731 13.2524 19.2075 13.0273 19.2279C12.7918 19.2493 12.4811 19.25 12 19.25C11.5189 19.25 11.2082 19.2493 10.9727 19.2279C10.7476 19.2075 10.6659 19.1731 10.625 19.1495C10.511 19.0837 10.4163 18.989 10.3505 18.875C10.3269 18.8341 10.2925 18.7524 10.2721 18.5273C10.2507 18.2918 10.25 17.9811 10.25 17.5C10.25 17.0189 10.2507 16.7082 10.2721 16.4727C10.2925 16.2476 10.3269 16.1659 10.3505 16.125C10.4163 16.011 10.511 15.9163 10.625 15.8505Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.4678 14.25H19.5322C19.972 14.25 20.3514 14.25 20.6627 14.2782C20.9918 14.308 21.3178 14.3741 21.625 14.5514C21.967 14.7489 22.2511 15.033 22.4486 15.375C22.6259 15.6822 22.692 16.0082 22.7218 16.3374C22.75 16.6486 22.75 17.0279 22.75 17.4677V17.5322C22.75 17.972 22.75 18.3514 22.7218 18.6627C22.692 18.9918 22.6259 19.3178 22.4486 19.625C22.2511 19.967 21.967 20.2511 21.625 20.4486C21.3178 20.6259 20.9918 20.692 20.6627 20.7218C20.3514 20.75 19.9721 20.75 19.5323 20.75H19.4678C19.028 20.75 18.6486 20.75 18.3374 20.7218C18.0082 20.692 17.6822 20.6259 17.375 20.4486C17.033 20.2511 16.7489 19.967 16.5514 19.625C16.3741 19.3178 16.308 18.9918 16.2782 18.6627C16.25 18.3514 16.25 17.972 16.25 17.5323V17.4678C16.25 17.028 16.25 16.6486 16.2782 16.3374C16.308 16.0082 16.3741 15.6822 16.5514 15.375C16.7489 15.033 17.033 14.7489 17.375 14.5514C17.6822 14.3741 18.0082 14.308 18.3374 14.2782C18.6486 14.25 19.028 14.25 19.4678 14.25ZM18.4727 15.7721C18.2476 15.7925 18.1659 15.8269 18.125 15.8505C18.011 15.9163 17.9163 16.011 17.8505 16.125C17.8269 16.1659 17.7925 16.2476 17.7721 16.4727C17.7507 16.7082 17.75 17.0189 17.75 17.5C17.75 17.9811 17.7507 18.2918 17.7721 18.5273C17.7925 18.7524 17.8269 18.8341 17.8505 18.875C17.9163 18.989 18.011 19.0837 18.125 19.1495C18.1659 19.1731 18.2476 19.2075 18.4727 19.2279C18.7082 19.2493 19.0189 19.25 19.5 19.25C19.9811 19.25 20.2918 19.2493 20.5273 19.2279C20.7524 19.2075 20.8341 19.1731 20.875 19.1495C20.989 19.0837 21.0837 18.989 21.1495 18.875C21.1731 18.8341 21.2075 18.7524 21.2279 18.5273C21.2493 18.2918 21.25 17.9811 21.25 17.5C21.25 17.0189 21.2493 16.7082 21.2279 16.4727C21.2075 16.2476 21.1731 16.1659 21.1495 16.125C21.0837 16.011 20.989 15.9163 20.875 15.8505C20.8341 15.8269 20.7524 15.7925 20.5273 15.7721C20.2918 15.7507 19.9811 15.75 19.5 15.75C19.0189 15.75 18.7082 15.7507 18.4727 15.7721Z" fill="currentColor"></path>
                            </g>
                        </svg>
                        <?= translate('promote_student') ?>
                    </a>
            </div>
        </div>
    </div>
<?php } ?>
<!---//superadmin/Admin Shortcut buttons--->
<!--***************Shortcut buttons*************************************************************************************************************-->
<!--**********************Php functions--->
<!--count widget-->
<?php
$div = 0;
if (get_permission('employee_count_widget', 'is_view')) {
    $div++;
}
if (get_permission('student_count_widget', 'is_view')) {
    $div++;
}
if (get_permission('parent_count_widget', 'is_view')) {
    $div++;
}
if (get_permission('teacher_count_widget', 'is_view')) {
    $div++;
}
if ($div == 0) {
    $widget1 = 0;
} else {
    $widget1 = 12 / $div;
}
//count Widget end function
//birth day widget function
$div3 = 12;
if (get_permission('student_birthday_widget', 'is_view') || get_permission('staff_birthday_widget', 'is_view')) {
    $div3 = 9;
}
?>
<!--some randome check shit--->
<?php if ($sqlMode == true) { ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle"></i> This School management system may not work properly because "ONLY_FULL_GROUP_BY" is enabled, <strong>Strongly recommended</strong> - consult with your hosting provider to disable "ONLY_FULL_GROUP_BY" in sql_mode configuration.
    </div>
<?php } ?>
<!--some randome check shit--->
<!---Attendance count wiget (BETA)--->
<?php
$days = $weekend_attendance["days"];
$student_present = $weekend_attendance["student_present"];
$student_absent = $weekend_attendance["student_absent"];
$employee_present = $weekend_attendance["employee_present"];
$employee_absent = $weekend_attendance["employee_absent"];
?>
<!--**********************Php functions--->
<!---Count Widget--->
<?php if (is_superadmin_loggedin() || is_admin_loggedin()) { ?>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-12">
            <div class="cdev-dashboard-page">
                <?php if ($widget1 > 0) { ?>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="cdev-widget-row-in">
                                <!-- Students First -->
                                <?php if (get_permission('student_count_widget', 'is_view')) { ?>
                                    <div class="cdev-stat-card-wrapper">
                                        <div class="cdev-dashboard-stat-card cdev-stat-students">
                                            <div class="cdev-widget-col-in">

                                                <h5><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 6.25C7.48122 6.25 6.25 7.48122 6.25 9C6.25 10.5188 7.48122 11.75 9 11.75C10.5188 11.75 11.75 10.5188 11.75 9C11.75 7.48122 10.5188 6.25 9 6.25ZM7.75 9C7.75 8.30965 8.30965 7.75 9 7.75C9.69036 7.75 10.25 8.30965 10.25 9C10.25 9.69036 9.69036 10.25 9 10.25C8.30965 10.25 7.75 9.69036 7.75 9Z" fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 12.25C7.80424 12.25 6.68461 12.4907 5.83616 12.915C5.03258 13.3168 4.25 14.0106 4.25 15L4.24987 15.0625C4.24834 15.5728 4.24576 16.4322 5.06023 17.0218C5.43818 17.2953 5.9369 17.4698 6.55469 17.581C7.1782 17.6932 7.97721 17.75 9 17.75C10.0228 17.75 10.8218 17.6932 11.4453 17.581C12.0631 17.4698 12.5618 17.2953 12.9398 17.0218C13.7542 16.4322 13.7517 15.5728 13.7501 15.0625L13.75 15C13.75 14.0106 12.9674 13.3168 12.1638 12.915C11.3154 12.4907 10.1958 12.25 9 12.25ZM5.75 15C5.75 14.8848 5.86285 14.5787 6.50698 14.2566C7.10625 13.957 7.98662 13.75 9 13.75C10.0134 13.75 10.8937 13.957 11.493 14.2566C12.1371 14.5787 12.25 14.8848 12.25 15C12.25 15.6045 12.2115 15.6972 12.0602 15.8067C11.9382 15.895 11.6869 16.0134 11.1797 16.1047C10.6782 16.1949 9.97721 16.25 9 16.25C8.02279 16.25 7.3218 16.1949 6.82031 16.1047C6.31311 16.0134 6.06182 15.895 5.93977 15.8067C5.78849 15.6972 5.75 15.6045 5.75 15Z" fill="currentColor"></path>
                                                            <path d="M19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25H15C14.5858 11.25 14.25 11.5858 14.25 12C14.25 12.4142 14.5858 12.75 15 12.75H19Z" fill="currentColor"></path>
                                                            <path d="M19.75 9C19.75 9.41422 19.4142 9.75 19 9.75H14C13.5858 9.75 13.25 9.41422 13.25 9C13.25 8.58579 13.5858 8.25 14 8.25H19C19.4142 8.25 19.75 8.58579 19.75 9Z" fill="currentColor"></path>
                                                            <path d="M19 15.75C19.4142 15.75 19.75 15.4142 19.75 15C19.75 14.5858 19.4142 14.25 19 14.25H16C15.5858 14.25 15.25 14.5858 15.25 15C15.25 15.4142 15.5858 15.75 16 15.75H19Z" fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.94358 3.25H14.0564C15.8942 3.24998 17.3498 3.24997 18.489 3.40314C19.6614 3.56076 20.6104 3.89288 21.3588 4.64124C22.1071 5.38961 22.4392 6.33856 22.5969 7.51098C22.75 8.65018 22.75 10.1058 22.75 11.9435V12.0564C22.75 13.8942 22.75 15.3498 22.5969 16.489C22.4392 17.6614 22.1071 18.6104 21.3588 19.3588C20.6104 20.1071 19.6614 20.4392 18.489 20.5969C17.3498 20.75 15.8942 20.75 14.0565 20.75H9.94359C8.10585 20.75 6.65018 20.75 5.51098 20.5969C4.33856 20.4392 3.38961 20.1071 2.64124 19.3588C1.89288 18.6104 1.56076 17.6614 1.40314 16.489C1.24997 15.3498 1.24998 13.8942 1.25 12.0564V11.9436C1.24998 10.1058 1.24997 8.65019 1.40314 7.51098C1.56076 6.33856 1.89288 5.38961 2.64124 4.64124C3.38961 3.89288 4.33856 3.56076 5.51098 3.40314C6.65019 3.24997 8.10583 3.24998 9.94358 3.25ZM5.71085 4.88976C4.70476 5.02503 4.12511 5.27869 3.7019 5.7019C3.27869 6.12511 3.02503 6.70476 2.88976 7.71085C2.75159 8.73851 2.75 10.0932 2.75 12C2.75 13.9068 2.75159 15.2615 2.88976 16.2892C3.02503 17.2952 3.27869 17.8749 3.7019 18.2981C4.12511 18.7213 4.70476 18.975 5.71085 19.1102C6.73851 19.2484 8.09318 19.25 10 19.25H14C15.9068 19.25 17.2615 19.2484 18.2892 19.1102C19.2952 18.975 19.8749 18.7213 20.2981 18.2981C20.7213 17.8749 20.975 17.2952 21.1102 16.2892C21.2484 15.2615 21.25 13.9068 21.25 12C21.25 10.0932 21.2484 8.73851 21.1102 7.71085C20.975 6.70476 20.7213 6.12511 20.2981 5.7019C19.8749 5.27869 19.2952 5.02503 18.2892 4.88976C17.2615 4.75159 15.9068 4.75 14 4.75H10C8.09318 4.75 6.73851 4.75159 5.71085 4.88976Z" fill="currentColor"></path>
                                                        </g>
                                                    </svg> <?php echo translate('students'); ?></h5>
                                                <h3 class="cdev-stat-counter"><?= $get_total_student ?></h3>
                                                <div class="cdev-stat-footer">
                                                    <span class="text-uppercase"><?php echo translate('total_students'); ?></span>
                                                </div>
                                                <div class="cdev-stat-icon">
                                                    <i class="fas fa-user-graduate"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Parents Second -->
                                <?php if (get_permission('parent_count_widget', 'is_view')) { ?>
                                    <div class="cdev-stat-card-wrapper">
                                        <div class="cdev-dashboard-stat-card cdev-stat-parents">
                                            <div class="cdev-widget-col-in">

                                                <h5><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="currentColor"></path>
                                                            <path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="currentColor"></path>
                                                            <path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="currentColor"></path>
                                                            <path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="currentColor"></path>
                                                            <path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="currentColor"></path>
                                                        </g>
                                                    </svg> <?php echo translate('parents'); ?></h5>
                                                <h3 class="cdev-stat-counter"><?php
                                                                                if (!empty($school_id))
                                                                                    $this->db->where('branch_id', $school_id);
                                                                                echo $this->db->select('id')->get('parent')->num_rows();
                                                                                ?></h3>
                                                <div class="cdev-stat-footer">
                                                    <span class="text-uppercase"><?php echo translate('total_parents'); ?></span>
                                                </div>
                                                <div class="cdev-stat-icon">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- Teachers -->
                                <?php if (get_permission('teacher_count_widget', 'is_view')) { ?>
                                    <div class="cdev-stat-card-wrapper">
                                        <div class="cdev-dashboard-stat-card cdev-stat-teachers">
                                            <div class="cdev-widget-col-in">

                                                <h5><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.25C6.37665 1.25 4.25 3.37665 4.25 6C4.25 8.62335 6.37665 10.75 9 10.75C11.6234 10.75 13.75 8.62335 13.75 6C13.75 3.37665 11.6234 1.25 9 1.25ZM5.75 6C5.75 4.20507 7.20507 2.75 9 2.75C10.7949 2.75 12.25 4.20507 12.25 6C12.25 7.79493 10.7949 9.25 9 9.25C7.20507 9.25 5.75 7.79493 5.75 6Z" fill="currentColor"></path>
                                                            <path d="M15 2.25C14.5858 2.25 14.25 2.58579 14.25 3C14.25 3.41421 14.5858 3.75 15 3.75C16.2426 3.75 17.25 4.75736 17.25 6C17.25 7.24264 16.2426 8.25 15 8.25C14.5858 8.25 14.25 8.58579 14.25 9C14.25 9.41421 14.5858 9.75 15 9.75C17.0711 9.75 18.75 8.07107 18.75 6C18.75 3.92893 17.0711 2.25 15 2.25Z" fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.67815 13.5204C5.07752 12.7208 6.96067 12.25 9 12.25C11.0393 12.25 12.9225 12.7208 14.3219 13.5204C15.7 14.3079 16.75 15.5101 16.75 17C16.75 18.4899 15.7 19.6921 14.3219 20.4796C12.9225 21.2792 11.0393 21.75 9 21.75C6.96067 21.75 5.07752 21.2792 3.67815 20.4796C2.3 19.6921 1.25 18.4899 1.25 17C1.25 15.5101 2.3 14.3079 3.67815 13.5204ZM4.42236 14.8228C3.26701 15.483 2.75 16.2807 2.75 17C2.75 17.7193 3.26701 18.517 4.42236 19.1772C5.55649 19.8253 7.17334 20.25 9 20.25C10.8267 20.25 12.4435 19.8253 13.5776 19.1772C14.733 18.517 15.25 17.7193 15.25 17C15.25 16.2807 14.733 15.483 13.5776 14.8228C12.4435 14.1747 10.8267 13.75 9 13.75C7.17334 13.75 5.55649 14.1747 4.42236 14.8228Z" fill="currentColor"></path>
                                                            <path d="M18.1607 13.2674C17.7561 13.1787 17.3561 13.4347 17.2674 13.8393C17.1787 14.2439 17.4347 14.6439 17.8393 14.7326C18.6317 14.9064 19.2649 15.2048 19.6829 15.5468C20.1014 15.8892 20.25 16.2237 20.25 16.5C20.25 16.7507 20.1294 17.045 19.7969 17.3539C19.462 17.665 18.9475 17.9524 18.2838 18.1523C17.8871 18.2717 17.6624 18.69 17.7818 19.0867C17.9013 19.4833 18.3196 19.708 18.7162 19.5886C19.5388 19.3409 20.2743 18.9578 20.8178 18.4529C21.3637 17.9457 21.75 17.2786 21.75 16.5C21.75 15.6352 21.2758 14.912 20.6328 14.3859C19.9893 13.8593 19.1225 13.4783 18.1607 13.2674Z" fill="currentColor"></path>
                                                        </g>
                                                    </svg> <?php echo translate('teachers'); ?></h5>
                                                <h3 class="cdev-stat-counter"><?php
                                                                                $staff = $this->dashboard_model->getstaffcounter(3, $school_id);
                                                                                echo $staff['snumber'];
                                                                                ?></h3>
                                                <div class="cdev-stat-footer">
                                                    <span class="text-uppercase"><?= translate('total_employee') ?></span>
                                                </div>
                                                <div class="cdev-stat-icon">
                                                    <i class="fas fa-chalkboard-teacher"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- Admission Last -->
                                <?php if (get_permission('admission_count_widget', 'is_view')) { ?>
                                    <div class="cdev-stat-card-wrapper">
                                        <div class="cdev-dashboard-stat-card cdev-stat-admission">
                                            <div class="cdev-widget-col-in">
                                                <h5><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5"></path>
                                                            <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M19.8284 3.17157C18.6569 2 16.7712 2 13 2H11C7.22876 2 5.34315 2 4.17157 3.17157C3 4.34315 3 6.22876 3 10V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </g>
                                                    </svg> <?php echo translate('admission'); ?></h5>
                                                <h3 class="cdev-stat-counter"><?= $get_monthly_admission; ?></h3>
                                                <div class="cdev-stat-footer">
                                                    <span class="text-uppercase"><?php echo translate('this_month'); ?></span>
                                                </div>
                                                <div class="cdev-stat-icon">
                                                    <i class="fas fa-user-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!---Count Widget--->

       <!---Admin fees summery--->
            <div class="row">
                <div class="col-md-12">
                    <div class="cdev-dashboard-card">
                        <div class="cdev-card-header">
                            <h3 class="cdev-card-title">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2102 5.83041C17.4287 5.75091 16.4201 5.75 15 5.75L9 5.75C7.57993 5.75 6.57133 5.75091 5.78975 5.83042C5.02071 5.90865 4.55507 6.05673 4.1944 6.29772C3.83953 6.53484 3.53484 6.83953 3.29772 7.1944C3.05673 7.55507 2.90865 8.02071 2.83041 8.78975C2.75091 9.57133 2.75 10.5799 2.75 12C2.75 13.4201 2.75091 14.4287 2.83042 15.2102C2.90865 15.9793 3.05673 16.4449 3.29772 16.8056C3.53484 17.1605 3.83953 17.4652 4.1944 17.7023C4.55507 17.9433 5.02071 18.0914 5.78975 18.1696C6.57133 18.2491 7.57993 18.25 9 18.25H15C16.4201 18.25 17.4287 18.2491 18.2102 18.1696C18.9793 18.0914 19.4449 17.9433 19.8056 17.7023C20.1605 17.4652 20.4652 17.1605 20.7023 16.8056C20.9433 16.4449 21.0914 15.9793 21.1696 15.2102C21.2491 14.4287 21.25 13.4201 21.25 12C21.25 10.5799 21.2491 9.57133 21.1696 8.78975C21.0914 8.02071 20.9433 7.55507 20.7023 7.1944C20.4652 6.83953 20.1605 6.53484 19.8056 6.29772C19.4449 6.05673 18.9793 5.90865 18.2102 5.83041ZM18.3621 4.33812C19.2497 4.42841 19.9907 4.61739 20.639 5.05052C21.1576 5.39707 21.6029 5.84239 21.9495 6.36104C22.3826 7.00926 22.5716 7.7503 22.6619 8.63794C22.75 9.50431 22.75 10.5892 22.75 11.9584V12.0416C22.75 13.4108 22.75 14.4957 22.6619 15.3621C22.5716 16.2497 22.3826 16.9907 21.9495 17.639C21.6029 18.1576 21.1576 18.6029 20.639 18.9495C19.9907 19.3826 19.2497 19.5716 18.3621 19.6619C17.4957 19.75 16.4108 19.75 15.0416 19.75H8.9584C7.5892 19.75 6.5043 19.75 5.63795 19.6619C4.7503 19.5716 4.00926 19.3826 3.36104 18.9495C2.84239 18.6029 2.39707 18.1576 2.05052 17.639C1.61739 16.9907 1.42841 16.2497 1.33812 15.3621C1.24998 14.4957 1.24999 13.4108 1.25 12.0416V11.9584C1.24999 10.5892 1.24998 9.5043 1.33812 8.63795C1.42841 7.7503 1.61739 7.00926 2.05052 6.36104C2.39707 5.84239 2.84239 5.39707 3.36104 5.05052C4.00926 4.61739 4.7503 4.42841 5.63794 4.33812C6.5043 4.24998 7.5892 4.24999 8.95841 4.25L15.0416 4.25C16.4108 4.24999 17.4957 4.24998 18.3621 4.33812ZM5.5 8.25C5.91421 8.25 6.25 8.58579 6.25 9L6.25 15C6.25 15.4142 5.91421 15.75 5.5 15.75C5.08579 15.75 4.75 15.4142 4.75 15L4.75 9C4.75 8.58579 5.08579 8.25 5.5 8.25ZM12 9.75C10.7574 9.75 9.75 10.7574 9.75 12C9.75 13.2426 10.7574 14.25 12 14.25C13.2426 14.25 14.25 13.2426 14.25 12C14.25 10.7574 13.2426 9.75 12 9.75ZM8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12ZM18.5 8.25C18.9142 8.25 19.25 8.58579 19.25 9V15C19.25 15.4142 18.9142 15.75 18.5 15.75C18.0858 15.75 17.75 15.4142 17.75 15V9C17.75 8.58579 18.0858 8.25 18.5 8.25Z" fill="currentColor"></path>
                                    </g>
                                </svg> <?php
                                        echo translate('fees_summary');
                                        ?>
                            </h3>
                        </div>
                        <div class="cdev-card-body">
                            <div class="cdev-summary-grid">
                                <!-- Total Allocated Fees -->
                                <div class="cdev-stat-card cdev-primary">
                                    <div class="cdev-stat-content">
                                        <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . $fee_summary_totals['total_allocated']); ?></h3>
                                        <p class="cdev-stat-label"><?php echo translate('total_fees_allocated'); ?></p>
                                    </div>
                                    <div class="cdev-stat-icon">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                </div>

                                <!-- Total Paid Fees -->
                                <div class="cdev-stat-card cdev-success">
                                    <div class="cdev-stat-content">
                                        <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . $fee_summary_totals['total_paid']); ?></h3>
                                        <p class="cdev-stat-label"><?php echo translate('total_fees_paid'); ?></p>
                                    </div>
                                    <div class="cdev-stat-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>

                                <!-- Total Outstanding Fees -->
                                <div class="cdev-stat-card cdev-warning">
                                    <div class="cdev-stat-content">
                                        <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . $fee_summary_totals['total_outstanding']); ?></h3>
                                        <p class="cdev-stat-label"><?php echo translate('total_outstanding_fees'); ?></p>
                                    </div>
                                    <div class="cdev-stat-icon">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Progress -->
                            <div class="cdev-progress-container">
                                <div class="cdev-progress-header">
                                    <span class="cdev-progress-label"><?php echo translate('payment_progress'); ?></span>
                                    <span class="cdev-progress-percentage"><?php echo $fee_summary_totals['payment_percentage']; ?>%</span>
                                </div>
                                <div class="cdev-progress">
                                    <div class="cdev-progress-bar" style="width: <?php echo $fee_summary_totals['payment_percentage']; ?>%"></div>
                                </div>
                            </div>

                            <!-- Fees Details Button -->
                            <div class="cdev-card-footer">

                                <a href="<?php echo base_url('offline_payments/payments'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.09878 1.25004C7.14683 1.25006 7.19559 1.25008 7.24508 1.25008H16.7551C16.8045 1.25008 16.8533 1.25006 16.9014 1.25004C17.9181 1.2496 18.6178 1.24929 19.2072 1.45435C20.3201 1.84161 21.1842 2.73726 21.5547 3.86559L20.8421 4.09954L21.5547 3.86559C21.7507 4.46271 21.7505 5.17254 21.7501 6.22655C21.7501 6.27372 21.7501 6.32158 21.7501 6.37014V20.3743C21.7501 21.8395 20.0231 22.7118 18.8857 21.671C18.8062 21.5983 18.694 21.5983 18.6145 21.671L18.1314 22.1131C17.2032 22.9624 15.7969 22.9624 14.8688 22.1131C14.5138 21.7882 13.9864 21.7882 13.6314 22.1131C12.7032 22.9624 11.2969 22.9624 10.3688 22.1131C10.0138 21.7882 9.48637 21.7882 9.13138 22.1131C8.20319 22.9624 6.79694 22.9624 5.86875 22.1131L5.38566 21.671C5.30618 21.5983 5.19395 21.5983 5.11448 21.671C3.97705 22.7118 2.25007 21.8395 2.25007 20.3743V6.37014C2.25007 6.32158 2.25005 6.27372 2.25003 6.22655C2.24965 5.17255 2.24939 4.46271 2.44545 3.86559C2.81591 2.73726 3.68002 1.84161 4.79298 1.45435C5.3823 1.24929 6.08203 1.2496 7.09878 1.25004ZM7.24508 2.75008C6.024 2.75008 5.6034 2.76057 5.28593 2.87103C4.62655 3.10047 4.09919 3.63728 3.8706 4.3335C3.75951 4.67183 3.75007 5.11796 3.75007 6.37014V20.3743C3.75007 20.4933 3.80999 20.5661 3.88517 20.6009C3.92434 20.619 3.96264 20.6237 3.99456 20.6194C4.0227 20.6156 4.05911 20.6035 4.10185 20.5644C4.75453 19.9671 5.74561 19.9671 6.39828 20.5644L6.88138 21.0065C7.23637 21.3313 7.76377 21.3313 8.11875 21.0065C9.04694 20.1571 10.4532 20.1571 11.3814 21.0065C11.7364 21.3313 12.2638 21.3313 12.6188 21.0065C13.5469 20.1571 14.9532 20.1571 15.8814 21.0065C16.2364 21.3313 16.7638 21.3313 17.1188 21.0065L17.6019 20.5644C18.2545 19.9671 19.2456 19.9671 19.8983 20.5644C19.941 20.6035 19.9774 20.6156 20.0056 20.6194C20.0375 20.6237 20.0758 20.619 20.115 20.6009C20.1901 20.5661 20.2501 20.4934 20.2501 20.3743V6.37014C20.2501 5.11797 20.2406 4.67183 20.1295 4.3335C19.9009 3.63728 19.3736 3.10047 18.7142 2.87103C18.3967 2.76057 17.9761 2.75008 16.7551 2.75008H7.24508ZM14.9996 7.44063C15.3086 7.7165 15.3354 8.19062 15.0595 8.49959L11.4881 12.4996C11.3458 12.659 11.1423 12.7501 10.9286 12.7501C10.715 12.7501 10.5115 12.659 10.3692 12.4996L8.94061 10.8996C8.66474 10.5906 8.69158 10.1165 9.00056 9.84063C9.30953 9.56476 9.78365 9.59159 10.0595 9.90057L10.9286 10.874L13.9406 7.50057C14.2165 7.19159 14.6906 7.16476 14.9996 7.44063ZM6.75007 15.5001C6.75007 15.0859 7.08585 14.7501 7.50007 14.7501H16.5001C16.9143 14.7501 17.2501 15.0859 17.2501 15.5001C17.2501 15.9143 16.9143 16.2501 16.5001 16.2501H7.50007C7.08585 16.2501 6.75007 15.9143 6.75007 15.5001Z" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span><?php echo translate('approve_payments'); ?></span>
                                </a>

                                <a href="<?php echo base_url('fees/invoice_list'); ?>" class="cdev-action-btn cdev-pay-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
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
                                    </svg>
                                    <span><?php echo translate('record_payment'); ?></span>
                                </a>

                            </div>
                        </div>
                    </div>
                    
                       <!---Admin fees summery--->
                    <?php if (get_permission('monthly_income_vs_expense_chart', 'is_view')) {
                        // Calculate totals
                        $totalIncome = 0;
                        $totalExpense = 0;

                        foreach ($income_vs_expense as $item) {
                            if (stripos($item['name'], 'income') !== false) {
                                $totalIncome += $item['value'];
                            } elseif (stripos($item['name'], 'expense') !== false) {
                                $totalExpense += $item['value'];
                            }
                        }

                        // Calculate total balance
                        $totalBalance = $totalIncome - $totalExpense;

                        // Determine balance trend
                        $balanceTrend = $totalBalance >= 0 ? 'positive' : 'negative';
                    ?>

                        <div class="cdev-dashboard-card">
                            <div class="cdev-card-header">
                                <h3 class="cdev-card-title">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17.15 13.8201L14.11 16.8601" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.84998 13.8201H17.15" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.84998 10.1799L9.88998 7.13989" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17.15 10.1799H6.84998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg><?= translate('income_&_expense_for') . " " . translate(strtolower(date('F'))) ?>
                                </h3>
                            </div>
                            <div class="cdev-card-body">
                                <div class="cdev-exp-grid">
                                    <!-- Current Balance -->
                                    <div class="cdev-stat-card cdev-success">
                                        <div class="cdev-stat-content">

                                            <h3 class="cdev-stat-value">
                                                <?php echo html_escape($global_config['currency_symbol'] . ' ' . number_format($totalBalance, 2)); ?>
                                            </h3>
                                            <p class="cdev-stat-label"><?php echo translate('balance'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </div>
                                    </div>
                                    <!--Income-->
                                    <div class="cdev-stat-card cdev-primary">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . number_format($totalIncome, 2)); ?>
                                                <p class="cdev-stat-label"><?php echo translate('income'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                    <!--Expense -->
                                    <div class="cdev-stat-card cdev-danger">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . number_format($totalExpense, 2)); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('expenses'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="cdev-card-footer">
                                    <a href="<?php echo base_url('accounting/all_transactions'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C21.1071 3.38961 21.4392 4.33856 21.5969 5.51098C21.75 6.65019 21.75 8.10583 21.75 9.94359V14.0564C21.75 15.8942 21.75 17.3498 21.5969 18.489C21.4392 19.6614 21.1071 20.6104 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.7213 19.8749 19.975 19.2952 20.1102 18.2892C20.2484 17.2615 20.25 15.9068 20.25 14V10C20.25 8.09318 20.2484 6.73851 20.1102 5.71085C19.975 4.70476 19.7213 4.12511 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976ZM7.25 8C7.25 7.58579 7.58579 7.25 8 7.25H16C16.4142 7.25 16.75 7.58579 16.75 8C16.75 8.41421 16.4142 8.75 16 8.75H8C7.58579 8.75 7.25 8.41421 7.25 8ZM7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4142 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12ZM7.25 16C7.25 15.5858 7.58579 15.25 8 15.25H13C13.4142 15.25 13.75 15.5858 13.75 16C13.75 16.4142 13.4142 16.75 13 16.75H8C7.58579 16.75 7.25 16.4142 7.25 16Z" fill="currentColor"></path>
                                            </g>
                                        </svg>
                                        <span><?php echo translate('transaction_history'); ?></span>
                                    </a>
                                    <a href="<?php echo base_url('accounting/voucher_expense'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor"></path>
                                            </g>
                                        </svg><span><?php echo translate('record_expense'); ?></span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php } ?>

<!----Teacher/studentAttendance Card----->
<?php if (is_superadmin_loggedin() || is_admin_loggedin()) { ?>
            <div class="cdev-attend-panel">
                <div class="cdev-panel-header">
                    <h3 class="cdev-panel-title">
                        <?php
                        $day = date('l');
                        $month = strtolower(date('F'));

                        if ($day == 'Saturday' || $day == 'Sunday') {
                            echo "No Attendance Today, Enjoy The Weekend!";
                        } else {
                            echo translate('attendance_for') . " " . translate(strtolower($day));
                        }
                        ?>
                    </h3>
                </div>
                <div class="cdev-panel-content">
                    <div class="cdev-attend-layout">
                        <!-- Students Attendance -->
                        <div class="cdev-metrics-box">
                            <div class="cdev-box-inner">
                                <div class="cdev-box-content">
                                    <p class="cdev-metrics-header">Students Present Today</p>
                                    <div class="cdev-metrics-data">
                                        <p class="cdev-data-primary">Students Present: <span class="cdev-count-present"><?php echo end($student_present)['y']; ?></span></p>
                                        <p>Students Absent: <span class="cdev-count-absent"><?php echo end($student_absent)['y']; ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Teachers Attendance -->
                        <div class="cdev-metrics-box">
                            <div class="cdev-box-inner">
                                <div class="cdev-box-content">
                                    <p class="cdev-metrics-header">Teachers Present Today</p>
                                    <div class="cdev-metrics-data">
                                        <p class="cdev-data-primary">Teachers Present: <span class="cdev-count-present"><?php echo end($employee_present)['y']; ?></span></p>
                                        <p>Teachers Absent: <span class="cdev-count-absent"><?php echo end($employee_absent)['y']; ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!----End of Attendance Card---->
                    <!-- student quantity chart -->
                    <div class="row">
                        <?php if (get_permission('student_quantity_pie_chart', 'is_view')) { ?>
                            <div class="<?php echo get_permission('weekend_attendance_inspection_chart', 'is_view') ? 'col-md-12 col-lg-4 col-xl-3' : 'col-md-12'; ?>">
                                <section class="panel pg-fw">
                                    <div class="panel-body">
                                        <h4 class="chart-title mb-xs"><?= translate('student_quantity') ?></h4>
                                        <div id="student_strength"></div>
                                        <div class="round-overlap"><svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path>
                                                    <path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path>
                                                    <path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path>
                                                    <path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path>
                                                    <path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path>
                                                </g>
                                            </svg></div>
                                    </div>
                                </section>
                            </div>
                        <?php } ?>
                        <?php if (get_permission('weekend_attendance_inspection_chart', 'is_view')) { ?>
                            <div class="<?php echo get_permission('student_quantity_pie_chart', 'is_view') ? 'col-md-12 col-lg-8 col-xl-9' : 'col-md-12'; ?>">
                                <section class="panel">
                                    <div class="panel-body">
                                        <h4 class="chart-title mb-md"><?= translate('weekend_attendance_inspection') ?></h4>
                                        <div class="pg-fw">
                                            <canvas id="weekend_attendance" style="height: 340px;"></canvas>
                                        </div>
                                    </div>
                                </section>
                            </div>
                    </div>
                <?php } ?>
            <?php } ?>

 <!---Accountant DashBoard ----->
            <?php if (is_accountant_loggedin()) { ?>
<!-- Accountant shortcut buttons--->
                <div class="row">
                    <div class="col-md-12">
                        <div class="cdev-dashboard-buttons">
                            <a href="<?= base_url('accounting/voucher_deposit') ?>" class="cdev-dashboard-btn profile-cb"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.94358 3.25H14.0564C15.8942 3.24998 17.3498 3.24997 18.489 3.40314C19.6614 3.56076 20.6104 3.89288 21.3588 4.64124C22.1071 5.38961 22.4392 6.33856 22.5969 7.51098C22.6873 8.18385 22.7244 8.9671 22.7395 9.87428C22.7464 9.91516 22.75 9.95716 22.75 10C22.75 10.0353 22.7476 10.0699 22.7429 10.1039C22.75 10.6696 22.75 11.2818 22.75 11.9436V12C22.75 12.4142 22.4142 12.75 22 12.75C21.5858 12.75 21.25 12.4142 21.25 12C21.25 11.5541 21.2499 11.1384 21.248 10.75H2.75199C2.75009 11.1384 2.75 11.5541 2.75 12C2.75 13.9068 2.75159 15.2615 2.88976 16.2892C3.02502 17.2952 3.27869 17.8749 3.7019 18.2981C4.12511 18.7213 4.70476 18.975 5.71085 19.1102C6.73851 19.2484 8.09318 19.25 10 19.25H14C14.4142 19.25 14.75 19.5858 14.75 20C14.75 20.4142 14.4142 20.75 14 20.75H9.94359C8.10583 20.75 6.65019 20.75 5.51098 20.5969C4.33856 20.4392 3.38961 20.1071 2.64124 19.3588C1.89288 18.6104 1.56076 17.6614 1.40314 16.489C1.24997 15.3498 1.24998 13.8942 1.25 12.0564V11.9436C1.24999 11.2818 1.24999 10.6696 1.25714 10.1039C1.25243 10.0699 1.25 10.0352 1.25 10C1.25 9.95716 1.25359 9.91517 1.26049 9.87429C1.27564 8.96711 1.31267 8.18385 1.40314 7.51098C1.56076 6.33856 1.89288 5.38961 2.64124 4.64124C3.38961 3.89288 4.33856 3.56076 5.51098 3.40314C6.65019 3.24997 8.10582 3.24998 9.94358 3.25ZM2.77607 9.25H21.2239C21.2044 8.66327 21.1701 8.15634 21.1102 7.71085C20.975 6.70476 20.7213 6.12511 20.2981 5.7019C19.8749 5.27869 19.2952 5.02502 18.2892 4.88976C17.2615 4.75159 15.9068 4.75 14 4.75H10C8.09318 4.75 6.73851 4.75159 5.71085 4.88976C4.70476 5.02502 4.12511 5.27869 3.7019 5.7019C3.27869 6.12511 3.02502 6.70476 2.88976 7.71085C2.82987 8.15634 2.79564 8.66327 2.77607 9.25ZM19 13.25C19.4142 13.25 19.75 13.5858 19.75 14V18.1893L20.4697 17.4697C20.7626 17.1768 21.2374 17.1768 21.5303 17.4697C21.8232 17.7626 21.8232 18.2374 21.5303 18.5303L19.5303 20.5303C19.2374 20.8232 18.7626 20.8232 18.4697 20.5303L16.4697 18.5303C16.1768 18.2374 16.1768 17.7626 16.4697 17.4697C16.7626 17.1768 17.2374 17.1768 17.5303 17.4697L18.25 18.1893V14C18.25 13.5858 18.5858 13.25 19 13.25ZM5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H10C10.4142 15.25 10.75 15.5858 10.75 16C10.75 16.4142 10.4142 16.75 10 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16ZM11.75 16C11.75 15.5858 12.0858 15.25 12.5 15.25H13C13.4142 15.25 13.75 15.5858 13.75 16C13.75 16.4142 13.4142 16.75 13 16.75H12.5C12.0858 16.75 11.75 16.4142 11.75 16Z" fill="currentColor"></path>
                                    </g>
                                </svg>
                                <?= translate('new_deposite') ?>
                                <a href="<?= base_url('payroll') ?>" class="cdev-dashboard-btn pay-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.3251 3.75017C14.2209 3.75002 14.1126 3.75 14.0001 3.75L10.0001 3.75C9.88748 3.75 9.77921 3.75002 9.67501 3.75017C9.37671 5.21938 8.21944 6.37665 6.75022 6.67496C6.75008 6.77915 6.75006 6.88742 6.75006 7C6.75006 7.11259 6.75008 7.22086 6.75022 7.32505C8.21944 7.62335 9.37671 8.78062 9.67501 10.2498C9.77921 10.25 9.88748 10.25 10.0001 10.25H14.0001C14.1126 10.25 14.2209 10.25 14.3251 10.2498C14.6234 8.78062 15.7807 7.62336 17.2499 7.32505C17.25 7.22086 17.2501 7.11259 17.2501 7C17.2501 6.88742 17.25 6.77915 17.2499 6.67496C15.7807 6.37665 14.6234 5.21938 14.3251 3.75017ZM14.9296 2.25327C14.655 2.24998 14.3625 2.24999 14.0521 2.25L9.94806 2.25C9.63767 2.24999 9.34509 2.24998 9.07054 2.25327C9.04734 2.25111 9.02383 2.25 9.00006 2.25C8.96867 2.25 8.93772 2.25193 8.90734 2.25568C8.45456 2.26372 8.05363 2.28312 7.70558 2.32991C7.07779 2.41432 6.51099 2.59999 6.05552 3.05546C5.60005 3.51093 5.41438 4.07773 5.32997 4.70552C5.28318 5.05357 5.26377 5.45451 5.25573 5.90728C5.25199 5.93767 5.25006 5.96861 5.25006 6C5.25006 6.02377 5.25117 6.04728 5.25333 6.07048C5.25004 6.34503 5.25005 6.63761 5.25006 6.948V7.052C5.25005 7.36239 5.25004 7.65497 5.25333 7.92952C5.25117 7.95273 5.25006 7.97624 5.25006 8C5.25006 8.0314 5.25199 8.06234 5.25573 8.09272C5.26377 8.5455 5.28318 8.94643 5.32997 9.29448C5.41438 9.92228 5.60005 10.4891 6.05552 10.9445C6.51099 11.4 7.07779 11.5857 7.70558 11.6701C8.05363 11.7169 8.45456 11.7363 8.90734 11.7443C8.93772 11.7481 8.96867 11.75 9.00006 11.75C9.02383 11.75 9.04733 11.7489 9.07054 11.7467C9.34509 11.75 9.63767 11.75 9.94807 11.75H14.0521C14.3625 11.75 14.655 11.75 14.9296 11.7467C14.9528 11.7489 14.9763 11.75 15.0001 11.75C15.0315 11.75 15.0624 11.7481 15.0928 11.7443C15.5456 11.7363 15.9465 11.7169 16.2945 11.6701C16.9223 11.5857 17.4891 11.4 17.9446 10.9445C18.4001 10.4891 18.5857 9.92228 18.6701 9.29448C18.7169 8.94643 18.7363 8.5455 18.7444 8.09272C18.7481 8.06234 18.7501 8.0314 18.7501 8C18.7501 7.97624 18.749 7.95273 18.7468 7.92953C18.7501 7.65497 18.7501 7.36239 18.7501 7.052V6.94801C18.7501 6.63761 18.7501 6.34503 18.7468 6.07048C18.749 6.04728 18.7501 6.02377 18.7501 6C18.7501 5.96861 18.7481 5.93767 18.7444 5.90729C18.7363 5.45451 18.7169 5.05357 18.6701 4.70552C18.5857 4.07773 18.4001 3.51093 17.9446 3.05546C17.4891 2.59999 16.9223 2.41432 16.2945 2.32991C15.9465 2.28312 15.5456 2.26372 15.0928 2.25568C15.0624 2.25193 15.0315 2.25 15.0001 2.25C14.9763 2.25 14.9528 2.25111 14.9296 2.25327ZM15.8941 3.79396C16.122 4.39792 16.6021 4.8781 17.2061 5.10591C17.1996 5.03597 17.1921 4.96924 17.1835 4.90539C17.1215 4.44393 17.0143 4.24644 16.8839 4.11612C16.7536 3.9858 16.5561 3.87858 16.0947 3.81654C16.0308 3.80795 15.9641 3.80048 15.8941 3.79396ZM17.2061 8.89409C16.6021 9.12191 16.122 9.60208 15.8941 10.206C15.9641 10.1995 16.0308 10.1921 16.0947 10.1835C16.5561 10.1214 16.7536 10.0142 16.8839 9.88388C17.0143 9.75357 17.1215 9.55607 17.1835 9.09461C17.1921 9.03076 17.1996 8.96404 17.2061 8.89409ZM8.10597 10.206C7.87816 9.60208 7.39798 9.12191 6.79402 8.89409C6.80053 8.96404 6.80801 9.03076 6.8166 9.09461C6.87864 9.55607 6.98586 9.75357 7.11618 9.88389C7.24649 10.0142 7.44399 10.1214 7.90545 10.1835C7.9693 10.1921 8.03602 10.1995 8.10597 10.206ZM6.79402 5.10591C7.39798 4.8781 7.87816 4.39792 8.10597 3.79396C8.03602 3.80048 7.9693 3.80795 7.90545 3.81654C7.44399 3.87858 7.24649 3.9858 7.11618 4.11612C6.98586 4.24644 6.87864 4.44393 6.8166 4.90539C6.80801 4.96924 6.80053 5.03597 6.79402 5.10591ZM12.0001 6.75C11.862 6.75 11.7501 6.86193 11.7501 7C11.7501 7.13807 11.862 7.25 12.0001 7.25C12.1381 7.25 12.2501 7.13807 12.2501 7C12.2501 6.86193 12.1381 6.75 12.0001 6.75ZM10.2501 7C10.2501 6.0335 11.0336 5.25 12.0001 5.25C12.9666 5.25 13.7501 6.0335 13.7501 7C13.7501 7.9665 12.9666 8.75 12.0001 8.75C11.0336 8.75 10.2501 7.9665 10.2501 7ZM8.68397 14.4482C10.5498 14.0867 12.5471 14.1678 14.1633 15.1318C14.3903 15.2672 14.6031 15.4359 14.7888 15.6444C15.1646 16.0666 15.3588 16.5913 15.3679 17.1174C15.5592 16.994 15.7508 16.857 15.9454 16.71L17.7526 15.3448C18.6572 14.6615 19.9718 14.6614 20.8765 15.3445C21.7125 15.9757 22.0457 17.1085 21.4473 18.0677C21.022 18.7495 20.3815 19.6925 19.7296 20.2962C19.0707 20.9065 18.1329 21.4196 17.4236 21.762C16.5621 22.1778 15.6316 22.4077 14.7269 22.5541C12.8777 22.8535 10.9535 22.8077 9.12505 22.431C8.19064 22.2384 7.21961 22.1384 6.25999 22.1384H4.00006C3.58585 22.1384 3.25006 21.8026 3.25006 21.3884C3.25006 20.9742 3.58585 20.6384 4.00006 20.6384H6.25999C7.3221 20.6384 8.39454 20.749 9.42772 20.9618C11.0798 21.3022 12.8202 21.3432 14.4872 21.0734C15.3161 20.9392 16.0901 20.74 16.7715 20.4111C17.4549 20.0812 18.2233 19.6468 18.7104 19.1957C19.2029 18.7395 19.7541 17.9479 20.1747 17.2738C20.3016 17.0703 20.284 16.7767 19.9727 16.5416C19.6029 16.2624 19.0264 16.2625 18.6567 16.5417L16.8496 17.9069C16.1281 18.4518 15.2402 19.0349 14.1388 19.2106C14.0276 19.2283 13.9119 19.2445 13.7918 19.2588C13.7345 19.2692 13.6749 19.276 13.6133 19.2783C13.051 19.3342 12.3998 19.3472 11.6813 19.2793C11.2689 19.2404 10.9662 18.8745 11.0051 18.4621C11.0441 18.0497 11.41 17.747 11.8223 17.786C12.4498 17.8452 13.0127 17.8321 13.4903 17.7831C13.5 17.7821 13.5096 17.7811 13.5192 17.7801C13.5392 17.7685 13.5696 17.7474 13.6096 17.7125C13.9291 17.4336 13.9576 16.9667 13.6684 16.6418C13.5951 16.5595 13.5049 16.4856 13.3949 16.42C12.2138 15.7155 10.6363 15.5978 8.96927 15.9208C7.31174 16.2419 5.66497 16.9817 4.43392 17.8547C4.09604 18.0943 3.6279 18.0146 3.38828 17.6768C3.14867 17.3389 3.22833 16.8708 3.5662 16.6311C4.96457 15.6395 6.80866 14.8115 8.68397 14.4482Z" fill="currentColor"></path>
                                        </g>
                                    </svg>

                                    <?= translate('payroll') ?>
                                </a>
                                <a href="<?= base_url('fees/invoice_list') ?>" class="cdev-dashboard-btn exam-result"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.12673 3.56055C7.76931 3.24284 7.23069 3.24284 6.87327 3.56055C5.98775 4.34768 4.67284 4.38188 3.75 3.66317V20.337C4.67284 19.6183 5.98775 19.6525 6.87327 20.4396C7.23069 20.7573 7.76931 20.7573 8.12673 20.4396C9.05248 19.6167 10.4475 19.6167 11.3733 20.4396C11.7307 20.7573 12.2693 20.7573 12.6267 20.4396C13.5525 19.6167 14.9475 19.6167 15.8733 20.4396C16.2307 20.7573 16.7693 20.7573 17.1267 20.4396C18.0122 19.6525 19.3272 19.6183 20.25 20.337V3.66317C19.3272 4.38188 18.0122 4.34768 17.1267 3.56055C16.7693 3.24284 16.2307 3.24284 15.8733 3.56055C14.9475 4.38344 13.5525 4.38344 12.6267 3.56055C12.2693 3.24284 11.7307 3.24284 11.3733 3.56055C10.4475 4.38344 9.05248 4.38344 8.12673 3.56055ZM5.87673 2.43943C6.80248 1.61654 8.19752 1.61654 9.12327 2.43943C9.48069 2.75714 10.0193 2.75714 10.3767 2.43943C11.3025 1.61654 12.6975 1.61654 13.6233 2.43943C13.9807 2.75714 14.5193 2.75714 14.8767 2.43943C15.8025 1.61654 17.1975 1.61654 18.1233 2.43943C18.4807 2.75714 19.0193 2.75714 19.3767 2.43943C20.2963 1.62202 21.75 2.27482 21.75 3.50519V20.495C21.75 21.7253 20.2963 22.3781 19.3767 21.5607C19.0193 21.243 18.4807 21.243 18.1233 21.5607C17.1975 22.3836 15.8025 22.3836 14.8767 21.5607C14.5193 21.243 13.9807 21.243 13.6233 21.5607C12.6975 22.3836 11.3025 22.3836 10.3767 21.5607C10.0193 21.243 9.48069 21.243 9.12327 21.5607C8.19752 22.3836 6.80248 22.3836 5.87673 21.5607C5.51931 21.243 4.98069 21.243 4.62327 21.5607C3.70369 22.3781 2.25 21.7253 2.25 20.495V3.50519C2.25 2.27482 3.70369 1.62202 4.62327 2.43943C4.98069 2.75714 5.51931 2.75714 5.87673 2.43943ZM6.75 8.50017C6.75 8.08595 7.08579 7.75017 7.5 7.75017H16.5C16.9142 7.75017 17.25 8.08595 17.25 8.50017C17.25 8.91438 16.9142 9.25017 16.5 9.25017H7.5C7.08579 9.25017 6.75 8.91438 6.75 8.50017ZM6.75 12.0002C6.75 11.586 7.08579 11.2502 7.5 11.2502H16.5C16.9142 11.2502 17.25 11.586 17.25 12.0002C17.25 12.4144 16.9142 12.7502 16.5 12.7502H7.5C7.08579 12.7502 6.75 12.4144 6.75 12.0002ZM6.75 15.5002C6.75 15.086 7.08579 14.7502 7.5 14.7502H16.5C16.9142 14.7502 17.25 15.086 17.25 15.5002C17.25 15.9144 16.9142 16.2502 16.5 16.2502H7.5C7.08579 16.2502 6.75 15.9144 6.75 15.5002Z" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <?= translate('invoices') ?>
                                </a>
                                <a href="<?= base_url('fees/due_report') ?>" class="cdev-dashboard-btn due-fees"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M12 6.25C12.4142 6.25 12.75 6.58579 12.75 7V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V7C11.25 6.58579 11.5858 6.25 12 6.25Z" fill="currentColor"></path>
                                            <path d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C11.2954 1.25 10.6519 1.44359 9.94858 1.77037C9.26808 2.08656 8.48039 2.55304 7.49457 3.13685L6.74148 3.58283C5.75533 4.16682 4.96771 4.63324 4.36076 5.07944C3.73315 5.54083 3.25177 6.01311 2.90334 6.63212C2.55548 7.25014 2.39841 7.91095 2.32306 8.69506C2.24999 9.45539 2.24999 10.3865 2.25 11.556V12.444C2.24999 13.6135 2.24999 14.5446 2.32306 15.3049C2.39841 16.0891 2.55548 16.7499 2.90334 17.3679C3.25177 17.9869 3.73315 18.4592 4.36076 18.9206C4.96771 19.3668 5.75533 19.8332 6.74148 20.4172L7.4946 20.8632C8.48038 21.447 9.2681 21.9135 9.94858 22.2296C10.6519 22.5564 11.2954 22.75 12 22.75C12.7046 22.75 13.3481 22.5564 14.0514 22.2296C14.7319 21.9134 15.5196 21.447 16.5054 20.8632L17.2585 20.4172C18.2446 19.8332 19.0323 19.3668 19.6392 18.9206C20.2669 18.4592 20.7482 17.9869 21.0967 17.3679C21.4445 16.7499 21.6016 16.0891 21.6769 15.3049C21.75 14.5446 21.75 13.6135 21.75 12.4441V11.556C21.75 10.3866 21.75 9.45538 21.6769 8.69506C21.6016 7.91095 21.4445 7.25014 21.0967 6.63212C20.7482 6.01311 20.2669 5.54083 19.6392 5.07944C19.0323 4.63324 18.2447 4.16683 17.2585 3.58285L16.5054 3.13685C15.5196 2.55303 14.7319 2.08656 14.0514 1.77037C13.3481 1.44359 12.7046 1.25 12 1.25ZM8.22524 4.44744C9.25238 3.83917 9.97606 3.41161 10.5807 3.13069C11.1702 2.85676 11.5907 2.75 12 2.75C12.4093 2.75 12.8298 2.85676 13.4193 3.13069C14.0239 3.41161 14.7476 3.83917 15.7748 4.44744L16.4609 4.85379C17.4879 5.46197 18.2109 5.89115 18.7508 6.288C19.2767 6.67467 19.581 6.99746 19.7895 7.36788C19.9986 7.73929 20.1199 8.1739 20.1838 8.83855C20.2492 9.51884 20.25 10.378 20.25 11.5937V12.4063C20.25 13.622 20.2492 14.4812 20.1838 15.1614C20.1199 15.8261 19.9986 16.2607 19.7895 16.6321C19.581 17.0025 19.2767 17.3253 18.7508 17.712C18.2109 18.1089 17.4879 18.538 16.4609 19.1462L15.7748 19.5526C14.7476 20.1608 14.0239 20.5884 13.4193 20.8693C12.8298 21.1432 12.4093 21.25 12 21.25C11.5907 21.25 11.1702 21.1432 10.5807 20.8693C9.97606 20.5884 9.25238 20.1608 8.22524 19.5526L7.53909 19.1462C6.5121 18.538 5.78906 18.1089 5.24924 17.712C4.72326 17.3253 4.419 17.0025 4.2105 16.6321C4.00145 16.2607 3.88005 15.8261 3.81618 15.1614C3.7508 14.4812 3.75 13.622 3.75 12.4063V11.5937C3.75 10.378 3.7508 9.51884 3.81618 8.83855C3.88005 8.1739 4.00145 7.73929 4.2105 7.36788C4.419 6.99746 4.72326 6.67467 5.24924 6.288C5.78906 5.89115 6.5121 5.46197 7.53909 4.85379L8.22524 4.44744Z" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <?= translate('overdue_fees') ?>
                                </a>
                                <a href="<?= base_url('fees/reminder') ?>" class="cdev-dashboard-btn attendance"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.13602 1.6026C8.35556 1.95386 8.24877 2.41657 7.89752 2.6361L3.8975 5.1361C3.54624 5.35563 3.08353 5.24885 2.864 4.8976C2.64447 4.54634 2.75125 4.08363 3.1025 3.8641L7.10253 1.3641C7.45378 1.14457 7.91649 1.25135 8.13602 1.6026ZM15.864 1.6026C16.0835 1.25135 16.5462 1.14457 16.8975 1.3641L20.8975 3.8641C21.2488 4.08363 21.3555 4.54635 21.136 4.8976C20.9165 5.24885 20.4538 5.35563 20.1025 5.1361L16.1025 2.6361C15.7512 2.41657 15.6445 1.95385 15.864 1.6026ZM12 4.7501C7.44365 4.7501 3.75 8.44375 3.75 13.0001C3.75 17.5564 7.44365 21.2501 12 21.2501C16.5563 21.2501 20.25 17.5564 20.25 13.0001C20.25 8.44375 16.5563 4.7501 12 4.7501ZM2.25 13.0001C2.25 7.61532 6.61522 3.2501 12 3.2501C17.3848 3.2501 21.75 7.61532 21.75 13.0001C21.75 18.3849 17.3848 22.7501 12 22.7501C6.61522 22.7501 2.25 18.3849 2.25 13.0001ZM12.5727 9.09026C12.5923 9.10217 12.6119 9.11411 12.6316 9.12607C12.9188 9.3007 13.2022 9.48225 13.4571 9.66123C13.7473 9.86502 14.0567 10.105 14.3617 10.3537C14.3771 10.3663 14.3925 10.3788 14.4078 10.3913C14.9056 10.7974 15.3532 11.1624 15.6659 11.5265C16.0204 11.9394 16.25 12.4035 16.25 13.0001C16.25 13.5967 16.0204 14.0608 15.6659 14.4737C15.3532 14.8378 14.9057 15.2028 14.4078 15.6089L14.3617 15.6465C14.0567 15.8952 13.7473 16.1352 13.4571 16.339C13.2022 16.5179 12.9188 16.6995 12.6316 16.8741C12.6119 16.8861 12.5923 16.898 12.5727 16.9099C12.0879 17.205 11.6298 17.4837 11.2289 17.6277C11.0061 17.7077 10.7505 17.7665 10.4754 17.746C10.1864 17.7245 9.92767 17.6196 9.70216 17.4503C9.24308 17.1057 9.05869 16.6067 8.96253 16.1105C8.87092 15.6377 8.83573 15.0288 8.79462 14.3172L8.79163 14.2656C8.76641 13.8294 8.75 13.395 8.75 13.0001C8.75 12.6052 8.76641 12.1708 8.79163 11.7346L8.79462 11.683C8.83573 10.9714 8.87092 10.3625 8.96253 9.88971C9.05869 9.39349 9.24308 8.89451 9.70216 8.54989C9.92767 8.3806 10.1864 8.27567 10.4754 8.25419C10.7505 8.23374 11.0061 8.29248 11.2289 8.37253C11.6298 8.51654 12.0879 8.79525 12.5727 9.09026ZM10.6004 9.75124C10.5758 9.77005 10.5007 9.83663 10.4351 10.1751C10.365 10.5369 10.3341 11.0436 10.2891 11.8213C10.2649 12.24 10.25 12.6437 10.25 13.0001C10.25 13.3565 10.2649 13.7602 10.2891 14.1789C10.3341 14.9566 10.365 15.4633 10.4351 15.8251C10.5007 16.1636 10.5758 16.2302 10.6004 16.249C10.6192 16.2466 10.6575 16.2391 10.7218 16.216C10.9612 16.13 11.2865 15.9365 11.8523 15.5925C12.1215 15.4288 12.3755 15.2656 12.5951 15.1114C12.8458 14.9354 13.125 14.7195 13.4135 14.4841C13.9722 14.0284 14.3127 13.7471 14.5279 13.4965C14.7108 13.2834 14.75 13.1533 14.75 13.0001C14.75 12.8469 14.7108 12.7168 14.5279 12.5037C14.3127 12.2531 13.9722 11.9718 13.4135 11.5161C13.125 11.2807 12.8458 11.0648 12.5951 10.8888C12.3755 10.7346 12.1215 10.5714 11.8523 10.4077C11.2865 10.0637 10.9612 9.87019 10.7218 9.7842C10.6575 9.76111 10.6192 9.75365 10.6004 9.75124Z" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span><?= translate('fees_reminder') ?></span>
                                </a>

                            </a> <a href="<?= base_url('accounting/transitions_repots') ?>" class="cdev-dashboard-btn calendar"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 14.5001C5.25 14.0858 5.58579 13.7501 6 13.7501H14C14.4142 13.7501 14.75 14.0858 14.75 14.5001C14.75 14.9143 14.4142 15.2501 14 15.2501H6C5.58579 15.2501 5.25 14.9143 5.25 14.5001Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 18C5.25 17.5858 5.58579 17.25 6 17.25H11.5C11.9142 17.25 12.25 17.5858 12.25 18C12.25 18.4143 11.9142 18.75 11.5 18.75H6C5.58579 18.75 5.25 18.4143 5.25 18Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.25 2.83422C11.7896 2.75598 11.162 2.75005 10.0298 2.75005C8.11311 2.75005 6.75075 2.75163 5.71785 2.88987C4.70596 3.0253 4.12453 3.27933 3.7019 3.70195C3.27869 4.12516 3.02502 4.70481 2.88976 5.7109C2.75159 6.73856 2.75 8.09323 2.75 10.0001V14.0001C2.75 15.9069 2.75159 17.2615 2.88976 18.2892C3.02502 19.2953 3.27869 19.8749 3.7019 20.2981C4.12511 20.7214 4.70476 20.975 5.71085 21.1103C6.73851 21.2485 8.09318 21.2501 10 21.2501H14C15.9068 21.2501 17.2615 21.2485 18.2892 21.1103C19.2952 20.975 19.8749 20.7214 20.2981 20.2981C20.7213 19.8749 20.975 19.2953 21.1102 18.2892C21.2484 17.2615 21.25 15.9069 21.25 14.0001V13.5629C21.25 12.0269 21.2392 11.2988 21.0762 10.7501H17.9463C16.8135 10.7501 15.8877 10.7501 15.1569 10.6518C14.3929 10.5491 13.7306 10.3268 13.2019 9.79815C12.6732 9.26945 12.4509 8.60712 12.3482 7.84317C12.25 7.1123 12.25 6.18657 12.25 5.05374V2.83422ZM13.75 3.6095V5.00005C13.75 6.19976 13.7516 7.0241 13.8348 7.64329C13.9152 8.24091 14.059 8.53395 14.2626 8.73749C14.4661 8.94103 14.7591 9.08486 15.3568 9.16521C15.976 9.24846 16.8003 9.25005 18 9.25005H20.0195C19.723 8.9625 19.3432 8.61797 18.85 8.17407L14.8912 4.61117C14.4058 4.17433 14.0446 3.85187 13.75 3.6095ZM10.1755 1.25002C11.5601 1.24965 12.4546 1.24942 13.2779 1.56535C14.1012 1.88129 14.7632 2.47735 15.7873 3.39955C15.8226 3.43139 15.8584 3.46361 15.8947 3.49623L19.8534 7.05912C19.8956 7.09705 19.9372 7.1345 19.9783 7.17149C21.162 8.23614 21.9274 8.92458 22.3391 9.84902C22.7508 10.7734 22.7505 11.8029 22.75 13.3949C22.75 13.4502 22.75 13.5062 22.75 13.5629V14.0565C22.75 15.8942 22.75 17.3499 22.5969 18.4891C22.4392 19.6615 22.1071 20.6104 21.3588 21.3588C20.6104 22.1072 19.6614 22.4393 18.489 22.5969C17.3498 22.7501 15.8942 22.7501 14.0564 22.7501H9.94359C8.10583 22.7501 6.65019 22.7501 5.51098 22.5969C4.33856 22.4393 3.38961 22.1072 2.64124 21.3588C1.89288 20.6104 1.56076 19.6615 1.40314 18.4891C1.24997 17.3499 1.24998 15.8942 1.25 14.0565V9.94363C1.24998 8.10587 1.24997 6.65024 1.40314 5.51103C1.56076 4.33861 1.89288 3.38966 2.64124 2.64129C3.39019 1.89235 4.34232 1.56059 5.51887 1.40313C6.66283 1.25002 8.1257 1.25003 9.97352 1.25005L10.0298 1.25005C10.0789 1.25005 10.1275 1.25004 10.1755 1.25002Z" fill="currentColor"></path>
                                    </g>
                                </svg>
                                <?= translate('balance_sheet') ?>
                            </a>
                        </div>
                    </div>
                </div>
<!-- Accountant shortcut buttons--->

<!-- Accountant Fees summary--->
                <div class="row">
                    <div class="col-md-12">
                        <div class="cdev-dashboard-card">
                            <div class="cdev-card-header">
                                <h3 class="cdev-card-title">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2102 5.83041C17.4287 5.75091 16.4201 5.75 15 5.75L9 5.75C7.57993 5.75 6.57133 5.75091 5.78975 5.83042C5.02071 5.90865 4.55507 6.05673 4.1944 6.29772C3.83953 6.53484 3.53484 6.83953 3.29772 7.1944C3.05673 7.55507 2.90865 8.02071 2.83041 8.78975C2.75091 9.57133 2.75 10.5799 2.75 12C2.75 13.4201 2.75091 14.4287 2.83042 15.2102C2.90865 15.9793 3.05673 16.4449 3.29772 16.8056C3.53484 17.1605 3.83953 17.4652 4.1944 17.7023C4.55507 17.9433 5.02071 18.0914 5.78975 18.1696C6.57133 18.2491 7.57993 18.25 9 18.25H15C16.4201 18.25 17.4287 18.2491 18.2102 18.1696C18.9793 18.0914 19.4449 17.9433 19.8056 17.7023C20.1605 17.4652 20.4652 17.1605 20.7023 16.8056C20.9433 16.4449 21.0914 15.9793 21.1696 15.2102C21.2491 14.4287 21.25 13.4201 21.25 12C21.25 10.5799 21.2491 9.57133 21.1696 8.78975C21.0914 8.02071 20.9433 7.55507 20.7023 7.1944C20.4652 6.83953 20.1605 6.53484 19.8056 6.29772C19.4449 6.05673 18.9793 5.90865 18.2102 5.83041ZM18.3621 4.33812C19.2497 4.42841 19.9907 4.61739 20.639 5.05052C21.1576 5.39707 21.6029 5.84239 21.9495 6.36104C22.3826 7.00926 22.5716 7.7503 22.6619 8.63794C22.75 9.50431 22.75 10.5892 22.75 11.9584V12.0416C22.75 13.4108 22.75 14.4957 22.6619 15.3621C22.5716 16.2497 22.3826 16.9907 21.9495 17.639C21.6029 18.1576 21.1576 18.6029 20.639 18.9495C19.9907 19.3826 19.2497 19.5716 18.3621 19.6619C17.4957 19.75 16.4108 19.75 15.0416 19.75H8.9584C7.5892 19.75 6.5043 19.75 5.63795 19.6619C4.7503 19.5716 4.00926 19.3826 3.36104 18.9495C2.84239 18.6029 2.39707 18.1576 2.05052 17.639C1.61739 16.9907 1.42841 16.2497 1.33812 15.3621C1.24998 14.4957 1.24999 13.4108 1.25 12.0416V11.9584C1.24999 10.5892 1.24998 9.5043 1.33812 8.63795C1.42841 7.7503 1.61739 7.00926 2.05052 6.36104C2.39707 5.84239 2.84239 5.39707 3.36104 5.05052C4.00926 4.61739 4.7503 4.42841 5.63794 4.33812C6.5043 4.24998 7.5892 4.24999 8.95841 4.25L15.0416 4.25C16.4108 4.24999 17.4957 4.24998 18.3621 4.33812ZM5.5 8.25C5.91421 8.25 6.25 8.58579 6.25 9L6.25 15C6.25 15.4142 5.91421 15.75 5.5 15.75C5.08579 15.75 4.75 15.4142 4.75 15L4.75 9C4.75 8.58579 5.08579 8.25 5.5 8.25ZM12 9.75C10.7574 9.75 9.75 10.7574 9.75 12C9.75 13.2426 10.7574 14.25 12 14.25C13.2426 14.25 14.25 13.2426 14.25 12C14.25 10.7574 13.2426 9.75 12 9.75ZM8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12ZM18.5 8.25C18.9142 8.25 19.25 8.58579 19.25 9V15C19.25 15.4142 18.9142 15.75 18.5 15.75C18.0858 15.75 17.75 15.4142 17.75 15V9C17.75 8.58579 18.0858 8.25 18.5 8.25Z" fill="currentColor"></path>
                                        </g>
                                    </svg> <?php
                                            echo translate('fees_summary');
                                            ?>
                                </h3>
                            </div>
                            <div class="cdev-card-body">
                                <div class="cdev-summary-grid">
                                    <!-- Total Allocated Fees -->
                                    <div class="cdev-stat-card cdev-primary">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . $fee_summary_totals['total_allocated']); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('total_fees_allocated'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </div>
                                    </div>
                                    <!-- Total Paid Fees -->
                                    <div class="cdev-stat-card cdev-success">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . $fee_summary_totals['total_paid']); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('total_fees_paid'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                    <!-- Total Outstanding Fees -->
                                    <div class="cdev-stat-card cdev-warning">
                                        <div class="cdev-stat-content">
                                            <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . $fee_summary_totals['total_outstanding']); ?></h3>
                                            <p class="cdev-stat-label"><?php echo translate('total_outstanding_fees'); ?></p>
                                        </div>
                                        <div class="cdev-stat-icon">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment Progress -->
                                <div class="cdev-progress-container">
                                    <div class="cdev-progress-header">
                                        <span class="cdev-progress-label"><?php echo translate('payment_progress'); ?></span>
                                        <span class="cdev-progress-percentage"><?php echo $fee_summary_totals['payment_percentage']; ?>%</span>
                                    </div>
                                    <div class="cdev-progress">
                                        <div class="cdev-progress-bar" style="width: <?php echo $fee_summary_totals['payment_percentage']; ?>%"></div>
                                    </div>
                                </div>
                                <!-- Fees Details Button -->
                                <div class="cdev-card-footer">
                                    <a href="<?php echo base_url('offline_payments/payments'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.09878 1.25004C7.14683 1.25006 7.19559 1.25008 7.24508 1.25008H16.7551C16.8045 1.25008 16.8533 1.25006 16.9014 1.25004C17.9181 1.2496 18.6178 1.24929 19.2072 1.45435C20.3201 1.84161 21.1842 2.73726 21.5547 3.86559L20.8421 4.09954L21.5547 3.86559C21.7507 4.46271 21.7505 5.17254 21.7501 6.22655C21.7501 6.27372 21.7501 6.32158 21.7501 6.37014V20.3743C21.7501 21.8395 20.0231 22.7118 18.8857 21.671C18.8062 21.5983 18.694 21.5983 18.6145 21.671L18.1314 22.1131C17.2032 22.9624 15.7969 22.9624 14.8688 22.1131C14.5138 21.7882 13.9864 21.7882 13.6314 22.1131C12.7032 22.9624 11.2969 22.9624 10.3688 22.1131C10.0138 21.7882 9.48637 21.7882 9.13138 22.1131C8.20319 22.9624 6.79694 22.9624 5.86875 22.1131L5.38566 21.671C5.30618 21.5983 5.19395 21.5983 5.11448 21.671C3.97705 22.7118 2.25007 21.8395 2.25007 20.3743V6.37014C2.25007 6.32158 2.25005 6.27372 2.25003 6.22655C2.24965 5.17255 2.24939 4.46271 2.44545 3.86559C2.81591 2.73726 3.68002 1.84161 4.79298 1.45435C5.3823 1.24929 6.08203 1.2496 7.09878 1.25004ZM7.24508 2.75008C6.024 2.75008 5.6034 2.76057 5.28593 2.87103C4.62655 3.10047 4.09919 3.63728 3.8706 4.3335C3.75951 4.67183 3.75007 5.11796 3.75007 6.37014V20.3743C3.75007 20.4933 3.80999 20.5661 3.88517 20.6009C3.92434 20.619 3.96264 20.6237 3.99456 20.6194C4.0227 20.6156 4.05911 20.6035 4.10185 20.5644C4.75453 19.9671 5.74561 19.9671 6.39828 20.5644L6.88138 21.0065C7.23637 21.3313 7.76377 21.3313 8.11875 21.0065C9.04694 20.1571 10.4532 20.1571 11.3814 21.0065C11.7364 21.3313 12.2638 21.3313 12.6188 21.0065C13.5469 20.1571 14.9532 20.1571 15.8814 21.0065C16.2364 21.3313 16.7638 21.3313 17.1188 21.0065L17.6019 20.5644C18.2545 19.9671 19.2456 19.9671 19.8983 20.5644C19.941 20.6035 19.9774 20.6156 20.0056 20.6194C20.0375 20.6237 20.0758 20.619 20.115 20.6009C20.1901 20.5661 20.2501 20.4934 20.2501 20.3743V6.37014C20.2501 5.11797 20.2406 4.67183 20.1295 4.3335C19.9009 3.63728 19.3736 3.10047 18.7142 2.87103C18.3967 2.76057 17.9761 2.75008 16.7551 2.75008H7.24508ZM14.9996 7.44063C15.3086 7.7165 15.3354 8.19062 15.0595 8.49959L11.4881 12.4996C11.3458 12.659 11.1423 12.7501 10.9286 12.7501C10.715 12.7501 10.5115 12.659 10.3692 12.4996L8.94061 10.8996C8.66474 10.5906 8.69158 10.1165 9.00056 9.84063C9.30953 9.56476 9.78365 9.59159 10.0595 9.90057L10.9286 10.874L13.9406 7.50057C14.2165 7.19159 14.6906 7.16476 14.9996 7.44063ZM6.75007 15.5001C6.75007 15.0859 7.08585 14.7501 7.50007 14.7501H16.5001C16.9143 14.7501 17.2501 15.0859 17.2501 15.5001C17.2501 15.9143 16.9143 16.2501 16.5001 16.2501H7.50007C7.08585 16.2501 6.75007 15.9143 6.75007 15.5001Z" fill="currentColor"></path>
                                            </g>
                                        </svg>
                                        <span><?php echo translate('approve_payments'); ?></span>
                                    </a>
                                    <a href="<?php echo base_url('fees/invoice_list'); ?>" class="cdev-action-btn cdev-pay-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
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
                                        </svg>
                                        <span><?php echo translate('record_payment'); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
<!-- //Accountant Fees summary--->
 <!-- Accountant expense DashBoard--->
    <?php if (get_permission('monthly_income_vs_expense_chart', 'is_view')) {
                            $totalIncome = 0;
                            $totalExpense = 0;
                            foreach ($income_vs_expense as $item) {
                                if (stripos($item['name'], 'income') !== false) {
                                    $totalIncome += $item['value'];
                                } elseif (stripos($item['name'], 'expense') !== false) {
                                    $totalExpense += $item['value'];
                                }
                            }
                            $totalBalance = $totalIncome - $totalExpense;
                            $balanceTrend = $totalBalance >= 0 ? 'positive' : 'negative';
                        ?>
                            <div class="cdev-dashboard-card">
                                <div class="cdev-card-header">
                                    <h3 class="cdev-card-title">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17.15 13.8201L14.11 16.8601" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.84998 13.8201H17.15" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.84998 10.1799L9.88998 7.13989" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17.15 10.1799H6.84998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg> <?= translate('income_&_expense_for') . " " . translate(strtolower(date('F'))) ?>
                                    </h3>
                                </div>
                                <div class="cdev-card-body">
                                    <div class="cdev-exp-grid">
                                        <!-- Current Balance -->
                                        <div class="cdev-stat-card cdev-success">
                                            <div class="cdev-stat-content">

                                                <h3 class="cdev-stat-value">
                                                    <?php echo html_escape($global_config['currency_symbol'] . ' ' . number_format($totalBalance, 2)); ?>
                                                </h3>
                                                <p class="cdev-stat-label"><?php echo translate('balance'); ?></p>
                                            </div>
                                            <div class="cdev-stat-icon">
                                                <i class="fas fa-file-invoice-dollar"></i>
                                            </div>
                                        </div>
                                        <!--Income-->
                                        <div class="cdev-stat-card cdev-primary">
                                            <div class="cdev-stat-content">
                                                <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . number_format($totalIncome, 2)); ?>
                                                    <p class="cdev-stat-label"><?php echo translate('income'); ?></p>
                                            </div>
                                            <div class="cdev-stat-icon">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                        </div>
                                        <!--Expense -->
                                        <div class="cdev-stat-card cdev-danger">
                                            <div class="cdev-stat-content">
                                                <h3 class="cdev-stat-value"><?php echo html_escape($global_config['currency_symbol'] . ' ' . number_format($totalExpense, 2)); ?></h3>
                                                <p class="cdev-stat-label"><?php echo translate('expenses'); ?></p>
                                            </div>
                                            <div class="cdev-stat-icon">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cdev-card-footer">
                                        <a href="<?php echo base_url('accounting/all_transactions'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C21.1071 3.38961 21.4392 4.33856 21.5969 5.51098C21.75 6.65019 21.75 8.10583 21.75 9.94359V14.0564C21.75 15.8942 21.75 17.3498 21.5969 18.489C21.4392 19.6614 21.1071 20.6104 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.7213 19.8749 19.975 19.2952 20.1102 18.2892C20.2484 17.2615 20.25 15.9068 20.25 14V10C20.25 8.09318 20.2484 6.73851 20.1102 5.71085C19.975 4.70476 19.7213 4.12511 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976ZM7.25 8C7.25 7.58579 7.58579 7.25 8 7.25H16C16.4142 7.25 16.75 7.58579 16.75 8C16.75 8.41421 16.4142 8.75 16 8.75H8C7.58579 8.75 7.25 8.41421 7.25 8ZM7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4142 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12ZM7.25 16C7.25 15.5858 7.58579 15.25 8 15.25H13C13.4142 15.25 13.75 15.5858 13.75 16C13.75 16.4142 13.4142 16.75 13 16.75H8C7.58579 16.75 7.25 16.4142 7.25 16Z" fill="currentColor"></path>
                                                </g>
                                            </svg>
                                            <span><?php echo translate('transaction_history'); ?></span>
                                        </a>
                                        <a href="<?php echo base_url('accounting/voucher_expense'); ?>" class="cdev-action-btn"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor"></path>
                                                </g>
                                            </svg><span><?php echo translate('record_expense'); ?></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php $currency_symbol = $global_config['currency_symbol']; ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?php echo translate('transactions'); ?></h4>
			</header>
			<div class="panel-body">
				<div class="export_title">All Transactions</div>
				<table class="table table-bordered table-hover table-condensed table-export" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="50"><?php echo translate('sl'); ?></th>
							<th><?php echo translate('account') . " " . translate('name'); ?></th>
							<th><?php echo translate('type'); ?></th>
							<th><?php echo translate('voucher') . " " . translate('head'); ?></th>
							<th><?php echo translate('ref_no'); ?></th>
							<th><?php echo translate('description'); ?></th>
							<th><?php echo translate('pay_via'); ?></th>
							<th><?php echo translate('amount'); ?></th>
							<th><?php echo translate('dr'); ?></th>
							<th><?php echo translate('cr'); ?></th>
							<th><?php echo translate('balance'); ?></th>
							<th><?php echo translate('date'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1; foreach ($voucherlist as $row): ?>
						<tr>
							<td><?php echo $count++; ?></td>
						<?php if (is_superadmin_loggedin()): ?>
							<td><?php echo get_type_name_by_id('branch', $row['branch_id']);?></td>
						<?php endif; ?>
							<td><?php echo (!empty($row['attachments']) ? '<i class="fas fa-paperclip"></i> ' : ''); ?> <?php echo html_escape($row['ac_name']); ?></td>
							<td><?php echo ucfirst($row['type']); ?></td>
							<td><?php echo $row['v_head']; ?></td>
							<td><?php echo $row['ref']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['via_name']; ?></td>
							<td><?php echo currencyFormat($row['amount']); ?></td>
							<td><?php echo currencyFormat($row['dr']); ?></td>
							<td><?php echo currencyFormat($row['cr']); ?></td>
							<td><?php echo currencyFormat($row['bal']); ?></td>
							<td><?php echo _d($row['date']); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>

    <?php } ?>
 <!-- Accountant expense DashBoard--->

 <!-- event calendar -->
                    <div class="row">
    
                        <div class="col-md-<?php echo $div3 ?>">
                            <section class="panel">
                                <div class="panel-body">
                                    <div id="event_calendar"></div>
                                </div>
                            </section>
                        </div>

                        <?php if ($div3 == 9) { ?>
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="row widget-row-in">
                                        <?php if (get_permission('student_birthday_widget', 'is_view')) { ?>
                                            <div class="col-xs-12">
                                                <div class="panel-body">
                                                    <div class="widget-col-in row">
                                                        <div class="col-md-6 col-sm-6 col-xs-6"> <a href="<?php echo base_url('birthday/student') ?>" data-toggle="tooltip" data-original-title="<?= translate('view') . " " . translate('list') ?>"><i class="fas fa-birthday-cake"></i></a>
                                                            <h5 class="text-muted"><?= translate('student') ?></h5>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <h3 class="counter text-right mt-md text-primary"><?php
                                                                                                                $this->db->select('student.id');
                                                                                                                $this->db->from('student');
                                                                                                                $this->db->join('enroll', 'enroll.student_id = student.id', 'inner');
                                                                                                                $this->db->where("enroll.session_id", get_session_id());
                                                                                                                if (!empty($school_id))
                                                                                                                    $this->db->where('branch_id', $school_id);
                                                                                                                $this->db->where("MONTH(student.birthday)", date('m'));
                                                                                                                $this->db->where("DAY(student.birthday)", date('d'));
                                                                                                                $this->db->group_by('student.id');
                                                                                                                $stuTodayBirthday = $this->db->get()->result();
                                                                                                                echo (count($stuTodayBirthday));
                                                                                                                ?></h3>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="box-top-line line-color-primary">
                                                                <span class="text-muted text-uppercase"><?= translate('today_birthday') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if (get_permission('staff_birthday_widget', 'is_view')) { ?>
                                            <div class="col-xs-12">
                                                <div class="panel-body">
                                                    <div class="widget-col-in row">
                                                        <div class="col-md-6 col-sm-6 col-xs-6"> <a href="<?php echo base_url('birthday/staff') ?>" data-toggle="tooltip" data-original-title="<?= translate('view') . " " . translate('list') ?>"><i class="fas fa-birthday-cake"></i></a>
                                                            <h5 class="text-muted"><?= translate('employee') ?></h5>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <h3 class="counter text-right mt-md text-primary"><?php
                                                                                                                $this->db->select('id');
                                                                                                                if (!empty($school_id))
                                                                                                                    $this->db->where('branch_id', $school_id);
                                                                                                                $this->db->where("MONTH(birthday)", date('m'));
                                                                                                                $this->db->where("DAY(birthday)", date('d'));
                                                                                                                $emyTodayBirthday = $this->db->get('staff')->result();
                                                                                                                echo (count($emyTodayBirthday));
                                                                                                                ?></h3>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="box-top-line line-color-primary">
                                                                <span class="text-muted text-uppercase"><?= translate('today_birthday') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                    </div>
                    <div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-btn">
                                    <button onclick="fn_printElem('printResult')" class="btn btn-default btn-circle icon"><i class="fas fa-print"></i></button>
                                </div>
                                <h4 class="panel-title"><i class="fas fa-info-circle"></i> <?= translate('event_details') ?></h4>
                            </header>
                            <div class="panel-body">
                                <div id="printResult" class=" pt-sm pb-sm">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-condensed text-dark tbr-top" id="ev_table">

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-default modal-dismiss">
                                            <?= translate('close') ?>
                                        </button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </div>

                    <script type="application/javascript">
                        (function($) {
                            var calendar = $('#event_calendar').fullCalendar({
                                header: {
                                    left: 'prev,next,today',
                                    center: 'title',
                                    right: 'listWeek,month,agendaWeek,agendaDay'
                                },
                                defaultView: 'listWeek', 
                                firstDay: 1,
                                height: 600,
                                droppable: false,
                                editable: true,
                                timezone: 'UTC',
                                lang: '<?php echo $language ?>',
                                events: {
                                    url: "<?= base_url('event/get_events_list/' . $school_id) ?>"
                                },
                                eventRender: function(event, element) {
                                    $(element).on("click", function() {
                                        viewEvent(event.id);
                                    });
                                    if (event.icon) {
                                        element.find(".fc-title").prepend("<i class='fas fa-" + event.icon + "'></i> ");
                                    }
                                }
                            });
                            setTimeout(function() {
                                $('#event_calendar').fullCalendar('changeView', 'listWeek');
                            }, 100);

                            var days = <?php echo json_encode($weekend_attendance["days"]); ?>;
                            var employees_att = <?php echo json_encode($weekend_attendance["employee_att"]); ?>;
                            var student_att = <?php echo json_encode($weekend_attendance["student_att"]); ?>;
                            var weekendAttendanceChart = {
                                type: 'bar',
                                data: {
                                    labels: days,
                                    datasets: [{
                                        label: '<?php echo translate("employee"); ?>',
                                        data: employees_att,
                                        backgroundColor: 'rgba(0, 136, 204, .6)',
                                        borderColor: '#F5F5F5',
                                        borderWidth: 1,
                                        fill: false,
                                    }, {
                                        label: '<?php echo translate("student"); ?>',
                                        data: student_att,
                                        backgroundColor: 'rgba(204, 102, 102, .6)',
                                        borderColor: '#F5F5F5',
                                        borderWidth: 1,
                                        fill: false,
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    circumference: Math.PI,
                                    tooltips: {
                                        mode: 'index',
                                        bodySpacing: 4
                                    },
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            boxWidth: 12
                                        }
                                    },
                                    scales: {
                                        xAxes: [{
                                            scaleLabel: {
                                                display: false
                                            }
                                        }],
                                        yAxes: [{
                                            scaleLabel: {
                                                display: false,
                                            }
                                        }]
                                    }
                                }
                            };

                            <?php if (get_permission('weekend_attendance_inspection_chart', 'is_view')) { ?>
                                var ctx2 = document.getElementById('weekend_attendance').getContext('2d');
                                window.myLine = new Chart(ctx2, weekendAttendanceChart);
                            <?php } ?>

                            <?php if (get_permission('student_quantity_pie_chart', 'is_view')) { ?>
                                var color = ['#ffb703', '#f4a261', '#2a9d8f', '#264653', '#f77f00', '#8ecae6', '#023047', '#06d6a0', '#dda15e', '#219ebc', '#ff9f1c', '#5a189a'];
                                var strength_data = <?php echo json_encode($student_by_class); ?>;
                                var student_strength = document.getElementById("student_strength");
                                var studentchart = echarts.init(student_strength);
                                studentchart.setOption({
                                    tooltip: {
                                        trigger: 'item',
                                        formatter: "{a} <br/>{b} : {c} ({d}%)"
                                    },
                                    legend: {
                                        type: 'scroll',
                                        x: 'center',
                                        y: 'bottom',
                                        itemWidth: 14,
                                        <?php if ($theme_config["dark_skin"] == "true"): ?>
                                            inactiveColor: '#4b4b4b',
                                            textStyle: {
                                                color: '#6b6b6c'
                                            }
                                        <?php endif; ?>
                                    },
                                    series: [{
                                        name: 'Strength',
                                        type: 'pie',
                                        color: color,
                                        radius: ['70%', '85%'],
                                        center: ['50%', '46%'],
                                        itemStyle: {
                                            normal: {
                                                label: {
                                                    show: false
                                                },
                                                labelLine: {
                                                    show: false
                                                }
                                            },
                                            emphasis: {
                                                label: {
                                                    show: false
                                                }
                                            }
                                        },
                                        data: strength_data
                                    }]
                                });
                            <?php } ?>
                            // charts resize
                            $(".sidebar-toggle").on("click", function(event) {
                                echartsresize();
                            });

                            $(window).on("resize", echartsresize);

                            function echartsresize() {
                                setTimeout(function() {
                                    if ($("#student_strength").length) {
                                        studentchart.resize();
                                    }
                                    if ($("#cash_book_transaction").length) {
                                        cashbookchart.resize();
                                    }
                                }, 350);
                            }
                        })(jQuery);
                    </script>
                    <script>
                        function clearSearch(searchBox) {
                            searchBox.value = "";
                            searchBox.focus();
                            toggleIcons(searchBox);
                        }

                        function toggleIcons(searchBox) {
                            const container = searchBox.closest(".cedevu-search-container, .cdev-search-container");
                            const searchIcon = container.querySelector(".cedevu-search-icon, .cdev-search-icon");
                            const cancelIcon = container.querySelector(".cedevu-cancel-icon, .cdev-cancel-icon");
                            const sendIcon = container.querySelector(".cedevu-send-icon, .cdev-send-icon");

                            if (searchBox.value.length > 0) {
                                searchIcon.style.display = "none";
                                cancelIcon.style.display = "block";
                                sendIcon.style.display = "block";
                            } else {
                                searchIcon.style.display = "block";
                                cancelIcon.style.display = "none";
                                sendIcon.style.display = "none";
                            }
                        }
                        document.querySelectorAll(".search-box").forEach((searchBox) => {
                            searchBox.addEventListener("input", () => toggleIcons(searchBox));

                            const container = searchBox.closest(".cedevu-search-container, .cdev-search-container");
                            const cancelIcon = container.querySelector(".cedevu-cancel-icon, .cdev-cancel-icon");
                            if (cancelIcon) {
                                cancelIcon.addEventListener("click", () => clearSearch(searchBox));
                            }
                            const sendIcon = container.querySelector(".cedevu-send-icon, .cdev-send-icon");
                            if (sendIcon) {
                                sendIcon.addEventListener("click", () => {
                                    const form = searchBox.closest("form");
                                    if (form) {
                                        form.submit();
                                    }
                                });
                            }
                        });
                    </script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const showMoreBtn = document.getElementById("show-more-btn");
                            const hiddenDays = document.querySelectorAll(".hidden");
                            let isExpanded = false;

                            showMoreBtn.addEventListener("click", function() {
                                if (!isExpanded) {
                                    // Show all hidden days
                                    hiddenDays.forEach(day => day.style.display = "block");
                                    showMoreBtn.textContent = "Show Less";
                                } else {
                                    // Hide extra days
                                    hiddenDays.forEach(day => day.style.display = "none");
                                    showMoreBtn.textContent = "Show More";
                                }
                                isExpanded = !isExpanded;
                            });
                        });
                    </script>