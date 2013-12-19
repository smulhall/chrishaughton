<?php
interface DB {

	function selectAll($query);
	function selectFirst($query);
	function update($query);
	function insertReturnID($query);
	function deleteRow($query);
}

class DBpdo implements DB {
	
	private $db;
	private $pdo;
	
	function __construct(){
		$this-> pdo = new PDO("mysql:host=localhost;dbname=chrishaughton", "root", "q3;9fg");
		//$this-> pdo = new PDO("mysql:host=mysql1440int.cp.blacknight.com;dbname=db1180156_chris", "u1180156_chris", "Sto,mark8");
	}
	
	function selectAll($query){
		$result = $this-> pdo->query($query);
		
		return $result;
	}
	
	function selectFirst($query){
		$statement = $this-> pdo->prepare($query);
		$statement->execute();
		$row = $statement->fetch();
		
		return $row;
	}
	
	function update($query){
		$this-> pdo->exec($query);
	}
	
	function insertReturnID($query){
		$this-> pdo->exec($query);
		$id = $this-> pdo->lastInsertId();
		return $id;
	}
	
	function deleteRow($query){
		$this-> pdo->exec($query);
	}
	
} 

class DBFactory {
	
	private static $db;
	
	public static function getDB()
	{
		if($db!=null){
			return $db;
		} else {
			$db = new DBpdo();
			return $db;			
		}
	}
	
	private function __construct(){
	
	}
}
?>