<?php
function check_login()
{
if(strlen($_SESSION['l_id'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="pages_staff_index.php";
		$_SESSION["l_id"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
