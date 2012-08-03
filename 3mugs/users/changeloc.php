<?php 
require_once ("../includes/session.php");
confirm_user_logged_in(); 		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAP_25KWM5HL3T4KI7UQ1jSxQpH4AR0UcVcQz7B__Oir_QGqAv4BQ5o5gKzAcXJZTtAYQMuKOisQ9_bw"
      type="text/javascript"></script>

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
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
  <div id="header"></div>
  <!-- menu -->	
		<div  id="menu">
			<ul>
			<li><a href="food.php?username=<?php echo $user_id; ?>">Food</a></li>
			<li><a href="pub.php?username=<?php echo $user_id; ?>">Pubs</a></li>
			<li><a href="mall.php?username=<?php echo $user_id; ?>">Mall</a></li>
			<li><a href="brand.php?username=<?php echo $user_id; ?>">Brands / Showrooms</a></li>
			<li><a href="realestate.php?username=<?php echo $user_id; ?>">Real Estate</a></li>
			<li><a href="automobile.php?username=<?php echo $user_id; ?>">Automobile</a></li>
		
			
			
							
						
			</ul>
		</div>	
		
				
<script type="text/javascript">
function unsubscribe(user_id,camp_id){
if ( document.getElementById(camp_id).value == "Done!"  )  {
alert ("Already Removed!");
} else {

var url = "subscription.php?action=remove&username="+user_id+"&camp_id="+camp_id;
GDownloadUrl(url, function(data) {document.getElementById(camp_id).value="Done!";});
}}

function unsubscribe_real(user_id,index){

var x = index + "_REAL";
if ( document.getElementById(x).value == "Done!"  )  {
alert ("Already Removed!");
} else {

var url = "subscription_real.php?action=remove&username="+user_id+"&id="+index;

GDownloadUrl(url, function(data) {document.getElementById(x).value="Done!";});
}}
</script>
						
<?php 


?>		
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
					
					<h1>Your default city   </h1>
				    <div class="left-box">
					<form id="form2" method="post" action="">
					  <?php echo $_SESSION['city']; ?>
					</form>
					
					
			  </div>	
					
					
					
				<h1>Menu</h1>
				<div class="left-box">
					<ul class="sidemenu">				
						<li><a href="userindex.php">My Home </a></li>
						<li><a href="userindex.php?username=<? echo $user_id; ?>">New Subscription </a></li>
						<li><a href="mysubscription.php?username=<? echo $user_id; ?>">My Subscription </a></li>
						
						
						<li><a href="mobile_activate.php?username=<? echo $user_id; ?>">Account Settings  </a></li>	
						<li><a href="logout.php?username=<? echo $user_id; ?>">Logout </a></li>	
					</ul>	
				</div>
			
				<h1>foo </h1>
			    <div class="left-box"></div>
				
				
				
				<h1>foo </h1>
				<div class="left-box">
					<ul>
					<li><span>foo</span></li>
					<li><span>foo</span></li>								
				</ul>				
				
				</div>
			</div>
			<div id="main_1">
			
			
				<h1>Change your location </h1>
				
				<form id="form1" method="post" action="userindex.php?username=<?php echo $_SESSION['username'];?>">
				  <h3>Select City 
				    <select name="newcity" id="newcity">
                            <option value="Bangalore" selected="selected">Bangalore</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Delhi">Delhi</option>
                    </select>
				    <input name="action" type="hidden" id="action" value="changeloc" />
				  </h3>
				  <p>
				    <input type="submit" class="button" value="Change my City" />
				  </p>
				</form>
				
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p><br />
			    </p>
				<br />
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
