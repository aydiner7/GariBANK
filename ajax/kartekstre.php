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


$query = $db->query("SELECT kc.resim, kc.baslik,k.kartNo,k.hesapKesim, k.faiz, h.hesapNum, k.iban, kh.tarih,k.limit, sum(kh.tutar) as tutar, m.tc FROM kartlar k, karthareketleri kh, hesaplar h,kartCesitleri kc, musteri m WHERE kc.id=k.kartCesit and m.tc = '".$_SESSION["tc"]."' AND h.musteri_id = m.id AND k.iban = h.iban AND IF(date_format(CURRENT_DATE,'%d')>k.hesapKesim,kh.tarih<CURRENT_DATE + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY and kh.tarih >= DATE_ADD( CURRENT_DATE, INTERVAL -1 MONTH) + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY,kh.tarih<DATE_ADD( CURRENT_DATE, INTERVAL -1 MONTH) + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY and kh.tarih >= DATE_ADD( CURRENT_DATE, INTERVAL -2 MONTH) + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY ) ")->fetch(PDO::FETCH_ASSOC);

	if ($query) {
		$kartno=$query["kartNo"];
		$kartlimit=$query["limit"];
		$musterino=$query["tc"];
		$iban=$query["iban"];
		$harcanantut=$query["tutar"] * -1;
		$hesapno=$query["hesapNum"];
		$hkesimtar=$query["hesapKesim"];
		$faiz=$query["faiz"];

		if(date("d")>$hkesimtar)
		{
			$hesap1=$hkesimtar-date('d');
			$hesap2=$hesap1+15;


			$hesapkes = date("d.m.Y",strtotime("$hesap1 day"));
			$sonodeme = date("d.m.Y",strtotime("$hesap2 day"));
			$hesapkes2 = date("d.m.Y",strtotime("$hesap1 day +1 MONTH"));

		}
		
	}
		$harcanantut+= $harcanantut/100*$faiz;
		$kulllimit=$kartlimit-$harcanantut;
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
<?php 
echo '<td>'.$sonodeme.'</td>'
 ?>

</tr>
<tr>
<td>Asgari Ödeme Tutarı:</td>
<td><?php echo $asodetut; ?> TL</td>
</tr>
<tr>
<td>Hesap Kesim Tarihi:</td>
<?php 

echo ' <td>'.$hesapkes.' </td>'?>
</tr>
<tr>
<td>Bir Sonraki Hesap Kesim Tarihi:</td>
<?php
echo '<td>'.$hesapkes2.'</td> ' 

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