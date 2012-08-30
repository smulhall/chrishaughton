<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;
$portfolioService = PortfolioServiceFactory::getPortfolioService();

$cat = $_POST['category'];
echo "cat = $cat <br />";
$proj = $_POST['project'];
echo "proj = $proj <br />";



$categories = $portfolioService-> getCategoryList();

if(isset($cat)){
	$category = $portfolioService-> getCategory($cat);
} else{
	$category = $categories[0];
}

$projects = $category-> getProjects();

if(isset($proj)){
	$project = $portfolioService-> getProject($proj);
} else {
	$project = $projects[0];
}
if(isset($img)){
	$images = $project-> getImages();
} else {
	$images = $project-> getImages();
}
print_r($images);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/chrishaughton.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>portfolio.php</title>

<script type="text/javascript">
function submitForm(name, form, value){
	form.submit();
}
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
	
	<div id='central_panel'>
	
		<h4>Select a Category and Project to display all images contained in that project:</h4>
		
		
		<form action='' method='post'>
		<table class='admin_table1 input_table'>
		
		<tr>
		<td>Category:</td>
		<td><select name='category' onChange='submitForm(this.name, this.form, this.value);'>
		<?php 
			foreach ($categories as $category) {
				?><option value='<?php echo $category-> getId();?>' <?php if($category-> getId() == $cat){ echo "selected='selected' "; } ?>><?php echo $category-> getTitle();?></option>
				<?php
			}
		?>
		</select></td>
		<td><a href='/forms/edit.php?type=category&Id=<?php echo $category-> getId(); ?>'>Edit</a></td>
		<td><a href='#'>Delete</a></td>
		<td><a href='#'>Create New</a></td>
		<td><a href='#'>Add a new project to this category</a></td>
		</tr>

		
		<tr>
		<td>Project:</td>
		<td><select name='project' onChange='submitForm(this.name, this.form, this.value);'>
		<?php 
			foreach ($projects as $project) {
				?><option value='<?php echo $project-> getId();?>' <?php if($project-> getId() == $proj){ echo "selected='selected' "; } ?>><?php echo $project-> getTitle();?></option>
				<?php
			}
		?>
		</select></td>
		<td><a href='/forms/edit.php?type=project&Id=<?php echo $project-> getId(); ?>'>Edit</a></td>
		<td><a href='#'>Delete</a></td>
		<td><a href='#'>Create New</a></td>
		<td><a href='#'>Add a new image to this project</a></td>
		</tr>
		
		</table>
		</form>
		

		
		<?php 	
		foreach($images as $image){
		
		?>
			
			<p>===================================================================================================================</p>
			
			
			<table class='images_table'>
			<tr><td><img src='<?php echo $image-> getUrl(); ?>' /></td>
			<!-- 
			<a href='/forms/edit.php?type=image&Id=<?php echo $image-> getId(); ?>&'>Edit</a>
			<a href='#'>Delete</a>
			-->
			
			<td><img src='<?php echo $image-> getThumbUrl(); ?>' /></td></tr>
			<!--
			<a href='/forms/edit.php?type=thumb&Id=<?php echo $image-> getId(); ?>'>Edit</a>
			<a href='#'>Delete</a>
			-->
			</table>
				


		
		
		<form action='/update' enctype='multipart/form-data' method='post'>
		<input type='hidden' name='project_id' value='' />
		<table class='input_table'>
			<tr><td>Replace Main Image File:</td><td> <input type='file' name='main' /></td></tr>
			<tr><td>Replace Thumbnail File:</td><td> <input type='file' name='thumb' /></td></tr>
			
			<?php 
			$c=1;
			foreach ($image-> getInfo() as $info_line) {
			?>
				<tr>
					<td>Text to Display (line <?php echo $c; ?>):</td>
					<td><input  name ='display_text_line1' value='<?php echo $info_line ?>' type='text' /></td>
				</tr>
				
			<?php 
			$c++
			} 
			?>
			
			
			
			<?php 
			$i=0;
			foreach ($image-> getLinks() as $key => $value) {?>
					
					<?php
					$modulus = $i%2; 
					if($modulus == 0){ ?>
						<tr>
						<td><input  name ='link1_displayText' type='text' value='<?php echo $value ?>' /></td>
						
					<?php
					} 
					if($modulus != 0){ ?>
						<td><input  name ='link1_displayText' type='text' value='<?php echo $value ?>' /></td>
						</tr>
						
					<?php
					}
					?>
			<?php 
				$i++;
			} 
			?>
			
			
		
			<tr><td></td><td><input type='submit' value='save' /></td></tr>
		
		</table>
		<input type='hidden' name='MAX_FILE_SIZE' value='524288'>
		<input type='hidden' name='category' value='' />	
		<input type='hidden' name='submitted3' value='true' />
		</form>
		
		
		
		<?php 
		}
		?>
		
		
		
		
		
		
		
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>




</body>
</html>






		
