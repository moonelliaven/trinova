<?php
session_start();
session_destroy();
echo "<script>alert('Anda berhasil logout')</script>";
echo "<script type='text/javascript'>window.location='login.php'</script>";
?>