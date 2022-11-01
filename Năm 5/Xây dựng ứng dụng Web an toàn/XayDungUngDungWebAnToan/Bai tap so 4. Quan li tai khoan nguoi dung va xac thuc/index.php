<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="MDB5-STANDARD-UI-KIT-Free-5.0.0/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<style>
    .container {
        width: 500px;
        margin-top: 50px;
    }
</style>

<body>
    <div class="container">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true" onclick="removeTextRegisterSuccess()"><b>Đăng nhập</b></a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false"><b>Đăng ký</b></a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form method="post">
                    <div class="text-center mb-3">
                        <p>Đăng nhập qua:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>

                    <p class="text-center">hoặc:</p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="loginName" class="form-control" name="NameLogin" />
                        <label class="form-label" for="loginName">Tên đăng nhập</label>
                    </div>

                    <?php
                    // Check Tên đăng nhập Login
                    // Mã check:
                    // 1 là Tên đăng nhập để trống
                    // 2 là OK
                    if (isset($_POST['NameLogin'])) {
                        if (empty($_POST['NameLogin'])) {
                            $checkNameLogin = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Tên đăng nhập không được để trống
                                  </div>");
                        } else {
                            $checkNameLogin = 2;
                        }
                    }


                    ?>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-control" name="PasswordLogin" />
                        <label class="form-label" for="loginPassword">Mật khẩu</label>
                    </div>

                    <?php



                    // Check Mật khẩu Login
                    // Mã check:
                    // 1 là Password để trống
                    // 2 là OK
                    if (isset($_POST['PasswordLogin'])) {
                        if (empty($_POST['PasswordLogin'])) {
                            $checkPasswordLogin = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Mật khẩu không được để trống
                                  </div>");
                        } else {
                            $checkPasswordLogin = 2;
                        }
                    }


                    ?>


                    <div class="g-recaptcha" style="margin-bottom: 20px;" data-sitekey="6LcR1FYiAAAAAAMHCQsL-onVAAxgKbgujTPCSGZM"></div>

                    <?php

                    // Check không phải là người máy
                    // Mã check:
                    // 1 là Iam robot
                    // 2 là Iam not robot


                    if (isset($_POST['g-recaptcha-response'])) {
                        if (empty($_POST['g-recaptcha-response'])) {
                            $checkImNotRobot = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Vui lòng xác minh bạn không phải là người máy
                                  </div>");
                        } else {
                            $checkImNotRobot = 2;
                        }
                    }





                    ?>





                    <?php
                    if (isset($_POST['NameLogin']) && isset($_POST['PasswordLogin'])) {
                        if ($checkNameLogin == 2 && $checkPasswordLogin == 2 && $checkImNotRobot == 2) {
                            //Check không phải là người máy
                            $secret = "6LcR1FYiAAAAAGP9g8Mjh2Vfue7TzGScFkPdFhPz";
                            $response = $_POST['g-recaptcha-response'];
                            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response";
                            $read = file_get_contents($url);
                            $convert = json_decode($read);
                            if ($convert->success == false) {
                                echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Có lỗi xảy ra. Vui lòng thử lại
                                  </div>");
                            } else {
                                // Check thông tin trên cơ sở dữ liệu
                                $inforUsernameLogin = $_POST['NameLogin'];
                                $inforPasswordLogin = $_POST['PasswordLogin'];
                                $hashinforPasswordLogin=sha1($inforPasswordLogin);
                                $connect = mysqli_connect("localhost", "root", "", "at150252");
                                $sql = "  SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$inforUsernameLogin' AND Password='$hashinforPasswordLogin'";
                                $query = mysqli_query($connect, $sql);
                                if ($query->num_rows == 1) {
                                    $closeNotifyError = 1;
                                    header("Location: http://localhost/XayDungUngDungWebAnToan/Bai%20tap%20so%204.%20Quan%20li%20tai%20khoan%20nguoi%20dung%20va%20xac%20thuc/bootstrap-5-admin-template-main/admin.php");
                                } else {
                                    echo ("<div class='alert alert-danger' id='errorLogin' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                        Tài khoản hoặc mật khẩu không đúng
                                        </div>");
                                }
                                mysqli_close($connect);
                            }
                        }
                    }


                    ?>
                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Lưu thông tin </label>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="QuenMK.php">Quên mật khẩu?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Đăng nhập</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Không phải người dùng? <a href="#!" onclick="ClickRegister()">Đăng ký</a></p>
                    </div>
                </form>

            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form method="post">
                    <div class="text-center mb-3">
                        <p>Đăng ký qua:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>

                    <p class="text-center">hoặc:</p>


                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerUsername" class="form-control" name="UsernameRegister" />
                        <label class="form-label" for="registerUsername">Tên đăng nhập</label>
                    </div>

                    <?php

                    // Check Username


                    // Mã check:
                    // 1 là tên đăng nhập để trống
                    // 2 là tên đăng nhập dưới 2 ky tự hoặc lớn hơn 25 ký tự
                    // 3 là tên đăng nhập không khớp với điều kiện:
                    //    -Ký tự đầu là chữ cái Latinh
                    //    -Tên đăng nhập chỉ chứa chữ cái Latinh, chữ số hoặc dấu gạch dưới "_"
                    // 4 là không được đặt tên Username như là:  administrator, root, ...
                    // 5 là Tên đăng nhập đã tồn tại
                    // 6 là Tên đăng nhập được chấp nhận

                    $dontUseUsername = array("administrator", "support", "root", "postmaster", "abuse", "webmaster", "security");
                    if (isset($_POST['UsernameRegister'])) {
                        $getInforUsername=$_POST['UsernameRegister'];
                        $connect = mysqli_connect("localhost", "root", "", "at150252");
                        $sql = "SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getInforUsername'";
                        $query = mysqli_query($connect, $sql);
                        mysqli_close($connect);
                        if (empty($_POST['UsernameRegister'])) {
                            $checkUsername = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Tên đăng nhập không được để trống
                                  </div>");
                        } else if (strlen($_POST['UsernameRegister']) < 3 || strlen($_POST['UsernameRegister']) > 25) {
                            $checkUsername = 2;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Tên đăng nhập quá ngắn hoặc quá dài
                                  </div>");
                        } else if (preg_match("/^[a-zA-Z][a-zA-Z0-9_]+$/", $_POST['UsernameRegister']) == 0) {
                            $checkUsername = 3;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Tên đăng nên bắt đầu bằng chữ và chỉ chứa ký tự chữ Latinh, số hoặc dấu gạch dưới
                                  </div>");
                        } else if (in_array($_POST['UsernameRegister'], $dontUseUsername)) {
                            $checkUsername = 4;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Tên đăng nhập không được chấp nhận, vui lòng đặt tên khác
                                  </div>");
                        } else if($query->num_rows==1){
                            $checkUsername = 5;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác
                                  </div>");
                        }
                        else{
                            $checkUsername = 6;
                        }
                    }


                    // Kết thúc Check Username
                    ?>



                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" name="PasswordRegister" />
                        <label class="form-label" for="registerPassword">Mật khẩu</label>
                    </div>



                    <?php
                    //Check Passwrod
                    // Mã check:
                    // 1 là Password không được để trống
                    // 2 là Password phải ít nhất 8 ký tự
                    // 3 là Password phải ít nhất 1 chữ thường, 1 chữ hoa, 1 chữ số và 1 ký tự đặc biệt
                    // 4 là Password không được chứa Username
                    // 5 là Password được chấp nhận
                    if (isset($_POST['PasswordRegister'])) {
                        $checkPasswordLowerCase = preg_match("/[a-z]/", $_POST['PasswordRegister']);
                        $checkPasswordUpperCase = preg_match("/[A-Z]/", $_POST['PasswordRegister']);
                        $checkPasswordDigit = preg_match("/[0-9]/", $_POST['PasswordRegister']);
                        $checkPasswordSpecial = preg_match("/[~`!@#$%^&*()-_+={}|'\"]/", $_POST['PasswordRegister']);
                        if (empty($_POST['PasswordRegister'])) {
                            $checkPassword = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                Mật khẩu không được để trống
                                </div>");
                        } else if (strlen($_POST['PasswordRegister']) < 8) {
                            $checkPassword = 2;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                Mật khẩu phải ít nhất 8 ký tự
                                </div>");
                        } else if ($checkPasswordLowerCase == 0 || $checkPasswordUpperCase == 0 || $checkPasswordDigit == 0 || $checkPasswordSpecial == 0) {
                            $checkPassword = 3;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                Mật khẩu phải có ít nhất 1 chữ Hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt
                                </div>");
                        } else if (preg_match("/" . $_POST['UsernameRegister'] . "/", $_POST['PasswordRegister']) == 1) {
                            $checkPassword = 4;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                Mật khẩu chứa tên đăng nhập
                                </div>");
                        } else {
                            $checkPassword = 5;
                        }
                    }




                    // Kết thúc Check Password
                    ?>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" class="form-control" name="PasswordRepeatRegister" />
                        <label class="form-label" for="registerRepeatPassword">Nhập lại mật khẩu</label>
                    </div>

                    <?php
                    // Check nhập lại Password
                    // Mã check
                    // 1 là Password nhập lại không trùng với Password đã nhập
                    // 2 là Password trùng khớp

                    if (isset($_POST['PasswordRegister']) && isset($_POST['PasswordRepeatRegister'])) {
                        if (($_POST['PasswordRegister'] === $_POST['PasswordRepeatRegister']) != 1) {
                            $checkPasswordRepeat = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Xác nhận mật khẩu không khớp. Vui lòng nhập lại.
                                  </div>");
                        } else {
                            $checkPasswordRepeat = 2;
                        }
                    }




                    ?>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" name="EmailRegister" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <?php
                    // Check Email
                    // Mã check:
                    // 1 là Email không được để trống
                    // 2 là Email phải là Gmail, Yahoo, Outlook
                    // 3 là Email đã tồn tại
                    // 4 là Email được chấp nhận
                    if (isset($_POST['EmailRegister'])) {

                        $getInforEmail=$_POST['EmailRegister'];
                        $connect = mysqli_connect("localhost", "root", "", "at150252");
                        $sql = "SELECT * FROM `35dangtienthanh_inforuser` WHERE Email='$getInforEmail'";
                        $query = mysqli_query($connect, $sql);
                        mysqli_close($connect);


                        $checkGmail = preg_match("/[a-zA-Z0-9]+@gmail.com/", $_POST['EmailRegister']);
                        $checkYahoo = preg_match("/[a-zA-Z0-9]+@yahoo.com/", $_POST['EmailRegister']);
                        $checkOutlook = preg_match("/[a-zA-Z0-9]+@outlook.com/", $_POST['EmailRegister']);
                        if (empty($_POST['EmailRegister'])) {
                            $checkEmail = 1;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                Email không được để trống
                                </div>");
                        } else if ($checkGmail == 0 && $checkYahoo == 0 && $checkOutlook == 0) {
                            $checkEmail = 2;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                Vui lòng nhập Gmail, Yahoo hoặc Outlook
                                </div>");
                        } else if($query->num_rows==1){
                            $checkEmail = 3;
                            echo ("<div class='alert alert-danger' id='errorUsername' style='font-size: 12px;padding:0.1rem 0.5rem;display:block;background-color:white;color:red' role='alert'>
                                  Email đã tồn tại. Vui lòng chọn Email khác
                                  </div>");
                        }
                        else{
                            $checkEmail=4;
                        }
                    }





                    ?>

                    <!-- Number Phone input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerNumberPhone" class="form-control" name="NumberPhoneRegister" />
                        <label class="form-label" for="registerNumberPhone">Số điện thoại (Không bắt buộc)</label>
                    </div>

                    <!-- Locate input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerLocate" class="form-control" name="LocateRegister" />
                        <label class="form-label" for="registerLocate">Địa chỉ (Không bắt buộc)</label>
                    </div>


                    <div class='alert alert-danger' id='RegisterSuccess' style='font-size: 12px;padding:0.1rem 0.5rem;display:none;background-color:white;color:green' role='alert'>
                        Đăng ký thành công. Vui lòng đăng nhập
                    </div>

                    <?php
                    // Lưu dữ liệu lên DB
                    if (isset($checkUsername) && isset($checkPassword) && isset($checkPasswordRepeat) && isset($checkEmail)) {
                        if ($checkUsername == 6 && $checkPassword == 5 && $checkPasswordRepeat == 2 && $checkEmail == 4) {
                            $inforUser = $_POST['UsernameRegister'];
                            $inforPassword = $_POST['PasswordRegister'];
                            $hashPassword=sha1($inforPassword);
                            $inforEmail = $_POST['EmailRegister'];
                            $inforPhone = $_POST['NumberPhoneRegister'];
                            $inforLocate = $_POST['LocateRegister'];
                            $connect = mysqli_connect("localhost", "root", "", "at150252");
                            $sql = "  INSERT INTO `35dangtienthanh_inforuser`(`Username`, `Password`, `Email`, `Phone`, `Locate`, `Role`,`RightUser`) 
                                    VALUES ('$inforUser','$hashPassword','$inforEmail','$inforPhone','$inforLocate', 'KH', '1111')";
                            $query = mysqli_query($connect, $sql);
                            mysqli_close($connect);
                        }
                    }




                    ?>
                    <!-- Checkbox -->
                    <!-- <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            Tôi đã đọc và đồng ý điều khoản
                        </label>
                    </div> -->

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Đăng ký</button>
                </form>
            </div>
        </div>
        <!-- Pills content -->
    </div>
    <script src="MDB5-STANDARD-UI-KIT-Free-5.0.0/js/mdb.min.js"></script>
</body>
<script>
    function ClickRegister() {
        document.getElementById("tab-register").click();
    }
</script>
<script>
    var clickRegister_status = "<?php echo $_GET['click']; ?>";
    if (clickRegister_status.length != 0) {
        document.getElementById("tab-register").click();
    }
</script>
<script>
    var checkUsername = <?php echo $checkUsername ?>;
    var checkPassword = <?php echo $checkPassword ?>;
    var checkPasswordRepeat = <?php echo $checkPasswordRepeat ?>;
    var checkEmail = <?php echo $checkEmail ?>;
    if (checkUsername < 6 || checkPassword < 5 || checkPasswordRepeat < 2 || checkEmail < 4) {
        document.getElementById("tab-register").click();
        document.getElementById("RegisterSuccess").style.display = "none";
        document.getElementById("registerUsername").value = "<?php echo $_POST['UsernameRegister'] ?>";
        document.getElementById("registerEmail").value = "<?php echo $_POST['EmailRegister'] ?>";
    } else {
        document.getElementById("tab-register").click();
        document.getElementById("RegisterSuccess").style.display = "block";
        document.getElementById("registerUsername").value = "<?php echo $_POST['UsernameRegister'] ?>";
        document.getElementById("registerPassword").value = "<?php echo $_POST['PasswordRegister'] ?>";
        document.getElementById("registerRepeatPassword").value = "<?php echo $_POST['PasswordRepeatRegister'] ?>";
        document.getElementById("registerEmail").value = "<?php echo $_POST['EmailRegister'] ?>";
        document.getElementById("registerNumberPhone").value = "<?php echo $_POST['NumberPhoneRegister'] ?>";
        document.getElementById("registerEregisterLocatemail").value = "<?php echo $_POST['LocateRegister'] ?>";
    }
</script>
<script>
    // Remove text đăng ký thành công khi click vào đăng nhập
    function removeTextRegisterSuccess() {
        console.log("Da vao ham");
        document.getElementById("RegisterSuccess").style.display = "none";
    }
</script>
<script>
    // Đóng thông báo lỗi khi người dùng ấn nút quay lại
    var errorLogin = <?php echo $closeNotifyError ?>;
    if (errorLogin == 1) {
        document.getElementById("errorLogin").style.display = "none";
    }
</script>

</html>