<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Technology BookStore:Order Details</title>
    <?php include"_head.php";?>
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="admin/css/bootstrap-table.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<?php include "_header.php";?>
<div class="login">
    <div class="wrap" style="margin-bottom: 50px;">

        <table class="table">
            <tr>
                <th class="fixed-table-header">Transaction Number</th>
                <th></th>
                <th class="fixed-table-header">Book Title</th>
                <th class="fixed-table-header">Book Price</th>
                <th class="fixed-table-header">Quantity</th>
                <th class="fixed-table-header">Subtotal(RM)</th>

            </tr>
            <?php
            $order_detail = $db->getOrderdetails($_GET['order_id']);

            foreach($order_detail as $o){
                $subtotal = $o['book_price']*$o['order_detail_quantity'];
                $total = 0;
                $total +=$subtotal;

            ?>
            <tr>
                <td><?php echo $o['order_transaction_id'];?></td>
                <td><a href="singles/<?php echo $o['book_id']; ?>"><?php echo '<img src="images/products/'.$o['book_id'].'" alt="">';?></a></td>
                <td><?php echo $o['book_title'];?></td>
                <td><?php echo $o['book_price'];?></td>
                <td><?php echo $o['order_detail_quantity'];?></td>
                <td><?php echo $subtotal?></td>
            </tr>
            <?php  }?>
            <tr>
                <td>Total(RM)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $total; ?></td>
            </tr>
        </table>


    </div>
</div>
<?php include "_footer.php"?>
</body>
</html>