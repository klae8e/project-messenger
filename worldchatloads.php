<?php
//Подключаемся к БД
include "connect.php";
//Выбираем все сообщения
#$res=mysql_query("SELECT * FROM `worldchat`");
//Выводим все сообщения на экран
#while($d=mysql_fetch_array($res))
#{  
#  echo "<b><font color='orange'>".$d['to_id'].": </font></b>".$d['sms']."<br>";
#}

#SELECT worldchat.to_id, users.login
#FROM worldchat
#INNER JOIN users ON worldchat.to_id = users.id;

$queryselect1 = "SELECT sms, time, worldchat.to_id, users.login FROM `worldchat` inner join users on worldchat.to_id = users.id";
$query1 = mysqli_query($sql, $queryselect1) or die("1. Query hat nicht funktioniert!");

while ($row = $query1->fetch_assoc()) { 
  echo "<div id="."box"." class='m-1 p-1'><b>".$row['time']."<br><font color='orange'>".$row['login'].": </font></b>".$row['sms']."<br></div>";
}

#$queryselect = "SELECT * FROM `worldchat`";
#$query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");

#while ($row = $query->fetch_assoc()) { 
#  echo "<b>".$row['time']."<br>ID-<font color='orange'>".$row['to_id'].": </font></b>".$row['sms']."<br>";
#}



?>