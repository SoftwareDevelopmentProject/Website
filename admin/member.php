<?php
session_start();
    $page = 'member';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><em class="fa fa-home"></em></a></li>
				<li><a href="memberReport.php">Member</a></li>
			</ol>
		</div><!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitBtn'])){
				$db->updateTrustfulness($_POST['id'],$_POST['trustfulness']);
				}
		?>	
			
		<div class="padding" style="overflow: auto; height: auto;">
			<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
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
			<h2>Member List</h2>
			<table class="table table-hover" id="table">
				<tr>
					<td width="">Member ID</td>
					<td width="">Member Name</td>
					<td width="">Created at</td>
					<td width="">Status</td>
					<td width="">Negative Feedback</td>
					<td width="">Positive Feedback</td>
					<td></td>
				</tr>
				<?php
					$members=$db->reportGetMember();
					foreach ($members as $member):
                ?>
					<tr>
						<td><?php echo 'MID'.sprintf('%04d',$member['member_id']); ?></td>
						<td><?php echo $member['member_name']; ?></td>
                        <td><?php echo $member['member_created_time']; ?></td>
                        <td><?php 
							switch ($member['member_trustfulness']) {
								case 0:
									echo 'Non-trusted';
									break;
								case 1:
									echo 'Trusted';
							} 
							?></td>
                        <td><?php echo $member['negative_feedback']; ?></td>
                        <td><?php echo $member['positive_feedback']; ?></td>
                        <td><button type="button" class="btn btn-primary" onClick="getMemberDetail(<?php echo $member['member_id'];?>)" data-toggle="modal" data-target="#viewMember">View Profile</button></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
        </div>
						
				
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	
	<!-- start modal -->
	<div class="modal fade" id="viewMember">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <img src="../images/logo.png" style="border-radius: 99px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modalBody">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <form method="post">
         	<input type="hidden" id="tmid" name="id">
         	<input type="hidden" id="t" name="trustfulness">
          	<input type="submit" id="subbtn" name="submitBtn" style="display: none">
          </form>
        </div>

      </div>
    </div>
  </div>
  
  <!--//end modal -->
	<script>
		//--view member js
		function getMemberDetail(id) {
				  var xhttp; 
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("modalBody").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "getMemberProfile?id="+id, true);
				  xhttp.send();
				}
		function submitT(id,t){
			$('#tmid').val(id);
			$('#t').val(t);
			$('#subbtn').click();
			
		}
		
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