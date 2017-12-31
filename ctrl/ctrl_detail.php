<?php
	$info = unserialize($_SESSION['info']);
	$iter = $info->get_iter();
	// send bak to reservation if the fields are empty or the number of passengers too high or else save the number of passengers
	if ($iter == 1)
	{
		$info->set_cars($_POST['cars']);
		if (isset($_POST['nbr_passengers']) && $_POST['nbr_passengers'] == "")
		{
			$error = "unfilled";
			include "./pages/reservation.php";
		}
		elseif (isset($_POST['nbr_passengers']) && ($_POST['nbr_passengers'] == 0 || $_POST['nbr_passengers'] > 4))
		{
			$error = "toohigh";
			include "./pages/reservation.php";
		}
		else
		{
			$info->set_nbr_passengers($_POST['nbr_passengers']);
		}
	}
	
	$nbr_passengers = $info->get_nbr_passengers();
	//save the value of the insurance
	if (isset($_POST['insurance']) && $iter == 1)
	{
		$info->set_insurance(true);
	}
	elseif ($iter == 1)
	{
		$info->set_insurance(false);
	}
	//check if age is an integer
	$result = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
	
	if ($iter > 1)
	{
		//still checking the input but for the other passengers
		if ((isset($_POST['lastname']) && $_POST['lastname'] == "") || (isset($_POST['firstname']) && $_POST['firstname'] == "") || (isset($_POST['age']) && $_POST['age'] == ""))
		{
			$info->set_personal_info([$_POST['lastname'],$_POST['firstname'],$_POST['age']],$iter-2);
			$_SESSION['info'] = serialize($info);
			$error = "unfilled";
			include "./pages/detail.php";
		}
		elseif ($result == false)
		{
			$info->set_personal_info([$_POST['lastname'],$_POST['firstname'],$_POST['age']],$iter-2);
			$_SESSION['info'] = serialize($info);
			$error = "not int";
			include "./pages/detail.php";
		}
		else
		{
			$info->set_personal_info([$_POST['lastname'],$_POST['firstname'],$_POST['age']],$iter-2);
		}
	}
	
	if ($error == "no")
	{
		//send back to detail to get the rest of information on the other passengers
		if ($iter <= $nbr_passengers)
		{
			$info->up_iter();
			$_SESSION['info'] = serialize($info);
			include './pages/detail.php';
		}
		//if all the information has been taken, call ctrl_validation
		else
		{
			$_SESSION['info'] = serialize($info);
			include 'ctrl_validation.php';
		}
	}
?>