<?php error_reporting(0);
include "../system/baglan.php";

$ad=$_POST["kayitad"];
$soyadi = $_POST["kayitsoyad"];
$tc = $_POST["kayittc"];
$annekizlik = $_POST["annekizlik"];
$anne = $_POST["kayitanne"];
$baba = $_POST["kayitbaba"];
$yer = $_POST["kayityer"];
$tarih = $_POST["kayitdtarih"];
$sehir = $_POST["kayitsehir"];
$adres = $_POST["kayitadres"];
$telefon = $_POST["kayittelefon"];
$gelir = $_POST["gelir"];
$email = $_POST["kayitmail"];
$min = 1111;
$max = 9999;
$sifre = mt_rand($min, $max);


	
if(empty($ad) || empty($soyadi) || empty($tc) || empty($annekizlik) || empty($anne) || empty($baba) || empty($yer) || empty($tarih) || empty($sehir) || empty($adres) || empty($telefon) || empty($gelir) || empty($email)) 
{
	$sonuc["durum"] = "0";
	header("Content-Type: application/json");
	echo json_encode($sonuc);
	exit();
}
$sorgu = $db->exec("insert into musteri(adi,soyadi,tc,dogumTarihi,anneKizlikSoyadi,email,anneAdi,babaAdi,dogumYeri,yasadigiYer,adres,telefon,netGelir,puan,durum,onay,sifre) values ('{$ad}','{$soyadi}','{$tc}','{$tarih}','{$annekizlik}','{$email}','{$anne}','{$baba}','{$yer}','{$sehir}','{$adres}','{$telefon}','{$gelir}',0,0,0,'{$sifre}')");



if ( $sorgu ){
    $last_id = $db->lastInsertId();

    require("../mail/class.phpmailer.php");

			$mail = new PHPMailer();

			$mail->IsSMTP();

			$mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir

			$mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli

			$mail->SMTPSecure = 'ssl'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın

			$mail->Host = "smtp.gmail.com"; // Mail sunucusunun adresi (IP de olabilir)

			$mail->Port = 465; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın

			$mail->IsHTML(true);

			$mail->SetLanguage("tr", "phpmailer/language");

			$mail->CharSet  ="utf-8";

			$mail->Username = "garibankinfo@gmail.com"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)

			$mail->Password = "srqzhhzhjhipzbug"; // Mail adresimizin sifresi

			$mail->SetFrom("garibankinfo@gmail.com", "GariBANK"); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)

			$mail->AddAddress($email); // Mailin gönderileceği alıcı adres

			$mail->Subject = "Bilgilendirme"; // Email konu başlığı

			$mail->Body = '<table cellpadding="10" cellpadding="10" style="border-radius:20px 70px 20px 70px;text-shadow: 1px 1px 0px rgba(255,255,255,0.3);color:#fdca12;width: 100%; height: 100%; margin: 0;padding: 0; position: absolute;top: 0;left: 0;background-color: #a3a3a3">
							<tr>
								<td width="30"></td>
								<td colspan="3">Sayin : <b>'.$ad." ".$soyadi.'</b><br><br>Bankamıza Başvurunuz Ulaşmıştır,<br>En Kısa Zamandan Dönüş Sağlayacağız.<br>İyi günler.<br><br>Geçici Şifreniz : <b>'.$sifre.'</b></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td width="50"><img src="http://garibank.site/images/logo.png"></td>
							</tr>
						</table>'; // Mailin içeriği

			if(!$mail->Send()){

				$sonuc["durum"] = "2";

			} else {



				$sonuc["durum"] = "1";

			}



    
}

header("Content-Type: application/json");
echo json_encode($sonuc);
 ?>