<!DOCTYPE html>
<html>

<head>
    <META HTTP-EQUIV="refresh" CONTENT="1;URL=as_home.php">
</head>
<?php
session_start();
?>
<html>

<body>

    <?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

</body>

</html>
