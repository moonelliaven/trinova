<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);

$last_produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 4");

$last_category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
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
                    <h2>Dashboard Admin</h2>
                    <p>Overview dan ringkasan informasi penting</p>
                <div class="sect-one">
                    <div class="desc-two">
                    <h3>Selamat datang, <span> <?php echo $d->nama ?> </span>!</h3>
                    <p>kelola data dengan aman dan efisien dari TriNova Tech</p>
                    <button onclick="window.location='../index.html'">Lihat Website <i class="fa-solid fa-angle-right"></i> </button>
                    </div>
                </div>
                <div class="dashboard-cards">
                    <!-- categories -->
                    <div class="card" onclick="window.location='kategori_data.php'">
                        <i class="fa-solid fa-layer-group logo" ></i>
                        <div class="desc">
                            <p>Total Category</p>
                            <h3>
                            <?php
                                    $category = mysqli_query($conn, "SELECT * FROM tb_category");
                                    echo mysqli_num_rows($category);
                                    ?> 
                            </h3>
                            <a href="kategori_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- project -->
                    <div class="card" onclick="window.location='produk_data.php'">
                        <i class="fa-regular fa-folder logo"></i>
                        <div class="desc">
                            <p>Total Project</p>
                            <h3>
                                <?php
                                    $produk = mysqli_query($conn, "SELECT * FROM tb_product");
                                    echo mysqli_num_rows($produk);
                                    ?> 
                            </h3>
                            <a href="produk_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- total users Account -->
                <div class="card" onclick="window.location='users_data.php'">
                    <i class="fa-solid fa-users logo"></i>
                    <div class="desc">
                        <p>Total Users</p>
                        <h3>
                            <?php
                                $users = mysqli_query($conn, "SELECT * FROM tb_admin");
                                echo mysqli_num_rows($users);
                            ?>
                        </h3>
                        <a href="users_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                    <!-- total services -->
                <div class="card" onclick="window.location='services_data.php'">
                    <i class="fa-solid fa-users logo"></i>
                    <div class="desc">
                        <p>Total Services</p>
                        <h3>
                            <?php
                                $users = mysqli_query($conn, "SELECT * FROM tb_services");
                                echo mysqli_num_rows($users);
                            ?>
                        </h3>
                        <a href="services_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                    <!-- total Customers Account -->
                <div class="card" onclick="window.location='pesan_data.php'">
                    <i class="fa-solid fa-users logo"></i>
                    <div class="desc">
                        <p>Total messages</p>
                        <h3>
                            <?php
                                $users = mysqli_query($conn, "SELECT * FROM tb_messages");
                                echo mysqli_num_rows($users);
                            ?>
                        </h3>
                        <a href="pesan_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="sect-two">
                    <div class="quick-access">
                        <h3>Quick Actions</h3>
                        <!-- per-box -->
                        <div class="box" onclick="window.location='kategori_tambah.php'">
                            <i class="fa-solid fa-layer-group logo-two"></i>
                            <div class="box-desc">
                                <h4>Add Category</h4>
                                <p>Tambah data kategori</p>
                            </div>
                            <i class="fa-solid fa-angle-right next"></i>
                        </div>
                        <!-- per-box -->
                        <div class="box" onclick="window.location='produk_tambah.php'">
                            <i class="fa-regular fa-folder logo-two"></i>
                            <div class="box-desc">
                                <h4>Add Projects</h4>
                                <p>Tambah data projek</p>
                            </div>
                            <i class="fa-solid fa-angle-right next"></i>
                        </div>
                        
                    </div>
                    <div class="quick-access">
                        <h3>Last Project Added</h3>

                        <?php if (mysqli_num_rows($last_produk) > 0): ?>
                            <?php while ($p = mysqli_fetch_object($last_produk)): ?>
                            <div class="box">
                                <i class="fa-regular fa-folder logo-two"></i>
                                <div class="box-desc">
                                    <h4><?php echo $p->product_name; ?></h4>
                                    <p><?php echo $p->category_id; ?></p>
                                </div>
                                <a href="produk_edit.php?id=<?php echo $p->product_id; ?>">
                                    <i class="fa-solid fa-angle-right next"></i>
                                </a>
                            </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p style="color:gray; padding: 10px;">Belum ada project yang ditambahkan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>