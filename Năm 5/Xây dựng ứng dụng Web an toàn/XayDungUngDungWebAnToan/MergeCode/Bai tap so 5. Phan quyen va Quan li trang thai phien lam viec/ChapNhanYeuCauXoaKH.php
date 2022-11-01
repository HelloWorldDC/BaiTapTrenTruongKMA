<?php

$getYCXoa=$_POST['YCXoaMaKH'];
// Tách Mã KH ra khỏi "(1)"
$phantichgetYCXoa=explode("(",$getYCXoa);

$connect = mysqli_connect("localhost", "root", "", "at150252");
// Xóa dữ liệu đã yêu cầu
$sql = "DELETE FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$phantichgetYCXoa[0]'";
  $query = mysqli_query($connect, $sql);
//   Xóa bản nháp dữ liệu đã yêu cầu
$sql = "DELETE FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getYCXoa'";
  $query = mysqli_query($connect, $sql);
  // Xóa kèm các câu hỏi khảo sát của khảo sát đó
  $sql = "DELETE FROM `35dangtienthanh_cauhoikhaosat` WHERE MaKS='$phantichgetYCXoa[0]'";
  $query = mysqli_query($connect, $sql);
mysqli_close($connect);
?>
