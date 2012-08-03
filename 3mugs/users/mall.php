<?php 
require_once ("../includes/session.php");
confirm_user_logged_in(); 
	
$action = $_REQUEST['action'];
       
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
			
			<?php require_once ("../includes/user_menu.php"); display_menu("mall"); ?>
							
						
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
<!-- REAL ESTATE FORM BEGINS  --->
<h1>Malls in <?php echo $_SESSION['city']; ?></h1>
<form  name="form1" action="mall.php" method="post" id="form1">
  <h3><strong>  Select the mall</strong> 
        <select name="mall" id="mall">
<?php
$sql_city = $_SESSION['city'];
$result=MYSQL_QUERY("SELECT * FROM malls WHERE  city='$sql_city'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
?>	

<?php 	$i=0;
	while ($i < $num) {
	?>	  
		
          <option value='<?php echo mysql_result($result,$i,"mall"); ?>' ><?php echo mysql_result($result,$i,"mall"); ?></option>
          
		  <?php $i++;}?>
		</select>
    <input type="submit" name="Submit" class="button" value="Submit" />
    <input name="action" type="hidden" id="action" value="getlisting" />
  </h3>
</form>

<?php if ($action == "getlisting") {

 ?>

<form id="form2" method="post" name="form2" action="mall.php">
  
  <table width="100%">
    
    <tr>
      <td height="562" valign="top"><h1>Apparels</h1>
        <p>
         
		 
		 
<?php
$sql_city = $_SESSION['city'];
$sql_mallname =$_POST['mall'];
$sql_cat = "apparel";
$result=MYSQL_QUERY("SELECT * FROM malls_1 WHERE  city='$sql_city' AND category='$sql_cat' AND mall_name='$sql_mallname'");
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	
?>
	
	<?php 
	
	$i=0;
	while ($i < $num) {
	?>	  
		   
		    <input type="checkbox" name='<?php echo mysql_result($result,$i,"cust_id"); ?>' value='<?php echo mysql_result($result,$i,"cust_id"); ?>' />
	      <?php echo mysql_result($result,$i,"display_name"); ?>
	     
	<?php $i++;
	
	} ?>
		 
		 
		 
		 </p>
        
        <h1>Food</h1>
        <p>
          <input type="checkbox" name="checkbox8" value="checkbox" />
          McDonald</p>
        <p>
          <input type="checkbox" name="checkbox9" value="checkbox" />
          KFC</p>
        <p>
          <input type="checkbox" name="checkbox10" value="checkbox" />
          Cafe Coffee Day</p></td>
      <td valign="top"><h1>Others</h1>
        <p>
          <input type="checkbox" name="checkbox11" value="checkbox" />
          Landmark</p>
        <p>
          <input type="checkbox" name="checkbox12" value="checkbox" />
          Special Events and Demos</p>
        <p>
          <input type="checkbox" name="checkbox13" value="checkbox" />
          PVR Cinemas</p></td>
    </tr>
    <tr>
      <td height="86"> </p>
        <input name="action" type="hidden" id="action" value="subscribe" />
        <p>
          <input type='submit' class="button" value="Subscribe"/>
          </p></td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
</form>


<?php  } ?>
<p>
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
