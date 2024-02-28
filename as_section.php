<!DOCTYPE html>
<?php
session_start();
?>
<html dir="rtl">

    <style>
    body {background-color: <?php echo $_SESSION["backcolor"] ?>;}
    </style>
<head>
    <title> اضافة قسم</title>
    <meta charset="UTF-8">
</head>
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
    <form action="" method="post">
    اسم القسم <input type="text" required name="name">
    <br>
    <input type="submit" value="اضافة">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
        if (!$conn)
        {
        echo "لم يتم الاتصال بالسيرفر";
        }else{
        if (empty($_POST["name"])) {    
            echo "الرجاء ادخال كافة الحقول";
        }else{
         $name=$_POST['name'];
            
          $sql2="select * from cat where cname='$name'" ; 
       
         $result=mysqli_query($conn,$sql2);
            if (mysqli_num_rows($result)>0){
                echo "تم تسجيل القسم مسبقاً";
            }else{
            $sql="insert into cat (cname) values ('$name')";
                mysqli_query($conn,$sql); 
            echo " تم تسجيل القسم  بنجاح";
            echo mysqli_insert_id($conn);
            }
              }
             mysqli_close($conn);
        }
    }
        
       
    ?>
</body>
</html>