<?php session_start(); 
	include '../system/baglan.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.solkartpanel{
			position: relative;
			margin: 10px;
			float: left;
			width: calc(50% - 22px);
			border: 1px solid #000;
			border-radius: 10px;
			height: 140px;
		}
		.sagkartpanel{
			position: relative;
			margin: 10px;
			float: right;
			width: calc(50% - 22px);
			border: 1px solid #000;
			border-radius: 10px;
			height: 140px;
		}
		.kartresim{
			position: absolute;
			top: 25px;
			left: 15px;
			width: 115px;
			height: 90px;

		}
		.kartbaslik{
			position: absolute;
			top: 25px;
			font-size: 20px;
			font-weight: bold;
			left: 145px;
			width: calc(100% - 160px);
		}
		.kartaciklama{
			position: absolute;
			top: 50px;
			font-size: 14px;
			left: 145px;
			width: calc(100% - 160px);
		}
		.kartbasvur{
			position: absolute;
			top: 100px;
			font-size: 15px;
			left: 145px;
			width: calc(100% - 160px);
			color: #fdca12;
			cursor: pointer;
		}

		@media only screen and (min-width:768px) and (max-width:959px){
			.solkartpanel{
				position: relative;
				margin: 10px;
				width: calc(50% - 22px);
				border: 1px solid #000;
				border-radius: 10px;
				height: 160px;
			}
			.sagkartpanel{
				position: relative;
				margin: 10px;
				width: calc(50% - 22px);
				border: 1px solid #000;
				border-radius: 10px;
				height: 160px;
			}
			.kartresim{
				position: absolute;
				top: 15px;
				left: 15px;
				width: 115px;
				height: 90px;

			}
			.kartbaslik{
				position: absolute;
				top: 25px;
				font-size: 16px;
				font-weight: bold;
				left: 145px;
				width: calc(100% - 160px);
			}
			.kartaciklama{
				position: absolute;
				top: 110px;
				font-size: 12px;
				left: 15px;
				width: calc(100% - 30px);
			}
			.kartbasvur{
				position: absolute;
				top: 65px;
				font-size: 15px;
				left: 145px;
				width: calc(100% - 160px);
				color: #fdca12;
				cursor: pointer;
			}
		}

		@media only screen and (max-width:767px){
			.solkartpanel{
				position: relative;
				margin: 10px;
				width: calc(100% - 22px);
				border: 1px solid #000;
				border-radius: 10px;
				height: 160px;
			}
			.sagkartpanel{
				position: relative;
				margin: 10px;
				width: calc(100% - 22px);
				border: 1px solid #000;
				border-radius: 10px;
				height: 160px;
			}
			.kartresim{
				position: absolute;
				top: 15px;
				left: 15px;
				width: 115px;
				height: 90px;

			}
			.kartbaslik{
				position: absolute;
				top: 25px;
				font-size: 16px;
				font-weight: bold;
				left: 145px;
				width: calc(100% - 160px);
			}
			.kartaciklama{
				position: absolute;
				top: 110px;
				font-size: 12px;
				left: 15px;
				width: calc(100% - 30px);
			}
			.kartbasvur{
				position: absolute;
				top: 65px;
				font-size: 15px;
				left: 145px;
				width: calc(100% - 160px);
				color: #fdca12;
				cursor: pointer;
			}
		}
	</style>
</head>
<body>
	<div id="ortaorta">
		<?php 

			$query = $db->query("select * from kampanyalar where durum = 1", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				$kartSayisi = 0;
			     foreach( $query as $row ){
			          $kartSayisi++;
			          if($kartSayisi%2==1)
			          	echo '<div class="solkartpanel">';
			          else
			          	echo '<div class="sagkartpanel">';
			          echo '<img class="kartresim" src="'.$row["resim"].'">
							<div class="kartbaslik">'.$row["baslik"].'</div>
							<div class="kartaciklama">'.$row["aciklama"].'</div>
						</div>';
			     }
			}
			else
				echo "<h1>Şuan Aktif Bir Kampanya Bulunmuyor.Takipte Kalın...</h1>";


		 ?>

	</div>
</body>
</html>