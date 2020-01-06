<?php session_start(); 
if(empty($_SESSION["tc"])){

	header("Refresh: 0; url=http://garibank.site");
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>GariBank</title>
	<link rel="stylesheet" type="text/css" href="system/ana.css">
	<link rel="shortcut icon" href="http://www.garibank.site/favicon.ico" type="image/x-icon" />
	<script type="text/javascript" src="system/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="system/ana.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta charset="utf-8">
</head>
<body>
	<?php 
	include "system/baglan.php";	
	$gtc=$_SESSION["tc"];
	$kampanyalar = true;
	$bildirim = true;
	$query = $db->query("SELECT * FROM musteri WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		$sorgu = $db->query("SELECT * FROM ayarlar WHERE musteri_id=".$query["id"])->fetch(PDO::FETCH_ASSOC);
		if ($sorgu) {
			$kampanyalar = $sorgu["kampanya"];
			$bildirim = $sorgu["bildirim"];
		}
		$ad = $query["adi"];
		$soyad = $query["soyadi"];

	}
	

 	?>
	<div id="ana">
		<div id="menu">
			<img id="geriBtn" src="images/geri.png">
			<div id="logoPanel">
				<img id="logoResim" src="images/logo.png">
				<img id="logoIsim" src="images/garibank.png">
			</div>
			<div id="kisiPanel">
				<img id="kisiResim" src="images/user.png">
				<span id="kisiIsim"><?php echo $ad ."   ".  $soyad; ?></span>
				<span id="btnCikis">Çıkış Yap</span>
			</div>
			<div id="menuPanel">
				<ul>
					<li class="menuler menulink" kod="anasayfa">
						<div>
							<img src="images/anasayfa.png">
							<span>Anasayfa</span>
						</div>
					</li>
					<li class="menuler">
						<div>
							<img src="images/anasayfa.png">
							<span>Hesaplar</span>
						</div>
						<ul>
							<li class="menulink" kod="hesaplarim">
								<div>
									<img src="images/anasayfa.png">
									<span>Hesaplarım</span>
								</div>
								
							</li>
							<li class="menulink" kod="hesapac">
								<div>
									<img src="images/anasayfa.png">
									<span>Hesap Aç</span>
								</div>
								
							</li>
							<li class="menulink" kod="hesapduzenle">
								<div>
									<img src="images/anasayfa.png">
									<span>Hesap Düzenleme</span>
								</div>
								
							</li>
							<li class="menulink" kod="hesaphareket">
								<div>
									<img src="images/anasayfa.png">
									<span>Hesap Hareketleri</span>
								</div>
								
							</li>
							<li class="menulink" kod="paratransfer">
								<div>
									<img src="images/anasayfa.png">
									<span>Para Transfer</span>
								</div>
								
							</li>
						</ul>
					</li>
					<li class="menuler">
						<div>
							<img src="images/anasayfa.png">
							<span>Kartlar</span>
						</div>
						<ul>
							<li class="menulink" kod="kartlarim">
								<div>
									<img src="images/anasayfa.png">
									<span>Kartlarım</span>
								</div>
								
							</li>
							<li class="menulink" kod="kartekstre">
								<div>
									<img src="images/anasayfa.png">
									<span>Kart Ekstresi</span>
								</div>
								
							</li>
							<li class="menulink" kod="kredikartbasvuru">
								<div>
									<img src="images/anasayfa.png">
									<span>Kredi Kart Başvurusu</span>
								</div>
								
							</li>
						</ul>
					</li>
					<li class="menuler">
						<div>
							<img src="images/anasayfa.png">
							<span>Krediler</span>
						</div>
						<ul>
							<li class="menulink" kod="kredilerim">
								<div>
									<img src="images/anasayfa.png">
									<span>Kredilerim</span>
								</div>
								
							</li>
							<li class="menulink" kod="kredibasvuru">
								<div>
									<img src="images/anasayfa.png">
									<span>Kredi Başvurusu</span>
								</div>
								
							</li>
							<li class="menulink" kod="krediodeme">
								<div>
									<img src="images/anasayfa.png">
									<span>Kredi Ödeme</span>
								</div>
								
							</li>
						</ul>
					</li>
					<li class="menuler menulink" kod="altinhesap">
						<div>
							<img src="images/anasayfa.png">
							<span>Altın Hesap</span>
						</div>
					</li>
					<li class="menuler">
						<div>
							<img src="images/anasayfa.png">
							<span>Döviz İşlemleri</span>
						</div>
						<ul>
							<li class="menulink" kod="anlikdoviz">
								<div>
									<img src="images/anasayfa.png">
									<span>Döviz Bilgileri</span>
								</div>
								
							</li>
							<li class="menulink" kod="dovizislem">
								<div>
									<img src="images/anasayfa.png">
									<span>Döviz Alım Satım</span>
								</div>
								
							</li>
							
						</ul>
					</li>
					<li class="menuler menulink" kod="faturaode">
						<div>
							<img src="images/anasayfa.png">
							<span>Fatura Ödeme</span>
						</div>
					</li>
					<?php 
						if ($kampanyalar) {
							echo '<li class="menuler menulink" kod="kampanyalar">
									<div>
										<img src="images/anasayfa.png">
										<span>Kampanyalar</span>
									</div>
								</li>';
						}
					 ?>
					
					<li class="menuler menulink" kod="ayarlar">
						<div>
							<img src="images/anasayfa.png">
							<span>Ayarlar</span>
						</div>
					</li>
					<li class="menuler menulink" kod="iletisim">
						<div>
							<img src="images/anasayfa.png">
							<span>İletişim</span>
						</div>
					</li>
				</ul>

				
			</div>
			<div id="footer">
				Copyright © 2019 Tüm Hakları Saklıdır.   
		    </div>
		</div>
		<div id="icerik">
			<div id="baslik">
				<img id="hanburgerMenu" src="images/menu.png">
				<span id="sayfaBaslik">Anasayfa</span>
				<?php 
					if ($bildirim) {
						echo '<img id="bildirimBtn" src="images/bildirim.png">
							<div id="bildirimpanel">'; include "ajax/bildirim.php"; echo '</div>
					';
					}
					//<div id="bildirimSayi">1</div>
				 ?>
				
				
				<div id="uzunYol"></div>
			</div>
			<div id="degisenIcerik">
				<?php include "ajax/anasayfa.php"; ?>
			</div>
			
		</div>
	</div>
</body>
</html>