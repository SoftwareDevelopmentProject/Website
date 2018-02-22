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
    <title>Technology BookStore:Make Payment</title>
    <?php include "_head.php";?>
</head>

<body>
<?php include "_header.php";?>
<?php
if($user == null){
    echo'<script>alert("Please login before checkout")</script>';
    echo '<script>window.location.replace("login.php")</script>';
}else{
    if(isset($_POST['checkoutdetails'])) {
        $checkout_cart = json_decode($_POST['checkout'], true);
        $transaction_id = rand(10000, 99999);
        $order_id = $db->checkout($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['pm'], $_POST['discount'], $transaction_id, $_SESSION['user']);
        foreach ($checkout_cart as $cart) {
            $db->insertOrderdetails($order_id, $cart['book_id'], $cart['quantity']);
            $db->delCart($cart['book_id']);
        }
        switch($_POST['discount']) {
            case 5:
                $point = 100;
                break;
            case 20:
                $point = 300;
                break;
            case 50:
                $point = 500;
                break;
            case 110:
                $point = 1000;
                break;
            default:
                $point = 0;
        }

        $db->deductPoint($user['member_id'], $point);

        echo '<script>alert("Checkout Sucessfully!!")</script>';
        echo '<script>window.location.replace("index.php")</script>';

    }

    ?>
<div class="register_account" style="margin-bottom: 50px;">
    <div class="wrap">
        <h4 class="title">Checkout </h4>
        <form method="post" style="width: 100%" >
            <center>
            <div class="col_1_of_1 span_1_of_1" style="margin: auto">
                <div><label>RecipentName</label></div><div><input type="text" name ="name" style="width: 50%;"></div>
                <div><label>RecipentEmail</label></div><div><input type="text" name ="email" style="width: 50%;"></div>
                <div><label>RecipentPhone</label></div><div><input type="text" name="phone" style="width: 50%; "></div>
                <div><label>RecipentAddress</label></div><div><input type="text" name="address" style="width: 50%;"></div>
                    <div><label>PaymentMethod</label></div><div><select name="pm" style="width: 50%;" onchange="if(this.value === 'CreditCard') document.getElementById('card').style.display = 'block'; else document.getElementById('card').style.display = 'none';">
                        <option>Please Select</option>
                        <option value="Cash">Delivery on Cash</option>
                        <option value="CreditCard">Credit Card</option>
                    </select></div>
               <div style="display: none" id="card">
                   <div><label>CreditCard Number</label></div>
                   <div>
                       <input type="text" name ="creditcard" placeholder="16DigitNumber" style="width: 31%;margin-right: 10px;">
                       <input type="text" placeholder="CVV" style="width: 7%;margin-right: 10px;">
                       <input type="text" placeholder="MM/YY" style="width: 10%;">
                   </div>
               </div>
            </div>

            </center>
            <div style="float: right">
                <input type="submit" name="checkoutdetails" class="grey" value="Continue" />
                <input type="hidden" value='<?php echo $_POST['checkout']; ?>' name="checkout"/>
                <input type="hidden" value="<?php echo $_POST['discount']; ?>" name="discount"/>
            </div>
            <div class="clear"></div>

            <p class="terms"></p>
        </form>
    </div>
</div>
<?php include "_footer.php";?>
<?php }?>
</body>
</html>