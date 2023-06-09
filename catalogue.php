<?php
//require 'function.php';

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
    session_destroy();
    header("Location: login.php");
    exit();
}


if (isset($_POST['booknow'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'cardion');
    $name = $_POST["sport"];
    $location = $_POST["location"];
    $_SESSION["sport_inst"] = $_POST["sport"];
    $_SESSION["hour"] = $_POST["hours"];
    $result1 = mysqli_query($conn, "SELECT * FROM sport WHERE locationn LIKE '%$location%'");
    $result2 = mysqli_query($conn, "SELECT * FROM sport WHERE kategori LIKE '%$name%'");
    $xx = 0;
    $temp = "";
}
if (is_null($result1)) {
    header("Location: homepage.php");
    exit();
}

?>

<!DOCTYPE html <html lang="en">

<head>
    <title>Search</title>
    <link rel="stylesheet" href="catalogue.css">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="navbar.css">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cardion-red.png" type="image/png">
    <meta charset="utf-8">
    <script>
        history.replaceState({}, document.title, window.location.href);
    </script>

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
        <h2 class="fade-up">Sports Center Around Here</h2>
        <section class="search-sports fade-up">


            <?php while ($row1 = mysqli_fetch_assoc($result1)): ?>
                <?php if ($xx < 3 && strcasecmp($row1["kategori"], $name) == 0): ?>
                    <a class="places" href="booking.php?id=<?= $row1["name"] ?>">
                        <img src="<?= $row1["img"] ?>">
                        <h3>
                            <?= $row1["name"] ?>
                        </h3>
                        <p class="rate">
                            <?= $row1["rating"] ?>
                        </p>
                        <p class="location">
                            <?= $row1["locationn"] ?>
                        </p>
                    </a>
                    <?php $xx++; ?>
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