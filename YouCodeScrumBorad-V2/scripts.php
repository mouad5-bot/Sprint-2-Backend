<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }


    function saveTask()
    {
        //CODE HERE 
        $Title         = $_POST['task_title'];
        $Type_id       = $_POST['task_type'];
        $Priority_id   = $_POST['task_priority'];
        $Status_id     = $_POST['task_status'];
        $task_datetime = $_POST['task_date'];            
        $Description   = $_POST['task_description'];

        //SQL INSERT
        $sql = "insert into `tasks` (Title, Type_id, Priority_id, Status_id, task_datetime, Description)
               value('$task_title', $task_type', $task_priority', $task_status', $task_date', $task_description')";
        
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>