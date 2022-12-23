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
    <title>User Control</title>
</head>
<body>
  <?php include('header.php') ?>
<div class="container mt-3">
      <div class="row">
         <div class="col-lg-3">
            <div class="side-bar">
            <ul class="px-4">
            <?php  
            $qryy = "SELECT * FROM `register`";
            $rrun = mysqli_query($conn,$qryy);
            $ruun = mysqli_num_rows($rrun);
            if ($ruun > 0) {
             $dataa = mysqli_fetch_assoc($rrun);
           
            $_SESSION['user_id'] = $dataa['user_id'];
          ?>
                <h5 href="" class="admin-link-h"><li class=" my-2 py-3 admin-li-h">DASHBOARD</li></h5>
                <?php
   $uuid = $_SESSION['user_id'];
  $ary = "SELECT * FROM `register`";
  $run = mysqli_query($conn,$ary);
  $runn = mysqli_num_rows($run);
   if ($runn > 0) {
       $dataq = mysqli_fetch_assoc($run) ;
?>
                <a href="profile.php?user_id=<?php echo $uuid ?>" class="text-light"><h5 
                class="admin-link">
                <li class=" my-2 py-3 admin-li">Update Your Profile</li>
              </h5></a> 
          
                <a href="post.php?user_id=<?php echo $dataq['image'] ?>" class="text-light"><h5 class="admin-link"><li class=" my-2 py-3 admin-li">Upload an image</li></h5></a>
                <a href="video.php?user_id=<?php echo $uuid ?>" class="text-light"><h5 
                class="admin-link">
                <li class=" my-2 py-3 admin-li">Upload a video</li>
              </h5></a> 
          
           <?php
            }}
           ?>
              </ul>
            </div>
         </div>
         <div class="col-lg-9  border-left border-success pl-3">
                
<div class="container-fluid  bg-light">
     <h2 class="my-5">Recent Updates</h2>
     <div class="row ml-5">
     <?php
                     $qry = "SELECT * FROM `post` ORDER BY `pid` DESC";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                          while ($data = mysqli_fetch_assoc($run)) {
                                ?>
     
      <div class="col-lg-6">
      <ul>             
        <li class="mb-3 tending-news">
          <div class="row">
          <div class="col-lg-6">
            <img src="../uploaded/<?php echo $data['image']?>"style="height:170px;width:170px; object-fit: cover;border-radius:17px;"  height="auto" class="trending-img" width="100%"  alt="">
          </div><div class="col-lg-6">
            <button class="bg-dark text-white py-1 mb-2 mt-3 ml-2" style="border-radius: 17px;"><?php echo $data['category'] ?></button>
           <a href="../open.php?pid=<?php echo $data['pid']?>" class="text-dark ml-2"><p class="mb-2 ml-2 trending-story"><?php echo $data['desc'] ?></p></a>
           <p style="opacity: 0.5;" class="ml-2"><?php echo $data['date'] ?></p>
          </div>
        </div>
        </li> 
      </ul>
      </div>
     
     
      <?php

}
}
?>
    </div>
                      </div>
 
                  </div>
                </div>
              </div>
      

 
  









    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>