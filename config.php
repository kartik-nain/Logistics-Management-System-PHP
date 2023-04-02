<?php

/**
 * Configuration for database connection
 *
 */

$host = "localhost";
$username = "root";
$password = "Admin@12345";
$database = "test";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if ($conn === false) {
    echo ("ERROR: Could not connect. "
        . mysqli_connect_error());
}

?>