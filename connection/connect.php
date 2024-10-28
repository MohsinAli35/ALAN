

<?php
$sname = "localhost";
$uname = "root";
$pass = "";
$db = "alan";

$con = new mysqli($sname, $uname, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    // echo "Connected successfully";
}
?>