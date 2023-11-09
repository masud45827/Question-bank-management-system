<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
    
<div class="container">
        <h4 style="text-align: right;">
     <a href="logout.php">Logout</a>
     </h4>
     </div>
  
    <div class="container mt-4"><br>
    <div align="center"><h2>Welcome to Online question bank system</h2></div><br><br>
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Subject Details
                            <a href="subject-create.php" class="btn btn-primary float-end">Add Subject</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Subject code</th>
                                    <th>View Question</th>
                                    <th>View Solution</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM subjects";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $subject)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $subject['id']; ?></td>
                                                <td><?= $subject['name']; ?></td>
                                                <td><?= $subject['code']; ?></td>
                                                <td><a href="questions.php?id=<?= $subject['code']; ?>">View <b> <?= $subject['name']; ?> </b>Question</a></td>
                                                <td><a href="solutions.php?id=<?= $subject['code']; ?>">View <b> <?= $subject['name']; ?> </b>Solution</a></td>
                                                <td>
                                                    <a href="subject-view.php?id=<?= $subject['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="subject-edit.php?id=<?= $subject['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$subject['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>