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
function subscribe(user_id,camp_id){
if ( document.getElementById(camp_id).value == "Done!"  )  {
alert ("Already Subscribed!");
} else {
var url = "subscription.php?action=add&username="+user_id+"&camp_id="+camp_id;
GDownloadUrl(url, function(data) {document.getElementById(camp_id).value="Done!";});
}}
</script>
<h1><? echo $cat." in ".$city; ?></h1>
				
		<form id="form1" method="post" action="">
          <h1> Choose Type </h1>
          <p>
            <select name="select">
              <option selected="selected">For Sale</option>
              <option>For Rent</option>
              <option>PG for Men</option>
              <option>PG for Women</option>
            </select>
          </p>  
		  <h1> Choose Area</h1>
		  <p>
		    <input type="checkbox" name="checkbox" value="checkbox" />
	      Koramangala
	      <input type="checkbox" name="checkbox2" value="checkbox" />
		  Jaya Nagar
		  <input type="checkbox" name="checkbox3" value="checkbox" />
JP Nagar 
<input type="checkbox" name="checkbox4" value="checkbox" />
BTM Layout</p>
		  <p>
		    <input type="checkbox" name="checkbox5" value="checkbox" />
		    HSR Layout
		    <input type="checkbox" name="checkbox6" value="checkbox" />
		    Marthahalli
		    <input type="checkbox" name="checkbox7" value="checkbox" />
		    Shanthi Nagar
		    <input type="checkbox" name="checkbox8" value="checkbox" />
		    Indira Nagar<br />
	      </p>
		  <h1> Price Range</h1>
		  <p>Starting from 
		    <select name="select2">
		      <option>1000</option>
		      <option>2000</option>
		      <option>3000</option>
		      <option>4000</option>
		      <option>5000</option>
	        </select>
		  to 
		  <select name="select3">
		    <option>2000</option>
		    <option>3000</option>
		    <option>4000</option>
		    <option>5000</option>
		    <option>6000</option>
		    <option>7000</option>
		    </select>
		  </p>
		  <p>&nbsp;</p>
		  <p>&nbsp; </p>
		  <p>&nbsp;</p>
		</form>
		<h3>&nbsp;</h3>
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
