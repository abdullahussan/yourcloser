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
        <table class="ml-5">
                       <tr>
                        <td><h5 class="text-primary mx-5">Name</h5></td>
                        <td><h5 class="text-primary mx-5">Email</h5></td>
                        <td><h5 class="text-primary mx-5" >Password</h5></td>
                        <td><h5 class="text-primary mx-5">Phone</h5></td>
                        <td><h5 class="text-primary mx-5">Update</h5></td>
                        <td><h5 class="text-primary mr-5">Delete</h5></td>
                        <td><h5 class="text-primary mr-5">User</h5></td>
                    </tr>
                   <tr>
                        <td><h5 class="mx-5 my-3"><?php echo $data['name'] ?></h5></td>
                        <td><h5 class="mx-5 my-3"><?php echo $data['email'] ?></h5></td>
                        <td><h5 class="mx-5 my-3"><?php echo $data['password'] ?></h5></td>
                        <td><h5 class="mx-5 my-3"><?php echo $data['phone'] ?></h5></td>
                        <td><h5 class=" ml-5"><a href="update.php?user_id=<?php echo $user ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="12%" height="auto"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V285.7l-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg></a></h5></td>
                        <td><h5 class="mr-5"><a href="delete.php?user_id=<?php echo $user ?>" class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="11%" height="auto" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a></h5></td>
                        <?php
                              $user_info = $_GET['user_id'];
                              $user_query = "SELECT * FROM `register`";
                              $user_query_run = mysqli_query($conn,$user_query);
                              $user_check = mysqli_num_rows($user_query_run);
                              if ($user_check > 0) {
                                $user_fetch = mysqli_fetch_assoc($user_query_run);
                             

?>
                        <td><img src="../uploaded/<?php echo $user_fetch['image'] ?>" width="70px" height="70px" style="border-radius:100%; margin-top:8px;margin-right:50px;" alt=""></td>
                        <?php 
                              }
                        ?>
                    </tr>
                 </table>
    <?php
    }
                 }
       ?>
  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



