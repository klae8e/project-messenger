<?

#include '../connect.php';

$conn = "localhost";
$connlogin = "root";
$conpass = "";
$db = "messenger";

$sql = mysqli_connect($conn, $connlogin, $conpass, $db);

$queryselectsa = "SELECT * FROM `users` WHERE login = '".$_SESSION['user']['login']."'";
$querysa = mysqli_query($sql, $queryselectsa) or die("1. error_sql!");
#echo "3";
while ($row = $querysa->fetch_assoc()) {
	if ($row['ban'] == 0) {
		#echo "clear";
	}
	else{
		unset($_SESSION['user']);
		$_SESSION['message'] = 'Error 3: Your account banned!';
		header("Location: index.php"); exit;
		
		
	}
}
		



?>