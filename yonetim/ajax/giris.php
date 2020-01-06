<?php session_start();
include("../../system/baglan.php");
$kadi=$_POST["kadi"];
$sifre=$_POST["sifre"];



$query = $db->query("SELECT * FROM personel WHERE kullaniciadi = '{$kadi}' and sifre='{$sifre}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    echo('1');
}else
{
	$_SESSION["tc"] = $query["id"];
	echo('0');
}








 ?>