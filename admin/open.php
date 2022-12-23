<?php
 include('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $user = $_GET['aid'];
            $qry = "SELECT * FROM `video-aproval` WHERE `aid` = '$user'";
            $run = mysqli_query($conn,$qry);
            $runn = mysqli_num_rows($run);
            if ($runn > 0) {
                 $data = mysqli_fetch_assoc($run)
?>
    <video src="../uploaded/<?php echo $data['image']?>" style="margin-left: 25%;height:720px;" controls></video>
    <?php
                 }
    ?>
</body>
</html>