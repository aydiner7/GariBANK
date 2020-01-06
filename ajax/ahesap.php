<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Altın Hesap</title>
<link href="system/ahesap.css" rel="stylesheet">
</head>
 
<body>
<table id="tasarım">
<tr>
<th>Altın</th>
<th>ALış Fiyatı</th>
<th>Satış Fiyatı</th>
<th>Satış</th>
<th>Alış</th>
<th>Asgari Adet</th>
<th>Mevcut Adet</th>
</tr>
<tr>
<td> <input type="radio" value="830-50.8-51.89" name="radio">830(1Gr)Altın</td>
<td>50.800000</td>
<td>51.890000</td>
<td>Açık</td>
<td>Açık</td>
<td>1</td>
<td>sınırsız</td>
</tr>
<tr>
<td> <input type="radio" value="831-55.9-60" name="radio">831 1/1 Cumh. dengi  Altın</td>
<td>55.900000</td>
<td>60.000000</td>
<td>Açık</td>
<td>Açık</td>
<td>1</td>
<td>sınırsız</td>
</tr>
<tr>
<td> <input type="radio" value="832-55.9-60" name="radio">832 1/2 Cumh. dengi  Altın</td>
<td>55.900000</td>
<td>60.000000</td>
<td>Açık</td>
<td>Açık</td>
<td>1</td>
<td>sınırsız</td>
</tr>


</table>
<table id="as">
	<tr>
		<th><div class="input"><input type="text" name="miktar" min="1" max="99" pattern="\d{2}" value="1" placeholder="Alış Satış Yapılacak Değeri Gir "> </div></th>
		<th><button class="button" kod="1">Altın Al </button> </br>
			<button class="button" kod="0">Altın Sat </button>
		</th>
	</tr>
	<tr>
		<th>Alış:</th>
		<th><span id="alisfiyat">-</span> TL</th>
	</tr>
	<tr>
		<th>Satış:</th>
		<th><span id="satisfiyat">-</span> TL</th>
	</tr>
</table>

</body>
</html>

<script type="text/javascript">
	$(function(){
		$("input[name=radio]:first").prop( "checked", true );
		var deger = $("input[name=radio]:first").val();
		var res = deger.split("-");
		kod = res[0];
		satis = res[1];
		alis = res[2];
		$("#alisfiyat").html(alis);
		$("#satisfiyat").html(satis);
		var kod;
		var satis;
		var alis;
		$("input[name=radio]").change(function(){
			var deger = $(this).val();
			var res = deger.split("-");
			kod = res[0];
			satis = res[1];
			alis = res[2];
			$("#alisfiyat").html(alis);
			$("#satisfiyat").html(satis);
		})
		$(".button").click(function(){
			var buton = $(this).attr("kod");
			var miktar = $("input[name=miktar]").val();
			$.ajax({
				url : 'php/ahesap.php',
				type : 'post',
				data : 'buton='+buton+"&miktar="+miktar+"&alis="+alis+"&satis="+satis+"&kod="+kod,
				success:function(e){
					e = $.trim(e);
					if(e==1)
						alert("İşlem gerçekleşti");
					else
						alert("hata oluştu");
				},
				error:function(e)
				{
					alert(e);
				}
			})
		})
	})
</script>