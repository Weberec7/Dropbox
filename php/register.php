<?php
session_start();
//session_regenerate_id();
$replacement = "x547t32";
$_SESSION['My_ID'] = substr_replace(session_id(), $replacement, 7, 13);
?>
<!doctype html>
<html class="no-js" lang="en" manifest="/cache.manifest">
	<head>
		<meta charset="utf-8">
		<title>Registration Form</title>
		<meta name="description" content="Register Form">
		<meta name="author" content="POP">
		<link href="/dropBox/css/loginmodule.css" rel="stylesheet" type="text/css" />
		<script src="/dropBox/js/modernizr.js"></script>
		<script src="/dropBox/js/jquery.js"></script>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<script>
		$(document).ready(function() {
 
    $('#password').keyup(function(){
        $('#result').html(checkStrength($('#password').val()))
    })  
 
    function checkStrength(password){
 
    //initial strength
    var strength = 0
 
    //if the password length is less than 6, return message.
    if (password.length < 6) {
        $('#result').removeClass()
        $('#result').addClass('short')
        return 'Too short'
    }
 
    //length is ok, lets continue.
 
    //if length is 8 characters or more, increase strength value
    if (password.length > 7) strength += 1
 
    //if password contains both lower and uppercase characters, increase strength value
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
 
    //if it has numbers and characters, increase strength value
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
 
    //if it has one special character, increase strength value
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
 
    //if it has two special characters, increase strength value
    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1
 
    //now we have calculated strength value, we can return messages
 
    //if value is less than 2
    if (strength < 3 ) {
        $('#result').removeClass()
        $('#result').addClass('weak')
        return 'Weak'
    } else if (strength == 3 ) {
        $('#result').removeClass()
        $('#result').addClass('good')
        return 'Good'
    } else {
        $('#result').removeClass()
        $('#result').addClass('strong')
        return 'Strong'
    }
}
});
		
	</script>
	
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
				<h1>ProntoFolio</h1>
				<h2>Your Digital Portfolio Solution</h2>
                <h3>Sign Up Today!</h3>
			</hgroup>
			<div>
				<p align="center">Already a user?  Click here to <a href="@login">Login</a></p>
				
			</div>
            <div class="form">
		<form id="register" name="loginForm" method="post" action="@register-exec">
			<ul>
				<li>
					<lable for="fname" class="lable">First Name</lable>
					<input name="fname" type="text" class="textfield" id="fname" required aria-required="true"placeholder="Alex"/>
				</li>
				<li>
					<lable for="lname" class="lable">Last Name</lable>
					<input name="lname" type="text" class="textfield" id="lname" required aria-required="true" placeholder="Crawly"/>
				</li>
				<li>
					<lable for="email" class="lable">Email</lable>
					<input name="email" type="email" class="textfield" id="email" required aria-required="true" placeholder="alexander.crawly82@gmail.com"/>
				</li>
				<li>
					<lable for="webname" class="lable">Website Name</lable>
					<input name="webname" type="text" class="textfield" id="webname" required aria-required="true" placeholder="alexander.crawly"/>
				</li>
				<li>
					<lable for="password">Password</lable>
					<input name="password" type="password" class="password" id="password" required aria-required="true"/>
					<span id="result"></span>
				</li>
				<li>
					
				</li>
				<li>
					<lable for="cpassword">Confirm Password</lable>
					<input name="cpassword" type="password" class="password" id="cpassword" required aria-required="true"/>
				</li>
				<br>
				<hgroup>
				<h2>Initial Portfolio Settings</h2>
				<p>Please check which sections you would like to have in your online portfolio.</p>
				<p>You can alter these settings at a later time if you like.</p>
				</hgroup>
			
				<li>
					<lable for="image">Image Gallery</lable>
					<input name="image" type="checkbox" class="checkbox" id="image" value="1"/>
				</li>
				<li>
					<lable for="video">Video Gallery</lable>
					<input name="video" type="checkbox" class="checkbox" id="video" value="1"/>
				</li>
				<li>
					<lable for="bio">Bio</lable>
					<input name="bio" type="checkbox" class="checkbox" id="bio" value="1"/>
				</li>
				<li>
					<lable for="resume">Resume</lable>
					<input name="resume" type="checkbox" class="checkbox" id="resume" value="1"/>
				</li>
				<li>
					<lable for="rpapers">Research Papers</lable>
					<input name="rpapers" type="checkbox" class="checkbox" id="rpapers" value="1"/>
				</li>
				<li>
					<lable for="contact">Contact and Links</lable>
					<input name="contact" type="checkbox" class="checkbox" id="contact" value="1"/>
				</li>
				<li>
					<lable for="accomplishments">Accomplishments</lable>
					<input name="accomplishments" type="checkbox" class="checkbox" id="accomplishments" value="1"/>
				</li>
				<li>
					<lable for="clients">Clients</lable>
					<input name="clients" type="checkbox" class="checkbox" id="clients" value="1"/>
				</li>
				<li>
					<lable for="wprocess">Work Process</lable>
					<input name="wprocess" type="checkbox" class="checkbox" id="wprocess" value="1"/>
				</li>
                <li>
					<lable for="services">Services</lable>
					<input name="services" type="checkbox" class="checkbox" id="services" value="1"/>
				</li>
				
				<li>
					<lable for="captcha">Please type the characters you see in the picture below.</lable>
					<img name="captcha" id="captcha" width="264px" height="100px" src=<?php echo("http://captchator.com/captcha/image/".$_SESSION['My_ID']. "")?> />
				</li>
				
				<li>
					<lable for="wverify">Word Verification</lable>
					<input name="wverify" type="text" class="textfield" id="wverify" required aria-required="true" autocomplete="off" />
				</li>
				<li>
					<lable for="agree">I agree to POP's Terms of Service and Privacy Policy</lable>
					<input name="agree" type="checkbox" class="checkbox" id="agree" value="1" required aria-required="true"/>
				</li>
				
				
				<li>
					<input name="Submit" type="submit" value="Register" />
				</li>
				
			</ul>
		</form>
		</div>
        <div class="news">
        <hgroup>
        <h2>About ProntoFolio</h2>
        <a>ProntoFolio is an automated digital portfolio that integrates with your DropBox account.  All you have to do is put files into dropbox and your new Digital Portfolio Website is automatically Updated.  ProntoFolio can display your Images, Videos, Bio, Clients, Work Process and so much more.  Maintaining a professioinal portfolio has never been easier.  Sign Up Today!</a>
        <a href=" https://www.dropbox.com""><img src="/dropBox/pics/tour5.png" style="width:400px"></a>
        </div>
        
        
        </div>
        
        <footer>
<br>
<a class="bottomnav" >Please contact Prontofolio for additional information ~ Email: ec7soccer@gmail.com</a>
</footer>
		</div>
	</body>
	
	
</html>
