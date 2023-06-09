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
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <form action="signup_handler.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <label>Enter Your Full Name<input type="text" name="name" placeholder="John Doe" required /></label>
          <label>Enter Your Email<input type="email" name="email" placeholder="username@domain.com" required /></label>
          <label>Enter Your Phone Number<input type="number" name="phone" placeholder="08xxxxxxxxxx" required /></label>
          <label>Create a New Password<input type="password" name="password" required /></label>
          
        </fieldset>
        <fieldset>
          <div class="flex">
            <label>Upload a Profile Picture<input type="file" name="profile" accept="image/*" class="img-form"></label>
            <label>Select a Gender
            <select id="gender" name="gender" required>
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </label>
          </div>
        </fieldset>

        <div class="flex">
          <a href="index.php" id="back">← Back</a>
        </div>
      </form>
    </div>
    <div class="flex-right">
      <a type="submit" href="#" onclick="submitForm()">Create Account</a>
    </div>
    <div class="popup" id="popup">
        <p id="popup-message">Your Account has been created</p>
        <a href="index.php" id="home-link">Home</a>
        <a href="login.php" id="login-link">Login</a>
      </div>
  </div>

  <script src="signup.js"></script>
</body>

</html>