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
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
  <meta name="viewport" content="width=device-width">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="icon" href="img/cardion-red.png" type="image/png">
  <meta charset="utf-8">
</head>

<body>
  <h1>Login</h1>
  <form action='' method='POST'>
    <fieldset>
      <label>Email<input type="email" name="email" placeholder="mail@domain.com" required /></label>
      <label>Password<input type="password" name="password" required /></label>
      <a href="#" class="forgot">Forgot Password?</a>
    </fieldset>
    <?php
    if (isset($_SESSION['error_code'])) {
      $error_code = $_SESSION['error_code'];
      unset($_SESSION['error_code']);
    }
    if (isset($_SESSION['error_message'])) {
      $error_message = $_SESSION['error_message'];
      unset($_SESSION['error_message']);
    }
    ?>
    <?php if (isset($error_code)): ?>
      <p class="error">
        <?php echo "Error code: " . $error_code; ?>
      </p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
      <p class="error">
        <?php echo $error_message; ?>
      </p>
    <?php endif; ?>
    <input type="submit" value="Continue" id="login-button" formaction="login_handler.php" />

    <p><b>Sign In Using</b></p>
    <hr>
    <div class="flex">
      <a class="flex-button">
        <img src="img\google.png" id="google" alt="google logo">
      </a>
      <a class="flex-button">
        <img src="img\fb.png" id="fb" alt="facebook logo">
      </a>
      <a class="flex-button">
        <img src="img\apple.png" id="apple" alt="apple logo">
      </a>
    </div>
    <br>
    <p class="create">Don't have an account yet?
      <a href="account.php">
        <b>Sign Up</b>
      </a>
    </p>
  </form>

  <footer>
    <a href="index.php">← Back</a>
  </footer>
</body>