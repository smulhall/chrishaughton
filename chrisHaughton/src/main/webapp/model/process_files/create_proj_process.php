<?php
include_once("model/Model.php");

$project_details['project_name'] = $_POST['project_name'];
$project_details['project_category'] = $_POST['project_category'];

//function to create project
$this->model->create_proj($project_details);


//redirect to image upload page
header("Location: index.php?pg=uplimg");
?>