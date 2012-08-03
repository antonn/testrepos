<?php 
$user_id = $_REQUEST['username'] ;	
$node_id = $_REQUEST['node_id'];	
$cat = $_REQUEST['cat'] ;	
$city = $_REQUEST['city'];
	       
session_start();
if(session_is_registered($user_id)){
			 } else {
			  header( 'Location: http://www.3mugs.com' ) ;
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
			<li><a href="mall.php?action=show&username=<?php echo $user_id; ?>&cat=Malls&city=Bangalore&node_id=011">Mall</a></li>
			<li><a href="automobile.php?action=show&username=<?php echo $user_id; ?>&cat=Real%20Estate&city=Bangalore&node_id=017">Automobile</a></li>
				<li><a href="realestate.php?action=show&username=<?php echo $user_id; ?>&cat=Real%20Estate&city=Bangalore&node_id=015">Real Estate</a></li>
				<li><a href="info.php?username=<?php echo $user_id; ?>&cat=Food&city=Bangalore&node_id=012">Food</a></li>
				<li><a href="info.php?username=<?php echo $user_id; ?>&cat=Brand%20Outlets&city=Bangalore&node_id=013">Brand Outlets </a></li>
				<li><a href="info.php?username=<?php echo $user_id; ?>&cat=Pubs&city=Bangalore&node_id=014">Pubs</a></li>
							
						
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
					
					<h1>Your City   </h1>
				    <div class="left-box">
					<form id="form2" method="post" action="">
					  Bangalore
					</form>
					
					
			  </div>	
					
					
					
				<h1>Menu</h1>
				<div class="left-box">
					<ul class="sidemenu">		
						
					<li><a href="userindex.php?caller=1&username=<? echo $user_id; ?>">My Home </a></li>
						<li><a href="userindex.php?caller=2&username=<? echo $user_id; ?>">My Subscription </a></li>
						
						
						<li><a href="mobile_activate.php?username=<? echo $user_id; ?>">Activate Mobile </a></li>	
						<li><a href="logout.php?username=<? echo $user_id; ?>">Logout </a></li>	
					</ul>	
				</div>
			
				<h1>Contest Zone </h1>
			    <div class="left-box"></div>
				
				
				
				<h1>New Partners </h1>
				<div class="left-box">
					<ul>
					<li><span>Pizz Hut - Koramangala</span></li>
					<li><span>Mixx Lounge - Koramangala</span></li>								
				</ul>				
				
				</div>
			</div>
			<div id="main_1">
			
<script type="text/javascript">



function handleTypeChange(index){

if ( index == 2 ) {
document.form1.from.disabled = true;
document.form1.to.disabled = true;
} else {
document.form1.from.disabled = false;
document.form1.to.disabled = false;
}


if ( index == 3 || index == 4 ) {
document.form1.one_bhk.disabled = true;
document.form1.two_bhk.disabled = true;
document.form1.three_bhk.disabled = true;
}else{
document.form1.one_bhk.disabled = false;
document.form1.two_bhk.disabled = false;
document.form1.three_bhk.disabled = false;
}
}


function subscribe(user_id,camp_id){
if ( document.getElementById(camp_id).value == "Done!"  )  {
alert ("Already Subscribed!");
} else {
var url = "subscription.php?action=add&username="+user_id+"&camp_id="+camp_id;
GDownloadUrl(url, function(data) {document.getElementById(camp_id).value="Done!";});
}}
</script>

<!-- Pub or Food or Brand outlets -->
<?php if ( $node_id == "012"  || $node_id == "013"  || $node_id == "014"  ) {   ?>

<?php 
include ('db.php');
mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

$result=MYSQL_QUERY("SELECT * FROM pubs_1 WHERE  node_id=$node_id");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);  
?>
			<?php if ($num) { ?>
				<h1><? echo $cat." in ".$city; ?> </h1>
				
		    <?php	} else {  ?>
			<h1><? echo "No Services available for ".$cat." in ".$city; ?> </h1>
			
	        <?php }   ?>
			
	   <?php
			
			$i=0;
			
			while ($i < $num) {
		
		?>
			  <h3>
		   <?php echo mysql_result($result,$i,"title"); ?>
		      </h3><form name="form1"><blockquote><p>
		   <?php echo mysql_result($result,$i,"mess_1"); ?>
		   </p><p>
		   
		 <?php 
		 $camp_id = mysql_result($result,$i,"camp_id");
		 $inter_result = MYSQL_QUERY("SELECT * FROM send_sms WHERE  camp_id='$camp_id' AND user_id='$user_id'");
         $inter_row = mysql_num_rows($inter_result);
		 ?>
		 
<?php		 if ($inter_row == 0 ) {   ?>
		   
		   
		   <input type='button' class="button" value="Subscribe" onclick="subscribe('<?php echo $user_id; ?>','<?php echo $camp_id; ?>')" id="<? echo $camp_id; ?>"/>

<?php		} else {    ?>
		
		
		  <input type='button' class="button" value="Already Subscribed" />
		
		
<?php		}    ?>
		 
		   </p></blockquote></form>
	   	
		
		<?php $i++; } 	?>
		
		
<?php  }    ?>
<!-- Pub or Food or Brand outlets  ENDS-->		
					
				<br />
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
