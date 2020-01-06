<!DOCTYPE html>
<html>
<head>

	<title>Kredi Basvuru</title>
	<link rel="stylesheet" type="text/css" href="system/kredibasstyle.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript">
	$(function(){
		$(".btn").click(function(){
				var miktar = $("input[name=miktar]").val();
				var ay = $("input[name=ay]").val();

				$("#degisenIcerik").hide(150);
			setTimeout(function(){
				$.ajax({
					url : 'ajax/bilgiler.php',
					type:'POST',
					data:'miktar='+miktar+'&ay='+ay,
					success : function(e){
						$("#sayfaBaslik").html("Kredi Detay");
						$("#uzunYol").append(" -> Kredi Detay")
						$("#degisenIcerik").html(e).show(500);
					},
					error:function(e){
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
			<div class="title">Kredi Başvuru</div>



			<div class="input-fields">
					<div class="items">



<label for="miktar" class="label">Kredi Miktarını Giriniz</label>
						<input id="miktar" name="miktar" type="text" class="input">
					</div>
					<div class="items">
						<label for="ay" class="label">Ay Sayısını Giriniz</label>
						<input id="ay" name="ay" type="text" class="input">
					</div>
					
					</div>
			</div>
			
				
			<div class="btn">Devam</div>
		</div>
</div>	
			</div>

		
</html>