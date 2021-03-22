<?php
/*

*	File:			selectTable_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demonstrates SQL SELECT rendered in an  HTML Table 
*
*======================================================================
*/

require("dbWIP/connectDB.php");

if (connectDB(true)) {
	$tPerson_SQLselect = "SELECT  ";
	$tPerson_SQLselect .= "ID, Salutation, FirstName, LastName, CompanyID ";	
	$tPerson_SQLselect .= "FROM ";
	$tPerson_SQLselect .= "tPerson ";			//	<< table name
	
	$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect); 	

	/*
	*			We Need a TABLE header here
  */
	
  echo "<table border='1'>";
		
		echo "<tr>";
		
			echo "<td>#</td>";
			echo "<td>Salut</td>";
			echo "<td>FirstName</td>";
			echo "<td>LastName</td>";
			echo "<td>Company</td>";
	
		echo "</tr>";


	$indx = 1;	
	while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
	    $Salutation = $row['Salutation'];
	    $FirstName = $row['FirstName'];
	    $LastName = $row['LastName'];
	    $CompanyID = $row['CompanyID'];
	    
		//   We need to replace ...	
	    //echo $indx." - ".$Salutation." ".$FirstName." ".$LastName." [Company ".$CompanyID."]<br />";
		/*		with
		*
		*		a REPEATED HTML TABLE ROW construct here
		*
		*/

    echo "<tr>";
		
      echo "<td>".$indx."</td>";       //  this is NOT  tPerson.ID
      echo "<td>".$Salutation."</td>";
      echo "<td>".$FirstName."</td>";
      echo "<td>".$LastName."</td>";
      echo "<td>".$CompanyID."</td>";

    echo "</tr>";

    $indx++; 
	}

	/*
	*			We Need a TABLE end tag here after 'while' has rendered all the rows 
	*
	*/

  echo "</table>";
	
	
	mysql_free_result($tPerson_SQLselect_Query);		
}

?>