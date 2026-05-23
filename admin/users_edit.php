<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);

// Ambil data user yang akan diedit
$user = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_GET['id']."'");
if(mysqli_num_rows($user) == 0){
    echo '<script>window.location="users_data.php"</script>';
}
$u = mysqli_fetch_object($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User</title>
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
                        <h1>Edit User</h1>
                        <p>Ubah data akun pengguna</p>
                    </div>
                    <button class="cta" onclick="window.location='users_data.php'">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </button>
                </div>

                <form action="" method="POST">
                    <fieldset>
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $u->nama ?>" class="form-control" required>
                    </fieldset>

                    <fieldset>
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $u->username ?>" class="form-control" required>
                    </fieldset>

                    <fieldset>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $u->email ?>" class="form-control" required>
                    </fieldset>

                    <fieldset>
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $u->alamat ?>" class="form-control" required>
                    </fieldset>

                    <fieldset>
                        <label>Telpon</label>
                        <input type="text" name="telpon" value="<?php echo $u->telpon ?>" class="form-control" required>
                    </fieldset>

                    <fieldset>
                        <label>Password Baru <small style="color:gray;">(kosongkan jika tidak ingin mengubah)</small></label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password baru...">
                    </fieldset>

                    <fieldset>
                        <label>Level</label>
                        <select name="level" class="form-control" required>
                            <option value="admin" <?php echo ($u->level == 'admin') ? 'selected' : '' ?>>Admin</option>
                            <option value="pelanggan" <?php echo ($u->level == 'pelanggan') ? 'selected' : '' ?>>Pelanggan</option>
                        </select>
                    </fieldset>

                    <fieldset>
                        <button name="submit" type="submit">Simpan Perubahan</button>
                    </fieldset>
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $nama     = ucwords($_POST['nama']);
                        $username = $_POST['username'];
                        $email    = $_POST['email'];
                        $alamat   = $_POST['alamat'];
                        $telpon   = $_POST['telpon'];
                        $level    = $_POST['level'];
                        $password = $_POST['password'];

                        // Jika password diisi, ikut diupdate
                        if(!empty($password)){
                            $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                nama     = '$nama',
                                username = '$username',
                                email    = '$email',
                                alamat   = '$alamat',
                                telpon   = '$telpon',
                                level    = '$level',
                                password = '$password'
                                WHERE admin_id = '".$u->admin_id."'");
                        } else {
                            // Jika password kosong, tidak diupdate
                            $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                nama     = '$nama',
                                username = '$username',
                                email    = '$email',
                                alamat   = '$alamat',
                                telpon   = '$telpon',
                                level    = '$level'
                                WHERE admin_id = '".$u->admin_id."'");
                        }

                        if($update){
                            echo '<script>alert("Edit user berhasil!")</script>';
                            echo '<script>window.location="users_data.php"</script>';
                        } else {
                            echo '<p style="color:red;">Gagal: '.mysqli_error($conn).'</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>