<?php
$servername = "localhost";
$username = "marks";
$password = "Indepth@2020";
$DB = "marks";

$conn = new mysqli($servername, $username, $password, $DB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

//   -----------arabic encoding----------------
$sSQL = 'SET CHARACTER SET utf8';
mysqli_query($conn, $sSQL)
        or die('Can\'t charset in DataBase');
//    -----------arabic encoding-------------

?>

