<?php
$connect = mysqli_connect("localhost", "root", "", "at150252");
$sql = " SELECT * FROM `35dangtienthanh_inforuser`";
$query = mysqli_query($connect, $sql);


?>
<main style="width: 90%;margin: 72px;">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Username</th>
                <th>Quyền hạn</th>
                <th>Vị trí</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if (mysqli_num_rows($query) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<tr>
                <td>
                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">' . $row['Username'] . '</p>
                                <p class="text-muted mb-0">' . $row['Email'] . '</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">' . $row['RightUser'] . '</p>
                    </td>
                    <td>' . $row['Role'] . '</td>
                    <td>
                        <button type="button" onclick="EditUser(this)" class="btn btn-link btn-sm btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModal" value="' . $row["Username"] . '">
                            Sửa
                        </button>
                    </td>
                
            </tr>';
                }
            }


            ?>

        </tbody>
    </table>


    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Launch demo modal
        </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" id="UserProfile">
                    <div class="modal-body">
                        <!-- Thông tin cá nhân nhân viên -->
                        <div style="background-color: #ffffff;padding: 10px;">

                            <!-- Username input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="InforUser" class="form-control" name="UserInfor" style="color: black;" />
                                <label class="form-label" for="InforUser">Tên đăng nhập</label>
                            </div>


                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="InforEmail" class="form-control" name="EmailInfor" style="color: black;" />
                                <label class="form-label" for="InforEmail">Email</label>
                            </div>




                            <div class="form-outline mb-4">
                                <select class="form-select" aria-label="Default select example" name="selectRoleUser" id="selectRight" onchange="Right()">
                                    <option selected>Vai trò</option>
                                    <option value="1">Nhân viên</option>
                                    <option value="2">Khách hàng</option>
                                </select>
                            </div>

                            <div id="RightForNV" style="display: none;">


                                <!-- Thêm checkbox -->
                                <div style="display: inline;">
                                    <input class="form-check-input" type="checkbox" name="AddOfNV[]" value="AddOfNV" id="RightAdd" />
                                    <label class="form-check-label" for="RightAdd">Quyền thêm</label>
                                </div>

                                <!-- Sửa checkbox -->
                                <div style="display: inline;margin: 0px 69px 0px 69px;">
                                    <input class="form-check-input" type="checkbox" name="EditOfNV[]" value="EditOfNV" id="RightEdit" />
                                    <label class="form-check-label" for="RightEdit">Quyền sửa</label>
                                </div>

                                <!-- Xóa checkbox -->
                                <div style="display: inline;">
                                    <input class="form-check-input" type="checkbox" name="DeleteOfNV[]" value="DeleteOfNV" id="RightDelete" />
                                    <label class="form-check-label" for="RightDelete">Quyền xóa</label>
                                </div>

                            </div>

                            <div id="RightForKH" style="display: none;">

                                <div>

                                    <!-- Tạo khảo sát checkbox -->
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="CreateSurveyOfKH[]" value="CreateSurveyOfKH" id="RightCreateSurvey" />
                                        <label class="form-check-label" for="RightCreateSurvey">Quyền tạo khảo sát</label>
                                    </div>

                                    <!-- Thêm người tham gia khảo sát checkbox -->
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="AddPersonOfKH[]" value="AddPersonOfKH" id="RightAddPersonSurvey" />
                                        <label class="form-check-label" for="RightAddPersonSurvey">Quyền thêm người tham gia</label>
                                    </div>

                                </div>

                                <div>
                                    <!-- Sửa người tham gia khảo sát checkbox -->
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="EditPersonOfKH[]" value="EditPersonOfKH" id="RightEditPersonSurvey" />
                                        <label class="form-check-label" for="RightEditPersonSurvey">Quyền sửa người tham gia</label>
                                    </div>

                                    <!-- Xóa người tham gia khảo sát checkbox -->
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="DeletePersonOfKH[]" value="DeletePersonOfKH" id="RightDeletePersonSurvey" />
                                        <label class="form-check-label" for="RightDeletePersonSurvey">Quyền xóa người tham gia</label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- End Thông tin cá nhân nhân viên -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="DeleteInforUser" >Xóa</button>
                        <button type="submit" class="btn btn-primary" name="EditInforUser">Sửa</button>
                    </div>
                </form>
                <?php
                // Sửa thông tin Username
                if(isset($_POST['EditInforUser'])){

                
                if(isset($_POST['UserInfor'])){

                    $getUsername = $_POST['UserInfor'];
                    $getEmail=$_POST['EmailInfor'];
                    $getselectRole=$_POST['selectRoleUser'];
                    if($getselectRole==="1"){
                        $Roleis="NV";
                    }
                    else if($getselectRole==="2"){
                        $Roleis="KH";
                    }
                    else{
                        $Roleis="";
                    }
                    $RightOfNVis="";
                    if(isset($_POST['AddOfNV'])){
                        $RightOfNVis.=1;
                    }
                    else{
                        $RightOfNVis.=0;
                    }
                    if(isset($_POST['EditOfNV'])){
                        $RightOfNVis.=1;
                    }
                    else{
                        $RightOfNVis.=0;
                    }
                    if(isset($_POST['DeleteOfNV'])){
                        $RightOfNVis.=1;
                    }
                    else{
                        $RightOfNVis.=0;
                    }
                    
                    $RightOfKHis="";
                    if(isset($_POST['CreateSurveyOfKH'])){
                        $RightOfKHis.=1;
                    }else{
                        $RightOfKHis.=0;
                    }
                    if(isset($_POST['AddPersonOfKH'])){
                        $RightOfKHis.=1;
                    }else{
                        $RightOfKHis.=0;
                    }
                    if(isset($_POST['EditPersonOfKH'])){
                        $RightOfKHis.=1;
                    }else{
                        $RightOfKHis.=0;
                    }
                    if(isset($_POST['DeletePersonOfKH'])){
                        $RightOfKHis.=1;
                    }else{
                        $RightOfKHis.=0;
                    }
                    
                    if($getselectRole==="1"){
                        $sql = "UPDATE `35dangtienthanh_inforuser` SET `Username`='$getUsername',`Email`='$getEmail',`Role`='$Roleis',`RightUser`='$RightOfNVis' WHERE Username='$getUsername'";
                    }
                    else if($getselectRole==="2"){
                        
                    $sql = "UPDATE `35dangtienthanh_inforuser` SET `Username`='$getUsername',`Email`='$getEmail',`Role`='$Roleis',`RightUser`='$RightOfKHis' WHERE Username='$getUsername'";
                    }
                    else{
                        
                    $sql = "UPDATE `35dangtienthanh_inforuser` SET `Username`='$getUsername',`Email`='$getEmail',`Role`='',`RightUser`='' WHERE Username='$getUsername'";
                    }
                    $query = mysqli_query($connect, $sql);
                    // Tự động Refresh lại trang sau khi sửa
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }






                // Xóa thông tin


                if(isset($_POST['DeleteInforUser'])){
                    if(isset($_POST['UserInfor'])){


                        $getUsername = $_POST['UserInfor'];
                        $sql = "DELETE FROM `35dangtienthanh_inforuser` WHERE Username='$getUsername'";
                        $query = mysqli_query($connect, $sql);
                        // Tự động Refresh lại trang sau khi xóa
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
                








                mysqli_close($connect);

                ?>
            </div>
        </div>
    </div>
</main>