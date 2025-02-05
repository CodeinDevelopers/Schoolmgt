<?php
$currency_symbol = $global_config['currency_symbol'];
$paymentDetails = json_decode($schoolRegDetails['payment_data'], true);
$expiryDate = $this->saas_model->getPlanExpiryDate($schoolRegDetails['package_id']);
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
        <link rel="stylesheet" media="all" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
    </head>

    <body>
        <style type="text/css">
        body {
            width: 750px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

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
            border: 1.5px solid #4c4c4c;
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

        table td h3,
        h3 {
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        .text-center {
            text-align: center !important;
        }

        .invoice-container {
            padding: 45px 45px 70px 45px;
        }

        .invoice-col {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .invoice-col {
            float: left;
            width: 45%;
        }

        .invoice-col.right {
            float: right;
            text-align: right;
        }

        .invoice-container .invoice-status {
            text-transform: uppercase;
            font-size: 24px;
            font-weight: bold;
        }

        .invoice-container .small-text {
            font-size: 0.9em;
        }

        .unpaid {
            border: 1px solid #f53d3d;
            padding: 10px;
            width: 130px;
            float: right;
            color: #f53d3d;
        }
        .paid {
            border: 1px solid #21a120;
            padding: 10px;
            width: 120px;
            float: right;
            color: #21a120;
        }

        .text-right {
            text-align: right;
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
            color: #eee;
        }
        </style>
        <div class="invoice-container">
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
                        <p class="paid">Paid</p>
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
                    <span class="small-text">
                        <?php echo $schoolRegDetails['payment_data'] == 'olp' ? 'Offline Payment' : '-'; ?>
                    </span>
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
                    <?php } } ?>
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
                        <td class="text-right"><?php echo $currency_symbol . number_format($schoolRegDetails['price'], 2, '.', ''); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="invoice-summary text-right">
                <div style="width: 50%; float: right;">
                    <ul class="amounts">
                        <li><strong>Sub Total :</strong> <?php echo $currency_symbol . number_format($schoolRegDetails['price'], 2, '.', ''); ?></li>
                        <li><strong>Discount :</strong> <?php echo $currency_symbol . number_format($schoolRegDetails['discount'], 2, '.', ''); ?></li>
                        <li><strong>Paid : </strong> <?php echo $currency_symbol . number_format($schoolRegDetails['payment_amount'], 2, '.', ''); ?></li>
                        <li><strong>Total : </strong> <?php echo $currency_symbol .  number_format(($schoolRegDetails['price'] - $schoolRegDetails['discount']), 2, '.', ''); ?></li>
                    </ul>
                </div>
            </div>
            <div style="margin-top: 50px;">
                <P class="text-center">PDF Generated on <?php echo date('l, F jS, Y') ?></P>
            </div>
        </div>
    </body>
</html>