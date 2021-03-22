<?php
/*

*	File:			selectJoin_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demonstrates SQL SELECT 
*		using tPerson LEFT OUTER JOIN tCompany
*		
*
*=========================================================================
*/

require("dbWIP/connectDB.php");

if (connectDB(true)) {
	
	$tPerson_SQLselect = "SELECT  ";
	$tPerson_SQLselect .= "tPerson.ID, tPerson.Salutation, ";	
	$tPerson_SQLselect .= "tPerson.FirstName, tPerson.LastName, ";	
	$tPerson_SQLselect .= "tCompany.preName, tCompany.Name ";	
	$tPerson_SQLselect .= "FROM ";
	$tPerson_SQLselect .= "tPerson ";	
	$tPerson_SQLselect .= "LEFT OUTER JOIN tCompany ON ";
	$tPerson_SQLselect .= "tPerson.CompanyID = tCompany.ID ";

	$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect); 	

	echo "<table border='1'>";
		
		echo "<tr>";
		
			echo "<td>#</td>";
			echo "<td>Salutation</td>";
			echo "<td>FirstName</td>";
			echo "<td>LastName</td>";
			echo "<td>Company</td>";
	
		echo "</tr>";

	
	$indx = 1;	
	while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
		
	    $Salutation = $row['Salutation'];
	    $FirstName = $row['FirstName'];
	    $LastName = $row['LastName'];
	    $CompanypreName = $row['preName'];
	    $CompanyName = $row['Name'];
	    
	    $CompanyFullName = trim($CompanypreName." ".$CompanyName);
	    
		echo "<tr>";
		
			echo "<td>".$indx."</td>";       //  this is NOT  tPerson.ID
			echo "<td>".$Salutation."</td>";
			echo "<td>".$FirstName."</td>";
			echo "<td>".$LastName."</td>";
			echo "<td>".$CompanyFullName."</td>";
	
		echo "</tr>";

	    $indx++;
	    
	}
	
	echo "</table>";	


	mysql_free_result($tPerson_SQLselect_Query);		
}

?>