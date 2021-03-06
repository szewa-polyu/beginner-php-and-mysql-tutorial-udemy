<?php
/*

*	File:			companyListOrder.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script Lists the records in tCompany with ordering
*	by clicking on the header for some columns
*	Links to the people list for a company by clicking
*	on the ID field of a row.
*
*
*=============================================================
*/

require_once("dbWIP/connectDB.php");

if (connectDB(true)) 
	
	$thisScriptName = $routeKeys['companyListOrder'];
	
	{  //   Style declarations
			$trOdd = 'style = "background-color: #BFFFCF;"';
			$trEven = 'style = "background-color: #FCCDFF;"';
			
			$textFont = 'style = " font-family: arial, helvetica, sans-serif; "';
			$textRed = 'style = " font-family: arial, helvetica, sans-serif; color:maroon; "';
			
	//   END: Style declarations	
	}
	
	//		Get the sortorder with GET but default to Name
	$orderClause = getAssocArraySafe("fieldNameToSortOn", $_GET);
	if (!isset($orderClause)) {$orderClause = "Name"; }
	
	{	//		SELECT all companies in Name order and execute 
		$tCompany_SQLselect = "SELECT * ";
		$tCompany_SQLselect .= "FROM ";
		$tCompany_SQLselect .= "tCompany ";	
		$tCompany_SQLselect .= "ORDER BY ";
		$tCompany_SQLselect .= "tCompany.".$orderClause;

		$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect); 	

	}
	
	{	//		Output 
	
	//		make each header a link to $thisScriptName with querystring or orderclause 
	$header_ID = '<a href="'.$thisScriptName.'?fieldNameToSortOn=ID">ID</a>';
	$header_Name = '<a href="'.$thisScriptName.'?fieldNameToSortOn=Name">Company</a>';
	$header_Town = '<a href="'.$thisScriptName.'?fieldNameToSortOn=Town">Town</a>';
	$header_County = '<a href="'.$thisScriptName.'?fieldNameToSortOn=County">County</a>';
	$header_Postcode = '<a href="'.$thisScriptName.'?fieldNameToSortOn=Postcode">Postcode</a>';
	$header_COUNTRY = '<a href="'.$thisScriptName.'?fieldNameToSortOn=COUNTRY">COUNTRY</a>';
	
	{	//		create a div for the whole rendering 
	echo '<div '.$textFont.' ">';
	
		echo '<h2>Company List</h2>';
					
		echo '<table border="1">';	
			echo '<tr '.$textRed.'>';		
				echo '<td>'.$header_ID.'</td>';
				echo '<td>&nbsp;</td>';
				echo '<td>'.$header_Name.'</td>';
				echo '<td>Address</td>';
				echo '<td>'.$header_Town.'</td>';
				echo '<td>'.$header_County.'</td>';
				echo '<td>'.$header_Postcode.'</td>';
				echo '<td>'.$header_COUNTRY.'</td>';

			echo '</tr>';
	
			$indx = 0;		//		count the rows to give alternating style 
			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
				
				$ID = $row['ID'];
				$preName = $row['preName'];
				$CompanyName = $row['Name'];
				$RegType = $row['RegType'];				
				$CompanyFullName = trim($CompanyName." ".$RegType);
				
				$StreetA = $row['StreetA'];
				$StreetB = $row['StreetB'];
				$StreetC = $row['StreetC'];			    
				$CompanyAddress = $StreetA;				
				if (!empty($StreetB)) { $CompanyAddress .=  ", ".$StreetB; }
				if (!empty($StreetC)) { $CompanyAddress .=  ", ".$StreetC; }		    
					
			   $Town = $row['Town'];
			   $County = $row['County'];
			   $Postcode = $row['Postcode'];
			   $COUNTRY = $row['COUNTRY'];
		
				//		Link to companyPeopleEdit.php?companyID=$ID
				$linkToList = '<a href="' . $routeKeys['companyPeopleEdit'] . '?companyID='.$ID.'">'.$ID.'</a>';
				
				//		Set row style
				if (($indx % 2) == 1) {$rowClass = $trOdd; } else { $rowClass = $trEven; }
				echo '<tr '.$rowClass.'>';
				
					echo '<td>'.$linkToList.'&nbsp;</td>'; 
					echo '<td>'.$preName.'&nbsp;</td>'; 
					echo '<td>'.$CompanyFullName.'&nbsp;</td>';
					echo '<td>'.$CompanyAddress.'&nbsp;</td>';
					echo '<td>'.$Town.'&nbsp;</td>';
					echo '<td>'.$County.'&nbsp;</td>';
					echo '<td>'.$Postcode.'&nbsp;</td>';
					echo '<td>'.$COUNTRY.'&nbsp;</td>';
			
				echo '</tr>';
		  
		  		$indx++;
		   //	END: while
			}

		echo '</table>';	
		echo ' &nbsp;&nbsp;^ click ID to edit record';

	echo '</div>';
	//		END: create a div for the whole rendering 
	}
	
	}	//		END: //		Output 
	
	mysql_free_result($tCompany_SQLselect_Query);	

echo '<br /><hr /><br />';

MyLink($routeKeys['index'], 'Quit - to homepage');

?>