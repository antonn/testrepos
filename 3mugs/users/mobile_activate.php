<?php 
$user_id = $_REQUEST['username'] ;		
$caller =  $_REQUEST['caller'] ;	       
session_start();
if(session_is_registered($user_id)){
			 } else {
			  header( 'Location: http://www.3mugs.com' ) ;
			  }		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>


<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="../images/Refresh.css" type="text/css" />

<title>refresh</title>

	
</head>

<body>

<?php

// Mobile number received
if($_GET['caller'] == 1) {


srand(time());
$random_no = (rand()%99999);


$cellno = $_REQUEST['cellno'] ;	
include ('../db.php');
mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);


$mail_to="$cellno@airtelkk.com";
$mail_from='Code@3mugs.com';
$mail_sub = "Sub";
$mail_mesg="$random_no";
$status = "NO";

if(mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from")){}

$result = mysql_query ( "UPDATE user_profile SET cell_no = '$cellno' , activation_key = '$random_no',status = '$status' WHERE user_id='$user_id' ") or die ("Can't perform Query");

}

// Activation key received
if($_GET['caller'] == 2) {
$activated = 0;
$activationkey = $_REQUEST['activationkey'] ;	
include ('../db.php');
mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);
$result=mysql_query("SELECT * FROM user_profile WHERE user_id='$user_id' ") or die("Can't perform Query");
$row=mysql_fetch_object($result);
$random_code = mysql_result($result,0,"activation_key");
if ($random_code == $activationkey) {
$result = mysql_query ( "UPDATE user_profile SET status = 'YES' WHERE user_id='$user_id' ") or die ("Can't perform Query");
$activated = 1;
}
}

?>




<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
  <div id="header"></div>
  <!-- menu -->	
		<div  id="menu">
			<ul>
				
			 </li>
						
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
					
				<h1>Welcome</h1>
				<div class="left-box">
					<ul class="sidemenu">				
							<li><a href="userindex.php?caller=1&username=<? echo $user_id; ?>">My Home </a></li>
						<li><a href="userindex.php?caller=2&username=<? echo $user_id; ?>">My Subscription </a></li>
						
						
						<li><a href="mobile_activate.php?username=<? echo $user_id; ?>">Activate Mobile </a></li>	
						<li><a href="logout.php?username=<? echo $user_id; ?>">Logout </a></li>	
					</ul>	
				</div>
			
				<h1>For Future Use </h1>
			  <div class="left-box"></div>
				
				<h1>Today's offers </h1>
				<div class="left-box">
					<p>&quot;To be concious that you are ignorant of the
					facts is a great step to knowledge&quot; </p>
					
					<p class="align-right">- Benjamin Disraeli</p>
				</div>	
				
				<h1>New Partners </h1>
				<div class="left-box">
					<p>If you are interested in supporting my work and would like to contribute, you are
					welcome to make a small donation through the 
					<a href="http://www.styleshout.com/">donate link</a> on my website - it will 
					be a great help and will surely be appreciated.</p>
				</div>
			</div>
			<div id="main_1">
			
			<? if($_GET['caller'] == 2 ) { 
			if ($activated) {
			echo "<h1>Account Activated!</h1> "; } else {
			echo "<h1>Account Activation Failed!</h1> ";
			} }?>
			
			<?php if($_GET['caller'] == '') { ?>
			
			  <form enctype="multipart/form-data" name="form1" action="mobile_activate.php?username=<?php echo $user_id; ?>&amp;caller=1" method="post" >
				<h1>Activate my account  </h1>
				
				<p>
				  <label>
			Enter Mobile number </label>
				  <input name="cellno" type="text" id="cellno" size="30" />
				  <label></label>
				  <br />	
				  <input type="submit" class="button" value="Send Activation Code to my mobile" />		
			    </p>
				<p>&nbsp;</p>
			  </form>	
				
			<?php } ?>			
				<br />
				
				<?php	if(( $_GET['caller'] == 2) && (!$activated) ) {  ?>
				<form enctype="multipart/form-data" name="form1" action="mobile_activate.php?username=<?php echo $user_id; ?>&amp;caller=2" method="post" >
				<h4>Invalid Activation Code!</h4>
				<h1>Reenter Activation Code</h1>
				
				<p>
				  <input name="activationkey" type="text" id="activationkey" size="30" />
				  
				  <br />	
				  <input type="submit" class="button" value="Activate my account" />		
				  </p>
				<p>&nbsp;</p>
				</form>				
				<br />
				
			<?php } ?>
				
				
				
				
				
			<?php	if($_GET['caller'] == 1) {  ?>
				<form enctype="multipart/form-data" name="form1" action="mobile_activate.php?username=<?php echo $user_id; ?>&amp;caller=2" method="post" >
				<h1>Enter Activation code you have received </h1>
				
				<p>
				  <input name="activationkey" type="text" id="activationkey" size="30" />
				  
				  <br />	
				  <input type="submit" class="button" value="Activate my account" />		
				  </p>
				<p>&nbsp;</p>
				</form>				
				<br />
				
			<?php } ?>
			</div>
		
		    <!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			
			<p>
		  &copy; 2007 <strong>3mugs.com</strong> All Rights Reserved </p>
				
		</div>	

<!-- wrap ends here -->
</div>

</body>
</html>
