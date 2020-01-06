<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleDiv.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Garibank Personel Sistemi">
    <title>Müşteri Bilgi Düzenleme</title>
    <style>
        button[name="degistir"]{
            border-radius: 1rem;
            border: 0.2rem solid #131111;
            color: #fdca12;
            background-color: #918d8d;
            margin-left: 8%;
            padding: 1rem;
            font-size: 2rem;
            margin-top: 1.5rem;
        }

        button[name="degistir"]:hover{
            background-color: #fdca12;
            color: #918d8d;
        }
        duzenle input[type="checkbox"]{
            margin-left: 8%;
            width: 2rem;
            margin-bottom: 0;
            height: 2rem;
        }

        duzenle form p{
            font-size: 2rem;
            display: inline-block;
        }

                
        input[type="email"]{
            border-color: rgb(0, 217, 255);
            margin-left: 8%;
        }

        input[type="email"]:focus{
            box-shadow: #fdca12;
            border-color: #fdca12;
            background-color: rgb(253, 253, 165);
        }
    </style>
</head>

<body>
    <duzenle>
        <div class="aciklama">Müşteri bilgilerini değiştirme formu.</div>
        <br>
        
        <form name="duzenleForm" action="?sayfa=musteriBilgi.php" method="POST">
            <input type="text" name="musteriTcNo" maxlength="11" pattern="\d*" placeholder="Müşteri TC No" required>
            <br>
            <input type="text" name="yIkamet" placeholder="İkamet Adresi" required>
            <br>
            <input type="email" name="yMail" placeholder="Mail Adresi" required>
            <br>
            <input type="text" name="yTel" placeholder="Telefon Numarası" required>
            <br>
            <input type="checkbox" style="margin-left: 8%; width: 2rem; margin-bottom: 0; height: 2rem;" required><p style="font-size: 2rem; display: inline-block;">Müşterinin Bilgilerinin Değişmesini Onaylıyorum</p>
            <br>
            <button type="submit" name="degistir">Değiştir</button>
        </form>

        <?php
            try{
                $db = new PDO("mysql:host=localhost;dbname=garibank_2019;charset=utf8", "garibank_team", "garibank32sdü");
            }catch(PDOException $e){
                print $e->getMessage();
            }
            if(isset($_POST['degistir'])){
                $mTc=$_POST["musteriTcNo"];
                $yIkamet=$_POST["yIkamet"];
                $yMail=$_POST["yMail"];
                $yTel=$_POST["yTel"];

                $guncelle=$db->exec("update musteri set adres='$yIkamet', email='$yMail', telefon='$yTel' where tc='$mTc'");
                if($guncelle){
                    echo '<p style="margin-left: 8%; margin-top:2rem; font-size: 2rem; color:greenyellow;">Güncelleme Başarılı</p>';
                }
            }
        ?>

    </duzenle>
</body>

</html>