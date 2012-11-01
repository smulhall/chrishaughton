<?php

?>
<div id='lhs_menu'>

<ul class='lhs_menu_heading_ul'>
	
	<li class='lhs_menu_heading'>
		<ul id='books'>
		<?php 
		//print_r($categories);
		foreach($categories as $category_loop){
			if($category_loop-> isFeatured()){
				$featured_projects = $category_loop-> getProjects();
		?>
				<a href='/views/featured.php?c=<?php echo $category_loop-> getId(); ?>&ts=1' class='lhs_menu_subheading'><li class='menu_link'><?php echo $category_loop-> getTitle(); ?></li></a>
		<?php 
			}
		}
		?>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='other_sites'>
			<a href='/views/blog.php' class='lhs_menu_subheading'><li class='menu_link'>blog</li></a>
			<a href='/views/shop.php' class='lhs_menu_subheading'><li class='menu_link'>shop</li></a>
			<a href='/views/rugs.php' class='lhs_menu_subheading'><li class='menu_link'>rugs</li></a>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='portfolio'>
			<?php 
			//print_r($categories);
			foreach($categories as $category_loop){
				if(!$category_loop-> isFeatured()){
					if(!$category_loop-> isLink()){
						if($category_loop-> getId() == 63001 || $category_loop-> getId() == 30001){
								//display nothing
						}
						else{
			?>
							<a href='/views/category.php?c=<?php echo $category_loop-> getId(); ?>&ts=1' class='lhs_menu_subheading'><li class='menu_link'><?php echo $category_loop-> getTitle(); ?></li></a>
			<?php 
						}
					}
				}
			}
			?>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='about_etc'>
			<?php 
			//print_r($categories);
			foreach($categories as $category_loop){
				if($category_loop-> isLink()){
			?>
					<a href='/views/featured.php?c=<?php echo $category_loop-> getId(); ?>&ts=1' class='lhs_menu_subheading'><li class='menu_link'><?php echo $category_loop-> getTitle(); ?></li></a>			<?php 
				}
			}
			?>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='admin'>
			<a href='/forms/login.php' class='lhs_menu_subheading'><li class='menu_link'>login/logout</li></a>
			<?php 
			$user_logged_in = "Y"; //TODO: user to be created on server side
			if($user_logged_in == "Y"){ ?>
				<a href='/forms/admin.php' class='lhs_menu_subheading'><li class='menu_link'>admin</li></a>
			<?php } ?>
		</ul>
	</li>

</ul>
	<div id='social_icons'>
		<a class='social_icon' href='#'><img src='/images/icons/icon1.png' /></a>
		<a class='social_icon' href='#'><img src='/images/icons/icon2.png' /></a>
		<a class='social_icon' href='#'><img src='/images/icons/icon3.png' /></a>
		<a class='social_icon' href='#'><img src='/images/icons/icon4.png' /></a>
		<a class='social_icon' href='#'><img src='/images/icons/icon5.png' /></a>
	</div>
</div>