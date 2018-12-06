include_once 'formtest.html'
	<?php
		require_once 'login.php';
		$conn = mysqli_connect($host, $user, $pass, $db, $port);
		if($conn->connect_error) die($conn->connect_error);
		$option = isset($_POST['myTest']) ? $_POST['myTest'] : false;
		if ($option){
			$testField = $_POST['myTest'];
			//echo $testField;
			$query = "	select ". $testField . " from users;";
			//echo $query;
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo $row[$testField];
			}
		}
		$result->close();
		$conn->close();
	?>
</body>
</html>