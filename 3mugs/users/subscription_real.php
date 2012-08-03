<?php

$user_id = $_REQUEST['username'];
$id= $_REQUEST['id'];
$action =  $_REQUEST['action'];
     
session_start();
if(session_is_registered($user_id)){} else {
  header( 'Location: http://www.3mugs.com' ) ;
}		


include ('db.php');

mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

$update_result=MYSQL_QUERY("DELETE FROM realdata WHERE user_id = '$user_id' AND realdata.index = $id ;"); 


echo "1";

?>
