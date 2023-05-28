<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
    header("Location: login.php");
    exit();
}


$choiceId = $_GET['id'];
$mysqli = new mysqli("localhost", "root", "", "cardion");
$stmt = $mysqli->prepare("SELECT * FROM sport WHERE name = ?");
$stmt->bind_param("s", $choiceId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$_SESSION["nameSport"] = $row["name"];
$_SESSION["imgSport"] = $row["img"];
$_SESSION["ratingSport"] = $row["rating"];
$_SESSION["locationSport"] = $row["locationn"];
$_SESSION["descSport"] = $row["desc"];

$stmt->close();
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>UB Sports Center</title>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="navbar.css">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cardion-red.png" type="image/png">
    <meta charset="utf-8">
</head>

<body>
<nav id="navbar">
    <img src="img/cardion-red.png" id="logo">
    <a class="nav-button name">Cardi-On!</a>
    <a class="nav-button left" href="catalogue.php">Back</a>
    <a class="nav-button" href="#description">Description</a>
    <a class="nav-button" href="#facilities">Facilities</a>
    <a class="nav-button" href="#review">Review</a>
    <a class="nav-button" href="#location">Location</a>
    <a class="nav-button email" href="#pricing">Pricing</a>
    <div class="dropdown-profile">
        <button class="dropbtn right">
            <p class="profile-name">
                <?= $_SESSION['name'] ?>
            </p>
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
            <a href="#">Account</a>
            <a href="#">Order History</a>
            <a href="logout.php">Sign Out</a>
        </div>
    </div>
</nav>

    <section id="page">
        <section class="location-image">
            <img src="<?= $_SESSION["imgSport"] ?>">
            <div class="name">
                <h1><?= $_SESSION["nameSport"] ?></h1>
                <p>Official Partner</p>
                <p class="rate">
                    <?= $_SESSION["ratingSport"] ?>
                </p>
            </div>
        </section>

        <section id="body">
            <div id="left">
                <div class="desc" id="description">
                    <h2>Description</h2>
                    <p><?= $_SESSION["descSport"] ?></p>
                </div>


                <div class="facilities" id="facilities">
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

                <div class="review" id="review">
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

                <div class="location" id="location">
                    <h2>Location</h2>
                    <p><?= $_SESSION["locationSport"] ?></p>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=400&amp;height=300&amp;hl=en&amp;q=UB Sport Center&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                href="https://piratebay-proxys.com/">Piratebay</a>
                        </div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 400px;
                                height: 300px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                width: 400px;
                                height: 300px;
                            }

                            .gmap_iframe {
                                width: 400px !important;
                                height: 300px !important;
                            }
                        </style>
                    </div>
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
                <div class="schedules" id="pricing">
                    <div class="hours date-num">
                        <h3>1 Hour</h3>
                        <p><span>&#128337 </span>13.00 (60 mins)</p>
                        <p>Rp 150.000</p>
                    </div>
                    <div class="hours">
                        <h3>2 Hours</h3>
                        <p><span>&#128337 </span>13.00 (120 mins)</p>
                        <p>Rp 250.000</p>
                    </div>
                    <div class="hours">
                        <h3>Indoor Tennis</h3>
                        <p><span>&#128337 </span>13.00 (180 mins)</p>
                        <p>Rp 350.000</p>
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