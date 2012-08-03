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
$city = $_REQUEST['city'] ;

//Find the Display name for the user mall page under each category
//$result=mysql_query("SELECT shopname FROM campaign WHERE cust_id='$cust_id'") or die("Can't perform Query");
//$found_shopname  = mysql_fetch_array($result);
//$customer_display_name = $found_shopname['shopname'];


$result=MYSQL_QUERY("INSERT INTO pub_1 (cust_id) VALUES ('$cust_id')");

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
}}
</script>
<?php  if ( ($action == "addshop")  && $result ) {echo " <h1> Shop Added! </h1>"; } ?>

<h1>Add customers to Pub </h1>
<form id="form1" method="post" action="admin_pub.php">
  <table width="100%">
    <tr>
      <td width="29%"><h3>City</h3></td>
      <td width="71%"><strong><?php echo $_SESSION['city']; ?></strong>
        <input name="action" type="hidden" id="action" value="addshop" />
        <input name="city" type="hidden" id="city" value="<?php echo $_SESSION['city']; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td> </td>
    </tr>
    <tr>
      <td><h3>Choose Customer </h3></td>
      <td><select name="cust_id" id="cust_id">
        <?php
$sql_city = $_SESSION['city'];
$result=MYSQL_QUERY("SELECT * FROM campaign where city='$sql_city'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
?>
        <?php 	$i=0;
	while ($i < $num) {
	?>
        <option value='<?php echo mysql_result($result,$i,"cust_id"); ?>' ><?php echo mysql_result($result,$i,"cust_id"); ?></option>
        <?php $i++;}?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Add" class="button"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp; </p>
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
