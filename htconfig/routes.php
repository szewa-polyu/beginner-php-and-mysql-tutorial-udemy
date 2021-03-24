<?php
	
$routesRestricted = array(
  'index' => 'index.php',
  'companyCreate' => 'forms/companyCreate.php',
  'companySave' => 'forms/companySave.php',
  'companyEdit' => 'forms/companyEdit.php',
  'companyEditForm' => 'forms/companyEditForm.php',
  'companyUpdate' => 'forms/companyUpdate.php',
  'companySelect' => 'forms/companySelect.php',
  'companyListPeople' => 'forms/companyListPeople.php',
  'companyWithPeople' => 'forms/companyWithPeople.php',
  'companyPeopleEdit' => 'forms/companyPeopleEdit.php',
  'personInsert' => 'forms/personInsert.php',
  'personEditForm' => 'forms/personEditForm.php',
  'companyListOrder' => 'forms/companyListOrder.php',  
  'twoPageModelForm' => 'forms/twoPageModelForm.php',
  'twoPageModelOutput' => 'forms/twoPageModelOutput.php',
);

foreach ($routesRestricted as $key => $value) {
  $routeKeys[$key] = $key;
}

?>