<div id="tableInforKH" style="margin: 60px 0px 10px 280px;">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Username</th>
                <th>Trạng thái</th>
                <th>Hành động</th>

            </tr>
        </thead>

        <tbody>
            <form method="post">

                <?php
                $connect = mysqli_connect("localhost", "root", "", "at150252");
                $sql = "SELECT * FROM `35dangtienthanh_dangkykhaosat`";
                $query = mysqli_query($connect, $sql);
                if (mysqli_num_rows($query) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($query)) {
                        if ($row['Status'] === "Pending") {


                            echo '
                        <tr>
                            <td>' . $row['Username'] . '</td>
                            <td>' . $row['Status'] . '
                            </td>
                            <td>
                            <button type="button" onclick="DuyetTKKH(this)" value="'.$row['Username'].'" class="btn btn-warning">Duyệt</button>
                            </td>
                            
                        </tr>';
                        }
                        else{
                            echo '
                        <tr>
                            <td>' . $row['Username'] . '</td>
                            <td>' . $row['Status'] . '
                            </td>
                            <td>
                            <button type="button" class="btn btn-success">Đã duyệt</button>
                            </td>
                            
                        </tr>';
                        }
                    }
                }
                mysqli_close($connect);

                ?>

            </form>
        </tbody>
    </table>
</div>