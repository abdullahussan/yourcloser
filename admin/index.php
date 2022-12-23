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
<div class="container mt-3">
      <div class="row">
         <div class="col-lg-3">
         <?php include('sidebar.php')  ?>
         </div>
         <div class="col-lg-9  border-left border-success pl-3">
         <div class="container">
                       <h2 class="my-3">Posts need to be approved</h2>
                       <div class="row ml-5">
     <?php
                     $qry = "SELECT * FROM `approval`";
                     $run = mysqli_query($conn,$qry);
                     $runn = mysqli_num_rows($run);
                      if ($runn > 0) {
                          while ($data = mysqli_fetch_assoc($run)) {
                                ?>
     
      <div class="col-lg-6">
      <ul>             
        <li class="mb-3 tending-news">
          <div class="row">
          <div class="col-lg-5">
            
            <img src="../uploaded/<?php echo $data['image']?>" style="height:150px;width:150px; object-fit: cover;"  height="auto" class="trending-img" width="100%"  alt="">
          </div><div class="col-lg-7">
            <button class="bg-dark  text-light py-1 mb-2 mt-3 ml-3" style="border-radius: 17px;"><?php echo $data['category'] ?></button>
           <a href="open.php?approval_id=<?php echo $data['approval_id']?>" class="text-dark"><p class="mb-2 ml-3 trending-story"><?php echo $data['desc'] ?></p></a>
           <p style="opacity: 0.5;" class="ml-3"><?php echo $data['date'] ?></p>
           <a href="approval-post.php?approval_id=<?php echo $data['approval_id']?>" class="ml-3">approve</a>
           <a href="approval_delet.php?approval_id=<?php echo $data['approval_id']?>">delete</a>
           </form>
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
    <h3 class="mx-3 my-5">Trending Stories</h3>
<div class="row">
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
          <div class="col-lg-5">
            <img src="../uploaded/<?php echo $data['image']?>" style="height:170px;width:170px; object-fit: cover;"  height="auto" class="trending-img" width="100%"   alt="">
          </div><div class="col-lg-7">
            <button class="bg-dark text-light mb-2 mt-3 py-1 ml-3"  style="border-radius: 17px;"><?php echo $data['category'] ?></button>
           <a href="open.php?pid=<?php echo $data['pid']?>" class="text-dark"><p class="mb-2 ml-3 trending-story"><?php echo $data['desc'] ?></p></a>
           <p style="opacity: 0.5;" class="ml-3"><?php echo $data['date'] ?></p>
           <a href="post-edit.php?pid=<?php echo $data['pid']?>" style="float: left; margin-left:20px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="12%" height="auto"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V285.7l-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg></a>
           <a href="delete_post.php?pid=<?php echo $data['pid']?>" style="float: left;margin-left:20px;" class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="10%" height="auto" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
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




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>