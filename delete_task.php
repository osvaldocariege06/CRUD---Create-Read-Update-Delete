<?php

require_once('db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($con, $query);
    if(!$result){
        die('Consulta falhou!');
    }else{
        $_SESSION['message'] = "Task Removed successufully";
        $_SESSION['message_type'] = "danger";
        header('location: index.php');

    }
}