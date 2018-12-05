<html>
<head>
	<title>phptest</title>
</head>
<body>
	<form action = 'phptest.php' method = "post">
		<select name = "myTest">
			<option value = "username">User Name</option>
			<option value = "email">email</option>
		</select>
		<input type = "submit" value="submit the form">
	</form>
	<?php
		require_once 'login.php';
		$conn = new mysqli($host, $user, $pass, $db, $port);
		if($conn->connect_error) die($conn->connect_error);
		$option = isset($_POST['myTest']) ? $_POST['myTest'] : false;
		if ($option){
			$testField = $_Post['myTest'];
			$query = "	select ". $testField . " from users where id = 1;";
			$result = $conn->query($query);
			if(!$result) die($conn->error);
			$rows = $result->num_rows;
			for ($j = 0; $j < $rows; ++$j){
				$result->data_seek($j);
				echo $result->fech_assoc()[$testField];
			}
		}
		$result->close();
		$conn->close();
	?>
</body>






<?php
	require_once 'login.php';
	$connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) 
    {
      echo "The ID is: " . $row['id'] . " the Username is: " . $row['username'] . "and the email is: " . $row['email'];
    }
    $result->close();
    $connection->close();
?>