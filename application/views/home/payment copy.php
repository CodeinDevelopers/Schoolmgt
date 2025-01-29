<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Fees Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/inter/3.19.3/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
            <!-- Main Content -->
            <body class="bg-[#fafafa] dark:bg-black text-[#111111] dark:text-white">
    <div class="min-h-screen py-6">
        <!-- Add outer wrapper for spacing -->
        <div class="px-4 lg:px-8"> <!-- Add padding on desktop with lg:px-8 -->
            <div class="max-w-5xl mx-auto">
                <!-- Header - More Compact -->
                <div class="mb-6 text-center">
                    <img src="<?=$this->application_model->getBranchImage($get_student['branch_id'], 'logo')?>" 
                         alt="Branch Logo" 
                         class="h-10 mx-auto mb-4" />
                    <h1 class="text-3xl font-bold tracking-tight mb-1">Admission Fees Payment</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Complete your admission process securely</p>
                </div>

                <!-- Main Content -->
                <div class="bg-white dark:bg-[#111111] rounded-xl shadow-[0_0_30px_rgba(0,0,0,0.03)] dark:shadow-[0_0_30px_rgba(255,255,255,0.03)] border border-[#eaeaea] dark:border-[#333333]">
                    <div class="grid grid-cols-1 md:grid-cols-2 overflow-hidden">
                        <!-- Left Side - Payment Info -->
                        <div class="p-6 bg-gradient-to-b from-gray-50 to-white dark:from-[#111111] dark:to-black border-b md:border-b-0 md:border-r border-[#eaeaea] dark:border-[#333333]">
                            <div class="space-y-4">
                                <div>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Payment Details</h2>
                                    <div class="flex items-baseline space-x-2 mt-1">
                                        <span class="text-2xl font-bold"><?php echo $get_student['symbol'] . number_format($get_student['fee_elements']['amount'], 2, '.', ''); ?></span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">admission fee</span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Student Name</h3>
                                    <p class="text-base font-medium mt-0.5"><?php echo $get_student['first_name'] . " " . $get_student['last_name'] ?></p>
                                </div>
                                <div class="pt-4 border-t border-[#eaeaea] dark:border-[#333333]">
                                    <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        <span>Secure payment processing</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Form -->
                        <div class="p-6">
                            <?php echo form_open('admissionpayment/checkout/', array('class' => 'space-y-4 frm-submit')); ?>
                                <input type="hidden" name="student_id" value="<?php echo $get_student['id'] ?>">
                                
                                 <!-- Name Field -->
                            <div>
                                <label class="text-sm font-medium">Name</label>
                                <input type="text" name="name" value="<?=set_value('name')?>" 
                                       class="mt-1 w-full px-3 py-2 rounded-lg bg-gray-50 dark:bg-[#111111] border border-[#eaeaea] dark:border-[#333333] focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white transition-all" />
                                <span class="error text-xs text-red-500"></span>
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label class="text-sm font-medium">Email</label>
                                <input type="email" name="email" value="<?=set_value('email')?>" 
                                       class="mt-1 w-full px-3 py-2 rounded-lg bg-gray-50 dark:bg-[#111111] border border-[#eaeaea] dark:border-[#333333] focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white transition-all" />
                                <span class="error text-xs text-red-500"></span>
                            </div>

                            <!-- Mobile No and Address in Two Columns -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-medium">Mobile No</label>
                                    <input type="text" name="mobile_no" value="<?=set_value('mobile_no')?>" 
                                           class="mt-1 w-full px-3 py-2 rounded-lg bg-gray-50 dark:bg-[#111111] border border-[#eaeaea] dark:border-[#333333] focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white transition-all" />
                                    <span class="error text-xs text-red-500"></span>
                                </div>

                                <div>
                                    <label class="text-sm font-medium">Address</label>
                                    <input type="text" name="address" value="<?=set_value('address')?>" 
                                           class="mt-1 w-full px-3 py-2 rounded-lg bg-gray-50 dark:bg-[#111111] border border-[#eaeaea] dark:border-[#333333] focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white transition-all" />
                                    <span class="error text-xs text-red-500"></span>
                                </div>
                            </div>


                                <!-- Payment Method -->
                                <div>
                                    <label class="text-sm font-medium">Payment Method</label>
                                    <select name="payment_method" 
                                            class="mt-1 w-full px-3 py-2 rounded-lg bg-gray-50 dark:bg-[#111111] border border-[#eaeaea] dark:border-[#333333] focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white transition-all">
                                        <option value="">Select Payment Method</option>
                                        <?php
                                            $config = $this->home_model->getPaymentConfig($get_student['branch_id']);
                                            if ($config['paypal_status'] == 1) echo '<option value="paypal">PayPal</option>';
                                            if ($config['stripe_status'] == 1) echo '<option value="stripe">Stripe</option>';
                                            if ($config['payumoney_status'] == 1) echo '<option value="payumoney">PayUmoney</option>';
                                            if ($config['paystack_status'] == 1) echo '<option value="paystack">Paystack</option>';
                                            if ($config['razorpay_status'] == 1) echo '<option value="razorpay">Razorpay</option>';
                                            if ($config['sslcommerz_status'] == 1) echo '<option value="sslcommerz">SSLcommerz</option>';
                                            if ($config['jazzcash_status'] == 1) echo '<option value="jazzcash">Jazzcash</option>';
                                            if ($config['midtrans_status'] == 1) echo '<option value="midtrans">Midtrans</option>';
                                            if ($config['flutterwave_status'] == 1) echo '<option value="flutterwave">Flutter Wave</option>';
                                            if ($config['paytm_status'] == 1) echo '<option value="paytm">Paytm</option>';
                                            if ($config['toyyibpay_status'] == 1) echo '<option value="toyyibpay">toyyibPay</option>';
                                            if ($config['payhere_status'] == 1) echo '<option value="payhere">Payhere</option>';
                                            if ($config['nepalste_status'] == 1) echo '<option value="nepalste">Nepalste</option>';
                                        ?>
                                    </select>
                                    <span class="error text-xs text-red-500"></span>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="w-full px-5 py-3 text-sm font-medium text-white bg-black dark:bg-white dark:text-black rounded-lg hover:bg-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white transition-all mb-6">
                                Complete Payment
                            </button>
                        <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/select2/js/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/payment.js'); ?>"></script>

    <?php if($alertclass != ''): ?>
        <script type="text/javascript">
            swal({
                toast: true,
                position: 'top-end',
                type: '<?php echo $alertclass?>',
                title: '<?php echo $alert_message?>',
                confirmButtonClass: 'btn btn-1',
                buttonsStyling: false,
                timer: 8000
            })
        </script>
    <?php endif; ?>
</body>
</html>