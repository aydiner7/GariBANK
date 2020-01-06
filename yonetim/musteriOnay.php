<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleDiv.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Garibank Personel Sistemi">
    <title>Müşteri Başvuru Onay</title>
</head>

<body>

    <onay>
        <div class="aciklama">Başvuruda bulunan müşterilerin listesi.</div>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Doğum Tarihi</th>
                    <th>TC No</th>
                    <th>Detay</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    try{
                       $db = new PDO("mysql:host=localhost;dbname=garibank_2019;charset=utf8", "garibank_team", "garibank32sdü");
                    }catch(PDOException $e){
                        print $e->getMessage();
                    }

                    $yMusteri=$db->query("select adi, soyadi, dogumTarihi, tc from musteri where onay=0", PDO::FETCH_ASSOC);
                    foreach($yMusteri as $veriler){
                        $yMAd=$veriler['adi'];
                        $yMSoyad=$veriler['soyadi'];
                        $yMDTarih=$veriler['dogumTarihi'];
                        $yMTcNo=$veriler['tc'];
                        echo'
                        <tr>
                            <td>'.$yMAd.'</td>
                            <td>'.$yMSoyad.'</td>
                            <td>'.$yMDTarih.'</td>
                            <td>'.$yMTcNo.'</td>
                            <form method="POST" action="?sayfa=musteriOnayDetay.php">
                                <td class="detay"><button type="submit" name="detayButon" value="'.$yMTcNo.'">Müşteri Detayları</button></td>
                            </form>
                            
                        </tr>';
                    }
                    
                       
                        
                ?>
            </tbody>

        </table>
    </onay>

</body>

</html>