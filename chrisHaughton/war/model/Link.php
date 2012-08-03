<?php


Class Link{
	
	public $link_id;
	public $url;
	
	public function __construct($link_id, $url){
		$this->link_id = $link_id;
		$this->url = $url;
	}
	
}

?>