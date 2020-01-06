<?php session_start();
	include '../system/baglan.php';
	$kisi = $db->query("select hesaplar.iban from musteri,hesaplar where hesaplar.musteri_id=musteri.id and tc='".$_SESSION["tc"]."'")->fetch(PDO::FETCH_ASSOC);
	if($kisi)
	{
		
		$miktar = $_POST["miktar"];
		$kod = $_POST["kod"];
		$satis = $_POST["satis"];
		$alis = $_POST["alis"];
		$id = $kisi["iban"];
		
		if($_POST["buton"] == 1)
		{
			$tutar = $miktar * $satis;

			$sorgu = $db->exec("update `hesaplar` set `".$kod."`=`".$kod."`+".$miktar.",`tutar`=`tutar`-".$tutar." where `iban`='".$id."'");
			
			$hareket = $db->exec("insert into `hesaphareketleri`(`iban`,`iban2`,`tutar`,`bakiye`,`bakiye2`,`aciklama`) values ('{$id}','TC40 8289 7777 35 70 2551 2398 94','{$tutar}',".($kisi["tutar"]-$tutar).",0,'{$kod} Altın Alımı')");
			if($sorgu && $hareket)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			$tutar = $miktar * $satis;
			$sorgu = $db->exec("update `hesaplar` set `".$kod."`=`".$kod."`-".$miktar.",`tutar`=`tutar`+".$tutar." where `iban`='".$id."'");
			
			$hareket = $db->exec("insert into `hesaphareketleri`(`iban`,`iban2`,`tutar`,`bakiye`,`bakiye2`,`aciklama`) values ('TC40 8289 7777 35 70 2551 2398 94','{$id}','{$tutar}',0,".($kisi["tutar"]+$tutar).",'{$kod} Altın Satışı')");
			if($sorgu && $hareket)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
	}
 ?>