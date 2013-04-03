<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	
	$pages[0] = $_POST['image'] * 2;  //images (2)
	$pages[1] = $_POST['video'] * 3;       //video  (3)
	$pages[2] = $_POST['bio'] *5;         //bio  (5)
	$pages[3] = $_POST['resume']*7;   //resume   (7)
	$pages[4] = $_POST['rpapers']*11;  //rpapers  (11)
	$pages[5] = $_POST['contact']*13;  //contact  (13)
	$pages[6] = $_POST['accomplishments']*17;  //accomplishments  (17)
	$pages[7] = $_POST['client']*19;  //client  (19)
	$pages[8] = $_POST['wprocess']*23;  //wprocess  (23)
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	$webname = clean($_POST['webname']);
	//Input Validations
	
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if($webname == '') {
		$errmsg_arr[] = 'Website Name missing';
		$errflag = true;
	}
	if(strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate email
	if($email != '') {
		$qry = "SELECT * FROM members WHERE email='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'This email is already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
		if($webname != '') {
		$qry = "SELECT * FROM members WHERE webname='$webname'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'This website name is already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: @register");
		exit();
	}
	
	// create pageholder
	$pageholder = 1;
	$count = count($pages);
	for($i = 0; $i<$count; $i++){
		if($pages[$i]!=0){
			$pageholder = $pageholder*$pages[$i];
			}
	}
	
	
	
	//Create INSERT query
	
	
	$qry = "INSERT INTO members(firstname, lastname, email, passwd, webname, pageholder) VALUES('$fname','$lname','$email','".md5($_POST['password'])."','$webname', '$pageholder')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: ".$webname."/register-success");
		exit();
	}else {
		die("Query failed");
	}
?>