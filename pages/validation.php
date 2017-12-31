<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summary</title>
</head>
<body>
    <h1>Reservation summary</h1>

    
<?php
	$info = unserialize($_SESSION['info']);
	//if no passenger are major, 
	if ($info->is_major() == false)
	{
		echo '<p id = error> There must be at least one major person to perform the payment <p>';
	}
	// printing the reservation informations
	echo '<p>';
	echo "Car: <span style='padding-left:118px'</span>".$info->get_cars();
	echo "<br>Number of passengers:".$info->get_nbr_passengers();
	
	foreach($info->get_personal_info() as $information)
	{
		echo '<p>';
		echo "Firstname: <span style='padding-left:79px'</span> ".$information[0];
		echo '<br>';
		echo "Lastname: <span style='padding-left:79px'</span> ".$information[1];
		echo '<br>';
		echo "Age: <span style='padding-left:115px'</span> ".$information[2];
	}
	
	echo '<p>';
	echo 'Cancellation insurance:       ';
	if ($info->get_insurance() == true)
	{
		echo 'taken';
	}
	else
	{
		echo 'not taken';
	}

	// not very catholic but prevent to continue further if nobody is major
	if ($info->is_major() != false)
	{
		echo "<form method ='post' action='index.php?page=./ctrl/ctrl_payment'>
			  	<input type='submit' value='Confirm'/>
			  </form>";
	}
	?>
	<form method ='post' action='index.php?page=./ctrl/ctrl_reservation'>
		<input type='submit' name="prevpage2" value='Previous page'>
	
	</form>
	<form method='post' action='index.php?page=./destruct'>
		<input type='submit' value='Cancel reservation'/>
	</form>
</div>	
</body>
</html>