<html>
<head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="http://www.garibank.site/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="system/jquery-3.1.1.min.js"></script>
    <style>
        #arkaplan{
            position: absolute;
            left: 0;
            top:0;
            width: 100%;
            height: 100%;
            background: #5d5d5d;
                    }
        #onplan{
            position: absolute;
            top:50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:#535353;
            width: 80%;
            height: 80%;
            border-radius: 20px;
        }
        #panel{
            position: absolute;
            top: 0;
            left: 0;
            width: calc(100% / 3 );
            height: 100%;
            background: transparent;
        }
        #resimpanel{
            position: absolute;
            top: 0;
            left: calc(100% / 3 );
            width: calc(100% - calc(100% / 3) );
            height: 100%;
            background: transparent;

        }
        #slider{
            position: absolute;
            top: 10px;
            left: 10px;
            width: calc(100% - 20px);
            height: calc(100% - 70px);
            background: transparent;
            border-radius: 10px;
        }

        #slider img{
            transition: width ease-in 1.4s,height ease-in 1.4s, top ease-in 1.4s, left ease-in 1.4s;
        }
        #slidertab{
            position: absolute;
            top: calc(100% - 50px);
            left: 10px;
            width: calc(100% - 20px);
            height: 50px;
            background: green;
        }
        .tab{
            width: 14px;
            height: 14px;
            border-radius: 30px;
            background: grey;
            padding: 8px;
            margin: 0 10px 0 10px;
            float: left;
        }
        #tablar{
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translate(-50%,0);
            height: 30px;
            width: auto;
        }
        .resimaktif{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 10px;


        }

        ::-webkit-scrollbar {
          width: 1px;
          height: 1px;
        }
        ::-webkit-scrollbar-button {
          width: 2px;
          height: 2px;
        }
        ::-webkit-scrollbar-thumb {
          background: #fdca12;
          border: 13px none #ffffff;
          border-radius: 20px;
        }
        ::-webkit-scrollbar-thumb:hover {
          background: #f3be21;
        }
        ::-webkit-scrollbar-thumb:active {
          background: #f0b428;
        }
        ::-webkit-scrollbar-track {
          background: #535353;
          border: 14px none #ffffff;
          border-radius: 20px;
        }
        ::-webkit-scrollbar-track:hover {
          background: #464646;
        }
        ::-webkit-scrollbar-track:active {
          background: #414141;
        }
        ::-webkit-scrollbar-corner {
          background: transparent;
        }


        .resimpasif{
            position: absolute;
            top: 100%;
            left: 100%;
            width: 0;
            height: 0;
            border-radius: 10px;
            
        }
        .tabic{
            width: 14px;
            height: 14px;
            
            border-radius: 14px;
            background: transparent;
            
        }
        .tabicsecili{
            width: 14px;
            height: 14px;
            
            border-radius: 14px;
            background: black;
        }
        #icpanel{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }
        .logo{
            position: absolute;
            left: 50%;
            top: 20px;
            transform: translate(-50% , 0);
        }
        .logo2{
            position: absolute;
            left: 50%;
            top: 80px;
            transform: translate(-50% , 0);

        }
        .elemanlar{
            top: 110px;
            left: 0;
            position: absolute;
            height: calc(100% - 110px);
            width: 100%;
            background-color: transparent;
            overflow: auto;
        }
        


        @media only screen and (min-width: 768px) and (max-width: 959px)
        {
            #onplan{
                height: 70%;
            }
            #panel{
                width: 50%;
            }
            #resimpanel{
                width: 50%;
                left: 50%;
                height: 80%;
                top: 10%;
            }  
                  
        }
        
        @media only screen and (max-width: 767px) 
        {
            
            #resimpanel{
                display: none;
            }   
            #panel{
                width: 100%;

            }         
        }
    </style>
    
    </head>
    
    <body>
        <div id="arkaplan">
            <div id="onplan">
                <div id="panel">
                    <div class="aktifpanel" id="icpanel">
                        <div class="logo"><img src="images/logo.png" ></div>
                        <div class="logo2"><img src="images/garibank.png" ></div>
                        <div class="elemanlar">
                          

                        </div>
                        
                        
                    </div>
                </div>
                <div id="resimpanel">
                    <div id="slider" style="max-width: 1200px" >
                        
                        <img class ="resimaktif resimozellik" src="images/1.png" >
                        <img class ="resimaktif resimozellik" src="images/2.png" >
                        <img class ="resimaktif resimozellik" src="images/3.png" >
                        <img class ="resimaktif resimozellik" src="images/4.png" >
                        <img class ="resimaktif resimozellik" src="images/5.png" >
                        <img class ="resimaktif resimozellik" src="images/6.png" >
                    
                    </div>
                    
                </div>

            </div>
        </div>

<script>
    $(function(){
        var boyut = $(".elemanlar").height();
        $(".elemanlar").animate({
                    height : "0",
                    opacity : 0
                },500)
                $.ajax({
                    url : 'ajax/login.php',
                    success:function(e){
                        setTimeout(function(){
                            $(".elemanlar").html(e).animate({
                            height : boyut+"px",
                            opacity : 1
                        },900)
                        },900)
                    },
                    error:function(e){                        $(".elemanlar").html(e).animate({
                            height : boyut+"px",
                            opacity : 1
                        },900)
                    }
                })


        var degisken=0;
        var slider = document.getElementsByClassName("resimozellik");
        var maxEleman= slider.length
        degisken = maxEleman - 1;
        var yon = -1;
        var zaman = setInterval(function(){
            if (degisken<1) {
                yon=1;
                degisken=0;
            }
            if (degisken>=maxEleman) {
                yon=-1;
                degisken=maxEleman-1;
            }
            if (yon==1) {
                slider[degisken].classList.remove("resimpasif");
                slider[degisken].classList.add("resimaktif");
            }
            else{
                slider[degisken].classList.remove("resimaktif");
                slider[degisken].classList.add("resimpasif");
            }
            degisken+=yon;
        },4000)
        
    })
</script>
            
    </body>

</html>