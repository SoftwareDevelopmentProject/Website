<?php
include_once '../include/DbFunction.php';
$db = new DbFunction;
$month = $db->getMemberMonth($_GET['year']);
echo '<option value="month">Month</option>';
foreach($month as $m) {
	echo '<option value="'.$m.'">' . $m . '</option>';
}

?>