<?php
session_start();


include_once '../languages/common.php';

include("../includes/config.php"); 


$A_ID = $_SESSION['A_Log'];


if (!$_SESSION['A_Log'])
echo '<script language="JavaScript">
 document.location="../Users_Login.php";
</script>';






$select1 = mysqli_query($dbConn,"select * from vacations_leaves where HR_Status='Pending'");
$num = mysqli_num_rows($select1);




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







   <a href="" class="btn btn-primary square-btn-adjust"><?php echo $lang['Administrator_Portal']; ?></a>

   
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
                        <a  href="View_Employees_List.php"><i class="fa fa-users fa-3x"></i> <?php echo $lang['Employees_List']; ?> </a>
                    </li>
					
					
					
                    <li>
                        <a class="active-menu" href="View_VL_Requests_List.php"><i class="fa fa-building fa-3x"></i> <?php echo $lang['Vacations_Leaves_Requests']; ?> <font style="color:orange">(<?php echo $num; ?>)</font></a>
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
						<?php echo $lang['Vacations_Leaves_Requests_List']; ?>
                        
                        </div>
                        <div class="panel-body">
                            
							
							
							
							
							 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="color:red !important"><strong>#<?php echo $lang['ID']; ?></strong></th>
                                            <th><?php echo $lang['Employee_Full_Name']; ?></th>
                                            <th><?php echo $lang['Vacation_Leave_Type']; ?></th>
                                            <th><?php echo $lang['Type']; ?></th>
                                            <th><?php echo $lang['From_Date']; ?></th>
                                            <th><?php echo $lang['To_Date']; ?></th>
                                            <th><?php echo $lang['From_Time']; ?></th>
                                            <th><?php echo $lang['To_Time']; ?></th>
                                            <th><?php echo $lang['Total_Days']; ?></th>
                                            <th><?php echo $lang['Total_Hours']; ?></th>
                                            <th><?php echo $lang['Resoan']; ?></th>
                                            <th><?php echo $lang['Notes']; ?></th>
                                            <th><?php echo $lang['Manager_Status']; ?></th>
                                            <th><?php echo $lang['HR_Status']; ?></th>
                                            
                                            <th><?php echo $lang['Add_Date_Time']; ?></th>
                                            <th><?php echo $lang['Actions']; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
									   
									   
									   
									   
									   <?php
					$sql1 = mysqli_query($dbConn,"select * from vacations_leaves order by ID ASC");
					while ($row1 = mysqli_fetch_array($sql1)){
						
						$VL_ID = $row1['ID'];
						$Employee_ID = $row1['Employee_ID'];
						$Vacation_Leave_Type = $row1['Vacation_Leave_Type'];
						$Type = $row1['Type'];
						$From_Date = $row1['From_Date'];
						$To_Date = $row1['To_Date'];
						$From_Time = $row1['From_Time'];
						$To_Time = $row1['To_Time'];
						$Total_Days = $row1['Total_Days'];
						$Total_Hours = $row1['Total_Hours'];
						$Reason = $row1['Reason'];
						$Notes = $row1['Notes'];
						$Manager_Status = $row1['Manager_Status'];
						$HR_Status = $row1['HR_Status'];
						
						$Add_Date_Time = $row1['Add_Date_Time'];

					$sql2 = mysqli_query($dbConn,"select * from employees where ID='$Employee_ID'");
					$row2 = mysqli_fetch_array($sql2);
					
					$Full_Name = $row2['Full_Name'];
					
					
					
					
					
					
					
					


					
						?>
                    <tr class="grade">
                        <td style="color:red !important"><strong><?php echo $VL_ID; ?></strong></td>
                        <td><?php echo $Full_Name; ?></td>
                        
						<td><?php echo $Vacation_Leave_Type; ?></td>
						
						
						<td><?php echo $Type; ?></td>
                        <td><?php echo $From_Date; ?></td>
                        <td><?php echo $To_Date; ?></td>
                        <td><?php echo $From_Time; ?></td>
                        <td><?php echo $To_Time; ?></td>
                       <td><?php echo $Total_Days; ?></td>
                       <td><?php echo $Total_Hours; ?></td>
                       <td><?php echo $Reason; ?></td>
                       <td><?php echo $Notes; ?></td>
                       <td><?php echo $Manager_Status; ?></td>
                       <td><?php echo $HR_Status; ?></td>
					   			 <td><?php echo $Add_Date_Time; ?></td>

                  
                     
                     
                     
 <td><center>
 

 <a href="View_Request_Documents.php?VL_ID=<?php echo $VL_ID; ?>" class="btn btn-primary" role="button"><?php echo $lang['View_Documents']; ?></a>
 
  <br>
 <br>

 
 <a href="JavaScript:if(confirm('<?php echo $lang['Are_You_Sure_To_Update_Status']; ?>')==true)
{window.location='Accept_Request.php?Vacation_Leave_Type=<?php echo $Vacation_Leave_Type; ?>&Manager_Status=<?php echo $Manager_Status; ?>&Total_Days=<?php echo $Total_Days; ?>&Employee_ID=<?php echo $Employee_ID; ?>&VL_ID=<?php echo $VL_ID; ?>';}" class="btn btn-success" role="button"><?php echo $lang['Accept']; ?></a>

 <br><br>


<a href="JavaScript:if(confirm('<?php echo $lang['Are_You_Sure_To_Update_Status']; ?>')==true)
{window.location='Reject_Request.php?Manager_Status=<?php echo $Manager_Status; ?>&VL_ID=<?php echo $VL_ID; ?>';}" class="btn btn-warning" role="button"><?php echo $lang['Reject']; ?></a>

<br><br>


<a href="JavaScript:if(confirm('<?php echo $lang['Are_You_Sure_To_Delete']; ?>')==true)
{window.location='Delete_Request.php?VL_ID=<?php echo $VL_ID; ?>';}" class="btn btn-danger" role="button"><?php echo $lang['Delete']; ?></a>


</center></td>                     
                                          
 </tr>
                    
                    <?php
					}
					?>
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
                                    </tbody>
                                </table>
                            </div>			
										
                                  
									
									
						
									
									
									
									
									
                            
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
