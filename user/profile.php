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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman profile</title>
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
                <h1>Pengaturan Profil</h1>
            <div class="container form">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."' ");
                $d = mysqli_fetch_object($query);
                ?>
                
                <form id="form-profil" method="post">
                    <h3>Data Profil</h3>
                    <fieldset>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $d->nama ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $d->username ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Nomor Telepon</label>
                        <input type="text" name="telpon" placeholder="No. Telepon" value="<?php echo $d->telpon ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $d->email ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $d->alamat ?>" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Simpan Perubahan</button>
                    </fieldset>
                </form>
                <?php 
                    if(isset($_POST['submit'])){
                        $nama   = ucwords($_POST['nama']);
                        $username  = $_POST['username'];
                        $telpon     = $_POST['telpon'];
                        $email  = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);
                        $update = mysqli_query($conn, "UPDATE tb_admin SET
                                                       nama = '".$nama."',
                                                       username = '".$username."',
                                                       telpon = '".$telpon."',
                                                       email = '".$email."',
                                                       alamat = '".$alamat."'
                                                       WHERE admin_id = '".$d->admin_id."' ");
                        if($update){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profile.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }
                    }
                    ?>

                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."' ");
                        $d = mysqli_fetch_object($query);
                    ?>
                    <form id="form-password" method="post">
                      <h3>Ubah Password</h3>  
                      <fieldset>
                        <label>Password Baru</label>
                        <input type="password" name="pass1" placeholder="Password Baru" required>
                      </fieldset>
                      <fieldset>
                        <label>Konfirmasi Password</label>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" required>
                      </fieldset>
                      <fieldset>
                        <button name="ubah_password" type="submit">Ubah Password</button>
                      </fieldset>
                    </form>
                    <?php
                        if(isset($_POST['ubah_password'])){
                            $pass1  = $_POST['pass1'];
                            $pass2  = $_POST['pass2'];
                            if($pass2 != $pass1){
                                echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai")</script>';
                            }else{
                                $u_pass = mysqli_query($conn, "UPDATE tb_admin SET password = '".$pass1."' WHERE admin_id = '".$d->admin_id."' ");
                                if($u_pass){
                                    echo '<script>alert("Ubah data berhasil")</script>';
                                    echo '<script>window.location="profile.php"</script>';
                                }else{
                                    echo 'gagal'.mysqli_error($conn);
                                }
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>