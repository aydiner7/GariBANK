<!DOCTYPE html>
<html>
<head>
	<title>
		Bilgiler
	</title>

	<link rel="stylesheet" type="text/css" href="system/bilgi.css">
	<script type="text/javascript">
	$(function(){
		$(".btn").click(function(){
			var egitim = $("input[name=egitim]").val();
			var calismasekli = $("input[name=calismasekli]").val();
			var aylikgelir = $("input[name=aylikgelir]").val();
			var mesleksec = $("input[list=mesleksec]").val();
			

			$("#degisenIcerik").hide(150);
			setTimeout(function(){
				$.ajax({
					url : 'ajax/onay.php',
					type:'POST',
					data:'miktar='+<?php echo $_POST["miktar"]; ?>+'&ay='+<?php echo $_POST["ay"]; ?>+'&egitim='+egitim+'&calismasekli='+calismasekli+'&aylikgelir='+aylikgelir+'&mesleksec='+mesleksec,
					success : function(e){
						$("#sayfaBaslik").html("Kredi Detay");
						$("#uzunYol").append(" -> Kredi Detay")
						$("#degisenIcerik").html(e).show(500);
					},
					error:function(e){
						alert(e);
						$("#degisenIcerik").show(500);
					}
				})
			},150)
				
		})
	})
</script>
</head>
<body>
	<div id="orta">

			<div class="wrapper">
		<div class="contact-form">
			



			<div class="input-fields">
                <div class="title">Kredi Başvuru</div>
					<div class="items">



							<label for="egitim" class="label">Eğitim Durumu</label>
						<input id="egitim" name="egitim" type="text" class="input">
					</div>
					<div class="items">
						<label for="calismasekli" class="label">Calisma Sekli</label>
						<input id="calismasekli" name="calismasekli" type="text" class="input">
					</div>

					<div class="items">
						<label for="aylikgelir" class="label">Aylık Gelir</label>
						<input id="aylikgelir"  name="aylikgelir" type="text" class="input">
					</div>
					
						<div class="items">
						<label for="meslek" class="label">Mesleğiniz</label>
						<input list="mesleksec" type="text" class="input">
						<datalist id="mesleksec" name="mesleksec">
							<option value="Öğretmen"></option>
							<option value="Mühendis"></option>
							<option value="Tekniker"></option>
							<option value="Polis"></option>
							<option value="Avukat"></option>
					</div>
					</div>
			</div>
			
				
			<div class="btn">Devam</div>
		</div>
</div>	
			</div>
</body>
</html>