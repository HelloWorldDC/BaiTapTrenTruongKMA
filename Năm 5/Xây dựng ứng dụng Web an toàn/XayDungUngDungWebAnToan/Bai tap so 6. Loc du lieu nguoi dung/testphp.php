<?php

$connect = mysqli_connect("localhost", "root", "", "at150252");
$sqlUpdatePass="UPDATE `35dangtienthanh_inforuser` SET `Password`='123jhgjhb4' WHERE Email='hehllo1sdfsdf234@outlook.com'";
$query = mysqli_query($connect, $sqlUpdatePass);
var_dump($query);
mysqli_close($connect);
