<?php
include_once '../include/DbFunction.php';
$db = new DbFunction;
$date = $db->getMemberDate($_GET['day']);
echo '<option value="day">Day</option>';
foreach($date as $d) {
	echo '<option value="'.$d.'">' . $d . '</option>';
}

?>