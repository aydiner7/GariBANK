<?php 
session_start();
$gtc=$_SESSION["tc"];
include "../system/baglan.php";


$sorgu = $db->query("SELECT id FROM musteri  WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);

$id = $sorgu["id"];

$sorgu = $db->query("SELECT h.hesap_adi FROM musteri m, hesaplar h  WHERE m.id = '{$id}'")->fetch(PDO::FETCH_ASSOC);


 ?>