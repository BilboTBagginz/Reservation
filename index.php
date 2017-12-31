<?php																				
	session_start();
	require_once("info.php");											    

	$error = "no";
	
	if (!empty($_GET["page"]) && is_file($_GET["page"].".php"))
	{
		include $_GET["page"].".php";
	}	
	else
	{
		$info = new info();

		$_SESSION['info'] = serialize($info);
		include "ctrl/ctrl_reservation.php";
	}
?>