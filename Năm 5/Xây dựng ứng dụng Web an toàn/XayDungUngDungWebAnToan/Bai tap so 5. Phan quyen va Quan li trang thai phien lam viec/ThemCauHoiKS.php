<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <div>

        <a href="?click=QLKS"><button type="button" style="margin-top: 30px;margin-bottom: 30px;" class="btn btn-outline-info" data-mdb-ripple-color="dark">Quay lại</button></a>
        <button type="button" style="margin-top: 30px;margin-bottom: 30px;" class="btn btn-outline-primary" data-mdb-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Thêm câu hỏi khảo
            sát</button>

    </div>
    <div class="badge bg-primary text-wrap"><?php echo $_GET['ndks']  ?></div>

    <!-- Form khảo sát -->
    <?php
    $getIDKhaoSat=$_GET['id'];

    $connect = mysqli_connect("localhost", "root", "", "at150252");
    $sql = "SELECT * FROM `35dangtienthanh_cauhoikhaosat` WHERE MaKS='$getIDKhaoSat'";
    $query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($query) > 0) {

        while ($row = mysqli_fetch_assoc($query)) {
            echo '<div class="row col-5" >
                            <h4 class="fw-bold text-center mt-3"></h4>
                            <form class=" bg-white px-4">
                                <p class="fw-bold">'.$row['CauHoi'].'</p>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="exampleForm" id="radioExample1" disabled />
                                    <label class="form-check-label" for="radioExample1">
                                        Có
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="exampleForm" id="radioExample2" disabled />
                                    <label class="form-check-label" for="radioExample2">
                                        Không
                                    </label>
                                </div>
                            </form>
                        </div>';
        }
    }
    ?>


    <!-- Kết thúc Form khảo sát -->


    <!-- Popup thêm câu hỏi khảo sát -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm câu hỏi khảo sát</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" id="UserProfile">
                    <div class="modal-body">
                        <!-- Thông tin cá nhân nhân viên -->
                        <div style="background-color: #ffffff;padding: 10px;">

                            <div class="form-outline mb-4">
                                <input type="text" id="QuestionSurvey" class="form-control" name="SurveyQuestion" style="color: black;" />
                                <label class="form-label" for="MaKH">Câu hỏi khảo sát</label>
                            </div>

                        </div>

                        <!-- End Thông tin cá nhân nhân viên -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="ThemCauHoiKS" class="btn btn-primary">Thêm</button>
                    </div>
                </form>


                <?php
                // Thêm câu hỏi khảo sát


                if (isset($_POST['ThemCauHoiKS'])) {
                    $getCauHoiKS = $_POST['SurveyQuestion'];
                    $getMaKS = $_GET['id'];
                    $getNDKS = $_GET['ndks'];
                    $sql = "INSERT INTO `35dangtienthanh_cauhoikhaosat`(`MaKS`, `NoiDungKS`, `CauHoi`) VALUES ('$getMaKS','$getNDKS','$getCauHoiKS')";
                    $query = mysqli_query($connect, $sql);
                    if ($query) {
                        echo "<p style='color:green'>Thêm câu hỏi thành công</p>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }



                mysqli_close($connect);




                ?>
            </div>
        </div>
    </div>




</div>