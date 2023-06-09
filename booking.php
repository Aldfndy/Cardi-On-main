<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
    header("Location: login.php");
    exit();
}

$choiceId = $_GET['id'];
$_SESSION["id"] = $choiceId;
$mysqli = new mysqli("localhost", "root", "", "cardion");
$stmt = $mysqli->prepare("SELECT * FROM sport WHERE name = ?");
$stmt->bind_param("s", $choiceId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$mysqli->close();

$totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : $row["price"];
$_SESSION["totalprice"] = $totalPrice;
$endTime = intval($_SESSION['hour']) + 1;
$_SESSION["basePrice"] = $row["price"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $row["name"]; ?>
    </title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="booking.css">
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
        <a class="nav-button left" href="#description">Description</a>
        <a class="nav-button" href="#facilities">Facilities</a>
        <a class="nav-button" href="#review">Review</a>
        <a class="nav-button email" href="#location">Location</a>
        <div class="dropdown-profile">
            <button class="dropbtn right" href="newnav.css">
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

    <section id="page">
        <section class="location-image">
            <img src="<?= $row["img"] ?>">
            <div class="name">
                <h1>
                    <?= $row["name"]; ?>
                </h1>
                <p>Official Partner</p>
                <p class="rate">
                    <?= $row["rating"]; ?>
                </p>
            </div>
        </section>

        <section id="body">
            <div id="left">
                <div class="desc" id="description">
                    <h2>Description</h2>
                    <p>
                        <?= $row["desc"]; ?>
                    </p>
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
                    <p>
                        <?= $row["locationn"]; ?>
                    </p>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=400&amp;height=300&amp;hl=en&amp;q=<?= $row["name"]; ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
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
                <h2 class="social-text">Social</h2>
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
            </div>
            <script>
                function handleTimeChange(input) {
                    var currentTime = new Date(input.value);
                    currentTime.setHours(currentTime.getHours() + 1);

                    var newTime = currentTime.toTimeString().split(' ')[0];
                    input.value = newTime;
                }
            </script>



            <div class="right">
                <h2 class="box-title">Select Hours</h2>
                <label class="hour-selector">
                    <form action="" method="post">
                        <div class="value-button">
                            <button type="button" class="minus">-</button>
                            <input type="text" class="value" value="1">
                            <button type="button" class="plus">+</button>
                        </div>
                    </form>
                    <p><span class="start-time">
                            <?= $_SESSION['hour'] ?>
                        </span><span class="duration">-</span><span class="end-time">
                            <?= date('H:i', strtotime($_SESSION['hour'] . ':00') + 3600) ?>
                        </span></p>
                </label>
                <div class="cost">
                    <h3>Total Price :</h3>
                    <p>Rp<span class="price" data-base-price="<?= $row["price"]; ?>"><?= $row["price"]; ?></span></p>
                </div>
                <p class="disclaimer">(excluding taxes)</p>

                <a href="transaction.php">
                    <button class="continue">
                        <h3>Proceed to<br>Payment Method</h3>
                    </button>
                </a>
                <a href="instructor-catalogue.php">
                    <button class="continue">
                        <h3>Hire an Instructor</h3>
                        <p>(w/ additional cost)</p>
                    </button>
                </a>

            </div>
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
    <script>
        // Get the elements
        const minusButton = document.querySelector('.minus');
        const plusButton = document.querySelector('.plus');
        const valueInput = document.querySelector('.value');
        const startTimeElement = document.querySelector('.start-time');
        const endTimeElement = document.querySelector('.end-time');
        const priceElement = document.querySelector('.price');

        // Add event listeners to the buttons
        minusButton.addEventListener('click', decreaseValue);
        plusButton.addEventListener('click', increaseValue);

        // Decrease the value when the minus button is clicked
        function decreaseValue() {
            let value = parseInt(valueInput.value);
            if (value > 1) {
                value--;
                valueInput.value = value;
                updateInfo();
            }
        }

        // Increase the value when the plus button is clicked
        function increaseValue() {
            let value = parseInt(valueInput.value);
            value++;
            valueInput.value = value;
            updateInfo();
        }

        // Update the end time and price based on the input value
        function updateInfo() {
            let startTime = parseFloat(startTimeElement.textContent);
            let value = parseInt(valueInput.value);
            let endTime = startTime + value;
            if (endTime < 10) {
                endTime = "0" + endTime.toFixed(2);
            } else {
                endTime = endTime.toFixed(2);
            }

            endTimeElement.textContent = endTime;


            // Calculate the price based on the base price and the input value
            let basePrice = parseFloat(priceElement.getAttribute('data-base-price'));
            let totalPrice = basePrice * value;
            priceElement.textContent = totalPrice.toFixed(2);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_totalprice.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response if needed
                }
            };
            xhr.send('totalPrice=' + totalPrice);
        }
    </script>

</body>

</html>