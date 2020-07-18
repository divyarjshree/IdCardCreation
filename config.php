<?php 

$connection = mysqli_connect('localhost', 'root', '') or die("Unable to connect database");

$db = mysqli_select_db($connection, 'idcard_creation') or die("Unable to connect database");


?>