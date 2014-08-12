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
				  <li class="active"><a href="#">My Requests</a></li>
				  <li><a href="settings.php">Settings</a></li>
				</ul>
			</div>

		</div>
		<!-- END NAV -->

		<!-- SEARCH REQUESTS -->
		<div class="row search_request">
			<form method="GET" action="view_request.php">
				<div class="col-xs-12">			
					<input type="text" name="reqid" placeholder="Enter a Request ID here">
					<input type="submit" value="Search!">
				</div>

			</form>
		</div>
		<!-- END SEARCH REQUESTS -->


		<?php 
				include 'connection.php'; 
						$testerID = $_SESSION['id']; 

				$query = "SELECT t.testerID ,r.requestID, r.date_request,r.PTime, r.PLoc, r.Duration, r.DLocation, r.Veh_Type 
						FROM request r, tester t, requestline rl
						WHERE rl.requestID = r.requestID 
						AND rl.testerID = t.testerID 
						AND t.testerID = ". $testerID . "
						ORDER BY r.date_request DESC"; 

				$set = mysqli_query($con, $query); 
		?>

		<!-- TABLE -->
		<div class="row hidden-xs">
			<div class="col-xs-12 col-sm-12">
				<table class="request_table">
					<tr>
						<th class="top-header">Request ID</th>
						<th class="top-header">Date</th>
						<th class="top-header">Pick Up Time</th>
						<th class="top-header">Pick Up Location</th>
						<th class="top-header">Duration</th>
						<th class="top-header">Drop Off Location</th>
						<th class="top-header">Vehicle Type</th>
					</tr>

					<?php 
						
						while($row = mysqli_fetch_array($set))
						{
							#Convert the MYSQL date to a time
							$date_req = strtotime( $row['date_request'] );
							echo "<tr>"; 
								echo "<td><a href='view_request.php?reqid=" . $row['requestID'] . "'>" . $row['requestID'] . "</a></td>"; 
								#Apply dd-mm-yyyy format. 
								echo "<td>" . date( 'd-m-Y', $date_req ) . "</td>";
								echo "<td>" . substr($row['PTime'], 3) . "</td>"; 
								echo "<td>" . $row['PLoc'] . "</td>"; 
								echo "<td>" . $row['Duration'] . "</td>"; 
								echo "<td>" . $row['DLocation'] . "</td>"; 
								echo "<td>" . $row['Veh_Type'] . "</td>"; 
							echo "</tr>"; 
						}


					?>
				
				</table>
			</div>
		</div>
		<!-- END TABLE -->

		<!-- MOBILE REQUEST -->
		<div class="row visible-xs">
			<div class="col-xs-12">
				<?php
						echo "<div class='panel panel-primary'>"; 
								echo "<div class='panel-heading'>";
									echo "<h3 class='panel-title'>Your Requests</h3>";
								echo  "</div>"; 

						//Reset Array. 
						mysqli_data_seek($set, 0); 

						while($row = mysqli_fetch_array($set))
						{

						
							echo "<div class='panel-body status_format'>"; 

								echo "<a href='view_request.php?reqid=" . $row['requestID'] . "'>";
								echo "<div class='mobile-request'>"; 
									echo "<span> Request ID: " . $row['requestID'] . "</span>" . "<br/>"; 
									echo "<span> Date: " . $row['date_request'] . "</span>". "<br/>";
									echo "<span> Pick Up Time: " . $row['PTime'] . "</span>". "<br/>"; 
									echo "<span> Pick Up Location: " . $row['PLoc'] . "</span>". "<br/>"; 
									echo "<span> Duration: " . $row['Duration'] . "</span>". "<br/>"; 
									echo "<span> Drop Off Location: " . $row['DLocation'] . "</span>". "<br/>"; 
									echo "<span> Vehicle Type: " . $row['Veh_Type'] . "</span>". "<br/>"; 
								echo "</div>"; 
								echo "</a>"; 

							echo "</div>"; 

							
						}

						echo "</div>"; 

				?>
			</div>
		</div>
		<!-- END MOBILE REQUESTS -->



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
	<!-- END SCRIPTS -->
</body>
</html>