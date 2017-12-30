<?php
include_once '../include/DbFunction.php';
$db = new DbFunction;
$date = $db->getMemberDate($_GET['date']);
echo '<option>Date</option>';
foreach($date as $d) {
	echo '<option value="'.$d.'">' . $d . '</option>';
}

?>