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
					<a class="page-title-icon" href="<?php echo base_url('dashboard');?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9.25871 7.97395C9.56308 7.693 9.58205 7.21851 9.3011 6.91414C9.02015 6.60978 8.54565 6.5908 8.24129 6.87175L5.99129 8.94867C5.83748 9.09065 5.75 9.29045 5.75 9.49977C5.75 9.7091 5.83748 9.9089 5.99129 10.0509L8.24129 12.1278C8.54565 12.4088 9.02015 12.3898 9.3011 12.0854C9.58205 11.781 9.56308 11.3065 9.25871 11.0256L8.41824 10.2498H14.0385C15.536 10.2498 16.75 11.4638 16.75 12.9613C16.75 14.4589 15.536 15.6729 14.0385 15.6729H9.5C9.08579 15.6729 8.75 16.0086 8.75 16.4229C8.75 16.8371 9.08579 17.1729 9.5 17.1729H14.0385C16.3644 17.1729 18.25 15.2873 18.25 12.9613C18.25 10.6353 16.3644 8.74977 14.0385 8.74977H8.41824L9.25871 7.97395Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9426 1.25C9.63423 1.24999 7.82519 1.24998 6.4137 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63423 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.4137 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25H11.9426ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62177 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62178 21.25 12C21.25 14.3782 21.2484 16.0864 21.0736 17.3864C20.9018 18.6648 20.5749 19.4355 20.0052 20.0052C19.4355 20.5749 18.6648 20.9018 17.3864 21.0736C16.0864 21.2484 14.3782 21.25 12 21.25C9.62177 21.25 7.91356 21.2484 6.61358 21.0736C5.33517 20.9018 4.56445 20.5749 3.9948 20.0052C3.42514 19.4355 3.09825 18.6648 2.92637 17.3864C2.75159 16.0864 2.75 14.3782 2.75 12C2.75 9.62178 2.75159 7.91356 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z" fill="currentColor"></path> </g></svg></a>
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