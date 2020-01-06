<?php session_start();
	include '../system/baglan.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#kredianabilgipanel{
			margin-top: 5px;
			margin-bottom: 5px;
			width: 100%;
		}
		.floatleft{
			float: left;
		}
		.floatright{
			float: right;
		}
		.kredianabilgi{
			padding: 20px;
			height: 20px;
			margin-top: 10px;
			background-color: gray;
			border-radius: 10px;
			color: #e3e3e3;
		}
		.detayBtn{
			padding: 15px;
			border-radius: 10px;
			cursor: pointer;
			background: #fdca12;
			color: #535353;
			transition: background-color 0.4s ease,
              color 0.4s linear;
		}
		.detayBtn:hover{
			background: #535353;
			color: #fdca12;
		}
	</style>
	<script type="text/javascript">
		$(function(){
			$(".detayBtn").click(function(){
				var deger = $(this).attr("kod");
				$("#degisenIcerik").hide(150);
				$.ajax({
					url : 'ajax/krediDetay.php',
					type : 'POST',
					data : 'id='+deger,
					success : function(e){
						$("#sayfaBaslik").html("Kredi Detay");
						$("#uzunYol").append(" -> Kredi Detay")
						$("#degisenIcerik").html(e).show(500);
					},
					error:function(e){
						$("#degisenIcerik").show(500);
					}
				})
				
			})
		})
	</script>
</head>
<body>
	<div id="ortaorta">
		<div id="kredianabilgipanel">

			<?php 

			$query = $db->query("SELECT `kredi`.`id`,`kredituru`.`ad` FROM `kredi`,`kredituru`,`musteri`,`hesaplar` WHERE musteri.tc = '".$_SESSION["tc"]."' and hesaplar.musteri_id = musteri.id AND kredi.iban = hesaplar.iban and kredi.durum = 1", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
			     foreach( $query as $row ){
			         
			          echo '<div class="kredianabilgi">
								<div class="floatleft">'.$row["ad"].'</div>
								<div class="floatright"><span kod='.$row["id"].' class="detayBtn">Kredi Detayları</span></div>
							</div>';
			     }
			}
			else
				echo "<h1>Aktif Bir Krediniz Bulunmamaktadır.</h1>";


		 ?>
			
			
		</div>
		
	</div>
</body>
</html>