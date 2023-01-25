<?php
	$queryselect = "SELECT * FROM users";
	$query = mysqli_query($sql, $queryselect) or die("1. Query hat nicht funktioniert!");
	while ($row = $query->fetch_assoc()) {
		echo '<a href="chat.php?id='.$row[id].'';
	}
?>