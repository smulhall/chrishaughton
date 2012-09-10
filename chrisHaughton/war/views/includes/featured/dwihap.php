
<div class='text_pages_content'>
	
	<div id='horiz_links_div' class='featured'>
		<ul class='horiz_menu_ul'>
			<a class='horiz_menu_a' href='?fp=<?php echo $fp; ?>&pg=lang'><li class='horiz_link menu_link'>Languages</li></a>
			<a class='horiz_menu_a' href='?fp=<?php echo $fp; ?>&pg=awards'><li class='horiz_link menu_link'>Awards</li></a>
			<a class='horiz_menu_a' href='?fp=<?php echo $fp; ?>&pg=about'><li class='horiz_link menu_link'>About the book</li></a>
			<a class='horiz_menu_a' href='?fp=<?php echo $fp; ?>&pg=resources'><li class='horiz_link menu_link'>Toys, Prints &amp; Downloads</li></a>
		</ul>
	</div>
	
	<div class='text_pages_content_content'>
		
		<?php 
		if($pg == 'lang'){ ?>
			<p>language content</p>
		<?php 
		}
		elseif($pg == 'awards'){ ?>
			<p>awards content</p>
		<?php 
		}
		elseif($pg == 'about'){ ?>
			<p>about content</p>
		<?php 
		}
		elseif($pg == 'resources'){ ?>
			<p>resources content</p>
		<?php 
		}
		?>
	
	</div>

</div>





		
	


