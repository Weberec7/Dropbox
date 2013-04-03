<!doctype html>
<html class="no-js" lang="en" manifest="/cache.manifest">
	<head>
		<meta charset="utf-8">
		<title>User Login Page</title>
		<meta name="description" content="Login Form">
		<meta name="author" content="POP">
		<link href="/dropBox/css/loginmodule.css" rel="stylesheet" type="text/css" />
		<script src="../js/modernizr.js"></script>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
<body>
	<div class="stdcontent">
    <div class ="stdcontenthelp">
		
		<?php
		if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
			echo '<ul class="err">';
			foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>', $msg, '</li>';
			}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
		}
		?>
		
		
	<hgroup>
			<h1>Personal Online Portfolio</h1>
			<h2>User Log In!</h2>
	</hgroup>
	<p align="center">Not a Member?  Click here to <a href="@register">Register</a> Today!</p>

	<div class="form">
<form id="loginForm" name="loginForm" method="post" action="@login-exec">
	<ul>
		<li>
			<lable for="email">Email</lable>
			<input name="email" type="text" class="textfield" id="email" required aria-required="true"/>
		</li>
		<li>
			<lable for="password">Password</lable>
			<input name="password" type="password" class="textfield" id="password" required aria-required="true"/>
		</li>
		<li>
			<input type="submit" name="Submit" value="Login" />
		</li>
	</ul>
</form>

<hgroup>
<h2>Helpful Hints</h2>
<a>Did you Know that you can change your Profile website domain name in your user settings?</a>
</hgroup>
</div>
<div class="news">
        <hgroup>
        <h2>About ProntoFolio</h2>
        <a>ProntoFolio is an automated digital portfolio that integrates with your DropBox account.  All you have to do is put files into dropbox and your new Digital Portfolio Website is automatically Updated.  ProntoFolio can display your Images, Videos, Bio, Clients, Work Process and so much more.  Maintaining a professioinal portfolio has never been easier.  !</a>
        </hgroup>
        <a href=" https://www.dropbox.com""><img src="/dropBox/pics/tour5.png" style="width:400px"></a>
        </div>
       



</div>
<footer>
<br>
<a class="bottomnav" >Please contact Prontofolio for additional information ~ Email: ec7soccer@gmail.com</a>
<a href="/dropBox/pdf/ProntoFolioGuidelines.pdf" class="bottomnav">ProntoFolio GuideLines</a>
</footer>

</div>
</body>
</html>
