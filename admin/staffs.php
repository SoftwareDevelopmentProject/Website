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
					No change is made !
				</div>
				<div class="popup-footer">
					<button class="btn btn-danger btn-md" id="ok" style="background-color:red">OK</button>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php
		elseif ( isset( $_POST[ 'save_staff_role' ] ) ):
			$result = $db->up_staff( $_POST[ 'id' ], $_POST[ 'role' ] );
		if ( $result ):
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
								<option value="0" <?php if ($staff[ 'staff_role']==0){ echo 'selected'; } ?>>Staff</option>
								<option value="1" <?php if ($staff[ 'staff_role']==1){ echo 'selected'; } ?>>Admin</option>
							</select>
							<input type="hidden" name="id" value="<?php echo $staff['staff_id']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-default btn-sm" id="saveBtn<?php echo $staff['staff_id'];?>" name="save_staff_role" value="Save" disabled>
					</td>
					<td>
						<input type="button" value="Remove" onClick="removeBook(<?php echo $staff['staff_id']; ?> ,'<?php echo $staff['staff_name']; ?>')" class="btn btn-default btn-sm" data-toggle="modal" data-target="#deleteStaff">
					</td>
				</tr>
				<?php endforeach; ?>
			</table>

		</div>




		<!--modal -->

		<div class="modal fade" id="addStaff">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h2 class="modal-title">Add New Staff</h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
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
						<h2 class="modal-title">Delete Staff</h2>
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
		var form = document.getElementById( "form" );
		var box = document.getElementById( "popupBox" );
		var boxBody = document.getElementById( "popupcontent" );
		var span = document.getElementsByClassName( "close" )[ 0 ];
		var addBtn = document.getElementById( "addBtn" );
		var cancel = document.getElementById( "close" );
		var ok = document.getElementById( "ok" );
		var formBody = document.getElementById( "form-body" );
		var no = document.getElementById( "no" );
		var confirBox = document.getElementById( "confirmBox" );
		var confirmContent = document.getElementById( "confirmContent" );


		addBtn.onclick = function () {
			form.style.display = "block";

		}





		cancel.onclick = function () {
			formBody.style.animationName = "animateback";
			formBody.style.animationDuration = "0.4s";
			formBody.style.webkitAnimationDuration = "0.4s";
			formBody.style.webkitAnimationName = "animateback";
			setTimeout( function () {
				form.style.display = "none";
				formBody.style.animationName = formBody.style.webkitAnimationDuration = formBody.style.webkitAnimationName = formBody.style.animationDuration = "";

			}, 400 );


		}

		window.onclick = function ( event ) {
			if ( event.target == form ) {

				formBody.style.animationName = "animateback";
				formBody.style.animationDuration = "0.4s";
				formBody.style.webkitAnimationDuration = "0.4s";
				formBody.style.webkitAnimationName = "animateback";
				setTimeout( function () {
					form.style.display = "none";
					formBody.style.animationName = formBody.style.webkitAnimationDuration = formBody.style.webkitAnimationName = formBody.style.animationDuration = "";

				}, 400 );

			}
		}

		span.onclick = ok.onclick = function () {
			boxBody.style.animationName = "animateback";
			boxBody.style.animationDuration = "0.4s";
			boxBody.style.webkitAnimationDuration = "0.4s";
			boxBody.style.webkitAnimationName = "animateback";
			setTimeout( function () {
				box.style.display = "none";
				boxBody.style.animationName = boxBody.style.webkitAnimationDuration = boxBody.style.webkitAnimationName = boxBody.style.animationDuration = "";

			}, 400 );


		}

		no.onclick = function () {
			confirmContent.style.animationName = "animateback";
			confirmContent.style.animationDuration = "0.4s";
			confirmContent.style.webkitAnimationDuration = "0.4s";
			confirmContent.style.webkitAnimationName = "animateback";
			setTimeout( function () {
				confirBox.style.display = "none";
				confirmContent.style.animationName = confirmContent.style.webkitAnimationDuration = confirmContent.style.webkitAnimationName = confirmContent.style.animationDuration = "";

			}, 400 );


		}

		window.onclick = function ( event ) {
				if ( event.target == box ) {

					boxBody.style.animationName = "animateback";
					boxBody.style.animationDuration = "0.4s";
					boxBody.style.webkitAnimationDuration = "0.4s";
					boxBody.style.webkitAnimationName = "animateback";
					setTimeout( function () {
						box.style.display = "none";
						boxBody.style.animationName = boxBody.style.webkitAnimationDuration = boxBody.style.webkitAnimationName = boxBody.style.animationDuration = "";

					}, 400 );

				}
			}
			//disabling save button

		function changeRole( changedVal, oriVal, id ) {
			if ( oriVal != changedVal ) {
				document.getElementById( 'saveBtn' + id ).disabled = false;
			} else {
				document.getElementById( 'saveBtn' + id ).disabled = true;
			}
		}
		//delete confirmation

		function removeBook( id, name ) {
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