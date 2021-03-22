<?php
	
$routesRestricted = array(
  'index' => 'index.php',
  'companyCreate' => 'forms/companyCreate.php',
  'companySave' => 'forms/companySave.php',
  'companyEdit' => 'forms/companyEdit.php',
  'companyEditForm' => 'forms/companyEditForm.php',
  'companyUpdate' => 'forms/companyUpdate.php',
  'twoPageModelForm' => 'forms/twoPageModelForm.php',
  'twoPageModelOutput' => 'forms/twoPageModelOutput.php',
);

foreach ($routesRestricted as $key => $value) {
  $routeKeys[$key] = $key;
}

?>