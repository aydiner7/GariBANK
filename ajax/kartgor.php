<?php session_start();
	include '../system/baglan.php';

	
 ?>

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="system/kartgor.css">
</head>
<body>
<div id="ortaorta">
		
<?php 

	$query = $db->query("SELECT kc.resim, kc.baslik,k.kartNo,k.hesapKesim, k.faiz, h.hesapNum, k.iban, kh.tarih,k.limit, sum(kh.tutar) as tutar, m.tc FROM kartlar k, karthareketleri kh, hesaplar h,kartCesitleri kc, musteri m WHERE kc.id=k.kartCesit and m.tc = '".$_SESSION["tc"]."' AND h.musteri_id = m.id AND k.iban = h.iban AND IF(date_format(CURRENT_DATE,'%d')>k.hesapKesim,kh.tarih<CURRENT_DATE + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY and kh.tarih >= DATE_ADD( CURRENT_DATE, INTERVAL -1 MONTH) + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY,kh.tarih<DATE_ADD( CURRENT_DATE, INTERVAL -1 MONTH) + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY and kh.tarih >= DATE_ADD( CURRENT_DATE, INTERVAL -2 MONTH) + INTERVAL (k.hesapKesim - date_format(CURRENT_DATE,'%d')) DAY ) ", PDO::FETCH_ASSOC);
	if ( $query->rowCount() ){
	     foreach( $query as $row ){



	     	$kartno=$row["kartNo"];
			$kartlimit=$row["limit"];
			$musterino=$row["tc"];
			$iban=$row["iban"];
			$harcanantut=$row["tutar"] * -1;
			$hesapno=$row["hesapNum"];
			$hkesimtar=$row["hesapKesim"];
			$faiz=$row["faiz"];

			if(date("d")>$hkesimtar)
			{
				$hesap1=$hkesimtar-date('d');
				$hesap2=$hesap1+15;


				$hesapkes = date("d.m.Y",strtotime("$hesap1 day"));
				$sonodeme = date("d.m.Y",strtotime("$hesap2 day"));
				$hesapkes2 = date("d.m.Y",strtotime("$hesap1 day +1 MONTH"));

			}
			$harcanantut+= $harcanantut/100*$faiz;
			$kulllimit=$kartlimit-$harcanantut;
			$topnakavans=($kulllimit * (1/3));
			$topnakavans=number_format($topnakavans, 2, '.', '' );
			$asodetut=($harcanantut*(1/3));
			$asodetut=number_format($asodetut, 2, '.', '' );
	         echo '<div class="solkartpanel">
			<img class="kartresim" src="'.$row["resim"].'">
			<div class="kartbaslik">'.$row["baslik"].'</div>
			<div class="kartaciklama">
				<div class="tablo">
					<table>
						<tr>
							<td >Limit: '.$kartlimit.' ₺</td>
							<td> Hesap Kesim : '.$hesapkes.' </td>
						</tr>
						<tr>
							<td ></td>
							<td> Son Ödeme: '.$sonodeme.' </td>
							
						</tr>
					</table>

									
				</div>


			</div>				
			
			<div class="tablo2">
				<div class="tablo33">

				<table>
				<tr>
					<td class="omer">
						<div class="icbaslik">
							'.$harcanantut.' TL
						</div>
						<div class="icicerik">
							Kalan borç
						</div>
					</td>
					<td class="omer">
						<div class="icbaslik">
							'.($harcanantut/3).' TL
						</div>
						<div class="icicerik">
							Kalan Minimum Tutar
						</div>
					</td>
					
					
					<td class="omer2">
						<div class="icbaslik">
							'.($kartlimit - $harcanantut).' TL
						</div>
						<div class="icicerik">
							Kullanabilir Limit
						</div>
					</td>
					
					
					</tr>


					</table>
					</div>
					<div class="buton">
						<table>
							<tr>
								<td class="butonic"> Borç Öde </td>
								<td class="butonic">Kart Ekstresi </td>
								<td class="butonic">Limit Arttırma </td>
							</tr>

						</table>
					</div>

			</div>					

		</div>';
	     }
	}	




 ?>
		
		

	
</body>
			

</html>