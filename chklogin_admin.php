<?php

	include("config.php");
	session_start();
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = mysqli_query($connection, "SELECT * from admin WHERE username='$username'");
	
	$exists = mysqli_num_rows($query);
	$table_reg = "";
	$table_password = "";
	if($exists > 0) 
	{
		while($row = mysqli_fetch_assoc($query)) 
		{
			$table_reg = $row['username'];
			$table_password = $row['password'];
		}
		if(($username == $table_reg) && ($password == $table_password))
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $username;
					header("location: admindashboard.php");
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; 
			Print '<script>window.location.assign("admin.php");</script>'; 
		}

	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; 
		Print '<script>window.location.assign("admin.php");</script>';
	}
?>