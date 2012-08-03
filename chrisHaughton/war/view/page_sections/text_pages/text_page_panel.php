<?php
echo "<div id='text_page_panel'>";

echo "<div id='horiz_links_div'>";
	include 'horiz_links.php';
echo "</div>";



if ($error_flag == "true"){
	echo "temporarily unavailable: try <a href='index.php'>here</a>";
}
else{
	if($pg == 'abt-cont'){
		echo "about-contact";
	}
	if($pg == 'prs'){
		echo "press";
	}
	elseif($pg == 'blg'){
		echo "blog";
	}
	elseif ($pg == 'shp'){
		echo "shop";
	}
	elseif ($pg == 'rugs'){
		echo "<iframe id='rugs' src='http://noderugs.com/' frameborder='0' scrolling='auto'></iframe>";
	}
}

	
echo "</div>";


?>