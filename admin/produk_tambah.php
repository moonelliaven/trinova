<?php
session_start();
include '../db.php';

// Check if user is logged in
if(!isset($_SESSION['id_login'])) {
    header('Location: login.php');
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Tambah Produk</title>
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
                <!-- perintah post ke database -->
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tambah Data Produk</h3>

                    <!-- input -->
                    <fieldset>
                        <!-- kategori -->
                        <fieldset>
                            <label for="kategori">Nama kategori</label>
                            <select name="kategori" class="form-control" id="kategori" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                <!-- input database -->
                                <?php
                                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                    while($r = mysqli_fetch_array($kategori)){
                                ?>
                                    <option value="<?php echo $r['category_id'] ?>"><?php echo htmlspecialchars($r['category_name']) ?></option>
                                <?php } ?>
                            </select>
                        </fieldset>

                        <fieldset>
                            <label>Nama Produk</label>
                            <input type="text" name="product_name" placeholder="Nama Produk" class="form-control" required>
                        </fieldset>
                        <fieldset>
                            <label>Detail</label>
                            <textarea name="product_detail" placeholder="Deskripsi" class="form-control" required></textarea>
                        </fieldset>
                        <fieldset>
                            <label>Gambar</label>
                            <input type="file" name="product_image" class="form-control" accept="image/jpeg,image/png,image/gif" required>
                        </fieldset>
                        <fieldset>
                            <label>Status</label>
                            <select name="product_status" class="form-control" required>
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </fieldset>

                        <!-- tombol submit -->
                        <fieldset>
                            <button name="submit" type="submit" id="contact-submit">Tambah</button>
                        </fieldset>

                    </fieldset>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    // Validate and sanitize inputs
                    $kategori = isset($_POST['kategori']) ? (int)$_POST['kategori'] : 0;
                    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
                    $product_detail = mysqli_real_escape_string($conn, $_POST['product_detail']);
                    $product_status = isset($_POST['product_status']) ? (int)$_POST['product_status'] : 0;
                    
                    // Check if category is selected
                    if($kategori <= 0) {
                        echo '<script>alert("Silakan pilih kategori terlebih dahulu")</script>';
                    } else {
                        // Handle file upload
                        $filename = $_FILES['product_image']['name'];
                        $tmp_name = $_FILES['product_image']['tmp_name'];
                        $type2 = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
                        
                        if(empty($filename)) {
                            echo '<script>alert("Silakan pilih file gambar")</script>';
                        } elseif(!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("Format file tidak diizinkan. Gunakan JPG, JPEG, PNG, atau GIF")</script>';
                        } else {
                            // Generate unique filename to avoid conflicts
                            $new_filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $filename);
                            
                            if(move_uploaded_file($tmp_name, '../produk/'.$new_filename)) {
                                // Use prepared statement to prevent SQL injection
                                $insert = mysqli_prepare($conn, "INSERT INTO tb_product (category_id, product_name, product_description, product_image, product_status) VALUES (?, ?, ?, ?, ?)");
                                mysqli_stmt_bind_param($insert, "isssi", $kategori, $product_name, $product_detail, $new_filename, $product_status);
                                
                                if(mysqli_stmt_execute($insert)){
                                    echo '<script>alert("Tambah data berhasil")</script>';
                                    echo '<script>window.location="produk_data.php"</script>';
                                } else {
                                    echo '<script>alert("Gagal menambah data: ' . mysqli_error($conn) . '")</script>';
                                }
                                mysqli_stmt_close($insert);
                            } else {
                                echo '<script>alert("Gagal mengupload file")</script>';
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>