<?php
include("conn.php");

$sql = "UPDATE staff SET
role=$_POST[role]
WHERE staff_id=$_POST[id];";
if (mysqli_query($con, $sql)) {
mysqli_close($con);
header('Location: staffs.php');
}
?>