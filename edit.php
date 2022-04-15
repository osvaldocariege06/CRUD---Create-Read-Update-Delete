<?php

require_once('db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description_task'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "UPDATE task set title ='$title', description_task = '$description' WHERE id = '$id'";
    $resulte = mysqli_query($con, $query);

    $_SESSION['message'] = "Task Updated Successufully";
    $_SESSION['message_type'] = "warning";
    header('location: index.php');
    
}

?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fontAwesome/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">PHP MYSQL CRUD</a>
        </div>
    </nav>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
               
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php  echo $title;?>" class="form-control" placeholder="Update Title" id="">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update Description">
                            <?php echo $description; ?>
                            </textarea>
                        </div>
                        <input type="submit" value="Update" name="update" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>

            <script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>