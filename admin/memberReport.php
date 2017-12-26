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
		<?php  	
			$dates=$db->reportGetMember();
			foreach ($dates as $date):
		?>		
		<div class="padding" style="overflow: auto; height: auto;">
			<tr><form method="post">
				<td colspan="11" align="right" height="50px" >
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="date">
					<option value="">Date</option>
					<?php echo 
	'<option value="'.$date['member_created_at'].'">'.$date['member_created_at'].'</option>';?>
				</select>
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="month">
					<option value="">Month</option>
				</select>
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="year">
					<option value="">Year</option>
				</select>
				</td>
			</tr></form>
	<?php endforeach; ?>
			<h4>Member Report</h4>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white">
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
                        <td><?php echo $member['member_created_at']; ?></td>
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
	
		var form = document.getElementById("form");
		var box = document.getElementById("popupBox");
		var boxBody = document.getElementById("popupcontent");
		var span = document.getElementsByClassName("close")[0];
		var addBtn = document.getElementById("addBtn");
		var cancel = document.getElementById("close");
		var ok = document.getElementById("ok");
		var formBody = document.getElementById("form-body");
		var no = document.getElementById("no");
		var confirBox = document.getElementById("confirmBox");
		var confirmContent = document.getElementById("confirmContent");

		
		addBtn.onclick = function() {
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
		
		no.onclick = function() {
				confirmContent.style.animationName="animateback"; 
				confirmContent.style.animationDuration="0.4s";
				confirmContent.style.webkitAnimationDuration="0.4s";
				confirmContent.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					confirBox.style.display = "none";
					confirmContent.style.animationName= confirmContent.style.webkitAnimationDuration = confirmContent.style.webkitAnimationName = confirmContent.style.animationDuration = "";
					
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
		//disabling save button
		
			function changeRole(changedVal, oriVal, id) {
				if (oriVal!= changedVal) {
					document.getElementById('saveBtn'+ id).disabled = false;
				} else {
					document.getElementById('saveBtn'+ id).disabled = true;
				}				
			}
		//delete confirmation
	
			function removeBook(id, title){
				$("#confirmBox").css("display","block");
				$("#confirmMessage").html("Are you sure to remove " + title + " ?");
				$("#yes").attr("onclick", "delBook(" + id + ")");
			}
	
	
		//DELETE STAFF
			function delBook(id){
				
				$("#sub" + id).click();
			}
		//registration form data validity
			function amountValid(text){
				if (/^\d+$/.test(text)) {
					document.getElementById("err").style.display = "none";
					document.getElementById("newBookSub").disabled = false;
					
					
				}else{
					document.getElementById("err").style.display = "block";
					document.getElementById("newBookSub").disabled = true;
					
			
				}
			}
		
		function priceValid(text){
				if (/^-{0,1}\d*\.{0,1}\d+$/.test(text)) {
					document.getElementById("priceErr").style.display = "none";
					document.getElementById("newBookSub").disabled = false;
					
					
				}else{
					document.getElementById("priceErr").style.display = "block";
					document.getElementById("newBookSub").disabled = true;
					
			
				}
			}
		//check email 
			function checkEmail(str) {
				  var xhttp;    
				  if (str == "") {
					  document.getElementById("email_err").style.display = "none";
					  document.getElementById("email").style.borderColor = "";
					  document.getElementById("newBookSub").disabled = false;
					  
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("email_err").innerHTML = this.responseText;
						document.getElementById("email_err").style.display = "block";
						if (this.response!=''){
							document.getElementById("newBookSub").disabled = true;
						}
					}
				  };
				  xhttp.open("GET", "checkemail.php?email="+str, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>