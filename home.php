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
								Date: 
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" id="datepicker" name="date_request">
							
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Pick Up Time:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								
								<select name="pick_up" id="pick_up">
									<option value="1000">10:00</option>
									<option value="1100">11:00</option>
									<option value="1200">12:00</option>
									<option value="1300">13:00</option>
									<option value="1400">14:00</option>
									<option value="1500">15:00</option>
									<option value="1600">16:00</option>
								</select>

							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Pick Up Location:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $_SESSION['plocation'] ?>" name="loc" id="PLoc">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Drop Off Location:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $_SESSION['DLocation'] ?>" name="DLocation" id="DLoc">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 form-label">
								Duration:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								

								 <select name="duration">
									<option value="30">30 Mins</option>
									<option value="1">1 Hour</option>
									<option value="1.5">1.5 Hour</option>
									<option value="2">2 Hour</option>
									<option value="2.5">2.5 Hour</option>
									<option value="3">3 Hour</option>
									<option value="3.5">3.5 Hour</option>
									<option value="4">4 Hour</option>
									<option value="4.5">4.5 Hour</option>
									<option value="5">5 Hour</option>
									<option value="5.5">5.5 Hour</option>
									<option value="6">6 Hour</option>
									<option value="6.5">6.5 Hour</option>
									<option value="7">7 Hour</option>
									<option value="7.5">7.5 Hour</option>
									<option value="8">8 Hour</option>
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
								Contact Number:
							</div>

							<div class="col-xs-12 col-sm-6 form-label">
								 <input type="text" value="<?php echo $_SESSION['num'] ?>" name="num" id="num">
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
							include 'connection.php'; 

							$getRecent = "SELECT t.fName, t.lName, r.date_request, r.PTime, r.PLoc
											FROM request r, tester t, requestline rl
											WHERE rl.requestID = r.requestID 
											AND rl.testerID = t.testerID 
											ORDER BY r.date_request DESC
											LIMIT 1,5; ";

							$set = mysqli_query($con,$getRecent)or die(mysqli_error($con)); 

							while($row =  mysqli_fetch_array($set))
							{
								echo "<div class='recents'>"; 
									echo $row['fName'] . " " . $row['lName'] . " booked a carey car for " . $row['date_request'] . " at " .  $row['PTime'] . " from ".  $row['PLoc']. "<br/>"; 
								echo "</div>"; 
							}

						?>
					</div>
				</div>
			</div>
			<!-- END STATUS -->

			<!-- MOBILE UI TIMETABLE -->
			<div class="col-xs-12 visible-xs">
				<div class="panel panel-primary">
					<div class="panel-heading">
						 <h3 class="panel-title">Already Booked</h3>
					</div>

					<!-- BOOKINGS FROM EACH PERSON -->

					<div class="panel-body status_format">
						<div class="mobile-booking">
							Request ID: example <br/>
							Pick Up Time: example <br/>
							Pick Up Date: example <br/>
							Duration: example <br/>
							Vehicle Type: example <br/>
						</div>
					</div>
				</div>
			</div>
			<!-- END MOBILE UI TIMETABLE -->

		</div>

		<div class="row hidden-xs">
			<div class="col-xs-12">
				<?php 

					echo '<div class="weekoff">Schedule for:<br/> ' .date("d-m-Y",strtotime('monday this week')).' To '. date("d-m-Y",strtotime("sunday this week")) . '</div>';    

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

				

				
				<tr>
					<th>08:00</th>
					<td id="Mon800"><?php compareData("Mon0800",$Dates,$Locations, $Names); ?></td>
					<td id="Tue800"><?php compareData("Tue0800",$Dates,$Locations, $Names); ?></td>
					<td id="Wed800"><?php compareData("Wed0800",$Dates,$Locations, $Names); ?></td>
					<td id="Thu800"><?php compareData("Thu0800",$Dates,$Locations, $Names); ?></td>
					<td id="Fri800"><?php compareData("Fri0800",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>09:00</th>
					<td id="Mon1300"><?php compareData("Mon0900",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1300"><?php compareData("Tue0900",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1300"><?php compareData("Wed0900",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1300"><?php compareData("Thu0900",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1300"><?php compareData("Fri0900",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>10:00</th>
					<td id="Mon1000"><?php compareData("Mon1000",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1000"><?php compareData("Tue1000",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1000"><?php compareData("Wed1000",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1000"><?php compareData("Thu1000",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1000"><?php compareData("Fri1000",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>11:00</th>
					<td id="Mon1100"><?php compareData("Mon1100",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1100"><?php compareData("Tue1100",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1100"><?php compareData("Wed1100",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1100"><?php compareData("Thu1100",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1100"><?php compareData("Fri1100",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>12:00</th>
					<td id="Mon1200"><?php compareData("Mon1200",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1200"><?php compareData("Tue1200",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1200"><?php compareData("Wed1200",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1200"><?php compareData("Thu1200",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1200"><?php compareData("Fri1200",$Dates,$Locations, $Names); ?></td>
				</tr>


				<tr>
					<th>13:00</th>
					<td id="Mon1300"><?php compareData("Mon1300",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1300"><?php compareData("Tue1300",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1300"><?php compareData("Wed1300",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1300"><?php compareData("Thu1300",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1300"><?php compareData("Fri1300",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>14:00</th>
					<td id="Mon1400"><?php compareData("Mon1400",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1400"><?php compareData("Tue1400",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1400"><?php compareData("Wed1400",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1400"><?php compareData("Thu1400",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1400"><?php compareData("Fri1400",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>15:00</th>
					<td id="Mon1500"><?php compareData("Mon1500",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1500"><?php compareData("Tue1500",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1500"><?php compareData("Wed1500",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1500"><?php compareData("Thu1500",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1500"><?php compareData("Fri1500",$Dates,$Locations, $Names); ?></td>
				</tr>

				<tr>
					<th>16:00</th>
					<td id="Mon1600"><?php compareData("Mon1600",$Dates,$Locations, $Names); ?></td>
					<td id="Tue1600"><?php compareData("Tue1600",$Dates,$Locations, $Names); ?></td>
					<td id="Wed1600"><?php compareData("Wed1600",$Dates,$Locations, $Names); ?></td>
					<td id="Thu1600"><?php compareData("Thu1600",$Dates,$Locations, $Names); ?></td>
					<td id="Fri1600"><?php compareData("Fri1600",$Dates,$Locations, $Names); ?></td>
				</tr>

			</table>
			</div>
		</div>
		<!-- END TABLE -->

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

	
	<!-- END SCRIPTS -->
</body>
</html>