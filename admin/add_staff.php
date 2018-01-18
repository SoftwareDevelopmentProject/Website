<?php
    session_start();
    $page = 'staff';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Staff</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db->add_staff($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['role']);
    }

?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="staffs.php">Staff</a></li>
				<li class="active"><a href="add_staff.php">Add Staff</a></li>
			</ol>
		</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-heading">
			Add Staff
			<span class="pull-right clickable panel-toggle panel-button-tab-left panel-collapsed" id="click"><button onclick="window.location.replace('staffs.php','_self')" class="btn btn-primary btn-md" style="width: 100%">Back</button></span></div>
				<div class="panel-body" style="display: none;">
					<form class="form-horizontal" action="" method="post">
						<fieldset>
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
										<input id="email" name="email" type="text" placeholder="Email" class="form-control" required>
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
									<centre><button type="submit" class="btn btn-primary" style="margin-right: 20px">Submit</button></centre>
									<centre><button type="reset" class="btn btn-default">Reset</button></centre>
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
	
		
	</script>
		
</body>
</html>