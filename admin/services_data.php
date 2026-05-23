<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Services Data</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            <ul>
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <div class="sect-top">
                    <div class="title">
                        <h1>Services</h1>
                        <p>Kelola semua services yang tersedia</p>
                    </div>
                    <button class="cta" onclick="window.location='services_tambah.php'"><i class="fa-solid fa-plus"></i>Tambah Data</button>
                </div>
                <table class="table1" width="80%">
                    <tr>
                        <th>No</th>
                        <th>Services</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 1;
                        $services = mysqli_query($conn, "SELECT * FROM tb_services ORDER BY id DESC");
                        if(mysqli_num_rows($services) > 0){
                            while($row = mysqli_fetch_array($services)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['services'] ?></td>
                        <td>
                            <a href="services_edit.php?id=<?php echo $row['id'] ?>">Edit</a> ||
                            <a href="hapus_proses.php?idk=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }else{ ?>
                    <tr>
                        <td colspan="3">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>