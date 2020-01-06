<?php session_start();
	include '../system/baglan.php';
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fatura Ödeme</title>
<link href="system/fodeme.css" rel="stylesheet">
</head>
 <body>
 	<table id="tasarım">
 		<tr>
 			<td><div class="input"><input type="text" id="telinput" name="tel" placeholder="Telefon Numaranızı Giriniz "></div></td>
 			<td><button class="button" id="sorgulabtn">Sorgula </button> </td>
 		</tr>


 	</table>

 	<table id="tasarım1">
 		

 	</table>
 	<div class="select">
    <select id="hesapsec">
        <option value="0">--Ödeme Türü Seçiniz--</option>
        <?php 

					$query = $db->query("select * from `hesaplar`,`musteri` where `hesaplar`.`musteri_id` = `musteri`.`id` and `musteri`.`tc` = '".$_SESSION["tc"]."'", PDO::FETCH_ASSOC);
					if ( $query->rowCount() ){
					     foreach( $query as $row ){
					          echo '<option value="'.$row['iban'].'">'.$row['hesap_adi'].'</option>';
					     }
					}


				 ?>
    </select>
    <div class="select_arrow">
    </div>
    
    <div class="button1"><button1 class="button" id="faturaodebtn">Ödeme Yap </button1></div>
</div>




</body>
</html>

<script type="text/javascript">
		$(function(){
			$("#sorgulabtn").click(function(){
				var deger = $("#telinput").val();
				$("#tasarım1").html("");

				if(deger != "")
				{
					$.ajax({
						url:'php/fodeme.php',
						type:'POST',
						data:'tel='+deger,
						success:function(e){
							$("#tasarım1").html(e);
						},
						error:function(e){
							alert(e);
						}
					})
				}
			})


			$("#faturaodebtn").click(function(){
				var deger = $("#hesapsec").val();
				var id = $("#kod").attr("kod");
				var tutar = $("#tutar").html();

				if(deger != "0")
				{
					$.ajax({
						url:'php/fodemeyep.php',
						type:'POST',
						data:'hesap='+deger+"&id="+id+"&tutar="+tutar,
						success:function(e){
							alert(e)
						},
						error:function(e){
							alert(e);
						}
					})
				}
			})
		})
	</script>