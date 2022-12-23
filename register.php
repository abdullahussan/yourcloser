<?php
session_start();   
   include('connect.php');

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
    <title>Register Now</title>
</head>
<body>
    <p class="nav-brand-r text-center"><span class="text-warning"><u>PAP</u></span><span><i>ERS</i></span></span></p>
   <div class="container">
    <form action="" method="post" class="mx-4 my-5 form-group" enctype="multipart/form-data">
        <h2 class="form-brand px-3 bg-warning text-white py-4 text-center">Register Your Information</h2>
               <h4>Add a Profile Picture</h4>
           <input type="file" class="form-control my-4" name="image">
           <h4 class="mb-3">Add your Name</h4>
           <input type="text" class="form-control" name="name">
           <h4 class="my-3">Add Your Email</h4>
           <input type="email" class="form-control" name="email">
           <h4 class="my-3">Add Your Password</h4>
           <input type="password" class="form-control" name="password">
           <h4 class="my-3">Add Your Phone</h4>
           <input type="Number" class="form-control" name="phone">
           <input type="submit" value="Register Now" class="form-control bg-warning text-white my-4 py-3" name="submit">
           <span>Already have an account?<a href="login.php">login now</a></span>
       </form>
   </div>










   <?php   
       if (isset($_POST['submit'])) {
        $image = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
          move_uploaded_file($file_tmp, "uploaded/".$image);
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone = $_POST['phone'];
  
              $qry = "INSERT INTO `register`(`image`, `name`, `email`, `password`, `phone`) VALUES ('$image','$name','$email','$password','$phone')";
              $run = mysqli_query($conn,$qry);
              
            
              if ($run == TRUE) {
                   header('location:index.php');
              } else {
                echo"An error occured";
              }
              

           }






?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
