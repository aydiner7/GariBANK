<?php 
session_start();
include "../system/baglan.php";

$iban= "";
$musteritc= "";
$subekod= "";
$hesapno= "";
$tutar="";
$hesap_adi="";
$faiz="";
$tarih="";
$durum="";
$tur="";

$query = $db->query("SELECT h.iban,h.hesap_adi, h.tur, m.tc , h.subeKodu, h.hesapNum, h.tutar, h.hesap_adi, h.faiz, h.tarih, h.durum, h.tur FROM hesaplar h, musteri m WHERE m.id=h.musteri_id AND m.tc='".$_SESSION["tc"]."'")->fetch(PDO::FETCH_ASSOC);

if ( $query ){
    $iban=$query["iban"];
     $musteritc=$query["tc"];
      $subekod=$query["subeKodu"];
       $hesapno=$query["hesapNum"];
       $tutar= $query["tutar"];
       $hesap_adi=$query["hesap_adi"];
       $faiz=$query["faiz"];
       $tarih= $query["tarih"];
       $durum=$query["durum"];
       $tur=$query["tur"];
      $mid= $iban;

}



 ?>
 
<script type="text/javascript">
	$(function(){
			$(".buton").click(function(){

				var hesapadi = $("input[name=hesap_adi]").val();
				var turu = $("input[name=tur]").val();
				var mid = $("input[name=mid]").val();

		

				$.ajax({

					url:'php/hduzanle.php',
					type: 'POST',
					data: 'hesap_adi='+hesapadi+'&tur='+turu+"&mid="+mid,

					success:function(e){
						alert(e);
					},
					error:function(e){
						alert(e);
					}
				})

			})
			
		})

</script>







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Hesap Düzenle</title>
	<link href="system/hduzenle.css" rel="stylesheet">

</head>
<body>
	<table class="tablo">
<tbody>
<tr>
<td>IBAN:</td><td><input class="textbox"type="text" value=" <?php echo $iban; ?>"  disabled></td></tr>
<tr>
<td>Müşteri No:</td><td><input class="textbox"type="text" value="<?php echo $musteritc; ?>"  disabled></td></tr>
<tr>
<tr>
	
<tr>
	<td>Sube Kodu : </td>
	<td><input class="textbox"type="text" value="<?php echo $subekod; ?>"  disabled></td>
</tr>
<tr>
	<td>Hesap No: </td>
	<td><input class="textbox"type="text" value="<?php echo $hesapno; ?>"  disabled></td>
</tr>
<td>Tutar: </td><td><input class="textbox"type="text" value="<?php echo $tutar; ?>"  disabled></td></tr>
<tr>
<td>Hesap Adı:</td><td><input class="textbox1"type="text" name="hesap_adi" value="<?php echo $hesap_adi; ?>"></td></tr>
<tr>
<td>Faiz:</td><td><input class="textbox"type="text" value="<?php echo $faiz; ?>"  disabled></td></tr>
<tr>
<td>Tarih:</td><td><input class="textbox"type="text" value="<?php echo $tarih; ?>"  disabled></td></tr>
<tr>
<td>Durum:</td><td><input class="textbox"type="text" value="<?php echo $durum; ?>"  disabled></td></tr>
<tr>
<td>Türü:</td><td><input class="textbox1"type="text" name="tur"value="<?php echo $tur; ?>"  ></td>
</tr>

</tbody>
</tr>
</table>
<input type="hidden" name="mid" value="<?php echo $mid; ?>">
<input type="submit" class="buton" value="Onayla" /> 	
</body>
</html>
	
	
	
