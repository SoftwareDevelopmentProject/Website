<?php
include_once '../include/DbFunction.php';
$db = new DbFunction;
$reports = $db->getMemberByYear($_GET['year']);
echo'<table><tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td>Member ID</td>
					<td>Member Name</td>
					<td>Created at</td>
					<td>Status</td>
					<td>Positive Feedback</td>
					<td>Negative Feedback</td>
				</tr>';
foreach($reports as $report) {
	echo 	'<tr><td>'.$report['member_id'].'</td>
			<td>'.$report['member_name'].'</td>
			<td>'.$report['member_created_time'].'</td>
            <td></td>
            <td></td>
            <td></td>
			</tr>
			';
}
echo '</table>';

?>