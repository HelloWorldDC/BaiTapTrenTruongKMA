<?php


$ndduyet=$_POST['DuyetND'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = "UPDATE `35dangtienthanh_quanlykhaosat` SET `Status`='Active' WHERE MaKH='$ndduyet' ";
$query = mysqli_query($connect, $sql);

mysqli_close($connect);


?>