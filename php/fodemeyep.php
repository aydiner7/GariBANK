<?php session_start();
	include "../system/baglan.php";

	$query = $db->exec("UPDATE `faturaOdeme` SET `durum` = 1 WHERE `faturaOdeme`.`id` = ".$_POST["id"]);
	if ( $query){
		$query2 = $db->exec("UPDATE `hesaplar` SET `tutar` = `tutar` - ".$_POST["tutar"]." WHERE `hesaplar`.`iban` = '".$_POST["hesap"]."'");
		if ($query2) {
			echo "Ödeme gerçekleştirildi.";
		}
		else
			echo "hata oluştu.";
		
	     
	}else
			echo "hata oluştu";
 ?>