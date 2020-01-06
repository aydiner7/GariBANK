<?php 

include "Facebook/autoload.php";

$fb = new Facebook\Facebook([

  'app_id' => '699321787101603', // Replace {app-id} with your app id

  'app_secret' => 'f211365d453a079642e7c77810b3509d',

  'default_graph_version' => 'v2.2',

  ]);



$helper = $fb->getRedirectLoginHelper();



$permissions = ['email']; // Optional permissions

$loginUrl = $helper->getLoginUrl('https://garibank.site/facebook/myApp/fb-callback.php', $permissions);

header('Location: '.htmlspecialchars($loginUrl));

//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';



 ?>