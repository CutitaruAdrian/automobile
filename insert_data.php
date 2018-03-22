<?php require './set/mysql.php'; 

	$car_name = $_POST["car_name1"];
	$car_price = $_POST["car_price1"];

	$sql = "INSERT INTO car_list (car_name,car_price)
	                   VALUES ('".$car_name."',".$car_price.")";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	header("Location: {$_SERVER['HTTP_REFERER']}");

 ?>
