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
    const eyeOpenSVG = `<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg>`;

    // Eye closed SVG
    const eyeClosedSVG = <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2.68936 6.70456C2.52619 6.32384 2.08528 6.14747 1.70456 6.31064C1.32384 6.47381 1.14747 6.91472 1.31064 7.29544L2.68936 6.70456ZM15.5872 13.3287L15.3125 12.6308L15.5872 13.3287ZM9.04145 13.7377C9.26736 13.3906 9.16904 12.926 8.82185 12.7001C8.47466 12.4742 8.01008 12.5725 7.78417 12.9197L9.04145 13.7377ZM6.37136 15.091C6.14545 15.4381 6.24377 15.9027 6.59096 16.1286C6.93815 16.3545 7.40273 16.2562 7.62864 15.909L6.37136 15.091ZM22.6894 7.29544C22.8525 6.91472 22.6762 6.47381 22.2954 6.31064C21.9147 6.14747 21.4738 6.32384 21.3106 6.70456L22.6894 7.29544ZM19 11.1288L18.4867 10.582V10.582L19 11.1288ZM19.9697 13.1592C20.2626 13.4521 20.7374 13.4521 21.0303 13.1592C21.3232 12.8663 21.3232 12.3914 21.0303 12.0985L19.9697 13.1592ZM11.25 16.5C11.25 16.9142 11.5858 17.25 12 17.25C12.4142 17.25 12.75 16.9142 12.75 16.5H11.25ZM16.3714 15.909C16.5973 16.2562 17.0619 16.3545 17.409 16.1286C17.7562 15.9027 17.8545 15.4381 17.6286 15.091L16.3714 15.909ZM5.53033 11.6592C5.82322 11.3663 5.82322 10.8914 5.53033 10.5985C5.23744 10.3056 4.76256 10.3056 4.46967 10.5985L5.53033 11.6592ZM2.96967 12.0985C2.67678 12.3914 2.67678 12.8663 2.96967 13.1592C3.26256 13.4521 3.73744 13.4521 4.03033 13.1592L2.96967 12.0985ZM12 13.25C8.77611 13.25 6.46133 11.6446 4.9246 9.98966C4.15645 9.16243 3.59325 8.33284 3.22259 7.71014C3.03769 7.3995 2.90187 7.14232 2.8134 6.96537C2.76919 6.87696 2.73689 6.80875 2.71627 6.76411C2.70597 6.7418 2.69859 6.7254 2.69411 6.71533C2.69187 6.7103 2.69036 6.70684 2.68957 6.70503C2.68917 6.70413 2.68896 6.70363 2.68892 6.70355C2.68891 6.70351 2.68893 6.70357 2.68901 6.70374C2.68904 6.70382 2.68913 6.70403 2.68915 6.70407C2.68925 6.7043 2.68936 6.70456 2 7C1.31064 7.29544 1.31077 7.29575 1.31092 7.29609C1.31098 7.29624 1.31114 7.2966 1.31127 7.2969C1.31152 7.29749 1.31183 7.2982 1.31218 7.299C1.31287 7.30062 1.31376 7.30266 1.31483 7.30512C1.31698 7.31003 1.31988 7.31662 1.32353 7.32483C1.33083 7.34125 1.34115 7.36415 1.35453 7.39311C1.38127 7.45102 1.42026 7.5332 1.47176 7.63619C1.57469 7.84206 1.72794 8.13175 1.93366 8.47736C2.34425 9.16716 2.96855 10.0876 3.8254 11.0103C5.53867 12.8554 8.22389 14.75 12 14.75V13.25ZM15.3125 12.6308C14.3421 13.0128 13.2417 13.25 12 13.25V14.75C13.4382 14.75 14.7246 14.4742 15.8619 14.0266L15.3125 12.6308ZM7.78417 12.9197L6.37136 15.091L7.62864 15.909L9.04145 13.7377L7.78417 12.9197ZM22 7C21.3106 6.70456 21.3107 6.70441 21.3108 6.70427C21.3108 6.70423 21.3108 6.7041 21.3109 6.70402C21.3109 6.70388 21.311 6.70376 21.311 6.70368C21.3111 6.70352 21.3111 6.70349 21.3111 6.7036C21.311 6.7038 21.3107 6.70452 21.3101 6.70576C21.309 6.70823 21.307 6.71275 21.3041 6.71924C21.2983 6.73223 21.2889 6.75309 21.2758 6.78125C21.2495 6.83757 21.2086 6.92295 21.1526 7.03267C21.0406 7.25227 20.869 7.56831 20.6354 7.9432C20.1669 8.69516 19.4563 9.67197 18.4867 10.582L19.5133 11.6757C20.6023 10.6535 21.3917 9.56587 21.9085 8.73646C22.1676 8.32068 22.36 7.9668 22.4889 7.71415C22.5533 7.58775 22.602 7.48643 22.6353 7.41507C22.6519 7.37939 22.6647 7.35118 22.6737 7.33104C22.6782 7.32097 22.6818 7.31292 22.6844 7.30696C22.6857 7.30398 22.6867 7.30153 22.6876 7.2996C22.688 7.29864 22.6883 7.29781 22.6886 7.29712C22.6888 7.29677 22.6889 7.29646 22.689 7.29618C22.6891 7.29604 22.6892 7.29585 22.6892 7.29578C22.6893 7.29561 22.6894 7.29544 22 7ZM18.4867 10.582C17.6277 11.3882 16.5739 12.1343 15.3125 12.6308L15.8619 14.0266C17.3355 13.4466 18.5466 12.583 19.5133 11.6757L18.4867 10.582ZM18.4697 11.6592L19.9697 13.1592L21.0303 12.0985L19.5303 10.5985L18.4697 11.6592ZM11.25 14V16.5H12.75V14H11.25ZM14.9586 13.7377L16.3714 15.909L17.6286 15.091L16.2158 12.9197L14.9586 13.7377ZM4.46967 10.5985L2.96967 12.0985L4.03033 13.1592L5.53033 11.6592L4.46967 10.5985Z" fill="currentColor"></path> </g></svg>`;

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
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l5-5-5-5v4a8 8 0 100 16z"></path>
            </svg>
            <span>Logging in...</span>
        </div>`;

    loginForm.addEventListener("submit", function (e) {
        loginButton.innerHTML = loadingSVG;
        loginButton.classList.add("flex", "items-center", "justify-center");
    });

    // Restore SVG if an error occurs
    <?php if ($this->session->flashdata('alert-message-error')): ?>
        setTimeout(() => {
            loginButton.innerHTML = `<?php echo $originalSVG; ?>`;
        }, 500); // Restore SVG after delay
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