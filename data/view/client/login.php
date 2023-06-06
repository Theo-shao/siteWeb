<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- keywords -->
	    <meta name="keywords" content="Auberge de jeunesse,Voyage,Reservation en ligne,Reservation d'hotel,Pratique,Location">
	    <!-- description -->
	    <meta name="description" content="SCI-Europe bénéficie d'une situation géographique supérieure en France, d'un transport pratique, d'un environnement confortable, d'un service attentionné et fournit des informations touristiques locales détaillées. Choisissez l'auberge de jeunesse SCI et profitez pleinement de votre voyage à Paris ! !">
	    <!-- petit icon -->
	    <link rel="shortcut icon" href="" />
        <title>SCI-EUROPE/Activité</title>
        <link rel="stylesheet" href="../../../css/app.css" />
        <style>
        .error {color: #FF0000;}
        </style>
    </head>
    <body style="filter: gray;">
    <?php
    $password = $email = "";
    $emailErr = $passwordErr = "";
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "sci";

    // 创建数据库连接
    $conn = new mysqli($hostname, $username, $password, $database);

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("数据库连接失败: " . $conn->connect_error);
    } else {
        echo "成功连接到数据库";
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        if (empty($_POST["email"]))
        {
            $emailErr = "E-mail est obligatoire";
        }
        else
        {
            $email = test_input($_POST["email"]);
            // 检测邮箱是否合法
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
            {
                $emailErr = "Format de boîte aux lettres illégal"; 
            }
        }
        
    }

    function test_input($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    ?>
        <div class="login-and-registration-con login">
            <div class="login-and-registration">
                <h1>
                    <a href="./"></a>
                </h1>
                <div class="login-and-registration-form">
                    <form class="login-form" action="" method="post" id="form">
                        <h2>
                            <span>Bienvenu à tous
                                <font style="vertical-align:super;font-size:50%; ">®</font>
                            </span>
                        </h2>
        
                        <dl class="login-and-registration-dl">
                            <dd>
                                <label class="login-and-registration-icon1"></label><input type="text" placeholder="E-mail" name="email"><span class="error"><?php echo $emailErr;?></span>
                            </dd>       
                            <dd>
                                <label class="login-and-registration-icon2"></label><input type="password" placeholder="mot de passe" name="password"><span class="error"><?php echo $passwordErr;?></span>
                            </dd>
                        </dl>
                        
                        <div class="self-and-forget clearfix">
                            <span class="checkbox_item fl">
                                <input type="checkbox" name="remember" value="1">
                                <label class="check_label">
                                    <i class="checkbox_icon"></i>
                                    <span class="checkbox_text">Automatique</span> 
                                </label>       
                            </span>
                            <!-- <span class="forget fr">oublier le mot de passe ? <a href="/web-index-getpassword1">点击重置&gt;&gt;</a></span> -->
                        </div>
                        <!-- <a href="javascript:$('#form').submit()" class="login-btn">登录</a> -->
                        <input type="submit" name="submit" class="login-btn" value="Submit"> 
                    </form>    
                    <?php

        if (empty($_POST["password"]))
        {
            $passwordErr = "Mot de passe est obligatoire";
        }
        else{
            $password = test_input($_POST["password"]);
            $sql = "SELECT * FROM usertable WHERE email=$email and pass=$password";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // 输出每行数据
                    echo "ID: " . $row["email"] . " creé! " ;
                }
            }
            else{
                echo $passwordErr;
            }
        }
        // 关闭数据库连接
        $conn->close();
?>       
                </div>
            </div>
        </div>
        
        
        
        <script src="../../../js/jquery.1.12.1.min.js"></script>
        <script src="../../../js/checkbox.js"></script>
        
        <script type="text/javascript">
            $(".check_label").checkbox();
            jQuery(document).ready(function() {
                var autoLogin = getCookie('autoLogin');
                if ( autoLogin ){
                    autoLogin = decodeURI(autoLogin);
                    var arr = autoLogin.split("|");
                    var u = arr[0];
                    var p = arr[1];
                    if( u && p ) {
                        $.post("web-index-autoLoginCheck",{username:u,password:p},function(msg){
                            if ( 1==msg ) {
                                location.href = "web-index-index"
                            }
                        })
                    }
                }else{
                    var sid = setInterval(function(){
                        $.get("web-index-isLogin",function(m){
                            if(m == 0){
                                //clearInterval(sid);
                                location.href = "web-index-index";
                                return;
                            }
                            if(m==1){
                                location.href = "web-index-bind?t=qq";
                            }
                            if(m==2){
                                location.href = "web-index-bind?t=wx";
                            }
                        })
                    }, 2000)
                }
            });
        
        
        
            function getCookie(cname) {
        
                var name = cname + "=";
        
                var ca = document.cookie.split(';');
        
                for(var i=0; i<ca.length; i++) {
        
                    var c = ca[i];
        
                    while (c.charAt(0)==' ') c = c.substring(1);
        
                    if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
        
                }
        
                return "";
        
            }
        
        </script>
        
        
        
        <script type="text/javascript">
        
            var childWindow;
        
            function toQzoneLogin() {
        
                childWindow = window.open("web-index-qqlogin","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
        
            }
        
        
        
            function closeChildWindow() {
        
                childWindow.close();
        
            }
        
        </script>
        
        
        
        <script type="text/javascript">
        
            var childWindow;
        
            var path = "https://open.weixin.qq.com/connect/qrconnect";
        
            var appid = 'wx387fcce1da633cf9';
        
            var redirect_uri = "http://www.yhachina.com/web-index-wxloginCallback";
        
        
        
            var path = "https://open.weixin.qq.com/connect/qrconnect?appid=" + appid + "&redirect_uri=" + encodeURI(redirect_uri);
        
            path += "&response_type=code&scope=snsapi_login";
        
        
        
            function toWeixinLogin(){
        
                childWindow = window.open(
        
                        path,
        
                        "TencentLogin",
        
                        "width=450,height=520,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1"
        
                );
        
            }
        
            function closeChildWindow(){
        
                childWindow.close();
        
            }
        
        </script>
        
        
        
    </body>
</html>