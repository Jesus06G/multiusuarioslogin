<?php
$db_host="bexvkc2ghvcsisbu00jm-mysql.services.clever-cloud.com"; //localhost server 
$db_user="u9uiih9h61j5nfe9";	//database username
$db_password="1JRDDlCjsuaOmbF47Voh";	//database password   
$db_name="bexvkc2ghvcsisbu00jm";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



