<?php
include_once './model/Project.php';

Class Category{

	public $category_id;
	public $category;
	public $projects; //array of project objects


	public function __construct($category_id, $category){
		$this->category_id = $category_id;
		$this->category = $category;
		$this->projects = $this->get_projects();
	}
	
	
	//function to populate the projects array in this object
	private function get_projects(){
		$db = DBFactory::getDB();
		$query = "SELECT * FROM project AS p INNER JOIN category AS c USING (category_id) WHERE category_id = $this->category_id ORDER BY project_id DESC";
		$result = $db-> selectAll($query);
		foreach ($result as $row){
			$value = $row['project_id'];
			$projects["$value"] = new Project($row['project_id'], $row['title']); //create each project object and place into project array
		}
		return $projects;
	} 
	
	
	
}