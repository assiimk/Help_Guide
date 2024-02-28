<!DOCTYPE html>
<?php
session_start();
?>
<html dir="rtl">
    <title> تعديل الاسئلة</title>

    <style>
    body {background-color: <?php echo $_SESSION["backcolor"] ?>;}
    </style>
<body>
  
   <?php include "as_menu.php"; ?>
   
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
    <br>
    <hr>
    <?php
     $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
     
        $sql="select * from question where status=1";
        $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
        echo "<table><tr><td>رقم السؤال</td><td>".$row['hid']."</td></tr><tr><td> السؤال</td><td>".$row['hqus']."</td></tr><tr><td>التاريخ</td><td>".$row['hdate']."</td></tr><tr><td>القسم</td><td>".$row['cid']."</td></tr><tr><td> الجواب</td><td>".$row['hanswer']."</td></tr><tr><td> الكلمات المفتاحية</td><td>".$row['hkey']."</td></tr><tr><td>الادوات</td><td><a href=as_modify.php?id=".$row["hid"].">تعديل</a></td></tr></table><hr>";
        }
    }else{
          echo "لاتوجد اسئلة ";
    }
    
    mysqli_close($conn);
            
            ?>
</body>
</html>