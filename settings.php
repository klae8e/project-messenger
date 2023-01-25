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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Profile</title>
  <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body style="background-color: #B4D3D6;">
  <?php
    include "connect.php";

    if (!$_SESSION['user']) {
      header("Location: 404.html");exit();
    }

    else{ 
            $resultx = mysqli_query($sql, "SELECT * FROM `users` WHERE id = '".$_GET['id']."' limit 1 ");
            $userx = mysqli_fetch_assoc($resultx); 
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              #echo '<pre>';
              #print_r($_POST);
              #print_r($_FILES);
              #$imgid = ($userx['id']);
              #echo $imgid;
              #echo '</pre>';

              if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
                $filename = "uploads/".$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $filename);

                if (file_exists($filename)) {
                  $imgset = "UPDATE `users` SET `user_img`='".$filename."' WHERE `id` = '".$userx['id']."'";
                  mysqli_query($sql, $imgset) or die("2. Query hat nicht funktioniert!");
                  header("Location: profile.php?id=".$_SESSION['user']['id']);exit();

                }
              }
              else{
                echo "please add a valid image!";
              }

            }

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
                   <?php 
                    
                    $result = mysqli_query($sql, "SELECT * FROM `users` WHERE id = '".$_GET['id']."' limit 1 ");
                    $user = mysqli_fetch_assoc($result); 
                     
                    #echo $user['login'];

                  ?>

                  <div id="plable" class="text-center">SETTINGS</div>
                
                  <div class="row2 bgcls2">
                    <div class="row bgcl bgclx">
                    <?php

                    $image = "";

                    if (file_exists($user['user_img'] != "" )) {
                      $image = $user['user_img'];
                    }

                    ?>
                    <div class="col-sm-6 bgclp text-center">
                      <img id="avatar" src="<?php echo $user['user_img'] ?>">
                      <form method="post" enctype="multipart/form-data" class="">
                        <input class="click2 " type="file" name="file">
                        <input class="clickx " type="submit" value="Save">
                      </form>
                    </div>

                    <div class="col-sm-6 bgclp my-auto">
                      <div class="profile-login">Login: <?php echo $user['login']?></div>

                      <form method="post" action="phps/renamelogin.php">
                        <input class="click2" type="text" name="renamelogin" placeholder="write here new login">
                        <input class="clickx" type="submit" value="Save">
                      </form>

                      <div class="profile-login">Password:</div>

                      <form method="post" action="phps/renamepass.php">
                        <input class="click2 " type="text" name="renamepass" placeholder="write here new password">
                        <input class="clickx " type="submit" value="Save">
                      </form>

                      <div class="profile-login">Email: <?php echo $user['email']?></div>

                      <form method="post" action="phps/renameemail.php">
                        <input class="click2 " type="text" name="renameemail" placeholder="write here new login">
                        <input class="clickx " type="submit" value="Save">
                      </form>
                    </div>





                  </div>
                </div>
              </div>
        </div>

      <div id="plable2" class="text-center">ENDE</div>

  </div>

      <?php
  }
?>

</body>
</html>