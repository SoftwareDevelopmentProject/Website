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
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
		    <?php
            if (isset($_POST['add_staff_submit_btn'])):
                $result=$db->add_staff($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['role']);
                if ($result) :
                    new Email($_POST['email'], "Account created", "Welcome to join as Technology Park's Bookstore staff. Your staff account is just been created and your password would be your phone number.");
            ?>
				<div id="popupBox" style="display:block">
                    <div id="popupcontent" class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                            <h2>Successful</h2>
                        </div>
                        <div class="popup-body">
                            Add staff successful and email is sent!
                        </div>
                        <div class="popup-footer">
                            <button class="btn btn-primary btn-md" id="ok" >OK</button>
                        </div>
                    </div>
                </div>
			    <?php else: ?>
				<div id="popupBox" style="display:block">
                    <div id="popupcontent" class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                            <h2>Error</h2>
                        </div>
                        <div class="popup-body" style="background-color:red">
                            No change is made !
                        </div>
                        <div class="popup-footer">
                            <button class="btn btn-danger btn-md" id="ok" style="background-color:red" >OK</button>
                        </div>
                    </div>
                </div>
			    <?php endif; ?>
		    <?php
            elseif (isset($_POST['save_staff_role'])):
            $result= $db->up_staff($_POST['id'],$_POST['role']);
                if ($result):
            ?>
				<div id="popupBox" style="display:block">
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
                </div>
                <?php else: ?>
				<div id="popupBox" style="display:block">
                    <div id="popupcontent" class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                            <h2>Error</h2>
                        </div>
                        <div class="popup-body" style="background-color:red">
                            No change is made!

                        </div>
                        <div class="popup-footer">
                            <button class="btn btn-danger btn-md" id="ok" style="background-color:red" >OK</button>
                        </div>
                    </div>

                </div>
                <?php endif;?>
            <?php
            elseif (isset($_POST['del'])):
            $result= $db->del_staff($_POST['id']);
                if ($result):
            ?>
				<div id="popupBox" style="display:block">
                    <div id="popupcontent" class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                            <h2>Deleted</h2>
                        </div>
                        <div class="popup-body">
                            Staff is removed !
                        </div>
                        <div class="popup-footer">
                            <button class="btn btn-primary btn-md" id="ok" >OK</button>
                        </div>
                    </div>
                </div>
			<?php else: ?>
				<div id="popupBox" style="display:block">
                    <div id="popupcontent" class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                            <h2>Error</h2>
                        </div>
                        <div class="popup-body" style="background-color:red">
                            No change is made!

                        </div>
                        <div class="popup-footer">
                            <button class="btn btn-danger btn-md" id="ok" style="background-color:red" >OK</button>
                        </div>
                    </div>
                </div>
			<?php endif; ?>
    	<?php endif;?>
    <?php endif; ?>

	<!--confirmation message--//-->
		<div id="confirmBox">
						<div id="confirmContent" class="popup-content">
							<div class="popup-header">
								<span class="close">&times;</span>
								<h2>Remove Confirmation</h2>
							</div>
							<div class="popup-body" id="confirmMessage">
								Are you sure to remove?

							</div>
							<div class="popup-footer">
								<button class="btn btn-primary btn-md" id="yes" >Yes</button>
								<button class="btn btn-primary btn-md" id="no" >No</button>
							</div>
						</div>

					</div>
			
				
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
					$staffs = $db->getAllStaff();
					foreach($staffs as $staff) :
                ?>
					<tr>
						<td><?php echo $staff['staff_name']; ?></td>
                        <td><?php echo $staff['staff_phone']; ?></td>
                        <td><a href="mailto:<?php echo $staff['staff_email']; ?>"><?php echo $staff['staff_email']; ?></a></td>
                        <td><?php echo $staff['staff_address']; ?></td>
						<td>
						    <form method="post">
								<select name="role" required class="drop_down" onchange="changeRole(this.value, <?php echo $staff['staff_role']; ?>, <?php echo $staff['staff_id']; ?>);">
									<option value="0" <?php if ($staff['staff_role']==0){ echo 'selected'; } ?>>Staff</option>
                                    <option value="1" <?php if ($staff['staff_role']==1){ echo 'selected'; } ?>>Admin</option>
                                </select>
                                <input type="hidden" name="id" value="<?php echo $staff['staff_id']; ?>">
                        </td>
						<td>
                            <input type="submit" class="btn btn-default btn-sm" id="saveBtn<?php echo $staff['staff_id'];?>" name="save_staff_role" value="Save" disabled>
						</td>
						<td>
							<form id="delete<?php echo $staff['staff_id']; ?>" method="post">
                                <input type="button" value="Delete" onClick="removeStaff(<?php echo $staff['staff_id']; ?> ,'<?php echo $staff['staff_name']; ?>')" class="btn btn-default btn-sm" id="revBtn">
							    <input type="hidden" name="id" value="<?php echo $staff['staff_id']; ?>">
                                <input type="submit" name="del" style="display:none" id="sub<?php echo $staff['staff_id']; ?>"></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
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
										<input id="email" name="email" type="email" placeholder="Email" class="form-control" onkeyup="checkEmail(this.value)" required>
										<p class="err" id="email_err"></p>
									</div>
							</div>

							<!-- phone body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone</label>
									<div class="col-md-9">
										<input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" onKeyUp="phoneValid()" required>
										<p class="err" id="err">Only number allowed ! e.g. 0123456789 </p>
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
	
			function removeStaff(id, name){
				document.getElementById("confirmBox").style.display = "block";
				document.getElementById("confirmMessage").innerHTML = "Are you sure to remove " + name + " ?";
				document.getElementById("yes").onclick="delStaff(id)";
				$("#yes").attr("onclick", "delStaff(" + id + ")");
					
			}
	
	
		//DELETE STAFF
			function delStaff(id){
				
				$("#sub" + id).click();
			}
		//registration form data validity
			function phoneValid(){
				var text = document.getElementById("phone").value;
				if (/^\d+$/.test(text)) {
					document.getElementById("err").style.display = "none";
					document.getElementById("staffSub").disabled = false;
					
					
				}else{
					document.getElementById("err").style.display = "block";
					document.getElementById("staffSub").disabled = true;
					
			
				}
			}
		//check email 
			function checkEmail(str) {
				  var xhttp;    
				  if (str == "") {
					  document.getElementById("email_err").style.display = "none";
					  document.getElementById("email").style.borderColor = "";
					  document.getElementById("staffSub").disabled = false;
					  
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("email_err").innerHTML = this.responseText;
						document.getElementById("email_err").style.display = "block";
						if (this.response!=''){
							document.getElementById("staffSub").disabled = true;
						}
					}
				  };
				  xhttp.open("GET", "checkemail.php?email="+str, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>