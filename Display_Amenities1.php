<?php
	mysql_connect("localhost","admin","admin");
	mysql_select_db("E_M_S");
	if($id!='')
	{
		$query1=mysql_query("select * from Amenities ");
		$count1=mysql_num_rows($query1);
?>
<html>
<body>
	<div style="position:absolute; left:22.3%;top:10.5%; z-index:-1;"> <img src="background_file/background_icons/Search1.png" height="25" width="25" /> </div>
	<div style="position:absolute; left:25%;top:7%; z-index:-1;"> <h2> All results </h2> </div>
	<hr style="position:absolute;left:22%;top:15%;height:0;width:55%; border-color:#CCCCCC;">
	
	
	<div style="position:absolute;left:22%;top:20%; z-index:-1;">
	<table cellspacing="0" border="0">
<?php
	while($rec1=mysql_fetch_array($query1))
	{
		$owner_name=$rec1[0];
		$name=$rec1[1];
		$place=$rec1[4];
		$image=$rec1[9];
		$gender="aarundas707@gmail.com";
		$email="aarundas707@gmail.com";
?>
		<tr>

		<td bgcolor="#FFFFFF" style="padding-right:7;" id="Photo1<?php echo $owner_name ?>">  <img src="users/<?php echo $gender; ?>/<?php echo $email; ?>/Amenities/<?php echo $img; ?>" style="height:70; width:70;"> </a>  </td>
		
		<td onMouseOver="serched_name_over1(<?php echo $uid;?>)" onMouseOut="serched_name_out1(<?php echo $uid;?>)" width="500" bgcolor="#FFFFFF" id="Name_bg1<?php echo $uid; ?>"> <a href="../fb_profile/Profile.php" style=" text-decoration:none; text-transform:capitalize; color:#3B5998;" id="Name_font1<?php echo $uid;?>">  <?php echo $name; ?> (Me)</a></td>
		
		</tr>
		<tr>
			<td colspan="2"> <hr style="border-color:#CCCCCC;"> </td>
		</tr>
<?php 
		 }}
?>
			<tr>

		<td bgcolor="#FFFFFF" style="padding-right:7;" id="Photo1<?php echo $uid ?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>"> <img src="../../fb_users/<?php echo $gender; ?>/<?php echo $email; ?>/Profile/<?php echo $img; ?>" style="height:70; width:70;"> </a>  </td>
		
		<td onMouseOver="serched_name_over1(<?php echo $uid;?>)" onMouseOut="serched_name_out1(<?php echo $uid;?>)" width="500" bgcolor="#FFFFFF" id="Name_bg1<?php echo $uid; ?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>" style=" text-decoration:none; text-transform:capitalize; color:#3B5998;" id="Name_font1<?php echo $uid;?>">  <?php echo $name; ?></a></td>
		
		</tr>
		<tr>
			<td colspan="2"> <hr style="border-color:#CCCCCC;"> </td>
		</tr>

	</table>
	</body>
	</html>