<?php

echo "<div id='central_panel'>";
	
if ($error_flag == "true"){
	echo "temporarily unavailable: try <a href='index.php'>here</a>";
}
else{
	$src="../model/images/art/$image_selected_in_selected_thumb->file_ref";
	$file_type="$image_selected_in_selected_thumb->file_type";
	
	if($file_type == "image"){
		echo "<img src='".$src."' />";
	}
	elseif($file_type == "video"){
		echo "<video controls='controls' autoplay='on'>";
		echo "<source src='$src' type='video/mp4' />";
		echo "<source src='movie.ogg' type='video/ogg' />";//TODO: add in ogg file for Firefox
		echo "Your browser does not support the video tag.";
		echo "</video>";
	}
}
	
	
echo "</div>";


?>