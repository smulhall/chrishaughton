<?php
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;

$portfolioService = PortfolioServiceFactory::getPortfolioService();
$categories = $portfolioService-> getCategoryList();
print_r($categories);
echo "<br />";
$projects = $categories[0]-> getProjects();
print_r($projects);
echo "<br />";
$images = $projects[0]-> getImages();
print_r($images);
echo "<br />";
$info = $images[0]-> getInfo();
print_r($info);
echo "<br />";
$links = $images[0]-> getLinks();
print_r($links);
echo "<br />";

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
		<table class='input_table'>
		
		<tr>
		<td>Category:</td>
		<td><select name='category'>
		<?php 
			foreach ($categories as $category) {
				?><option value='<?php echo $category-> getId();?>'><?php echo $category-> getTitle();?></option>
				<?php
			}
		?>
		</select></td>
		<td><a href='/views/forms/process_files/edit.php?type=category&Id=<?php echo $category-> getId(); ?>'>Edit Category</a></td>
		<td><a href='#'>Create a new Category</a></td>
		</tr>

		
		<tr>
		<td>Project:</td>
		<td><select name='project'>
		<?php 
			foreach ($projects as $project) {
				?><option value='<?php echo $project-> getId();?>'><?php echo $project-> getTitle();?></option>
				<?php
			}
		?>
		</select></td>
		<td><a href='/views/forms/process_files/edit.php?type=project&Id=<?php echo project-> getId(); ?>'>Edit Project</a></td>
		<td><a href='#'>Create a new Project</a></td>
		</tr>
		
		<?php 
		foreach($images as $image){?>
			<tr><td><a href='/views/forms/process_files/edit.php?type=image&Id=<?php echo $image-> getId(); ?>'>Edit this Image/Thumbnail and/or associated info</a></td></tr>
			
			<tr>
				<td><img src='<?php echo $image-> getUrl(); ?>' /></td>
			</tr>
			
			<tr>
				<td><img src='<?php echo $image-> getThumbUrl(); ?>' /></td>
			</tr>
			
			<?php 
			$c=0;
			foreach ($info as $info_line) {?>
				<tr>
					<td>Text (line <?php echo $c; ?>):</td>
					<td><?php echo $info_line ?></td>
				</tr>
			<?php 
			$c++
			} 
			?>
			
			
			<?php 
			$c=0;
			foreach ($links as $key => $value) {?>
				<tr>
					<td>Link <?php echo $c; ?>:</td>
					<td><?php echo $key ?></td>
					<td><?php echo $value ?></td>
				</tr>
			<?php 
			$c++
			} 
			?>
			
		<?php 
		} //close image foreach loop
		?>
		
		
		<tr>
		<td></td>
		<td><input type='submit' /></td>
		</tr>
				
		</table>
		</form>
	
	</div> <!--  close central_panel -->

		<!-- ======================== RHS Panel ========================== -->
	<div id="rhs_panel">
	</div>
	
</div>
</body>
</html>



		
