<?php
session_start();
include_once 'languages/common.php';

include("includes/config.php"); 





if(isset($_POST['Submit']))
{
	
$Username=$_POST['Username'];
$Password=md5($_POST['Password']);


$Type=$_POST['Type'];



if ($Type=='Administrator'){
	
	
	
	

if ($Username=='admin' && $Password=='21232f297a57a5a743894a0e4a801fc3'){
		


$A_ID=1;
$_SESSION['A_Log'] = $A_ID;


	  
echo '<script language="JavaScript">
            document.location="Administration/";
        </script>';
	
}
else
{

echo '<script language="JavaScript">
	  alert ("Sorry ! Please Check Administrator Username Or Password !")
      </script>';
	  


}
	
	
	
	
}elseif($Type=='Employee'){
	

	
$query = mysqli_query($dbConn,"SELECT * FROM employees WHERE (Username='$Username' AND Password='$Password') AND Status='Active'"); 
		

if (mysqli_num_rows($query)>0)
{

$row=mysqli_fetch_array($query);
$E_ID=$row['ID'];
$_SESSION['E_Log'] = $E_ID;


	  
echo '<script language="JavaScript">
            document.location="Employees/";
        </script>';
	
}
else
{

echo '<script language="JavaScript">
	  alert ("Sorry ! Please Check Employee Username Or Password !")
      </script>';
	  


}
	
	
	
	
}














}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['Title']; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <link rel="shortcut icon" href="assets/img/icon.png"/>





<style>
@font-face {
   font-family: myFirstFont;
   src: url(fonts/NotoKufiArabic-Regular.ttf);
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








   
                <a href="<?php echo $URL; ?>?lang=en" class="btn btn-primary square-btn-adjust"><img src="languages/images/en.png" /></a>
<a href="<?php echo $URL; ?>?lang=ar" class="btn btn-primary square-btn-adjust"><img src="languages/images/ar.png" /></a>

				 <a href="Users_Login.php" class="btn btn-primary"><?php echo $lang['Users_Login']; ?></a>



</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/ju.png" class="user-image img-responsive"/>
					</li>
				
					
                   
                    <li>
                        <a   href="index.php"><i class="fa fa-desktop fa-3x"></i> <?php echo $lang['Home']; ?></a>
                    </li>
                    <li>
                        <a  href="About_System.php"><i class="fa fa-question-circle fa-3x"></i> <?php echo $lang['About_System']; ?></a>
                    </li>
						   <li  >
                        <a target="_blank" href="النظام.pdf"><i class="fa fa-list fa-3x"></i> <?php echo $lang['System_Rules']; ?></a>
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
                    <div class="col-md-12 col-sm-12 col-xs-12">           
			
					                        <h3><center><?php echo $lang['Users_Login']; ?> </center></h3>
			
		
                                <form role="form" method="post" action="Users_Login.php">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" name="Username" placeholder="<?php echo $lang['Username']; ?>" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="Password"  placeholder="<?php echo $lang['Password']; ?>" />
                                        </div>
										
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <select class="form-control" name="Type" required>
											 <option disabled selected value><?php echo $lang['Select_Type']; ?></option>
											<option value="Administrator"><?php echo $lang['Administrator']; ?></option>
											<option value="Employee"><?php echo $lang['Employee']; ?></option>
											
											
											
											</select>
                                        </div>
										
										
										
										
                                   <center>
                                     
                                     <input type="submit" name="Submit" value="<?php echo $lang['Login']; ?>" class="btn btn-primary"/>
                                     <input type="reset" name="Reset" value="<?php echo $lang['Clear']; ?>" class="btn btn-danger"/>
                                    </center>
									
									
									</form>
							
							
							
			 
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
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
