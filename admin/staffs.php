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
				<li><a href="staffs.php">Staff</a></li>
			</ol>
		</div><!--/.row-->
		<?php
		
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_staff_submit_btn'])){
			$result=$db->add_staff($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['role']);

			if ($result) {
				echo '<div id="popupBox" style="display:block">
						<div id="popupcontent" class="popup-content">
							<div class="popup-header">
								<span class="close">&times;</span>
								<h2>Successful</h2>
							</div>
							<div class="popup-body">
								Add staff successful !

							</div>
							<div class="popup-footer">
								<button class="btn btn-primary btn-md" id="ok" >OK</button>
							</div>
						</div>

					</div>';
			} else {
				echo '<div id="popupBox" style="display:block">
						<div id="popupcontent" class="popup-content">
							<div class="popup-header">
								<span class="close">&times;</span>
								<h2>Unsuccessful</h2>
							</div>
							<div class="popup-body" style="background-color:red">
								Add staff unsuccessful !

							</div>
							<div class="popup-footer">
								<button class="btn btn-danger btn-md" id="ok" style="background-color:red" >OK</button>
							</div>
						</div>

					</div>';
			}
		}else if (isset($_POST['save_staff_role'])){
			  $result= $db->up_staff($_POST['id'],$_POST['role']);
			if ($result) {
				echo '<div id="popupBox" style="display:block">
						<div id="popupcontent" class="popup-content">
							<div class="popup-header">
								<span class="close">&times;</span>
								<h2>Successful</h2>
							</div>
							<div class="popup-body">
								Change role successful !

							</div>
							<div class="popup-footer">
								<button class="btn btn-primary btn-md" id="ok" >OK</button>
							</div>
						</div>

					</div>';
			}else{
				echo '<div id="popupBox" style="display:block">
						<div id="popupcontent" class="popup-content">
							<div class="popup-header">
								<span class="close">&times;</span>
								<h2>Unsuccessful</h2>
							</div>
							<div class="popup-body" style="background-color:red">
								Change role unsuccessful !

							</div>
							<div class="popup-footer">
								<button class="btn btn-danger btn-md" id="ok" style="background-color:red" >OK</button>
							</div>
						</div>

					</div>';
				
				
			}
			
		}
    } 
?>
	<!--/.row--<div id="popupBox" style="display:block">
  					<div id="popupcontent" class="popup-content">
						<div class="popup-header">
      						<span class="close">&times;</span>
      						<h2>Update successful</h2>
    					</div>
    					<div class="popup-body">
      						Add staff successful !
      							
    					</div>
						<div class="popup-footer">
							<button class="btn-primary btn-md" id="ok">OK</button>
    					</div>
  					</div>

				</div>
				//-->
				
		<div class="padding" style="overflow: auto; height: auto;">
					<tr>
				<td colspan="7" align="right" height="50px" ><button style="float: right; margin: 10px 0;" id="addBtn" class="btn btn-primary btn-md">Add New Staff</button></td>
				
			</tr>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="20%" class="staff_td">Name</td>
					<td width="10%" class="staff_td">Phone</td>
					<td width="20%" class="staff_td">Email</td>
					<td width="30%" class="staff_td">Address</td>
					<td width="10%" class="staff_td">Role</td>
					<td width="5%" class="staff_td"></td>
					<td width="5%" class="staff_td"></td>
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
							<form action="" method="post">
								<select name="role" required class="drop_down" >
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
						echo '<td><input type="submit" class="btn btn-default btn-sm" id="" name="save_staff_role" value="Save"></form>';
						echo "</td>";
						echo "<td>";
						echo 
							'<form id="delete' . $staff['staff_id'] . '" action="" method="post"><input type="button" value="Delete" onClick="R_U_Sure(' . $staff['staff_id'] . ',\''.$staff['staff_name'].')" class="btn btn-default btn-sm">
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
						
		
				<!-- Form  -->
	<div id=filter>					
	<div class="panel panel-default" id="form">
		<div class="panel-heading" style="display: none">
			Add Staff
			<span class="pull-right close">&times;</span></div>
				<div class="panel-body" id="form-body">
					<form class="form-horizontal" method="post" id="realForm" >
						<fieldset style="padding: 20px; padding-right: 60px;">
						<h2>Add Staff </h2>
							<!-- Name input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Name</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
									</div>
							</div>

							<!-- Email input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">E-mail</label>
									<div class="col-md-9">
										<input id="email" name="email" type="email" placeholder="Email" class="form-control" required>
									</div>
							</div>

							<!-- phone body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone</label>
									<div class="col-md-9">
										<input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" required>
									</div>
							</div>
							<!-- address body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="address">Address</label>
									<div class="col-md-9">
										<textarea class="form-control" id="address" name="address" placeholder="Address" rows="5"></textarea>
									</div>
							</div>
							
							<!-- role body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="role">Select Role</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="role" id="role">
											<option value="0">Staff</option>
											<option value="1">Admin</option>
										</select>
										
									</div>
							</div>

							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right" style="text-align: center">
									<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="staffSub" value="Submit" name="add_staff_submit_btn">
									<button type="reset" class="btn btn-default" style="margin-right: 20px;">Reset</button>
									<input type="button" class="btn btn-default" value="Cancel" id="close" />
								</div>
							</div>
						</div>
					</div>
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
		$(document).ready(function() {
			document.getElementById('click').click();
		});
	
	
		var form = document.getElementById("form");
		var box = document.getElementById("popupBox");
		var boxBody = document.getElementById("popupcontent");
		var span = document.getElementsByClassName("close")[0];
		var btn = document.getElementById("addBtn");
		var cancel = document.getElementById("close");
		var ok = document.getElementById("ok");
		var formBody = document.getElementById("form-body");

		
		btn.onclick = function() {
			form.style.display = "block";

			

		}
			
			cancel.onclick = function() {
				formBody.style.animationName="animateback"; 
				formBody.style.animationDuration="0.4s";
				formBody.style.webkitAnimationDuration="0.4s";
				formBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					form.style.display = "none";
					formBody.style.animationName= formBody.style.webkitAnimationDuration = formBody.style.webkitAnimationName = formBody.style.animationDuration = "";
					
				}, 400);
				

		}
			
		window.onclick = function(event) {
			if (event.target == form) {
				
				formBody.style.animationName="animateback"; 
				formBody.style.animationDuration="0.4s";
				formBody.style.webkitAnimationDuration="0.4s";
				formBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					form.style.display = "none";
					formBody.style.animationName= formBody.style.webkitAnimationDuration = formBody.style.webkitAnimationName = formBody.style.animationDuration = "";
					
				}, 400);
				
			}
		}
		
		span.onclick = ok.onclick = function() {
				boxBody.style.animationName="animateback"; 
				boxBody.style.animationDuration="0.4s";
				boxBody.style.webkitAnimationDuration="0.4s";
				boxBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					box.style.display = "none";
					boxBody.style.animationName= boxBody.style.webkitAnimationDuration = boxBody.style.webkitAnimationName = boxBody.style.animationDuration = "";
					
				}, 400);
				

		}
			
		window.onclick = function(event) {
			if (event.target == box) {
				
				boxBody.style.animationName="animateback"; 
				boxBody.style.animationDuration="0.4s";
				boxBody.style.webkitAnimationDuration="0.4s";
				boxBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					box.style.display = "none";
					boxBody.style.animationName= boxBody.style.webkitAnimationDuration = boxBody.style.webkitAnimationName = boxBody.style.animationDuration = "";
					
				}, 400);
				
			}
		}
		
		
	</script>
	

</body>
</html>