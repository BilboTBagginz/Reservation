<?php
	//allow the administrator to delete entries in the database using the primary key of the table
	//check the imput comming from dbaccess	
	$result = filter_input(INPUT_POST, 'del', FILTER_VALIDATE_INT);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "reservation";

	if (is_int($result) == true)
	{
		//connect to the database
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		//delete the entry
		$sql = "DELETE FROM party WHERE Pk_party = $result";

		if (mysqli_query($conn, $sql)) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	//call dbaccess
	include 'dbaccess.php';
?>