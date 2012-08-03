<?php
include_once './model/Image.php';


Class Thumb{
	
	public $thumb_id;
	public $file_ref;
	public $images; //array that holds image object - should be only one object
	
	
    public function __construct($thumb_id, $file_ref){  
		$this->thumb_id = $thumb_id;
		$this->file_ref = $file_ref;
		$this->images = $this->get_related_images();
	}
	
	
	private function get_related_images(){
		$db = DBFactory::getDB();			
		$query = "SELECT * FROM image AS i INNER JOIN thumb AS t USING (thumb_id) WHERE i.thumb_id = $this->thumb_id";
		$result = $db-> selectAll($query);
		foreach ($result as $row){
			$value = $row['image_id'];
			$file_ref = $row['file_ref'];
			if($row['file_type'] == 'video'){
				$file_ref = $row[5];
			}
			$image[$value] = new Image($row['image_id'], $row['thumb_id'], $row['display_text_line1'], $row['display_text_line2'], $row['display_text_line3'], $file_ref, $row['file_type']);	
		}
		return $image;
	}
    
	
}

?>