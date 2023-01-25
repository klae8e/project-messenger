<?php 
  session_start();
  include 'functions/ban_checker.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/mainstyle.css" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Chats</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body style="background-color: #B4D3D6;">
  <?php
    include "connect.php";

    #include "checker.php";

    /*
    if(count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
      } else {
        echo "Cookies are disabled.";
      }
    */

    if (!$_SESSION['user']) {
      header("Location: index.php"); exit;
      $_SESSION['message'] = 'Error 0: Sign in please!';
    }
    else{

            #print "Привет, ".$row['login'].". Всё работает!";

            ?>
            <div id="ex0" class="container-fluid">
              <div id="ex1" class="container-fluid">

                <div id="ex2" class="container-sm">
                  <div id="ex3" class="row">

                    <span id="nav1" class="col-sm-2  text-center my-auto">
                      <a class="navigations" value="Profile" href="profile.php?id=<?php echo $_SESSION['user']['id']?>"><img src="images/user.png" class="logos"> Profile</a>
                    </span>
                    <span id="nav2" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="mainpage.php?id=<?php echo $_SESSION['user']['id']?>"><img src="images/message.png" class="logos1"> Chats</a>
                    </span>

                    <span id="nav3" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="friends.php?id=<?php echo $_SESSION['user']['id']?>"><img src="images/friends.png" class="logos1"> People</a>
                    </span>  

                    <span id="nav4" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="forum.php?id=<?php echo $_SESSION['user']['id']?>"><img src="images/logout.png" class="logos1"> Forum</a>
                    </span>

                    <span id="nav4" class="col-sm-2 text-center my-auto">
                      <?
                        if ($_SESSION['user']['role'] != 0) {
                      ?>
                      <a class="navigations" value="Profile" href="adminpanel.php?id=<?php echo $_SESSION['user']['id']?>"><img src="images/logout.png" class="logos1"> Admin</a>
                      <?
                        }
                      ?>
                    </span>

                    <span id="nav4" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="logout.php?id=<?php echo $_SESSION['user']['id']?>"><img src="images/logout.png" class="logos1"> Log out</a>
                    </span>

                  </div>
                </div>
              </div>


              <div id="ex4" class="container-fluid">
                <div class="container bgcl2">


                  <div id="plable" class="text-center">ONLINE WORLD CHAT</div>

                          <?php 
                    
                            $result = mysqli_query($sql, "SELECT * FROM `users` WHERE id = '".$_GET['id']."' limit 1 ");
                            $user = mysqli_fetch_assoc($result); 
                             
                            #echo $user['login'];

                          ?>
                    <div class="row2 bgcls2">
                      <div class="row bgcl bgclx">

                          <div id="" class="col-sm-4 my-auto text-center">
                            <span class="my-auto txtsize">
                              <a href="profile.php?id=<?php echo $user['id']?>" class="click2x">Your login: <?php echo $user['login']?></a>
                            </span>
                          </div>

                          <div id="" class="col-sm-4 my-auto text-center">
                            <img id="avatar2" class="text-center" src="<?php echo $user['user_img'] ?>">
                          </div>

                          <!--<div id="" class="col-sm-2 list my-auto text-center"><span class="my-auto">Active: <?php echo $user['active']?></span></div>-->
                          <div id="" class="col-sm-4 list my-auto text-center">
                            <span class="my-auto">your id: <?php echo $user['id']?></span>
                          </div>

                        </div>
                      </div>
                        

                    <div class="container">
                      <div id="messages" class="container col-sm-8 center-block"></div>

                      <form id="smsform" action="javascript:send();" method="post" class="container col-sm-8 center-block">
                        <div class="row row3">
                          <div class="col-sm-1"></div>
                          <input id="sms" type="text" class="col-sm-8 my-auto" placeholder="write here" required>
                          <button id="smsbtn" type="submit" class="col-sm-2 my-auto">Send!</button>
                          <div class="col-sm-1"></div>
                        </div>
                      </form>
                    </div>

            </div>


</div>
              <div id="plable2" class="text-center">END</div>

            </div>

        <?php
          
        }
        
        ?>
      <script>
          function send() {
                    //Считываем сообщение из поля ввода с id sms
                    var mess=$("#sms").val();
                    // Отсылаем паметры
                    $.ajax({

                      type: "POST",
                      url: "worldchatadds.php",
                      data:"mess="+mess,
                      // Выводим то что вернул PHP
                      success: function(html)
                        {
                          //Если все успешно, загружаем сообщения
                          load_messes();
                          //Очищаем форму ввода сообщения
                          $("#sms").val('');
                            }
                      });
                }

                function load_messes()
                  {
                    $.ajax({
                      type: "POST",
                      url:  "worldchatloads.php",
                      data: "req=ok",
                      // Выводим то что вернул PHP
                      success: function(html)
                        {
                          //Очищаем форму ввода
                          $("#messages").empty();
                          //Выводим что вернул нам php
                          $("#messages").append(html);
                          //Прокручиваем блок вниз(если сообщений много)
                          $("#messages").scrollTop(9000);
                                }
                        });
                  }

                load_messes();
                //Ставим цикл на каждые три секунды
                setInterval(load_messes,3000);
      </script>

</body>
</html>