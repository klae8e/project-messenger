<?php 
  session_start();
  include 'functions/ban_checker.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/mainstyle.css" rel="stylesheet" type="text/css" >
    <!-- Bootstrap CSS (jsDelivr CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<title>Friends</title>
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
      header("Location: 404.html");exit();
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

              <!--
              <div class="container">
                <div>
                    
                    <div class="col-sm-3 my-auto">
                        <input type="text" class="form-control rounded-pill" name="live_search" id="live_search" autocomplete="off" placeholder="Search ...">
                    </div>
                    </br>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $("#live_search").keyup(function () {
                                    var query = $(this).val();
                                    if (query != "") {
                                        $.ajax({
                                            url: 'ajax.php',
                                            method: 'POST',
                                            data: {
                                                query: query
                                            },
                                            success: function (data) {
                                                $('#search_result').html(data);
                                                $('#search_result').css('display', 'block');
                                                $("#live_search").focusout(function () {
                                                    $('#search_result').css('display', 'block');
                                                });
                                                $("#live_search").focusin(function () {
                                                    $('#search_result').css('display', 'block');
                                                });
                                            }
                                        });
                                    } else {
                                        $('#search_result').css('display', 'block');
                                    }
                                });
                            });
                        </script>
                </div>
              </div>
-->
              <div id="ex4" class="container-fluid">
                <div class="container bgcl2">

                  <form method="post" class="col-sm-12 mt-3 mx-4">
                      <input type="text" id="smsbtn" name="seacrh_user" placeholder="Write user login">
                      <input type="submit" id="smsbtn" name="seacrh_u_btn" value="Search">

                  </form>

                  
                    <div>
                    <?
                      if(isset($_POST['seacrh_user'])) {
                        $queryselect0 = "SELECT * FROM users where login='".$_POST['seacrh_user']."'";
                        $query0 = mysqli_query($sql, $queryselect0) or die("1. Query hat nicht funktioniert!");
                        while ($row = $query0->fetch_assoc()) {
                          if ($row['id'] == $_SESSION['user']['id']) {
                            // skipping
                          }
                          else{
                      ?>
                      <div style="background-color: #B4D3D6; padding: 25px; margin: 25px; border-radius: 50px;">
                      <h3 class="mt-5 mx-5">Found:</h3>
                      <div class="row2 bgcls">
                          
                        <div class="row bgcl bgclx">
                          <div id="" class="col-sm-3 my-auto text-center"><img class="my-auto" id="avatar2" src="<?php echo $row['user_img'] ?>"></div>
                          <div id="" class="col-sm-3 my-auto text-center"><span class="my-auto txtsize"><?php echo $row['login']?></span></div>
                          <div id="" class="col-sm-2 list my-auto text-center"><span class="my-auto"><a class="list2" href="chat.php?id=<?php echo $row['id']?>">Chat</a></span></div>
                          <div id="" class="col-sm-2 list my-auto text-center"><span class="my-auto"><a class="list2" href="profile.php?id=<?php echo $row['id']?>">Profile</a></span></div>
                          <div id="" class="col-sm-2 my-auto text-center"><span class="my-auto txtsize">Id: <?php echo $row['id']?></span></div>
                        </div>
                      </div>
               

                        <?php
                        
                        }  
                      }
                    }

                    ?>

                  </div>

                  
                  
                  <?php 
                    echo '<div class="text-center" style="background-color: #B4D3D6; padding: 25px; margin: 25px; border-radius: 50px;"><h3>ALL REGISTERED</h3>';
                    $queryselect = "SELECT * FROM users";
                    $query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");
                    while ($row = $query->fetch_assoc()) {
                      if ($row['id'] == $_SESSION['user']['id']) {
                        // skipping
                      }
                      else{
                  ?>
              
                  <div class="row2 bgcls">
                    <div class="row bgcl bgclx">
                      <div id="" class="col-sm-3 my-auto text-center"><img class="my-auto" id="avatar2" src="<?php echo $row['user_img'] ?>"></div>
                      <div id="" class="col-sm-3 my-auto text-center"><span class="my-auto txtsize"><?php echo $row['login']?></span></div>
                      <div id="" class="col-sm-2 list my-auto text-center"><span class="my-auto"><a class="list2" href="chat.php?id=<?php echo $row['id']?>">Chat</a></span></div>
                      <div id="" class="col-sm-2 list my-auto text-center"><span class="my-auto"><a class="list2" href="profile.php?id=<?php echo $row['id']?>">Profile</a></span></div>
                      <div id="" class="col-sm-2 my-auto text-center"><span class="my-auto txtsize">Id: <?php echo $row['id']?></span></div>
                    </div>
                  </div>
           

                    <?php
                  }
                      }
                      echo '</div>';
                    ?>

                </div>
              </div>

              <div id="plable2" class="text-center">END</div>

            </div>

      <?php

      }

?>

</body>
</html>