<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;
$portfolioService = PortfolioServiceFactory::getPortfolioService();

if(isset($_GET['category'])){
	$cat = $_GET['category'];
}else{
	$cat = $_POST['category'];
}

if(isset($_GET['project'])){
	$proj = $_GET['project'];
}else{
	$proj = $_POST['project'];
}

if(isset($_POST['prev_category'])){
	$prev_cat = $_POST['prev_category'];
}
if(isset($_POST['prev_project'])){
	$prev_proj = $_POST['prev_project'];
}

//echo "cat = $cat // prev_cat = $prev_cat<br />";
//echo "proj = $proj // prev_proj = $prev_proj<br />";

$categories = $portfolioService-> getCategoryList();
//echo"<br />categories<br />";
//print_r($categories);

if(isset($cat)){
	$category = $portfolioService-> getCategory($cat);
} else{
	//$category = $categories[0];
	$flag = "false";
	foreach($categories as $category_loop){
		if($category_loop-> isFeatured() && $flag == "false"){
			$category = $category_loop;
			$flag = "true";
		}
	}
}

//echo"<br />category<br />";
//print_r($category);


$projects = $category-> getProjects();

if(isset($proj)){
	$project = $portfolioService-> getProject($proj);
} else {
	$project = $projects[0];
}

$images = $project-> getImages();
$images2 = $images;
$projectHTML = $projects[0]

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' src='/js/nav_menu.js'></script>
<title>admin</title>



<script type="text/javascript">
function submitForm(name, form, value){
	form.submit();
} 



</script>




</head>
<body>
<div id='wrapper'>
	
	<!-- ======================== Header ========================== -->
	<?php include '../includes/header.php'; ?>
	
	
	
	<!-- ======================== LHS Menu ========================== -->	
	<?php include '../includes/leftMenu.php'; ?>
	
	
	<!-- ======================== Central Panel ========================== -->	
	
		<div class='admin_central_panel'>
		
			<div id='horiz_links_div'>
				<ul class='horiz_menu_ul'>
					<a class='horiz_menu_a' href='/forms/admin.php'><li class='horiz_link menu_link'>Portfolio</li></a>
					<a class='horiz_menu_a' href='/forms/admin_featured.php'><li class='horiz_link menu_link'>Featured Links</li></a>
					
				</ul>
			</div>
			
			<h4 class='admin_title'>Select a Category and Project to display all images contained in that project:</h4>

			
			
			<form action='' method='post'>
			<input type='hidden' name='prev_category' value='<?php echo $cat; ?>' />
			<input type='hidden' name='prev_project' value='<?php echo $proj; ?>' />
			
			
			
			
			<table class='admin_table1 input_table'>
			
			<tr>
			<td>Featured:</td>
			<td><select name='category' onChange='submitForm(this.name, this.form, this.value);'>
			<?php 
				foreach($categories as $category_loop) {
					if($category_loop-> isFeatured() || $category_loop-> isLink()){
					?>
						<option name='<?php echo $category_loop-> getTitle();?>' value='<?php echo $category_loop-> getId();?>' <?php if($category_loop-> getId() == $cat){ echo "selected='selected' "; } ?>><?php echo $category_loop-> getTitle();?></option>
					<?php
					}
				}
			?>
			</select></td>
			<td><?php echo $category-> getTitle(); ?></td>
			<td><a href='/forms/edit.php?type=category&Id=<?php echo $category-> getId(); ?>'>Edit Link</a></td>
			<td><a href='/forms/delete.php?type=category&Id=<?php echo $category-> getId(); ?>'>Delete Link</a></td> 
			<td><a href='/forms/create_featured.php'>New Featured Link</a></td>
			<!-- <td><a href='/forms/create_featured_sublink.php?type=category&Id=<?php echo $category-> getId(); ?>'>Add Sub-link</a></td> -->
			<td>&nbsp</td>
			<td>&nbsp</td>
			</tr>
			
			</form>
			
			
			
			
			<form action='' method='post'>
			<input type='hidden' name='prev_project' value='<?php echo $proj; ?>' />
			<input type='hidden' name='prev_category' value='<?php echo $cat; ?>' />
			<input type='hidden' name='category' value='<?php echo $cat; ?>' />
			
			
			
			<tr>
			<td>Sub-Link:</td>
			<td><select name='project' onChange='submitForm(this.name, this.form, this.value);'>
			<?php 
				foreach ($projects as $project_loop) { ?>
					<option value='<?php echo $project_loop-> getId();?>' <?php if($project_loop-> getId() == $proj){ echo "selected='selected' "; } ?>><?php echo $project_loop-> getTitle();?></option>
				<?php
				}
			?>
			</select></td>
			<?php if($projects[0] != null){ ?>
				<td><?php echo $project-> getTitle(); ?></td>
				<td><a href='/forms/edit.php?type=project&Id=<?php echo $project-> getId(); ?>'>Edit Sub-Link</a></td>
				<td><a href='/forms/delete.php?type=project&Id=<?php echo $project-> getId(); ?>'>Delete Sub-Link</a></td>
				<td><a href='/forms/create_featured_sublink.php?type=category&Id=<?php echo $category-> getId(); ?>'>Add Sub-link</a></td>
				</tr>
				
				<tr>
				<td>Images:</td>
				<td>&nbsp</td>
				<td>&nbsp</td>
				<td>Edit below</td>
				<td>Delete below</td>
				<td><a href='/forms/upload_image.php?proj=<?php echo $project-> getId(); ?>'>Add image</a></td>
				</tr>
				
				<tr>
				<td>Videos:</td>
				<td>&nbsp</td>
				<td>&nbsp</td>
				<td>Edit below</td>
				<td>Delete below</td>
				<td><a href='/forms/upload_video.php?proj=<?php echo $project-> getId(); ?>'>Add video</a></td>
				</tr>
			<?php }else{ ?>
				<td>no projects</td>
			<?php } ?>
			</tr>
			
			</form>
			</table>
			
			<p class='image_seperator'>===================================================================================================================</p>
			
			<form action='/forms/process_files/edit_sublink_text_process.php' enctype='multipart/form-data' method='post'>
				<?php 
				if(isset($project-> getId())){
					$projectHTML = $project-> getId();
				}
				?>
				<input type='hidden' name='projectId' value='<?php echo $projectHTML; ?>' />
			
				<table class='admin_table1 input_table'>
					<tr><td>Sub-link Text:</td><td colspan='7'><textarea name='text' class='sublink_textarea'><?php echo $project-> getText(); ?></textarea></td></tr>
					<!--  <tr><td>&nbsp</td><td><a href='/forms/edit_sublink_text.php?type=project&Id=<?php echo $project-> getId(); ?>&text=<?php echo $project-> getText(); ?>'>Edit Sub-Link HTML</a></td></tr> -->
					<tr><td></td><td><input type='submit' value='Save HTML' /></td></tr>
				</table>
			
			</form>
			
	
			<?php if($projects[0] != null){	
				foreach($images as $image){
			?>
				<p class='image_seperator'>===================================================================================================================</p>
			
			<?php 
				$movieUrl = $image-> getMovieUrl();
				//echo "movieUrl = $movieUrl<br />";
				if($movieUrl != null){ 
				?>
					<h5 class='image_title'>Movie</h5>			
				<?php 
				} else{	 
				?>
					<h5 class='image_title'>Image</h5>
				<?php 
				}
				?>	
					<p class='delete_edit_link'><a href='/forms/delete.php?type=image&Id=<?php echo $image-> getId(); ?>'>Delete this image</a> or edit it below:</p>
					
					
					<table class='images_table'>
					<tr><td><a href='/category.php?c=<?php echo $category-> getId(); ?>&p=<?php echo $project-> getId(); ?>&i=<?php echo $image-> getId(); ?>'><img src='<?php echo $image-> getUrl(); ?>' /></a></td>
			
					<td><a href='/category.php?c=<?php echo $category-> getId(); ?>&p=<?php echo $project-> getId(); ?>&i=<?php echo $image-> getId(); ?>'><img src='<?php echo $image-> getThumbUrl(); ?>' /></a></td></tr>
					</table>
						
		
		
				
				
				<form action='/update' enctype='multipart/form-data' method='post'>
					
				
					<input type='hidden' name='category_id' value='<?php echo $category-> getId();?>' />
					<input type='hidden' name='project_id' value='<?php echo $project-> getId();?>' />
					<input type='hidden' name='image_id' value='<?php echo $image-> getId();?>' />
				
					
					<table class='input_table'>
					<?php 
					$movieUrl = $image-> getMovieUrl();
					//echo "movieUrl = $movieUrl<br />";
					if($movieUrl != null){ 
					?>
						<tr><td>Vimeo reference:</td><td> <input type='text' name='video' /></td><td>(e.g. 13703809)</td></tr>
						<tr><td>Replace Thumbnail File:</td><td> <input type='file' name='thumb' /></td></tr>
					<?php }else{ ?>
						<tr><td>Replace Main Image File:</td><td> <input type='file' name='main' /></td></tr>
						<tr><td>Replace Thumbnail File:</td><td> <input type='file' name='thumb' /></td></tr>
					<?php 
					}	 
					?>
				
					
					
					<?php 
					$c=1;
					foreach ($image-> getInfo() as $info_line) {
					?>
						<tr>
							<td>Text to Display (line <?php echo $c; ?>):</td>
							<td><input  name ='display_text_line<?php echo $c; ?>' value='<?php echo $info_line; ?>' type='text' /></td>
							<td><a class='delete_info_line<?php echo $c; ?>' href=''>delete</a></td>
						</tr>
						
					<?php 
						$c++;
					} 
					?>
					
					<tr><td><a class='add_info_line' href='/forms/create_text_line.php'>Add Text Line</a></td><td>&nbsp</td></tr>
					
					<?php 
					
					$links_text = $image-> getLinks(); //Links Url
					$links_url = $image-> getLinksText(); //Links Display text
					$no_of_links_text = count($links_text);
					$upper_limit = $no_of_links_text;
					$no_of_links_url = count($links_url);
					if($no_of_links_url > $upper_limit){
						$upper_limit = $no_of_links_url;
					}
					//echo "no_of_links_text = $no_of_links_text <br />";
					//echo "no_of_links_url = $no_of_links_url <br />";
					for($i=0; $i<$upper_limit; $i++){ ?>
						<tr>
							<td><input class='link_text' name ='link_text<?php echo $i; ?>' type='text' value='<?php echo $links_text[$i]; ?>' /></td>
							<td><input class='link_url' name ='link_url<?php echo $i; ?>' type='text' value='<?php echo $links_url[$i]; ?>' /></td>
							<td><a class='delete_link<?php echo $i; ?>' href='#'>delete</a></td>
						</tr>
					<?php 
					} 
					?>
					
					<tr><td><a class='add_link' href='/forms/create_link.php'>Add Link</a></td><td>&nbsp</td></tr>
					<tr><td>&nbsp</td><td><input type='submit' value='save' /></td></tr>
				
				</table>
				<input type='hidden' name='MAX_FILE_SIZE' value='524288'>
				</form>
				
				
				
				<?php 
				}
			}
	?>
		
		
		
		
		
		
		
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>




</body>
</html>






		
