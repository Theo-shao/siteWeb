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
        <link rel="stylesheet" href="css/app.css" />
     
    
    
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
    $etime = $stime ='';

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "sci";

    // 创建数据库连接
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
			<a class="logo" href="/"><img src="#" alt="SCI-EUROPE"></a>            
			<div class="top-user-panel">          
				<a href="http://localhost/site/siteWeb/data/view/client/gestion.php" class="user-login">Gestion de commande</a>       
				|                           
				<a href="http://localhost/site/siteWeb/data/view/client/inscription.php" class="user-login"><img src="images/market/user-icon.png">Inscription</a>  
				| 
				<a href="http://localhost/site/siteWeb/data/view/client/login.php" class="user-login">Connexion</a>                                 
				<div class="lang">                    
				| 
                	<a href="index.html" class="fr"><img src="images/market/FR.jpg" alt="Francais">FR</a>
                |
                	<a href="/en-web-index-index" class="cn"><img src="images/market/CN.gif" alt="中文">CN</a>  
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
    <div class="homeSlide">
        <div class="fullSlide">
			<!-- peinture -->
            <div class="bd">
                <ul>
                    <li style="background-image:url(data/images/5b39db2f01e23.jpg);">
						<a target="_blank" href="#" >
							<img src="/images/smallimg.png" alt="">
						</a>             


                    </li>
					<li style="background-image:url(data/images/5b39db3b8c308.jpg);">
           				<a target="_blank" href="#" >
							<img src="/images/smallimg.png" alt="">
						</a>                 


                    </li>
					<li style="background-image:url(data/images/5b39db4a5af97.jpg);">
				        <a target="_blank" href="#" >
							<img src="/images/smallimg.png" alt="">
						</a>                 


                    </li>
                </ul>

            </div>
			<!-- Point pour changer des peintures -->
            <div class="hd-box">
                <div class="hd_con">
                    <div class="hd">
                        <ul>
							
                        </ul>
                    </div>
                </div>
            </div>

            <div class="Date_place">
                <dl class="clearfix">
                    <form id="frmQuery" name="frmQuery" method="post" action="">
                        <dd class="Date_a"><label><input type="text" id="Date_a" name="stime" placeholder="Date d'arrivée" required="required"><b></b></label></dd>
                        <dd class="Date_b"><label><input type="text" id="Date_b" name="etime" placeholder="Date de départ" required="required"><b></b></label></dd>
                        <dd class="date_btn">
                            <!-- <a href="javascript:$('#form').submit()" class="login-btn">Rechercher</a> -->
                            <button type="submit">Rechercher</button>
                        </dd>
                    </form>
                   
                </dl>
            </div>
        </div>
        <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $stime = test_input($_POST["stime"]);
                    $etime = test_input($_POST["etime"]);
                    $sql = "SELECT * FROM chambres WHERE disponbile = '1';";
                    $result = $conn->query($sql);
                    if ($result === false) {
                        echo $conn->error;
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            // 处理和输出每一行的数据
                            echo "Chambre: " . $row['num'] . ", ";
                            echo "Maximem: " . $row['maximem'] . ", ";
                            echo "Toilette: " . $row['toilette'] . ", ";
                            echo "Climatiseur: " . $row['climatiseur'] . "<br>";
                        }
                        $result->free_result();
                    }
                }
                $conn->close();
        ?>
        <div class="homeSlideBg">
        </div>
    </div>

    <div class="yha_a">
        <!-- barre -->
        <div class="banner_map">
        </div>

        <div class="w1080 clearfix">
            <div class="yha_a_l fl">
                <div class="yha_a_l_1">
                    <h3>Présentation</h3>
                    <p>
                        L'emplacement est excellent, l'équipement est complet, et tout <br>
                        est propre et bien rangé, ce qui rend votre séjour agréable et<br>
                        confortable en toute tranquillité.<a href="/web-info-about">Apprendre encore plus</a>
                    </p>
                    <a class="yha_a_btn" href="/web-info-act">Activité</a>

                    <a class="yha_a_btn" href="/web-info-env">Environnement</a>

                    <div class="card-discount">

                    </div>

                </div>

                <div class="yha_a_l_2">

                    <h3>FAQ</h3>

                    <p>

                        <a href="/web-topic-view-dif">Difference entre l'auberge de jeunesse<font style="vertical-align:super;font-size:50%; ">&reg;</font>et l'hôtel </a>

                        <a href="/web-topic-view-que">Questions et réponses</a>
                        
                        <a href="/web-topic-view-plus" class="more">Apprendre encore plus</a>

                    </p>

                </div>

            </div>

            <div class="yha_a_r fr">

                <h3>Emplacement de l’adresse<font style="vertical-align:super;font-size:50%; ">&reg;</font></h3>

                <p>

                    <br/>Affichez-vous notre adresse

                </p>

                <br/>

                <!-- <div id="main" style="height:400px">

                </div> -->
                <div id="map" style="height:400px">

                </div>

            </div>

           <!-- Gabby——20180320修改 hihostels预订链接 -->  
            <!-- <div class="book-aboard">
            </div> -->

            <!-- <div class="overseas-login" style="position:fixed; left:50%; top:50%;width:320px;height:280px;padding:10px 0;margin:-140px 0 0 -160px;overflow:hidden;background:#F1F1F1;box-shadow: 0 0 0 50vmax rgba(0,0,0,.8); z-index:999999;display:none;">

                <span class="close-overseas-login fr" style="margin:0 20px 0 0;color:#666;cursor:pointer;">点击关闭</span>

                <p class="iframe-load" style="text-align:center;position:absolute;left:45%;top:45%;color:#000;">

                    loading...

                </p>

            </div>  -->

        </div>

    </div>

    <div class="about_us">

        <div class="about_text w1080">

            <h2>À propos de nous——SCI-EUROPE<font style="vertical-align:super;font-size:50%; ">&reg;</font>auberge de jeunesse<font style="vertical-align:super;font-size:50%; ">&reg;</font></h2>

            <p class="p1">

                Nous préconisons <i></i>

            </p>

            <p class="p2">

                Échange culturel, responsabilité sociale, pratique de la protection de l'environnement, soin de la nature

                <br/>Vie simple et de qualité, entraide et aide aux autres.

            </p>
            <a href="/web-info-about">appendre plus</a>
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





    <script src="js/jquery.min.js"></script>

    <script src="js/SuperSlide.js"></script>

    <script src="js/app.js"></script>

    <script src="js/kuCity.js"></script>

    <script src="js/echarts.js"></script>

    <script src="js/laydate.dev.js"></script>

    <script src="js/jquery.magnific-popup.js"></script>

    <script type="text/javascript">

        $('#place').kuCity();

        $('#place').click(function(){

            $('.kucity').click(function(){

                if($('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())) > 0){

                    $('body,html').stop().animate({

                        scrollTop:$('body,html').scrollTop()+$('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())-20)

                    })

                }

            })

            if($('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())) > 0){

                $('body,html').stop().animate({

                    scrollTop:$('body,html').scrollTop()+$('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())-20)

                })

            }

        })

    </script>

    <script>

        var start = {

            elem: '#Date_a',

            format: 'YYYY-MM-DD',

            min: laydate.now(), //设定最小日期为当前日期

            max: laydate.now(+180), //最大日期

            event:'focus',

            choose: function(datas){

                end.min = datas; //开始日选好后，重置结束日的最小日期

                end.start = datas //将结束日的初始值设定为开始日

                $('#Date_b').focus();

            }

        };

        var end = {

            elem: '#Date_b',

            format: 'YYYY-MM-DD',

            min: laydate.now(),

            max: laydate.now(+180),

            event:'focus',

            

        };

        laydate(start);

        laydate(end);

    </script>

 

</body>

</html>