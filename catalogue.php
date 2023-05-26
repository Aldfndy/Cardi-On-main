
<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
    session_destroy();
    header("Location: login.php");
  exit();
}

$conect = mysqli_connect("localhost","root","","cardion");
$result = mysqli_query($conect,"SELECT * FROM sport");
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html
<html lang="en">
  <head>
    <title>Search</title>
    <link rel="stylesheet" href="catalogue.css">
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
                <a href="#pop">Popular</a>
                <a href="#social">Contact</a>
                <a href="login.php">Sign Out</a>
            </div>
        </div>
        <a class="nav-button left" href="homepage.php">Home</a>
        <a class="nav-button current" href="catalogue.php">Search</a>
        <a class="nav-button email">Details</a>
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

    <section id="search">
        <h2 class="fade-up">Sports Center Around Here</h2><section class="search-sports fade-up">    
            <a class="places" href="booking.php">
                <img src="img/ubsc.jpg">
                <h3>UB Sports Center</h3>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9733 &#9733
                </p>
                <p class="location">Jl. Terusan Cibogo No.1 Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur</p>
                <p class="type">Badminton, Fitness, Tennis, etc. </p>
            </a>
    

            <a class="places" href="#">
                <img src="img/sm-futsal.jpg">
                <h3>SM Futsal</h3>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9733 &# 
                </p>
                <p class="location">Jalan Sudimoro Utara, Mojolangu, Lowokwaru, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur</p>
                <p class="type">Indoor Football</p>
            </a>
            <a class="places" href="#">
                <img src="img/gor-pertamina.jpg">
                <h3>Gor Pertamina UB</h3>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9733 &#9734
                </p>
                <p class="location">Jl. Veteran Malang, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur</p>
                <p class="type">Badminton, Basketball, etc.</p>
            </a> 
        </section>

        <section id="pages">
            <a class="page-num" href="#"><span class="current">1<span></p>
            <a class="page-num" href="#">2</a>
            <a class="page-num" href="#">3</a>
            <a class="page-num" href="#">4</a>
            <a class="page-num" href="#">5</a>
            <a class="page-num" href="#">...</a>
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
  </body>
</html>