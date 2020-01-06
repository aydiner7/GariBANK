<?php session_start();
	include '../system/baglan.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
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
		#hesapdetayicerik{
			position: absolute;
			top: 80px;
			width: 100%;
		}
		#hesapekstrebaslik{
			position: absolute;
			top: 0px;
			left: 10px;
			width: calc(100% - 60px);
			padding: 20px;
			background-color: #e3e3e3;
			border-radius: 20px 20px 0 0;
		}
		#hesapekstrebilgiler{
			position: absolute;
			top: 40px;
			left: 10px;
			width: calc(100% - 20px);
			height: auto;
			background-color: #e3e3ff;
			overflow: auto;
		}

		.hesapekstrebilgi{
			height: 40px;
			position: relative;
		}

		.ekstrebaslik1{
			position: absolute;
			top: 13px;
			left: 10px;
			width: calc(100% - 390px);
			font-size: 14px;
			color:gray;
			text-align: center;
		}
		.ekstrebaslik2{
			position: absolute;
			top: 13px;
			left: calc(100% - 370px);
			width: 130px;
			font-size: 14px;
			color:gray;
			text-align: center;
		}
		.ekstrebaslik3{
			position: absolute;
			top: 13px;
			left: calc(100% - 250px);
			width: 120px;
			font-size: 14px;
			color:gray;
			text-align: center;
		}
		.ekstrebaslik4{
			position: absolute;
			top: 13px;
			left: calc(100% - 130px);
			width: 120px;
			font-size: 14px;
			color:gray;
			text-align: center;
		}
		.ekstrebilgi1{
			position: absolute;
			top: 13px;
			left: 10px;
			width: calc(100% - 380px);
			font-size: 14px;
			color:gray;
			text-align: left;
		}
		.ekstrebilgi2{
			position: absolute;
			top: 13px;
			left: calc(100% - 370px);
			width: 120px;
			font-size: 14px;
			color:gray;
			text-align: center;
		}
		.ekstrebilgi3{
			position: absolute;
			top: 13px;
			left: calc(100% - 250px);
			width: 120px;
			font-size: 14px;
			color:gray;
			text-align: center;
		}
		.ekstrebilgi4{
			position: absolute;
			top: 13px;
			left: calc(100% - 130px);
			width: 120px;
			font-size: 14px;
			color:gray;
			text-align: center;
		}


		@media only screen and (min-width:768px) and (max-width:959px){
			#hesapekstrebaslik{
				position: absolute;
				top: 0px;
				left: 10px;
				width: calc(100% - 60px);
				padding: 20px;
				background-color: #e3e3e3;
				border-radius: 20px 20px 0 0;
			}
			#hesapekstrebilgiler{
				position: absolute;
				top: 40px;
				left: 10px;
				width: calc(100% - 20px);
				height: auto;
				background-color: #e3e3ff;
				overflow: auto;
			}

			.hesapekstrebilgi{
				height: 40px;
				position: relative;
			}

			.ekstrebaslik1{
				position: absolute;
				top: 13px;
				left: 10px;
				width: calc(100% - 290px);
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebaslik2{
				position: absolute;
				top: 13px;
				left: calc(100% - 270px);
				width: 130px;
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebaslik3{
				position: absolute;
				top: 13px;
				left: calc(100% - 150px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebaslik4{
				position: absolute;
				top: 13px;
				left: calc(100% - 130px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
				display: none;
			}
			.ekstrebilgi1{
				position: absolute;
				top: 13px;
				left: 10px;
				width: calc(100% - 280px);
				font-size: 14px;
				color:gray;
				text-align: left;
			}
			.ekstrebilgi2{
				position: absolute;
				top: 13px;
				left: calc(100% - 270px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebilgi3{
				position: absolute;
				top: 13px;
				left: calc(100% - 150px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebilgi4{
				position: absolute;
				top: 13px;
				left: calc(100% - 130px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
				display: none;
			}
		}

		@media only screen and (max-width:767px){
			#hesapekstrebaslik{
				position: absolute;
				top: 0px;
				left: 10px;
				width: calc(100% - 60px);
				padding: 20px;
				background-color: #e3e3e3;
				border-radius: 20px 20px 0 0;
				display: none;
			}
			#hesapekstrebilgiler{
				position: absolute;
				top: 40px;
				left: 10px;
				width: calc(100% - 20px);
				height: auto;
				background-color: #e3e3ff;
				overflow: auto;
			}

			.hesapekstrebilgi{
				height: 80px;
				position: relative;
				border-bottom: 1px solid #fdca12;
			}

			
			.ekstrebilgi1{
				position: absolute;
				top: 50px;
				left: 10px;
				width: calc(100% - 20px);
				font-size: 14px;
				color:gray;
				text-align: left;
			}
			.ekstrebilgi2{
				position: absolute;
				top: 15px;
				left: calc(25% - 60px);
				width: 130px;
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebilgi3{
				position: absolute;
				top: 15px;
				left: calc(75% - 60px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
			}
			.ekstrebilgi4{
				position: absolute;
				top: 13px;
				left: calc(100% - 130px);
				width: 120px;
				font-size: 14px;
				color:gray;
				text-align: center;
				display: none;
			}
		}
	</style>
	<script type="text/javascript">
		$(function(){
			$("#hesapharekethesaplar").change(function(){
				var deger = $(this).val();
				$("#hesapdetayicerik").html("");

				if(deger != "0")
				{
					$.ajax({
						url:'php/hesapHareket.php',
						type:'POST',
						data:'iban='+deger,
						success:function(e){
							$("#hesapdetayicerik").html(e);
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

		</div>
		<div id="hesapdetayicerik">
			
		</div>
	</div>
</body>
</html>