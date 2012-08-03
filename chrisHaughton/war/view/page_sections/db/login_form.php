<?php 
include_once 'DB.php';
function redirect($loc){
	echo "<script>window.location.href='".$loc."'</script>";
}
?>

<div id='central_panel'>

<?php 

if(isset($_POST['submitted1'])){
	$username = $_POST['username'];
	$pw_entered = $_POST['pword'];
	$user_info = $this->model->get_user_info_from_username($username);
	$selected_user_id = $user_info['user_id'];
	$db_pw = $user_info['password'];
	$selected_user_type = $user_info['user_type'];
	$info_to_pass = array("username" => "$username", "user_id" => "$selected_user_id", "user_type" => "$selected_user_type", "session_id" => "$session_id");
	
	if($pw_entered == $db_pw){
		$action = 'login';
		$this->model->set_logged_in_value($info_to_pass, $action); // log new user in
		redirect('index.php?pg=login'); //redirect
	}else{
		echo "<p class='error'>incorrect username/password combination. Try Again</p>";
	}
}
else{
	if($current_user_type == 'admin'){
		//feedback to user
		echo "<div class='padding-botom-20px'>";
			echo "You are currently logged in as <span class='emphasis'>$current_username</span><br />";
			echo "<a href='index.php?pg=crproj'>Create Project</a>";
			echo "<br />";
			echo "<a href='index.php?pg=uplimg'>Upload Image</a>";
		echo "</div>";
	}
?>
<form action='' method='post'>
	username:<input type="text" name="username" />
	password:<input type="password" name="pword" />
	<input type='hidden' name='submitted1' value='true' />
	<input type="submit" value='login' />
</form>
<?php 
}
?>
</div>