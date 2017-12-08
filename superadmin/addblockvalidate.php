<?php

	include '../functions/function.php';
	include '../connection/dbCon.php';
	$blockname = $_POST['block_name'];

	$username = InjectionCheck($blockname);
	
	if(isset($blockname)){

		$query = "select * from lease_blocks where block_name='$blockname'";
		$runQuery = mysql_query($query);

		if(mysql_num_rows($runQuery)){
			echo "<script>alert('Block Already exists');</script>";
		}else{
						// query to create a new user
			$query = "insert into lease_blocks(block_name) values('blockname')";
			$runQuery = mysql_query($query);
			echo $query;
						
		}
		
	}


?>