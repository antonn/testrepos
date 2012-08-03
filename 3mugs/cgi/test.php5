<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
include ('db.php');

$result=mysql_query("SELECT * FROM directory WHERE parent_id NOT IN (SELECT child_id FROM 
directory)") or die("Can't perform Query");
?>


<table width="100%">
  <tr>
    <td><form id="form1" name="form1" method="post" action="test.php5">
      Parent Folder<select name="parent" id="parent">
	  <?php
		
			$update_row=mysql_fetch_object($result);
			$num=mysql_numrows($result);
			$i=0;
			while ($i < $num) {
			echo "<option value='";
			echo mysql_result($result,$i,"child_id");
			echo"'>";
		    echo mysql_result($result,$i,"name");
			echo "</option>";
			
		$i++;
		}
		?>
	  
      </select>
      
    Add Subfolders
    <input name="newdir" type="text" id="newdir" /> 
    <input type="submit" name="Submit" value="Add" />
    </form>
    </td>
  </tr>
</table>
</body>
</html>
