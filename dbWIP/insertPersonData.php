<?php
/*

*	File:		insertPersonData.php
*	By:			TMIT
*	Date:		20100601
*
*	This script sets up an ARRAY for tPerson field names
*						and an ARRAY for 3 tPerson ROWs of data
*
*	the script creates an SQL INSERT statement to insert these rows into tPerson 
*
*	We then modify the script to
*			a)		use a 'while () {}' construct to create the INSERT statement
*					irrespective of how many ROWS of data existed
*			b)		use php:  fopen, feof, fgets and fclose to read the data
*					from a file instead of inside the script
*			c)		use the php 'explode' construct to set a variable to 
*					an array comprising a the line of data in the datafile
*
*=====================================
*/

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {
  {	//	setup ARRAY of field names 
		$personField = array(
					'Salutation' => 'Salutation',
					'FirstName' => 'FirstName',
					'LastName' => 'LastName',
					'CompanyID' => 'CompanyID',			
		);
	}
	
	{	// setup ARRAY of data ROWS

		//		read CSV data file
	
    $file = fopen("dbWIP/dataFile.csv", "r");					//		open the file 'datafile' for 'r'eading
    
    if ($file) {
      $i = 0;
      while(!feof($file))									//		while NOT the End Of File 
        {		  	
        $thisLine = fgets($file);						//		gets the next line from 'datafile'				
        $personData[$i] = explode(",", $thisLine);//    sets 
                                    //		$personData[$i] = array( $thisLine );
                                    //		whatever's in $thisline separated by commas .
        $i++;  												//		increment $i 
        }
      fclose($file); 										//		close the file 
      
      $numRows = sizeof($personData);
    } else {
      echo "Cannot open data file.";
      return;
    }
	}	

		
	{	//	SQL statement with ARRAYS 
		
		//   Fieldnames part of INSERT statement 
		$person_SQLinsert = "INSERT INTO tPerson (
									".$personField['Salutation'].",
									".$personField['FirstName'].",
									".$personField['LastName'].",
									".$personField['CompanyID']."							
									) ";
								
		//   VALUES  part of INSERT statement 									
		$person_SQLinsert .=  "VALUES ";

    $indx = 0;		
		while($indx < $numRows) {			
			$person_SQLinsert .=  "(
										'".$personData[$indx][0]."',
										'".$personData[$indx][1]."',
										'".$personData[$indx][2]."',
										'".$personData[$indx][3]."'
										) ";
			if ($indx < ($numRows - 1)) {
				$person_SQLinsert .=  ",";
			}
			
			$indx++;
		}
	}
		
			
		
	{	//	Echo and Execute the SQL and test for success   
		
		echo "<strong><u>SQL:<br /></u></strong>";
		echo $person_SQLinsert."<br /><br />";
			
		if (mysql_query($person_SQLinsert))  {				
			echo "was SUCCESSFUL.<br /><br />";
		} else {
			echo "FAILED.<br /><br />";		
		}

	}
}

?>
