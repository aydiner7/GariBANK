$(function(){



	$("#btnCikis").click(function(){

		$.ajax({

			url:'php/cikis.php',

			success:function(e){

				if(e == "1")

					window.location = "http://garibank.site"

				else

					alert("Çıkış Yapılamadı")

			},

			error:function(e){

				alert(e)

			}

		})

	})





	var menuAcikMi = true;

	$(".menuler").click(function(){

		if($(this).html() != $(".menuSecili").html())

		{

			$(".menuSecili").addClass("menuler");

			$(".menuSecili").removeClass("menuSecili");

			$(this).addClass("menuSecili");

			$(this).removeClass("menuler");

			$("#menuPanel ul li ul").hide(500);

			$(this).children("ul").show(500);

		}

	});

	$(".menuSecili div").click("click",function(){

		$(".menuSecili").addClass("menuler");

		$(".menuSecili").removeClass("menuSecili");

		

		$("#menuPanel ul li ul").hide(500);

	})

	var bildirimKutu = 0;

	$("#bildirimBtn").click(function(){

		if(bildirimKutu == 0)

		{

			bildirimKutu = 1;

			$("#bildirimpanel").show(500);

		}

		else

		{

			bildirimKutu = 0;

			$("#bildirimpanel").hide(500);

		}

	})



	var bodyGenislik;

	var icerikWidth;



	$("#hanburgerMenu").click(function(){

		bodyGenislik = $("body").width();

		var oran = 0.8;

		if(bodyGenislik >= 768 && bodyGenislik <= 959)

			oran = 0.7;

		else if(bodyGenislik < 768)

			oran = 0;

		icerikWidth = bodyGenislik * oran;

		if(menuAcikMi)

		{

			$("#menu").hide(500);

			$("#icerik").animate({left: "0",width: bodyGenislik+"px"}, 500);

			menuAcikMi = false;

		}

		else

		{

			$("#menu").show(500);

			if(icerikWidth == 0)

				$("#icerik").hide(500);

			$("#icerik").animate({left: (bodyGenislik - icerikWidth)+"px",width: icerikWidth+"px"}, 500)

			

			menuAcikMi = true;

		}

	})

	$("#geriBtn").click(function(){

		bodyGenislik = $("body").width();

		var oran = 0.8;

		if(bodyGenislik >= 768 && bodyGenislik <= 959)

			oran = 0.7;

		else if(bodyGenislik < 768)

			oran = 0;

		icerikWidth = bodyGenislik * oran;

		$("#menu").hide(500);

		if(icerikWidth == 0)

				$("#icerik").show(500);

		$("#icerik").animate({left: "0",width: bodyGenislik+"px"}, 500)

		menuAcikMi = false;

	})



	function sayfaAc(adres,baslik,uzunYol,yeni)

	{

		$("#degisenIcerik").hide(150);

		setTimeout(function(){

			$.ajax({

				url : adres,

				success : function(e){

					$("#sayfaBaslik").html(baslik);

					if(yeni)

						$("#uzunYol").html(uzunYol)

					else

						$("#uzunYol").append(uzunYol)

					$("#degisenIcerik").html(e).show(500);

					bodyGenislik = $("body").width();

					if(bodyGenislik < 768)

					{

						menuAcikMi = false;

						$("#menu").hide(500);

						$("#icerik").show(500);

						$("#icerik").animate({left: "0",width: bodyGenislik+"px"}, 500)

					}

				},

				error:function(e){
					$("#degisenIcerik").show(500);

				}

			})

		},150)

	}

	

	$(".menulink").click(function(){

		var sayfa = $(this).attr("kod");

		if(sayfa == "hesaphareket")

			sayfaAc("ajax/hesapEkstre.php","Hesap Ekstre","Hesaplar -> Hesap Ekstre",true);

		else if(sayfa == "kredikartbasvuru")

			sayfaAc("ajax/kartBasvuru.php","Kredi Kart Başvuru","Kartlar -> Kart Basvuru",true);

		else if(sayfa == "kredilerim")

			sayfaAc("ajax/krediler.php","Kredilerim","Krediler",true);

		else if(sayfa == "kartekstre")

			sayfaAc("ajax/kartekstre.php","Kredi Kart Ekstre","Kartlar -> Kart Ekstre",true);

		else if(sayfa == "kartlarim")

			sayfaAc("ajax/kartgor.php","Kartlarım","Kartlar",true);

		else if(sayfa == "kredibasvuru")

			sayfaAc("ajax/kredibas.php","Kredi Başvuru","Krediler -> Kredi Başvuru",true);

		else if(sayfa == "paratransfer")

			sayfaAc("ajax/pTrasfer.php","Para Transferi","Hesaplar -> Para Transfer",true);

		else if(sayfa == "ayarlar")

			sayfaAc("ajax/ayarlar.php","Ayarlar","Ayarlar",true);

		else if(sayfa == "hesapac")

			sayfaAc("ajax/hesapolustur.php","Hesap Aç","Hesaplar -> Hesap Aç",true);

		else if(sayfa == "iletisim")

			sayfaAc("ajax/iletisim.php","İletişim","İletişim",true);

		else if(sayfa == "anlikdoviz")

			sayfaAc("ajax/doviz.php","Döviz Bilgileri","Döviz Bilgileri",true);

		else if(sayfa == "dovizislem")

			sayfaAc("ajax/dovizIslemleri.php","Döviz İşlemleri","Döviz İşlemleri",true);

		else if(sayfa == "hesaplarim")

			sayfaAc("ajax/hesapgor.php","Hesaplarım","Hesaplar",true);

		else if(sayfa == "krediodeme")

			sayfaAc("ajax/krediode.php","Kredi Ödeme","Kredi Ödeme",true);

		else if(sayfa == "altinhesap")

			sayfaAc("ajax/ahesap.php","Altın Hesap","Altın Hesap",true);

		else if(sayfa == "hesapduzenle")

			sayfaAc("ajax/hduzenle.php","Hesap Düzenleme","Hesaplar -> Hesap Düzenleme",true);

		else if(sayfa == "faturaode")

			sayfaAc("ajax/fodeme.php","Fatura Ödeme","Ödemeler",true);

		else if(sayfa == "kampanyalar")

			sayfaAc("ajax/kampanyalar.php","Kampanyalar","Kampanyalar",true);

		else if(sayfa == "anasayfa")

			sayfaAc("ajax/anasayfa.php","Anasayfa","Anasayfa",true);
		else if(sayfa == "anasayfa")
			sayfaAc("ajax/anasayfa.php","Anasayfa","Anasayfa",true);

	})



	$(window).resize(function(){



	  bodyGenislik = $("body").width();

		var oran = 0.8;

		if(bodyGenislik >= 768 && bodyGenislik <= 959)

			oran = 0.7;

		else if(bodyGenislik < 768)

			oran = 0;

		icerikWidth = bodyGenislik * oran;

		if(menuAcikMi)

		{

			

			

			if(icerikWidth == 0)

				$("#icerik").hide(1);

			else

				$("#icerik").show(1);

			$("#icerik").animate({left: (bodyGenislik - icerikWidth)+"px",width: icerikWidth+"px"}, 1)

			

		}

		else

		{



			

			$("#icerik").animate({left: "0",width: bodyGenislik+"px"}, 1);



			if(icerikWidth == 0)

				$("#icerik").show(1);

			

		}



	})

});