<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta name="keywords" content="">
	<meta name="description" content="Ramom School Management System">
	<meta name="author" content="RamomCoder">
	<title><?php echo translate('reset_password');?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
	
	<!-- Web Fonts  -->
	<link href="<?php echo is_secure('fonts.googleapis.com/css?family=Signika:300,400,600,700');?>" rel="stylesheet"> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.js');?>"></script>
	
	<!-- sweetalert js/css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css');?>">
	<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
	<!-- login page style css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/login_page/css/style.css');?>">
	<script type="text/javascript">
		var base_url = '<?php echo base_url() ?>';
	</script>
</head>
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto h-screen">
        <div class="flex h-full items-center justify-center">
            <!-- Left Section - Image and Information -->
            <div class="hidden md:block w-1/3 px-8">
                <div class="bg-white rounded-lg p-8 shadow-lg">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold mb-6"><?php echo translate('welcome_to');?></h2>
                        
                        <div class="mb-6">
                            <img src="<?php echo base_url('uploads/app_image/logo.png');?>" 
                                 class="h-16 mx-auto" 
                                 alt="School Logo">
                        </div>
                        
                        <div class="text-gray-600">
                            <p><?php echo $global_config['address'];?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Reset Form -->
            <div class="w-full md:w-1/2 px-4">
                <div class="bg-white rounded-lg p-8 shadow-lg">
                    <div class="text-center mb-8">
                        <img src="<?php echo base_url('uploads/app_image/logo.png');?>" 
                             class="h-14 mx-auto mb-4" 
                             alt="">
                        <h2 class="text-2xl font-bold"><?php echo $global_config['institute_name'];?></h2>
                    </div>

                    <?php echo form_open($this->uri->uri_string()); ?>
                    <?php echo $this->app_lib->generateCSRF(); ?>
                    
                    <div class="space-y-6">
                        <div class="<?php if (form_error('password')) echo 'has-error'; ?>">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-key text-gray-400"></i>
                                </div>
                                <input type="password" 
                                       name="password" 
                                       class="w-full pl-10 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="New Password">
                            </div>
                            <?php if (form_error('password')): ?>
                                <p class="mt-1 text-sm text-red-600"><?php echo form_error('password'); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="<?php if (form_error('c_password')) echo 'has-error'; ?>">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-key text-gray-400"></i>
                                </div>
                                <input type="password" 
                                       name="c_password" 
                                       class="w-full pl-10 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="Confirm New Password">
                            </div>
                            <?php if (form_error('c_password')): ?>
                                <p class="mt-1 text-sm text-red-600"><?php echo form_error('c_password'); ?></p>
                            <?php endif; ?>
                        </div>

                        <button type="submit" 
                                id="btn_submit" 
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                            <i class="far fa-check-circle mr-2"></i> Confirm
                        </button>
                    </div>

                    <div class="text-center mt-6 text-gray-600 text-sm">
                        <p><?php echo $global_config['footer_text'];?></p>
                    </div>
                    
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
		<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/jquery-placeholder/jquery-placeholder.js');?>"></script>
		<!-- backstretch js -->
		<script src="<?php echo base_url('assets/login_page/js/jquery.backstretch.min.js');?>"></script>
		<script src="<?php echo base_url('assets/login_page/js/custom.js');?>"></script>

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