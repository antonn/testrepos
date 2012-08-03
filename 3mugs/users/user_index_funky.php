<?php 
$user_id = $_REQUEST['username'] ;	
$caller =	$_REQUEST['caller'] ;	       
session_start();
if(session_is_registered($user_id)){
			 } else {
			  header( 'Location: http://www.3mugs.com' ) ;
			  }		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Extended
Description: A two-column, fixed-width, Web 2.0 design.
Version    : 1.0
Released   : 20070915

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAP_25KWM5HL3T4KI7UQ1jSxQpH4AR0UcVcQz7B__Oir_QGqAv4BQ5o5gKzAcXJZTtAYQMuKOisQ9_bw"
      type="text/javascript"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Welcome to 3mugs.com</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


		
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
include ('db.php');
mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

if( $caller == 2 ) {
$result=MYSQL_QUERY("SELECT * FROM pubs_1,send_sms WHERE pubs_1.camp_id=send_sms.camp_id AND send_sms.user_id='$user_id'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	

$result_real=MYSQL_QUERY("SELECT DISTINCT * FROM realdata WHERE user_id='$user_id'");
$row_real=mysql_fetch_object($result_real);
$num_real=mysql_num_rows($result_real);	


}

?>		
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1>3mugs.com</h1>
		<p>info fun biz </p></div>
	
	<div id="search">
		<form method="get" action="">
			<fieldset>
			<input id="s" type="text" name="s" value="" />
			<input id="x" type="submit" value="Login" />
			</fieldset>
		</form>
	</div>
</div>
<!-- end header -->
<!-- start menu -->
<div id="menu">
	<ul>
	
	<li class="current_page_item"><a href="automobile_1.php?action=show&username=<?php echo $user_id; ?>&cat=Real%20Estate&city=Bangalore&node_id=017">Automobile</a></li>
			<li><a href="realestate_1.php?action=show&username=<?php echo $user_id; ?>&cat=Real%20Estate&city=Bangalore&node_id=015">Real Estate</a></li>
			<li><a href="info_1.php?username=<?php echo $user_id; ?>&cat=Food&city=Bangalore&node_id=012">Food</a></li>
				<li><a href="info_1.php?username=<?php echo $user_id; ?>&cat=Brand%20Outlets&city=Bangalore&node_id=013">Brand Outlets </a></li>
				<li><a href="info_1.php?username=<?php echo $user_id; ?>&cat=Pubs&city=Bangalore&node_id=014">Pubs</a></li>

		
	</ul>
</div>
<!-- end menu -->


<!-- start page -->
<div id="page">
	<!-- start content -->
  <div id="content">
	  <h1 class="pagetitle">
	  
	  <?php if ($caller == 1) {
	  echo "Welcome $user_id"; }
	  
	  if ($caller == 2) {
	  echo "Your Subscriptions"; }
	  
	   ?>
	  
	  
	  
	  </h1>
		<a href="#" id="rss-posts">RSS Feeds</a>
    <div class="post">
	
	<?php if ($caller == 2 ) { ?>
			
					
	  <?php	if ($num  || $num_real) {  ?>
			
				
	       
	  <?php	   }else {   ?>
		   
		   <h1>You have no Subcriptions!</h1>
		   
	       <?php	   }   ?>
		       
			   
			    <?php
			
			$i=0;
			
			while ($i < $num) {
		
		?>
			  <h3>
		   <?php echo mysql_result($result,$i,"title"); ?>
		      </h3><form name="form1"><blockquote><p>
		   <?php echo mysql_result($result,$i,"mess_1"); ?>
		   </p><p><input type='button' class="button" value="Un-Subscribe" onclick="unsubscribe('<?php echo $user_id; ?>','<?php echo mysql_result($result,$i,"camp_id"); ?>')" id="<? echo mysql_result($result,$i,"camp_id"); ?>"/>

		   
		 
		   </p></blockquote></form><br />
		   
	   	<?php $i++; } ?>
					
				<br />
				<br />
				
<h1>Subscription in Real Estate </h1>


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
		   
		   </p><p><input type='button' class="button" value="Un-Subscribe" onclick="unsubscribe_real('<?php echo $user_id; ?>','<?php echo mysql_result($result_real,$i,"index"); ?>')" id="<? echo mysql_result($result_real,$i,"index")."_REAL"; ?>"/>

		   
		 
		   </p></blockquote></form><br />
		   
	   	<?php $i++; } ?>



			<p>
			  <? } ?>
			</p>
			<p>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- end content -->
	    <!-- start sidebar --></div>
  </div>
	<div id="sidebar">
		<ul>
		  <li>
			  <h2>My City </h2>
		        <span class="post"><strong>Bangalore</strong></span></li>
			<li>
				<h2>Menu</h2>
				<ul>
				<li><a href="user_index_funky.php?caller=1&amp;username=<? echo $user_id; ?>">My Home </a></li>
						<li><a href="user_index_funky.php?caller=2&amp;username=<? echo $user_id; ?>">My Subscription </a></li>
						
						
						<li><a href="mobile_activate_1.php?username=<? echo $user_id; ?>">Activate Mobile </a></li>	
						<li><a href="logout_1.php?username=<? echo $user_id; ?>">Logout </a></li>	
				</ul>
			</li>
	  </ul>
  </div>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<div id="footer">
	<p>&copy;2007 All Rights Reserved. &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a> &nbsp;&bull;&nbsp; Icons by <a href="http://www.famfamfam.com/">FAMFAMFAM</a>.</p>
</div>
</body>
</html>
