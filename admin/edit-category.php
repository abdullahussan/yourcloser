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
    <style>
        .st{
            border-radius: 17px;
            box-shadow:5px 5px 5px rgb(141, 137, 137);
            margin-top: 50px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <p class="nav-brand"><span class="text-warning"><u>PAP</u></span><span><i>ERS</i></span></span></p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav mx-5">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">LATEST NEWS</a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LATEST STORIES
              </a>
              <li class="nav-item">
                <a class="nav-link" href="#">LOGIN</a>
              </li>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Videos</a>
                <a class="dropdown-item" href="#">Entertainment</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
<div class="container st">
      <div class="row">
         <div class="col-lg-3">
         <?php include('sidebar.php')  ?>
         </div>
         <div class="col-lg-9  border-left border-success pl-3">
                    <div class="container">
                     
                    <?php
                     $qry = "SELECT * FROM `category`";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                     $data = mysqli_fetch_assoc($run)
                                ?>
     
                    <div class="container  bg-light my-5">
     <form action="" method="post" class="form-group py-4">
            <h2 class="bg-warning text-center text-light py-5" >Edit Category</h2>
             <input type="text" name="cat_name" class="form-control my-4" placeholder="<?php echo $data['cat_name'] ?>"> 
            <input type="submit" name="submit" class="form-control btn bg-warning text-light">
        </form>
      <a href="category.php">Go to categories</a>
     </div>
                </div>
                <?php
                      }
                ?>
                <?php   
       if (isset($_POST['submit'])) {
          $name = $_POST['cat_name'];
             $cat_id = $_GET['cat_id'];
              $qry = "UPDATE `category` SET `cat_name`='$name' WHERE `cat_id` = '$cat_id'";
              $run = mysqli_query($conn,$qry);
              if ($run == TRUE) {
                   echo"<h4 class='text-success text-center my-3'>Edited category has been saved!</h4>";
              } else {
                echo"<h4 class='text-success text-center my-3'>An unknown error occured!</h4>";
              }         
       }

?>
              </div>
      </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>