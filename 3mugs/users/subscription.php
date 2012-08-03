<?php
require_once ("../includes/session.php");
confirm_user_logged_in(); 

$action =  $_REQUEST['action'];
$user_id = $_REQUEST['username'];
$sub_id = $_REQUEST['sub_id'];
$cust_id = $_REQUEST['cust_id'];
$cat =  $_REQUEST['cat'];


if ($action == "add") {

	switch ($cat) {
	
case "food" :
		
		 // Subscribe the user under the corresponding customer
			$update_result=MYSQL_QUERY("INSERT INTO food_2 (sub_id,user_id) VALUES ('$sub_id','$user_id')"); 
	    
		// Get the cell number
		
		    $getting_cellnumber = MYSQL_QUERY("SELECT cell_no FROM user_profile WHERE user_id = '$user_id'"); 
			$result_set  = mysql_fetch_array($getting_cellnumber);
			$cellphone   = $result_set['cell_no'];
		
		
	       //Check for any valid ads from sms_history for this cust_id and send
		   //back msg to this fellow.
			
		   $result=MYSQL_QUERY("SELECT * FROM sms_history WHERE cust_id='$cust_id' AND CURDATE() <= valid_date"); 
   
           $row=mysql_fetch_object($result);
           $num=mysql_num_rows($result);	
           $sms_sent = false;
           $log = "";
  
           while ($i < $num) {
    
	         $msg = mysql_result($result,$i,"message");
    		 $mail_to="$cellphone@airtelkk.com";
   		     $mail_from='fun@fun.com';
   			 $mail_sub=$msg;
    		 $mail_mesg=$msg;
   			 $log .= "$mobile_no,";
   			 mail($mail_to,$mail_sub,$mail_mesg,"From:$mail_from");
    		 $sms_sent=true;
   			 $i++;
  			}	
			
	break;
	
	
		case "pub" :
			$update_result=MYSQL_QUERY("INSERT INTO pub_2 (sub_id,user_id) VALUES ('$sub_id','$user_id')"); 
		break;
		case "mall" :
			$update_result=MYSQL_QUERY("INSERT INTO malls_2 (sub_id,user_id) VALUES ('$sub_id','$user_id')"); 
		break;
		case "brand" :
			$update_result=MYSQL_QUERY("INSERT INTO brand_2 (sub_id,user_id) VALUES ('$sub_id','$user_id')"); 
		break;

	}

}


if ($action == "remove") {
	switch ($cat) {
		case "food" :
		$update_result=MYSQL_QUERY("DELETE FROM food_2 WHERE id='$sub_id'"); 
		break;
		case "pub" :
		$update_result=MYSQL_QUERY("DELETE FROM pub_2 WHERE id='$sub_id'"); 
		break;
		case "mall" :
		$update_result=MYSQL_QUERY("DELETE FROM mall_2 WHERE id='$sub_id'"); 
		break;
		case "brand" :
		$update_result=MYSQL_QUERY("DELETE FROM brand_2 WHERE id='$sub_id'"); 
		break;
	}
}

if ($sms_sent) {
echo "Done!";
}


?>
