<?php
/*

*	File:			companySelect.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using a dropdown
* 		to select a company from tCompany
*		and passes tCompany.ID to companyListPeople.php
*
*=====================================
*/

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {

	$tCompany_SQLselect = "SELECT  ";
	$tCompany_SQLselect .= "ID, preName, Name ";	
	$tCompany_SQLselect .= "FROM ";
	$tCompany_SQLselect .= "tCompany ";
	$tCompany_SQLselect .= "Order By Name ";
	

	$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
	
	echo '<form action="' . $routeKeys['companyListPeople'] . '" method="post">';
	
	echo '<select name="companyID">';
	
		echo '<option value="0" label="coyvalue" selected="selected">..select company..</option>';
 	
	
			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
			    $ID = $row['ID'];
			    $preName = $row['preName'];
			    $companyName = $row['Name'];
			    
          $RegType = $row['RegType'];
			    
			    $fullCoyName = trim($preName." ".$companyName." ".$RegType);
			    
			    echo '<option value="'.$ID.'">'.$fullCoyName.'</option>';
			}
		
			mysql_free_result($tCompany_SQLselect_Query);		
	
			echo '</select>';
	

			echo '<input type="submit" />';
			
	echo '</form>';

}

echo "<br /><hr /><br />";

MyLink($routeKeys['index'], 'Quit - to homepage');

?>