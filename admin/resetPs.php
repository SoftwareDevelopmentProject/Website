<?php
session_start();
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
<?php if(($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['setNewPs'],$_POST['password'],$_POST['confirmPassword']) && ($_POST['password']==$_POST['confirmPassword'])){
	$result= $db->resetPsStaff($_POST['code'],$_POST['password']);
	$GLOBALS['success']=1;
	header('location:login.php');
}
	?>
<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" id="ps" autofocus required>
								<input class="form-control" placeholder="Confirm Password" name="confirmPassword" type="password" id="cps" style="margin-top: 2em" onKeyUp="checkPs(this.value)">
								<p class="err" id="ps_err" required>Password does not match !</p>	
								<input type="hidden" name="code" value="<?php if (isset($_POST['code']) && $_POST['code']==$realCode) echo $_POST['code'];?>">						
							</div>
							<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="psSub" value="Subit" name="setNewPs">
							<a href="index.php" class="btn btn-default" style="float: right">Cancel</a>
							
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
		<script>
		function checkPs(ps2){
			if($('#ps').val()!=ps2){
				$('#ps_err').css('display','block');
				$('#psSub').attr('disabled','disabled');
			}else{
				$('#ps_err').css('display','none');
				$('#psSub').removeAttr('disabled');
			}
			
		}
	
	</script>
</body>
</html>
