<?php 
  session_start();
  

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
    <title>ADMIN PANEL</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body style="background-color: #B4D3D6; color: white;">
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

      include 'connect.php';

        $queryselect = "SELECT role from users where id='".$_SESSION['user']['id']."'";
        $query = mysqli_query($sql, $queryselect) or die("1. Query don't work!");

        $role = [];

        while ($row = $query->fetch_assoc()) { 
          #echo "your role is ".$row['role'];
          $role = $row['role'];
        }

      #$role = join(',', $role);

      #var_dump($role);

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

      <?php

      if ($role == '1' || $role == '2') {
        
      
            #print "Привет, ".$row['login'].". Всё работает!";

            ?>


              <div id="ex4" class="container-fluid">
                <div class="container bgcl2">
                    <h1 class="text-center p-3">ADMIN PANEL</h1>
                    <form method="get">
                
                      <input type="radio" name="s_in" value="id" checked />
                      <label for="scales">id</label>

                      <input type="radio" name="s_in" value="login" />
                      <label for="scales">login</label>

                      <input type="radio" name="s_in" value="email" />
                      <label for="scales">email</label>

                      <input id="smsbtn" type="text" name="var_in" placeholder="write here" />
                      <input id="smsbtn" type="submit" name="submit">

                    </form>
                  <?php

                  #echo $_GET['s_in'];
                  #echo $_GET['var_in'];

                  if (isset($_GET['s_in']) || isset($_GET['var_in'])) {
                    
                    
                    $queryselect2 = "SELECT * from users where ".$_GET['s_in']."='".$_GET['var_in']."'";
                    $query2 = mysqli_query($sql, $queryselect2) or die("1. Query don't work!");

                    while ($row2 = $query2->fetch_assoc()) { 
                      #echo "your role is ".$row['role'];
                      
                      ?>
                      <form method="post" action="admin_uu.php">
                        <table class="col-sm-12 mt-5 p-3 text-center">
                          <tr>
                            <td>id</td>
                            <td>login</td>
                            <td>password</td>
                            <td>email</td>
                            <td>active</td>
                            <td>friends</td>
                            <td>user_img</td>
                            <td>time_create</td>
                            <td>ban</td>
                            <td>role</td>
                          </tr>
                          <tr>
                            <td><input type="number" name="id" id="id" value="<?echo $row2['id']?>" readonly></td>
                            <td><input type="text" name="login" value="<?echo $row2['login']?>"></td>
                            <td><input type="text" name="password" value="<?echo $row2['password']?>"></td>
                            <td><input type="text" name="email" value="<?echo $row2['email']?>"></td>
                            <td><?echo $row2['active']?></td>
                            <td><?echo $row2['friends']?></td>
                            <td><?echo $row2['user_img']?></td>
                            <td><?echo $row2['time_create']?></td>
                            <td><input type="number" name="ban" value="<?echo $row2['ban']?>" min="0" max="3"></td>
                            <td><input type="number" name="role" value="<?echo $row2['role']?>" min="0" max="3"></td>
                          </tr>
                        </table>

                        <div class="text-center mt-2">
                          <input type="submit" name="submit" class="col-sm-1">
                        </div>
                       </form>



                    <?php
                      }
                    }
                  }

                }
                  

                  ?>

                  <div>
                    <p id="plable6" class="text-center mt-4">
                      <?php
                      
                        if (isset($_SESSION['message'])) {
                          echo $_SESSION['message'];
                        }
                        unset($_SESSION['message']);
                      ?>
                    </p>
                  </div>

                </div>
              </div>
              
              <div id="plable2" class="text-center">END</div>

              </div>

              <style>
                table,tr,td,th{
                  border: 1px solid azure;
                }
                #id{
                  width: 50px;
                }
              </style>
        
  </body>
</html>