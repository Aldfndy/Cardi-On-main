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
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=905928333841474&autoLogAppEvents=1"></script>

  <link rel="icon" href="img/cardion-red.png" type="image/png">
  <meta charset="utf-8">
</head>

<body>
  <h1>Login</h1>
  <form action='' method='POST'>
    <fieldset>
      <label>Email<input type="email" name="email" placeholder="mail@domain.com" required /></label>
      <label>Password<input type="password" name="password" required /></label>
      <a href="ngikngok_ingfoRSUB.php" class="forgot">Forgot Password?</a>
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

    <p><b>Login Using</b></p>
    <hr>
    <div class="flex">
      <?php
        require_once 'google_handler.php';
      ?>
      <a href="<?php echo $google_client->createAuthUrl(); ?>" class="flex-button">
        <img src="img\google.png" id="google" alt="google logo">
      </a>
      <a href="#" onclick="loginWithFacebook();" class="flex-button">
        <img src="img/fb.png" id="fb" alt="facebook logo">
      </a>
    </div>
    <br>
    <p class="create">Don't have an account yet?
      <a href="signup.php">
        <b>Sign Up</b>
      </a>
    </p>
  </form>

  <footer>
    <a href="index.php">← Back</a>
  </footer>

  <script>
  function loginWithFacebook() {
    FB.login(function(response) {
      if (response.authResponse) {
        // User is logged in and authorized your app
        // You can retrieve user details using the Facebook Graph API
        FB.api('/me', { fields: 'name,email' }, function(response) {
          console.log('Facebook user:', response);
          // Perform further actions with the user data
        });
      } else {
        // User has not authorized your app or not logged in
        console.log('Facebook login failed.');
      }
    }, { scope: 'email' }); // Specify the required permissions you need from the user
  }
</script>



</body>