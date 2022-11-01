<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <button type="button" style="margin-top: 30px;margin-bottom: 30px;" class="btn btn-outline-primary" data-mdb-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Thêm khảo sát</button>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Nội dung khảo sát</th>
                <th>Giá tiền</th>
                <th>Số lượng khảo sát</th>
                <th>Số câu khảo sát</th>
                <th>Trạng thái</th>
                <th>Hành động</th>

            </tr>
        </thead>

        <tbody>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "at150252");
            $sql = " SELECT * FROM `35dangtienthanh_quanlykhaosat`";
            $query = mysqli_query($connect, $sql);
            if (mysqli_num_rows($query) > 0) {

                while ($row = mysqli_fetch_assoc($query)) {

                    if ($row['Status'] === "Active") {


                        echo '
                            <tr>
                                <td>' . $row['NDRequest'] . '</td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['GiaTien'] . '</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['SoLuongKhaoSat'] . '</p>
                                </td>
                                <td>' . $row['SoCauKhaoSat'] . '</td>
                                <td style="color:#14A44D;">' . $row['Status'] . '</td>
                                <td><span style="cursor: pointer;" class="dropdown-toggle" id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">Thao tác
                                    </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="http://localhost/XayDungUngDungWebAnToan/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/admin.php?click=QLKS&thaotac=ThemCHKS&ndks='.$row['NDRequest']."&id=".$row['MaKH'].'">Thêm câu hỏi khảo sát</a></li>
                                        <li><a class="dropdown-item" href="http://localhost/XayDungUngDungWebAnToan/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/admin.php?click=QLKS&thaotac=XemKQKS&id='.$row['MaKH'].'">Xem kết quả khảo sát</a></li>
                                        <li><a class="dropdown-item" href="http://localhost/XayDungUngDungWebAnToan/Bai%20tap%20so%205.%20Phan%20quyen%20va%20Quan%20li%20trang%20thai%20phien%20lam%20viec/bootstrap-5-admin-template-main/admin.php?click=QLKS&thaotac=DSNTGKS&id='.$row['MaKH']."&Price=".$row['GiaTien'].'">Danh sách người tham gia khảo sát</a></li><!-- MaKH là MaKS -->
                                    </ul>
                                </td>
                            </tr>';
                    } else if ($row['Status'] === "Pending") {

                        echo '
                            <tr>
                                <td>' . $row['NDRequest'] . '</td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['GiaTien'] . '</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">' . $row['SoLuongKhaoSat'] . '</p>
                                </td>
                                <td>' . $row['SoCauKhaoSat'] . '</td>
                                <td style="color:#E4A11B;">' . $row['Status'] . '</td>
                                <td><span style="cursor: pointer;" class="dropdown-toggle" id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">Thao tác
                                </span>
                                </td>
                            </tr>';
                    }
                }
            }



            ?>


        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm khảo sát</h5>
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
                                        <input type="text" id="MaKH" class="form-control" name="MKH" style="color: black;" />
                                        <label class="form-label" for="MaKH">Mã KH</label>
                                    </div>
                                </div>
                                <!-- Họ tên -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="HoTen" class="form-control" name="HT" style="color: black;" />
                                        <label class="form-label" for="HoTen">Họ tên</label>
                                    </div>
                                </div>
                            </div>


                            <!-- Địa chỉ và SĐT input -->
                            <div class="row mb-4">
                                <!-- Địa chỉ -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="Locate" class="form-control" name="DC" style="color: black;" />
                                        <label class="form-label" for="Locate">Địa chỉ</label>
                                    </div>
                                </div>
                                <!-- SĐT -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="SDT" class="form-control" name="SDTKH" style="color: black;" />
                                        <label class="form-label" for="SDT">SĐT</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Mã định danh và Email input -->
                            <div class="row mb-4">
                                <!-- Mã định danh -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="MDD" class="form-control" name="MDD" style="color: black;" />
                                        <label class="form-label" for="MDD">Mã định danh</label>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="EmailKH" class="form-control" name="EmailOfKH" style="color: black;" />
                                        <label class="form-label" for="EmailKH">Email</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Mô tả nội dung yêu cầu và giá tiền input -->
                            <div class="row mb-4">
                                <!-- Mô tả nội dung yêu cầu -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="NDRequest" class="form-control" name="DesRequest" style="color: black;" />
                                        <label class="form-label" for="NDRequest">Nội dung yêu cầu</label>
                                    </div>
                                </div>
                                <!-- Giá tiền -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="Price" class="form-control" name="Price" style="color: black;" />
                                        <label class="form-label" for="Price">Giá tiền</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Số lượng khảo sát và số câu khảo sát input -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="AmountSurvey" class="form-control" name="AmountKS" style="color: black;" />
                                        <label class="form-label" for="AmountSurvey">Số lượng khảo sát</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="QuestionSurvey" class="form-control" name="SoQuestionKS" style="color: black;" />
                                        <label class="form-label" for="QuestionSurvey">Số câu khảo sát</label>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- End Thông tin cá nhân nhân viên -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="ThemKS" class="btn btn-primary">Thêm</button>
                    </div>
                </form>

                <?php
                //  Thêm khảo sát
                echo $_COOKIE['User'];
                if (isset($_POST['ThemKS'])) {
                    $getInforMaKhachHang = $_POST['MKH'];
                    $getInforHoTen = $_POST['HT'];
                    $getInforDiaChi = $_POST['DC'];
                    $getInforSDT = $_POST['SDTKH'];
                    $getInforMaDinhDanh = $_POST['MDD'];
                    $getInforEmail = $_POST['EmailOfKH'];
                    $getInforNoiDungYeuCau = $_POST['DesRequest'];
                    $getInforGiaTien = $_POST['Price'];
                    $getInforSoLuongKhaoSat = $_POST['AmountKS'];
                    $getInforSoCauKhaoSat = $_POST['SoQuestionKS'];
                    $getInforUser = $_COOKIE['User'];
                    try {
                        if(!(empty($getInforMaKhachHang)&&empty($getInforHoTen)&&
                        empty($getInforDiaChi)&&empty($getInforSDT)&&
                        empty($getInforMaDinhDanh)&&empty($getInforEmail)&&
                        empty($getInforNoiDungYeuCau)&&empty($getInforGiaTien)&&
                        empty($getInforSoLuongKhaoSat)&&empty($getInforSoCauKhaoSat))){

                    
                    $sql = "INSERT INTO `35dangtienthanh_quanlykhaosat`(`Username`, `MaKH`, `HoTen`, `DiaChi`, `SDT`, `MaDD`, `Email`, `NDRequest`, `GiaTien`, `SoLuongKhaoSat`, `SoCauKhaoSat`, `Status`) 
                            VALUES ('$getInforUser','$getInforMaKhachHang','$getInforHoTen','$getInforDiaChi','$getInforSDT','$getInforMaDinhDanh','$getInforEmail','$getInforNoiDungYeuCau','$getInforGiaTien','$getInforSoLuongKhaoSat','$getInforSoCauKhaoSat','Pending')";
                    $query = mysqli_query($connect, $sql);
                    if($query){
                        echo "<p style='color:green;'>Thêm thành công</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    }
                    } catch (\Throwable $th) {
                        $error=$th->getMessage();
                        echo "<p style='color:red;'>".$error."</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    

                    
                }

                mysqli_close($connect);

                ?>
            </div>
        </div>
    </div>
</div>