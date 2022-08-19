<?php
class dbconn{
function connect(){
	try{
		$dsn = "mysql:host=localhost;dbname=moosprin_150122";
		$user = "root";
		$passwd = "";
		$pdo = new PDO($dsn, $user, $passwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		return $pdo;
	}
	catch(Exception $e){
		$error_msg=$e->getMessage();
		echo $error_msg;
		exit();
	}
  }
}
?>