<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html dir="rtl">
    <style>
            body {background-color:<?php echo $_SESSION["backcolor"] ?>;}
    </style>
<head>
    <title> الرئيسية</title>
    <meta charset="UTF-8">
</head>
<body>
  
   <?php include "as_menu.php";?>
   
<form action="" method="post">
   
   اختر لون الخلفية المفضل لديك  : <select name="col">
    <option value="silver">silver</option>
        <option value="gainsboro">gainsboro</option>
        <option value="darksalmon">darksalmon</option>
    </select>
    <input type="submit" value="تغيير الخلفية">
    </form>
<?php
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
$_SESSION["backcolor"] = $_POST['col'];
     echo "لون الخلفية المفضل :";
             echo $_SESSION["backcolor"];
         echo "<br>";
      echo "<a href=delses.php>خروج</a>";
 }
?>
<br>
<hr>
<?php
if(!isset($_COOKIE["user1"])) {
  
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
    setcookie("user1", $_POST['user'], time() + (86400 * 30), "/");
    }else{
     ?>
        <form action="" method="post" >
    <input type="text" name="user">
        <input type="submit" value="ادخل اسمك">
    </form>
    <?php
    }
} else {
  echo "مرحبا بك  " . $_COOKIE["user1"];
    echo "<br>";
  echo "<a href=delcookie.php>خروج</a>";
}
?>
<br>
<hr>
    <?php
      $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
 $sqlcount="update counter set count=count+1 where id=1";
    mysqli_query($conn,$sqlcount);
    
    $sqlcountn="select * from counter where id=1";
        $result3=mysqli_query($conn,$sqlcountn);
        $row3=mysqli_fetch_assoc($result3);
    echo " رقم الزائر : ".$row3["count"];
    ?>
    </body>
</html>