<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Mã KH</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>Mã định danh</th>
                <th>Email</th>
                <th>Nội dung yêu cầu</th>
                <th>Giá tiền</th>
                <th>Số lượng khảo sát</th>
                <th>Số câu hỏi</th>
                <th>Trạng thái</th>
                <th>Chỉnh sửa</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "at150252");
            $sql = " SELECT * FROM `35dangtienthanh_quanlykhaosat`";
            $query = mysqli_query($connect, $sql);
            if (mysqli_num_rows($query) > 0) {

                while ($row = mysqli_fetch_assoc($query)) {
                    $checkrequestEdit=$row['MaKH']."(1)";
                    $CodeRequest="";
                    // Lấy mã KH nối chuỗi với (1) nếu tồn tại thì không cho hiển thị phía nhân viên
                    $sqlcheckrequestEdit = " SELECT * FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$checkrequestEdit'";
                    $querycheckrequestEdit = mysqli_query($connect, $sqlcheckrequestEdit);
                    if(mysqli_num_rows($querycheckrequestEdit) > 0){
                        $checkrequestEdit=1;
                        // Lấy mã yêu cầu 1 là yêu cầu sửa, 2 là yêu cầu xóa để hiển thị phía nhân viên
                        while ($rowquerycheckrequestEdit = mysqli_fetch_assoc($querycheckrequestEdit)){
                            $CodeRequest=$rowquerycheckrequestEdit['Request'];
                        }
                    }
                    if($row['Status']==="Pending"){

                    

                    echo '<tr>
                            <td>'.$row['MaKH'].'</td>
                            <td>
                                <p class="fw-normal mb-1">'.$row['HoTen'].'</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">'.$row['DiaChi'].'</p>
                            </td>
                            <td>'.$row['SDT'].'</td>
                            <td>'.$row['MaDD'].'</td>
                            <td>'.$row['Email'].'</td>
                            <td>'.$row['NDRequest'].'</td>
                            <td>'.$row['GiaTien'].'</td>
                            <td>'.$row['SoLuongKhaoSat'].'</td>
                            <td>'.$row['SoCauKhaoSat'].'</td>
                            <td>'.$row['Status'].'</td>

                            <td>
                                <button type="button" id="btn_Edit" value="'.$row['MaKH'].'" onclick="DuyetNDKS(this)" class="btn btn-warning btn-sm btn-rounded">
                                    Duyệt
                                </button>
                            </td>
                        </tr>';
                    }
                    else if($checkrequestEdit==1&&$CodeRequest==1){
                        echo '<tr>
                        <td>'.$row['MaKH'].'</td>
                        <td>
                            <p class="fw-normal mb-1">'.$row['HoTen'].'</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">'.$row['DiaChi'].'</p>
                        </td>
                        <td>'.$row['SDT'].'</td>
                        <td>'.$row['MaDD'].'</td>
                        <td>'.$row['Email'].'</td>
                        <td>'.$row['NDRequest'].'</td>
                        <td>'.$row['GiaTien'].'</td>
                        <td>'.$row['SoLuongKhaoSat'].'</td>
                        <td>'.$row['SoCauKhaoSat'].'</td>
                        <td>'."Đã yêu cầu sửa".'</td>
                    </tr>';
                    }
                    else if($checkrequestEdit==1&&$CodeRequest==2){
                        echo '<tr>
                        <td>'.$row['MaKH'].'</td>
                        <td>
                            <p class="fw-normal mb-1">'.$row['HoTen'].'</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">'.$row['DiaChi'].'</p>
                        </td>
                        <td>'.$row['SDT'].'</td>
                        <td>'.$row['MaDD'].'</td>
                        <td>'.$row['Email'].'</td>
                        <td>'.$row['NDRequest'].'</td>
                        <td>'.$row['GiaTien'].'</td>
                        <td>'.$row['SoLuongKhaoSat'].'</td>
                        <td>'.$row['SoCauKhaoSat'].'</td>
                        <td>'."Đã yêu cầu xóa".'</td>
                    </tr>';
                    }
                    else if($row['View']!=1){
                        echo '
                        <tr>
                            <td>'.$row['MaKH'].'</td>
                            <td>
                                <p class="fw-normal mb-1">'.$row['HoTen'].'</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">'.$row['DiaChi'].'</p>
                            </td>
                            <td>'.$row['SDT'].'</td>
                            <td>'.$row['MaDD'].'</td>
                            <td>'.$row['Email'].'</td>
                            <td>'.$row['NDRequest'].'</td>
                            <td>'.$row['GiaTien'].'</td>
                            <td>'.$row['SoLuongKhaoSat'].'</td>
                            <td>'.$row['SoCauKhaoSat'].'</td>
                            <td>'.$row['Status'].'</td>

                        <td>
                        <button type="button" id="btn_Edit" value="'.$row['MaKH'].'" onclick="click_btn_Edit(this)" class="btn btn-link btn-sm btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                            Sửa
                        </button>
                    </td>';
                    }
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

                            <!-- Mã KH và Họ tên input -->
                            <div class="row mb-4">
                                <!-- Mã KH -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="MaKH" class="form-control" name="MaKHEditDelete" style="color:black;"/>
                                        <label class="form-label" for="MaKH">Mã KH</label>
                                    </div>
                                </div>
                                <!-- Họ tên -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="HoTen" class="form-control" name="HotenEditDelete" style="color:black;"/>
                                        <label class="form-label" for="HoTen">Họ tên</label>
                                    </div>
                                </div>
                            </div>


                            <!-- Địa chỉ và SĐT input -->
                            <div class="row mb-4">
                                <!-- Địa chỉ -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="Locate" class="form-control" name="LocateEditDelete" style="color:black;"/>
                                        <label class="form-label" for="Locate">Địa chỉ</label>
                                    </div>
                                </div>
                                <!-- SĐT -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="SDT" class="form-control" name="SDTEditDelete" style="color:black;"/>
                                        <label class="form-label" for="SDT">SĐT</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Mã định danh và Email input -->
                            <div class="row mb-4">
                                <!-- Mã định danh -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="MDD" class="form-control" name="MDDEditDelete" style="color:black;"/>
                                        <label class="form-label" for="MDD">Mã định danh</label>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="EmailKH" class="form-control" name="EmailKHEditDelete" style="color:black;"/>
                                        <label class="form-label" for="EmailKH">Email</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Mô tả nội dung yêu cầu và giá tiền input -->
                            <div class="row mb-4">
                                <!-- Mô tả nội dung yêu cầu -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="NDRequest" class="form-control" name="NDRequestEditDelete" style="color:black;"/>
                                        <label class="form-label" for="NDRequest">Nội dung yêu cầu</label>
                                    </div>
                                </div>
                                <!-- Giá tiền -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="Price" class="form-control" name="PriceEditDelete" style="color:black;"/>
                                        <label class="form-label" for="Price">Giá tiền</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Số lượng khảo sát và số câu khảo sát input -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="AmountSurvey" class="form-control" name="AmountSurveyEditDelete" style="color:black;"/>
                                        <label class="form-label" for="AmountSurvey">Số lượng khảo sát</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="QuestionSurvey" class="form-control" name="QuestionSurveyEditDelete" style="color:black;"/>
                                        <label class="form-label" for="QuestionSurvey">Số câu khảo sát</label>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- End Thông tin cá nhân nhân viên -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="RequestDelete" class="btn btn-danger">Xóa</button>
                        <button type="submit" name="RequestEdit" class="btn btn-primary" >Sửa</button>
                    </div>
                </form>
                <?php
                // Yêu cầu sửa thông tin khách hàng
                if(isset($_POST['RequestEdit'])){
                    // Kiểm tra xem có quyền yêu cầu sửa không
                    // Quyền yêu cầu sửa thông tin khách hàng bit thứ 2 là 1, 0 là không có quyền yêu cầu sủa (101)
                    $getInforUser = $_COOKIE['User'];
                    $getRightAddSurvey = "";
                    $sql = "SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getInforUser'";
                    $query = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($query)) {
                            $getRightAddSurvey = $row['RightUser'];
                        }
                    }
                    // Check quyền yêu cầu sửa
                    if ($getRightAddSurvey[1] === "0") {
                        echo '<script>window.location.href="?click=NoRightEditKH"</script>';
                    }

                    else{



                    // Tạo bản nháp dữ liệu yêu cầu sửa
                    $getInforKHEditMaKH=$_POST['MaKHEditDelete']."(1)";
                    $getInforKHEditHoTen=$_POST['HotenEditDelete'];
                    $getInforKHEditLocate=$_POST['LocateEditDelete'];
                    $getInforKHEditSDT=$_POST['SDTEditDelete'];
                    $getInforKHEditMDD=$_POST['MDDEditDelete'];
                    $getInforKHEditEmail=$_POST['EmailKHEditDelete'];
                    $getInforKHEditNDRequest=$_POST['NDRequestEditDelete'];
                    $getInforKHEditPrice=$_POST['PriceEditDelete'];
                    $getInforKHEditAmountSurvey=$_POST['AmountSurveyEditDelete'];
                    $getInforKHEditQuestionSurvey=$_POST['QuestionSurveyEditDelete'];
                    $sql="INSERT INTO `35dangtienthanh_quanlykhaosat`(`MaKH`, `HoTen`, `DiaChi`, `SDT`, `MaDD`, `Email`, `NDRequest`, `GiaTien`, `SoLuongKhaoSat`, `SoCauKhaoSat`, `Status`, `View`, `Request`) 
                    VALUES ('$getInforKHEditMaKH','$getInforKHEditHoTen','$getInforKHEditLocate','$getInforKHEditSDT','$getInforKHEditMDD','$getInforKHEditEmail','$getInforKHEditNDRequest','$getInforKHEditPrice','$getInforKHEditAmountSurvey','$getInforKHEditQuestionSurvey','Yêu cầu Sửa','1','1')";
                    try {
                        $query = mysqli_query($connect, $sql);
                    if($query){
                        echo "<p style='color:green;'>Đã yêu cầu sửa vui lòng chờ admin phê duyệt</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    } catch (\Throwable $th) {
                        echo "<p style='color:red;'>".$th->getMessage()."</p>";
                    }
                }
                }

                // Yêu cầu xóa thông tin khách hàng

                if(isset($_POST['RequestDelete'])){
                    // Kiểm tra xem có quyền yêu cầu xóa không
                    // Quyền yêu cầu xóa thông tin khách hàng bit thứ 3 là 1, 0 là không có quyền yêu cầu sủa (110)
                    $getInforUser = $_COOKIE['User'];
                    $getRightAddSurvey = "";
                    $sql = "SELECT * FROM `35dangtienthanh_inforuser` WHERE Username='$getInforUser'";
                    $query = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($query)) {
                            $getRightAddSurvey = $row['RightUser'];
                        }
                    }
                    // Check quyền yêu cầu xóa
                    if ($getRightAddSurvey[2] === "0") {
                        echo '<script>window.location.href="?click=NoRightDeleteKH"</script>';
                    }
                    else{





                    // Tạo bản nháp dữ liệu yêu cầu xóa
                    $getInforKHEditMaKH=$_POST['MaKHEditDelete']."(1)";
                    $getInforKHEditHoTen=$_POST['HotenEditDelete'];
                    $getInforKHEditLocate=$_POST['LocateEditDelete'];
                    $getInforKHEditSDT=$_POST['SDTEditDelete'];
                    $getInforKHEditMDD=$_POST['MDDEditDelete'];
                    $getInforKHEditEmail=$_POST['EmailKHEditDelete'];
                    $getInforKHEditNDRequest=$_POST['NDRequestEditDelete'];
                    $getInforKHEditPrice=$_POST['PriceEditDelete'];
                    $getInforKHEditAmountSurvey=$_POST['AmountSurveyEditDelete'];
                    $getInforKHEditQuestionSurvey=$_POST['QuestionSurveyEditDelete'];
                    $sql="INSERT INTO `35dangtienthanh_quanlykhaosat`(`MaKH`, `HoTen`, `DiaChi`, `SDT`, `MaDD`, `Email`, `NDRequest`, `GiaTien`, `SoLuongKhaoSat`, `SoCauKhaoSat`, `Status`, `View`, `Request`) 
                    VALUES ('$getInforKHEditMaKH','$getInforKHEditHoTen','$getInforKHEditLocate','$getInforKHEditSDT','$getInforKHEditMDD','$getInforKHEditEmail','$getInforKHEditNDRequest','$getInforKHEditPrice','$getInforKHEditAmountSurvey','$getInforKHEditQuestionSurvey','Yêu cầu Xóa','1','2')";
                    try {
                        $query = mysqli_query($connect, $sql);
                    if($query){
                        echo "<p style='color:green;'>Đã yêu cầu sửa vui lòng chờ admin phê duyệt</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    } catch (\Throwable $th) {
                        echo "<p style='color:red;'>".$th->getMessage()."</p>";
                    }
                }
                }

                
                
                
                
                mysqli_close($connect);
                ?>
            </div>
        </div>
    </div>
</div>