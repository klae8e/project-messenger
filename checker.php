<?php
  if(count($_COOKIE) > 0) {
      echo "Cookies are enabled.";
    } else {
      echo "Cookies are disabled.";
    }


  if (isset($_COOKIE['id']) and isset($_COOKIE['login'])){

    $queryselect = "SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1";
    $query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");

    while ($row = $query->fetch_assoc()) {

      if(($row['id'] !== $_COOKIE['id']) or ($row['login'] !== $_COOKIE['login'])){
        setcookie("id", $row['id'], time()-86400, "/");
        setcookie("login", $row['login'], time()-86400, "/");
        header("Location: /projekt/login.php");exit();
        print "Хм, что-то не получилось";
      }
      else{
        print "Привет, ".$row['login'].". Всё работает!";
      }
    }
  }
  else{
        print "Включите куки";
  }
?>