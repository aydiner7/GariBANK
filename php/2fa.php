 <?php 
 	error_reporting(0);
	include "../system/baglan.php";	
	$gtc=$_POST["tc"];
	$min = 100000;
	$max = 999999;		
	$sifre = mt_rand($min, $max);
	$sifreE = substr($sifre,0, 2)." ".substr($sifre,2, 2)." ".substr($sifre,4, 2);

	$query = $db->query("SELECT email FROM musteri WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);
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
			$mail->AddAddress($query["email"]); // Mailin gönderileceği alıcı adres
			$mail->Subject = "Onay Kodunuz"; // Email konu başlığı
			$mail->Body = '<table cellpadding="10" cellpadding="10" style="border-radius:10px 90px 10px 90px;text-shadow: 1px 1px 0px rgba(255,255,255,0.3);color:#fdca12;width: 100%; height: 100%; margin: 0;padding: 0; position: absolute;top: 0;left: 0;background-color: #a3a3a3">
							<tr>
								<td width="30"></td>
								<td colspan="3"><b>'.$sifreE.'</b><br><br>Lütfen Kodu Kimseyle Paylaşmayınız.</td>
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
				echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
			} else {

				echo $sifreE;
			}	    
	}	
	else echo "0";
 ?>
