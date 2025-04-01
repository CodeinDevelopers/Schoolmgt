<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $global_config['institute_name'] ?>">
    <meta name="author" content="<?php echo $global_config['institute_name'] ?>">
    <title><?php echo translate('login');?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cdv.css');?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.js');?>"></script>
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
        button:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        .text-error {
            color: #dc2626;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cdv.css');?>">
    <script type="text/javascript">
        var base_url = '<?php echo base_url() ?>';
    </script>
</head>
<body class="min-h-screen vercel-gradient text-gray-900">
    <div class="container mx-auto px-4 h-screen flex items-center justify-center">
        <div class="w-full max-w-md relative">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <img src="<?=$this->application_model->getBranchImage($branch_id, 'logo')?>" 
                     alt="Logo" 
                     class="h-12 mx-auto">
                <h2 class="text-2xl font-bold tracking-tight">
                    <?php echo $global_config['institute_name'];?>
                </h2>
            </div>

            <!-- Login Form -->
            <div class="vercel-card rounded-lg p-8">
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2 text-center">
                        Welcome Back!
                    </h3>
                    <p class="text-gray-600 text-sm text-center mb-6">
                        Login to your Account to Continue to your Dashboard
                    </p>
                     <!-- Error Messages Section -->
                <?php 
                if($this->session->flashdata('alert-message-error')){
                    echo '<div class="mb-6 p-4 rounded-md bg-red-50 text-red-700 text-center">' . $this->session->flashdata('alert-message-error') . '</div>';
                }
                if($this->session->flashdata('alert-message-success')){
                    echo '<div class="mb-6 p-4 rounded-md bg-green-50 text-green-700 text-center">' . $this->session->flashdata('alert-message-success') . '</div>';
                }
                ?>
                </div>

                <?php echo form_open($this->uri->uri_string()); ?>
                    <div class="space-y-5">
                        <div class="<?php if (form_error('email')) echo 'has-error'; ?>">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo translate('username');?>
                            </label>
                            <input type="text" 
                                   name="email"
                                   value="<?php echo set_value('email');?>"
                                   class="w-full px-4 py-2 rounded-md input-vercel text-gray-900 placeholder-gray-500 focus:outline-none"
                                   placeholder="<?php echo translate('username');?>">
                            <?php if (form_error('email')): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo form_error('email'); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="<?php if (form_error('password')) echo 'has-error'; ?>">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo translate('password');?>
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       name="password"
                                       class="w-full px-4 py-2 rounded-md input-vercel text-gray-900 placeholder-gray-500 focus:outline-none"
                                       placeholder="<?php echo translate('password');?>">
                                <?php if (form_error('password')): ?>
                                    <p class="text-red-600 text-sm mt-1"><?php echo form_error('password'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center space-x-2 text-sm">
                                <input type="checkbox" 
                                       name="remember" 
                                       id="remember"
                                       class="rounded border-gray-300 text-black focus:ring-black">
                                <span class="text-gray-600"><?php echo translate('remember');?></span>
                            </label>
                            <a href="<?php echo base_url('authentication/forgot') . $this->authentication_model->getSegment(3);?>" 
                               class="text-sm text-gray-600 hover:text-gray-900">
                                <?php echo translate('lose_your_password');?>
                            </a>
                        </div>

                        <button type="submit" 
                                id="btn_submit"
                                class="w-full btn-vercel py-2 px-4 rounded-md font-medium">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="21px" height="21px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 6C8 3.79086 9.79086 2 12 2H17.5C19.9853 2 22 4.01472 22 6.5V17.5C22 19.9853 19.9853 22 17.5 22H12C9.79086 22 8 20.2091 8 18V17C8 16.4477 8.44772 16 9 16C9.55228 16 10 16.4477 10 17V18C10 19.1046 10.8954 20 12 20H17.5C18.8807 20 20 18.8807 20 17.5V6.5C20 5.11929 18.8807 4 17.5 4H12C10.8954 4 10 4.89543 10 6V7C10 7.55228 9.55228 8 9 8C8.44772 8 8 7.55228 8 7V6ZM12.2929 8.29289C12.6834 7.90237 13.3166 7.90237 13.7071 8.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L13.7071 15.7071C13.3166 16.0976 12.6834 16.0976 12.2929 15.7071C11.9024 15.3166 11.9024 14.6834 12.2929 14.2929L13.5858 13L5 13C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11L13.5858 11L12.2929 9.70711C11.9024 9.31658 11.9024 8.68342 12.2929 8.29289Z" fill="currentColor"/>
                            </svg> <?php echo translate('login');?>
                        </button>
                    </div>
                <?php echo form_close();?>
            </div>

            <div class="fixed bottom-4 left-4">
                <a href="<?php echo base_url('home'); ?>" class="bg-black text-white rounded-full px-2 py-2 flex items-center gap-2 hover:bg-gray-800 transition-colors duration-200 shadow-lg">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                        <path d="M11 9L8 12M8 12L11 15M8 12H16M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
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
          <footer class="w-full py-4 text-center text-gray-600 text-sm">
    ©<?php echo date('Y'); ?> <a href="#"><strong>Acamedium.</strong></a> All rights reserved.
    <br>
    Licenced to <strong><?php echo $global_config['institute_name'];?></strong>. 
        </strong>
    </span>
</footer>
        </div>
    </div>

    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-placeholder/jquery-placeholder.js');?>"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
            // Show/Hide Password Toggle
            const passwordField = document.querySelector("input[name='password']");
            
            // Create the eye toggle button
            const togglePassword = document.createElement("button");
            togglePassword.type = "button";
            togglePassword.classList.add("absolute", "right-3", "top-3", "text-gray-600", "focus:outline-none");

            // Eye open SVG
            const eyeOpenSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>`;

            // Eye closed SVG
            const eyeClosedSVG = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.6 18.6 0 014.62-5.94"/>
                    <path d="M9.88 9.88A3 3 0 0115 12a3 3 0 01-.88 2.12"/>
                    <path d="M3 3l18 18"/>
                </svg>`;

            togglePassword.innerHTML = eyeOpenSVG;
            passwordField.parentElement.style.position = "relative";
            passwordField.parentElement.appendChild(togglePassword);

            // Toggle password visibility
            togglePassword.addEventListener("click", function () {
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    togglePassword.innerHTML = eyeClosedSVG;
                } else {
                    passwordField.type = "password";
                    togglePassword.innerHTML = eyeOpenSVG;
                }
            });

// Swap Login SVG on Submit
const loginForm = document.querySelector("form");
const loginButton = document.querySelector("#btn_submit");
const originalSVG = loginButton.innerHTML; // Store the original SVG

const loadingSVG = `
    <div class="flex items-center justify-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="24px" height="24px" style="display: inline-block; vertical-align: middle;">
            <radialGradient id="a12" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)">
                <stop offset="0" stop-color="currentColor"></stop>
                <stop offset=".3" stop-color="currentColor" stop-opacity=".9"></stop>
                <stop offset=".6" stop-color="currentColor" stop-opacity=".6"></stop>
                <stop offset=".8" stop-color="currentColor" stop-opacity=".3"></stop>
                <stop offset="1" stop-color="currentColor" stop-opacity="0"></stop>
            </radialGradient>
            <circle transform-origin="center" fill="none" stroke="url(#a12)" stroke-width="15" stroke-linecap="round" stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100" r="70">
                <animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="0.6" values="360;0" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform>
            </circle>
            <circle transform-origin="center" fill="none" opacity=".2" stroke="currentColor" stroke-width="15" stroke-linecap="round" cx="100" cy="100" r="70"></circle>
        </svg><span>Logging in...</span>
    </div>`;

loginForm.addEventListener("submit", function (e) {
    loginButton.innerHTML = loadingSVG;
    loginButton.classList.add("flex", "items-center", "justify-center");
});

// Check for flash message and restore button immediately if there's an error
<?php if ($this->session->flashdata('alert-message-error')): ?>
    // Restore the button state right away
    loginButton.innerHTML = originalSVG;
    loginButton.classList.remove("flex", "items-center", "justify-center");
<?php endif; ?>
});

</script>
    <?php
    $alertclass = "";
    if($this->session->flashdata('alert-message-success')){
        $alertclass = "success";
    } else if ($this->session->flashdata('alert-message-error')){
        $alertclass = "error";
    } else if ($this->session->flashdata('alert-message-info')){
        $alertclass = "info";
    }
    if($alertclass != ''):
        $alert_message = $this->session->flashdata('alert-message-'. $alertclass);
    ?>
        <script type="text/javascript">
            swal({
                toast: true,
                position: 'top-end',
                type: '<?php echo $alertclass;?>',
                title: '<?php echo $alert_message;?>',
                confirmButtonClass: 'btn btn-default',
                buttonsStyling: false,
                timer: 8000
            })
        </script>
    <?php endif; ?>
</body>
</html>