<?php
/*

*	File:			twoPageModelForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using php 
*	to allow data to be sent to twoPageModelOutput.php
*
*
*=====================================
*/

echo '<form action="' . $routeKeys['twoPageModelOutput'] . '" method="post">';
  
  echo '		Enter First Name: ';
  echo '		<input type="text" name="personFirstName" />';
  
  echo '		Enter Last Name: ';
  echo '		<input type="text" name="personLastName" />';
  
  echo '		<br /><br />';


  echo '<input type="submit" />';
    
echo '</form>';

?>