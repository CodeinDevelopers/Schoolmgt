<!doctype html>
<html class="fixed sidebar-left-sm <?php echo ($theme_config['dark_skin'] == 'true' ? 'dark' : 'sidebar-light');?>">
<!-- html header -->
<?php $this->load->view('layout/header.php');?>
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
					<a class="page-title-icon" href="<?php echo base_url('dashboard');?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 12L10 12M10 12L13 15M10 12L13 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 16L7 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg></a>
					<h2><?php echo $title;?></h2>
				</header>
				<?php $this->load->view($sub_page); ?>
			</section>
		</div>
	</section>

	<!-- JS Script -->
	<?php $this->load->view('layout/script.php');?>
	
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
				timer: 8000
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
   
</body>
</html>