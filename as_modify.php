<!DOCTYPE html>
<?php
session_start();
?>
<html dir="rtl">
    <title> تعديل سؤال</title>
    <style>
    body {background-color: <?php echo $_SESSION["backcolor"] ?>;}
    </style>
<body>
    <?php include "as_menu.php"; ?>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $ID=$_GET['id']; 
        $sql2="SELECT * FROM `question`where hid=$ID" ; 
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        ?>
        <tr><td>رقم السؤال</td><td><?php echo $row2["hid"];?> </td></tr>
        <tr><td>السؤال</td><td><input type="text" name="title" value=<?php echo $row2["hqus"];?> ></td></tr>
        <tr><td>القسم</td><td>
        <select name="cat">
        <?php
        $sql="select * from cat" ; 
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
         echo "<option value=".$row['cid'].">".$row['cname']."</option>";   
        }
        
        ?>
            </select></td></tr>
        <tr><td>تاريخ السؤال</td><td><?php echo $row2["hdate"];?></td></tr>
        <tr><td>الجواب</td><td><textarea rows="5" cols="30" name="ndetail"><?php echo $row2["hanswer"];?></textarea></td></tr>
          <tr><td>الكلمات المفتاحية</td><td><input type="text" name="word" value=<?php echo $row2["hkey"];?> ></td></tr>
        </table>
    <input type="submit" value="تعديل السؤال" >
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
        $cat=$_POST['cat'];
        $word=$_POST['word'];
        $detail=$_POST['ndetail'];
        $ID=$_GET['id'];
        $sql="update  question set hqus='$title',hanswer='$detail',hkey='$word',cid='$cat' where hid=$ID";
        mysqli_query($conn,$sql); 
        $nid= mysqli_insert_id($conn);
        echo " تم تعديل السؤال  بنجاح";
        mysqli_close($conn);
    }
    
    ?>
</body>
</html>