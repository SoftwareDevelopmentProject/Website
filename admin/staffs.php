<?php
session_start();
$page = 'staff';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Staff</title>
	<?php include_once '_head.php'; ?>
</head>

<body>

	<?php include_once '_header.php'; 
	if($user['staff_role']<1){
	    echo '<script>window.location.replace("index.php", "_self")</script>';
	}
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a>
				


				</li>
				<li><a href="staffs.php">Staff</a>
				</li>
			</ol>
		</div>
		<!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
		<?php
		if ( isset( $_POST[ 'add_staff_submit_btn' ] ) ):
			$result = $db->add_staff( $_POST[ 'name' ], $_POST[ 'email' ], $_POST[ 'phone' ], $_POST[ 'address' ], $_POST[ 'role' ] );
		if ( $result ):
			new Email( $_POST[ 'email' ], "Account created", "Welcome to join as Technology Park's Bookstore staff. Your staff account is just been created and your password would be your phone number." );
		?>
		<?php else: ?>
		<?php endif; ?>
		<?php
		elseif ( isset( $_POST[ 'save_staff_role' ] ) ):
			$result = $db->up_staff( $_POST[ 'id' ], $_POST[ 'role' ] );
		if ( $result ):
			?>
		<?php else: ?>
		<?php endif;?>
		<?php
		elseif ( isset( $_POST[ 'del' ] ) ):
			$result = $db->del_staff( $_POST[ 'id' ] );
		if ( $result ):
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
					<button class="btn btn-primary btn-md" id="ok">OK</button>
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
					<button class="btn btn-danger btn-md" id="ok" style="background-color:red">OK</button>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endif;?>
		<?php endif; ?>

		<div class="padding" style="overflow: auto; height: auto;">
			<tr>
				<td colspan="7" align="right" height="50px"><button style="float: right; margin: 10px 10px;" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addStaff">Add New Staff</button>
				</td>

			</tr>
			<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
			<h2>Staff List</h2>
			<table class="table table-hover">
				<tr>
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
				foreach ( $staffs as $staff ):
					?>
				<tr>
					<td>
						<?php echo $staff['staff_name']; ?>
					</td>
					<td>
						<?php echo $staff['staff_phone']; ?>
					</td>
					<td>
						<a href="mailto:<?php echo $staff['staff_email']; ?>">
							<?php echo $staff['staff_email']; ?>
						</a>
					</td>
					<td>
						<?php echo $staff['staff_address']; ?>
					</td>
					<td>
						<form method="post">
							<select name="role" required class="drop_down" onchange="changeRole(this.value, <?php echo $staff['staff_role']; ?>, <?php echo $staff['staff_id']; ?>);">
								<option value="1" <?php if ($staff[ 'staff_role']==1){ echo 'selected'; } ?>>Staff</option>
								<option value="2" <?php if ($staff[ 'staff_role']==2){ echo 'selected'; } ?>>Admin</option>
							</select>
							<input type="hidden" name="id" value="<?php echo $staff['staff_id']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-default btn-sm" id="saveBtn<?php echo $staff['staff_id'];?>" name="save_staff_role" value="Save" disabled>
					</td>
					<td>
						<input type="button" value="Remove" onClick="removeStaff(<?php echo $staff['staff_id']; ?> ,'<?php echo $staff['staff_name']; ?>')" class="btn btn-default btn-sm" data-toggle="modal" data-target="#deleteStaff">
					</td>
				</tr>
				<?php endforeach; ?>
			</table>

		</div>




		<!--modal -->

		<div class="modal fade" id="addStaff">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
					 <img src="../images/logo.png" style="border-radius: 99px;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<center><h2 class="modal-title" style="color: black;">Add New Staff</h2></center>
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form-horizontal" method="post">
									<fieldset style="padding: 20px; padding-right: 60px;">
										<!-- Book Title input-->
										<div class="form-group">
											<label class="col-md-3 control-label" for="name">Name</label>
												<div class="col-md-9">
													<input id="name" name="name" type="text" placeholder="Name" class="form-control margin_fix" required>
												</div>
										</div>

										<!-- Author input-->
										<div class="form-group">
											<label class="col-md-3 control-label" for="email">Email</label>
												<div class="col-md-9">
													<input id="email" name="email" type="email" placeholder="Email" class="form-control margin_fix" onKeyUp="checkEmail(this.value)" required>
													<p class=err id="email_err"></p>
												</div>
										</div>

										<!-- publisher body -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="phone">Phone Number</label>
												<div class="col-md-9">
													<input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control margin_fix" onKeyUp="phoneValid()" required>
													<p class="err" id="err">Invalid Phone Number format. Eg. 0123456789</p>
												</div>
										</div>
										<!-- address body -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="address">Address</label>
												<div class="col-md-9">
													<textarea class="form-control margin_fix" id="address" name="address" placeholder="Address" rows="5"></textarea>
												</div>
										</div>

										<!-- role body -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="genre">Role</label>
												<div class="col-md-9">
													<select class="form-control margin_fix" style="width: 30%" name="role" id="role">
														<option value="1">Staff</option>
														<option value="2">Admin</option>
													</select>

												</div>
										</div>


										<!-- Form actions -->
										<div class="form-group">
											<div class="col-md-12 widget-right" style="text-align: center">
												<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="staffSub" value="Submit" name="add_staff_submit_btn" >
												<button type="reset" class="btn btn-default" style="margin-right: 20px;">Reset</button>
												<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">
											</div>
										</div>
									</form>
									</div>
								</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
					</div>

				</div>
			</div>
		</div>

		<!-- delete staff-->
		<div class="modal fade" id="deleteStaff">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
					<img src="../images/logo.png" style="border-radius: 99px;">
					<center><h2 class="modal-title" style="color: black;">Delete Staff</h2></center>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body popup-body" id="modalBodyDel">
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<form method="post">
							<input type="submit" class="btn btn-primary btn-md" value="Yes" name="del">
							<input type="hidden" id="delStaffid" name="id">
							<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
						</form>
					</div>

				</div>
			</div>
		</div>




		<?php include_once '_footer.php'; ?>

	</div>
	<!--/.main-->

	<script>
			//disabling save button

		function changeRole( changedVal, oriVal, id ) {
			if ( oriVal != changedVal ) {
				document.getElementById( 'saveBtn' + id ).disabled = false;
			} else {
				document.getElementById( 'saveBtn' + id ).disabled = true;
			}
		}
		//delete confirmation

		function removeStaff( id, name ) {
			$( "#modalBodyDel" ).html( "Are you sure to remove " + name + " ?" );
			$( '#delStaffid' ).val( id );
		}


		//registration form data validity
		function phoneValid() {
			var text = document.getElementById( "phone" ).value;
			if ( /^\d+$/.test( text ) ) {
				document.getElementById( "err" ).style.display = "none";
				document.getElementById( "staffSub" ).disabled = false;


			} else {
				document.getElementById( "err" ).style.display = "block";
				document.getElementById( "staffSub" ).disabled = true;
				


			}
		}
		//check email 
		function checkEmail( str ) {
			var xhttp;
			if ( str == "" ) {
				document.getElementById( "email_err" ).style.display = "none";
				document.getElementById( "email" ).style.borderColor = "";
				document.getElementById( "staffSub" ).disabled = false;

				return;
			}
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if ( this.readyState == 4 && this.status == 200 ) {
					document.getElementById( "email_err" ).innerHTML = this.responseText;
					document.getElementById( "email_err" ).style.display = "block";
					if ( this.response != '' ) {
						document.getElementById( "staffSub" ).disabled = true;
					}
				}
			};
			xhttp.open( "GET", "checkemail.php?email=" + str, true );
			xhttp.send();
		}
	</script>


</body>

</html>