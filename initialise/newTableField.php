<?php
/*

*	File:			newTableField.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script adds a new VARCHAR field to the table $thisTable
*
*
*=====================================
*/

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {
	
		$thisTable = "tPerson";
		$newField = "Tel";
		$newFieldLength = 50;
		
		$newField_SQLalter =  "ALTER TABLE ".$thisTable;
		$newField_SQLalter .= " ADD ".$newField;
		$newField_SQLalter .= " VARCHAR(".$newFieldLength.") NOT NULL";
		 
		echo '<span style = "text-decoration: underline;">
				SQL statement:</span>
				<br />'.$newField_SQLalter.'<br /><br />';
				
		if (mysql_query($newField_SQLalter))  {	
			echo 'used to Successfully add new field '.$newField.' to '.$thisTable.'.<br /><br />';
		} else {
			echo '<span style="color:red; ">FAILED to add field.</span><br /><br />';
			
		}	

}

?>