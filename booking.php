<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
  header("Location: login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UB Sports Center</title>
    <link rel="stylesheet" href="booking.css">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cardion-red.png" type="image/png">
    <meta charset="utf-8">
  </head>

  <body>
    <nav id="navbar">
        <img src="img/cardion-red.png" id="logo">
        <a class="nav-button name">Cardi-On!</a>
        <div class="dropdown">
            <button class="dropbtn">
                <img src="img/account-logo.png">
            </button>
            <div class="dropdown-content">
                <a href="#home">Home</a>
                <a href="#pop">Search</a>
                <a href="#social">Details</a>
                <a href="login.php">Sign Out</a>
            </div>
        </div>
        <a class="nav-button left" href="#home">Home</a>
        <a class="nav-button" href="catalogue.php">Search</a>
        <a class="nav-button email" href="#pop">Details</a>
        <div class="dropdown-profile">
            <button class="dropbtn right">
                <p><?= $_SESSION['email'] ?></p>
                <img src="img/account-logo.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Account</a>
                <a href="#">Order History</a>
                <a href="login.php">Sign Out</a>
            </div>
        </div>
    </nav>

    <section id="page">
        <section class="location-image">
            <img src="img/ubsc-lobby.jpg">
            <div class="name">
                <h1>UB Sports Center</h1>
                <p>Official Partner</p>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9733 &#9733
                </p>
            </div>   
        </section>

        <section id="body">
            <div id="left">
                <div class="desc">
                    <h2>Description</h2>
                    <p>UB Sport Center merupakan unit usaha yang melayani jasa olahraga dan pusat olahraga terlengkap yang dimiliki oleh Universitas Brawijaya. Pendirian Sport Center UB didukung oleh PT. Pertamina Tbk yang merupakan hasil kerjasama dengan Universitas Brawijaya. UB Sport Center memiliki beberapa fasilitas seperti gym, fitness, bulu tangkis, tenis indoor, futsal, dan lain-lain.</p>
                </div>

               
                <div class="facilities">
                    <h2>Facilities</h2>  
                    <div class="facility-list">
                        <div class="facility left">
                            <img src="img/facility-toilet.png">
                            <p>Toilet</p>
                        </div>
                        <div class="facility">
                            <img src="img/facility-locker.png">
                            <p>Locker</p>
                        </div>
                        <div class="facility">
                            <img src="img/facility-wifi.png">
                            <p>WiFi</p>
                        </div>
                    </div>  
                    
                </div>

                <div class="review">
                    <h2>Review</h2>
                    <div class="review-box">
                        <div>
                            <img src="img/gigachad.png">
                        </div>
                        <div class="reviewer-name">
                            <p>Gigachad</p>
                            <p>December 2223</p>
                        </div>
                        <div class="rate">
                            <p>&#9733 &#9733 &#9733 &#9733 &#9733</p>
                        </div>
                    </div>

                    <p class="more">See other 1945 reviews...</p>
                    
                </div>

                <div class="location">
                    <h2>Location</h2>
                    <p>Jl. Terusan Cibogo No.1, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur </p>
                    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=300&amp;hl=en&amp;q=UB Sport Center&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebay-proxys.com/">Piratebay</a></div><style>.mapouter{position:relative;text-align:right;width:400px;height:300px;}.gmap_canvas {overflow:hidden;background:none!important;width:400px;height:300px;}.gmap_iframe {width:400px!important;height:300px!important;}</style></div>
                </div>
                <h2>Social</h2>
                <div class="location-social">
                    
                    <div>
                        <img src="img/footer-facebook.png">
                        <p>Facebook</p>
                    </div>
                    <div>
                        <img src="img/footer-instagram.png">
                        <p>Instagram</p>
                    </div>
                    <div>
                        <img src="img/footer-twitter.png">
                        <p>Twitter</p>
                    </div>
                </div>
            </div>

            <div class="right">
                <div class="date-section">
                    <h2>Available Schedules</h2>
                    <div class="date">
                        <a class="date-num">
                            <p>MON</p>
                            <p>1</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>TUE</p>
                            <p>2</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>WED</p>
                            <p>3</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>THU</p>
                            <p>4</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>FRI</p>
                            <p>5</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>SAT</p>
                            <p>6</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>SUN</p>
                            <p>7</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>MON</p>
                            <p>8</p>
                            <p>Dec</p>
                        </a>
                        <a class="date-num">
                            <p>TUE</p>
                            <p>9</p>
                            <p>Dec</p>
                        </a>

                    </div>  
                </div>
    
                <div class="schedules">
                    <div class="hours date-num">
                        <h3>Futsal</h3>
                        <p><span>&#128337 </span>13.00 (60 mins)</p>
                        <p>Rp 150.000</p>
                    </div>
                    <div class="hours">
                        <h3>Fitness</h3>
                        <p><span>&#128337 </span>13.00 (120 mins)</p>
                        <p>Rp 250.000</p>
                    </div>
                    <div class="hours">
                        <h3>Indoor Tennis</h3>
                        <p><span>&#128337 </span>13.00 (180 mins)</p>
                        <p>Rp 350.000</p>
                    </div>
                    <div class="hours">
                        <h3>Badminton</h3>
                        <p><span>&#128337 </span>15.00 (60 mins)</p>
                        <p>Rp 150.000</p>
                    </div>
                    <div class="hours">
                        <h3>Zumba</h3>
                        <p><span>&#128337 </span>13.00 (180 mins)</p>
                        <p>Rp 350.000</p>
                    </div>
                    <div class="hours">
                        <h3>Yoga</h3>
                        <p><span>&#128337 </span>15.00 (60 mins)</p>
                        <p>Rp 150.000</p>
                    </div>
                    <div class="hours">
                        <h3>Aerobic</h3>
                        <p><span>&#128337 </span>13.00 (180 mins)</p>
                        <p>Rp 350.000</p>
                    </div>
                    <div class="hours">
                        <h3>Table Tennis</h3>
                        <p><span>&#128337 </span>15.00 (60 mins)</p>
                        <p>Rp 150.000</p>
                    </div>
                </div>
                <a class="book-now" href="transaction.php">Book Now</a>
                <a class="book-now" href="instructor-catalogue.php">Hire an Instructor (optional)</a>
            </div>

        </section>

        
    </section>

    <footer id="footer">
        <h2>Contact Us</h2>
        <section id="social">
            <div>
                <img src="img/footer-facebook.png" alt="facebook logo">
                <a class="profile-link" href="#">Cardi-On!</a>
            </div>
            <div>
                <img src="img/footer-twitter.png" alt="twitter logo">
                <a class="profile-link" href="#">@cardionmalang</a>
            </div>
            <div>
                <img src="img/footer-instagram.png" alt="instagram logo">
                <a class="profile-link" href="#">Cardi-On!</a>
            </div>
        </section>
        <br>
        <p class="address">Jl. Veteran Malang, Ketawanggede, Kec. Lowokwaru Kota Malang, Jawa Timur.</p>
        <p>Email: cardion@gmail.com</p>
    </footer>
    <script src="booking.js"></script>r
  </body>
</html>