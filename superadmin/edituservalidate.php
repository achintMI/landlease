<?php
	include '../functions/function.php';
	include '../connection/dbCon.php';
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$id = $_POST['user_id'];

	$username = InjectionCheck($username);
	$email = InjectionCheck($email);
	$password = md5(InjectionCheck($password));
	$id = InjectionCheck($id);

	if(strlen($username)==0){
		$row = mysql_query("select * from user where user_id='$id'");
		$username = mysql_fetch_array($row);
		$username = $username['username'];
	}

	if(strlen($email) == 0){
		$row = mysql_query("select * from user where user_id='$id'");
		$email = mysql_fetch_array($row);
		$email = $email['user_email'];
	}

	if(strlen($password) == 0){
		$row = mysql_query("select * from user where user_id='$id'");
		$password = mysql_fetch_array($row);
		$password = $password['user_password'];
	}

	if(isset($username) && isset($email) && isset($password) && isset($id)){
		// Query to update the user
		$query = "update user set username='$username', user_password='$password', user_email='$email' where user_id='$id'";
		$runQuery = mysql_query($query);
	}

?>