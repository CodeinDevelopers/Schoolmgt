<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <title>Certification Exam</title>
    <style>
        .btn-vercel {
            background-color: black;
            color: white;
            transition: background-color 0.2s;
        }
        .btn-vercel:hover {
            background-color: #333;
        }
        .ss-dot::after {
    content: "•";
    margin-left: 8px; /* Adjust spacing between text and dot */
    font-size: 1.5rem; /* Adjust dot size */
    color: #000; /* Dot color, adjust as needed */
}

    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
    
<div class="text-center px-4">
    <!-- Logo Container -->
    <div class="mb-8 flex justify-center">
        <a href="/" class="flex-shrink-0">
            <img src="<?php echo base_url('uploads/frontend/images/' . $cms_setting['logo']); ?>" alt="Logo" class="h-8 w-auto">
        </a>
    </div>

            <!-- Welcome Text -->
            <h3 class="text-gray-900 text-2xl font-bold mb-8">
               What Exam Will Like To Practice?
            </h3>

            <!-- Buttons Container -->
            <div class="flex flex-col gap-4 max-w-xs mx-auto w-full">
    <a href="<?php echo base_url('cbt/ss1'); ?>" class="bg-gray-100 text-gray-900 hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-8 py-4 text-lg font-bold w-72"><svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>certificate-ssl</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> <g> <path d="M20,39H6V9H40a2,2,0,0,0,0-4H4A2,2,0,0,0,2,7V41a2,2,0,0,0,2,2H20a2,2,0,0,0,0-4Z"></path> <path d="M46,24A13,13,0,0,0,33,11a12.8,12.8,0,0,0-8.3,3H12a2,2,0,0,0,0,4h9.5a11.1,11.1,0,0,0-1.3,4H12a2,2,0,0,0,0,4h8.2a11.1,11.1,0,0,0,1.3,4H12a2,2,0,0,0,0,4H24.7l1.3.9v9.7A2.3,2.3,0,0,0,28,47a1.8,1.8,0,0,0,1.3-.6L33,43l3.7,3.4A1.8,1.8,0,0,0,38,47a2.3,2.3,0,0,0,2-2.4V35A13.2,13.2,0,0,0,46,24ZM36,32.5v7.8l-3-2.8-3,2.8V32.5A9.1,9.1,0,0,1,24,24a9,9,0,0,1,18,0A9.1,9.1,0,0,1,36,32.5Z"></path> <circle cx="33" cy="24" r="5"></circle> </g> </g> </g> </g></svg>
                WAEC                    
                </a>
                
                 <a href="<?php echo base_url('cbt/ss1'); ?>" class="bg-gray-100 text-gray-900 hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-8 py-4 text-lg font-bold w-72"><svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>certificate-ssl</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> <g> <path d="M20,39H6V9H40a2,2,0,0,0,0-4H4A2,2,0,0,0,2,7V41a2,2,0,0,0,2,2H20a2,2,0,0,0,0-4Z"></path> <path d="M46,24A13,13,0,0,0,33,11a12.8,12.8,0,0,0-8.3,3H12a2,2,0,0,0,0,4h9.5a11.1,11.1,0,0,0-1.3,4H12a2,2,0,0,0,0,4h8.2a11.1,11.1,0,0,0,1.3,4H12a2,2,0,0,0,0,4H24.7l1.3.9v9.7A2.3,2.3,0,0,0,28,47a1.8,1.8,0,0,0,1.3-.6L33,43l3.7,3.4A1.8,1.8,0,0,0,38,47a2.3,2.3,0,0,0,2-2.4V35A13.2,13.2,0,0,0,46,24ZM36,32.5v7.8l-3-2.8-3,2.8V32.5A9.1,9.1,0,0,1,24,24a9,9,0,0,1,18,0A9.1,9.1,0,0,1,36,32.5Z"></path> <circle cx="33" cy="24" r="5"></circle> </g> </g> </g> </g></svg>
                    JAMB
                </a>
                
            <a href="<?php echo base_url('cbt/ss1'); ?>" class="bg-gray-100 text-gray-900 hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-8 py-4 text-lg font-bold w-72"><svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>certificate-ssl</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> <g> <path d="M20,39H6V9H40a2,2,0,0,0,0-4H4A2,2,0,0,0,2,7V41a2,2,0,0,0,2,2H20a2,2,0,0,0,0-4Z"></path> <path d="M46,24A13,13,0,0,0,33,11a12.8,12.8,0,0,0-8.3,3H12a2,2,0,0,0,0,4h9.5a11.1,11.1,0,0,0-1.3,4H12a2,2,0,0,0,0,4h8.2a11.1,11.1,0,0,0,1.3,4H12a2,2,0,0,0,0,4H24.7l1.3.9v9.7A2.3,2.3,0,0,0,28,47a1.8,1.8,0,0,0,1.3-.6L33,43l3.7,3.4A1.8,1.8,0,0,0,38,47a2.3,2.3,0,0,0,2-2.4V35A13.2,13.2,0,0,0,46,24ZM36,32.5v7.8l-3-2.8-3,2.8V32.5A9.1,9.1,0,0,1,24,24a9,9,0,0,1,18,0A9.1,9.1,0,0,1,36,32.5Z"></path> <circle cx="33" cy="24" r="5"></circle> </g> </g> </g> </g></svg>
                    GCE
                </a>

                <a href="<?php echo base_url('cbt/ss1'); ?>" class="bg-gray-100 text-gray-900 hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-8 py-4 text-lg font-bold w-72"><svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>certificate-ssl</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> <g> <path d="M20,39H6V9H40a2,2,0,0,0,0-4H4A2,2,0,0,0,2,7V41a2,2,0,0,0,2,2H20a2,2,0,0,0,0-4Z"></path> <path d="M46,24A13,13,0,0,0,33,11a12.8,12.8,0,0,0-8.3,3H12a2,2,0,0,0,0,4h9.5a11.1,11.1,0,0,0-1.3,4H12a2,2,0,0,0,0,4h8.2a11.1,11.1,0,0,0,1.3,4H12a2,2,0,0,0,0,4H24.7l1.3.9v9.7A2.3,2.3,0,0,0,28,47a1.8,1.8,0,0,0,1.3-.6L33,43l3.7,3.4A1.8,1.8,0,0,0,38,47a2.3,2.3,0,0,0,2-2.4V35A13.2,13.2,0,0,0,46,24ZM36,32.5v7.8l-3-2.8-3,2.8V32.5A9.1,9.1,0,0,1,24,24a9,9,0,0,1,18,0A9.1,9.1,0,0,1,36,32.5Z"></path> <circle cx="33" cy="24" r="5"></circle> </g> </g> </g> </g></svg>
                NECO
                </a>
            </div>
        </div>
    </main>
    <div class="fixed bottom-4 left-4">
    <a href="javascript:void(0);" onclick="window.history.back();" class="bg-black text-white rounded-full px-2 py-2 flex items-center gap-2 hover:bg-gray-800 transition-colors duration-200 shadow-lg">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M11 9L8 12M8 12L11 15M8 12H16M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </svg>
        <span>Back</span>
    </a>
</div>
     <!-- Help Button -->
     <div class="fixed bottom-4 right-4">
        <a href="<?php echo base_url('help'); ?>" class="bg-black text-white rounded-full px-2 py-2 flex items-center gap-2 hover:bg-gray-800 transition-colors duration-200 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
            <span>Help</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="w-full py-4 text-center text-gray-600 text-sm">
    ©<?php echo date('Y'); ?> <?php echo $cms_setting['application_title']; ?>. All rights reserved.
    <br>
    <span>
        Designed by 
        <strong>
            <span style="color: #ff2b13;">Codein</span><span style="color: #43cdc2;">Developers</span>.
        </strong>
    </span>
</footer>
</body>
</html>