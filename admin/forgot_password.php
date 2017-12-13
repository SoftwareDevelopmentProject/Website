<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
    <?php include_once '_head.php'; ?>
</head>
<body>
	<?php /*if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
		    <?php
            if (isset($_POST['sendCode'])):
				 $code= $db->generateCode($_POST['email']);
                  new Email($_POST['email'], "Recovery Code", $code);
				  */
            ?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Forgor Password</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" id="email" onKeyUp="checkEmail(this.value)" autofocus>
								<p class="err" id="email_err"></p>
							</div>
							<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="emailSub" value="Send Recovery Code" name="sendCode">
							<a href="index.php" class="btn btn-default">Back</a>
							
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function checkEmail(email) {
				  var xhttp;    
				  if (email == "") {
					  document.getElementById("email_err").style.display = "none";
					  document.getElementById("email").style.borderColor = "";
					  document.getElementById("emailSub").disabled = false;
					  
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("email_err").style.display = "block";
                        document.getElementById("email").style.borderColor = "";
						document.getElementById("email_err").innerHTML = "";
						document.getElementById("emailSub").disabled = false;
						
						if (this.response =='' || this.response !='Email already exists'){
							document.getElementById("email_err").innerHTML = "Email not found";
							document.getElementById("email").style.borderColor = "red";
							document.getElementById("emailSub").disabled = true;
						}
					}
				  };
				  xhttp.open("GET", "checkemail.php?email="+email, true);
				  xhttp.send();
				}
		
	
	</script>
</body>
</html>
