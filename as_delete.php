<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="refresh" CONTENT="1;URL=as_deleteq.php">
</head>
<body>
    <?php include "as_menu.php"; ?>
<?php
        $servername="localhost";
        $username="root";
        $password="";
        $db="as_help";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $ID=$_GET['id']; 
    
        $sql="delete from question where hid=$ID";
        mysqli_query($conn,$sql);
    echo "تم الحذف بنجاح";
    
        
        
    ?>
    
</body>
</html>