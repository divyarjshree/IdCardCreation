<?php

	include("config.php");
	session_start();
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = mysqli_query($connection, "SELECT * from student_reg WHERE email='$email'");
	
	$exists = mysqli_num_rows($query);
	$table_reg = "";
	$table_password = "";
	if($exists > 0) 
	{
		while($row = mysqli_fetch_assoc($query)) 
		{
			$table_reg = $row['email'];
			$table_password = $row['password'];
		}
		if(($email == $table_reg) && ($password == $table_password))
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $email;
					header("location: studentProfile.php");
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; 
			Print '<script>window.location.assign("studentLogin.php");</script>'; 
		}

	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; 
		Print '<script>window.location.assign("studentLogin.php");</script>';
	}
?>