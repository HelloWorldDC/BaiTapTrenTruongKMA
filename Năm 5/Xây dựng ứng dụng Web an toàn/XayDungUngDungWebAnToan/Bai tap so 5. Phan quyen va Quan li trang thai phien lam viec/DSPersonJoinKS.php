<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <div>

        <a href="?click=QLKS"><button type="button" style="margin-top: 30px;margin-bottom: 30px;" class="btn btn-outline-info" data-mdb-ripple-color="dark">Quay lại</button></a>
        <button type="button" style="margin-top: 30px;margin-bottom: 30px;" class="btn btn-outline-primary" data-mdb-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Thêm người tham
            gia</button>

    </div>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Hành động</th>

            </tr>
        </thead>

        <tbody>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "at150252");
            $getMaKS = $_GET['id'];
            $sql = " SELECT * FROM `35dangtienthanh_nguoithamgiakhaosat` WHERE MaKS='$getMaKS'";
            $query = mysqli_query($connect, $sql);
            
            if (mysqli_num_rows($query) > 0) {

                while ($row = mysqli_fetch_assoc($query)) {
                    echo '
                            <tr>
                                <td>' . $row['Username'] . '</td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['Email'] . '</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['SDT'] . '</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['Locate'] . '</p>
                                </td>
                                <td>
                                    <button type="button" id="btn_Edit" value="' . $row['Username'] . '" onclick="EditPersonJoinKS(this)" class="btn btn-link btn-sm btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModalEditPersonJoinKS">
                                        Sửa
                                    </button>
                                </td>
                            </tr>';
                }
            }



            ?>


        </tbody>
    </table>

    <!-- Popup thêm người tham gia khảo sát -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm người tham gia khảo sát</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" id="UserProfile">
                    <div class="modal-body">
                        <!-- Thông tin cá nhân nhân viên -->
                        <div style="background-color: #ffffff;padding: 10px;">

                            <div class="form-outline mb-4">
                                <input type="text" id="UsernameAdd" class="form-control" name="AddUsername" style="color: black;" />
                                <label class="form-label" for="MaKH">Tên đăng nhập</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" id="PasswordAdd" class="form-control" name="AddPassword" style="color: black;" />
                                <label class="form-label" for="HoTen">Mật khẩu</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="EmailAdd" class="form-control" name="AddEmail" style="color: black;" />
                                <label class="form-label" for="MaKH">Email</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="SDTAdd" class="form-control" name="AddSDT" style="color: black;" />
                                <label class="form-label" for="HoTen">Số điện thoại</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="LocateAdd" class="form-control" name="AddLocate" style="color: black;" />
                                <label class="form-label" for="HoTen">Địa chỉ</label>
                            </div>






                        </div>

                        <!-- End Thông tin cá nhân nhân viên -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="ThemPersonJoinKS" class="btn btn-primary">Thêm</button>
                    </div>
                </form>

                <?php
                // Thêm người tham gia khảo sát
                if (isset($_POST['ThemPersonJoinKS'])) {
                    $connect = mysqli_connect("localhost", "root", "", "at150252");
                    $getNDKS = "";
                    $getMaKS = $_GET['id'];
                    $getUsernameAdd = $_POST['AddUsername'];
                    $getPasswordAdd = $_POST['AddPassword'];
                    $hashgetPasswordAdd = sha1($getPasswordAdd);
                    $getEmailAdd = $_POST['AddEmail'];
                    $getSDTAdd = $_POST['AddSDT'];
                    $getLocateAdd = $_POST['AddLocate'];
                    $sql = "SELECT * FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getMaKS'";
                    $query = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($query)) {
                            $getNDKS = $row['NDRequest'];
                        }
                    }

                    if (!(empty($getUsernameAdd) && empty($getPasswordAdd) && empty($getEmailAdd))) {

                        try {
                            $sql = "INSERT INTO `35dangtienthanh_nguoithamgiakhaosat`(`MaKS`, `NoiDungKS`, `Username`, `Password`, `Email`, `SDT`, `Locate`) 
                                    VALUES ('$getMaKS','$getNDKS','$getUsernameAdd','$hashgetPasswordAdd','$getEmailAdd','$getSDTAdd','$getLocateAdd')";
                            $query = mysqli_query($connect, $sql);

                            $sql="INSERT INTO `35dangtienthanh_inforuser`(`Username`, `Password`, `Email`, `Phone`, `Locate`, `Role`, `RightUser`) VALUES ('$getUsernameAdd','$hashgetPasswordAdd','$getEmailAdd','$getSDTAdd','$getLocateAdd','KH','1111')";
                            $query = mysqli_query($connect, $sql);
                            if ($query) {
                                echo "<p style='color:green;'>Thêm thành công</p>";
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                        } catch (\Throwable $th) {
                            echo "<p style='color:red;'>" . $th->getMessage() . "</p>";
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }
                    
                // Gửi email đường link tham gia khảo sát
                include("SendMailJoinKS.php");
                }






                ?>
            </div>
        </div>
    </div>



    <!-- Popup sửa người tham gia khảo sát -->
    <div class="modal fade" id="exampleModalEditPersonJoinKS" tabindex="-1" aria-labelledby="exampleModalEditPersonJoinKS" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa người tham gia khảo sát</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" id="UserProfile">
                    <div class="modal-body">
                        <!-- Thông tin cá nhân nhân viên -->
                        <div style="background-color: #ffffff;padding: 10px;">

                        <div class="form-outline mb-4">
                                <input type="text" id="UsernameEditDelete" class="form-control" name="EditDeleteUsername" style="color: black;"/>
                                <label class="form-label" for="HoTen">Username</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="SDTEditDelete" class="form-control" name="EditDeleteSDT" style="color: black;" />
                                <label class="form-label" for="HoTen">Số điện thoại</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="LocateEditDelete" class="form-control" name="EditDeleteLocate" style="color: black;" />
                                <label class="form-label" for="HoTen">Địa chỉ</label>
                            </div>






                        </div>

                        <!-- End Thông tin cá nhân nhân viên -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="XoaPersonJoinKS" class="btn btn-danger">Xóa</button>
                        <button type="submit" name="SuaPersonJoinKS" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
                <?php
                // Sửa người tham gia khảo sát
                if (isset($_POST['SuaPersonJoinKS'])) {
                    $getInforEditUsername=$_POST['EditDeleteUsername'];
                    $getInforEditSDT = $_POST['EditDeleteSDT'];
                    $getInforEditLocate = $_POST['EditDeleteLocate'];
                    $sql = "UPDATE `35dangtienthanh_nguoithamgiakhaosat` SET `SDT`='$getInforEditSDT',`Locate`='$getInforEditLocate' WHERE Username='$getInforEditUsername'";
                    $query = mysqli_query($connect, $sql);
                    if(mysqli_affected_rows($connect)==1){
                        echo "<p style='color:green;'>Update thành công</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    else{
                        echo "<p style='color:red;'>Update không thành công</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }


                // Xóa người tham gia khảo sát

                if(isset($_POST['XoaPersonJoinKS'])){
                    $getInforEditUsername=$_POST['EditDeleteUsername'];
                    $sql = "DELETE FROM `35dangtienthanh_nguoithamgiakhaosat` WHERE Username='$getInforEditUsername'";
                    $query = mysqli_query($connect, $sql);
                    echo "<meta http-equiv='refresh' content='0'>";
                }


                mysqli_close($connect);
                ?>
            </div>
        </div>
    </div>
</div>