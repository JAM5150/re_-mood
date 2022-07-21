<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'google-api/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('265344559907-eek9mfsqg5vanj0obpb581bodd4g7h4h.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://moodprojecttest.tk/webtest/index.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>