<?php
session_start();


include_once '../languages/common.php';

include("../includes/config.php"); 

$E_ID = $_SESSION['E_Log'];


if (!$_SESSION['E_Log'])
echo '<script language="JavaScript">
 document.location="../index.php";
</script>';

	










if(isset($_POST['Submit'])) {
    $E_ID = $_POST['E_ID'];
    $Type = $_POST['Type'];
    $From_Date = date("Y-m-d");
    $To_Date = date("Y-m-d");
    $From_Time = $_POST['From_Time'];
    $To_Time = $_POST['To_Time'];
    $Reason = $_POST['Reason'];
    $Notes = $_POST['Notes'];
    
    // Calculate the hours for the new leave request
    $from_time = new DateTime($From_Time);
    $to_time = new DateTime($To_Time);
    $interval = $from_time->diff($to_time);
    $new_leave_hours = $interval->h + ($interval->i / 60); // Calculate in hours and fraction of hours

    // Ensure the new leave hours are correctly calculated
    if ($new_leave_hours <= 0) {
        echo "<script language='JavaScript'>
        alert('Invalid time range for leave request.');
        history.back();
        </script>";
        exit();
    }

    // Query to get the total accepted personal leave hours for the current month
    $current_month = date("Y-m");
    $query = "SELECT SUM(Total_Hours) as total_hours 
              FROM vacations_leaves 
              WHERE Employee_ID = '$E_ID' 
              AND Vacation_Leave_Type = 'Leave' 
              AND Type = 'Personal' 
              AND Manager_Status = 'Accepted' 
              AND HR_Status = 'Accepted'
              AND DATE_FORMAT(From_Date, '%Y-%m') = '$current_month'";
              
    $result = mysqli_query($dbConn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_hours = $row['total_hours'] ?? 0;

    // Check if the new leave request exceeds the allowed hours
    if (($total_hours + $new_leave_hours) <= 8) {
        // Insert the new leave request with the calculated Total_Hours
        $insert = mysqli_query($dbConn, "INSERT INTO vacations_leaves (Employee_ID, Vacation_Leave_Type, Type, From_Date, To_Date, From_Time, To_Time, Total_Hours, Reason, Notes, Manager_Status, HR_Status) 
        VALUES ('$E_ID', 'Leave', '$Type', '$From_Date', '$To_Date', '$From_Time', '$To_Time', '$new_leave_hours', '$Reason', '$Notes', 'Pending', 'Pending')");
        
        echo "<script language='JavaScript'>
        document.location='View_VL_Requests_List.php';
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('The leave request exceeds the allowed personal leave hours for the month.');
        history.back();
        </script>";
    }
}













?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['Title']; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAW../ESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <link rel="shortcut icon" href="../assets/img/icon.png"/>





<style>
@font-face {
   font-family: myFirstFont;
   src: url(../fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}

</style>





</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo $lang['Title2']; ?></a> 
            </div>
			
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  


      <?php
	 $URL_1 = $_SERVER['REQUEST_URI'];
	 
	if (strpos($URL_1,'?lang=')) {
	 $URL = substr($URL_1,0,-8);
	}else{
		
	$URL = $URL_1;

	}
	?>




   <a href="" class="btn btn-primary square-btn-adjust"><?php echo $lang['Employees_Portal']; ?></a>




   
                <a href="<?php echo $URL; ?>?lang=en" class="btn btn-primary square-btn-adjust"><img src="../languages/images/en.png" /></a>
<a href="<?php echo $URL; ?>?lang=ar" class="btn btn-primary square-btn-adjust"><img src="../languages/images/ar.png" /></a>




</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/ju.png" class="user-image img-responsive"/>
					</li>
				
					
                   
                   <li >
                        <a href="index.php"><i class="fa fa-desktop fa-3x"></i> <?php echo $lang['Home']; ?></a>
                    </li>
                 
					
					 <li>
                        <a class="active-menu"  href="View_VL_Requests_List.php"><i class="fa fa-list fa-3x"></i> <?php echo $lang['Vacations_Leaves_Requests']; ?></a>
                    </li>
					
					
					
					
					
					
					 <li>
                        <a  href="Logout.php"><i class="fa fa-lock fa-3x"></i> <?php echo $lang['Logout']; ?></a>
                    </li>
					
						
                    
                        </ul>
                      </li>  
                 
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><center><?php echo $lang['Univeristy_of_Jordan']; ?></center></h2>   
                        <h3><center><?php echo $lang['Employee_Attendance_Portal']; ?> </center></h3>
                    </div>
                </div>              
               
                <hr />                
                <div class="row">
                    <div class="col-md-12">           
		
		
		 <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php echo $lang['Add_New_Request']; ?>
                        </div>
                        <div class="panel-body">
                            
							
							
							
							 <form role="form" method="post" action="Add_New_Request.php" enctype="multipart/form-data">
							 <input type="hidden" name="E_ID" value="<?php echo $E_ID; ?>"/>
                                       <br />
                                   
                                                                           
										
										
										
										
										
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-list"> <?php echo $lang['Type']; ?></i></span>
                                            
											
											
											
											<select name="Type" class="form-control " title="Type" required>';
                                      <option disabled selected value>Select Type</option>



   <option value="Personal">Personal</option>
   <option value="Official">Official</option>
   <option value="Emergency">Emergency</option>
</select>
											
											
											
										
                                        </div>
										
										
										

										
										
											<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-clock-o"> <?php echo $lang['From_Time']; ?></i></span>
                                            <input type="time" class="form-control" value=""  name="From_Time" required  placeholder="<?php echo $lang['From_Time']; ?>" />
                                        </div>
											
										
											<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-clock-o"> <?php echo $lang['To_Time']; ?></i></span>
                                            <input type="time" class="form-control" value=""  name="To_Time" required  placeholder="<?php echo $lang['To_Time']; ?>" />
                                        </div>
										
										
										
										
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-question"> <?php echo $lang['Reason']; ?></i></span>
                                            <input type="text" class="form-control" value=""  name="Reason" required  placeholder="<?php echo $lang['Reason']; ?>" />
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-list"> <?php echo $lang['Notes']; ?></i></span>
                                            <input type="text" class="form-control" value=""  name="Notes" required  placeholder="<?php echo $lang['Notes']; ?>" />
                                        </div>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
											
										
										
                                   <center>
                                     
                                     <input type="submit" name="Submit" value="<?php echo $lang['Send']; ?>" class="btn btn-primary"/>
                                     <input type="reset" name="Reset" value="<?php echo $lang['Reset']; ?>" class="btn btn-danger"/>
                                    </center>
									
									
									</form>
									
									
									
									
									
                            
                        </div>
                    </div>
					
			 
			 <center>
			<h4>  <?php echo $lang['Footer']; ?></h4>
		     </center>
			 </div>
                    
                    
                    
                  
                        
        </div>
                
            
                       
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
  <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
   
</body>
</html>
