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
    <title>Register</title>
    <?php include "_head.php";?>
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="admin/css/bootstrap-table.css" rel="stylesheet" type="text/css" media="all" />
</head>
<?php if(isset($_POST['oldpassword'],$_POST['newpassword'])){
    $changepassword =$db->changepassword($_SESSION['user'],$_POST['oldpassword'],$_POST['newpassword']);
    switch ($changepassword){
        case PASSWORD_UPDATED:
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Password Updated</div>';
            break;
        case PASSWORD_INCORRECT:
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Old Password are not correct.</div>';
            break;
        case PASSWORD_NULL:
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Please enter your old password or new password</div>';
            break;
    }
} ?>
<body>
<?php include "_header.php";?>

    <div class="register_account" style="margin-bottom: 50px;">
        <div class="wrap">
            <h4 class="title">Change Password </h4>
            <form method="post" style="width: 100%" >
                <center>
                    <div class="col_1_of_1 span_1_of_1" style="margin: auto">
                        <div ><label>Old Password</label></div><div><input type="password" name ="oldpassword" style="width: 35%;"></div>
                        <div style="margin-top: 15px;"><label>New Password</label></div><div><input type="password" name ="newpassword" style="width: 35%;"></div>
                        <div style="margin-top: 15px;"><label>Confirm Password</label></div><div><input type="password" name="confirmpassword" style="width: 35%; "></div>

                    </div>

                </center>
                <div style="float: right"><input type="submit" class="grey" value="Save" /></div>
                <div class="clear"></div>

                <p class="terms"></p>
            </form>
        </div>
    </div>
    <?php include "_footer.php";?>

</body>
    </html>
/**
 * Created by PhpStorm.
 * User: liyi
 * Date: 2/4/2018
 * Time: 1:17 AM
 */