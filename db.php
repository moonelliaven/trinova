<?php

$hostname = 'mysql.railway.internal';
$username = 'root';
$password = 'cQDuLQbdZxuuifRYNuAAhPISXRhtKIlk';
$dbname   = 'railway';
$port     = '3306';

$conn = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname,
    (int)$port
) or die('Gagal terhubung ke database');

?>