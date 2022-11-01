<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <div>

        <a href="?click=QLKS"><button type="button" style="margin-top: 30px;margin-bottom: 30px;" class="btn btn-outline-info" data-mdb-ripple-color="dark">Quay lại</button></a>

        
        <!-- Form khảo sát -->
        <?php
        $getIDKhaoSat=$_GET['id'];

        $connect = mysqli_connect("localhost", "root", "", "at150252");
        $sql = "SELECT * FROM `35dangtienthanh_cauhoikhaosat` WHERE MaKS='$getIDKhaoSat'";
        $query = mysqli_query($connect, $sql);
        if (mysqli_num_rows($query) > 0) {

            while ($row = mysqli_fetch_assoc($query)) {
                echo '<div class="row col-5">
                                <h4 class="fw-bold text-center mt-3"></h4>
                                <form class=" bg-white px-4">
                                <p class="fw-bold">'.$row['CauHoi'].'</p>
                                <div >
                                    <label class="form-check-label" for="radioExample1">
                                        Có:
                                    </label>
                                    <span>'.$row['TraLoiCo'].'</span>
                                </div>
                                <div>
                                    <label class="form-check-label" for="radioExample2">
                                        Không:
                                    </label>
                                    <span>'.$row['TraLoiKhong'].'</span>
                                </div>
                                </form>
                            </div>';
            }
        }
        ?>


        <!-- Kết thúc Form khảo sát -->






    </div>