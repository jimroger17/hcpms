<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health Center Patient Record Management System</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/customize.css" />
    <style>
		#top {
    margin-top: 400px;
}
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('../images/ronggot.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .login {
            margin-top: 10%;
            position: relative;
            z-index: 1;
        }

        .navbar {
            z-index: 2;
            position: relative;
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 2;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-default">
        <img src="../images/logo.png" style="float:left;" height="55px" />
        <label class="navbar-brand">Health Center Patient Record Management System - Sitio Ronggot</label>
    </div>
    <div id="top" class="login">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h1 class="panel-title">Administrator</h1></center>
            </div>
            <div class="panel-body">
                <form enctype="multipart/form-data" action="login.php" role="form" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" name="username" placeholder="Username" type="text" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" name="password" placeholder="Password" type="password" required="required" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success" name="login">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </button>
                        <div class="form-group"style="text-align: center;">
                    <a href="forgot_password.php" style="text-decoration: underline; color: inherit;">Forgot Password</a>
                </div>
                
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <div id="footer"></div>
</body>
<?php
    include("script.php");
?>
<script type="text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward(); }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack(); }
    });
</script>
<script>
    function forgotPassword() {
        window.location.href = "forgot_password.php";
    }
</script>
</html>