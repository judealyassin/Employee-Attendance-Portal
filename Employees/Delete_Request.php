<?php
session_start();

$VL_ID=$_GET['VL_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from vacations_leaves_documents where VL_ID='$VL_ID'");

mysqli_query($dbConn,"delete from vacations_leaves where ID='$VL_ID'");

	  

	  

	echo "<script language='JavaScript'>
document.location='View_VL_Requests_List.php';
        </script>";

?>