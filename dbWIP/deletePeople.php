<?php

require("dbWIP/connectDB.php");

if (connectDB(true)) {
  $people_SQLdelete = "DELETE FROM tPerson WHERE CompanyID > '200'"; 
	
	if (mysql_query($people_SQLdelete))  {	
		echo "DELETE tPerson  - SUCCESSFUL.<br /><br />";
	} else {
		echo "DELETE tPerson  - FAILED.<br /><br />";
	}
}
