<?php session_start();
	include "../system/baglan.php";
$gtc = $_SESSION["tc"];
$sorgu = $db->query("SELECT * FROM musteri WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);
if ($sorgu) {
 	$sorgu2 = $db->exec("update ayarlar set ".$_POST["deger"]."=".$_POST["konum"]." where musteri_id =".$sorgu["id"]);
 	if (!$sorgu2) {
 		echo "0";
 	}

}else{
	echo "0";
}










 ?>