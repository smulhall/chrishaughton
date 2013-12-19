<?php

echo "<div id='horiz_menu_div'>";

if($pg == 'abt-cont'){
	echo "<ul class='horiz_menu_ul'>";
		echo "<a href='index.php?pg=' class='horiz_link'><li>about</li></a>";
		echo "<a href='index.php?pg=' class='horiz_link'><li>contact</li></a>";
	echo "</ul>";
}

if($pg == 'prs'){
	echo "<ul class='horiz_menu_ul'>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>press</li></a>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>interviews</li></a>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>publications</li></a>";
	echo "</ul>";
}

if($pg == 'xxx'){
	echo "<ul class='horiz_menu_ul'>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>Languages</li></a>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>Awards</li></a>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>About the Book</li></a>";
			echo "<a href='index.php?pg=' class='horiz_link'><li>Toys, prints and downloads</li></a>";
	echo "</ul>";
}

echo "</div>";

?>