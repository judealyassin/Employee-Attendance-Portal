<?php
session_start();

$VL_ID=$_GET['VL_ID'];
$Manager_Status=$_GET['Manager_Status'];

require_once('../includes/config.php');






if ($Manager_Status=='Pending'){
	
	
	echo '<script language="JavaScript">
	  alert ("Sorry ! Manager Status Still Pending !")
      </script>';
	  
	  
	  
	echo "<script language='JavaScript'>
document.location='View_VL_Requests_List.php';
        </script>";
		
		
		
	
	
}else{






mysqli_query($dbConn,"update vacations_leaves set HR_Status='Rejected' where ID='$VL_ID'");

	  
	  
	  
	  


	echo "<script language='JavaScript'>
document.location='View_VL_Requests_List.php';
        </script>";



}
?>