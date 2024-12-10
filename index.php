<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
		<style>
	   body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('../images/ronggot.jpg') no-repeat center center fixed; /* Fixed background */
            background-size: cover;
            font-family: Arial, sans-serif;
	   }
        #sidelogin {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.8); /* Optional background for form */
            padding: 20px;
            border-radius: 10px;
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
	<div class = "navbar navbar-default navtop">
		<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Health Center Patient Record Management System - Sitio Ronggot</label>
	</div>
		<div id = "sidelogin">
			<form action = "login.php" enctype = "multipart/form-data" method = "POST" >
				<label class = "lbllogin">Please Login Here...</label>
				<br />
				<br />
				<div class = "form-group">
					<label for = "username">Username</label>
					<input class = "form-control" type = "text" name = "username"  required = "required"/>
				</div>
				<br />
				<div class = "form-group">
					<label for = "password">Password</label>
					<input class = "form-control" type = "password" name = "password" required = "required" />
				</div>
				<br />
				<div class = "form-group">
					<button class  = "btn btn-success form-control" type = "submit" name = "login" ><span class = "glyphicon glyphicon-log-in"></span> Login</button>
				</div>
				<div class="form-group"style="text-align: center;">
                    <a href="forgot_password.php" style="text-decoration: underline; color: inherit;">Forgot Password</a>
                </div>
				<script>
	function forgotPassword() {
		window.location.href = "forgot_password.php";
	}
</script>
 
			</form>
		</div>	
		<img src = "images/ronggot.jpg" class = "background">			
	<div id = "footer">
	</div>
</body>
<?php
	include("admin/script.php");
?>
</html>