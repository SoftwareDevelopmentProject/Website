<?php
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
			
		<div class="padding" style="overflow: auto; height: auto;">
			<tr><form method="post">
				<td colspan="11" align="right" height="50px" >
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="date" id="date" disabled>
					<option value="">Date</option>
				</select>
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="month" id="month" onChange="loadDate(this.value)" disabled>
					<option>Month</option>
				</select>
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="year" onChange="loadMonth(this.value)">
					<option value="">Year</option>
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
			function loadMemberByYear(year){
						var xhttp;    
						xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								alert(this.resoponseText);
								}
						  };
						xhttp.open("GET", "getMemberByYear?year="+year, true);
						xhttp.send();
				}
			function loadMonth(year) {
				  var xhttp;    
				  if (year == "Year") {
					$('#month').attr('disabled', 'disabled');
					  
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
				  xhttp.open("GET", "getMemberMonth?year="+year, true);
				  xhttp.send();
				}
			function loadMemberByYear(year){
				 	var xhttp;    
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById('table').innerHTML=this.responseText;
							alert(this.responseText);

							}
					  };
					xhttp.open("GET", "getMemberByYear?year="+year, true);
					xhttp.send();
			}

			function loadDate(month) {
					  var xhttp;    
					  if (month == "Month") {
						$('#date').attr('disabled', 'disabled');

						return;
					  }
					  xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							$('#date').removeAttr('disabled');
							document.getElementById("date").innerHTML = this.responseText; 

						}
					  };
					  xhttp.open("GET", "getMemberDate?date="+month, true);
					  xhttp.send();
					}
		
	</script>
	

</body>
</html>