<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Free Adidas Website Template | Checkout :: w3layouts</title>
    <?php include"_head.php";?>
</head>

<body>
<?php include "_header.php";?>
<div class="login">
    <div class="wrap" style="margin-bottom: 50px;">

            <table class="table">
                <tr>
                    <th class="fixed-table-header">Transaction Number</th>
                    <th class="fixed-table-header">Recipient Name</th>
                    <th class="fixed-table-header">Recipient Phone</th>
                    <th class="fixed-table-header">Recipient Address</th>
                    <th class="fixed-table-header">Payment Method</th>
                    <th class="fixed-table-header">Time</th>
                    <th class="fixed-table-header">Order Status</th>

                </tr>
                <?php
                    $order = $db->getOrder($_SESSION['user']);
                ?>
                <tr>
                    <td><?php echo'<a href ="order_detail?order_id='.$order['order_id'].'">'.$order['order_transaction_id'].'</a>';?></td>
                    <td><?php echo $order['order_recipient_name']?></td>
                    <td><?php echo $order['order_recipient_phone']?></td>
                    <td><?php echo $order['order_recipient_address']?></td>
                    <td><?php echo $order['order_payment_method']?></td>
                    <td><?php echo $order['order_created_time']?></td>
                    <td><?php echo $order['order_status']?></td>
                </tr>
            </table>


    </div>
</div>
<?php include "_footer.php"?>
</body>
</html>