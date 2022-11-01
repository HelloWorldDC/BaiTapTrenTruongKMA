<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="bootstrap-5-admin-template-main/css/mdb.min.css">
  <link rel="stylesheet" href="bs-stepper.css">
  <title>bs-stepper virtual test</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>


<body class="modal-open">
<input type="text" value="kh1" onclick="Test(this)">
<input type="text" value="kh2" onclick="Test(this)">
<input type="text" value="kh3" onclick="Test(this)">

<?php
echo time();

?>
</body>
<script src="bootstrap-5-admin-template-main/js/mdb.min.js">

</script>
<script>
  // function Test(ele){
  //   $.post("test.php",{user:ele.value},function(data){
  //     var dataInfor=data.split("$");
  //     for(let i = 0; i < dataInfor.length; i++){
  //       document.write(dataInfor[i]+"\n");
  //       document.write('\n');
  //     }
  //   },"text");
  // }
</script>
<script>
  // $(document).ready(function(){
  //   $("div").load("test.php");
  // });
//   setInterval(function(){
//    $('div').load('test.php');
// }, 2000)
// $(window).scroll(function(){
//         loadFeed();
// });
</script>
<script>
  // var xhr= new XMLHttpRequest();
  // xhr.open("POST","test.php",true);
  // xhr.onreadystatechange=function(){
  //   if(xhr.readyState==4&&xhr.status==200){
  //     var data=xhr.responseText;
      
  //   }
  // }
  // xhr.send();
</script>
</html>