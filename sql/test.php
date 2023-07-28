<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* comment necessary code below if you have run this cript before */
$query3 = "INSERT INTO `CustomerDetails` (accountId, fullName, email, phoneNumber, dateOfBirth)
VALUES ( 1, 'test, 'test', 'test' , '2020-10-01' )";

$sql = "update CustomerDetails set fullName='sdsd', email='sdsds@test.com', phoneNumber='12121', address='tesfdfs' where custId = '1'";

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
