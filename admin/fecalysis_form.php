<!DOCTYPE html>
<?php
    require_once 'logincheck.php';
    $conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());

    // Validate `$_GET` parameters
    if (!isset($_GET['itr_no']) || !isset($_GET['fecalysis_id'])) {
        die("Invalid request: Missing parameters.");
    }

    // Sanitize inputs to prevent SQL injection
    $itr_no = $conn->real_escape_string($_GET['itr_no']);
    $fecalysis_id = $conn->real_escape_string($_GET['fecalysis_id']);

    // Fetch user information
    $query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die($conn->error);
    $fetch = $query->fetch_array();

    // Fetch fecalysis record
    $q = $conn->query("SELECT * FROM `fecalisys` NATURAL JOIN `itr` WHERE `itr_no` = '$itr_no' AND `fecalisys_id` = '$fecalysis_id'") or die($conn->error);

    // Check if record exists
    if ($q->num_rows > 0) {
        $f = $q->fetch_array();
    } else {
        $f = null;
    }
?>
<html lang="en">
<head>    
    <title>Health Center Patient Record Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="css/customize.css" />
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <img src="images/logo.png" style="float:left;" height="55px" />
        <label class="navbar-brand">Health Center Patient Record Management System - Sitio Ronggot</label>
        <ul class="nav navbar-right">    
            <li class="dropdown">
                <a class="user dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo htmlspecialchars($fetch['firstname'] . " " . $fetch['lastname']); ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="me" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <br />
    <br />
    <br />
    <div class="well">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <center><label>FECALYSIS</label></center>
            </div>
        </div>
        <?php if ($f): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>FECALYSIS RESULT FORM</label>
                    <a style="float:right; margin-top:-4px;" href="fecalysis_record.php?itr_no=<?php echo $f['itr_no']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-hand-right"></span> BACK</a>
                    <a style="float:right; margin-top:-4px; margin-right:4px;" href="fecalysis_print.php?itr_no=<?php echo $f['itr_no']; ?>&fecalysis_id=<?php echo $fecalysis_id; ?>" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> PRINT</a>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">Basic Information</div>
                    <div style="float:left; width:30%;">
                        <label style="font-size:18px;">Name</label>
                        <br />
                        <label style="font-size:18px;" class="text-muted">
                            <?php echo htmlspecialchars($f['firstname'] . " " . $f['middlename'] . " " . $f['lastname']); ?>
                        </label>
                    </div>
                    <div style="float:left; width:10%;">
                        <label style="font-size:18px;">Age</label>
                        <br />
                        <label style="font-size:18px;" class="text-muted"><?php echo htmlspecialchars($f['age']); ?></label>
                    </div>
                    <div style="float:left; width:10%;">
                        <label style="font-size:18px;">Gender</label>
                        <br />
                        <label style="font-size:18px;" class="text-muted"><?php echo htmlspecialchars($f['gender']); ?></label>
                    </div>
                    <div style="float:left; width:40%;">    
                        <label style="font-size:18px;">Address</label>
                        <br />
                        <label style="font-size:18px;" class="text-muted"><?php echo htmlspecialchars($f['address']); ?></label>                    
                    </div>
                    <br style="clear:both;"/>
                    <hr style="border:1px dotted #d3d3d3;" />
                    <!-- Additional fields go here, similar to the code above -->
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">No records found for the given parameters.</div>
        <?php endif; ?>
    </div>
    <div id="footer"></div>
</body>
<?php require "script.php"; ?>
</html>
