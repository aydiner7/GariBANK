<?php
session_start(); 
include "../system/baglan.php";
$id=$_POST["mid"];
$hesap_adi=$_POST["hesap_adi"];
$tur=$_POST["tur"];


$sorgu= $db->exec("UPDATE `hesaplar` SET `hesap_adi`='{$hesap_adi}',`tur`={$tur} WHERE `iban`='{$id}'");
if($sorgu){

	echo "1";

}
else
echo "0";

 ?>