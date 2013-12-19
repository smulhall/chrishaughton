<?php

echo "<div id='header'>";
		
			if($pg == 'shp'){
				$logo_src = 'shop';
			}
			else if($pg == 'blg'){
				$logo_src = 'blog';
			}
			else if($pg == 'rugs'){
				$logo_src = 'rugs';
			}
			else{
				$logo_src = 'portfolio';
			}
		
		echo "<a href='index.php?pg=home'><img src='model/images/other/logos/logo_".$logo_src.".jpg' /></a>";
		
echo "</div>";	

?>