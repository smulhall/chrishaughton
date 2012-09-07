<?php

?>
<div id='lhs_menu'>

<ul class='lhs_menu_heading_ul'>
	
	<li class='lhs_menu_heading'>
		<ul id='books'>
			<a href='/views/featured.php?fp=abl&pg=awards' class='lhs_menu_subheading'><li class='menu_link'>A Bit Lost</li></a>
			<a href='/views/featured.php?fp=ong&pg=awards' class='lhs_menu_subheading'><li class='menu_link'>Oh No George</li></a>
			<a href='/views/featured.php?fp=hm&pg=awards' class='lhs_menu_subheading'><li class='menu_link'>Hot Monkey</li></a>
			<a href='/views/featured.php?fp=dwihap&pg=awards' class='lhs_menu_subheading'><li class='menu_link'>Don't worry, I have a plan</li></a>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='other_sites'>
			<a href='index.php?pg=blg' class='lhs_menu_subheading'><li class='menu_link'>blog</li></a>
			<a href='index.php?pg=shp' class='lhs_menu_subheading'><li class='menu_link'>shop</li></a>
			<a href='index.php?pg=rugs' class='lhs_menu_subheading'><li class='menu_link'>rugs</li></a>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='portfolio'>
			<!--  <a href='category.php?c=9002' class='lhs_menu_subheading'><li>books</li></a> -->
			<!--  <a href='category.php?c=7003' class='lhs_menu_subheading'><li>apps</li></a> -->
			<a href='/views/category.php?c=4002' class='lhs_menu_subheading'><li class='menu_link'>illustration</li></a>
			<a href='/views/category.php?c=8001' class='lhs_menu_subheading'><li class='menu_link'>animation</li></a>
			<a href='/views/category.php?c=9001' class='lhs_menu_subheading'><li class='menu_link'>sketches</li></a>
			<a href='/views/category.php?c=9002' class='lhs_menu_subheading'><li class='menu_link'>projects</li></a>
			<a href='/views/category.php?c=5003' class='lhs_menu_subheading'><li class='menu_link'>fair trade</li></a>
		</ul>
	</li>
	
	<li class='lhs_menu_heading'>
		<ul id='about_etc'>
			<a href='index.php?pg=abt-cont' class='lhs_menu_subheading'><li class='menu_link'>about/contact</li></a>
			<a href='index.php?pg=prs' class='lhs_menu_subheading'><li class='menu_link'>press</li></a>
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

<img id='social_icons' src='/images/social_icons.png' />
</div>