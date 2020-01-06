<?php session_start();
    include "../system/baglan.php"
 ?>


<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
    <script type="text/javascript" src="system/jquery.inputmask.js"></script>
    <script type="text/javascript">

        $(function(){
            $("input[name=iban]").inputmask('TC99 9999 9999 99 99 9999 9999 99');
        })
        $(function(){
            $(".gonder").click(function(){

                var adi = $("input[name=adi]").val();
                var soyadi = $("input[name=soyadi]").val();
                var iban = $("input[name=iban]").val();
                var tutar = $("input[name=tutar]").val();
                var select = $("select[name=select]").val();
              
                if (select=="0") {

                    alert("Lütfen Bir Hesap Seçiniz..");

                }else{
                     $.ajax({

                    url:'php/paraTransfer.php',
                    type: 'POST',
                    data: 'iban='+iban+'&adi='+adi+'&soyadi='+soyadi+'&tutar='+tutar+'&hesap='+select,

                    success:function(e){
                        //window.location = "../anasayfa.php";
                        //location.reload();
                        if (e == 1 ) {
                            alert("Para Transferiniz Gerçekleştirilmiştir.")
                            location.reload();
                        }
                        if (e == 0 ) {
                            alert("Lütfen Bilgilerini Kontrol Ediniz.")
                            //location.reload();
                        }
                        if (e == 2 ) {
                            alert("Hesabınızda yeterli bakiye yok.")
                            //location.reload();
                        }
                        if (e == 3 ) {
                            alert("transfer başarısız")
                            //location.reload();
                        }
                    },
                    error:function(e){
                        alert(e);
                    }
                })
                }

               

            })
        })

    </script>


    <style>

        #ortahizla{
            position: relative;
            left: 0;
            width: 100%;
            height: auto;
            top:50%;
            transform:translate(0,-50%);
        }

        #genel{
            width: 100%;
            height: 100%;
            background-color: #f3eeee;
            position: absolute;
            top: -7px;
        }        

        .gonder{
            margin-top: 20px;
            border: 5px outset rgba(83, 84, 84, 0.48);
            border-radius: 18px;
            width: calc(40% - 14px);
            font-size: 21px;
            padding: 7px;
            position: relative;
            left: 30%;
            cursor: pointer;
            font-family: "Arial Black", Gadget, sans-serif;
            outline: none;
            box-shadow: 3px 3px 4px #000;
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);
        }
        input.gonder:hover {
            text-shadow: 0 0px 1px rgba(0, 0, 0, 0.75);
            box-shadow: 0 0px 2px rgba(0, 0, 0, 0.75);
        }

         .textbox { 
            width: calc(40% - 24px);
            left: 30%;
            position: relative;
            font-size:16px; 
            margin-bottom: 20px;
            text-align:center; border-width:3px; 
            border-radius:5px; 
            border-style:outset; 
            border-color:#d6d6d6; 
            background-color:#d0d0d0; 
            color:#fff7ff; 
            box-shadow:outside 3px 6px 6px 0px rgba(42,42,42,.73); 
            padding:12px; 
            font-weight:bold; 
            font-style:none; 
            font-family:sans-serif; 
            text-align: center;} 

         .textbox:focus { 
            outline:none; 
            box-shadow:inside 3px 6px 6px 0px rgba(42,42,42,.73); 
        }         
                
        .select {
            top: 5px;
            position: relative;
            display: inline-block;
            margin-bottom: 50px;
            width: 40%;
            left: 30%;
        }   
        .select select {
                font-family: 'Arial';
                display: inline-block;
                width: 100%;
                cursor: pointer;
                padding: 19px 11px;
                outline: 0;
                border: 1px double #949494;
                border-radius: 8px;
                background: #e6e6e6;
                color: #575353;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
            }
        .select select::-ms-expand {
            display: none;
        }
        .select select:hover,
        .select select:focus {
            color: #cacaca;
            background: #747171;
        }
        .select select:disabled {
            opacity: 0.5;
            pointer-events: none;
        }
        .select_arrow {
            position: absolute;
            top: 28px;
            right: 29px;
            pointer-events: none;
            border-style: solid;
            border-width: 8px 5px 0px 5px;
            border-color: #7b7b7b transparent transparent transparent;
        }
        .select select:hover ~ .select_arrow,
        .select select:focus ~ .select_arrow {
            border-top-color: #000000;
        }
        .select select:disabled ~ .select_arrow {
            border-top-color: #cccccc;
        }
        .etraf{
            position: absolute;
            width: 50%;
            left: 25%;
            top: 5%;
            height: 90%;
            border-radius: 130px 2px 130px 2px;
            -moz-border-radius: 130px 2px 130px 2px;
            -webkit-border-radius: 130px 2px 130px 2px;
            border: 4px solid #FFD700;
            background-color: #C0C0C0;
            overflow: hidden;
        }

        @media only screen and (min-width: 768px) and (max-width: 959px)
            {   
            .etraf{
            width: 80%;
            left: 10%;  
            } 
            }
                
        @media only screen and (max-width: 767px) 
        {   
            .etraf{
            width: 94%;
            left: 3%;}
            .select_arrow {
            top: 25px;
            right: 3px;}

        .textbox { 
            width: calc(70% - 24px);
            left: 15%;
            position: relative;
            font-size:16px; 
            margin-bottom: 20px;
            text-align:center; border-width:3px; 
            border-radius:5px; 
            border-style:outset; 
            border-color:#d6d6d6; 
            background-color:#d0d0d0; 
            color:#fff7ff; 
            box-shadow:outside 3px 6px 6px 0px rgba(42,42,42,.73); 
            padding:12px; 
            font-weight:bold; 
            font-style:none; 
            font-family:sans-serif; 
            text-align: center;} 
        .gonder{
            margin-top: 20px;
            border: 5px outset rgba(28,110,164,0.48);
            border-radius: 18px;
            width: calc(70% - 14px);
            font-size: 21px;
            padding: 7px;
            position: relative;
            left: 15%;
            cursor: pointer;
            font-family: "Arial Black", Gadget, sans-serif;
            outline: none;
            box-shadow: 3px 3px 4px #000;
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);
        }    
        .select {
            top: 5px;
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
            width: 70%;
            left: 15%;
        } 
         .gonder{
            margin-top: 10px;
           
        }           
}






    </style>
</head>
<body>
    <div id="genel">
        <div class="etraf">

            <div id="ortahizla">
                <div class="select">
                    <select name="select">
                        
                        <option value="0">Hesap Seçiniz</option>
                        <?php 

                            $query = $db->query("SELECT * FROM musteri,hesaplar WHERE hesaplar.musteri_id = musteri.id AND musteri.tc = '{$_SESSION["tc"]}' AND hesaplar.durum=1", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() ){
                                 foreach( $query as $row ){
                                      echo '<option value="'.$row["iban"].'">'.$row["hesap_adi"].' / Bakiye : '.$row["tutar"].' ₺</option>';
                                 }
                            }


                         ?>

                    </select>
                        <div class="select_arrow">
                        </div>
                    </div>
                    <div><input type="text" class="textbox" name="iban" placeholder="IBAN"></div>
                    <div><input type="text" class="textbox" name="adi" placeholder="Alıcı Adı"></div>
                    <div><input type="text" class="textbox" name="soyadi" placeholder="Alıcı Soyadı"></div>
                    <div><input type="text" class="textbox" name="tutar" placeholder="Tutar Giriniz"></div>
                    <div><input type="submit" class="gonder" value="Gönder" /></div> 
            </div>
             
        </div>
</div>

</body>
</html>