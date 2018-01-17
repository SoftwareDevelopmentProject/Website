<?php
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
								<label class="col-md-3 control-label" for="booktitle">Book Title</label>
									<div class="col-md-9">
										<input id="bookTitle" name="bookTitle" type="text" placeholder="Book Title" class="form-control" required>
									</div>
							</div>

							<!-- Author input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="author">Author</label>
									<div class="col-md-9">
										<input id="author" name="author" type="text" placeholder="Author" class="form-control" required>
									</div>
							</div>

							<!-- publisher body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="publisher">Publisher</label>
									<div class="col-md-9">
										<input id="publisher" name="publisher" type="text" placeholder="Publisher" class="form-control" required>
									</div>
							</div>
							<!-- years body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="years">Years</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="year" id="year">
										<?php for($i=date("Y");$i>=date("Y")-50;$i--){
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
											?>
										</select>
									</div>
								</div>
							<!-- genre body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="genre">Genre</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="genre" id="genre">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">4</option>
										</select>
										
									</div>
							</div>
							
							<!-- des body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="description">Description</label>
									<div class="col-md-9">
										<textarea class="form-control" id="des" name="description" placeholder="Description" rows="5"></textarea>
									</div>
							</div>
							<!-- amount body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="amount">Amount</label>
									<div class="col-md-9">
										<input id="amount" name="amount" type="text" placeholder="Amount" class="form-control" onKeyUp="amountValid(this.value)" required>
										<p class="err" id="err">Only number allowed !</p>
									</div>
							</div>
							
								<!-- price body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="price">Price (RM) </label>
									<div class="col-md-9">
										<input id="price" name="price" type="text" placeholder="Price(RM)" class="form-control" onKeyUp="priceValid(this.value)" required>
										<p class="err" id="priceErr">Invalid currency</p>
									</div>
							</div>
							

							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right" style="text-align: center">
									<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="newBookSub" value="Submit" name="add_book_submit_btn">
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