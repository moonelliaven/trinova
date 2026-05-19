<?php
session_start();
include 'db.php'; // sesuaikan path

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    $email     = mysqli_real_escape_string($conn, trim($_POST['email']));
    $company   = mysqli_real_escape_string($conn, trim($_POST['company']));
    $services  = mysqli_real_escape_string($conn, trim($_POST['services']));
    $message   = mysqli_real_escape_string($conn, trim($_POST['message']));

    if (!empty($full_name) && !empty($email) && !empty($company) && !empty($services) && !empty($message)) {
        $query = "INSERT INTO tb_messages (full_name, email, company, services, message) 
                  VALUES ('$full_name', '$email', '$company', '$services', '$message')";
        
        if (mysqli_query($conn, $query)) {
            $success = "Pesan berhasil dikirim! Tim kami akan menghubungi Anda segera.";
        } else {
            $error = "Gagal mengirim pesan: " . mysqli_error($conn);
        }
    } else {
        $error = "Semua field wajib diisi!";
    }
}

// Ambil services dari tb_services
$services_query = mysqli_query($conn, "SELECT * FROM tb_services ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="logo">
            <img src="img/logo-text-white.png" alt="Logo" style="width: 160px;">
        </div>
        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="product.html">Project</a></li>
            <li><a href="team.html">Our Team</a></li>
            <li><a href="contact.php"  style="color: var(--blue-primary);">Contact</a></li>
        </ul>
        <button>Get Started</button>
    </div>

    <!-- Banner -->
    <div class="banner">
        <div class="sect-one">
            <h5 class="reveal">inovating your digital future</h5>
            <h1 class="reveal">Smart Solution,</h1>
            <h1 class="reveal">For a Better Tomorrow</h1>
            <p class="reveal">TriNova Tech hadir sebagai solusi digital inovatif untuk membantu bisnis dan individu berkembang di era teknologi</p>
            <div class="card-section-2">
                <div class="card-4">
                    <i class="fa-solid fa-bolt"></i>
                    <div class="card-4-desc">
                        <p>Quick Response</p>
                        <p class="desc-p">Our team will respond within 24 hours.</p>
                    </div>
                </div>
                <div class="card-4">
                    <i class="fa-solid fa-shield"></i>
                    <div class="card-4-desc">
                        <p>Trusted Partner</p>
                        <p class="desc-p">Data security and client satisfaction are our top priorities\
                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="button-section">
                <div class="btn reveal" style="background-color: var(--blue-primary);"><a href=""></a>Go Contact  Us<i class="fa-solid fa-arrow-right"></i></div>
            </div>
        </div>
        <div class="sect-one"></div>
    </div>

    <div class="contact">
        <h5 class="reveal">go contact us</h5>
        <h1 class="reveal">Various Ways to Connect with Us</h1>
        <p class="reveal">Choose the most convenient way for you to contact our team.</p>
        <div class="card-section">
            <div class="card reveal">
                <i class="fa-regular fa-envelope"></i>
                <h4>Email</h4>
                <p>Send your questions or requirements to our email.</p>
                <span>info@trinova-tevch</span>
            </div>
            <div class="card reveal">
                <i class="fa-solid fa-phone"></i>
                <h4>Phone</h4>
                <p>Send your questions or requirements via our phone number.</p>
                <span>+62 21 1234-5678</span>
            </div>
            <div class="card reveal">
                <i class="fa-regular fa-envelope"></i>
                <h4>Office</h4>
                <p>Send your questions or requirements to our office.</p>
                <span>View on the map</span>
            </div>
            <div class="card reveal">
                <i class="fa-brands fa-linkedin-in"></i>
                <h4>LinkedIn</h4>
                <p>Send your questions or requirements via LinkedIn.</p>
                <span>info@trinova-tevch</span>
            </div>
        </div>
    </div>

    <!-- form -->
    <div class="card-section">
        <div class="form reveal">
            <h5>send message</h5>
            <h1>Share Your Requirements</h1>
            <p>Fill out the form below and our team will contact you soon.</p>
            <!-- Notifikasi -->
            <?php if (!empty($success)): ?>
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($error)): ?>
                <div class="alert-error">
                    <i class="fa-solid fa-circle-xmark"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="contact.php" method="POST">
                <div class="card-section">
                    <div class="input-section">
                        <span>Full Name*</span>
                        <input type="text" name="full_name" placeholder="Enter Full Name"
                            value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>" required>
                    </div>
                    <div class="input-section">
                        <span>Email*</span>
                        <input type="email" name="email" placeholder="Enter Your Email"
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    </div>
                </div>
                <div class="input-section">
                    <span>Company*</span>
                    <input type="text" name="company" placeholder="Enter your company here"
                        value="<?php echo isset($_POST['company']) ? htmlspecialchars($_POST['company']) : ''; ?>" required>
                </div>
                <div class="input-section">
                    <span>Services*</span>
                    <select name="services" required>
                <option value="" hidden>Select a Services</option>
                <?php
                if ($services_query && mysqli_num_rows($services_query) > 0) {
                    while ($svc = mysqli_fetch_array($services_query)) {
                        $val = htmlspecialchars($svc['services']); // ✅ nama kolom yang benar
                        $selected = (isset($_POST['services']) && $_POST['services'] == $val) ? 'selected' : '';
                        echo "<option value='$val' $selected>$val</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="input-section">
        <span>Message*</span>
        <textarea name="message" placeholder="Tell us about your needs or project." required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
    </div>
    <button type="submit"><i class="fa-regular fa-paper-plane"></i>Send Message</button>
</form>
        </div>
        <div class="location reveal">
            <h5>location</h5>
            <h1>Visit Our Office</h1>
            <p>Jl. Teknologi No. 10, Jakarta, Indonesia 10210 </p>
            <div class="img-box"><img src="img/map.png" alt=""></div>
            <div class="hq">
                <img src="img/banner-banner.png" alt="">
                <div class="desc">
                    <h4>Trinova Tech Headquarters</h4>
                    <p>Our headquarters is designed to support innovation and collaboration in delivering the best solutions for our clients.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="cont">
    <div class="cta reveal">
        <div class="cta-desc">
            <h1>Ready to Start Your Project?</h1>
            <p>Discuss your ideas and needs with our expert team right now.</p>
        </div>
        <button>Contact Now<i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="content-footer">
            <div class="frame-one">
                <img src="img/logo-text-white.png" alt="" style="width: 200px;">
                <p>TriNova Tech adalah mitra teknologi terpecaya untuk membantu bisnis tumbuh dan berenovasi di era digital</p>
                <div class="logomeds">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>
            <div class="frame-list">
                <div class="list">
                    <h4>Quick Links</h4>
                    <div class="list-menu">
                        <a href="index.html">Home</a>
                        <a href="about.html">About</a>
                        <a href="services.html">Services</a>
                        <a href="product.html">Projects</a>
                        <a href="team.html">Our Team</a>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Our Services</h4>
                    <div class="list-menu">
                        <a href="product.html">Mobile App Development</a>
                        <a href="product.html">Software Development</a>
                        <a href="product.html">Cloud Solution</a>
                        <a href="product.html">Products</a>
                        <a href="product.html">IT Security</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Contact Us</h4>
                    <div class="list-menu">
                        <a href="contact.php"><i class="fa-solid fa-location-dot"></i>jl. Panglima Batur</a>
                        <a href="contact.php"><i class="fa-solid fa-phone"></i>+62 821 5889 1284</a>
                        <a href="contact.php"><i class="fa-solid fa-envelope"></i>info@trinovatech.com</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Other</h4>
                    <div class="list-menu">
                        <a href="privacy-policy.html">Privacy Policy</a>
                        <a href="terms-service.html">Terms of Service</a>
                        <a href="faq.html">FAQ</a>
                        <a href="career.html">Career</a>
                        <a href="blog.html">Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="new">
            <div class="oneo">
                <p style="color: white;">© 2026 TriNova Tech. All Right reserved. </p>
            </div>
            <div class="twot">
                <p style="color: white;">Privacy Policy</p>
                <p style="color: white;">Terms of Services</p>
            </div>
        </div>
    </div>

    <script src="js/loading.js"></script>
</body>
</html>