<?php
$mysqli = mysqli_connect("localhost", "root", "", "cardion");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $name = mysqli_real_escape_string($mysqli, $name);
    $email = mysqli_real_escape_string($mysqli, $email);
    $phone = mysqli_real_escape_string($mysqli, $phone);
    $password = mysqli_real_escape_string($mysqli, $password);
    

    $file = $_FILES['profile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    $uploadPath = '';

    if ($fileError === UPLOAD_ERR_OK) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $randomFileName = generateRandomString() . '.' . $fileExtension;
        $uploadPath = 'usr_img/' . $randomFileName;

        try {
            $query = "INSERT INTO user (name, email, phone, password, gender, profile_img)
                      VALUES ('$name', '$email', '$phone', '$password', '$gender', '$randomFileName')";

            $result = mysqli_query($mysqli, $query);

            if ($result) {
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    echo 'success';
                } else {
                    echo 'Error uploading the file.';
                }
            }
        } catch (Exception $e) {
            echo mysqli_errno($mysqli);
        }
    }

    mysqli_close($mysqli);
}

function generateRandomString($length = 10)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
?>