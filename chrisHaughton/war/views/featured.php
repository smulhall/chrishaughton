
<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$pg = $_GET['pg'];
$fp = $_GET['fp'];
$currCategoryId = $_GET['c'];
$currProjId = $_GET['p'];
$currImageId = $_GET['i'];
//echo "c = $currCategoryId // p = $currProjId // i = $currImageId";

$portfolioService = PortfolioServiceFactory::getPortfolioService();

if(isset($currCategoryId)){
	$category = $portfolioService-> getCategory($currCategoryId);
}else{
	$categories = $portfolioService-> getCategoryList();
	$category = $categories[0];
	$currCategoryId = $category-> getId();
}
$projects = $category-> getProjects();

//$projects = $portfolioService-> getProjectList(); //numerical array of all projects
if(isset($currProjId)){
	$project = $portfolioService-> getProject($currProjId); //object of singular project containing all images
}else{
	$project = $projects[0];
	$currProjId = $project-> getId();
}
$images = $project-> getImages(); //numerical array of all images in this single project
if(isset($currImageId)){
	$image = $project-> getImageById($currImageId); //particular image user has clicked
} else {
	$images = $project-> getImages();
	$image = $images[0];
	$currImageId = $image-> getId();
}

$links_text = $image-> getLinks(); //Links Url
$links_url = $image-> getLinksText(); //Links Display text

?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' src='/js/nav_menu.js'></script>
<title>about/contact</title>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<div id='header'>
		<a href='index.php?pg=home'><img src='/images/logo.jpg' /></a>
	</div>
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include '../views/includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel' class='central_panel_text_pages'>
		
		<?php
		if($fp == 'abl'){ 
			include('includes/featured/abl.php');
		}
		elseif($fp == 'ong'){ 
			include('includes/featured/ong.php');
		}
		elseif($fp == 'hm'){ 
			include('includes/featured/hm.php');
		}
		elseif($fp == 'dwihap'){ 
			include('includes/featured/dwihap.php');
		}
				
		?>
				
	
	</div> <!--  close central_panel -->

<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
		
		<div id="thumb_wrapper"> 
				<?php
					$no_of_elements = count($images);
					
					if($no_of_elements > 1){ //test to see if there are more images in this project
						$c=0;
						foreach($images as $img){
							if($c >= 1){
								?>
								<a href='/views/featured.php?fp=<?php echo $fp; ?>&pg=<?php echo $pg; ?>&c=4002&p=12001&i=<?php echo $img-> getId(); ?>'><img class="rhs_thumb" src="<?php echo $img-> getThumbUrl();?>" /></a> 	
								<?php
							} 
							$c++;
						}
					} 
				?>
		</div>
		
		<div id="prev_next">
			<a id="prev_ts" href="#">
				<img class="arrow" src="/images/prev.jpg">
			</a>
			<a id="next_ts" href="#">
				<img class="arrow" src="/images/next.jpg">
			</a>
		</div>
		
		
		
		<div id="image_info_wrapper">
			
			<p class="dashed_line">- - - - - - - - - - - - -</p>
			
			
			<div id="info">
				<?php $info = $image-> getInfo();
				foreach($info as $info1){
					if($info1 != null){
					?>
					<p><?php echo $info1?></p>
				<?php
					}
				}
				?>
			</div>
			
			
			<div id="links">
				<?php 
				$links_text = $image-> getLinksText(); //Links Url
				$links_url = $image-> getLinks(); //Links Display text
				$no_of_links_text = count($links_text);
				$upper_limit = $no_of_links_text;
				$no_of_links_url = count($links_url);
				if($no_of_links_url > $upper_limit){
					$upper_limit = $no_of_links_url;
				}
				//echo "no_of_links_text = $no_of_links_text <br />";
				//echo "no_of_links_url = $no_of_links_url <br />";
				for($i=0; $i<$upper_limit; $i++){ 
					if($links_url[$i] != null || $links_text[$i] != null){
				?>
					<a id='first_link' target='_blank' href='<?php echo $links_url[$i]; ?>'><?php echo $links_text[$i]; ?></a><br />
				<?php 
					}
				} 
				?>

				
				
					
			</div>
			
	
				

			

		</div><!-- close RHS panel -->
	
</div>
</body>
</html>


