<?php session_start();
	include "../system/baglan.php";	
	$gtc=$_POST["tc"];
	$gsifre=$_POST["sifre"];
	$hatirla=$_POST["benihatirla"];



	$query = $db->query("SELECT * FROM musteri WHERE tc = '{$gtc}' and sifre = '{$gsifre}' AND durum=1 AND onay=1")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){

		if($hatirla == "1")
			$_SESSION["hTC"] = $gtc;
		else
			session_destroy();

		$sorgu = $db->query("SELECT * FROM ayarlar WHERE musteri_id=".$query["id"])->fetch(PDO::FETCH_ASSOC);
			if ($sorgu["kod"]=="1") {
				echo "1";
			}else{
				session_start();
				$_SESSION["tc"]=$gtc;
				echo "2";
			}

	}	
		
	else echo "0";
 ?>