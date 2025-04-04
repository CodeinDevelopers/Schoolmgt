<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keyword" content="<?php echo $page_data['meta_keyword']; ?>">
		<meta name="description" content="<?php echo $page_data['meta_description']; ?>">
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('uploads/frontend/images/' . $cms_setting['fav_icon']); ?>">
		<title><?php echo $page_data['page_title'] . " - " . $cms_setting['application_title']; ?></title>
		<!-- Bootstrap -->
		<link href="<?php echo base_url() ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">

		<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<!-- Template CSS Files  -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/all.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/animate.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/responsive.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2/css/select2.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/magnific-popup/magnific-popup.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
		<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
		<!-- If user have enabled CSRF proctection this function will take care of the ajax requests and append custom header for CSRF -->
		<script type="text/javascript">
			var base_url = "<?php echo base_url(); ?>";
			var csrfData = <?php echo json_encode(csrf_jquery_token()); ?>;
			$(function($) {
				$.ajaxSetup({
					data: csrfData
				});
			});
		</script>
		<!-- Google Analytics --> 
		<?php echo $cms_setting['google_analytics']; ?>

	
<!-- Web Application Manifest -->
<link rel="manifest" href="<?php echo base_url('manifest.json'); ?>">
<script type="text/javascript">
  if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('<?php echo base_url('serviceworker.js'); ?>')
      .then(registration => {
        console.log('Service Worker registered with scope:', registration.scope);
      })
      .catch(error => {
        console.log('Service Worker registration failed:', error);
      });
  });
}
</script>
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="#ffffff">

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


		<!-- Theme Color Options -->
<script type="text/javascript">
document.documentElement.style.setProperty('--thm-primary', '<?php echo $cms_setting["primary_color"] ?>');
			document.documentElement.style.setProperty('--thm-hover', '<?php echo $cms_setting["hover_color"] ?>');
			document.documentElement.style.setProperty('--thm-text', '<?php echo $cms_setting["text_color"] ?>');
			document.documentElement.style.setProperty('--thm-secondary-text', '<?php echo $cms_setting["text_secondary_color"] ?>');
			document.documentElement.style.setProperty('--thm-footer-text', '<?php echo $cms_setting["footer_text_color"] ?>');
			document.documentElement.style.setProperty('--thm-radius', '<?php echo $cms_setting["border_radius"] ?>');
		</script>		
	</head>
	<body>
		<!-- Preloader -->
		<div class="loader-container">
			<div class="lds-dual-ring"></div>
		</div>
		<?php $this->load->view('home/layout/header'); ?>
		<?php echo $main_contents; ?>
		<?php $this->load->view('home/layout/footer'); ?>
	</body>
</html>