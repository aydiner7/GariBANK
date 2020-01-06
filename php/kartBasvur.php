<?php session_start();
	include '../system/baglan.php';

	$query2 = $db->query("SELECT * FROM musteri,kartlar,hesaplar where musteri.tc = '".$_SESSION["tc"]."' and hesaplar.musteri_id = musteri.id AND kartlar.iban = hesaplar.iban AND kartlar.durum != '2' AND kartlar.kartCesit=".$_POST["id"])->fetch(PDO::FETCH_ASSOC);
	if ( $query2 ){
	    if($query2["durum"]=="1")
	    	echo "Bu karta zaten sahipsiniz.";
	    else
	    	echo "Bu kart için başvurunuz zaten mevcut.";
	}
	else
	{
		$cvc2 = mt_rand(100, 999);

		$kart1 = "4567";
		$kart2 = substr($_SESSION["tc"],-4);
		$kart3 = mt_rand(1000,9999);
		$kart4 = mt_rand(1000,9999);

		$kart = $kart1;
		$kart .= $kart2;
		$kart .= $kart3;
		$kart .= $kart4;

		$sonkullanma = date("m")."/".date('Y', strtotime('+5 years'));
		$hesapKesim = date("d", strtotime('-1 days'));
		$tutar = "750";
		$faiz = "1";
		$tc = $_SESSION['tc']; 
		$query = $db->query("SELECT * FROM musteri WHERE tc = '{$tc}'")->fetch(PDO::FETCH_ASSOC);
		if ( $query ){
		    $tutar = $query["netGelir"];
		}

		$id = $_POST['id']; 
		$query = $db->query("SELECT * FROM kartCesitleri WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
		if ( $query ){
		    $faiz = $query["faiz"];
		}

		$iban = $_POST["iban"];
		$ekle = $db->exec("INSERT INTO `kartlar` (`kartNo`, `sonKullanma`, `cvc2`, `limit`, `faiz`, `tutar`, `hesapKesim`, `durum`, `iban`, `kartCesit`)VALUES ('{$kart}', '{$sonkullanma}', '{$cvc2}', '{$tutar}', '{$faiz}', '{$tutar}', '{$hesapKesim}', '0', '{$iban}', {$id})");
		if($ekle)
			echo "Kart Başvurunuz Başarıyla Yapıldı";
		else
			echo "Başvurunuz yapılamadı.Lütfen bizimle iletişime geçin.";
	}


		
 ?>