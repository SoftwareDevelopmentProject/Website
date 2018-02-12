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
    <title>Checkout</title>
    <?php include"_head.php";?>
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="admin/css/bootstrap-table.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<?php include "_header.php";?>
<div class="login">
    <div class="wrap" style="margin-bottom: 50px;">
            <form method="post" action="payment.php">
        <table class="table">
            <thead style="text-align: center;">
            <tr style="font-weight: bold;">
                <th class="fixed-table-header" style="text-align: center">Image</th>
                <th class="fixed-table-header" style="text-align: center">Book Name</th>
                <th class="fixed-table-header" style="text-align: center">Price(RM)</th>
                <th class="fixed-table-header" style="text-align: center">Quantity</th>
                <th class="fixed-table-header" style="text-align: center">Subtotal</th>

            </tr>
            </thead>
            <?php
            $total = 0;
            $checkout = array();
            if (count($_POST['book']) <= 0) {
                echo "<script>window.location.replace('cart.php')</script>";
            }
                foreach ($_POST['book'] as $book_id) {
                    $book = $db->getBook($book_id);
                    $quantity = $db->cartgetQuantity($book_id);
                    $subtotal = $book['book_price'] * $quantity;
                    $total += $subtotal;
                    $c = array();
                    $c['book_id'] = $book_id;
                    $c['quantity'] = $quantity;
                    array_push($checkout, $c);
                    ?>
                <tr>
                  <td style="width: 220px;text-align: center"><img src="images/products/<?php echo $book_id;?>.jpg" alt=""/></td>
                  <td style="text-align: center"><?php echo $book['book_title'];?></td>
                  <td style="text-align: center"><?php echo $book['book_price'];?></td>
                  <td style="text-align: center"><?php echo $quantity;?></td>
                  <td style="text-align: center"><?php echo $subtotal;?></td>
              </tr>


<?php
                }

            ?>
            <tr style="font-weight: bold;">
                <td style="text-align: center;">Apply Discount</td>
                <td>
                    <select name="discount" onchange="document.getElementById('cartTotal').innerHTML = (<?php echo $total; ?> - parseInt(this.value)).toFixed(2)">
                        <option value="0">No discount</option>
                        <option value="5" <?php if(($user['member_reward_points'] < 100) || ($total < 5)) echo 'disabled'; ?>>RM 5 (100 points)</option>
                        <option value="20" <?php if(($user['member_reward_points'] < 300) || ($total < 20)) echo 'disabled'; ?>>RM 20 (300 points)</option>
                        <option value="50" <?php if(($user['member_reward_points'] < 500) || ($total < 50)) echo 'disabled'; ?>>RM 50 (500 points)</option>
                    </select>
                </td>
                <td></td>
                <td style="text-align: right">Total</td>
                <td style="text-align: center" id="cartTotal"><?php echo $total; ?></td>

            </tr>
        </table>



        <div class="" style="margin-top: 10px;">
            <button name="payment" class="btn btn-primary btn-sm" style="float: right;margin-left: 20px;">Proceed to Payment</button>
            <input type="hidden" value='<?php echo json_encode($checkout); ?>' name="checkout" />
            </form>

        </div>
    </div>
</div>
<form id="deleteItem" method="post">
    <input id="deleteItemId" name="delete" value="" type="hidden" />
</form>

<?php include "_footer.php"?>
</body>
</html>