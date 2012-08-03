<?php
$hostname="p41mysql93.secureserver.net";
$username="radeon";
$password="jkSeW*8e#t%";
$dbname="radeon";
$usertable="user_profile";
mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);
?>
