<link rel="stylesheet" href="<?php echo base_url('assets/css/cdv.css');?>">
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
    
<div class="text-center px-4">
    <!-- Logo Container -->
    <div class="flex justify-center">
        <a href="<?php echo base_url('#'); ?>" class="flex-shrink-0">
            <img src="<?=$this->application_model->getBranchImage($branch_id, 'logo')?>" alt="Logo" style="height: 60px;">
        </a>
    </div>

    <!-- Welcome Text -->
    <h2 class="text-gray-900 text-2xl font-bold mb-8">
    <?php echo $global_config['institute_name'];?> Portal
    </h2>
 
<!-- Buttons Container -->
<div class="w-80 mx-auto flex flex-col gap-4">
    <!-- Dynamic Login/Dashboard Button -->
    <div>
        <?php if (!is_loggedin()) { ?>
            <a href="<?php echo base_url('login'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full inline-block"> <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0" ></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 6C8 3.79086 9.79086 2 12 2H17.5C19.9853 2 22 4.01472 22 6.5V17.5C22 19.9853 19.9853 22 17.5 22H12C9.79086 22 8 20.2091 8 18V17C8 16.4477 8.44772 16 9 16C9.55228 16 10 16.4477 10 17V18C10 19.1046 10.8954 20 12 20H17.5C18.8807 20 20 18.8807 20 17.5V6.5C20 5.11929 18.8807 4 17.5 4H12C10.8954 4 10 4.89543 10 6V7C10 7.55228 9.55228 8 9 8C8.44772 8 8 7.55228 8 7V6ZM12.2929 8.29289C12.6834 7.90237 13.3166 7.90237 13.7071 8.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L13.7071 15.7071C13.3166 16.0976 12.6834 16.0976 12.2929 15.7071C11.9024 15.3166 11.9024 14.6834 12.2929 14.2929L13.5858 13L5 13C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11L13.5858 11L12.2929 9.70711C11.9024 9.31658 11.9024 8.68342 12.2929 8.29289Z" fill="currentColor"></path> </g></svg>
                Login
            </a>
        <?php } else { ?>
            <a href="<?php echo base_url('dashboard'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full inline-block"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3783 2C5.3905 2 5.40273 2 5.415 2L7.62171 2C8.01734 1.99998 8.37336 1.99996 8.66942 2.02454C8.98657 2.05088 9.32336 2.11052 9.65244 2.28147C10.109 2.51866 10.4813 2.89096 10.7185 3.34757C10.8895 3.67665 10.9491 4.01343 10.9755 4.33059C11 4.62664 11 4.98265 11 5.37828V9.62172C11 10.0174 11 10.3734 10.9755 10.6694C10.9491 10.9866 10.8895 11.3234 10.7185 11.6524C10.4813 12.109 10.109 12.4813 9.65244 12.7185C9.32336 12.8895 8.98657 12.9491 8.66942 12.9755C8.37337 13 8.01735 13 7.62172 13H5.37828C4.98265 13 4.62664 13 4.33059 12.9755C4.01344 12.9491 3.67665 12.8895 3.34757 12.7185C2.89096 12.4813 2.51866 12.109 2.28147 11.6524C2.11052 11.3234 2.05088 10.9866 2.02454 10.6694C1.99996 10.3734 1.99998 10.0173 2 9.62171L2 5.415C2 5.40273 2 5.3905 2 5.3783C1.99998 4.98266 1.99996 4.62664 2.02454 4.33059C2.05088 4.01343 2.11052 3.67665 2.28147 3.34757C2.51866 2.89096 2.89096 2.51866 3.34757 2.28147C3.67665 2.11052 4.01343 2.05088 4.33059 2.02454C4.62664 1.99996 4.98266 1.99998 5.3783 2ZM4.27752 4.05297C4.27226 4.05488 4.27001 4.05604 4.26952 4.0563C4.17819 4.10373 4.10373 4.17819 4.0563 4.26952C4.05604 4.27001 4.05488 4.27226 4.05297 4.27752C4.05098 4.28299 4.04767 4.29312 4.04372 4.30961C4.03541 4.34427 4.02554 4.40145 4.01768 4.49611C4.00081 4.69932 4 4.9711 4 5.415V9.585C4 10.0289 4.00081 10.3007 4.01768 10.5039C4.02554 10.5986 4.03541 10.6557 4.04372 10.6904C4.04767 10.7069 4.05098 10.717 4.05297 10.7225C4.05488 10.7277 4.05604 10.73 4.0563 10.7305C4.10373 10.8218 4.17819 10.8963 4.26952 10.9437C4.27001 10.944 4.27226 10.9451 4.27752 10.947C4.28299 10.949 4.29312 10.9523 4.30961 10.9563C4.34427 10.9646 4.40145 10.9745 4.49611 10.9823C4.69932 10.9992 4.9711 11 5.415 11H7.585C8.02891 11 8.30068 10.9992 8.5039 10.9823C8.59855 10.9745 8.65574 10.9646 8.6904 10.9563C8.70688 10.9523 8.71701 10.949 8.72249 10.947C8.72775 10.9451 8.72999 10.944 8.73049 10.9437C8.82181 10.8963 8.89627 10.8218 8.94371 10.7305C8.94397 10.73 8.94513 10.7277 8.94704 10.7225C8.94903 10.717 8.95234 10.7069 8.95629 10.6904C8.96459 10.6557 8.97446 10.5986 8.98232 10.5039C8.9992 10.3007 9 10.0289 9 9.585V5.415C9 4.9711 8.9992 4.69932 8.98232 4.49611C8.97446 4.40145 8.96459 4.34427 8.95629 4.30961C8.95234 4.29312 8.94903 4.28299 8.94704 4.27752C8.94513 4.27226 8.94397 4.27001 8.94371 4.26952C8.89627 4.17819 8.82181 4.10373 8.73049 4.0563C8.72999 4.05604 8.72775 4.05488 8.72249 4.05297C8.71701 4.05098 8.70688 4.04767 8.6904 4.04372C8.65574 4.03541 8.59855 4.02554 8.5039 4.01768C8.30068 4.00081 8.02891 4 7.585 4H5.415C4.9711 4 4.69932 4.00081 4.49611 4.01768C4.40145 4.02554 4.34427 4.03541 4.30961 4.04372C4.29312 4.04767 4.28299 4.05098 4.27752 4.05297ZM16.3783 2H18.6217C19.0173 1.99998 19.3734 1.99996 19.6694 2.02454C19.9866 2.05088 20.3234 2.11052 20.6524 2.28147C21.109 2.51866 21.4813 2.89096 21.7185 3.34757C21.8895 3.67665 21.9491 4.01343 21.9755 4.33059C22 4.62665 22 4.98267 22 5.37832V5.62168C22 6.01733 22 6.37336 21.9755 6.66942C21.9491 6.98657 21.8895 7.32336 21.7185 7.65244C21.4813 8.10905 21.109 8.48135 20.6524 8.71854C20.3234 8.88948 19.9866 8.94912 19.6694 8.97546C19.3734 9.00005 19.0173 9.00003 18.6217 9H16.3783C15.9827 9.00003 15.6266 9.00005 15.3306 8.97546C15.0134 8.94912 14.6766 8.88948 14.3476 8.71854C13.891 8.48135 13.5187 8.10905 13.2815 7.65244C13.1105 7.32336 13.0509 6.98657 13.0245 6.66942C13 6.37337 13 6.01735 13 5.62172V5.37828C13 4.98265 13 4.62664 13.0245 4.33059C13.0509 4.01344 13.1105 3.67665 13.2815 3.34757C13.5187 2.89096 13.891 2.51866 14.3476 2.28147C14.6766 2.11052 15.0134 2.05088 15.3306 2.02454C15.6266 1.99996 15.9827 1.99998 16.3783 2ZM15.2775 4.05297C15.2723 4.05488 15.27 4.05604 15.2695 4.0563C15.1782 4.10373 15.1037 4.17819 15.0563 4.26952C15.056 4.27001 15.0549 4.27226 15.053 4.27752C15.051 4.28299 15.0477 4.29312 15.0437 4.30961C15.0354 4.34427 15.0255 4.40145 15.0177 4.49611C15.0008 4.69932 15 4.9711 15 5.415V5.585C15 6.02891 15.0008 6.30068 15.0177 6.5039C15.0255 6.59855 15.0354 6.65574 15.0437 6.6904C15.0477 6.70688 15.051 6.71701 15.053 6.72249C15.0549 6.72775 15.056 6.72999 15.0563 6.73049C15.1037 6.82181 15.1782 6.89627 15.2695 6.94371C15.27 6.94397 15.2723 6.94512 15.2775 6.94704C15.283 6.94903 15.2931 6.95234 15.3096 6.95629C15.3443 6.96459 15.4015 6.97446 15.4961 6.98232C15.6993 6.9992 15.9711 7 16.415 7H18.585C19.0289 7 19.3007 6.9992 19.5039 6.98232C19.5986 6.97446 19.6557 6.96459 19.6904 6.95629C19.7069 6.95234 19.717 6.94903 19.7225 6.94704C19.7277 6.94512 19.73 6.94397 19.7305 6.94371C19.8218 6.89627 19.8963 6.82181 19.9437 6.73049C19.944 6.72999 19.9451 6.72775 19.947 6.72249C19.949 6.71701 19.9523 6.70688 19.9563 6.6904C19.9646 6.65573 19.9745 6.59855 19.9823 6.5039C19.9992 6.30068 20 6.02891 20 5.585V5.415C20 4.9711 19.9992 4.69932 19.9823 4.49611C19.9745 4.40145 19.9646 4.34427 19.9563 4.30961C19.9523 4.29312 19.949 4.28299 19.947 4.27752C19.9451 4.27226 19.944 4.27001 19.9437 4.26952C19.8963 4.17819 19.8218 4.10373 19.7305 4.0563C19.73 4.05604 19.7277 4.05488 19.7225 4.05297C19.717 4.05098 19.7069 4.04767 19.6904 4.04372C19.6557 4.03541 19.5986 4.02554 19.5039 4.01768C19.3007 4.00081 19.0289 4 18.585 4H16.415C15.9711 4 15.6993 4.00081 15.4961 4.01768C15.4015 4.02554 15.3443 4.03541 15.3096 4.04372C15.2931 4.04767 15.283 4.05098 15.2775 4.05297ZM16.3783 11H18.6217C19.0173 11 19.3734 11 19.6694 11.0245C19.9866 11.0509 20.3234 11.1105 20.6524 11.2815C21.109 11.5187 21.4813 11.891 21.7185 12.3476C21.8895 12.6766 21.9491 13.0134 21.9755 13.3306C22 13.6266 22 13.9827 22 14.3783V18.6217C22 19.0173 22 19.3734 21.9755 19.6694C21.9491 19.9866 21.8895 20.3234 21.7185 20.6524C21.4813 21.109 21.109 21.4813 20.6524 21.7185C20.3234 21.8895 19.9866 21.9491 19.6694 21.9755C19.3734 22 19.0173 22 18.6217 22H16.3783C15.9827 22 15.6266 22 15.3306 21.9755C15.0134 21.9491 14.6766 21.8895 14.3476 21.7185C13.891 21.4813 13.5187 21.109 13.2815 20.6524C13.1105 20.3234 13.0509 19.9866 13.0245 19.6694C13 19.3734 13 19.0174 13 18.6217V14.3783C13 13.9827 13 13.6266 13.0245 13.3306C13.0509 13.0134 13.1105 12.6766 13.2815 12.3476C13.5187 11.891 13.891 11.5187 14.3476 11.2815C14.6766 11.1105 15.0134 11.0509 15.3306 11.0245C15.6266 11 15.9827 11 16.3783 11ZM15.2775 13.053C15.2723 13.0549 15.27 13.056 15.2695 13.0563C15.1782 13.1037 15.1037 13.1782 15.0563 13.2695C15.056 13.27 15.0549 13.2723 15.053 13.2775C15.051 13.283 15.0477 13.2931 15.0437 13.3096C15.0354 13.3443 15.0255 13.4015 15.0177 13.4961C15.0008 13.6993 15 13.9711 15 14.415V18.585C15 19.0289 15.0008 19.3007 15.0177 19.5039C15.0255 19.5986 15.0354 19.6557 15.0437 19.6904C15.0477 19.7069 15.051 19.717 15.053 19.7225C15.0549 19.7277 15.056 19.73 15.0563 19.7305C15.1037 19.8218 15.1782 19.8963 15.2695 19.9437C15.27 19.944 15.2723 19.9451 15.2775 19.947C15.283 19.949 15.2931 19.9523 15.3096 19.9563C15.3443 19.9646 15.4015 19.9745 15.4961 19.9823C15.6993 19.9992 15.9711 20 16.415 20H18.585C19.0289 20 19.3007 19.9992 19.5039 19.9823C19.5986 19.9745 19.6557 19.9646 19.6904 19.9563C19.7069 19.9523 19.717 19.949 19.7225 19.947C19.7277 19.9451 19.73 19.944 19.7305 19.9437C19.8218 19.8963 19.8963 19.8218 19.9437 19.7305C19.944 19.73 19.9451 19.7277 19.947 19.7225C19.949 19.717 19.9523 19.7069 19.9563 19.6904C19.9646 19.6557 19.9745 19.5986 19.9823 19.5039C19.9992 19.3007 20 19.0289 20 18.585V14.415C20 13.9711 19.9992 13.6993 19.9823 13.4961C19.9745 13.4015 19.9646 13.3443 19.9563 13.3096C19.9523 13.2931 19.949 13.283 19.947 13.2775C19.9451 13.2723 19.944 13.27 19.9437 13.2695C19.8963 13.1782 19.8218 13.1037 19.7305 13.0563C19.73 13.056 19.7277 13.0549 19.7225 13.053C19.717 13.051 19.7069 13.0477 19.6904 13.0437C19.6557 13.0354 19.5986 13.0255 19.5039 13.0177C19.3007 13.0008 19.0289 13 18.585 13H16.415C15.9711 13 15.6993 13.0008 15.4961 13.0177C15.4015 13.0255 15.3443 13.0354 15.3096 13.0437C15.2931 13.0477 15.283 13.051 15.2775 13.053ZM5.37828 15H7.62172C8.01735 15 8.37337 15 8.66942 15.0245C8.98657 15.0509 9.32336 15.1105 9.65244 15.2815C10.109 15.5187 10.4813 15.891 10.7185 16.3476C10.8895 16.6766 10.9491 17.0134 10.9755 17.3306C11 17.6266 11 17.9827 11 18.3783V18.6217C11 19.0174 11 19.3734 10.9755 19.6694C10.9491 19.9866 10.8895 20.3234 10.7185 20.6524C10.4813 21.109 10.109 21.4813 9.65244 21.7185C9.32336 21.8895 8.98657 21.9491 8.66942 21.9755C8.37336 22 8.01733 22 7.62168 22H5.37832C4.98267 22 4.62665 22 4.33059 21.9755C4.01343 21.9491 3.67665 21.8895 3.34757 21.7185C2.89096 21.4813 2.51866 21.109 2.28147 20.6524C2.11052 20.3234 2.05088 19.9866 2.02454 19.6694C1.99996 19.3734 1.99998 19.0173 2 18.6217V18.3783C1.99998 17.9827 1.99996 17.6266 2.02454 17.3306C2.05088 17.0134 2.11052 16.6766 2.28147 16.3476C2.51866 15.891 2.89096 15.5187 3.34757 15.2815C3.67665 15.1105 4.01344 15.0509 4.33059 15.0245C4.62664 15 4.98265 15 5.37828 15ZM4.27752 17.053C4.27226 17.0549 4.27001 17.056 4.26952 17.0563C4.17819 17.1037 4.10373 17.1782 4.0563 17.2695C4.05604 17.27 4.05488 17.2723 4.05297 17.2775C4.05098 17.283 4.04767 17.2931 4.04372 17.3096C4.03541 17.3443 4.02554 17.4015 4.01768 17.4961C4.00081 17.6993 4 17.9711 4 18.415V18.585C4 19.0289 4.00081 19.3007 4.01768 19.5039C4.02554 19.5986 4.03541 19.6557 4.04372 19.6904C4.04767 19.7069 4.05098 19.717 4.05297 19.7225C4.05488 19.7277 4.05604 19.73 4.0563 19.7305C4.10373 19.8218 4.17819 19.8963 4.26952 19.9437C4.27001 19.944 4.27226 19.9451 4.27752 19.947C4.28299 19.949 4.29312 19.9523 4.30961 19.9563C4.34427 19.9646 4.40145 19.9745 4.49611 19.9823C4.69932 19.9992 4.9711 20 5.415 20H7.585C8.02891 20 8.30068 19.9992 8.5039 19.9823C8.59855 19.9745 8.65573 19.9646 8.6904 19.9563C8.70688 19.9523 8.71701 19.949 8.72249 19.947C8.72775 19.9451 8.72999 19.944 8.73049 19.9437C8.82181 19.8963 8.89627 19.8218 8.94371 19.7305C8.94397 19.73 8.94513 19.7277 8.94704 19.7225C8.94903 19.717 8.95234 19.7069 8.95629 19.6904C8.96459 19.6557 8.97446 19.5986 8.98232 19.5039C8.9992 19.3007 9 19.0289 9 18.585V18.415C9 17.9711 8.9992 17.6993 8.98232 17.4961C8.97446 17.4015 8.96459 17.3443 8.95629 17.3096C8.95234 17.2931 8.94903 17.283 8.94704 17.2775C8.94513 17.2723 8.94397 17.27 8.94371 17.2695C8.89627 17.1782 8.82181 17.1037 8.73049 17.0563C8.72999 17.056 8.72775 17.0549 8.72249 17.053C8.71701 17.051 8.70688 17.0477 8.6904 17.0437C8.65574 17.0354 8.59855 17.0255 8.5039 17.0177C8.30068 17.0008 8.02891 17 7.585 17H5.415C4.9711 17 4.69932 17.0008 4.49611 17.0177C4.40145 17.0255 4.34427 17.0354 4.30961 17.0437C4.29312 17.0477 4.28299 17.051 4.27752 17.053Z" fill="currentColor"></path> </g></svg> Dashboard
            </a>
        <?php } ?>
    </div>
    <a id="installButton" href="#" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium flex items-center justify-center gap-2" style="display: none;">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.5535 16.5061C12.4114 16.6615 12.2106 16.75 12 16.75C11.7894 16.75 11.5886 16.6615 11.4465 16.5061L7.44648 12.1311C7.16698 11.8254 7.18822 11.351 7.49392 11.0715C7.79963 10.792 8.27402 10.8132 8.55352 11.1189L11.25 14.0682V3C11.25 2.58579 11.5858 2.25 12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V14.0682L15.4465 11.1189C15.726 10.8132 16.2004 10.792 16.5061 11.0715C16.8118 11.351 16.833 11.8254 16.5535 12.1311L12.5535 16.5061Z" fill="currentColor"></path> <path d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z" fill="currentColor"></path> </g></svg> 
  </svg>
  Install App
</a>
<a id="openAppButton" href="<?php echo base_url('/'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium flex items-center justify-center gap-2" style="display: none;"">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.94358 2.25H14.0564C15.8942 2.24998 17.3498 2.24997 18.489 2.40314C19.6614 2.56076 20.6104 2.89288 21.3588 3.64124C22.1071 4.38961 22.4392 5.33856 22.5969 6.51098C22.75 7.65019 22.75 9.10583 22.75 10.9436V11C22.75 11.4142 22.4142 11.75 22 11.75C21.5858 11.75 21.25 11.4142 21.25 11C21.25 9.09318 21.2484 7.73851 21.1102 6.71085C20.975 5.70476 20.7213 5.12511 20.2981 4.7019C19.8749 4.27869 19.2952 4.02502 18.2892 3.88976C17.2615 3.75159 15.9068 3.75 14 3.75H10C8.09318 3.75 6.73851 3.75159 5.71085 3.88976C4.70476 4.02502 4.12511 4.27869 3.7019 4.7019C3.27869 5.12511 3.02502 5.70476 2.88976 6.71085C2.75159 7.73851 2.75 9.09318 2.75 11V13C2.75 14.9068 2.75159 16.2615 2.88976 17.2892C3.02502 18.2952 3.27869 18.8749 3.7019 19.2981C4.12511 19.7213 4.70476 19.975 5.71085 20.1102C6.73851 20.2484 8.09318 20.25 10 20.25H11C11.4142 20.25 11.75 20.5858 11.75 21C11.75 21.4142 11.4142 21.75 11 21.75H9.94359C8.10583 21.75 6.65019 21.75 5.51098 21.5969C4.33856 21.4392 3.38961 21.1071 2.64124 20.3588C1.89288 19.6104 1.56076 18.6614 1.40314 17.489C1.24997 16.3498 1.24998 14.8942 1.25 13.0564V10.9436C1.24998 9.10582 1.24997 7.65019 1.40314 6.51098C1.56076 5.33856 1.89288 4.38961 2.64124 3.64124C3.38961 2.89288 4.33856 2.56076 5.51098 2.40314C6.65019 2.24997 8.10582 2.24998 9.94358 2.25ZM6.75 7.5C6.75 7.08579 7.08579 6.75 7.5 6.75H10.5C10.9142 6.75 11.25 7.08579 11.25 7.5C11.25 7.91421 10.9142 8.25 10.5 8.25H9.31066L12.0303 10.9697C12.3232 11.2626 12.3232 11.7374 12.0303 12.0303C11.7374 12.3232 11.2626 12.3232 10.9697 12.0303L8.25 9.31066V10.5C8.25 10.9142 7.91421 11.25 7.5 11.25C7.08579 11.25 6.75 10.9142 6.75 10.5V7.5ZM16.948 12.25H18.052C18.9505 12.25 19.6997 12.2499 20.2945 12.3299C20.9223 12.4143 21.4891 12.6 21.9445 13.0555C22.4 13.5109 22.5857 14.0777 22.6701 14.7055C22.7501 15.3003 22.75 16.0495 22.75 16.948V17.052C22.75 17.9505 22.7501 18.6997 22.6701 19.2945C22.5857 19.9223 22.4 20.4891 21.9445 20.9445C21.4891 21.4 20.9223 21.5857 20.2945 21.6701C19.6997 21.7501 18.9505 21.75 18.052 21.75H16.948C16.0495 21.75 15.3003 21.7501 14.7055 21.6701C14.0777 21.5857 13.5109 21.4 13.0555 20.9445C12.6 20.4891 12.4143 19.9223 12.3299 19.2945C12.2499 18.6997 12.25 17.9505 12.25 17.052V16.948C12.25 16.0495 12.2499 15.3003 12.3299 14.7055C12.4143 14.0777 12.6 13.5109 13.0555 13.0555C13.5109 12.6 14.0777 12.4143 14.7055 12.3299C15.3003 12.2499 16.0495 12.25 16.948 12.25ZM14.9054 13.8165C14.4439 13.8786 14.2464 13.9858 14.1161 14.1161C13.9858 14.2464 13.8786 14.4439 13.8165 14.9054C13.7516 15.3884 13.75 16.036 13.75 17C13.75 17.964 13.7516 18.6116 13.8165 19.0946C13.8786 19.5561 13.9858 19.7536 14.1161 19.8839C14.2464 20.0142 14.4439 20.1214 14.9054 20.1835C15.3884 20.2484 16.036 20.25 17 20.25H18C18.964 20.25 19.6116 20.2484 20.0946 20.1835C20.5561 20.1214 20.7536 20.0142 20.8839 19.8839C21.0142 19.7536 21.1214 19.5561 21.1835 19.0946C21.2484 18.6116 21.25 17.964 21.25 17C21.25 16.036 21.2484 15.3884 21.1835 14.9054C21.1214 14.4439 21.0142 14.2464 20.8839 14.1161C20.7536 13.9858 20.5561 13.8786 20.0946 13.8165C19.6116 13.7516 18.964 13.75 18 13.75H17C16.036 13.75 15.3884 13.7516 14.9054 13.8165Z" fill="currentColor"></path> </g></svg>
    Open in App</a>

    <a href="<?php echo base_url('admission'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 3C5.89543 3 5 3.89543 5 5V17.2C5 18.0566 5.00078 18.6389 5.03755 19.089C5.07337 19.5274 5.1383 19.7516 5.21799 19.908C5.40973 20.2843 5.7157 20.5903 6.09202 20.782C6.24842 20.8617 6.47262 20.9266 6.91104 20.9624C7.36113 20.9992 7.94342 21 8.8 21H15.2C16.0566 21 16.6389 20.9992 17.089 20.9624C17.5274 20.9266 17.7516 20.8617 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C18.8617 19.7516 18.9266 19.5274 18.9624 19.089C18.9992 18.6389 19 18.0566 19 17.2V13C19 10.7909 17.2091 9 15 9H14.25C12.4551 9 11 7.54493 11 5.75C11 4.23122 9.76878 3 8.25 3H7ZM10 1C16.0751 1 21 5.92487 21 12V17.2413C21 18.0463 21 18.7106 20.9558 19.2518C20.9099 19.8139 20.8113 20.3306 20.564 20.816C20.1805 21.5686 19.5686 22.1805 18.816 22.564C18.3306 22.8113 17.8139 22.9099 17.2518 22.9558C16.7106 23 16.0463 23 15.2413 23H8.75868C7.95372 23 7.28936 23 6.74817 22.9558C6.18608 22.9099 5.66937 22.8113 5.18404 22.564C4.43139 22.1805 3.81947 21.5686 3.43597 20.816C3.18868 20.3306 3.09012 19.8139 3.04419 19.2518C2.99998 18.7106 2.99999 18.0463 3 17.2413L3 5C3 2.79086 4.79086 1 7 1H10ZM17.9474 7.77263C16.7867 5.59506 14.7572 3.95074 12.3216 3.30229C12.7523 4.01713 13 4.85463 13 5.75C13 6.44036 13.5596 7 14.25 7H15C16.0712 7 17.0769 7.28073 17.9474 7.77263Z" fill="currentColor"></path> </g></svg> Admission
    </a>
    <a href="<?php echo base_url('exam_results'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium">
    <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>certificate-check</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> <path d="M20.6,23.4l-4-3.9a2.1,2.1,0,0,1-.2-2.7,1.9,1.9,0,0,1,3-.2L22,19.2l6.6-6.6a2,2,0,0,1,2.8,2.8l-8,8A1.9,1.9,0,0,1,20.6,23.4Z"></path> <path d="M40,18A16,16,0,1,0,15,31.2V43.9A2.1,2.1,0,0,0,17,46a1.5,1.5,0,0,0,1.1-.4L24,41l5.9,4.6A1.5,1.5,0,0,0,31,46a2.1,2.1,0,0,0,2-2.1V31.2A16,16,0,0,0,40,18ZM12,18A12,12,0,1,1,24,30,12,12,0,0,1,12,18ZM29,39.8l-4.4-3.4a.9.9,0,0,0-1.2,0L19,39.8V33.2a16.9,16.9,0,0,0,5,.8,16.9,16.9,0,0,0,5-.8Z"></path> </g> </g> </g></svg> Exam Results
        </a>

<!-- iOS Installation Guide (hidden by default) -->
<div id="iosGuide" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background: white; border: 1px solid #ccc; border-radius: 8px; padding: 10px 15px; font-size: 14px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 1000;">
    <p style="margin: 0;">📌 To install this app:</p>
    <p style="margin: 5px 0;">1. Tap the <b>Share</b> button <img src="https://cdn-icons-png.flaticon.com/512/565/565626.png" width="16px" style="vertical-align: middle;"> in Safari.</p>
    <p style="margin: 5px 0;">2. Select <b>Add to Home Screen</b>.</p>
    <button onclick="document.getElementById('iosGuide').style.display='none';" style="margin-top: 5px; background: #007aff; color: white; border: none; padding: 5px 10px; border-radius: 5px;">Got it!</button>
</div>
</div>
        </div>
    </main>
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
document.addEventListener('DOMContentLoaded', () => {
    const installButton = document.getElementById('installButton');
    const openAppButton = document.getElementById('openAppButton');
    
    // Check if running as standalone PWA
    const isRunningAsStandalone = window.matchMedia('(display-mode: standalone)').matches || 
                                 window.navigator.standalone || 
                                 document.referrer.includes('android-app://');
    
    if (isRunningAsStandalone) {
        // Hide both buttons when running as PWA
        if (installButton) installButton.style.display = 'none';
        if (openAppButton) openAppButton.style.display = 'none';
        console.log('Running as PWA - hiding all buttons');
        return;
    }
    
    // Only show install button if not running as PWA and install prompt is available
    if (installButton && deferredPrompt) {
        installButton.style.display = 'flex'; // Use flex instead of block to maintain your centering
        
        installButton.addEventListener('click', () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('PWA installed');
                        installButton.style.display = 'none';
                        const openAppButton = document.getElementById('openAppButton');
                        if (openAppButton) {
                            openAppButton.style.display = 'inline-flex';
                        }
                    }
                    deferredPrompt = null;
                });
            }
        });
    }
    
    if (isPWAInstalled()) {
        // PWA is installed but we're in browser - show Open App button
        if (openAppButton) openAppButton.style.display = 'inline-flex';
        if (installButton) installButton.style.display = 'none';
        console.log('PWA installed, showing Open App button');
    } else {
        // Handle iOS separately
        if (!('beforeinstallprompt' in window) && /iPhone|iPad|iPod/.test(navigator.userAgent)) {
            if (installButton) {
                installButton.style.display = 'inline-flex';
                installButton.innerText = "Add to Home Screen";
                installButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    const iosGuide = document.getElementById('iosGuide');
                    if (iosGuide) iosGuide.style.display = 'block';
                });
            }
            if (openAppButton) openAppButton.style.display = 'none';
            console.log('iOS device detected, showing custom instructions');
        } else {
            // For other browsers, wait for install prompt
            if (installButton) installButton.style.display = 'none';
            if (openAppButton) openAppButton.style.display = 'none';
            console.log('Waiting for beforeinstallprompt event');
        }
    }
});

// Store the install prompt for later use
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (event) => {
    console.log('beforeinstallprompt event fired');
    event.preventDefault();
    deferredPrompt = event;
    
    const installButton = document.getElementById('installButton');
    if (installButton) {
        installButton.style.display = 'inline-flex';
    }
});

// Handle the install button click
document.addEventListener('DOMContentLoaded', () => {
    const installButton = document.getElementById('installButton');
    if (installButton) {
        installButton.addEventListener('click', () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('PWA installed');
                        installButton.style.display = 'none';
                        const openAppButton = document.getElementById('openAppButton');
                        if (openAppButton) {
                            openAppButton.style.display = 'inline-flex';
                        }
                    }
                    deferredPrompt = null;
                });
            }
        });
    }
});

// Function to detect if currently running as PWA
function isRunningAsPWA() {
    return window.matchMedia('(display-mode: standalone)').matches || 
           window.matchMedia('(display-mode: fullscreen)').matches || 
           window.navigator.standalone === true;
}

// Function to detect if PWA is installed but we're in browser
function isPWAInstalled() {
    // We can use localStorage to track installation
    if (localStorage.getItem('pwaInstalled') === 'true') {
        return true;
    }
    
    // Try to detect via service worker
    if ('serviceWorker' in navigator && navigator.serviceWorker.controller) {
        // If service worker is active, it's a good sign the PWA might be installed
        return true;
    }
    
    return false;
}

// Set flag when PWA gets installed
document.addEventListener('DOMContentLoaded', () => {
    const installButton = document.getElementById('installButton');
    if (installButton) {
        installButton.addEventListener('click', () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        // Mark as installed in localStorage
                        localStorage.setItem('pwaInstalled', 'true');
                        console.log('PWA installed, set flag in localStorage');
                        
                        installButton.style.display = 'none';
                        const openAppButton = document.getElementById('openAppButton');
                        if (openAppButton) {
                            openAppButton.style.display = 'inline-flex';
                        }
                    }
                    deferredPrompt = null;
                });
            }
        });
    }
    
    // Handle open app button
    const openAppButton = document.getElementById('openAppButton');
    if (openAppButton) {
        openAppButton.addEventListener('click', () => {
            // Get the manifest URL from the link tag
            const manifestLink = document.querySelector('link[rel="manifest"]');
            if (manifestLink) {
                fetch(manifestLink.href)
                    .then(response => response.json())
                    .then(manifest => {
                        // Use the start_url from the manifest if available
                        if (manifest && manifest.start_url) {
                            window.open(manifest.start_url, '_blank');
                        } else {
                            // Fallback to opening the site with a special query parameter
                            window.open(window.location.origin + '?openFromBrowser=true', '_blank');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching manifest:', error);
                        // Fallback if manifest can't be fetched
                        window.open(window.location.origin + '?openFromBrowser=true', '_blank');
                    });
            } else {
                // No manifest found, just open the site
                window.open(window.location.origin + '?openFromBrowser=true', '_blank');
            }
        });
    }
});
</script>
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
