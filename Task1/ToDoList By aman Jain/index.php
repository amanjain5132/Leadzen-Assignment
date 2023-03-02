<?php
include_once 'config/Database.php';
include_once 'class/Task.php';
$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
include('inc/header.php');
?>
<title> To-do Application </title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/todo.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php'); ?>
<div class="container">	
	<div class="row">	
		<h2>To-do Application with PHP & MySQL</h2>		
		
		<div class="col-md-6">
            <div class="todolist not-done">
            
			<h1>To-Do</h1>
			
                <form id="todoForm" name="todoForm" method="post">
					<input type="text" id="todo" name="todo" class="form-control add-todo" placeholder="Add todo">
					<input type="hidden" name="action" id="action" value="add" /><br>
					<button type="submit" id="add" name="add" class="btn btn-success saveButton">Add</button>
				</form>
				<br><br>
                <button id="checkAll" class="btn btn-success">Mark all as done</button>
                    
				<hr>
				<ul id="sortable" class="list-unstyled">
				
				<?php
				$result = $task->getTodo(0);
				while ($todo = $result->fetch_assoc()) {			
				?>
					<li class="ui-state-default">
					<div class="checkbox">
					<label>
					<input type="checkbox" value="<?php echo $todo['id']; ?>" /><?php echo $todo['task']; ?></label>
					</div>
					</li>
				<?php } ?>
				
				</ul>
                <div class="todo-footer">
                    <strong><span class="count-todos"></span></strong> Items Left
                </div>
            </div>
        </div>
		
        <div class="col-md-6">
            <div class="todolist">
            <h1>Already Done</h1>
                <ul id="done-items" class="list-unstyled">
                    <?php
					$result = $task->getTodo(1);
					while ($todo = $result->fetch_assoc()) {			
					?>
						<li><?php echo $todo['task']; ?><button class="remove-item btn btn-default btn-xs pull-right" data-id="<?php echo $todo['id']; ?>"><span class="glyphicon glyphicon-remove"></span></button></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
		
	</div>

	<div id="taskHTML" class="hidden">
		<li class="ui-state-default">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="TO_DO_ID" />TASK_NAME
				</label>
			</div>
		</li>
	</div>
</div>
<?php include("inc/footer.php"); ?>