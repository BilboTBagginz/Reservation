<?php
if (isset($_SESSION['info']))
{
	unset($_SESSION['info']);
}

session_destroy();
 

header('location:index.php');
?>