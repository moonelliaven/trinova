<?php
include '../db.php';

// hapus produk
if(isset($_GET['idp'])){
    $idp = $_GET['idp'];
    mysqli_query($conn, "DELETE FROM tb_product WHERE product_id='$idp'");
    header("location:produk_data.php");
}

// hapus kategori
else if(isset($_GET['idk'])){
    $idk = $_GET['idk'];
    mysqli_query($conn, "DELETE FROM tb_category WHERE category_id='$idk'");
    header("location:kategori_data.php");
}

else if(isset($_GET['ids'])){
    $ids = $_GET['ids'];
    mysqli_query($conn, "DELETE FROM tb_services WHERE id='$ids'");
    header("location:services_data.php");
}

else if(isset($_GET['idl'])){
    $idl = $_GET['idl'];
    mysqli_query($conn, "DELETE FROM tb_admin WHERE admin_id='$idl'");
    header("location:users_data.php");
}

else if (isset($_GET['idm'])) {
    $idm = $_GET['idm'];
    mysqli_query($conn, "DELETE FROM tb_messages WHERE id = '$idm'");
    header('Location: pesan_data.php');
}
?>
