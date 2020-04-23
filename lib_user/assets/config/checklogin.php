<?php
function check_login()
{
if(strlen($_SESSION['s_id'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="pages_std_index.php";
		$_SESSION["s_id"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
