<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-sect">
            <!-- form -->
            <form action="" method="POST">
                <h1>Selamat Datang Kembali</h1>
                <p>Silahkan masuk untuk melihat lebih lanjut</p>
                <div class="section">
                    <span>Username</span>
                    <div class="input-sect">
                        <i class="fa-regular fa-circle-user"></i>
                        <input name="user" type="text" placeholder="Add your username here" required>
                    </div>
                </div>
                <div class="section">
                    <span>Password</span>
                    <div class="input-sect">
                        <i class="fa-solid fa-lock"></i>
                        <input name="password" type="password" placeholder="Add your password here" required>
                    </div>
                    <a href="">Forgot Password?</a>
                </div>
                <button type="submit" name="submit">Login </button>
                <div class="cta">
                    <p>Don't have an account?</p>
                    <a href="register.php">Register</a>
                </div>
            </form>
            <!-- banner -->
            <div class="banner">
                <h3>inovating your digital future</h3>
                <h1>Smart Solution, <br> for a Better Tomorrow</h1>
                <p>TriNova Tech hadir sebagai solusi digital inovatif untuk membantu bisnis dan individu berkembang di era teknologi</p>
                <p class="copyright">© 2026 TriNova Tech. All Right reserved.</p>
            </div>

            <?php
            session_start();
            include('db.php');

            if(isset($_POST['submit'])){

                $user = $_POST['user'];
                $pass = $_POST['password'];

                $sql = mysqli_query($conn, "SELECT * FROM tb_admin 
                    WHERE username = '$user' AND password = '$pass'")
                    or die(mysqli_error($conn));

                if(mysqli_num_rows($sql) > 0){

                    $row = mysqli_fetch_assoc($sql);

                    $_SESSION['id_login'] = $row['admin_id'];
                    $_SESSION['level'] = $row['level'];
                    $_SESSION['status_login'] = true;

                    if($row['level'] == 'admin'){
                        echo "<script>
                                alert('Login Berhasil');
                                window.location='admin/dashboard.php';
                            </script>";
                    } elseif($row['level'] == 'pelanggan'){
                        echo "<script>
                                alert('Login Berhasil');
                                window.location='user/dashboard.php';
                            </script>";
                    }

                } else {
                    echo "<script>
                            alert('Username / Password Salah');
                            window.location='login.php';
                        </script>";
                }
            }
            ?>
    </div>
</body>
</html>