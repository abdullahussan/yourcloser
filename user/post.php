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

      <div class="container my-4">
          <form action="" method="post" class="mx-4 my-5 form-group" enctype="multipart/form-data">
           <h2 class="form-brand px-3 bg-warning text-white py-4 text-center">Manage Your Posts</h2>
               <h4 class="my-4">Select a Category</h4>
               <select class="form-control" name="category" required>
               <?php
                            $qry = "SELECT * FROM `category`";
                            $run = mysqli_query($conn,$qry);
                            $runn = mysqli_num_rows($run);
                            if ($runn > 0) {
                                 while ($data = mysqli_fetch_assoc($run)) {
    
?>
                  <option><?php echo $data['cat_name'] ?></option>
                
                  <?php
                                   }  }
?>
                  </select><br>
                  <h4>Add image Of Your intrest</h4>
              <input type="file" class="form-control my-4" name="image">
              <h4 class="my-3">Explain Your intrest</h4>
              <textarea name="desc" class="form-control" placeholder="Explain your intrest here..." required></textarea>
              <input type="submit" value="Upload Now" class="form-control bg-warning text-white my-4 py-3" name="submit">
          </form>
      </div>



 

      <?php   
       if (isset($_POST['submit'])) {
          $category = $_POST['category'];
          $image = $_FILES['image']['name'];
           $file_tmp = $_FILES['image']['tmp_name'];
             move_uploaded_file($file_tmp, "../uploaded/".$image);
          $date = $_SESSION['name'];
          $desc = $_POST['desc'];
         
              $qry = "INSERT INTO `approval`(`category`,`image`, `date`, `desc`) VALUES ('$category' , '$image' , '$date' , '$desc')";
              $run = mysqli_query($conn,$qry);
              if ($run == TRUE) {
                echo "<h5 style='color:rgb(112, 59, 112);text-align:center;;padding:20px;pargin-left:30px;background:rgb(228, 171, 228);'>Post has been sent for admin approval.</h5>";
              } else { 
                echo"An error occured";
              }
              
       }
    
                            
   

?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
