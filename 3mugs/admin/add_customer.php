<?php

session_start();
if ( ($_SESSION['username'] != "admin") &&  (isset($_SESSION['username']))  ) {
  header( 'Location: http://www.3mugs.com' ) ;
}
include ('../includes/db.php');

$result=mysql_query("SELECT MAX(id) FROM customer_profile") or die("Can't perform Query");
$result_set  = mysql_fetch_array($result);

$customer_name = $_REQUEST['customer_name'] ;
$company_name = $_REQUEST['company_name'];
$address1 = $_REQUEST['address1'];
$address2 = $_REQUEST['address2'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$city = $_REQUEST['city'];
$category = $_REQUEST['category']; 

$part_1 = ($result_set['MAX(id)']) + 1;

$part_2 = trim($company_name);
$part_2 = strtoupper($part_2);
$part_2 = substr($part_2,0,3);

$part_3 = "BLR";  // Decide it later for other cities

$user_id = $part_2.$part_1.$part_3;   


$keyword = $_REQUEST['keyword'];  //Unimplemented
$keyword2 = $_REQUEST['keyword2']; //Unimplemented
$status = "NO";


$node_id = $country.$city.$category;   //Unimplemented
srand(time());  //Unimplemented
$random_no = (rand()%99999);  //Unimplemented
$random = "CR".$random_no;  //Unimplemented





$result=MYSQL_QUERY("INSERT INTO customer_profile (cust_id,password,ad_code,cust_name,company_name,address_1,address_2,city,category,reg_date) VALUES ('$user_id','$keyword','$random','$customer_name','$company_name','$address1','$address2','$city','$category',NOW())");


$url = "Location: http://www.3mugs.com/admin/admin.php?action=new_customer_added&created_id=$user_id";

  //we will redirect the user to another page where we will make sure they're logged in
 header( "$url" ) ;

?>
