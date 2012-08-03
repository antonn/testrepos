<?php
$user_id = $_REQUEST['username'];
$country = $_REQUEST['country'];
$city = $_REQUEST['city'];
$category = $_REQUEST['category'];

	   
session_start();
if(session_is_registered($user_id)){
			 } else {
			  header( 'Location: http://www.3mugs.com' ) ;
			  }		


$node_id = $country.$city.$category;


 switch ($category){
 
      case "2":
		$url = "Location:   http://www.3mugs.com/admin/pub_admin.php?node_id=$node_id&city=$city&username=$user_id";
		break;
 
	case "4":
		$url = "Location:   http://www.3mugs.com/admin/pub_admin.php?node_id=$node_id&city=$city&username=$user_id";
		break;
		
	case "5":
		$url = "Location:   http://www.3mugs.com/admin/realestate_admin.php?node_id=$node_id&city=$city&username=$user_id";
		break;
	
		
   }



  //we will redirect the user to another page where we will make sure they're logged in
 header( "$url" ) ;

?>
