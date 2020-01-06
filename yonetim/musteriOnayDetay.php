<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleDiv.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Müşteri Başvuru Onay Detay</title>
</head>
<body>
    
    <mDetay>
        <div>
            <h2>Müşteri Bilgileri</h2>
            <hr>
            <?php
                try{
                    $db = new PDO("mysql:host=localhost;dbname=garibank_2019;charset=utf8", "garibank_team", "garibank32sdü");
                }catch(PDOException $e){
                    print $e->getMessage();
                }
                $tc=$_POST["detayButon"];
                $yMusteri=$db->query("select * from musteri where tc='$tc'");
                foreach($yMusteri as $veriler){
                    $yMAd=$veriler['adi'];
                    $yMSoyad=$veriler['soyadi'];
                    $yMDTarih=$veriler['dogumTarihi'];
                    $yMTcNo=$veriler['tc'];
                    $yMDYeri=$veriler['dogumYeri'];
                    $yMAAdi=$veriler['anneAdi'];
                    $yMBAdi=$veriler['babaAdi'];
                    $yMAKizlikSoyad=$veriler['anneKizlikSoyadi'];
                    $yMTel=$veriler['telefon'];
                    $yMMail=$veriler['email'];
                    $yMIkametAdresi=$veriler['adres'];
                    
                }
                echo'
                    <ul name="bilgiler">
                        <li>Ad : '.$yMAd.' </li>
                        <li>Soyad : '.$yMSoyad.'</li>
                        <li>Doğum Tarihi : '.$yMDTarih.'</li>
                        <li>TC No : '.$yMTcNo.'</li>
                        <li>Doğum Yeri : '.$yMDYeri.'</li>
                        <li>Anne Adı : '.$yMAAdi.'</li>
                        <li>Baba Adı : '.$yMBAdi.'</li>
                        <li>Anne Kızlık Soyadı : '.$yMAKizlikSoyad.'</li>
                        <li>Telefon No : '.$yMTel.'</li>
                        <li>E-Posta : '.$yMMail.'</li>
                        <li>İkamet Adresi : '.$yMIkametAdresi.'</li>
                    </ul>
                    <form action="?sayfa=musteriOnayDetay.php" method="POST">
                        <button type="submit" value="'.$yMTcNo.'" name="onay">Onay</button>
                        <button type="submit" value="'.$yMTcNo.'" name="red">Red</button>
                    </form>';

                    if(isset($_POST['onay'])){
                        $tc=$_POST["onay"];
                        $guncelle=$db->exec("update musteri set onay=1 , durum=1 where tc='$tc'");
                        echo '<p style="margin-left: 8%; margin-top:2rem; font-size: 2rem; color:greenyellow;">Başvuru Onaylandı</p>';
                        header("Refresh: 1; url=anasayfa.php?sayfa=musteriOnay.php");
                    }
                    elseif(isset($_POST['red'])){
                        $tc=$_POST["red"];
                        $sil=$db->exec("delete from musteri where tc='$tc'");
                        echo '<p style="margin-top:2rem; font-size: 2rem; color:red;">Başvuru Reddedildi</p>';
                        header("Refresh: 1; url=anasayfa.php?sayfa=musteriOnay.php");
                    }
            ?>    
        </div>
    </mDetay>

</body>
</html>