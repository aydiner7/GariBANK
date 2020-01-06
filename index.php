<?php session_start();
	include "system/baglan.php";
	if (empty($_SESSION["tc"])) {
		include "giris.php";
	}
	else{
		include "anasayfa.php";
	}





 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>GariBANK</title>
 	<link rel="shortcut icon" href="http://www.garibank.site/favicon.ico" type="image/x-icon" />
 </head>
 <body>
 
 </body>
 </html>
