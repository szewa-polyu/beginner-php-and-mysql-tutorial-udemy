<?php

require_once("dbWIP/connectDB.php");

if (connectDB(false)) {
  $dbName = $db['database'];
  $create_SQL = "Create DATABASE ".$dbName;

  //echo nl2br($create_SQL . PHP_EOL);

  if (mysql_query($create_SQL))  {	
    echo "'Create DATABASE ".$dbName."' -  Successful.";
  } else {
    echo "'Create DATABASE ".$dbName."' - Failed.";
  }
}

?>
