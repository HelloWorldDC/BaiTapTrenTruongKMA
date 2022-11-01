<?php


$InforNeedQuery=$_POST['InforGetKH'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = " SELECT * FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$InforNeedQuery'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
      echo $row['MaKH'];
      echo "$";
      echo $row['HoTen'];
      echo "$";
      echo $row['DiaChi'];
      echo "$";
      echo $row['SDT'];
      echo "$";
      echo $row['MaDD'];
      echo "$";
      echo $row['Email'];
      echo "$";
      echo $row['NDRequest'];
      echo "$";
      echo $row['GiaTien'];
      echo "$";
      echo $row['SoLuongKhaoSat'];
      echo "$";
      echo $row['SoCauKhaoSat'];
    }
  }





?>