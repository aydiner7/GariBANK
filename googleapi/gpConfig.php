<?php
session_start();
//Include Google client library
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';
/* * Configuration and setup Google API */
$clientId = '5438348135-etuu8ug4f59u8ibes8tch8sq2jndpa63.apps.googleusercontent.com';
$clientSecret = 'Bl7ySlUZqrtEgSXk0fFgv6Af';
$redirectURL = 'http://garibank.site/googleapi/index.php';
//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('garibank');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);
$google_oauthV2 = new Google_Oauth2Service($gClient);
?>