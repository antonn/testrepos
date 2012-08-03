<?php 

require_once ("../includes/session.php");
confirm_user_logged_in(); 

$action = $_REQUEST['action'];
$node_id = $_REQUEST['node_id'];	
$house_type = $_REQUEST['house_type'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];

	       
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
			<?php require_once ("../includes/user_menu.php");display_menu("real"); ?>
						
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar_1">
					<?php require_once ("../includes/user_sidebar.php"); ?>
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

<? if ($action == "add" ) {

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

$sql_city = $_SESSION['city'];

$result_0 = MYSQL_QUERY("SELECT * FROM real_city_area WHERE  city='$sql_city'");
$row=mysql_fetch_object($result_0);
$num=mysql_num_rows($result_0);	

$i =0 ;

while ($i < $num) {

		$area_0 =  mysql_result($result_0,$i,"area");

		if ($_REQUEST[$area_0] == $area_0) {
			$result_1=MYSQL_QUERY("INSERT INTO realdata (user_id,area,price_from,price_to,city,country,house_type,bhk) VALUES ('$user_id','$area_0',$from,$to,'$sql_city','$country','$house_type','$bhk')");
		}


$i++;
}



echo "<h1> Subscibed!! </h1> ";
} ?>

<? if ($action != "add" ) { ?>
<!-- REAL ESTATE FORM BEGINS  --->
<h1>Real Estate in <? echo $_SESSION['city']; ?></h1>
				
		<form id="form1" name="form1" method="post" action="realestate.php">
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
            <input name="action" type="hidden" id="action" value="add" />
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


$sql_city = $_SESSION['city'];

$result=MYSQL_QUERY("SELECT * FROM real_city_area WHERE  city='$sql_city'");
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
		 
		  <h3> Price Range</h3>
		  <p>Starting from 
		    <select name="from" id="from">
		      <option>--From--</option>
		      <option>1000</option>
		      <option>2000</option>
		      <option>3000</option>
		      <option>4000</option>
		      <option>5000</option>
	        </select>
		  to 
		  <select name="to" id="to">
		    <option>--To--</option>
		    <option>2000</option>
		    <option>3000</option>
		    <option>4000</option>
		    <option>5000</option>
		    <option>6000</option>
		    <option>7000</option>
		    </select>
		  </p>
		  <p>&nbsp;</p>
		  <input type='submit' class="button" value="Subscribe"/>
		</form>
	
	     <p>&nbsp;</p>
	     <p><br />
	       <br />
	       
	       <?php } ?>
	       <!-- REAL ESTATE FORM ENDS -->
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
