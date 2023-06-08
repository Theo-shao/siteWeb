<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- compatibilité  -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- keywords -->
        <meta name="keywords" content="Auberge de jeunesse,Voyage,Reservation en ligne,Reservation d'hotel,Pratique,Location">
        <!-- description -->
        <meta name="description" content="SCI-Europe bénéficie d'une situation géographique supérieure en France, d'un transport pratique, d'un environnement confortable, d'un service attentionné et fournit des informations touristiques locales détaillées. Choisissez l'auberge de jeunesse SCI et profitez pleinement de votre voyage à Paris ! !">
        <!-- petit icon -->
        <link rel="shortcut icon" href="" />
    
        <title>SCI-EUROPE</title>
        
        <!-- Moteur de rendu -->
        <meta name="renderer" content="webkit">
        <!-- Interdire d'utiliser Cache de siteapp -->
        <meta http-equiv="Cache-Control" content="no-siteapp" />
    
        
            <!--[if lte IE7]>
                <link rel="stylesheet" href="css/ie.css">
            <![endif]-->
            <link rel="stylesheet" href="../../../css/app.css" />
         
        
        
        <script>
        var mobileAgent = new Array("iphone", "ipod", "android", "mobile", "blackberry", "webos", "incognito", "webmate", "bada", "nokia", "lg", "ucweb", "skyfire");
    
        var browser = navigator.userAgent.toLowerCase(); 
        var isMobile = false; 
        for (var i=0; i<mobileAgent.length; i++)
        {
            if( browser.indexOf("ipad") != -1 && browser.indexOf("mobile") != -1 )
            {
                break;
            }
            else if( browser.indexOf(mobileAgent[i]) != -1 )
            {
                isMobile = true;
                // Reorienter
                location.href = 'http://w.yhachina.com' ;
                break; 
            }
        }
        </script>
    </head>
    <body style="filter: gray;">
        <?php
        $Meth = $email = $tel = $num='';

        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "sci";

        $conn = new mysqli($hostname, $username, $password, $database);

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>


        <div class="header headers">        
            <div class="header-container">            
                <a class="logo" href="/">SCI-EUROPE</a>            
                <div class="top-user-panel">          
                    <a href="http://localhost/site/siteWeb/data/view/client/gestion.html" class="user-login">Gestion de commande</a>       
                    |                           
                    <a href="http://localhost/site/siteWeb/data/view/client/inscription.html" class="user-login"><img src="../../../images/market/user-icon.png">Inscription</a>  
                    | 
                    <a href="http://localhost/site/siteWeb/data/view/client/login.html" class="user-login">Connexion</a>                                 
                    <div class="lang">                    
                    | 
                        <a href="index.html" class="fr"><img src="../../../images/market/FR.jpg" alt="Francais">FR</a>
                    |
                        <a href="/en-web-index-index" class="cn"><img src="../../../images/market/CN.gif" alt="中文">CN</a>  
                    </div>             
                </div>            
                <ul class="top-nav">                 
                    <li><a href="http://localhost/site/siteWeb/data/view/info/about.html">Présentation</a></li>                               
                    <li><a href="http://localhost/site/siteWeb/data/view/info/reserver.html">Réservation</a></li>                                              
                    <li><a href="http://localhost/site/siteWeb/data/view/info/act.html">Voyage/Activité</a></li>             
                    <li><a href="http://localhost/site/siteWeb/data/view/info/contact.html">Contact</a></li>                
                </ul>     
            </div>    
        </div>   
        <div style="height:117px;"></div>
        <div class="retrieve-password retrieve-password2">
            <div class="w1080">
                <div class="step"></div>
                <div class="public-personal">
                    <form action="" method="post">
                        <div class="vip-list-con vip-list-cons2 vip-list-con-gl-2">
                            <div class="personal-p-title">
                                <h2>Veuillez remplir les informations suivantes pour vous renseigner sur les informations de votre commande</h2>
                            </div>
                            <ul>
                                <li>
                                    <label><i>*</i>Méthode de vérification：</label>
                                    <select class="membership-input w370" name="type">
                                        <option value="1">E-mail</option>
                                        <option value="2" selected="">Télephone</option>
                                    </select>
                                </li>
                                <li>
                                    <label><i>*</i>E-mail/télephone：</label>
                                    <input class="membership-input w370" type="text" name="value">
                                </li>
                                <!-- <li>
                                    <label><i>*</i>Code de vérification：</label>
                                    <input class="membership-input w370" type="text" name="verify" autocomplete="off">
                                    <img src="../../../images/verifie/web-index-1.png" title="点击刷新" style=" margin:0px 0 -10px -120px; cursor:pointer;">
                                </li> -->
                                <!-- <li id="varifyCode">
                                    <label><i>*</i>请填写你收到的校验码：</label>
                                    <input class="membership-input w370" type="text" name="code" autocomplete="off">
                                    <a href="javascript:void(0)" class="fsyzm" onclick="send_code()">获取校验码</a>
                                </li> -->

                                <li>
                                    <label><i>*</i>Numéro de commande：</label>
                                    <input class="membership-input w370" type="text" name="oid">
                                </li>

                                <li>
                                    <a href="javascript:void(0)" onclick="javascript:$('form').submit()" class="apply-next" style="display:block;margin:30px auto 0">下一步</a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $Meth = test_input($_POST["type"]);
                        $email = test_input($_POST["value"]);
                        $tel = test_input($_POST["value"]);
                        $num = test_input($_POST["oid"]);
                        if($Meth==1){
                            $sql = "SELECT * FROM commend WHERE id='$num' and email='$email';";
                            $result = $conn->query($sql);
                            if ($result === false) {
                                echo $conn->error;
                            } else {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                      echo "ID: " . $row["id"] . ", Name: " . $row["email"] . "<br>";
                                    }
                                }
                            
                            
                                
                                $result->free_result();
                            }
                        }
                        else if($Meth==0){

                        }
                    }
                    $conn->close();
                    ?>

                </div>
            </div>
        </div>



    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer_h">
           <ul class="clearfix w1080">
               <li><a href="/web-info-about">Présentation</a></li>                               
               <li><a href="/web-info-reserver">Réservation</a></li>                                              
               <li><a href="/web-info-act">Voyage/Activité</a></li>             
               <li><a href="/web-info-contact">Contact</a></li>
           </ul> 
        </div>
        <div class="w1080">
            <div class="footer_b clearfix">
                <div class="footer_b_r fr">
                    <p>E-Mail：Parisnober@gmail.com</p>
                    <p>167 rue de la Roquette，75011</p>
                    <div class="share">
                        <br>
                        <br>
   
                    </div>
   
                     <p class="copyright">Tous droits réservé &copy; à SCI-EUROPE<font style="vertical-align:super;font-size:50%; ">&reg;</font>&nbsp;&nbsp;</p>
   
   
   
   
                </div>
   
            </div>
   
        </div>
   
    </div>



 

<!-- END FOOTER -->





    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/SuperSlide.js"></script>
    <script src="../../../js/checkbox.js"></script>
    <script src="../../../js/eachshow.js"></script>
    <script src="../../../js/app.js"></script>



    <script type="text/javascript">
        function send_code(){
            var t = $("select[name=type]").children("option:selected").val();
            var v = $("input[name=value]").val();
            var u = $("input[name=uname]").val();
            if ( !t || !v){
                alert('请输入你的邮箱/手机号'); return;
            }

            var verify = $("input[name=verify]").val();
            if ( !verify ){
                alert('请输入验证码'); return;
            }

            $.post('/web-index-checkVerify', {verify:verify}, function(msg1){
                if( 'ok' != msg1 ){
                    alert('验证码错误')
                }else{
                    $.post("/web-index-sendCode",{type:t,value:v,uname:u},function(msg){
                        if ( 'ok' != msg){
                            alert(msg)
                        }else{
                            var el = $("#varifyCode").children('a');
                            var i=120;
                            setInterval(function(){
                                el.html(i);
                                i--;
                                if( i < 0){
                                    el.html('获取校验码')
                                }
                            },1000)

                            alert("验证码已发送,有效期为20分钟，超时未验证需要重新获取！")
                        }
                        getVerify();
                    })
                }
            })
        }

        //刷新验证码
        function getVerify(){
            var captcha_img = $('li img');
            var verifyimg = captcha_img.attr("src");
            if( verifyimg.indexOf('?')>0){
                captcha_img.attr("src", verifyimg+'&random='+Math.random());
            }else{
                captcha_img.attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        }
    </script>
    <script type="text/javascript">
        var captcha_img = $('li img');
        var verifyimg = captcha_img.attr("src");
        captcha_img.click(function(){
            if( verifyimg.indexOf('?')>0){
                $(this).attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    </script>



</body>
</html>