<?php   session_start(); ?>
<?php

$user_id = $_POST['username'] ;
$keyword = $_POST['password'];

include ('db.php');

mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

$hashed_password = md5($keyword);

$result=mysql_query("SELECT user_id, f_name , city FROM user_profile WHERE user_id='$user_id' AND keyword='$hashed_password' ") or die("Can't perform Query");

if( mysql_num_rows($result) == 1){

     $found_user  = mysql_fetch_array($result);
	 
    // register a variable

     $_SESSION['username'] = $found_user['user_id'];
	 $_SESSION['city'] =     $found_user['city'];
	 $_SESSION['f_name'] = $found_user['f_name'];
	 
     //session_register($user_id);

      if ($found_user['user_id'] == "admin") {
        $url = "Location: http://www.3mugs.com/admin/admin.php"; }  else {
        $url = "Location: http://www.3mugs.com/users/userindex.php";
      }

  //we will redirect the user to another page where we will make sure they're logged in
 header( "$url" ) ;


 } else {

  //if nothing is returned by the query, unsuccessful login code goes here...
 header( 'Location: http://www.3mugs.com' ) ;
  
  }




?>
