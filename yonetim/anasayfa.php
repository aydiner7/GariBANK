<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleAnasayfa.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <meta name="title" content="Garibank Personel Sistemi">
    <title>Garibank Personel Sistemi</title>
</head>

<body>

    <baslik>
        <img class="logo" src="img/logo.png">
        <h1>Garibank Personel Sistemi</h1>
    </baslik>
    <menu>
        <ul id="menu">
            <li><a href="?sayfa=musteriOnay.php">Müşteri Başvuru Onay</a></li>
            <li><a href="?sayfa=musteriBilgi.php">Müşteri Bilgi Düzenleme</a></li>
            <li><a href="?sayfa=musteriIslem.php">Müşteri İşlemleri</a></li>
            <li><a href="?sayfa=musteriBlok.php">Müşteri Blokla</a></li>
            </ul>
    </menu>
    


    <div class="fonksiyon">
        <?php 

            if(isset($_GET["sayfa"]))
            {
                include $_GET["sayfa"];
            }

         ?>

    </div>
    
</body>

</html>