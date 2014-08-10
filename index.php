<!DOCTYPE html> 
<html lang="en">
<head>
	<title>Login | Carey Car Form | FTS EMEA Tools | Blackberry Ltd</title>

	<!-- META -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="res/bb_icon.png">
	<!-- END META -->

	<!-- STYLES -->
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/customStyle.css">
	<!-- END STYLES -->

	<!-- COMPAT -->
	<!--[if lt IE 9]>
        <script src="scripts/compat/html5shiv.min.js"></script>
        <script src="scripts/compat/respond.js"></script>
	<![endif]-->

	<!-- END COMPAT -->
	
</head>
<body>

	<div class="container">


		<div class="row">
			<div class="col-xs-12 col-sm-5">
				<h1 class="page-header">Carey Car Scheduling System</h1>
			</div>

			<div class="col-sm-3 col-sm-offset-4 hidden-xs">
				<img src="res/bblogo.jpg" alt="logo" width="216" height="100" class="logo img-responsive"/>
			</div>

		</div>



	
		<div class="row login_box">

			<div class="col-sm-12 hidden-xs">

			</div>

			<div class="col-xs-12 col-sm-12">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<h4>Login</h4>
					</div>

					<div class="panel-body" id="login">

						<form method="POST" action="loginTester.php">

							<div class="row">
								<div class="col-xs-12 col-sm-6 form-label setting-form">
									Username<div class="required_input">*</div>
								</div>

								<div class="col-xs-12 col-sm-6 form-label setting-form">
									<input type="text" name="name" />
								</div>
							</div>
					
							<div class="row">
								<div class="col-xs-12 col-sm-6 form-label setting-form">
									Password<div class="required_input">*</div>
								</div>

								<div class="col-xs-12 col-sm-6 form-label setting-form">
									<input type="password" name="password" />
								</div>
							</div>


							<input type="submit" Value="Log In">

						</form>
					</div>
				</div>
			</div>

		</div>

		<div class="row login_box">

			<div class="col-sm-12 hidden-xs">

			</div>


			<div class="col-xs-12 col-sm-12" >
				<div class="panel panel-primary">

					<div class="panel-heading">
						<h4>Register</h4>
					</div>

					<div class="panel-body" id="reg">

						<form method="POST" action="register.php" onsubmit="return check();">
							<div class="row">
								<div class="col-xs-12 col-sm-6 form-label setting-form">
									First Name<div class="required_input">*</div>
								</div>

								<div class="col-xs-12 col-sm-6 form-label setting-form">
									 <input type="text" name="fName"  >
								</div>
							</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Last Name<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="lName" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Contact Number<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="num" id="num">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Preffered Pick Up Location
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" id="PLoc" value="200 Bath Road, Slough, SL1 3XE, UK" name="PLoc" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Preffered Drop Off Location
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" value="200 Bath Road, Slough, SL1 3XE, UK" id="DLoc" name="DLoc" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								E-mail<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="email" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Username<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="username" placeholder="e.g kipatel">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Password<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="password"  id="password1" name="password1" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Confirm Password<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="password" id="password2" name="password2" >
							</div>
						</div>

						<input type="submit" Value="Register">

						</form>


						<div id="errReg">





						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- LLNE BREAK -->
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<hr class="line-break" />
			</div>
		</div>
		<!-- END LINE BREAK -->

		<!-- FOOTER -->
		<div class="row">
			<div class="col-xs-12 col-sm-3 footer">
				<div class="internal">
					Internal Use Only
				</div>
			</div>

			<div class="col-xs-12 col-sm-offset-5 col-sm-4">
				<div class="footnote">
					Carey Car Management | FTS EMEA Team | Blackberry Ltd
				</div>
			</div>
			
		</div>
		<!-- END FOOTER -->

	</div>



	
	
	<!-- SCRIPTS -->
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/customscript.js"></script>	
	<script type="text/javascript" src="scripts/passwordVerify.js"></script>	
	<?php 
		//If they have logged in before then hide the registration panel. 
		if(isset($_COOKIE['reg']))
		{
			echo '<script type="text/javascript" src="scripts/hidereg.js"></script>'; 
		}
		else
		{
			//If they need to register then hide the log. 
			echo '<script type="text/javascript" src="scripts/hideLog.js"></script>'; 
		}
	?>
	
	<!-- END SCRIPTS -->
</body>
</html>