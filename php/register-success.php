<?php
$Webname = $_GET['Webname'];
define('WEB_NAME',$Webname);
require_once('config.php');
require_once('Userconfig.php');
//require_once("bootstrap.php");
require_once("FileFill.php");
?>

<!doctype html>
<html class="no-js" lang="en" manifest="/cache.manifest">
	<head>
		<meta charset="utf-8">
		<title>Registration Successful</title>
		<meta name="description" content="Register Success">
		<meta name="author" content="POP">
		<link href="/dropBox/css/loginmodule.css" rel="stylesheet" type="text/css" />
		<!--<script src="../js/modernizr.js"></script>
		[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

<body>

		<div class="stdcontent">
        <div class ="stdcontenthelp">
			<hgroup>
		<h1>Personal Online Portfolio</h1>
		<h2>Registration Successful!</h2>
</hgroup>
<p><a href=<?php echo("/".WEB_NAME)?>>Click here</a> to view your new Portfolio.</p>
			
        </div>
        </div>
	</body>
</html>
</html>
