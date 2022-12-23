<?php   

   include('connect.php');
   session_start();
   if(!isset($_SESSION['email'])) {
    header('location:login.php');
   error_reporting(0);  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Paper</title>
</head>
<body>

    <!--TOP NAV END-->
  <!--NAVBAR STARTING-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light  sticky-top">
    <div class="container-fluid">
    <p class="nav-brand pl-4"><span class="text-warning"><u>LOV</u></span><span><i>ERS</i></span></span></p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mx-5">
        <li class="nav-item mr-2 active">
          <a class="nav-link fs-6" href="index.php"><strong>Home</strong></a>
        </li>
        <li class="nav-item mr-2  fs-6">
          <a class="nav-link" href="latest.php"><strong>LATEST IMAGES</strong></a>
</li>
<li class="nav-item mr-2">
          <a class="nav-link" href="latest-video.php"><strong>VIDEOS</strong></a>
</li>


 <li class="nav-item mr-2">
 <?php
$uemail = $_SESSION['user_id'];
  $ary = "SELECT * FROM `register`";
  $run = mysqli_query($conn,$ary);
  $runn = mysqli_num_rows($run);
   if ($runn > 0) {
       $dataq = mysqli_fetch_assoc($run) ;
?>
    <a class="nav-link" href="user/index.php?user_id=<?php echo $uemail ?>"><strong>MANAGE YOR PROFILE</strong></a>
    <?php
   }   

?> 
  </li>
          <li class="nav-item mr-2">
            <a class="nav-link" href="logout.php"><strong>LOGOUT</strong></a>
          </li>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Videos</a>
            <a class="dropdown-item" href="#">Entertainment</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>
      </ul>
      <?php
    
    $user = $_SESSION['user_id'];
    $user_img = $_SESSION['image'];
   $ary = "SELECT * FROM `register`";
   $run = mysqli_query($conn,$ary);
   $runn = mysqli_num_rows($run);
    if ($runn > 0) {
        $dataq = mysqli_fetch_assoc($run) ;
 ?>
<form action="" method="post" class="form-inline">
                       <input type="text" id="b" class="form-control" placeholder="Search Here" aria-describedby="button" style="background: transparent;width:200px;" name="search">
                        <button class="btn btn-danger fs-6" id="button">Search</button>
</form>     
 <a href="open.php?user_id=<?php echo $user ?>" target="_blank"><img src="uploaded/<?php echo $user_img ?>" width="70px" height="70px" style="border-radius:100%; margin-top:8px;margin-left:50%;object-fit:cover;" alt=""></a>
             <?php  
   }
             ?>
    </div>
  </div>
  </nav>
 <!--NAVBAR ENDING-->
 <script>
const d = new Date();
let = document.getElementById("date").innerHTML = d;
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

