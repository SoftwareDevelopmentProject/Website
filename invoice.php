<!doctype html>
<?php
include_once 'include/DbFunction.php';
$db = new DbFunction();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Technology Bookstore: Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<?php
 $user_order = $db->getOrderbyorderid($_GET['order_id']);
?>
<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            <img src="images/logo.png" style="width:100%; max-width:300px;">
                        </td>

                        <td>
                            Invoice :<?php echo $user_order['order_transaction_id'];?><br>
                            Created: <?php echo $user_order['order_created_time'];?><br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            Technology Park Book Store<br>
                            Technology Park Malaysia<br>
                            57000 Bukit Jalil
                        </td>

                        <td>
                            <?php echo $user_order['order_recipient_name'];?><br>
                            <?php echo $user_order['order_recipient_address'];?><br>
                            <?php echo $user_order['order_recipient_email'];?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="3">
                Payment Method
            </td>

            <td>
                <?php echo $user_order['order_payment_method'];?>
            </td>
        </tr>

        <tr class="details">
            <td>

            </td>

            <td>

            </td>
        </tr>

        <tr class="heading">
            <td>
                Item
            </td>
            <td style="text-align: center;">Quantity</td>
            <td style="text-align: center;">
                Price(RM)
            </td>
            <td style="text-align: center;">Subtotal(RM)</td>
        </tr>
        <?php
        $order_detail = $db->getOrderdetails($_GET['order_id']);
        $total = 0;
        foreach($order_detail as $o){?>

        <tr class="item">
            <td>
                <?php echo $o['book_title'];?>
            </td>
            <td style="text-align: center;">
                <?php echo $o['order_detail_quantity'];?>
            </td>
            <td style="text-align: center;">
                <?php echo $o['book_price'];?>
            </td>
            <td style="text-align:center;">
                <?php $subtotal = $o['book_price']*$o['order_detail_quantity'];
                echo $subtotal;?>
            </td>
        </tr>
        <?php
            $total+=$subtotal;}?>
        <tr class="item">
            <td></td>
            <td></td>
            <td style="text-align: center;font-weight: bold;">Total</td>
            <td style="text-align: center;font-weight: bold;"><?php
                echo $total;
                ?></td>
        </tr>
    </table>
</div>
<script>window.print();</script>
</body>
</html>