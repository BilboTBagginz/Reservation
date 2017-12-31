<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
</head>
<body>
    <h1>Reservation</h1>
	<p>Bookings costs 20€ euros per person and 25€ for children under 8 years old. The reservations are up to four passengers (driver included)</p>
	<p>The cancelation insurance costs 15€</p>

	<?php 
	$info = unserialize($_SESSION['info']);
	//print a message if a field isn't filled
	if ($error == "unfilled")
	{
		echo '<p id = error> All fields must be filled<p>';
	}
	//print a message if there are more passengers than the car can support
	if ($error == "toohigh")
	{
		echo "<p id = error> Our cars can only take one to four passengers <p>";
	}
	?>
	<div>	
		<form method='post' action='index.php?page=./ctrl/ctrl_detail'>
		<?php
			$cars = array('Fiat','Volvo','Ford','Mercedes');
			
			
			echo"Car <span style='padding-left:127px'</span> <select name='cars'></br>";
			
				foreach ($cars as $cars)
				{
					if ($cars == $info->get_cars())
					{
						echo '<option value ="'.$cars.'" selected="'.selected.'">'.$cars.'</option>';
					}
					else
					{
						echo '<option value="'.$cars.'">'.$cars.'</option>';
					}
				}
		?>
		
		</select>
		
		</br>
		Number of passengers 
		<span style='padding-left:7px'</span> <input type='text' name='nbr_passengers' value = '<?php if ($info->get_nbr_passengers() != null) echo $info->get_nbr_passengers();?>'> 
		</br>
		Cancellation insurance <input type='checkbox' name='insurance' <?php if ($info->get_insurance() == true) echo true ?>> 
		</br>
		<input type='submit' value='Next step'/> 
		
		</form>
		<form method='post' action='index.php?page=./destruct'>
			<input type='submit' value='Cancel reservation'/>
		</form>		
	</div>	
</body>
</html>