<?php 
	//If Session does not exist then start the session. 
	if(!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 

	//If the ID has not been set then redirect for user to log in. 
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
		<?php 
			//Create a connection to the database. 
			include 'connection.php'; 
			
			//If no request ID has been set (BLANK) then show error. 
			if(!isset($_GET['reqid']))
			{
				echo '<div class="alert alert-danger" role="alert">';
  				echo '<a href="#" class="alert-link">Error - Request not found. </a>';
				echo '</div>';
				include 'request.php'; 
				exit(); 
			}
			else
			{
				//GET method to get the requestID from previous page. (Can also be changed in address bar)
				$requestID = $_GET['reqid']; 
			}

			//Create a query where the request ID is the GET request ID. 
			$query = "SELECT * FROM request WHERE requestID =" . $requestID;

			//Execute the query. 
			$set = mysqli_query($con, $query);

			//If set returns nothing then
			if($set != false)
			{
				//Get the first row.  
				$row = mysqli_fetch_array($set);

				//If the number of rows is less than or equal to 0 then show a error describing the ID as not found in the database. 
				if(mysqli_num_rows($set)<=0)
				{
					echo '<div class="alert alert-danger" role="alert">';
	  				echo '<a href="#" class="alert-link">Error - Request not found. </a>';
					echo '</div>';
					include 'request.php'; 
					exit(); 
				}

			}
			else
			{
				//Show an error. 
				echo '<div class="alert alert-danger" role="alert">';
  				echo '<a href="#" class="alert-link">Error - Request not found. </a>';
				echo '</div>';
				include 'request.php'; 
				exit(); 
			}
		 

			

		?>


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
				  <li class="active" ><a href="request.php">My Requests</a></li>
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

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" value="<?php echo $row['requestID'] ?>" name="loc" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Date
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" value="<?php echo $row['date_request'] ?>" name="DLocation" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Pick Up Time
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" name="duration" value="<?php echo $row['PTime'] ?>" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Pick Up Location
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" name="PLoc" value="<?php echo $row['PLoc'] ?>" disabled>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Drop Off Location
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" name="DLoc" value="<?php echo $row['DLocation'] ?>" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Vehicle Type
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" name="veh" value="<?php echo $row['Veh_Type'] ?>" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Cost Center
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" name="cc" value="<?php echo $row['Cost_Center'] ?>" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				GL Code
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form ">
				<input type="text" name="gl" value="<?php echo $row['GL_Code'] ?>" disabled>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-label">
				Comments
			</div>

			<div class="col-xs-12 col-sm-6 form-label setting-form">
				<input type="text" name="add" value="<?php echo $row['add_Comments'] ?>" disabled>
			</div>
		</div>

		<div class="row">
			

			<div class="col-xs-12 col-sm-6 form-label setting-form">

				<div class="request_title">Testers</div>

				<?php 
					//Create a query that gets the name of the testers that are associated with the GET request and all that are linked to that particular request. 
					$query = "SELECT t.fName, t.lName 
					FROM tester t, request r, requestline rl 
					WHERE rl.testerID = t.testerID 
					AND rl.requestID = r.requestID
					AND rl.requestID =" . $requestID . "
					GROUP BY t.fName, t.lName;"; 

					//Execute Query. 
					$testerSet = mysqli_query($con, $query); 


		
					//For each tester found.. 
					while($row = mysqli_fetch_array($testerSet))
					{
						//Print thier name. 
						echo $row['fName'] . " " . $row['lName']. "<br/>"; 
					}
				?>
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