class Accounting extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('accounting_model');
        $this->load->model('email_model');
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/daterangepicker/daterangepicker.css',
            ),
            'js' => array(
                'vendor/moment/moment.js',
                'vendor/daterangepicker/daterangepicker.js',
            ),
        );
        if (!moduleIsEnabled('office_accounting')) {
            access_denied();
        }
    }
    public function all_transactions()
    {
        if (!get_permission('all_transactions', 'is_view')) {
            access_denied();
        }

        $this->data['voucherlist'] = $this->accounting_model->getVoucherList();
        $this->data['sub_page'] = 'accounting/all_transactions';
        $this->data['main_menu'] = 'accounting';
        $this->data['title'] = translate('office_accounting');
        $this->load->view('layout/index', $this->data);
    }