<?php 
session_start();
include "../system/baglan.php";

$kredituru="";
$sube ="";
$iban="";
$hesapno="";
$kreditutar="";
$kredi="";
$vade="";
$faiz="";
$tarih="";
$kfon="";
$mfon="";


$query = $db->query("SELECT k.id, kt.ad, h.subeKodu, h.hesapNum, k.iban, k.tutar, k.faiz,k.vade, k.tarih
FROM kredi k, kredituru kt, hesaplar h, musteri m
WHERE m.tc = '{$_SESSION["tc"]}'AND h.musteri_id = m.id AND k.krediTuruid = kt.id AND k.iban = h.iban")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    $kredituru=$query["ad"];
     $sube=$query["subeKodu"];
      $iban=$query["iban"];
       $hesapno=$query["hesapNum"];
       $kreditutar= $query["tutar"];
       $kredi=$query["id"];
       $vade=$query["vade"];
       $faiz= $query["faiz"];
       $tarih=$query["tarih"];
      

}
else {
    echo "aktif bir kredin yok.";
  exit;
}
  



 ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Kredi Sorgula</title>
  <link href="system/krediode.css" rel="stylesheet">

</head>
<body>
  <table class="odeme">
<tbody>
<tr>
<td>Kredi Türü</td><td><?php echo $kredituru; ?></td></tr>

<td>Şube</td><td><?php echo $sube; ?></td></tr>
<tr>
<td>IBAN</td><td><?php echo $iban; ?></td></tr>
<tr>
<td>Hesap No</td><td><?php echo $hesapno; ?></td></tr>
<tr>
<td>Kredi Tutarı</td><td><?php echo $kreditutar; ?></td></tr>
</tbody>
</tr>
</table>
<table class="kro">
<thead>
<tr>
<th>Taksit No</th>
<th>Tarih</th>
<th>Taksit Tutarı</th>
<th>Taksit Anapara Tutarı</th>
<th>Faiz Tutarı</th>
<th>KKDF- Fon Tutarı</th>
<th>BVMS-Vergi Tutarı</th>
<th>Ödeme Durumu</th>
</tr>
</thead>
<tbody>

<?php 
$adet=0;  
$query2 = $db->query("SELECT COUNT(*) as adet FROM kredihareketleri WHERE kredihareketleri.krediid={$kredi}")->fetch(PDO::FETCH_ASSOC);
   if ($query2) {
      $adet=$query2["adet"];  
   }

$tarih2=explode(" ", $tarih);
$tarih3=explode("-", $tarih2[0]);
$timestamp = mktime(0, 0, 0, $tarih3[1],$tarih3[2],$tarih3[0]);

$aylik= $kreditutar/$vade;
    $faiz = $faiz/100;
$faizltut=$aylik*$faiz;
$taksittut=$aylik+$faizltut;
$kfon=$faizltut * 0.25;
$mfon=$faizltut* 0.05;



for ($i=1; $i <=$adet ; $i++) { 

  echo '<tr>
<td>'.$i.'</td>
<td>'.date('d.m.Y', $timestamp+60*60*24*30*$i).'</td>
<td>'.$taksittut.'</td>
<td>'.$aylik.'</td>
<td>'.$faizltut.'</td>
<td>'.$kfon.'</td>
<td>'.$mfon.'</td>
<td>Ödendi</td>
</tr>';
}
for (; $i <=$vade ; $i++) { 
  echo '<tr>
<td>'.$i.'</td>
<td>'.date('d.m.Y', $timestamp+60*60*24*30*$i).'</td>
<td>'.$taksittut.'</td>
<td>'.$aylik.'</td>
<td>'.$faizltut.'</td>
<td>'.$kfon.'</td>
<td>'.$mfon.'</td>
<td>Ödenecek</td>
</tr>';
}

 ?>


</tbody>
</table>
  
</body>
</html>