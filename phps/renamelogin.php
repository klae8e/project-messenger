<?php 
	session_start();

	include "../connect.php";
	$login = $_SESSION['user']['login'];
	$renamelogin = $_POST['renamelogin'];
	$loginid = $_SESSION['user']['id'];

    $updatelogin = "UPDATE `users` SET `login`='".$renamelogin."' WHERE `id` = '".$loginid."' Limit 1";
  	mysqli_query($sql, $updatelogin) or die("2. Query hat nicht funktioniert!");
  	header("Location: /projekt/profile.php?id=".$loginid);exit();
?>