<?php
$db_hostname = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "files";

$conn = mysqli_connect($db_hostname,$db_user,$db_password,$db_name);

if(!$conn){
    echo("connection failed");
    exit();
}

?>