<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo translate('reset_password'); ?></title>
  <link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" />
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Font from Google Fonts -->
  <link href="<?php echo is_secure('https://fonts.googleapis.com/css?family=Signika:300,400,600,700'); ?>" rel="stylesheet">

  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex items-center justify-center min-h-screen py-12 px-6">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden w-full max-w-4xl">
      
      <!-- Left Section: Logo and Information -->
      <div class="w-1/2 p-8 bg-blue-600 text-white">
        <h2 class="text-3xl font-semibold mb-4"><?php echo translate('welcome_to'); ?></h2>
        <div class="flex justify-center mb-8">
          <img src="<?php echo base_url('uploads/app_image/logo.png'); ?>" alt="Acamedium School" class="h-16" />
        </div>
        <p><?php echo $global_config['address']; ?></p>
      </div>

      <!-- Right Section: Reset Password Form -->
      <div class="w-1/2 p-8">
        <div class="flex flex-col justify-center">
          <div class="flex items-center justify-center mb-4">
            <img src="<?php echo base_url('uploads/app_image/logo.png'); ?>" alt="" class="h-14 mr-2" />
            <h2 class="text-2xl font-semibold"><?php echo $global_config['institute_name']; ?></h2>
          </div>

          <form class="space-y-4" method="post" accept-charset="utf-8">
            <?php echo $this->app_lib->generateCSRF(); ?>
            
            <div class="space-y-1">
              <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
              <input type="password" name="password" id="password" placeholder="Enter new password" class="block w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600" />
              <span class="text-sm text-red-500"><?php echo form_error('password'); ?></span>
            </div>
            
            <div class="space-y-1">
              <label for="c_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
              <input type="password" name="c_password" id="c_password" placeholder="Confirm new password" class="block w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600" />
              <span class="text-sm text-red-500"><?php echo form_error('c_password'); ?></span>
            </div>
            
            <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
              <i class="far fa-check-circle"></i> Confirm
            </button>
          </form>

          <div class="mt-6 text-center text-sm text-gray-600">
            <p><?php echo $global_config['footer_text']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
  <?php if ($alertclass != ''): ?>
    <script type="text/javascript">
      swal({
        toast: true,
        position: 'top-end',
        type: '<?php echo $alertclass; ?>',
        title: '<?php echo $alert_message; ?>',
        confirmButtonClass: 'btn btn-default',
        buttonsStyling: false,
        timer: 8000
      });
    </script>
  <?php endif; ?>
</body>
</html>
