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
    <title>Edit Produk</title>
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
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
                    if(mysqli_num_rows($produk) == 0){
                        echo '<script>window.location="admin/produk_data.php"</script>';
                    }
                    $k = mysqli_fetch_object($produk);
                ?>

                <!-- form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Edit Data Produk</h3>

                    <fieldset>
                        <label>Nama Produk</label>
                        <input type="text" name="nama" value="<?php echo $k->product_name ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Detail</label>
                        <input type="text" name="detail" value="<?php echo $k->product_description ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Foto Produk</label>
                        <img src="../produk/<?php echo $k->product_image ?>" alt="" width="100px">
                        <input type="hidden" name="foto" value="<?php echo $k->product_image ?>">
                        <input type="file" name="product_image" placeholder="Pilih Gambar" class="form-control">
                    </fieldset>
                    <fieldset>
                        <label>Status</label>
                        <select name="product_status" class="form-control" required>
                            <option value="1" <?php echo ($k->product_status == 1) ? 'selected' : '' ?>>Aktif</option>
                            <option value="0" <?php echo ($k->product_status == 0) ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                    </fieldset>

                    <!-- tombol sumbit -->
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
                    </fieldset>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $detail = $_POST['detail'];
                        $foto = $_POST['foto'];
                        $status = $_POST['product_status'];

                        // data gambar yang abru
                        $filename = $_FILES['product_image']['name'];
                        $tmp_name = $_FILES['product_image']['tmp_name'];

                        // jika admin ganti gambar
                        if($filename != ''){
                            $type2 = explode('.', $filename);
                            $type2 = $type2[count($type2)-1];

                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                             // validasi data dan upload 
                            if(in_array($type2, $tipe_diizinkan)){
                                unlink('../produk/'.$k->product_image);
                                move_uploaded_file($tmp_name, '../produk/'.$filename);
                                echo '<script>alert("File berhasil diupload")</script>';
                                $foto = $filename;
                            } else {
                                echo '<script>alert("Format file tidak diizinkan")</script>';
                            }
                        } else {
                            $foto = $k->product_image;
                        }

                        $update = mysqli_query($conn, "UPDATE tb_product SET product_name = '".$nama."',
                        product_description = '".$detail."', 
                        product_image = '".$foto."',
                        product_status = '".$status."'
                        WHERE product_id = '".$k->product_id."' ");

                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="produk_data.php"</script>';
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