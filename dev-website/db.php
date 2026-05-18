<?php

$host = "mysql";
$user = "root";
$password = "root";
$database = "nieuwsbrief_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

?>