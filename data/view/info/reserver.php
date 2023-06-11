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
        <input type="hidden" id="qtype" name="qtype" value="">
        <input type="hidden" id="qhotel" name="qhotel" value="">
        <input type="hidden" id="qservice" name="qservice" value="">
        <input type="hidden" id="qdevice" name="qdevice" value="">
        <input type="hidden" id="qprice" name="qprice" value="">
        <!-- -搜索框- -->
        <div class="list-dp">
            <div class="w1080">
                <ul class="clearfix">
                    <li class="datalist-input1">
                        <label for="Date_a">Date d'arrivée&nbsp;&nbsp;</label>|
                        <input id="Date_a" type="text" value="">
                    </li>
                    <li class="datalist-input2">
                        <label for="Date_b">Date de départ&nbsp;&nbsp;</label>|
                        <input id="Date_b" type="text" value="">
                    </li>
                    <li>
                        <button type="submit" onclick="queryHotel(1)">Rechercher</button>
                    </li>
                </ul>
            </div>
        </div>

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
                <div class="can-book-l fl">
                <!-- -排序方式- -->
                    <div class="title">
                        <span>Trier par：</span>
                        <a href="javascript:void(0);" class="down-up" onclick="downup(this,'roomMinPrice')">
                            <span>prix</span>
                            <b></b>
                        </a>
                    <!-- <a href="javascript:void(0);" onclick="downup(this,'LsLat')"><span>距离市中心</span><b></b></a> -->
                    </div>
                    <!-- -旅舍列表- -->
                    <ul class="c-b-l-list">
                      <li class="clearfix" data-map="23.125121, 113.308268" onclick="show_marker(104983);" id="list-hostel-104983">
                        <div class="left fl">
                            
                        </div>
                        <div class="right fr">
                            <div class="dianping">
                                <p class="fr">
                                <!-- <a href="/web-hostel-detail-id-104983?tag=hostel-nav-i7" class="comment">
                                    <b></b>点评
                                </a>
                                <a href="javascript:void(0);" onclick="addfavorite(this,104983);" class="collection">
                                    <b></b>收藏
                                </a> -->
                                </p>
                                <h2>
                                    <a href="#" target="_blank"></a>
                                </h2>
                            </div>
                            <b></b>
				            <div class="advantage"></div>
                            <div class="advantage"></div>
                            <div class="price clearfix">
                                <div class="price-l fl">
                                </div>
                                <div class="price-r fr">
                                    <a class="sold-out" href="#">en rupture</a>              
                                </div>
                            </div>
                        </div>
                        <div class="divab">
                <!-- 来晚了！这家旅舍的住宿在我们网站已售完 -->
                        </div>
                      </li>
                    </ul>
                    <div class="page-box clearfix" style="display: block;">
                <!-- <p class="fl">
                    未找到理想的旅舍？返回
                    <a href="javascript:void(0);" class="scrTop">
                        <img src="images/ssym.jpg">搜索页面
                    </a>
                </p> -->
                    <!-- -分页- -->
                    <div id="pagelist"></div>
                    </div>
                <!-- -浏览记录- -->
                    <!-- <div class="browsing">
                        <h2>Historique</h2>
                        <dl class="clearfix">
                        </dl>
                    </div> -->
                </div>
            </div>
        </div>



    <!-- -右下角小图标- -->
        <div class="Side_r">
            <ul>
        <!-- <li class="Side_weixin"><a href="#"></a>
            <div class="Side_weixin_b">
                <img src="images/Side_erweima.jpg" height="90" width="90" alt="">
            </div>
        </li>
        <li class="Side_weibo"><a href="http://service.weibo.com/share/share.php?url=www.yhachina.com/web-hostel-index" target="_blank"></a></li>
        <li class="Side_xiaoxi"><a href="/web-info-suggest"></a></li> -->
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