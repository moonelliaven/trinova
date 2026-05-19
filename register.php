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
                    <span>Full Name</span>
                    <div class="input-sect">
                        <i class="fa-regular fa-circle-user"></i>
                        <input type="text" placeholder="Add your full name here" name="nama" required>
                    </div>
                </div>
                <div class="section">
                    <span>Address</span>
                    <div class="input-sect">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" placeholder="Add your address here" name="alamat" required>
                    </div>
                </div>
                <div class="section">
                    <span>Phone Number</span>
                    <div class="input-sect">
                        <i class="fa-solid fa-phone"></i>
                        <input type="text" placeholder="Add your phone number here" name="telpon" required>
                    </div>
                </div>
                <div class="section">
                    <span>Email</span>
                    <div class="input-sect">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="text" placeholder="Add your email here" name="email" required>
                    </div>
                </div>
                <div class="section">
                    <span>Username</span>
                    <div class="input-sect">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" placeholder="Add your username here" name="user" required>
                    </div>
                </div>
                <div class="section">
                    <span>Password</span>
                    <div class="input-sect">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Add your password here" name="pass" required>
                    </div>
                </div>
                <button type="submit" name="submit">Register</button>
                <div class="cta">
                    <p>Already have an account?</p>
                    <a href="login.php">Login now</a>
                </div>
                <?php
            include('db.php');
            if(isset($_POST['submit'])){
                $nama     = $_POST['nama'];
                $alamat   = $_POST['alamat'];
                $telpon   = $_POST['telpon'];
                $email    = $_POST['email'];
                $username = $_POST['user'];
                $password = $_POST['pass'];

                $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                    null,
                    '".$nama."',
                    '".$alamat."',
                    '".$telpon."',
                    '".$email."',
                    '".$username."',
                    '".$password."',
                    'pelanggan'
                )");

                if($insert){
                    echo '<script>alert("Berhasil, silakan login")</script>';
                    echo '<script type="text/javascript">window.location="login.php"</script>';
                }else{
                    echo '<script>alert("Gagal")</script>';
                    echo '<script type="text/javascript">window.location="register.php"</script>';
                }
            }
        ?>
            </form>
            <!-- banner -->
            <div class="banner">
                <h3>inovating your digital future</h3>
                <h1>Smart Solution, <br> for a Better Tomorrow</h1>
                <p>TriNova Tech hadir sebagai solusi digital inovatif untuk membantu bisnis dan individu berkembang di era teknologi</p>
                <p class="copyright">© 2026 TriNova Tech. All Right reserved.</p>
            </div>
        </div>
    </div>
   
</body>
</html>