
<?php
  include('header.php');
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
    <title>Paper</title>
</head>
<body>
<div class="container-fluid  bg-light">
     <h2 class="my-5 mx-5">Latest Vidoes</h2>
     <div class="row ml-5">
     <?php
                            $cat_name = $_GET['cat_name'];
                            $qry = "SELECT * FROM `post` WHERE `category` = '$cat_name'";
                            $run = mysqli_query($conn,$qry);
                            $runn = mysqli_num_rows($run);
                            if ($runn > 0) {
                               $data = mysqli_fetch_assoc($run)                    
?>
     
   
     <div class="col-lg-3">
      <ul>             
        <li class="mb-3 tending-news">
          <div class="row">
          <div class="">
            <img src="uploaded/<?php echo $data['image']?>" style="height:200px;width:200px;object-fit:cover;"  height="auto" class="trending-img" width="100%"  alt="">
          </div><div class="">
            <button class="bg-warning text-white mb-2 mt-3"><?php echo $data['category'] ?></button>
           <a href="open.php?pid=<?php echo $data['pid']?>" class="text-dark"><p class="mb-2 trending-story"><?php echo $data['desc'] ?></p></a>
           <p style="opacity: 0.5;" class=""><?php echo $data['date'] ?></p>
          </div>
        </div>
        </li> 
      </ul>
      </div>
     
      <?php

}

?>
    </div>
                      </div>
                      <?php include('footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

