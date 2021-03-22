<?php
/*

*	File:    index.php
*	By:      TMIT World Limited
*	Date:    2021-03-11

=====================================
*/

require('htconfig/routes.php');


$br = '<br />';

$url = $_SERVER['REQUEST_URI'];

echo 'url = ' . $url . $br;

// foreach($_SERVER as $key => $value) {
//   echo $key . " => " . $value . "<br>";
// }

$projectFolder = '/my_development/beginner-php-and-mysql-tutorial-udemy/';

$path = substr($url, strlen($projectFolder));

echo 'path = ' . $path  . $br;

if (!empty($path) && $path !== $routeKeys['index']) {
	$isShowHomePage = !array_key_exists($path, $routesRestricted);	

	if (!$isShowHomePage) {
		$fileToRequire = $routesRestricted[$path];

		echo 'fileToRequire = ' . $fileToRequire . $br . $br;

		require($fileToRequire);

		exit();
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta name="date" content="2012-01-05T01:13:33-0500" >
<meta name="copyright" content="TMIT World Limited">
<meta name="keywords" content="Infinite Skills - php/MySQL Training">
<meta name="description" content="Infinite Skills - php/MySQL Training">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

</head>
<body>

<?php
	
	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Infinite Skills - php/MySQL Training
			</h2>';
	echo '<div align="left",
				  style="
				  font-family: arial, helvetica, sans-serif; 
				  font-style: sans-serif; 
				  padding-left: 50px;
			">';
				
				
		echo '<a href="' . $routeKeys['companyCreate'] . '">
				<span style="color: maroon; ">Create New company</span>
				</a>';
		echo '<br /><br />';

		echo '<a href="' . $routeKeys['companyEdit'] . '">
				<span style="color: maroon; ">Edit company</span>
				</a>';
		echo '<br /><br />';

	echo '</div>';

?>

</body>
</html>
