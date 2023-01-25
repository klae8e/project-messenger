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


                  <div id="plable" class="text-center">PROFILE</div>



                   <?php 
                    
                    $result = mysqli_query($sql, "SELECT * FROM `users` WHERE id = '".$_GET['id']."' limit 1 ");
                    $user = mysqli_fetch_assoc($result); 
                     
                    #echo $user['login'];

                  ?>
                 <div class="row2 bgcls2">
                    <div class="row bgcl bgclx">

                      <div class="col-sm-2"></div>

                      <div class="col-sm-4 bgclp">
                        <img class="text-center img-fluid " id="avatar" src="<?php echo $user['user_img'] ?>">
                      </div>

                      <div class="col-sm-4 bgclp bgcg bgclp my-auto">
                        <div class="profile-login">Id: <?php echo $user['id']?></div>
                        <div class="profile-login">Login: <?php echo $user['login']?></div>
                        <div class="profile-login emailwrap">Email: <?php echo $user['email']?></div>
                        <!--<div class="profile-login">Active: <?php echo $user['active']?></div>
                        <div class="profile-login">Friends: <?php echo $user['friends']?></div>-->
                        <span id="settings" class="">
                          <a class="profile-login navigations" value="Profile" href="settings.php?id=<?php echo $_SESSION['user']['id']?>">Settings</a>
                        </span>
                        
                      </div>

                      <div class="col-sm-2"></div>


                  </div>
                </div>
              </div>
        </div>

      <div id="plable2" class="text-center">END</div>

  </div>

      <?php
  }
?>

</body>
</html>