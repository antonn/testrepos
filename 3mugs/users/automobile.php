<?php 
require_once ("../includes/session.php");
confirm_user_logged_in(); 

$action = $_REQUEST['action'];
$node_id = $_REQUEST['node_id'];	
 
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
			
			<?php require_once ("../includes/user_menu.php"); display_menu("auto");?>
						
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

$sql_city = $_SESSION['city'];
$sql_type = "four";
$sql_userid = $_SESSION['username'];
$year_from_four = $_REQUEST['year_from'];
$year_to_four = $_REQUEST['year_to'];
$year_from_two = $_REQUEST['year_from_two'];
$year_to_two = $_REQUEST['year_to_two'];

//Updating subscription table for four wheeler

$log = "";

$log .= " city is $sql_city ";

$result_0 = MYSQL_QUERY("SELECT * FROM auto_1 WHERE  city='$sql_city' AND type='$sql_type' ");
$row=mysql_fetch_object($result_0);
$num=mysql_num_rows($result_0);	

$log .= "first query fetched $num rows ";

$i =0 ;

while ($i < $num) {

$log .= "Entering  while loop ";


		$id =  mysql_result($result_0,$i,"id");
		$sql_id = "make".$id;

		if ($_REQUEST[$sql_id] == $sql_id) {
			$result_1=MYSQL_QUERY("INSERT INTO auto_2 (subscription_id,user_id,year_from,year_to) VALUES ($id,'$sql_userid',$year_from_four,$year_to_four)");
			
			$log .= "First Insert query executed ";
		}


$i++;
}


//updating subscription table for Two wheelers

$sql_type = "two";

$result_0 = MYSQL_QUERY("SELECT * FROM auto_1 WHERE  city='$sql_city' AND type='$sql_type' ");
$row=mysql_fetch_object($result_0);
$num=mysql_num_rows($result_0);	

$i =0 ;

while ($i < $num) {

		$id =  mysql_result($result_0,$i,"id");
		$sql_id = "make".$id;

		if ($_REQUEST[$sql_id] == $sql_id) {
			$result_1=MYSQL_QUERY("INSERT INTO auto_2 (subscription_id,user_id,year_from,year_to) VALUES ($id,'$sql_userid',$year_from_four,$year_to_four)");
			
			$log .= "First Insert query executed ";
		}

$i++;
}





echo "<h1> Subscribed </h1> ";
} ?>



















<!-- REAL ESTATE FORM BEGINS  --->
<h1>Subscribe to  Selling of used vehicles in <?php echo $_SESSION['city']; ?> </h1>
				
		<form id="form1" name="form1" method="post" action="automobile.php">
          <h3> Used Cars by manufacturer 
            <input name="action" type="hidden" id="action" value="add" />
          </h3>
		  
<?php
$sql_city = $_SESSION['city'];
$sql_type = "four";
$result=MYSQL_QUERY("SELECT * FROM auto_1 WHERE  city='$sql_city' AND type='$sql_type'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
?>
		  
		  
          <p>
    <?php 
	$i=0;
	while ($i < $num) {
	?>	  
		   
		    <input type="checkbox" name='<?php echo "make".mysql_result($result,$i,"id"); ?>' value='<?php echo "make".mysql_result($result,$i,"id"); ?>' />
	      <?php echo mysql_result($result,$i,"make"); ?>
	     
	<?php $i++;
	
	} ?>
          <br />
          <br />
          Year of make between 
          <select name="year_from">
		  
	<?php for($year=1980;$year<=2007;$year++) { ?>	  
		    <option><?php echo $year; ?></option>
    <?php } ?>        
          </select>
          to
          <select name="year_to">
		  
     <?php for($year=1980;$year<=2007;$year++) { ?>	  
		    <option><?php echo $year; ?></option>
    <?php } ?> 
          </select>
          </p>
          <p>&nbsp;</p>
          <h3> Used bike by manufacturer </h3>
		  
	     <?php

$sql_type = "two";
$result=MYSQL_QUERY("SELECT * FROM auto_1 WHERE  city='$sql_city' AND type='$sql_type'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
?>
		  
		  
          <p>
    <?php 
	$i=0;
	while ($i < $num) {
	?>	  
		   
		    <input type="checkbox" name='<?php echo "make".mysql_result($result,$i,"id"); ?>' value='<?php echo "make".mysql_result($result,$i,"id"); ?>' />
	      <?php echo mysql_result($result,$i,"make"); ?>
	     
	<?php $i++;
	
	} ?>
		  
		     <br /><br />
          Year of make between 
          <select name="year_from_two">
            <?php for($year=1980;$year<=2007;$year++) { ?>	  
		    <option><?php echo $year; ?></option>
    <?php } ?> 
          </select>
          to
          <select name="year_to_two" id="year_to_two">
		 
           <?php for($year=1980;$year<=2007;$year++) { ?>	  
		    <option><?php echo $year; ?></option>
    <?php } ?> 
          </select>
</p>

		  
		  <h3>
		    <input type='submit' class="button" value="Subscribe"/>
		</h3>
	</form>
	
	    
		
		
		
		
		
		
		<br />
				<br />
			<!-- REAL ESTATE FORM ENDS -->
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
