<?php

$hostname = getenv('mysql.railway.internal');
$username = getenv('root');
$password = getenv('cQDuLQbdZxuuifRYNuAAhPISXRhtKIlk');
$dbname   = getenv('railway');
$port     = getenv('3306');

$conn = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname,
    (int)$port
) or die('Gagal terhubung ke database');

?>