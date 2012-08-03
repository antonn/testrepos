<?php 

session_start();
  if ( ($_SESSION['username'] != "admin") &&  (isset($_SESSION['username']))  ) {
  header( 'Location: http://www.3mugs.com' ) ;
}

include ('../includes/db.php');
$action  = $_REQUEST['action'];		
	
if ($action == "addshop") {	 
  $cust_id = $_REQUEST['cust_id'] ;
  //$mall  = $_REQUEST['mall'];	
  //$category = $_REQUEST['category'] ;
  //$city = $_REQUEST['city'] ;
  $shop_added = false;
  $result=MYSQL_QUERY("INSERT INTO food_1 (cust_id) VALUES ('$cust_id')");
  if ($result) {
    $shop_added =  true;
  }
  //Find the Display name for the user mall page under each category
  //$result=mysql_query("SELECT shopname FROM campaign WHERE cust_id='$cust_id'") or die("Can't perform Query");
  //$found_shopname  = mysql_fetch_array($result);
  //$customer_display_name = $found_shopname['shopname'];
}


if ($action == "sendsms") { 

   $msg_to_be_sent = $_REQUEST['message'];
   $sub_id   = $_REQUEST['sub_id'];
   $customer_id   = $_REQUEST['cust_id'];
   $valid_date = $_REQUEST['valid_date'];
   $valid_month = $_REQUEST['valid_month'];
   $valid_year = $_REQUEST['valid_year'];
   $timestamp = $valid_year."-".$valid_month."-".$valid_date;
  
  
  $result=MYSQL_QUERY("INSERT INTO sms_history (cust_id,message,sending_date,valid_date) VALUES ('$customer_id','$msg_to_be_sent',CURDATE(),'$timestamp' )");
 
 
   // Sending SMS to those who subsribed on their own 
  $result=MYSQL_QUERY("SELECT user_profile.cell_no FROM user_profile,food_2 WHERE user_profile.user_id=food_2.user_id AND food_2.sub_id='$sub_id'"); 
   
  $row=mysql_fetch_object($result);
  $num=mysql_num_rows($result);	
  $sms_sent = false;
  $log = "";

  while ($i < $num) {
    $mobile_no = mysql_result($result,$i,"cell_no");
    $mail_to="$mobile_no@airtelkk.com";
    $mail_from='fun@fun.com';
    $mail_sub=$msg;
    $mail_mesg=$msg;
    $log .= "$mobile_no,";
    mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from");
    $sms_sent=true;
    $i++;
  }

  // Sending SMS to those who were added by customer
  $result=MYSQL_QUERY("SELECT cell_no FROM user_directory WHERE cust_id='$customer_id'"); 
   
  $row=mysql_fetch_object($result);
  $num=mysql_num_rows($result);	
  

  while ($i < $num) {
    $mobile_no = mysql_result($result,$i,"cell_no");
    $mail_to="$mobile_no@airtelkk.com";
    $mail_from='fun@fun.com';
    $mail_sub=$msg;
    $mail_mesg=$msg;
    $log .= "$mobile_no,";
    mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from");
    $sms_sent=true;
    $i++;
  }
   




}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<script language="JavaScript" src="../includes/calendar3.js"></script>
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
StateSelect = document.form1.country
CitySelect = document.form1.city

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


</script>
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
					
			<?php require_once ("../includes/admin_sidebar.php"); ?>
			</div>
		  <div id="main_1">
			
<script type="text/javascript">

function sendsms(camp_id){
  var text_box = "txt_"+camp_id;
  var msg = document.getElementById(text_box).value;
  if ( document.getElementById(camp_id).value == "Sent!" )  {
    alert ("Already Sent!");
  } else {
    document.getElementById(camp_id).value == "Sending..."
    var url = "sendsms_a.php?msg="+msg+"&camp_id="+camp_id;
    GDownloadUrl(url, function(data) {document.getElementById(camp_id).value="Sent!";});
  }
}



function addnumber(a,b){
  var inner_id  = "add_phone";
  document.getElementById(inner_id).innerHTML = "Adding......";  
  var CustomerId = document.form4.customerid.value;
  var CellNumber = document.form4.cellno.value;
  var innerhtml = "Number Added!";
  var url = "add_phone_number.php?cell_no="+CellNumber+"&action=addphonenumber&customerid="+CustomerId;
  GDownloadUrl(url, function(data) { alert (data);document.getElementById(inner_id).innerHTML = innerhtml; });
}


</script>



<?php  if ($sms_sent) { echo "<h1> SMS Sent to </h1> $log"; } ?>
<?php  if ($shop_added ) {echo " <h1> Shop Added! </h1>"; } ?>


<?php
  $sql_city = $_SESSION['city'];
  $existing_customer=MYSQL_QUERY("SELECT shopname,food_1.cust_id FROM campaign, food_1 where campaign.city='$sql_city' AND (food_1.cust_id = campaign.cust_id) ");
  $row=mysql_fetch_object($existing_customer);
  $num=mysql_num_rows($existing_customer);	
?>


<h1> Existing Customers for Restaurants in <?php echo $_SESSION['city']; ?> </h1>
<form id="existing_customer" method="post" action="">
  <select name="select">
  <?php 	
    $i=0;
	while ($i < $num) {
  ?>
  <option value='<?php echo mysql_result($existing_customer,$i,"campaign.cust_id"); ?>' ><?php echo mysql_result($existing_customer,$i,"shopname"); ?></option>
  <?php $i++;}
  ?>
  </select>
</form>

<h1>Add/Remove  customers to Restaurants in <?php echo $_SESSION['city']; ?></h1>




<form id="form1" method="post" action="admin_food.php">
  <table width="100%">
    <tr>
      <td width="29%"></td>
      <td width="71%">
        <input name="action" type="hidden" id="action" value="addshop" />
        <input name="city" type="hidden" id="city" value="<?php echo $_SESSION['city']; ?>" /></td>
    </tr>
    <tr>
      <td><h3>Choose Customer </h3></td>
      <td><select name="cust_id" id="cust_id">
<?php
  $sql_city = $_SESSION['city'];
  $result=MYSQL_QUERY("SELECT * FROM campaign where campaign.city='$sql_city' ");
  $row=mysql_fetch_object($result);
  $num=mysql_num_rows($result);	
?>
        <?php 	$i=0;
	while ($i < $num) {
	?>
        <option value='<?php echo mysql_result($result,$i,"cust_id"); ?>' ><?php echo mysql_result($result,$i,"shopname"); ?></option>
        <?php $i++;}?>
      </select>
        <input type="submit" name="Submit" value="Add" class="blackbutton"/></td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<!--             Add numbers   -->
<h1>Add User numbers to the customer </h1>
<form name="form4" method="post" action="admin_food.php">
  <table width="100%">
    <tr>
      <td width="29%"><h3>City</h3></td>
      <td width="71%"><strong><?php echo $_SESSION['city']; ?></strong>
        <input name="action" type="hidden" id="action" value="addphonenumber" />
        <input name="city2" type="hidden" id="city2" value="<?php echo $_SESSION['city']; ?>" /></td>
    </tr>
    <tr>
      <td><h3>Choose Customer</h3></td>
      <td><select name="customerid" id="combo_customerid">
	  <?php 	
	  $row=mysql_fetch_object($existing_customer);
      $num=mysql_num_rows($existing_customer);
	  
	  $i=0;
	while ($i < $num) {
	?>
        <option value='<?php echo mysql_result($existing_customer,$i,"cust_id"); ?>' ><?php echo mysql_result($existing_customer,$i,"shopname"); ?></option>
        <?php $i++;}?>
	  
      </select>      </td>
    </tr>
    <tr>
      <td height="39" valign="top"><h3>Cell number </h3></td>
      <td><input name="cellno" type="text" id="combo_cellno" size="20" maxlength="10" />      </td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
      <td> <div id="add_phone" > </div></td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
      <td> <input type='button' class="blackbutton" value="Add number" onclick="addnumber(1,1)" id="add_phone_number"/></td>
    </tr>
  </table>
</form>



<!-- End Add customer numbers explicitly -->



<h1>Send SMS </h1>
<form id="form2" method="post" action="admin_food.php">
  <table width="100%">
    <tr>
      <td width="25%"><h3>Select Customer </h3></td>
      <td width="75%"><select name="cust_id_sms" id="cust_id_sms">
	   <?php
$sql_city = $_SESSION['city'];
$result=MYSQL_QUERY("SELECT shopname,food_1.id FROM campaign,food_1 WHERE  campaign.cust_id=food_1.cust_id AND campaign.city='$sql_city';");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
?>
        <?php 	$i=0;
	while ($i < $num) {
	?>
        <option value='<?php echo mysql_result($result,$i,"id"); ?>' ><?php echo mysql_result($result,$i,"shopname"); ?></option>
        <?php $i++;}?>
      </select>
        <input name="action" type="hidden" id="action" value="display_detail" />      <input class="blackbutton" type="submit" name="Submit2" value="Submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<br />

<?php if ($action == "display_detail" ) { ?>

<?php 

$customerid = $_REQUEST['cust_id_sms'];

$result=MYSQL_QUERY("SELECT shopname,food_1.id,msg1,food_1.cust_id FROM campaign,food_1 WHERE  campaign.cust_id=food_1.cust_id AND food_1.id='$customerid'");
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);


?>

<div id="rss"><h6><a href="jo.html"><?php echo $row['shopname']; ?></a></h6>
   <blockquote><p><?php echo $row['msg1']; ?></p>
     <form  name="example"  method="post" action="admin_food.php">
       <p>Enter Message</p>
       <p>
         <textarea name="message" cols="30" rows="6" id="message"></textarea>
         <input name="sub_id" type="hidden" value="<?php echo $row['id']; ?>" />
		 <input name="cust_id" type="hidden" value="<?php echo $row['cust_id']; ?>" />
         <input name="action" type="hidden" id="action" value="sendsms" />
       </p>
       <p>Valid till</p>
       <p>Date 
         
         <select name="valid_date" id="valid_date">
		 <?php for($i = 1; $i <= 31 ; $i++) {
		 echo "<option value=$i>$i</option>";
		 } ?>
           
         </select>
         Month
         <select name="valid_month" id="valid_month">
		 <?php for($i = 1; $i <= 12 ; $i++) {
		 echo "<option value=$i>$i</option>";
		 } ?>
         </select>
  Year
  <select name="valid_year" id="valid_year">
  <?php for($i = 2007; $i <= 2010 ; $i++) {
		 echo "<option value=$i>$i</option>";
		 } ?>
  </select>
  <A HREF="#"
   onClick="cal.select(document.forms['example'].date1,'anchor1','MM/dd/yyyy'); return false;"
   NAME="anchor1" ID="anchor1"></A>
         <input class="blackbutton" type="submit" name="Submit3" value="Send" />
       </p>
     </form>
     <p>&nbsp;</p>
     </blockquote>
</div>

<p>
  <?php } ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
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
