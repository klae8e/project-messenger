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
    <title>Forum</title>
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
                  <h2 class="mx-4 mb-4">Forum</h2>
                  
                  <div class="row">
                    
                    <form method="post" class="col-sm-12 mt-3 mx-4">
                      <input type="text" id="smsbtn" name="seacrh_topic" placeholder="Write name of topic">
                      <input type="submit" id="smsbtn" name="seacrh_btn" value="Search">

                    </form>

                    <form method="post" class="col-sm-12 mt-3 mx-4">
                      <input type="submit" id="smsbtn" name="create_topic" value="Create topic">

                    </form>
                  </div>

                  <?

                      if(isset($_POST['seacrh_topic'])) {
                        #echo "This is Button1 that is selected";
                        #echo $_SESSION['user']['id'];
                        ?>

                        <div style="background-color: #B4D3D6; padding: 25px; margin: 25px; border-radius: 50px;">
                          <h3 class="mt-5 mx-5">Found:</h3>
                          <?

                          include 'connect.php';

                          $query_topicx = "select users.id, users.login, all_topic.topic_id, all_topic.author, all_topic.name_topic, all_topic.textarea, all_topic.date from users inner join all_topic on users.id = all_topic.author where name_topic='".$_POST['seacrh_topic']."'";
                          $querytx = mysqli_query($sql, $query_topicx) or die("1. error_sql!");

                          while ($row = $querytx->fetch_assoc()) { 
                            
                            echo "<div class='row mb-3 bgclx border rounded m-5 p-3' style='background-color: azure; color: #2A396B;box-shadow: 0 0 20px white;'>";

                            echo "<div class='col-sm-6'>Topic: <a href=sites/topics.php?author="."".$row['author']."&id=".$row['topic_id'].""." class='navigations' style='color:black'>".$row['name_topic']."</a></div>";
                            echo "<div class='col-sm-6 text-end'>Author: ".$row['login']."</div>";
                            echo "<div class='col-sm-10' style='padding:10px'>".$row['textarea']."</div><div class='col-sm-12 text-end'>Date: ".$row['date']."</div>";
                            echo "</div>";
                            echo "";
                          }

                          ?>
                        </div>
                  <?

                      }

                  ?>
                    <?

                      if(isset($_POST['create_topic'])) {
                        #echo "This is Button1 that is selected";
                        #echo $_SESSION['user']['id'];
                        ?>
                          <form method="post" action="functions/create_topic.php" class="col-sm-4 rounded" style="background-color:white;margin:15px 0 25px 25px;padding:5px 0 25px 25px;">
                            <div class="col-sm-12 mt-5">
                              
                              <div class="">
                                <div class="col-sm-2">Topic title:</div>
                                <input class="col-sm-8" type="text" name="name_topic" required>
                              </div>
                                  
                                
                              
                              
                              <div class="mt-3">

                                Access: 
                                <div>
                                  <label for="Public">Public</label> 
                                  <input type="radio" name="access" value="Public" required>

                                  <label for="Private">Private</label> 
                                  <input type="radio" name="access" value="Private" required>
                                </div>
                              </div>
                              <br>

                              <div class="col-sm-11 center-block">
                                <textarea class="col-sm-8" rows="10" cols="32" name="text_topic" required></textarea>
                              </div>
                              <div class="mt-3 mb-3"><input id='smsbtn' type="submit" name="topic_submit"></div>
                            </div>
                          </form>


                        <?
                        
                      }


                    ?>
                    <div>
                      <p id="plable6">
                        
                      <?

                        if (isset($_SESSION['message'])) {
                          echo $_SESSION['message'];
                        }
                        unset($_SESSION['message']);
                      

                      ?>
                      </p>
                    </div>
                    <div style="background-color: #B4D3D6; padding: 25px; margin: 25px; border-radius: 50px;">
                      <h2 class="mx-4 mt-5">All theme</h2>

                      <?

                      $query_topic = "select users.id, users.login, all_topic.topic_id, all_topic.author, all_topic.name_topic, all_topic.textarea, all_topic.date from users inner join all_topic on users.id = all_topic.author";
                      $queryt = mysqli_query($sql, $query_topic) or die("1. error_sql!");

                      while ($row = $queryt->fetch_assoc()) { 
                        
                        echo "<div class='row mb-3 bgclx border rounded m-5 p-3' style='background-color: azure; color: #2A396B;box-shadow: 0 0 20px white;'>";
                        echo "<div class='col-sm-6'>Topic: <a href=sites/topics.php?author="."".$row['author']."&id=".$row['topic_id'].""." class='navigations' style='color:black'>".$row['name_topic']."</a></div>";
                        echo "<div class='col-sm-6 text-end'>Author: ".$row['login']."</div>";
                        echo "<div class='col-sm-10' style='padding:10px'>".$row['textarea']."</div><div class='col-sm-12 text-end'>Date: ".$row['date']."</div>";
                        echo "</div>";
                        echo "";
                      }

                      ?>
                    </div>

                </div>
              </div>

       <?php
          
        }

        ?>

        <div id="plable2" class="text-center">END</div>

        </div>

</body>
</html>