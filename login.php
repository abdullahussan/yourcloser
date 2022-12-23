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
    <form action="" method="post" class="mx-4 my-5 form-group">
        <h2 class="form-brand px-3 bg-warning text-white py-4 text-center">Register Your Information</h2>
           <h4 class="my-3">Add Your Email</h4>
           <input type="email" class="form-control" name="email" required>
           <h4 class="my-3">Add Your Password</h4>
           <input type="password" class="form-control" name="password">
           <input type="submit" value="Login Now" class="form-control bg-warning text-white my-4 py-3" name="submit" required>
           <span>Already have an account?<a href="register.php">Register now</a></span>
       </form>
   </div>



   <?php

     if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
            $qry = "SELECT * FROM `register` WHERE `email` = '$email' and `password` = '$password'";
            $run = mysqli_query($conn,$qry);
            $runn = mysqli_num_rows($run);

          if ($runn > 0) {

            $data =  mysqli_fetch_assoc($run);
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['submit'] = $data['submit'];
           
            header("location:index.php");
          } else {
            echo "<h5 style='color:rgb(112, 59, 112);text-align:center;;padding:20px;pargin-left:30px;background:rgb(228, 171, 228);'>incorrect password or username</h5>";
          }
        }

     




?>
 
 




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>