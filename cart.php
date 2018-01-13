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
    <div class="wrap">
        <table style="border: 1px;width: 80%;">
            <tr>
                <td>Image</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>
            <?php
            if (isset($_SESSION['cart'])) {
                $cart = $db->viewCart();
                foreach ($cart as $book) {
                    $subtotal = $book['book_price'] * $book['quantity'] ;
                    echo '<tr>
                  <td><img src="images/products/' . $book['book_id'] . '.jpg" alt=""/></td>
                  <td>' . $book['book_price'] . '</td>
                  <td>' . $book['quantity'] . '</td>
                  <td>'.$subtotal.'</td>
                  <td></td>
              </tr>';

                }
            }
            ?>
        </table>
    </div>
</div>
<?php include "_footer.php"?>
</body>
</html>