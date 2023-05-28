<?php
session_start();

$mysqli = mysqli_connect("localhost", "root", "", "cardion");
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email = mysqli_real_escape_string($mysqli, $email);
  $password = mysqli_real_escape_string($mysqli, $password);

  try {
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($mysqli, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $logged_in = 'logged';
      $user = mysqli_fetch_assoc($result);
      $_SESSION['name'] = $user['name'];
      $_SESSION['logged_in'] = $logged_in;
      $_SESSION['profile_img'] = $user['profile_img'];
      $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
      header("Location: homepage.php");
      exit();
    } else {
      $error_message = 'Invalid email or password';
    }
  } catch (Exception $e) {
    $_SESSION['error_code'] = mysqli_errno($mysqli);
    header("Location: login.php");
    exit();
  }
  mysqli_close($mysqli);
}

$_SESSION['error_message'] = $error_message;
header("Location: login.php");
exit();


?>
