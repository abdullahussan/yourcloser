<?php
    include('../connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>

 <?php include('header.php') ?>
      <?php
  $imagee =$_SESSION['image'];
  $query_img = "SELECT * FROM `register`";
  $query_run_img = mysqli_query($conn,$query_img);
  $query_check_img = mysqli_num_rows($query_run_img);
  if ($query_check_img > 0) {
    $img_data = mysqli_fetch_assoc($query_run_img);



?>
 <?php 
       $query = "SELECT * FROM `register`";
       $query_run = mysqli_query($conn,$query);
       $query_check = mysqli_num_rows($query_run);
       if ($query_check) {
         $image_data = mysqli_fetch_assoc($query_run);
     ?>
   <h2 class="mx-5 my-4">Manage Your <span class="text-primary">Profile</h2>
      <div class="container">
    <form action="" method="post" class="mx-4 my-5 form-group" enctype="multipart/form-data">
    <?php
    
   $user = $_GET['user_id'];
  $ary = "SELECT * FROM `register` WHERE `user_id` = '$user'";
  $run = mysqli_query($conn,$ary);
  $runn = mysqli_num_rows($run);
   if ($runn > 0) {
       $dataq = mysqli_fetch_assoc($run) ;
?>
<a href="open.php?user_id=<?php echo  $user ?>" target="_blank"><img src="../uploaded/<?php echo $imagee ?>" width="70px" height="70px" style="border-radius:100%; float:right; margin-top:8px;margin-right:15px;object-fit:cover;" alt=""></a>
        <h2 class="form-brand px-3 bg-warning text-white py-4 text-center">Update Your Information</h2>
               <h4>Update Your Profile Picture</h4>
           <input type="file" class="form-control my-4" name="image" value="<?php echo $uimage ?>">
           <h4 class="mb-3">Change your Name</h4>
           <input type="text" class="form-control" name="name" value="<?php echo $dataq['name'] ?>">
           <h4 class="my-3">Change Your Email</h4>
           <input type="email" class="form-control" name="email" value="<?php echo $dataq['email'] ?>">
           <h4 class="my-3">Change Your Password</h4>
           <input type="password" class="form-control" name="password" value="<?php echo $dataq['password']?>">
           <h4 class="my-3">Change Your Phone</h4>
           <input type="Number" class="form-control" name="phone" value="<?php echo $dataqp['phone']?>">
           <input type="submit" value="Register Now" class="form-control bg-warning text-white my-4 py-3" name="submit">
           <?php
   }   
  }
?> 


       </form>
   </div>


<?php


if (isset($_POST['submit'])) {
  $image = $_FILES['image']['name'];
  $file_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($file_tmp, "../uploaded/".$image);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

        $qry = "UPDATE `register` SET `image`='$image',`name`='$name',`email`='$email',`password`=' $password',`phone`='$phone'";
        $run = mysqli_query($conn,$qry);
        
      
        if ($run == TRUE) {
             echo "<h3 class='text-primary text-center py-3' style='background-color: rgb(218, 171, 218);'>Your info has been updated</h3>";
        } else {
          echo"An error occured";
        }
        

     }


    }

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
