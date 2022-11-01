<?php
$connect = mysqli_connect("localhost", "root", "", "at150252");
$getUser=$_COOKIE['User'];
$sql = "SELECT * FROM `35dangtienthanh_moneysurvey` WHERE Username='$getUser'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($query);
    echo '<main style="margin: 100px;">
    <p style="color:green">Bạn hiện có '.$row['SoDu']." đ".'</p>
    </main>';
  }


?>