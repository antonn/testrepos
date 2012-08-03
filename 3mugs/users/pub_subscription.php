<?php

$user_id = $_REQUEST['username'];
$camp_id = $_REQUEST['camp_id'];
$action =  $_REQUEST['action'];
     
session_start();
if(session_is_registered($user_id)){} else {
  header( 'Location: http://www.3mugs.com' ) ;
}		


include ('db.php');

mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

if ($action == "add") {
$update_result=MYSQL_QUERY("INSERT INTO pubs_3 (camp_id,user_id) VALUES ('$camp_id','$user_id')"); 
}

if ($action == "remove") {
$update_result=MYSQL_QUERY("DELETE FROM pubs_3 WHERE user_id='$user_id' AND camp_id='$camp_id'"); 
}

echo "1";

?>
