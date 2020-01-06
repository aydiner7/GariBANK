<?php  session_start();
include "../system/baglan.php";

			


$miktar=$_POST["miktar"];
$ay=$_POST["ay"];
$egitim=$_POST["egitim"];
$calismasekli=$_POST["calismasekli"];
$aylikgelir=$_POST["aylikgelir"]; //buralardaki ı ları i yaparsın hepsi ni ı yapmışsın sonra
$mesleksec=$_POST["mesleksec"];


$ibans = $db->query("select hesaplar.iban from musteri,hesaplar where hesaplar.musteri_id = musteri.id and musteri.tc='".$_SESSION["tc"]."'")->fetch(PDO::FETCH_ASSOC);
if($ibans)
{
	$iban = $ibans["iban"];
}


$sorgu = $db->exec("INSERT INTO `kredi`( `iban`, `tutar`, `krediTuruid`, `vade`, `faiz` ,`aylikgelir` ,`meslek`, `calimasekli`, `egitim`) VALUES ('".$iban."',".$miktar.",1,".$ay.",2.4,".$aylikgelir.",'".$mesleksec."','".$calismasekli."','".$egitim."')");




if ( $sorgu ){
   
    echo "1";
}
else {
	echo("0");
}






?>