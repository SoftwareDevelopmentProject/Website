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
			$num=$db->reportCountMemberByMonth(date("m"),date("o"));
		?>

		<!--dash board-->
		<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
		<h2>Member Report</h2>
		<div class="panel panel-container" style="margin-top: 30px;text-shadow: 2px 2px white;font-weight: 500">
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
						<div class="row no-padding">
							<div class="large" style="font-size: 20px"><?php echo date("Y").'<br>Total New Member';?></div>
							<div class="large">
								<?php echo $num['y'];?>
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
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m0'].' ('.($num['m0']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m0']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">Febuary</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m1'].' ('.($num['m1']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m1']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">March</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m2'].' ('.($num['m2']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m2']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">April</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m3'].' ('.($num['m3']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m3']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">May</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m4'].' ('.($num['m4']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m4']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">June</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m5'].' ('.($num['m5']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m5']/$num['y']*100).'%';?>%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
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
									<div class="col-sm-6">July</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m6'].' ('.($num['m6']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m6']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">August</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m7'].' ('.($num['m7']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m7']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">Septemper</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m8'].' ('.($num['m8']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m8']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">October</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m9'].' ('.($num['m9']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m9']/$num['y']*100).'%';?>%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">November</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m10'].' ('.($num['m10']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m10']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="row progress-labels">
									<div class="col-sm-6">December</div>
									<div class="col-sm-6" style="text-align: right;"><?php echo $num['m11'].' ('.($num['m11']/$num['y']*100).'%)';?></div>
								</div>
								<div class="progress">
									<div data-percentage="0%" style="width: <?php echo ($num['m11']/$num['y']*100).'%';?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
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
			<h2>Member Report</h2>
			<table class="table table-hover">
				<tr>
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