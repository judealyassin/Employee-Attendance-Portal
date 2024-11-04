<?php
session_start();


include_once '../languages/common.php';

include("../includes/config.php"); 


$E_ID = $_SESSION['E_Log'];


if (!$_SESSION['E_Log'])
echo '<script language="JavaScript">
 document.location="../index.php";
</script>';


	$sql1 = mysqli_query($dbConn,"select * from employees where ID='$E_ID'");
	$row1 = mysqli_fetch_array($sql1);
	
	$Full_Name = $row1['Full_Name'];
	$Total_Vacation_Balance = $row1['Total_Vacation_Balance'];

	






if(isset($_POST['Submit']))
{
$E_ID = $_POST['E_ID'];
$Today_Date = $_POST['Today_Date'];
$Check_In_Date_Time = date('Y-m-d H:i:s');		
			
	$sql2 = mysqli_query($dbConn,"select * from attendance_records where Employee_ID='$E_ID' AND (Date='$Today_Date' AND Check_In_Date_Time!='')");
	if (mysqli_num_rows($sql2)>0){

		echo '<script language="JavaScript">
	  alert ("Sorry ! Already There Is Check In Attendance Record For Today !")
      </script>';
		
	}else{
		
		
$insert = mysqli_query($dbConn,"insert into attendance_records (Employee_ID,Date,Check_In_Date_Time,Check_Out_Date_Time) values ('$E_ID','$Today_Date','$Check_In_Date_Time','')");
		
		
		
	}
	
		
			
			
			
}





if(isset($_POST['Submit2']))
{
$E_ID = $_POST['E_ID'];
$Today_Date = $_POST['Today_Date'];
$Check_Out_Date_Time = date('Y-m-d H:i:s');		
			
			
			
			
				$sql12 = mysqli_query($dbConn,"select * from attendance_records where Employee_ID='$E_ID' AND Date='$Today_Date'");
if (mysqli_num_rows($sql12)==0){
			
				echo '<script language="JavaScript">
	  alert ("Sorry ! There Is No Attendance Records For Today !")
      </script>';
			
			
}else{
			
			
			
			

	$sql2 = mysqli_query($dbConn,"select * from attendance_records where Employee_ID='$E_ID' AND (Date='$Today_Date' AND Check_In_Date_Time='')");
	if (mysqli_num_rows($sql2)>0){
		
		
		echo '<script language="JavaScript">
	  alert ("Sorry ! There Is No Check In Attendance Record For Today !")
      </script>';
		
	}else{
	

	$sql3 = mysqli_query($dbConn,"select * from attendance_records where Employee_ID='$E_ID' AND (Date='$Today_Date' AND Check_Out_Date_Time!='')");
	if (mysqli_num_rows($sql3)>0){
		
		echo '<script language="JavaScript">
	  alert ("Sorry ! Already There Is Check Out Attendance Record For Today !")
      </script>';
		
		
	}else{
		
$insert = mysqli_query($dbConn,"update attendance_records set Check_Out_Date_Time='$Check_Out_Date_Time' where Employee_ID='$E_ID' AND Date='$Today_Date'");
		
		
	}
		
		
	}
	
		
			
}	
			
}












$Curren_Date = date("Y-m-d");



	$sql2 = mysqli_query($dbConn,"select * from attendance_records where Employee_ID='$E_ID' AND Date='$Curren_Date'");
	$row2 = mysqli_fetch_array($sql2);
	
	$Check_In_Date_Time = $row2['Check_In_Date_Time'];
	$Check_Out_Date_Time = $row2['Check_Out_Date_Time'];























  // Get the current month and year
    $current_month = date("Y-m");
    $current_year = date("Y");

    // Query to get the total sick leave days for the current month
    $query_sick_days = "SELECT SUM(Total_Days) as total_sick_days 
                        FROM vacations_leaves 
                        WHERE Employee_ID = '$E_ID' 
                        AND Type = 'Sick' 
                        AND Manager_Status = 'Accepted'
                        AND HR_Status = 'Accepted'
                        AND DATE_FORMAT(From_Date, '%Y-%m') = '$current_month'";

    $result_sick_days = mysqli_query($dbConn, $query_sick_days);
    $row_sick_days = mysqli_fetch_assoc($result_sick_days);
    $total_sick_days = $row_sick_days['total_sick_days'] ?? 0;

    // Query to get the total annual leave days for the current year
    $query_annual_days = "SELECT SUM(Total_Days) as total_annual_days 
                          FROM vacations_leaves 
                          WHERE Employee_ID = '$E_ID' 
                          AND Type = 'Annual' 
                          AND Manager_Status = 'Accepted'
                        AND HR_Status = 'Accepted'
                          AND YEAR(From_Date) = '$current_year'";

    $result_annual_days = mysqli_query($dbConn, $query_annual_days);
    $row_annual_days = mysqli_fetch_assoc($result_annual_days);
    $total_annual_days = $row_annual_days['total_annual_days'] ?? 0;

    // Query to get the total leave hours for the current month
    $query_leave_hours = "SELECT SUM(TIMESTAMPDIFF(HOUR, From_Time, To_Time)) as total_leave_hours 
                          FROM vacations_leaves 
                          WHERE Employee_ID = '$E_ID' 
                          AND Vacation_Leave_Type = 'Leave' 
                          AND Manager_Status = 'Accepted'
                        AND HR_Status = 'Accepted'
                          AND DATE_FORMAT(From_Date, '%Y-%m') = '$current_month'";

    $result_leave_hours = mysqli_query($dbConn, $query_leave_hours);
    $row_leave_hours = mysqli_fetch_assoc($result_leave_hours);
    $total_leave_hours = $row_leave_hours['total_leave_hours'] ?? 0;

  
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
                        <a class="active-menu" href="index.php"><i class="fa fa-desktop fa-3x"></i> <?php echo $lang['Home']; ?></a>
                    </li>
                 
					
					<li>
                        <a href="View_VL_Requests_List.php"><i class="fa fa-list fa-3x"></i>  <?php echo $lang['Vacations_Leaves_Requests']; ?></a>
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
						<h4><center><?php echo $lang['Welcome']; ?> <?php echo $Full_Name; ?></h4>
						<h4><center><?php echo $lang['Today_Date']; ?>: <?php echo date("Y-m-d"); ?></h4>
						<h4><center><?php echo $lang['Check_In_Date_Time']; ?>: <?php echo $Check_In_Date_Time; ?></h4>
						<h4><center><?php echo $lang['Check_Out_Date_Time']; ?>: <?php echo $Check_Out_Date_Time; ?></h4>
                   
				   <br>
				   						<h4><center><?php echo $lang['Total_Sick_Leave_Days_For_This_Month']; ?>: <?php echo $total_sick_days; ?></h4>
				   						<h4><center><?php echo $lang['Total_Annual_Leave_Days_For_This_Year']; ?>: <?php echo $total_annual_days; ?></h4>
				   						<h4><center><?php echo $lang['Total_Leave_Hours_For_This_Month']; ?>: <?php echo $total_leave_hours; ?></h4>

				   
				   
				   
				   	 <form role="form" method="post" action="" enctype="multipart/form-data">
							 <input type="hidden" name="E_ID" value="<?php echo $E_ID; ?>"/>
							 <input type="hidden" name="Today_Date" value="<?php echo date("Y-m-d"); ?>"/>
                                      
										
										
											
										
										
                                   <center>
                                     
                                     <input type="submit" name="Submit" value="<?php echo $lang['Check_In']; ?>" class="btn btn-primary"/>
                                     <input type="submit" name="Submit2" value="<?php echo $lang['Check_Out']; ?>" class="btn btn-primary"/>
                                    </center>
									
									
									</form>
									
									



				   </div>
                </div>              
               
                <hr />                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
               
                <div class="text-box" >
                   <center>   
				         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
						 
						 
				<img src="../assets/img/1.jpg" width="60%"/>
				
				
				<br><br><br>
				
				
<canvas id="statusChart" style="width:300px; height:300px;"></canvas>

<script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(ctx, {
        type: 'pie', 
        data: {
            labels: ['<?php echo $lang['21_Days']; ?>', '<?php echo $lang['Total_Vacation_Balance']; ?>'],
            datasets: [{
                label: '<?php echo $lang['Vacation_Distribution']; ?>',
                data: [
                    21, 
                    <?php echo $Total_Vacation_Balance; ?> 
                ],
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                     'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
         options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                },
                tooltip: {
                    enabled: true 
                }
            },
            layout: {
                padding: 0
            }
        }
    });
</script>

	
	
	
	
				   </center>
				   <br>
				   
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
   
</body>
</html>
