<?php
    //Access 'bars' database

    //DB User credentials
    $host = "localhost";
	$db_username = "root";
	$db_pass = "";
	$db_name = "bars";

    $conn = mysqli_connect($host, $db_username, $db_pass);

    mysqli_select_db($conn, $db_name) or die(mysqli_error());

?>