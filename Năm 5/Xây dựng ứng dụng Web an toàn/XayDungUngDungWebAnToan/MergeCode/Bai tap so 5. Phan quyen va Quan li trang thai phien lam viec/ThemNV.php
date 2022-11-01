<main style="margin-top: 92px">
  <div class="container" style="width: 60%;">
    <div class="bs-stepper">
      <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step" data-target="#logins-part" onclick="clickInforProfile()">
          <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
            <span class="bs-stepper-circle" style="background-color: #3b71ca;" id="circleStep1">1</span>
            <span class="bs-stepper-label" style="color: #3b71ca;" id="text1">Thông tin cá nhân</span>
          </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#information-part" id="InforUserPass" onclick="clickInforUserPass()">
          <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
            <span class="bs-stepper-circle" id="circleStep2">2</span>
            <span class="bs-stepper-label" id="text2">Thông tin tài khoản</span>
          </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#information-part" id="Confir" onclick="clickConfirm()">
          <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
            <span class="bs-stepper-circle" id="circleStep3">3</span>
            <span class="bs-stepper-label" id="text3" >Xác nhận thông tin</span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger"></div>
        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger"></div>
      </div>
    </div>


<form method="post">
    <!-- Thông tin cá nhân nhân viên -->
    <div style="background-color: #ffffff;padding: 10px;" id="UserProfile">
      

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="InforEmail" class="form-control" name="EmailInfor" style="color: black;"/>
          <label class="form-label" for="InforEmail">Email</label>
        </div>

        <!-- Phone input -->
        <div class="form-outline mb-4">
          <input type="text" id="InforPhone" class="form-control" name="PhoneInfor" style="color: black;"/>
          <label class="form-label" for="InforPhone">Số điện thoại</label>
        </div>

        <!-- Locate input -->
        <div class="form-outline mb-4">
          <input type="text" id="InforLocate" class="form-control" name="LocateInfor" style="color: black;"/>
          <label class="form-label" for="InforLocate">Địa chỉ</label>
        </div>



        <!-- Back button -->

        <button type="button" onclick="clickInforUserPass()" class="btn btn-primary mb-4" style="background-color:#3b71ca ;float: right;">Tiếp theo</button>

        <div style="clear: both;"></div>
     
      







    </div>

    <!-- End Thông tin cá nhân nhân viên -->

    <!-- Thông tin tài khoản nhân viên -->

    <div style="background-color: #ffffff;padding: 10px;display: none;" id="UserAndPass">
      
        <!-- Tên đăng nhập input -->
        <div class="form-outline mb-4">
          <input type="text" id="UsernameNV" class="form-control" name="NVUsername" style="color: black;"/>
          <label class="form-label" for="UsernameNV">Tên đăng nhập</label>
        </div>


        <!-- Mật khẩu input -->
        <div class="form-outline mb-4">
          <input type="password" id="PasswordNV" class="form-control" name="NVPassword" style="color: black;"/>
          <label class="form-label" for="PasswordNV">Mật khẩu</label>
        </div>


        <!-- Back button -->

        <button type="button" onclick="clickInforProfile()" class="btn btn-primary mb-4" style="background-color:#3b71ca ;float: left;">Quay lại</button>
        <button type="button" onclick="clickConfirm()" class="btn btn-primary mb-4" style="background-color:#3b71ca ;float: right;">Tiếp theo</button>

        <div style="clear: both;"></div>
      
    </div>
    <!-- End Thông tin tài khoản nhân viên -->



    <!-- Xác nhận thông tin đã điền -->

    <div style="background-color: #ffffff;padding: 10px;display: none;" id="ConfirInfor">
    
    <div class="card-body" >
        <dl class="row">

          <dt class="col-sm-6 text-sm-right">Email:</dt>
          <dd class="col-sm-6" ><span id="ConfirmEmail"></span></dd>

          <dt class="col-sm-6 text-sm-right">Số điện thoại:</dt>
          <dd class="col-sm-6" id="ConfirmPhone"></dd>

          <dt class="col-sm-6 text-sm-right">Địa chỉ:</dt>
          <dd class="col-sm-6" id="ConfirmLocate"></dd>

          <dt class="col-sm-6 text-sm-right">Tên đăng nhập:</dt>
          <dd class="col-sm-6" id="ConfirmUsername"></dd>

          <dt class="col-sm-6 text-sm-right">Mật khẩu:</dt>
          <dd class="col-sm-6" id="ConfirmPassword"></dd>
        </dl>
        <!-- End Row -->

        <!-- Back button -->

        <button type="button" onclick="clickInforUserPass()" class="btn btn-primary mb-4" style="background-color:#3b71ca ;float: left;">Quay lại</button>
        <button type="submit" onclick="" name="AddInforNV" class="btn btn-primary mb-4" style="background-color:#3b71ca ;float: right;">Thêm</button>

        <div style="clear: both;"></div>
      </div>
      
     
    </div>
     <!-- End Xác nhận thông tin đã điền -->
</form>
<?php

if(isset($_POST['AddInforNV'])){
  try {
    $getEmailNV=$_POST['EmailInfor'];
  $getPhoneNV=$_POST['PhoneInfor'];
  $getLocateNV=$_POST['LocateInfor'];
  $getUsernameNV=$_POST['NVUsername'];
  $getPasswordNV=$_POST['NVPassword'];
  $hashgetPasswordNV=sha1($getPasswordNV);
  $connect = mysqli_connect("localhost", "root", "", "at150252");
  $sql = "INSERT INTO `35dangtienthanh_inforuser`(`Username`, `Password`, `Email`, `Phone`, `Locate`, `Role`, `RightUser`)
          VALUES ('$getUsernameNV','$hashgetPasswordNV','$getEmailNV','$getPhoneNV','$getLocateNV','NV','111')";
  $query = mysqli_query($connect, $sql);
  if($query){
    echo "<p style='color:green;'>Thêm thành công</p>";
  }
  
  } catch (\Throwable $th) {
    echo "<p style='color:red;'>".$th->getMessage()."</p>";
  }
  
}

?>
</main>
<script>
function clickInforUserPass(){
  document.getElementById("circleStep2").style.backgroundColor = "#3b71ca";
  document.getElementById("text2").style.color = "#3b71ca";
  document.getElementById("circleStep1").removeAttribute("style");
  document.getElementById("text1").removeAttribute("style");
  document.getElementById("text3").removeAttribute("style");
  document.getElementById("circleStep3").removeAttribute("style");
  document.getElementById("UserProfile").style.display = "none";
  document.getElementById("UserAndPass").style.display = "block";
  document.getElementById("ConfirInfor").style.display = "none";
  
}
function clickConfirm(){
  document.getElementById("circleStep3").style.backgroundColor = "#3b71ca";
  document.getElementById("text3").style.color = "#3b71ca";
  document.getElementById("circleStep1").removeAttribute("style");
  document.getElementById("text1").removeAttribute("style");
  document.getElementById("text2").removeAttribute("style");
  document.getElementById("circleStep2").removeAttribute("style");
  document.getElementById("UserProfile").style.display = "none";
  document.getElementById("UserAndPass").style.display = "none";
  document.getElementById("ConfirInfor").style.display = "block";
  // Hiển thị thông tin xác nhận

  // Lấy thông tin cá nhân
  var getInforEmail=document.getElementById("InforEmail").value;
  var getInforPhone=document.getElementById("InforPhone").value;
  var getInforLocate=document.getElementById("InforLocate").value;
  // Lấy thông tin tài khoản
  var getInforUsernameNV=document.getElementById("UsernameNV").value;
  var getInforPasswordNV=document.getElementById("PasswordNV").value;

  document.getElementById("ConfirmEmail").innerHTML=getInforEmail;
  document.getElementById("ConfirmPhone").innerHTML=getInforPhone;
  document.getElementById("ConfirmLocate").innerHTML=getInforLocate;
  document.getElementById("ConfirmUsername").innerHTML=getInforUsernameNV;
  document.getElementById("ConfirmPassword").innerHTML=getInforPasswordNV;
  
}
function clickInforProfile(){
  document.getElementById("circleStep1").style.backgroundColor = "#3b71ca";
  document.getElementById("text1").style.color = "#3b71ca";
  document.getElementById("text2").removeAttribute("style");
  document.getElementById("text3").removeAttribute("style");
  document.getElementById("circleStep2").removeAttribute("style");
  document.getElementById("circleStep3").removeAttribute("style");
  document.getElementById("UserProfile").style.display = "block";
  document.getElementById("UserAndPass").style.display = "none";
  document.getElementById("ConfirInfor").style.display = "none";
  
}
</script>