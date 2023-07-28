<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* comment necessary code below if you have run this cript before */
$sql = "CREATE DATABASE f32ee;";

if (mysqli_query($conn, $sql)) {
    echo "Database and tables are created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
