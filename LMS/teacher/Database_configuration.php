<?php 
	define('DB_SERVER', 'localhost'); 
	define('DB_USERNAME', 'apoorv');  
	define('DB_PASSWORD', 'Ubuntu@123456'); 
	define('DB_DATABASE_NAME', 'lms_1'); 
try
{
$dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE_NAME,DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
//echo("Connected to the database\n");    
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>