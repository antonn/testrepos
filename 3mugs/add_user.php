<?php   session_start(); ?>
<?php
$user_id = trim((($_REQUEST['user_id'])));
$pword = trim((($_REQUEST['keyword'])));
$f_name = trim((($_REQUEST['f_name'])));
$l_name = trim((($_REQUEST['l_name'])));
$mail_id = trim((($_REQUEST['mail_id'])));
$city = $_REQUEST['city'];
$country = $_REQUEST['country'];
$cell_no = $_REQUEST['cell_no'];
$s_question = $_REQUEST['s_question'];
$s_answer = $_REQUEST['s_answer'];

$hostname="p41mysql93.secureserver.net";
$username="radeon";
$password="jkSeW*8e#t%";
$dbname="radeon";
$usertable="user_profile";


$status = "NO";

mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);
$hashed_password = md5($pword);
$result=MYSQL_QUERY("INSERT INTO user_profile (user_id,keyword,f_name,l_name,mail_id,city,reg_date,s_question,s_answer,status) VALUES ('$user_id','$hashed_password','$f_name','$l_name','$mail_id','$city',NOW(),'$s_question','$s_answer','$status')");

session_register($user_id);
$url = "Location: http://www.3mugs.com/users/userindex.php?username=$user_id";
//we will redirect the user to another page where we will make sure they're logged in
header( "$url" ) ;

?>
