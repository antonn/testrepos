<?php

$user_id = $_REQUEST['user_id'] ;
$keyword = $_REQUEST['keyword'];
$f_name = $_REQUEST['f_name'];
$l_name = $_REQUEST['l_name'];
$mail_id = $_REQUEST['mail_id'];
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


mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);



$result=MYSQL_QUERY("INSERT INTO user_profile (user_id,keyword,f_name,l_name,mail_id,city,reg_date,s_question,s_answer) VALUES ('$user_id','$keyword','$f_name','$l_name','$mail_id','$city',NOW(),'$s_question','$s_answer')");



echo "$result"; 
?>
