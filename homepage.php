
<!-- <?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
    header("Location: login.php");
    exit();
}
?> -->

<!DOCTYPE html>
<html lang="en"></html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="homepage.css">
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
        <a class="nav-button left" href="#home">Home</a>
        <a class="nav-button" href="#pop">Popular</a>
        <a class="nav-button email" href="#footer">Contact Us</a>
        <div class="dropdown-profile">
            <button class="dropbtn right">
                <p><?= $_SESSION['email'] ?></p>
                <img src="img/account-logo.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Account</a>
                <a href="#">Order History</a>
                <a href="logout.php">Sign Out</a>
            </div>
        </div>
    </nav>

    <section id="home" class="home-bg">
        <h1>LET'S DO SPORT</h1>
        <form action="catalogue.php" method="POST">
            <label class="select">
                <p>Location</p>
                <input type="text" required name="location">
            </label>
            <label class="select">
                <p>Sport</p>
                <input type="text" required name="sport">
            </label>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="submit" class="order" value="Book Now" href="catalogue.php">
        </form>
        
    </section>

    <section id="pop">
        <h2 class="fade-up">Popular Sports</h2>
        <section class="pop-sports fade-up">
            <div class="feature">
                <img src="img/pop-badminton.jpg">
                <h3>Badminton</h3>
            </div>
            <div class="feature">
                <img src="img/pop-football.jpg">
                <h3>Football</h3>
            </div>
            <div class="feature">
                <img src="img/pop-basketball.jpg">
                <h3>Basketball</h3>
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
    <script src="homepage.js"></script>
  </body>
</html>