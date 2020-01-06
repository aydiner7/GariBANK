<?php session_start();
  include '../system/baglan.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <style>
div {
    display: block;
}
* {
    padding: 0;
    margin: 0;
}   
  
.switch {
  top: 40px;
  right: 30px;
  position: absolute;
  display: inline-block;
  width: 48px;
  height: 27px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 23px;
  width: 23px;
  left: 1px;
  bottom: 2px;
  background-color: #fdca12;
  box-shadow: inset -3px -3px 10px 1px rgba(0,0,0,0.3), 1px 1px 2px 1px rgba(0,0,0,0.6);
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #535353;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

#ortaarta {
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100% - 20px);
    height: calc(100% - 20px);
    padding: 10px;
}

.border{
  position: relative;
    top: 18%;
    width: 80%;
    height: 120px;
    left: 10%;
    margin:10px 0;
  border-radius: 72px 15px 15px 72px;
  border:3px double #535353;

  box-shadow:  inset 0 -3em 3em rgba(83,83,83,0.1), 
                   0 0  0 2px rgb(255,255,255),
                   0.3em 0.3em 1em rgba(83,83,83,0.3);
} 
.border:hover{
  box-shadow: inset -3px -3px 10px 1px rgba(0,0,0,0.3);


}
.abaslik {
    position: absolute;
    top: 55px;
    font-size: 35px;
    left: 45px;
    width: calc(100% - 160px);
    font:bold 100% Arial, Helvetica, sans-serif;
}

.aaciklama {
    position: absolute;
    top: 33px;
    font-size: 14px;
    left: 160px;
    width: calc(100% - 160px);
    font:bold 100% Arial, Helvetica, sans-serif;

}

#ortarta{
  width: 100%;
  height: calc(100% + 50px);
  top: -50px;
  position: absolute;
  background-color: #7a8d9e1a;
  overflow: auto;
}

@media only screen and (min-width: 768px) and (max-width: 959px)
{
  .abaslik {
      position: absolute;
      top: 55px;
      font-size: 10px;
      left: 15px;
      font:bold 100% Arial, Helvetica, sans-serif;
  }

  .aaciklama {
      position: absolute;
      top: 33px;
      font-size: 6px;
      left: 110px;
      font:bold 100% Arial, Helvetica, sans-serif;

  }
  .border{
    position: relative;
    top: 20%;
    width: 96%;
    height: 120px;
    left: 2%;
    margin:10px 0;
    border-radius: 72px 15px 15px 72px;
    border:3px double #535353;

    box-shadow:  inset 0 -3em 3em rgba(83,83,83,0.1), 
    0 0  0 2px rgb(255,255,255),
    0.3em 0.3em 1em rgba(83,83,83,0.3);
  } 
  .switch {
    top: 40px;
    right: 8px;
    position: absolute;
    display: inline-block;
    width: 48px;
    height: 27px;
  }
.face{
    top: 0;
    position: absolute;
    width: auto;
    right: 0;
}
.goog{
    top: 0;
    position: absolute;
    width: auto;
    left: 35px;
}	
}

@media only screen and (max-width: 767px)
{
.face{
    top: 0;
    position: absolute;
    width: auto;
    right: 0;
}
.goog{
    top: 0;
    position: absolute;
    width: auto;
    left: 35px;
}	
  .abaslik {
      position: absolute;
      top: 55px;
      font-size: 35px;
      left: 35px;
      font:bold 100% Arial, Helvetica, sans-serif;
  }

  .aaciklama {
      display: none;

  }
  .border{
    position: relative;
    top: 30%;
    width: 86%;
    height: 120px;
    left: 7%;
    margin:10px 0;
    border-radius: 72px 15px 15px 72px;
    border:3px double #535353;

    box-shadow:  inset 0 -3em 3em rgba(83,83,83,0.1), 
    0 0  0 2px rgb(255,255,255),
    0.3em 0.3em 1em rgba(83,83,83,0.3);
  } 
  .switch {
    top: 40px;
    right: 40px;
    position: absolute;
    display: inline-block;
    width: 48px;
    height: 27px;
  }
}
.buton{
    top: 50px;
    position: absolute;
    width: auto;
    left: 50%;
    transform: translate(-50%,0);
}
 img.face, .goog{
    float: left;
    background-color: #E8EAF6;
    border-radius:  15px;
    padding:5px 10px;
    text-decoration:none;
    color:#5d5d5d;
    font:bold 130% Verdana, Geneva, sans-serif;
    box-shadow: 3px 3px 4px #000;
    border:1px solid #5d5d5d;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.75);
    outline: none;
    cursor: pointer;
    padding: 20px;
}

}

img.goog:hover, .face:hover {
  text-shadow: 0 0px 1px rgba(0, 0, 0, 0.75);
    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.75);
}



  </style>
<script type="text/javascript">
      $(function(){
          $(".face").click(function(){
              var yol = $(this).attr("yol");

        window.location = yol;
          });

          $(".goog").click(function(){
              

        window.location = "http://garibank.site/googleapi";
          });

          $("input").change(function(){
            var deger = $(this).attr("kod");
            var konum = $(this).is(":checked");
            $.ajax({
              url : "php/ayarlar.php",
              type : "POST",
              data : "deger="+deger+"&konum="+konum,
              success:function(e){
                if (e=="0") {
                  alert("Hata Oluştu");
                }
              },
              error:function(e){
                alert(e);
              }

            }) 
          })

      });  


</script>
<?php 
    include "../facebook/myApp/Facebook/autoload.php";

        $fb = new Facebook\Facebook([

          'app_id' => '699321787101603', // Replace {app-id} with your app id

          'app_secret' => 'f211365d453a079642e7c77810b3509d',

          'default_graph_version' => 'v2.2',

          ]);



        $helper = $fb->getRedirectLoginHelper();



        $permissions = ['email']; // Optional permissions

        $loginUrl = $helper->getLoginUrl('https://garibank.site/facebook/myApp/fb-callback.php', $permissions);



   ?>

</head>
<body>

  <div id="ortarta">
      <div class="buton">
        <?php 
        $gtc = $_SESSION["tc"];
        $sorgu = $db->query("SELECT * FROM musteri WHERE tc = '{$gtc}'")->fetch(PDO::FETCH_ASSOC);
        if ($sorgu) {
          $sorgu2 = $db->query("SELECT * FROM ayarlar WHERE musteri_id = ".$sorgu["id"])->fetch(PDO::FETCH_ASSOC);

          if($sorgu["facebook"]=="0")
          {
            echo '<div style="float: left; margin-right: 30px;"><img src="images/face.png" class="face"  yol="'.htmlspecialchars($loginUrl).'"/> </div>';
          }  
           
          if($sorgu["google"]=="0") {

            echo '<div style="float: right;"><img src="images/goog.png" class="goog" /> </div>';
          }
        }
       ?>
     
      </div>     
    <div class="border" id="grad">  
    <div class="abaslik" style="top: 43px;">Kod ile <br>Doğrulama</div>
    <div class="aaciklama">Çift aşamalı doğrulama kod ile giriş için " ON " <br><br> Sadece müşteri numarası ve şifreyle giriş için " OFF "</div>
        <label class="switch">
          <input kod="kod"  type="checkbox" <?php if($sorgu2["kod"]=="1") echo "checked"; ?>>
          <span class="slider round"></span>
        </label>
    </div>
    <div class="border" id="grad">  
    <div class="abaslik">Bildirim</div>
    <div class="aaciklama">Bildirim almak için " ON " <br><br> Bildirim almamak için " OFF "</div>
        <label class="switch">
          <input kod="bildirim" type="checkbox" <?php if($sorgu2["bildirim"]) echo "checked"; ?>>
          <span class="slider round"></span>
        </label>
    </div>

    <div class="border" id="grad">  
    <div class="abaslik">Kampanya</div>
    <div class="aaciklama">Kampanyalardan haberdar olmak için " ON " <br><br> Kampanyalardan haberdar olmamak için " OFF "</div>
        <label class="switch">
          <input kod="kampanya"  type="checkbox" <?php if($sorgu2["kampanya"]) echo "checked"; ?>>
          <span class="slider round"></span>
        </label>
    </div>

    <div class="border" id="grad">  
    <div class="abaslik">SMS</div>
    <div class="aaciklama">Mesaj ile bilgilendirilmek için " ON " <br><br> Mesaj ile bilgilendirilmemek için " OFF "</div>
        <label class="switch">
          <input kod="sms"  type="checkbox" <?php if($sorgu2["sms"]) echo "checked"; ?>>
          <span class="slider round"></span>
        </label>
    </div>

    <div class="border" id="grad">  
    <div class="abaslik">Facebook</div>
    <div class="aaciklama">Facebook ile oturumu aktif için " ON " <br><br>  Facebook ile oturumu pasif için " OFF "</div>
        <label class="switch">
          <input kod="facebook" type="checkbox" <?php if($sorgu2["facebook"]) echo "checked"; ?>>
          <span class="slider round"></span>
        </label>
    </div>

    <div class="border" id="grad">  
    <div class="abaslik">Google</div>
    <div class="aaciklama">Google ile oturumu aktif için " ON " <br><br> Google ile oturumu pasif için " OFF "</div>
        <label class="switch">
          <input kod="google" type="checkbox" <?php if($sorgu2["google"]) echo "checked"; ?> >
          <span class="slider round"></span>
        </label>
    </div>

    <div class="border" id="grad">  
    <div class="abaslik">E-MAİL</div>
    <div class="aaciklama">Mail yolu ile bilgilendirilmek için " ON " <br><br> Mail yolu ile bilgilendirilmemek için " OFF "</div>
        <label class="switch">
          <input kod="mail"  type="checkbox" <?php if($sorgu2["mail"]) echo "checked"; ?>>
          <span class="slider round"></span>
        </label>
    </div>

    



  </div>


</body>
</html>