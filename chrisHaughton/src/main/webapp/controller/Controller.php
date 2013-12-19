<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	
	public function __construct()  
    {  
        $this->model = new Model(); // creats portfolio object that holds all images data
    } 
	
 
	public function invoke()
	{
		/* ========================= get session id =================================== */
		$a = session_id();
		if(empty($a)) session_start();
		$session_id = session_id();
		//echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
		
		/* ========================= get user info =================================== */
		$db = DBFactory::getDB();
		$query = "SELECT * FROM user where logged_in = 'Y'";
		$result = $db-> selectAll($query);
		$no_of_users_logged_in = 0;
		foreach($result as $row){
			$no_of_users_logged_in = $no_of_users_logged_in + 1;
		}
		if($no_of_users_logged_in < 1){
			$current_user_id = 2;
			$current_username = 'anonymous';
			$current_user_type = 'general';
		}
		elseif($no_of_users_logged_in == 1){
			$current_user_id = $row['user_id'];
			$current_username = $row['username'];
			$current_password= $row['password'];
			$current_logged_in = $row['logged_in'];
			$current_user_type = $row['user_type'];
		}
		elseif($no_of_users_logged_in > 1){
			echo "<h1>error - more than one person is logged in</h1>";
		}
		
		
		/* ========================= get selected page info =================================== */
		
		//set page controller variable
		if (!isset($_GET['pg'])){
			$default_pg = 'home'; 
			$pg = $default_pg; //display default page
		}
		else{ 
			$pg = $_GET['pg']; // display selected page
		}
		
		
		
		/* ========================= get featured link info =================================== */
		$featured_link = $_GET['fl'];
	
		if($featured_link == 'abl' || $featured_link == 'ong' || $featured_link == 'hm' || $featured_link == 'dwihap'){
			$featured_link_flag = 'Y'; //set flag for initial load
			//function to find category and project_id of the latest individual projects at top of left menu
			$returned_info = $this->model->featured_links($featured_link);
			$category = $returned_info['category']; //the category of image
			$proj = $returned_info['proj'];
		}
		else{
			$category = $this->model->get_category_from_pg($pg); //function to find full category name from short url name
		}
		
		

		
		/* ========================= Redirect to correct page =================================== */
			
			
			
			if($pg == 'home' || $pg == 'bks' || $pg == 'ill' || $pg == 'ani' || $pg == 'sk' || $pg == 'prj' || $pg == 'app' || $pg == 'ft'){	//portfolio
				$error_flag = "false";
				include 'view/portfolio.php';
			}
			elseif ($pg == 'crproj' || $pg == 'uplimg' || $pg == 'delproj' || $pg == 'delimg' || $pg == 'updimg' || $pg == 'updproj'){ //DB interaction
				$error_flag = "false";
				include 'view/db_interaction.php';
			}
			elseif ($pg == 'abt-cont' || $pg == 'prs'){ //info text pages
				$error_flag = "false";
				include 'view/text_page.php';
			}
			elseif ($pg == 'login'){ //login
				$error_flag = "false";
				include 'view/login.php';
			}
			elseif ($pg == 'logout'){ //logout
				$error_flag = "false";
				include 'view/logout.php';
			}
// 			elseif ($pg == 'cont' || $pg == 'abt' || $pg == 'int' || $pg == 'pub' || $pg == 'ft'){ //info text pages
// 				$error_flag = "true";
// 				include 'view/text_page.php';
// 			}
			elseif ($pg == 'blg'){
				$error_flag = "true";
				include 'view/text_page.php';
			}
			elseif ($pg == 'shp'){
				$error_flag = "true";
				include 'view/text_page.php';
			}
			elseif ($pg == 'rugs'){
				$error_flag = "true";
				include 'view/text_page.php';
			}
			else{
				echo "no such page exists: try <a href='index.php'>here</a>";
			}
			
	
	} //close invoke()
	
	
} // close Controller class

?>