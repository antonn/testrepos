<?php 
require_once ("../includes/session.php");
confirm_user_logged_in(); 
	
$action = $_REQUEST['action'];  //expected 'show'
$node_id = $_REQUEST['node_id']; // expected  is 014

	    
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
			<?php require_once ("../includes/user_menu.php"); display_menu("brand");?>
						
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
					
				<?php require_once ("../includes/user_sidebar.php"); ?>
			</div>
		  <div id="main_1">

<script type="text/javascript">



function feedback (entry,action){

var innerhtml =  " <form id=\"form1\" method=\"post\" action=\"\"> <table width=\"100%\"><tr>  " 
                      
                     + "    <td width=\"83%\" height=\"18\"><strong>Enter feedback</strong> </td> "
                     + "    <td width=\"17%\"></td>" 
                     + "    </tr><tr> " 
                     + "    <td><textarea  name=\"textarea\" cols=\"60\" rows=\"5\">Enter your feedback here</textarea></td>"
                     + "    <td></td></tr><tr>"
                     + "    <td><input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\" />"
                     + "    <strong>Anonymous</strong></td><td></td></tr><tr>"
                     + "    <td><input class=\"button\" type=\"submit\" name=\"Submit\" value=\"Submit\" /> "
					 + "    &nbsp;&nbsp;<input class=\"button\" type=\"button\" name=\"Cancel\" value=\"Cancel\" onclick=\"feedback(\'"+entry+"\','2')\" /> </td>"
					 
                     + "    <td></td></tr></table></form>";
					 
if (action ==1) {					 
document.getElementById(entry).innerHTML = innerhtml;  
}

if (action == 2) {
document.getElementById(entry).innerHTML = "";  
}

}


function subscribe(user_id,sub_id){
if ( document.getElementById(sub_id).value == "Done!"  )  {
alert ("Already Subscribed!");
} else {
var url = "subscription.php?cat=brand&action=add&username="+user_id+"&sub_id="+sub_id;
GDownloadUrl(url, function(data) {document.getElementById(sub_id).value="Done!"; alert(data);});
}}
</script>



<!-- PUB BEGINS  --->

<?php 
$sql_cat = "brand";
$sql_city = $_SESSION['city'];
$sql_user_id = $_SESSION['username'];

//For Customer campaign in brand
$result=MYSQL_QUERY("SELECT shopname,brand_1.id,title,msg1 FROM campaign,brand_1 WHERE  campaign.cust_id=brand_1.cust_id AND campaign.city='$sql_city';");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result); 

// For listings in pub
//$result_list=MYSQL_QUERY("SELECT * FROM pubs_2 WHERE  city='$sql_city' AND category='$sql_cat'");
//$row_list=mysql_fetch_object($result_list);
//$num_list=mysql_num_rows($result_list); 
 
?>


<h1>Brand outlets  in <?php echo $_SESSION['city']; ?></h1>


<!-- For Customer listing -->
 <?php
	$i=0;
	while ($i < $num) {
 ?>
	  <div id="rss"><h6><a href="jo.html"><?php echo mysql_result($result,$i,"shopname"); ?></a></h6><a href="javascript:feedback('<?php echo mysql_result($result,$i,"id"); ?>','1');">Give Feedback</a></div>
	  <form name="form1">
	  <blockquote><p><?php echo mysql_result($result,$i,"msg1"); ?></p>
	  <p>		   
		 <?php 
		 $sub_id = mysql_result($result,$i,"id");
		 $inter_result = MYSQL_QUERY("SELECT * FROM brand_2 WHERE  sub_id='$sub_id' AND user_id='$sql_user_id'");
         $inter_row = mysql_num_rows($inter_result);
		 
		 ?>
		 
         <?php		 
		 
		 if ($inter_row == 0 ) {   ?>
		   
		   
		   <input type='button' class="blackbutton" value="Subscribe" onclick="subscribe('<?php echo $sql_user_id; ?>','<?php echo $sub_id; ?>')" id="<? echo $sub_id; ?>"/>

<?php		} else {    ?>
		
		 <input type='button' class="blackbutton" value="Already Subscribed" />
		
       <?php		}    ?>
		 
		   </p><div id="<?php echo mysql_result($result,$i,"id"); ?>" > </div></blockquote></form>
	   	
		
		<?php $i++; } 	?>
		

<!--  Cutomer Campaign ENDS . Our Listing Starts-->	

					
	
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
