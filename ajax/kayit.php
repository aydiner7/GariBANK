<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
	<script type="text/javascript" src="system/jquery.inputmask.js"></script>
	<script type="text/javascript">
		$("input[name=kayittelefon]").inputmask('(999) 999 99 99');
		$("input[name=kayitdtarih]").inputmask('9999-99-99');
		$("input[name=kayittc]").inputmask('99999999999');




	</script>

	<style>
input[type=text]{
    width: 100%;
    border:2px solid #aaa;
    border-radius:4px;
    margin:8px 0;
    outline:none;
    padding: 10px 0;
    box-sizing:border-box;
    transition:.3s;
    text-align: center;
    background-color: #5d5d5d;
    color: aliceblue;
    border-left-color: #5d5d5d;
    border-right-color: #5d5d5d;
    border-top-color: #5d5d5d;
    
  }
  
  input[type=text]:focus{
    border-color:lightgoldenrodyellow;
    box-shadow:0 0 8px 0 gold;
  }

.bilgi{
	margin-left: 15%;
	margin-bottom: 25px;
	font-size: 15px;
	
	font:bold 100% Arial, Helvetica, sans-serif;
	color: #d9d9d9;
	text-shadow: rgba(255,255,255,.1) -1px -1px 1px,rgba(0,0,0,.5) 1px 1px 1px;
}  

.textbox{
	margin-left: 15%;
	margin-right: 15%;
	margin-bottom: 15px;
}
input.onayla{
	top: 0;
	margin-left: 15%;
	margin-right: 15%;
	margin-bottom: 15px;
	width: 70%;
	background-color: #fdca12;
	border-radius:  15px;
	padding:5px 10px;
    text-decoration:none;
    color:#5d5d5d;
    font:bold 100% Verdana, Geneva, sans-serif;
    box-shadow: 3px 3px 4px #000;
    border:1px solid #5d5d5d;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);
    outline: none;
    cursor: pointer;

}
input.vazgec{
	
	margin-left: 15%;
	margin-right: 15%;
	width: 70%;
	background-color: #fdca12;
	border-radius:  15px;
	padding:5px 10px;
    text-decoration:none;
    color:#5d5d5d;
    font:bold 100% Verdana, Geneva, sans-serif;
    box-shadow: 3px 3px 4px #000;
    border:1px solid #5d5d5d;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);
    outline: none;
    cursor: pointer;
    margin-bottom: 15px;
}

#butonlar{
	position: relative;
}

input.onayla:hover, input.vazgec:hover {
	text-shadow: 0 0px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.75);
}

#anakatman{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: transparent;
}	


	
		

	</style>
		<script type="text/javascript">
			$(function(){
			$(".onayla").click(function(){

				var adi = $("input[name=kayitad]").val();
				var soyadi = $("input[name=kayitsoyad]").val();
				var tc = $("input[name=kayittc]").val();
				var annekizlik = $("input[name=annekizlik]").val();
				var anne = $("input[name=kayitanne]").val();
				var baba = $("input[name=kayitbaba]").val();
				var yer = $("input[name=kayityer]").val();
				var tarih = $("input[name=kayitdtarih]").val();
				var sehir = $("input[name=kayitsehir]").val();
				var adres = $("input[name=kayitadres]").val();
				var telefon = $("input[name=kayittelefon]").val();
				var gelir = $("input[name=gelir]").val();
				var mail = $("input[name=kayitmail]").val();
				


				$.ajax({

					url:'php/kayit.php',
					type: 'POST',
					data: 'kayitad='+adi+'&kayitsoyad='+soyadi+'&kayittc='+tc+'&annekizlik='+annekizlik+'&kayitanne='+anne+'&kayitbaba='+baba+'&kayityer='+yer+'&kayitdtarih='+tarih+'&kayitsehir='+sehir+'&kayitadres='+adres+'&kayittelefon='+telefon+'&gelir='+gelir+'&kayitmail='+mail,

                	dataType: 'json',
					success:function(e){
						if(e.durum == "0")
						{
								alert("Lütfen Bilgileri Doğru ve Eksiksik Giriniz.");
						}
						else if (e.durum == "1")
						{
							alert("Şimdiden, GariBANK Ailesine Hoşgeldiniz Diyebiliriz (:")
							var boyut = $(".elemanlar").height();
							$(".elemanlar").animate({
								height : "0",
								opacity : 0
							},500)
							$.ajax({
								url : 'ajax/login.php',
								success:function(e){
									setTimeout(function(){
										$(".elemanlar").html(e).animate({
										height : boyut+"px",
										opacity : 1
										},900)
									},900)
								},
								error:function(e){
									$(".elemanlar").html(e).animate({
										height : boyut+"px",
										opacity : 1
									},900)
								}
							})
						}
						else if(e.durum == "2")
						{
							alert("Geçersiz Email Girdiniz.");
						}
						else
						{
							alert("Sistemsel hata oluştu.");
						}
							
					},
					error:function(e){
						alert(e);
					}
						
						
					
						
				})

			})
		})
		$(function(){
			$(".vazgec").click(function(){
				var boyut = $(".elemanlar").height();
				$(".elemanlar").animate({
					height : "0",
					opacity : 0
				},500)
				$.ajax({
					url : 'ajax/login.php',
					success:function(e){
						setTimeout(function(){
							$(".elemanlar").html(e).animate({
							height : boyut+"px",
							opacity : 1
						},900)
						},900)
					},
					error:function(e){
						$(".elemanlar").html(e).animate({
							height : boyut+"px",
							opacity : 1
						},900)
					}
				})
			})
		})
	</script>
</head>
<body>
		<div id=anakatman>
			<div class="bilgi">Lütfen Bilgilerinizi Eksiksiz Giriniz.</div>
			<div id="textboxlar">
				<div class="textbox"><input type="text"  name="kayitad" placeholder="Adınız"></div>
				<div class="textbox"><input type="text" name="kayitsoyad" placeholder="Soyadınız"></div>
				<div class="textbox"><input type="text" name="kayittc" placeholder="TC Numarası"></div>
				<div class="textbox"><input type="text"  name="annekizlik" placeholder="Anne Kızlık Soyadınız"></div>
				<div class="textbox"><input type="text" name="kayitanne" placeholder="Anne Adı"></div>
				<div class="textbox"><input type="text" name="kayitbaba" placeholder="Baba Adı"></div>
				<div class="textbox"><input type="text" name="kayityer" placeholder="Doğum Yeriniz"></div>
				<div class="textbox"><input type="text" name="kayitdtarih" placeholder="Doğum Tarihiniz"></div>
				<div class="textbox"><input type="text" name="kayitsehir" placeholder="Yaşadığınız Şehir"></div>
				<div class="textbox"><input type="text" name="kayitadres" placeholder="Semt"></div>
				<div class="textbox"><input type="text" name="kayittelefon" placeholder="Telefon Numarası"></div>
				<div class="textbox"><input type="text" name="gelir" placeholder="Net Gelir"></div>

				<div class="textbox"><input type="text" name="kayitmail" placeholder="E-Mail Adresiniz"></div>
			</div>	

			<div id="butonlar">
			<div><input type="submit" class="onayla" value="Onayla" /> </div>
			<div><input type="submit" class="vazgec" value="Geri Dön" /> </div>
				


			</div>
		</div>

</body>
</html>