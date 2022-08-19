<?php
class API
{
	private $connect = '';
	function __construct()
	{
		$this->database_connection();
	}
	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=moosprin_150122", "moosprin_latest", "moosprin_latest");
	}
	function insert()
	{
		if(isset($_POST["name"]))
		{
			$form_data = array(
				':name'		=>	$_POST["name"],
				':email'	=>	$_POST["email"]
			);
			$query = "
			INSERT INTO signup
			(name, email) VALUES
			(:name, :email)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}
?>