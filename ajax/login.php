<?php session_start();

?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8">

<head>

	<style>
		 
body {
	margin: 0;
	padding: 0;
 }
 input[type=text],input[type=password]{
    width: 100%;
    border:2px solid #aaa;
    border-radius:4px;
    margin:8px 0;
    outline:none;
    padding: 4% 0;
    box-sizing:border-box;
    transition:.3s;
    text-align: center;
    background-color: #5d5d5d;
    color: aliceblue;
    border-left-color: #5d5d5d;
    border-right-color: #5d5d5d;
    border-top-color: #5d5d5d;
    
  }
  
  input[type=text]:focus, input[type=password]:focus{
    border-color:lightgoldenrodyellow;
    box-shadow:0 0 8px 0 gold;
  }
  .onoffswitch {
  	position: absolute;
  	top: calc(47% + 12px);
  	right: 15%;
     width: 59px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #E3E3E3; border-radius: 31px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 22px; padding: 0; line-height: 22px;
    font-size: 13px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #FFD700; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #666666; color: #FFFFFF;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 16px; margin: 3px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 33px;
    border: 2px solid #E3E3E3; border-radius: 31px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}




#musterinum{
	top: 7%;
	left: 15%;
	right: 15%;
	position: absolute; 
}
#sifre{
	top: 21%;
	left: 15%;
	right: 15%;
	position: absolute;

}
input.butonBasvur{
	top: 80%;
	left: 15%;
	right: 15%;
	position: absolute;
	height: 7%;
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
input.butonGiris{
	top: 40%;
	left: 15%;
	right: 15%;
	position: absolute;
	height: 7%;
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

input.butonGiris:hover, input.butonBasvur:hover {
	text-shadow: 0 0px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.75);
}
#facebook{
	position: absolute;
	top: 60%;
	left: 30%;
	cursor: pointer;
	border-radius: 7px;
	-webkit-box-shadow: 3px 3px 11px 3px rgba(0,0,0,0.74);
	-moz-box-shadow: 3px 3px 11px 3px rgba(0,0,0,0.74);
	box-shadow: 3px 3px 11px 3px rgba(0,0,0,0.74);

}
#google{
	position: absolute;
	top: 60%;
	right: 30%;
	cursor: pointer;
	border-radius: 7px;
	-webkit-box-shadow: 3px 3px 11px 3px rgba(0,0,0,0.74);
	-moz-box-shadow: 3px 3px 11px 3px rgba(0,0,0,0.74);
	box-shadow: 3px 3px 11px 3px rgba(0,0,0,0.74);
}
.sunuttum{
	position: absolute;
	top: calc(47% + 15px);
	left:15%;
	color: gold;
	font:bold 100% Arial, Helvetica, sans-serif;
	cursor: pointer;
	text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);

}
.hatirla{
	position: absolute;
	top: calc(47% + 16px);
	right: 15%;
	color: gold;
	font:bold 100% Arial, Helvetica, sans-serif;
	text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
}


#anakatman{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
 
@media only screen and (min-width: 768px) and (max-width: 959px)
        {
        	
            input.butonGiris{
            	height: 9%;
            }  
            input.butonBasvur{
                height: 9%;
            } 
            
        }
@media only screen and (max-width: 767px) 
		{
		    
		    input.butonGiris{
		        height: 9%;
		    }  
		    input.butonBasvur{
		        height: 9%;
		    } 
		    #facebook{
				left: 20%;
			}
			#google{
				right: 20%;
			}
			.sunuttum{
				font:bold 80% Arial, Helvetica, sans-serif;
			}

}
 




	</style>
	<script type="text/javascript">
		$(function(){
			$(".butonBasvur").click(function(){

				var boyut = $(".elemanlar").height();
				$(".elemanlar").animate({
					height : "0",
					opacity : 0
				},900)
				$.ajax({
					url : 'ajax/kayit.php',
					success:function(e){
						setTimeout(function(){
							$(".elemanlar").html(e).animate({
							height : boyut+"px",
							opacity : 1
						},900)
						},900)

					},
					error:function(e){
						$(".elemanlar").animate({
							height :boyut+"px",
							opacity : 1
						},900)
					}
				})
			})
			$(".sunuttum").click(function(){
				$(".elemanlar").animate({
					height : "0",
					opacity : 0
				},900)
				$.ajax({
					url : 'ajax/sUnuttum.php',
					success:function(e){
						setTimeout(function(){
							$(".elemanlar").html(e).animate({
							height : "80%",
							opacity : 1
						},900)
						},900)

					},
					error:function(e){
						$(".elemanlar").animate({
							height : "80%",
							opacity : 1
						},900)
					}
				})
			})
		})
	</script>
	</style>
		<script type="text/javascript">
		$(function(){
			$(".butonGiris").click(function(){
				
				var tc=$("input[name=tc]").val();
				var sifre=$("input[name=sifre]").val();
				var hatirla = $(".onoffswitch-switch").css("right");
				hatirla = hatirla == "0px"? "1" : "0";
				
				$.ajax({
					url:'php/giris.php',
					type:'post',
					data:'tc='+tc+'&sifre='+sifre+"&benihatirla="+hatirla,
					success:function(deger){
						if ($.trim(deger)=="1") {
										$(".elemanlar").animate({
								height : "0",
								opacity : 0
							},500)
							$.ajax({
								url : 'ajax/2fa.php',
								type:'post',
								data:'tc='+tc,
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
						}else if ($.trim(deger)=="2") {
							window.location = "http://garibank.site"

						}

						else{

							alert("Tc Kimlik numaranızı veya Şifrenizi kontrol ediniz.")
						}
					}  ,
					error:function(deger){
						alert("hata")
					}

				})
				
			})

			$("#facebook").click(function(){
				var yol = $(this).attr("yol");

				window.location = yol;
			})

			$("#google").click(function(){
				var yol = $(this).attr("yol");

				window.location = yol;
			})
		})
	</script>
	<?php 
		include "../facebook/myApp/Facebook/autoload.php";

				$fb = new Facebook\Facebook([

				  'app_id' => '699321787101603', // Replace {app-id} with your app id

				  'app_secret' => 'f211365d453a079642e7c77810b3509d',

				  'default_graph_version' => 'v2.2',

				  ]);



				$helper = $fb->getRedirectLoginHelper();



				$permissions = ['email']; // Optional permissions

				$loginUrl = $helper->getLoginUrl('https://garibank.site/facebook/myApp/fb-callback.php', $permissions);



	 ?>
</head>
<body>
	<div id="anakatman">
		
			<div id="musterinum"><input name="tc" type="text" value="<?php if(isset($_SESSION["hTC"])) echo $_SESSION["hTC"]; ?>" placeholder="Kimlik Numaranız"></div>
			<div id="sifre"><input name="sifre" type="password" placeholder="Şifreniz"></div>
			<div><input type="submit" class="butonGiris" value="Giriş" /> </div>
			<div class="onoffswitch">
			    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" <?php if(isset($_SESSION["hTC"])) echo "checked"; ?> >
			    <label class="onoffswitch-label" for="myonoffswitch">
			        <span class="onoffswitch-inner"></span>
			        <span class="onoffswitch-switch"></span>
			    </label>
			</div>
			<div class="sunuttum">Şifremi Unuttum</div>
			
			<div id="facebook" yol="<?php echo htmlspecialchars($loginUrl); ?>"><img src="images/facebook.png"></div>

			<div id="google" yol="http://garibank.site/googleapi/"><img src="images/google.png"></div>
			<div><input type="submit" class="butonBasvur" value="Hemen Başvur" /> </div>






		
	</div>


</body>
</html>