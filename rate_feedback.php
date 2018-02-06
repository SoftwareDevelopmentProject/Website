<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Free Adidas Website Template | Checkout :: w3layouts</title>
    <?php include "_head.php"; ?>
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="admin/css/bootstrap-table.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<?php include "_header.php";
$db->rateFeedback($user['member_id'], $_GET['id'], $_GET['scale']);
echo '<script>window.location.replace("singles/'.$_GET['book_id'].'");</script>';
?>

</body>