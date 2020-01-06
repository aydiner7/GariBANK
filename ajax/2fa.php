<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">

		<script type="text/javascript" src="system/jquery-3.1.1.min.js"></script>

		<script type="text/javascript">

			$(function(){



				var kod;

				$.ajax({

					url : 'php/2fa.php',

					type:'POST',

					data:'tc='+<?php echo $_POST["tc"]; ?>,

					success:function(e){



						if(e != "0")

						{

							kod = $.trim(e);	

						}

					},

					error:function(e){

						alert(e);

					}

				})

				clearInterval();

				var saniye = 180;

				var sayacYeri = $("div.sayac span");

				 

				$.sayimiBaslat = function(){

				if(saniye > 1){

				saniye--;

				sayacYeri.text(saniye);

				} else {

				$("div.sayac").text("0");

				window.location = "./giris.php"

				}

				}

				 

				sayacYeri.text(saniye);

				setInterval("$.sayimiBaslat()", 1000);

				 



				$(".onayla").click(function(){

					//window.location = "./anasayfa.php"



					var yeni = $("input[name=kod]").val();

					



					if(kod != yeni)

					{

						alert("yanlış kod girdiniz");

					}

					else{

						$.ajax({

							url : 'php/oturum.php',

							type:'POST',

							data:'tc='+<?php echo $_POST["tc"]; ?>,

							success:function(e){

								

								if(e != "0")

								{

									window.location = "./anasayfa.php"

								}

							},

							error:function(e){

								alert(e);

							}

						})

						

					}

				})



			});

				 

		</script>

		<script type="text/javascript" src="system/jquery.inputmask.js"></script>

			<script type="text/javascript">

		$("input[name=kod]").inputmask('99 99 99');

			</script>









	<style>

		

.textbox{

	margin-left: 15%;

	margin-right: 15%;

	margin-bottom: 55px;

}

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

  input.onayla, .geri{

	top: 0;

	margin-left: 15%;

	margin-right: 15%;

	margin-bottom: 15px;

	height: 7%;

	width: 70%;

	background-color: fdca12;

	border-radius:  15px;

	padding:5px 10px;

    text-decoration:none;

    color:#5d5d5d;

    font:bold 130% Verdana, Geneva, sans-serif;

    box-shadow: 3px 3px 4px #000;

    border:1px solid #5d5d5d;

    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);

    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);

    outline: none;

    cursor: pointer;



}

input.onayla:hover, .geri:hover {

	text-shadow: 0 0px 1px rgba(0, 0, 0, 0.75);

    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.75);

}

#anakatman{

	position: absolute;

	top:50px;

	width: 100%;

}

.metin{

	margin-left: 15%;

	margin-bottom: 20px;

	transform: translate(0,-50%);

	font-size: 15px;

	margin-top: 25px;

	font:bold 100% Arial, Helvetica, sans-serif;

	color: #d9d9d9;

	text-shadow: rgba(255,255,255,.1) -1px -1px 1px,rgba(0,0,0,.5) 1px 1px 1px;



}

div.sayac span {

font-weight: bold;

}

div.sayac {

	position: absolute;

	top: 10%;

	right: 20%;

}





	</style>

		<script type="text/javascript">

		$(function(){

			$(".geri").click(function(){

				$(".elemanlar").animate({

					height : "0",

					opacity : 0

				},500)

				$.ajax({

					url : 'ajax/login.php',

					success:function(e){

						setTimeout(function(){

							$(".elemanlar").html(e).animate({

							height : "80%",

							opacity : 1

						},900)

						},900)

					},

					error:function(e){

						$(".elemanlar").html(e).animate({

							height : "80%",

							opacity : 1

						},900)

					}

				})

			})

		})

	</script>

</head>

<body>	

		

			<div class="metin">Lütfen Bilgilerinizi Eksiksiz doldurun.</div>





		<div id="anakatman">



			

			<div class="textbox"><input type="text" name="kod" placeholder="Kodu Giriniz">

			<div class="sayac"><span></span> </div></div>

			<div><input type="submit" class="onayla" value="Onayla" /> </div>

			<div><input type="submit" class="geri" value="Geri Dön" /> </div>





		</div>





</body>

</html>