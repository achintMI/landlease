<?php
		 
	//function to check for sql injectiion
	function InjectionCheck($value){
	    $value = htmlspecialchars($value);
	    $value = trim($value);

	    return $value;
	}
  
	  
	// function to get user username and email
	function findUser($user_id){

	  	$query = "select username, user_email from user where user_id = '$user_id'";
	  	$runQuery = mysql_query($query);

	  	$row = mysql_fetch_array($runQuery);

	  	return $row['username']." ".$row['user_email'];
	}

	//function to get user type
	function user_type($user_id){

		$query = "select user_type from user where user_id = '$user_id'";
	  	$runQuery = mysql_query($query);

	  	$row = mysql_fetch_array($runQuery);

	  	return "<strong> User Type: </strong>". $row['user_type'];

	}

	// Function to fetch the user type only
	function finusertype($user_id){
		$query = "select user_type from user where user_id='$user_id'";
		$runQuery = mysql_query($query);
		$row = mysql_fetch_array($runQuery);
		return $row['user_type'];
	}

	// Function to get the total admins

	function getTotalAdmins(){
		$query = "select * from user where user_type='admin'";
		$runQuery =mysql_query($query);
		return $runQuery;
	}

	// Function to get the total blocks

	function getTotalBlocks(){
		$query = "select * from lease_blocks";
		$runQuery = mysql_query($query);
		return $runQuery;
	}

	// Function to get user details
	function getUserDetails($user_id){
		$query = "select * from user where user_id='$user_id'";
		$runQuery = mysql_query($query);
		return $runQuery;
	}

	//function to get name of the user
	function getName($rollno){

		$query = "select FirstName, LastName from studentDetails where RollNo = '$rollno'";
	  	$runQuery = mysql_query($query);

	  	$row = mysql_fetch_array($runQuery);

	  	return $row['FirstName']." ".$row['LastName'];

	}

	//function  to get Email
	function getEmail($rollno){

		$query = "select Email from studentDetails where RollNo = '$rollno'";
	  	$runQuery = mysql_query($query);

	  	$row = mysql_fetch_array($runQuery);

	  	return $row['Email'];

	}

	//function  to get contact
	function getContact($rollno){

		$query = "select contactNum from studentDetails where RollNo = '$rollno'";
	  	$runQuery = mysql_query($query);

	  	$row = mysql_fetch_array($runQuery);

	  	return $row['contactNum'];

	}

	//functio to update password

	function updatePassword($current, $new, $rollno){
		$current = md5($current);
		$new 	 = md5($new);

		$query = "select Password from studentDetails where RollNo = '$rollno'";
	  	$runQuery = mysql_query($query);
		$row = mysql_fetch_array($runQuery);

		if($current != $row['Password']){
			return "noMatch";
		}else{
			$query = "UPDATE studentDetails set Password = '$new' where RollNo = '$rollno'";
	  		$runQuery = mysql_query($query);
	  		if($runQuery){
	  			return "ohk";
	  		}
		}
		
	}

	//function to update profile picture

	function updatePicutre($image, $rollno){
		$imageTarget= 	"../images/".basename($image);

		$query = "update studentDetails set image='$image' where RollNo = '$rollno'";
	  	$runQuery = mysql_query($query);
		if($runQuery){
			$x=move_uploaded_file($image, $imageTarget);
			if($x){
				echo "<script>alert('ohk')</script>";
			}
		}

	}

	//function to update phone number
	function updatePhone($current, $rollno){
		
			$query = "UPDATE studentDetails set contactNum = '$current' where RollNo = '$rollno'";
	  		$runQuery = mysql_query($query);
	  		if($runQuery){
	  			return "ohk";
	  		}
		
	}

	//function to find user
	function findSearchedUser($user, $rollno){

		$query = "select * from studentDetails where RollNo Like '%$user%' OR FirstName Like '%$user%' OR Email Like '%$user%'";
		$runQuery = mysql_query($query);
		$row = mysql_fetch_array($runQuery);
		$numOfRow = mysql_num_rows($row);

		return  $numOfRow;
	}


	/* Admin Function starts here */

	function findAdmin($user){
		$query = "select * from admin where email='$user'";
		$runQuery = mysql_query($query);
		$row = mysql_fetch_array($runQuery);

		return $row['fname']." ".$row['lname'] ;
	}

	function getBranchDetails(){
		$query = "select * from branch";
        $runQuery = mysql_query($query);
		return $runQuery;
	}



 ?>
