<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM subjects WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $code = mysqli_real_escape_string($con, $_POST['code']);

    $query = "UPDATE subjects SET name='$name', code='$code' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['upload_question']))
{
    $name = mysqli_real_escape_string($con, $_POST['code']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $pdf = $_FILES['pdf']['name'];
    $pdf_type = $_FILES['pdf']['type'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_tem_loc = $_FILES['pdf']['tem_name'];
    $pdf_stroe="pdf/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_stroe);

    $query = "INSERT INTO questions (subject,year,semester,pdf) VALUES ('$name','$year','$semester','$pdf')";
    $query_run = mysqli_query($con, $query);
    move_uploaded_file($temfile , $folder);
    if($query_run)
    {
        $_SESSION['message'] = "Subject Created Successfully";
        header("Location: question-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Subject Not Created";
        header("Location: question-create.php");
        exit(0);
    }
}



if(isset($_POST['save_subject']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $code = mysqli_real_escape_string($con, $_POST['code']);

    $query = "INSERT INTO subjects (name,code) VALUES ('$name','$code')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Subject Created Successfully";
        header("Location: subject-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Subject Not Created";
        header("Location: subject-create.php");
        exit(0);
    }
}

?>