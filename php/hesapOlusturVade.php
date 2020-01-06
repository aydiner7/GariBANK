<?php 
session_start();
$gtc=$_SESSION["tc"];
include "../system/baglan.php";

$iban=$_POST["iban"];
$sehir = $_POST["sehir"];
$sube = $_POST["sube"];
$hesapN = $_POST["hesapN"];
$hesapAa = $_POST["hesapAa"];




$sorgu = $db->query("SELECT id FROM musteri  WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);

$id = $sorgu["id"];


if (empty($hesapAa))  {
	echo ("2");
	exit();
}else{
	$sorgu2 = $db->exec("insert into hesaplar(iban, musteri_id, sehir, subeKodu, hesapNum, tutar, hesap_adi) values ('{$iban}','{$id}','{$sehir}','{$sube}','{$hesapN}',1500,'{$hesapAa}')");

}
	
	


if ( $sorgu2 ){
		echo ("3");
    $last_id = $db->lastInsertId();
    	//echo ("Hesap Açma İsteğiniz Tamamlanmıştır.");	//print "Hesap Açma İsteğiniz Tamamlanmıştır."; }
}else //echo("başarısız");

	//header("Content-Type: application/json");
	//echo json_encode($sonuc);
 ?>