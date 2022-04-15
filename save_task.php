<?php

require_once('db.php');
if(empty($_POST['title']) || empty($_POST['description'])){
    header('location: index.php');
    exit();
}

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO task(title, description_task) VALUES( '$title', '$description')";
    $result = mysqli_query($con, $query);
    if(!$result){
        die('Consulta falhou!');

    }else{

        $_SESSION['message'] = 'Task save successfull';
        $_SESSION['message_type'] = 'success';
        header('location: index.php');
    }
}