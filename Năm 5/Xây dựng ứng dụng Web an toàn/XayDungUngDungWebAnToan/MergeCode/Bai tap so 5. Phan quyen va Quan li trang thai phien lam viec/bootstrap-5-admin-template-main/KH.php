
<?php
// Set cookie
if(isset($_GET['u'])){
  $loginUser=$_GET['u'];
  setcookie("User",$loginUser,time()+3600000000);
  
echo $_COOKIE['User'];
}
// if(empty($_COOKIE['User'])){
//     header("Location:http://localhost/XayDungUngDungWebAnToan/MergeCode/Bai%20tap%20so%206.%20Loc%20du%20lieu%20nguoi%20dung/");
// }
// setcookie("User","kh5",time()+3600);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

  <!-- MDB -->
  <link rel="stylesheet" id="libmdb" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" id="custommdb" href="css/admin.css" />
  <!-- Stepper -->
  <link rel="stylesheet" href="../bs-stepper.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>
<style>
  .active {
    z-index: 2;
    color: #fff;
    background-color: #1266f1;
    border-color: #1266f1
  }

  .text-sm-right {
    text-align: right;
  }
</style>
<?php


?>
<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse sidebar collapse bg-white " style="width: 255px;display: block;">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          
          <a href="?click=QLKS" id="QLKS" class="list-group-item list-group-item-action py-2 ripple active">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Quản lý khảo sát</span>
          </a>
          <a href="?click=DKKS" id="DKKS" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-bar fa-fw me-3"></i><span>Đăng ký khảo sát</span></a>
          <a href="?click=THKS" id="THKS" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-building fa-fw me-3"></i><span>Thực hiện khảo sát</span></a>
          <a href="?click=Money" id="Money" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-building fa-fw me-3"></i><span>Số Dư</span></a>
          <a href="?click=MK" id="MK" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-lock fa-fw me-3"></i><span>Mật khẩu</span></a>
          <!-- <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a> -->
        </div>
      </div>
    </nav>
    <!-- Sidebar -->






    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button onclick="toggleButton()" style="display: block;" class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AJc5JmSXHiHunD8XTrOjOTMRvch9HSsGXYVRxsD-ronWlxCVn41fo6bLcyrK2U0kOmdVP4_B2F7ldPM=w1920-h942" height="25" alt="" loading="lazy" />
        </a>
        <!-- Search form -->
        <form class="d-none d-md-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded" placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
          <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
        </form>

        <span name="InforUserLogin" class="Text-center" >Đang đăng nhập với User: <?php echo $_COOKIE['User']?></span>
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Some news</a></li>
              <li><a class="dropdown-item" href="#">Another news</a></li>
              <li>
                <a class="dropdown-item" href="#">Something else</a>
              </li>
            </ul>
          </li>

          <!-- Icon -->
          <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="#">
              <i class="fas fa-fill-drip"></i>
            </a>
          </li>
          <!-- Icon -->
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li>

          <!-- Icon dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="united kingdom flag m-0"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                  <i class="fa fa-check text-success ms-2"></i></a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="china flag"></i>中文</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="japan flag"></i>日本語</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="germany flag"></i>Deutsch</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="france flag"></i>Français</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="spain flag"></i>Español</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="russia flag"></i>Русский</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="portugal flag"></i>Português</a>
              </li>
            </ul>
          </li>

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="https://scontent.fhan7-1.fna.fbcdn.net/v/t1.6435-9/50879375_2185120965033677_7329070255618129920_n.jpg?ccb=1-7&_nc_sid=09cbfe&_nc_ohc=ybqaRelLUpYAX8C5SU4&tn=otUNIVGJjf0LduhC&_nc_ht=scontent.fhan7-1.fna&oh=00_AT-3bv89-PQUbK4HdLQ8hBo_AG5oCa24oLIqBsQGfzY0DA&oe=63612F58" class="rounded-circle" height="22" alt="" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">My profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="../../Bai tap so 6. Loc du lieu nguoi dung/">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <?php
//    Kiểm tra xem người dùng đã được phê duyêt đăng ký khảo sát chưa thì mới cho phép mở chức năng quản lý khảo sát
  $connect = mysqli_connect("localhost", "root", "", "at150252");
  $getUserCurrent=$_COOKIE['User'];
  $sql = " SELECT * FROM `35dangtienthanh_dangkykhaosat` WHERE Username='$getUserCurrent'";
  $query = mysqli_query($connect, $sql);
  $statusDKKS="";
  if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
      $statusDKKS=$row['Status'];
    }
  }
//   Kết thúc kiểm tra phê duyệt đăng ký



  if (isset($_GET['click'])) {
    $selectClick = $_GET['click'];
    $selectThaotacQLKS="";
    if(isset($_GET['thaotac'])){
      $selectThaotacQLKS=$_GET['thaotac'];
    }
     if ($selectClick === "MK") {
      echo '<script>document.getElementById("MK").classList.add("active");
                    document.getElementById("QLKS").classList.remove("active");
            </script>';
      include("../ThayDoiMK.php");
    }
    else if($selectClick==="Money"){
        echo '<script>document.getElementById("Money").classList.add("active");
                    document.getElementById("QLKS").classList.remove("active");
            </script>';
      include("../MoneySoDu.php");
    }
    else if ($selectClick === "QLKS") {
        if($statusDKKS==="Pending"||$statusDKKS===""){
            include("../DangKyKhaoSatChuaDuocPheDuyet.php");
        }
        else{
            if($selectThaotacQLKS==="DSNTGKS"){
                include("../DSPersonJoinKS.php");
              }
              else if($selectThaotacQLKS==="ThemCHKS"){
                include("../ThemCauHoiKS.php");
              }
              else if($selectThaotacQLKS==="XemKQKS"){
                include("../XemKQKS.php");
              }
              else{
              include("../QuanlyKhaoSat.php");
              }
        }
      
    }
    else if($selectClick==="NoRightAddSurvey"){
      include("../KhongCoQuyenTaoKhaoSatKH.php");
    }
    else if($selectClick==="NoRightAddPersonJoinKS"){
      include("../KhongCoQuyenThemPersonJoinKSKH.php");
    }
    else if($selectClick==="NoRightEditPersonJoinKS"){
      include("../KhongCoQuyenSuaPersonJoinKSKH.php");
    }
    else if($selectClick==="NoRightDeletePersonJoinKS"){
      include("../KhongCoQuyenXoaPersonJoinKSKH.php");
    }
     else if ($selectClick === "DKKS") {
      echo '<script>document.getElementById("DKKS").classList.add("active");
                    document.getElementById("QLKS").classList.remove("active");
            </script>';
      include("../DangKyKhaoSat.php");
    }
    else if($selectClick==="THKS"){
      echo '<script>document.getElementById("THKS").classList.add("active");
                    document.getElementById("QLKS").classList.remove("active");
            </script>';
      include("../ThucHienKS.php");
    }
  } else if (isset($_GET['click']) == false) {
    if($statusDKKS==="Pending"||$statusDKKS===""){
        include("../DangKyKhaoSatChuaDuocPheDuyet.php");
    }
    else{
    include("../QuanlyKhaoSat.php");
    }
  }

  ?>

  <!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>




<script>
  // Edit thông tin tài khoản người tham gia khảo sát (DSPersonJoinKS.php)
  function EditPersonJoinKS(elementDSPersonJoinKS){
    $.post("../EditPersonJoinKS.php",{EditPersonJoinKS:elementDSPersonJoinKS.value},function(data){
      var dataInforPersonJoinKS = data.split("$");
      document.getElementById("SDTEditDelete").value=dataInforPersonJoinKS[0];
      document.getElementById("LocateEditDelete").value=dataInforPersonJoinKS[1];
      document.getElementById("UsernameEditDelete").value=dataInforPersonJoinKS[2];
    });
  }
</script>
<script>
  // Trả lời khảo sát (ThucHienKS.php)
  var getSoCauHoi=<?php echo $SoCauHoiKS?>;
  var checkSoCauHoi=0;
  function SelectCauTraLoiKS(elementTraLoiKS){
    checkSoCauHoi=checkSoCauHoi+1;
    var getCauTraLoiKS=elementTraLoiKS.value;
    var phantichCauTraLoiKS=getCauTraLoiKS.split("-");
    // Ẩn câu hỏi khảo sát
    document.getElementById(phantichCauTraLoiKS[1]).style.display="none";
    var IDKhaoSat=phantichCauTraLoiKS[0];
    var CauHoiKhaoSat=phantichCauTraLoiKS[1];
    var CauTraLoiKhaoSat=phantichCauTraLoiKS[2];
    if(checkSoCauHoi==getSoCauHoi){
      var PhanThuong= <?php echo $_GET['Price']?>;
      var getUsernameCookie=document.cookie;
      var phantichUsername=getUsernameCookie.split("=");
    //   window.open("../SaveMoneySurvey.php?SaveMoneyUsername="+phantichUsername[1]+"&MoneySurvey="+PhanThuong,"_self");
      $.post("../SaveMoneySurvey.php",{SaveMoneyUsername:phantichUsername[1],MoneySurvey:PhanThuong});
      document.write("<p style='color:green;'>Xin chúc mừng bạn nhận được"+PhanThuong+"đ"+"</p>");
    }
    $.post("../LuuThongTinThucHienKS.php",{getIDKhaoSat:IDKhaoSat,getCauHoiKhaoSat:CauHoiKhaoSat,getCauTraLoiKhaoSat:CauTraLoiKhaoSat});
  }
</script>

</html>