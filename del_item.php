<?php require './set/mysql.php'; 

$id = $_GET["id"];

print $id;

$sql = "DELETE FROM car_list WHERE car_id = $id ";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	header("Location: {$_SERVER['HTTP_REFERER']}");
?>