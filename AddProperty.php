<?php
mysql_connect("localhost","admin","admin");
	mysql_select_db("E_M_S");
	session_start();
		
	if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
	    mysql_connect("localhost","admin","admin");
	    mysql_select_db("E_M_S");
	  $Owner_Name=$_POST['owner_name'];
		$Amenity_Name=$_POST['amenity_name'];
		$Amenity_Place=$_POST['amenity_place'];
		$Landmark=$_POST['landmark'];
		$Address=$_POST['address'];
		$Amenity_Type=$_POST['amenity_type'];
		$Floor=$_POST['floor'];
		$Rate=$_POST['rate'];
		$Description=$_POST['description'];
		
		$Email=$_SESSION['user']; 
	    $user=$_SESSION['user']; 
		$que1=mysql_query("select * from Users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$password=$rec[3];
		
		$email=$rec[2];
		$user_gender=$rec[4];
		
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
        $prod_img_path=$img_name;
        move_uploaded_file($img_tmp_name,"users/".$user_gender."/".$Email."/Amenities/".$prod_img_path);
		
		mysql_query("insert into amenities (Owners_Name,Amenity_Name,Amenity_Place,Landmark,Address,Amenity_Type,Floor_Type,Rate,Description,Email,Image) values('$Owner_Name','$Amenity_Name','$Amenity_Place','$Landmark','$Address','$Amenity_Type','$Floor','$Rate','$Description','$user','$img_name')");
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
                           <img src="/Event_Management_System/users/<?php echo $user_gender; ?>/<?php echo $user; ?>/Profile/<?php echo $pic; ?>" height="200" width="100" class="img-thumbnail">

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
                           Amenities
                        </div>
                        <div class="panel-body">
                            
                                        <div class="form-group">
                                            <label>Owner Name</label>
                                            <input name="owner_name" class="form-control" type="text">                                            
                                        </div>
										
                                        <div class="form-group">
                                            <label>Amenity Name</label>
                                            <input name="amenity_name" class="form-control" type="text">                                            
                                        </div>
										
									    <div class="form-group">
                                            <label>Amenity Place </label>											
                                            <input name="amenity_place" class="form-control" type="text">                                           
                                        </div>
										
										<div class="form-group">
                                            <label>Landmark</label>
                                            <input name="landmark" class="form-control" type="text">
                                        </div>
										<div class="form-group">
                                            <label>Address</label>
											<br>
                                            <textarea name="address" class="form-control" rows="3"></textarea>
                                        </div>
										
										<div class="form-group">
                                            <label>Amenity Type</label>
                                            <select name="amenity_type" class="form-control">
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>D</option>
                                            </select>                                          
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
                                            <label>Floor</label>
                                            <select name="floor" class="form-control">
                                                <option>One</option>
                                                <option>Two</option>
                                                <option>Three</option>
                                                <option>Four</option>
                                            </select>
                                        </div>		

                                        <div class="form-group">
                                            <label>Rate/Day</label>
                                            <input name="rate" class="form-control" type="text">
                                        </div>									

                                        <div class="form-group">
                                            <label>Description</label>
											<br>
                                            <textarea name="description" class="form-control" rows="3"></textarea>
                                       	<br><br>
	                                      <div  class="form-group">	
	                                      <label>Photo</label>	
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
