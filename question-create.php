<?php
session_start();
include 'dbcon.php';
?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <title>Upload Question</title>
</head>
<body>
  
    <div class="container mt-5">
 
        <?php include('message.php'); ?>
 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Upload Question 
                            <a href="questions.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="question-create.php" method="POST" enctype="multipart/form-data">
 
                        <div class="mb-3">
                            <label>Subject code</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Year</label>
                            <input type="number" name="year" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Semester</label>
                            <input type="text" name="semester" class="form-control">
                        </div>
                        <div>Upload Question PDF!</div>
                        <br>
                        <div>
                            <label for="">Choose Your PDF File</label><br>
                            <input id="pdf" type="file" name="pdf" value="" required><br><br>
                        </div>
                        <br>
                        
                        <div class="mb-3">
                        <input id="upload" type="submit" name="submit" value="Upload">
                        </div>
 
                        <?php
                            if (isset($_POST['submit'])) {
                                $name = $_POST['code'];
                                $year = $_POST['year'];
                                $semester = $_POST['semester'];
                                $pdf=$_FILES['pdf']['name'];
                                $pdf_type=$_FILES['pdf']['type'];
                                $pdf_size=$_FILES['pdf']['size'];
                                $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
                                $pdf_store="pdf/".$pdf;
                                move_uploaded_file($pdf_tem_loc,$pdf_store);
                                $sql = "INSERT INTO questions (subject,year,semester,pdf) VALUES ('$name','$year','$semester','$pdf')";
                                $query=mysqli_query($con,$sql);
                                if($query){
                                     echo "successfully add subject";
                                }else{
                                    echo "failed add subject";
                                }
                                }
                            ?>
 
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>