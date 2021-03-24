<?php

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {
  $dbName = $db['database'];
  $drop_SQL = "DROP DATABASE ".$dbName;

  if (mysql_query($drop_SQL))  {	
    echo "'DROP DATABASE ".$dbName."' -  Successful.";
  } else {
    echo "'DROP DATABASE ".$dbName."' - Failed.";
  }
}

?>
