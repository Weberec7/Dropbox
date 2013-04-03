<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<!doctype html>
<html class="no-js" lang="en" manifest="/cache.manifest">
	<head>
		<meta charset="utf-8">
		<title>User Logged Out</title>
		<meta name="description" content="Logged Out">
		<meta name="author" content="POP">
		<link href="/dropBox/css/loginmodule.css" rel="stylesheet" type="text/css" />
		<script src="../js/modernizr.js"></script>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
<body>
	<div class="stdcontent">
<h1>Logout </h1>
<p align="center">&nbsp;</p>
<h4 align="center" class="err">You have been logged out.</h4>
<p align="center">Click here to <a href="@login">Login</a></p>
<br><br><br>
</div>
</body>
</html>
