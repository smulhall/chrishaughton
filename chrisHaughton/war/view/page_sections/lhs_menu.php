<?php
$returned_info = $this->model->get_user_info($current_user_id);
$db_session_id = $returned_info['session_id'];
		
		
		
echo "<div id='lhs_menu'>";

	echo "<ul class='lhs_menu_heading_ul'>";
	
		echo "<li class='lhs_menu_heading'>";
			echo "<ul id='books'>";
				echo "<a href='index.php?pg=bks&fl=abl&curr_ts=1' class='lhs_menu_subheading'><li>A Bit Lost</li></a>";
				echo "<a href='index.php?pg=bks&fl=ong&curr_ts=1' class='lhs_menu_subheading'><li>Oh No George</li></a>";
				echo "<a href='index.php?pg=app&fl=hm&curr_ts=1' class='lhs_menu_subheading'><li>Hot Monkey</li></a>";
				echo "<a href='index.php?pg=bks&fl=dwihap&curr_ts=1' class='lhs_menu_subheading'><li>Don't worry, I have a plan</li></a>";
			echo "</ul>";
		echo "</li>";
		
		
		echo "<li class='lhs_menu_heading'>";
			echo "<ul id='other_sites'>";
				echo "<a href='index.php?pg=blg' class='lhs_menu_subheading'><li>blog</li></a>";
				echo "<a href='index.php?pg=shp' class='lhs_menu_subheading'><li>shop</li></a>";
				echo "<a href='index.php?pg=rugs' class='lhs_menu_subheading'><li>rugs</li></a>";
			echo "</ul>";
		echo "</li>";

	
		echo "<li class='lhs_menu_heading'>";
			echo "<ul id='portfolio'>";
				echo "<a href='index.php?pg=bks&curr_ts=1' class='lhs_menu_subheading'><li>books</li></a>"; // old link for books
				echo "<a href='index.php?pg=ill&curr_ts=1' class='lhs_menu_subheading'><li>illustration</li></a>";
				echo "<a href='index.php?pg=ani&curr_ts=1' class='lhs_menu_subheading'><li>animation</li></a>";
				echo "<a href='index.php?pg=sk&curr_ts=1' class='lhs_menu_subheading'><li>sketches</li></a>";
				echo "<a href='index.php?pg=prj&curr_ts=1' class='lhs_menu_subheading'><li>projects</li></a>";
				echo "<a href='index.php?pg=ft&curr_ts=1' class='lhs_menu_subheading'><li>fair trade</li></a>";
			echo "</ul>";
		echo "</li>";
		
		echo "<li class='lhs_menu_heading'>";
			echo "<ul id='about_etc'>";
				echo "<a href='index.php?pg=abt-cont' class='lhs_menu_subheading'><li>about/contact</li></a>";
				echo "<a href='index.php?pg=prs' class='lhs_menu_subheading'><li>press</li></a>";
				if($no_of_users_logged_in == 0){ 
					echo "<a href='index.php?pg=login' class='lhs_menu_subheading'><li>login</li></a>";
				}
				elseif($no_of_users_logged_in == 1 && $db_session_id == $session_id){
					echo "<a href='index.php?pg=logout' class='lhs_menu_subheading'><li>logout</li></a>";
				}
			echo "</ul>";
		echo "</li>";
		
		
		
		if($current_user_type == 'admin' && $db_session_id == $session_id){
			echo "<li class='lhs_menu_heading'>";
				echo "<ul id='db'>";
					echo "<a href='index.php?pg=crproj' class='lhs_menu_subheading'><li>create project</li></a>";
					echo "<a href='index.php?pg=delproj' class='lhs_menu_subheading'><li>delete project</li></a>";
					echo "<a href='index.php?pg=uplimg' class='lhs_menu_subheading'><li>upload img/vid</li></a>";
					echo "<a href='index.php?pg=updproj' class='lhs_menu_subheading'><li>update img/vid</li></a>";
					/*echo "<a href='index.php?pg=delimg' class='lhs_menu_subheading'><li>delete img/vid</li></a>";*/
				echo "</ul>";
			echo "</li>";
		}
	echo "</ul>";
	
	echo "<img id='social_icons' src='/model/images/other/social_icons.png' />";
	
echo "</div>";

?>