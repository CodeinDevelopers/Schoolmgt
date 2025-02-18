<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $global_config['institute_name'] ?>">
    <meta name="author" content="<?php echo $global_config['institute_name'] ?>">
    <title><?php echo translate('login');?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css');?>">
    <script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
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
    color: #dc2626; /* Bright red */
    font-weight: bold;
}

    </style>
    <script type="text/javascript">
        var base_url = '<?php echo base_url() ?>';
    </script>
</head>
<body class="min-h-screen vercel-gradient text-gray-900">
    <div class="container mx-auto px-4 h-screen flex items-center justify-center">
        <div class="w-full max-w-md relative">
            <div class="absolute -top-16 left-0">
                </a>
            </div>
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <img src="<?=$this->application_model->getBranchImage($branch_id, 'logo')?>" 
                     alt="Logo" 
                     class="h-12 mx-auto mb-6">
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
                    <p class="text-gray-600 text-sm text-center">
                    Login to your Account to Continue to your Dashboard
                    </p>
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
                                <p class="text-error text-sm mt-1"><?php echo form_error('email'); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="<?php if (form_error('password')) echo 'has-error'; ?>">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo translate('password');?>
                            </label>
                            <input type="password" 
                                   name="password"
                                   class="w-full px-4 py-2 rounded-md input-vercel text-gray-900 placeholder-gray-500 focus:outline-none"
                                   placeholder="<?php echo translate('password');?>">
                            <?php if (form_error('password')): ?>
                                <p class="text-error-600 text-sm mt-1"><?php echo form_error('password'); ?></p>
                            <?php endif; ?>
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
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="21px" height="21px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0" ></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 6C8 3.79086 9.79086 2 12 2H17.5C19.9853 2 22 4.01472 22 6.5V17.5C22 19.9853 19.9853 22 17.5 22H12C9.79086 22 8 20.2091 8 18V17C8 16.4477 8.44772 16 9 16C9.55228 16 10 16.4477 10 17V18C10 19.1046 10.8954 20 12 20H17.5C18.8807 20 20 18.8807 20 17.5V6.5C20 5.11929 18.8807 4 17.5 4H12C10.8954 4 10 4.89543 10 6V7C10 7.55228 9.55228 8 9 8C8.44772 8 8 7.55228 8 7V6ZM12.2929 8.29289C12.6834 7.90237 13.3166 7.90237 13.7071 8.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L13.7071 15.7071C13.3166 16.0976 12.6834 16.0976 12.2929 15.7071C11.9024 15.3166 11.9024 14.6834 12.2929 14.2929L13.5858 13L5 13C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11L13.5858 11L12.2929 9.70711C11.9024 9.31658 11.9024 8.68342 12.2929 8.29289Z" fill="currentColor"></path> </g></svg> <?php echo translate('login');?> 
                        </button>
                    </div>
                <?php echo form_close();?>
            </div>
            <div class="fixed bottom-4 left-4">
   <a href="<?php echo base_url('home'); ?>" class="bg-black text-white rounded-full px-2 py-2 flex items-center gap-2 hover:bg-gray-800 transition-colors duration-200 shadow-lg">
   <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 9L8 12M8 12L11 15M8 12H16M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
       <span>Home</span>
   </a>
</div>
            <!-- Footer -->
            <footer class="w-full py-4 text-center text-gray-600 text-sm">
    ©<?php echo date('Y'); ?> <strong>Acamedium.</strong> All rights reserved.
    <br>
    Licenced to <strong><?php echo $global_config['institute_name'];?></strong>. 
    <br>
    <span>
        Designed by 
        <strong>
            <span style="color: #ff2b13;">Codein</span><span style="color: #43cdc2;">Developers</span>.
        </strong>
    </span>
</footer>


    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-placeholder/jquery-placeholder.js');?>"></script>
    <script>
   document.addEventListener("DOMContentLoaded", function () {
    // Show/Hide Password Toggle
    const passwordField = document.querySelector("input[name='password']");
    
    // Create the eye toggle button
    const togglePassword = document.createElement("button");
    togglePassword.type = "button";
    togglePassword.classList.add("absolute", "right-3", "top-10", "text-gray-600", "focus:outline-none");

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
        </svg> 
        <span>Logging in...</span>
    </div>`;

const errorSVG = `
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="21px" height="21px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
        <g id="SVGRepo_bgCarrier" stroke-width="0" ></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 6C8 3.79086 9.79086 2 12 2H17.5C19.9853 2 22 4.01472 22 6.5V17.5C22 19.9853 19.9853 22 17.5 22H12C9.79086 22 8 20.2091 8 18V17C8 16.4477 8.44772 16 9 16C9.55228 16 10 16.4477 10 17V18C10 19.1046 10.8954 20 12 20H17.5C18.8807 20 20 18.8807 20 17.5V6.5C20 5.11929 18.8807 4 17.5 4H12C10.8954 4 10 4.89543 10 6V7C10 7.55228 9.55228 8 9 8C8.44772 8 8 7.55228 8 7V6ZM12.2929 8.29289C12.6834 7.90237 13.3166 7.90237 13.7071 8.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L13.7071 15.7071C13.3166 16.0976 12.6834 16.0976 12.2929 15.7071C11.9024 15.3166 11.9024 14.6834 12.2929 14.2929L13.5858 13L5 13C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11L13.5858 11L12.2929 9.70711C11.9024 9.31658 11.9024 8.68342 12.2929 8.29289Z" fill="currentColor"></path>
        </g>
    </svg>
    <?php echo translate('login'); ?>`;

loginForm.addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent default form submission
    loginButton.innerHTML = loadingSVG;
    loginButton.classList.add("flex", "items-center", "justify-center");

    // Simulate an error response
    const errorOccurred = <?php echo $this->session->flashdata('alert-message-error') ? 'true' : 'false'; ?>;

    if (errorOccurred) {
        loginButton.innerHTML = errorSVG;
        // Optional: Add a class for styling error (if necessary)
    } else {
        // Proceed with actual form submission
        loginForm.submit();
    }
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