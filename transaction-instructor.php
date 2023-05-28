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
    <title>Payment</title>
    <link rel="stylesheet" href="transaction-instructor.css">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
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
                    <input type="radio" name="method" disabled><p>Card</p>
                </label>
                <label>
                    <input type="radio" name="method" disabled><p>E-Wallet</p>
                </label>
                <label>
                    <input type="radio" name="method" checked><p>Bank Transfer</p>
                </label>
            </div> 
        </div>

        <div class="transfer"> 
            <h2>Transfer an amount of <span class="amount">Rp 150.000</span> to :</h2>
            <h2 class="bank-name">Mandiri Bank</h2>
            <p class="bank-num">012345678</p>
        </div>

        <a class="confirm" type="submit" onclick="openPopup()">Confirm Payment</a>
        <div class="popup" id="popup">
          <p>Purchase Successful</p>
          <a href="homepage.php">Home</a>
        </div>

        <p class="disclaimer">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>

        <p class="back-button">
            <a href="booking.php">← Back</a>
        </p>
    </section>

    <section class="details right">
        <h1>Order Summary</h1>
        <hr>

        <div class="place">
            <img src="img/ubsc-lobby.jpg">
            <div class="place-info">
                <p class="top-text">UB Sports Center</p>
                <p>Futsal</p>
            </div>
            <div>
                <p class="top-text">Rp 150.000</p>
                <p>60 mins</p>
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
                <p>Instructor Fee</p>
                <p>Tax</p>
            </div>
            <div class="price-info">
                <p>Rp 150.000</p>
                <p>Rp 40.000</p>
                <p>Rp 10.000</p>
            </div>
        </div>
        <hr>

        <div class="total">
            <h2 class="total-text">Total</h2>
            <p class="total-price">Rp 200.000</p>
        </div>
    </section>
    <script src="trainee.js"></script>
  </body>
</html>
