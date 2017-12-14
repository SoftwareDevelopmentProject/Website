<?php
  	include_once '_head.php';
	$realCode= $db->generateCode($_POST['userEmail']);

	if (isset($_POST['code']) && $_POST['code']==$realCode) {
		 
	}else{
		
		header('location:forgot_password.php');
	}
            ?>


<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" id="email" onKeyUp="checkEmail(this.value)" autofocus>
								<p class="err" id="email_err"></p>								
							</div>
							<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="emailSub" value="Send Recovery Code" name="sendCode">
							<a href="index.php" class="btn btn-default" style="float: right">Back</a>
							
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	
</body>
</html>
