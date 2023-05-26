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
    <title>Search Instructor</title>
    <link rel="stylesheet" href="instructor-catalogue.css">
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
        <a class="nav-button left" href="catalogue.php">Back</a>
        <a class="nav-button" href="booking.php">Details</a>
        <a class="nav-button email current">Instructor</a>
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
        <h2 class="fade-up">List of Certified Instructors</h2>
        <section class="search-sports fade-up">
            <a class="places" href="transaction-instructor.php">
                <img src="img/instructor-1.png">
                <h3>Michael Simatupang</h3>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9733 &#9733
                </p>
                <p class="location">Jl. Pegangsaan Timur No.56, Jakarta Utama</p>
                <p class="type">Instructor since 2010</p>
            </a>
            <a class="places">
                <img src="img/instructor-2.png">
                <h3>Johnny Sins</h3>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9733 &#9734
                </p>
                <p class="location">Jalan Bendungan Bening No.11, Kecamatan Lowokwaru, Kota Malang</p>
                <p class="type">Instructor since 2015</p>
            </a>
            <a class="places">
                <img src="img/instructor-3.png">
                <h3>Carl Johnson</h3>
                <p class="rate">
                    &#9733 &#9733 &#9733 &#9734 &#9734
                </p>
                <p class="location">Jl. Raya Malang-Surabaya</p>
                <p class="type">Instructor since 2017</p>
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
