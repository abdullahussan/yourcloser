<?php
include('connect.php');
if (isset($_POST['com'])) {
    $pid = $_POST['pid'];
    $com = $_POST['comment'];

    $qry = "INSERT INTO `comment`(`pid`, `comment`) VALUES ($pid,'$com')";
    $run = mysqli_query($conn,$qry) or die(mysqli_error($conn));

    if ($run) {
      header('location:index.php');
    }else{
        echo "somehing went wrong";
    }
}
?>