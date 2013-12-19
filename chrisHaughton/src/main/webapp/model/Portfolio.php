<?php
require_once './model/Category.php';

Class Portfolio{

	public $categories; //array of project objects


	public function __construct(){
		$this->get_portfolio();
	}
	
	//function to populate the categories array in this object
	private function get_portfolio(){
		$db = DBFactory::getDB();	
		$query = "SELECT * FROM category";
		$result = $db-> selectAll($query);
		foreach ($result as $row){
			$category = $row['category'];
			$this->categories[$category] = new Category($row['category_id'], $row['category']); //create each project object and place into project array
		}
	}


}