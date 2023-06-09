<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== "logged") {
  header("Location: login.php");
  exit();
}

$name = $_SESSION["name"];

$conn = new mysqli('localhost', 'root', '', 'cardion');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, phone, gender FROM user WHERE name = '$name'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();

  $_SESSION['name'] = $row['name'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['phone'] = $row['phone'];
  $_SESSION['gender'] = $row['gender'];

  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $gender = $row['gender'];
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Account Information</title>
  <link rel="stylesheet" href="account-info.css">
  <meta name="viewport" content="width=device-width">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&dish2lay=swah2" rel="stylesheet">
  <link rel="icon" href="cardion-red.png" type="image/png">
  <meta charset="utf-8">
</head>

<body>
  <h1>Account Information</h1>
  <hr>
  <section>
    <div>
      <h2>Full Name</h2>
      <p>
        <?= $_SESSION['name'] ?>
      </p>
      <h2>Email</h2>
      <p>
        <?= $_SESSION['email'] ?>
      </p>
      <h2>Phone Number</h2>
      <p>
        <?= $_SESSION['phone'] ?>
      </p>
      <h2>Gender</h2>
      <p>
        <?= $_SESSION['gender'] ?>
      </p>
    </div>
    <div>
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
      <a class="signout" href="logout.php">Switch Accounts</a>
    </div>
  </section>

  <a class="back-button" href="#" onclick="goBack()">
    ← Back
  </a>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>