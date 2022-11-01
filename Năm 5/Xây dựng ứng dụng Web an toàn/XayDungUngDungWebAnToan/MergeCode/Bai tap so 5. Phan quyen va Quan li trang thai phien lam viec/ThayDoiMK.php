<main style="margin-top: 58px">
<div class="container pt-4" style="width: 600px;">
  <div style="background-color: #ffffff;padding: 10px;">
    <p class="text-center"><b style="font-size:24px">Thay đổi mật khẩu</b></p>
    <form method="post">
    <!-- Current Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="PaswordCurrent" class="form-control" name="CurrentPassword" style="color:black;" />
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
      $getUsernameCurrent="";
      $connect = mysqli_connect("localhost", "root", "", "at150252");
      // Truy mật khẩu hiện tại và kiểm tra xem đã nhập đúng mật khẩu hiện tại không
      if(isset($_COOKIE['User'])){
        $getUsernameCurrent=$_COOKIE['User'];
        
        $sqlcheckPasswordCurrent="SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getUsernameCurrent' AND Password='$hashPasswordCurrent'";
      }
      else{
        $getEmail=$_GET['email'];
        $sqlcheckPasswordCurrent="SELECT * FROM `35dangtienthanh_inforuser` WHERE Email='$getEmail' AND Password='$hashPasswordCurrent'";
      }
          $query = mysqli_query($connect, $sqlcheckPasswordCurrent);
          mysqli_close($connect);
      if (empty($_POST['CurrentPassword'])) {
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
        <input type="password" id="changePassword" class="form-control" name="PasswordChange" style="color:black;"/>
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
        <input type="password" id="changeRepeatPassword" class="form-control" name="PasswordRepeatChange" style="color:black;"/>
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
          
          $getPasswordChange=$_POST['PasswordChange'];
          $hashgetPasswordChange=sha1($getPasswordChange);
          $connect = mysqli_connect("localhost", "root", "", "at150252");
          if(isset($_COOKIE['User'])){
            $getUserCurrent=$_COOKIE['User'];
            $sqlUpdatePass="UPDATE `35dangtienthanh_inforuser` SET `Password`='$hashgetPasswordChange' WHERE Username='$getUserCurrent'";

          }
          else{
            $getEmail=$_GET['email'];
            $sqlUpdatePass="UPDATE `35dangtienthanh_inforuser` SET `Password`='$hashgetPasswordChange' WHERE Email='$getEmail'";
          }
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










