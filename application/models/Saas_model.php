<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saas_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // get package list
    public function getPackageList()
    {
        $get = $this->db->get('saas_package')->result();
        return $get;
    }

    // plan package save and update function
    public function packageSave($data)
    {
        $module = $this->input->post('modules');
        $period_type = $data['period_type'];
        $insertData = array(
            'name' => $data['name'],
            'price' => (empty($data['price']) ? 0 : $data['price']),
            'recommended' => (empty($data['recommended']) ? 0 : 1),
            'discount' => (empty($data['discount']) ? 0 : $data['discount']),
            'student_limit' => $data['student_limit'],
            'staff_limit' => $data['staff_limit'],
            'teacher_limit' => $data['teacher_limit'],
            'parents_limit' => $data['parents_limit'],
            'free_trial' => (empty($data['free_trial']) ? 0 : 1),
            'show_onwebsite' => (isset($data['show_website']) ? 1 : 0),
            'status' => (isset($data['package_status']) ? 1 : 0),
            'period_type' => $period_type,
            'period_value' => ($period_type == 1 ? 0 : $data['period_value']),
            'permission' => json_encode($module),
        );
        $id = $this->input->post('id');
        if (empty($id)) {
            $insertData['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('saas_package', $insertData);
        } else {
            $insertData['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('saas_package', $insertData);
        }
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPeriodType()
    {
        $arrayPeriod = array(
            '' => translate('select'),
            '2' => translate('days'),
            '3' => translate('monthly'),
            '4' => translate('yearly'),
            '1' => translate('lifetime'),
        );
        return $arrayPeriod;
    }

    public function getPeriodTypeWebsite()
    {
        $arrayPeriod = array(
            '2' => translate('days'),
            '3' => translate('months'),
            '4' => translate('years'),
            '1' => translate('lifetime'),
        );
        return $arrayPeriod;
    }

    public function getSaasPackage()
    {
        $arrayData = array("" => translate('select'));
        $this->db->where('status', 1);
        $result = $this->db->get('saas_package')->result();
        foreach ($result as $row) {
            $arrayData[$row->id] = $row->name;
        }
        return $arrayData;
    }

    public function getSubscriptionsExpiredNotification()
    {
        $message = "";
        $sql = "SELECT `expired_alert`,`expired_alert_days`,`expired_alert_message`,`expired_message` FROM `saas_settings` WHERE `id` = '1'";
        $settings = $this->db->query($sql)->row();
        if (!empty($settings)) {
            if ($settings->expired_alert == 1) {
                $days = $settings->expired_alert_days;
                $date = date('Y-m-d', strtotime("+ $days days"));
                $school_id = get_loggedin_branch_id();
                $sql = "SELECT `expire_date` FROM `saas_subscriptions` WHERE date(`expire_date`) <= " . $this->db->escape($date) . " AND `school_id` = " . $this->db->escape($school_id);
                $subscriptions = $this->db->query($sql)->row();
                if (!empty($subscriptions)) {
                    if (date("Y-m-d", strtotime($subscriptions->expire_date)) < date("Y-m-d")) {
                        return $settings->expired_message;
                    }
                    $date1 = new DateTime(date("Y-m-d"));
                    $date2 = new DateTime($subscriptions->expire_date);
                    $diff = $date2->diff($date1)->format("%a");
                    $days = intval($diff);
                    $message = $settings->expired_alert_message;
                    $message = str_replace('{days}', $days, $message);
                }
            }
        }
        return $message;
    }

    public function getSchool($id)
    {
        $this->db->select('branch.*,saas_subscriptions.package_id,saas_subscriptions.expire_date,saas_subscriptions.id as subscriptions_id,saas_subscriptions.upgrade_lasttime');
        $this->db->from('branch');
        $this->db->join('saas_subscriptions', 'saas_subscriptions.school_id = branch.id', 'inner');
        $this->db->where('branch.id', $id);
        $school = $this->db->get()->row();
        return $school;
    }

    public function getSubscriptionList($type = '')
    {
        $this->db->select('branch.id as bid,branch.name as branch_name,branch.status,upgrade_lasttime,email,mobileno,saas_subscriptions.expire_date,sp.name as package_name,sp.period_type,saas_subscriptions.created_at,sp.price,free_trial,sp.discount');
        $this->db->from('branch');
        $this->db->join('saas_subscriptions', 'saas_subscriptions.school_id = branch.id', 'inner');
        $this->db->join('saas_package as sp', 'sp.id = saas_subscriptions.package_id', 'left');
        if (preg_match('/^[1-9][0-9]*$/', $type)) {
            if ($type == 1) {
                $this->db->where('branch.status', 1);
                $this->db->where("date(saas_subscriptions.expire_date) >", date("Y-m-d"));
            }
            if ($type == 2) {
                $this->db->where('branch.status', 0);
            }
            if ($type == 3) {
                $this->db->where("date(saas_subscriptions.expire_date) <", date("Y-m-d"));
            }
        }
        return $this->db->get()->result();
    }

    public function getPendingRequest($start = '', $end = '')
    {
        $this->db->select('saas_school_register.*,sp.name as package_name,IFNULL(sp.price-sp.discount, 0) as plan_price');
        $this->db->from('saas_school_register');
        $this->db->join('saas_package as sp', 'sp.id = saas_school_register.package_id', 'left');
        if (!empty($start) && !empty($end)) {
            $this->db->where('date(saas_school_register.created_at)  >=', $start);
            $this->db->where('date(saas_school_register.created_at) <=', $end);
        }
        return $this->db->get()->result();
    }

    public function checkSubscriptionValidity($school_id = "")
    {
        if (!is_superadmin_loggedin()) {
            if (empty($school_id)) {
                $school_id = get_loggedin_branch_id();
            }
            $sql = "SELECT `id`,`expire_date` FROM `saas_subscriptions` WHERE `school_id` = " . $this->db->escape($school_id);
            $subscriptions = $this->db->query($sql)->row();
            if (empty($subscriptions)) {
                return true;
            }

            if ($subscriptions->expire_date == "") {
                return true;
            }

            if (date("Y-m-d", strtotime($subscriptions->expire_date)) < date("Y-m-d")) {
                set_alert('error', translate('subscription_expired'));
                return false;
            }
        }
        return true;
    }

    public function schoolSave($data)
    {
        $arrayBranch = array(
            'name' => $data['branch_name'],
            'school_name' => $data['school_name'],
            'email' => $data['email'],
            'mobileno' => $data['mobileno'],
            'currency' => $data['currency'],
            'symbol' => $data['currency_symbol'],
            'city' => $data['city'],
            'state' => $data['state'],
            'address' => $data['address'],
            'status' => $data['state_id'],
        );
        if (!isset($data['branch_id'])) {
            $this->db->insert('branch', $arrayBranch);
            $id = $this->db->insert_id();
        } else {
            $id = $data['branch_id'];
            $this->db->where('id', $data['branch_id']);
            $this->db->update('branch', $arrayBranch);
        }

        $file_upload = false;
        if (isset($_FILES["logo_file"]) && !empty($_FILES['logo_file']['name'])) {
            $fileInfo = pathinfo($_FILES["logo_file"]["name"]);
            $img_name = $id . '.' . $fileInfo['extension'];
            move_uploaded_file($_FILES["logo_file"]["tmp_name"], "uploads/app_image/logo-" . $img_name);
            $file_upload = true;
        }
        if (isset($_FILES["text_logo"]) && !empty($_FILES['text_logo']['name'])) {
            $fileInfo = pathinfo($_FILES["text_logo"]["name"]);
            $img_name = $id . '.' . $fileInfo['extension'];
            move_uploaded_file($_FILES["text_logo"]["tmp_name"], "uploads/app_image/logo-small-" . $img_name);
            $file_upload = true;
        }

        if (isset($_FILES["print_file"]) && !empty($_FILES['print_file']['name'])) {
            $fileInfo = pathinfo($_FILES["print_file"]["name"]);
            $img_name = $id . '.' . $fileInfo['extension'];
            move_uploaded_file($_FILES["print_file"]["tmp_name"], "uploads/app_image/printing-logo-" . $img_name);
            $file_upload = true;
        }

        if (isset($_FILES["report_card"]) && !empty($_FILES['report_card']['name'])) {
            $fileInfo = pathinfo($_FILES["report_card"]["name"]);
            $img_name = $id . '.' . $fileInfo['extension'];
            move_uploaded_file($_FILES["report_card"]["tmp_name"], "uploads/app_image/report-card-logo-" . $img_name);
            $file_upload = true;
        }
        return $id;
    }

    public function saveSchoolSaasData($package_id = '', $schooolID = '', $paymentData = [])
    {
        //get saas package information
        $saasPackage = $this->db->where('id', $package_id)->get('saas_package')->row();
        $periodValue = $saasPackage->period_value;
        $dateAdd = '';
        if ($saasPackage->period_type == 2) {
            $dateAdd = "+$periodValue days";
        }
        if ($saasPackage->period_type == 3) {
            $dateAdd = "+$periodValue month";
        }
        if ($saasPackage->period_type == 4) {
            $dateAdd = "+$periodValue year";
        }
        if (!empty($dateAdd)) {
            $dateAdd = date('Y-m-d', strtotime($dateAdd));
        }

        //add subscriptions data stored in the database
        $arraySubscriptions = array(
            'package_id' => $package_id,
            'school_id' => $schooolID,
            'expire_date' => $dateAdd,
        );
        $this->db->insert('saas_subscriptions', $arraySubscriptions);
        $subscriptionsID = $this->db->insert_id();

        //add subscriptions transactions data stored in the database
        $arraySubscriptionsTransactions = array(
            'subscriptions_id' => $subscriptionsID,
            'package_id' => $package_id,
            'payment_id' => (empty($paymentData['txn_id']) ? substr(app_generate_hash(), 3, 8) : $paymentData['txn_id']),
            'amount' => $saasPackage->price,
            'discount' => $saasPackage->discount,
            'payment_method' => (empty($paymentData['payment_method']) ? 1 : $paymentData['payment_method']),
            'purchase_date' => date("Y-m-d"),
            'expire_date' => $dateAdd,
        );
        $this->db->insert('saas_subscriptions_transactions', $arraySubscriptionsTransactions);

        //manage modules permission
        $permission = json_decode($saasPackage->permission, true);
        $modules_manage = array();
        $getPermissions = $this->db->where('in_module', 1)->get('permission_modules')->result();
        foreach ($getPermissions as $key => $value) {
            if (in_array($value->id, $permission)) {
                $modules_manage[] = ['modules_id' => $value->id, 'isEnabled' => 1, 'branch_id' => $schooolID];
            } else {
                $modules_manage[] = ['modules_id' => $value->id, 'isEnabled' => 0, 'branch_id' => $schooolID];
            }
        }
        $this->db->insert_batch('modules_manage', $modules_manage);
    }

    public function getPackageListWebsite($website = true)
    {
        if ($website == true) {
            $this->db->where('show_onwebsite', 1);
        }
        $this->db->where('status', 1);
        $this->db->order_by("free_trial desc, id asc");
        $get = $this->db->get('saas_package')->result();
        return $get;
    }

    public function getFAQList()
    {
        $this->db->order_by("id", "asc");
        $get = $this->db->get('saas_cms_faq_list')->result();
        return $get;
    }

    public function getFeaturesList()
    {
        $get = $this->db->get('saas_cms_features')->result();
        return $get;
    }

    public function getSettings($sel = "*")
    {
        $this->db->select($sel);
        $this->db->where('id', 1);
        $get = $this->db->get('saas_settings')->row();
        return $get;
    }

    public function getPackageDetails($plan_id = '')
    {
        $this->db->select('period_value,period_type,name,price,discount,free_trial');
        $this->db->where('status', 1);
        $this->db->where("id", $plan_id);
        $get = $this->db->get('saas_package')->row();
        return $get;
    }

    public function getSchoolRegDetails($reference_no = '')
    {
        $this->db->select('saas_school_register.*,saas_package.period_value,saas_package.period_type,saas_package.name,saas_package.price,saas_package.discount,saas_package.free_trial');
        $this->db->from('saas_school_register');
        $this->db->join('saas_package', 'saas_package.id = saas_school_register.package_id', 'inner');
        $this->db->where('saas_school_register.reference_no', $reference_no);
        $q = $this->db->get()->row_array();
        return $q;
    }

    public function checkReferenceNo($ref_no)
    {
        $this->db->select("id");
        $this->db->from('saas_school_register');
        $this->db->where("reference_no", $ref_no);
        $query = $this->db->get();
        $result = $query->row_array();
        if (!empty($result)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getPlanExpiryDate($plan_id = '')
    {
        $formats = 'd-M-Y';
        $get_format = get_global_setting('date_format');
        if ($get_format != '') {
            $formats = $get_format;
        }
        $getPlanDetails = $this->getPackageDetails($plan_id);
        $expiryDate = "";
        $period_value = $getPlanDetails->period_value;
        if ($getPlanDetails->period_type == 1) {
            $expiryDate = translate('lifetime');
        } elseif ($getPlanDetails->period_type == 2) {
            $expiryDate = date($formats, strtotime("+$period_value day"));
        } elseif ($getPlanDetails->period_type == 3) {
            $expiryDate = date($formats, strtotime("+$period_value month"));
        } elseif ($getPlanDetails->period_type == 4) {
            $expiryDate = date($formats, strtotime("+$period_value year"));
        }
        return $expiryDate;
    }

    public function getPendingSchool($id)
    {
        $this->db->select('*');
        $this->db->from('saas_school_register');
        $this->db->where('id', $id);
        $this->db->where('status !=', 1);
        $school = $this->db->get()->row();
        return $school;
    }

    public function fileupload($media_name, $upload_path = "", $old_file = '', $enc = true)
    {
        if (file_exists($_FILES[$media_name]['tmp_name']) && !$_FILES[$media_name]['error'] == UPLOAD_ERR_NO_FILE) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = '*';
            if ($enc == true) {
                $config['encrypt_name'] = true;
            } else {
                $config['overwrite'] = true;
            }
            $this->upload->initialize($config);
            if ($this->upload->do_upload($media_name)) {
                if (!empty($old_file)) {
                    $file_name = $config['upload_path'] . $old_file;
                    if (file_exists($file_name)) {
                        unlink($file_name);
                    }
                }
                return $this->upload->data('file_name');
            }
        }
        return null;
    }

    public function save_faq($data)
    {
        $faq_data = array(
            'title' => $data['title'],
            'description' => $data['description'],
        );
        if (isset($data['faq_id']) && !empty($data['faq_id'])) {
            $this->db->where('id', $data['faq_id']);
            $this->db->update('saas_cms_faq_list', $faq_data);
        } else {
            $this->db->insert('saas_cms_faq_list', $faq_data);
        }
    }

    public function save_features($data)
    {
        $feature_data = array(
            'title' => $data['title'],
            'icon' => $data['icon'],
            'description' => $data['description'],
        );
        if (isset($data['feature_id']) && !empty($data['feature_id'])) {
            $this->db->where('id', $data['feature_id']);
            $this->db->update('saas_cms_features', $feature_data);
        } else {
            $this->db->insert('saas_cms_features', $feature_data);
        }
    }

    public function getTransactions($start = '', $end = '')
    {
        $this->db->select('tr.*,payment_types.name as payvia,branch.name as school_name,branch.id as bid,saas_package.name as plan_name');
        $this->db->from('saas_subscriptions_transactions as tr');
        $this->db->join('saas_subscriptions as ss', 'ss.id = tr.subscriptions_id', 'inner');
        $this->db->join('saas_package', 'saas_package.id = tr.package_id', 'left');
        $this->db->join('branch', 'branch.id = ss.school_id', 'inner');
        $this->db->join('payment_types', 'payment_types.id = tr.payment_method', 'left');
        if (!empty($start) && !empty($end)) {
            $this->db->where('date(tr.created_at)  >=', $start);
            $this->db->where('date(tr.created_at) <=', $end);
        }
        $this->db->order_by('tr.id', 'ASC');
        return $this->db->get()->result();
    }

    public function getSectionsPaymentMethod()
    {
        $branchID = 9999;
        $this->db->where('branch_id', $branchID);
        $this->db->select('paypal_status,stripe_status,payumoney_status,paystack_status,razorpay_status,sslcommerz_status,jazzcash_status,midtrans_status,flutterwave_status,paytm_status,toyyibpay_status,payhere_status')->from('payment_config');
        $status = $this->db->get()->row_array();

        $payvia_list = array('' => translate('select_payment_method'));
        if ($status['paypal_status'] == 1) {
            $payvia_list['paypal'] = 'Paypal';
        }

        if ($status['stripe_status'] == 1) {
            $payvia_list['stripe'] = 'Stripe';
        }

        if ($status['payumoney_status'] == 1) {
            $payvia_list['payumoney'] = 'PayUmoney';
        }

        if ($status['paystack_status'] == 1) {
            $payvia_list['paystack'] = 'Paystack';
        }

        if ($status['razorpay_status'] == 1) {
            $payvia_list['razorpay'] = 'Razorpay';
        }

        if ($status['sslcommerz_status'] == 1) {
            $payvia_list['sslcommerz'] = 'SSLcommerz';
        }

        if ($status['jazzcash_status'] == 1) {
            $payvia_list['jazzcash'] = 'Jazzcash';
        }

        if ($status['midtrans_status'] == 1) {
            $payvia_list['midtrans'] = 'Midtrans';
        }

        if ($status['flutterwave_status'] == 1) {
            $payvia_list['flutterwave'] = 'Flutter Wave';
        }

        if ($status['paytm_status'] == 1) {
            $payvia_list['paytm'] = 'Paytm';
        }

        if ($status['toyyibpay_status'] == 1) {
            $payvia_list['toyyibPay'] = 'toyyibPay';
        }

        if ($status['payhere_status'] == 1) {
            $payvia_list['payhere'] = 'Payhere';
        }

        return $payvia_list;
    }

    public function automaticSubscriptionApproval($saas_register_id = '', $currency = 'USD', $symbol = '$')
    {
        $getSchool = $this->getPendingSchool($saas_register_id);
        if (!empty($getSchool)) {
            $current_PackageID = $getSchool->package_id;

            //update status
            $this->db->where('id', $saas_register_id)->update('saas_school_register', ['status' => 1, 'payment_status' => 1, 'date_of_approval' => date('Y-m-d H:i:s')]);

            //stored in branch table
            $arrayBranch = array(
                'name' => $getSchool->school_name,
                'school_name' => $getSchool->school_name,
                'email' => $getSchool->email,
                'mobileno' => $getSchool->contact_number,
                'currency' => $currency,
                'symbol' => $symbol,
                'city' => "",
                'state' => "",
                'address' => $getSchool->address,
                'status' => 1,
            );
            $this->db->insert('branch', $arrayBranch);
            $schooolID = $this->db->insert_id();

            $inser_data1 = array(
                'branch_id' => $schooolID,
                'name' => $getSchool->admin_name,
                'sex' => ($getSchool->gender = 1 ? 'male' : 'female'),
                'mobileno' => $getSchool->contact_number,
                'joining_date' => date("Y-m-d"),
                'email' => $getSchool->email,
            );
            $inser_data2 = array(
                'username' => $getSchool->username,
                'role' => 2,
            );

            //random staff id generate
            $inser_data1['staff_id'] = substr(app_generate_hash(), 3, 7);
            //save employee information in the database
            $this->db->insert('staff', $inser_data1);
            $staffID = $this->db->insert_id();

            //save employee login credential information in the database
            $inser_data2['active'] = 1;
            $inser_data2['user_id'] = $staffID;
            $inser_data2['password'] = $this->app_lib->pass_hashed($getSchool->password);
            $this->db->insert('login_credential', $inser_data2);
            
            if (!empty($getSchool->logo)) {
                copy('./uploads/saas_school_logo/' . $getSchool->logo, "./uploads/app_image/logo-small-$schooolID.png");
            }

            $paymentData = [];
            if (!empty($getSchool->payment_data)) {
                if ($getSchool->payment_data == 'olp') {
                    $paymentData['payment_method'] = 15;
                    $paymentData['txn_id'] = $getSchool->reference_no;
                } else {
                    $paymentData = json_decode($getSchool->payment_data, TRUE) ;
                    $paymentData['payment_method'] = $paymentData['payment_method'];
                    $paymentData['txn_id'] = $paymentData['txn_id'];
                }
            }
            
            //saas data are prepared and stored in the database
            $this->saveSchoolSaasData($current_PackageID, $schooolID, $paymentData);

            // send email subscription approval confirmation
            $arrayData['email'] = $getSchool->email;
            $arrayData['package_id'] = $getSchool->package_id;
            $arrayData['admin_name'] = $getSchool->admin_name;
            $arrayData['reference_no'] = $getSchool->reference_no;
            $arrayData['school_name'] = $getSchool->school_name;
            $arrayData['login_username'] = $getSchool->username;
            $arrayData['password'] = $getSchool->password;
            $arrayData['subscription_start_date'] = _d(date("Y-m-d"));
            $arrayData['invoice_url'] = base_url('saas_website/purchase_complete/' . $arrayData['reference_no']);
            $this->saas_email_model->sentSubscriptionApprovalConfirmation($arrayData);
        }
    }
}
