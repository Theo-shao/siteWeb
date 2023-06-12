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
                <a class="logo" href="/">SCI-EUROPE</a>            
                <div class="top-user-panel">          
                    <a href="http://localhost/site/siteWeb/data/view/client/gestion.php" class="user-login">Gestion de commande</a>       
                    |                           
                    <a href="http://localhost/site/siteWeb/data/view/client/inscription.php" class="user-login"><img src="../../../images/market/user-icon.png">Inscription</a>  
                    | 
                    <a href="http://localhost/site/siteWeb/data/view/client/login.php" class="user-login">Connexion</a>                                 
                    <div class="lang">                    
                    | 
                        <a href="index.html" class="fr"><img src="../../../images/market/FR.jpg" alt="Francais">FR</a>
                    |
                        <a href="/en-web-index-index" class="cn"><img src="../../../images/market/CN.gif" alt="中文">CN</a>  
                    </div>             
                </div>            
                <ul class="top-nav">                 
                    <li><a href="http://localhost/site/siteWeb/data/view/info/about.html">Présentation</a></li>                               
                    <li><a href="http://localhost/site/siteWeb/data/view/info/reserver.php">Réservation</a></li>                                              
                    <li><a href="http://localhost/site/siteWeb/data/view/info/act.html">Voyage/Activité</a></li>             
                    <li><a href="http://localhost/site/siteWeb/data/view/info/contact.html">Contact</a></li>                
                </ul>     
            </div>    
        </div>
        <div style="height:117px;"></div>
        <!-- -搜索框- -->
        <div class="list-dp">
            <div class="w1080">
            <form id="frmQuery" name="frmQuery" method="post" action="">
                <ul class="clearfix">
                    <li class="datalist-input1">
                        <label for="Date_a">Date d'arrivée&nbsp;&nbsp;</label>|
                        <input id="Date_a" type="text" value="" name="stime" required="required">
                    </li>
                    <li class="datalist-input2">
                        <label for="Date_b">Date de départ&nbsp;&nbsp;</label>|
                        <input id="Date_b" type="text" value="" name="etime" required="required">
                    </li>
                    <li>
                        <button type="submit">Rechercher</button>
                    </li>
                </ul>
            </form>
            </div>
        </div>
        <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $stime = test_input($_POST["stime"]);
                    $etime = test_input($_POST["etime"]);
                    $sql = "SELECT * from chambres where num NOT IN (SELECT ch.num FROM commend c,chambres ch WHERE ch.num=c.num_chambre and '$stime'<c.datefin ) ;";
                    $result = $conn->query($sql);
        ?>
        <div class="w1080">
        <!--刷选条件-->
            <div class="list-screen-box">
            </div>
            <h3 class="sure-title">
                <span id="search_cityname">Paris</span>：il reste
                <font id="search_hotelnum">1</font> chambres à reserver
            </h3>
            <div class="can-book-box clearfix">
            <!-- -左栏 旅店搜索列表- -->
            <?php
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
            </div>
        </div>



    <!-- -右下角小图标- -->
        <div class="Side_r">
            <ul>
                <li class="Side_top"><a href="javascript:void(0);"></a></li>
            </ul>
        </div>





    <!-- BEGIN FOOTER -->

        <div class="footer">

        <div class="footer_h">
   
           <ul class="clearfix w1080">
                <li><a href="http://localhost/site/siteWeb/data/view/info/about.html">Présentation</a></li>                               
                <li><a href="http://localhost/site/siteWeb/data/view/info/reserver.php">Réservation</a></li>                                              
                <li><a href="http://localhost/site/siteWeb/data/view/info/act.html">Voyage/Activité</a></li>             
                <li><a href="http://localhost/site/siteWeb/data/view/info/contact.html">Contact</a></li> 
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






    <script src="../../../js/jquery.1.12.1.min.js"></script>

    <script src="../../../js/SuperSlide.js"></script>

    <script src="../../../js/checkbox.js"></script>

    <script src="../../../js/eachshow.js"></script>

    <script src="../../../js/app.js"></script>

    <script src="../../../js/kuCity.js"></script>

    <script src="../../../js/laydate.dev.js"></script>

    <script src="../../../js/artemplate.js"></script>

    <script src="//webapi.amap.com/maps?v=1.3&amp;key=7d952eca6eb846d6925e1e81bb47a537"></script>
    
    <script id="amap_main_js" src="http://webapi.amap.com/maps/main?v=1.3&amp;key=7d952eca6eb846d6925e1e81bb47a537&amp;m=http,map,anip,layers,overlay0,brender,mrender,mouse,vectorlayer,overlay,wgl,sync&amp;vrs=1626325996276" type="text/javascript"></script>

    <script src="../../../js/hotel_lists.js"></script>

    <script type="text/javascript">
        showHotel(1);
    </script>

    <script type="text/html" id="hotelTemplate">
        <li class="clearfix" data-map="<%=lsLat%>, <%=lsLng%>" onclick="show_marker(<%=lsID%>);" id="list-hostel-<%=lsID%>" >
            <div class="left fl">
                <a href="/web-hostel-detail-id-<%=lsID%>" target="_blank" >
                    <img src="<%=lsHomeImg%>" width="220" height="150" >
                </a>
            </div>
            <div class="right fr">
                <div class="dianping">
                    <p class="fr">
                        <a href="/web-hostel-detail-id-<%=lsID%>?tag=hostel-nav-i7" class="comment">
                            <b></b>点评
                        </a>
                        <a href="javascript:void(0);" onclick="addfavorite(this,<%=lsID%>);" class="collection">
                            <b></b>收藏
                        </a>
                    </p>
                    <h2>
                        <a href="/web-hostel-detail-id-<%=lsID%>" target="_blank" ><%=lsName%>
                        </a>
                    </h2>
                </div>
                <p><b></b><%=lsAddress%></p>
				<div class="advantage">
                    <% for (var i = 0; i < honoursArray.length; i++) { %>
						<% if(honoursArray[i].length > 2) {%>
							<span><%=honoursArray[i]%></span>
						<% } %>
                    <% } %>
                </div>

                <div class="advantage">
                    <%=hoteldevices%>
                </div>

                <div class="price clearfix">
                    <div class="price-l fl">
                  <% if(bookmaxcount > 0) {%>
				<% if(bedMinPrice > 0) {%>
				<span>
                            <i>床位</i>
                            <strong><%=bedMinPrice%> 元起</strong>
                          </span>
				<% } %>

				<% if(roomMinPrice > 0) {%>
                <span>
                  <i>房间</i>
                  <strong><%=roomMinPrice%> 元起</strong>
                </span>
				<% } %>
                    <% } %>
                    </div>

                    <div class="price-r fr">

                        <% if(bookmaxcount == 0) {%>

                        <a class="sold-out" href="#">已售完</a>

                        <% }else{ %>

                        <a class="choice" href="/web-hostel-detail-id-<%=lsID%>">选择客房</a>

                        <% } %>

                    </div>

                </div>

            </div>

            <div class="divab">

                <% if(bookmaxcount == 0) {%>

                来晚了！这家旅舍的住宿在我们网站已售完

                <% } %>

            </div>

        </li>

    </script>




    </body>
</html>