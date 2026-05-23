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
    <title>Kategori Data</title>
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
                        <h1>Kategori</h1>
                        <p>Kelola semua kategori yang tersedia</p>
                    </div>
                    <button class="cta" onclick="window.location='kategori_tambah.php'"><i class="fa-solid fa-plus"></i>Tambah Data</button>
                </div>
                <table class="table1" width="80%">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><a href="category/<?php echo $row['category_image'] ?>" target="_blank">
                            <img src="../category/<?php echo $row['category_image'] ?>" width="50px">
                        </a></td>
                        <td>
                            <a href="kategori_edit.php?id=<?php echo $row['category_id'] ?>">Edit</a> ||
                            <a href="hapus_proses.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
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