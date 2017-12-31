<?php
	//redirect to reservation or detail if the button "Previous page" is pressed
	if (isset($_POST['prevpage']) && $_POST['prevpage'] == "Previous page")
	{
		$info = unserialize($_SESSION['info']);
		$info->reset_iter();
		$_SESSION['info'] = serialize($info);
		include './pages/reservation.php';
	}
	elseif (isset($_POST['prevpage2']) && $_POST['prevpage2'] == "Previous page")
	{
		$info = unserialize($_SESSION['info']);
		$info->reset_iter();
		$info->up_iter();
		$_SESSION['info'] = serialize($info);
		include './pages/detail.php';
	}
	else
	{
		//call reservation
		include './pages/reservation.php';
	}
?>