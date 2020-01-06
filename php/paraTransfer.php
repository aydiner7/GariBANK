<?php session_start();
include "../system/baglan.php";

$tc=$_SESSION["tc"];

$adi=$_POST["adi"];
$soyadi = $_POST["soyadi"];
$iban = $_POST["iban"];
$tutar = $_POST["tutar"];
$hesap = $_POST["hesap"];


$sorgu = $db->query("SELECT * FROM hesaplar h, musteri m WHERE m.adi = '{$adi}' and m.soyadi = '{$soyadi}' and h.iban = '{$iban}'")->fetch(PDO::FETCH_ASSOC);

$sorgu2 = $db->query("SELECT * FROM hesaplar h, musteri m WHERE m.tc = '{$tc}' and h.iban= '{$hesap}'")->fetch(PDO::FETCH_ASSOC);


if ($sorgu2["tutar"] >= $tutar) {
	
if ( $sorgu ){
	$guncelle = $db->exec("UPDATE hesaplar SET tutar = tutar + {$tutar} WHERE iban = '{$iban}'");
	$guncelle2 = $db->exec("UPDATE hesaplar SET tutar = tutar - {$tutar} WHERE iban = '{$hesap}'");


	$sorgu3 = $db->query("SELECT * FROM hesaplar h, musteri m WHERE m.adi = '{$adi}' and m.soyadi = '{$soyadi}' and h.iban = '{$iban}'")->fetch(PDO::FETCH_ASSOC);
	$sorgu4 = $db->query("SELECT * FROM hesaplar h, musteri m WHERE m.tc = '{$tc}' and h.iban= '{$hesap}'")->fetch(PDO::FETCH_ASSOC);
	$hareket = $db->exec("insert into hesaphareketleri(iban,iban2,tutar,bakiye,bakiye2,aciklama) values ('{$hesap}','{$iban}','{$tutar}',".$sorgu4["tutar"].",".$sorgu3["tutar"].",'Para Transferi')");


	if($guncelle && $guncelle2 && $hareket)
	{
		echo ("1");


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

			$mail->AddAddress($sorgu["email"]); // Mailin gönderileceği alıcı adres

			$mail->Subject = "Para Transferi"; // Email konu başlığı

			$mail->Body = '<table cellpadding="10" cellpadding="10" style="border-radius:20px 70px 20px 70px;text-shadow: 1px 1px 0px rgba(255,255,255,0.3);color:#fdca12;width: 100%; height: 100%; margin: 0;padding: 0; position: absolute;top: 0;left: 0;background-color: #a3a3a3">
							<tr>
								<td width="30"></td>
								<td colspan="3">Sayin : &nbsp;<b>'.$sorgu["adi"]." ".$sorgu["soyadi"]."</b><br><br>Kullanıcımız : &nbsp;<b>".$sorgu2["adi"]." ".$sorgu2["soyadi"].'</b><br>Hesabınıza <b>'.$tutar.'₺</b> Göndermiştir.</td>
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

				echo "00";

			} else {



				//echo "11";

			}

	}
	else{
	echo ("3");	 //echo "transfer başarısız";
	}
}else echo ("0");	//echo("Lütfen Bilgilerini Kontrol Ediniz.");
		}
		else echo ("2")	//echo ("Hesabınızda yeterli bakiye yok.");

 ?>