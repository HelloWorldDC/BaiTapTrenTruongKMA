<?php

$getYCXoa=$_POST['YCXoaMaKH'];

$connect = mysqli_connect("localhost", "root", "", "at150252");
//   Xóa bản nháp dữ liệu đã yêu cầu
$sql = "DELETE FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getYCXoa'";
  $query = mysqli_query($connect, $sql);
mysqli_close($connect);










?>