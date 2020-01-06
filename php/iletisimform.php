<?php session_start();
include "../system/baglan.php";
$secenek=$_POST["secenek"];
$konu=$_POST["subject"];
$mesaj=$_POST["msg"];



$tc = $_SESSION['tc']; 
$query = $db->query("SELECT * FROM musteri WHERE tc = '{$tc}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
	$id=$query["id"];
    $sorgu = $db->exec("insert into iletisim (musteri_id,baslik,konu,mesaj) values ('{$id}','{$secenek}','{$konu}','{$mesaj}') ");


	if ( $sorgu ){
	    $last_id = $db->lastInsertId();
	    print "1";
	}
	else {
		echo("0");
	}
}
else
	echo "2";







 ?>