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
					
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" method="post">
						<fieldset style="padding: 20px; padding-right: 60px;">
							<!-- Book Title input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Name</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
									</div>
							</div>

							<!-- Author input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email</label>
									<div class="col-md-9">
										<input id="email" name="emailr" type="email" placeholder="Email" class="form-control" required>
									</div>
							</div>

							<!-- publisher body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone Number</label>
									<div class="col-md-9">
										<input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control" required>
										<p class="err" id="err"></p>
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
								<label class="col-md-3 control-label" for="genre">Role</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="role" id="role">
											<option value="1">Staff</option>
											<option value="2">Admin</option>
										</select>
										
									</div>
							</div>
							

							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right" style="text-align: center">
									<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="staffSub" value="Submit" name="add_staff_submit_btn">
									<button type="reset" class="btn btn-default" style="margin-right: 20px;">Reset</button>
									<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">
									</form>
								</div>
							</div>
						</div>
					</div>
						
				
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	
	<!-- start modal -->
	<div class="modal fade" id="viewMember">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Member Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modalBody">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  
  <!--//end modal -->
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
				  xhttp.open("GET", "getMemberReport?year=all", true);
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
				  xhttp.open("GET", "getMemberMonth?year="+year, true);
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
					xhttp.open("GET", "getMemberByMonth?month="+month+"&year="+year, true);
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
					xhttp.open("GET", "getMemberByYear?year="+year, true);
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
					  xhttp.open("GET", "getMemberDay?day="+month, true);
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
					xhttp.open("GET", "getMemberByDay?day="+day+"&month="+month+"&year="+year, true);
					xhttp.send();
			}
		//--end filter
		//--view member js
		function getMemberDetail(id) {
				  var xhttp; 
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("modalBody").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "getMemberDetail?id="+id, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>