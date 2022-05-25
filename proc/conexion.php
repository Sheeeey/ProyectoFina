<?php
/* Database connection start */
$servername = "172.24.16.217";
$username = "admin2";
$password = "asd_ASD123";
$dbname = "bd_escuela";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
printf("Connect failed: %sn", mysqli_connect_error());
exit();
}