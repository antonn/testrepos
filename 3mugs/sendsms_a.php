<?php

$msg = $_REQUEST['msg'];
$camp_id = $_REQUEST['camp_id'];

     

include ('db.php');

mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

$result=MYSQL_QUERY("SELECT * FROM user_profile,send_sms WHERE user_profile.user_id=send_sms.user_id AND send_sms.camp_id='$camp_id'"); 
$row=mysql_fetch_object($result);
$num=mysql_num_rows($result);	

while ($i < $num) {

$mobile_no = mysql_result($result,$i,"cell_no");
$mail_to="$mobile_no@airtelkk.com";
$mail_from='fun@fun.com';
$mail_sub=$msg;
$mail_mesg=$msg;

mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from");

$i++;

}



echo "1";

?>
