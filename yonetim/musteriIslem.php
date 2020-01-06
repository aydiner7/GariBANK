<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=garibank_2019;charset=utf8", "garibank_team", "garibank32sdü");
    }catch(PDOException $e){
        print $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleDiv.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Garibank Personel Sistemi">
    <title>Müşteri İşlemleri</title>
</head>

<body>

    <islem>
        <div class="aciklama">Müşterinin yaptığı işlemleri görmek için müşterinin tc numarasını girin ve göstere tıklayın sonra hesabı seçin.</div>
        <br>
        <form method="POST" action="?sayfa=musteriIslem.php">
            <input type="text" name="musteriTcNo" maxlength="11" pattern="\d*" placeholder="Müşteri TC No" required>
            <input type="submit" value="Göster">
        </form>
        <form method="POST">
            <select style="margin-left: 8%; margin-top:1rem;" name="ibanSec" id="ibanSec" onchange="this.form.submit()">
                <option value="0">Hesap Seçiniz..</option>
                <?php
                    $mTcNo=$_POST["musteriTcNo"];
                    $hesaplar=$db->query("select h.iban, m.tc from hesaplar h, musteri m where m.id=h.musteri_id and m.tc='$mTcNo'", PDO::FETCH_ASSOC);
                    foreach($hesaplar as $veriler){
                        $SmIban=$veriler['iban'];
                        echo'
                            <option value="'.$SmIban.'">'.$SmIban.'</option>
                        ';
                    }
                ?>
            </select>
        </form>

        <?php
            
            $mTC='';
            $mAd='';
            $mSoyad='';
            $hTutar='';
            $hesapAdi='';
            $hFaiz='';
            $aTarih='';
            $hDurum='';
            $tur='';

            $kNo='';
            $iban='';
            $limit='';
            $kFaiz='';
            $kTutar='';
            $kBorc='';
            $HKT='';
            $kDurum='';    
            if(isset($_POST['ibanSec'])){
                $secIban=$_POST["ibanSec"];
                
                $mHesap=$db->query("select * from hesaplar h, musteri m where m.id=h.musteri_id and h.iban='$secIban'", PDO::FETCH_ASSOC);
                foreach($mHesap as $veriler){
                    $mTC=$veriler['tc'];
                    $mAd=$veriler['adi'];
                    $mSoyad=$veriler['soyadi'];
                    $hTutar=$veriler['tutar'];
                    $hesapAdi=$veriler['hesap_adi'];
                    $hFaiz=$veriler['faiz'];
                    $aTarih=$veriler['tarih'];
                    $hDurum=$veriler['durum'];
                    $tur=$veriler['tur'];
                }
                if($tur==0 || $tur==1 ){
                    $tur='Türk Lirası';
                }elseif($tur==2){
                    $tur='Dolar';
                }elseif($tur==3){
                    $tur='Euro';
                }elseif($tur==4){
                    $tur='Sterlin';
                }

                $mKart=$db->query("select * from hesaplar h, kartlar k where h.iban=k.iban and k.iban='$secIban'", PDO::FETCH_ASSOC);
                foreach($mKart as $veriler){
                    $kNo=$veriler['kartNo'];
                    $iban=$veriler['iban'];
                    $limit=$veriler['limit'];
                    $kFaiz=$veriler['faiz'];
                    $kTutar=$veriler['tutar'];
                    $kBorc=$veriler['kBorc'];
                    $HKT=$veriler['hesapKesim'];
                    $kDurum=$veriler['durum'];
                }
            }

        ?>
        <br>
        <div class="kartlar">
            <div class="bilgiler" name="hesapEkstre">
                <h2>Hesap Ekstresi</h2>
                <ul>
                    <li>Hesaba Kayıtlı Kişi: <?php echo''.$mAd.' '.$mSoyad.'' ?></li>
                    <li>TC No: <?php echo $mTC ?></li>
                    <li>Tutar: <?php echo $hTutar ?></li>
                    <li>Hesap Adı: <?php echo $hesapAdi ?></li>
                    <li>Faiz: <?php echo $hFaiz ?></li>
                    <li>Açılış Tarihi: <?php echo $aTarih ?></li>
                    <li>Durumu: <?php echo $hDurum ?></li>
                    <li>Türü: <?php echo $tur ?></li>
                </ul>
            </div>
            <div class="bilgiler" name="kartEkstre">
                <h2>Kart Ekstresi</h2>
                <ul>
                    <li>Kart No: <?php echo $kNo ?></li>
                    <li>IBAN: <?php echo $iban ?></li>
                    <li>Limit: <?php echo $limit ?></li>
                    <li>Faiz: <?php echo $kFaiz ?></li>
                    <li>Tutar: <?php echo $kTutar ?></li>
                    <li>Güncel Borç: <?php echo $kBorc ?></li>
                    <li>Hesap Kesim Tarihi: <?php echo $HKT ?></li>
                    <li>Durumu: <?php echo $kDurum ?></li>
                </ul>
            </div>
        </div>
        <div style="font-size: 2rem;" name="transfer">
            <h2 style="margin-top: 2rem; margin-bottom: 1rem;">Transferler</h2>
            <table border="1" style="width: 84%;">
                <thead>
                    <tr>
                        <th>Tarih</th>
                        <th>Gönderilen IBAN/Hesap No</th>
                        <th>Açıklama</th>
                        <th>Tutar</th>
                        <th>Bakiye</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                        if(isset($_POST['ibanSec'])){    
                            $transfer=$db->query("select * from hesaplar h, hesaphareketleri k where h.iban=k.iban and k.iban='$secIban'", PDO::FETCH_ASSOC);
                            foreach($transfer as $veriler){
                                $tarih=$veriler['tarih'];
                                $gIban=$veriler['iban2'];
                                $aciklama=$veriler['aciklama'];
                                $tTutar=$veriler['tutar'];
                                $bakiye=$veriler['bakiye'];
                                echo'
                                <tr>
                                    <td>'.$tarih.'</td>
                                    <td>'.$gIban.'</td>
                                    <td>'.$aciklama.'</td>
                                    <td>'.$tTutar.'</td>
                                    <td>'.$bakiye.'</td>
                                </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </islem>

</body>

</html>