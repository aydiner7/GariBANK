<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../system/dIslemStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Döviz İşlemleri</title>
</head>

<body>
    <div id="hesapBilgi">
        <h2>Hesap Bilgisi</h2>
        <hr>
        <?php
           include "../system/baglan.php";
            //!!!!!!! TC ÇEKME KODU YOK !!!!!!!
            
            //$mTcNo='';

            
        ?>
        <form method="POST" action="">
            <select name="vHesaplar" onchange="this.form.submit()">
                <option value="0">Vadesiz Hesabı Seçin</option>
                <?php
                    $vHesaplar=$db->query("select h.iban, m.tc from hesaplar h, musteri m where m.id=h.musteri_id and (tur=0 or tur=1) and m.tc='$mTcNo'", PDO::FETCH_ASSOC);
                    foreach($vHesaplar as $veriler){
                        $sVIban=$veriler['iban'];
                        echo'
                            <option value="'.$sVIban.'">'.$sVIban.'</option>
                        ';
                    }
                ?>
            </select>
        </form>
        <form method="POST" action="">
            <select name="hesapTuru" onchange="this.form.submit()">
                <option value="3">Euro</option>
                <option value="2">Amerikan Doları</option>
                <option value="4">Sterlin</option>
            </select>
        </form>
        <form method="POST" action="">
            <select name="dHesap" onchange="this.form.submit()">
                <option value="0">Döviz Hesabı Seçin</option>
                <?php
                    $hesapTur=$_POST["hesapTuru"];
                    $hesaplar=$db->query("select h.iban, m.tc from hesaplar h, musteri m where m.id=h.musteri_id and tur='$hesapTur' and m.tc='$mTcNo'", PDO::FETCH_ASSOC);
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
            $vHTutar='';

            $hTutar='';
            $hesapAdi='';
            $tur='';
            $dHesap='';
            if(isset($_POST['vHesaplar'])){
                $vHesap=$_POST["vHesaplar"];
                $vHesapTutar=$db->query("select tutar from hesaplar where h.iban='$vHesap'", PDO::FETCH_ASSOC);
                foreach($vHesapTutar as $veriler){
                    $vHTutar=$veriler['tutar'];
                }
            }

            if(isset($_POST['dHesap'])){
                $dHesap=$_POST["dHesap"];
                $mHesap=$db->query("select * from hesaplar where h.iban='$dHesap'", PDO::FETCH_ASSOC);
                foreach($mHesap as $veriler){
                    $hTutar=$veriler['tutar'];
                    $hesapAdi=$veriler['hesap_adi'];
                    $tur=$veriler['tur'];
                }
            }
            
            if($hesapTur==3){
                $kur=6.66;
            }elseif($hesapTur==2){
                $kur=5.95;
            }elseif($hesapTur==4){
                $kur=7.79;
            }

            
        ?>

        <ul>
            <li>Hesap Adı :<?php echo $hesapAdi ?></li>
            <li>IBAN :<?php echo $dHesap ?></li>
            <li>Tutar :<?php echo $hTutar ?></li>
            <li>Tür :<?php echo $tur ?></li>
        </ul>

        <h2>Döviz Al</h2>
        <hr>
        
        <form method="POST" action="">
                <input type="text" name="alisTutar" pattern="\d*" placeholder="Alınacak Tutar" required>
                <input type="submit" name="alButon" value="Al">
        </form>
        <?php
            if(isset($_POST['alButon'])){
                $alisTutar=$_POST["alisTutar"];
                $alisTutar=$alisTutar*$kur;
                if($alisTutar<=$vHesapTutar){
                    $vHTutar=$vHTutar-$alisTutar;
                    $hTutar=$hTutar+$alisTutar;
                    $alisV=$db->exec("update hesaplar set tutar='$vHTutar' where iban='$vHesaplar'");
                    $alisD=$db->exec("update hesaplar set tutar='$hTutar' where iban='$dHesap'");
                    echo 'Alış Başarılı';
                }else{
                    echo 'Alış Başarısız';
                }
            }
        ?>
        <h2>Döviz Sat</h2>
        <hr>
        <form method="POST" action="">
            <input type="text" name="satisTutar" pattern="\d*" placeholder="Satılacak Tutar" required>
            <input type="submit" name="satButon" value="Sat">
        </form>
        <?php
            if(isset($_POST['satButon'])){
                $satisTutar=$_POST["satisTutar"];
                $satisTutar=$satisTutar*$kur;
                if($satisTutar<=$hTutar){
                    $vHTutar=$vHTutar+$satisTutar;
                    $hTutar=$hTutar-$satisTutar;
                    $satisV=$db->exec("update hesaplar set tutar='$vHTutar' where iban='$vHesaplar'");
                    $satisD=$db->exec("update hesaplar set tutar='$hTutar' where iban='$dHesap'");
                    echo 'Satış Başarılı';
                }else{
                    echo 'Satış Başarısız';
                }
            }
        ?>
        <br>
    </div>

    <div id="dTakip">
        <table> 
            <thead>
                <tr>
                    <th colspan="2"></th>
                    <th class="alisTablo">Alış</th>
                    <th>Satış</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bayrak"><img src="../img/euro.png" alt="avrupa"></td>
                    <td class="dovizTablo">Euro</td>
                    <td id="euroAlisKur" class="alisTablo">6,66</td>
                    <td id="euroSatisKur">6,66</td>
                </tr>
                <tr>
                    <td class="bayrak"><img src="../img/dolar.png" alt="amerika"></td>
                    <td class="dovizTablo">Dolar</td>
                    <td id="dolarAlisKur" class="alisTablo">5,95</td>
                    <td id="dolarSatisKur">5,95</td>
                </tr>
                <tr>
                    <td class="bayrak"><img src="../img/ingiliz-sterlini.png" alt="ingiliz"></td>
                    <td class="dovizTablo">Sterlin</td>
                    <td id="sterlinAlisKur" class="alisTablo">7,79</td>
                    <td id="sterlinSatisKur">7,79</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>