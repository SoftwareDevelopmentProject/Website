<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Technology BookStore:Order Details</title>
    <?php include"_head.php";?>
</head>

<body>
<?php include "_header.php";?>
<div class="login">
    <div class="wrap" style="margin-bottom: 50px;">

        <table class="table">
            <tr>
                <th class="fixed-table-header">Transaction Number</th>
                <th class="fixed-table-header">Book Title</th>
                <th class="fixed-table-header">Book Price</th>
                <th class="fixed-table-header">Quantity</th>
            </tr>
            <?php
            $order_detail = $db->getOrderdetails($_GET['order_id']);
            foreach($order_detail as $o){
            ?>
            <tr>
                <td><?php echo $o['order_transaction_id'];?></td>
                <td><?php echo '<img src="images/products/'.$o['book_id'].'" alt="">';?></td>
                <td><?php echo $o['book_title'];?></td>
                <td><?php echo $o['book_price'];?></td>
                <td><?php echo $o['order_detail_quantity'];?></td>
            </tr>
            <?php  }?>
        </table>


    </div>
</div>
<?php include "_footer.php"?>
</body>
</html>