<?php 

session_start();
if ( ($_SESSION['username'] != "admin") &&  (isset($_SESSION['username']))  ) {
  header( 'Location: http://www.3mugs.com' ) ;
}

		  
$cust_id = $_REQUEST['cust_id'] ;
$action  = $_REQUEST['action'];	


    if($action == 'changeloc') {
       $newcity  =	$_REQUEST['newcity'] ;
	   include ('db.php');  
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

<title>Welcome to 3mugs.com</title>
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
			
			 
		<?php if ($action == "new_customer_added") {
		
		$created_id = $_REQUEST['created_id'];
		
		echo "<h1> Custmer successfully created with customer id $created_id </h1>";
		
		}
		
		?>
	
			 
			<?php if(1) { ?>
				
			<h1>Control Panel for <?php echo $_SESSION['username']; ?></h1>
			
				<? } ?>
		
	<?php if ($action == "addnew" ) { ?>
	
				<h1>Create a Customer account </h1>
				
				<table width="100%">
                  <tr>
                    <td><form enctype="multipart/form-data" name="form1" action="add_customer.php" method="post" onsubmit="return VerifyData()">
                      <table width="100%">
                        <tr>
                          <td width="30%"><label>Customer Name </label> </td>
                          <td width="70%"><input name="customer_name" type="text" id="customer_name" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="32"><label>Shop name </label></td>
                          <td><input name="company_name" type="text" id="company_name" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="30"><label>Address 1 </label></td>
                          <td><input name="address1" type="text" id="address1" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="27"><label>Address 2 </label></td>
                          <td><input name="address2" type="text" id="address2" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="27"><label>E-mail</label></td>
                          <td><input name="email" type="text" id="email" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="27"><label>Mobile</label></td>
                          <td><input name="mobile" type="text" id="mobile" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="27"><label>City</label></td>
                          <td><select name="city" size="1">
                      <option value="-1">--Select--</option>
                      <option value="Bangalore">Bangalore</option>
                      <option value="Chennai">Chennai</option>
                      <option value="Mumbai">Mumbai</option>
                      <option value="Hyderabad">Hyderabad</option>
                          </select>                          </td>
                        </tr>
                        <tr>
                          <td height="32"><label>Category</label></td>
                          <td><select name="category" size="1">
				  <option value="-1" selected="selected">--Select--</option>
                    <option value="mall">Malls</option>
				    <option value="food">Restaurants</option>
				    <option value="brand">Brand outlets</option>
				    <option value="pub">Pubs</option>
				    <option value="real">Real Estate</option>
					<option value="automobile">Automobile</option>
			              </select>                          </td>
                        </tr>
                        <tr>
                          <td height="32"><label>Terms of Service </label></td>
                          <td>Please read the 3mugs.com Terms of agreement before signing up. </td>
                        </tr>
                        <tr>
                          <td height="65">&nbsp;</td>
                          <td><textarea name="textarea" cols="10" rows="3">3mugs.com Terms of Service

Welcome to 3mugs.com!

1. Your relationship with 3mugs.com

    1.1 Your use of 3mugs.com’s products, software, services and web sites (referred to collectively as the “Services” in this document and excluding any services provided to you by 3mugs.com under a separate written agreement) is subject to the terms of a legal agreement between you and 3mugs.com. “3mugs.com” means 3mugs.com Inc., whose principal place of business is at 1600 Amphitheatre Parkway, Mountain View, CA 94043, United States. This document explains how the agreement is made up, and sets out some of the terms of that agreement.

    1.2 Unless otherwise agreed in writing with 3mugs.com, your agreement with 3mugs.com will always include, at a minimum, the terms and conditions set out in this document. These are referred to below as the “Universal Terms”.

    1.3 Your agreement with 3mugs.com will also include the terms of any Legal Notices applicable to the Services, in addition to the Universal Terms. All of these are referred to below as the “Additional Terms”. Where Additional Terms apply to a Service, these will be accessible for you to read either within, or through your use of, that Service.


   
</textarea></td>
                        </tr>
                        <tr>
                          <td height="32">&nbsp;</td>
                          <td><input type="submit" class="button" value="I Accept. Create my Account" /></td>
                        </tr>
                        <tr>
                          <td height="32">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                                        </form>
                    </td>
                  </tr>
                </table>
				
						
				<br />	
				
				
	<?php } ?>			
				
				
			
				
				
				
				
				
				
				
				
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
