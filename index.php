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

					<div class="panel-body">

						<form method="POST" action="loginTester.php">
							Username: <input type="text" name="name" /> <br/><br/>
							Password: <input type="password" name="password" /> <br/><br/>

							<input type="submit" Value="Submit">

						</form>
					</div>
				</div>
			</div>

		</div>

		<div class="row login_box">

			<div class="col-sm-12 hidden-xs">

			</div>


			<div class=" col-xs-12 col-sm-12">
				<div class="panel panel-primary">

					<div class="panel-heading">
						<h4>Register</h4>
					</div>

					<div class="panel-body">

						<form method="POST" action="register.php">
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
								 <input type="text" id="PLoc" name="PLoc" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Preffered Drop Off Location
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text"  id="DLoc" name="DLocation" >
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
							<input type="submit" Value="Submit">

						</form>
					</div>
				</div>
			</div>

		</div>

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
	<!-- END SCRIPTS -->
</body>
</html>