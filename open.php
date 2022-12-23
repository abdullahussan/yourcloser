<?php   
   include('connect.php');
   include('header.php');

   if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
   }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Register Now</title>
</head>
<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-7">
            <?php
        $uid = $_GET['pid'];
       $qry = "SELECT `category`, `image`, `date`, `desc`FROM `post` WHERE  `pid` = '$uid'";
       $run = mysqli_query($conn,$qry);
    $runn = mysqli_num_rows($run);
    if ($runn > 0) {
        $data = mysqli_fetch_assoc($run);
 

?>

        <img src="uploaded/<?php echo $data['image'] ?>" style="height:600px; width:600px;object-fit:cover" alt="" width="100%" height="auto">
         <div class="my-2 mx-2">
        <p style="opacity: 0.7; display:inline; margin-top:15px;">Category: <strong class="text-dark px-2"><?php echo $data['category'] ?></strong></p>
         <p style="opacity: 0.7; display:inline ; margin-left:50px; margin-top:15px">Upload At: <strong><?php echo $data['date'] ?></strong></p>
        </div>
         <h4 class="ml-2"><?php echo $data['desc'] ?></h4>
         <?php
   $qry = "SELECT * FROM `comment` WHERE `pid` = '$uid'";
   $run = mysqli_query($conn,$qry);
$runn = mysqli_num_rows($run);
if ($runn > 0) {
    while($deta = mysqli_fetch_assoc($run))
    {
?>       
          <p class="border text-dark py-2 pl-4 bg-light" style="border-radius: 17px;"><?php echo $deta['comment']?></p>
          <?php   
}}
?>
         <div class="row">
            <div class="col-lg-8">
                <form action="comment.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="pid" value="<?php echo $uid ?>">
                    <textarea name="comment" cols="10" rows="5" class='form-control'>Add Comment</textarea>
                    <input type="submit" value="Add" name="com" class="btn btn-info mt-4">
                    </div>
                </form>
            </div>
        </div>
          </div>


          <div class="col-lg-5">
             <h3 class="mt-4 mx-4">Recent News</h3>
            <ul class="my-5">
        
                <?php
                     $qry = "SELECT * FROM `post` ORDER BY `pid` DESC";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                          while ($data = mysqli_fetch_assoc($run)) {
                                ?>
         
         <li class="trending-story mt-3 "><div class="row"><div class="col-lg-5"><a href="open.php?pid=<?php echo $data['pid']?>" ><img src="uploaded/<?php echo $data['image']?>" style="height:170px; width:170px; object-fit: cover;margin-left:15px;" width="100%" height="auto" alt=""></a></div><div class="col-lg-7"><a href="search.php?cat_name=<?php echo $data['category'] ?>" class="bg-dark text-light btn fs-6 px-2 py-1  mt-3 ml-2" style="border-radius: 17px;" type="button"><?php echo $data['category'] ?></a><br><a href="" class="text-dark">
                <p class="recent-news-info my-1 ml-2"><a href="open.php?pid=<?php echo $data['pid']?>" class="text-dark"><?php echo $data['desc'] ?></a></p>
                <p style="opacity: 0.5;" class="ml-1 fs-6">uploaded by: <?php echo $data['date'] ?></p><br>
              </a>

            </div>
          </div>
        </li>
        
        <?php
                            }
                        }
      
    }      
        ?>
            </ul>
          </div>
        </div>
       
    </div>
    <?php

include('footer.php');

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>