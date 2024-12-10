<!DOCTYPE html>
<?php
require_once 'logincheck.php';
$conn = new mysqli("localhost", "root", "", "hcpms") or die("Connection failed: " . $conn->connect_error);

// Use prepared statements to securely fetch user data
$stmt = $conn->prepare("SELECT * FROM `user` WHERE `user_id` = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$fetch = $result->fetch_array();
$stmt->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Center Patient Record Management System</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/customize.css">
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <img src="images/logo.png" style="float:left;" height="55px">
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
    <br><br><br>
    <div class="well">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <center><label>FECALYSIS</label></center>
            </div>
        </div>
        <a style="float:right; margin-top:-4px;" href="view_fecalysis_record.php?itr_no=<?php echo htmlspecialchars($_GET['itr_no']); ?>" class="btn btn-info">
            <span class="glyphicon glyphicon-hand-right"></span> BACK
        </a>
        <br><br>
        <div class="panel panel-primary">
            <?php
            // Secure query for fetching patient details
            $stmt = $conn->prepare("SELECT * FROM `itr` WHERE `itr_no` = ?");
            $stmt->bind_param("s", $_GET['itr_no']);
            $stmt->execute();
            $result = $stmt->get_result();
            $f1 = $result->fetch_array();
            $stmt->close();
            ?>
            <div class="panel-heading">
                <h4>Fecalysis Record / <?php echo htmlspecialchars($f1['firstname'] . " " . $f1['lastname']); ?></h4>
            </div>
            <div class="panel-body">
                <table id="table" class="display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date Reported</th>
                            <th>Pathologist</th>
                            <th>Medical Technologist</th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Secure query for fetching fecalysis records
                        $stmt = $conn->prepare("SELECT * FROM `fecalisys` NATURAL JOIN `itr` WHERE `itr_no` = ? ORDER BY `date_reported` DESC");
                        $stmt->bind_param("s", $_GET['itr_no']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($f = $result->fetch_array()) {
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars(date("m/d/Y", strtotime($f['date_reported']))); ?></td>
                                <td><?php echo htmlspecialchars($f['pathologist']); ?></td>
                                <td><?php echo htmlspecialchars($f['medical_technologist']); ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" href="fecalysis_form.php?itr_no=<?php echo htmlspecialchars($f['itr_no']); ?>&fecalysis_id=<?php echo htmlspecialchars($f['fecalisys_id']); ?>">
                                            <span class="glyphicon glyphicon-search"></span> View Detail
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        <?php
                        }
                        $stmt->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
    <div id="footer"></div>
</body>
<?php require "script3.php"; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#table").DataTable({
            "paging": false,
            "info": false,
            "order": [[0, "desc"]]
        });
    });
</script>
</html>
