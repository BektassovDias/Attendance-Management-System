<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>Login Page</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="input Username" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="input Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>&nbsp;
			<div style="background:gray; width:100%; height:2px; margin: 0 auto;"></div>
			<p>Don't have an account? <a href="sign_up.php">Sign Up Here</a></p>
			<a href="#add_course" data-toggle="modal">Forgot password?</a>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
<?php include 'includes/forgotpass_modal.php'; ?>
</body>
</html>