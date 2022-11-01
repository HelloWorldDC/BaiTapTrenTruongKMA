<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quên mật khẩu</title>
  <link rel="stylesheet" type="text/css" href="MDB5-STANDARD-UI-KIT-Free-5.0.0/css/mdb.min.css">
</head>
<style>
  .container {
    width: 500px;
    margin-top: 50px;
  }
</style>

<body>
  <div class="container">


    <!-- Pills content -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form method="post">


          <p class="text-center"><b style="font-size:24px">Quên mật khẩu</b></p>
          <p class="text-left">Nhập email bạn đã đăng ký và bạn nhận được email hướng dẫn cách đặt lại mật khẩu.</p>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="ForgotPassword" class="form-control" name="emailReset"/>
            <label class="form-label" for="ForgotPassword">Nhập email đã đăng ký</label>
          </div>

          <div class='alert alert-danger' id='sendEmailReset' style='font-size: 12px;padding:0.1rem 0.5rem;display:none;background-color:white;color:green' role='alert'>
            Vui lòng kiểm tra Email
          </div>


          <!-- Back button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" >Đặt lại mật khẩu</button>

          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-start">
              <!-- Simple link -->
              <a href="index.php">Đăng nhập</a>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
              <!-- Simple link -->
              <a href="index.php?click=DangKy">Đăng ký</a>
            </div>
          </div>
        </form>
        <?php

        // Mã check:
        // 1 là đã gửi Email
        if(isset($_POST['emailReset'])){
          if(empty($_POST['emailReset'])==false){
            include("SendMailResetMK.php");
            $send=1;
          }
          else{
            $send=2;
          }
        }
        
        
        ?>
      </div>

    </div>
    <!-- Pills content -->
  </div>
  <script src="MDB5-STANDARD-UI-KIT-Free-5.0.0/js/mdb.min.js"></script>
</body>
<script>
  var send = <?php echo $send?>;
if(send==1){
  document.getElementById("sendEmailReset").style.display = "block";
}
else{
  document.getElementById("sendEmailReset").style.display = "block";
  document.getElementById("sendEmailReset").style.color = "red";
  document.getElementById("sendEmailReset").innerHTML = "Vui lòng nhập Email liên hệ";
}
</script>
</html>