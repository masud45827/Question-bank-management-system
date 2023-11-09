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
    
    <div class="container mt-4">
    <div>
        <a href="index.php"><h3>Home</h3>
    </div>
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Soultion Bank
                            <a href="solution-create.php" class="btn btn-primary float-end">Upload Solution</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                    <th>Solution</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($_GET['id'])){
                                    $subject_id = mysqli_real_escape_string($con, $_GET['id']);
                                    $query = "SELECT * FROM solutions WHERE subject='$subject_id' ";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $subject)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $subject['id']; ?></td>
                                                <td><?= $subject['subject']; ?></td>
                                                <td><?= $subject['semester']; ?></td>
                                                <td><?= $subject['year']; ?></td>
                                                <td><a href="#">View <b> <?= $subject['subject']; ?> </b>Solution</a></td>
                                                <td><a href="download_solution.php?id=<?= $subject['id']; ?>">PDF</a></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
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