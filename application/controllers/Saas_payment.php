<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Acamedium (Saas)
 * @version : 3.0
 * @developed by : Codeindevelopers
 * @support : support@codeindevelopers.com.ng
 * @author url : https://codeindevelopers.com.ng
 * @filename : Saas_payment.php
 * @copyright : Reserved 2024-present Codeindevelopers
 */

class Saas_payment extends MY_Controller
{
    private $globalPaymentID = 9999;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('saas_model');
        $this->load->library('paypal_payment');
        $this->load->library('stripe_payment');
        $this->load->library('razorpay_payment');
        $this->load->library('sslcommerz');
        $this->load->library('midtrans_payment');
        $this->load->model('saas_email_model');
        $this->load->library('paytm_kit_lib');
    }

    public function index($reference_no = '')
    {
        $this->data['getSettings'] = $this->saas_model->getSettings('offline_payments');
        $this->data['payment_config'] = $this->getPaymentConfig();
        $this->data['get_school'] = $this->saas_model->getSchoolRegDetails($reference_no);
        if (empty($this->data['get_school'])) {
            set_alert('error', "Invalid Reference.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        if ($this->data['get_school']['free_trial'] == 1) {
            set_alert('error', "No payment required.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        if ($this->data['get_school']['payment_status'] == 1) {
            set_alert('error', "The payment has already been paid.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        if ($this->data['get_school']['payment_data'] == 'olp') {
            set_alert('error', "Your offline payment is being reviewed.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->load->view('saas_website/payment', $this->data);
    }

    public function checkout()
    {
        if ($_POST) {
            $this->form_validation->set_rules('payment_method', translate('payment_method'), 'trim|required');
            $payVia = $this->input->post('payment_method');
            $reference_no = $this->input->post('reference_no');
            $getSchoolRegDetails = $this->saas_model->getSchoolRegDetails($reference_no);
            if ($payVia == 'olp') {
                $this->form_validation->set_rules('payment_type', translate('payment_type'), 'trim|required');
                $this->form_validation->set_rules('date_of_payment', translate('date_of_payment'), 'trim|required');
                $this->form_validation->set_rules('reference', translate('reference'), 'trim|required');
                $this->form_validation->set_rules('note', translate('note'), 'trim|required');
                $this->form_validation->set_rules('proof_of_payment', translate('proof_of_payment'), 'callback_fileHandleUpload[proof_of_payment]');
            } else {
                $this->form_validation->set_rules('name', translate('name'), 'trim|required');
                $this->form_validation->set_rules('email', translate('email'), 'trim|required|valid_email');
                $this->form_validation->set_rules('mobile_no', translate('mobile_no'), 'trim|required|numeric');
                $this->form_validation->set_rules('post_code', translate('post_code'), 'trim|required');
                $this->form_validation->set_rules('state', translate('state'), 'trim|required');
                $this->form_validation->set_rules('address', translate('address'), 'trim|required');  
            }
            if ($this->form_validation->run() !== false) {
                if ($payVia == 'olp') {
                    $amount = ($getSchoolRegDetails['price'] - $getSchoolRegDetails['discount']);
                    $enc_name = null;
                    $orig_name = null;
                    $config = array();
                    $config['upload_path'] = 'uploads/attachments/offline_payments/';
                    $config['encrypt_name'] = true;
                    $config['allowed_types'] = '*';
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload("proof_of_payment")) {
                        $orig_name = $this->upload->data('orig_name');
                        $enc_name = $this->upload->data('file_name');
                    }
                    $date_of_payment = $this->input->post('date_of_payment');
                    $arrayFees = array(
                        'school_register_id' => $getSchoolRegDetails['id'],
                        'amount' => $amount,
                        'payment_type' => $this->input->post('payment_type'),
                        'reference' => $this->input->post('reference'),
                        'note' => $this->input->post('note'),
                        'payment_date' => date('Y-m-d', strtotime($date_of_payment)),
                        'submit_date' => date('Y-m-d H:i:s'),
                        'enc_file_name' => $enc_name,
                        'orig_file_name' => $orig_name,
                        'status' => 1,
                    );
                    $this->db->insert('saas_offline_payments', $arrayFees);

                    $arrayData = array(
                        'payment_amount' => $amount,
                        'payment_data' => "olp",
                    );
                    $this->db->where('reference_no', $reference_no);
                    $this->db->update('saas_school_register', $arrayData);
                    $url = base_url('subscription_review/' . $reference_no);
                } else {
                     $params = array(
                        'register_id' => $getSchoolRegDetails['id'],
                        'reference_no' => $reference_no,
                        'amount' => ($getSchoolRegDetails['price'] - $getSchoolRegDetails['discount']),
                        'currency' => $this->data['global_config']['currency'],
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'mobile_no' => $this->input->post('mobile_no'),
                        'post_code' => $this->input->post('post_code'),
                        'state' => $this->input->post('state'),
                        'address' => $this->input->post('address'),
                        'payment_method' => $payVia,
                    );

                    if ($payVia == 'paypal') {
                        $params['payment_method'] = 6;
                        $url = base_url("saas_payment/paypal");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'stripe') {
                        $params['payment_method'] = 7;
                        $url = base_url("saas_payment/stripe");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'payumoney') {
                        $params['payment_method'] = 8;
                        $payerData = array(
                            'name' => $this->input->post('name'),
                            'email' => $this->input->post('email'),
                            'phone' => $this->input->post('mobile_no'),
                        );
                        $params['payer_data'] = $payerData;
                        $url = base_url("saas_payment/payumoney");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'paystack') {
                        $params['payment_method'] = 9;
                        $url = base_url("saas_payment/paystack");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'razorpay') {
                        $params['payment_method'] = 10;
                        $url = base_url("saas_payment/razorpay");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'sslcommerz') {
                        $params['payment_method'] = 11;
                        $params['tran_id'] = "SSLC" . uniqid();
                        $url = base_url("saas_payment/sslcommerz");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'jazzcash') {
                        $params['payment_method'] = 12;
                        $url = base_url("saas_payment/jazzcash");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'midtrans') {
                        $params['payment_method'] = 13;
                        $url = base_url("saas_payment/midtrans");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'flutterwave') {
                        $params['payment_method'] = 14;
                        $url = base_url("saas_payment/flutterwave");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'paytm') {
                        $params['payment_method'] = 16;
                        $url = base_url("saas_payment/paytm");
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'toyyibpay') {
                        $params['payment_method'] = 17;
                        $url = base_url("saas_payment/toyyibpay");
                        $params['name'] = $this->input->post('name');
                        $params['email'] = $this->input->post('email');
                        $params['phone'] = $this->input->post('mobile_no');
                        $this->session->set_userdata("params", $params);
                    }

                    if ($payVia == 'payhere') {
                        $params['payment_method'] = 18;
                        $url = base_url("saas_payment/payhere");
                        $this->session->set_userdata("params", $params);
                    }
                }

                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'url' => '', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function paypal()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['paypal_username'] == "" || $config['paypal_password'] == "" || $config['paypal_signature'] == "") {
                set_alert('error', 'Paypal config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $data = array(
                    'cancelUrl' => base_url('saas_payment/getsuccesspayment'),
                    'returnUrl' => base_url('saas_payment/getsuccesspayment'),
                    'reference_no' => $params['reference_no'],
                    'name' => $params['name'],
                    'description' => "School Subscription fees deposit via Paypal, Reference No - " . $params['reference_no'],
                    'amount' => floatval($params['amount']),
                    'currency' => $params['currency'],
                );
                $this->paypal_payment->initialize($this->globalPaymentID);
                $response = $this->paypal_payment->payment($data);
                if ($response->isSuccessful()) {

                } elseif ($response->isRedirect()) {
                    $response->redirect();
                } else {
                    echo $response->getMessage();
                }
            }
        }
    }

    /* paypal successpayment redirect */
    public function getsuccesspayment()
    {
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            // null session data
            $this->session->set_userdata("params", "");
            $data = array(
                'reference_no' => $params['reference_no'],
                'name' => $params['name'],
                'description' => "School Subscription fees deposit Reference No - " . $params['reference_no'],
                'amount' => floatval($params['amount']),
                'currency' => $params['currency'],
            );
            $this->paypal_payment->initialize($this->globalPaymentID);
            $response = $this->paypal_payment->success($data);
            $paypalResponse = $response->getData();
            if ($response->isSuccessful()) {
                $purchaseId = $_GET['PayerID'];
                if (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
                    if ($purchaseId) {
                        $ref_id = $paypalResponse['PAYMENTINFO_0_TRANSACTIONID'];
                        // payment info update in invoice
                        $arrayFees = array(
                            'data' => $params,
                            'amount' => floatval($paypalResponse['PAYMENTINFO_0_AMT']),
                            'txn_id' => $ref_id,
                            'date' => date("Y-m-d H:i:s"),
                        );
                        $this->savePaymentData($arrayFees);

                        $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                        $this->session->set_flashdata('success', $success);
                        redirect(base_url('subscription_review/' . $params['reference_no']));
                    }
                }
            } elseif ($response->isRedirect()) {
                $response->redirect();
            } else {
                set_alert('error', translate('payment_cancelled'));
                redirect(base_url('saas_payment/index/' . $params['reference_no']));
            }
        }
    }

    public function stripe()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['stripe_secret'] == "") {
                set_alert('error', 'Stripe config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $data = array(
                    'imagesURL' => base_url('uploads/app_image/logo.png'),
                    'success_url' => base_url("saas_payment/stripe_success?session_id={CHECKOUT_SESSION_ID}"),
                    'cancel_url' => base_url("saas_payment/stripe_success?session_id={CHECKOUT_SESSION_ID}"),
                    'amount' => $params['amount'],
                    'description' => "School Subscription fees deposit via Stripe, Reference No - " . $params['reference_no'],
                );
                $this->stripe_payment->initialize($this->globalPaymentID);
                $response = $this->stripe_payment->payment($data);
                $data['sessionId'] = $response['id'];
                $data['stripe_publishiable'] = $config['stripe_publishiable'];
                $this->load->view('layout/stripe', $data);
            }
        }
    }

    public function stripe_success()
    {
        $sessionId = $this->input->get('session_id');
        $params = $this->session->userdata('params');
        if (!empty($sessionId) && !empty($params)) {
            // null session data
            $this->session->set_userdata("params", "");
            try {
                $this->stripe_payment->initialize($this->globalPaymentID);
                $response = $this->stripe_payment->verify($sessionId);
                if (isset($response->payment_status) && $response->payment_status == 'paid') {
                    $amount = floatval($response->amount_total) / 100;
                    $ref_id = $response->payment_intent;
                    // payment info update in invoice
                    $arrayFees = array(
                        'data' => $params,
                        'amount' => $amount,
                        'txn_id' => $ref_id,
                        'date' => date("Y-m-d H:i:s"),
                    );
                    $this->savePaymentData($arrayFees);

                    $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                    $this->session->set_flashdata('success', $success);
                    redirect(base_url('subscription_review/' . $params['reference_no']));
                } else {
                    // payment failed: display message to customer
                    set_alert('error', "Something went wrong!");
                    redirect(base_url('saas_payment/index/' . $params['reference_no']));
                }
            } catch (\Exception$ex) {
                set_alert('error', $ex->getMessage());
                redirect(base_url('saas_payment/index/' . $params['reference_no']));
            }
        }
    }

    public function paystack()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['paystack_secret_key'] == "") {
                set_alert('error', 'Paystack config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $result = array();
                $amount = ($params['amount']) * 100;
                $ref = app_generate_hash();
                $callback_url = base_url() . 'saas_payment/verify_paystack_payment/' . $ref;
                $postdata = array('email' => $params['email'], 'amount' => $amount, "reference" => $ref, "callback_url" => $callback_url);
                $url = "https://api.paystack.co/transaction/initialize";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $headers = [
                    'Authorization: Bearer ' . $config['paystack_secret_key'],
                    'Content-Type: application/json',
                ];
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $request = curl_exec($ch);
                curl_close($ch);
                //
                if ($request) {
                    $result = json_decode($request, true);
                }

                $redir = $result['data']['authorization_url'];
                header("Location: " . $redir);
            }
        }
    }

    public function verify_paystack_payment($ref)
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        // null session data
        $this->session->set_userdata("params", "");
        $result = array();
        $url = 'https://api.paystack.co/transaction/verify/' . $ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $config['paystack_secret_key']]
        );
        $request = curl_exec($ch);
        curl_close($ch);
        //
        if ($request) {
            $result = json_decode($request, true);
            // print_r($result);
            if ($result) {
                if ($result['data']) {
                    //something came in
                    if ($result['data']['status'] == 'success') {
                        $arrayFees = array(
                            'data' => $params,
                            'amount' => floatval($params['amount']),
                            'txn_id' => $ref,
                            'date' => date("Y-m-d H:i:s"),
                        );
                        $this->savePaymentData($arrayFees);
                        $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                        $this->session->set_flashdata('success', $success);
                        redirect(base_url('subscription_review/' . $params['reference_no']));

                    } else {
                        // the transaction was not successful, do not deliver value'
                        // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
                        set_alert('error', "Transaction Failed");
                        redirect(base_url('saas_payment/index/' . $params['reference_no']));
                    }
                } else {
                    //echo $result['message'];
                    set_alert('error', "Transaction Failed");
                    redirect(base_url('saas_payment/index/' . $params['reference_no']));
                }
            } else {
                //print_r($result);
                //die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
                set_alert('error', "Transaction Failed");
                redirect(base_url('saas_payment/index/' . $params['reference_no']));
            }
        } else {
            //var_dump($request);
            //die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
            set_alert('error', "Transaction Failed");
            redirect(base_url('saas_payment/index/' . $params['reference_no']));
        }
    }

    /* PayUmoney Payment */
    public function payumoney()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['payumoney_key'] == "" || $config['payumoney_salt'] == "") {
                set_alert('error', 'PayUmoney config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                // api config
                if ($config['payumoney_demo'] == 1) {
                    $api_link = "https://test.payu.in/_payment";
                } else {
                    $api_link = "https://secure.payu.in/_payment";
                }
                $key = $config['payumoney_key'];
                $salt = $config['payumoney_salt'];

                // payumoney details
                $studentID = $params['reference_no'];
                $amount = floatval($params['amount']);
                $payer_name = $params['name'];
                $payer_email = $params['email'];
                $payer_phone = $params['mobile_no'];
                $product_info = "Online Admission fees deposit. Student Id - " . $studentID;
                // redirect url
                $success = base_url('saas_payment/payumoney_success');
                $fail = base_url('saas_payment/payumoney_success');
                // generate transaction id
                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                $params['txn_id'] = $txnid;
                $this->session->set_userdata("params", $params);

                // optional udf values
                $udf1 = '';
                $udf2 = '';
                $udf3 = '';
                $udf4 = '';
                $udf5 = '';

                $hashstring = $key . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $payer_name . '|' . $payer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $salt;
                $hash = strtolower(hash('sha512', $hashstring));
                $data = array(
                    'salt' => $salt,
                    'key' => $key,
                    'payu_base_url' => $api_link,
                    'action' => $api_link,
                    'surl' => $success,
                    'furl' => $fail,
                    'txnid' => $txnid,
                    'amount' => $amount,
                    'firstname' => $payer_name,
                    'email' => $payer_email,
                    'phone' => $payer_phone,
                    'productinfo' => $product_info,
                    'hash' => $hash,
                );
                $this->load->view('layout/payumoney', $data);
            }
        }
    }

    /* payumoney successpayment redirect */
    public function payumoney_success()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $params = $this->session->userdata('params');
            // null session data
            $this->session->set_userdata("params", "");
            if ($this->input->post('status') == "success") {
                $txn_id = $params['txn_id'];
                $mihpayid = $this->input->post('mihpayid');
                $transactionid = $this->input->post('txnid');
                if ($txn_id == $transactionid) {
                    // payment info update in invoice
                    $arrayFees = array(
                        'data' => $params,
                        'amount' => floatval($this->input->post('amount')),
                        'txn_id' => $mihpayid,
                        'date' => date("Y-m-d H:i:s"),
                    );
                    $this->savePaymentData($arrayFees);
                    $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                    $this->session->set_flashdata('success', $success);
                    redirect(base_url('subscription_review/' . $params['reference_no']));
                } else {
                    set_alert('error', translate('invalid_transaction'));
                    redirect(base_url('saas_payment/index/' . $params['reference_no']));
                }
            } else {
                set_alert('error', "Transaction Failed");
                redirect(base_url('saas_payment/index/' . $params['reference_no']));
            }
        }
    }

    public function razorpay()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['razorpay_key_id'] == "" || $config['razorpay_key_secret'] == "") {
                set_alert('error', 'Razorpay config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $params['invoice_no'] = $params['reference_no'];
                $params['fine'] = 0;
                $this->razorpay_payment->initialize($this->globalPaymentID);
                $response = $this->razorpay_payment->payment($params);
                $params['razorpay_order_id'] = $response;
                $this->session->set_userdata("params", $params);
                $arrayData = array(
                    'key' => $config['razorpay_key_id'],
                    'amount' => ($params['amount'] * 100),
                    'name' => $params['name'],
                    'description' => "School Subscription fees deposit Reference No - " . $params['reference_no'],
                    'image' => base_url('uploads/app_image/logo-small.png'),
                    'currency' => 'INR',
                    'order_id' => $params['razorpay_order_id'],
                    'theme' => ["color" => "#F37254"],
                );
                $data['return_url'] = base_url('userrole/invoice');
                $data['pay_data'] = json_encode($arrayData);
                $this->load->view('layout/razorpay', $data);
            }
        }
    }

    public function razorpay_verify()
    {
        $params = $this->session->userdata('params');
        if ($this->input->post('razorpay_payment_id')) {
            // null session data
            $this->session->set_userdata("params", "");
            $attributes = array(
                'razorpay_order_id' => $params['razorpay_order_id'],
                'razorpay_payment_id' => $this->input->post('razorpay_payment_id'),
                'razorpay_signature' => $this->input->post('razorpay_signature'),
            );
            $this->razorpay_payment->initialize($this->globalPaymentID);
            $response = $this->razorpay_payment->verify($attributes);
            if ($response == true) {
                // payment info update in invoice
                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($params['amount']),
                    'txn_id' => $attributes['razorpay_payment_id'],
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
                $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                $this->session->set_flashdata('success', $success);
                redirect(base_url('subscription_review/' . $params['reference_no']));
            } else {
                set_alert('error', $response);
                redirect(base_url('saas_payment/index/' . $params['reference_no']));
            }
        } else {
            set_alert('error', "Payment Cancelled");
            redirect(base_url('saas_payment/index/' . $params['reference_no']));
        }
    }

    public function sslcommerz()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['sslcz_store_id'] == "" || $config['sslcz_store_passwd'] == "") {
                set_alert('error', 'SSLcommerz config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {

                $post_data = array();
                $post_data['total_amount'] = floatval($params['amount']);
                $post_data['currency'] = "BDT";
                $post_data['tran_id'] = $params['tran_id'];
                $post_data['success_url'] = base_url('saas_payment/sslcommerz_success');
                $post_data['fail_url'] = base_url('saas_payment/sslcommerz_success');
                $post_data['cancel_url'] = base_url('saas_payment/sslcommerz_success');
                $post_data['ipn_url'] = base_url() . "ipn";

                # CUSTOMER INFORMATION
                $post_data['cus_name'] = $params['name'];
                $post_data['cus_email'] = $params['email'];
                $post_data['cus_add1'] = $params['address'];
                $post_data['cus_city'] = $params['state'];
                $post_data['cus_state'] = $params['state'];
                $post_data['cus_postcode'] = $params['post_code'];
                $post_data['cus_country'] = "Bangladesh";
                $post_data['cus_phone'] = $params['mobile_no'];

                $post_data['product_profile'] = "non-physical-goods";
                $post_data['shipping_method'] = "No";
                $post_data['num_of_item'] = "1";
                $post_data['product_name'] = "School Fee";
                $post_data['product_category'] = "SchoolFee";
                $this->sslcommerz->initialize($this->globalPaymentID);
                $this->sslcommerz->RequestToSSLC($post_data);
            }
        }
    }

    /* sslcommerz successpayment redirect */
    public function sslcommerz_success()
    {
        $params = $this->session->userdata('params');
        if (($_POST['status'] == 'VALID') && ($params['tran_id'] == $_POST['tran_id']) && ($params['amount'] == $_POST['currency_amount'])) {
            $this->sslcommerz->initialize($this->globalPaymentID);
            if ($this->sslcommerz->ValidateResponse($_POST['currency_amount'], "BDT", $_POST)) {
                $tran_id = $params['tran_id'];
                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($_POST['currency_amount']),
                    'txn_id' => $tran_id,
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
                $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                $this->session->set_flashdata('success', $success);
                redirect(base_url('subscription_review/' . $params['reference_no']));
            }
        } else {
            set_alert('error', "Transaction Failed");
            redirect(base_url('saas_payment/index/' . $params['reference_no']));
        }
    }

    public function jazzcash()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['jazzcash_merchant_id'] == "" || $config['jazzcash_passwd'] == "" || $config['jazzcash_integerity_salt'] == "") {
                set_alert('error', 'Jazzcash config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $integeritySalt = $config['jazzcash_integerity_salt'];
                $pp_TxnRefNo = 'T' . date('YmdHis');
                $post_data = array(
                    "pp_Version" => "2.0",
                    "pp_TxnType" => "MPAY",
                    "pp_Language" => "EN",
                    "pp_IsRegisteredCustomer" => "Yes",
                    "pp_TokenizedCardNumber" => "",
                    "pp_CustomerEmail" => "",
                    "pp_CustomerMobile" => "",
                    "pp_CustomerID" => uniqid(),
                    "pp_MerchantID" => $config['jazzcash_merchant_id'],
                    "pp_Password" => $config['jazzcash_passwd'],
                    "pp_TxnRefNo" => $pp_TxnRefNo,
                    "pp_Amount" => floatval($params['amount']) * 100,
                    "pp_DiscountedAmount" => "",
                    "pp_DiscountBank" => "",
                    "pp_TxnCurrency" => "PKR",
                    "pp_TxnDateTime" => date('YmdHis'),
                    "pp_BillReference" => uniqid(),
                    "pp_Description" => "School Subscription fees deposit Reference No - " . $params['invoice_no'],
                    "pp_TxnExpiryDateTime" => date('YmdHis', strtotime("+1 hours")),
                    "pp_ReturnURL" => base_url('saas_payment/jazzcash_success'),
                    "ppmpf_1" => "1",
                    "ppmpf_2" => "2",
                    "ppmpf_3" => "3",
                    "ppmpf_4" => "4",
                    "ppmpf_5" => "5",
                );

                $sorted_string = $integeritySalt . '&';
                $sorted_string .= $post_data['pp_Amount'] . '&';
                $sorted_string .= $post_data['pp_BillReference'] . '&';
                $sorted_string .= $post_data['pp_CustomerID'] . '&';
                $sorted_string .= $post_data['pp_Description'] . '&';
                $sorted_string .= $post_data['pp_IsRegisteredCustomer'] . '&';
                $sorted_string .= $post_data['pp_Language'] . '&';
                $sorted_string .= $post_data['pp_MerchantID'] . '&';
                $sorted_string .= $post_data['pp_Password'] . '&';
                $sorted_string .= $post_data['pp_ReturnURL'] . '&';
                $sorted_string .= $post_data['pp_TxnCurrency'] . '&';
                $sorted_string .= $post_data['pp_TxnDateTime'] . '&';
                $sorted_string .= $post_data['pp_TxnExpiryDateTime'] . '&';
                $sorted_string .= $post_data['pp_TxnRefNo'] . '&';
                $sorted_string .= $post_data['pp_TxnType'] . '&';
                $sorted_string .= $post_data['pp_Version'] . '&';
                $sorted_string .= $post_data['ppmpf_1'] . '&';
                $sorted_string .= $post_data['ppmpf_2'] . '&';
                $sorted_string .= $post_data['ppmpf_3'] . '&';
                $sorted_string .= $post_data['ppmpf_4'] . '&';
                $sorted_string .= $post_data['ppmpf_5'];

                //sha256 hash encoding
                $pp_SecureHash = hash_hmac('sha256', $sorted_string, $integeritySalt);
                $post_data['pp_SecureHash'] = $pp_SecureHash;
                if ($config['jazzcash_sandbox'] == 1) {
                    $data['api_url'] = "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/";
                } else {
                    $data['api_url'] = "https://jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/";
                }
                $data['post_data'] = $post_data;
                $this->load->view('layout/jazzcash_pay', $data);
            }
        }
    }

    /* jazzcash successpayment redirect */
    public function jazzcash_success()
    {
        $params = $this->session->userdata('params');
        if ($_POST['pp_ResponseCode'] == '000') {
            $tran_id = $_POST['pp_TxnRefNo'];
            $arrayFees = array(
                'data' => $params,
                'amount' => floatval($params['amount']),
                'txn_id' => $tran_id,
                'date' => date("Y-m-d H:i:s"),
            );
            $this->savePaymentData($arrayFees);
            $success = "Thank you for submitting the online registration form. Please you can print this copy.";
            $this->session->set_flashdata('success', $success);
            redirect(base_url('subscription_review/' . $params['reference_no']));

        } elseif ($_POST['pp_ResponseCode'] == '112') {
            set_alert('error', "Transaction Failed");
            redirect(base_url('saas_payment/index/' . $params['reference_no']));
        } else {
            set_alert('error', $_POST['pp_ResponseMessage']);
            redirect(base_url('saas_payment/index/' . $params['reference_no']));
        }
    }

    public function midtrans()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['midtrans_client_key'] == "" || $config['midtrans_server_key'] == "") {
                set_alert('error', 'Midtrans config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $amount = number_format($params['amount'], 2, '.', '');
                $orderID = rand();
                $params['orderID'] = $orderID;
                $this->session->set_userdata("params", $params);
                $this->midtrans_payment->initialize($this->globalPaymentID);
                $response = $this->midtrans_payment->get_SnapToken(round($amount), $orderID);
                $data['snapToken'] = $response;
                $data['midtrans_client_key'] = $config['midtrans_client_key'];
                $this->load->view('layout/midtrans', $data);
            }
        }
    }

    public function midtrans_success()
    {
        $params = $this->session->userdata('params');
        $response = json_decode($_POST['post_data']);
        if (!empty($params) && !empty($params['orderID']) && !empty($response)) {
            // null session data
            $this->session->set_userdata("params", "");
            if ($response->order_id == $params['orderID']) {
                $tran_id = $response->transaction_id;
                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($params['amount']),
                    'txn_id' => $tran_id,
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
                $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                $this->session->set_flashdata('success', $success);
                $url = base_url('subscription_review/' . $params['reference_no']);
            } else {
                $url = base_url('saas_payment/index/' . $params['reference_no']);
                set_alert('error', "Something went wrong!");
            }
            echo json_encode(array('url' => $url));
        }
    }

    public function flutterwave()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['flutterwave_public_key'] == "" && $config['flutterwave_secret_key'] == "") {
                set_alert('error', 'Flutter Wave config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $amount = floatval($params['amount']);
                $txref = "rsm" . app_generate_hash();
                $params['txref'] = $txref;
                $this->session->set_userdata("params", $params);
                $callback_url = base_url('saas_payment/verify_flutterwave_payment');
                $data = array(
                    'name' => $params['name'],
                    'amount' => $amount,
                    'customer_email' => $params['email'],
                    'currency' => $params['currency'],
                    "txref" => $txref,
                    "pubKey" => $config['flutterwave_public_key'],
                    "redirect_url" => $callback_url,
                );
                $this->load->view('layout/flutterwave', $data);
            }
        }
    }

    public function verify_flutterwave_payment()
    {
        $params = $this->session->userdata('params');
        $config = $this->getPaymentConfig();
        $this->session->set_userdata("params", "");
        if (empty($params)) {
            redirect(base_url());
        }
        $redirect_url = base_url('subscription_review/' . $params['reference_no']);
        if (isset($_GET['cancelled']) && $_GET['cancelled'] == 'true') {
            set_alert('error', "Payment Cancelled");
            redirect($redirect_url);
        }

        if (isset($_GET['tx_ref'])) {
            $postdata = array(
                "SECKEY" => $config['flutterwave_secret_key'],
                "txref" => $params['txref'],
            );
            $url = 'https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $headers = [
                'content-type: application/json',
                'cache-control: no-cache',
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $request = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($request, true);
            if ($result['status'] == 'success' && isset($result['data']['chargecode']) && ($result['data']['chargecode'] == '00' || $result['data']['chargecode'] == '0')) {
                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($params['amount']),
                    'txn_id' => $params['txref'],
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
                set_alert('success', translate('payment_successfull'));
                redirect($redirect_url);
            } else {
                set_alert('error', "Transaction Failed");
                redirect($redirect_url);
            }
        } else {
            set_alert('error', "Transaction Failed");
            redirect($redirect_url);
        }
    }

    // toyyibpay payment gateway script start
    public function toyyibpay()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['toyyibpay_secretkey'] == "" && $config['toyyibpay_categorycode'] == "") {
                set_alert('error', 'toyyibPay config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $payment_data = array(
                    'userSecretKey' => $config['toyyibpay_secretkey'],
                    'categoryCode' => $config['toyyibpay_categorycode'],
                    'billName' => 'School Subscription fees',
                    'billDescription' => 'School Subscription fees',
                    'billPriceSetting' => 1,
                    'billPayorInfo' => 1,
                    'billAmount' => floatval($params['amount']) * 100,
                    'billReturnUrl' => base_url('saas_payment/toyyibpay_success'),
                    'billCallbackUrl' => base_url('saas_payment/toyyibpay_callbackurl'),
                    'billExternalReferenceNo' => substr(hash('sha256', mt_rand() . microtime()), 0, 20),
                    'billTo' => $params['name'],
                    'billEmail' => $params['email'],
                    'billPhone' => $params['mobile_no'],
                    'billSplitPayment' => 0,
                    'billSplitPaymentArgs' => '',
                    'billPaymentChannel' => '0',
                    'billContentEmail' => 'Thank you for pay subscription fees',
                    'billChargeToCustomer' => 1,
                );

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $payment_data);
                $result = curl_exec($curl);
                $info = curl_getinfo($curl);
                curl_close($curl);
                $obj = json_decode($result);
                if (!empty($obj) && $obj->status != "error") {
                    $url = "https://toyyibpay.com/" . $obj[0]->BillCode;
                    header("Location: $url");
                } else {
                    set_alert('error', "Transaction Failed");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    public function toyyibpay_success()
    {
        if ($_GET['status_id'] == 1 && !empty($_GET['billcode'])) {
            $params = $this->session->userdata('params');
            $this->session->set_userdata("params", "");
            $redirect_url = base_url('subscription_review/' . $params['reference_no']);
            $some_data = array(
                'billCode' => $_GET['billcode'],
                'billpaymentStatus' => '1'
            );  
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/getBillTransactions');  
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

            $result = curl_exec($curl);
            $info = curl_getinfo($curl);  
            curl_close($curl);
            $result = json_decode($result);
            if (!empty($result[0]->billpaymentStatus) && $result[0]->billpaymentStatus == 1) {
                $refno = $_GET['transaction_id'];
                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($params['amount']),
                    'txn_id' => $refno,
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
                set_alert('success', translate('payment_successfull'));
                redirect($redirect_url);
            } else {
                set_alert('error', "Transaction Failed");
                redirect($redirect_url);
            }
        } else {
            set_alert('error', "Transaction Failed");
            redirect($redirect_url);
        }
    }

    public function toyyibpay_callbackurl()
    {
        //some code here
    }


    //Paytm payment gateway script start
    public function paytm()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['paytm_merchantmid'] == "" && $config['paytm_merchantkey'] == "") {
                set_alert('error', 'Paytm config not available');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $PAYTM_MERCHANT_MID = $config['paytm_merchantmid'];
                $PAYTM_MERCHANT_KEY = $config['paytm_merchantkey'];
                $PAYTM_MERCHANT_WEBSITE = $config['paytm_merchant_website'];
                $PAYTM_INDUSTRY_TYPE = $config['paytm_industry_type'];
                $transactionURL = 'https://securegw.paytm.in/theia/processTransaction'; //For Production or LIVE Credentials
                // $transactionURL = 'https://securegw-stage.paytm.in/theia/processTransaction'; //TEST Credentials

                $orderID = time();
                $paytmParams = array();
                $paytmParams['ORDER_ID'] = $orderID;
                $paytmParams['TXN_AMOUNT'] = floatval($params['amount']);
                $paytmParams["CUST_ID"] = "1";
                $paytmParams["EMAIL"] = (!empty($params['email']) ? $params['email'] : "");
                $paytmParams["MID"] = $PAYTM_MERCHANT_MID;
                $paytmParams["CHANNEL_ID"] = "WEB";
                $paytmParams["WEBSITE"] = $PAYTM_MERCHANT_WEBSITE;
                $paytmParams["CALLBACK_URL"] = base_url('saas_payment/paytm_success');
                $paytmParams["INDUSTRY_TYPE_ID"] = $PAYTM_INDUSTRY_TYPE;

                $paytmChecksum = $this->paytm_kit_lib->generateSignature($paytmParams, $PAYTM_MERCHANT_MID);
                $paytmParams["CHECKSUMHASH"] = $paytmChecksum;
                $data = array();
                $data['paytmParams'] = $paytmParams;
                $data['transactionURL'] = $transactionURL;
                $this->load->view('layout/paytm', $data);
            }
        }
    }

    public function paytm_success()
    {
        $params = $this->session->userdata('params');
        $this->session->set_userdata("params", "");
        $redirect_url = base_url('subscription_review/' . $params['reference_no']);
        $config = $this->getPaymentConfig();
        $PAYTM_MERCHANT_KEY = $config['paytm_merchantkey'];
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";
        $isValidChecksum = $this->paytm_kit_lib->verifySignature($paramList, $PAYTM_MERCHANT_KEY, $paytmChecksum);
        if ($isValidChecksum == "TRUE") {
            if ($_POST["STATUS"] == "TXN_SUCCESS") {
                $tran_id = $_POST['TXNID'];
                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($params['amount']),
                    'txn_id' => $tran_id,
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
                set_alert('success', translate('payment_successfull'));
                redirect($redirect_url);
            } else {
                set_alert('error', "Something went wrong!");
                redirect($redirect_url);
            }
        } else {
            set_alert('error', "Checksum mismatched.");
            redirect($redirect_url);
        }
    }

    // payhere payment gateway script start
    public function payhere()
    {
        $config = $this->getPaymentConfig();
        $params = $this->session->userdata('params');
        if (!empty($params)) {
            if ($config['payhere_merchant_id'] == "" && $config['payhere_merchant_secret'] == "") {
                set_alert('error', 'Payhere config not available.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {

                $merchantID = $config['payhere_merchant_id'];
                $orderID = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                $currency = 'LKR';
                $merchant_secret = $config['payhere_merchant_secret'];
                $hash = strtoupper(
                    md5(
                        $merchantID .
                        $orderID .
                        number_format($params['amount'], 2, '.', '') .
                        $currency .
                        strtoupper(md5($merchant_secret))
                    )
                );
                $paytmParams = array();
                $paytmParams['merchant_id'] = $merchantID;
                $paytmParams['return_url'] = base_url('saas_payment/payhere_return');
                $paytmParams["cancel_url"] = base_url('saas_payment/payhere_cancel');
                $paytmParams["notify_url"] = base_url('saas_payment/payhere_notify');
                $paytmParams["order_id"] = $orderID;
                $paytmParams["items"] = "School subscription fees";
                $paytmParams["currency"] = "LKR";
                $paytmParams["amount"] = number_format($params['amount'], 2, '.', '');
                $paytmParams["first_name"] = $params['name'];
                $paytmParams["last_name"] = '';
                $paytmParams["email"] = $params['email'];
                $paytmParams["phone"] = $params['mobile_no'];
                $paytmParams["address"] = '';
                $paytmParams["city"] = '';
                $paytmParams["country"] = 'Sri Lanka';
                $paytmParams["hash"] = $hash;
                $data['paytmParams'] = $paytmParams;
                $this->load->view('layout/payhere', $data);
            }
        }
    }

    public function payhere_notify()
    {
        if ($_POST) {
            $config = $this->getPaymentConfig();
            $merchant_id = $_POST['merchant_id'];
            $order_id = $_POST['order_id'];
            $payhere_amount = $_POST['payhere_amount'];
            $payhere_currency = $_POST['payhere_currency'];
            $status_code = $_POST['status_code'];
            $md5sig = $_POST['md5sig'];
            $merchant_secret = $config['payhere_merchant_secret'];
            $local_md5sig = strtoupper(
                md5(
                    $merchant_id .
                    $order_id .
                    $payhere_amount .
                    $payhere_currency .
                    $status_code .
                    strtoupper(md5($merchant_secret))
                )
            );
            if (($local_md5sig === $md5sig) && ($status_code == 2)) {
                $params = $this->session->userdata('params');
                $this->session->set_userdata("params", "");

                $arrayFees = array(
                    'data' => $params,
                    'amount' => floatval($payhere_amount),
                    'txn_id' => $order_id,
                    'date' => date("Y-m-d H:i:s"),
                );
                $this->savePaymentData($arrayFees);
            }
        }
    }

    public function payhere_cancel()
    {
        $params = $this->session->userdata('params');
        $this->session->set_userdata("params", "");
        $redirect_url = base_url('subscription_review/' . $params['reference_no']);
        set_alert('error', "Something went wrong!");
        redirect($redirect_url);
    }

    public function payhere_return()
    {
        $params = $this->session->userdata('params');
        $this->session->set_userdata("params", "");
        $redirect_url = base_url('subscription_review/' . $params['reference_no']);
        set_alert('success', translate('payment_successfull'));
        redirect($redirect_url);
    }

    private function savePaymentData($data)
    {
        if (!empty($data)) {
            // payer details json encode
            $reference_no = $data['data']['reference_no'];
            $paymentDetails = array(
                'name' => $data['data']['name'],
                'email' => $data['data']['email'],
                'post_code' => $data['data']['post_code'],
                'state' => $data['data']['state'],
                'address' => $data['data']['address'],
                'payment_method' => $data['data']['payment_method'],
                'txn_id' => $data['txn_id'],
                'date' => $data['date'],
            );
            // insert in DB
            $arrayData = array(
                'payment_status' => 1,
                'payment_amount' => $data['amount'],
                'payment_data' => json_encode($paymentDetails),
            );
            $this->db->where('reference_no', $reference_no);
            $this->db->update('saas_school_register', $arrayData);

            //automatic subscription approval
            $getSettings = $this->saas_model->getSettings();
            if ($getSettings->automatic_approval == 1) {
                $this->saas_model->automaticSubscriptionApproval($data['data']['register_id'], $this->data['global_config']['currency'], $this->data['global_config']['currency_symbol']);
            }

            // send email school subscription payment confirmation
            $schoolRegDetails = $this->saas_model->getSchoolRegDetails($reference_no);
            $schoolRegDetails['date'] = _d($paymentDetails['date']);
            $schoolRegDetails['paid_amount'] = number_format($data['amount'], 2, '.', '');
            $schoolRegDetails['invoice_url'] = base_url('subscription_review/' . $reference_no);
            $this->saas_email_model->sentSchoolSubscriptionPaymentConfirmation($schoolRegDetails);
        }
    }

    public function getPaymentConfig()
    {
        $this->db->where('branch_id', $this->globalPaymentID);
        $this->db->select('*')->from('payment_config');
        return $this->db->get()->row_array();
    }

    public function getTypeInstruction()
    {
        if ($_POST) {
            $typeID = $this->input->post('typeID');
            if (empty($typeID)) {
                echo null;
                exit;
            }
            $r = $this->db->where('id', $typeID)->get('saas_offline_payment_types')->row();
            if (!empty($r->note)) {
                echo $r->note;
            } else {
                echo "";
            }

        }
    }
}