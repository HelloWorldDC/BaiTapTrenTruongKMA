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
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Webiste traffic </span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple active"><i class="fas fa-lock fa-fw me-3"></i><span>Password</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
              <li><a class="dropdown-item" href="../index.php">Logout</a></li>
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
  <main style="margin-top: 58px">
    <div class="container pt-4" style="width: 600px;">
      <div style="background-color: #ffffff;padding: 10px;">
        <p class="text-center"><b style="font-size:24px">Thay đổi mật khẩu</b></p>
        <form method="post">
        <!-- Current Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="PaswordCurrent" class="form-control" name="CurrentPassword" />
            <label class="form-label" for="PaswordCurrent">Mật khẩu hiện tại</label>
          </div>  
        <?php
        // Check mật khẩu hiện tại
        // Mã check:
        // 1 là Mật khẩu không được để trống
        // 2 là Mật khẩu hiện tại không đúng
        // 3 là Mật khẩu hiện tại Ok

        if(isset($_POST['CurrentPassword'])){

          
          $getPasswordCurrent=$_POST['CurrentPassword'];
          $hashPasswordCurrent=sha1($getPasswordCurrent);
          $connect = mysqli_connect("localhost", "root", "", "at150252");
              $sqlcheckPasswordCurrent="SELECT * FROM `35dangtienthanh_inforuser` WHERE Password='$hashPasswordCurrent'";
              $query = mysqli_query($connect, $sqlcheckPasswordCurrent);
              mysqli_close($connect);
          if (empty($_POST['PasswordChange'])) {
            $checkPasswordCurrent = 1;
            echo ("<div class='alert alert-danger' id='errorPasswordChange' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                    Mật khẩu hiện tại không được để trống
                    </div>");
          } 
          else if($query->num_rows==0){
            $checkPasswordCurrent = 2;
            echo ("<div class='alert alert-danger' id='changePasswordstaus' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                  Mật khẩu hiện tại không đúng
                  </div>");
          }
          else{
            $checkPasswordCurrent = 3;
          }
        }

        
        
        
        
        ?>
        
        
        
        <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="changePassword" class="form-control" name="PasswordChange" />
            <label class="form-label" for="changePassword">Mật khẩu mới</label>
          </div>

          <?php

          //Check Passwrod mới
          // Mã check:
          // 1 là Password không được để trống
          // 2 là Password phải ít nhất 8 ký tự
          // 3 là Password phải ít nhất 1 chữ thường, 1 chữ hoa, 1 chữ số và 1 ký tự đặc biệt
          // 4 là Password không được chứa Username
          // 5 là Password được chấp nhận
          if (isset($_POST['PasswordChange'])) {
            $checkPasswordChangeLowerCase = preg_match("/[a-z]/", $_POST['PasswordChange']);
            $checkPasswordChangeUpperCase = preg_match("/[A-Z]/", $_POST['PasswordChange']);
            $checkPasswordChangeDigit = preg_match("/[0-9]/", $_POST['PasswordChange']);
            $checkPasswordChangeSpecial = preg_match("/[~`!@#$%^&*()-_+={}|'\"]/", $_POST['PasswordChange']);
            if (empty($_POST['PasswordChange'])) {
              $checkPasswordChange = 1;
              echo ("<div class='alert alert-danger' id='errorPasswordChange' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                              Mật khẩu mới không được để trống
                              </div>");
            } else if (strlen($_POST['PasswordChange']) < 8) {
              $checkPasswordChange = 2;
              echo ("<div class='alert alert-danger' id='errorPasswordChange' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                              Mật khẩu phải ít nhất 8 ký tự
                              </div>");
            } else if ($checkPasswordChangeLowerCase == 0 || $checkPasswordChangeUpperCase == 0 || $checkPasswordChangeDigit == 0 || $checkPasswordChangeSpecial == 0) {
              $checkPasswordChange = 3;
              echo ("<div class='alert alert-danger' id='errorPasswordChange' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                              Mật khẩu phải có ít nhất 1 chữ Hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt
                              </div>");
            }
            
            else if(($_POST['PasswordChange'] === $_POST['CurrentPassword']) != 0){
              
              $checkPasswordChange = 4;
              echo ("<div class='alert alert-danger' id='errorPasswordChange' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                              Mật khẩu mới không được trùng với mật khẩu hiện tại
                              </div>");
            }
          
            // else if (preg_match("/" . $_POST['UsernameRegister'] . "/", $_POST['PasswordRegister']) == 1) {
            //   $checkPassword = 4;
            //   echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
            //                     Mật khẩu chứa tên đăng nhập
            //                     </div>");
            // } 
            else {
              $checkPasswordChange = 6;
            }
          }




          // Kết thúc Check Password



          ?>
          <!-- Repeat Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="changeRepeatPassword" class="form-control" name="PasswordRepeatChange" />
            <label class="form-label" for="changeRepeatPassword">Xác nhận mật khẩu</label>
          </div>


          <?php
          // Check nhập lại Password
          // Mã check
          // 1 là Password nhập lại không trùng với Password đã nhập
          // 2 là Password trùng khớp

          if (isset($_POST['PasswordChange']) && isset($_POST['PasswordRepeatChange'])) {
            if (($_POST['PasswordChange'] === $_POST['PasswordRepeatChange']) != 1) {
              $checkPasswordRepeatChange = 1;
              echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                      Xác nhận mật khẩu không khớp. Vui lòng nhập lại.
                      </div>");
            } else {
              $checkPasswordRepeatChange = 2;
            }
          }




          ?>

          <?php
          //  Thay đổi mật khẩu
          if(isset($_POST['PasswordChange'])&&isset($_POST['PasswordRepeatChange'])&&isset($_POST['CurrentPassword'])){
            if($checkPasswordChange==6&&$checkPasswordRepeatChange==2&&$checkPasswordCurrent==3){
              $getEmail=$_GET['email'];
              $getPasswordChange=$_POST['PasswordChange'];
              $hashgetPasswordChange=sha1($getPasswordChange);
              $connect = mysqli_connect("localhost", "root", "", "at150252");
              $sqlUpdatePass="UPDATE `35dangtienthanh_inforuser` SET `Password`='$hashgetPasswordChange' WHERE Email='$getEmail'";
              $query = mysqli_query($connect, $sqlUpdatePass);
              if($query){
                echo ("<div class='alert alert-danger' id='changePasswordstaus' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:green' role='alert'>
                      Thay đổi mật khẩu thành công
                      </div>");
              }
              mysqli_close($connect);

            }
          }
          
          
          
          ?>








          <!-- Back button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" style="background-color:#3b71ca ;">Thay đổi mật khẩu</button>
        </form>


      </div>
    </div>
  </main>

  <!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>