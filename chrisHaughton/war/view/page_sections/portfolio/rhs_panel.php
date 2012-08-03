<?php

echo "<div id='rhs_panel'>";
	
	
	//========= thumbnails ============
	//if($featured_link_flag == 'N'){
		echo "<div id='thumb_wrapper'>";
				$no_of_thumbnails_per_set = 15;
				$total_no_of_thumbnails = count($projects_array_in_selected_category);
				$no_of_th_sets = ceil($total_no_of_thumbnails / $no_of_thumbnails_per_set);
				$current_th_set = $_GET['curr_ts']; //if set
				$current_ts_upr_limit = $current_th_set * $no_of_thumbnails_per_set;
				$current_ts_lwr_limit = $current_ts_upr_limit - $no_of_thumbnails_per_set;
				
				$counter = 1;
				foreach($projects_array_in_selected_category as $key => $value){
					if($counter > $current_ts_lwr_limit && $counter <= $current_ts_upr_limit){
						$first_thumb_key = key($value->thumbs);
						$thumb_first = $value->thumbs[$first_thumb_key];
						$test = next($value->thumbs);
						$first_image_key = key($thumb_first->images);
						$image_first = $thumb_first->images[$first_image_key];
						if(isset($image_first)){
							echo "<a href='index.php?pg=".$pg."&proj={$value->project_id}&th={$first_thumb_key}&img={$image_first->image_id}&curr_ts=$current_th_set'><img class='rhs_thumb' src='model/images/art/=thumb/{$thumb_first->file_ref}' /></a>";	
						}
					}
					$counter++;
				}
				
				$pg = $_GET['pg'];
				$proj = $_GET['proj'];
				$th = $_GET['th'];
				$img = $_GET['img'];
				
				
		echo "</div>";
		
		echo "<div id='prev_next'>";
		if($current_th_set > 1){
			$new_th_set = $current_th_set - 1;
			echo "<a id='prev_ts' href='index.php?pg=$pg&proj=$proj&th=$th&img=$img&curr_ts=$new_th_set'><img class='arrow' src='model/images/other/prev.jpg' /></a>";
		}
			if($current_th_set < $no_of_th_sets){
			$new_th_set = $current_th_set + 1;
			echo "<a id='next_ts' href='index.php?pg=$pg&proj=$proj&th=$th&img=$img&curr_ts=$new_th_set'><img class='arrow' src='model/images/other/next.jpg' /></a>";
			}
		echo "</div>";
	//} //close if featured statement
	
	
	//========= Image info ============
	
	
	echo "<div id='image_info_wrapper'>";
		echo "<p class='dashed_line'>- - - - - - - - - - - - -</p>";
		
		echo "<div id='info'>";
			if(isset($image_selected_in_selected_thumb->display_text_line1) || isset($image_selected_in_selected_thumb->display_text_line2) || isset($image_selected_in_selected_thumb->display_text_line3)){
				echo "<h4>info:</h4>";
				echo "<p>{$image_selected_in_selected_thumb->display_text_line1}</p>";
				echo "<p>{$image_selected_in_selected_thumb->display_text_line2}</p>";
				echo "<p>{$image_selected_in_selected_thumb->display_text_line3}</p>";
			}
		echo "</div>";
		
		//========= Image Links ============
		echo "<div id='links'>";
			$no_of_elements = count($links_array_in_selected_image);
			if($no_of_elements > 0){ //test to see if there are links for this image
				echo "<h4>links:</h4>";
				foreach($links_array_in_selected_image as $key2 => $value2){
					echo "<p>$value2->url</p>";
				}		
			}
		echo "</div>";
		
		//========= More Images ============
		echo "<div id='more_images'>";
			$no_of_elements2 = count($thumbs_array_in_selected_project);
			if($no_of_elements2>1){ //test to see if there are more images in this project
				echo "<h4>more images:</h4>";
				echo "<div id='more_images_thumb_wrapper'>";
				$c=0;
				foreach($thumbs_array_in_selected_project as $key => $value){
					if($c >= 1){
						$first_image_key = key($value->images);
						$image_first = $value->images[$first_image_key];
						echo "<a href='index.php?pg=".$pg."&proj={$proj}&th={$value->thumb_id}&img={$image_first->image_id}&curr_ts=$current_th_set'><img class='rhs_thumb' src='model/images/art/=thumb/".$value->file_ref."' /></a>";
					}
					$c++;
				}
				echo "</div>";
			}
		echo "</div>";
	
	echo "</div>";
	
echo "</div>";

?>


