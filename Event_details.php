<?php
mysql_connect("localhost","admin","admin");
	mysql_select_db("E_M_S");
	session_start();
		
	if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
	    mysql_connect("localhost","admin","admin");
	    mysql_select_db("E_M_S");
	  $Event_Name=$_POST['evt_name'];
		$Event_Orgnz_Name=$_POST['evt_orgnzr_name'];
		$Event_type=$_POST['evt_type'];
		$Reg_start=$_POST['reg_strt'];
		$Reg_end=$_POST['reg_end'];
		$Event_date=$_POST['evt_date'];
		$Venue=$_POST['venue'];
		
		
		$Email=$_SESSION['user']; 
	    $user=$_SESSION['user']; 
		if($user==null)
	     {
	      echo "Error Please Login";
	     }
		$que1=mysql_query("select * from Users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$password=$rec[3];
		
		$email=$rec[2];
		$user_gender=$rec[4];
		
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
        $prod_img_path=$img_name;
        move_uploaded_file($img_tmp_name,"users/Male/".$Email."/Host/Logo/".$prod_img_path);
		
		mysql_query("insert into Event_dtls (Event_Name,Event_Orgnz_Name,Event_type,Reg_start,Reg_end,Event_date,Venue) values('$Event_Name','$Event_Orgnz_Name','$Event_type','$Reg_start','$Reg_end','$Venue')");
		}
		?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Management System</title>
     <?php
     //session_start();
		 
	 $user=$_SESSION['user']; 
	 if($user==null)
	 {
	 echo "Error Please Login";
	 }
	       $query2=mysql_query("select * from Profile_pic where EmailID='$user' ");
		$rec2=mysql_fetch_array($query2);
		$pic=$rec2[1];
		$que1=mysql_query("select * from Users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$userid=$rec[0];
		$user_gender=$rec[4];
		$name=$rec[1];
	 ?>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="index.html">Event Management System</a>
            </div>
                     
            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="Logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
		
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                           <img src="/Event_Management_System/users/<?php echo $user_gender; ?>/<?php echo $user; ?>/Profile/<?php echo $pic; ?>" class="img-thumbnail">
                            
                            <div class="inner-text">
                                <?php 
								echo "$name" ;
								?>
                            <br />
                                <small>     </small>
                            </div>
                        </div>

                    </li>

                       
                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>UI Elements <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>Tabs & Panels</a>
                            </li>
                            <li>
                                <a href="notification.html"><i class="fa fa-bell "></i>Notifications</a>
                            </li>
                             <li>
                                <a href="progress.html"><i class="fa fa-circle-o "></i>Progressbars</a>
                            </li>
                             <li>
                                <a href="buttons.html"><i class="fa fa-code "></i>Buttons</a>
                            </li>
                             <li>
                                <a href="icons.html"><i class="fa fa-bug "></i>Icons</a>
                            </li>
                             <li>
                                <a href="wizard.html"><i class="fa fa-bug "></i>Wizard</a>
                            </li>
                             <li>
                                <a href="typography.html"><i class="fa fa-edit "></i>Typography</a>
                            </li>
                             <li>
                                <a href="grid.html"><i class="fa fa-eyedropper "></i>Grid</a>
                            </li>
                            
                           
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-yelp "></i>Extra Pages <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="invoice.html"><i class="fa fa-coffee"></i>Invoice</a>
                            </li>
                            <li>
                                <a href="pricing.html"><i class="fa fa-flash "></i>Pricing</a>
                            </li>
                             <li>
                                <a href="component.html"><i class="fa fa-key "></i>Components</a>
                            </li>
                             <li>
                                <a href="social.html"><i class="fa fa-send "></i>Social</a>
                            </li>
                            
                             <li>
                                <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                            </li>
                            
                           
                        </ul>
                    </li>
                    <li>
                        <a href="table.html"><i class="fa fa-flash "></i>Data Tables </a>
                        
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="form.html"><i class="fa fa-desktop "></i>Basic </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Advance</a>
                            </li>
                             
                           
                        </ul>
                    </li>
                      <li>
                        <a href="gallery.html"><i class="fa fa-anchor "></i>Gallery</a>
                    </li>
                     <li>
                        <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="fa fa-sign-in "></i>Login Page</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
                  </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>
						<div class="container">
        <div class="row text-center">
            
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-sm-6  col-xs-10">
                           
                            <div class="panel-body">
<form method="post" enctype="multipart/form-data" name="uimg" onSubmit="return Img_check();">
 <div class="panel panel-info">
                        <div class="panel-heading">
                           Host Your Events!
						   
                        </div>
                        <div class="panel-body">
                            
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input name="evt_name" class="form-control" type="text">                                            
                                        </div>
										
                                        <div class="form-group">
                                            <label>Event Organizer Name</label>
                                            <input name="evt_orgnzr_name" class="form-control" type="text">                                            
                                        </div>
										
									    <div class="form-group">
                                            <label>Event Type</label>
                                            <select name="evt_type" class="form-control">
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>D</option>
                                            </select>                                          
                                        </div>
										
										<div class="form-group">
                                            <label>Registration Start</label>
                                            <input name="reg_strt" class="form-control" type="Date">
                                        </div>
										<div class="form-group">
                                            <label>Registration End</label>
											<input name="reg_end" class="form-control" type="Date">
                                        </div>
										
										
										<div class="form-group">
                                           <!-- <label>Floor Type</label>
										<div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">YES
                                                </label>
												<label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">NO
                                                </label>
                                            </div>	-->										
										
                                        	

                                        <div class="form-group">
                                            <label>Event Date</label>
                                            <input name="evt_date" class="form-control" type="Date">
                                        </div>									

                                        
										
										 <div class="form-group">
                                            <label>Venue</label>
											<br>
                                            <input type="text" name="venue" class="form-control" rows="3">
                                        </div>	
										
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Show Suggestions
</button>
 

<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Select the amenities</h4>
      </div>
      <div class="modal-body">
	  
             <div style=""> <img src="background_file/background_icons/Search1.png"/> </div>
	<div style=""> <h2> All results </h2> </div>
	<hr style="">
	
	
	<style>
	.modal {
    overflow-y:scroll;
    max-height:90%;
	}
	</style>
	<table class="table" id="amenities">
<?php
$query1=mysql_query("select * from Amenities ");
		$count1=mysql_num_rows($query1);
	while($rec1=mysql_fetch_array($query1))
	{
		$owner_name=$rec1[0];
		$name=$rec1[1];
		$place=$rec1[4];
		$image=$rec1[11];
		$email=$rec1[10];
		$uid=$rec1[0];
		$que3=mysql_query("select * from Users where Email='$email' ");
		$rec3=mysql_fetch_array($que3);
		$gender=$rec3[4];
		
	
?>
		<tr class="row">
          
		<td" id="Photo1<?php echo $owner_name ?>"> <a href="Display_amenities.php"> <img class="img-thumbnail col-md-4" src="/Event_Management_System/users/<?php echo $gender; ?>/<?php echo $email; ?>/Amenities/<?php echo $image; ?>" "> </a>  </td>
		<?php ?>
		
		
		</tr>
		
<?php 
		 }
?>
			

	</table>
      </div>
    </div>
	</div>
	</div>
	</div>
	
									 
									 <br><br>
	                                      <div  class="form-group">	
	                                      <label>Upload Logo</label>	
		                                  <input type="file" name="file" id="img"/>  
	                                      </div>
									   <div class="control-control">
									   <input type="submit" value="Upload" name="file" id="upload_button"/>
									   </div>
                                       </form>
									   </div>

    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<footer class="container-fluid">
	<div id="footer-sec">
         Design By :Arundas <a href="http://www.binarytheme.com/" target="_blank"></a>
    </div>
	</footer>
</body>
</html>
