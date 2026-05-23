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
    <title>Messages Data</title>
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
<<<<<<< HEAD
            <div class="table2">
=======

>>>>>>> c347d1474db5fd27d60edc96c4515fa00d4c98dd
                <!-- Search Bar -->
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
                    <button class="cta" style="padding: 10px 14px; border-radius: 8px;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <input 
                        type="text" 
                        id="searchInput"
                        placeholder="Cari pesan..." 
                        onkeyup="searchTable()"
                        style="padding: 10px 16px; border-radius: 8px; border: 1px solid #ddd; font-size: 14px; width: 250px; outline: none;">
                </div>

                <!-- Tabel -->
                <table class="table1" width="100%">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Services</th>
                        <th>Message</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 1;
                        $messages = mysqli_query($conn, "SELECT * FROM tb_messages ORDER BY id DESC");
                        if(mysqli_num_rows($messages) > 0){
                            while($row = mysqli_fetch_array($messages)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo htmlspecialchars($row['full_name']) ?></td>
                        <td><?php echo htmlspecialchars($row['email']) ?></td>
                        <td><?php echo htmlspecialchars($row['company']) ?></td>
                        <td><?php echo htmlspecialchars($row['services']) ?></td>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo htmlspecialchars($row['message']) ?>
                        </td>
                        <td><?php echo date('d M Y', strtotime($row['created_at'])) ?></td>
                        <td>
                            <a href="pesan_detail.php?id=<?php echo $row['id'] ?>" style="color: #2563eb;">Detail</a> ||
                            <a href="hapus_proses.php?idm=<?php echo $row['id'] ?>" 
                               onclick="return confirm('Yakin ingin hapus pesan ini?')" 
                               style="color: #dc2626;">Hapus</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }else{ ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">Tidak ada pesan masuk</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
<<<<<<< HEAD
            </div>
=======
>>>>>>> c347d1474db5fd27d60edc96c4515fa00d4c98dd
        </div>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('.table1 tr:not(:first-child)');
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        }
    </script>
</body>
</html>