<?php

	//Include database connection details
	
$Webname = WEB_NAME;


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
	
		if($errflag) {
		define('ErrMsgs', $errmsg_arr);
		header("location: ../Error.php");
		exit();
	}
	

$Webname = clean($Webname);
$query="SELECT member_id, firstname, lastname, email, pageholder FROM members WHERE webname='$Webname'";
$result=mysql_query($query);
if($result){
if(mysql_num_rows($result) == 1) {
$member = mysql_fetch_assoc($result);
	
define('USER_ID', $member['member_id']);	
define('FIRST_NAME', $member['firstname']);
define('LAST_NAME', $member['lastname']);
define('LOGIN_NAME', $member['email']);
define('WEBSITE', $Webname);
define('PAGEHOLDER', $member['pageholder']);
}
}


?>