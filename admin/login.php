<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <?php include_once '_head.php'; 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$result = $db->loginStaff($_POST['email'], $_POST['password']);
			echo $result;
			switch ($result) {
				case LOGIN_SUCCESS:
					header('location:index.php');		
			}
			
		
		}
	?>
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ;?>" onKeyUp="emailValid(this.value)" autofocus>
								<p class="err" id="loginEmail" 
								<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
									if($db->loginStaff($_POST['email'], $_POST['password'])== 'LOGIN_USER_NOT_FOUND'){
										echo 'style="display:block"';
									}
							
								}
								   ?>
	>Email not found!</p>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								<p class="err" id="loginEmail" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
									if($db->loginStaff($_POST['email'], $_POST['password'])== 'LOGIN_PASSWORD_INCORRECT'){
										echo 'style="display:block"';
									}
							
								}
								   ?>			
								>Password Incorrect!</p>
								
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
								<a href="forgot_password.php" style="float: right">Forgot password?</a>
							</div>
							<input type="submit" class="btn btn-primary" value="Login">
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function emailValid(email){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if (emailReg.test(email)==false){
  				document.getElementById("loginEmail").style.display = "block";
				document.getElementById("email").style.borderColor = "red";
				
			}else {
				document.getElementById("loginEmail").style.display = "none";
				document.getElementById("email").style.borderColor = "";
				}
			}
		
	
	</script>
</body>
</html>
