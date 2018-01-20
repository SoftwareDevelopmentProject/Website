<?php
    session_start();
    $page = 'member report';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member report</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><em class="fa fa-home"></em></a></li>
				<li><a href="index.php">Report</a></li>
				<li><a href="memberReport.php">Member Report</a></li>
			</ol>
		</div><!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				
}
		?>
		<?php 
			$num=$db->reportCountMemberByMonth(date("m"));
		?>
		<!--progress bar-->
		<div class="panel panel-default ">
					<div class="panel-heading">
						Progress bars
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					
				</div>
				<!--//progress bar-->
		<!--dash board-->
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="width: 100%">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user-o color-blue"></em>
							<div class="large">Total Registered Member</div>
							<div class="large"><?php echo $num['all_member'];?></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="width: 20%">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large" style="font-size: 20px"><?php echo date("Y").'<br>December';?></div>
							<div class="large">
								<?php echo $num['m0'];?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-paddin" style="width: 40%">
					<div class="panel panel-red panel-widget ">
						<div class="panel-body">
							<div class="col-md-12 no-padding">
								<div class="row progress-labels">
									<div class="col-sm-6">Janary</div>
									<div class="col-sm-6" style="text-align: right;">80%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 80%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">Febuary</div>
									<div class="col-sm-6" style="text-align: right;">60%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 60%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">March</div>
									<div class="col-sm-6" style="text-align: right;">40%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 40%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">April</div>
									<div class="col-sm-6" style="text-align: right;">20%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-red" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">May</div>
									<div class="col-sm-6" style="text-align: right;">20%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-red" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-paddin" style="width: 40%">
					<div class="panel panel-red panel-widget ">
						<div class="panel-body">
							<div class="col-md-12 no-padding">
								<div class="row progress-labels">
									<div class="col-sm-6">New Orders</div>
									<div class="col-sm-6" style="text-align: right;">80%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 80%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">Comments</div>
									<div class="col-sm-6" style="text-align: right;">60%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 60%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">New Users</div>
									<div class="col-sm-6" style="text-align: right;">40%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 40%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">Page Views</div>
									<div class="col-sm-6" style="text-align: right;">20%</div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-red" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<!-- //dash board-->
			
		<div class="padding" style="overflow: auto; height: auto;">
			<tr><form method="post">
				<td colspan="11" align="right" height="50px" >
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="day" id="day" onChange="loadMemberByDay(this.value)" disabled>
					<option value="day">Day</option>
				</select>
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="month" id="month" onChange="loadDay(this.value)" disabled>
					<option value="month">Month</option>
				</select>
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="year" id="year" onChange="loadMonth(this.value)">
					<option value="year">Year</option>
					<?php  	
						$years=$db->getMemberYear();
						foreach ($years as $year):
							echo 
	'<option value="'.$year.'">'.$year.'</option>';
					endforeach;
					?>
				</select>
				</td>
			</tr></form>
			<h4>Member Report</h4>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white" id="table">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="">Member ID</td>
					<td width="">Member Name</td>
					<td width="">Created at</td>
					<td width="">Status</td>
					<td width="">Positive Feedback</td>
					<td width="">Negative Feedback</td>
				</tr>
				<?php
					$members=$db->reportGetMember();
					foreach ($members as $member):
                ?>
					<tr>
						<td><?php echo $member['member_id']; ?></td>
						<td><?php echo $member['member_name']; ?></td>
                        <td><?php echo $member['member_created_time']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
        </div>
						
				
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	
	<script>
		//filter fuction 
			function loadAllMemberReport() {
				  var xhttp; 
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("table").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "getMemberReport?year=all&act=report", true);
				  xhttp.send();
				}
		
			function loadMonth(year) {
				  var xhttp;    
				  if (year == "year") {
					$('#month').attr('disabled', 'disabled');
					$('#month option[value="month"]').attr('selected', 'selected');
					$('#day').attr('disabled', 'disabled');
					$('#day option[value="day"]').attr('selected', 'selected');
					loadAllMemberReport();
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						$('#month').removeAttr('disabled');
						document.getElementById("month").innerHTML = this.responseText;
						loadMemberByYear(year);
					}
				  };
				  xhttp.open("GET", "getMemberMonth?year="+year+"&act=report", true);
				  xhttp.send();
				}
			function loadMemberByMonth(month){
				var xhttp; 
				var year = $('#year').val();
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById('table').innerHTML=this.responseText;
							}
						};
					xhttp.open("GET", "getMemberByMonth?month="+month+"&year="+year+"&act=report", true);
					xhttp.send();
				}

		
			function loadMemberByYear(year){
				 	var xhttp;    
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById('table').innerHTML=this.responseText;
							}
					  };
					xhttp.open("GET", "getMemberByYear?year="+year+"&act=report", true);
					xhttp.send();
			}

			function loadDay(month) {
					  var xhttp;    
					  if (month == "month") {
						$('#day').attr('disabled', 'disabled');
						$('#day option[value="day"]').attr('selected', 'selected');
						loadMemberByYear($('#year').val());
						return;
					  }
					  xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							$('#day').removeAttr('disabled');
							document.getElementById("day").innerHTML = this.responseText; 
							loadMemberByMonth(month);
						}
					  };
					  xhttp.open("GET", "getMemberDay?day="+month+"&act=report", true);
					  xhttp.send();
					}
			function loadMemberByDay(day){
				 	var xhttp;
					var month = $('#month').val();
					var year = $('#year').val();
					if (day == "day") {
						loadMemberByMonth(month);;
						return;
					  }
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById('table').innerHTML=this.responseText;
							}
					  };
					xhttp.open("GET", "getMemberByDay?day="+day+"&month="+month+"&year="+year+"&act=report", true);
					xhttp.send();
			}
		
		
	</script>
	

</body>
</html>