<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$category = $portfolioService-> getCategory(1);
$projects = $portfolioService-> getProjectList();
$images = $projects[2]-> getImages();
//test2
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>portfolio.php</title>
</head>
<body>
<div id='wrapper'>
	<div id='header'>
		<a href='index.php?pg=home'><img src='model/images/other/logos/logo_portfolio.jpg' /></a>
	</div>
		<div id='lhs_menu'>
		<ul class='lhs_menu_heading_ul'>
			<li class='lhs_menu_heading'>
				<ul id='books'>
					<a href='index.php?pg=bks&fl=abl&curr_ts=1' class='lhs_menu_subheading'><li>A Bit Lost</li></a>
					<a href='index.php?pg=bks&fl=ong&curr_ts=1' class='lhs_menu_subheading'><li>Oh No George</li></a>
					<a href='index.php?pg=app&fl=hm&curr_ts=1' class='lhs_menu_subheading'><li>Hot Monkey</li></a>
					<a href='index.php?pg=bks&fl=dwihap&curr_ts=1' class='lhs_menu_subheading'><li>Don't worry, I have a plan</li></a>
				</ul>
			</li>
			<li class='lhs_menu_heading'>
				<ul id='other_sites'>
					<a href='index.php?pg=blg' class='lhs_menu_subheading'><li>blog</li></a>
					<a href='index.php?pg=shp' class='lhs_menu_subheading'><li>shop</li></a>
					<a href='index.php?pg=rugs' class='lhs_menu_subheading'><li>rugs</li></a>
				</ul>
			</li>
			<li class='lhs_menu_heading'>
				<ul id='portfolio'>
					<a href='index.php?pg=bks&curr_ts=1' class='lhs_menu_subheading'><li>books</li></a>
					<a href='index.php?pg=ill&curr_ts=1' class='lhs_menu_subheading'><li>illustration</li></a>
					<a href='index.php?pg=ani&curr_ts=1' class='lhs_menu_subheading'><li>animation</li></a>
					<a href='index.php?pg=sk&curr_ts=1' class='lhs_menu_subheading'><li>sketches</li></a>
					<a href='index.php?pg=prj&curr_ts=1' class='lhs_menu_subheading'><li>projects</li></a>
					<a href='index.php?pg=ft&curr_ts=1' class='lhs_menu_subheading'><li>fair trade</li></a>
				</ul>
			</li>
			<li class='lhs_menu_heading'>
				<ul id='about_etc'>
					<a href='index.php?pg=abt-cont' class='lhs_menu_subheading'><li>about/contact</li></a>
					<a href='index.php?pg=prs' class='lhs_menu_subheading'><li>press</li></a>
				</ul>
			</li>
		</ul>
		<img id='social_icons' src='/model/images/other/social_icons.png' />
	</div>
	<div id="central_panel">
		<img src="<?php echo $images[0]-> getUrl();?>"> <!--  make dynamic based on thumbnail selection -->
	</div>
	<div id="rhs_panel">
		<div id="thumb_wrapper"> <!--  make dynamic based on thumbnails returned -->
			<a href="index.php?pg=ill&amp;proj=131&amp;th=181&amp;img=219&amp;curr_ts=1">
				<img class="rhs_thumb" src="model/images/art/=thumb/181.jpg"></a>
			<a href="index.php?pg=ill&amp;proj=130&amp;th=180&amp;img=218&amp;curr_ts=1">
				<img class="rhs_thumb" src="model/images/art/=thumb/180.jpg"></a>
		</div>
		<div id="prev_next">
			<a id="prev_ts" href="index.php?pg=ill&amp;proj=131&amp;th=181&amp;img=219&amp;curr_ts=1">
				<img class="arrow" src="model/images/other/prev.jpg">
			</a>
			<a id="next_ts" href="index.php?pg=ill&amp;proj=131&amp;th=181&amp;img=219&amp;curr_ts=3">
				<img class="arrow" src="model/images/other/next.jpg">
			</a>
		</div>
		<div id="image_info_wrapper">
			<p class="dashed_line">- - - - - - - - - - - - -</p>
			<div id="info"><h4>info:</h4><p></p><p></p><p></p>
			</div>
			<div id="links"></div>
			<div id="more_images"></div>
		</div>
	</div>
</body>
</html>