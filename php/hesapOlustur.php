<?php 
session_start();
$gtc=$_SESSION["tc"];
include "../system/baglan.php";

$iban=$_POST["iban"];
$sehir = $_POST["sehir"];
$sube = $_POST["sube"];
$hesapN = $_POST["hesapN"];
$hesapA = $_POST["hesapA"];	



$sorgu = $db->query("SELECT id FROM musteri  WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);

$id = $sorgu["id"];

if (empty($hesapA))  {
	echo ("1");
	exit();
}else{
 $sorgu2 = $db->exec("insert into hesaplar(iban, musteri_id, sehir, subeKodu, hesapNum, tutar, hesap_adi, faiz, tur) values ('{$iban}','{$id}','{$sehir}','{$sube}','{$hesapN}',1500,'{$hesapA}', 9.7, 1)");
}


if ( $sorgu2 ){
	echo ("0");
		
    $last_id = $db->lastInsertId();
   
}else //echo("başarısız");
 ?>