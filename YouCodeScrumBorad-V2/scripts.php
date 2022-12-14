<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    //if(isset($_POST['update']))      updateTask();
    //if(isset($_POST['delete']))      deleteTask();
    
    getTasks();
    function getTasks()
    {
        //CODE HERE
        //SQL SELECT   
        $requet = "SELECT tasks.id, tasks.task_title, statuses.name as task_status, 
        types.name as task_type, priorities.name as task_priority,  tasks.task_date,
        tasks.task_description
        FROM `tasks`
        INNER JOIN types on  tasks.type_id = types.id
        INNER JOIN priorities on  tasks.priority_id = priorities.id
        INNER JOIN statuses on  tasks.status_id = statuses.id";

        $resultat = mysqli_query($GLOBALS['connection'],$requet);
        $GLOBALS['userStories'] = array();  //declaration a global array

        while($task = mysqli_fetch_assoc($resultat)){
            $GLOBALS['userStories'][] = $task;
        }
       

        echo "Fetch all tasks";
    }

    function saveTask() 
    {
        //CODE HERE 
        $task_title       = $_POST['task_title'];
        $task_type        = $_POST['task_type'];
        $task_priority    = $_POST['task_priority'];
        $task_status      = $_POST['task_status'];
        $task_date        = $_POST['task_date'];
        $task_description = $_POST['task_description'];
        //SQL INSERT

        $req = "INSERT INTO tasks ( task_title, type_id, priority_id, status_id , task_date, task_description)
        VALUES(  '$task_title', '$task_type', '$task_priority', '$task_status', '$task_date', '$task_description')";
        
        $data = mysqli_query($GLOBALS['connection'],$req);

        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
 
        mysqli_close($GLOBALS['connection']);  
    }

    function task_count($id) {
        $req = "SELECT count(id) as numberOf FROM tasks WHERE status_id = $id";
        $res = mysqli_query($GLOBALS['connection'], $req);
        $data=mysqli_fetch_assoc($res);
        echo $data['numberOf'];
    }
?>