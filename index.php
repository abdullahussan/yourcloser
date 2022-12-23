
<?php

include('connect.php');


include('header.php');
  

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
<?php
$uploader_name = $_SESSION['name'];
  $register_query = "SELECT * FROM `register`";
  $run_register_query = mysqli_query($conn,$ary);
  $check_row = mysqli_num_rows($run_register_query);
   if ($check_row > 0) {
       $personal_data = mysqli_fetch_assoc($run_register_query) ;
?>
   <!--STARTING OF BODY CONTENT-->

      <div class="container my-4 bg-light">
        <div class="row">
          <div class="col-lg-6">
                <video src="uploaded/h.mp4" class="my-4" alt="" style="border-radius:20px;" width="546px" height="546px" controls></video>
               <a href="" class="text-dark"><h2 class="latest-news-a">VR Is the Use of Computer Techno to Create a Simulated Environment.</h2></a>
          </div>
          <div class="col-lg-6">
             <h3 class="mt-4 mx-4">Recent News</h3>
            <ul class="my-5">
        
                <?php
                     $qry = "SELECT * FROM `post` ORDER BY `pid` DESC";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                          while ($data = mysqli_fetch_assoc($run)) {
                                ?>
         
         <li class="trending-story mt-3 "><div class="row"><div class="col-lg-4"><a href="open.php?pid=<?php echo $data['pid']?>" ><img src="uploaded/<?php echo $data['image']?>" style="height:170px; width:170px; object-fit: cover;" width="100%" height="auto" alt=""></a></div><div class="col-lg-8"><a href="search.php?cat_name=<?php echo $data['category'] ?>" class="bg-dark text-light btn fs-6 px-2 py-1  mt-3 ml-2" style="border-radius: 17px;" type="button"><?php echo $data['category'] ?></a><br><a href="" class="text-dark">
                <p class="recent-news-info my-1 ml-2"><a href="open.php?pid=<?php echo $data['pid']?>" class="text-dark"><?php echo $data['desc'] ?></a></p>
                <p style="opacity: 0.5;" class="ml-1 fs-6">uploaded by: <?php echo $data['date'] ?></p><br>
              </a>

            </div>
          </div>
        </li>
        
        <?php
                            }
        
      
    }      
        ?>
            </ul>
          </div>
        </div>
      </div>
  <!--STARTING OF STORIES SECTION-->
      
 
  <!--ENDING OF STORIES SECTION-->
  <!--STARTING OF TRENDING NEWS-->
     <div class="container-fluid  bg-light">
     <h2 class="my-5 mx-5">Latest News</h2>
     <div class="row">
     <?php
                     $qry = "SELECT * FROM `post` ORDER BY `pid` DESC";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                          while ($data = mysqli_fetch_assoc($run)) {
                                ?>
     
      <div class="col-lg-3">
      <ul class="ml-4">             
        <li class="mb-3 tending-news">
          <div class="row ml-3">
          <div>
            <a href="open.php?pid=<?php echo $data['pid']?>" >
            <img src="uploaded/<?php echo $data['image']?>" style="height:200px;width:200px; object-fit: cover;"  height="auto" class="trending-img" width="100%"   alt="">
            </a>
          </div><div>
            <button class="bg-dark text-light mb-2 mt-3 py-1 ml-1" style="border-radius: 17px;"><?php echo $data['category'] ?></button>
           <a href="open.php?pid=<?php echo $data['pid']?>" class="text-dark"><p class="mb-2 ml-1 trending-story"><?php echo $data['desc'] ?></p></a>
           <p style="opacity: 0.5;" class="ml-1"><?php echo $data['date'] ?></p>
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
  <!--ENDING OF TRENDING NEWS-->
  <!--STARTING OF VIDEOS-->
  <div class="videos">
  <div class="container my-4">
    <div class="row">
      <div class="col-lg-8 my-4">
            <img src="images/video.png" class="my-4 " alt="" width="100%">
           <a href="" class="text-dark"><h2 class="latest-news-a text-light">VR Is the Use of Computer Techno to Create a Simulated Environment.</h2></a>
      </div>
      <div class="col-lg-4 ">
         <h3 class="my-4 mx-4  text-light">Recent News</h3>
        <ul class="ml-3 my-5">
          <li class="mt-4">
            <div class="row"><div class="col-lg-4">
            <img src="images/copy1.png" alt="">
          </div>
          <div class="col-lg-8">
            <button class="text-danger" style="background-color: black">BEAUTY</button>
            <p class="video-info my-2 text-light">Stocking Your Restaurant Kitchen Finding Reliable Sellers</p>
            <p class="text-light">By Amachea Jaja</p>
          </div>
        </div>
      </li>
      <li class="mt-4">
        <div class="row"><div class="col-lg-4">
        <img src="images/copy2.png"  alt="">
      </div>
      <div class="col-lg-8">
        <button class=" text-success" style="background-color: black">TRAVEL</button>
        <p class="video-info my-2 text-light">Trip To Iqaluit In Nunavut A Canadian Arctic City</p>
        <p class="text-light">By Amachea Jaja</p>
      </div>
    </div>
  </li>
  <li class="mt-4">
    <div class="row"><div class="col-lg-4">
    <img src="images/copy3.png"  alt="">
  </div>
  <div class="col-lg-8">
    <button class="text-warning" style="background-color: black" >SPORTS</button>
    <p class="video-info my-2 text-light">Get The Boot A Birds Eye Look Into Mcse Boot Camps</p>
    <p class="text-light">By Amachea Jaja</p>
  </div>
</div>
</li>  
<li class="mt-4">
  <div class="row"><div class="col-lg-4">
  <img src="images/copy4 (2).png"  alt="">
</div>
<div class="col-lg-8">
  <button class="text-danger" style="background-color: black">FASHION</button>
  <p class="video-info my-2 text-light">To Keep Makeup Looking Fresh Take A Powder</p>
  <p class="text-light">By Amachea Jaja</p>
</div>
</div>
</li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <!--ENDING OF VIDEOS SECTION-->
  <div class="container-fluid  bg-light">
     <h2 class="my-5 mx-5">Latest News</h2>
     <div class="row">
     <?php
                     $qry = "SELECT * FROM `post` ORDER BY `pid` DESC";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                          while ($data = mysqli_fetch_assoc($run)) {
                                ?>
     
      <div class="col-lg-3">
      <ul class="ml-5">             
        <li class="mb-3 tending-news">
          <div class="row">
          <div >
          <a href="open.php?pid=<?php echo $data['pid']?>" >
            <img src="uploaded/<?php echo $data['image']?>" style="height:200px;width:200px; object-fit: cover;"  height="auto" class="trending-img" width="100%"   alt="">
          </a>
          </div><div>
            <button class="bg-dark text-light mb-2 mt-3 ml-1 py-1" style="border-radius: 17px;"><?php echo $data['category'] ?></button>
           <a href="open.php?pid=<?php echo $data['pid']?>" class="text-dark"><p class="mb-2 ml-1 trending-story"><?php echo $data['desc'] ?></p></a>
           <p style="opacity: 0.5;" class="ml-1"><?php echo $data['date'] ?></p>
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
  <!--STARTING OF FOODS-->
  
     <div class="container">
      <h2 class="py-3 border-bottom">Foods & Drinks</h2>
         <div class="row my-5">
          <div class="col-lg-3">
              <div class="food-a">
                 <img src="images/Capture.png" class="mx-2 mt-3" alt="">
              </div>
          </div>
          <div class="col-lg-3">
            <div class="food-a">
               <img src="images/food-4.png" class="mx-2 mt-3" alt="">
            </div>
        </div>
        <div class="col-lg-3">
          <div class="food-a">
             <img src="images/food-2.png" class="mx-2 mt-3" alt="">
          </div>
      </div>
      <div class="col-lg-3">
        <div class="food-a">
           <img src="images/food-3.png" class="mx-2 mt-3" alt="">
        </div>
    </div>
         </div>
     </div>
  
  <?php

    include('footer.php');
                          }
?>
   <!-- ENDING OF BODY CONTENT-->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


