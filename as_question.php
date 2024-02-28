<!DOCTYPE html>
<?php
session_start();
?>
<html dir="rtl">

    <style>
    body {background-color: <?php echo $_SESSION["backcolor"] ?>;}
    </style>
<head>
    <title>اضافة سؤال</title>
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
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr><td>القسم :</td><td>
        <select name="cat" required>
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $sql="select * from cat" ; 
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
         echo "<option value=".$row['cid'].">".$row['cname']."</option>";   
        }
        mysqli_close($conn);
        ?>
            </select></td></tr>
        <tr><td>السؤال :</td><td><input type="text" name="title" required></td></tr>
        <tr><td>الجواب :</td><td><textarea rows="2" cols="50" name="odetail" required></textarea></td></tr>
        <tr><td> كلمات مفتاحية :</td><td><input type="text" name="word" required></td></tr>
        </table>
    <input type="submit" value="اضافة " >
    
    
    </form>
<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
       $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $title=$_POST['title'];
        $word=$_POST['word'];
        $cat=$_POST['cat'];
        $detail=$_POST['odetail'];
          $sql2="SELECT * FROM `question` WHERE `hqus`='$title'" ; 
         $result2=mysqli_query($conn,$sql2);
            if (mysqli_num_rows($result2)>0){
                echo "<br>تم تسجيل السؤال مسبقاً <br>";
            }else{
            $sql="INSERT INTO `question`(`hqus`,`hanswer`,`cid`, `hkey`) VALUES('$title','$detail','$cat','$word')";
           mysqli_query($conn,$sql); 
            
            $oid= mysqli_insert_id($conn);
        echo " تم تسجيل السؤال  بنجاح<br>";
            }
    mysqli_close($conn);
    }
    
    ?>
</body>
</html>