<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/mainstyle.css" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Chats</title>
</head>
<body>
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

    if (isset($_COOKIE['id']) and isset($_COOKIE['login'])){

      $queryselect = "SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1";
      $query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");

      while ($row = $query->fetch_assoc()) {

        if(($row['id'] !== $_COOKIE['id']) or ($row['login'] !== $_COOKIE['login'])){
          setcookie("id", $row['id'], time()-86400, "/");
          setcookie("login", $row['login'], time()-86400, "/");
          header("Location: /projekt/login.php");exit();
          #print "Хм, что-то не получилось";
        }
        else{

          #print "Привет, ".$row['login'].". Всё работает!";

          ?>
            <div id="minbody" class="container-fluid">

              <div class="container-fluid">

                <div class="container">
                  <div class="col-sm-12 navbar">

                    <form id="profile" class="col-sm-2 m-2 mt-3" method="post" action="profile.php">
                      <input type="submit" class="col-sm-12" value="Profile">
                    </form>

                    <form id="profile" class="col-sm-2 m-2 mt-3" method="post" action="mainpage.php">
                      <input type="submit" class="col-sm-12" value="Chats">
                    </form>

                    <form id="profile" class="col-sm-2 m-2 mt-3" method="post" action="Friends.php">
                      <input type="submit" class="col-sm-12" value="Friends">
                    </form>

                    <form id="log-out" class="col-sm-2 m-2 mt-3" method="post" action="logout.php">
                      <input type="submit" class="col-sm-12" value="Log out">
                    </form>

                  </div>
                </div>
                <div class="container">
                  <div class="col-sm-4"></div>
                  <div class="search" class="col-sm-4">
                    <input type="text" placeholder="Search" onkeyup="showHint(this.value)" class="col-sm-12 p-2 mt-3 rounded-pill">
                  </div>
                  <div class="col-sm-4"></div>
                </div>

                  <div class="container">
                    <div>
                        <?php include "search.php";?>
                      <p>Suggestions: <span id="txtHint"></span></p>
                    </div>
                </div>

                <div class="container">
                    
                </div>

            </div>


        </div>
    <script>
        function showHint(str) {
          if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
          } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          xmlhttp.open("GET", "search.php?q=" + str);
          xmlhttp.send();
          }
        }
    </script>
          <?php
        }
      }
    }
    else{
        #echo "<br>";
        #print "Включите куки";
        header("Location: /projekt/404.html");exit();
    }

  ?>

</body>
</html>