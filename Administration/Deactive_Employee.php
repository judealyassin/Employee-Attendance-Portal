<?php
session_start();

$E_ID=$_GET['E_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"update employees set Status='Deactive' where ID='$E_ID'");

	  


	echo "<script language='JavaScript'>
document.location='View_Employees_List.php';
        </script>";

?>