<?php
/*

*	File:			personEditForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form to load person details
*	and POST changed fields back to this form and UPDATE
*	If UPDATE is good then use header(Location: ...
*	to return to the companyPeopleEdit form
*
*
*=====================================
*/

$thisScriptName = $routeKeys['personEditForm'];

require_once("dbWIP/connectDB.php");
require_once('utils/getAssocArraySafe.php');

if (connectDB(true)) {

	$saveClicked = getAssocArraySafe("saveClicked", $_POST);
	
	{	//	SAVE button was clicked 
		if (isset($saveClicked)) {
			unset($saveClicked);
			
			$companyID = $_POST["companyID"];	
			
			$personID = $_POST["personID"];	
			$Salutation = $_POST["Salutation"];	
			$FirstName = $_POST["FirstName"];	
			$LastName = $_POST["LastName"];	
			$Telephone = $_POST["Telephone"];	
	
			$tPerson_SQLupdate = "UPDATE tPerson SET ";	
			$tPerson_SQLupdate .=  "CompanyID = '".$companyID."', ";		
			$tPerson_SQLupdate .=  "Salutation = '".$Salutation."', ";
			$tPerson_SQLupdate .=  "FirstName = '".$FirstName."', ";
			$tPerson_SQLupdate .=  "LastName = '".$LastName."', ";
			$tPerson_SQLupdate .=  "Tel = '".$Telephone."' ";
			$tPerson_SQLupdate .=  "WHERE ID = '".$personID."' "; 	
	
			if (mysql_query($tPerson_SQLupdate))  {	
				echo header("Location: " . $routeKeys['companyPeopleEdit'] . "?companyID=".$companyID);
			} else {
				echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
				
			}
		}	
	//	END:  SAVE button was clicked 	ie. if (isset($saveClicked))
	}		
	
	{	//  Get the details of the person selected 
			$personID = $_GET["personID"];	
					
			$tPerson_SQLselect = "SELECT * ";
			$tPerson_SQLselect .= "FROM ";
			$tPerson_SQLselect .= "tPerson ";
			$tPerson_SQLselect .= "WHERE ID = '".$personID."' ";
			
			$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect);	
			
			while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
				$current_Salutation = $row['Salutation'];
				$current_FirstName = $row['FirstName'];
				$current_LastName = $row['LastName'];
				$current_Tel = $row['Tel'];
				
				$companyID = $row['CompanyID'];
				 
			}
			
			mysql_free_result($tPerson_SQLselect_Query);			
	//  END: Get the details of the person selected 
	}

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Person EDIT Form
			</h2>';
	
	{	//		FORM postPerson 
		$fld_personID = '<input type="hidden" name="personID" value="'.$personID.'"/>';
		$fld_saveClicked = '<input type="hidden" name="saveClicked" value="1"/>';

		$fld_FirstName = '<input type="text" name="FirstName" value="'.$current_FirstName.'"/>';
		$fld_LastName = '<input type="text" name="LastName" value="'.$current_LastName.'"/>';
		$fld_Tel = '<input type="text" name="Telephone" value="'.$current_Tel.'"/>';

		{	//	create the Salutation DROPDOWN  FIELD 
			$salut_SQL =  "SELECT lookupValue FROM tLookup ";
			$salut_SQL .= "WHERE lookupType = 'Salutation' ";
			$salut_SQL .= "ORDER By lookupOrder ";
			
			$salut_SQL_Query = mysql_query($salut_SQL);	

			$fld_Salutation = '<select name="Salutation">';
	 	
				while ($row = mysql_fetch_array($salut_SQL_Query, MYSQL_ASSOC)) {
				    $salutValue = $row['lookupValue'];
				    if ($current_Salutation == $salutValue) { 
				    	$selectedFlag = " selected";
				    } else { 
				    	$selectedFlag = "";
				    }
				    $fld_Salutation .= '<option'.$selectedFlag.'>'.$salutValue.'</option>';
				}
			
				mysql_free_result($salut_SQL_Query);		
	
			$fld_Salutation .= '</select>';
			
		//	END: create the Salutation DROPDOWN  FIELD		
		}

		{	//	create the Company DROPDOWN  FIELD 
			$companyList_SQL =  "SELECT ID, preName, Name, RegType FROM tCompany ";
			$companyList_SQL .= "ORDER By Name ";
			
			$companyList_SQL_Query = mysql_query($companyList_SQL);	

			$fld_companyID = '<select name="companyID">';
	 	
				while ($row = mysql_fetch_array($companyList_SQL_Query, MYSQL_ASSOC)) {
				    $dd_companyID = $row['ID'];
				    $dd_preName = $row['preName'];
				    $dd_companyName = $row['Name'];
				    $dd_RegType = $row['RegType'];
				    
				    $fullCoyName = trim($dd_preName." ".$dd_companyName." ".$dd_RegType);
				    
				    if ($dd_companyID == $companyID) { 
				    	$selectedFlag = " selected";
				    } else { 
				    	$selectedFlag = "";
				    }
				    $fld_companyID .= '<option value="'.$dd_companyID.'"';
				    $fld_companyID .= $selectedFlag.'>'.$fullCoyName.'</option>';
				}
			
				mysql_free_result($companyList_SQL_Query);		
	
			$fld_companyID .= '</select>';
			
		//	END: create the Company DROPDOWN  FIELD 
		}

		echo '<form name="postPerson" action="'.$thisScriptName.'" method="post">';
		
				echo $fld_personID;
				echo $fld_saveClicked;
				echo '
				<table>
					<tr>
						<td>Salutation</td>
						<td>'.$fld_Salutation.'</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td>'.$fld_FirstName.'</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td>'.$fld_LastName.'</td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td>'.$fld_Tel.'</td>
					</tr>
					<tr>
						<td>Company</td>
						<td>'.$fld_companyID.'</td>
					</tr>
					<tr>
						<td></td>
						<td align="right"><input type="submit"  value="Save" /></td>
					</tr>					
				</table>
				';
					
		echo '</form>';
	//	END:	FORM postPerson 
	}
	
	echo "<br /><hr /><br />";
	
  MyLink($routeKeys['companyPeopleEdit'] . '?companyID=' . $companyID, 'Return to Company/People List');
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	MyLink($routeKeys['index'], 'Quit - to homepage');

}

?>