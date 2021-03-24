<?php
/*

*	File:			select_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demnstrates SQL SELECT
*		and use of        mysql_fetch_array
*
*
*=====================================
*/

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {
	
	$tPerson_SQLselect = "SELECT  ";
	$tPerson_SQLselect .= "ID, Salutation, FirstName, LastName, CompanyID ";	
	$tPerson_SQLselect .= "FROM ";
	$tPerson_SQLselect .= "tPerson ";			//	<< table name

	$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect); 	

	$indx = 1;	
	while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
	    $Salutation = $row['Salutation'];
	    $FirstName = $row['FirstName'];
	    $LastName = $row['LastName'];
	    $CompanyID = $row['CompanyID'];
	    
	    echo $indx." - ".$Salutation." ".$FirstName." ".$LastName." [Company ".$CompanyID."]<br />";

	    $indx++;	    
	}
	
	mysql_free_result($tPerson_SQLselect_Query);		
}

?>