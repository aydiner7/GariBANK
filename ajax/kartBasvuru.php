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

		#karart{
			background: black;
			opacity: 0.4;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			display: none;
		}
		#kararticerik{
			display: none;
			position: absolute;
			top: 50%;
			left: 50%;
			width: 300px;
			height: 150px;
			border-radius: 30px;
			transform: translate(-50%,-50%);
			background-color: white;
		}
		#hesapekstrebilgi{
			position: absolute;
			top: 5px;
			left: 50%;
			transform: translate(-50%,0);
			width: 240px;
			background-color: #fdca12;
			padding: 10px;
			border-radius: 10px;
		}

		#karartIptal{
			position: absolute;
			top: 90px;
			padding: 10px;
			font-size: 12px;
			background: red;
			color: white;
			border-radius: 10px;
			cursor: pointer;
			text-align: center;
			left: 10px;
			width: 90px;
		}

		#karartDevam{
			position: absolute;
			top: 90px;
			padding: 10px;
			font-size: 12px;
			background: green;
			color: white;
			border-radius: 10px;
			cursor: pointer;
			text-align: center;
			right: 10px;
			width: 90px;
		}

		#hesapekstrebilgi select{
			padding: 8px;
			border:0;
			width: 200px;
			background-color: transparent;
			position: relative;
			top: -5px;
		}
		#hesapekstrebilgi img{
			position: relative;
			top: 5px;
		}

		@media only screen and (min-width:768px) and (max-width:959px){
			.solkartpanel{
				position: relative;
				margin: 10px;
				float: left;
				width: calc(50% - 22px);
				border: 1px solid #000;
				border-radius: 10px;
				height: 160px;
			}
			.sagkartpanel{
				position: relative;
				margin: 10px;
				float: right;
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
	<script type="text/javascript">
		$(function(){
			var kartid;
			$(".kartbasvur").click(function(){
				kartid = $(this).attr("kod");
				$("#karart").show(500);
				$("#kararticerik").show(500);
			})

			$("#karartIptal").click(function(){
				$("#kararticerik").hide(500);
				$("#karart").hide(500);
			})

			$("#karartDevam").click(function(){
				var deger = $("#hesapharekethesaplar").val();
				if(deger != 0)
				{

					$("#kararticerik").hide(500);
					$("#karart").hide(500);
					$.ajax({
						url : 'php/kartBasvur.php',
						type : 'POST',
						data : 'id='+kartid+"&iban="+deger,
						success:function(e){
							alert(e);
						},
						error:function(e){
							alert(e);
						}
					})

				}
			})
		})
	</script>
</head>
<body>
	<div id="ortaorta">

		<?php 

			$query = $db->query("select * from kartCesitleri where durum = 1", PDO::FETCH_ASSOC);
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
							<div class="kartbasvur" kod="'.$row["id"].'">Başvur</div>
						</div>';
			     }
			}
			else
				echo "<h1>Başvuru yapabileceğiniz kart bulunmuyor.Lütfen detaylı bilgi için bizimle iletişime geçin</h1>";


		 ?>
		
	</div>
	<div id="karart">
		
	</div>
	<div id="kararticerik">
		<div id="hesapekstrebilgi">
			<img src="images/hesaplar.png">
			<select id="hesapharekethesaplar">
				<option value="0" selected="true">Hesap Seçiniz</option>
				<?php 

					$query = $db->query("select * from hesaplar,musteri where hesaplar.musteri_id = musteri.id and musteri.tc = '".$_SESSION["tc"]."'", PDO::FETCH_ASSOC);
					if ( $query->rowCount() ){
					     foreach( $query as $row ){
					          echo '<option value="'.$row['iban'].'">'.$row['hesap_adi'].'</option>';
					     }
					}


				 ?>
			</select>
			<div id="karartIptal">İptal Et</div>
			<div id="karartDevam">Tamamla</div>
		</div>
	</div>
</body>
</html>