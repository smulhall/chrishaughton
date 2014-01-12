<?php
include_once './model/Thumb.php';
include_once 'DB.php';

Class Project{
	
	public $project_id;
	public $title;
	public $thumbs; //array of related thumb objects
	

	public function __construct($project_id, $title){
		$this->project_id = $project_id;
		$this->title = $title;
		$this->thumbs = $this->get_related_thumbs();
	}
	
	
	private function get_related_thumbs(){
			$db = DBFactory::getDB();
			
			$query = "SELECT * FROM thumb AS t INNER JOIN project AS p USING (project_id) WHERE t.project_id = $this->project_id ORDER BY thumb_id DESC";
			$result = $db-> selectAll($query);
			foreach ($result as $row){
				$value = $row['thumb_id'];
				$thumbs[$value] = new Thumb($row['thumb_id'], $row['file_ref']);
			}
		
			return $thumbs;
	}
	
	
	
	
}

?>