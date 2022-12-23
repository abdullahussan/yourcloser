<?php
session_start();
  include('../connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>image</title>
</head>
<body> 
     <?php
         $img_id = $_SESSION['user_id'];
         $query = "SELECT * FROM `register`";
         $query_run = mysqli_query($conn,$query);
         $query_check = mysqli_num_rows($query_run);
         if ($query_check > 0) {
          $data = mysqli_fetch_assoc($query_run);
          

?>
<img src="../uploaded/<?php echo $data['image'] ?>" style="margin-left: 32%; height:720px;" alt="">
<?php
         }
?>
</body>
</html>