<?php

require_once("dbWIP/connectDB.php");

if (connectDB(true)) {
  //   SQL script to create table tCompany
	
  $createCoyTable_SQL = "CREATE TABLE alphacrm.tCompany ( ";
  $createCoyTable_SQL .= "ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
  $createCoyTable_SQL .= "preName VARCHAR( 50 ) , ";
  $createCoyTable_SQL .= "Name VARCHAR( 250 ) NOT NULL, ";
  $createCoyTable_SQL .= "RegType VARCHAR( 50 )  NULL, ";

  $createCoyTable_SQL .= "StreetA VARCHAR( 150 )  NULL, ";
  $createCoyTable_SQL .= "StreetB VARCHAR( 150 )  NULL, ";
  $createCoyTable_SQL .= "StreetC VARCHAR( 150 )  NULL, ";
  $createCoyTable_SQL .= "Town VARCHAR( 150 )  NULL, ";
  $createCoyTable_SQL .= "County VARCHAR( 150 )  NULL, ";
  $createCoyTable_SQL .= "Postcode VARCHAR( 50 )  NULL, ";

  $createCoyTable_SQL .= "COUNTRY VARCHAR( 250 ) NOT NULL ";
  $createCoyTable_SQL .= ")";
  
  if (mysql_query($createCoyTable_SQL))  {	
    echo "'Create TABLE tCompany' -  Successful.<br /><br />";
  }


  //   SQL script to create table tPerson

  $createPersonTable_SQL = "CREATE TABLE alphacrm.tPerson ( ";
  $createPersonTable_SQL .= "ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
  $createPersonTable_SQL .= "Salutation VARCHAR( 20 ) , ";
  $createPersonTable_SQL .= "FirstName VARCHAR( 50 ) , ";
  $createPersonTable_SQL .= "LastName VARCHAR( 50 ) NOT NULL, ";
  $createPersonTable_SQL .= "CompanyID INT ( 11 ) NOT NULL ";
  $createPersonTable_SQL .= ")";

  if (mysql_query($createPersonTable_SQL))  {	
    echo "'Create TABLE tPerson' -  Successful.<br /><br />";
  }
}

?>
