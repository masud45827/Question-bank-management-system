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

<?php
$id = $_GET['id'];
if(isset($_GET['id']))
{
    $subject_id = $_GET['id'];
    $query = "SELECT * FROM solutions WHERE id='$subject_id' ";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) > 0)
    { 
      while ($info=mysqli_fetch_array($query_run)) {
        ?>
      <embed type="application/pdf" src="solution_pdf/<?php echo $info['pdf'] ; ?>" width="900" height="500">
    <?php
          }
        ?>
        
            

        <?php
    }
    else
    {
        echo "<h4>No Such Id Found</h4>";
    }
}
  
  ?>



</body>
</html>