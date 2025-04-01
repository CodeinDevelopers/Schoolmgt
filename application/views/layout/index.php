<!doctype html>
<html class="fixed sidebar-left-sm <?php echo ($theme_config['dark_skin'] == 'true' ? 'dark' : 'sidebar-light');?>">
<!-- html header -->
<?php $this->load->view('layout/header.php');?>
</style>
<!-- <body class="loading-overlay-showing" data-loading-overlay> -->
<?php if ($global_config['preloader_backend'] == 1) { ?>
<body class="loading-overlay-showing" data-loading-overlay>
	<!-- page preloader -->
	<div class="loading-overlay dark">
		<div class="ring-loader">
			Loading <span></span>
		</div>
	</div>
<?php } else { ?>

    <!-- Web Application Manifest -->
<link rel="manifest" href="<?php echo base_url('manifest.json')?>">


<meta name="theme-color" content="#ffffff">
<script type="text/javascript">
    // Get the base URL from PHP
    var serviceWorkerUrl = "<?php echo base_url('serviceworker.js'); ?>";

    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register(serviceWorkerUrl, {
            scope: '/'
        }).then(function (registration) {
            // Registration was successful
            console.log('Service Worker registration successful with scope: ', registration.scope);
        }).catch(function (err) {
            // Registration failed
            console.log('Service Worker registration failed: ', err);
        });
    }
</script>
<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Acamedium">
<link rel="icon" sizes="512x512" href="<?php echo base_url('uploads/appIcons/icon-512x512.png')?>">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Acamedium">
<link rel="apple-touch-icon" href="<?php echo base_url('uploads/appIcons/icon-512x512.png')?>">

<!-- Add additional iOS icons for better experience -->
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('uploads/appIcons/icon-72x72.png')?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('uploads/appIcons/icon-144x144.png')?>">
<link rel="apple-touch-icon" sizes="192x192" href="<?php echo base_url('uploads/appIcons/icon-192x192.png')?>">

<body>
<?php } ?>
	<section class="body">
		<!-- top navbar-->
		<?php $this->load->view('layout/topbar.php');?>
		<div class="inner-wrapper">
			<!-- sidebar -->
			<?php 
			if (is_student_loggedin() || is_parent_loggedin()) {
				$this->load->view('userrole/sidebar'); 
			} else {
				$this->load->view('layout/sidebar'); 
			} 
			?>
			<!-- page main content -->
			<section role="main" class="content-body">
				<header class="page-header">
                <a class="page-title-icon cdev-action-btn" href="<?php echo base_url('dashboard')?>">
    <?php if(current_url() == base_url('dashboard')): ?>
        <!-- Refresh SVG goes here -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2.93077 11.2003C3.00244 6.23968 7.07619 2.25 12.0789 2.25C15.3873 2.25 18.287 3.99427 19.8934 6.60721C20.1103 6.96007 20.0001 7.42199 19.6473 7.63892C19.2944 7.85585 18.8325 7.74565 18.6156 7.39279C17.2727 5.20845 14.8484 3.75 12.0789 3.75C7.8945 3.75 4.50372 7.0777 4.431 11.1982L4.83138 10.8009C5.12542 10.5092 5.60029 10.511 5.89203 10.8051C6.18377 11.0991 6.18191 11.574 5.88787 11.8657L4.20805 13.5324C3.91565 13.8225 3.44398 13.8225 3.15157 13.5324L1.47176 11.8657C1.17772 11.574 1.17585 11.0991 1.46759 10.8051C1.75933 10.5111 2.2342 10.5092 2.52824 10.8009L2.93077 11.2003ZM19.7864 10.4666C20.0786 10.1778 20.5487 10.1778 20.8409 10.4666L22.5271 12.1333C22.8217 12.4244 22.8245 12.8993 22.5333 13.1939C22.2421 13.4885 21.7673 13.4913 21.4727 13.2001L21.0628 12.7949C20.9934 17.7604 16.9017 21.75 11.8825 21.75C8.56379 21.75 5.65381 20.007 4.0412 17.3939C3.82366 17.0414 3.93307 16.5793 4.28557 16.3618C4.63806 16.1442 5.10016 16.2536 5.31769 16.6061C6.6656 18.7903 9.09999 20.25 11.8825 20.25C16.0887 20.25 19.4922 16.9171 19.5625 12.7969L19.1546 13.2001C18.86 13.4913 18.3852 13.4885 18.094 13.1939C17.8028 12.8993 17.8056 12.4244 18.1002 12.1333L19.7864 10.4666Z" fill="currentColor"></path> </g></svg>
        <span>Refresh</span>
    <?php else: ?>
        <!-- Back SVG goes here - Could be a different icon for back -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.2893 5.70708C13.8988 5.31655 13.2657 5.31655 12.8751 5.70708L7.98768 10.5993C7.20729 11.3805 7.2076 12.6463 7.98837 13.427L12.8787 18.3174C13.2693 18.7079 13.9024 18.7079 14.293 18.3174C14.6835 17.9269 14.6835 17.2937 14.293 16.9032L10.1073 12.7175C9.71678 12.327 9.71678 11.6939 10.1073 11.3033L14.2893 7.12129C14.6799 6.73077 14.6799 6.0976 14.2893 5.70708Z" fill="currentColor"></path> </g></svg>Dashboard</span>
    <?php endif; ?>
</a>
<h2><?php echo $title;?></h2>
				</header>
				<?php $this->load->view($sub_page); ?>
			</section>
		</div>
	</section>

	<!-- JS Script -->
	<?php $this->load->view('layout/script.php');?>
	<script>
document.addEventListener('DOMContentLoaded', function() {
    let deferredPrompt;
    const installContainer = document.getElementById('pwa-install-container');
    const installButton = document.getElementById('pwa-install-button');
    const iosModal = document.getElementById('ios-install-modal');
    const closeButton = document.querySelector('.close-button');
    const isMobile = () => {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    };
    if (!isMobile()) {
        return;
    }
    const isRunningStandalone = () => {
        return (window.matchMedia('(display-mode: standalone)').matches) || 
               (window.navigator.standalone) || 
               document.referrer.includes('android-app://');
    };
    const isIOS = () => {
        return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    };
    const isIOSSafari = () => {
        return isIOS() && /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent);
    };
    if (isRunningStandalone()) {
        installContainer.classList.add('hidden');
    } else {
        if (isIOSSafari()) {
            installContainer.classList.remove('hidden');
        }
    }
    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
        installContainer.classList.remove('hidden');
    });
    installButton.addEventListener('click', async () => {
        if (isIOSSafari()) {
            iosModal.classList.remove('hidden');
            return;
        }
        if (!deferredPrompt) {
            return;
        }
        
        deferredPrompt.prompt();
        const { outcome } = await deferredPrompt.userChoice;
        deferredPrompt = null;
        
        if (outcome === 'accepted') {
            installContainer.classList.add('hidden');
        }
    });
    closeButton.addEventListener('click', () => {
        iosModal.classList.add('hidden');
    });
    window.addEventListener('click', (event) => {
        if (event.target === iosModal) {
            iosModal.classList.add('hidden');
        }
    });
    window.addEventListener('appinstalled', (evt) => {
        installContainer.classList.add('hidden');
    });
    document.addEventListener('visibilitychange', () => {
        if (!document.hidden && isRunningStandalone()) {
            installContainer.classList.add('hidden');
        }
    });
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
				type: '<?php echo $alertclass?>',
				title: '<?php echo $alert_message?>',
				confirmButtonClass: 'btn btn-default',
				buttonsStyling: false,
				timer: 7000
			})
		</script>
	<?php endif; ?>

	<!-- sweetalert box -->
	<script type="text/javascript">
		function confirm_modal(delete_url) {
			swal({
				title: "<?php echo translate('are_you_sure')?>",
				text: "<?php echo translate('delete_this_information')?>",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn btn-default swal2-btn-default",
				cancelButtonClass: "btn btn-default swal2-btn-default",
				confirmButtonText: "<?php echo translate('yes_continue')?>",
				cancelButtonText: "<?php echo translate('cancel')?>",
				buttonsStyling: false,
				footer: "<?php echo translate('deleted_note')?>"
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: delete_url,
						type: "POST",
						success:function(data) {
							swal({
							title: "<?php echo translate('deleted')?>",
							text: "<?php echo translate('information_deleted')?>",
							buttonsStyling: false,
							showCloseButton: true,
							focusConfirm: false,
							confirmButtonClass: "btn btn-default swal2-btn-default",
							type: "success"
							}).then((result) => {
								if (result.value) {
									location.reload();
								}
							});
						}
					});
				}
			});
		}
	</script>
    <?php 
    $config = $this->application_model->whatsappChat();
    if (!empty($config) && $config['backend_enable_chat'] == 1) {
    ?>
    <div class="whatsapp-popup">
        <div class="whatsapp-button">
            <i class="fab fa-whatsapp i-open"></i>
            <i class="far fa-times-circle fa-fw i-close"></i>
        </div>
        <div class="popup-content">
            <div class="popup-content-header">
                <i class="fab fa-whatsapp"></i>
                <h5><?php echo $config['header_title'] ?><span><?php echo $config['subtitle'] ?></span></h5>
            </div>
            <div class="whatsapp-content">
                <ul>
                <?php $whatsappAgent = $this->application_model->whatsappAgent(); 
                    foreach ($whatsappAgent as $key => $value) {
                        $online = "offline";
                        if (strtolower($value->weekend) != strtolower(date('l'))) {
                            $now = time();
                            $starttime = strtotime($value->start_time);
                            $endtime = strtotime($value->end_time);
                            if ($now >= $starttime && $now <= $endtime) {
                                $online = "online";
                            }
                        }
                ?>
                    <li class="<?php echo $online ?>">
                        <a class="whatsapp-agent" href="javascript:void(0)" data-number="<?php echo $value->whataspp_number; ?>">
                            <div class="whatsapp-img">
                                <img src="<?php echo get_image_url('whatsapp_agent', $value->agent_image); ?>" class="whatsapp-avatar" width="60" height="60">
                            </div>
                            <div>
                                <span class="whatsapp-text">
                                    <span class="whatsapp-label"><?php echo $value->agent_designation; ?> - <span class="status"><?php echo ucfirst($online) ?></span></span> <?php echo $value->agent_name; ?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div class="content-footer">
                <p><?php echo $config['footer_text'] ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>