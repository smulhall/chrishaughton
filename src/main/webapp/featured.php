
<?php 
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$pg = $_GET['pg'];
$fp = $_GET['fp'];
$currCategoryId = $_GET['c'];
$currProjId = $_GET['p'];
$currImageId = $_GET['i'];


//echo "c = $currCategoryId // p = $currProjId // i = $currImageId";

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();


if(isset($currCategoryId)){
	$category = $portfolioService-> getCategory($currCategoryId);
}else{
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


$c = 0;
foreach($images as $imgR){
	$imgRefId = $imgR-> getId();
	if($imgRefId == $currImageId){
		$imgRef = $c;
	}
	$c++;
}


$links_text = $image-> getLinks(); //Links Url
$links_url = $image-> getLinksText(); //Links Display text


//thumbnails pagination calcs
$total_no_of_thumbnails = count($images);
$no_of_thumbnails_per_set = 15; //set no of thumbnails per page
$no_of_th_sets = ceil($total_no_of_thumbnails / $no_of_thumbnails_per_set);
$current_th_set = $_GET['ts']; //if set
$current_ts_upr_limit = $current_th_set * $no_of_thumbnails_per_set;
$current_ts_lwr_limit = $current_ts_upr_limit - $no_of_thumbnails_per_set;

?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' src='/js/nav_menu.js'></script>
<title><?php $category-> getTitle(); ?></title>
</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<?php include 'includes/header.php'; ?>
	
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include 'includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
	<div id='central_panel' class='central_panel_text_pages'>
	<div id='featured_central_panel_inner'>
		
			<?php 
			$movieUrl = $image-> getMovieUrl();
			if($movieUrl != null){ ?>
				<p class='wait_for_video'>Please wait for the movie file to load...</p>
				
				<div id='video_iframe_div'>
					<iframe src="http://player.vimeo.com/video/<?php echo $image-> getMovieUrl(); ?>?autoplay=true" width="500" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<?php }else{ ?>
					<img src="<?php echo $image-> getUrl();?>" />
				<?php }	 
				?>
				
		
		<div class='text_pages_content'>
			
			<div id='horiz_links_div' class='featured'>
				<ul class='horiz_menu_ul'>
				<?php 
				foreach($projects as $project_loop){
				?>
					<a href='/featured.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $project_loop-> getId(); ?>&ts=1' class='horiz_menu_a'><li class='horiz_link menu_link'><?php echo $project_loop-> getTitle(); ?></li></a>
				<?php 
				}
				?>
				</ul>
			</div>
			
			
			<div class='text_pages_content_content'>
				<?php 
				echo $project-> getText();
				?>
				
				<div class="prev_next_img_btns">
					<?php 
					
					$ProjImgTotal = count($images);
					if($imgRef > 0 && $imgRef < $ProjImgTotal){
						if($imgRef <= 0){
							$imgRefNew = $imgRef;
						}else{
							$imgRefNew = $imgRef - 1;
						}
						
					?>
						<a id="prev_img_btn" href="/featured.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $currProjId;?>&i=<?php echo $images[$imgRefNew]-> getId(); ?>&ir=<?php echo $imgRefNew; ?>&ts=<?php echo $current_th_set;?>">Previous Image</a>
					<?php 
					}
					$upprLimit = $ProjImgTotal - 1;
					if($imgRef < $upprLimit){
						if($imgRef >= $upprLimit){
							$imgRefNew = $imgRef;
						}else{
							$imgRefNew = $imgRef + 1;
						}
					?>
						<a id="next_img_btn" href="/featured.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $currProjId;?>&i=<?php echo $images[$imgRefNew]-> getId(); ?>&ir=<?php echo $imgRefNew; ?>&ts=<?php echo $current_th_set;?>">Next Image</a>
					<?php 
					}
					?>
				</div>
			</div>
		</div>
				
	</div> <!--  close featured_central_panel_inner -->
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
								<a href='/featured.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $currProjId; ?>&i=<?php echo $img-> getId(); ?>&ir=<?php echo $imgRef; ?>&ts=<?php echo $current_th_set; ?>'><img class="rhs_thumb" src="<?php echo $img-> getThumbUrl();?>" /></a>
								<?php
							} 
							$c++;
						}
					} 
				?>
		</div>
		
		

		
		
		<div id="prev_next">
			<?php 
			if($current_th_set > 1){
				$new_th_set = $current_th_set - 1;
				?>
				<!-- <a id="prev_ts" href="/category.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $currProjId;?>&i=<?php echo $currImageId; ?>&ts=<?php echo $new_th_set;?>"><img class="arrow" src="/images/prev.jpg" /></a> -->
			<?php 
			}
			?>
			<?php 
			if($current_th_set < $no_of_th_sets){
				$new_th_set = $current_th_set + 1;
			?>
				<!-- <a id="next_ts" href="/category.php?c=<?php echo $currCategoryId; ?>&p=<?php echo $currProjId;?>&i=<?php echo $currImageId; ?>&ts=<?php echo $new_th_set;?>"><img class="arrow" src="/images/next.jpg"></a> -->
			<?php 
			}
			?>
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


