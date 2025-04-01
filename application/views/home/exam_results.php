<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo translate('exam_results');?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css');?>">
    <script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cdv.css');?>">
    <style>
        .vercel-gradient {
            background: linear-gradient(to bottom right, #fafafa, #f5f5f5);
        }
        .vercel-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .input-vercel {
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        .input-vercel:focus {
            border-color: rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
        }
        .btn-vercel {
            background: #000;
            color: #fff;
            transition: all 0.2s;
        }
        .btn-vercel:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: translateY(-1px);
        }
        #print {
        margin-bottom: 20px;
        margin-top: 0px;
        padding: 2px 15px;
        font-size: 14px;
        font-weight: 500;
    }
    </style>
</head>
<body class="min-h-screen vercel-gradient text-gray-900">
    <div class="container mx-auto px-4 py-12">
   <!-- Logo Container -->
   <div class="mb-8 flex justify-center">
        <a href="/" class="flex-shrink-0">
            <img src="<?php echo base_url('uploads/frontend/images/' . $cms_setting['logo']); ?>" alt="Logo" class="h-8 w-auto">
        </a>
    </div>
        <!-- Description -->
        <div class="max-w-3xl mx-auto mb-8">
            <p class="text-gray-600"><?php echo $page_data['description']; ?></p>
        </div>

        <!-- Main Form -->
        <?php echo form_open('home/examResultsPrintFn', array('class' => 'printIn max-w-3xl mx-auto')); ?>
        <div class="vercel-card rounded-lg p-8 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Exam Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?=translate('exam')?> <span class="text-red-500">*</span>
                    </label>
                    <?php
                    $array = array();
                    $result = $this->home_model->getExamList($branchID);
                    if (count($result)) {
                        $array[''] = translate('select');
                        foreach ($result as $row) {
                            if ($row['term_id'] != 0) {
                                $term = $this->db->select('name')->where('id', $row['term_id'])->get('exam_term')->row()->name;
                                $name = $row['name'] . ' (' . $term . ')';
                            } else {
                                $name = $row['name'];
                            }
                            $array[$row['id']] = $name;
                        }
                    } else {
                        $array[0] = translate('no_information_available');
                    }
                    echo form_dropdown("exam_id", $array, set_value('exam_id'), "class='w-full px-2 py-2 rounded-md input-vercel text-gray-900'");
                    ?>
                    <span class="error text-red-500 text-sm mt-1"></span>
                </div>

                <!-- Academic Year -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?=translate('academic_year')?> <span class="text-red-500">*</span>
                    </label>
                    <?php
                    $arrayYear = array("" => translate('select'));
                    $years = $this->db->get('schoolyear')->result();
                    foreach ($years as $year) {
                        $arrayYear[$year->id] = $year->school_year;
                    }
                    echo form_dropdown("session_id", $arrayYear, set_value('session_id', $global_config['session_id']), "class='w-full px-2 py-2 rounded-md input-vercel text-gray-900'");
                    ?>
                    <span class="error text-red-500 text-sm mt-1"></span>
                </div>

                <!-- Register Number -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?=translate('register_no')?> <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           class="w-full px-2 py-2 rounded-md input-vercel text-gray-900" 
                           name="register_no" 
                           value="<?=set_value('register_no')?>" 
                           autocomplete="off" />
                    <span class="error text-red-500 text-sm mt-1"></span>
                </div>
            </div>

            <input type="hidden" name="grade_scale" value="<?php echo $page_data['grade_scale']; ?>">
            <input type="hidden" name="attendance" value="<?php echo $page_data['attendance']; ?>">
            
            <button type="submit" 
                    class="mt-6 btn-vercel py-2 px-6 rounded-md font-medium flex items-center gap-2">
                    <svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('submit')?>
            </button>
        </div>
        <?php echo form_close(); ?>
        <!-- Results Card -->
        <div id="card_holder" class="mx-auto" style="display: none;">
        <!-- Button moved outside the card -->
        <button type="button" 
                class="print-btn btn-vercel py-2 px-6 rounded-md font-medium flex items-center gap-2 mb-4" 
                id="print" style="z-index: 9999; position: relative;"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44772 16.4477 9 17 9C17.5523 9 18 9.44772 18 10Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9451 1.25H12.0549C13.4225 1.24998 14.5248 1.24996 15.3918 1.36652C16.2919 1.48754 17.0497 1.74643 17.6517 2.34835C18.3916 3.08833 18.6205 4.07517 18.7012 5.29943C18.9462 5.31578 19.1763 5.33755 19.3918 5.36652C20.2919 5.48754 21.0497 5.74643 21.6517 6.34835C22.2536 6.95027 22.5125 7.70814 22.6335 8.60825C22.75 9.47522 22.75 10.5775 22.75 11.9451V12.0549C22.75 13.4225 22.75 14.5248 22.6335 15.3918C22.5125 16.2919 22.2536 17.0497 21.6517 17.6517C20.9117 18.3916 19.9248 18.6205 18.7006 18.7012C18.6842 18.9462 18.6625 19.1763 18.6335 19.3918C18.5125 20.2919 18.2536 21.0497 17.6517 21.6517C17.0497 22.2536 16.2919 22.5125 15.3918 22.6335C14.5248 22.75 13.4225 22.75 12.0549 22.75H11.9451C10.5775 22.75 9.47522 22.75 8.60825 22.6335C7.70814 22.5125 6.95027 22.2536 6.34835 21.6517C5.74643 21.0497 5.48754 20.2919 5.36652 19.3918C5.33755 19.1763 5.31578 18.9462 5.29942 18.7012C4.07517 18.6205 3.08833 18.3916 2.34835 17.6517C1.74643 17.0497 1.48754 16.2919 1.36652 15.3918C1.24996 14.5248 1.24998 13.4225 1.25 12.0549V11.9451C1.24998 10.5775 1.24996 9.47522 1.36652 8.60825C1.48754 7.70814 1.74643 6.95027 2.34835 6.34835C2.95027 5.74643 3.70814 5.48754 4.60825 5.36652C4.82374 5.33755 5.05377 5.31578 5.29879 5.29943C5.37952 4.07517 5.60837 3.08833 6.34835 2.34835C6.95027 1.74643 7.70814 1.48754 8.60825 1.36652C9.47522 1.24996 10.5775 1.24998 11.9451 1.25ZM6.80714 5.25295C7.16406 5.24999 7.54313 5.24999 7.94512 5.25H16.0549C16.4569 5.24999 16.8359 5.24999 17.1929 5.25295C17.1109 4.23209 16.9265 3.74452 16.591 3.40901C16.3142 3.13225 15.9257 2.9518 15.1919 2.85315C14.4365 2.75159 13.4354 2.75 12 2.75C10.5646 2.75 9.56347 2.75159 8.80812 2.85315C8.07434 2.9518 7.68577 3.13225 7.40901 3.40901C7.0735 3.74452 6.88909 4.23209 6.80714 5.25295ZM5.25294 17.1929C5.24999 16.8359 5.24999 16.4569 5.25 16.0549L5.25 14.75H5C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25H19C19.4142 13.25 19.75 13.5858 19.75 14C19.75 14.4142 19.4142 14.75 19 14.75H18.75V16.0549C18.75 16.4569 18.75 16.8359 18.7471 17.1929C19.7679 17.1109 20.2555 16.9265 20.591 16.591C20.8678 16.3142 21.0482 15.9257 21.1469 15.1919C21.2484 14.4365 21.25 13.4354 21.25 12C21.25 10.5646 21.2484 9.56347 21.1469 8.80812C21.0482 8.07435 20.8678 7.68577 20.591 7.40901C20.3142 7.13225 19.9257 6.9518 19.1919 6.85315C18.4365 6.75159 17.4354 6.75 16 6.75H8C6.56458 6.75 5.56347 6.75159 4.80812 6.85315C4.07435 6.9518 3.68577 7.13225 3.40901 7.40901C3.13225 7.68577 2.9518 8.07435 2.85315 8.80812C2.75159 9.56347 2.75 10.5646 2.75 12C2.75 13.4354 2.75159 14.4365 2.85315 15.1919C2.9518 15.9257 3.13225 16.3142 3.40901 16.591C3.74452 16.9265 4.23209 17.1109 5.25294 17.1929ZM17.25 14.75H6.75V16C6.75 17.4354 6.75159 18.4365 6.85315 19.1919C6.9518 19.9257 7.13225 20.3142 7.40901 20.591C7.68577 20.8678 8.07435 21.0482 8.80812 21.1469C9.56347 21.2484 10.5646 21.25 12 21.25C13.4354 21.25 14.4365 21.2484 15.1919 21.1469C15.9257 21.0482 16.3142 20.8678 16.591 20.591C16.8678 20.3142 17.0482 19.9257 17.1469 19.1919C17.2484 18.4365 17.25 17.4354 17.25 16V14.75ZM5.25 10C5.25 9.58579 5.58579 9.25 6 9.25H9C9.41421 9.25 9.75 9.58579 9.75 10C9.75 10.4142 9.41421 10.75 9 10.75H6C5.58579 10.75 5.25 10.4142 5.25 10ZM8.25 16.8049C8.25 16.3907 8.58579 16.0549 9 16.0549H15C15.4142 16.0549 15.75 16.3907 15.75 16.8049C15.75 17.2191 15.4142 17.5549 15 17.5549H9C8.58579 17.5549 8.25 17.2191 8.25 16.8049ZM8.25 19.3049C8.25 18.8907 8.58579 18.5549 9 18.5549H13C13.4142 18.5549 13.75 18.8907 13.75 19.3049C13.75 19.7191 13.4142 20.0549 13 20.0549H9C8.58579 20.0549 8.25 19.7191 8.25 19.3049Z" fill="currentColor"></path>
                </svg>
                 <?=translate('print')?>
        </button>
    
        <div class="vercel-card rounded-lg p-8">
            <div id="card"></div>
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
<div class="cdev-overlay" id="cdev-overlay"></div>

<div class="cdev-menu-container" id="cdev-menu-container">
    <div class="cdev-menu-section">
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">🚀</div>
            <div class="cdev-menu-item-text">What's new</div>
        </a>
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">✓</div>
            <div class="cdev-menu-item-text">Get started checklist</div>
        </a>
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">📹</div>
            <div class="cdev-menu-item-text">Video tutorials</div>
        </a>
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">⊕</div>
            <div class="cdev-menu-item-text">Help Center</div>
        </a>
    </div>

    <div class="cdev-menu-section">
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">⌨️</div>
            <div class="cdev-menu-item-text">Keyboard shortcuts</div>
        </a>
    </div>

    <div class="cdev-menu-section">
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">💬</div>
            <div class="cdev-menu-item-text">Share feedback</div>
            <span class="cdev-new-badge">New</span>
        </a>
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">🐞</div>
            <div class="cdev-menu-item-text">Report a bug</div>
        </a>
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">⭐</div>
            <div class="cdev-menu-item-text">Request feature</div>
        </a>
    </div>

    <div class="cdev-menu-section">
        <a href="#" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">👥</div>
            <div class="cdev-menu-item-text">Community</div>
        </a>
    </div>

    <div class="cdev-menu-section">
        <a href="#" target="_blank" class="cdev-menu-item">
            <div class="cdev-menu-item-icon">🌐</div>
            <div class="cdev-menu-item-text">Acamedium</div>
        </a>
    </div>
</div>

<button class="cdev-help-button" id="cdev-help-button" aria-label="Help">
    <div class="cdev-help-icon">
        <svg id="question-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 7.75C11.3787 7.75 10.875 8.25368 10.875 8.875C10.875 9.28921 10.5392 9.625 10.125 9.625C9.71079 9.625 9.375 9.28921 9.375 8.875C9.375 7.42525 10.5503 6.25 12 6.25C13.4497 6.25 14.625 7.42525 14.625 8.875C14.625 9.83834 14.1056 10.6796 13.3353 11.1354C13.1385 11.2518 12.9761 11.3789 12.8703 11.5036C12.7675 11.6246 12.75 11.7036 12.75 11.75V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V11.75C11.25 11.2441 11.4715 10.8336 11.7266 10.533C11.9786 10.236 12.2929 10.0092 12.5715 9.84439C12.9044 9.64739 13.125 9.28655 13.125 8.875C13.125 8.25368 12.6213 7.75 12 7.75ZM12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                    fill="#1C274C"></path>
            </g>
        </svg>
        <svg id="close-icon" viewBox="0 0 24 24">
            <path
                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
        </svg>
    </div>
</button>
<script>
        const helpButton = document.getElementById('cdev-help-button');
        const menuContainer = document.getElementById('cdev-menu-container');
        const overlay = document.getElementById('cdev-overlay');

        // Toggle menu with animation
        function toggleMenu() {
            menuContainer.classList.toggle('visible');
            overlay.classList.toggle('visible');

            // Update aria-expanded for accessibility
            const isExpanded = menuContainer.classList.contains('visible');
            helpButton.setAttribute('aria-expanded', isExpanded);
        }

        // Event listeners with passive where appropriate
        helpButton.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();
            toggleMenu();
        }, { passive: false });

        overlay.addEventListener('click', toggleMenu, { passive: true });

        document.addEventListener('click', (event) => {
            if (menuContainer.classList.contains('visible')) {
                if (!menuContainer.contains(event.target) && !helpButton.contains(event.target)) {
                    toggleMenu();
                }
            }
        }, { passive: true });

        // Handle keyboard navigation
        helpButton.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleMenu();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && menuContainer.classList.contains('visible')) {
                toggleMenu();
            }
        });
    </script>
 <!-- Footer -->
 <footer class="w-full py-4 text-center text-gray-600 text-sm">
    ©<?php echo date('Y'); ?> <a href="#"><strong>Acamedium.</strong></a> All rights reserved.
    <br>
    Licenced to <strong><?php echo $global_config['institute_name'];?></strong>. 
        </strong>
    </span>
</footer>


    <script type="text/javascript">
        $(document).ready(function () {
            $('form.printIn').on('submit', function(e){
                e.preventDefault();
                var btn = $(this).find('[type="submit"]');
                var $this = $(this);
                $("#card_holder").hide();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function () {
                        btn.html('<i class="fas fa-spinner fa-spin"></i> Processing');
                        btn.attr('disabled', true);
                    },
                    success: function (data) {
                        $('.error').html("");
                        if (data.status == "fail") {
                            $.each(data.error, function (index, value) {
                                $this.find("[name='" + index + "']").parents('div').find('.error').html(value);
                            });
                        } else if (data.status == 0) {
                            swal({
                                toast: true,
                                position: 'top-end',
                                type: 'error',
                                title: data.error,
                                confirmButtonClass: 'btn btn-default',
                                buttonsStyling: false,
                                timer: 8000
                            });
                        } else {
                            $('#card').html(data.card_data);
                            $("#card_holder").show(200);
                        }
                    },
                    error: function () {
                        swal({
                            toast: true,
                            position: 'top-end',
                            type: 'error',
                            title: "An error occurred, please try again",
                            confirmButtonClass: 'btn btn-default',
                            buttonsStyling: false,
                            timer: 8000
                        });
                    },
                    complete: function () {
                        btn.html('<svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>send-back</title> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?=translate('submit')?>');
                        btn.attr('disabled', false);
                    }
                });
            });

            $('#print').on('click', function(e){
                var oContent = document.getElementById('card').innerHTML;
                var frame1 = document.createElement('iframe');
                frame1.name = "frame1";
                frame1.style.position = "absolute";
                frame1.style.top = "-1000000px";
                document.body.appendChild(frame1);
                var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
                frameDoc.document.open();
                frameDoc.document.write('<html><head><title></title>');
                frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/vendor/bootstrap/css/bootstrap.min.css">');
                frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/css/custom-style.css">');
                frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/css/certificate.css">');
                frameDoc.document.write('</head><body>');
                frameDoc.document.write(oContent);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
    </script>
</body>
</html>