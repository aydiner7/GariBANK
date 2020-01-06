<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="system/jquery.animate-colors.js"></script>
	<style> 
.border{
	position: absolute;
    width: 70%;
    height: 90px;
    left: 15%;
    background-color: transparent;
}	
#ortam{
	position: absolute;
	top: -30px;
	width: 100%;
	height: calc(100% + 30px);
	background-color: #DCDCDC;
}	
#buton1{
position: absolute;
left: 0;
font-family: "Arial Black", Gadget, sans-serif;
font-variant: small-caps;
color: transparent;
background: #666666;
-webkit-background-clip: text;
-moz-background-clip: text;
background-clip: text;
text-shadow: 0px 3px 3px rgba(255,255,255,0.5);
}
#buton2{
position: absolute;
left: 50%;
font-family: "Arial Black", Gadget, sans-serif;
font-variant: small-caps;
color: transparent;
background: #666666;
-webkit-background-clip: text;
-moz-background-clip: text;
background-clip: text;
text-shadow: 0px 3px 3px rgba(255,255,255,0.5);
}
.hOlustur, .hOlusturV {
	border: 5px outset rgba(28,110,164,0.48);
	border-radius: 18px;
	width: 30%;
	font-size: 21px;
	height: 40px;
	position: relative;
	left: 35%;
	cursor: pointer;
	font-family: "Arial Black", Gadget, sans-serif;
	outline: none;
	box-shadow: 3px 3px 4px #000;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);
    margin-top: 70px;
}
input.hOlustur:hover, input.hOlusturV:hover{
	text-shadow: 0 0px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.75);
}
#tabcizgi{
	position: absolute;
	bottom: 0;
	height: 2px;
	background-color: #535353;
	width: 50%;
	left: 0;
}
.tab
{
	width: 50%;
	font-size: 25px;
	padding: 32px 0;
	text-align: center;
	cursor: pointer;
}
#tabdiv{
	position: absolute;
    width: 70%;
    height: calc(100% - 95px);
    overflow: hidden;
    left: 15%;
    top: 90px;
}
#tabdivic{
	position: absolute;
	top: 0;
	left: -100%;
	height: 100%;
	width: 200%;
}
#tabdivic .tabdivic2{
	float: left;
	width: 50%;
	padding-bottom: 20px;
	height: calc(100% - 40px);
	overflow: auto;
}

.diskatman{
	position: relative;
	left: 15%;
	width: 70%;
	height: 70px;
	top: 50px;
}
.kisit{
	font-size: 15px;
	color: grey;
	position: absolute;
	right: 14px;
	bottom: 0;
	display: none;
	

}
.inputBorder{
	background-color: #f5f5f5;
	height: 50px;
	width: 100%;
	position: absolute;
	top: 0;
	left: 0;
	border-bottom: 2px solid #535353;
	border-radius: 5px;
}
.inputBorder span{
	position: absolute;
	top: 15px;
	font-size: 20px;
	left: 10px;
	color: #535353;

}
.inputBorder input{
	position: absolute;
	top: 25px;
	font-size: 16px;
	left: 10px;
	outline: none;
	border: 0;
	background-color: transparent;
	width: calc(100% - 52px);
}
.inputBorder img
{
	position: absolute;
	right: 5px;
	top: 9px;
	display: none;
}

@media only screen and (min-width: 768px) and (max-width: 959px)
{
   #tabdiv{
		position: absolute;
	    width: 100%;
	    height: calc(100% - 95px);
	    overflow: hidden;
	    left: 0;
	    top: 90px;
	}
	.border{
		position: absolute;
	    width: 100%;
	    height: 90px;
	    left: 0;
	    background-color: transparent;
	}	
          
}

@media only screen and (max-width: 767px) 
{
    #tabdiv{
		position: absolute;
	    width: 100%;
	    height: calc(100% - 95px);
	    overflow: hidden;
	    left: 0;
	    top: 90px;
	}
	.border{
		position: absolute;
	    width: 100%;
	    height: 90px;
	    left: 0;
	    background-color: transparent;
	}  
	.diskatman{
		position: relative;
		left: 5%;
		width: 90%;
		height: 70px;
		top: 50px;
	}
	.inputBorder input{
		position: absolute;
		top: 25px;
		font-size: 13px;
		left: 2px;
		outline: none;
		border: 0;
		background-color: transparent;
		width: calc(100% - 4px);
	}
}

	</style>

<script type="text/javascript">
	$(function(){
			$(".hOlustur").click(function(){

				var iban = $("input[name=iban]").attr("placeholder");
				var sehir = $("input[name=sehir]").attr("placeholder");
				var sube = $("input[name=sube]").attr("placeholder");
				var hesapN = $("input[name=hesapN]").attr("placeholder");
				var hesapA = $("input[name=hesapA]").val();
				
				//alert(iban+sehir+sube+hesapN+hesapA);

				$.ajax({

					dataType: 'json',
					url:'php/hesapOlustur.php',
					type: 'POST',
					data: 'iban='+iban+'&sehir='+sehir+'&sube='+sube+'&hesapN='+hesapN+'&hesapA='+hesapA,

					success:function(e){
						if(e == 0){
						alert("Hesap Açma İsteğiniz Tamamlanmıştır.");
						location.reload();}
						else if(e == 1){
						alert("Geçersiz Hesap Adı.");
						
					}
					},
					error:function(e){
						alert(e);
					}
				})

			})
			
		})
	$(function(){	
			$(".hOlusturV").click(function(){

				var iban = $("input[name=iban]").attr("placeholder");
				var sehir = $("input[name=sehir]").attr("placeholder");
				var sube = $("input[name=sube]").attr("placeholder");
				var hesapN = $("input[name=hesapN]").attr("placeholder");
				var hesapAa = $("input[name=hesapAa]").val();
				
				//alert(iban+sehir+sube+hesapN+hesapAa);

				$.ajax({

					//dataType: 'json',
					url:'php/hesapOlusturVade.php',
					type: 'POST',
					data: 'iban='+iban+'&sehir='+sehir+'&sube='+sube+'&hesapN='+hesapN+'&hesapAa='+hesapAa,

					success:function(e){
						if(e == 3){
						alert("Hesap Açma İsteğiniz Tamamlanmıştır.");
						location.reload();}
						else if(e == 2){
						alert("Geçersiz Hesap Adı.");
						}

					},
					error:function(e){
						alert(e);
					}
				})

			})
			
		})





	$(function(){
		$(".tab").click(function(){
			var konumx = $(this).css("left");
			if(konumx == "0px"){
				$("#tabcizgi").animate({left:"0"},500);
				$("#tabdivic").animate({left:"-100%"},500);
			}
			else
			{
				$("#tabcizgi").animate({left:"50%"},500);
				$("#tabdivic").animate({left:"0"},500);
			}
		})
		$(".inputBorder").click(function(){
			$(this).children("span").animate({
				top:"7px", 
				fontSize:"12px",
				color: '#9900ff'
			},200)
			$(this).animate({
				borderBottomColor: '#9900ff',
				backgroundColor: '#e3e3e3'
			},200)
			
				$(this).children("input").focus();
			

		})

		$(".inputBorder").focusout(function(){
			var anliksayi = $(this).children("input").val().length;
			if(anliksayi == 0)
			{
				$(this).children("span").animate({
					top:"15px", 
					fontSize:"20px",
					color: '#535353'
				},200)
				$(".inputBorder").animate({
					borderBottomColor: '#535353',
					backgroundColor: '#f5f5f5'
				},200)
				$(this).children("img").hide(200);
			}
			else
			{
				var azami = $(this).children("input").attr("azami");
				if(azami != undefined)
				{
					if(anliksayi<azami)
					{
						
						$(this).children("span").animate({
							color:"#b20000"
						},200)
						$(this).children("img").show(200);
						$(this).children("input").focus();

					}
					else
					{
						$(this).children("span").animate({
							color:"#9900ff"
						},200)
						$(this).children("img").hide(200);
					}
				}
			}
		})
		
		/*setInterval(function(){
			var maxsayi = $(".inputBorder input:focus" ).attr("uzunluk")
			var anliksayi = $(".inputBorder input:focus" ).val().length;
		
			if(maxsayi < anliksayi)
			{
				anliksayi--;
				$(".inputBorder input:focus" ).val($(".inputBorder input:focus" ).val().substring(0, maxsayi));
			}
			
			$(".inputBorder input:focus" ).children(".kisit").html(anliksayi+"/"+maxsayi)
		},10)*/

	})
</script>
</head>
<body>
<?php 
	include "../system/baglan.php";	
	$gtc=$_SESSION["tc"];

	$query = $db->query("SELECT yasadigiYer, adres FROM musteri WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		$adres = $query["adres"];
		$sehir = $query["yasadigiYer"];
	}
	


	$min = 111111111111;
	$max = 999999999999;
	$sifre = mt_rand($min, $max);
	$sifre2 = mt_rand($min, $max);
	$iban = substr($sifre,0, 2)." ".substr($sifre,2, 4)." ".substr($sifre,6, 4)." ".substr($sifre,10, 4)." ".substr($sifre,14, 2)."".substr($sifre2,0, 2)." ".substr($sifre2,2, 4)." ".substr($sifre2,6, 4)." ".substr($sifre2,10, 4)." ".substr($sifre2,14, 2);
	$hesap =substr($sifre2,4, 8);
	$sube = substr($sifre,0, 4);

  ?>
	<div id="ortam">
		<div class="secenek">
			<div class="border">
				<div id="buton1" class="tab">Vadeli</div>
				<div id="buton2" class="tab">Vadesiz</div>
				<div id="tabcizgi"></div>	
			</div>
			<div id="tabdiv">
				<div id="tabdivic">
					<div class="tabdivic2" style="background-color: rgba(128, 161, 183, 0.28);">
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="hesapAa" azami="6" uzunluk="35" >
								<span>Hesap Adı</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="" placeholder="Türk Lirası  ₺ " azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Para Birimi</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="faiz" placeholder="%0" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Güncel Faiz Oranı</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="sehir" placeholder="<?php echo $sehir; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Şehir</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="sube" placeholder="<?php echo  $adres .' - '. $sube; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Şube Kodu</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
							<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="hesapN" placeholder="<?php echo  $hesap; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Hesap Numarası</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="iban" placeholder="<?php echo 'TC'. $iban; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>IBAN</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div><input type="submit" class="hOlusturV" value="Oluştur" /> 
						</div>
						
						
					</div>
					<div class="tabdivic2" style="background-color: rgba(128, 161, 183, 0.28);">
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="hesapA" azami="6" uzunluk="35" >
								<span>Hesap Adı</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="" placeholder="Türk Lirası  ₺ " azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Para Birimi</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="faiz" placeholder="%9.7" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Güncel Faiz Oranı</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="sehir" placeholder="<?php echo $sehir; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Şehir</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="sube" placeholder="<?php echo  $adres .' - '. $sube; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Şube Kodu</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
							<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="hesapN" placeholder="<?php echo  $hesap; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>Hesap Numarası</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						<div class="diskatman">
							<div class="inputBorder">
								<input type="text" name="iban" placeholder="<?php echo 'TR'.$iban; ?>" azami="6" uzunluk="22" style="text-align: right" readonly>
								<span>IBAN</span>
								<img src="images/unlem.png">
							</div>
							<div class="kisit">
								0/35
							</div>
						</div>
						
						<div><input type="submit" class="hOlustur" value="Oluştur" /> 
						</div>






					</div>
				</div>
			</div>
			

		</div>
	</div>




</body>
</html>