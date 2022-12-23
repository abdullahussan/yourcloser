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
        td{
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <p class="nav-brand"><span class="text-warning"><u>PAP</u></span><span><i>ERS</i></span></SPan></p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav mx-5">
            <li class="nav-item active">
              <a class="nav-link" href="#">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">LATEST NEWS</a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LATEST STORIES
              </a>
          
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

               <h2 class="text-center my-3"><span class="text-primary">Users  </span>Information</h2>

      <div class="container st">
      <div class="row">
         <div class="col-lg-3">
            <?php include('sidebar.php')  ?>
         </div>
         <div class="col-lg-9  border-left border-success pl-3">
                    <div class="container">
                       <table>
                       <tr>
                        <td><h5 class="text-warning">Name</h5></td>
                        <td><h5 class="text-warning">Email</h5></td>
                        <td><h5 class="text-warning" >Password</h5></td>
                        <td><h5 class="text-warning">Phone</h5></td>
                    </tr>
                         <?php
                            $qry = "SELECT * FROM `register` ";
                            $run = mysqli_query($conn,$qry);
                            $runn = mysqli_num_rows($run);
                            if ($runn > 0) {
                                 while ($data = mysqli_fetch_assoc($run)) {
                                    
                            

?>
 

                    <tr>
                        <td><h5><?php echo $data['name'] ?></h5></td>
                        <td><h5><?php echo $data['email'] ?></h5></td>
                        <td><h5><?php echo $data['password'] ?></h5></td>
                        <td><h5><?php echo $data['phone'] ?></h5></td>
                        <td><a href="user-info.php?user_id=<?php echo $data['user_id'] ?>"><h5>View</h5></a></td>
                    </tr>
                 
                    <?php
                             }
                            }

?>


                       </table>
                     
     

                </div>
              </div>
      

 
  









    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>