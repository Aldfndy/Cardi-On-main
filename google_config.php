<?php
//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('940077701939-s8assuk91t2jjkgnjpsuknflbmr8b1gg.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/pemweb/Cardi-On-main/login.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

?>
