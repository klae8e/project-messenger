<?php
	session_start();
	include "connect.php";

	if (isset($_SESSION['user'])) {
		header("Location: mainpage.php");exit();
		#echo "1";
	}

	if (($_POST['login'] == "" && $_POST['pass'] == "") or ($_POST['login'] == "" or $_POST['pass'] == "")){
		$_SESSION['message'] = 'Error 1: Write all inputs!';
		header("Location: index.php");exit();
		#echo "2";
	}
	$ip = $_SERVER['REMOTE_ADDR'];

	if (($_POST['login'] !== "" && $_POST['pass'] !== "") or ($_POST['login'] !== "" or $_POST['pass'] !== "")) {

		$login = $_POST['login'];
		$pass = md5($_POST['pass']);



		$queryselect = "SELECT * FROM `users` WHERE login = '".$login."' and password = '".$pass."'";
		$query = mysqli_query($sql, $queryselect) or die("1. error sql!");
		#echo "3";
		while ($row = $query->fetch_assoc()) {

			if ($row['ban'] == 0) {
				if ($ip == $row['user_ip']) {
				
					if (mysqli_num_rows($query)>0) {
						if ($login === $row['login'] && $pass === $row['password']) {
							$_SESSION['user'] = [
								"id" => $row['id'],
								"login" => $row['login'],
								"email" => $row['email'],
								"active" => $row['active'],
								"friends" => $row['friends'],
								"user_image" => $row['user_image'],
								"user_ip" => $row['user_ip'],
								"role" => $row['role']

							];
							#echo "4";
							header("Location: mainpage.php?id=".$_SESSION['user']['id']);exit();
							
						}
						#echo "5";
					}
					#echo "6";
				}
				else{
					$query_insip = "update users set user_ip = '".$ip."' WHERE login = '".$login."' and password = '".$pass."'";
					$queryins = mysqli_query($sql, $query_insip) or die("1. Query hat nicht funktioniert!");

					if (mysqli_num_rows($query)>0) {
						if ($login === $row['login'] && $pass === $row['password']) {
							$_SESSION['user'] = [
								"id" => $row['id'],
								"login" => $row['login'],
								"email" => $row['email'],
								"active" => $row['active'],
								"friends" => $row['friends'],
								"user_image" => $row['user_image'],
								"user_ip" => $row['user_ip'],
								"role" => $row['role']

							];
							#echo "4";
							header("Location: mainpage.php?id=".$_SESSION['user']['id']);exit();
							
						}
						#echo "5";
					}
					#echo "6";
				}
			}
			else{
				$_SESSION['message'] = 'Error 3: Your account banned!';
				header("Location: index.php");exit();
			}
		}
		#echo "7";
		$_SESSION['message'] = 'Error 2: login or password is wrong!';
		header("Location: index.php");exit();
	}
	else{
		#echo "8";
		$_SESSION['message'] = 'Error 2: login or password is wrong!';
		header("Location: index.php");exit();

	}


/*
	if ($login != "" and $pass != "") {
		$queryselect = "SELECT * FROM `users` WHERE login = '".$login."' and password = '".$pass."'";
		$query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");

		while ($row = $query->fetch_assoc()) {
			
			if ($login === $row['login'] and $pass === $row['password']) {

				setcookie("id", $row['id'], time()+86400, "/");
				setcookie("login", $row['login'], time()+86400, "/");
				#$_SESSION['message'] = 'Error2: login or password is wrong!';
				header("Location: /projekt/mainpage.php");exit();
			}
			else{

				echo "<br>";
				$_SESSION['message'] = 'Error2: login or password is wrong!';
				#echo "Error2: login or password is wrong!";
				echo "<br>";
				header("Location: /projekt/index.php");exit();

			}


		}

	}
	else{
		$_SESSION['message'] = 'Error1: Write all inputs';
		#echo "Error1: Write all inputs";
		echo "<br>";
		header("Location: /projekt/index.php");exit();

	}
	*/	


	mysqli_close($sql);
?>