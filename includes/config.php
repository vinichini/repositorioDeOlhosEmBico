<?php

	// Database access
	$bdschema = "viagens";
	$user = "root";
	$pwd = "";
	$server = "localhost";

	$connection = mysqli_connect($server, $user, $pwd, $bdschema);

	if (mysqli_connect_error()) {
		echo "Error connecting DB";
		exit;
	}

	mysqli_set_charset($connection, "utf8");

?>