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
    </head>
    <body style="filter: gray;">
        <?php
        $password = $email = $tel = $password2='';
        $emailErr = $passwordErr = '';
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
        <div class="login-and-registration-con registration">
            <div class="login-and-registration">
                <form method="post" action="" id="form">
                    <div class="login-and-registration-form">
                        <h2>
                            <span style="border-color:#87c524;">Bienvenu à tous
                                <font style="vertical-align:super;font-size:50%; ">®</font>
                            </span>
                        </h2>
        
                        <dl class="login-and-registration-dl">
                            <dd>
                                <label class="login-and-registration-icon4"></label><input type="text" placeholder="E-mail（obligatoire）" name="email" required=""><span class="error"><?php echo $emailErr;?></span>
                            </dd>
                            <dd class="clearfix">
                            <div class="fr" style="width:398px;">
                                <input type="password" placeholder="mot de passe（6~16 lettres/chiffres）" style="border-bottom:1px solid #ccc;" name="password" required=""><span class="error"><?php echo $passwordErr;?></span>
                                <input type="password" placeholder="confirmer à nouveau" name="password2" required="">
                            </div>
                                <label class="login-and-registration-icon2" style="vertical-align:-38px;"></label>
                            </dd>
                            <dd>
                                <label class="login-and-registration-icon3"></label><input type="text" placeholder="Télephone" name="tel" required="">
                            </dd>
                        </dl>
        
                        <div class="self-and-forget">
                           <span class="checkbox_item">
                            <input type="checkbox" name="tnc" value="1" checked="">
                             <label class="check_label on ">
                               <i class="checkbox_icon"></i>
                               <span class="checkbox_text">我已阅读并同意</span>
                             </label>
                               <a href="#" style="color:#4b8fcc;">《青年旅舍<font style="vertical-align:super;font-size:50%; ">®</font>用户注册协议》</a>
                           </span>
                      </div>
        
                        <button class="login-btn" style="background:#87c524;" type="submit" >Inscription</button>
                        <div style="float: right;margin-top: 5px;"><a href="http://localhost/site/siteWeb/data/view/client/login.php">déja avoir compte, retournez à Connexion</a></div>
                    </div>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){   
                    if (empty($_POST["email"])){
                        $emailErr = 'E-mail est obligatoire';
                    }
                    else{
                        $email = test_input($_POST["email"]);
                        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
                            $emailErr = 'Format de boîte aux lettres illégal'; 
                        }
                    }  
                    
                    if (empty($_POST["password"]))
                    {
                        $passwordErr = 'Mot de passe est obligatoire';
                    }
                    else{
                        $password = test_input($_POST["password"]);
                    }  

                    if (empty($_POST["password2"]))
                    {
                        $passwordErr = 'Mot de passe est obligatoire';
                    }
                    else{
                        $password2 = test_input($_POST["password2"]);
                        $tel = test_input($_POST["tel"]);
                        if($password != $password2){
                            $passwordErr = 'Les deux mots de passe ne sont pas identiques';
                        }
                        else{
                            $sql = "INSERT INTO usertable (email, pass, tele) VALUES ('$email', '$password', '$tel');";
                            $result = $conn->query($sql);
                            if ($result === false) {
                                echo $conn->error;
                            } else {
                                echo "Inscription réussit";
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
        
        <script src="../../../js/jquery.1.12.1.min.js"></script>
        
        <script type="text/javascript">
            $(".check_label").click(function(){
                if ( $(this).hasClass("on") ){
                    $(this).removeClass('on')
                    $(this).siblings("input").attr("checked", false);
                }else{
                    $(this).addClass('on')
                    $(this).siblings("input").attr("checked", "checked");
                }
            })

            function getcode(t){
                $.post('web-index-reigsterCode',{},function(msg){
                    $(t).html(msg);
                })
            }
        </script>
        </body>
</html>