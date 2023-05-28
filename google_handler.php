<?php
// Include Configuration File
include('google_config.php');

$login_button = '';

// This $_GET["code"] variable value is received after the user has logged into their Google Account and redirected to this PHP script.
if (isset($_GET["code"])) {
    // Attempt to exchange the code for a valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    // Check if there is any error during getting the authentication token.
    if (!isset($token['error'])) {
        // Set the access token used for requests.
        $google_client->setAccessToken($token['access_token']);

        // Store the access token value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        // Create an instance of the Google_Service_Oauth2 class.
        $google_service = new Google_Service_Oauth2($google_client);

        // Get user profile data from Google.
        $data = $google_service->userinfo->get();

        if (!isset($token['error'])) {
            // Set the access token used for requests.
            $google_client->setAccessToken($token['access_token']);
    
            // Create an instance of the Google_Service_Oauth2 class.
            $google_service = new Google_Service_Oauth2($google_client);
    
            // Get user profile data from Google.
            $data = $google_service->userinfo->get();
    
            // Store profile data in $_SESSION variables.
            $_SESSION['logged_in'] = "logged";
            $_SESSION['google_login'] = "logged";
            $_SESSION['name'] = $data->given_name;
            $_SESSION['last_name'] = $data->family_name;
            $_SESSION['email'] = $data->email;
            // $_SESSION['user_gender'] = $data->gender;
            $_SESSION['profile_img'] = $data->picture;
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            header("Location: homepage.php");
        }
    }
}
    

// Check if the user has logged into the system using a Google account.
if (!isset($_SESSION['access_token'])) {
    // Create a URL to obtain user authorization.
    $login_button = '<div style="display: flex; justify-content: center;">
                    <a href="' . $google_client->createAuthUrl() . '" style="border: 1px solid #ccc; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <img src="img/google.png" width="45 " height="30" />
                            <span style="margin-left: 10px;">Sign in with Google</span>
                        </div>
                    </a>
                </div>';
}
?>
