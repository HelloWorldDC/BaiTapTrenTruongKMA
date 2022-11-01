
<?php

$getUsernametoSaveMoney=$_POST['SaveMoneyUsername'];
$getMoneySurvey=$_POST['MoneySurvey'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = "SELECT * FROM `35dangtienthanh_moneysurvey` WHERE Username='$getUsernametoSaveMoney'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($query);
    $CongMoney=$row['SoDu']+$getMoneySurvey;
    $sql="UPDATE `35dangtienthanh_moneysurvey` SET `SoDu`='$CongMoney' WHERE Username='$getUsernametoSaveMoney'";
    $query = mysqli_query($connect, $sql);
  }
  else{
    $sql="INSERT INTO `35dangtienthanh_moneysurvey`(`Username`, `SoDu`) VALUES ('$getUsernametoSaveMoney','$getMoneySurvey')";
    $query = mysqli_query($connect, $sql);
  }



?>