<?php
	if(isset($_POST['Next']))
	{
		$que1=$_POST['que'];
		$ans1=$_POST['ans'];

		mysql_query("insert into user_secret_quotes(user_id,Question1,Answer1) values('$userid','$que1','$ans1')");
		header("location:../step3/Secret_Question2.php");
	}
?>
<html>
<head>
	<title> Step2 </title>
<?php
	include("step2_background/background.php");
?>
	<link href="step2_css/step2.css" rel="stylesheet" type="text/css">
    <link href="../../fb_font/font.css" rel="stylesheet" type="text/css">
    <LINK REL="SHORTCUT ICON" HREF="../../fb_title_icon/Faceback.ico" />
	<script src="step2_js/que_check.js" language="javascript">
	</script>
</head>
<body>

<form method="post" name="sq" onSubmit="return check()">

<div style="position:absolute; left:33.5%; top:43%;"> <h3> Secret Question 1: </h3> </div>

<div style="position:absolute; left:45%; top:45%;">
<select name="que" style="height:38;font-size:18px;padding:3;">
		<option value="select one">select one</option>
		<option value="what is the first name of your favorite uncle?">what is the first name of your favorite uncle?</option>
		<option value="where did you meet you spouse?">where did you meet you spouse?</option>
		<option value="what is your oldest cousins name?">what is your oldest cousin's name?</option>
		<option value="what is your youngest childs nickname?">what is your youngest child's nickname?</option>
		<option value="what is your oldest childs nickname?">what is your oldest child's nickname?</option>
		<option value="what is the first name of your oldest niece?">what is the first name of your oldest niece?</option>
		<option value="what is the first name of your oldest nephew?">what is the first name of your oldest nephew?</option>
		<option value="what is the first name of your favorite aunt?">what is the first name of your favorite aunt?</option>
		<option value="where did you spend you honeymoon?">where did you spend you honeymoon?</option>
</select>
</div>

<div style="position:absolute; left:35.8%; top:52.7%;"> <h3> Your Answer:  </h3> </div>
<div style="position:absolute; left:45%; top:55%;">  <input type="text" name="ans" / style="height:35; width:350; font-size:18px;" maxlength="50">   </div>

<div style="position:absolute; left:45%; top:67%;"> <input type="submit" name="Next" value="Next" id="Next_button" > </div>

</form>

<div style=" position:absolute; left:16%; top:42%;"> <img src="img/waiting.gif"> </div>

<?php
		include("step2_erorr/step2_erorr.php");
?>
</body>
</html>
