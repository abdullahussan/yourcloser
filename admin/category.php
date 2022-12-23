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
                     

                    <div class="container  bg-light my-5">
     <form action="" method="post" class="form-group py-4">
            <h2 class="bg-warning text-center text-light py-5" >Add New Categories</h2>
             <input type="text" name="cat_name" class="form-control my-4"> 
            <input type="submit" name="submit" class="form-control btn bg-warning text-light">
        </form>
     </div>
                </div>
                <?php   
       if (isset($_POST['submit'])) {
          $name = $_POST['cat_name'];

              $qry = "INSERT INTO `category`(`cat_name`) VALUES ('$name')";
              $run = mysqli_query($conn,$qry);
              if ($run == TRUE) {
                   echo"<h4 class='text-success text-center my-3'>A new category has been saved!</h4>";
              } else {
                echo"<h4 class='text-success text-center my-3'>An unknown error occured!</h4>";
              }         
       }

?>
<div class="container">
<h3 class="text-center text-primary">Categories</h3>
<table class="border">
    <?php
                            $qry = "SELECT * FROM `category`";
                            $run = mysqli_query($conn,$qry);
                            $runn = mysqli_num_rows($run);
                            if ($runn > 0) {
                                 while ($data = mysqli_fetch_assoc($run)) {
    
?>
    <tr class="border-bottom">
    <td><h5 class="mx-3"><?php echo $data['cat_id'] ?></h5></td>
      <td><h5 class="ml-5"><?php echo $data['cat_name'] ?></h5></td>
      <td><h5 style="margin-left: 400px;"><a href="edit-category.php?cat_id=<?php echo $data['cat_id']?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="25%" height="auto"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V285.7l-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg></a></h5></td>
       <td><h5"><a href="delete-cat.php?cat_id=<?php echo $data['cat_id']?>" class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="20%" height="auto" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a></h5></td>
  
    </tr>
 
<?php
                                 }}
?>
  </table>
</div> 
              </div>
      </div>
</div>

  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>