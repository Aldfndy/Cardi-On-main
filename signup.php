<?php
session_start();
unset($_SESSION['previous_page']);
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "logged") {

  $previousPage = isset($_SESSION['previous_page']) ? $_SESSION['previous_page'] : "homepage.php";
  header("Location: " . $previousPage);
  exit();
}

$_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en" class="bg">

<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="signup.css" />
  <meta name="viewport" content="width=device-width">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="icon" href="img/cardion-red.png" type="image/png">
  <meta charset="utf-8">
</head>

<body>
  <h1>Sign Up</h1>

  <div class="flex card">
    <div class="flex-left">
      <form action="process_form.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <label>Enter Your Full Name<input type="text" name="name" placeholder="John Doe" required /></label>
          <label>Enter Your Email<input type="email" name="email" placeholder="username@domain.com" required /></label>
          <label>Create a New Password<input type="password" name="password" required /></label>
        </fieldset>
        <fieldset>
          <div class="flex">
            <label>Upload a Profile Picture<input type="file" name="profile" accept="image/*" class="img-form"></label>
          </div>
          <div class="flex">
            <label>Age<input type="number" name="age" min="12" max="120" class="age-form" /></label>
          </div>
          <label>Provide a Bio
            <textarea name="bio" rows="3" cols="30" placeholder="Enter your bio here..."></textarea>
          </label>
        </fieldset>

        <div class="flex">
          <a href="account.php" id="back">← Back</a>
        </div>
      </form>
    </div>
    <div class="flex-right">
      <a type="submit" onclick="submitForm()">Create Account</a>
      <div class="popup" id="popup">
        <p id="popup-message"></p>
        <a href="index.php" id="home-link">Home</a>
        <a href="login.php" id="login-link">Login</a>
      </div>

    </div>
  </div>

  <script src="signup.js"></script>
</body>

</html>
