<?php
session_start();
include 'db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_product");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/product.css">
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
            <li><a href="product.php"  style="color: var(--blue-primary);">Project</a></li>
            <li><a href="team.html">Our Team</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="btn-sect">
            <button class="menu-btn">☰</button>
            <button onclick="window.location.href='login.php'"> <span> Get Started</span> <i class="fa-solid fa-user"></i></button>
        </div>
    </div>
    <div class="navbar-active">
        <ul class="navbar-2">
            <li><a href="index.html" >Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.html" >Services</a></li>
            <li><a href="product.php"  style="color: var(--blue-primary);">Project</a></li>
            <li><a href="team.html">Our Team</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <!-- Banner -->
    <div class="banner">
        <div class="sect-one">
            <h5 class="reveal">inovating your digital future</h5>
            <h1 class="reveal">Innovative Projects</h1>
            <h1 class="reveal">for a Digital Future</h1>
            <p class="reveal">TriNova Tech products are designed to help your business operate smarter, faster, and more securely in the digital era.</p>
            <div class="button-section">
                <div onclick="document.querySelector('.projects').scrollIntoView({behavior: 'smooth'})" class="btn reveal" style="background-color: var(--blue-primary);"><a href=""></a>Learn More<i class="fa-solid fa-arrow-right"></i></div>
            </div>
        </div>
        <div class="sect-one"></div>
    </div>

    <!-- projects -->
    <div class="projects">
        <h5 class="reveal">our projects categories</h5>
        <h1 class="reveal">Products Solutions for Various Business Needs</h1>
        <p class="reveal">We provide a wide range of leading digital products that have proven to help companies improve efficiency and drive growth.</p>
        <div class="card-section reveal">
            <div class="card active-1" data-filter="all"><i class="fa-solid fa-bars"></i>All Projects</div>
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM tb_category");

        while($row = mysqli_fetch_assoc($kategori)){
        ?>
        <div class="card" data-filter="<?php echo $row['category_name']; ?>">
            <img src="category/<?php echo $row['category_image']; ?>">
            <?php echo $row['category_name']; ?>
        </div>
        <?php } ?>
        </div>
        <div class="card-section card-sect-5">
        <?php
        $product = mysqli_query($conn, "
            SELECT p.*, c.category_name
            FROM tb_product p
            JOIN tb_category c ON p.category_id = c.category_id
        ");

        while($row = mysqli_fetch_assoc($product)){
        ?>
        <div class="card-2 reveal"
            data-category="<?php echo strtolower($row['category_name']); ?>">

            <img src="produk/<?php echo $row['product_image']; ?>" alt="">

            <div class="card-desc">
                <h4><?php echo $row['category_name']; ?></h4>
                <h3><?php echo $row['product_name']; ?></h3>
                <p><?php echo $row['product_description']; ?></p>
                <button>
                    Learn More
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <h5 class="reveal">why choose us</h5>
            <h1 class="reveal">Why Choose TriNova Tech for Your Projects?</h1>
            <div class="card-section">
                <div class="card-3 reveal">
                   <i class="bx bx-rocket"></i>
                    <div class="card-3-desc">
                        <h4>Experienced Team</h4>
                        <p>Work with skilled professionals who understand technology, design, and business needs to deliver quality results.</p>
                    </div>
                </div>
                <div class="card-3 reveal">
                    <i class="fa-solid fa-shield"></i>
                    <div class="card-3-desc">
                        <h4>Custom Solutions</h4>
                        <p>Every project is tailored to your goals, ensuring solutions that fit your business and target audience.</p>
                    </div>
                </div>
                <div class="card-3 reveal">
                    <i class="fa-solid fa-gear"></i>
                    <div class="card-3-desc">
                        <h4>On-Time Delivery</h4>
                        <p>We value your time by managing projects efficiently and delivering results according to schedule.</p>
                    </div>
                </div>
                <div class="card-3 reveal">
                   <i class="fa-solid fa-headset"></i>
                    <div class="card-3-desc">
                        <h4>Long-Term Support</h4>
                        <p>Our team provides continuous assistance and maintenance to ensure your project runs smoothly.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cta reveal">
            <div class="cta-desc">
                <h3>Let's Build Your Next Project Together</h3>
                <p>From concept to launch, we help turn your ideas into innovative digital solutions that drive growth.</p>
            </div>
            <button>Start Your Project<i class="fa-solid fa-arrow-right"></i></button>
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
                        <a href="contact.html">Contact</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Our Services</h4>
                    <div class="list-menu">
                        <a href="product.php">Mobile App Development</a>
                        <a href="product.php">Software Development</a>
                        <a href="product.php">Cloud Solution</a>
                        <a href="product.php">Products</a>
                        <a href="product.php">IT Security</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Contact Us</h4>
                    <div class="list-menu">
                        <a href="contact.html"><i class="fa-solid fa-location-dot"></i>jl. Panglima Batur</a>
                        <a href="contact.html"><i class="fa-solid fa-phone"></i>+62 821 5889 1284</a>
                        <a href="contact.html"><i class="fa-solid fa-envelope"></i>info@trinovatech.com</a>
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
    <script src="js/product.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>