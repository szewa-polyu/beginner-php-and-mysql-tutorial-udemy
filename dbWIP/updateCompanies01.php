<?php

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {  
  // SQL to change country value from UK to United Kingdom 
  $company_SQLupdate = "UPDATE tCompany SET ";

  $company_SQLupdate .= "COUNTRY = 'United Kingdom' ";

  $company_SQLupdate .= "WHERE COUNTRY = 'UK' "; 

  if (mysql_query($company_SQLupdate))  {	
    echo "UPDATE tCompany.COUNTRY - SUCCESSFUL.<br /><br />";
  } else {
    echo "UPDATE tCompany.COUNTRY - FAILED.<br /><br />";
  }
}
