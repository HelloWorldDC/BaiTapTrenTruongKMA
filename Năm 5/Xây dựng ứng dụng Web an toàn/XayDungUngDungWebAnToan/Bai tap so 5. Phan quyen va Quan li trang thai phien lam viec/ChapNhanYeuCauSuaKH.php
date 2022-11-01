<?php

$getYCSua=$_POST['YCSuaMaKH'];
// Tách Mã KH ra khỏi "(1)"
$phantichgetYCSua=explode("(",$getYCSua);

$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = " SELECT * FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getYCSua'";
$query = mysqli_query($connect, $sql);
// Lưu lại thông tin cần sửa của cái chứa "(1)"
$saveHoTen="";
$saveDiaChi="";
$saveSDT="";
$saveMaDD="";
$saveEmail="";
$saveNDRequest="";
$saveGiaTien="";
$saveSoLuongKhaoSat="";
$saveSoCauKhaoSat="";
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
        $saveHoTen=$row['HoTen'];
        $saveDiaChi=$row['DiaChi'];
        $saveSDT=$row['SDT'];
        $saveMaDD=$row['MaDD'];
        $saveEmail=$row['Email'];
        $saveNDRequest=$row['NDRequest'];
        $saveGiaTien=$row['GiaTien'];
        $saveSoLuongKhaoSat=$row['SoLuongKhaoSat'];
        $saveSoCauKhaoSat=$row['SoCauKhaoSat'];
    }
  }

//   Thực hiện sửa dữ liệu
  $sql = "UPDATE `35dangtienthanh_quanlykhaosat` SET `HoTen`='$saveHoTen',`DiaChi`='$saveDiaChi',`SDT`='$saveSDT',`MaDD`='$saveMaDD',`Email`='$saveEmail',`NDRequest`='$saveNDRequest',`GiaTien`='$saveGiaTien',`SoLuongKhaoSat`='$saveSoLuongKhaoSat',`SoCauKhaoSat`='$saveSoCauKhaoSat' WHERE MaKH='$phantichgetYCSua[0]'";
  $query = mysqli_query($connect, $sql);

//   Xóa bản nháp dữ liệu đã yêu cầu
$sql = "DELETE FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getYCSua'";
  $query = mysqli_query($connect, $sql);
mysqli_close($connect);
?>