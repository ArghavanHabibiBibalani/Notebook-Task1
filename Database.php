<?php

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "notebook-task1";

$conn = mysqli_connect($serverName, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";

  
  ?>