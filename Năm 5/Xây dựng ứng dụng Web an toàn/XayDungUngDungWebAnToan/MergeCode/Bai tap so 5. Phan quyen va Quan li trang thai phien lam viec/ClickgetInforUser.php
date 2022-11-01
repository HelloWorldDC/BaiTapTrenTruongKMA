
<?php
$getUser=$_POST['GetUserInfor'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = " SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getUser'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($query)) {
    echo $row['Username'];
    echo "$";
    echo $row['Password'];
    echo "$";
    echo $row['Email'];
    echo "$";
    echo $row['Phone'];
    echo "$";
    echo $row['Locate'];
    echo "$";
    echo $row['Role'];
    echo "$";
    echo $row['RightUser'];
    echo "$";
  }
}
mysqli_close($connect);

?>
