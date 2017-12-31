<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
</head>
<body>
	<?php
	$info = unserialize($_SESSION['info']);

	$information = $info->get_personal_info();
	$iter = $info->get_iter();
	$number = '';
	?>

	<?php 
	if ($nbr_passengers != 1)
	{
		switch ($iter-1) 
		{
	    	case 1:
	        	$number = 'First passenger';
	        	break;
	    	case 2:
	        	$number = 'Second passenger';
	        	break;
	    	case 3:
	        	$number = 'Third passenger';
	        	break;
	        case 4:
	        	$number = 'Fourth passenger';
	        	break;
		}
	}
	?>
	<h1>Detail<br>
		<small><?php echo $number ?></small></h1>

	<?php
	if ($error == "unfilled")
	{
		echo '<p id = error> All fields must be filled <p>';
	}
	
	if ($error == "not int")
	{
		echo '<p id = error> You are supposed to enter integers  <p>';
	}
	?>

	<div>
		<form method='post' action='index.php?page=./ctrl/ctrl_detail'>
			firstname <span style='padding-left:28px'</span> <input type='text' name='lastname' value = '<?php if (isset($information[$iter-2])) echo $information[$iter-2][0];?>'> </br>
			Lastname <span style='padding-left:27px'</span> <input type='text' name='firstname' value = '<?php if (isset($information[$iter-2])) echo $information[$iter-2][1];?>'> </br>
			Age <span style='padding-left:62px'</span> <input type='text' name='age' value = '<?php if (isset($information[$iter-2])) echo $information[$iter-2][2];?>'> </br>	
			
			<input type='submit' value='Next step'/>
		</form>	
		<form method ='post' action='index.php?page=./ctrl/ctrl_reservation'>
			<input type='submit' value='Previous page'/>
		</form>
		<form method ='post' action='index.php?page=./destuct'>
			<input type='submit' value='Cancel reservation'/>
		</form>
	</div>
</body>
</html>