<?php

$getYCSua=$_POST['YCSuaMaKH'];

$connect = mysqli_connect("localhost", "root", "", "at150252");


//   Từ chối sửa thông tin đã yêu cầu
$sql = "DELETE FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getYCSua'";
  $query = mysqli_query($connect, $sql);
mysqli_close($connect);
?>