<?php
$tkduyet=$_POST['TKDuyet'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = "UPDATE `35dangtienthanh_dangkykhaosat` SET `Status`='Active' WHERE Username='$tkduyet' ";
$query = mysqli_query($connect, $sql);

mysqli_close($connect);




?>