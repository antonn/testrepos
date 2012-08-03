<?php 
$user_id = $_REQUEST['username'] ;	
$camp_id = $_REQUEST['camp_id'] ;	
$cust_id = $_REQUEST['cust_id'] ;
$title = $_REQUEST['title'];
$msg = $_REQUEST['message'];
$action = $_REQUEST['action'];
$node_id = $_REQUEST['node_id'];	
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
					<?php echo $city; ?>
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



var arrIndia, arrUSA, arrCountries, arrCategories
arrIndia = ["Bangalore","Chennai","Hyderabad","Mumbai","Delhi","Kolkatta"]
arrUSA = ["New York", "Washington", "San Francisco","Buffalo"]

arrCountries =[arrIndia, arrUSA]

function handleCityChange(newDisplay){

var StateSelect, CitySelect, NumEntries, i
StateSelect = document.form2.country
CitySelect = document.form2.city

// Delete all entries in the cities list box
for (i = CitySelect.length; i > 0; i--){
CitySelect.options[i-1] = null
}
// Add comment option to City List box
CitySelect.options[0] = new Option("-- Select City --",0)
// If state is selected add its cities to the City List box

if (newDisplay >= 0){
NumEntries = arrCountries[newDisplay].length
for (i = 1; i <= NumEntries; i++){
CitySelect.options[i] = new Option((arrCountries[newDisplay])[i-1],i )
}
}
CitySelect.selectedIndex = 0
}



function handleCidChange(newDisplay){
//alert(newDisplay);
document.form1.camp_id_f1.value = newDisplay;
}




</script>

<?php 
if ($action == "send_sms") {  ?>

<?php 

include ('../db.php');


$log .= " Campid is $camp_id";
$result=MYSQL_QUERY("SELECT * FROM user_profile,pubs_3 WHERE user_profile.user_id=pubs_3.user_id AND pubs_3.camp_id='$camp_id'"); 
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
$log .= " $num row fetched";

while ($i < $num) {
$mobile_no = mysql_result($result,$i,"cell_no");
$mail_to="$mobile_no@airtelkk.com";
$mail_from='fun@fun.com';
$mail_sub=$msg;
$mail_mesg=$msg;
$log .= " Sending Sms... to $mobile_no. ";
mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from");

$i++;
}



?>

<h1>Message Sent Successfully!!</h1>
<?php } ?>

<!--  Add new Campaign callback  --->


<?php 
if ($action == "add_campaign") {  ?>

<?php 

$camp_id = "c_".$node_id."_".$cust_id;

include ('../db.php');

$result=MYSQL_QUERY("INSERT INTO pubs_1 (node_id,cust_id,title,mess_1,camp_id) VALUES ('$node_id','$cust_id','$title','$msg','$camp_id')");

?>

<h1>Campaign added Successfully!!</h1>
<?php } ?>



<!--  Add new Campaign callback  ENDS --->


<!--  REMOVE Campaign callback  BEGINS--->


<?php 
if ($action == "remove_campaign") {  ?>

<?php 

include ('../db.php');

mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);
$update_result=MYSQL_QUERY("DELETE FROM pubs_1 WHERE camp_id='$camp_id'"); 
$update_result=MYSQL_QUERY("DELETE FROM pubs_3 WHERE camp_id='$camp_id'"); 
?>

<h1>Campaign removed Successfully!!</h1>
<?php } ?>



<!--  REMOVE Campaign callback  ENDS --->





<h1>Control Panel for Brand/Food/Pubs in <?php echo $city; ?> </h1>
				
		<form id="form1" name="form1" method="post" action="pub_admin.php">
          <h3>Choose Campaign/Listing 
          
            <?php   
include ('../users/db.php');
mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

$result=MYSQL_QUERY("SELECT * FROM pubs_1 where node_id='$node_id'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);

$customer_list = MYSQL_QUERY("SELECT * FROM customer_profile");
$row_cl=mysql_fetch_object($customer_list);
$num_cl=mysql_num_rows($customer_list);
?>
		  
	  
		  
		    <select name="camp_id" id="camp_id" onChange="handleCidChange(this[this.selectedIndex].value)">
		      
              <?php
	$i=0;
	while ($i < $num) {
		
 ?>				
		      
		      
		      <option value="<?php echo mysql_result($result,$i,"camp_id"); ?>" ><?php echo mysql_result($result,$i,"camp_id");echo "--";echo mysql_result($result,$i,"title"); ?></option>
		      
              <?php $i++; } ?>         
	        </select>
            <input name="action" type="hidden" id="action" value="send_sms" />
            <input name="username" type="hidden" id="username" value="<?php echo $user_id; ?>" />
            <input name="node_id" type="hidden" id="node_id" value="<?php echo $node_id; ?>" />
            <input name="city" type="hidden" id="city" value="<?php echo $city; ?>" />
            <br />
            <br />
          Camp ID
          <input type="text" name="camp_id_f1" id="camp_id_f1" size="20" />
</h3>
          <h3>Message</h3>
          <h3>
            <input name="message" type="text" id="message" value="Type the ad to be sent here..." size="50" />
          </h3>
		  <p> <input type="submit" class="button" value="Send SMS"  />
	      &nbsp;</p>
		  </form>
		
				<br />
				
				
	<h1>Add Customer Campaign  for Pubs in <?php echo $city; ?></h1>
				
		<form id="form2" name="form2" method="post" action="pub_admin.php">
          <h3>Customer ID
            <select name="cust_id" id="cust_id">
            
			
			
	      <?php
	$i=0;
	while ($i < $num_cl) {
		
 ?>				
		      		
			
			  <option value="<?php echo mysql_result($customer_list,$i,"cust_id"); ?>"><?php echo mysql_result($customer_list,$i,"company_name"); ?></option>
           
		   
		     <?php $i++; } ?>        
		   
		   
		   
		   
		   
		    </select>          
            <input name="action" type="hidden" id="action" value="add_campaign" />
            <input name="node_id" type="hidden" id="node_id" value="<?php echo $node_id; ?>" />
            <input name="username" type="hidden" id="username" value="<?php echo $user_id; ?>" />
            <input name="city" type="hidden" id="city" value="<?php echo $city; ?>" />
          </h3>
          <h3>Title </h3>
          <h3>
            <input name="title" type="text" id="title" value="Type the title" size="50" />
          </h3>
          <h3>Message</h3>
          <p>
            <input name="message" type="text" id="message" size="60" />
          </p>
          <p> <input type="submit" class="button" value="Save"  />
	      &nbsp;</p>
		  </form>
		<table width="100%">
          <tr>
            <td width="51%"><h1>Add Listing </h1></td>
            <td width="49%"><h1>Remove Customer Campaign </h1></td>
          </tr>
          <tr>
            <td><form id="form3" method="post" action="../add_listing.php">
              <p>Enter Listing ID</p>
              <p>
                <input name="lid" type="text" id="lid" size="20" />
</p>
              <p>
                <input type="submit" class="button" value="Add"  />
              </p>
            </form>            <p>&nbsp;</p>
            </td>
            <td><form id="form4" method="post" action="pub_admin.php">
              <h3>Choose Listings 
                <select name="camp_id" id="camp_id">
		  <?php
	$i=0;
	while ($i < $num) {
		
 ?>				
		      
		      
		      <option value="<?php echo mysql_result($result,$i,"camp_id"); ?>" ><?php echo mysql_result($result,$i,"camp_id");echo "--";echo mysql_result($result,$i,"title"); ?></option>
		      
              <?php $i++; } ?>           
		   
                </select>
              </h3>
              <p>
                <input name="action" type="hidden" id="action" value="remove_campaign" />
            <input name="node_id" type="hidden" id="node_id" value="<?php echo $node_id; ?>" />
            <input name="username" type="hidden" id="username" value="<?php echo $user_id; ?>" />
            <input name="city" type="hidden" id="city" value="<?php echo $city; ?>" />
              </p>
              <p>
                <input type="submit" class="button" value="Remove"  />
              </p>
            </form>
            </td>
          </tr>
        </table>
		<h3>&nbsp;</h3>
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
