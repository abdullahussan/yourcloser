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
    <title>admin panal</title>
</head>
<body>
 <?php
 include('header.php');
 ?>
    <div class="container-fluid bg-light my-3">
    <?php
            $user = $_GET['user_id'];
            $qry = "SELECT `image`, `name`, `email`, `password`, `phone` FROM `register` WHERE `user_id` = '$user'";
            $run = mysqli_query($conn,$qry);
            $runn = mysqli_num_rows($run);
            if ($runn > 0) {
                 while ($data = mysqli_fetch_assoc($run)) {
?>
       
<form action="" method="post" class="mx-4 my-5 form-group" enctype="multipart/form-data">
<h2 class="text-center py-3"><span class="text-primary">User </span>Info</h2>
               <h4>Edit Profile Picture</h4>
            <div class="row">
                <div class="col-lg-6">
                <input type="file" class="form-control my-4" name="image" placeholder="<?php echo $data['image'] ?>">
                </div>
                <div class="col-lg-6">
                    <img src="../uploaded/<?php echo $data['image'] ?>" style="margin-left:100px;height:150px;width:150px;" height="10%" width="10%" alt="">
                </div>
            </div>
          
           <h4 class="mb-3">Edit Name</h4>
           <input type="text" class="form-control" name="name" placeholder="<?php echo $data['name'] ?>">
           <h4 class="my-3">Edit Email</h4>
           <input type="email" class="form-control" name="email" placeholder="<?php echo $data['email'] ?>">
           <h4 class="my-3">Edit Password</h4>
           <input type="password" class="form-control" name="password" placeholder="<?php echo $data['password'] ?>">
           <h4 class="my-3">Edit Phone</h4>
           <input type="Number" class="form-control" name="phone" placeholder="<?php echo $data['phone'] ?>">
           <input type="submit" value="Update Now" class="form-control bg-warning text-white my-4 py-3" name="submit">
       </form>
    <?php
                 }
                }
?>
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
        $qry = "UPDATE `register` SET `image`='$image',`name`='$name',`email`='$email',`password`=' $password',`phone`='$phone' WHERE `user_id` = '$user'";
        $run = mysqli_query($conn,$qry);
        if ($run == TRUE) {
            echo "<h5 style='color:rgb(112, 59, 112);text-align:center;;padding:20px;pargin-left:30px;background:rgb(228, 171, 228);'>User has been updated</h5>";
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

