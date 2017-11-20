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
		
		<div class="padding">
			<?php require_once("conn.php");
				$result = mysqli_query($con,"SELECT * FROM staff ORDER BY staff_role");
				?>
			<table class="padding">
				<tr class="staff_tr" style="color: #fff;
    background-color: #30a5ff; border-radius:1em; border:20">
					<td width="35%" class="staff_td">Name</td>
					<td width="10%" class="staff_td">Phone</td>
					<td width="25%" class="staff_td">Email</td>
					<td width="50%" class="staff_td">Address</td>
					<td width="10%" class="staff_td">Role</td>
					<td></td>
					<td></td>
				</tr>
				<?php
					while($row = mysqli_fetch_array($result))	{
						echo "<tr>";
						echo "<td>";
						echo $row['staff_name'];
						echo "</td>";
						echo "<td>";
						echo $row['staff_phone'];
						echo "</td>";
						echo "<td>";
						echo " <a href=\"mailto:" .$row['staff_email']. "\">". $row['staff_email'] . "</a> ";
						echo "</td>";
						echo "<td>";
						echo $row['staff_address'];
						echo "</td>";
						echo "<td>";
						echo '
							<form action="update_role.php" method="post">
								<select name="role" required class="drop_down">
									<option value="0" ';
									if ($row['staff_role']==0){
										echo'selected';
									}
									echo '>Staff</option><option value="1"';
									if ($row['staff_role']==1){ 
										echo'selected';
									} 
									 echo '>Admin</option></select><input type="hidden" name="id" value="'.$row['staff_id'].'">';
						echo "</td>";
						echo '<td><input type="submit" value="Save"></form>';
						echo "</td>";
						echo "<td>";
						echo 
							'<form id="delete' . $row['staff_id'] . '" action="delete_member.php" method="post"><input type="button" value="Delete" onClick="R_U_Sure(' . $row['member_id'] . ',\''.$row['staff_name'].')" class="btn">
							<input type="hidden" name="id" value="'.$row['staff_id'].'"></form>';
								echo '</td></tr>';
								}
								mysqli_close($con); //to close the database connection
								?>
								</table>
								<button onclick="window.open('my_account.php','_self')" class="btn">Back</button>
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