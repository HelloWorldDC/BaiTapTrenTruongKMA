<?php
$getIDKhaoSat=$_POST['getIDKhaoSat'];
$getCauHoiKhaoSat=$_POST['getCauHoiKhaoSat'];
$getCauTraLoiKhaoSat=$_POST['getCauTraLoiKhaoSat'];

$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql="SELECT * FROM `35dangtienthanh_cauhoikhaosat` WHERE MaKS='$getIDKhaoSat' AND CauHoi='$getCauHoiKhaoSat'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
      $TraLoiCo= $row['TraLoiCo'];
      $TangSoCauTraLoiCo=$TraLoiCo+1;
      $TraLoiKhong =$row['TraLoiKhong'];
      $TangSoCauTraLoiKhong=$TraLoiKhong+1;
    }
  }
if($getCauTraLoiKhaoSat==="Y"){
    $sql = "UPDATE `35dangtienthanh_cauhoikhaosat` SET `TraLoiCo`='$TangSoCauTraLoiCo' WHERE MaKS='$getIDKhaoSat' AND CauHoi='$getCauHoiKhaoSat'";
}
else {
    $sql = "UPDATE `35dangtienthanh_cauhoikhaosat` SET `TraLoiKhong`='$TangSoCauTraLoiKhong' WHERE MaKS='$getIDKhaoSat' AND CauHoi='$getCauHoiKhaoSat'";
}
$query = mysqli_query($connect, $sql);


mysqli_close($connect);



?>