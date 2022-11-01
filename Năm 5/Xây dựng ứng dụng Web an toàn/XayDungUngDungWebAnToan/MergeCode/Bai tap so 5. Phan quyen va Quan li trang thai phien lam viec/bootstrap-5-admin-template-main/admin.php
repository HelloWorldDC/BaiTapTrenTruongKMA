
<?php
// Set cookie
if(isset($_GET['u'])){
  $loginUser=$_GET['u'];
  setcookie($loginUser,"1",time()+3600);
  
echo $_COOKIE[$loginUser];
}

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
          
          <a href="?click=User" id="Home" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Thông tin người dùng</span>
          </a>
          <a href="?click=AddNV" id="AddNV" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Thêm nhân viên </span>
          </a>
          <a href="?click=MK" id="MK" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-lock fa-fw me-3"></i><span>Mật khẩu</span></a>
          <a href="?click=KH" id="KH" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-line fa-fw me-3"></i><span>Thông tin khách hàng</span></a>
          <a href="?click=QLKS" id="QLKS" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Quản lý khảo sát</span>
          </a>
          <a href="?click=DKKS" id="DKKS" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-bar fa-fw me-3"></i><span>Đăng ký khảo sát</span></a>
          <a href="?click=KHTKKH" id="KHTKKH" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-globe fa-fw me-3"></i><span>Kích hoạt tài khoản</span></a>
          <a href="?click=THKS" id="THKS" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-building fa-fw me-3"></i><span>Thực hiện khảo sát</span></a>
          <a href="?click=KHforAdmin" id="KHforAdmin" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-calendar fa-fw me-3"></i><span>Thông tin khách hàng Admin</span></a>
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
  if (isset($_GET['click'])) {
    $selectClick = $_GET['click'];
    $selectThaotacQLKS="";
    if(isset($_GET['thaotac'])){
      $selectThaotacQLKS=$_GET['thaotac'];
    }
    if ($selectClick === "AddNV") {
      echo '<script>document.getElementById("AddNV").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../ThemNV.php");
    } else if ($selectClick === "MK") {
      echo '<script>document.getElementById("MK").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../ThayDoiMK.php");
    } else if ($selectClick === "KH") {
      echo '<script>document.getElementById("KH").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../InforKH.php");
    } else if ($selectClick === "User") {
      include("../InforUser.php");
    } 
    else if ($selectClick === "QLKS") {
      if($selectThaotacQLKS==="DSNTGKS"){
        echo '<script>document.getElementById("QLKS").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
        include("../DSPersonJoinKS.php");
      }
      else if($selectThaotacQLKS==="ThemCHKS"){
        echo '<script>document.getElementById("QLKS").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
        include("../ThemCauHoiKS.php");
      }
      else if($selectThaotacQLKS==="XemKQKS"){
        echo '<script>document.getElementById("QLKS").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
        include("../XemKQKS.php");
      }
      else{
      echo '<script>document.getElementById("QLKS").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../QuanlyKhaoSat.php");
      }
    }
     else if ($selectClick === "DKKS") {
      echo '<script>document.getElementById("DKKS").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../DangKyKhaoSat.php");
    }
    else if($selectClick==="KHTKKH"){
      echo '<script>document.getElementById("KHTKKH").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../KichHoatTKKHPage.php");
    }
    else if($selectClick==="THKS"){
      echo '<script>document.getElementById("THKS").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../ThucHienKS.php");
    }
    else if($selectClick==="KHforAdmin"){
      echo '<script>document.getElementById("KHforAdmin").classList.add("active");
                    document.getElementById("Home").classList.remove("active");
            </script>';
      include("../InforKHforAdmin.php");
    }
  } else if (isset($_GET['click']) == false) {
    include("../InforUser.php");
  }

  ?>

  <!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
<script>
  function toggleButton() {
    var click_navbar = "<?php echo $selectClick ?>";
    if (click_navbar === "KH" || click_navbar === "KHforAdmin") {
      var check_Toggle_button = document.getElementById('sidebarMenu').style.display;
      if (check_Toggle_button === "block") {
        document.getElementById('sidebarMenu').style.display = 'none';
        var table_data_KH_full_screen = document.getElementById("tableInforKH");
        table_data_KH_full_screen.style.margin = "60px 0px 10px 0px";
      } else {
        document.getElementById('sidebarMenu').style.display = 'block';
        var table_data_KH_no_full_screen = document.getElementById("tableInforKH");
        table_data_KH_no_full_screen.style.margin = "60px 10px 10px 280px";
      }
    }
  }
</script>
<script>
  // Thay đổi quyền theo vai trò khi click (InforUser.php)
  function Right() {
    var selectRight = document.getElementById("selectRight");
    var selectedValue = selectRight.options[selectRight.selectedIndex].value;
    if (selectedValue == 1) {
      document.getElementById("RightForNV").style.display = "block";
      document.getElementById("RightForKH").style.display = "none";
    } else if (selectedValue == 2) {
      document.getElementById("RightForNV").style.display = "none";
      document.getElementById("RightForKH").style.display = "block";
    } else {
      document.getElementById("RightForNV").style.display = "none";
      document.getElementById("RightForKH").style.display = "none";
    }
  }
</script>

<script>
  // Chỉnh sửa thông tin User (InforUser.php)
  function EditUser(element) {
    $.post("../ClickgetInforUser.php", {
      GetUserInfor: element.value
    }, function(data) {
      var dataInfor = data.split("$");
      document.getElementById("InforUser").value = dataInfor[0];
      document.getElementById("InforEmail").value = dataInfor[2];
      var getRole = dataInfor[5];
      if (getRole === "NV") {
        document.getElementById("selectRight").value = 1;
        document.getElementById("RightForNV").style.display = "block";
        document.getElementById("RightForKH").style.display = "none";
      } else if (getRole === "KH") {
        document.getElementById("selectRight").value = 2;
        document.getElementById("RightForKH").style.display = "block";
        document.getElementById("RightForNV").style.display = "none";
      }
      var getRightUser = dataInfor[6];
      console.log(getRightUser);
      if (getRole === "KH") {
        if (getRightUser.charAt(0) === "1") {
          document.getElementById("RightCreateSurvey").checked = true;
        } else {
          document.getElementById("RightCreateSurvey").checked = false;
        }
        if (getRightUser.charAt(1) === "1") {
          document.getElementById("RightAddPersonSurvey").checked = true;
        } else {
          document.getElementById("RightAddPersonSurvey").checked = false;
        }
        if (getRightUser.charAt(2) === "1") {
          
          document.getElementById("RightEditPersonSurvey").checked = true;
        } else {
          document.getElementById("RightEditPersonSurvey").checked = false;
        }
        if (getRightUser.charAt(3) === "1") {
          document.getElementById("RightDeletePersonSurvey").checked = true;
        } else {
          document.getElementById("RightDeletePersonSurvey").checked = false;
        }
      }
      else if(getRole === "NV"){
        if (getRightUser.charAt(0) === "1") {
          document.getElementById("RightAdd").checked = true;
        } else {
          document.getElementById("RightAdd").checked = false;
        }
        if (getRightUser.charAt(1) === "1") {
          document.getElementById("RightEdit").checked = true;
        } else {
          document.getElementById("RightEdit").checked = false;
        }
        if (getRightUser.charAt(2) === "1") {
          document.getElementById("RightDelete").checked = true;
        } else {
          document.getElementById("RightDelete").checked = false;
        }
      }

    }, "text");
  }
</script>
<script>
  // Kích hoạt tài khoản khách hàng (KichHoatTKKHPage.php)
  function DuyetTKKH(elementKH){
    $.post("../DuyetTKKH.php",{TKDuyet:elementKH.value},function(){
      location.reload();
    });
  }
</script>
<script>
  // Duyệt nội dung khảo sát (InforKH.php)
  function DuyetNDKS(elementDDuyetNDKS){
    $.post("../DuyetNDKS.php",{DuyetND:elementDDuyetNDKS.value},function(){
      location.reload();
    });
  }
</script>
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
      document.write("<p style='color:green;'>Xin chúc mừng bạn nhận được"+PhanThuong+"đ"+"</p>");
    }
    $.post("../LuuThongTinThucHienKS.php",{getIDKhaoSat:IDKhaoSat,getCauHoiKhaoSat:CauHoiKhaoSat,getCauTraLoiKhaoSat:CauTraLoiKhaoSat});
  }
</script>
<script>
  // Lấy dữ liệu khách hàng (InforKH.php)
  function click_btn_Edit(elementEditKH){
    console.log(elementEditKH);
    $.post("../GetInforKH.php",{InforGetKH:elementEditKH.value},function(dataGetInfor){
      var phantichdataGetInfor=dataGetInfor.split("$");
      document.getElementById("MaKH").value=phantichdataGetInfor[0];
      document.getElementById("HoTen").value=phantichdataGetInfor[1];
      document.getElementById("Locate").value=phantichdataGetInfor[2];
      document.getElementById("SDT").value=phantichdataGetInfor[3];
      document.getElementById("MDD").value=phantichdataGetInfor[4];
      document.getElementById("EmailKH").value=phantichdataGetInfor[5];
      document.getElementById("NDRequest").value=phantichdataGetInfor[6];
      document.getElementById("Price").value=phantichdataGetInfor[7];
      document.getElementById("AmountSurvey").value=phantichdataGetInfor[8];
      document.getElementById("QuestionSurvey").value=phantichdataGetInfor[9];
    });
  }
</script>
<script>
  // Chấp nhận sửa thông tin khách hàng (InforKHforAdmin.php)
  function ChapNhanYeuCau(elementEditRequestChapNhan){
    var phantichYCEdit=elementEditRequestChapNhan.value.split("-");
    if(phantichYCEdit[1]==1){
      $.post("../ChapNhanYeuCauSuaKH.php",{YCSuaMaKH:phantichYCEdit[0]},function(){
      location.reload();
    });
    }
    else{
      $.post("../ChapNhanYeuCauXoaKH.php",{YCXoaMaKH:phantichYCEdit[0]},function(){
      location.reload();
    });
  }
    
  }
</script>
<script>
  // Từ chối sửa thông tin khách hàng (InforKHforAdmin.php)
  function TuChoiYeuCau(elementEditRequestTuChoi){
    var phantichYCEdit=elementEditRequestTuChoi.value.split("-");
    if(phantichYCEdit[1]==1){
      $.post("../TuChoiYeuCauSuaKH.php",{YCSuaMaKH:phantichYCEdit[0]},function(){
      location.reload();
    });
    }
    else{
      $.post("../TuChoiYeuCauXoaKH.php",{YCXoaMaKH:phantichYCEdit[0]},function(){
      location.reload();
    });
    }
    
  }
</script>
</html>