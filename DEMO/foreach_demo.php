<?php
	

//		File:    foreach_demo.php		
  
echo 'The foreach loop is used with ARRAYs<br /><br />';	

$arr = array(
                          'Surrey' => 'England',
                          'Victoria' => 'Australia',
                          'Ohio' => 'USA',
                          'Manitoba' => 'Canada' );

foreach ($arr as $indexName => $itemValue)
{
  echo  "\$arr[$indexName] => $itemValue<br />";
}


echo "<br /><hr /><br />";




$arrType = array(
  'England' => 'County',
  'Australia' => 'State',
  'USA' => 'State',
  'Canada' => 'Province' );

foreach ($arr as $indexName => $itemValue)
{
  echo  "The ".$arrType[$itemValue]." of ".$indexName." is in ".$itemValue."<br />";
}

?>