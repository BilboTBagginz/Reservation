<?php
//destroy the session and send back to the index
if (isset($_SESSION['info']))
{
	unset($_SESSION['info']);
}

session_destroy();
 

header('location:index.php');
?>