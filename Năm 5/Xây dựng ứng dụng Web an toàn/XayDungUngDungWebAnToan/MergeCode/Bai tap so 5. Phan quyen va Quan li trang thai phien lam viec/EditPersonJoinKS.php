<?php

$getEditPersonJoinKS=$_POST['EditPersonJoinKS'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = " SELECT * FROM `35dangtienthanh_nguoithamgiakhaosat` WHERE Username='$getEditPersonJoinKS'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($query)) {
    
    echo $row['SDT'];
    echo "$";
    echo $row['Locate'];
    echo "$";
    echo $row['Username'];
  }
}
mysqli_close($connect);



?>