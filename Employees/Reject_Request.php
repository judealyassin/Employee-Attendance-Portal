<?php
session_start();

$VL_ID=$_GET['VL_ID'];

require_once('../includes/config.php');






mysqli_query($dbConn,"update vacations_leaves set Manager_Status='Rejected' where ID='$VL_ID'");

	  
	  
	  
	  


	echo "<script language='JavaScript'>
document.location='My_Employees_Vacations_Leaves_Requests.php';
        </script>";




?>