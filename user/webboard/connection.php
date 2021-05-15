<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "php_multiplelogin";

// Create connection
$objConnect = new mysqli($servername, $username, $password, $database);

// Check connection
if ($objConnect->connect_error) {
  die("Connection failed: " . $objConnect->connect_error);
}

        
       
?>