<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
    header("Location: login.php");
    exit();
}

//$myValue = 0;
$hargais = 0;
if (isset($_GET["is"])) {
    $hargais = 50000;

}

$id = $_SESSION["id"];
$harga = $_SESSION["totalprice"];
$mysqli = new mysqli("localhost", "root", "", "cardion");
$stmt = $mysqli->prepare("SELECT * FROM sport WHERE name = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$mysqli->close();
// Mendapatkan data history pembayaran dari cookie
$paymentHistory = isset($_COOKIE['payment_history']) ? json_decode($_COOKIE['payment_history'], true) : [];

// Menambahkan data pembayaran ke history
$paymentData = [
    'id' => $id,
    'price' => ($_SESSION["totalprice"] + $hargais + $_SESSION["totalprice"] * 10 / 100),
    'hour' => ($_SESSION["totalprice"] / $_SESSION["basePrice"]),
    'date' => date('Y-m-d')
];
$paymentHistory[] = $paymentData;

// Mengubah data history menjadi format string
$paymentHistoryString = json_encode($paymentHistory);

// Menyimpan cookie dengan data history pembayaran
setcookie('payment_history', $paymentHistoryString, time() + (86400 * 30), '/'); // Cookie berlaku selama 30 hari

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Summary</title>
    <link rel="stylesheet" href="transaction.css">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cardion-red.png" type="image/png">
    <meta charset="utf-8">
</head>

<body>
    <section class="details left">
        <h1>Payment</h1>
        <hr>
        <div class="type">
            <h2>Pay With :</h2>
            <div class="payment-option">
                <label>
                    <input type="radio" name="method">
                    <p>Card</p>
                </label>
                <label>
                    <input type="radio" name="method">
                    <p>E-Wallet</p>
                </label>
                <label>
                    <input type="radio" name="method" checked>
                    <p>Bank Transfer</p>
                </label>
            </div>
        </div>

        <div class="transfer">
            <h2>Transfer an amount of <span class="amount">
                    <?php echo 'Rp ' . number_format($_SESSION["totalprice"] + $hargais + $_SESSION["totalprice"] * 10 / 100, 0, '.', ','); ?>
                </span> to :</h2>
            <h2 class="bank-name">Mandiri Bank</h2>
            <p class="bank-num">012345678</p>
        </div>

        <button class="confirm" type="submit" onclick="showPopup()">Confirm Payment</button>

        <p class="disclaimer">Your personal data will be used to process your order, support your experience throughout
            this website, and for other purposes described in our privacy policy.</p>

        <p class="back-button">
            <a href="#" onclick="goBack()">← Back</a>
        </p>
    </section>

    <section class="details right">
        <h1>Order Summary</h1>
        <hr>

        <div class="place">
            <img src="<?= $row["img"] ?>">
            <div class="place-info">
                <p>
                    <?= $row["name"] ?>
                </p>
                <p class="bottom-text"></p>
                <?php echo $_SESSION["totalprice"] / $_SESSION["basePrice"]; ?> hour(s)</p>
            </div>
        </div>
        <hr>

        <div class="voucher">
            <input type="text" placeholder=" Gift or Discount Code">
            <a href="#">Apply</a>
        </div>
        <hr>

        <div class="price">
            <div class="price-info-text">
                <p>Subtotal</p>
                <p>Tax</p>
                <p>Instructor Fee</p>
            </div>
            <div class="price-info">
                <p>
                    <?php echo 'Rp ' . number_format($_SESSION["totalprice"], 0, '.', ','); ?>
                </p>
                <p>
                    <?php echo 'Rp ' . number_format($_SESSION["totalprice"] * 10 / 100, 0, '.', ','); ?>
                </p>
                <p>
                    <?php echo 'Rp ' . number_format($hargais, 0, '.', ','); ?>
                </p>
            </div>
        </div>
        <hr>

        <div class="total">
            <h2 class="total-text">Total</h2>
            <p class="total-price">
                <?php echo 'Rp ' . number_format($_SESSION["totalprice"] + $hargais + $_SESSION["totalprice"] * 10 / 100, 0, '.', ','); ?>
            </p>
        </div>
        <div class="popup" id="popup">
            <p id="popup-message">Payment Successful !</p>
            <a href="history.php" id="home-link">View Order</a>
            <a href="homepage.php" id="login-link">Back to Home</a>
        </div>
    </section>
    <script>
        function goBack() {
            window.history.back();
        }
        function showPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
        }

    </script>
</body>

</html>