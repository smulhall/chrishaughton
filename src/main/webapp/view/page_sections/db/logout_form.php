<?php 
include_once 'DB.php';
function redirect($loc){
	echo "<script>window.location.href='".$loc."'</script>";
}
?>

<div id='central_panel'>

<?php 

if(isset($_POST['submitted1'])){
	//reset default user values
	$action = 'logout';
	$info_to_pass = array('username' => $current_username);
	$this->model->set_logged_in_value($info_to_pass, $action);
	redirect('index.php');
}
else{
	if($current_user_type == 'admin'){
		//feedback to user
		echo "<div class='padding-botom-20px'>";
		echo "You are currently logged in as <span class='emphasis'>$current_username</span><br />";
		echo "</div>";
	}
?>
<form action='' method='post'>
	<input type='hidden' name='submitted1' value='true' />
	<input type="submit" value='logout' />
</form>
<?php 
}
?>
</div>