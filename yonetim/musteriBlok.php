<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleDiv.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Garibank Personel Sistemi">
    <title>Müşteri Blokla</title>
</head>

<body>

    <blok>
        <div class="aciklama">Bloklancak olan müşterinin tc numarasını girin.</div>
        <br>
        <form method="POST" action="?sayfa=musteriBlok.php">
            <input type="text" name="musteriTcNo" maxlength="11" pattern="\d*" placeholder="Müşteri TC No" required>
            <br>
            <input type="text" name="musteriAnneKızlıkSoyad" placeholder="Müşteri Anne Kızlık Soyad" required>
            <br>
            <input type="checkbox" required><p>Müşterinin Hesabını Bloklanmasını Onaylıyorum</p>
            <br>
            <input name="blokla" type="submit" value="Blokla">
        </form>
        <?php
                    try{
                        $db = new PDO("mysql:host=localhost;dbname=garibank_2019;charset=utf8", "garibank_team", "garibank32sdü");
                    }catch(PDOException $e){
                        print $e->getMessage();
                    }
                    if(isset($_POST['blokla'])){
                        $mTc=$_POST["musteriTcNo"];
                        $mAKS=$_POST["musteriAnneKızlıkSoyad"];
                        $blokla=$db->exec("update musteri set durum='0' where tc='$mTc' and anneKizlikSoyadi='$mAKS'");
                        if($blokla){
                            echo '<p style="margin-left: 8%; margin-top:2rem; font-size: 2rem; color:greenyellow;">Blok Başarılı</p>';
                        }
                        else{
                            echo '<p style="margin-left: 8%; margin-top:2rem; font-size: 2rem; color:red;">Kişi Zaten Bloklu</p>';
                        }
                    }

        ?>
    </blok>
</body>

</html>