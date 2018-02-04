<?php
session_start();

?>
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
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="admin/css/bootstrap-table.css" rel="stylesheet" type="text/css" media="all" />
</head>
<?php if(isset($_POST['clear'])){
    $db->setSession();
    header("Refresh:0");
}

if(isset($_POST['delete'])){
    $db->delCart($_POST['delete']);
    header("Refresh:0");
}?>
<body>
<?php include "_header.php";?>
<div class="login">
    <div class="wrap" style="margin-bottom: 50px;">
        <?php if (sizeof($_SESSION['cart']) > 0  ){?>
            <form method="post">
        <table class="table">
            <thead style="text-align: center;">
            <tr style="font-weight: bold;">
                <th class="fixed-table-header" style="text-align: center"></th>
                <th class="fixed-table-header" style="text-align: center">Image</th>
                <th class="fixed-table-header" style="text-align: center">Book Name</th>
                <th class="fixed-table-header" style="text-align: center">Price(RM)</th>
                <th class="fixed-table-header" style="text-align: center">Quantity</th>
                <th class="fixed-table-header" style="text-align: center">Subtotal</th>
                <th class="fixed-table-header" style="text-align: center"></th>

            </tr>
            </thead>
            <?php
                $cart = $db->viewCart();
                $total = 0;
                foreach ($cart as $book) {
                    $subtotal = $book['book_price'] * $book['quantity'] ;
                    $total+=$subtotal;
                    ?>

                <tr>
                  <td style="text-align: center"><input type="checkbox" name="book[<?php echo $book['book_id'];?>]" value="<?php echo $book['quantity'];?>"/></td>
                  <td style="width: 220px;text-align: center"><img src="images/products/<?php echo $book['book_id'];?>.jpg" alt=""/></td>
                  <td style="text-align: center"><?php echo $book['book_title'];?></td>
                  <td style="text-align: center"><?php echo $book['book_price'];?></td>
                  <td style="text-align: center"><?php echo $book['quantity'];?></td>
                  <td style="text-align: center"><?php echo $subtotal;?></td>
                  <td style="text-align: center"><i onclick="document.getElementById('deleteItemId').value = '<?php echo $book['book_id'];?>'; document.getElementById('deleteItem').submit();" class="fa fa-trash"></i></td>
              </tr>


<?php
                }

            ?>
            <tr style="font-weight: bold;">
                <td ></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">Total</td>
                <td style="text-align: center"><?php echo $total; ?></td>
                <td></td>

            </tr>
        </table>

        <div class="" style="margin-top: 10px;">
            <button class="btn btn-primary btn-sm" style="float: right;margin-left: 20px;" onclick="window.location.replace('checkout.php')">Checkout</button>

            <button name="clear" class="btn btn-primary btn-sm" style="float: right;">Clear</button>
            </form>
        </div>
        <?php }else if(!isset($_SESSION['cart'])){
            echo'<h4 class="title">Shopping cart is empty</h4>
    	     <p class="cart">You have no items in your shopping cart.<br>Click<a href="index.php"> here</a> to continue shopping</p>';
            }else{
            echo'<h4 class="title">Shopping cart is empty</h4>
    	     <p class="cart">You have no items in your shopping cart.<br>Click<a href="index.php"> here</a> to continue shopping</p>';
        }?>
    </div>
</div>
<form id="deleteItem" method="post">
    <input id="deleteItemId" name="delete" value="" type="hidden" />
</form>
<?php include "_footer.php"?>
</body>
</html>