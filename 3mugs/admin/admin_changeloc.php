<?php 

session_start();
if ( ($_SESSION['username'] != "admin") &&  (isset($_SESSION['username']))  ) {
header( 'Location: http://www.3mugs.com' ) ;
}
include ('../includes/db.php');


$action  = $_REQUEST['action'];		
	
if ($action == "addcampaign") {	 
 
$cust_id = $_REQUEST['cust_id'] ;
$shopname = $_REQUEST['shopname'] ;
$title  = $_REQUEST['title'];	
$msg1 = $_REQUEST['msg1'] ;
$msg2  = $_REQUEST['msg2'];	
$city = $_REQUEST['city'] ;


$result=MYSQL_QUERY("INSERT INTO campaign (cust_id,shopname,title,msg1,city) VALUES ('$cust_id','$shopname','$title','$msg1','$city')");

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



				<h1>Change your location </h1>
				
				<form id="form1" method="post" action="admin.php?username=<?php echo $_SESSION['username'];?>">
				  <h3>Select City 
				    <select name="newcity" id="newcity">
                            <option value="Bangalore" selected="selected">Bangalore</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Delhi">Delhi</option>
                    </select>
				    <input name="action" type="hidden" id="action" value="changeloc" />
				  </h3>
				  <p>
				    <input type="submit" class="button" value="Change my City" />
				  </p>
				</form>
				
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p><br />
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
