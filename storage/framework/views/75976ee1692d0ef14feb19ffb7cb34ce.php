<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo app('translator')->get('app.menu.bankaccount'); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="Bank Statement">

    <?php if(invoice_setting()->locale == 'ru'): ?>
    <style>
        body {
            margin: 0;
            font-family: dejavu sans;
            font-size: 12px;
        }
    </style>
    <?php else: ?>
    <style>
        body {
            margin: 0;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
    </style>
    <?php endif; ?>

    <style>
        table {
            border-collapse: collapse;
            border: 1px solid #e7e9eb;
        }

        th,
        td {
            border: 1px solid #e7e9eb;
            padding: 3px 5px;
            text-align: left;
        }

        td {
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #F2F4F7;
        }

        table.bank-table {
            table-layout: auto;
            width: 100%;
        }

        #items {
            margin-top: 30px;
        }

        #memo {
            height: 85px;
        }

        #memo .logo {
            float: left;
        }

        #memo .logo img {
            height: 35px;
        }

        #memo .account-info {
            /*float: right;*/
            text-align: right;
            line-height: 18px;
            font-size: 13px;
        }

        #memo .account-info span {
            font-size: 11px;
            display: inline-block;
            min-width: 20px;
            width: 100%;
        }

        #memo:after {
            content: '';
            display: block;
            clear: both;
        }

        #sums table {
            width: 50%;
            float: right;
            margin-top: 30px;
            border-style: none;
        }

        #sums table tr th,
        #sums table tr td {
            min-width: 100px;
            padding: 3px 5px;
        }

        #sums table tr th {
            width: 100%;
            font-weight: bold;
        }

        .clearfix {
            display: block;
            clear: both;
        }
    </style>
</head>

<body>
    <div id="container">
        <section id="memo">
            <div class="logo">
                <img src="<?php echo e($statements->bank_logo ? $statements->file_url : invoice_setting()->logo_url); ?>"
                    style="height: 35px; width:35px;" />
            </div>
            <div class="account-info">
                <div>
                    <?php if($statements->type == 'bank'): ?>
                    <?php echo e($statements->bank_name); ?> <br>
                    <?php endif; ?>
                    <?php echo e($statements->account_name); ?>

                </div>
            </div>

        </section>

        <?php if($statements->type == 'bank'): ?>
        <div id="bank-info">
            <table class="bank-table" cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo app('translator')->get('modules.bankaccount.accountType'); ?></th>
                    <th><?php echo app('translator')->get('modules.bankaccount.accountNumber'); ?></th>
                    <th><?php echo app('translator')->get('modules.bankaccount.bankBalance'); ?> (<?php echo htmlentities($statements->currency->currency_code); ?>)</th>
                </tr>
                <tr>
                    <td><?php echo e($statements->account_type); ?></td>
                    <td><?php echo e($statements->account_number); ?></td>
                    <td><?php echo e(currency_format($statements->bank_balance, $statements->currency_id, false)); ?></td>
                </tr>
            </table>
        </div>
        <?php endif; ?>

        <h5><?php echo e(trans('modules.bankaccount.statementDetail', [ 'accountType' => $statements->account_type, 'accountNumber'
            => $statements->account_number, 'currency' => $statements->currency->currency_name, 'startDate' => $sDate,
            'endDate' => $eDate])); ?></h5>

        <section id="items">
            <table class="bank-table" cellpadding="0" cellspacing="0">

                <tr>
                    <th><?php echo app('translator')->get('app.date'); ?></th>
                    <th><?php echo app('translator')->get('modules.bankaccount.particulars'); ?></th>
                    <th><?php echo app('translator')->get('modules.bankaccount.withdraw'); ?></th>
                    <th><?php echo app('translator')->get('modules.bankaccount.deposit'); ?></th>
                    <th><?php echo app('translator')->get('modules.bankaccount.bankBalance'); ?> (<?php echo htmlentities($statements->currency->currency_code); ?>)</th>
                    <th><?php echo app('translator')->get('app.title'); ?></th>
                </tr>

                <?php $__currentLoopData = $statements->transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if($transaction->transaction_relation == 'payment'){
                    $title = __('modules.bankaccount.'.$transaction->title).' (
                    '.$transaction->transaction_relation.'-'.$transaction->transaction_related_to.' )';
                    }
                    elseif($transaction->transaction_relation == 'expense'){
                    $title = __('modules.bankaccount.'.$transaction->title).' (
                    '.$transaction->transaction_related_to.' )';
                    }
                    else {
                    $title = __('modules.bankaccount.'.$transaction->title);
                    }
                    ?>
                    <tr>
                        <td><?php echo e($transaction->transaction_date->translatedFormat($company->date_format)); ?></td>
                        <td>
                            <?php if(!is_null($transaction->payment_id) || $transaction->transaction_relation == 'payment'): ?>
                            <?php echo app('translator')->get('app.payment'); ?>
                            <?php endif; ?>
                            <?php if(!is_null($transaction->expense_id) || $transaction->transaction_relation == 'expense'): ?>
                            <?php echo app('translator')->get('app.expense'); ?>
                            <?php endif; ?>
                            <?php if((is_null($transaction->payment_id) && is_null($transaction->invoice_id) &&
                            is_null($transaction->expense_id)) && ($transaction->transaction_relation == 'bank')): ?>
                            <?php echo app('translator')->get('app.menu.bankaccount'); ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($transaction->type == 'Dr'): ?>
                            <?php echo e(currency_format($transaction->amount, $statements->currency_id, false)); ?>

                            <?php else: ?>
                            <?php echo e(currency_format(0, $statements->currency_id, false)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($transaction->type == 'Cr'): ?>
                            <?php echo e(currency_format($transaction->amount, $statements->currency_id, false)); ?>

                            <?php else: ?>
                            <?php echo e(currency_format(0, $statements->currency_id, false)); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e(currency_format($transaction->bank_balance, $statements->currency_id, false)); ?></td>
                        <td><?php echo e($title); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>

        </section>
        <section id="sums">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo app('translator')->get('app.totalBankBalance'); ?> (<?php echo htmlentities($statements->currency->currency_code); ?>)</th>
                    <td><?php echo e(currency_format($statements->bank_balance, $statements->currency_id, false)); ?></td>
                </tr>

            </table>
            <div class="clearfix"></div>
        </section>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\bank-account\pdf\statement.blade.php ENDPATH**/ ?>