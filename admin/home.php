<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$qfecalysis = $conn->query("SELECT COUNT(*) as total FROM fecalisys WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$ffecalysis = $qfecalysis->fetch_array();
	$qmaternity = $conn->query("SELECT COUNT(*) as total FROM birthing prenatal WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$fmaternity = $qmaternity->fetch_array();
	$qhematology = $conn->query("SELECT COUNT(*) as total FROM hematology WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$fhematology = $qhematology->fetch_array();
	$qdental = $conn->query("SELECT COUNT(*) as total FROM dental WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$fdental = $qdental->fetch_array();
	$qxray = $conn->query("SELECT COUNT(*) as total FROM radiological WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$fxray = $qxray->fetch_array();
	$qrehab = $conn->query("SELECT COUNT(*) as total FROM rehabilitation WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$frehab = $qrehab->fetch_array();
	$qsputum = $conn->query("SELECT COUNT(*) as total FROM sputum WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$fsputum = $qsputum->fetch_array();
	$qurinalysis = $conn->query("SELECT COUNT(*) as total FROM urinalysis WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
	$furinalysis = $qurinalysis->fetch_array();
?>
<body style="margin-top: 60px;">
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<?php require 'script.php'?>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
			window.onload = function() { 
				$("#chartContainer").CanvasJSChart({ 
					title: { 
						text: "Total Patient Population <?php echo $date?>",
						fontSize: 24
					}, 
					axisY: { 
						title: "asda" 
					}, 
					legend :{ 
						verticalAlign: "center", 
						horizontalAlign: "left" 
					}, 
					data: [ 
					{ 
						type: "pie", 
						showInLegend: true, 
						toolTipContent: "{label} <br/> {y}", 
						indexLabel: "{y}", 
						dataPoints: [ 
							{ label: "Fecalysis",  y: 
								<?php 
									if($ffecalysis == ""){
											echo 0;
									}else{
										echo $ffecalysis['total'];
									}
								?>, legendText: "Fecalysis"}, 
							{ label: "Maternity",  y: 
								<?php 
									if($fmaternity == ""){
										echo 0;
									}else{
										echo $fmaternity['total'];
									}	
								?>, legendText: "Maternity"},
							{ label: "Hematology",  y: 
								<?php 
									if($fhematology == ""){
										echo 0;
									}else{
										echo $fhematology['total'];
									}	
								?>, legendText: "Hematology"},
							{ label: "Dental",  y: 
								<?php 
									if($fdental == ""){
										echo 0;
									}else{
									echo $fdental['total'];
									}
								?>, legendText: "Dental"},
							{ label: "Xray",  y: 
								<?php 
									if($fxray == ""){
										echo 0;
									}else{
										echo $fxray['total'];
									}	
								?>, legendText: "Xray"},
							
							{ label: "Urinalysis",  y: 
								<?php 
									if($furinalysis == ""){
										echo 0;
									}else{
										echo $furinalysis['total'];
									}	
								?>, legendText: "Urinalysis"}
						] 
					} 
					] 
				}); 
			} 
		</script>
	</head>
	</body>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Health Center Patient Record Management System - Sitio Ronggot</label>
		<?php 
			$q = $conn->query("SELECT * FROM admin WHERE admin_id = $_SESSION[admin_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $f['firstname']." ".$f['lastname'];
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<!DOCTYPE html>
<?php
    require_once 'logincheck.php';
    $date = date("Y", strtotime("+8 HOURS"));
    $conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());

    // Fetch patient statistics
    $qfecalysis = $conn->query("SELECT COUNT(*) as total FROM fecalisys WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
    $ffecalysis = $qfecalysis->fetch_array();
    $qmaternity = $conn->query("SELECT COUNT(*) as total FROM birthing WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
    $fmaternity = $qmaternity->fetch_array();
    $qhematology = $conn->query("SELECT COUNT(*) as total FROM hematology WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
    $fhematology = $qhematology->fetch_array();
    $qdental = $conn->query("SELECT COUNT(*) as total FROM dental WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
    $fdental = $qdental->fetch_array();
    $qxray = $conn->query("SELECT COUNT(*) as total FROM radiological WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
    $fxray = $qxray->fetch_array();
    $qurinalysis = $conn->query("SELECT COUNT(*) as total FROM urinalysis WHERE year = '$date' GROUP BY itr_no") or die(mysqli_error());
    $furinalysis = $qurinalysis->fetch_array();
?>
<html lang="eng">
<head>
    <title>Health Center Patient Record Management System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/logo.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="../css/customize.css" />
    <?php require 'script.php'; ?>
    <script src="../js/jquery.canvasjs.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            $("#chartContainer").CanvasJSChart({
                title: {
                    text: "Total Patient Population <?php echo $date; ?>",
                    fontSize: 24
                },
                axisY: {
                    title: "Population"
                },
                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "left"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y}",
                        indexLabel: "{y}",
                        dataPoints: [
                            { label: "Fecalysis", y: <?php echo $ffecalysis['total'] ?? 0; ?>, legendText: "Fecalysis" },
                            { label: "Maternity", y: <?php echo $fmaternity['total'] ?? 0; ?>, legendText: "Maternity" },
                            { label: "Hematology", y: <?php echo $fhematology['total'] ?? 0; ?>, legendText: "Hematology" },
                            { label: "Dental", y: <?php echo $fdental['total'] ?? 0; ?>, legendText: "Dental" },
                            { label: "Xray", y: <?php echo $fxray['total'] ?? 0; ?>, legendText: "Xray" },
                            { label: "Urinalysis", y: <?php echo $furinalysis['total'] ?? 0; ?>, legendText: "Urinalysis" }
                        ]
                    }
                ]
            });
        }
    </script>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <img src="../images/logo.png" style="float:left;" height="55px" />
        <label class="navbar-brand">Health Center Patient Record Management System - Sitio Ronggot</label>
        <?php
            $q = $conn->query("SELECT * FROM admin WHERE admin_id = '$_SESSION[admin_id]'") or die(mysqli_error());
            $f = $q->fetch_array();
        ?>
        <ul class="nav navbar-right">
            <li class="dropdown">
                <a class="user dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo $f['firstname'] . " " . $f['lastname']; ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="me" href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="sidebar">
    <ul id="menu" class="nav menu">
        <li>
            <a href="home.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
            <ul>
                <li><a href="fecalysis.php"><i class="glyphicon glyphicon-folder-open"></i> Fecalysis</a></li>
                <li><a href="maternity.php"><i class="glyphicon glyphicon-folder-open"></i> Maternity</a></li>
                <li><a href="hematology.php"><i class="glyphicon glyphicon-folder-open"></i> Hematology</a></li>
                <li><a href="dental.php"><i class="glyphicon glyphicon-folder-open"></i> Dental</a></li>
                <li><a href="xray.php"><i class="glyphicon glyphicon-folder-open"></i> Xray</a></li>
                <li><a href="urinalysis.php"><i class="glyphicon glyphicon-folder-open"></i> Urinalysis</a></li>
            </ul>
        </li>
        <li>
            <a href=""><i class="glyphicon glyphicon-cog"></i> Accounts</a>
            <ul>
                <li><a href="admin.php"><i class="glyphicon glyphicon-cog"></i> Administrator</a></li>
                <li><a href="user.php"><i class="glyphicon glyphicon-cog"></i> User</a></li>
            </ul>
        </li>
    </ul>
</div>
<div id = "content">
		<br />
		<div class = "well">
			<div id="chartContainer" style="width: 100%; height: 400px"></div> 
		</div>
		<div id="addPatientModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
				<label>ADD PATIENT INFORMATION</label>
			</div>
			<div class = "panel-body">
				<form id = "form_dental" method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">ITR No:</label>
						<input class = "form-control" size = "3" min = "0" type = "number" name = "itr_no">
					</div>
					<div style = "float:right;" class = "form-inline">
						<label for = "family_no">Family no:</label>
						<input class = "form-control" placeholder = "(Optional)" size = "5" type = "text" name = "family_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Firstname:</label>
						<input class = "form-control" name = "firstname" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Middle Name:</label>
						<input class = "form-control" name = "middlename" placeholder = "(Optional)" type = "text">
						&nbsp;&nbsp;
						<label for = "lastname">Lastname:</label>
						<input class = "form-control" name = "lastname" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label for = "birthdate" style = "float:left;">Birthdate:</label>
						<br style = "clear:both;" />
						<select name = "month" style = "width:20%; float:left;" class = "form-control" required = "required">
							<option value = "">Select a month</option>
							<option value = "01">January</option>
							<option value = "02">February</option>
							<option value = "03">March</option>
							<option value = "04">April</option>
							<option value = "05">May</option>
							<option value = "06">June</option>
							<option value = "07">July</option>
							<option value = "08">August</option>
							<option value = "09">September</option>
							<option value = "10">October</option>
							<option value = "11">November</option>
							<option value = "12">December</option>
						</select>
						<select name = "day" class = "form-control" style = "width:18%; float:left;" required = "required">
							<option value = "">Select a day</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "year" class = "form-control" style = "width:18%; float:left;" required = "required">
							<option value = "">Select a year</option>
							<?php
								$a = date('Y');
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
						<br style = "clear:both;"/>
						<br />
						<label for = "phil_health_no">Phil Health no:</label>
						<input name = "phil_health_no" placeholder = "(if any)" class = "form-control" type = "text">
						<br />
						<label for = "address">Address:</label>
						<input class = "form-control" name = "address" type = "text" required = "required">
						<br />
						<label for = "age">Age:</label>
						<input class = "form-control" style = "width:20%;" min = "0" max = "999" name = "age" type = "number">
						<br />
						<label for = "civil_status">Civil Status:</label>
						<select style = "width:22%;" class = "form-control" name = "civil_status" required = "required">
							<option value = "">--Please select an option--</option>
							<option value = "Single">Single</option>
							<option value = "Married">Married</option>
						</select>
						<br />
						<label for = "gender">Gender:</label>
						<select style = "width:22%;" class = "form-control" name = "gender" required = "required">
							<option value = "">--Please select an option--</option>
							<option value = "Male">Male</option>
							<option value = "Female">Female</option>
						</select>
					</div>
					<br />
					<div class = "form-inline">
						<label for = "bp">BP:</label>
						<input class = "form-control" name = "bp" type = "text"  required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "temp">TEMP:</label>
						<input class = "form-control" name = "temp" type = "number" max = "999" min = "0" size = "15" required = "required"><label>&deg;C</label>
						&nbsp;&nbsp;&nbsp;
						<label for = "pr">PR:</label>
						<input class = "form-control" name = "pr" type = "text"  required = "required">
						<br />
						<br />
						<label for = "rr">RR:</label>
						<input class = "form-control" name = "rr" type = "text"  required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "wt">WT :</label>
						<input class = "form-control" name = "wt" style = "width:10%;" type = "number"  required = "required"><label>kg</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "ht">HT :</label>
						<input class = "form-control" name = "ht" style = "margin-right:10px;" type = "text"  required = "required">
					</div>
					<br />
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_patient"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							</div>
                </form>
            </div>
        </div>
    </div>
</div>
	
		<?php require '../add_patient.php'?>
		<div class="panel panel-primary">
			<div class="panel-heading">
                <label>PATIENTS LIST</label>
            </div>
            <div class="panel-body">
			<button id="show_itr" class="btn btn-info" data-toggle="modal" data-target="#addPatientModal">
    <span class="glyphicon glyphicon-plus"></span> CHECK-UP
</button>

                <br /><br />
                <table id="table" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ITR No</th>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Civil Status</th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = $conn->query("SELECT * FROM itr ORDER BY itr_no DESC") or die(mysqli_error());
                        while ($fetch = $query->fetch_array()) {
                            $id = $fetch['itr_no'];
                            $q = $conn->query("SELECT COUNT(*) as total FROM complaints WHERE itr_no = '$id' AND status = 'Pending'") or die(mysqli_error());
                            $f = $q->fetch_array();
                    ?>
                        <tr>
                            <td><?php echo $fetch['itr_no']; ?></td>
                            <td><?php echo $fetch['firstname'] . " " . $fetch['lastname']; ?></td>
                            <td><?php echo $fetch['birthdate']; ?></td>
                            <td><?php echo $fetch['age']; ?></td>
                            <td><?php echo $fetch['address']; ?></td>
                            <td><?php echo $fetch['civil_status']; ?></td>
                            <td><center>
                                <a href="complaints.php?id=<?php echo $fetch['itr_no']; ?>&lastname=<?php echo $fetch['lastname']; ?>" class="btn btn-sm btn-info">Concerns <span class="badge"><?php echo $f['total']; ?></span></a>
                                <a href="edit_patient.php?id=<?php echo $fetch['itr_no']; ?>&lastname=<?php echo $fetch['lastname']; ?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Update</a>
                                <a href="delete_patient.php?id=<?php echo $fetch['itr_no']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </center></td>
                        </tr>
                    <?php
                        }
                        $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>



	</div>
	<div id = "footer">

	</div>
		
</body>
</html>