<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "soba";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);

if (!$conn) {
    echo "Connection failed!";
}

mysqli_select_db($conn, $database);

?>