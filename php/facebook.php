<?php 
	require_once 'src/Facebook/autoload.php';
	require_once 'src/Facebook/Facebook.php';	

	$fbAyar = array(
		  'app_id' => '543941553127362', 
		  'app_secret' => '149875e331743b1a5f4ce7bf7aca5b38'
	);
	$fb = new Facebook ($fbAyar);
	$fbKimlik = $fb -> getUser();

 ?>	 

	  
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<?php 
		if ($fbKimlik) {
			
			$bilgiler = $fb -> api('/me','GET');

			echo '<pre>';
				print_r($bilgiler);
			echo "</pre>";	

		}else{
			$izinLink = $fb->getLoginUrl();
			echo'<script type="text/javascript">top.location.href="'.$izinLink.'"</script>';
		}


 ?>
</body>
</html>

	if ($fbKimlik) {
			
		}else{
			$izinLink = $fb->getLoginUrl();
			echo'<script type="text/javascript">top.location.href="'.$izinLink.'"</script>';
		}


 ?>