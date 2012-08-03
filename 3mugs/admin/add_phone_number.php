<?php
session_start();
if ( ($_SESSION['username'] != "admin") &&  (isset($_SESSION['username']))  ) {
header( 'Location: http://www.3mugs.com' ) ;
}
include ('../includes/db.php');

$action =  $_REQUEST['action'];
$cell_no = $_REQUEST['cell_no'];
$customerid = $_REQUEST['customerid'];



if ($action == "addphonenumber") {
	
	$update_result=MYSQL_QUERY("INSERT INTO user_directory (cust_id,cell_no) VALUES ('$customerid','$cell_no')");

}


echo "$cell_no";

?>
