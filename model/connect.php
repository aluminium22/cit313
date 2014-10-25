<?php

function connectToDatabase(){

	//database Server name
	$server = getenv('OPENSHIFT_MYSQL_DB_HOST');
	//Database Name
	$dbName = getenv('OPENSHIFT_APP_NAME');
	//UserName
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	//DSN
	$dsn = "mysql:host=".$server.";dbname=".$dbName;
	//password
	$dbPass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	//Error Exeption
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	try{
		//function
		$connectToDB = new PDO($dsn, $dbUser, $dbPass);
	}
	catch(PDOEXCEPTION $e){
		//the error 
			echo 'database connection is not working';
	}
	return $connectToDB;
}

?>