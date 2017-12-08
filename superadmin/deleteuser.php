<?php
	include '../functions/function.php';
	include '../connection/dbCon.php';
	$id = $_POST['id'];
	$id = InjectionCheck($id);

	if(isset($id)){
		// Query to delete the user
		$query = "delete from user where user_id='$id'";
		$runQuery = mysql_query($query);
		echo $query;
	}
?>