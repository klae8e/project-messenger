	<?php

		$conn = "localhost";
		$connlogin = "root";
		$conpass = "";
		$db = "messenger";

		$sql = mysqli_connect($conn, $connlogin, $conpass, $db);

		if (!$sql) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			#echo "Connected successfully";
			#echo "<br>";
			 

	?>