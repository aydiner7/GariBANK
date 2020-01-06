<?php
//Include GP config file && User class
include_once 'gpConfig.php';
//include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	//$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        //'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture']
        //'link'          => $gpUserProfile['link']
    );
    


    include "../system/baglan.php";
    $googleid = $gpUserData["oauth_uid"];

    $query = $db->query("SELECT * FROM musteri WHERE google = '{$googleid}'")->fetch(PDO::FETCH_ASSOC);

        if ( $query ){
         $m_id = $query["id"];
         $sorgu = $db->query("SELECT * FROM ayarlar WHERE musteri_id = '{$m_id}'")->fetch(PDO::FETCH_ASSOC);
                  if ($sorgu) {
                  if ($sorgu["google"]=="1") {
                    $_SESSION["tc"] = $query["tc"];
                  }
              }
           
        }
      else
      {
         if (isset($_SESSION["tc"])) {
           $db->exec("update musteri set google='{$googleid}' where tc=".$_SESSION["tc"]);
         }
      }


    

    header('Location: https://garibank.site/');


    //$userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	//$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    /*if(!empty($userData)){
        $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
        echo $output;
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }*/
} else {
	$authUrl = $gClient->createAuthUrl();
    header("location:".filter_var($authUrl, FILTER_SANITIZE_URL));
	//$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Google using PHP by CodexWorld</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
<div><?php //echo $output; ?></div>
</body>
</html>