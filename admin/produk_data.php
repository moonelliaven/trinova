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
    <title>Produk Data</title>
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
            <ul>
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <div class="sect-top">
                    <div class="title">
                        <h1 class=>Project</h1>
                        <p>Kelola semua projek yang tersedia</p>
                    </div>
                    <button class="cta" onclick="window.location='produk_tambah.php'"><i class="fa-solid fa-plus"></i>Tambah Data</button>
                </div>
                <div class="table2">
                    <div class="sect-bottom">
                        <div class="input-sect-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input class="search" type="text" placeholder="Cari Projek...">
                        </div>
                        <div class="filter">
                            <i class="fa-solid fa-filter"></i>
                            <label for="">Nama kategori</label>
                            <select name="kategori" class="form-control" id="" required>
                                <option value="">All</option>
                                <!-- input database -->
                                <?php
                                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                    while($r = mysqli_fetch_array($kategori)){
                                ?>
                                    <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                <table class="table1" width="80%">
                    <!-- list nama table -->
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Detail</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                    <!-- hubungkan database -->
                    <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING(category_id) ORDER BY product_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                    ?>

                    <!-- ambil data dari database -->
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['product_description'] ?></td>

                        <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank">
                            <img src="../produk/<?php echo $row['product_image'] ?>" width="50px">
                        </a></td>
                        <td><?php echo ($row['product_status'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></td>
                        <!-- edit atau hapus -->
                        <td>
                            <a href="produk_edit.php?id=<?php echo $row['product_id'] ?>">Edit</a> ||
                            <a href="hapus_proses.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }}else{ ?>
                    <tr>
                        <td colspan="3">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>