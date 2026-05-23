<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);

$last_produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id");
$last_category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard User</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="part">
                <i class="fa-solid fa-bars"></i>
                <h3>Dashboard Users</h3>
            </div>
            <div class="part" onclick="window.location='profile.php'">
                <div class="profile-img"><i class="fa-regular fa-circle-user"></i></div>
                <div class="prof-desc">
                    <h3><?php echo $d->nama ?></h3>
                    <p><?php echo $d->level ?></p>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </header>
        <div class="sidebar">
            <div class="sidebar-title">
                <img src="../img/logo-text-white.png" alt="">
            </div>
            <ul>
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>
    </div>
</body>
</html>