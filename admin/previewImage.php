<?php 
include_once '../include/DbFunction.php';
$db = new DbFunction;
$db->previewImage($_GET['file']);
echo'<img src="../images/Products/preview.jpg" alt="/">';
?>
