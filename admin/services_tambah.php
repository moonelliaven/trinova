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
    <title>Tambah Services</title>
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
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."' ");
                    $d = mysqli_fetch_object($query);
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tambah Data Services</h3>
                    <fieldset>
                        <label>Services</label>
                        <input type="text" name="services" placeholder="Services" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Tambah</button>
                    </fieldset>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $services = $_POST['services'];
                        
                    $insert = mysqli_query($conn, "INSERT INTO tb_services VALUES (NULL, '$services')");
                        
                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="services_data.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

                }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>