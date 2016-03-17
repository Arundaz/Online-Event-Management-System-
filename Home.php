<?php
if(isset($_POST['Login']))
{
	mysql_connect("localhost","admin","admin");
	mysql_select_db("E_M_S");
	
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	$que1=mysql_query("select * from Users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$password=$rec[3];
		$name=$rec[1];
		$email=$rec[2];
		$user_gender=$rec[4];
		if($password==$pass)
		{
		session_start();
		$_SESSION['user']=$email;
		$query2=mysql_query("select * from Profile_pic where EmailID='$user' ");
		$rec2=mysql_fetch_array($query2);
		$pic=$rec2[1];
		?>
		<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Management System</title>

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
                                <small> </small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Account Settings <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>Change Password</a>
                            </li>
                            <li>
                                <a href="notification.html"><i class="fa fa-bell "></i>Change Email</a>
                            </li>
                             <li>
                                <a href="progress.html"><i class="fa fa-circle-o "></i>Change PhoneNo</a>
                            </li>
                             <li>
                                <a href="buttons.html"><i class="fa fa-code "></i>Change Address</a>
                            </li>
                             
                           </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-yelp "></i>Amenities <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="invoice.html"><i class="fa fa-coffee"></i>Change Picture</a>
                            </li>
                            <li>
                                <a href="pricing.html"><i class="fa fa-flash "></i>Change Rate</a>
                            </li>
                             <li>
                                <a href="component.html"><i class="fa fa-key "></i>Delete Amenities</a>
                            </li>
                            
                            
                           
                        </ul>
                    </li>
                   
                     <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Events Settings <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="form.html"><i class="fa fa-desktop "></i>Events History </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Event Tickets</a>
                            </li>
							 <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>My Events</a>
                            </li>
							 <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Upcoming Events</a>
                            </li>
							 <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>View Ratings</a>
                            </li>
                             
                           
                        </ul>
                    </li>
                      <li>
                        <a href="Display_Amenities1.php"><i class="fa fa-anchor "></i>Home</a>
                    </li>
                     <li>
                        <a href="Display_amenities.php"><i class="fa fa-bug "></i>Report FeedBack</a>
                    </li>
                    
                   
                            
                                </ul>

                            </li>
                        </ul>
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

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="Event_details.php">
                                <i class="fa fa-bolt fa-5x"></i>
                                <h5>Host An Event</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="FindEvents.php">
                                <i class="fa fa-plug fa-5x"></i>
                                <h5>Find Events</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="AddProperty.php">
                                <i class="fa fa-dollar fa-5x"></i>
                                <h5>Add Amenities</h5>
                            </a>
                        </div>
                    </div>

                </div>
              </div>

    <div id="footer-sec">
         Design By Arundas: <a href="http://www.binarytheme.com/" target="_blank"></a>
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
    </body>
</html>
<?php
   }
    else
   {
     echo "Wrong Password";
   }
   }
 ?>   