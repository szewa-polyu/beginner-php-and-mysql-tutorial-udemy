<?php
	
//		read CSV data file
	
$file = fopen("dbWIP/dataFile.csv", "r");					//		open the file 'datafile' for 'r'eading 		
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


echo "<table border='1'>";
	
	echo "<tr>";
	
		echo "<td>Salut</td>";
		echo "<td>FirstName</td>";
		echo "<td>LastName</td>";
		echo "<td>Company</td>";

	echo "</tr>";

  foreach ($personData as $person) {
    echo "<tr>";
		
      foreach ($person as $personInfo) {
        echo "<td>$personInfo</td>";
      }
      
		echo "</tr>";
  }

echo "</table>";

?>
