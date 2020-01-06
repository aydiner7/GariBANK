<!DOCTYPE html>
<html>
<head>
	<title>İletisim
	</title>

	<link rel="stylesheet" type="text/css" href="system/iletisimstyle.css">

	<script type="text/javascript">
		$(function(){
			$(".btn").click(function(){
				
				var secenek = $("input[name=secenek]").val();
				var konu = $("input[name=subject]").val();
				var mesaj = $("textarea[name=msg]").val();


				$.ajax({
					url:'php/iletisimform.php', 
					type:'POST',
					data:'secenek='+secenek+'&subject='+konu+'&msg='+mesaj,
					success:function(e){
						e = $.trim(e);
						if(e=="1")
						{
							alert("Mesajınız iletildi.");
						}
						else if(e=="2")
						{
							window.location = "index.php";
						}
						else
						{
							alert('Hata Oluştu');
						}
					},
					error:function(e){
						alert(e);
					}
				})
				})
				})

			</script>
</head>
<body>

	
			<div id="orta">

			<div class="wrapper">
		<div class="contact-form">
			<div class="title">İletişim Formu</div>



			<div class="input-fields">
					
					<div class="items">
						<label for="subject" class="label">Başlık</label>
						<input list="secenek" name='secenek' type="text" class="input">

						<datalist id="secenek">
							<option value="itiraz"></option>
							<option value="öneri"></option>
							<option value="sikayet"></option>
					</div>
					<div class="items">
						<label for="subject" class="label">Konu</label>
						<input id="subject" name='subject' type="text" class="input">
					</div>
					<div class="items">
						<label for="msg" class="label">Mesaj</label>
						<textarea id="msg" name='msg' class="text-area"></textarea>
					</div>
					
			</div>
			
				
			<div class="btn">Gonder</div>
		</div>
</div>	
		

			
		

</body>
</html>