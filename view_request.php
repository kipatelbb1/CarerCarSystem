<?php session_start(); 
	if(!(isset($_SESSION['id'])))
	{
		header("Location: index.php"); /* Redirect browser */
		exit();
	}


?>
<!DOCTYPE html> 
<html lang="en">
<head>
	<title>Carey Car Form | FTS EMEA Tools | Blackberry Ltd</title>

	<!-- META -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- END META -->

	<!-- STYLES -->
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/customStyle.css">
	<link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css">
	<link rel="shortcut icon" href="res/bb_icon.png">

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

		<!-- TITLE -->
		<div class="row">
			<div class="col-xs-12 col-sm-5">
				<h1 class="page-header">Carey Car Scheduling System</h1>
			</div>

			<div class="col-sm-3 col-sm-offset-4 hidden-xs">
				<img src="res/bblogo.jpg" alt="logo" width="216" height="100" class="logo img-responsive"/>
			</div>

		</div>
		<!-- END TITLE -->

		<!-- NAV -->
		<div class="row">

			<div class="col-xs-12">
				<ul class="nav nav-tabs" role="tablist">
				  <li class="active"><a href="index.php">Home</a></li>
				  <li><a href="request.php">My Requests</a></li>
				  <li><a href="settings.php">Settings</a></li>
				  <h4 class="welcome">Welcome <?php echo $_SESSION['fName'] . " " . $_SESSION['lName'] ?></h4>
				</ul>

			</div>

		</div>
		<!-- END NAV -->

		<div class="row">
			<div class="col-xs-12 col-sm-5 request_title">
				Request Details: 
			</div>
		</div>

		<div class="row">

			<div class="col-xs-12 col-sm-6 form-label">
				Request ID 
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" value="<?php echo $_POST['reqid']; ?>" name="loc" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Date
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" value="" name="DLocation" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Pick Up Time
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Pick Up Location
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Drop Off Location
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Vehicle Type
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Cost Center
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				GL Code
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Comments
			</div>

			<div class="col-xs-12 col-sm-6 form-label">
				<input type="text" name="duration" disabled>
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



	</div><!--END CONTAINER -->
	
	<!-- SCRIPTS -->
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
	<script type="text/javascript" src="scripts/customscript.js"></script>	

	
	<!-- END SCRIPTS -->
</body>
</html>