<main style="margin: 100px;">
    <?php

    if (isset($_COOKIE['User'])) {
        $user = $_COOKIE['User'];
        $connect = mysqli_connect("localhost", "root", "", "at150252");
        $sql = "SELECT * FROM `35dangtienthanh_dangkykhaosat` WHERE Username='$user'";
        $query = mysqli_query($connect, $sql);
        if (mysqli_num_rows($query) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($query)) {
                if ($row['Status'] === "Pending") {
                    echo "<p style='color:#E4A11B'>Bạn đã đăng ký rồi, vui lòng chờ phê duyệt</p>";
                } else {
                    echo "<p style='color:#14A44D'>Việc đăng ký được đã được phê duyệt</p>";
                }
            }
        } else {
            $sql = "INSERT INTO `35dangtienthanh_dangkykhaosat`(`Username`, `Status`) VALUES ('$user','Pending')";
            $query = mysqli_query($connect, $sql);
            if ($query) {
                echo "<p style='color:green'>Đăng ký thành công, vui lòng chờ phê duyệt</p>";
            }
        }
        mysqli_close($connect);
    }

    ?>
</main>