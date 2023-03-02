<?php
include_once 'config/Database.php';
include_once 'class/Task.php';
$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
if(!empty($_POST['todo']) && $_POST['todo'] && $_POST['action'] == 'add') {	
	$task->task = $_POST['todo'];	
	$task->insert();	
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateTask') {	
	$task->id = $_POST['id'];
	$task->val = $_POST['val'];	
	$task->update();	
}
?>