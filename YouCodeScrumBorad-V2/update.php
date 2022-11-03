<?php
   //INCLUDE DATABASE FILE
   include('database.php');
?>

<?php
$id = $_GET['id'];

$sql="SELECT tasks.id, tasks.task_title, statuses.name as task_status, 
types.name as task_type, priorities.name as task_priority,  tasks.task_date,
tasks.task_description
FROM `tasks`
INNER JOIN types on  tasks.type_id = types.id
INNER JOIN priorities on  tasks.priority_id = priorities.id
INNER JOIN statuses on  tasks.status_id = statuses.id  WHERE tasks.id = $id";  
$result = mysqli_query($GLOBALS['connection'] ,$sql);
$ligne = mysqli_fetch_assoc($result);

	$task_title 	  = $ligne['task_title'];
	$task_type		  = (int)$ligne['task_type'];
	$task_priority	  = (int)$ligne['task_priority'];
	$task_status	  = (int)$ligne['task_status'];
	$task_date 		  = $ligne['task_date'];
	$task_description = $ligne['task_description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<!-- ================== BEGIN core-css ================== -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body>  

		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" id="form-task">
					<div class="modal-header">
						<h5 class="modal-title">Add Task</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="task-id">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input  type="text" class="form-control" name="task_title" id="task-title" value="<?php echo $ligne['task_title']; ?>" />
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" name="task_type" type="radio" value="1" id="task-type-feature"/>
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="task_type" type="radio" value="2"  id="task-type-bug"/>
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select class="form-select"   name="task_priority" id="task-priority" >
									<option value="">Please select</option>
									<option value="1">Low</option>
									<option value="2">Medium</option>
									<option value="3">High</option>
									<option value="4">Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-select" name="task_status" id="task-status">
									<option value="">Please select</option>
									<option value="1">To Do</option>
									<option value="2">In Progress</option>
									<option value="3">Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="datetime-local" class="form-control" name="task_date" id="task-date" value=	"<?php echo $task_date; ?>"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="10" name="task_description" id="task-description"> <?php echo $task_description;?></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button  type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
						<button  type="submit" name="delete" class="btn btn-danger task-action-btn"  id="task-delete-btn">Delete</button>
					</div>
				</form>
			</div>
		</div>
<!-- ============================ UPDATE ================================= -->
	<?php
		//CODE HERE	
		$id = $_GET['id'];
		if(isset($_POST['update'])) {
			$task_title       = $_POST['task_title'];
			$task_type        = (int)$_POST['task_type'];
			$task_priority    = (int)$_POST['task_priority'];
			$task_status      = (int)$_POST['task_status'];
			$task_date        = $_POST['task_date'];
			$task_description = $_POST['task_description'];
			//SQL UPDATE
			$sql = "UPDATE tasks SET task_title='$task_title', type_id=$task_type,
			priority_id=$task_priority, status_id=$task_status, task_date='$task_date',
			task_description='$task_description' WHERE id = $id";

			$data = mysqli_query($GLOBALS['connection'] ,$sql);

			if (!$data) {
				echo "Error updating record: " . mysqli_error($GLOBALS['connection']);
			}

			$_SESSION['message'] = "Task has been updated successfully !";
			header('location: index.php');
		}
	?>   

<!-- =================================== DELETE ============================================ -->

    <?php
        if(isset($_POST['delete'])) { 
            //CODE HERE
            $id = (int)$_GET['id']; //casting int because all the variables that get in url is string
            
			//SQL DELETE
            $sql = "DELETE  FROM tasks WHERE id=$id";
            $query = mysqli_query($GLOBALS['connection'] ,$sql);

            $_SESSION['message'] = "Task has been deleted successfully !";
            header('location: index.php');
        }
    ?> 	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script src="scripts.js"></script>
	<script>
		//reloadTasks();
		<?php 
			if($task_type == "Feature"){
				?>
				document.getElementById('task-type-feature').checked=true;
			<?php }else{?>
				document.getElementById('task-type-bug').checked=true;
		<?php }?>

			document.getElementById("task-priority").value =" <?=$ligne['task_priority']?>";
		
	</script> 	

</body>
</html>