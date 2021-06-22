<?php
	 
  // Database connection
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "cloneyoutube"; 
	 
	// Create database connection 
	$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
	 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}

    // Check Email is already exists in database

    $email = $_POST['email'];
    
    $query = "SELECT * FROM account WHERE email = '$email'";
    
    $result = $con->query($query);
    
    if ($result->num_rows > 0) {
        echo 1;
    }
  
?>