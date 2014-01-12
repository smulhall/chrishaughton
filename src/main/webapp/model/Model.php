<?php
//require_once './mysqli_connect.php'; // Connect to the db.
require_once './model/Category.php';
require_once './model/Portfolio.php';


class Model {
	public $portfolio; //holds all images data
	
	public function __construct()
	{
		$this->portfolio = new Portfolio();
	}
	
	public function get_category_from_pg($passed_page){
		$db = DBFactory::getDB();
		$query = "SELECT * FROM category WHERE url_name = '$passed_page'";
		$result = $db-> selectAll($query);
		foreach ($result as $row){
			$category = $row['category'];
		}
		return $category;
	}
	
	public function featured_links($passed_page){
	
		switch($passed_page){
			case abl:
				$category = "book";
				$proj = 2;
				break;
			case ong:
				$category = "book";
				$proj = 3;
				break;
			case dwihap:
				$category = "book";
				$proj = 4;
				break;
			case hm:
				$category = "app";
				$proj = 5;
				break;
		}
		$info_to_return['category'] = $category;
		$info_to_return['proj'] = $proj;
		return $info_to_return;
	}
	
	
	//create a project in the DB
	public function create_proj($project_details){
		$db = DBFactory::getDB();
	
		//create local variables
		$project_name = $project_details['project_name'];
		$project_category = $project_details['project_category'];
		$category = $this->get_category_from_pg($project_category); //function to find full category name from short url name
		$query = "SELECT category_id FROM category WHERE category = '$category'";
		$result = $db-> selectFirst($query);
		$category_id = $result['category_id'];
		
		
		//insert into DB and return the id
		$query = "INSERT INTO project (title, category_id) VALUES ('$project_name', '$category_id')";
		$latest_proj_id = $db-> insertReturnID($query);
		if(isset($latest_proj_id)){
			echo "<p class='success'>Project entered into the database successfully!</p>";
		}else{
			echo "<p>Error: ".mysqli_error($db);
			echo "<br />Query: $query</p>";
		}
		return $latest_proj_id;
	}
	
	public function insert_image_into_db($images_details, $file_upload_name, $new_thumb_id){
		$db = DBFactory::getDB();
		$query = "INSERT INTO image (file_type, thumb_id, display_text_line1, display_text_line2, display_text_line3, file_ref) VALUES ('{$images_details['file_type']}', '$new_thumb_id', '{$images_details['display_text_line1']}', '{$images_details['display_text_line2']}', '{$images_details['display_text_line3']}', '$file_upload_name')";
		$latest_image_id = $db-> insertReturnID($query);
	}
	
	public function insert_thumbnail_into_db($new_thumb_id, $project_details, $passed_file_ref){
		$db = DBFactory::getDB();
		$query = "INSERT INTO thumb (thumb_id, project_id, file_ref, file_type) VALUES ('$new_thumb_id', '{$project_details['project_id']}', '$passed_file_ref', '{$project_details['file_type']}')";
		$latest_thumb_id = $db-> insertReturnID($query);
	}
	
	public function insert_links_into_db($url, $image_id){
		$db = DBFactory::getDB();
		$query = "INSERT INTO link (url, image_id) VALUES ('$url', '$image_id')";
		$latest_thumb_id = $db-> insertReturnID($query);
	}
	
	public function check_proj_featured($project_id){
		$db = DBFactory::getDB();
		$query = "SELECT featured FROM project WHERE project_id = $project_id";
		$result = $db-> selectFirst($query);
		$featured = $result['featured'];
		return $featured;
	}
	
	public function get_latest_image_id(){
		$db = DBFactory::getDB();
		$query = "SELECT MAX(image_id) as max_image_id FROM image";
		$result = $db-> selectFirst($query);
		$image_id = $result['max_image_id'];
		return $image_id;
	}
	
	public function find_max_thumb_id(){
		$db = DBFactory::getDB();
		$query = "SELECT MAX(thumb_id) as max_thumb_id FROM thumb";
		$result = $db-> selectFirst($query);
		$max_thumb_id = $result['max_thumb_id'];
		return $max_thumb_id;
	}

	//function to retrieve the projects in a particular category
	public function get_projects_in_category($passed_category){
		$db = DBFactory::getDB();
		$query = "SELECT * FROM project AS p INNER JOIN category AS c USING (category_id) WHERE c.category = '$passed_category' ORDER BY project_id DESC";
		$result = $db-> selectAll($query);
		foreach ($result as $row){
			$project_id = $row['project_id'];
			$category_projects[$project_id] = $row['title'];
		}
		return $category_projects;
	}
	
	/* ========================================== user ========================================== */
	public function get_user_info($user_id){
		$db = DBFactory::getDB();
		$query = "SELECT * FROM user where user_id = '$user_id'";
		$result = $db-> selectFirst($query);
		return $result;		
	}
	
	public function get_user_info_from_username($username){
		$db = DBFactory::getDB();
		$query = "SELECT * FROM user where username = '$username'";
		$result = $db-> selectFirst($query);
		return $result;
	}
	
	
	public function log_everyone_out(){
		$db = DBFactory::getDB();
		$query = "UPDATE user SET logged_in = 'N'";
		$db-> update($query);
		$no_of_users_logged_in = 0;
	}
	
	public function set_logged_in_value($passed_info, $action){
		$username = $passed_info["username"]; 
	
		$db = DBFactory::getDB();
		if($action == 'logout'){
			$value = 'N';
			$returned_values = $this->get_user_info_from_username($username);//get user_id
			$user_id = $returned_values['user_id'];
			$this->log_everyone_out();// log everyone out
			$session_id = 'NULL';
		}elseif($action == 'login'){
			$selected_user_id = $passed_info["user_id"];
			$selected_user_type = $passed_info["user_type"];
			$session_id = $passed_info["session_id"];
			$value = 'Y';
			$this->log_everyone_out();// log everyone out
			$no_of_users_logged_in = 1;
			$user_id = $selected_user_id;
			$current_user_type = $selected_user_type;
			
		}
		$query = "UPDATE user SET logged_in = '$value', session_id = '$session_id' WHERE user_id = '$user_id'";
		$db-> update($query);
	}
	
	public function select_project_info($project_id){
		$db = DBFactory::getDB();
		$query = "SELECT * FROM project WHERE project_id = $project_id";
		$result = $db-> selectFirst($query);
		return $result;
	}
	
	public function delete_project($project_id){
		echo "project_id = $project_id<br />";
		$db = DBFactory::getDB();
		$query = "SELECT * FROM thumb WHERE project_id = $project_id";
		$result = $db-> selectAll($query);
		foreach ($result as $row){
			$thumb_id = $row['thumb_id'];
			echo "thumb_id = $thumb_id<br />";
			$query1 = "SELECT * FROM image WHERE thumb_id = $thumb_id";
			$result1 = $db-> selectAll($query1);
			foreach ($result1 as $row1){
				$image_id = $row1['image_id'];
				echo "image_id = $image_id<br />";
				$query2 = "SELECT * FROM link WHERE image_id = $image_id";
				$result2 = $db-> selectAll($query2);
				foreach ($result2 as $row2){
					$link_id = $row2['link_id'];
					echo "link_id = $link_id<br />";
					$delete_query = "DELETE FROM link WHERE link_id = $link_id";
					$delete_result = $db-> deleteRow($delete_query);
				}
				$delete_query1 = "DELETE FROM image WHERE image_id = $image_id";
				$delete_result1 = $db-> deleteRow($delete_query1);
			}
			$delete_query2 = "DELETE FROM thumb WHERE thumb_id = $thumb_id";
			$delete_result2 = $db-> deleteRow($delete_query2);
		}
		$delete_query3 = "DELETE FROM project WHERE project_id = $project_id";
		$delete_result3 = $db-> deleteRow($delete_query3);
		
		$behaviour = "success";
		return $behaviour;
	}
	
}	
?>