<?php
session_start();
$page = 'message';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Member</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

<?php include_once '_header.php';?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><em class="fa fa-home"></em></a></li>
            <li><a href="memberReport.php">Messages</a></li>
        </ol>
    </div><!--/.row-->

    <div class="padding" style="overflow: auto; height: auto;">
        <img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
        <h2>All Messages</h2>
        <table class="table table-hover">
            <tr>
                <td width="">Name</td>
                <td width="">Email</td>
                <td width="">Description</td>
                <td width="">Created</td>
            </tr>
            <?php
            $messages=$db->getContact();
            foreach ($messages as $message):
                ?>
                <tr>
                    <td><?php echo $message['name']; ?></td>
                    <td><?php echo $message['email']; ?></td>
                    <td><?php echo $message['description']; ?></td>
                    <td><?php echo $message['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>


    <?php include_once '_footer.php'; ?>

</div>	<!--/.main-->
</body>
</html>