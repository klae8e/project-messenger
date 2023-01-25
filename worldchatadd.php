<?php
//Проверям есть ли переменные на добавление
if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
  //Стартуем сессию для записи логина пользователя
  session_start();

  include "connect.php";

  $result = mysqli_query($sql, "SELECT * FROM `users` WHERE id = '".$_GET['id']."' limit 1 ");
  $user = mysqli_fetch_assoc($result); 
  $login= $user['id'];
  #echo '<pre>';
  #print_r($user);
  #echo '</pre>';

  //Принимаем переменную сообщения
  $mess=$_POST['mess'];
  //Переменная с логином пользователя
  $login2=$_SESSION['user']['id'];

  echo '<pre>';
  echo ($login);
  echo '</pre>';

  echo '<pre>';
  print_r($login2);
  echo '</pre>';

  //Добавляем все в таблицу
  $query = "INSERT INTO `messages`(`to_id`, `from_id`, `content`) VALUES ('".$login."','".$login2."','".$mess."')";
  #$query = "INSERT INTO `worldchat`(`to_id`, `sms`) VALUES ('2','keeeeeeeek')";
  mysqli_query($sql, $query) or die("2. Query hat nicht funktioniert!");

}
?>