<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <div>


        <!-- Form khảo sát -->
        <?php
        if(isset($_GET['id'])){
            $getIDKhaoSat = $_GET['id'];

            $connect = mysqli_connect("localhost", "root", "", "at150252");
            $sql = "SELECT * FROM `35dangtienthanh_cauhoikhaosat` WHERE MaKS='$getIDKhaoSat'";
            $query = mysqli_query($connect, $sql);
            if (mysqli_num_rows($query) > 0) {
                $SoCauHoiKS=mysqli_num_rows($query);
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<div class="row col-5" id="'.$row['CauHoi'].'">
                            <h4 class="fw-bold text-center mt-3"></h4>
                            <form class=" bg-white px-4">
                                <p class="fw-bold">' . $row['CauHoi'] . '</p>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" value="'.$getIDKhaoSat."-".$row['CauHoi']."-Y".'" onclick="SelectCauTraLoiKS(this)" type="radio" name="exampleForm" id="radioExample1" />
                                    <label class="form-check-label" for="radioExample1">
                                        Có
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" value="'.$getIDKhaoSat."-".$row['CauHoi']."-N".'" onclick="SelectCauTraLoiKS(this)" type="radio" name="exampleForm" id="radioExample2" />
                                    <label class="form-check-label" for="radioExample2">
                                        Không
                                    </label>
                                </div>
                            </form>
                        </div>';
                }
            }
        }
        
        ?>


        <!-- Kết thúc Form khảo sát -->






    </div>