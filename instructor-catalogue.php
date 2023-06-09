<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
  header("Location: login.php");
  exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'cardion');
$name = $_SESSION["sport_inst"];
$result = mysqli_query($conn, "SELECT * FROM instructor WHERE categori = '$name'");
$counter = 0;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Search Instructor</title>
    <link rel="stylesheet" href="instructor-catalogue.css">
    <link rel="stylesheet" href="navbar.css">
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
        <a class="nav-button left" href="#"></a>
        <a class="nav-button current" href="#"></a>
        <a class="nav-button email">
            <div class="dropdown-profile">
                <button class="dropbtn right">
                    <p class="profile-name">
                        <?= $_SESSION['name'] ?>
                    </p>
                    <?php
                    $profile_img = $_SESSION['profile_img'];
                    if ($profile_img && !isset($_SESSION['google_login'])) {
                        echo '<img src="usr_img/' . $profile_img . '">';
                    } elseif ($profile_img && isset($_SESSION['google_login'])) {
                        echo '<img src="' . $profile_img . '">';
                    } else {
                        echo '<img src="img/account-logo.png">';
                    }
                    ?>
                </button>
                <div class="dropdown-content">
                    <a href="account-info.php">Account</a>
                    <a href="history.php">Order History</a>
                    <a href="logout.php">Sign Out</a>
                </div>
            </div>
    </nav>

    <section id="search">
        <h2 class="fade-up">List of Certified Instructors</h2>
        <section class="search-sports fade-up">
            <?php while ($row = mysqli_fetch_assoc($result)):?>
                <?php if($counter < 3) :?>
                <a class="places" href="transaction.php?is=asasdas">
                    <img src="<?= $row["img"] ?>">
                    <h3><?= $row["name"] ?></h3>
                    <p class="rate">
                        <?= $row["rating"] ?>
                    </p>

                </a>
                <?php $counter++;?>
                <?php endif ?>
            <?php endwhile ?>
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
