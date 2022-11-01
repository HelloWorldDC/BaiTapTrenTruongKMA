<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- <form method="post">

  <select name="taskOption">
  <option value="1">First</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
  <input type="submit">
</select>
  </form> -->


  <!-- <form  method="post">
    Red1<input type="checkbox" name="red[]" value="red">
    Green<input type="checkbox" name="green[]" value="green" checked>
    Blue<input type="checkbox" name="blue[]" value="blue">
    Cyan<input type="checkbox" name="cyan[]" value="cyan">
    Magenta<input type="checkbox" name="magenta[]" value="Magenta">
    Yellow<input type="checkbox" name="yellow[]" value="yellow">
    Black<input type="checkbox" name="black[]" value="black">
    <input type="submit" value="submit">
</form> -->
  <form method="post">

    <input id="1" type="checkbox">1
    <input type="checkbox">2
    <input type="checkbox">3
    <input type="checkbox">4
    <input type="text" name="text">
    <input type="submit" name="submit1" value="submit 1">
    <input type="submit" name="submit2" value="submit 2">
    <input type="button" name="button" value="button">
  </form>
  <?php
  // Test xss sql injection
  // if(isset($_POST['submit1'])){
  //   $getText=$_POST['text'];
  //   // $getText=htmlspecialchars($getText);
    
  //   $connect = mysqli_connect("localhost", "root", "", "at150252");
    
  //   $getText=mysqli_real_escape_string($connect,$getText);
  //   var_dump($getText);
  //   $sql="SELECT * FROM `test` WHERE Username='$getText'";
  //   $query = mysqli_query($connect, $sql);
  //   if(mysqli_affected_rows($connect)==1){
  //     echo "Đăng nhập thành công";
  //   }
  //   else{
  //     echo "Đăng nhập thất bại";
  //   }
  // }
  $sqlcheckrequestEdit = " SELECT * FROM `35dangtienthanh_quanlykhaosat`";
  $querycheckrequestEdit = mysqli_query($connect, $sqlcheckrequestEdit);
  // $getNDKS = "";
  // $getMaKS = "123";
  // $getUsernameAdd = "ks5";
  // $getPasswordAdd = "a";
  // $getEmailAdd = "ks5";
  // $getSDTAdd = "";
  // $getLocateAdd = "";
  // $sqlNDKS = "SELECT * FROM `35dangtienthanh_quanlykhaosat` WHERE MaKH='$getMaKS'";
  // $queryNDKS = mysqli_query($connectQueryNDKS, $sqlNDKS);
  // if (mysqli_num_rows($queryNDKS) > 0) {
  //   // output data of each row
  //   while ($row = mysqli_fetch_assoc($queryNDKS)) {
  //     $getNDKS = $row['NDRequest'];
  //   }
  // }
 
  ?>
  <?php
  // if(isset($_POST['green'])){
  //   echo "Đã check";
  // }


  // optional
  // echo "You chose the following color(s): <br>";
  // $selectOption = $_POST['taskOption'];
  // var_dump($selectOption);

  ?>
</body>
<script>
  document.write("<h1>Hello</h1>");
</script>

</html>