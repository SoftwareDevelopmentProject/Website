<?php
    $page = 'staff';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Staff</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php'; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li>Staff</li>
			</ol>
		</div><!--/.row-->
		<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $result = $db->up_staff($_POST['id'],$_POST['role']);
		/*if ($result) {
			echo 'Updated';
		} else {
			echo 'no';
		}*/
    }
?>
		<div class="padding">
			<table class="padding" style="">
			<tr>
				<td colspan="7" align="right"><button onclick="window.open('add_staff.php','_self')" class="btn btn-primary btn-md">Add New Staff</button></td>
			</tr>
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="35%" class="staff_td">Name</td>
					<td width="5%" class="staff_td">Phone</td>
					<td width="20%" class="staff_td">Email</td>
					<td width="50%" class="staff_td">Address</td>
					<td width="5%" class="staff_td">Role</td>
					<td></td>
					<td></td>
				</tr>
				<?php
					$staffs = $db->get_staff();
					foreach($staffs as $staff) {
					
				
						echo "<tr>";
						echo "<td>";
						echo $staff['staff_name'];
						echo "</td>";
						echo "<td>";
						echo $staff['staff_phone'];
						echo "</td>";
						echo "<td>";
						echo " <a href=\"mailto:" .$staff['staff_email']. "\">". $staff['staff_email'] . "</a> ";
						echo "</td>";
						echo "<td>";
						echo $staff['staff_address'];
						echo "</td>";
						echo "<td>";
						echo '
							<form action="staff.php" method="post">
								<select name="role" required class="drop_down">
									<option value="0" ';
									if ($staff['staff_role']==0){
										echo'selected';
									}
									echo '>Staff</option><option value="1"';
									if ($staff['staff_role']==1){ 
										echo'selected';
									} 
									 echo '>Admin</option></select><input type="hidden" name="id" value="'.$staff['staff_id'].'">';
						echo "</td>";
						echo '<td><input type="submit" value="Save"></form>';
						echo "</td>";
						echo "<td>";
						echo 
							'<form id="delete' . $staff['staff_id'] . '" action="delete_member.php" method="post"><input type="button" value="Delete" onClick="R_U_Sure(' . $staff['member_id'] . ',\''.$staff['staff_name'].')" class="btn">
							<input type="hidden" name="id" value="'.$staff['staff_id'].'"></form>';
								echo '</td></tr>';
								}
								?>
								</table>
								<script>
									function R_U_Sure(id,name) {
										var x = confirm("Are you sure to remove " + name + " " + "?");
										if (x) {
											document.getElementById("delete" + id).submit();
										}
									}
									
								</script>
			  			
						</div>
		
            <?php include_once '_footer.php'; ?>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>