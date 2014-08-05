<?php 

	if(!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 

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
				  <li><a href="home.php">Home</a></li>
				  <li><a href="request.php">My Requests</a></li>
				  <li class="active"><a href="#">Settings</a></li>
				</ul>
			</div>

		</div>
		<!-- END NAV -->

		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<h2 class="update_title">To update, change the option you would like to change and click update!</h2>


				

				<div class="panel-body">
					<form action="updateTesterInfo.php" method="POST" onsubmit="return checkSettings();">
						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								First Name<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="fName" value="<?php include 'connection.php'; $query = 'SELECT * FROM tester WHERE testerID =' . $_SESSION['id']; $set = mysqli_query($con, $query); $tester = mysqli_fetch_array($set); echo $tester['fName']; ?>" disabled>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Last Name<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="lName" value="<?php include 'connection.php'; $query = 'SELECT * FROM tester WHERE testerID =' . $_SESSION['id']; $set = mysqli_query($con, $query); $tester = mysqli_fetch_array($set); echo $tester['lName']; ?>" disabled>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Contact Number<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="num" id="num" value="<?php include 'connection.php'; $query = 'SELECT * FROM tester WHERE testerID =' . $_SESSION['id']; $set = mysqli_query($con, $query); $tester = mysqli_fetch_array($set); echo $tester['MobileNo']; ?>">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Preffered Pick Up Location
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" id="PLoc" name="PLoc" value="<?php include 'connection.php'; $query = 'SELECT * FROM tester WHERE testerID =' . $_SESSION['id']; $set = mysqli_query($con, $query); $tester = mysqli_fetch_array($set); echo $tester['PLocation']; ?>">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								Preffered Drop Off Location
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text"  id="DLoc" name="DLocation" value="<?php include 'connection.php'; $query = 'SELECT * FROM tester WHERE testerID =' . $_SESSION['id']; $set = mysqli_query($con, $query); $tester = mysqli_fetch_array($set); echo $tester['DLocation']; ?>">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label setting-form">
								E-mail<div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label setting-form">
								 <input type="text" name="email" value="<?php include 'connection.php'; $query = 'SELECT * FROM tester WHERE testerID =' . $_SESSION['id']; $set = mysqli_query($con, $query); $tester = mysqli_fetch_array($set); echo $tester['email']; ?>" disabled>
							</div>
						</div>

						<input type='hidden' value='<?php echo $_SESSION['id'] ?>' name='id' />

						<div class="row">
							<div class="col-xs-12 col-sm-offset-5 form-label">
								<input type="submit" value="Update"/>
							</div>
						</div>


					</form>
					</div>

			</div>
		</div>

		<div class="row">

			<div class="col-xs-12">
					<div class="alert alert-danger" role="alert" id="settings-error">Ensure you enter all details!</div>

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
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/customscript.js"></script>	
	<script type="text/javascript" src="scripts/ValidationScripts.js"></script>
	<!-- END SCRIPTS -->
</body>
</html>