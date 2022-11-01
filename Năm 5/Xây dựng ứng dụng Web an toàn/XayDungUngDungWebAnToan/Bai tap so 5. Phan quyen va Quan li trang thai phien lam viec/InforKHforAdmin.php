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
            <form method="post">
                <?php
                $connect = mysqli_connect("localhost", "root", "", "at150252");
                $sql = " SELECT * FROM `35dangtienthanh_quanlykhaosat`";
                $query = mysqli_query($connect, $sql);
                if (mysqli_num_rows($query) > 0) {

                    while ($row = mysqli_fetch_assoc($query)) {

                        if ($row['View'] == 1) {
                            echo '
                        <tr>
                            <td>' . $row['MaKH'] . '</td>
                            <td>
                                <p class="fw-normal mb-1">' . $row['HoTen'] . '</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">' . $row['DiaChi'] . '</p>
                            </td>
                            <td>' . $row['SDT'] . '</td>
                            <td>' . $row['MaDD'] . '</td>
                            <td>' . $row['Email'] . '</td>
                            <td>' . $row['NDRequest'] . '</td>
                            <td>' . $row['GiaTien'] . '</td>
                            <td>' . $row['SoLuongKhaoSat'] . '</td>
                            <td>' . $row['SoCauKhaoSat'] . '</td>
                            <td>' . $row['Status'] . '</td>

                        <td>
                        <button type="submit" value="'.$row['MaKH']."-".$row['Request'].'" id="btn_Edit" onclick="ChapNhanYeuCau(this)" name="ChapNhan" class="btn btn-link btn-sm btn-rounded">
                            Đồng ý
                        </button>
                        <button type="submit" value="'.$row['MaKH']."-".$row['Request'].'" id="btn_Edit" name="TuChoi" onclick="TuChoiYeuCau(this)" class="btn btn-link btn-sm btn-rounded">
                            Từ chối
                        </button>
                    </td>';
                        } else {



                            echo '<tr>
                            <td>' . $row['MaKH'] . '</td>
                            <td>
                                <p class="fw-normal mb-1">' . $row['HoTen'] . '</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">' . $row['DiaChi'] . '</p>
                            </td>
                            <td>' . $row['SDT'] . '</td>
                            <td>' . $row['MaDD'] . '</td>
                            <td>' . $row['Email'] . '</td>
                            <td>' . $row['NDRequest'] . '</td>
                            <td>' . $row['GiaTien'] . '</td>
                            <td>' . $row['SoLuongKhaoSat'] . '</td>
                            <td>' . $row['SoCauKhaoSat'] . '</td>
                            <td>' . $row['Status'] . '</td>
                        </tr>';
                        }
                    }
                }
                ?>
            </form>
        </tbody>
    </table>

</div>