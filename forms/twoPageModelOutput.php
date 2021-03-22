<?php
/*

*	File:			twoPageModelOutput.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from twoPageModelForm.php
*	and processes it
*
*
*=====================================
*/

$personFirstName = $_POST["personFirstName"];
$personLastName = $_POST["personLastName"];

echo "The name you entered was: ".$personFirstName." ".$personLastName;

echo "<br /><hr /><br />";

echo '<a href="' . $routeKeys['twoPageModelForm'] . '">Go Back</a>';


?>