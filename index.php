<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TriNova Tech - Smart Solutions for a Better Tomorrow</title>
    <link rel="stylesheet" href="css/style.css">
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
            <li><a href="index.html" style="color: var(--blue-primary);">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="product.php">Project</a></li>
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
                <li><a href="index.html" style="color: var(--blue-primary);">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="product.php">Project</a></li>
                <li><a href="team.html">Our Team</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
    </div>

    <!-- Banner -->
<div class="banner">

    <!-- Slide 1 -->
    <div class="slide active" style="background-image: url('img/banner4.jpg');">
        <div class="sect-one">
            <h5>Innovating Your Digital Future</h5>
            <h1>Smart Solutions,</h1>
            <h1>For a Better Tomorrow</h1>
            <p>We are ready to help you turn your ideas into innovative digital solutions.</p>

        </div>
    </div>

    <!-- Slide 2 -->
    <div class="slide" style="background-image: url('img/banner5.jpg');">
        <div class="sect-one">
            <h5>Creative Technology</h5>
            <h1>Build Faster</h1>
            <h1>Grow Smarter</h1>
            <p>Helping businesses accelerate digital transformation.</p>
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="slide" style="background-image: url('img/banner3.jpg');">
        <div class="sect-one">
            <h5>Future Ready</h5>
            <h1>Cloud & Security</h1>
            <h1>Solutions</h1>
            <p>Secure, scalable and reliable infrastructure.</p>
        </div>
    </div>

    <!-- Navigation -->
    <button class="banner-btn prev">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button class="banner-btn next">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

</div>

    <!-- what we do -->
    <div class="services">
        <h5 class="reveal">What We Do</h5>
        <h1 class="reveal">We Provide The Best Solution <br> for Your Business</h1>
        <div class="card-sect">
            <!-- card 1 -->
            <div class="card reveal">
                <div class="logo-sect">
                    <img src="img/logo/code.png" alt="">
                </div>
                <div class="desc-sect">
                    <div class="one">
                    <h3>Software Development</h3>
                    <p>Building innovative software solutions tailored to your needs.</p>
                    </div>
                    <div class="two">
                        <div class="cta"><a href="services.html">Learn More</a><img src="img/logo/arrow-right-blue.png" alt=""></div>
                    </div>
                </div>
            </div>
            <!-- card 2 -->
            <div class="card reveal">
                <div class="logo-sect">
                    <img src="img/logo/layout.png" alt="">
                </div>
                <div class="desc-sect">
                    <div class="one">
                    <h3>App Development</h3>
                    <p>Developing user-friendly, high-performance mobile applications.</p>
                    </div>
                    <div class="two">
                        <div class="cta"><a href="services.html">Learn More</a><img src="img/logo/arrow-right-blue.png" alt=""></div>
                    </div>
                </div>
            </div>
            <!-- card 3 -->
            <div class="card reveal">
                <div class="logo-sect">
                    <img src="img/logo/cloud.png" alt="">
                </div>
                <div class="desc-sect">
                    <div class="one">
                    <h3>Cloud Solutions</h3>
                    <p>Providing secure, scalable, and efficient cloud services for your business.</p>
                    </div>
                    <div class="two">
                        <div class="cta"><a href="services.html">Learn More</a><img src="img/logo/arrow-right-blue.png" alt=""></div>
                    </div>
                </div>
            </div>
            <!-- card 4 -->
            <div class="card reveal">
                <div class="logo-sect">
                    <img src="img/logo/checklist-circle.png" alt="">
                </div>
                <div class="desc-sect">
                    <div class="one">
                    <h3>IT Security</h3>
                    <p>Providing comprehensive IT security services to protect your digital assets.</p>
                    </div>
                    <div class="two">
                        <div class="cta"><a href="services.html">Learn More</a><img src="img/logo/arrow-right-blue.png" alt=""></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- about us -->
    <div class="about">
        <div class="sect-onee">
            <h5 class="reveal">ABOUT US</h5>
            <h3 class="reveal">Driving Innovation, <br> Delivering Results</h3>
            <p class="reveal">TriNova Tech is a technology company focused on providing the best digital solutions with the latest technology and an experienced professional team.</p>
            <div class="menu-sect">
                <div class="sect reveal"><img src="img/logo/checklist-circle.png" alt=""><p>Innovative and Trusted Solutions</p></div>
                <div class="sect reveal"><img src="img/logo/checklist-circle.png" alt=""><p>Professional and Experienced Team</p></div>
                <div class="sect reveal"><img src="img/logo/checklist-circle.png" alt=""><p>Fast and Responsive Service</p></div>
            </div>
            <button class="reveal"  onclick="window.location.href='about.html'">Learn More <img src="img/logo/arrow-right.png" alt=""></button>
        </div>
        <div class="sect-twoo reveal">
            <img class="about-img" src="img/placehorder/img-2.png" alt="">

            <div class="menu-sect">
                <!-- one -->
                <div class="menu" style="color: black;">
                    <div class="logo"><img src="img/logo/checklist-square-blue.png" alt=""></div>
                    <div class="desc">
                        <h3>150+</h3>
                        <p>Projects Completed</p>
                    </div>
                </div>
                <!-- one -->
                <div class="menu" style="color: black;">
                    <div class="logo"><img src="img/logo/smile-blue.png" alt=""></div>
                    <div class="desc">
                        <h3>98%</h3>
                        <p>Client Satisfaction</p>
                    </div>
                </div>
                <!-- one -->
                <div class="menu" style="color: black;">
                    <div class="logo"><img src="img/logo/users-blue.png" alt=""></div>
                    <div class="desc">
                        <h3>50+</h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- process -->
    <div class="process">
        <h5 class="reveal">OUR PROCESS</h5>
        <h3 class="reveal">Our Simple & Effective Process</h3>
        <div class="sect-menu">
            <div class="s-menu reveal">
                <div class="logo"><img src="img/logo/search.png" alt=""></div>
                <h4>01. Discover</h4>
                <p>We deeply understand your business needs.</p>
            </div>
            <hr class="reveal">
            <div class="s-menu reveal">
                <div class="logo"><img src="img/logo/edit.png" alt=""></div>
                <h4>02. Plan</h4>
                <p>Developing the right strategy and solution for you.</p>
            </div>
            <hr class="reveal">
            <div class="s-menu reveal">
                <div class="logo"><img src="img/logo/code-white.png" alt=""></div>
                <h4>03. Develop</h4>
                <p>Development process using the best technology.</p>
            </div>
            <hr class="reveal">
            <div class="s-menu reveal">
                <div class="logo"><img src="img/logo/send.png" alt=""></div>
                <h4>04. Deliver</h4>
                <p>Delivering quality solutions on time.</p>
            </div>
        </div>
    </div>

    <!-- projects/products -->
    <div class="products">
        <h5 class="reveal">OUR PROJECTS</h5>
        <h3 class="reveal">Explore Our Latest Projects</h3>
        <div class="product-menu">
            <!-- 1 p -->
            <div class="p-menu reveal project-card">
                <div class="pm-img">
                    <img src="img/placehorder-2/img-1.png" alt="">
                </div>
                <div class="pm-desc">
                    <h4>Fintech Dashboard</h4>
                    <p>Web Application</p>
                </div>
            </div>
            <!-- 1 p -->
            <div class="p-menu reveal project-card">
                <div class="pm-img">
                    <img src="img/placehorder-2/img-2.png" alt="">
                </div>
                <div class="pm-desc">
                    <h4>E-Commerce Mobile App</h4>
                    <p>Mobile Application</p>
                </div>
            </div>
            <!-- 1 p -->
            <div class="p-menu reveal project-card">
                <div class="pm-img">
                    <img src="img/placehorder-2/img-3.png" alt="">
                </div>
                <div class="pm-desc">
                    <h4>Cloud Management System</h4>
                    <p>Web Application</p>
                </div>
            </div>
            <!-- 1 p -->
            <div class="p-menu reveal project-card">
                <div class="pm-img">
                    <img src="img/placehorder-2/img 4.png" alt="">
                </div>
                <div class="pm-desc">
                    <h4>Firewall Security Platform</h4>
                    <p>Web Application</p>
                </div>
            </div>
        </div> 
        <button class="btn-product reveal" onclick="window.location.href='product.php'">View All Projects <img src="img/logo/arrow-right.png" alt=""></button>
    </div>
    
    <div class="testi">
        <h5 class="reveal">TESTIMONIALS</h5>
        <h3 class="reveal">What Our Clients Say</h3>

        <div class="card-sectt">
            <i id="prev" class="fa-solid fa-chevron-left reveal"></i>

            <div class="slider-container">
                <div class="slider reveal" id="slider">

                    <!-- card 1 -->
                    <div class="card">
                        <img style="width: 20px;" src="img/logo/quotation.png" alt="">
                        <p>"TriNova Tech helped us develop a system that greatly streamlined our business operations."</p>

                        <div class="box">
                            <img src="img/person/one.png" alt="">
                            <div class="desc">
                                <h4>Budi Santoso</h4>
                                <p>CEO, Fantech Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <!-- card 2 -->
                    <div class="card">
                        <img style="width: 20px;" src="img/logo/quotation.png" alt="">
                        <p>"The mobile app developed by TriNova Tech has outstanding performance and is loved by our users."</p>

                        <div class="box">
                            <img src="img/person/two.png" alt="">
                            <div class="desc">
                                <h4>Siti Rahmawati</h4>
                                <p>Product Manager, SchopEase</p>
                            </div>
                        </div>
                    </div>

                    <!-- card 3 -->
                    <div class="card">
                        <img style="width: 20px;" src="img/logo/quotation.png" alt="">
                        <p>"Our company's data security is now much more reliable thanks to TriNova Tech's IT Security solutions."</p>

                        <div class="box">
                            <img src="img/person/three.png" alt="">
                            <div class="desc">
                                <h4>Andi Wijaya</h4>
                                <p>IT Director, SecureCorp</p>
                            </div>
                        </div>
                    </div>

                    <!-- card 4 -->
                    <div class="card">
                        <img style="width: 20px;" src="img/logo/quotation.png" alt="">
                        <p>"Fast, professional service, and the final results are very satisfying."</p>

                        <div class="box">
                            <img src="img/person/four.png" alt="">
                            <div class="desc">
                                <h4>Rina Putri</h4>
                                <p>Founder, StartupX</p>
                            </div>
                        </div>
                    </div>

                    <!-- card 5 -->
                    <div class="card">
                        <img style="width: 20px;" src="img/logo/quotation.png" alt="">
                        <p>"Their team was very communicative throughout the project."</p>

                        <div class="box">
                            <img src="img/person/five.png" alt="">
                            <div class="desc">
                                <h4>Dimas Prakoso</h4>
                                <p>CTO, Digital Corp</p>
                            </div>
                        </div>
                    </div>

                    <!-- card 6 -->
                    <div class="card">
                        <img style="width: 20px;" src="img/logo/quotation.png" alt="">
                        <p>"TriNova Tech significantly advanced our company's digital transformation."</p>

                        <div class="box">
                            <img src="img/person/six.png" alt="">
                            <div class="desc">
                                <h4>Nadia Salsabila</h4>
                                <p>Manager, Nexa Group</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <i id="next" class="fa-solid fa-chevron-right reveal"></i>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq">
        <div class="onee">
            <h5 class="reveal">FAQ</h5>
            <h3 style="color: white;" class="reveal">Frequently Asked Questions</h3>
            <div class="boxxes">
                <!-- box-opened -->
                <div class="box show reveal">
                    <div class="b-desc">
                        <h4>What are TriNova Tech's main services?</h4>
                        <p class="show">We provide various digital services such as Software Development, Mobile App Development, Cloud Solutions, IT Security, and more.</p>
                    </div>
                    
                    <img class="toggle-icon" src="img/logo/minus.png" alt="">
                </div>
                <div class="box reveal">
                    <div class="b-desc">
                        <h4>How long does a project take?</h4>
                        <p>Project timelines vary depending on complexity and requirements. On average, most projects take between 2 to 12 weeks from planning to final delivery.</p>
                    </div>
                    <img class="toggle-icon" src="img/logo/plus.png" alt="">
                </div>
                <div class="box reveal">
                    <div class="b-desc">
                        <h4>Does TriNova Tech serve small businesses?</h4>
                        <p>Yes, we work with businesses of all sizes, from startups and small businesses to larger enterprises, providing scalable digital solutions.</p>
                    </div>
                    <img class="toggle-icon" src="img/logo/plus.png" alt="">
                </div>
                <div class="box reveal">
                    <div class="b-desc">
                        <h4>How to start a project with TriNova Tech?</h4>
                        <p>You can start by contacting us through our website or consultation form. Our team will discuss your needs and recommend the best solution.</p>
                    </div>
                    <img class="toggle-icon" src="img/logo/plus.png" alt="">
                </div>
            </div>
        </div>
        <div class="twoo">
            
        </div>
        
    </div>
    
    <div class="end">
        <div class="container reveal">
            <div class="content">
                <h3 style="color: white;">Ready to Transform Your Business?</h3>
                <p style="color: white;">Contact us today for a free consultation and discover how TriNova Tech can help your business grow and succeed in the digital era.</p>
            </div>
            <button><a href="contact.php">Contact Us</a><img src="img/logo/arrow-right-blue.png" alt=""></button>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="content-footer">
            <div class="frame-one">
                <img src="img/logo-text-white.png" alt="" style="width: 200px;">
                <p>TriNova Tech is a trusted technology partner helping businesses grow and innovate in the digital era.</p>
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
                        <a href="product.php">Projects</a>
                        <a href="team.html">Our Team</a>
                        <a href="contact.php">Contact</a>
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
                        <a href="contact.php"><i class="fa-solid fa-location-dot"></i>Jl. Panglima Batur</a>
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
                <p style="color: white;">© 2026 TriNova Tech. All Rights Reserved.</p>
            </div>
            <div class="twot">
                <p style="color: white;">Privacy Policy</p>
                <p style="color: white;">Terms of Service</p>
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
    <script src="js/loading.js"></script>
    <script src="js/banner-slider.js"></script>
</body>
</html>