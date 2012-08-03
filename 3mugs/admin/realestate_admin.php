<?php 
$user_id = $_REQUEST['username'] ;	
$msg = $_REQUEST['msg'];
$action = $_REQUEST['action'];
$node_id = $_REQUEST['node_id'];	
$cat = $_REQUEST['cat'] ;	
$house_type = $_REQUEST['house_type'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$price = $_REQUEST['price'];
$city = $_REQUEST['city'];

$log = "";	       

		   
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
				<li><a href="admin.php?msg=Wecome%20Admin&amp;username=<? echo $user_id; ?>">Admin Home </a></li>		
						<li><a href="admin.php?action=addnew&amp;username=<? echo $user_id; ?>">Add Customer  </a></li>
						
						
						
						<li><a href="../users/logout.php?username=<? echo $user_id; ?>">Logout </a></li>	
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

function VerifyData() {

return true;


}



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

<?php 
if ($action == "send") {  ?>

<h1>Message Sent Successfully!!</h1>
<?php } ?>
<h1>Control Panel</h1>
				
		<form id="form1" name="form1" method="post" action="realestate_admin.php">
          <h3> Choose Type </h3>
          <p>
            <select name="house_type" id="house_type" onChange="handleTypeChange(this[this.selectedIndex].value)">
              <option selected="selected" value="1"> House for Rent </option>
              <option value="2"> House for Sale </option>
              <option value="3"> PG for Men </option>
              <option  value="4"> PG for Women </option>
            </select>
            <input name="username" type="hidden" id="username" value="<?php echo $user_id; ?>" />
            <input name="city" type="hidden" id="city" value="<?php echo $city; ?>" />
            <input name="action" type="hidden" id="action" value="send" />
          </p>
          <h3> Choose BHK</h3>
		  <p>
	       <input name="one_bhk" type="checkbox" id="one_bhk" value="1" />
	     1 BHK
	      <input name="two_bhk" type="checkbox" id="two_bhk" value="3" />
		 2 BHK
		  <input name="three_bhk" type="checkbox" id="three_bhk" value="5" />
3 BHK          </p>
		  
		  <h3> Choose Area</h3>
		
		
	<?php
include ('../db.php');



mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

if ($action == "send") {

$log .= "Entering....";
if( $_REQUEST['one_bhk'] ) {
$bhk_1 = $_REQUEST['one_bhk'];
}else {
$bhk_1 =0;
}

if( $_REQUEST['two_bhk'] ) {
$bhk_2 = $_REQUEST['two_bhk'];
}else {
$bhk_2 =0;
}

if( $_REQUEST['three_bhk'] ) {
$bhk_3 = $_REQUEST['three_bhk'];
}else {
$bhk_3 =0;
}

$bhk = $bhk_1 + $bhk_2 + $bhk_3;

$log .= "bhk value is $bhk ...";

$result_0 = MYSQL_QUERY("SELECT * FROM real_city_area WHERE  city='$city'");
$row=mysql_fetch_object($result_0);
$num=mysql_num_rows($result_0);	

$i =0 ;


while ($i < $num) {

		$area_0 =  mysql_result($result_0,$i,"area");


$log .= "area is $area_0...";

		if ($_REQUEST[$area_0] == $area_0) {
	
	
	
	
		
$result_1=MYSQL_QUERY("SELECT  * FROM user_profile,realdata WHERE (user_profile.user_id = realdata.user_id ) AND (realdata.area='$area_0' AND (realdata.price_from <= $price AND realdata.price_to >= $price) AND realdata.house_type = $house_type AND realdata.bhk LIKE '%$bhk%' )"); 

$log .= "Complex query returned $result...";

$row_1=mysql_fetch_object($result_1);
$num_1=mysql_num_rows($result_1);	

$j=0;
while ($j < $num_1) {

$mobile_no = mysql_result($result_1,$j,"cell_no");
$mail_to="$mobile_no@airtelkk.com";
$mail_from='fun@fun.com';
$mail_sub=$msg;
$mail_mesg=$msg;

$log .= "Sending sms to $mobile_no...";

mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from");

$j++;

}
		
	
		
		}


$i++;
}

}


$log .= "Exiting....";

$result=MYSQL_QUERY("SELECT * FROM real_city_area WHERE  city='$city'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
		  
			   
			  ?>
	
	
		
		  <p>
	
	<?php 
	
	$i=0;
	while ($i < $num) {
	?>	  
		   
		    <input type="checkbox" name='<?php echo mysql_result($result,$i,"area"); ?>' value='<?php echo mysql_result($result,$i,"area"); ?>' />
	      <?php echo mysql_result($result,$i,"area"); ?>
	     
	<?php $i++;
	
	} ?>



</p>
		 
		  <h3> Price </h3>
		  <p>
		    <input name="price" type="text" id="price" />
		  </p>
		  
		  <h3> Message </h3>
		  <p>
		    <input name="msg" type="text" id="msg" size="60" />
		  </p>
		  <input type='submit' class="button" value="Send Message"/>
		</form>
		<h3><?php echo $log;?>
</h3>
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
