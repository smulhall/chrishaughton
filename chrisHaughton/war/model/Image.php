<?php
include_once './model/Link.php';


Class Image{
	
	public $image_id;
	public $thumb_id;
	public $display_text_line1;
	public $display_text_line2;
	public $display_text_line3;
	public $file_ref;
	public $file_type;
	public $links; //array to hold links
	
	
    public function __construct($image_id, $thumb_id, $display_text_line1, $display_text_line2, $display_text_line3, $file_ref, $file_type)  
    {  
		$this->image_id = $image_id;
		$this->thumb_id = $thumb_id;
		$this->display_text_line1 = $display_text_line1;
		$this->display_text_line2 = $display_text_line2;
		$this->display_text_line3 = $display_text_line3;
		$this->file_ref = $file_ref;
		$this->file_type = $file_type;	
		$this->links = $this->get_links($image_id);
    } 
    
    
    public function get_links($image_id){
		
    	$db = DBFactory::getDB();
    	$query = "SELECT l.link_id, l.url FROM link AS l INNER JOIN image AS i USING (image_id) WHERE image_id = $this->image_id";
    	$result = $db-> selectAll($query);
    	foreach ($result as $row){
    		$value = $row['link_id'];
			$links[$value] = new Link($row['link_id'], $row['url']);
    	}
    	
    	return $links;
    	
    }
   
	
}

?>