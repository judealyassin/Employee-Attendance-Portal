<?php
session_start();

$VL_ID=$_GET['VL_ID'];
$Employee_ID=$_GET['Employee_ID'];
$Total_Days=$_GET['Total_Days'];
$Manager_Status=$_GET['Manager_Status'];

require_once('../includes/config.php');




$Vacation_Leave_Type=$_GET['Vacation_Leave_Type'];




if ($Manager_Status=='Pending'){
	
	
	echo '<script language="JavaScript">
	  alert ("Sorry ! Manager Status Still Pending !")
      </script>';
	  
	  
	  
	echo "<script language='JavaScript'>
document.location='View_VL_Requests_List.php';
        </script>";
		
		
		
	
	
}else{



if ($Vacation_Leave_Type=='Vacation'){


mysqli_query($dbConn,"update vacations_leaves set HR_Status='Accepted' where ID='$VL_ID'");



$sql = mysqli_query($dbConn,"select * from employees where ID='$Employee_ID'");
$row = mysqli_fetch_array($sql);
$Total_Vacation_Balance = $row['Total_Vacation_Balance'];


$New_Total_Vacation_Balance = $Total_Vacation_Balance - $Total_Days;



mysqli_query($dbConn,"update employees set Total_Vacation_Balance='$New_Total_Vacation_Balance' where ID='$Employee_ID'");
	  


}else{
	
	
	mysqli_query($dbConn,"update vacations_leaves set HR_Status='Accepted' where ID='$VL_ID'");

	
	
	
	
	
}
	  

	echo "<script language='JavaScript'>
document.location='View_VL_Requests_List.php';
        </script>";
		
		
}

?>