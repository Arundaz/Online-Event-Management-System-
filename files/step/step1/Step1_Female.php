
<?php
session_start();
mysql_connect("localhost","admin","admin");
		mysql_select_db("E_M_S");
		$user=$_SESSION['tempfbuser'];
		$que1=mysql_query("select * from Users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$userid=$rec[0];
		$gender=$rec[4];

	if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
		$path = "../../../users/Female/".$user."/Profile/";
		//$path2 = "../../../fb_users/Female/".$user."/Post/";
		//$path3 = "../../../fb_users/Female/".$user."/Cover/";
		mkdir($path, 0, true);
		mkdir("../../../users/Female/".$user."/Amenities", 0700);
		mkdir("../../../users/Female/".$user."/Host", 0700);
		mkdir("../../../users/Female/".$user."/Host/Logo", 0700);
		mkdir("../../../users/Female/".$user."/Host/Background", 0700);
		//mkdir($path2, 0, true);
		//mkdir($path3, 0, true);
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
    	move_uploaded_file($img_tmp_name,"../../../users/Female/".$user."/Profile/".$prod_img_path);
		
		mysql_query("insert into Profile_pic(EmailID,Image) values('$userid','$img_name')");
		header("location:../step2/Secret_Question1.php");
	} 
?>
<html>
<head>
	<title> Step1 </title>
	<link href="step1_css/step1.css" rel="stylesheet" type="text/css">
    <link href="../../fb_font/font.css" rel="stylesheet" type="text/css">
    <LINK REL="SHORTCUT ICON" HREF="../../fb_title_icon/Faceback.ico" />
	<script src="step1_js/Image_check.js" language="javascript">
	</script>
</head>
<body>
<?php
	include("step1_background/background.php");
?>
<div style="position:absolute; left:35%; top:50%;">
<img src="step1_images/Female.jpg" style=" height:60; width:60;"/> 
</div>

<div style="position:absolute; left:39%; top:50%;"> 
	<table>
		<tr>
			<td></td> <td>&nbsp;  </td> <td style="text-transform:capitalize"> <h4><?php echo $rec[1]; ?></h4></td>
		</tr>
	</table> 
</div>


<form method="post" enctype="multipart/form-data" name="uimg" onSubmit="return Img_check();">
	<div style="position:absolute; left:40%; top:65%;">	
		<input type="file" name="file" id="img"/>  
	</div>
    
	<div style="position:absolute; left:57.5%; top:64%; " id="upload">	
		<input type="submit" value="Upload" name="file" id="upload_button"/>	
	</div>
</form>
	<?php
		include("step1_erorr/step1_erorr.php");
	?>
</body>
</html>