<?php

/**
 * Configuration for database connection
 *
 */

$host = "localhost";
$username = "root";
$password = "1Mysql.com";
$database = "lms";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if ($conn === false) {
    echo ("ERROR: Could not connect. "
        . mysqli_connect_error());
}

?>