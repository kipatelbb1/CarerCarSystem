<?php 
	//If the session does not exist then start a new session. 
	if(!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 


	//if the id has not been set from the logintester.php then they have not been authenticated and therefore need to log in. 
	if(!(isset($_SESSION['id'])))
	{
		header("Location: index.php"); /* Redirect browser */
		exit(); //Exit all processing. 
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
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="style/customStyle.css" />
	<link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css" />
	<!-- END STYLES -->

	<!-- COMPAT -->
	<!--[if lt IE 9]>
        <script src="scripts/compat/html5shiv.min.js"></script>
        <script src="scripts/compat/respond.min.js"></script>
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
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="request.php">My Requests</a></li>
				  <li><a href="settings.php">Settings</a></li>
				  <h4 class="welcome">Welcome <?php echo $_SESSION['fName'] . " " . $_SESSION['lName'] ?></h4>
				</ul>

			</div>

		</div>
		<!-- END NAV -->

		<?php 
			include 'connection.php'; 
			$query = "SELECT * FROM tester WHERE testerID =" . $_SESSION['id'];
			$set = mysqli_query($con, $query); 

			$row = mysqli_fetch_array($set); 



		?>

		<!-- FORM -->
		<div class="row "> 
			<div class="col-xs-12 col-sm-6 form_format">
					<div class="panel panel-primary">
						<div class="panel-heading">
						  <h3 class="panel-title">Form</h3>
						</div>

			 
					<div class="panel-body">
					<form action="determineSimilar.php" method="POST" id="requestForm" onsubmit="return checkInputs();">
						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Date: <div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" id="datepicker" name="date_request">
							
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Pick Up Time: <div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								
								<select name="pick_up" id="pick_up">
									<option value="1000">10:00</option>
									<option value="1030">10:30</option>
									<option value="1100">11:00</option>
									<option value="1130">11:30</option>
									<option value="1200">12:00</option>
									<option value="1230">12:30</option>
									<option value="1300">13:00</option>
									<option value="1330">13:30</option>
									<option value="1400">14:00</option>
									<option value="1430">14:30</option>
									<option value="1500">15:00</option>
									<option value="1530">15:30</option>
									<option value="1600">16:00</option>
									<option value="1630">16:30</option>
									<option value="1700">17:00</option>
									<option value="1730">17:30</option>
									<option value="1800">18:00</option>
								</select>

							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Pick Up Location: <div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $row['PLocation'] ?>" name="loc" id="PLoc">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Drop Off Location:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $row['DLocation'] ?>" name="DLocation" id="DLoc">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Duration:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								

								 <select name="duration">
									<option value="30">30 Mins</option>
									<option value="1">1 Hours</option>
									<option value="1.5">1.5 Hours</option>
									<option value="2">2 Hour</option>
									<option value="2.5">2.5 Hour</option>
									<option value="3">3 Hours</option>
									<option value="3.5">3.5 Hours</option>
									<option value="4">4 Hours</option>
									<option value="4.5">4.5 Hours</option>
									<option value="5">5 Hours</option>
									<option value="5.5">5.5 Hours</option>
									<option value="6">6 Hours</option>
									<option value="6.5">6.5 Hours</option>
									<option value="7">7 Hours</option>
									<option value="7.5">7.5 Hours</option>
									<option value="8">8 Hours</option>
								</select>
							</div>
						</div>

						<!-- NOT FUNCTIONALLY REQUIRED BUT TESTER MAY WANT TO CHANGE CONTACT NUMBER -->
						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Tester Name:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $_SESSION['name'] ?>" name="name" id="tester" disabled>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Contact Number: <div class="required_input">*</div>
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $row['MobileNo'] ?>" name="num" id="num">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Number Of Testers:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <select name="num_of_testers">

									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									
								</select> </div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Vehicle Type: 
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <select name="veh_type">

								<option value="executive">Executive Saloon</option>
								<option value="mpv">MPV</option>

							</select></div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Additional Comments: 
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								<input type="text" name="add" id="add" /></div>
							</div>
						</div>

						<input type="hidden" name="testerID" value="<?php echo $_SESSION['id'] ?>" />


						<div class="row">
							<div class="col-xs-12 col-sm-offset-5 form-label">
								<input type="submit" value="Submit"/>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12  form-label" >
								<div class="alert alert-danger" role="alert" id="request_validation">Ensure you enter all details!</div>
							</div>
						</div>


					</form>
					</div>


						<!-- PHP script to query and get all prefered details of the user.   -->				
					
			</div> 
			<!-- END FORM -->

			<!-- STATUS -->
			<div class="col-xs-12 col-sm-6">
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						 <h3 class="panel-title">Status</h3>
					</div>

					<div class="panel-body status_format">
						<h3 class="req_title">Recently Requested</h3>

						<?php 
							//Create a connection with the database. 
							include 'connection.php'; 

							//Create a query to retrieve the recently requested. 
							$getRecent = "SELECT t.fName, t.lName, r.requestID ,r.date_request, r.PTime, r.PLoc
											FROM request r, tester t, requestline rl
											WHERE rl.requestID = r.requestID 
											AND rl.testerID = t.testerID 
											ORDER BY r.date_request DESC
											LIMIT 0,5; ";

							//Execute Query
							$set = mysqli_query($con,$getRecent)or die(mysqli_error($con)); 
							//Cycle through each record and display with class recents. 
							while($row =  mysqli_fetch_array($set))
							{
								echo "<div class='recents'>"; 
									echo "<a href=view_request.php?reqid=" . $row['requestID'] . ">"; 
									echo $row['fName'] . " " . $row['lName'] . " booked a carey car for " . $row['date_request'] . " at " .  $row['PTime'] . " from ".  $row['PLoc']. "<br/>"; 
									echo "</a>";
								echo "</div>"; 
							}

							if(mysqli_num_rows($set)==0)
							{
								echo "No recent requests.."; 
							}
						?>
					</div>
				</div>
			</div>
			<!-- END STATUS -->

		

		</div>

		<div class="row hidden-xs">
			<div class="col-xs-12">
				<?php 
					//Print the current working week we are displaying results for. 
					//echo '<div class="weekoff">Schedule for:<br/> ' .date("d-m-Y",strtotime('monday this week')).' To '. date("d-m-Y",strtotime("sunday this week")) . '</div>';    
					//Init the testDate.php to extract some data from the database and get it ready for the timetable. 
					include 'testDate.php';
				?>

			</div>

		</div>
	


		<!-- TABLE -->

		<div class="row hidden-xs">
			<div class="col-xs-12">

			<table>
				<tr>
					<th class="top-header"></th>
					<th class="top-header">Monday</th>
					<th class="top-header">Tuesday</th>
					<th class="top-header">Wednesday</th>
					<th class="top-header">Thursday</th>
					<th class="top-header">Friday</th>
				</tr>

				<!-- 
					For each time period, a php script is called which determines if there is a request with the time stamp e.g. Mon0800. 
					The Dates, Locations and Names variables were created when the testDate.php was included into the HTML file. 
					The Retrieved date is then checked to see if it is within the current week and printed if so. 

					This operation is completed for every datetimestamp. 
				-->

			
				<tr>
					<th>08:00</th>
					<td id="Mon0800"><?php compareData("Mon0800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue0800"><?php compareData("Tue0800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed0800"><?php compareData("Wed0800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu0800"><?php compareData("Thu0800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri0800"><?php compareData("Fri0800",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>08:30</th>
					<td id="Mon0830"><?php compareData("Mon0830",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue0830"><?php compareData("Tue0830",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed0830"><?php compareData("Wed0830",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu0830"><?php compareData("Thu0830",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri0830"><?php compareData("Fri0830",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>



				<tr>
					<th>09:00</th>
					<td id="Mon0900"><?php compareData("Mon0900",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue0900"><?php compareData("Tue0900",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed0900"><?php compareData("Wed0900",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu0900"><?php compareData("Thu0900",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri0900"><?php compareData("Fri0900",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>09:30</th>
					<td id="Mon0930"><?php compareData("Mon0930",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue0930"><?php compareData("Tue0930",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed0930"><?php compareData("Wed0930",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu0930"><?php compareData("Thu0930",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri0930"><?php compareData("Fri0930",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>10:00</th>
					<td id="Mon1000"><?php compareData("Mon1000",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1000"><?php compareData("Tue1000",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1000"><?php compareData("Wed1000",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1000"><?php compareData("Thu1000",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1000"><?php compareData("Fri1000",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>10:30</th>
					<td id="Mon1030"><?php compareData("Mon1030",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1030"><?php compareData("Tue1030",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1030"><?php compareData("Wed1030",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1030"><?php compareData("Thu1030",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1030"><?php compareData("Fri1030",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>11:00</th>
					<td id="Mon1100"><?php compareData("Mon1100",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1100"><?php compareData("Tue1100",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1100"><?php compareData("Wed1100",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1100"><?php compareData("Thu1100",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1100"><?php compareData("Fri1100",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>11:30</th>
					<td id="Mon1130"><?php compareData("Mon1130",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1130"><?php compareData("Tue1130",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1130"><?php compareData("Wed1130",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1130"><?php compareData("Thu1130",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1130"><?php compareData("Fri1130",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>12:00</th>
					<td id="Mon1200"><?php compareData("Mon1200",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1200"><?php compareData("Tue1200",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1200"><?php compareData("Wed1200",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1200"><?php compareData("Thu1200",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1200"><?php compareData("Fri1200",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>12:30</th>
					<td id="Mon1230"><?php compareData("Mon1230",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1230"><?php compareData("Tue1230",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1230"><?php compareData("Wed1230",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1230"><?php compareData("Thu1230",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1230"><?php compareData("Fri1230",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>13:00</th>
					<td id="Mon1300"><?php compareData("Mon1300",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1300"><?php compareData("Tue1300",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1300"><?php compareData("Wed1300",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1300"><?php compareData("Thu1300",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1300"><?php compareData("Fri1300",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>13:30</th>
					<td id="Mon1330"><?php compareData("Mon1330",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1330"><?php compareData("Tue1330",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1330"><?php compareData("Wed1330",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1330"><?php compareData("Thu1330",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1330"><?php compareData("Fri1330",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>14:00</th>
					<td id="Mon1400"><?php compareData("Mon1400",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1400"><?php compareData("Tue1400",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1400"><?php compareData("Wed1400",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1400"><?php compareData("Thu1400",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1400"><?php compareData("Fri1400",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>14:30</th>
					<td id="Mon1430"><?php compareData("Mon1430",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1430"><?php compareData("Tue1430",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1430"><?php compareData("Wed1430",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1430"><?php compareData("Thu1430",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1430"><?php compareData("Fri1430",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>15:00</th>
					<td id="Mon1500"><?php compareData("Mon1500",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1500"><?php compareData("Tue1500",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1500"><?php compareData("Wed1500",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1500"><?php compareData("Thu1500",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1500"><?php compareData("Fri1500",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>15:30</th>
					<td id="Mon1530"><?php compareData("Mon1530",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1530"><?php compareData("Tue1530",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1530"><?php compareData("Wed1530",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1530"><?php compareData("Thu1530",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1530"><?php compareData("Fri1530",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>16:00</th>
					<td id="Mon1600"><?php compareData("Mon1600",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1600"><?php compareData("Tue1600",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1600"><?php compareData("Wed1600",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1600"><?php compareData("Thu1600",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1600"><?php compareData("Fri1600",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>16:30</th>
					<td id="Mon1630"><?php compareData("Mon1630",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1630"><?php compareData("Tue1630",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1630"><?php compareData("Wed1630",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1630"><?php compareData("Thu1630",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1630"><?php compareData("Fri1630",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>17:00</th>
					<td id="Mon1700"><?php compareData("Mon1700",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1700"><?php compareData("Tue1700",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1700"><?php compareData("Wed1700",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1700"><?php compareData("Thu1700",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1700"><?php compareData("Fri1700",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

				<tr>
					<th>17:30</th>
					<td id="Mon1730"><?php compareData("Mon1730",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1730"><?php compareData("Tue1730",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1730"><?php compareData("Wed1730",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1730"><?php compareData("Thu1730",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1730"><?php compareData("Fri1730",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>


				<tr>
					<th>18:00</th>
					<td id="Mon1800"><?php compareData("Mon1800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Tue1800"><?php compareData("Tue1800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Wed1800"><?php compareData("Wed1800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Thu1800"><?php compareData("Thu1800",$Dates,$Locations, $Names, $requestIDs); ?></td>
					<td id="Fri1800"><?php compareData("Fri1800",$Dates,$Locations, $Names, $requestIDs); ?></td>
				</tr>

			</table>
			</div>
		</div>
		<!-- END TABLE -->

			<!-- MOBILE UI TIMETABLE -->
			<div class="col-xs-12 visible-xs">
				<div class="panel panel-primary">
					<div class="panel-heading">
						 <h3 class="panel-title">This Week</h3>
					</div>
					<!-- BOOKINGS FROM EACH PERSON -->
					<div class="panel-body status_format">
						<div class="mobile-booking">
							<?php include 'thisweek.php'; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- END MOBILE UI TIMETABLE -->

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
	<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/customscript.js"></script>	
	<script type="text/javascript" src="scripts/ValidationScripts.js"></script>	
	<script type="text/javascript" src="scripts/datepicker.js"></script>

	
	<!-- END SCRIPTS -->
</body>
</html>