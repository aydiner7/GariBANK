<?php 

	include "../system/baglan.php";	

	$gtc=$_POST["tc"];

	$email=$_POST["email"];



	$query = $db->query("SELECT * FROM musteri WHERE tc = '{$gtc}' AND email = '{$email}' AND durum=1")->fetch(PDO::FETCH_ASSOC);

if ( $query ){

	    

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

			$mail->Subject = "Hesap Şifreniz"; // Email konu başlığı

			$mail->Body = '<table cellpadding="10" cellpadding="10" style="border-radius:20px 70px 20px 70px;text-shadow: 1px 1px 0px rgba(255,255,255,0.3);color:#fdca12;width: 100%; height: 100%; margin: 0;padding: 0; position: absolute;top: 0;left: 0;background-color: #a3a3a3">
							<tr>
								<td width="30"></td>
								<td colspan="3">Sayin : &nbsp;<b>'.$query["adi"]." ".$query["soyadi"]."</b><br><br>Şifreniz : &nbsp;<b>".$query["sifre"].'</b></td>
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

				echo "0";

			} else {



				echo "1";

			}	    

	}	

	else echo "0";

 ?>