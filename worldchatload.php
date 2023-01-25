<?php
//Подключаемся к БД
session_start();
include "connect.php";
//Выбираем все сообщения


#$queryselect = "SELECT * FROM `worldchat`";
#$query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");

#while ($row = $query->fetch_assoc()) { 
#  echo "<b><font color='orange'>".$row['to_id'].": </font></b>".$row['sms']."<br>";
#}
$id_get = $_GET['id'];
$result = mysqli_query($sql, "SELECT * FROM `users` WHERE id = '".$_GET['id']."' limit 1 ");
$user = mysqli_fetch_assoc($result); 
$login= $user['id'];

$login2 = $_SESSION['user']['id'];
$login1 = $_SESSION['user']['login'];

$queryselect = "SELECT *, users.login FROM `messages` inner join users on messages.from_id = users.id";

$queryselect2 = "SELECT content, from_id, time, messages.to_id, users.login FROM `messages` inner join users on messages.to_id = users.id where from_id=".$login2." and to_id=".$id_get."";

$query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");



while ($row = $query->fetch_assoc()) { 
  #echo "<font color='orange'>".$row['to_id'].": </font></b>".$row['content']."<br>";
  if ($row['from_id'] == $login2 && $row['to_id'] == $id_get) {
    echo "<div id="."box"." class='m-1 p-1'><b>".$row['time']."<br><font color='green'>".$login1.": </font></b class='from_id'>".$row['content']."<br></div>";
    #echo "<b><font color='red'>".$row['to_id'].": </font></b class='from_id'>".$row['content']."<br>";
  }
  elseif ($row['to_id'] == $login2 && $row['from_id'] == $id_get) {
    echo "<b>".$row['time']."<br><font color='red'>".$row['login'].": </font></b class='from_id'>".$row['content']."<br>";
    #echo "<b><font color='green'>".$row['from_id'].": </font></b class='from_id'>".$row['content']."<br>";
  }
}

?>