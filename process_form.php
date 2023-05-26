<?php

$mysqli = mysqli_connect("localhost", "root", "", "cardion");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $bio = $_POST['bio'];

    $name = mysqli_real_escape_string($mysqli, $name);
    $email = mysqli_real_escape_string($mysqli, $email);
    $password = mysqli_real_escape_string($mysqli, $password);

    try {
        $query = "INSERT INTO user (name, email, password, age, bio)
              VALUES ('$name', '$email', '$password', $age, '$bio')";

        $result = mysqli_query($mysqli, $query);

        if ($result) {
            echo 'success';
        }
    } catch (Exception $e) {
        echo mysqli_errno($mysqli);
    }
    mysqli_close($mysqli);
}
?>