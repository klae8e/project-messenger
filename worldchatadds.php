<?php
//Проверям есть ли переменные на добавление
if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
  //Стартуем сессию для записи логина пользователя
  session_start();
  //Принимаем переменную сообщения
  $mess=$_POST['mess'];
  //Переменная с логином пользователя
  $login=$_SESSION['user']['id'];
  //Подключаемся к базе
  include "connect.php";
  //Добавляем все в таблицу
  $query = "INSERT INTO `worldchat`(`to_id`, `sms`) VALUES ('".$login."','".$mess."')";
  #$query = "INSERT INTO `worldchat`(`to_id`, `sms`) VALUES ('2','keeeeeeeek')";
  mysqli_query($sql, $query) or die("2. Query hat nicht funktioniert!");

}
?>