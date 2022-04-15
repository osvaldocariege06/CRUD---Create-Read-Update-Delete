<?php require_once('db.php') ?>

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
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?>" role="alert">
                        <strong><?php echo $_SESSION['message'] ?></strong>
                    </div>
                <?php
                    session_unset();
                endif
                ?>
                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" id="">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                        </div>
                        <input type="submit" value="Save task" name="save_task" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Create At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result_tasks)) {?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description_task'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a class="edit" href="edit.php?id=<?php echo $row['id'] ?>">
                                        <img src="assets/images/edit.png" alt="">
                                    </a>
                                    <a class="delete" href="delete_task.php?id=<?php echo $row['id'] ?>">
                                        <img src="assets/images/delete.png" alt="">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>