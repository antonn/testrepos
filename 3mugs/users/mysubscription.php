<?php 

require_once ("../includes/session.php");
confirm_user_logged_in(); 

$caller    =	$_REQUEST['caller'] ;	
$action    =	$_REQUEST['action'] ;

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
function unsubscribe(cat,sub_id){
var button_id = cat+"_"+sub_id;
if ( document.getElementById(button_id).value == "Done!"  )  {
alert ("Already Removed!");
} else {
var url = "subscription.php?action=remove&cat="+cat+"&sub_id="+sub_id;
GDownloadUrl(url, function(data) {document.getElementById(button_id).value="Done!";});
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

$mysql_username = $_SESSION['username'];
//fetch result for restaurant

$result_rest=MYSQL_QUERY("SELECT food_2.id,shopname,title,msg1 FROM food_2,food_1,campaign WHERE (food_2.sub_id = food_1.id AND food_1.cust_id = campaign.cust_id) AND (food_2.user_id='$mysql_username')");
$row_rest=mysql_fetch_object($result_rest);
$num_rest=mysql_num_rows($result_rest);	

		
//fetch result for pubs
$result_pub=MYSQL_QUERY("SELECT pub_2.id,shopname,title,msg1 FROM pub_2,pub_1,campaign WHERE (pub_2.sub_id = pub_1.id AND pub_1.cust_id = campaign.cust_id) AND (pub_2.user_id='$mysql_username')");
$row_pub=mysql_fetch_object($result_pub);
$num_pub=mysql_num_rows($result_pub);	

//fetch result for brand

$result_brand=MYSQL_QUERY("SELECT brand_2.id,shopname,title,msg1 FROM brand_2,brand_1,campaign WHERE (brand_2.sub_id = brand_1.id AND brand_1.cust_id = campaign.cust_id) AND (brand_2.user_id='$mysql_username')");
$row_brand=mysql_fetch_object($result_brand);
$num_brand=mysql_num_rows($result_brand);	

//fetch result for real estate
$result_real=MYSQL_QUERY("SELECT DISTINCT * FROM realdata WHERE user_id='$mysql_username'");
$row_real=mysql_fetch_object($result_real);
$num_real=mysql_num_rows($result_real);	

//fetch result for automobile


?>		
<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
		    <?php require_once ("../includes/user_sidebar.php"); ?>	
			</div>
			<div id="main_1">
			
	
	  <?php	if ($num_rest  || $num_real) { 
				echo "<h1>My Subscriptions</h1>";
	        }else {  
		        echo " <h1>You have no Subcriptions!</h1>";
	    } ?>
		       
<!-- Subscription in Restaurant -->
   
<?php
if($num_rest) { 	
//echo "<h1>Subscription in Restaurant </h1>";
} ?>

		  <?php
		
			$i=0;
			
			while ($i < $num_rest) {
		
	      ?>
			  <div id="rss"><h6><a href="jo.html">
		   <?php echo mysql_result($result_rest,$i,"shopname"); ?>
		      </a></h6></div><form name="form1"><blockquote><p>
		   <?php echo mysql_result($result_rest,$i,"msg1"); ?>
		   </p><p><input type='button' class="blackbutton" value="Un-Subscribe" onclick="unsubscribe('food','<?php echo mysql_result($result_rest,$i,"id"); ?>')" id="food_<? echo mysql_result($result_rest,$i,"id"); ?>"/>

		   
		 
		   </p></blockquote></form><br />
		   
	   	<?php $i++; } ?>
					
				<br />
				
			   
			   
			   <!-- Subscription in Restaurant ends -->
			   
			   
			   
	<!-- Subscription in pubs -->		   

        <?php
	
if($num_pub) { 	
//echo "<h1>Subscription in Pubs </h1>";
} 
?>

		
			<?php
			$i=0;
			while ($i < $num_pub) {
		 
		    ?>
			  <div id="rss"><h6><a href="jo.html">
		   <?php echo mysql_result($result_pub,$i,"shopname"); ?>
		      </a></h6></div><form name="form1"><blockquote><p>
		   <?php echo mysql_result($result_pub,$i,"msg1"); ?>
		   </p><p><input type='button' class="blackbutton" value="Un-Subscribe" onclick="unsubscribe('pub','<?php echo mysql_result($result_pub,$i,"id"); ?>')" id="pub_<? echo mysql_result($result_pub,$i,"id"); ?>"/>

		   
		   </p></blockquote></form><br />
		   
	   	<?php $i++; } ?>
					
				<br />
				
	
	
	
	<!-- Subscription for Pub Ends  -->
			   
			   
			   
		
	<!-- Subscription for Brand starts   -->
	


			    <?php
			
			$i=0;
			
			while ($i < $num_brand) {
		
		?>
			  <div id="rss"><h6><a href="jo.html">
		   <?php echo mysql_result($result_brand,$i,"shopname"); ?>
		      </a></h6></div><form name="form1"><blockquote><p>
		   <?php echo mysql_result($result_brand,$i,"msg1"); ?>
		   </p><p><input type='button' class="blackbutton" value="Un-Subscribe" onclick="unsubscribe('brand','<?php echo mysql_result($result_brand,$i,"id"); ?>')" id="brand_<? echo mysql_result($result_brand,$i,"id"); ?>"/>

		   
		 
		   </p></blockquote></form><br />
		   
	   	<?php $i++; } ?>
					
				<br />
				
	
	
	
	<!-- Subscription for Brand Ends  --->
	
	
	
<?php	if($num_real) { ?>			
<h1>Subscription in Real Estate </h1>
<?php } ?>

    <?php
			
			$i=0;
			
			while ($i < $num_real) {
		
		?>
			  <h3>
		   <?php echo mysql_result($result_real,$i,"area");
		   
		   switch (mysql_result($result_real,$i,"bhk")){
	case "1":
		$bhk = "1 ";
		break;
	case "3":
		$bhk = "2 ";
		break;	
	case "5":
		$bhk = "3 ";
		break;	
	case "6":
		$bhk = "1 and 3 ";
		break;
	case "8":
		$bhk = "2 and 3 ";
		break;	
		
	case "9":
		$bhk = "1, 2 and 3 ";
		break;	
}
		   
		   
		   
		   ?>
		      </h3><form name="form2"><blockquote><p>
			  You have subscribed for <?php echo $bhk; ?> BHK in <?php echo mysql_result($result_real,$i,"area"); ?> for price range between <?php echo mysql_result($result_real,$i,"price_from"); ?> and <?php echo mysql_result($result_real,$i,"price_to"); ?>
		   
		   </p><p><input type='button' class="blackbutton" value="Un-Subscribe" onclick="unsubscribe_real('<?php echo $user_id; ?>','<?php echo mysql_result($result_real,$i,"index"); ?>')" id="<? echo mysql_result($result_real,$i,"index")."_REAL"; ?>"/>

		   
		 
		   </p></blockquote></form><br />
		   
	   	<?php $i++; } ?>



			<p>
			 
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
