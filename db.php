<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_trinovatech';

$conn = mysqli_connect($hostname, $username, $password, $database) or die ('Gagal menyambungkan ke database');   
?>