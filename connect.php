<?php
$localhost = "localhost"; //your host name
$username = "shaun"; // your database name
$password = "devdarl123"; // your database password
$dbname = "todo";

$con = new mysqli($localhost, $username, $password, $dbname);


if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
}


/* end of file */
?>