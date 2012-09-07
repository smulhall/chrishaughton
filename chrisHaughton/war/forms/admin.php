<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;
$portfolioService = PortfolioServiceFactory::getPortfolioService();

$cat = $_POST['category'];
$proj = $_POST['project'];

if(isset($_POST['prev_category'])){
	$prev_cat = $_POST['prev_category'];
}
if(isset($_POST['prev_project'])){
	$prev_proj = $_POST['prev_project'];
}

echo "cat = $cat // prev_cat = $prev_cat<br />";
echo "proj = $proj // prev_proj = $prev_proj<br />";




$categories = $portfolioService-> getCategoryList();

if(isset($cat)){
	$category = $portfolioService-> getCategory($cat);
} else{
	$category = $categories[0];
}

$projects = $category-> getProjects();

/*
foreach($projects as $project_loop_id){
	$temp_id = $project_loop_id-> getId();
	echo "temp_id = $temp_id<br />";
}
*/

if(isset($proj)){
	$project = $portfolioService-> getProject($proj);
} else {
	$project = $projects[0];
}

$images = $project-> getImages();



?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>admin</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<script type="text/javascript">
function submitForm(name, form, value){
	form.submit();
}

$(document).ready(function() {

	   $(".delete_info_line1").click(function(){
			alert("Delete this row");
		   });

	   //add_link
	   //add_info_line
	   //delete_info_line1
	   //delete_link1
	   
});
	 



</script>




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
	
	<div id='central_panel' class='admin_central_panel'>
	
		<h4>Select a Category and Project to display all images contained in that project:</h4>
		
		
		<form action='' method='post'>
		<input type='hidden' name='prev_category' value='<?php echo $cat; ?>' />
		<input type='hidden' name='prev_project' value='<?php echo $proj; ?>' />
		
		<table class='admin_table1 input_table'>
		
		<tr>
		<td>Category:</td>
		<td><select name='category' onChange='submitForm(this.name, this.form, this.value);'>
		<?php 
			foreach ($categories as $category_loop) {
				?><option name='<?php echo $category_loop-> getTitle();?>' value='<?php echo $category_loop-> getId();?>' <?php if($category_loop-> getId() == $cat){ echo "selected='selected' "; } ?>><?php echo $category_loop-> getTitle();?></option>
				<?php
			}
		?>
		</select></td>
		<td><?php echo $category-> getTitle(); ?></td>
		<!-- <td><a href='/forms/edit.php?type=category&Id=<?php echo $category-> getId(); ?>'>Edit</a></td>
		<td><a href='/forms/delete.php?type=category&Id=<?php echo $category-> getId(); ?>'>Delete</a></td>
		<td><a href='/forms/create_category.php'>Create new category</a></td> -->
		<td><a href='/forms/create_proj.php?type=category&Id=<?php echo $category-> getId(); ?>'>Add project</a></td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		</tr>
		
		</form>
		
		
		
		<form action='' method='post'>
		<input type='hidden' name='prev_project' value='<?php echo $proj; ?>' />
		<input type='hidden' name='prev_category' value='<?php echo $cat; ?>' />
		<input type='hidden' name='category' value='<?php echo $cat; ?>' />
		
		
		
		<tr>
		<td>Project:</td>
		<td><select name='project' onChange='submitForm(this.name, this.form, this.value);'>
		<?php 
			foreach ($projects as $project_loop) { ?>
				if($project_loop-> getId() == $proj){ 
					
				}
				<option value='<?php echo $project_loop-> getId();?>' <?php if($project_loop-> getId() == $proj){ echo "selected='selected' "; } ?>><?php echo $project_loop-> getTitle();?></option>
			<?php
			}
		?>
		</select></td>
		<?php if($projects[0] != null){ ?>
			<td><?php echo $project-> getTitle(); ?></td>
			<td><a href='/forms/edit.php?type=project&Id=<?php echo $project-> getId(); ?>'>Edit</a></td>
			<td><a href='/forms/delete.php?type=project&Id=<?php echo $project-> getId(); ?>'>Delete</a></td>
			<td><a href='/forms/create_proj.php'>Create new project</a></td>
			<td><a href='/forms/upload_image.php?proj=<?php echo $project-> getId(); ?>'>Add image</a></td>
			<td><a href='/forms/upload_video.php?proj=<?php echo $project-> getId(); ?>'>Add video</a></td>
		<?php }else{ ?>
			<td>no projects</td>
		<?php } ?>
		</tr>
		
		</table>
		</form>
		

		<?php if($projects[0] != null){	
			foreach($images as $image){
				echo "<p>===================================================================================================================</p>";
			?>
				
	
				<table class='images_table'>
				<tr><td><a href='/views/category.php?c=<?php echo $category-> getId(); ?>&p=<?php echo $project-> getId(); ?>&i=<?php echo $image-> getId(); ?>'><img src='<?php echo $image-> getUrl(); ?>' /></a></td>
		
				<td><a href='/views/category.php?c=<?php echo $category-> getId(); ?>&p=<?php echo $project-> getId(); ?>&i=<?php echo $image-> getId(); ?>'><img src='<?php echo $image-> getThumbUrl(); ?>' /></a></td></tr>
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
				<?php } ?>
				
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






		
