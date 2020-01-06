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
$aylik= "";
$faizltut="";
$taksittut="";
$kfon="";
$mfon="";

function cevir($number)
{
	return number_format((float)$number, 2, '.', '');
}

$query = $db->query("SELECT k.id, kt.ad, h.subeKodu, h.hesapNum, k.iban, k.tutar, k.faiz,k.vade, k.tarih
FROM kredi k, kredituru kt, hesaplar h, musteri m
WHERE m.tc = '".$_SESSION["tc"]."'AND h.musteri_id = m.id AND k.krediTuruid = kt.id AND k.iban = h.iban")->fetch(PDO::FETCH_ASSOC);
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
      
       $tarih2=explode(" ", $tarih);
		$tarih3=explode("-", $tarih2[0]);
		$timestamp = mktime(0, 0, 0, $tarih3[1],$tarih3[2],$tarih3[0]);

		$aylik= $kreditutar/$vade;
		$faiz = $faiz/100;
		$faizltut=$aylik*$faiz;
		$taksittut=$aylik+$faizltut;
		$kfon=$faizltut * 0.25;
		$mfon=$faizltut* 0.05;
		$Efektiffaiz = $vade / ($faiz*100);
		$toplamfaiz = intval($faizltut) * $vade;
		$kalantutar = $kreditutar + $toplamfaiz;
}
else {
    echo "aktif bir kredin yok.";
  exit;
}
  



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#kredianabilgipanel{
			margin-top: 5px;
			margin-bottom: 5px;
			width: 100%;
		}
		.floatleft{
			float: left;
		}
		.floatright{
			float: right;
		}
		.kredianabilgi{
			padding: 20px;
			height: 20px;
			background: gray;
			border-radius: 3px;
			color: #e3e3e3;
		}
		#kredianadetay{
			color: #e3e3e3;
		}
		#kredianadetay table tr th{
			text-align: center;
			padding: 10px;
		}
		#kredianadetay table tr td{
			text-align: center;
			padding: 20px 10px;
		}
		.sutun4,.sutun5,.sutun6{
			display: all;
		}

		@media only screen and (max-width:767px){
			.sutun4,.sutun5,.sutun6{
				display: none;
			}
		}
	</style>
</head>
<body>
	<div id="ortaorta">
		<div id="kredianabilgipanel">
			<div class="kredianabilgi">
				<div class="floatleft">Anapara</div>
				<div class="floatright"><?php echo cevir($kreditutar); ?> ₺</div>
			</div>
			<div class="kredianabilgi">
				<div class="floatleft">Toplam Ödenecek Faiz</div>
				<div class="floatright"><?php echo cevir($toplamfaiz); ?> ₺</div>
			</div>
			<div class="kredianabilgi">
				<div class="floatleft">Kredi Tahsis Ücreti</div>
				<div class="floatright"><?php echo cevir($toplamfaiz * 0.25); ?> ₺</div>
			</div>
			<div class="kredianabilgi">
				<div class="floatleft">Vergiler</div>
				<div class="floatright"><?php echo cevir($toplamfaiz * 0.18); ?> ₺</div>
			</div>
			<div class="kredianabilgi">
				<div class="floatleft">Hayat Sigortası</div>
				<div class="floatright"><?php echo cevir($toplamfaiz * 0.35); ?> ₺</div>
			</div>
			<div class="kredianabilgi">
				<div class="floatleft">Efektif Yıllık Faiz Oranı</div>
				<div class="floatright">%<?php echo cevir($Efektiffaiz); ?></div>
			</div>
		</div>
		<div id="kredianadetay">
			<table style="width: 100%;padding: 0; border-radius: 10px; margin-top: 20px;" cellpadding="0" cellspacing="0" >
				<tr style="background: blue; color: white;font-size: 14px;">
					<th class="sutun1">Tarih</th>
					<th class="sutun2">Taksit</th>
					<th class="sutun3">Anapara</th>
					<th class="sutun4">Faiz</th>
					<th class="sutun5">KKDF</th>
					<th class="sutun6">BSMV</th>
					<th class="sutun7">Kalan Anapara</th>
				</tr>
				<?php 
					for ($i = 1; $i <=$vade ; $i++) { 
						$kalantutar -= $taksittut; 
						  echo '<tr style="background: #e3e3e3; color: black">
								<td class="sutun1">'.date('d.m.Y', $timestamp+60*60*24*30*$i).'</td>
								<td class="sutun2">'.cevir($taksittut).'</td>
								<td class="sutun3">'.cevir($aylik).'</td>
								<td class="sutun4">'.cevir($faizltut).'</td>
								<td class="sutun5">'.cevir($kfon).'</td>
								<td class="sutun6">'.cevir($mfon).'</td>
								<td class="sutun7">'.cevir($kalantutar).'</td>
							</tr>';
					}

				 ?>
				
				
			</table>
		</div>
	</div>
</body>
</html>