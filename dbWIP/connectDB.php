<?php

require('htconfig/dbconf.php');

function connectDB($isSelectDB = true) {
  global $db;

  $dbSuccess = false;

  $dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
  if ($dbConnected) {
    
    if ($isSelectDB) {
      $dbSelected = mysql_select_db($db['database'],$dbConnected);
      if ($dbSelected) {
        $dbSuccess = true;
        echo "DB connected<br /><br />";
      } else {
        echo "DB connection FAILED<br /><br />";
      }
    } else {
      $dbSuccess = true;
    }    		
  } else {
    echo "MySQL connection FAILED<br /><br />";
  }

  return $dbSuccess;
}

?>
