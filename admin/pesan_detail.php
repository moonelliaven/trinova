<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);

$id = $_GET['id'];
$pesan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_messages WHERE id = '$id'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Pesan</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="part">
                <i class="fa-solid fa-bars"></i>
                <h3>Dashboard</h3>
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
            <ul><?php include 'sidebar.php'; ?></ul>
        </div>

        <div class="section">
            <div class="container">
                <div class="sect-top">
                    <div class="title">
                        <h1>Detail Pesan</h1>
                        <p>Informasi lengkap pesan dari pengguna</p>
                    </div>
                    <button class="cta" onclick="window.location='pesan_data.php'">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </button>
                </div>

                <div style="background: white; border-radius: 12px; padding: 30px; margin-top: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <table style="width: 100%; border-collapse: collapse; font-size: 15px;">
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 14px 10px; color: #888; width: 160px;">Nama</td>
                            <td style="padding: 14px 10px; font-weight: 500;"><?php echo htmlspecialchars($pesan['full_name']) ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 14px 10px; color: #888;">Email</td>
                            <td style="padding: 14px 10px;"><?php echo htmlspecialchars($pesan['email']) ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 14px 10px; color: #888;">Company</td>
                            <td style="padding: 14px 10px;"><?php echo htmlspecialchars($pesan['company']) ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 14px 10px; color: #888;">Services</td>
                            <td style="padding: 14px 10px;"><?php echo htmlspecialchars($pesan['services']) ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 14px 10px; color: #888;">Tanggal</td>
                            <td style="padding: 14px 10px;"><?php echo date('d M Y, H:i', strtotime($pesan['created_at'])) ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 14px 10px; color: #888; vertical-align: top;">Message</td>
                            <td style="padding: 14px 10px; line-height: 1.7;"><?php echo nl2br(htmlspecialchars($pesan['message'])) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>