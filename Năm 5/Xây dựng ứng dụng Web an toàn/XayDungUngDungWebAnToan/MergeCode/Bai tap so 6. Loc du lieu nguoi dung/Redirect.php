<?php
$getUser=$_GET['u'];
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = " SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getUser'";
$query = mysqli_query($connect, $sql);
echo $getUser;
var_dump($query);
if (mysqli_num_rows($query) > 0||$getUser==="admin") {
    // output data of each row
    if($getUser==="admin"){
      header("Location:http://localhost/XayDungUngDungWebAnToan/MergeCode/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/Administrator.php");
    }
    while($row = mysqli_fetch_assoc($query)) {
      var_dump($row);
      if($row['Role']==="NV"){
        header("Location:http://localhost/XayDungUngDungWebAnToan/MergeCode/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/NV.php?u=$getUser");
      }
      else if($row['Role']==="KH"){
        if(isset($_GET['id'])&&isset($_GET['Price'])){
            $getid=$_GET['id'];
            $getPrice=$_GET['Price'];
            header("Location:http://localhost/XayDungUngDungWebAnToan/MergeCode/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/KH.php?click=THKS&u=$getUser&id=$getid&Price=$getPrice");
        }
        else{

            header("Location:http://localhost/XayDungUngDungWebAnToan/MergeCode/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/KH.php?u=$getUser");
        }
      }
      
    }
  }




?>