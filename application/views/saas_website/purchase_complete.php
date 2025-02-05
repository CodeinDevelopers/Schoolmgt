<?php
$currency_symbol = $global_config['currency_symbol'];
$paymentDetails = array();
if (!empty($schoolRegDetails['payment_data'])) {
    $paymentDetails = json_decode($schoolRegDetails['payment_data'], true);
}
$expiryDate = $this->saas_model->getPlanExpiryDate($schoolRegDetails['package_id']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="<?php echo $global_config['institute_name'] ?>">
        <title><?php echo $global_config['institute_name'];?></title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
        <style type="text/css">
            @media (max-width: 549px) {
                .sr-root {
                    padding: 15px !important;
                }
            }
            .status-list {
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .status-list li {
                display: inline-block;
                text-align: center;
                
                border: 1px solid #ddd;
                padding: 9px 14px;
                border-radius: 4px;
                font-size: 13px;
                margin-top: 0.5rem;
                background-color: #cff4fc;
            }
            .status-list li span {
                font-weight: bold;
                display: block;
            }
        </style>
    </head>
    <body>
        <div class="sr-root" style="background-color: #f9f9f9">
            <div class="sr-main">
                <section class="container">
                    <div class="pasha-image mb-3">
                        <a href="<?php echo base_url() ?>"><img src="<?=base_url('uploads/app_image/logo.png')?>" /></a>
                    </div>
                    <?php
                    if ($schoolRegDetails['status'] == 0) { ?>
                    <div class="alert alert-success mt-4"><i class="far fa-check-circle"></i> Thanks For Registration. Your application and payment will be reviewed and you will be notified.</div>
                    <?php } elseif($schoolRegDetails['status'] == 2) { ?>
                        <div class="alert alert-danger mt-4"><i class="far fa-times-circle"></i> Your application has been rejected.<?php echo !empty($schoolRegDetails['comments']) ? "<br><strong>Reason/Comment :</strong><br>" . $schoolRegDetails['comments'] : '' ?></div>
                    <?php } ?>

                    <?php
                    if(!empty($schoolRegDetails['payment_data']) && $schoolRegDetails['payment_data'] == 'olp') { 
                        $r = $this->db->select('status,comments')->where('school_register_id', $schoolRegDetails['id'])->get('saas_offline_payments')->row();
                        if ($r->status == 3) {
                            ?>
                        <div class="alert alert-danger mt-2"><i class="far fa-times-circle"></i> Your offline payment has been rejected.<?php echo !empty($r->comments) ? "<br><strong>Reason/Comment :</strong><br>" . $r->comments : '' ?></div>
                    <?php } } ?> 
                    <div class="justify-content-center align-items-center flex-wrap d-flex">
                          <ul class="status-list">
                            <li>Reference No<span><?php echo $schoolRegDetails['reference_no'] ?></span></li>
                            <li>Subscription Status <?php
                                        if ($schoolRegDetails['status'] == 0) {
                                            echo '<span class="text-info">Reviewing</span>';
                                         } elseif ($schoolRegDetails['status'] == 1) {
                                             echo '<span class="text-success">Approved</span>';
                                         } elseif ($schoolRegDetails['status'] == 2) {
                                             echo '<span class="text-danger">Rejected</span>';
                                         } ?></li>
                            <li>Payment Status <?php if ($schoolRegDetails['payment_status'] == 0) { ?>
                                <span class="text-warning"><?php echo $schoolRegDetails['payment_data'] == 'olp' ? 'Pending' : 'Unpaid'; ?></span>
                                <?php } else if ($schoolRegDetails['payment_status'] == 1) { ?>
                                <span class="text-success">Paid</span>
                                <?php } else if ($schoolRegDetails['payment_status'] == 2) { ?>
                                <span class="text-danger">Reject</span>
                                <?php } ?></li>
                            
                          </ul>
                     </div>
                    <div class="invoice-container" id="invoiceDiv">
                        <style type="text/css">
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                border-spacing: 0;
                                margin-bottom: 20px;
                            }

                            table th {
                                padding: 20px !important;
                                background: #fff;
                                border-bottom: 1px solid #ddd !important;
                            }

                            table thead tr {
                                border: 2px solid #464646;
                                border-right: 0;
                                border-left: 0;
                            }

                            table td {
                                padding: 10px;
                                background: #fff;
                                border-bottom: 1px solid #ddd !important;
                            }

                            table th {
                                white-space: nowrap;
                                font-weight: normal;
                            }

                            .invoice-container {
                                margin: 15px auto;
                                padding: 50px;
                                width: 100%;
                                max-width: 850px;
                                background-color: #fff;
                                border: 1px solid #ccc;
                                -moz-border-radius: 6px;
                                -webkit-border-radius: 6px;
                                -o-border-radius: 6px;
                                border-radius: 6px;
                                box-shadow: 0px 1px 6px 0px rgb(0 0 0 / 14%);
                            }

                            @media (max-width: 767px) {
                                .invoice-container {
                                    padding: 35px 35px 50px 35px;
                                }
                            }

                            @media (max-width: 499px) {
                                .invoice-header {
                                    text-align: center;
                                }
                            }

                            .invoice-col {
                                position: relative;
                                min-height: 1px;
                                padding-right: 15px;
                                padding-left: 15px;
                            }

                            @media (min-width: 500px) {
                                .invoice-col {
                                    float: left;
                                    width: 50%;
                                }

                                .invoice-col.right {
                                    float: right;
                                    text-align: right;
                                }
                            }

                            /* Invoice Status Formatting */
                            .invoice-container .invoice-status {
                                margin: 20px 0 0 0;
                                text-transform: uppercase;
                                font-size: 24px;
                                font-weight: bold;
                            }

                            .invoice-container .small-text {
                                font-size: 0.9em;
                            }

                            .invoice-container img {
                                max-width: 100%;
                                height: auto;
                                max-height: 280px;
                            }


                            .text-right {
                                text-align: right;
                            }

                            h3 {
                                font-size: 24px;
                            }

                            .unpaid {
                                border: 1px solid #f53d3d;
                                padding: 10px;
                                width: 130px;
                                float: right;
                                color: #f53d3d;
                            }

                            .paid {
                                border-color: #21a120;
                                color: #21a120;
                            }

                            .invoice-summary ul.amounts li {
                                margin-bottom: 5px;
                                padding: 5px !important;
                                border-radius: 4px;
                                -webkit-border-radius: 4px;
                                font-weight: 300;
                                list-style-type: none;
                                border-bottom: #ddd 1px solid;
                                width: ;
                            }

                            .invoice-summary ul.amounts li:last-child {
                                border-bottom: 0;
                            }

                            hr {
                                color: #ddd;
                            }

                            @media print {
                                body {
                                    width: 750px;
                                }

                                .invoice-col {
                                    float: left !important;
                                    width: 50% !important;
                                    text-align: left;
                                }

                                .invoice-col.right {
                                    float: right;
                                    text-align: right;
                                }

                                .invoice-summary .row {
                                    width: 50% !important;
                                    float: right !important;
                                }

                                hr {
                                    color: #bbb !important;
                                }
                            }

                            .alert-success {
                                border-radius: 6px;
                            }
                        </style>
                        <div class="row invoice-header">
                            <div class="invoice-col">
                                <p><img src="<?=base_url('uploads/app_image/printing-logo.png')?>" /></p>
                                <h3>INVOICE #<?php echo $schoolRegDetails['id']; ?></h3>
                            </div>
                            <div class="invoice-col text-center">
                                <div class="invoice-status">
                                    <?php if ($schoolRegDetails['payment_status'] == 0) { ?>
                                    <p class="unpaid"><?php echo $schoolRegDetails['payment_data'] == 'olp' ? 'Pending' : 'Unpaid'; ?></p>
                                    <?php } else if ($schoolRegDetails['payment_status'] == 1) { ?>
                                    <p class="unpaid paid">Paid</p>
                                    <?php } else if ($schoolRegDetails['payment_status'] == 2) { ?>
                                    <p class="unpaid">Reject</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="invoice-col">
                                <strong>Invoiced To</strong>
                                <address class="small-text">
                                    <?php 
                                    echo $schoolRegDetails['school_name'] . "<br/>";
                                    echo $schoolRegDetails['admin_name'] . "<br/>";
                                    echo $schoolRegDetails['address'] . "<br/>";
                                    echo $schoolRegDetails['contact_number'] . "<br/>";
                                    echo $schoolRegDetails['email'] . "<br/>";
                                    ?>
                                </address>
                            </div>
                            <div class="invoice-col right">
                                <strong>Pay To</strong>
                                <address class="small-text">
                                    <?php 
                                    echo $global_config['institute_name'] . "<br/>";
                                    echo $global_config['address'] . "<br/>";
                                    echo $global_config['mobileno'] . "<br/>";
                                    echo $global_config['institute_email'] . "<br/>";
                                    ?>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="invoice-col" style="margin-top:8px">
                                <strong>Invoice/Payment Date</strong><br>
                                <span class="small-text">
                                    <?php echo date('l, F jS, Y', strtotime($schoolRegDetails['updated_at'])) ?>
                                </span>
                            </div>
                            <div class="invoice-col right" style="margin-top:8px">
                                <strong>Payment Method</strong><br>
                                <?php 
                                if ($schoolRegDetails['payment_data'] == 'olp') {
                                    echo '<span class="small-text">Offline Payment</span>';
                                } else {
                                if ($schoolRegDetails['payment_status'] == 0) { ?>
                                <span class="small-text"> - </span>
                                <?php } else { ?>
                                <span class="small-text">
                                    <?php 
                                    if ($schoolRegDetails['free_trial'] == 1) {
                                        echo "Free Trial";
                                    } else {
                                        echo empty($paymentDetails['payment_method']) ? '' : get_type_name_by_id('payment_types', $paymentDetails['payment_method']);
                                    }
                                    ?>
                                </span>
                                <?php } }?>
                            </div>
                        </div>
                        <br>
                        <table class="table table-condensed" style="margin-top: 30px">
                            <thead>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td width="20%" class="text-right"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $schoolRegDetails['name']; ?> Plan - Subscription Fee (<?php echo date('d-M-Y', strtotime($schoolRegDetails['updated_at'])) ?> - <?php echo $expiryDate ?>)</td>
                                    <td class="text-right">
                                        <?php echo $currency_symbol . number_format($schoolRegDetails['price'], 2, '.', ''); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="invoice-summary text-right">
                            <div class="row" style="justify-content: flex-end;">
                                <div class="col-md-5 col-xs-12">
                                    <ul class="amounts">
                                        <li><strong>Sub Total :</strong>
                                            <?php echo $currency_symbol . number_format($schoolRegDetails['price'], 2, '.', ''); ?>
                                        </li>
                                        <li><strong>Discount :</strong>
                                            <?php echo $currency_symbol . number_format($schoolRegDetails['discount'], 2, '.', ''); ?>
                                        </li>
                                        <li><strong>Paid : </strong>
                                            <?php echo $currency_symbol . number_format($schoolRegDetails['payment_amount'], 2, '.', ''); ?>
                                        </li>
                                        <li><strong>Total : </strong>
                                            <?php echo $currency_symbol .  number_format(($schoolRegDetails['price'] - $schoolRegDetails['discount']), 2, '.', ''); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group btn-group-sm d-print-none mt-5">
                            <button class="btn btn-primary" onclick="fn_printElem('invoiceDiv')"><i
                                    class="fas fa-print"></i> Print</button>
                            <a href="<?php echo base_url('saas_website/invoicePDFDownload/' . $schoolRegDetails['reference_no']) ?>"
                                class="btn btn-1"><i class="fas fa-download"></i> Download</a>
                            <?php if ($schoolRegDetails['payment_status'] == 0) { 
                                if ($schoolRegDetails['payment_data'] != 'olp') {?>
                            <a href="<?php echo base_url('saas_payment/index/' . $schoolRegDetails['reference_no']) ?>"
                                class="btn btn-primary"><i class="fas fa-credit-card"></i> Pay Now</a>
                            <?php } } ?>
                        </div>
                    </div>
                    <div class="text-center mt-4"><a href="<?php echo base_url() ?>"><i class="fas fa-angle-double-left"></i> Back To Home</a></div>
                </section>
            </div>
        </div>
        <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/select2/js/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
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
            confirmButtonClass: 'btn btn-1',
            buttonsStyling: false,
            timer: 8000
        })
        </script>
        <?php endif; ?>

        <script type="text/javascript">
        var base_url = '<?php echo base_url() ?>';

        function fn_printElem(elem, html = false) {
            var oContent = document.getElementById(elem).innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1
                .contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            //create a new HTML document.
            frameDoc.document.write('<html><head><title></title>');
            frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'assets/frontend/css/bootstrap.min.css">');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(oContent);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function() {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
            }, 500);
            return true;
        }
        </script>
    </body>
</html>