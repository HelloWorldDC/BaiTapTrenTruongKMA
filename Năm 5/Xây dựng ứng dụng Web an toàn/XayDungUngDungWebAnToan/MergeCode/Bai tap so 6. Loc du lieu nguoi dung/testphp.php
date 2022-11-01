<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="submit" name="submit">

    </form>
    <?php
    $getUser=$_GET['u'];
    echo $getUser;
    $connect = mysqli_connect("localhost", "root", "", "at150252");
    $sql = " SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getUser'";
    $query=mysqli_query($connect,$sql);
    var_dump($query);
    ?>
</body>
</html>