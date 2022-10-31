<?php
   //INCLUDE DATABASE FILE
   include('database.php');
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
				<form action="scripts.php" method="POST" id="form-task">
					<div class="modal-header">
						<h5 class="modal-title">Add Task</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="task-id">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input  type="text" class="form-control" name="task_title" id="task-title" />
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" name="task_type" type="radio" value="Feature" id="task-type-feature"/>
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="task_type" type="radio" value="Bug" id="task-type-bug"/>
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select class="form-select"   name="" id="task-priority">
									<option value="">Please select</option>
									<option value="Low">Low</option>
									<option value="Medium">Medium</option>
									<option value="High">High</option>
									<option value="Critical">Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-select" name="task_status" id="task-status">
									<option value="">Please select</option>
									<option value="To Do">To Do</option>
									<option value="In Progress">In Progress</option>
									<option value="Done">Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="datetime-local" class="form-control" name="task_date" id="task-date"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="10" name="task_description" id="task-description"></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button  type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
					</div>
				</form>
			</div>
		</div>

<?php
//CODE HERE	
   $id = $_GET['id'];    
    if(isset($_POST['update'])) {

        $task_title       = $_POST['task_title'];
        $task_type        = $_POST['task_type'];
        $task_priority    = $_POST['task_priority'];
        $task_status      = $_POST['task_status'];
        $task_date        = $_POST['task_date'];
        $task_description = $_POST['task_description'];
        //SQL UPDATE
        $sql = "UPDATE tasks SET id='[value-1]',task_title='[value-2]',task_type='[value-3]',
        task_priority='[value-4]',task_status='[value-5]',task_date='[value-6]',
        task_description='[value-7]' WHERE id = $id";

        $data = mysqli_query($GLOBALS['connection'] ,$sql);

        $_SESSION['message'] = "Task has been updated successfully !";
        header('location: index.php');
    }
?>    

</body>
</html>