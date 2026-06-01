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
    <title>Users Data</title>
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
                        <h1>Users Account</h1>
                        <p>Kelola semua akun pengguna yang terdaftar</p>
                    </div>
                    
                </div>
                <div class="table2">
                    <div class="sect-bottom">
                        <div class="input-sect-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input class="search" type="text" id="searchInput" placeholder="Cari User...">
                        </div>
                    </div>

                    <table class="table1" width="80%">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telpon</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                        $no = 1;
                        $users = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY admin_id DESC");
                        if(mysqli_num_rows($users) > 0){
                            while($row = mysqli_fetch_array($users)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['alamat'] ?></td>
                        <td><?php echo $row['telpon'] ?></td>
                        <td><?php echo $row['level'] ?></td>
                        <td>
                            <a href="users_edit.php?id=<?php echo $row['admin_id'] ?>">Edit</a> |
                            <a href="hapus_proses.php?idl=<?php echo $row['admin_id'] ?>" onclick="return confirm('Yakin ingin hapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                            }
                        } else { ?>
                    <tr>
                        <td colspan="8">Tidak ada data user</td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Script pencarian -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll('.table1 tr:not(:first-child)');
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(keyword) ? '' : 'none';
            });
        });
    </script>
</body>
</html>