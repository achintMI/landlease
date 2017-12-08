<?php

	include '../functions/function.php';
	include '../connection/dbCon.php';
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user_type = $_POST['user_type'];
	$cpassword = $_POST['cpassword'];


	$username = InjectionCheck($username);
	$email = InjectionCheck($email);
	$password = md5(InjectionCheck($password));
	$cpassword = md5(InjectionCheck($cpassword));
	$user_type = InjectionCheck($user_type);

	if(isset($username) && isset($email) && isset($password) && isset($cpassword) && isset($user_type)){

		$query = "select * from user where username='$username' OR user_email = '$email'";
		$runQuery = mysql_query($query);

		if(mysql_num_rows($runQuery)){
			echo "<script>alert('Email or Username Already Exists');</script>";
		}else{
			if(strlen($username)<5){
		echo "<script>alert('Username Must be grater than 5 digit');</script>";
		}else{
			if($cpassword != $password){
				echo "<script>alert('password doesnot match')</script>";
			}else{
					if(strlen($password)<6){
						echo "<script>alert('password length must be greater than 6')</script";
					}else{
						// query to create a new user
						$query = "insert into user(username, user_email, user_password, user_type) values('$username', '$email', '$password', '$user_type')";
						$runQuery = mysql_query($query);
						echo $query;
					}
				}
			}
		}

		
	}


?>