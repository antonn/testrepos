<?php 
require_once ("../includes/session.php");
confirm_user_logged_in(); 

$caller    =	$_REQUEST['caller'] ;	
$action    =	$_REQUEST['action'] ;


   if($action == 'changeloc') {
    $newcity   =	$_REQUEST['newcity'] ;
	  
	$update_city=mysql_query("UPDATE  user_profile SET city='$newcity' WHERE user_id = '$user_id' ")    or die("Can't   perform Query");
		
	//Set Session variable to new city;	
	$_SESSION['city'] = $newcity;
	
	//Set local variable to new city
	$city = $newcity;
			
	}

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
		<?php require_once ("../includes/user_menu.php"); display_menu("index"); ?>
		
			
			
							
						
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
	
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
			<?php require_once ("../includes/user_sidebar.php"); ?>	
				
			</div>
			<div id="main_1">
						
			  <h1>Welcome <? echo $_SESSION['username']; ?>  </h1>
				
			
				
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
