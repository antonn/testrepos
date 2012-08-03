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

function feedback (entry){

var innerhtml =  " <form id=\"form1\" method=\"post\" action=\"\"> <table width=\"100%\"><tr>  " 
                      
                     + "    <td width=\"83%\" height=\"18\"><strong>Enter feedback</strong> </td> "
                     + "    <td width=\"17%\"></td>" 
                     + "    </tr><tr> " 
                     + "    <td><textarea  name=\"textarea\" cols=\"60\" rows=\"5\">Enter your feedback here</textarea></td>"
                     + "    <td></td></tr><tr>"
                     + "    <td><input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\" />"
                     + "    <strong>Anonymous</strong></td><td></td></tr><tr>"
                     + "    <td><input class=\"blackbutton\" type=\"submit\" name=\"Submit\" value=\"Submit\" /> "
					 + "    &nbsp;&nbsp;<input class=\"blackbutton\" type=\"button\" name=\"Cancel\" value=\"Cancel\" onclick=\"feedback(\'2\')\" /> </td>"
					 
                     + "    <td></td></tr></table></form>";
					 
if (entry ==1) {					 
document.getElementById("feedback").innerHTML = innerhtml;  
}

if (entry == 2) {
document.getElementById("feedback").innerHTML = "";  
}

}





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
				
			<div id="sidebar_community">
			
			
			<h1>Mc Donald's <br />
			</h1>
				    <div class="left-box">
				      
				      <img src="../images/brand/mc.jpg" alt="mcdonald" width="143" height="116" /></div>	
					
					
			<?php require_once ("../includes/user_community.php"); ?>	
				
			</div>
			<div id="main_community">
						
				<h6>McDonalds ,The Forum </h6>
				
			<h3 class="post-footer align-right">					
			<a href="index.html" class="readmore">New Post </a></h3>	
				
			<blockquote>
				  <h3>Posted by Rajiv on date </h3>
				  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
				nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p>
				  <h3><a href="javascript:feedback('1');">Feedback</a> - <a href="../3M/3mugs/users/realestate.php">Report Abuse</a></h3>
				 <div id="feedback" > </div>
				 
			</blockquote>	
				
						
			</div>
		
		   <!-- content-wrap ends here --></div>
					
		<!--footer starts here-->
		<div id="footer">
			
			<p>
		  &copy; 2007 <strong>3mugs.com</strong> All Rights Reserved </p>
				
		</div>	

<!-- wrap ends here -->
</div>

</body>
</html>
