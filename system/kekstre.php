<?php 
session_start();
include "../system/baglan.php";
$kartno="";
$donemborc="";
$sonodemetar="";
$asodetut="";
$hkesimtar="";
$kartlimit="";
$kulllimit="";
$topnakavans="";
$musterino="";
$iban="";
$harcanantut="";
$hesapno="";
$faiz="";


$query = $db->query("SELECT k.kartNo,k.hesapKesim, k.faiz, h.hesapNum, k.iban, kh.tarih,k.limit, kh.tutar, m.tc FROM kartlar k, karthareketleri kh, hesaplar h, musteri m
	 WHERE m.tc =  '11372009058' AND h.musteri_id = m.id AND k.iban = h.iban")->fetch(PDO::FETCH_ASSOC);

	if ($query) {
		$kartno=$query["kartNo"];
		$kartlimit=$query["limit"];
		$musterino=$query["tc"];
		$iban=$query["iban"];
		$harcanantut=$query["tutar"];
		$hesapno=$query["hesapNum"];
		$hkesimtar=$query["hesapKesim"];
		$faiz=$query["faiz"];
		
	}
	
		$kulllimit=($kartlimit-($harcanantut + ($harcanantut * $faiz)));
		$topnakavans=($kulllimit * (1/3));
		$topnakavans=number_format($topnakavans, 2, '.', '' );
		$asodetut=($harcanantut*(1/3));
		$asodetut=number_format($asodetut, 2, '.', '' );
 ?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kart Ekstre</title>
<link href="system/kekstre.css" rel="stylesheet">
</head>
 
<body>
<table id="tasarım">

<tr>
<td>Kart Numarası : </td>
<td><?php echo $kartno; ?></td>
</tr>
<tr>
<td>Dönem Borcu:</td>
<td><?php echo $harcanantut;  ?>  TL</td>
</tr>
<tr>
<td>Son Ödeme Tarihi:</td>
<?php $tarih2=explode(" ", $hkesimtar);
$tarih3=explode("-", $tarih2[0]);
$timestamp = mktime(0, 0, 0, $tarih3[1],$tarih3[2],$tarih3[0]);
echo '<td>'.date('d.m.Y', $timestamp+60*60*24*10).'</td>'
 ?>

</tr>
<tr>
<td>Asgari Ödeme Tutarı:</td>
<td><?php echo $asodetut; ?> TL</td>
</tr>
<tr>
<td>Hesap Kesim Tarihi:</td>
<?php 
$tarih2=explode(" ", $hkesimtar);
$tarih3=explode("-", $tarih2[0]);
$timestamp = mktime(0, 0, 0, $tarih3[1],$tarih3[2],$tarih3[0]);
echo ' <td>'.date('d.m.Y', $timestamp).' </td>'?>
</tr>
<tr>
<td>Bir Sonraki Hesap Kesim Tarihi:</td>
<?php $tarih2=explode(" ", $hkesimtar);
$tarih3=explode("-", $tarih2[0]);
$timestamp = mktime(0, 0, 0, $tarih3[1],$tarih3[2],$tarih3[0]);
echo '<td>'.date('d.m.Y', $timestamp+60*60*24*30).'</td> ' 

?>

</tr>
<tr>
<td>Kart Limiti:</td>
<td><?php echo $kartlimit; ?> TL</td>
</tr>
<tr>
<td>Kullanılabilir Kart Limiti:</td>
<td><?php echo $kulllimit; ?> TL </td>
</tr>
<tr>
<td>Toplam Nakit Avans Limiti:</td>
<td><?php echo $topnakavans; ?> TL </td>
</tr>
<tr>
<td>Müşteri No:</td>
<td><?php echo $musterino; ?> </td>
</tr>
<tr>
<td>Hesap No:</td>
<td>2<?php echo $hesapno; ?> </td>
</tr>
<tr>
<td>IBAN:</td>
<td><?php echo $iban; ?> </td>
</tr>
</table>
</body>
</html>