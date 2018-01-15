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
        <?php if (isset($_SESSION['cart'])) {?>
        <table class="table">
            <tr>
                <th class="fixed-table-header">Image</th>
                <th class="fixed-table-header">Book Name</th>
                <th class="fixed-table-header">Price</th>
                <th class="fixed-table-header">Quantity</th>
                <th class="fixed-table-header">Subtotal</th>
            </tr>
            <?php

                $cart = $db->viewCart();
                $total = 0;
                foreach ($cart as $book) {
                    $subtotal = $book['book_price'] * $book['quantity'] ;
                    $total+=$subtotal;
                    echo '<tr>
                  <td><img src="images/products/' . $book['book_id'] . '.jpg" alt=""/></td>
                  <td>' . $book['book_title'] . '</td>
                  <td>' . $book['book_price'] . '</td>
                  <td>' . $book['quantity'] . '</td>
                  <td>'.$subtotal.'</td>
                  <td></td>
              </tr> '
                    ;

                }



            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><?php echo $total; ?></td>

            </tr>
        </table>
        <div class="" style="margin-top: 10px;">
            <button class="btn btn-primary btn-sm" style="float: right;margin-left: 20px;" onclick="window.location.replace('checkout.php')">Checkout</button>
            <button class="btn btn-primary btn-sm" style="float: right;" onclick="">Clear</button>
        </div>
        <?php }else{
            echo'<h4 class="title">Shopping cart is empty</h4>
    	     <p class="cart">You have no items in your shopping cart.<br>Click<a href="index.php"> here</a> to continue shopping</p>';
        }?>
    </div>
</div>
<?php include "_footer.php"?>
</body>
</html>