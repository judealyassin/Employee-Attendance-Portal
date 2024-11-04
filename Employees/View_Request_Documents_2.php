<?php
session_start();


include_once '../languages/common.php';

include("../includes/config.php"); 


$E_ID = $_SESSION['E_Log'];


if (!$_SESSION['E_Log'])
echo '<script language="JavaScript">
 document.location="../index.php";
</script>';




$VL_ID = $_GET['VL_ID'];









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
                        <a  href="index.php"><i class="fa fa-desktop fa-3x"></i> <?php echo $lang['Home']; ?></a>
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
                       <?php echo $lang['My_Employees_Vacations_Leaves_Requests_Documents']; ?></a>
             
			 </div>
                        <div class="panel-body">
                            
							
							
							
							
							 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          
                                            <th><?php echo $lang['View_Document']; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
									   
									   
									   
									   
									   <?php
					$sql1 = mysqli_query($dbConn,"select * from vacations_leaves_documents where VL_ID='$VL_ID' order by ID ASC");
					while ($row1 = mysqli_fetch_array($sql1)){
						
					
						$Document = $row1['Document'];
					
					
					
					
						
						?>
                    <tr class="grade">
                       
                        <td><a target="_blank" href="../Employees/<?php echo $Document; ?>" class="btn btn-primary"><?php echo $lang['View_Document']; ?></a></td>
                        
                      
                     
      
                                          
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
