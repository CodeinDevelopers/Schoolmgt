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
<?php if (is_student_loggedin()) {
    ?>
                    <!-- dashboard -->
                    <li class="<?php if ($sub_page == 'userrole/dashboard') echo 'nav-active'; ?>">
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
<?php } elseif (is_parent_loggedin()) {  ?>

                    <li class="nav-parent <?php if ($main_menu == 'dashboard') echo 'nav-expanded nav-active'; ?>">
                        <a>
                        <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="Dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="Container" x="0" y="0" width="24" height="24"> </rect>
                                            <rect id="shape-1" stroke="currentColor" stroke-width="2" stroke-linecap="round" x="4" y="4" width="16" height="16" rx="2"> </rect>
                                            <line x1="4" y1="9" x2="20" y2="9" id="shape-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"> </line>
                                            <line x1="9" y1="10" x2="9" y2="20" id="shape-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"> </line>
                                        </g>
                                        </svg> <span><?=translate('dashboard')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<?php if ($sub_page == 'userrole/dashboard' && empty(get_activeChildren_id())) echo 'nav-active'; ?>">
                                <a href="<?=base_url('parents/my_children')?>">
                                     <svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M356.522 303.712c50.542 32.395 76.17 87.364 51.594 125.682-24.565 38.338-85.213 38.014-135.757 5.618a161.796 161.796 0 01-18.258-13.595c-14.54 20.659-34.561 39.64-58.329 54.875-69.395 44.479-151.525 44.924-183.737-5.351-32.225-50.274 2.475-124.708 71.869-169.186 57.754-37.022 124.671-43.701 164.142-15.211 29.97-13.058 72.006-6.215 108.476 17.168zm-22.106 34.483c-29.846-19.136-62.199-21.927-75.69-10.658-8.543 7.136-21.222 6.141-28.548-2.24-20.325-23.251-74.607-20.829-124.17 10.942-52.732 33.798-76.844 85.522-59.487 112.601 17.347 27.073 74.417 26.764 127.147-7.033 26.801-17.179 47.328-39.842 57.785-62.662 6.411-13.99 25.384-16.176 34.809-4.011 7.303 9.427 16.926 18.164 28.203 25.395 33.877 21.713 69.465 21.903 79.168 6.759 9.7-15.124-5.338-47.379-39.217-69.094zm-62.975 280.373c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-90.552-71.918c0 16.927-13.722 30.638-30.648 30.638-16.916 0-30.638-13.711-30.638-30.638s13.722-30.648 30.638-30.648c16.927 0 30.648 13.722 30.648 30.648zm135.196 0c0 16.927-13.722 30.638-30.638 30.638-16.927 0-30.648-13.711-30.648-30.638s13.722-30.648 30.648-30.648c16.916 0 30.638 13.722 30.638 30.648z"></path><path d="M360.506 453.639c21.761 29.897 33.659 65.841 33.659 103.629 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-25.956 5.596-51.066 16.264-74.059 4.76-10.26.302-22.437-9.959-27.197s-22.437-.302-27.197 9.959C7.466 494.338.559 525.329.559 557.268c0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-46.524-14.687-90.891-41.502-127.733-6.656-9.145-19.465-11.163-28.61-4.506s-11.163 19.465-4.506 28.61zm445.747 151.383c-9.279 22.895-31.566 38.197-56.683 38.197-25.971 0-48.852-16.351-57.527-40.378-3.841-10.639-15.579-16.149-26.218-12.309s-16.149 15.579-12.309 26.218c14.49 40.134 52.685 67.429 96.053 67.429 41.942 0 79.153-25.549 94.644-63.773 4.248-10.483-.806-22.424-11.288-26.673s-22.424.806-26.673 11.288zm-93.326-66.898c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638zm135.197 0c0 16.927-13.722 30.648-30.638 30.648-16.927 0-30.648-13.722-30.648-30.648s13.722-30.638 30.648-30.638c16.916 0 30.638 13.711 30.638 30.638z"></path><path d="M901.307 466.294c16.211 27.09 24.895 58.079 24.895 90.378 0 97.369-78.939 176.302-176.323 176.302-97.377 0-176.323-78.937-176.323-176.302 0-33.625 9.412-65.809 26.904-93.643 6.019-9.577 3.134-22.219-6.442-28.237s-22.219-3.134-28.237 6.442c-21.566 34.315-33.184 74.045-33.184 115.438 0 119.988 97.285 217.262 217.283 217.262 120.005 0 217.283-97.271 217.283-217.262 0-39.758-10.719-78.008-30.708-111.411-5.808-9.706-18.384-12.866-28.09-7.058s-12.866 18.384-7.058 28.09z"></path><path d="M516.628 520.14c0-128.916 104.505-233.421 233.421-233.421 126.376 0 228.833 102.457 228.833 228.833v113.664h-51.364c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h54.333c20.977 0 37.99-17.013 37.99-37.99V515.552c0-148.998-120.795-269.793-269.793-269.793-151.537 0-274.381 122.843-274.381 274.381v112.046c0 20.979 17.004 37.99 37.99 37.99h61.471c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-58.501V520.14z"></path><path d="M583.592 472.932h332.913c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H583.592c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path></g></svg> <span><?=translate('my_children')?></span>
                                </a>
                            </li>
                            <?php if (!empty(get_activeChildren_id())): ?>
                                <li class="<?php if ($sub_page == 'userrole/dashboard') echo 'nav-active'; ?>">
                                    <a href="<?=base_url('dashboard'); ?>">
                                         <svg viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.918 10.0005H7.082C6.66587 9.99708 6.26541 10.1591 5.96873 10.4509C5.67204 10.7427 5.50343 11.1404 5.5 11.5565V17.4455C5.5077 18.3117 6.21584 19.0078 7.082 19.0005H9.918C10.3341 19.004 10.7346 18.842 11.0313 18.5502C11.328 18.2584 11.4966 17.8607 11.5 17.4445V11.5565C11.4966 11.1404 11.328 10.7427 11.0313 10.4509C10.7346 10.1591 10.3341 9.99708 9.918 10.0005Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.918 4.0006H7.082C6.23326 3.97706 5.52559 4.64492 5.5 5.4936V6.5076C5.52559 7.35629 6.23326 8.02415 7.082 8.0006H9.918C10.7667 8.02415 11.4744 7.35629 11.5 6.5076V5.4936C11.4744 4.64492 10.7667 3.97706 9.918 4.0006Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.082 13.0007H17.917C18.3333 13.0044 18.734 12.8425 19.0309 12.5507C19.3278 12.2588 19.4966 11.861 19.5 11.4447V5.55666C19.4966 5.14054 19.328 4.74282 19.0313 4.45101C18.7346 4.1592 18.3341 3.9972 17.918 4.00066H15.082C14.6659 3.9972 14.2654 4.1592 13.9687 4.45101C13.672 4.74282 13.5034 5.14054 13.5 5.55666V11.4447C13.5034 11.8608 13.672 12.2585 13.9687 12.5503C14.2654 12.8421 14.6659 13.0041 15.082 13.0007Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.082 19.0006H17.917C18.7661 19.0247 19.4744 18.3567 19.5 17.5076V16.4936C19.4744 15.6449 18.7667 14.9771 17.918 15.0006H15.082C14.2333 14.9771 13.5256 15.6449 13.5 16.4936V17.5066C13.525 18.3557 14.2329 19.0241 15.082 19.0006Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('dashboard')?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
<?php } if (is_student_loggedin()) { ?>
                    <!-- student profile -->
                    <li class="<?php if ($main_menu == 'profile') echo 'nav-active'; ?>">
                        <a href="<?=base_url('profile')?>">
                            <i class="far fa-user-circle"></i><span><?=translate('profile')?></span>
                        </a>
                    </li>
<?php
}
if ((is_parent_loggedin() && !empty(get_activeChildren_id())) || is_student_loggedin()) {
    ?>
                    <!-- teachers -->
                    <li class="<?php if ($main_menu == 'teachers') echo 'nav-active'; ?>">
                        <a href="<?=base_url('userrole/teacher')?>">
                        <svg fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 299.97 299.97" xml:space="preserve" width="27px" height="27px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
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
                                </svg> <span><?=translate('teachers')?></span>
                        </a>
                    </li>

                    <!-- academic -->
                    <li class="nav-parent <?php if ($main_menu == 'academic') echo 'nav-expanded nav-active'; ?>">
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
                            <!-- subject -->
                            <li class="<?php if ($sub_page == 'userrole/subject') echo 'nav-active'; ?>">
                                <a href="<?=base_url('userrole/subject')?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8V16C20 18.8284 20 20.2426 19.1213 21.1213C18.2426 22 16.8284 22 14 22H10C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke="currentColor" stroke-width="1.5"></path> <path d="M8 7H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 10.5H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16V19.5309C13 19.8065 13 19.9443 12.9051 20C12.8103 20.0557 12.6806 19.9941 12.4211 19.8708L11.1789 19.2808C11.0911 19.2391 11.0472 19.2182 11 19.2182C10.9528 19.2182 10.9089 19.2391 10.8211 19.2808L9.57889 19.8708C9.31943 19.9941 9.18971 20.0557 9.09485 20C9 19.9443 9 19.8065 9 19.5309V16.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <?=translate('subject')?>
                                </a>
                            </li>
							
							<!-- class schedule -->
							<li class="<?php if ($sub_page == 'userrole/class_schedule') echo 'nav-active'; ?> ">
								<a href="<?=base_url('userrole/class_schedule')?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="currentColor"></path> </g></svg> <span><?=translate('class') . " " . translate('schedule')?></span>
								</a>
							</li>
                        </ul>
                    </li>
<?php if (is_student_loggedin()) { ?>
                    <li class="<?php if ($main_menu == 'live_class') echo 'nav-active';?>">
                        <a href="<?=base_url('userrole/live_class')?>">
                            <i class="icons icon-earphones-alt"></i><span><?=translate('live_class_rooms')?></span>
                        </a>
                    </li>
<?php } ?>
                  
                    <!-- attachments upload -->
                    <li class="<?php if ($main_menu == 'attachments') echo 'nav-active'; ?> ">
                        <a href="<?=base_url('userrole/attachments')?>">
                        <svg fill="currentColor" viewBox="0 0 24 24" id="paper-clip-top-right-2" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M7.05,20.56a5,5,0,0,1-3.57-8.62L9.91,5.51a7.08,7.08,0,0,1,10,10l-4,3.95a1,1,0,1,1-1.41-1.41l4-3.95a5.08,5.08,0,0,0-7.19-7.19L4.89,13.35a3.05,3.05,0,0,0,4.32,4.32L16,10.93a1,1,0,0,0,.3-.72,1,1,0,0,0-.3-.73,1,1,0,0,0-1.45,0l-7,7.05a1,1,0,0,1-1.41,0,1,1,0,0,1,0-1.42l7-7a3,3,0,0,1,4.29,0,3,3,0,0,1,0,4.28l-6.74,6.74A5.06,5.06,0,0,1,7.05,20.56Z" style="fill: currentColor;"></path></g></svg> <span><?=translate('attachments_book')?></span>
                        </a>
                    </li>
                    
                    <!-- homework -->
                    <li class="<?php if ($main_menu == 'homework') echo 'nav-active'; ?> ">
                        <a href="<?=base_url('userrole/homework')?>">
                             <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="33px" height="33px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8.025 8C8.025 8.41421 8.36079 8.75 8.775 8.75C9.18922 8.75 9.525 8.41421 9.525 8H8.025ZM13.875 8C13.875 8.41421 14.2108 8.75 14.625 8.75C15.0392 8.75 15.375 8.41421 15.375 8H13.875ZM8.80427 8.74943C9.21817 8.73326 9.5406 8.38463 9.52443 7.97073C9.50826 7.55683 9.15963 7.23441 8.74573 7.25057L8.80427 8.74943ZM4.16474 11.3809C4.09897 11.7899 4.37718 12.1747 4.78613 12.2405C5.19509 12.3063 5.57994 12.0281 5.64571 11.6191L4.16474 11.3809ZM8.775 7.25C8.36079 7.25 8.025 7.58579 8.025 8C8.025 8.41421 8.36079 8.75 8.775 8.75V7.25ZM14.625 8.75C15.0392 8.75 15.375 8.41421 15.375 8C15.375 7.58579 15.0392 7.25 14.625 7.25V8.75ZM9.66 13.6046C10.0712 13.6543 10.4449 13.3612 10.4946 12.95C10.5443 12.5388 10.2512 12.1651 9.84 12.1154L9.66 13.6046ZM5.21442 10.8207C4.83705 10.6499 4.39269 10.8174 4.22193 11.1948C4.05116 11.5722 4.21866 12.0165 4.59603 12.1873L5.21442 10.8207ZM10.5 12.86C10.5 12.4458 10.1642 12.11 9.75 12.11C9.33579 12.11 9 12.4458 9 12.86H10.5ZM9 14.99C9 15.4042 9.33579 15.74 9.75 15.74C10.1642 15.74 10.5 15.4042 10.5 14.99H9ZM9.84273 12.1158C9.4317 12.0645 9.05697 12.3562 9.00576 12.7673C8.95454 13.1783 9.24623 13.553 9.65727 13.6042L9.84273 12.1158ZM11.7 12.99L11.6931 13.7401L11.7065 13.74L11.7 12.99ZM13.7424 13.6053C14.1534 13.5543 14.4453 13.1797 14.3943 12.7687C14.3433 12.3576 13.9687 12.0657 13.5577 12.1167L13.7424 13.6053ZM4.59141 12.1852C4.96762 12.3585 5.4131 12.194 5.58642 11.8178C5.75973 11.4416 5.59525 10.9961 5.21904 10.8228L4.59141 12.1852ZM4.27005 10.3376C3.90976 10.1333 3.45202 10.2597 3.24765 10.62C3.04328 10.9802 3.16967 11.438 3.52996 11.6424L4.27005 10.3376ZM5.64934 11.5978C5.70114 11.1868 5.40999 10.8117 4.99902 10.7599C4.58806 10.7081 4.21292 10.9992 4.16112 11.4102L5.64934 11.5978ZM4.875 11.99L5.625 11.99L5.625 11.9891L4.875 11.99ZM4.875 15.99H4.125C4.125 15.9993 4.12518 16.0087 4.12552 16.018L4.875 15.99ZM9.0753 19.99V19.24C9.06612 19.24 9.05693 19.2402 9.04775 19.2405L9.0753 19.99ZM14.3257 19.99L14.353 19.2405C14.3439 19.2402 14.3348 19.24 14.3257 19.24L14.3257 19.99ZM18.525 15.99L19.2745 16.018C19.2748 16.0087 19.275 15.9993 19.275 15.99L18.525 15.99ZM18.525 11.99L17.775 11.9891V11.99H18.525ZM19.2389 11.4102C19.1871 10.9992 18.8119 10.7081 18.401 10.7599C17.99 10.8117 17.6989 11.1868 17.7507 11.5978L19.2389 11.4102ZM14.6543 7.25057C14.2404 7.23441 13.8917 7.55683 13.8756 7.97073C13.8594 8.38463 14.1818 8.73326 14.5957 8.74943L14.6543 7.25057ZM17.7543 11.6191C17.8201 12.0281 18.2049 12.3063 18.6139 12.2405C19.0228 12.1747 19.301 11.7899 19.2353 11.3809L17.7543 11.6191ZM13.56 12.1154C13.1488 12.1651 12.8557 12.5388 12.9054 12.95C12.9551 13.3612 13.3288 13.6543 13.74 13.6046L13.56 12.1154ZM18.804 12.1873C19.1813 12.0165 19.3488 11.5722 19.1781 11.1948C19.0073 10.8174 18.563 10.6499 18.1856 10.8207L18.804 12.1873ZM14.4 12.86C14.4 12.4458 14.0642 12.11 13.65 12.11C13.2358 12.11 12.9 12.4458 12.9 12.86H14.4ZM12.9 14.99C12.9 15.4042 13.2358 15.74 13.65 15.74C14.0642 15.74 14.4 15.4042 14.4 14.99H12.9ZM18.181 10.8228C17.8048 10.9961 17.6403 11.4416 17.8136 11.8178C17.9869 12.194 18.4324 12.3585 18.8086 12.1852L18.181 10.8228ZM19.87 11.6424C20.2303 11.438 20.3567 10.9802 20.1524 10.62C19.948 10.2597 19.4902 10.1333 19.13 10.3376L19.87 11.6424ZM9.525 8C9.525 6.73935 10.5166 5.75 11.7 5.75V4.25C9.65257 4.25 8.025 5.94695 8.025 8H9.525ZM11.7 5.75C12.8834 5.75 13.875 6.73935 13.875 8H15.375C15.375 5.94695 13.7474 4.25 11.7 4.25V5.75ZM8.74573 7.25057C6.43906 7.34066 4.53484 9.07978 4.16474 11.3809L5.64571 11.6191C5.90653 9.99741 7.23733 8.81063 8.80427 8.74943L8.74573 7.25057ZM8.775 8.75H14.625V7.25H8.775V8.75ZM9.84 12.1154C8.24431 11.9225 6.68526 11.4863 5.21442 10.8207L4.59603 12.1873C6.20537 12.9155 7.9122 13.3933 9.66 13.6046L9.84 12.1154ZM9 12.86V14.99H10.5V12.86H9ZM9.65727 13.6042C10.3329 13.6884 11.0126 13.7337 11.6931 13.74L11.7069 12.24C11.0837 12.2343 10.4614 12.1928 9.84273 12.1158L9.65727 13.6042ZM11.7065 13.74C12.387 13.7341 13.0667 13.6891 13.7424 13.6053L13.5577 12.1167C12.939 12.1935 12.3166 12.2346 11.6935 12.24L11.7065 13.74ZM5.21904 10.8228C4.88545 10.6691 4.56921 10.5073 4.27005 10.3376L3.52996 11.6424C3.8678 11.834 4.22171 12.0149 4.59141 12.1852L5.21904 10.8228ZM4.16112 11.4102C4.13684 11.6028 4.12478 11.7967 4.125 11.9909L5.625 11.9891C5.62485 11.8583 5.63298 11.7275 5.64934 11.5978L4.16112 11.4102ZM4.125 11.99V15.99H5.625V11.99H4.125ZM4.12552 16.018C4.22595 18.7067 6.43559 20.8375 9.10285 20.7395L9.04775 19.2405C7.24343 19.3068 5.69534 17.8591 5.62448 15.962L4.12552 16.018ZM9.0753 20.74H14.3257V19.24H9.0753V20.74ZM14.2983 20.7395C16.9651 20.8369 19.174 18.7063 19.2745 16.018L17.7755 15.962C17.7047 17.8588 16.1571 19.3064 14.353 19.2405L14.2983 20.7395ZM19.275 15.99V11.99H17.775V15.99H19.275ZM19.275 11.9909C19.2752 11.7967 19.2632 11.6028 19.2389 11.4102L17.7507 11.5978C17.767 11.7276 17.7752 11.8583 17.775 11.9891L19.275 11.9909ZM14.5957 8.74943C16.1627 8.81063 17.4935 9.99741 17.7543 11.6191L19.2353 11.3809C18.8652 9.07978 16.9609 7.34066 14.6543 7.25057L14.5957 8.74943ZM13.74 13.6046C15.4878 13.3933 17.1946 12.9155 18.804 12.1873L18.1856 10.8207C16.7147 11.4863 15.1557 11.9225 13.56 12.1154L13.74 13.6046ZM12.9 12.86V14.99H14.4V12.86H12.9ZM18.8086 12.1852C19.1783 12.0149 19.5322 11.834 19.87 11.6424L19.13 10.3376C18.8308 10.5073 18.5146 10.6691 18.181 10.8228L18.8086 12.1852Z" fill="currentColor"></path> </g></svg> <span><?=translate('homework')?></span>
                        </a>
                    </li>

                    <!-- exam master -->
                    <li class="nav-parent <?php if ($main_menu == 'exam') echo 'nav-expanded nav-active'; ?>">
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
							<!-- exam schedule -->
							<li class="<?php if ($sub_page == 'userrole/exam_schedule') echo 'nav-active'; ?> ">
								<a href="<?=base_url('userrole/exam_schedule')?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 10V6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V10M4 10V15M4 10H9M20 10V15M20 10H15M4 15V18C4 19.1046 4.89543 20 6 20H9M4 15H9M20 15V18C20 19.1046 19.1046 20 18 20H15M20 15H15M9 15H15M9 15V10M9 15V20M15 15V10M15 15V20M9 10H15M9 20H15M10 7H14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('exam') . " " . translate('schedule')?></span>
								</a>
							</li>
					
                            <!-- marks -->
                            <li class="<?php if ($sub_page == 'userrole/report_card') echo 'nav-active'; ?>">
                                <a href="<?=base_url('userrole/report_card')?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M6 15.8L7.14286 17L10 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 8.8L7.14286 10L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 9L18 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16L18 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <span><?=translate('report_card')?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
<?php if (is_student_loggedin()) { ?>
                    <!-- online exam master -->
                    <li class="<?php if ($main_menu == 'onlineexam') echo ' nav-active'; ?>">
                        <a href="<?=base_url('userrole/online_exam')?>">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.5 7.5H16.1C16.9401 7.5 17.3601 7.5 17.681 7.66349C17.9632 7.8073 18.1927 8.03677 18.3365 8.31901C18.5 8.63988 18.5 9.05992 18.5 9.9V17.5C18.5 18.6046 17.6046 19.5 16.5 19.5V19.5C15.3954 19.5 14.5 18.6046 14.5 17.5V7.7C14.5 6.57989 14.5 6.01984 14.282 5.59202C14.0903 5.21569 13.7843 4.90973 13.408 4.71799C12.9802 4.5 12.4201 4.5 11.3 4.5H7.7C6.57989 4.5 6.01984 4.5 5.59202 4.71799C5.21569 4.90973 4.90973 5.21569 4.71799 5.59202C4.5 6.01984 4.5 6.5799 4.5 7.7V16.3C4.5 17.4201 4.5 17.9802 4.71799 18.408C4.90973 18.7843 5.21569 19.0903 5.59202 19.282C6.01984 19.5 6.5799 19.5 7.7 19.5H16.5" stroke="currentColor"></path> <path d="M11 6.5H8C7.53406 6.5 7.30109 6.5 7.11732 6.57612C6.87229 6.67761 6.67761 6.87229 6.57612 7.11732C6.5 7.30109 6.5 7.53406 6.5 8C6.5 8.46594 6.5 8.69891 6.57612 8.88268C6.67761 9.12771 6.87229 9.32239 7.11732 9.42388C7.30109 9.5 7.53406 9.5 8 9.5H11C11.4659 9.5 11.6989 9.5 11.8827 9.42388C12.1277 9.32239 12.3224 9.12771 12.4239 8.88268C12.5 8.69891 12.5 8.46594 12.5 8C12.5 7.53406 12.5 7.30109 12.4239 7.11732C12.3224 6.87229 12.1277 6.67761 11.8827 6.57612C11.6989 6.5 11.4659 6.5 11 6.5Z" stroke="currentColor"></path> <path d="M6.5 11.5H12.5" stroke="currentColor" stroke-linecap="round"></path> <path d="M6.5 13.5H12.5" stroke="currentColor" stroke-linecap="round"></path> <path d="M6.5 15.5H12.5" stroke="currentColor" stroke-linecap="round"></path> <path d="M6.5 17.5H10.5" stroke="currentColor" stroke-linecap="round"></path> </g></svg> <span><?=translate('online_exam')?></span>
                        </a>
                    </li>
<?php } ?>
                    <!-- supervision -->
                    <li class="nav-parent <?php if ($main_menu == 'supervision')  echo 'nav-expanded nav-active'; ?>">
                        <a>
                             <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9 7C9 8.10457 8.10457 9 7 9C5.89543 9 5 8.10457 5 7C5 5.89543 5.89543 5 7 5C7.53043 5 8.03914 5.21071 8.41421 5.58579C8.78929 5.96086 9 6.46957 9 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M19 7C19 8.10457 18.1046 9 17 9C15.8954 9 15 8.10457 15 7C15 5.89543 15.8954 5 17 5C18.1046 5 19 5.89543 19 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C9 18.1046 8.10457 19 7 19C5.89543 19 5 18.1046 5 17C5 15.8954 5.89543 15 7 15C7.53043 15 8.03914 15.2107 8.41421 15.5858C8.78929 15.9609 9 16.4696 9 17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M19 17C19 18.1046 18.1046 19 17 19C15.8954 19 15 18.1046 15 17C15 15.8954 15.8954 15 17 15C18.1046 15 19 15.8954 19 17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 6.25C8.58579 6.25 8.25 6.58579 8.25 7C8.25 7.41421 8.58579 7.75 9 7.75V6.25ZM15 7.75C15.4142 7.75 15.75 7.41421 15.75 7C15.75 6.58579 15.4142 6.25 15 6.25V7.75ZM7.75 9C7.75 8.58579 7.41421 8.25 7 8.25C6.58579 8.25 6.25 8.58579 6.25 9H7.75ZM6.25 15C6.25 15.4142 6.58579 15.75 7 15.75C7.41421 15.75 7.75 15.4142 7.75 15H6.25ZM17.75 9C17.75 8.58579 17.4142 8.25 17 8.25C16.5858 8.25 16.25 8.58579 16.25 9H17.75ZM16.25 15C16.25 15.4142 16.5858 15.75 17 15.75C17.4142 15.75 17.75 15.4142 17.75 15H16.25ZM9 16.25C8.58579 16.25 8.25 16.5858 8.25 17C8.25 17.4142 8.58579 17.75 9 17.75V16.25ZM15 17.75C15.4142 17.75 15.75 17.4142 15.75 17C15.75 16.5858 15.4142 16.25 15 16.25V17.75ZM9 7.75H15V6.25H9V7.75ZM6.25 9V15H7.75V9H6.25ZM16.25 9V15H17.75V9H16.25ZM9 17.75H15V16.25H9V17.75Z" fill="currentColor"></path> </g></svg>  <span><?=translate('supervision')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <!-- hostels -->
                            <li class="<?php if ($sub_page == 'userrole/hostels') echo 'nav-active';?>">
                                <a href="<?=base_url('userrole/hostels')?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 22H22" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 2H7C4 2 3 3.79 3 6V22H21V6C21 3.79 20 2 17 2Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 16.5H10" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 16.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 12H10" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 7.5H10" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 7.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span><?=translate('hostel')?></span>
                                </a>
                            </li>

                            <!-- transport -->
                            <li class="<?php if ($sub_page == 'userrole/transport_route') echo 'nav-active'; ?>">
                                <a href="<?=base_url('userrole/route')?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"fdfdfd><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 10C4 6.22876 4 4.34315 5.17157 3.17157C6.34315 2 8.22876 2 12 2C15.7712 2 17.6569 2 18.8284 3.17157C20 4.34315 20 6.22876 20 10V12C20 15.7712 20 17.6569 18.8284 18.8284C17.6569 20 15.7712 20 12 20C8.22876 20 6.34315 20 5.17157 18.8284C4 17.6569 4 15.7712 4 12V10Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M4 13H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15.5 16H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 16H8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 19.5V21C6 21.5523 6.44772 22 7 22H8.5C9.05228 22 9.5 21.5523 9.5 21V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 19.5V21C18 21.5523 17.5523 22 17 22H15.5C14.9477 22 14.5 21.5523 14.5 21V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20 9H21C21.5523 9 22 9.44772 22 10V11C22 11.3148 21.8518 11.6111 21.6 11.8L20 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 9H3C2.44772 9 2 9.44772 2 10V11C2 11.3148 2.14819 11.6111 2.4 11.8L4 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5 5H4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <?=translate('transport')?></span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <!-- attendance control -->
                    <li class="<?php if ($main_menu == 'attendance') echo ' nav-active'; ?>">
                        <a href="<?=base_url('userrole/attendance')?>">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=stroke"> <g id="calendar-cells"> <path id="rectangle (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M1.25 8C1.25 5.37665 3.37665 3.25 6 3.25H18C20.6234 3.25 22.75 5.37665 22.75 8V18C22.75 20.6234 20.6234 22.75 18 22.75H6C3.37665 22.75 1.25 20.6234 1.25 18V8ZM6 4.75C4.20507 4.75 2.75 6.20507 2.75 8V18C2.75 19.7949 4.20507 21.25 6 21.25H18C19.7949 21.25 21.25 19.7949 21.25 18V8C21.25 6.20507 19.7949 4.75 18 4.75H6Z" fill="currentColor"></path> <rect id="vector" x="7" y="9.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_2" x="11" y="9.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_3" x="15" y="9.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_4" x="7" y="12.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_5" x="7" y="15.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_6" x="11" y="12.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_7" x="11" y="15.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_8" x="15" y="12.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <rect id="vector_9" x="15" y="15.5" width="2" height="2" rx="0.5" fill="currentColor"></rect> <path id="line (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M8 1.25C8.41421 1.25 8.75 1.58579 8.75 2V5.5C8.75 5.91421 8.41421 6.25 8 6.25C7.58579 6.25 7.25 5.91421 7.25 5.5V2C7.25 1.58579 7.58579 1.25 8 1.25Z" fill="currentColor"></path> <path id="line (Stroke)_2" fill-rule="evenodd" clip-rule="evenodd" d="M16 1.25C16.4142 1.25 16.75 1.58579 16.75 2V5.5C16.75 5.91421 16.4142 6.25 16 6.25C15.5858 6.25 15.25 5.91421 15.25 5.5V2C15.25 1.58579 15.5858 1.25 16 1.25Z" fill="currentColor"></path> </g> </g> </g></svg> <span><?=translate('attendance')?></span>
                        </a>
                    </li>

                    <li class="nav-parent <?php if ($main_menu == 'library') echo 'nav-expanded nav-active';?>">
                        <a>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19.5617 7C19.7904 5.69523 18.7863 4.5 17.4617 4.5H6.53788C5.21323 4.5 4.20922 5.69523 4.43784 7" stroke="currentColor" stroke-width="1.5"></path> <path d="M17.4999 4.5C17.5283 4.24092 17.5425 4.11135 17.5427 4.00435C17.545 2.98072 16.7739 2.12064 15.7561 2.01142C15.6497 2 15.5194 2 15.2588 2H8.74099C8.48035 2 8.35002 2 8.24362 2.01142C7.22584 2.12064 6.45481 2.98072 6.45704 4.00434C6.45727 4.11135 6.47146 4.2409 6.49983 4.5" stroke="currentColor" stroke-width="1.5"></path> <path d="M15 18H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2.38351 13.793C1.93748 10.6294 1.71447 9.04765 2.66232 8.02383C3.61017 7 5.29758 7 8.67239 7H15.3276C18.7024 7 20.3898 7 21.3377 8.02383C22.2855 9.04765 22.0625 10.6294 21.6165 13.793L21.1935 16.793C20.8437 19.2739 20.6689 20.5143 19.7717 21.2572C18.8745 22 17.5512 22 14.9046 22H9.09536C6.44881 22 5.12553 22 4.22834 21.2572C3.33115 20.5143 3.15626 19.2739 2.80648 16.793L2.38351 13.793Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg> <span><?=translate('library')?></span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<?php if ($sub_page == 'userrole/book') echo 'nav-active';?>">
                                <a href="<?=base_url('userrole/book')?>">
                                    <span><i class="fas fa-caret-right"></i><?=translate('books') . " " . translate('list')?></span>
                                </a>
                            </li>
                            <li class="<?php if ($sub_page == 'userrole/book_request') echo 'nav-active';?>">
                                <a href="<?=base_url('userrole/book_request')?>">
                                    <span><i class="fas fa-caret-right"></i>Issued Book</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- events -->
                    <li class="<?php if ($sub_page == 'userrole/event') echo 'nav-active'; ?> ">
                        <a href="<?=base_url('userrole/event')?>">
                        <svg viewBox="0 0 24 24" id="_24x24_On_Light_Party" data-name="24x24/On Light/Party" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="30px" height="30px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect id="view-box" width="24" height="24" fill="none"></rect> <path id="Shape" d="M1.14,14.362A3.876,3.876,0,0,1,.592,9.546L6.338.353A.75.75,0,0,1,7.5.22L15.282,8a.749.749,0,0,1-.132,1.166L5.956,14.91a3.895,3.895,0,0,1-4.816-.548Zm.724-4.021a2.393,2.393,0,0,0,3.3,3.3l.892-.557L2.421,9.45Zm5.494,1.924,2.387-1.492L4.728,5.758,3.237,8.144Zm3.692-2.308,2.505-1.566L7.11,1.947,5.544,4.452Z" transform="translate(3.233 5.265)" fill="currentColor"></path> <path id="Shape-2" data-name="Shape" d="M1.5,4.15V.75A.75.75,0,0,0,0,.75v3.4a.75.75,0,0,0,1.5,0Z" transform="translate(14.971 1.45)" fill="#00003a5d1"></path> <path id="Shape-3" data-name="Shape" d="M1.16,3.114,3.82,1.378A.75.75,0,0,0,3,.122L.34,1.857a.75.75,0,1,0,.82,1.256Z" transform="translate(17.312 6.75)" fill="#00000bba2"></path> <path id="Shape-4" data-name="Shape" d="M1.28,2.107l.827-.827A.75.75,0,0,0,1.047.22L.22,1.047A.75.75,0,0,0,1.28,2.107Z" transform="translate(17.971 3.798)" fill="#000ff6783"></path> <path id="Shape-5" data-name="Shape" d="M.75,1.5H.967a.75.75,0,0,0,0-1.5H.75a.75.75,0,0,0,0,1.5Z" transform="translate(18.971 10.625)" fill="#000ffa458"></path> <path id="Shape-6" data-name="Shape" d="M.75,1.5H.967a.75.75,0,0,0,0-1.5H.75a.75.75,0,0,0,0,1.5Z" transform="translate(14.971 7.625)" fill="#000c75fff"></path> <path id="Shape-7" data-name="Shape" d="M1.881,1.478,1.439.453a.75.75,0,1,0-1.377.594L.5,2.073a.75.75,0,1,0,1.377-.594Z" transform="translate(11.528 2.599)" fill="#000ffa458"></path> </g></svg> <span><?=translate('events')?></span>
                        </a>
                    </li>

                   <!-- fees history -->
                    <li class="<?php if ($main_menu == 'fees') echo 'nav-active';?> ">
                        <a href="<?=base_url('userrole/invoice')?>">
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
                                    </svg> <span><?=translate('fees_history')?></span>
                        </a>
                    </li>

                    <!-- message -->
                    <li class="<?php if ($main_menu == 'message') echo 'nav-active'; ?> ">
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
                </ul>
            </nav>
        </div>
<?php } ?>
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